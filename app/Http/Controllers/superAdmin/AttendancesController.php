<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kid;
use App\Models\User;
use App\Models\Attendances;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Config;
use Session;
use DB;
use DateTime;
use Barryvdh\DomPDF\Facade\Pdf;
use View;
class AttendancesController extends Controller
{
    /**
     * Returns get kids Attendances List
     * @group Attendances
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function index(Request $request)
    {   
        $role = Auth::user()->role;
        if($request->ajax()) {
            /* $role==User::SUPER_ADMIN use for school admin */
            if($role==User::SUPER_ADMIN){
                $data = Candidates::orderBy('name', 'ASC');
            }
            else{
                $data = Candidates::where('assigned_teacher',Auth::user()->id)->orderBy('name', 'ASC');
            }
            return Datatables::of($data)
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')) {
                    $regex = $request->get('name');
                    return $query->where('name', 'like',$regex . '%');
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
            ->addColumn('action', function ($data) {
                $btn = '<div class="d-flex">
                        <a href="'. route('superadmin.attendances.show',$data->id).'" role="button"class="btn btn-sm btn-light border">
                        <i class="fa fa-solid fa-eye"></i>
                        </a>
                        </div>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        if($role==User::SUPER_ADMIN){
            $kids = Candidates::select('id','name')->orderBy('name', 'ASC')->get();
            $attendances = Attendances::where('date',today())->pluck('status','candidate_id')->toArray();
        }
        else{
            $kids = Candidates::select('id','name')->where('assigned_teacher',Auth::user()->id)->orderBy('name', 'ASC')->get();
            $attendances = Attendances::where('date',today())->where('user_id',Auth::user()->id)->pluck('status','candidate_id')->toArray();
        }
        $pageTitle = "Attendances";
        return view('superadmin.attendances.index',compact('pageTitle','kids','attendances'));
    }
     /**
    * Use store Kids attendances data
    * @group Attendances
    * @header Content-Type application/json
    * @header Authorization Bearer {token}
    * @bodyParam candidate_id[] integer required
    * @bodyParam user_id[] integer required
    * @bodyParam attendance_status[] integer required
    * @bodyParam date date required
    **/
    public function store(Request $request)
    {
      $kids =  $request->kids;
      foreach($kids as $kid){
        $body=[
            "candidate_id"=>$kid['id'],
            "user_id"=>Auth::user()->id,
            "date"=>$request->date,
            "status"=>array_key_exists('attendance_status',$kid)?$kid['attendance_status']:null,
        ];
        $attendance = Attendances::where('candidate_id',$kid['id'])
        ->where('user_id',Auth::user()->id)
        ->where('date',$request->date)
        ->first();
        if($attendance){
            Attendances::where('id',$attendance->id)->update($body);
        }
        else{
            Attendances::create($body);
        }
      }
      Session::flash('successMessage', true);
      return redirect()->back();
    }
    /**
     * Use get Kids attendance data
     * @group Attendances
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam candidate_id integer required
     * response:{
     *  
     *  }
     * }
     **/
    public function show($id, Request $request)
    {
        $kid = Candidates::select('id','name')->where('id',$id)->withCount('presentAttendances','absentAttendances')->first();
        $months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $attendances = [];
        $year = ($request->has('year'))?$request->year:now()->format('Y');
        $role =  Auth::user()->role;  
        foreach($months as $key=>$month){
                $monthAtt = Attendances::select('date','status')
                ->where('candidate_id',$id);
                if($role == User::INTERVIEWER){
                    $monthAtt =$monthAtt->where('user_id',Auth::user()->id);
                }
                $monthAtt =$monthAtt->whereMonth('date',$month)
                ->whereYear('date',$year)
                ->orderBy('date','ASC')->get()->toArray();
            $dateObj   = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F'); 
            if((count($monthAtt)==0) ||(count($monthAtt)<31)){
                $totalDays = 31;
                $dates = [];
                for($i=1;$i<=$totalDays;$i++){
                    if((count($monthAtt)==0)){
                        $dayStatus=[
                            "date"=>$year.'-'.$month.'-'.$i,
                            "status"=>null,
                        ];
                        $monthAtt[$i-1]= $dayStatus;
                    }
                    if($i<=9){
                        $dates[$i-1]=$year.'-'.$month.'-0'.$i;
                    }
                    else{
                        $dates[$i-1]=$year.'-'.$month.'-'.$i;
                    }
                }
            }
            if((count($monthAtt)<31)){
                $dateExistArr = array_column($monthAtt,'date');
                $dayAttArr = [];
                foreach($dates as $dateKey=>$date){
                    if(!in_array($date,$dateExistArr)){
                        $dayAttArr[$dateKey]["status"]= null;
                        $dayAttArr[$dateKey]["date"]=$date;
                    }
                    else{
                        $getAttstatus = array_filter($monthAtt, function ($dayAtt) use ($date) {
                            return ($dayAtt['date']==$date);
                        });
                        if(count($getAttstatus)>0){
                            $satusArray = array_column($getAttstatus,'status');
                            $dayAttArr[$dateKey]["status"] = $satusArray[0];
                            $dayAttArr[$dateKey]["date"] = $date;
                        }
                    }
                }
                $monthAtt = $dayAttArr;
            }
            $attendances[$key]['monthAtt']= $monthAtt;
            $attendances[$key]['month']= $monthName;
        }
        $currentYear = now()->format('Y');
        $pageTitle = "Attendance Detail";
        return view('superadmin.attendances.show',compact('pageTitle','kid','attendances','currentYear','year'));
    }
    /**
     * Use download Kids Attendences pdf
     * @group Assessments
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function generateAttendencesPDF($kidId){
        $kid = Candidates::select('id','name','dob','assigned_teacher','summary','guardian_name')->where('id',$kidId)->withCount('presentAttendances','absentAttendances','assignedTeacher')->first();
        $months = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $attendances = [];
        $year = now()->format('Y');
        foreach($months as $key=>$month){
            $monthAtt = Attendances::select('date','status')
            ->where('candidate_id',$kidId)
            ->where('user_id',Auth::user()->id)
            ->whereMonth('date',$month)
            ->whereYear('date',$year)
            ->orderBy('date','ASC')->get()->toArray();
            $dateObj   = DateTime::createFromFormat('!m', $month);
            $monthName = $dateObj->format('F'); 
            if((count($monthAtt)==0) ||(count($monthAtt)<31)){
                $totalDays = 31;
                $dates = [];
                for($i=1;$i<=$totalDays;$i++){
                    if((count($monthAtt)==0)){
                        $dayStatus=[
                            "date"=>$year.'-'.$month.'-'.$i,
                            "status"=>null,
                        ];
                        $monthAtt[$i-1]= $dayStatus;
                    }
                    if($i<=9){
                        $dates[$i-1]=$year.'-'.$month.'-0'.$i;
                    }
                    else{
                        $dates[$i-1]=$year.'-'.$month.'-'.$i;
                    }
                }
            }
            if((count($monthAtt)<31)){
                $dateExistArr = array_column($monthAtt,'date');
                $dayAttArr = [];
                foreach($dates as $dateKey=>$date){
                    if(!in_array($date,$dateExistArr)){
                        $dayAttArr[$dateKey]["status"]= null;
                        $dayAttArr[$dateKey]["date"]=$date;
                    }
                    else{
                        $getAttstatus = array_filter($monthAtt, function ($dayAtt) use ($date) {
                            return ($dayAtt['date']==$date);
                        });
                        if(count($getAttstatus)>0){
                            $satusArray = array_column($getAttstatus,'status');
                            $dayAttArr[$dateKey]["status"] = $satusArray[0];
                            $dayAttArr[$dateKey]["date"] = $date;
                        }
                    }
                }
                $monthAtt = $dayAttArr;
            }
            $attendances[$key]['monthAtt']= $monthAtt;
            $attendances[$key]['month']= $monthName;
        }
        $pdf = PDF::loadView('superadmin.attendances.attendancePdf', compact('kid','attendances','year'));
        $pdf->setPaper('a4', 'landscape');
        $pdf_name = $kid['name'].'attendances.pdf';
        return $pdf->download($pdf_name);
    }
    /**
     * Use get  attendances data
     * @group  attendances
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function getAttendancesDateWise($date)
    {
        $role = Auth::user()->role;
        if($role==User::SUPER_ADMIN){
            $kids = Candidates::select('id','name')->orderBy('name', 'ASC')->get();
            $attendances = Attendances::where('date',$date)->pluck('status','candidate_id')->toArray();
        }
        else{
            $kids = Candidates::select('id','name')->where('assigned_teacher',Auth::user()->id)->orderBy('name', 'ASC')->get();
            $attendances = Attendances::where('date',$date)->where('user_id',Auth::user()->id)->pluck('status','candidate_id')->toArray();
        }
        return response()->json(["kids"=>$kids,"attendances"=>$attendances,"success"=>"true"]);
    }
}
