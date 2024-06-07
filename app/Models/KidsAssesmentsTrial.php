<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KidsAssesmentsTrial extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_id',
        'kids_assessments_id',
        'assessments',
        'remarks',
        'assessment_marks',
    ];
}
