<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
     protected $table = 'events';
      protected $dates = ['deleted_at'];
        protected $fillable = [
            'name',
            'status',
            'slug',
            'date',
            'time',
            'address',
            'city',
            'state',
            'country',
            'zip_code',
            'goal_total_amount',
            'main_heading',
            'sub_heading',
            'background_image',
            'banner_image',
            'banner_image2',
            'donation_image',
            'sponsored_by_images',
            'donation_text',
        ];
}
