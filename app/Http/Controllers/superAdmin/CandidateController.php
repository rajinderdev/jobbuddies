<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Candidates;
use Illuminate\Support\Facades\Auth;
use DataTables;
class CandidateController extends Controller
{
    /**
     * Returns get Candidate List
     * @group Candidates
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function index(Request $request)
    { 
        if ($request->ajax()) {
            $data = Candidates::orderBy('id', 'DESC');
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
                $resume =    
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
        $pageTitle = "Candidates";
        return view('superadmin.candidates.index',compact('pageTitle'));
    }
     /**
     * Use get Candidate data
     * @group Candidates
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     * response:{
     *  job:{
     *      'id':1,
     *      'name': abc,
     *      'email':"sas@gmail.com",
     *      'phone':"1258496",
     *      'position':"position",
     *      'position':"job_id",
     *      'position':"tell_us_about_experience",
     *      'created_at':2023-06-01 10:11:10,
     *      'update_at':023-06-01 10:11:10,
     *  }
     * }
     **/
    public function show($id, Request $request)
    {
        $candidate = Candidate::where('id',$id)->first();
        $pageTitle = "Candidate Details";
        return view('superadmin.candidates.show',compact('pageTitle','candidate'));
    }
    /**
     * Returns delete Candidate
     * @group Candidates
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id string required
     **/
    public function deleteCandidate(Request $request)
    {
        $Candidate = Candidate::where('id',$request->id)->delete();
        return response()->json([
            'success' => true,
            'response' => $Candidate,
            'message' =>  'Candidate deleted successfully.'
        ], 200);
    }
}
