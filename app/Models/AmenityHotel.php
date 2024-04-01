<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenityHotel extends Model
{
    use HasFactory;

    protected $table = 'amenity_hotel';

    protected $fillable = [
        'hotel_id',
        'amenity_id',
    ];

}
