<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelInstance = new Amenity();
        $amenities = $modelInstance->listingAmenity();
        
        return view('dashboard.amenities.amenities', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name'   => 'required|max:255',
        ]);

        $input = $request->all();
        $modelInstance = new Amenity();
        $modelInstance->createAmenity($input);
        
        return redirect()->route('amenities');
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
        $modelInstance = new Amenity();
        $amenity = $modelInstance->viewAmenity($id);
        
        return view('dashboard.amenities.edit_amenities', compact('amenity'));
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
            'name'   => 'required|max:255',
        ]);

        $input = $request->all();
        $modelInstance = new Amenity();
        $modelInstance->updateAmenity($input, $id);
        
        return redirect()->route('amenities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelInstance = new Amenity();
        $modelInstance->deleteAmenity($id);
        
        return redirect()->route('amenities');
    }
}
