<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Sponsorship extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
        'price',
        'status',
        'type',
        'event_id'
    ];
    public function sponsorshipBenefits()
    {
        return $this->hasMany(SponsorshipBenefit::class);
    }
    public function sponsorshiplogo()
    {
        return $this->hasOne(SponsorshipLogo::class)->where('user_id',Auth::user()->id);
    }
    public function sponsorshipLogos()
    {
        return $this->hasMany(SponsorshipLogo::class);
    }

}
