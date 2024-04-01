@extends('dashboard.layout')
@section('header')

    <div class="contentWrapper__right__heading">
        <h1 class="color-black cap-case">Edit Hotels</h1>
    </div>
    <div class="contentWrapper__right__ctrls text-right">
        <ul class="list-unstyled list-inline">
            <li>
                <a href="{{ route('hotels') }}" class="cap-case color-black" style="font-family: 'openSemiBold', sans-serif;font-size: 15px;margin-left: 10px;">Hotels</a>
            </li>
        </ul>
    </div>

@stop
@section('content')
    <div class="contentWrapper__content"><!--Start contentWrapper__content-->
        <div class="contentWrapper__content__form">

            <form enctype="multipart/form-data" action="{{env('APP_URL')}}/update-hotel/{{$hotel->id}}" method="POST">
                {{ @csrf_field() }}
                <div class="contentWrapper__content__form__div">
                    <p style="color:red"> @error('name') {{$message}} @enderror </p>
                    <h4 class="contentWrapper__content__form__div__heading cap-case color-blue">Hotel Name</h4>
                    <label class="cap-case"> name </label>
                    <input type="text" name="name" class="form-control" value="{{$hotel->name}}">
                </div>

                <div class="contentWrapper__content__form__div">
                    <p style="color:red"> @error('description') {{$message}} @enderror </p>
                    <h4 class="contentWrapper__content__form__div__heading cap-case color-blue">Hotel Description</h4>
                    <label class="cap-case"> Description </label>
                    <textarea name="description" class="form-control" cols="30" rows="3">{{$hotel->description}}</textarea>
                </div>

                <div class="contentWrapper__content__form__div">
                    <p style="color:red"> @error('city_id') {{$message}} @enderror </p>
                    <h4 class="contentWrapper__content__form__div__heading cap-case color-blue">Hotel City</h4>
                    <label class="cap-case"> City </label><br>
                    <select name="city_id" style="width: -webkit-fill-available;">
                        <option value="{{ $hotel['city']->id }}">{{ $hotel['city']->name }}</option>
                        @forelse($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @empty
                            <option value="">No City to Show</option>
                        @endforelse
                    </select>
                </div>

                <div class="contentWrapper__content__form__div">
                    <p style="color:red"> @error('amenity') {{$message}} @enderror </p>
                    <h4 class="contentWrapper__content__form__div__heading cap-case color-blue">Hotel amenities</h4>
                    <label class="cap-case"> amenities </label>
                    <div style="display: flex;flex-wrap: wrap;">
                        @forelse($amenities as $amenity)
                            <div class="item">
                                <input type="checkbox" name="amenity[]" value="{{ $amenity->id }}">
                                <p class="checkbox-inline" style="padding-right: 30px;margin-top: -30px;padding-left: 5px;">
                                    {{ $amenity->name }}
                                </p>
                            </div>
                        @empty
                            <h4>No Amenities to Show</h4>
                        @endforelse
                    </div>
                </div>

                <div class="contentWrapper__content__form__div">
                    <h4 class="contentWrapper__content__form__div__heading cap-case color-blue">Hotel Room Type</h4>
                    <p style="color:red"> @error('room_type') {{$message}} @enderror </p>
                    <p style="color:red"> @error('room_type.*') {{$message}} @enderror </p>
                    <label class="cap-case"> Room Type </label>
                    <input type="text" name="room_type[]" class="form-control">
                    <p style="color:red"> @error('number') {{$message}} @enderror </p>
                    <p style="color:red"> @error('number.*') {{$message}} @enderror </p>
                    <label class="cap-case"> Number Of Rooms </label>
                    <input type="number" name="number[]" class="form-control">
                    <button type="button" onclick="add()"><i class="fa fa-plus-square"></i> Add</button>
                    <div id="new_chq"></div>
                    <input type="hidden" value="1" id="total_chq">
                </div>

                <div class="contentWrapper__content__form__ctrls text-right">
                    <a href="{{ URL::previous() }}">
                        <button type="button" class="cap-case color-white bg-red text-left">
                            <span class="pull-left">X</span>
                            <span class="pull-right">Cancel</span>
                        </button>
                    </a>

                    <button class="cap-case color-white bg-blue text-right">
                        <span class="pull-right">+</span>
                        <span class="pull-left">Update</span>
                    </button>
                </div>
            </form>

        </div>
                        
    </div><!--End contentWrapper__content-->

@stop