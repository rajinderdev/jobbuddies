<?php

namespace App\Http\Controllers\superAdmin;

use Illuminate\Http\Request;
use Cart;
use App\Models\Sponsorship;
use App\Models\User;
use App\Models\FundraisingOrder;
use App\Models\FundraisingOrderItem;
use App\Models\Ticket;
use App\Models\Donation;
use App\Models\Transection;
use Session;
use Stripe;
use Hash;
use Stripe_Customer;
use Auth;
use Str;
use Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class CartController extends Controller
{
    /**
     * Returns cart detail
     * @group Cart
     * @header Content-Type application/json
    **/
    public function index($slug,Request $request){
        $cartCount = 0;
        $cartData = Cart::getContent();
        $cart= null;
        if(count($cartData) > 0){
            $cartCount = count($cartData);
            $cart =  $cartData->first();
        }
        $user = [
            "email"=> $cart ? $cart->attributes['email']:'',
            "phone"=> $cart ?$cart->attributes['phone']:null,
        ];
        $ticket = Ticket::where('id',1)->first();
        $totalPrice = 0;
        $totalSoldOut =0;
        $pendingTickets =0;
        if($ticket){
            $totalSoldOut = FundraisingOrderItem::where('order_type','Tickets')->where('sold_as',"Tickets")->where('sold_as',"Tickets")->where('ticket_id',$ticket->id)->sum('quantity');
          $pendingTickets = $ticket->quantity-$totalSoldOut;
        }
      
        return view('pages.cart.index', compact('cartCount','cartData','user','totalPrice','ticket','pendingTickets'));
    }
    /**
     * Use send Purchase ticket detail
     * @group  Purchase Ticket
     * @header Content-Type application/json
     * @bodyParam quantity integer required
     * @bodyParam deliveryMode string required
     * @bodyParam emial string required
     * @bodyParam phone string required
     **/
    public function purchaseTicket(Request $request){
        // Cart::clear();
        $cartId = null;
        $quantity = 0;
        $price = 0;
        $cart = Cart::getContent();
       
        foreach($cart as $ca){
            if($ca['attributes']['type'] == "Tickets"){
                $cartId = $ca->id;
                $quantity = $ca->quantity;
                $price = $ca->price;
            }
        }
        if($cartId){
            Cart::update($cartId,[
                'quantity' => $request->quantity,
                'price' => $price+$request->price
            ]);
        }
        else{
             $sponsorship = Ticket::find($request->id);
            Cart::add([
                'id'=>"Ticket-".$request->id,
                'name' =>"General Admission Ticket",
                'price' => $request->price,
                'quantity' => $request->quantity,
                'image'=>$sponsorship->image,
                'attributes' => array(
                    'id'=>$request->id,
                    'type'=>$request->type,
                    'tickets_Quantity'=>0,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'deliveryMode'=>$request->has('deliveryMode')?$request->deliveryMode:"",
                ),
                'associatedModel' => $sponsorship
                // 'accept_discount' => 0
            ]);
        }
        return redirect()->route('cart');
    }
    /**
     * Use add Sponsorship
     * @group  Sponsorship
     * @header Content-Type application/json
     * @urlParam id integer required
     **/
    public function addSponsorshipInCart($id){
        $sponsorship = Sponsorship::find($id);
        $itemId = $id;
        $item = Cart::get($itemId);
        if($sponsorship && (!$item)){
            Cart::add([
                'id'=>"Sponsorship-".$id,
                'name' =>$sponsorship->name,
                'price' => $sponsorship->price,
                'quantity' => 1,
                'image'=>$sponsorship->image,
                'attributes' => array(
                    'id'=>$id,
                    'type'=>"Sponsorship",
                    'tickets_Quantity'=>$sponsorship->tickets_quantity,
                    'email'=>"",
                    'phone'=>"",
                    'deliveryMode'=>"",
                ),
                'associatedModel' => $sponsorship
                // 'accept_discount' => 0
            ]); 
        }
        return redirect()->route('cart');
    }

    /**
     * Use sponsorship And Tickets Payment
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
    public function sponsorshipAndTicketsPayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
            $tab = null;
            $carts = Cart::getContent();
            $userTicketCount = 0;
        
            foreach($carts as $cart){
                if($cart->attributes->type=="Tickets"){
                $userTicketCount = $userTicketCount+$cart->quantity;
                }
            }
            $ticket = Ticket::where('id',1)->first();
            $totalPrice = 0;
            $totalSoldOut =0;
            $pendingTickets =0;
            if($ticket){
                $totalSoldOut = FundraisingOrderItem::where('order_type','Tickets')->where('sold_as',"Tickets")->where('sold_as',"Tickets")->where('ticket_id',$ticket->id)->sum('quantity');
                $pendingTickets = $ticket->quantity-$totalSoldOut;
            }
            $auth =Auth::user();
            if($request->has('email') || Auth::user()){
                if($request->has('email')){
                $user = User::where('email',$request->email)->first();   
                }
                if(Auth::user() && Auth::user()->email){
                $user = User::where('email',Auth::user()->email)->first();   
                }
                
                
                $new = Stripe\Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'description' => "superschool.org platform's user",
                ]);
                Stripe\Customer::createSource(
                    $new->id,
                    ['source' => $request->stripeToken]
                );
                if(!$user){
                    $user = User::create([
                        'name' => $request->name ? $request->name : '',
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'role' => 6,
                        'password' => Hash::make($request->password),
                        'stripe_id'=> $new->id,
            
                    ]);
                }
            }
        
            if($pendingTickets>=$userTicketCount){
                if(isset($new)){
                    $payment = Stripe\Charge::create ([
                        "amount" => $request->totalPrice*100,
                        "currency" => "USD",
                        "customer"=> $new->id,
                        "description" => "This is test payment",
                ]);
                }
                else{
                    $payment = Stripe\Charge::create ([
                        "amount" => $request->totalPrice*100,
                        "currency" => "USD",
                        "description" => "This is test payment",
                ]);
                }
                $paymentArr = $payment->toArray();
            
                $transectionBody = [
                    "user_id"=>$user->id,
                    "stripe_charge_id"=>$payment->id,
                    "amount"=>$paymentArr['amount'],
                    "balance_transaction"=>$paymentArr['balance_transaction'],
                    "failure_balance_transaction"=>$paymentArr['failure_balance_transaction'],
                    "failure_code"=>$paymentArr['failure_code'],
                    "payment_intent"=>$paymentArr['payment_intent'],
                    "payment_method"=>$paymentArr['payment_method'],
                    "status"=>$paymentArr['status'],
                    "receipt_url"=>$paymentArr['receipt_url'],
                    "event_id"=> $request->has('event_id')?$request->event_id:NULL,
                ];
                Transection::create($paymentArr);
            
                if($paymentArr['status']=="succeeded"){
                    $fundraisingOrderBody = [
                        "user_id"=>$user->id,
                        "totalAmount"=>$request->totalPrice,
                        "transection_id"=>$payment->balance_transaction,
                        "stripe_charge_id"=>$payment->id,
                         "event_id"=> $request->has('event_id')?$request->event_id:NULL,
                    ];
                    $fundraisingOrder = FundraisingOrder::create($fundraisingOrderBody);
                    foreach($carts as $key=>$cart){
                      if($tab==null){
                            if($cart->attributes->type=="Sponsorship"){
                                Session::flash('Sponsorship', true);
                                $tab = "Sponsorship";
                            }
                            else{
                                $tab = "Ticket";
                            }  
                        }
                        $ss= null;
                         if($cart->attributes->type =="Sponsorship"){
                            $ss = Sponsorship::where('id',$cart->attributes->id)->first();
                            if($ss && $ss->type==2){
                                 $tab = "casinogame";
                            }
                         }
                        $fundraisingOrderItemBody = [
                            "user_id"=>$user->id,
                            "fundraising_order_id"=>$fundraisingOrder->id,
                            "price"=>$cart->price/$cart->quantity,
                            "totalAmount"=>$cart->price,
                            "quantity"=>$cart->quantity,
                            "sponsorship_id"=>($cart->attributes->type=="Sponsorship")?$cart->attributes->id:NULL,
                            "ticket_id"=>($cart->attributes->type=="Tickets")?$cart->attributes->id:NULL,
                            "order_type"=>($ss && $ss->type==2)?"Casino Games":$cart->attributes->type,
                            "sold_as"=>($cart->attributes->type=="Tickets")?"Tickets":NULL,
                            "ticket_code"=>rand(1234567890,50),
                            "bar_code"=>rand(1234567890,50),
                             "event_id"=> $request->has('event_id')?$request->event_id:NULL,
                        ];
                        $t = Ticket::where('id',1)->first();
                        $FundraisingOrderItem1 = FundraisingOrderItem::create($fundraisingOrderItemBody);
                        
                         
                        if($cart->attributes->type =="Sponsorship"){
                            $ss = Sponsorship::where('id',$cart->attributes->id)->first();
                           
                            $fundraisingOrderItemBody = [
                                "user_id"=>$user->id,
                                "fundraising_order_id"=>$fundraisingOrder->id,
                                "price"=>$t->price,
                                "totalAmount"=>$t->price*$ss->tickets_quantity,
                                "quantity"=>$ss->tickets_quantity,
                                "sponsorship_id"=>NULL,
                                "ticket_id"=>1,
                                "order_type"=>"Tickets",
                                "sold_as"=>($ss && $ss->type==2)?"Casino Games":"Sponsorship",
                                "ticket_code"=>rand(1234567890,50),
                                "bar_code"=>rand(1234567890,50),
                                 "event_id"=> $request->has('event_id')?$request->event_id:NULL,
                            ]; 
                            FundraisingOrderItem::create($fundraisingOrderItemBody);
                             Sponsorship::where('id',$cart->attributes->id)->update(['sold_status'=>1]);
                        }
                        if($cart->attributes->type =="Tickets"){
                            $fundraisingOrderTicket = $FundraisingOrderItem1;
							$transection_id = $payment->balance_transaction;
                            $pdf = PDF::loadView('pages.profile.downloadTicket', compact('fundraisingOrderTicket','transection_id'));
                            $data=['user'=>$user,'ticket'=>$t,'fundraisingOrderItem'=>$FundraisingOrderItem1,'transection_id'=>$payment->balance_transaction,'pdf'=>$pdf->output()];
                            Mail::to($user->email)
                            ->send(new \App\Mail\TicketPurchase($data));
                           
                            Mail::to(['teena@superschool.org','caitlyn@superschool.org'])
                            ->send(new \App\Mail\AdminTicketPurchase($data));
                        }
                        if($cart->attributes->type =="Sponsorship"){
                            $spon = Sponsorship::where('id',$cart->attributes->id)->first();
                            if($spon){
                                $fundraisingOrderSponsorship = $FundraisingOrderItem1;
                                $transection_id = $payment->balance_transaction;
                                $pdf = PDF::loadView('pages.profile.downloadSponsorship', compact('fundraisingOrderSponsorship','transection_id'));
                                $dataSponsorship=['user'=>$user,'sponsorship'=>$spon,'fundraisingOrderItem'=>$FundraisingOrderItem1,'transection_id'=>$payment->balance_transaction,'pdf'=>$pdf->output()];
                               Mail::to($user->email)
                                ->send(new \App\Mail\SponsorshipPurchase($dataSponsorship));
                                
								
                                Mail::to(['teena@superschool.org','caitlyn@superschool.org'])
                                ->send(new \App\Mail\AdminSponsorshipPurchase($dataSponsorship));

                            }
                            
                        }
                    }
                    Auth::loginUsingId($user->id);
                    Cart::clear();
                    return redirect()->route('profile',$tab.'=1')->with('success','Thank You '.$request->name.'! Your payment has been received!');
                }
            }
            Cart::clear();
            return redirect()->back()->with('error',"Your transection failed!");
        } catch(Stripe\Exception\CardException $e) {
            //  if($e->getError()->code == "card_declined"){
            //     return redirect()->back()->with('error',"The card number is incorrect.");
            // }
             if($e->getError()->code == "merchant_blacklist"){
                return redirect()->back()->with('error',"The payment was declined because it matches a value on the Stripe user’s block list.");
            }
            return redirect()->back()->with('error',$e->getError()->message);
            // error_log("A payment error occurred: {$e->getError()->message}");
        } catch (Stripe\Exception\InvalidRequestException $e) {
           
            return redirect()->back()->with('error',$e->getError()->message);
            // error_log("An invalid request occurred.");
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getError()->message);
            // error_log("Another problem occurred, maybe unrelated to Stripe.");
        }
    }

    /**
     * use delete Item In Cart
     * @group  Purchase Ticket
     * @header Content-Type application/json
     * @urlParam cartId integer required
     **/
    public function deleteItemInCart($cartId,$slug){
        Cart::remove($cartId);
        return redirect()->route('cart',$slug);
    }
  
     public function updateItemInCart(Request $request){
        Cart::update($request->cartId,[
        'quantity' => ($request->status==1 ? 1 : -1),
        'price' =>  $request->price*$request->quantity
        ]);
         $ticket = Ticket::where('id',1)->first();
        $totalPrice = 0;
        $totalSoldOut =0;
        
          return response()->json(["success"=>true]);
    }
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
                return redirect()->back()->with('error',"The payment was declined because it matches a value on the Stripe user’s block list.");
            }
            return redirect()->back()->with('error',$e->getError()->message);
            // error_log("A payment error occurred: {$e->getError()->message}");
        } catch (Stripe\Exception\InvalidRequestException $e) {
           
            return redirect()->back()->with('error',$e->getError()->message);
            // error_log("An invalid request occurred.");
        } catch (Exception $e) {
            return redirect()->back()->with('error',$e->getError()->message);
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
                    "event_id"=>$request->has('event_id')?$request->event_id:NULL,
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
                    "event_id"=> $request->has('event_id')?$request->event_id:NULL,
                ];
				if($request->has('dedicatees_email')){
					$data=['name'=>($request->has('dedicatees_name'))?$request->dedicatees_name:'','amount'=>$request->amountDonate];
					Mail::to($request->dedicatees_email)
					->send(new \App\Mail\MakeDonation($data));
				}
				
            }
      
            $donation = Donation::create($body);
            if($request->has('dedicatees_email')){
					$data=['name'=>($request->has('dedicatees_name'))?$request->dedicatees_name:'','email'=>$request->dedicatees_email,'amount'=>$request->amountDonate,'donation'=>$donation];
					Mail::to(['teena@superschool.org','caitlyn@superschool.org'])
					->send(new \App\Mail\AdminDonationReceived($data));
				}
            if($request->has('donation_status')&&$request->donation_status=="on"){
                return redirect()->route('donateSuccess',['id'=>$donation->id])->with('success','Thank You '.$request->dedicatees_name.'! Your donation funds has been received Anonymous');
            }
            else{
                return redirect()->route('donateSuccess',['id'=>$donation->id])->with('success','Thank You '.$request->dedicatees_name.'! Your donation funds has been received Un-Anonymous');
            }
       }
       else{
          return redirect()->back()->with('error',"Your transection failed!");  
       }
        // }catch(Stripe_CardError $e) {
        //     $error1 = $e->getMessage();
        //     return redirect()->back()->with('error',$error1); 
        //     } catch (Stripe_InvalidRequestError $e) {
        //     // Invalid parameters were supplied to Stripe's API
        //     $error2 = $e->getMessage();
        //     return redirect()->back()->with('error',$error2); 
        //     } catch (Stripe_AuthenticationError $e) {
        //     // Authentication with Stripe's API failed
        //     $error3 = $e->getMessage();
        //     return redirect()->back()->with('error',$error3); 
        //     } catch (Stripe_ApiConnectionError $e) {
        //     // Network communication with Stripe failed
        //     $error4 = $e->getMessage();
        //     return redirect()->back()->with('error',$error4); 
        //     } catch (Stripe_Error $e) {
        //     // Display a very generic error to the user, and maybe send
        //     // yourself an email
        //     $error5 = $e->getMessage();
        //     return redirect()->back()->with('error',$error5); 
        //     } catch (Exception $e) {
        //     // Something else happened, completely unrelated to Stripe
        //     $error6 = $e->getMessage();
        //     return redirect()->back()->with('error',$error6); 
        //     } 
      
    }
    public function donateSuccess(Request $request){
        $donation = Donation::where('id',$request->id)->first();
        return view('pages.cart.donateSuccess', compact('donation'));

    }
}
