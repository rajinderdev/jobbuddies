<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\FundraisingOrderItem;
use DataTables;
class TicketController extends Controller
{
    /**
     * Returns Tickets List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getTicketsList($id, Request $request)
    {
        
        if ($request->ajax()) {
            $data = Ticket::where('event_id',$id)->orderBy('id','DESC');
            return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function ($data) {
                if($data->created_at){
                    return \Carbon\Carbon::parse($data->created_at)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('name', function ($data) {
                if($data->name){
                    return '<div class="d-flex align-items-center">
                        <div class="ticket-pic">
                            <img src="'.asset("storage/app/storage/images/".$data->image).'" class="img-fluid" />
                        </div>
                        <span class="text-wrap">'.$data->name.'</span>
                        </div>';
                    
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
            ->addColumn('pending_quantity', function ($data){
            $soldtickets = FundraisingOrderItem::where('order_type','Tickets')->where('event_id',$data->event_id)->where('sold_as',"Tickets")->sum('quantity');
            if($data->quantity){
                return $data->quantity-$soldtickets;
                
            }else{
                return '0';
            }
            })
            ->editColumn('status', function ($data) {
                if($data->status==1){
                    return '<span class="fw-bold text-success">Active</span>';
                    
                }else{
                    return '<span class="fw-bold text-danger">Deactive</span>';
                }
            })
            ->addColumn('action', function ($data){
                $event = Event::where('id',$data->event_id)->first();
                $btn = '<div class="d-flex">';
                if($event && $event->status==1){
                $btn .= '<button type="button" class="btn btn-sm btn-light border" onclick="editTicket('.$data->id.')">
                <i class="fa fa-solid fa-edit"></i>
                </button>';
                }
                $btn .= '<button type="button" class="btn btn-sm btn-light border ml-1" onclick="showTicket('.$data->id.')">
                <i class="fa fa-solid fa-eye"></i>';
                // </button>
                // <button class="btn btn-sm btn-light border ms-1" data-bs-toggle="modal" data-bs-target="#deleteTicketData" onclick="deleteTicket('.$data->id.')"><i class="fa fa-trash"></i></button>
                // </div>';
                if($data->status==1 && $event && $event->status==1){
                    $btn .= '<button class="btn btn-sm ml-2 border btn-danger" onclick="changTicketStatus('.$data->id.', 0)" data-bs-toggle="modal" data-bs-target="#delModal">Deactive</button>';
                }
                elseif($data->status==0 && $event && $event->status==1){
                    $btn .= '<button class="btn btn-sm ml-2 border  btn-success"  onclick="changTicketStatus('.$data->id.', 1)" data-bs-toggle="modal" data-bs-target="#delModal">Active</button>';
                }
                return $btn;
            })
            ->rawColumns(['status','action','name'])
            ->make(true);
        }
       
    }
    /**
     * Returns create Ticket
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam image file required
     * @bodyParam quantity integer required
     * @bodyParam price integer required
     * @bodyParam status integer required
     **/
    public function createTicket(Request $request)
    {
        if(!empty($request->file('image'))) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('storage/images', $filename);
        }else{
            $filename="";
        }
        $body = [
            'name' => $request->name ? $request->name : '',
            'image' =>$filename,
            'quantity' => $request->quantity ? $request->quantity : Null,
            'price' => $request->price ? $request->price : Null,
            'status' => $request->status ? $request->status : 0,
            'event_id' => $request->has('event_id') ? $request->event_id :NULL,
        ];
        $ticket = Ticket::create($body);
        return response()->json([
            'success' => true,
            'response' => $ticket,
            'message' =>  'Ticket added successfully.'
        ], 200);
    }
    /**
     * Returns get Ticket detail
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id string required
     **/
    public function showTicket($id)
    {
        $ticket = Ticket::where('id',$id)->first();
        return response()->json(["data"=>$ticket,"success"=>"true"]);
    }

     /**
     * Use get ticket data for update
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function editTicket($id)
    {
        $ticket = Ticket::where('id',$id)->first();
        return response()->json([
            'success' => true,
            'response' => $ticket,
            'message' =>  'Ticket details.'
        ], 200);
    }

     /**
     * Returns update Ticket
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam image file
     * @bodyParam quantity integer required
     * @bodyParam price integer required
     * @bodyParam status integer required
     **/
    public function updateTicket(Request $request)
    {
        $ticket = Ticket::where('id',$request->id)->first();
        if($ticket){
            if(!empty($request->file('image'))) {
                $filename = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('storage/images', $filename);
            }else{
                $filename=$ticket->image;
            }
            $body = [
                'name' => $request->has('name') ? $request->name :$ticket->name,
                'image' =>$filename,
                'quantity' => $request->has('quantity') ? $request->quantity :$ticket->quantity,
                'price' => $request->has('price') ? $request->price :$ticket->price,
                'status' =>$request->has('status') ? $request->status :$ticket->status,
            ];
            $ticket = Ticket::where('id',$request->id)->update($body);
            return response()->json([
                'success' => true,
                'response' => $ticket,
                'message' =>  'Ticket updated successfully.'
            ], 200);
        }
        else{
            return response()->json([
                'error' => true,
                'response' => $ticket,
                'message' =>  'Ticket Not Found.'
            ], 404); 
        }
       
    }

    /**
     * Returns delete Ticket
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id string required
     **/
    public function deleteTicket(Request $request)
    {
        $ticket = Ticket::where('id',$request->id)->delete();
        return response()->json([
            'success' => true,
            'response' => $ticket,
            'message' =>  'Ticket deleted successfully.'
        ], 200);
    }
    /**
     * Use update Ticket status
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam ticketId integer required
     * @bodyParam status integer required
     **/
    public function changeTicketStatus(Request $request)
    {
        $Ticket = Ticket::where('id', $request->id)->update(['status'=>$request->status]);
        return redirect()->back()->with('success', 'Ticket '.($request->status==0?'deactivate':'activate').' successfully.');
    }
}
