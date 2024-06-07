<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundraisingOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'totalAmount',
        'transection_id',
        'stripe_charge_id',
        'event_id'
    ];
}
