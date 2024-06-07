<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Candidates;
use App\Models\Task;
use App\Models\User;
use App\Models\KidsAssessment;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Config;
use App\Models\KidsAssesmentsTrial;
class TaskController extends Controller
{
    /**
     * Returns get Tasks List
     * @group Tasks
     * @header Content-Type application/json
     * @header Authorization Bearer {token}

     **/
    public function index(Request $request)
    { 
        $role = Auth::user()->role;
        if ($request->ajax()) {
            if($role==User::SUPER_ADMIN){
                $data = Task::with('skill','kids')->orderBy('id', 'DESC');
            }
            else{
                $data = Task::with('skill','kids')->where('user_id',Auth::user()->id)->orderBy('id', 'DESC');  
            }
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->has('skill_id') && ($request->skill_id)) {
                    if($request->skill_id=="All"){

                    }
                    else{
                    $query->where('skill_id', $request->get('skill_id'));
                    }
                }
                if ($request->has('search') && !empty($request->get('search')['value'])) {
                    $regex = $request->get('search')['value'];
                    return $query->where('task_name', 'like',$regex . '%');
                }
                return $query;
            })
            ->addColumn('skill_name', function ($data) {
                if($data->skill){
                    return $data->skill->skill_name;
                }else{
                    return 'N/A';
                }
            })
            ->addColumn('total_students', function ($data)use($role) {
                if($data->kids && $role==User::SUPER_ADMIN){
                    return $data->kids->count();
                } if($data->kids && $role==User::INTERVIEWER){
                    return $data->kids->where('assigned_teacher',Auth::user()->id)->count();
                }
                else{
                    return '0';
                }
            })
            ->addColumn('action', function ($data) {
                $btn = '<div class="d-flex">
                        <button type="button" class="btn btn-sm btn-light border" onclick="editTask('.$data->id.')">
                        <i class="fa fa-solid fa-edit"></i>
                        </button>
                        <a href="'. route('superadmin.tasks.show',$data->id).'" role="button"class="btn btn-sm btn-light border ml-2">
                        <i class="fa fa-solid fa-eye"></i>
                        </a>
                         <button class="btn btn-sm btn-light border ml-2" data-bs-toggle="modal" data-bs-target="#deleteTaskData" onclick="deleteTask('.$data->id.')"><i class="fa fa-trash"></i></button>
                          <button type="button" class="btn btn-sm btn-light border ml-2" onclick="getChartData('.$data->id.')">
                        <i class="fa fa-chart-bar" aria-hidden="true"></i>
                        </button>
                         </div>';
                        
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
        }
        $skills = Skill::orderBy('id','DESC')->get();
        if($role==User::SUPER_ADMIN){
            $kids = Candidates::select('id','name')->orderBy('id','DESC')->get();
        }
        else{
            $kids = Candidates::select('id','name')->where('assigned_teacher',Auth::user()->id)->orderBy('id','DESC')->get();  
        }
        $pageTitle = "Goals";
        return view('superadmin.tasks.index',compact('pageTitle','skills','kids','role'));
    }

    /**
     * Use store Tasks data
     * @group Tasks
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam task_name string required
     * @bodyParam skillI_id integer required
     * @bodyParam kids array required
     **/
    public function store(Request $request)
    {
        $kids=[];
        $auth = Auth::user();
        $task = new Task();
        $task->task_name = $request->task_name ? $request->task_name : '';
        $task->skill_id = $request->skill_id ? $request->skill_id : '';
        $task->user_id = $auth ? $auth->id : '';
        $task->save();
        if(in_array('all',$request->kids)){
            $kids= Candidates::pluck('id')->toArray();
        }else{
            $kids=$request->kids;  
        }
        $task->kids()->attach($kids);
        return response()->json([
            'success' => true,
            'response' => $task,
            'message' =>  'Task added successfully.'
        ], 200);
    }

     /**
     * Use get task data for update
     * @group Tasks
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function edit($id)
    {
        $task = Task::whereId($id)->with('skill','kids')->first();
        $kids = $task->kids->pluck('id')->toArray();
        return response()->json([
            'success' => true,
            'response' => ["task"=>$task,"kids"=>$kids],
            'message' =>  'task details.'
        ], 200);
    }
     /**
     * Use get task data for chart
     * @group Tasks
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function getChartData($id)
    {
        $task = Task::whereId($id)->with('skill','kids')->first();
        $kidIds = $task->kids->pluck('id')->toArray();
        if(Auth::user()->role==User::SUPER_ADMIN){
            $data = Candidates::whereIn('id',$kidIds)->orderBy('name', 'ASC')->with('kidsAssessments')->get();
        }
        else{
            $data = Candidates::whereIn('id',$kidIds)->with('kidsAssessments')->where('assigned_teacher',Auth::user()->id)->orderBy('name', 'ASC')->get();
        }

        $chartDataScore = [];
        $chartDataName = [];
        foreach($data as $kid){
            if(count($kid->kidsAssessments)>0){
                $kidAssessments = $kid->kidsAssessments->where('task_id',$id)->where('candidate_id',$kid->id)->first();
                if($kidAssessments){
                    $kidsAssesmentsTrialSum = KidsAssesmentsTrial::where('candidate_id',$kid->id)->where('kids_assessments_id',$kidAssessments->id)->sum('assessment_marks');
                    if($kidsAssesmentsTrialSum>0){
                        $score = (int)$kidsAssesmentsTrialSum/3;
                        $finalScore = round($score);
                        $chartDataScore[]= $finalScore;
                       
                    }
                    else{
                        $chartDataScore[]= 0;
                       
                    }
                     $chartDataName[]= $kid->name;
                  
                } 
            }
        }
        return response()->json([
            'success' => true,
            'response' => ["chartDataName"=>$chartDataName,"chartDataScore"=>$chartDataScore],
            'message' =>  'task details.'
        ], 200);
    }

    /**
     * Use update task data
     * @group Tasks
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id integer required
     * @bodyParam task_name string required
     * @bodyParam skill_id integer required
     * @bodyParam kids array required
     **/
    public function update(Request $request)
    {
        $kids = [];
        $task = Task::find($request->id);
        $taskData = Task::where('id', $request->id)
        ->update([
            "task_name"=>$request->task_name ? $request->task_name :'',
            "skill_id"=>$request->skill_id ? $request->skill_id :'',
        ]);
        if(in_array('all',$request->kids)){
            $kids= Candidates::pluck('id')->toArray();
        }else{
            $kids=$request->kids;  
        }
        $task->kids()->sync($kids);
        return response()->json([
            'success' => true,
            'response' => $taskData,
            'message' =>  'task updated successfully.'
        ], 200);
    }
    /**
     * Use get task data
     * @group Tasks
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     * response:{
     *  task:{
     *      'id':1,
     *      'task_name': abc,
     *      'skill_id':2,
     *      'user_id':1,
     *      'created_at':2023-06-01 10:11:10,
     *      'update_at':023-06-01 10:11:10,
     *      'skill':null
     *      'kids':[],
     *      'user':null
     *  }
     * }
     **/
    public function show($id, Request $request)
    {
        $assessments = Config::get('constants.assessments');
        if ($request->ajax()) {
            $taskDetail = Task::where('id',$id)->with('kids')->first();
            $kidIds = $taskDetail->kids->pluck('id')->toArray();
            // dd($kidIds);
            if(Auth::user()->role==User::SUPER_ADMIN){
                $data = Candidates::whereIn('id',$kidIds)->orderBy('name', 'ASC')->with('kidsAssessments');
            //      $data = $data->whereHas('kidsAssessments', function ($data) use($id) {
            //     $data->where('task_id', $id);
            // });
            }
            else{
                $data = Candidates::whereIn('id',$kidIds)->with('kidsAssessments')->where('assigned_teacher',Auth::user()->id)->orderBy('name', 'ASC');
                // $data = $data->whereHas('kidsAssessments', function ($data) use($id) {
                //     $data->where('task_id', $id);
                // });
            }
            return Datatables::of($data)
            ->addIndexColumn()
            ->filterColumn('name', function($query, $keyword) {
                $sql = "name like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('name', function ($data) {
                if($data->name){
                    return $data->name;
                }else{
                    return 'N/A';
                }
            })
            ->editColumn('remarks', function ($data) use($id) {
                if(count($data->kidsAssessments)>0){
                    $remarks = $data->kidsAssessments->where('task_id',$id)->where('candidate_id',$data->id)->first();
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
                    $kidsAssessments = $data->kidsAssessments->where('task_id',$id)->where('candidate_id',$data->id)->first();
                    if($kidsAssessments){
                        return $assessments[$kidsAssessments->assessments];
                    }
                    return '_';
                }else{
                    return '_';
                }
            })
           ->addColumn('assessments_trial', function ($data) use($assessments,$id) {
                if(count($data->kidsAssessments)>0){
                    $kidsAssessments = $data->kidsAssessments->where('task_id',$id)->where('candidate_id',$data->id)->first();
                    if($kidsAssessments){
                        $kidAssessmentstrialCount = KidsAssesmentsTrial::where('candidate_id',$data->id)->where('kids_assessments_id',$kidsAssessments->id)->count();
                        return $kidAssessmentstrialCount;
                    }
                   
                }
                return 0;
            })
            ->addColumn('score', function ($data) use($assessments,$id) {
                if(count($data->kidsAssessments)>0){
                    $kidAssessments = $data->kidsAssessments->where('task_id',$id)->where('candidate_id',$data->id)->first();
                    if($kidAssessments){
                        $kidsAssesmentsTrialSum = KidsAssesmentsTrial::where('candidate_id',$data->id)->where('kids_assessments_id',$kidAssessments->id)->sum('assessment_marks');
                      
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
                $kidsAssessments = $data->kidsAssessments->where('task_id',$id)->where('candidate_id',$data->id)->first();
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
            ->addColumn('checkbox',function ($data) use($assessments,$id) {
                if(count($data->kidsAssessments)>0){
                    $kidsAssessments = $data->kidsAssessments->where('task_id',$id)->where('candidate_id',$data->id)->first();
                    if($kidsAssessments){
                        return '<input type="checkbox" name="kids[]" class="kids_checkbox checkbox groupCheckbox" value="'.$data->id.'"  data-name="'.$data->name.'" data-kid-assessmentId="'.$kidsAssessments->id.'" data-kid-remarks="'.$kidsAssessments->remarks.'" data-kid-assessments="'.$kidsAssessments->assessments.'"/>';
                    }
                    
                }
                return '<input type="checkbox" name="kids[]" class="kids_checkbox checkbox groupCheckbox" value="'.$data->id.'"  data-name="'.$data->name.'" data-kid-assessmentId="" data-kid-remarks="" data-assessments="" />';
            })
            ->rawColumns(['checkbox','action'])
            ->make(true);
        }
        $task= Task::where('id', $id)->with('skill','kids','user')->first();
        $pageTitle = "Goal Detail";
        $taskDetail = Task::where('id',$id)->with('kids')->first();
        $kidIds = $taskDetail->kids->pluck('id')->toArray();
        if(Auth::user()->role==User::SUPER_ADMIN){
            $data = Candidates::whereIn('id',$kidIds)->orderBy('name', 'ASC')->with('kidsAssessments')->get();
        }
        else{
            $data = Candidates::whereIn('id',$kidIds)->with('kidsAssessments')->where('assigned_teacher',Auth::user()->id)->orderBy('name', 'ASC')->get();
        }

        $chartDataScore = [];
        $chartDataName = [];
        foreach($data as $kid){
            if(count($kid->kidsAssessments)>0){
                $kidAssessments = $kid->kidsAssessments->where('task_id',$id)->where('candidate_id',$kid->id)->first();
                if($kidAssessments){
                    $kidsAssesmentsTrialSum = KidsAssesmentsTrial::where('candidate_id',$kid->id)->where('kids_assessments_id',$kidAssessments->id)->sum('assessment_marks');
                    if($kidsAssesmentsTrialSum>0){
                        $score = (int)$kidsAssesmentsTrialSum/3;
                        $finalScore = round($score);
                        $chartDataScore[]= $finalScore;
                       
                    }
                    else{
                        $chartDataScore[]= 0;
                       
                    }
                     $chartDataName[]= $kid->name;
                  
                } 
            }
        }
        return view('superadmin.tasks.show',compact('pageTitle','task','assessments','chartDataScore','chartDataName'));
    }
    // $chartData = [];
    // foreach($data)
    /**
     * Returns delete Task
     * @group Tasks
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id string required
     **/
    public function delete(Request $request)
    {
      
       $task =  Task::where('id', $request->id)->delete();
        return response()->json([
            'success' => true,
            'response' => $task,
            'message' =>  'Task deleted successfully.'
        ], 200);
    }
}
