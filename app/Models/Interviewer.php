<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Interviewer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'user_id',
        'interviewer_id',
        'assign_class',
        'name',
        'disease',
        'image',
        'gender',
        'dob',
        'phone',
        'joining_date',
        'qualification',
        'department',
        'designation',
        'experience',
        'address',
        'city',
        'country',
        'state',
        'zipcode',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
