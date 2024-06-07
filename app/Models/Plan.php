<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'description', 'price', 'duration', 'plan_type', 'interviews', 'isActive', 'stripe_plan_id'
    ];

    public function features()
    {
        return $this->hasMany(PlanFeature::class);
    }
}
