<?php

namespace App\Http\Controllers\superAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\FundraisingOrderItem;
use App\Models\FundraisingOrder;
use App\Models\Sponsorship;
use App\Models\SponsorshipBenefit;
use App\Models\Ticket;
use App\Models\SponsoredByEventImage;
use App\Models\Donation;
use Barryvdh\DomPDF\Facade\Pdf;
use DataTables;
use Str;
use Cart;
class EventController extends Controller
{
     /**
     * Returns get fundraising List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function liveEvent(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::where('status',1)->orderBy('id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
           
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            
            ->addColumn('action', function ($data) {
                $btn = '<div class="d-flex">
                 <a href="'.route('superadmin.fundraising.editEvent',$data->slug).'" class="btn btn-sm btn-light border ml-1">
                <i class="fa fa-solid fa-edit"></i> </a>
                <a href="'.route('superadmin.fundraising.index',$data->slug).'" class="btn btn-sm btn-light border ml-1">
                <i class="fa fa-solid fa-eye"></i></a>';
                if($data->status == 1){
                    $btn .= '<button class="btn btn-sm ml-2 border  btn-danger"  onclick="changEventStatus('.$data->id.', 0)" data-bs-toggle="modal" data-bs-target="#delModal">Deactive</button>';
                }
                else{
                    $btn .= '<button class="btn btn-sm ml-2 border  btn-success"  onclick="changEventStatus('.$data->id.', 1)" data-bs-toggle="modal" data-bs-target="#delModal">Active</button>';
                }
               $btn .='<a href="'.route('superadmin.fundraising.event.website',$data->slug).'" class="btn btn-sm btn-light border ml-1" target="_blank">Go To Website</a></div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        $pageTitle = "All Donators";
        
    //     $totalDonation=Donation::where('type',1)->sum('amount');
    //    $totalDonations = round($totalDonation);
        return view('superadmin.fundraising.liveEvent',compact('pageTitle'));
       
    }
    /**
     * Returns past event List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getPastEventList(Request $request)
    {
        if ($request->ajax()) {
            $data = Event::where('status','0')->orderBy('id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
           
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            
            ->addColumn('action', function ($data) {
                $btn = '<div class="d-flex">
                <a href="'.route('superadmin.fundraising.index',$data->slug).'" class="btn btn-sm btn-light border">
                <i class="fa fa-solid fa-eye"></i></a>';
                if($data->status == 1){
                    $btn .= '<button class="btn btn-sm ml-2 border  btn-success"  onclick="changEventStatus('.$data->id.', 0)" data-bs-toggle="modal" data-bs-target="#delModal">Deactive</button>';
                }
                else{
                    $btn .= '<button class="btn btn-sm ml-2 border  btn-success"  onclick="changEventStatus('.$data->id.', 1)" data-bs-toggle="modal" data-bs-target="#delModal">Active</button>';
                }
               $btn .='</div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        $pageTitle = "All Donators";
        return view('superadmin.fundraising.pastEvent',compact('pageTitle'));
    }
/**
     * Use update event status
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id integer required
     * @bodyParam status integer required
     **/
    public function changeEventStatus(Request $request)
    {
        $Ticket = Event::where('id', $request->id)->update(['status'=>$request->status]);
        return redirect()->back()->with('success', 'Ticket '.($request->status==0?'deactivate':'activate').' successfully.');
    }
    /**
     * Use add event 
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function createEvent(Request $request)
    {
        $pageTitle = "Create Event";
        return view('superadmin.fundraising.createEvent',compact('pageTitle'));
    }
    /**
     * Use get data for edit event 
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function editEvent($slug)
    {
        $event = Event::where('slug',$slug)->first();
        $sponsoredByEventImages = SponsoredByEventImage::where('event_id',$event->id)->get();
        $pageTitle = "Edit Event";
        return view('superadmin.fundraising.editEvent',compact('pageTitle','event','sponsoredByEventImages'));
    }


    /**
     * Use store event 
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam date date required
     * @bodyParam time string required
     * @bodyParam address string required
     * @bodyParam city string required
     * @bodyParam state string required
     * @bodyParam country string required
     * @bodyParam zip_code integer required
     * @bodyParam goal_total_amount integer required
     * @bodyParam main_heading string required
     * @bodyParam sub_heading string required
     * @bodyParam background_image file required
     * @bodyParam banner_image file required
     * @bodyParam banner_image2 file required
     * @bodyParam donation_image file required
     * @bodyParam sponsored_by_images file required
     * @bodyParam donation_text string required
     **/

    public function store(Request $request)
    {
        
        $slug = Str::slug($request->name, '-');
        if(!empty($request->file('background_image'))) {
            $background_image = $request->file('background_image')->getClientOriginalName();
            $request->file('background_image')->storeAs('storage/images', $background_image);
        }else{
            $background_image="";
        }
        if(!empty($request->file('banner_image'))) {
            $banner_image = $request->file('banner_image')->getClientOriginalName();
            $request->file('banner_image')->storeAs('storage/images', $banner_image);
        }else{
            $banner_image="";
        }
        if(!empty($request->file('banner_image2'))) {
            $banner_image2 = $request->file('banner_image2')->getClientOriginalName();
            $request->file('banner_image2')->storeAs('storage/images', $banner_image2);
        }else{
            $banner_image2="";
        }
        if(!empty($request->file('donation_image'))) {
            $donation_image = $request->file('donation_image')->getClientOriginalName();
            $request->file('donation_image')->storeAs('storage/images', $donation_image);
        }else{
            $donation_image="";
        }
        if(!empty($request->file('donation_image'))) {
            $donation_image = $request->file('donation_image')->getClientOriginalName();
            $request->file('donation_image')->storeAs('storage/images', $donation_image);
        }else{
            $donation_image="";
        }

        $body = [
            "name"=>$request->name,
            "slug"=> $slug,
            "date"=>$request->date,
            "time"=> $request->time,
            "address"=> $request->address,
            "city"=> $request->city,
            "state"=> $request->state,
            "country"=> $request->country,
            "zip_code"=> $request->zip_code,
            "goal_total_amount"=> $request->goal_total_amount,
            "main_heading"=> $request->main_heading,
            "sub_heading"=> $request->sub_heading,
            "background_image"=> $background_image,
            "banner_image"=> $banner_image,
            "banner_image2"=> $banner_image2,
            "donation_image"=> $donation_image,
            "donation_text"=> $request->donation_text,
           
        ];
        $event = Event::create($body);
        if(count($request->sponsoredBy)>0) {
            foreach($request->sponsoredBy as $sponsored_by_image){
                $image_name = $sponsored_by_image['image']->getClientOriginalName();
                $sponsored_by_image['image']->storeAs('storage/images', $image_name);
                 $imageBody = [
                    "event_id"=>$event->id,
                    "image_name"=> $image_name,
                 ];
                SponsoredByEventImage::create($imageBody);
            }
        }
        return redirect()->route('superadmin.fundraising.liveEvent');
    }
    
    /**
     * Use update event 
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam date date required
     * @bodyParam time string required
     * @bodyParam address string required
     * @bodyParam city string required
     * @bodyParam state string required
     * @bodyParam country string required
     * @bodyParam zip_code integer required
     * @bodyParam goal_total_amount integer required
     * @bodyParam main_heading string required
     * @bodyParam sub_heading string required
     * @bodyParam background_image file required
     * @bodyParam banner_image file required
     * @bodyParam banner_image2 file required
     * @bodyParam donation_image file required
     * @bodyParam sponsored_by_images file required
     * @bodyParam donation_text string required
     **/

    public function updateEvent(Request $request)
    {
        $slug = Str::slug($request->name, '-');
        if(!empty($request->file('background_image'))) {
            $background_image = $request->file('background_image')->getClientOriginalName();
            $request->file('background_image')->storeAs('storage/images', $background_image);
        }else{
            $background_image="";
        }
        if(!empty($request->file('banner_image'))) {
            $banner_image = $request->file('banner_image')->getClientOriginalName();
            $request->file('banner_image')->storeAs('storage/images', $banner_image);
        }else{
            $banner_image="";
        }
        if(!empty($request->file('banner_image2'))) {
            $banner_image2 = $request->file('banner_image2')->getClientOriginalName();
            $request->file('banner_image2')->storeAs('storage/images', $banner_image2);
        }else{
            $banner_image2="";
        }
        if(!empty($request->file('donation_image'))) {
            $donation_image = $request->file('donation_image')->getClientOriginalName();
            $request->file('donation_image')->storeAs('storage/images', $donation_image);
        }else{
            $donation_image="";
        }
        if(!empty($request->file('donation_image'))) {
            $donation_image = $request->file('donation_image')->getClientOriginalName();
            $request->file('donation_image')->storeAs('storage/images', $donation_image);
        }else{
            $donation_image="";
        }
        $event = Event::where('id',$request->id)->first();
        $body = [
            "name"=>$request->has('name')?$request->name:$event->name,
            "slug"=> $request->has('name')?$slug:$event->slug,
            "date"=>$request->has('date')?$request->date:$event->date,
            "time"=> $request->has('time')?$request->time:$event->time,
            "address"=>$request->has('address')?$request->address:$event->address,
            "city"=> $request->has('city')?$request->city:$event->city,
            "state"=>$request->has('state')?$request->state:$event->state,
            "country"=> $request->has('country')?$request->name:$event->country,
            "zip_code"=>$request->has('zip_code')?$request->zip_code:$event->zip_code,
            "goal_total_amount"=>$request->has('goal_total_amount')?$request->goal_total_amount:$event->goal_total_amount,
            "main_heading"=>$request->has('main_heading')?$request->main_heading:$event->main_heading,
            "background_image"=>$background_image?$background_image:$event->background_image,
            "banner_image"=>$banner_image?$banner_image:$event->banner_image,
            "banner_image2"=>$banner_image2?$banner_image2:$event->banner_image2,
            "donation_image"=>$donation_image?$donation_image:$event->donation_image,
            "donation_text"=> $request->has('donation_text')?$request->donation_text:$event->donation_text,
           
        ];
       Event::where('id',$request->id)->update($body);
        if($request->has('sponsoredBy') && count($request->sponsoredBy)>0) {
            SponsoredByEventImage::where('event_id',$request->id)->delete();
            foreach($request->sponsoredBy as $sponsored_by_image){
                $image_name = $sponsored_by_image['image']->getClientOriginalName();
                $sponsored_by_image['image']->storeAs('storage/images', $image_name);
                 $imageBody = [
                    "event_id"=>$event->id,
                    "image_name"=> $image_name,
                 ];
                SponsoredByEventImage::create($imageBody);
            }
        }
        return redirect()->route('superadmin.fundraising.liveEvent');
    }
    

    /**
     * Returns delete Event
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id integer required
     * @bodyParam name string required
     **/
    public function deleteEvent(Request $request)
    {
        $event = Event::where('id',$request->id)->first();
        if($event){
           
            return response()->json([
                'success' => true,
                'response' => $event,
                'message' =>  'Event updated successfully.'
            ], 200);
        }
        else{
            return response()->json([
                'error' => true,
                'response' => $event,
                'message' =>  'Event Not Found.'
            ], 404); 
        }
       
    }

    /**
     * Returns get all data of Event website
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam slug string required
     **/
    public function goToWebsite($slug,Request $request)
    {
          $event =  Event::where('slug',$slug)->first();
          $sponsorships = Sponsorship::where('status',1)->where('event_id',$event->id)->where('type',1)->with('sponsorshipBenefits','sponsorshipLogos')->get();
          $casinoGames = Sponsorship::where('status',1)->where('event_id',$event->id)->where('type',2)->with('sponsorshipBenefits','sponsorshipLogos')->get();
          // dd($casinoGames);
          $totalOrderAmount = FundraisingOrder::where('event_id',$event->id)->sum('totalAmount');
          $totalOrderAmount = round($totalOrderAmount);
          $Donation = Donation::where('event_id',$event->id)->sum('amount');    
          $totalOrderAmount = $totalOrderAmount+$Donation;
          $ticket =  Ticket::where('event_id',$event->id)->first();
          $sponsoredByImages=  SponsoredByEventImage::where('event_id',$event->id)->get();
          $totalSoldOut =0;
          if($ticket){
            $totalSoldOut = FundraisingOrderItem::where('order_type','Tickets')->where('event_id',$event->id)->where('ticket_id',$ticket->id)->sum('quantity');
          }
         
       return view('website.pages.home.index',compact('casinoGames','sponsorships','totalOrderAmount','ticket','totalSoldOut','event','sponsoredByImages'));
    }

     /**
     * Returns cart detail
     * @group Cart
     * @header Content-Type application/json
    **/
    public function cart($slug,Request $request){
        $event =  Event::where('slug',$slug)->first();
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
        $sponsoredByImages=  SponsoredByEventImage::where('event_id',$event->id)->get();
        return view('website.pages.cart.index', compact('cartCount','cartData','user','totalPrice','ticket','pendingTickets','event','sponsoredByImages'));
    }
}
