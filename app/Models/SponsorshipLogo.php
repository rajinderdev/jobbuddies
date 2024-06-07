<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorshipLogo extends Model
{
    use HasFactory;
     protected $table = 'sponsorships_logos';
    protected $fillable = [
        'image',
        'sponsorship_id',
        'user_id'
    ];
}
