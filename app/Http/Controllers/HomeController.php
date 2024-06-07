<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Session, Redirect;
use App\Models\Plan;
use App\Models\Subscription;
use Exception;
use Stripe\Exception\CardException;
use Stripe\Exception\InvalidRequestException;
use Stripe;
use App\Models\Job;
use App\Models\JobSkill;
use Laravel\Cashier\Cashier;

class HomeController extends Controller
{
    /* Login Template */
    public function login()
    {
        return view('login');
    }

    /* Logged In */
    public function loggedIn(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|email:filter',
            'password' => 'required|min:6|max:12',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', 'Validations failed.');
        }

        DB::beginTransaction();
        try {
            $userdata = array(
                'email' => $request->email,
                'password' => $request->password
            );
            if (Auth::attempt($userdata)) {
                return Redirect::to('/')->with('success', 'Login successfully.');
            } else {
                return Redirect::to('login')->with('error', 'Please check credentials.');
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            \Log::error(array(
                'request' => (count(\Request::all()) != 0) ? \Request::except(['_token']) : "NA",
                'path' => \Route::currentRouteName(),
                'message' => $exception->getMessage()
            ));
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('success', 'Login successfully.');
    }

    public function createSubscription(Request $request)
    {

        try {
            $user = auth()->user();
            $currentuser = User::find($user->id);
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $userplan = Plan::find($request->plan_id);

            if (is_null($currentuser->stripe_id)) {
                $stripeCustomer = $user->createAsStripeCustomer();
                $currentuser->update(['stripe_id' => $stripeCustomer->id]);
            }

            // Create a PaymentMethod
            $paymentMethod = \Stripe\PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'token' => $request->stripeToken,
                ],
            ]);

            // Attach the PaymentMethod to the customer
            $paymentMethod->attach([
                'customer' => $currentuser->stripe_id,
            ]);
            // Set the default PaymentMethod on the customer
            \Stripe\Customer::update(
                $currentuser->stripe_id,
                [
                    'invoice_settings' => [
                        'default_payment_method' => $paymentMethod->id,
                    ],
                ]
            );

            // Create the subscription
            $subscription = $user->newSubscription($userplan->name, $userplan->stripe_plan_id)
                ->create($paymentMethod->id, [
                    'email' => $user->email,
                ]);


            if ($userplan->plan_type == "month") {
                $subscription->ends_at = \Carbon\Carbon::now()->addDays(30);
            }
            $subscription->save();
            return redirect()->route('user.profile', "requestUrl=login");
        } catch (Exception $e) {

            $userSubscription = Subscription::where('user_id', Auth::user()->id)->orderby('id', 'DESC')->first();
            if (isset($userSubscription->stripe_status) && $userSubscription->stripe_status == "incomplete") {
                // $mailable = new \App\Mail\BusinessOwner($user,$password);
                // $emailJob = new SendEmail($user->email, $mailable);

                // dispatch($emailJob->onConnection('database')); 
            }
            dd($e->getMessage());
            // return redirect()->back()->with('success', $e->getMessage());

        } catch (CardException $e) {
            //  if($e->getError()->code == "card_declined"){
            //     return redirect()->back()->with('error',"The card number is incorrect.");
            // }
            if ($e->getError()->code == "merchant_blacklist") {
                dd("The payment was declined because it matches a value on the Stripe user’s block list.");
                // return redirect()->back()->with('error', "The payment was declined because it matches a value on the Stripe user’s block list.");
            }
            dd($e->getError()->message);
            // return redirect()->back()->with('error', $e->getError()->message);
            // error_log("A payment error occurred: {$e->getError()->message}");
        }
    }

    /* Register Template */
    public function register(Request $request)
    {
        $planId = $request->has('plan') ? $request->plan : '';
        $plan = Plan::where('id', $planId)->first();
        return view('register', compact('plan'));
    }
    /* card Template */
    public function createPayment(Request $request)
    {
        $planId = $request->has('plan') ? $request->plan : '';
        $plan = Plan::where('id', $planId)->first();
        return view('card', compact('plan'));
    }

    /* Register new user */
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z ]*$/|max:255',
            'email' => 'required|email|email:filter|unique:users,email',
            'phone' => 'required|min:13|max:14',
            'password' => 'required|min:6|max:12',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator->messages());
        }
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->type = 'candidate';
            $user->password = bcrypt($request->input('password'));
            $user->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();

            \Log::error(array(
                'request' => (count(\Request::all()) != 0) ? \Request::except(['_token']) : "NA",
                'path' => \Route::currentRouteName(),
                'message' => $exception->getMessage()
            ));
            return redirect()->back()->with('error', $exception->getMessage());
        }
        $message = "User Registered Successfully!";
        if (!empty($request->plan)) {
            Auth::loginUsingId($user->id);
            return redirect()->route('createPayment', ['plan' => $request->plan])->with('success', $message);
        }
        return Redirect::to('login')->with('success', $message);
    }

    /* Home Page Template */
    public function home(Request $request)
    {

        return view('welcome');
    }



    /* CMS pages - Start Here */
    public function aboutUs()
    {
        return view('dashboard.cms.about');
    }

    public function privacyPolicy()
    {
        return view('dashboard.cms.privacy-policy');
    }

    public function contactUs()
    {
        return view('dashboard.cms.contact-us');
    }
    public function resources()
    {
        $jobs = Job::take(4)->get();
        $jobCount = Job::count();
        return view('dashboard.cms.resources',compact('jobs','jobCount'));
    }

    public function faq()
    {
        return view('dashboard.cms.faq');
    }

    public function termsConditions()
    {
        return view('dashboard.cms.terms-and-conditions');
    }
    public function getAllJob()
    {
        $jobs = Job::get();
        return response()->json([
            'success' => true,
            'jobs' => $jobs
        ], 200);
    }
    public function getJobSkillbyId($id)
    {
        $jobSkills = JobSkill::where('job_id',$id)->get();
        $job = Job::where('id',$id)->first();
        return response()->json([
            'success' => true,
            'jobSkills' => $jobSkills,
            'job' => $job,
        ], 200);
    }
}
