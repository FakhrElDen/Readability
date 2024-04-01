<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use App\Models\Amenity;
use App\Models\RoomType;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelInstance = new Hotel();
        $hotels = $modelInstance->listingHotel();

        return view('dashboard.hotels.hotels', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelInstance = new Amenity();
        $amenities = $modelInstance->listingAmenity();

        $modelInstance = new City();
        $cities = $modelInstance->listingCity();

        return view('dashboard.hotels.add_hotels', compact('amenities', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'description'   => 'required|max:255',
            'city_id'       => 'required',
            'amenity'       => 'required',
            'room_type'     => 'required',
            'room_type.*'   => 'required|string',
            'number'        => 'required',
            'number.*'      => 'required|integer',
        ]);

        $input = $request->all();
        $modelInstance = new Hotel();
        $hotel = $modelInstance->createHotel($input);
        $hotel->amenities()->sync($input['amenity']);
        $modelInstance = new RoomType();

        foreach ($input['room_type'] as $key => $value) {
            $data = array(
                "hotel_id"  => $hotel['id'],
                "name"      => $value,
                "number"    => intval($input['number'][$key])
            );
            $modelInstance->createRoomType($data);
        }

        return redirect()->route('hotels');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelInstance = new Hotel();
        $hotel = $modelInstance->viewHotel($id);

        $modelInstance = new Amenity();
        $amenities = $modelInstance->listingAmenity();

        $modelInstance = new City();
        $cities = $modelInstance->listingCity();

        return view('dashboard.hotels.edit_hotels', compact('hotel', 'amenities', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'description'   => 'required|max:255',
            'city_id'       => 'required',
            'amenity'       => 'required',
            'room_type'     => 'required',
            'room_type.*'   => 'required|string',
            'number'        => 'required',
            'number.*'      => 'required|integer',
        ]);
        $input = $request->all();
        $modelInstance = new Hotel();
        $modelInstance->updateHotel($input, $id);
        $modelInstance->updateHotelAmenities($input['amenity'], $id);
        $modelInstance->deleteRoomType($id);
        $modelInstance = new RoomType();
        
        foreach ($input['room_type'] as $key => $value) {
            $data = array(
                "hotel_id"  => $id,
                "name"      => $value,
                "number"    => intval($input['number'][$key])
            );
            $modelInstance->createRoomType($data);
        }

        return redirect()->route('hotels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelInstance = new Hotel();
        $modelInstance->deleteHotel($id);
        
        return redirect()->route('hotels');
    }
}
