<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use App\Models\Candidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Skill;
use App\Models\Task;
use App\Models\KidsAssessment;
use Config;
use DB;

class DashboardController extends Controller
{
    public function superAdminLogin()
    {
        if (auth()->user() && auth()->user()->role == '2') {
            return redirect(route('superadmin.dashboard'));
        } else {
            return view('superadmin.login');
        }
    }

    public function index()
    {
        $role = Auth::user()->role;
        $totalSkills = Skill::count();
        /* get pending task */
        $assessments = Config::get('constants.assessments');
        $firstHelfYearly = ["01", "02", "03", "04", "05", "06"];
        $secondHelfYearly = ["07", "08", "09", "10", "11", "12"];
        $currentMonth = today()->format('m');
        $specialitiesConstants = Config::get('constants.disease_type');
        $specialities = [];
        /* $role==User::SUPER_ADMIN use for school admin */
        if ($role == User::SUPER_ADMIN) {
            /* get totalKids task */
            $totalKids = Candidates::where('status', 1)->count();
            $totalMaleKids = Candidates::where('gender', 'Male')->where('status', 1)->count();
            $totalFemaleKids = Candidates::where('gender', 'Female')->where('status', 1)->count();
            $totalOtherKids = Candidates::where('gender', 'Other')->where('status', 1)->count();
            if (in_array($currentMonth, $firstHelfYearly)) {
                $totalPendingTask = Task::whereRaw('MONTH(tasks.created_at) in (' . implode(',', $firstHelfYearly) . ')')->has('kidsAssessments', 0)->count();
            } elseif (in_array($currentMonth, $secondHelfYearly)) {
                $totalPendingTask = Task::whereRaw('MONTH(tasks.created_at) in (' . implode(',', $secondHelfYearly) . ')')->has('kidsAssessments', 0)->count();
            } else {
                $totalPendingTask = 0;
            }
            foreach ($specialitiesConstants as $key => $specialitiesConstant) {
                $totalCount = Candidates::where('disease', $key)->where('status', 1)->count();
                $specialities[$key] = [
                    "speciality" => $specialitiesConstant,
                    "totalCount" => $totalCount
                ];
            }
        } else {
            /* get totalKids task */
            $totalKids = Candidates::where('assigned_teacher', Auth::user()->id)->where('status', 1)->count();
            $totalMaleKids = Candidates::where('assigned_teacher', Auth::user()->id)->where('gender', 'Male')->where('status', 1)->count();
            $totalFemaleKids = Candidates::where('assigned_teacher', Auth::user()->id)->where('gender', 'Female')->where('status', 1)->count();
            $totalOtherKids = Candidates::where('assigned_teacher', Auth::user()->id)->where('gender', 'Other')->where('status', 1)->count();
            if (in_array($currentMonth, $firstHelfYearly)) {
                $totalPendingTask = Task::whereRaw('MONTH(tasks.created_at) in (' . implode(',', $firstHelfYearly) . ')')->where('user_id', Auth::user()->id)->has('kidsAssessments', 0)->count();
            } elseif (in_array($currentMonth, $secondHelfYearly)) {
                $totalPendingTask = Task::whereRaw('MONTH(tasks.created_at) in (' . implode(',', $secondHelfYearly) . ')')->where('user_id', Auth::user()->id)->has('kidsAssessments', 0)->count();
            } else {
                $totalPendingTask = 0;
            }
            foreach ($specialitiesConstants as $key => $specialitiesConstant) {
                $totalCount = Candidates::where('assigned_teacher', Auth::user()->id)->where('disease', $key)->where('status', 1)->count();
                $specialities[$key] = [
                    "speciality" => $specialitiesConstant,
                    "totalCount" => $totalCount
                ];
            }
        }

        $needAttentionKids = Self::getNeedAttentionKids();
        $academicProgressKids = Self::getAcademicProgressKids();
        $pageTitle = "Dashboard";
        return view('superadmin.index', compact('pageTitle', 'academicProgressKids', 'needAttentionKids', 'totalKids', 'totalSkills', 'totalPendingTask', 'totalMaleKids', 'totalFemaleKids', 'totalOtherKids', 'specialities'));
    }
    /* Get Kids Need Attention list !*/
    public function getNeedAttentionKids()
    {
        $assessments = Config::get('constants.assessments');
        $firstHelfYearly = ["01", "02", "03", "04", "05", "06"];
        $secondHelfYearly = ["07", "08", "09", '10', '11', '12'];
        $currentMonth = today()->format('m');
        if (in_array($currentMonth, $firstHelfYearly)) {
            $months =  $firstHelfYearly;
        } elseif (in_array($currentMonth, $secondHelfYearly)) {
            $months =  $secondHelfYearly;
        } else {
            $months = [];
        }
        $year =  today()->format('Y');
        $role = Auth::user()->role;
        /* $role==User::SUPER_ADMIN use for school admin */
        if ($role == User::SUPER_ADMIN) {
            $kidIds = Candidates::has('kidsAssessments', '>', 0)->where('status', 1)->pluck('id')->toArray();
        } else {
            $kidIds = Candidates::where('assigned_teacher', Auth::user()->id)->has('kidsAssessments', '>', 0)->where('status', 1)->pluck('id')->toArray();
        }
        $needToImprovementsKids = KidsAssessment::select('candidates_id', 'assessments')
            ->whereIn('candidates_id', $kidIds)
            ->groupBy(['candidates_id', 'assessments'])
            ->where('assessments', 2)
            ->with('kid', 'task')
            ->whereHas('task', function ($query) use ($year, $months) {
                $query->whereRaw('MONTH(tasks.created_at) in (' . implode(',', $months) . ')')
                    ->whereYear('tasks.created_at', $year);
            })->get();
        $needToImprovementsKidsArr = [];
        foreach ($needToImprovementsKids as $needToImprovementsKid) {
            $percentage = round(((count($needToImprovementsKid->kid->improvementAssessments)) / (count($needToImprovementsKid->kid->kidsAssessments)) * 100), 2);
            if ($percentage >= 70) {
                $needToImprovementsKidsArr[] = array(
                    "name" => $needToImprovementsKid->kid->name,
                    "candidates_id" => $needToImprovementsKid->candidates_id,
                    "assessments" => $assessments[$needToImprovementsKid->assessments],
                    "percentage" => $percentage,
                );
            }
        }

        $key_values = array_column($needToImprovementsKidsArr, 'percentage');
        array_multisort($key_values, SORT_DESC, $needToImprovementsKidsArr);
        return  $needToImprovementsKidsArr;
    }
    /* Get Kids Academic Progress list !*/
    public function getAcademicProgressKids()
    {
        $assessments = Config::get('constants.assessments');
        $firstHelfYearly = ["01", "02", "03", "04", "05", "06"];
        $secondHelfYearly = ["07", "08", "09", '10', '11', '12'];
        $currentMonth = today()->format('m');
        if (in_array($currentMonth, $firstHelfYearly)) {
            $months =  $firstHelfYearly;
        } elseif (in_array($currentMonth, $secondHelfYearly)) {
            $months =  $secondHelfYearly;
        } else {
            $months = [];
        }
        $year =  today()->format('Y');
        $role = Auth::user()->role;
        /* $role==User::SUPER_ADMIN use for school admin */
        if ($role == User::SUPER_ADMIN) {
            $kidIds = Candidates::has('kidsAssessments', '>', 0)->where('status', 1)->pluck('id')->toArray();
        } else {
            $kidIds = Candidates::where('assigned_teacher', Auth::user()->id)->has('kidsAssessments', '>', 0)->where('status', 1)->pluck('id')->toArray();
        }
        $academicProgressKids = KidsAssessment::select('candidates_id', 'assessments')
            ->whereIn('candidates_id', $kidIds)
            ->groupBy(['candidates_id', 'assessments'])
            ->where('assessments', 1)
            ->with('kid', 'task')
            ->whereHas('task', function ($query) use ($year, $months) {
                $query->whereRaw('MONTH(tasks.created_at) in (' . implode(',', $months) . ')')
                    ->whereYear('tasks.created_at', $year);
            })->get();
        $academicProgressKidsArr = [];
        foreach ($academicProgressKids as $academicProgressKid) {
            $percentage = round(((count($academicProgressKid->kid->academicProgressAssessments)) / (count($academicProgressKid->kid->kidsAssessments)) * 100), 2);
            if ($percentage >= 70) {
                $academicProgressKidsArr[] = array(
                    "name" => $academicProgressKid->kid->name,
                    "candidates_id" => $academicProgressKid->candidates_id,
                    "assessments" => $assessments[$academicProgressKid->assessments],
                    "percentage" => $percentage
                );
            }
        }

        $key_values = array_column($academicProgressKidsArr, 'percentage');
        array_multisort($key_values, SORT_DESC, $academicProgressKidsArr);
        return  $academicProgressKidsArr;
    }

    public function login(Request $request)
    {
        $input = $request->only(['email', 'password']);

        $validate_data = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return redirect()->route('superAdminLogin')->with('error', 'Please see errors parameter for all errors.');
        }

        // authentication attempt
        if (auth()->attempt($input)) {
            if (Auth::check() && Auth::user()->role == '2' || Auth::check() && Auth::user()->role == '5') {
                return redirect()->route('superadmin.dashboard')->with('success', 'login successfully.');
            } else {
                Auth::logout();
                return redirect()->route('superAdminLogin')->with('error', 'Please check credentials.');
            }
        } else {
            return redirect()->route('superAdminLogin')->with('error', 'Please check credentials.');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin/login')->with('success', 'logout successfully.');
    }
}
