<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Candidate;
use App\Models\Sponsorship;
use App\Models\SponsorshipLogo;
use Validator;
use Yajra\DataTables\DataTables;
use Mail;
class JobController extends Controller
{

    /**
     * Use get job list
     * @group Jobs
     * @header Content-Type application/json
     *{
     * "success": true,
     * "data": {
     *  "current_page": 1,
     *   "data": [
     *       {
     *           "id": 3,
     *           "title": "sa",
     *           "location": "asa",
     *           "contract": "asa",
     *           "description": "saa",
     *           "status": 1,
     *           "created_at": "2023-09-04T13:04:28.000000Z",
     *           "updated_at": "2023-09-04T13:04:28.000000Z"
     *       },
     *       {
     *          "id": 2,
     *           "title": "sds",
     *            "location": "sds",
     *           "contract": "sds",
     *           "description": "ds",
     *           "status": 1,
     *           "created_at": "2023-09-04T13:03:50.000000Z",
     *           "updated_at": "2023-09-04T13:03:50.000000Z"
     *       },
     *   ],
     *   "first_page_url": "http://127.0.0.1:8000/api/job-list?page=1",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": "http://127.0.0.1:8000/api/job-list?page=1",
     *  "links": [
     *       {
     *           "url": null,
     *          "label": "&laquo; Previous",
     *           "active": false
     *       },
     *       {
     *          "url": "http://127.0.0.1:8000/api/job-list?page=1",
     *           "label": "1",
     *           "active": true
    *        },
    *       {
    *            "url": null,
    *            "label": "Next &raquo;",
    *           "active": false
    *        }
    *   ],
    *    "next_page_url": null,
    *   "path": "http://127.0.0.1:8000/api/job-list",
    *    "per_page": 15,
    *   "prev_page_url": null,
    *   "to": 3,
    *    "total": 3
    * }
* }
     **/
    public function getJobList(Request $request)
    {
    //   $jobs = Job::orderBy('id','DESC')->paginate($request->all());

    //     return response()->json([
    //         'success' => true,
    //         'data' => $jobs,
    //     ], 200);
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
                $btn = '<button role="button" class="btn btn-sm btn-light border showJob" data-id="'.$data->id.'" data-title="'.$data->title.'" data-contract="'.$data->contract.'" data-discription="'.$data->discription.'" data-location="'.$data->location.'" onclick="showSkill('.$data->id.')">
                        <i class="fa fa-solid fa-eye"></i>
                        </button>';
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
        }
    }


    /**
     * Use create candidate
     * @group candidates
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam name string required
     * @bodyParam email string required
     * @bodyParam phone string required
     * @bodyParam position string required
     * @bodyParam job_id integer required
     * @bodyParam tell_us_about_experience string required
     **/
    public function applyJob(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'position' => 'required',
        ]);
        if ($validator->fails()) {
            $arr = array("message" => $validator->messages()->first(), "status" => 422);
            return \Response::json($arr, $arr["status"]);
        }
         $body=[
        "name"=>$request->has('name')?$request->name:NULL,
        "email"=>$request->has('email')?$request->email:NULL,
        "phone"=>$request->has('phone')?$request->phone:NULL,
        "position"=>$request->has('position')?$request->position:NULL,
        "job_id"=>$request->has('job_id')?$request->job_id:NULL,
        "tell_us_about_experience"=>$request->has('tell_us_about_experience')?$request->tell_us_about_experience:NULL,
        "resume"=>$request->has('resume')?$request->resume:NULL,
         ];
        $candidate = Candidates::create($body);
        if($candidate){
            $resume = "";
            if($request->has('resume') && $request->resume !=""){
                $resume = storage_path('app/storage/files/'.$candidate->resume);
      
            }
            $data=['candidate'=>$candidate,'resume'=>$resume];
            Mail::to(['teena@superschool.org','caitlyn@superschool.org'])
            ->send(new \App\Mail\JobApplicationReceivedAdminEmail($data));
        }
        return response()->json([
            'success' => true,
            'data' => $candidate,
            'message' =>"Candidate created successfully",
        ], 200);
    }

     /**
     * Use get job data
     * @group Jobs
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function show($id)
    {
        $data = Job::whereId($id)->first();
        return response()->json([
            'success' => true,
            'response' => $data,
            'message' =>  'Job details.'
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
            $body= [
                "image"=>$filename,
                "sponsorship_id"=>$request->id,
                "user_id"=>$request->user_id,
            ];
            $userSponsorshipLogo = SponsorshipLogo::where('sponsorship_id',$request->id)->where('user_id',$request->user_id)->first();
            if($userSponsorshipLogo){
                $sponsorshipLogo = SponsorshipLogo::where('id',$userSponsorshipLogo->id)->update($body);
            }
            else{
                $sponsorshipLogo = SponsorshipLogo::create($body);
            }
            
         return response()->json([
            'success' => true,
            'response' => $sponsorshipLogo,
            'message' =>  'sponsorship updated successfully.'
        ], 200);
        }
        else{
            return response()->json([
            'success' => false,
            'message' =>  'Please select valid image.'
        ], 422);
        }
        
       
    }
    public function uploadResume(Request $request)
    {
        if(!empty($request->file('resume'))) {
            $filename = $request->file('resume')->getClientOriginalName();
            $request->file('resume')->storeAs('storage/files', $filename);
           
         return response()->json([
            'success' => true,
            'response' => $filename,
            'message' =>  'sponsorship updated successfully.'
        ], 200);
        }
        else{
            return response()->json([
            'success' => false,
            'message' =>  'Please select valid file.'
        ], 422);
        }
        
       
    }
}
