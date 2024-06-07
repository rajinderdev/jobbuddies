<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ZoomMeeting;
use App\Models\Candidates;
use App\Models\Interviewer;
use App\Traits\ZoomMeetingTrait;
use App\Models\Plan;
use Yajra\DataTables\Facades\DataTables;

class ZoomCallController extends Controller
{
    use ZoomMeetingTrait;

    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Plan::with('features')->orderBy('id', 'DESC');
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('duration', function ($data) {
                    return $data->duration . '/' . ucfirst($data->plan_type);
                })

                ->addColumn('action', function ($data) {
                    $btn = '<div class="d-flex">
                            <button type="button" class="btn btn-sm btn-light border" onclick="editSkill(' . $data->id . ')">
                            <i class="fa fa-solid fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-light border ml-2" data-bs-toggle="modal" data-bs-target="#deleteSkillData" onclick="deleteSkill(' . $data->id . ')"><i class="fa fa-trash"></i></button>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        $candidates = Candidates::get();
        $interviewers = Interviewer::get();
        $pageTitle = "Zoom Mettings";
        return view('superadmin.zoommettings.index', compact('pageTitle', 'candidates', 'interviewers'));
    }
    public function show($id)
    {
        $meeting = $this->get($id);

        return view('meetings.index', compact('meeting'));
    }

    public function store(Request $request)
    {
        $response = $this->create($request->all());

        return response()->json([
            'success' => true,
            'response' => $response,
            'message' =>  'Meeting added successfully.'
        ], 200);
    }

    public function update($meeting, Request $request)
    {
        $this->updateMeeting($meeting->zoom_meeting_id, $request->all());

        return redirect()->route('meetings.index');
    }

    public function destroy(ZoomMeeting $meeting)
    {
        $this->delete($meeting->id);

        return $this->sendSuccess('Meeting deleted successfully.');
    }
}
