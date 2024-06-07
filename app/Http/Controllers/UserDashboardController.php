<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use View;

class UserDashboardController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout successfully.');
    }

    public function profile() {
        $send_as_gift_orders = Order::where('user_id', Auth::user()->id)->where('delivery_option', 'send-as-gift')->orderBy('id', 'desc')->paginate(9);
        $buy_for_self_orders = Order::where('user_id', Auth::user()->id)->where('delivery_option', 'buy-for-self')->orderBy('id', 'desc')->paginate(9);
        return view('user-dashboard.profile', compact('send_as_gift_orders','buy_for_self_orders'));
    }

    public function edit_profile(Request $request) {

        $user_id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'phone' => 'required|min:10|max:14,phone'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('error', 'User name & phone number cannot be empty.');
        }
        DB::beginTransaction();
        try {
            if (!empty($request->file('image'))) {
                $filename = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('images/', $filename, 'public');
                $image = $filename;
            }else if(empty($request->file('image')) && Auth::user()->image){
                $image = Auth::user()->image;
            }else{
                $image = '';
            }

            User::where('id',$user_id)->update(['name'=>$request->name, 'phone'=>$request->phone, 'image'=> $image]);
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

        $send_as_gift_orders = Order::where('user_id', Auth::user()->id)->where('delivery_option', 'send-as-gift')->get();
        $buy_for_self_orders = Order::where('user_id', Auth::user()->id)->where('delivery_option', 'buy-for-self')->get();

        return redirect()->back()->with('send_as_gift_orders',$send_as_gift_orders)->with('buy_for_self_orders',$buy_for_self_orders)->with('success', 'User profile edit successfully.');
    }

    public function pledge_detail($id){
        $orderData = Order::where('id', $id)->first();
        return view('user-dashboard.pledge-detail', compact('orderData'));
    }

    public function pledgeCardPdf($id){
        $orderData = Order::where('id', $id)->first();
        $logo = asset('assets/image/logo.svg');
        $kid_name = \Helper::getAssociatedChild($orderData->child_name);
        $html = View::make('user-dashboard.invoice', ['orderData' => $orderData, 'kid_name' => $kid_name, 'logo' => $logo]);

        $pdf = PDF::setPaper('a4', 'landscape')->loadHtml($html);
        $pdf_name = 'invoice'.$orderData->pledge_id.'.pdf';
        return $pdf->download($pdf_name);
    }
}
