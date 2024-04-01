<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Amenity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function listingAmenity()
    {
        return $this->get();
    }

    public function viewAmenity($amenity_id)
    {
        return $this->where('id', $amenity_id)->first();
    }

    public function createAmenity($input)
    {
        return $this->create($input);
    }

    public function updateAmenity($input, $amenity_id)
    {
        return $this->find($amenity_id)->update($input);
    }

    public function deleteAmenity($amenity_id)
    {
        return $this->where('id', $amenity_id)->delete();
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'amenity_hotel');
    }
}
