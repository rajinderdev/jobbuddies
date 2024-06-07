<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Kid;
use App\Models\User;
use App\Models\Interviewer;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Config;
use Hash;

class InterviewerController extends Controller
{
    /**
     * Returns get Interviewer List
     * @group Interviewers
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $data = Interviewer::orderBy('id', 'DESC');
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->has('disease') && ($request->disease)) {
                    if($request->disease == "All"){ 
                    }
                    else{
                        $query->where('disease', $request->get('disease'));
                    }
                    
                }
                if ($request->has('gender') && ($request->gender)) {
                    $query->where('gender', $request->get('gender'));
                }
                if ($request->has('search') && !empty($request->get('search')['value'])) {
                    $regex = $request->get('search')['value'];
                    return $query->where('name', 'like',$regex . '%')->orWhere('department', 'like',$regex . '%')->orWhere('designation', 'like',$regex . '%');
                }
                return $query;
            })
            ->filterColumn('name', function($query, $keyword) {
                $sql = "name like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('department', function($query, $keyword) {
                $sql = "department like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('designation', function($query, $keyword) {
                $sql = "designation like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->editColumn('joining_date', function ($data) {
                if($data->joining_date){
                    return \Carbon\Carbon::parse($data->joining_date)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('action', function ($data) {
                $btn = '<div class="d-flex">
                        <button type="button" class="btn btn-sm btn-light border" onclick="editInterviewer('.$data->id.')">
                        <i class="fa fa-solid fa-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-light border" onclick="showInterviewer('.$data->id.')">
                        <i class="fa fa-solid fa-eye"></i>
                        </button>
                        <button class="btn btn-sm btn-light border ml-2" data-bs-toggle="modal" data-bs-target="#deleteInterviewerData" onclick="deleteInterviewer('.$data->id.')"><i class="fa fa-trash"></i></button>
                        </div>';
                        
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
        }
        $diseases = Config::get('constants.disease_type');
        $pageTitle = "Interviewers";
        return view('superadmin.interviewers.index',compact('diseases','pageTitle'));
    }
/**
     * Use store Interviewer data
     * @group Interviewers
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam disease integer required
     * @bodyParam joining_date date required
     * @bodyParam Interviewer_id string required
     * @bodyParam assign_class string required
     * @bodyParam gender string required
     * @bodyParam dob date required
     * @bodyParam phone integer required
     * @bodyParam qualification string required
     * @bodyParam designation string required
     * @bodyParam department string required
     * @bodyParam experience string required
     * @bodyParam address string required
     * @bodyParam city string required
     * @bodyParam country string required
     * @bodyParam state string required
     * @bodyParam zipcode integer required
     * @bodyParam image string required
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
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),
            'image' => $filename ? $filename : ''
        ]);

        $body = [
            "user_id"=>$user->id,
            "name"=>$request->name ? $request->name : NULL,
            "Interviewer_id"=>$request->Interviewer_id ? $request->Interviewer_id : NULL,
            "dob"=>$request->dob ? $request->dob : NULL,
            "phone"=>$request->phone ? $request->phone : NULL,
            "gender"=>$request->gender ? $request->gender : NULL,
            "address"=>$request->address ? $request->address :NULL,
            "city"=>$request->city ? $request->city : NULL,
            "country"=>$request->country ? $request->country : NULL,
            "state"=>$request->state ? $request->state : NULL,
            "zipcode"=>$request->zipcode ? $request->zipcode : NULL,
            "status"=>1,
            "disease"=>$request->disease ? $request->disease : NULL,
            "qualification"=>$request->qualification ? $request->qualification :NULL,
            "designation"=>$request->designation ? $request->designation : NULL,
            "experience"=>$request->experience ? $request->experience : NULL,
            "department"=>$request->department ? $request->department :NULL,
            "joining_date"=>$request->joining_date ? $request->joining_date : NULL,
            "assign_class"=>$request->assign_class ? $request->assign_class :NULL,
            "image"=>$filename ? $filename : NULL

        ];
        $interviewerData = Interviewer::create($body);
        return response()->json([
            'success' => true,
            'response' => $interviewerData,
            'message' =>  'Interviewer added successfully.'
        ], 200);
    }
  /**
     * Use get Interviewer data
     * @group Interviewer
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function show($id)
    {
        $interviewerData = Interviewer::where('id', $id)->with('user')->first();
         $joining_date =\Carbon\Carbon::parse($interviewerData->joining_date)->format('M d, Y');
        return response()->json(["data"=>$interviewerData,"joining_date"=>$joining_date,"success"=>"true"]);
    }
     /**
     * Use get Interviewer data for update
     * @group Interviewers
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id integer required
     **/
    public function edit($id)
    {
        $interviewerData = Interviewer::where('id', $id)->with('user')->first();
        return response()->json([
            'success' => true,
            'response' => $interviewerData,
            'message' =>  'Interviewer details.'
        ], 200);
    }
    /**
     * Use Update Interviewer data
     * @group Interviewer
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam disease integer required
     * @bodyParam joining_date date required
     * @bodyParam interviewer_id string required
     * @bodyParam assign_class string required
     * @bodyParam gender string required
     * @bodyParam dob date required
     * @bodyParam phone integer required
     * @bodyParam qualification string required
     * @bodyParam designation string required
     * @bodyParam department string required
     * @bodyParam experience string required
     * @bodyParam address string required
     * @bodyParam city string required
     * @bodyParam country string required
     * @bodyParam state string required
     * @bodyParam zipcode integer required
     **/
    public function update(Request $request)
    {
        if(!empty($request->file('image'))) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('storage/images', $filename);
        }else{
            $filename="";
        }
        $interviewer = Interviewer::where('id', $request->id)->first();
        $interviewerData = Interviewer::where('id', $request->id)
        ->update([
            "interviewer_id"=>$request->interviewer_id ? $request->interviewer_id :$interviewer->interviewer_id,
            "disease"=>$request->disease ? $request->disease :$interviewer->disease,
            "assign_class"=>$request->assign_class ? $request->assign_class :$interviewer->assign_class,
            "name"=>$request->name ? $request->name :$interviewer->name,
            "gender"=>$request->gender ? $request->gender :$interviewer->gender,
            "dob"=>$request->dob ? $request->dob :$interviewer->dob,
            "phone"=>$request->phone ? $request->phone :$interviewer->phone,
            "joining_date"=>$request->joining_date ? $request->joining_date :$interviewer->joining_date,
            "qualification"=>$request->qualification ? $request->qualification :$interviewer->qualification,
            "department"=>$request->department ? $request->department :$interviewer->department,
            "designation"=>$request->designation ? $request->designation :$interviewer->designation,
            "experience"=>$request->experience ? $request->experience :$interviewer->experience,
            "address"=>$request->address ? $request->address :$interviewer->address,
            "city"=>$request->city ? $request->city :$interviewer->city,
            "zipcode"=>$request->zipcode ? $request->zipcode :$interviewer->zipcode,
            "country"=>$request->country ? $request->country :$interviewer->country,
            "image"=>$filename ? $filename :$interviewer->image,
        ]);
        $user = User::where('id', $request->user_id)
        ->update(['email'=>$request->email,'image'=>$filename ? $filename :$interviewer->image,'name'=>$request->name ? $request->name :$interviewer->name]);
        return response()->json([
            'success' => true,
            'response' => $interviewerData,
            'message' =>  'interviewer updated successfully.'
        ], 200);
    }
    /**
     * Returns delete interviewer
     * @group interviewers
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id string required
     **/
    public function deleteinterviewer(Request $request)
    {
      
       $interviewer =  Interviewer::where('id', $request->id)->first();
        if($interviewer){
             User::whereId($interviewer->user_id)->delete();
              $interviewer =  Interviewer::where('id', $request->id)->delete();
        }
        
        return response()->json([
            'success' => true,
            'response' => $interviewer,
            'message' =>  'interviewer deleted successfully.'
        ], 200);
    }

}
