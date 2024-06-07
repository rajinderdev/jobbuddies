<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\CampRegistration;
use Barryvdh\DomPDF\Facade\Pdf;
use Stripe;
use Str;
use Mail;
class DonationController extends Controller
{
   /**
     * Usedonation Payment
     * @group  Purchase Ticket
     * @header Content-Type application/json
     * @bodyParam quantity integer required
     * @bodyParam deliveryMode string required
     * @bodyParam emial string required
     * @bodyParam password string required
     * @bodyParam phone string required
     * @bodyParam totalPrice integer required
     * @bodyParam stripeToken string required
     **/
    public function donationPayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      
        try {
            if($request->has('dedicatees_email')){
            $new = Stripe\Customer::create([
                'name' => $request->dedicatees_name,
                'email' => $request->dedicatees_email,
                'description' => "Dedicatees user",
            ]);
            Stripe\Customer::createSource(
                $new->id,
                ['source' => $request->stripeToken]
            );
            
            $payment = Stripe\Charge::create ([
                    "amount" => $request->amountDonate*100,
                    "currency" => "USD",
                    "customer"=>$new->id,
                    "description" => "This is donation payment",
            ]);
            }
            else{
            $payment = Stripe\Charge::create ([
                    "amount" => $request->amountDonate*100,
                    "currency" => "USD",
                    "description" => "This is donation payment",
            ]);
            }
        } catch(Stripe\Exception\CardException $e) {
            //  if($e->getError()->code == "card_declined"){
            //     return redirect()->back()->with('error',"The card number is incorrect.");
            // }
            if($e->getError()->code == "merchant_blacklist"){
                $arr = array("message" =>"The payment was declined because it matches a value on the Stripe user’s block list.", "status" => 422);
                return \Response::json($arr, $arr["status"]);
            }
            $arr = array("message" =>$e->getError()->message, "status" => 422);
            return \Response::json($arr, $arr["status"]);
            // error_log("A payment error occurred: {$e->getError()->message}");
        } catch (Stripe\Exception\InvalidRequestException $e) {
           
            $arr = array("message" =>$e->getError()->message, "status" => 422);
            return \Response::json($arr, $arr["status"]);
            // error_log("An invalid request occurred.");
        } catch (Exception $e) {
             $arr = array("message" =>$e->getError()->message, "status" => 422);
            return \Response::json($arr, $arr["status"]);
            // error_log("Another problem occurred, maybe unrelated to Stripe.");
        }
        if($payment->status=="succeeded"){
            if($request->has('donation_status')&& $request->donation_status=="on"){
                $body = [
                    "amount" => $request->amountDonate,
                    "donation_status" => $request->has('donation_status')&&$request->donation_status=="on"?"Public":"Private",
                    "payment_type"=>"One Time",
                    "receipt_url"=>$payment->receipt_url,
                    "transection_id"=>$payment->balance_transaction,
                    "stripe_charge_id"=>$payment->id,
                     "type"=>1,
                     "all_detail"=>json_encode($payment),
                     "gross_amount"=> $request->amountDonate,
                    "original _amount"=>$request->amountDonate
                ];  
            }
            else{
                $body = [
                    "amount" => $request->amountDonate,
                    "donate_type" => ($request->has('donate_type'))?$request->donate_type:'',
                    "dedicatees_name" => ($request->has('dedicatees_name'))?$request->dedicatees_name:'',
                    "dedicatees_email" => ($request->has('dedicatees_email'))?$request->dedicatees_email:'',
                    "recipient_email" => ($request->has('recipient_email'))?$request->recipient_email:'',
                    "donation_status" => $request->has('donation_status')&&$request->donation_status=="on"?"Public":"Private",
                    "payment_type"=>"One Time",
                    "receipt_url"=>$payment->receipt_url,
                    "transection_id"=>$payment->balance_transaction,
                    "stripe_charge_id"=>$payment->id,
                    "type"=>1,
                    "all_detail"=>json_encode($payment),
                     "gross_amount"=> $request->amountDonate,
                    "original _amount"=>$request->amountDonate
                    
                ];
				if($request->has('dedicatees_email')){
					$data=['name'=>($request->has('dedicatees_name'))?$request->dedicatees_name:'','amount'=>$request->amountDonate];
					Mail::to($request->dedicatees_email)
					->send(new \App\Mail\MakeDonation($data));
				}
				
            }
      
            $donation = Donation::create($body);
            // if($request->has('dedicatees_email')){
			// 		$data=['name'=>($request->has('dedicatees_name'))?$request->dedicatees_name:'','email'=>$request->dedicatees_email,'amount'=>$request->amountDonate,'donation'=>$donation];
			// 		Mail::to(['teena@superschool.org','caitlyn@superschool.org'])
			// 		->send(new \App\Mail\AdminDonationReceived($data));
            // }
            if($request->has('donation_status')&&$request->donation_status=="on"){
                return response()->json([
                    'success' => true,
                    'message' =>'Thank You '.$request->dedicatees_name.'! Your donation funds has been received Anonymous',
                ], 200);
            }
            else{
                 return response()->json([
                    'success' => true,
                    'message' =>'Thank You '.$request->dedicatees_name.'! Your donation funds has been received Un-Anonymous',
                ], 200);
               }
       }
       else{
            $arr = array("message" =>"Your transection failed!", "status" => 422);
            return \Response::json($arr, $arr["status"]);
         
       }
    }
    public function getTotalDonations()
    {
         $totalDonation = Donation::where('type',1)->sum('amount');
         $totalDonations =round($totalDonation);
         $totalDonors = Donation::where('type',1)->count();
         return response()->json([
                    'success' => true,
                    'totalDonations' =>$totalDonations,
                    'totalDonors' =>$totalDonors,
                ], 200); 
    }
    public function getPaymentByStripeUrl(Request $request)
    {
        $event = $request->all();
         \Log::info($event);
         \Log::info($event['data']['object']['metadata']);
         \Log::info($event['data']['object']['metadata']['summerRegistrationId']);
        if($event){
            switch ($event['data']['object']['status']) {
                case 'paid':
                $chargeId = $event['data']['object']['charge'];
                if($chargeId){
                    if($event['data']['object']['metadata'] && $event['data']['object']['metadata']['summerRegistrationId']){
                        CampRegistration::where('id', $event['data']['object']['metadata']['summerRegistrationId'])->update(["payment_status"=>"Paid","stripe_charge_id"=> $chargeId,"all_detail"=>json_encode($event),"amount" =>97.85]);
                        if($event['data']['object']['metadata']['studentEmail']){
                            $camp =  CampRegistration::where('id', $event['data']['object']['metadata']['summerRegistrationId'])->first();
                            $pdf = PDF::loadView('superadmin.summerCamp.downloadCampInvoice', compact('camp'));
                            $data=['name'=>($event['data']['object']['metadata']['studentName'])?$event['data']['object']['metadata']['studentName']:'','amount'=>"$97.85",'pdf'=>$pdf->output()];
                            Mail::to($event['data']['object']['metadata']['studentEmail'])
                            ->send(new \App\Mail\SummerRegistration($data));
                                
                        }
                    }
                    else{
                        $donationExist = Donation::where('stripe_charge_id',$chargeId)->first();
                        if(!$donationExist){
                            $body = [
                                "amount" => ($event['data']['object']['amount_paid'])?($event['data']['object']['amount_paid']/100):NULL,
                                "donate_type" => "Public",
                                "dedicatees_name" =>($event['data']['object']['customer_name'])?$event['data']['object']['customer_name']:NULL,
                                "dedicatees_email" =>($event['data']['object']['customer_email'])?$event['data']['object']['customer_email']:NULL,
                                "recipient_email" => NULL,
                                "donation_status" => "Public",
                                "payment_type"=>"One Time",
                                "receipt_url"=>($event['data']['object']['invoice_pdf'])?$event['data']['object']['invoice_pdf']:NULL,
                                "transection_id"=>NULL,
                                "stripe_charge_id"=> $chargeId,
                                "type"=>1,
                                "all_detail"=>json_encode($event),
                                "gross_amount"=> ($event['data']['object']['amount_paid'])?($event['data']['object']['amount_paid']/100):NULL,
                                "original _amount"=> ($event['data']['object']['amount_paid'])?($event['data']['object']['amount_paid']/100):NULL,
                                "transection_from"=>"webhook",
                            ];
                            Donation::create($body);
                        }
                        if($event['data']['object']['customer_email']){
                            $data=['name'=>($event['data']['object']['customer_name'])?$event['data']['object']['customer_name']:'','amount'=>($event['data']['object']['amount_paid']/100)];
                            Mail::to($event['data']['object']['customer_email'])
                            ->send(new \App\Mail\MakeDonation($data));
                        }
                    }
                
                    return response()->json([
                        'success' => true,
                    ], 200); 
                }
            }
            return response()->json([
                'success' => false,
            ], 405); 
        }
    }
    public function getCheckoutUrl(Request $request)
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $checkout_session = $stripe->checkout->sessions->create([
        'line_items' => [[
            'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'MAKE A DONATION',
            ],
            'unit_amount' => $request->has('price')?$request->price:25,
            ],
            'quantity' => 1,
        ]],
        'invoice_creation' => [
            'enabled' => true
        ],
        'mode' => 'payment',
        'payment_method_types' =>['us_bank_account'],
        'success_url' => 'https://superschool.org?success=true',
        'cancel_url' => 'https://superschool.org/',
        ]);
         return response()->json([
                    'success' => true,
                    'checkout_session' =>$checkout_session,
                ], 200); 
    }
}

       