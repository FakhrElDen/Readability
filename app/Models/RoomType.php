<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomType extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'name',
        'number',
    ];

    public function createRoomType($input)
    {
        return $this->create($input);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
