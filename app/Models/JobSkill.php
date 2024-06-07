<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'skill',
        'image',
        
    ];
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
