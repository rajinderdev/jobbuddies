<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'skill_id',
        'task_name',
        'user_id',
    ];
    public function kids()
    {
        return $this->belongsToMany(Candidates::class);    
    }
    public function skill()
    {
        return $this->belongsTo(Skill::class); 
    }
    public function user()
    {
        return $this->belongsTo(User::class); 
    }
    public function KidsAssessments()
    {
        return $this->hasMany(KidsAssessment::class); 
    }
}
