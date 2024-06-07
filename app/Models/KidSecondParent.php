<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KidSecondParent extends Model
{
    use HasFactory;
    protected $table = 'kid_second_parents';
    protected $fillable = [
        'candidate_id',
        'name',
        'relationship',
        'phone_number',
        'address',
        'email',
        'status',
    ];
}
