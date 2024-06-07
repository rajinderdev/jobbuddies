<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KidsAssessment extends Model
{
    use HasFactory;
    protected $table = 'kids_assessments';
    protected $fillable = [
        'candidate_id',
        'task_id',
        'user_id',
        'assessments',
        'remarks',
    ];
    public function kid()
    {
        return $this->belongsTo(Candidates::class)->with('kidsAssessments','improvementAssessments','academicProgressAssessments'); 
    }
    public function task()
    {
        return $this->belongsTo(Task::class)->with('skill'); 
    }
}
