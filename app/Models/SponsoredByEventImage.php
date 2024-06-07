<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsoredByEventImage extends Model
{
    use HasFactory;
     protected $table = 'sponsored_by_event_images';
      protected $dates = ['deleted_at'];
        protected $fillable = [
            'event_id',
            'image_name',
        ];
}
