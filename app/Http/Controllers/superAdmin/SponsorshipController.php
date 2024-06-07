<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sponsorship;
use App\Models\Event;
use App\Models\SponsorshipBenefit;
use DataTables;
class SponsorshipController extends Controller
{
     /**
     * Returns Sponsorships List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getSponsorshipsList($id=null,Request $request)
    {
        if ($request->ajax()) {
            $data = Sponsorship::where('event_id',$id)->where('type',1)->orderBy('id','DESC');
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
                    $btn .= '<button type="button" class="btn btn-sm btn-light border" onclick="editSponsorship('.$data->id.')">
                <i class="fa fa-solid fa-edit"></i>
                </button>';
                 }
                 $btn .= '<button type="button" class="btn btn-sm btn-light border ml-1" onclick="showSponsorship('.$data->id.')">
                <i class="fa fa-solid fa-eye"></i>
                </button>';
                 if($event && $event->status==1){
                     $btn .= '<button class="btn btn-sm btn-light border ms-1" data-bs-toggle="modal" data-bs-target="#deleteSponsorshipData" onclick="deleteSponsorship('.$data->id.')"><i class="fa fa-trash"></i></button>';
                 }
                 $btn .= '</div>';
                        
                return $btn;
            })
            ->rawColumns(['status','action','name'])
            ->make(true);
        }
    }
    /**
     * Returns create Sponsorship 
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam image file required
     * @bodyParam price integer required
     * @bodyParam status integer required
     * @bodyParam benefits array required
     **/
    public function createSponsorship (Request $request)
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
            'price' => $request->price ? $request->price : Null,
            'tickets_quantity' => $request->has('tickets_quantity') ? $request->tickets_quantity : Null,
            'status' => $request->status ? $request->status : 0,
            'type' =>$request->has('type') ? $request->type :1,
            'event_id' => $request->has('event_id') ? $request->event_id :NULL,
        ];
        $sponsorship = Sponsorship::create($body);
        if($sponsorship){
            foreach($request->benefits as $benefit){
                $benefitsBody = [
                    "benefit"=>$benefit,
                    "sponsorship_id"=>$sponsorship->id,
                ];
                $sponsorshipBenefit = SponsorshipBenefit::create($benefitsBody);
            }
        }
        return response()->json([
            'success' => true,
            'response' => $sponsorship,
            'message' =>  'sponsorship added successfully.'
        ], 200);
    }
     /**
     * Returns get sponsorship detail
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id string required
     **/
    public function showSponsorship($id)
    {
        $sponsorship = Sponsorship::where('id',$id)->with('sponsorshipBenefits')->first();
        return response()->json(["data"=>$sponsorship,"success"=>"true"]);
    }
     /**
     * Use get sponsorship data for update
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function editSponsorship($id)
    {
        $sponsorship = Sponsorship::where('id',$id)->with('sponsorshipBenefits')->first();
        return response()->json([
            'success' => true,
            'response' => $sponsorship,
            'message' => 'Sponsorship details.'
        ], 200);
    }
      /**
     * Returns update sponsorship
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam image file
     * @bodyParam price integer required
     * @bodyParam status integer required
     * @bodyParam benefits array required
     **/
    public function updateSponsorship(Request $request)
    {
        $sponsorship = Sponsorship::where('id',$request->id)->first();
        if($sponsorship){
            if(!empty($request->file('image'))) {
                $filename = $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('storage/images', $filename);
            }else{
                $filename=$sponsorship->image;
            }
            $body = [
                'name' => $request->has('name') ? $request->name :$sponsorship->name,
                'image' =>$filename,
                'price' => $request->has('price') ? $request->price :$sponsorship->price,
                'tickets_quantity'=>$request->has('tickets_quantity') ? $request->tickets_quantity :$sponsorship->tickets_quantity,
                'status' =>$request->has('status') ? $request->status :$sponsorship->status,
            ];
            sponsorship::where('id',$request->id)->update($body);
            SponsorshipBenefit::where('sponsorship_id',$request->id)->delete();
            foreach($request->benefits as $benefit){
                $benefitsBody = [
                    "benefit"=>$benefit,
                    "sponsorship_id"=>$sponsorship->id,
                ];
                $sponsorshipBenefit = SponsorshipBenefit::create($benefitsBody);
            }

            return response()->json([
                'success' => true,
                'response' => $sponsorship,
                'message' =>  'Sponsorship updated successfully.'
            ], 200);
        }
        else{
            return response()->json([
                'error' => true,
                'response' => $sponsorship,
                'message' =>  'Sponsorship Not Found.'
            ], 404); 
        }
       
    }
    /**
     * Returns delete Sponsorship
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id string required
     **/
    public function deleteSponsorship(Request $request)
    {

        $Sponsorship = Sponsorship::where('id',$request->id)->first();
        $Sponsorship1 = Sponsorship::where('id',$request->id)->delete();
        return response()->json([
            'success' => true,
            'response' => $Sponsorship1,
            'type' => $Sponsorship->type,
            'message' =>  'Sponsorship deleted successfully.'
        ], 200);
    }
    /**
     * Returns create Sponsorship 
     * @group Fundraising
     * @header Content-Type application/json
     * @bodyParam image file required
     
     **/
    public function uploadlogo(Request $request)
    {
        if(!empty($request->file('image'))) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('storage/images', $filename);
        Sponsorship::where('id',$request->id)->update(['image'=>$filename]);
        }
        
        return response()->json([
            'success' => true,
            'response' => $sponsorship,
            'message' =>  'sponsorship updated successfully.'
        ], 200);
    }


     /**
     * Returns Casinogames List
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function getCasinogamesList($id=null, Request $request)
    {
        if ($request->ajax()) {
            $data = Sponsorship::where('type',2)->where('event_id',$id)->orderBy('id','DESC');
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
                        <div class="ticket-pic overimage">
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
                $btn .= '<button type="button" class="btn btn-sm btn-light border" onclick="editSponsorship('.$data->id.')">
                <i class="fa fa-solid fa-edit"></i>
                </button>';
                }
                
                $btn .= '<button type="button" class="btn btn-sm btn-light border" onclick="showSponsorship('.$data->id.')">
                <i class="fa fa-solid fa-eye"></i>
                </button>';
                if($event && $event->status==1){
                $btn .= '<button class="btn btn-sm btn-light border ms-1" data-bs-toggle="modal" data-bs-target="#deleteSponsorshipData" onclick="deleteSponsorship('.$data->id.')"><i class="fa fa-trash"></i></button>';
                }
                $btn .= '</div>';
                        
                return $btn;
            })
            ->rawColumns(['status','action','name'])
            ->make(true);
        }
    }
}
