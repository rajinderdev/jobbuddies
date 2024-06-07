<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use DataTables;
class SkillController extends Controller
{
    /**
     * Returns get Skills List
     * @group Skills
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     **/
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Skill::with('tasks')->orderBy('id', 'DESC');
            return Datatables::of($data)
            ->addIndexColumn()
                ->editColumn('associated_task', function ($data) {
                    if(count($data->tasks)>0){
                        return count($data->tasks);
                    }else{
                        return '0';
                    }
                })
                ->addColumn('action', function ($data) {
                    $btn = '<div class="d-flex">
                            <button type="button" class="btn btn-sm btn-light border" onclick="editSkill('.$data->id.')">
                            <i class="fa fa-solid fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-light border ml-2" data-bs-toggle="modal" data-bs-target="#deleteSkillData" onclick="deleteSkill('.$data->id.')"><i class="fa fa-trash"></i></button>
                            </div>';
                    return $btn;
                })
                ->rawColumns(['status','action'])
                ->make(true);
        }
        $pageTitle = "Types";
        return view('superadmin.skills.index',compact('pageTitle'));
    }

    /**
     * Use store skills data
     * @group skills
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam skill_name string required
     **/
    public function store(Request $request)
    {
        $skill = Skill::create([
            'skill_name' => $request->skill_name ? $request->skill_name : ''
        ]);
        return response()->json([
            'success' => true,
            'response' => $skill,
            'message' =>  'Skill added successfully.'
        ], 200);
    }

     /**
     * Use get skill data for update
     * @group skills
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @urlParam id integer required
     **/
    public function edit($id)
    {
        $data = Skill::whereId($id)->first();
        return response()->json([
            'success' => true,
            'response' => $data,
            'message' =>  'Skill details.'
        ], 200);
    }

    /**
     * Use update skill data
     * @group Skills
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id integer required
     * @bodyParam skill_name string required
     **/
    public function update(Request $request)
    {
        $skillData = Skill::where('id', $request->id)
        ->update([
            "skill_name"=>$request->skill_name ? $request->skill_name :'',
        ]);

        return response()->json([
            'success' => true,
            'response' => $skillData,
            'message' =>  'Skill updated successfully.'
        ], 200);
    }
    /**
     * Returns delete Skill
     * @group Skills
     * @header Content-Type application/json
     * @header Authorization Bearer {token}
     * @bodyParam id string required
     **/
    public function deleteSkill(Request $request)
    {
      
       $skill =  Skill::where('id', $request->id)->delete();
        return response()->json([
            'success' => true,
            'response' => $skill,
            'message' =>  'Skill deleted successfully.'
        ], 200);
    }
}
