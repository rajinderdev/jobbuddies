<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KidsAssessment;
use App\Models\Kid;
use App\Models\Task;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Config;
use Barryvdh\DomPDF\Facade\Pdf;
use View;
use App\Models\KidsAssesmentsTrial;
class AssessmentController extends Controller
{
    /**
     * Returns get kids assessments List
     * @group Assessments
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function index(Request $request)
    {   $teachers = Interviewer::select('id','name')->orderBy('id','DESC')->get();
        $firstHelfYearly = ["01","02","03","04","05","06"];
        $secondHelfYearly = ["07","08","09",'10','11','12'];
        $currentMonth = today()->format('m');
        $year =  today()->format('Y');
        $periodSesion = "";
        if(in_array($currentMonth,$firstHelfYearly)){
            $months =  $firstHelfYearly;
            $sesionWithMonthYear = "Jan, ".$year." - Jun, ".$year;
        }elseif(in_array($currentMonth,$secondHelfYearly)){
            $months =  $secondHelfYearly;
            $sesionWithMonthYear = "July, ".$year." - Dec, ".$year;
        }
        else{
            $months = [];
            $sesionWithMonthYear = "";
        }
        if ($request->ajax()) {
            
            if($request->has('period') && $request->period!=null){
                $session = explode('-', $request->period, 2);
                $year = $session[0];
                $periodSesion = $session[1];
                if($periodSesion=="1"){
                    $sesionWithMonthYear = "Jan, ".$year." - Jun, ".$year;
                }
                else{
                    $sesionWithMonthYear = "July, ".$year." - Dec, ".$year;
                }
                $data = Candidates::has('tasks', '>' , 0)->with('kidsAssessments','tasks');
                if(Auth::user()->role == User::INTERVIEWER){
                    $data = $data->where('assigned_teacher',Auth::user()->id);
                }
                $data = $data->whereHas('tasks',function($query) use($year,$periodSesion,$firstHelfYearly,$secondHelfYearly){
                    if($periodSesion=="1"){
                        $query->whereRaw('MONTH(tasks.created_at) in ('.implode(',',$firstHelfYearly).')')
                        ->whereYear('tasks.created_at',$year);
                    }
                    else{
                        $query->whereRaw('MONTH(tasks.created_at) in ('.implode(',',$secondHelfYearly).')')
                        ->whereYear('tasks.created_at',$year);
                    }
                   
                })
                ->orderBy('name', 'ASC');
            }
            else{
                $data = Candidates::has('tasks', '>' , 0);
                if(Auth::user()->role == User::INTERVIEWER){
                    $data = $data->where('assigned_teacher',Auth::user()->id);
                }
                $data = $data->with('kidsAssessments','tasks')
                ->whereHas('tasks',function($query) use($year,$months){
                    $query->whereRaw('MONTH(tasks.created_at) in ('.implode(',',$months).')')
                    ->whereYear('tasks.created_at',$year);
                   })->orderBy('name', 'ASC');
            }
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->has('search') && !empty($request->get('search')['value'])) {
                    $regex = $request->get('search')['value'];
                    return $query->where('name', 'like',$regex . '%');
                }
                if ($request->has('user_id') && $request->get('user_id') !="All") {
                  
                    return $query->where('user_id', $request->user_id);
                }
                return $query;
            })
            ->editColumn('name', function ($data) {
                if($data->name){
                    return $data->name;
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('period', function ($data) use($sesionWithMonthYear) {
                return $sesionWithMonthYear;
            })
            ->addColumn('action', function ($data) use($periodSesion,$year){
                $btn = '<div class="d-flex">
                        <a href="'. route('superadmin.assessments.show',["id"=>$data->id,"periodSesion"=>$periodSesion,"year"=>$year]).'" role="button"class="btn btn-sm btn-light border">
                        <i class="fa fa-solid fa-eye"></i>
                        </a>
                        <a href="'. route('superadmin.assessments.edit',$data->id).'" role="button" class="btn btn-sm btn-light border"><i class="fa fa-solid fa-edit"></i> </a>
                        <a href="'. route('superadmin.assessments.generateAssessmentPDF',$data->id).'" role="button" class="btn btn-sm btn-light border"><i class="fa fa-download"></i> </a>
                        </div>';
                        
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
        }
        $currentYear = today()->format('Y');
         $secondHelfYearlyExist = false;
        if(in_array($currentMonth,$firstHelfYearly)){
            $period = 1;
        }elseif(in_array($currentMonth,$secondHelfYearly)){
            $period = 2;
            $secondHelfYearlyExist = true;
        }
        else{
            $period = 0;
        }
       $pageTitle = "Assessments";
        return view('superadmin.assessments.index',compact('teachers','pageTitle','currentYear','period','secondHelfYearlyExist'));
    }
    /**
    * Use store Kids Assessment data
    * @group Assessments
    * @header Content-Type application/json
    * @header Authorization Bearer {token}
    * @bodyParam candidate_id string required
    * @bodyParam task_id integer required
    * @bodyParam assessments integer required
    * @bodyParam remarks string
    **/
     public function store(Request $request)
    {
        $assessmentsArr = $request->all();
        foreach($assessmentsArr['assessments'] as $assessment){
          $kidsAssessment = KidsAssessment::where('candidate_id',$assessment['candidate_id'])->where('task_id',$assessment['task_id'])->first();
          if(!$kidsAssessment){
            $body=[
                "candidate_id"=>$assessment['candidate_id'],
                "task_id"=>$assessment['task_id'],
                "user_id"=>Auth::user()->id,
                "assessments"=>($assessment['sub-ass'])>0?$assessment['sub-ass'][0]:NULL,
                "remarks"=>($assessment['remarks'])>0?$assessment['remarks'][0]:NULL
            ];
           $kidsAssessment = null;
            if($assessment['kidAssessment_id']){
                // $kidsAssessment = KidsAssessment::where('id',$assessment['kidAssessment_id'])->update($body);
            }
            else{
                $kidsAssessment = KidsAssessment::create($body);
            }
          }
            
          if($kidsAssessment){
             $kidAssessmentId = ($assessment['kidAssessment_id'])?$assessment['kidAssessment_id']:$kidsAssessment->id;
          foreach($assessment['sub-ass'] as $key=>$subAss){
            $assessment_marks=0;
            if($subAss=="IND"){
                $assessment_marks=100;
            }
            elseif($subAss=="GP"){
                $assessment_marks=80;
            }
            elseif($subAss=="VP"){
                $assessment_marks=60;
            }
            elseif($subAss=="PP"){
                $assessment_marks=40;
            }
            elseif($subAss=="FP"){
                $assessment_marks=20;
            }
            $kidsAssesmentsTrialBody= [
                "candidate_id"=>$assessment['candidate_id'],
                "assessments"=>$subAss,
                "remarks"=>$assessment['remarks'][$key],
                'kids_assessments_id'=>$kidAssessmentId,
                'assessment_marks'=>$assessment_marks
            ];

            $kidsAssesmentsTrialexist = KidsAssesmentsTrial::where('candidate_id',$assessment['candidate_id'])->where('kids_assessments_id',$kidAssessmentId)->where('assessments',$subAss)->count();
            if($kidsAssesmentsTrialexist>=3){
                $kidsAssesmentsTrialexist = KidsAssesmentsTrial::where('candidate_id',$assessment['candidate_id'])->where('kids_assessments_id',$kidAssessmentId)->where('assessments',$subAss)->orderBy('id','DESC')->first();
                KidsAssesmentsTrial::where('id',$kidsAssesmentsTrialexist->id)->update($kidsAssesmentsTrialBody);
            }
            else{
                
                    $kidsAssesmentsTrialexist1 = KidsAssesmentsTrial::where('id',$assessment['kidAssessment_trail_id'][$key])->first();
                if($kidsAssesmentsTrialexist1){
                   KidsAssesmentsTrial::where('id',$assessment['kidAssessment_trail_id'][$key])->update($kidsAssesmentsTrialBody); 
                }
                else{
                    $kidsAssesmentsTrial = KidsAssesmentsTrial::create($kidsAssesmentsTrialBody);
                }
                
            }

        }
          }
         
            

        }
       
        return response()->json([
            'success' => true,
            'response' => "kidsAssessment",
            'message' =>  'Task added successfully.'
        ], 200);
        
    }
     /**
     * Use get Kids Assessment data
     * @group Assessments
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     * response:{
     *  task:{
     *       "id" => 1
     *       "name" => "Mark"
     *       "assigned_teacher" => array:11 [▼
     *          "id" => 3
     *          "name" => "Teacher John Doe"
     *          "role" => 2
     *          "email" => "teacher@yopmail.com"
     *          "linked_teacher" => null
     *          "phone" => 1234567890
     *          "image" => "dummy-profile.png"
     *          "type" => "user"
     *          "email_verified_at" => null
     *          "created_at" => "2023-03-28T11:20:23.000000Z"
     *          "updated_at" => "2023-04-10T07:11:24.000000Z"
     *      ]
     *      "tasks" => array:1 [▼
     *          0 => array:7 [▼
     *              "id" => 3
     *              "skill_id" => 12
     *              "task_name" => "sa"
     *              "user_id" => 3
     *              "created_at" => "2023-06-02T10:01:00.000000Z"
     *              "updated_at" => "2023-06-02T10:01:00.000000Z"
     *              "pivot" => array:2 [▼
     *                  "candidate_id" => 1
     *                  "task_id" => 3
     *              ]
     *          ]
     *      ]
     *  }
     * }
     **/
    public function show($id, Request $request)
    {
        $assessments = Config::get('constants.assessments');
        $firstHelfYearly = ["01","02","03","04","05","06"];
        $secondHelfYearly = ["07","08","09","10","11","12"];
      if($request->has('periodSesion') && $request->has('year')){
        $year= $request->year;
        if($request->periodSesion == "1"){
            $period = "Jan, ".$year." - Jun, ".$year;
            $months = $firstHelfYearly;  
        }
        else{
            $period = "July, ".$year." - Dec, ".$year;
            $months = $secondHelfYearly;  
        }
      }
      else{
        $year=today()->format('y');
        $currentMonth = today()->format('m');
        if(in_array($currentMonth,$firstHelfYearly)){
            $period = "Jan, ".$year." - Jun, ".$year;
            $months = $firstHelfYearly;  
        }elseif(in_array($currentMonth,$secondHelfYearly)){
            $period = "July, ".$year." - Dec, ".$year;
            $months = $secondHelfYearly;
        }
        else{
            $period = "N/A";
            $months =[];
        }
      }
       
        if ($request->ajax()) {
            // $data = Task::whereRaw('MONTH(tasks.created_at) in ('.implode(',',$months).')')
            // 
            $data = Task::orderBy('id', 'DESC')->with('kidsAssessments');
            // ->whereYear('tasks.created_at',$year);
            // if(Auth::user()->role == User::INTERVIEWER){
            //     $data = $data->where('user_id',Auth::user()->id);
            // }
            
            $data = $data->whereHas('kids', function ($data) use($id) {
                $data->where('candidate_id', $id);
            });
            $data = $data->has('kidsAssessments');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('skill_name', function ($data) {
                if($data->skill){
                    return $data->skill->skill_name;
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('task_name', function ($data) {
                if($data->task_name){
                    return $data->task_name;
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('remarks', function ($data) use($id) {
                if(count($data->kidsAssessments)>0){
                    $remarks = $data->kidsAssessments->where('task_id',$data->id)->where('candidate_id',$id)->first();
                    if($remarks){
                        return $remarks->remarks;
                    }
                    return '_';
                }else{
                    return '_';
                }
            })
            ->editColumn('assessments', function ($data) use($assessments,$id) {
                if(count($data->kidsAssessments)>0){
                    $kidAssessments = $data->kidsAssessments->where('task_id',$data->id)->where('candidate_id',$id)->first();
                    if($kidAssessments){
                        return $assessments[$kidAssessments->assessments];
                    }
                    return 'N/A';
                }else{
                    return 'N/A';
                }
            })
             ->addColumn('assessments_trial', function ($data) use($assessments,$id) {
                if(count($data->kidsAssessments)>0){
                    $kidsAssessments = $data->kidsAssessments->where('task_id',$data->id)->where('candidate_id',$id)->first();
                    
                    if($kidsAssessments){
                        $kidAssessmentstrialCount = KidsAssesmentsTrial::where('candidate_id',$id)->where('kids_assessments_id',$kidsAssessments->id)->count();
                        return $kidAssessmentstrialCount;
                    }
                   
                }
                return 0;
            })
            ->addColumn('score', function ($data) use($assessments,$id) {
                if(count($data->kidsAssessments)>0){
                    $kidAssessments =  $data->kidsAssessments->where('task_id',$data->id)->where('candidate_id',$id)->first();
                    if($kidAssessments){
                        $kidsAssesmentsTrialSum = KidsAssesmentsTrial::where('candidate_id',$id)->where('kids_assessments_id',$kidAssessments->id)->sum('assessment_marks');
                      
                        if($kidsAssesmentsTrialSum>0){

                            $score = (int)$kidsAssesmentsTrialSum/3;
                            return round($score).'%';
                        }
                        return 0;
                    }
                    return 'N/A';
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('action', function ($data) use($assessments,$id){
                $kidsAssessments = $data->kidsAssessments->where('task_id',$data->id)->where('candidate_id',$id)->first();
                if($kidsAssessments){
                    return '<button type="button" class="btn btn-sm btn-light border" onclick="showremarks('.$data->id.','.$kidsAssessments->id.')">
                    <i class="fa fa-solid fa-eye"></i>
                    </button>';
                }
                else{
                    return '<button type="button" class="btn btn-sm btn-light border" onclick="showremarks('.$data->id.',0)">
                    <i class="fa fa-solid fa-eye"></i>
                    </button>';
                }
              
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $kid= Candidates::select('id','name','assigned_teacher','summary','guardian_name')->where('id', $id)->with('tasks','assignedTeacher')->first();
        if(Auth::user()->role == User::SUPER_ADMIN){
            $tasks = $kid->tasks->toArray();
        }
        else{
            $tasks = $kid->tasks->where('tasks.user_id',Auth::user()->id)
            ->toArray();
        }
        $totalTasks = array_filter($tasks, function ($var) use ($months,$year) {
            return ((in_array((date('m', strtotime($var['created_at']))),$months)) && (date('Y', strtotime($var['created_at']))==$year));
        });
        $pageTitle = "Assessment Detail";
        return view('superadmin.assessments.show',compact('pageTitle','kid','period','totalTasks'));
    }
/**
     * Use get Kids Assessment data for edit
     * @group Assessments
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     * response:{
     *  task:{
     *       "id" => 1
     *       "name" => "Mark"
     *       "assigned_teacher" => array:11 [▼
     *          "id" => 3
     *          "name" => "Teacher John Doe"
     *          "role" => 2
     *          "email" => "teacher@yopmail.com"
     *          "linked_teacher" => null
     *          "phone" => 1234567890
     *          "image" => "dummy-profile.png"
     *          "type" => "user"
     *          "email_verified_at" => null
     *          "created_at" => "2023-03-28T11:20:23.000000Z"
     *          "updated_at" => "2023-04-10T07:11:24.000000Z"
     *      ]
     *      "tasks" => array:1 [▼
     *          0 => array:7 [▼
     *              "id" => 3
     *              "skill_id" => 12
     *              "task_name" => "sa"
     *              "user_id" => 3
     *              "created_at" => "2023-06-02T10:01:00.000000Z"
     *              "updated_at" => "2023-06-02T10:01:00.000000Z"
     *              "pivot" => array:2 [▼
     *                  "candidate_id" => 1
     *                  "task_id" => 3
     *              ]
     *          ]
     *      ]
     *  }
     * }
     **/
    public function edit($id, Request $request)
    {
        $assessments = Config::get('constants.assessments');
        $firstHelfYearly = ["01","02","03","04","05","06"];
        $secondHelfYearly = ["07","08","09","10","11","12"];
        $currentMonth = today()->format('m');
        if(in_array($currentMonth,$firstHelfYearly)){
            $period = "Jan, 2023 - Jun, 2023";
            $months = $firstHelfYearly;
        }elseif(in_array($currentMonth,$secondHelfYearly)){
            $period = "July, 2023 - Dec, 2023";
            $months = $secondHelfYearly;
        }
        else{
            $period = "N/A";
            $months =[];
        }
        if ($request->ajax()) {
            $data = Task::whereRaw('MONTH(tasks.created_at) in ('.implode(',',$months).')');
            if(Auth::user()->role == User::INTERVIEWER){
                $data = $data->where('user_id',Auth::user()->id);
            }
            $data = $data->whereHas('kids', function ($q) use($id) {
                $q->where('candidate_id', $id);
            })
            ->with('kidsAssessments')->orderBy('id', 'DESC');
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('skill_name', function ($data) {
                if($data->skill){
                    return $data->skill->skill_name;
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('task_name', function ($data) {
                if($data->task_name){
                    return $data->task_name;
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('remarks', function ($data) use($id) {
                if(count($data->kidsAssessments)>0){
                    $remarks = $data->kidsAssessments->where('task_id',$data->id)->where('candidate_id',$id)->first();
                    if($remarks){
                        return $remarks->remarks;
                    }
                    return '_';
                }else{
                    return '_';
                }
            })
            ->editColumn('assessments', function ($data) use($assessments,$id) {
                if(count($data->kidsAssessments)>0){
                    $kidAssessments = $data->kidsAssessments->where('task_id',$data->id)->where('candidate_id',$id)->first();
                    if($kidAssessments){
                        return $assessments[$kidAssessments->assessments];
                    }
                    return 'N/A';
                }else{
                    return 'N/A';
                }
            })
            ->rawColumns([])
            ->make(true);
        }
        $kid= Candidates::select('id','name','assigned_teacher','summary','guardian_name')->where('id', $id)->with('tasks','assignedTeacher')->first();
        if(Auth::user()->role == User::SUPER_ADMIN){
            $tasks = $kid->tasks->toArray();
        }
        else{
            $tasks = $kid->tasks->where('tasks.user_id',Auth::user()->id)->toArray();
        }
        $totalTasks = array_filter($tasks, function ($var) use ($months) {
            return (in_array((date('m', strtotime($var['created_at']))),$months));
        });
        $pageTitle = "Assessment Edit";
        return view('superadmin.assessments.edit',compact('pageTitle','kid','period','totalTasks'));
    }


    /**
     * Use update Kids summary
     * @group Assessments
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id integer required
     * @bodyParam summary string required
     **/
    public function update(Request $request){
        Candidates::where('id',$request->id)->update(['summary'=>$request->summary]);
        return redirect()->route('superadmin.assessments.index');
    }


    /**
     * Use download Kids Assessments pdf
     * @group Assessments
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function generateAssessmentPDF($kidId){
        $assessments = Config::get('constants.assessments');
        $firstHelfYearly = ["01","02","03","04","05","06"];
        $secondHelfYearly = ["07","08","09","10","11","12"];
        $currentMonth = today()->format('m');
        if(in_array($currentMonth,$firstHelfYearly)){
            $period = "Jan, 2023 - Jun, 2023";
            $months = $firstHelfYearly;
        }elseif(in_array($currentMonth,$secondHelfYearly)){
            $period = "July, 2023 - Dec, 2023";
            $months = $secondHelfYearly;
        }
        else{
            $period = "";
            $months =[];
        }
        $data = Task::whereRaw('MONTH(tasks.created_at) in ('.implode(',',$months).')'); 
        if(Auth::user()->role==User::INTERVIEWER){
            $data = $data->where('user_id',Auth::user()->id);
        }
        $data = $data->whereHas('kids', function ($q) use($kidId) {
            $q->where('candidate_id', $kidId);
        })
        ->with('kidsAssessments','skill')->orderBy('id', 'DESC')->get();
        $kid= Candidates::select('id','name','dob','assigned_teacher','summary','guardian_name')->where('id', $kidId)->with('tasks','assignedTeacher')->first();
        $logo = asset('assets/image/logo.svg');
        $pdf = PDF::loadView('superadmin.assessments.assessmentPdf', compact('data','kid','period'));
        $pdf_name = $kid['name'].'Assessments.pdf';
        return $pdf->download($pdf_name);
    }

    public function getKidsAssesmentsTrials(Request $request)
    {
        $kidsAssesmentsTrials = KidsAssesmentsTrial::where('candidate_id',$request->kidid)->where('kids_assessments_id',$request->kidAssessmentId)->get();
        
        if($kidsAssesmentsTrials){
            return response()->json([
                'success' => true,
                'kidsAssesmentsTrials' => $kidsAssesmentsTrials,
            ], 200);
        }
        else{
            return response()->json([
                'success' => false,
                'kidsAssesmentsTrials' => $kidsAssesmentsTrials,
            ], 500);
        }
         
        
    }
}