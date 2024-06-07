<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampRegistration extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'candidate_id','student_name','student_dob','school_name','sessions','tshirt','address','parent_name','phone','email','best_way_to_contact','emergency_contact_name1','emergency_relationship1','emergency_phone1','emergency_contact_name2','emergency_relationship2','emergency_phone2',
        'safety_info','medical_conditions','regular_medications','behavioral_or_emotional','sensory_aversions','child_reinforcers','special_diet','goals_description','about_super_student','sunscreen','photograph_release','important_name','important_date','type','status','payment_satus','amount','stripe_charge_id','all_detail',
        'goal_1','goal_2','goal_3','goal_4'
    ];
}
