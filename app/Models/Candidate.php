<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Candidate extends Model
{
    use HasFactory;
     use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
        'job_id',
        'tell_us_about_experience',
        'status',
        'resume'
    ];
}
