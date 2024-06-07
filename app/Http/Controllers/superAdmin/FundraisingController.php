<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FundraisingOrderItem;
use App\Models\FundraisingOrder;
use App\Models\Sponsorship;
use App\Models\SponsorshipBenefit;
use App\Models\Ticket;
use App\Models\Donation;
use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
use DataTables;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportSoldTicket;
class FundraisingController extends Controller
{
    /**
     * Returns get fundraising List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function index($slug=null, Request $request)
    {
        // $currrentTime = now()->format('H:i');
        // dd($currrentTime);
        $event = null;
        $totalSponsorships=0;
        $totalTickets=0;
        $totalOrderAm=0;
        $totalDonations=0;
        $totalAcheve=0;
        if($slug){
            $event = Event::where('slug',$slug)->first();
            if($event){
            $totalSponsorships=FundraisingOrderItem::where('order_type','Sponsorship')->where('event_id',$event->id)->sum('quantity');
            $totalTickets=FundraisingOrderItem::where('order_type','Tickets')->where('sold_as',"Tickets")->where('event_id',$event->id)->sum('quantity');
            $totalOrderAm=FundraisingOrder::where('event_id',$event->id)->sum('totalAmount');
            $totalDonations=Donation::where('type',0)->where('event_id',$event->id)->sum('amount');
            $totalAcheve=$totalDonations+$totalOrderAm;
            }
             $pageTitle = "Fundraising";
        return view('superadmin.fundraising.index',compact('event','totalAcheve','pageTitle','totalSponsorships','totalTickets','totalDonations'));
        }
        else{
             return response()->view('errors.404', [], 404);
        }
        
       
       
    }
   
    /**
     * Returns Sold Out Tickets List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getSoldOutTickets($id=null, Request $request)
    {
        $event = Event::where('id',$id)->first();
        if ($request->ajax()) {
            $data = FundraisingOrderItem::select(['fundraising_order_items.*', 'tickets.name as ticket_name','tickets.image','users.name','users.email','users.phone'])
            ->join('tickets', 'tickets.id','=','fundraising_order_items.ticket_id')
            ->where('fundraising_order_items.order_type','Tickets')
            ->where('fundraising_order_items.event_id',$id)
            ->join('users', 'users.id', '=', 'fundraising_order_items.user_id')
            ->orderBy('fundraising_order_items.id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->get('search')['value'])) {
                    $regex = $request->get('search')['value'];
                    $query->where('users.name','like','%'.$regex.'%');
                }
                return $query;
            })
            ->editColumn('email', function ($data) {
                if($data->user){
                return $data->user->email;
                }
                else{
                return "N/A";
                }
            })
            ->editColumn('price', function ($data) {
                if($data->price && $data->sold_as=="Tickets"){
                    return '$'.$data->price*$data->quantity;
                    
                }else{
                    return 'Free';
                }
            })
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('ticket_name', function ($data) {
                if($data->ticket_name){
                    return '<div class="d-flex align-items-center">
                        <div class="ticket-pic">
                            <img src="'.asset("storage/app/storage/images/".$data->image).'" class="img-fluid" />
                        </div>
                        <span class="text-wrap">'.$data->ticket_name.'</span>
                        </div>';
                    
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('action', function ($data) {
               return '<a href="https://superschool.org/casinonight/admin-download-ticket-pdf/'.$data->id.'" class="btn btn-danger btn-del" ta><i class="fa fa-download text-large"></a>';
            })
            ->rawColumns(['ticket_name','action'])
            ->make(true);
        }
        $pageTitle = "All Sold Out Tickets ";
        return view('superadmin.fundraising.soldOutTickets',compact('pageTitle','event'));
    }
    /**
     * Returns Sold Out Sponsorships List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getSoldOutSponsorships($id=null, Request $request)
    {
        $event = Event::where('id',$id)->first();
        if ($request->ajax()) {
            $data = FundraisingOrderItem::select(['fundraising_order_items.*', 'sponsorships.name as sponsorship_name','sponsorships.image','users.name','users.email','users.phone'])
            ->join('sponsorships', 'sponsorships.id','=','fundraising_order_items.sponsorship_id')
            ->where('fundraising_order_items.order_type','Sponsorship')
            ->where('fundraising_order_items.event_id',$id)
            ->where('sponsorships.type',1)
            ->join('users', 'users.id', '=', 'fundraising_order_items.user_id')
            ->orderBy('fundraising_order_items.id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->get('search')['value'])) {
                    $regex = $request->get('search')['value'];
                    $query->where('users.name','like','%'.$regex.'%');
                }
                return $query;
            })
            ->editColumn('email', function ($data) {
                if($data->user){
                return $data->user->email;
                }
                else{
                return "N/A";
                }
            })
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('price', function ($data) {
                if($data->price){
                    return '$'.$data->price;
                    
                }else{
                    return 'N/A';
                }
            })
           
            ->editColumn('sponsorship_name', function ($data) {
                if($data->sponsorship_name){
                    return '<div class="d-flex align-items-center">
                        <div class="ticket-pic">
                            <img src="'.asset("storage/app/storage/images/".$data->image).'" class="img-fluid" />
                        </div>
                        <span class="text-wrap">'.$data->sponsorship_name.'</span>
                        </div>';
                    
                }else{
                    return 'N/A';
                }
            })
            ->rawColumns(['sponsorship_name'])
            ->make(true);
        }
        $pageTitle = "All Sold Out Sponsorship";
        return view('superadmin.fundraising.soldOutSponsorships',compact('pageTitle','event'));
    }
    /**
     * Returns Total Donations List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getTotalDonations($id=null, Request $request)
    {
        $event = Event::where('id',$id)->first();
        if ($request->ajax()) {
            $data = Donation::where('type',"0")->where('event_id',$id)->orderBy('id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
           
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('amount', function ($data) {
                if($data->amount){
                    return '$'.$data->amount;
                    
                }else{
                    return 'N/A';
                }
            })
             ->editColumn('dedicatees_name', function ($data) {
                if($data->donation_status=="Public"){
                    return "Anonymous";
                    
                }else{
                    return $data->dedicatees_name;
                }
            })
            ->rawColumns([])
            ->make(true);
        }
        
        $pageTitle = "All Donators";
        return view('superadmin.fundraising.totalDonations',compact('pageTitle','event'));
    }

    public function ticketScanner($id=null, Request $request)
    {
        $event = Event::where('id',$id)->first();
        if ($request->ajax()) {
            $data = FundraisingOrderItem::select(['fundraising_order_items.*', 'tickets.name as ticket_name','tickets.image','users.name as username','users.email'])
            ->join('tickets', 'tickets.id','=','fundraising_order_items.ticket_id')
            ->join('users', 'users.id','=','fundraising_order_items.user_id')
            ->where('fundraising_order_items.order_type','Tickets')
            ->where('fundraising_order_items.event_id',$id)
            // ->join('users', 'users.id', '=', 'fundraising_order_items.user_id')
            ->orderBy('fundraising_order_items.id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->has('ticket_verified') && ($request->ticket_verified)) {
                    if($request->ticket_verified!="All"){
                        $query->where('ticket_verified', $request->get('ticket_verified'));
                    }
                    
                }
                if ($request->has('search') && !empty($request->get('search')['value'])) {
                    $regex = $request->get('search')['value'];
                    return $query->where('ticket_code', 'like',$regex . '%')->orWhere('ticket_verified', 'like',$regex . '%');
                }
                return $query;
            })
            ->filterColumn('tickets', function($query, $keyword) {
                $sql = "ticket_name like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
           
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('ticket_verified', function ($data) {
                if($data->ticket_verified=="Un-Verified"){
                    return '<span class="badge badge-danger" style="font-size: 16px;">Un-Verified</span>';
                }
                else if($data->ticket_verified=="Verified"){
                    return '<span class="badge badge-success h4 mb-0" style="font-size: 16px;">Verified</span>';
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('action', function ($data) {
               return '<a href="https://superschool.org/casinonight/admin-download-ticket-pdf/'.$data->id.'" class="btn btn-danger btn-del" ta><i class="fa fa-download text-large"></a>';
            })
            ->rawColumns(['ticket_verified','action'])
            ->make(true);
        }
        $pageTitle = "Ticket Scanner";
        return view('superadmin.fundraising.ticketScanner',compact('pageTitle','event'));
    }
 
    public function getSoldTicketDetail($code,$type)
    {
        $ticket = null;
        if($type=="ticket_code"){
            $ticket = FundraisingOrderItem::where('ticket_code',$code)->with('ticket','user')->first();
        }
        if($type=="bar_code"){
            $ticket = FundraisingOrderItem::where('bar_code',$code)->with('ticket','user')->first();
        }
       if($ticket){
        return response()->json(["data"=>$ticket,"success"=>"true"]);
       }
       else{
        return response()->json(["data"=>null,"success"=>"false"]);
       }
        
    }
    public function changeVerifiedTicketStatus(Request $request)
    {
        $ticket = FundraisingOrderItem::where('id',$request->fundraising_order_items_id)->update(['ticket_verified'=>$request->ticket_verified]);
        return response()->json(["data"=>$ticket,"success"=>"true"]);
    }

     /**
     * Returns Sold Out Casino game List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getSoldOutCasinogames($id=null,Request $request)
    {
        $event = Event::where('id',$id)->first();
        if ($request->ajax()) {
            $data = FundraisingOrderItem::select(['fundraising_order_items.*', 'sponsorships.name as sponsorship_name','sponsorships.image','users.name','users.email','users.phone'])
            ->join('sponsorships', 'sponsorships.id','=','fundraising_order_items.sponsorship_id')
            ->where('fundraising_order_items.order_type','Casino Games')
            ->where('fundraising_order_items.event_id',$id)
            ->where('sponsorships.type',2)
            ->join('users', 'users.id', '=', 'fundraising_order_items.user_id')
            ->orderBy('fundraising_order_items.id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->get('search')['value'])) {
                    $regex = $request->get('search')['value'];
                    $query->where('users.name','like','%'.$regex.'%');
                }
                return $query;
            })
            ->editColumn('email', function ($data) {
                if($data->user){
                return $data->user->email;
                }
                else{
                return "N/A";
                }
            })
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('price', function ($data) {
                if($data->price){
                    return '$'.$data->price;
                    
                }else{
                    return 'N/A';
                }
            })
           
            ->editColumn('sponsorship_name', function ($data) {
                if($data->sponsorship_name){
                    return '<div class="d-flex align-items-center">
                        <div class="ticket-pic overimage">
                            <img src="'.asset("storage/app/storage/images/".$data->image).'" class="img-fluid" />
                        </div>
                        <span class="text-wrap">'.$data->sponsorship_name.'</span>
                        </div>';
                    
                }else{
                    return 'N/A';
                }
            })
            ->rawColumns(['sponsorship_name'])
            ->make(true);
        }
        $pageTitle = "All Sold Out Sponsorship";
        return view('superadmin.fundraising.soldOutSponsorships',compact('pageTitle','event'));
    }
    public function downloadTicketPdf($id){
        $fundraisingOrderTicket = FundraisingOrderItem::where('id',$id)->with('ticket')->first();
		$fundraisingOrder = FundraisingOrder::where('id',$fundraisingOrderTicket->fundraising_order_id)->first();
        $transection_id = $fundraisingOrder->transection_id;
        $pdf = PDF::loadView('superadmin.fundraising.downloadTicket', compact('fundraisingOrderTicket','transection_id'));
        $pdf_name = 'downloadTicket.pdf';
        return $pdf->download($pdf_name);
    }
      public function exportSoldTickets($id=null, Request $request){
         
        return Excel::download(new ExportSoldTicket($id), 'exportSoldTicket.xlsx');
    }

    
    /**
     * Returns Total Donations List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getWebsiteDonation(Request $request)
    {
        if ($request->ajax()) {
            $data = Donation::where('type',1)->orderBy('id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
           
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('amount', function ($data) {
                if($data->amount){
                    return '$'.$data->amount;
                    
                }else{
                    return 'N/A';
                }
            })
               ->editColumn('dedicatees_name', function ($data) {
                if($data->donation_status=="Public" && $data->transection_from !="CSV File"){
                    return "Anonymous";
                    
                }else{
                    return $data->dedicatees_name;
                }
            })
             ->addColumn('action', function ($data) {
                  return '<a href="'.route('downloadinvoicePdf',$data->id).'" class="btn btn-danger btn-del" ta><i class="fa fa-download text-large"></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        
        $pageTitle = "All Donators";
        
        $totalDonation=Donation::where('type',1)->sum('amount');
       $totalDonations = round($totalDonation);
        return view('superadmin.fundraising.websiteDonation',compact('pageTitle','totalDonations'));
    }
     public function downloadinvoicePdf($id){
        $donation = Donation::where('id',$id)->first();
        $pdf = PDF::loadView('superadmin.fundraising.downloadInvoice',compact('donation'));
        $pdf_name = 'downloadInvoice.pdf';
        return $pdf->download($pdf_name);
    }
   

   
}
