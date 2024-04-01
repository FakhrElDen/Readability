<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//hotels
Route::get('/hotels', 'App\Http\Controllers\HotelController@index')->name('hotels');
Route::get('/create-hotel', 'App\Http\Controllers\HotelController@create')->name('createHotel');
Route::post('/store-hotel', 'App\Http\Controllers\HotelController@store');
Route::get('/edit-hotel/{hotel_id}', 'App\Http\Controllers\HotelController@edit');
Route::post('/update-hotel/{hotel_id}', 'App\Http\Controllers\HotelController@update');
Route::get('/delete-hotel/{hotel_id}', 'App\Http\Controllers\HotelController@destroy');
//amenities
Route::get('/amenities', 'App\Http\Controllers\AmenityController@index')->name('amenities');
Route::post('/store-amenity', 'App\Http\Controllers\AmenityController@store');
Route::get('/edit-amenity/{amenity_id}', 'App\Http\Controllers\AmenityController@edit');
Route::post('/update-amenity/{amenity_id}', 'App\Http\Controllers\AmenityController@update');
Route::get('/delete-amenity/{amenity_id}', 'App\Http\Controllers\AmenityController@destroy');
//cities
Route::get('/cities', 'App\Http\Controllers\CityController@index')->name('cities');
Route::post('/store-city', 'App\Http\Controllers\CityController@store');
Route::get('/edit-city/{city_id}', 'App\Http\Controllers\CityController@edit');
Route::post('/update-city/{city_id}', 'App\Http\Controllers\CityController@update');
Route::get('/delete-city/{city_id}', 'App\Http\Controllers\CityController@destroy');

