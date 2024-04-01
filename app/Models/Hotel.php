<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'city_id',
        'name',
        'description',
    ];

    public function listingHotel()
    {
        return $this->with(['amenities'])->with(['roomTypes'])->with(['city'])->get();
    }

    public function viewHotel($hotel_id)
    {
        return $this->where('id', $hotel_id)->with(['amenities'])->with(['roomTypes'])->with(['city'])->first();
    }

    public function updateHotel($input, $hotel_id)
    {
        return $this->find($hotel_id)->update($input);
    }

    public function updateHotelAmenities($input, $hotel_id)
    {
        $result = $this->find($hotel_id)->amenities()->detach();
        $result = $this->find($hotel_id)->amenities()->sync($input);
        return $result;
    }

    public function createHotel($input)
    {
        return $this->create($input);
    }

    public function deleteHotel($hotel_id)
    {
        return $this->where('id', $hotel_id)->delete();
    }

    public function deleteRoomType($hotel_id)
    {
        return $this->find($hotel_id)->roomTypes()->delete();
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'amenity_hotel');
    }

    public function roomTypes()
    {
        return $this->hasMany(RoomType::class);
    }
}
