<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'gift_card_id',
        'user_id',
        'pledge_id',
        'price',
        'quantity',
        'name',
        'card_name',
        'discount',
        'child_name',
        'phone_number',
        'email',
        'card_status',
        'pledge_type',
        'variety',
        'delivery_option',
        'delivery_mode'
    ];
}
