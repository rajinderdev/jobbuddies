<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobSkill;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use DataTables;

class JobsController extends Controller
{
    /**
     * Returns get Jobs List
     * @group Jobs
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $data = Job::orderBy('id', 'DESC');
            return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('joining_date', function ($data) {
                if($data->joining_date){
                    return \Carbon\Carbon::parse($data->joining_date)->format('M d, Y');
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('action', function ($data) {      
                $btn = '<a href="'. route('superadmin.jobs.show',$data->id).'" role="button" class="btn btn-sm btn-light border">
                        <i class="fa fa-solid fa-eye"></i>
                        </a>
                        <button class="btn btn-sm btn-light border ms-1"  onclick="editJob('.$data->id.')">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-light border ms-1" data-bs-toggle="modal" data-bs-target="#deleteJobData" onclick="deleteJob('.$data->id.')"><i class="fa fa-trash"></i></button>
                       ';
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
        }
        $pageTitle = "Jobs";
        return view('superadmin.jobs.index',compact('pageTitle'));
    }
    /**
     * Use store Jobs data
     * @group Jobs
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam title string required
     * @bodyParam location string required
     * @bodyParam contract string required
     * @bodyParam description string required
     **/
    public function store(Request $request)
    {
        if(!empty($request->file('job_icon'))) {
            $filename = $request->file('job_icon')->getClientOriginalName();
            $request->file('job_icon')->storeAs('public/images', $filename);
        }else{
            $filename="";
        }
        $job = new Job();
        $job->title = $request->title ? $request->title : '';
        $job->job_icon = $filename;
        $job->location = $request->location ? $request->location : '';
        $job->contract = $request->contract ? $request->contract : '';
        $job->description = $request->description ? $request->description : '';
        $job->save();
        return response()->json([
            'success' => true,
            'response' => $job,
            'message' =>  'Job added successfully.'
        ], 200);
    }
    /**
     * Use get job data for update
     * @group Jobs
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function edit($id)
    {
        $job = Job::whereId($id)->first();
        return response()->json([
            'success' => true,
            'response' => $job,
            'message' =>  'job details.'
        ], 200);
    }
     /**
     * Use update job data
     * @group Jobs
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id integer required
     * @bodyParam title string required
     * @bodyParam location string required
     * @bodyParam contract string required
     * @bodyParam description string required
     **/
    public function update(Request $request)
    {
        $job = Job::find($request->id);
        $jobData = Job::where('id', $request->id)
        ->update([
            "title"=>$request->title ? $request->title :'',
            "location"=>$request->location ? $request->location :'',
            "contract"=>$request->contract ? $request->contract :'',
            "description"=>$request->description ? $request->description : '',
        ]);
        return response()->json([
            'success' => true,
            'response' => $jobData,
            'message' =>  'Job updated successfully.'
        ], 200);
    }
     /**
     * Returns delete Job
     * @group Jobs
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id string required
     **/
    public function deleteJob(Request $request)
    {
        $job = Job::where('id',$request->id)->delete();
        return response()->json([
            'success' => true,
            'response' => $job,
            'message' =>  'Job deleted successfully.'
        ], 200);
    }
     /**
     * Use get job data
     * @group Jobs
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     * response:{
     *  job:{
     *      'id':1,
     *      'title': abc,
     *      'location':"sas",
     *      'contract':"40K",
     *      'description':"description,
     *      'created_at':2023-06-01 10:11:10,
     *      'update_at':023-06-01 10:11:10,
     *  }
     * }
     **/
    public function show($id, Request $request)
    {
        if ($request->ajax()) {
            $data = Candidate::where('job_id',$id)->orderBy('id', 'DESC');
           
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
                $btn = '<a href="'. route('superadmin.candidates.show',$data->id).'" role="button" class="btn btn-sm btn-light border">
                        <i class="fa fa-solid fa-eye"></i>
                        </a>';
                        $btn .='<button class="btn btn-sm btn-light border ms-1" data-bs-toggle="modal" data-bs-target="#deleteCandidateData" onclick="deleteCandidate('.$data->id.')"><i class="fa fa-trash"></i></button>';
                         if($data->resume){
                        $btn .='<a href="'.asset("storage/app/storage/files/".$data->resume).'" role="button" class="btn btn-sm btn-light border ml-1" target="_blank">
                        <i class="fa fa-solid fa-paperclip"></i>
                        </a>';
                        }
                        
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $job= Job::where('id', $id)->first();
        $pageTitle = "Job Details";
        return view('superadmin.jobs.show',compact('pageTitle','job'));
    }

    /**
     * Use store Jobs skill data
     * @group Jobs
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam title string required
    
     **/
    public function jobSkillsStore(Request $request)
    {
        if(!empty($request->file('image'))) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $filename);
        }else{
            $filename="";
        }
        $jobSkill = new JobSkill();
        $jobSkill->job_id = $request->job_id ? $request->job_id : '';
        $jobSkill->skill = $request->title ? $request->title : '';
        $jobSkill->image = $filename;
       
        $jobSkill->save();
        return response()->json([
            'success' => true,
            'response' => $jobSkill,
            'message' =>  'Job Skill added successfully.'
        ], 200);
    }
    public function jobSkillsShow($id, Request $request)
    {
        if ($request->ajax()) {
            $data = JobSkill::where('job_id',$id)->orderBy('id', 'DESC');
           
            return Datatables::of($data)
            ->addIndexColumn()
           
            ->addColumn('action', function ($data) {      
                $btn = '<a href="'. route('superadmin.candidates.show',$data->id).'" role="button" class="btn btn-sm btn-light border">
                        <i class="fa fa-solid fa-eye"></i>
                        </a>';
                        $btn .='<button class="btn btn-sm btn-light border ms-1" data-bs-toggle="modal" data-bs-target="#deleteCandidateData" onclick="deleteCandidate('.$data->id.')"><i class="fa fa-trash"></i></button>';
                        
                        
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
       
    }
   
}
