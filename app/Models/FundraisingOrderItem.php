<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundraisingOrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
    "user_id",
    "fundraising_order_id",
    "price",
    "totalAmount",
    "quantity",
    "sponsorship_id",
    "ticket_id",
    "order_type",
    "ticket_code",
    "bar_code",
    "sold_as",
    "ticket_verified",
    'event_id'
    ];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
    public function sponsorship()
    {
        return $this->belongsTo(Sponsorship::class)->with('sponsorshipBenefits');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
