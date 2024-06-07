<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendances extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    protected $fillable = [
        'candidate_id',
        'user_id',
        'date',
        'status',
    ];
}
