<?php

namespace App\Http\Controllers\superAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Config;
use Hash;
class SettingsController extends Controller
{
    public function index(){
        $user = Auth::user();
        $teacher = null;
        if($user->role==User::INTERVIEWER){
            $teacher = Interviewer::where('user_id',$user->id)->first();
        }
        $diseases = Config::get('constants.disease_type');
        $pageTitle = "Settings";
        return view('superadmin.settings.profile',compact('pageTitle','user','teacher','diseases'));
    }

    public function profileImageUpdate(Request $request){
        if(!empty($request->file('image'))) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('storage/images', $filename);
        }else{
            $filename="";
        }
        $teacher = Interviewer::where('user_id', Auth::user()->id)->first();
        $profile=null;
        if($teacher){
            $profile = Interviewer::where('id', $teacher->id)
            ->update(['image'=>$filename?$filename:$teacher->image]);
        }
        $profile = User::where('id', Auth::user()->id)
        ->update(['image'=>$filename?$filename:$teacher->image]);
        return response()->json([
            'success' => true,
            'response' => $profile,
            'message' =>  'teacher updated successfully.'
        ], 200);
        
    }
    public function resetPassword(Request $request){
       
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return response()->json([
                'error' => true,
                'message' =>  'Current password does not match!'
            ], 422);
        }
        $profile = User::where('id', Auth::user()->id)
        ->update(['password'=>Hash::make($request->password)]);
        return response()->json([
            'success' => true,
            'response' => $profile,
            'message' =>  'teacher updated successfully.'
        ], 200);
        
    }
    public function updateProfile(Request $request){
       if($request->has('teacherId')){
        $profile = Interviewer::where('id',$request->teacherId)
        ->update([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'dob'=>$request->dob,
            'phone'=>$request->phone,
            'joining_date'=>$request->joining_date,
            'experience'=>$request->experience,
            'qualification'=>$request->qualification,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'country'=>$request->country,
            'zipcode'=>$request->zipcode,
        ]);
       }
       
        $profile = User::where('id', Auth::user()->id)
        ->update(['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone]);
       return redirect()->back()->with('success','Profile Update Successfully!');
    }
}
