<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Candidates;
use App\Models\Interviewer;
use App\Models\KidSecondParent;
use DataTables;
use Config;
use Auth;
use DB;
class CandidatesController extends Controller
{
     /**
     * Returns get Candidates List
     * @group Candidates
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function index(Request $request)
    {
       
        $role = \Auth::user()->role;
         if($role==User::SUPER_ADMIN){
                $diseases = Candidates::where('disease','!=',"")->pluck('disease','id');
        }else{
             $diseases = Candidates::where('assigned_teacher',\Auth::user()->id)->where('disease','!=',"")->pluck('disease','id');
        } 
        $teachers = Interviewer::where('status',1)->get();
        $teacher_name = \Auth::user()->name;
        
        if ($request->ajax()) {
            /* $role==5 use for school admin */
            if($role==User::SUPER_ADMIN){
                $data = Candidates::select('id','name','gender','guardian_phone_number','joining_date','assigned_teacher','disease','status','form_status','added_by',DB::raw('SUBSTRING_INDEX(name, " ", -1) as last_name'));
            }else{
                $data = Candidates::select('id','name','gender','guardian_phone_number','joining_date','assigned_teacher','disease','status','form_status','added_by',DB::raw('SUBSTRING_INDEX(name, " ", -1) as last_name'))->where('assigned_teacher',\Auth::user()->id); 
            }    
            return Datatables::of($data)
            ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    if ($request->has('disease') && ($request->disease) && $request->disease !="All") {
                        $query->where('disease', $request->get('disease'));
                    }
                    if ($request->has('gender') && ($request->gender)) {
                        $query->where('gender', $request->get('gender'));
                    }
                    if ($request->has('search') && !empty($request->get('search')['value'])) {
                        $regex = $request->get('search')['value'];
                        return $query->where('name', 'like',$regex . '%');
                    }
                    return $query;
                })
                ->filterColumn('name', function($query, $keyword) {
                    $sql = "name like ?";
                    $query->whereRaw($sql, ["%{$keyword}%"]);
                })
                // ->editColumn('disease', function ($data) {
                //     if($data->disease){
                //         $disease = Config::get('constants.disease_type');
                //         return $disease[$data->disease];
                //     }else{
                //         return 'N/A';
                //     }
                // })
                ->editColumn('joining_date', function ($data) {
                    if($data->joining_date){
                        return \Carbon\Carbon::parse($data->joining_date)->format('M d, Y');
                    }else{
                        return 'N/A';
                    }
                })
                // ->editColumn('name', function ($data) {
                //    if(!empty($data->name)) {
                //         $splitName = explode(' ',$data->name, 2); // Restricts it to only 2 values, for names like Billy Bob Jones
                //         if(count($splitName)==2){
                //         $first_name = $splitName[0];
                      
                //         return $first_name;
                //         }
                //         else{
                //            return $data->name;  
                //         }
                        
                //     } else {
                //         return 'N/A';
                //     }
                // })
                ->addColumn('guardian_phone_number', function ($data) {
                    if(!empty($data->guardian_phone_number)) {
                        return $data->guardian_phone_number;
                    } else {
                        return 'N/A';
                    }
                })
                ->addColumn('guardian_phone_number', function ($data) {
                    if(!empty($data->guardian_phone_number)) {
                        return $data->guardian_phone_number;
                    } else {
                        return 'N/A';
                    }
                })
               
                ->addColumn('assigned_teacher', function ($data) {
                    if(!empty($data->assigned_teacher)) {
                        $assigned_teacher =  Interviewer::where('id',$data->assigned_teacher)->first();
                        return ($assigned_teacher)?$assigned_teacher->name:"N/A";
                    } else {
                        return 'N/A';
                    }
                })
                ->addColumn('added_by', function ($data) {
                   
                    if(!empty($data->added_by)) {
                        $addedBy = User::where('id',$data->added_by)->first();
                        if($addedBy&& $addedBy->role){
                            if($addedBy->role == 1){
                                return 'Admin';
                            }
                            elseif($addedBy->role == 2){
                                return 'Teacher';
                            }
                            elseif($addedBy->role == 5){
                                return 'School Admin';
                            }
                            else{
                                return 'N/A';
                            }
                           
                        }
                        else{
                           return 'N/A'; 
                        }
                        
                    } else {
                        return 'N/A';
                    }
                })
                // ->addColumn('status', function ($data) {
                //     if($data->form_status == 1) {
                //         return '<span class="fw-bold text-success">Completed</span>';
                //     } else{
                //         return '<span class="fw-bold text-warning">Partially Filled</span>';
                //     } 
                // })
                ->addColumn('action', function ($data) {
                    $imageIcon = asset('assets/admin/images');
                    $btn = '<div class="d-flex">
                        <button class="btn btn-sm btn-light border" onclick="viewKid('.$data->id.')"><img src="'.$imageIcon.'/eye.png"></button>
                        <button class="btn btn-sm btn-light border ml-2" onclick="editKid('.$data->id.')"><img src="'.$imageIcon.'/pencil.png"></button>
                        <button class="btn btn-sm btn-light border ml-2" data-bs-toggle="modal" data-bs-target="#deleteKidsData" onclick="deleteKids('.$data->id.')"><i class="fa fa-trash"></i></button>';
                        if($data->status==1){
                            
                            // $btn .= '<button class="btn btn-sm ml-2 border btn-danger" onclick="changeKidStatus('.$data->id.', 0)" data-bs-toggle="modal" data-bs-target="#delModal">Deactive</button>';
                            $btn .= '<div class="ml-1 mt-1 custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input kidStatus"  checked>
                            <label class="custom-control-label" onclick="changeKidStatus('.$data->id.', 0)"></label>
                            </div>';
                        }else{
                            // $btn .= '<button class="btn btn-sm ml-2 border  btn-success"  onclick="changeKidStatus('.$data->id.', 1)" data-bs-toggle="modal" data-bs-target="#delModal">Active</button>';
                             $btn .= '<div class="ml-1 mt-1 custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input">
                            <label class="custom-control-label" onclick="changeKidStatus('.$data->id.', 1)"></label>
                            </div>';
                        }
                      
                        $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        $pageTitle = "Our Candidates";
        return view('superadmin.candidates_new.index',compact('pageTitle','diseases', 'teacher_name','role','teachers'));
    }

    /**
     * Use store kids data
     * @group Kids
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam disease integer
     * @bodyParam joining_date date
     * @bodyParam guardian_name string
     * @bodyParam guardian_phone_number integer
     * @bodyParam age integer
     **/
    public function store(Request $request)
    {
        if(!empty($request->file('image'))) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('storage/images', $filename);
        }else{
            $filename="";
        }

        $user = User::create([
            'name' => $request->name ? $request->name : '',
            'email' => '',
            'linked_teacher' => \Auth::user()->id,
            'role' => '3',
            'password' => '0',
            'image' => $filename ? $filename : ''
        ]);

        $body = [
            "user_id"=>$user->id,
            "name"=>$request->name ? $request->name : '',
            "admission_number"=>$request->admission_number ? $request->admission_number : '',
            "dob"=>$request->dob ? $request->dob : null,
            "gender"=>$request->gender ? $request->gender : '',
            "place_of_birth"=>$request->place_of_birth ? $request->place_of_birth : '',
            "address"=>$request->address ? $request->address : '',
            "street"=>$request->street ? $request->street : '',
            "city"=>$request->city ? $request->city : '',
            "country"=>$request->country ? $request->country : '',
            "state"=>$request->state ? $request->state : '',
            "postcode"=>$request->postcode ? $request->postcode : '',
            "status"=>$request->status ? $request->status : '1',
            "disease"=>$request->disease ? $request->disease : '',
            "joining_date"=>\Carbon\Carbon::now(),
            "assigned_teacher"=>($request->has('assigned_teacher'))?$request->assigned_teacher:\Auth::user()->id,

            "guardian_name"=>$request->guardian_name ? $request->guardian_name : '',
            "guardian_relationship"=>$request->guardian_relationship ? $request->guardian_relationship : '',
            "guardian_phone_number"=>$request->guardian_phone_number ? $request->guardian_phone_number : '',
            "guardian_address"=>$request->guardian_address ? $request->guardian_address : '',
            "guardian_email"=>$request->guardian_email ? $request->guardian_email : '',

            "em_parent_name"=>$request->em_parent_name ? $request->em_parent_name : '',
            "em_relationship"=>$request->em_relationship ? $request->em_relationship : '',
            "em_phone_number"=>$request->em_phone_number ? $request->em_phone_number : '',
            "em_email"=>$request->em_email ? $request->em_email : '',
            "form_status"=>'0',
            "image"=>$filename ? $filename : '',
            "added_by"=>Auth::user()->id ? Auth::user()->id : NULL

        ];
        $kidData = Candidates::create($body);
         if($request->has('sp_name')&& $request->sp_name && $kidData){
            $spBody = [
                "candidate_id"=>$kidData->id,
                "name"=>$request->sp_name,
                "relationship"=>$request->sp_relationship,
                "phone_number"=>$request->sp_phone_number,
                "address"=>$request->sp_address,
                "email"=>$request->sp_email
            ];
            $spData = KidSecondParent::create($spBody);
          }
        return response()->json([
            'success' => true,
            'response' => $kidData,
            'message' =>  'Kid added successfully.'
        ], 200);
    }

    /**
     * Use delete kid data
     * @group Kids
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam kidId integer required
     **/
    public function delete(Request $request)
    {
        $kid = Candidates::whereId($request->id)->first();
        if($kid){
             User::whereId($kid->user_id)->delete();
              Candidates::whereId($request->id)->delete();
        }
       
        return redirect()->back()->with('success', 'Kid deleted successfully.');
    }

     /**
     * Use get kid data for update
     * @group Kids
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam kidId integer required
     **/
    public function edit(Request $request)
    {
        $data = Candidates::whereId($request->kidId)->with('kidSecondParent')->first();
        return response()->json([
            'success' => true,
            'response' => $data,
            'message' =>  'kid details.'
        ], 200);
    }

    /**
     * Use update kid data
     * @group Kids
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id integer required
     * @bodyParam name string required
     * @bodyParam disease integer
     * @bodyParam joining_date date
     * @bodyParam guardian_name string
     * @bodyParam guardian_phone_number integer
     * @bodyParam age integer
     **/
    public function update(Request $request)
    {
        // dd($request->all());
        if(!empty($request->file('image'))) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('storage/images', $filename);
        }else{
            $filename="";
        }
        $kid = Candidates::where('id', $request->kidId)->first();
        $kidData = Candidates::where('id', $request->kidId)
        ->update([
            "name"=>$request->name ? $request->name : '',
            "admission_number"=>$request->admission_number ? $request->admission_number : '',
            "dob"=>($request->dob !=null)? $request->dob : Null,
            "gender"=>$request->gender ? $request->gender : '',
            "place_of_birth"=>$request->place_of_birth ? $request->place_of_birth : '',
            "address"=>$request->address ? $request->address : '',
            "street"=>$request->street ? $request->street : '',
            "city"=>$request->city ? $request->city : '',
            "country"=>$request->country ? $request->country : '',
            "state"=>$request->state ? $request->state : '',
            "postcode"=>$request->postcode ? $request->postcode : '',
            "status"=>$request->status ? $request->status : '1',
            "disease"=>$request->disease ? $request->disease : '',
            "joining_date"=>\Carbon\Carbon::now(),
            "assigned_teacher"=>($request->has('assigned_teacher'))?$request->assigned_teacher:\Auth::user()->id,

            "guardian_name"=>$request->guardian_name ? $request->guardian_name : '',
            "guardian_relationship"=>$request->guardian_relationship ? $request->guardian_relationship : '',
            "guardian_phone_number"=>$request->guardian_phone_number ? $request->guardian_phone_number : '',
            "guardian_address"=>$request->guardian_address ? $request->guardian_address : '',
            "guardian_email"=>$request->guardian_email ? $request->guardian_email : '',

            "em_parent_name"=>$request->em_parent_name ? $request->em_parent_name : '',
            "em_relationship"=>$request->em_relationship ? $request->em_relationship : '',
            "em_phone_number"=>$request->em_phone_number ? $request->em_phone_number : '',
            "em_email"=>$request->em_email ? $request->em_email : '',
            "form_status"=>'0',
            "image"=>$filename ? $filename : $kid->image,

            "grade"=>$request->grade ? $request->grade : '',
            "education_mode"=>$request->education_mode ? $request->education_mode : '',
            "allergies"=>$request->allergies ? $request->allergies : '',
            "food_cond"=>$request->food_cond ? $request->food_cond : '',
            "food_cond_desc"=>$request->food_cond_desc ? $request->food_cond_desc : '',
            "medication"=>$request->medication ? $request->medication : '',
            "ditary_rest"=>$request->ditary_rest ? $request->ditary_rest : '',
            "kid_dis"=>$request->kid_dis ? $request->kid_dis : '',
            "kid_dis_desc"=>$request->kid_dis_desc ? $request->kid_dis_desc : '',
            "disability"=>$request->disability ? $request->disability : '',
            "disability_desc"=>$request->disability_desc ? $request->disability_desc : '',
            "behaviour"=>$request->behaviour ? $request->behaviour : '',
            "behaviour_desc"=>$request->behaviour_desc ? $request->behaviour_desc : '',
            "accomodation"=>$request->accomodation ? $request->accomodation : '',
            "accomodation_desc"=>$request->accomodation_desc ? $request->accomodation_desc : '',
        ]);
        $kid = Candidates::where('id', $request->kidId)->first();
       if($kid->grade && $kid->education_mode && $kid->allergies && $kid->food_cond && $kid->medication && $kid->ditary_rest && $kid->disability && $kid->behaviour && $kid->accomodation){
        $kidData = Candidates::where('id', $request->kidId)
        ->update(['form_status'=>1]);
       }
       if($request->has('sp_id') && $kid){
         
            $spBody = [
                "candidate_id"=>$kid->id,
                "name"=>$request->sp_name,
                "relationship"=>$request->sp_relationship,
                "phone_number"=>$request->sp_phone_number,
                "address"=>$request->sp_address,
                "email"=>$request->sp_email
            ];
            if($request->sp_id==null){
                $spData = KidSecondParent::create($spBody);
            }
            else{
                $spData = KidSecondParent::where('id',$request->sp_id)->update($spBody);  
            }
          
         }
        return response()->json([
            'success' => true,
            'response' => $kidData,
            'message' =>  'Kid updated successfully.'
        ], 200);
    }

     /**
     * Use get kid data
     * @group Kids
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam kidId integer required
     **/
    public function view(Request $request)
    {
        $kidData = Candidates::where('id', $request->id)->first();
         $dob="N/A";
        if($kidData->dob){
            $dob =\Carbon\Carbon::parse($kidData->dob)->format('M d, Y');
        }
        $joining_date =\Carbon\Carbon::parse($kidData->joining_date)->format('M d, Y');
        return response()->json(["data"=>$kidData,"dob"=>$dob,"joining_date"=>$joining_date,"success"=>"true"]);
    }
     /**
     * Use update kids status
     * @group Kids
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam kidId integer required
     * @bodyParam status integer required
     **/
    public function statusChange(Request $request)
    {
        $kidData = Candidates::where('id', $request->id)->update(['status'=>$request->status]);
        return redirect()->back()->with('success', 'Kid '.($request->status==0?'deactivate':'activate').' successfully.');
    }
     /**
     * Returns delete kid
     * @group Fundraising
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id string required
     **/
     
    public function deleteKid(Request $request)
    {
       $kid = Candidates::whereId($request->id)->first();
        if($kid){
             User::whereId($kid->user_id)->delete();
              Candidates::whereId($request->id)->delete();
        }
        
        return response()->json([
            'success' => true,
            'response' => $kid,
            'message' =>  'Kid deleted successfully.'
        ], 200);
    }
}
