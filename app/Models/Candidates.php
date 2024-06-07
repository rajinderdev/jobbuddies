<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Candidates extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'candidates_new';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'admission_number',
        'dob',
        'gender',
        'place_of_birth',
        'address',
        'street',
        'city',
        'country',
        'state',
        'postcode',
        'status',
        'disease',
        'joining_date',
        'guardian_name',
        'guardian_relationship',
        'guardian_phone_number',
        'guardian_address',
        'guardian_email',
        'em_parent_name',
        'em_relationship',
        'em_phone_number',
        'em_email',
        'age',
        'image',
        'assigned_teacher',
        'form_status',
        'grade',
        'education_mode',
        'allergies',
        'food_cond',
        'food_cond_desc',
        'medication',
        'ditary_rest',
        'kid_dis',
        'kid_dis_desc',
        'disability',
        'disability_desc',
        'behaviour',
        'behaviour_desc',
        'accomodation',
        'accomodation_desc',
        'summary',
        'added_by'
    ];
     public function kidSecondParent()
    {
        return $this->hasOne(KidSecondParent::class);
    }
    public function kidsAssessments()
    {
        return $this->hasMany(KidsAssessment::class);
    }
    public function improvementAssessments()
    {
        return $this->hasMany(KidsAssessment::class)->where('assessments',2);
    }
    public function academicProgressAssessments()
    {
        return $this->hasMany(KidsAssessment::class)->where('assessments',1);
    }
    public function assignedTeacher()
    {
        return $this->belongsTo(User::class, 'assigned_teacher', 'id');
    }
    public function addedBy()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
    public function tasks()
    {
        $firstHelfYearly = ["01","02","03","04","05","06"];
        $secondHelfYearly = ["07","08","09","10","11","12"];
        $currentMonth = today()->format('m');
        if(in_array($currentMonth,$firstHelfYearly)){
            $months =  $firstHelfYearly;
        }elseif(in_array($currentMonth,$secondHelfYearly)){
            $months =  $secondHelfYearly;
        }
        else{
            $months = [];
        }
        // return $this->belongsToMany(task::class)->whereRaw('MONTH(tasks.created_at) in ('.implode(',',$months).')');
        return $this->belongsToMany(Task::class);
    }
    public function presentAttendances()
    {
        return $this->hasMany(Attendances::class)->where('status',1);
    }
    public function absentAttendances()
    {
        return $this->hasMany(Attendances::class)->where('status',0);
    }
    public function attendances()
    {
        return $this->hasMany(Attendances::class);
    }
}
