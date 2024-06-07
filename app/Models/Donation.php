<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "event_id",
        "amount",
        "donate_type",
        "dedicatees_name",
        "dedicatees_email",
        "recipient_email",
        "donation_status",
        "payment_type",
        "type",
        "all_detail",
        "transection_from",
        "stripe_charge_id",
        "receipt_url",
        "transection_id",
        "gross_amount",
        "original _amount"
    ];
}
