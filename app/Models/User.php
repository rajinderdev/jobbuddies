<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    use Billable;
    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'phone',
        'password',
        'image',
        'linked_teacher',
        'stripe_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    const ADMIN = 1;
    const INTERVIEWER = 2;
    const KID = 3;
    const FRONTEND_USER = 4;
    const SUPER_ADMIN = 5;

    
    public function fundraisingOrderTickets()
    {
        return $this->hasMany(FundraisingOrderItem::class)->with('ticket')->where('ticket_id', '!=', Null);
    }
    public function fundraisingOrderSponsorship()
    {
        return $this->hasMany(FundraisingOrderItem::class)->with('sponsorship')->where('sponsorship_id', '!=', Null)->where('order_type', '==', 'Sponsorship');
    }
    public function fundraisingOrderCasinoGames()
    {
        return $this->hasMany(FundraisingOrderItem::class)->with('sponsorship')->where('sponsorship_id', '!=', Null)->where('order_type', "Casino Games");
    }
}
