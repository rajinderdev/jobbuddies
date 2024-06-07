<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transection extends Model
{
    use HasFactory;
    protected $fillable = [
        "object",
        "user_id",
        "stripe_charge_id",
        "amount",
        "balance_transaction",
        "failure_balance_transaction",
        "failure_code",
        "payment_intent",
        "payment_method",
        "status",
        "receipt_url",
        "event_id"
    ];
}
