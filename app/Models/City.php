<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    public function listingCity()
    {
        return $this->get();
    }

    public function viewCity($city_id)
    {
        return $this->where('id', $city_id)->first();
    }

    public function createCity($input)
    {
        return $this->create($input);
    }

    public function updateCity($input, $city_id)
    {
        return $this->find($city_id)->update($input);
    }

    public function deleteCity($city_id)
    {
        return $this->where('id', $city_id)->delete();
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
