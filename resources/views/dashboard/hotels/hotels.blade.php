@extends('dashboard.layout')
@section('header')

    <div class="contentWrapper__right__heading">
        <h1 class="color-black cap-case">Hotels</h1>
    </div>
    <div class="contentWrapper__right__ctrls text-right">
        <ul class="list-unstyled list-inline">
            <li>
                <a href="{{ route('hotels') }}" class="cap-case color-blue">Hotels</a>
            </li>
            <li>
                <a href="{{ route('createHotel') }}" class="cap-case color-black" style="font-family: 'openSemiBold', sans-serif;font-size: 15px;margin-left: 10px;">add Hotel</a>
            </li>
        </ul>
    </div>

@stop
@section('content')

    <div class="contentWrapper__contentSquad1"><!--Start contentWrapper__content__squadAdd-->
                            
        <div class="contentWrapper__content__squadAdd__item">
            <table>
                <tbody>
                    @forelse($hotels as $hotel)
                        <tr>
                            <td>
                                <span class="cap-case">hotel name</span>
                                <h4 class="color-black cap-case">{{ $hotel->name }}</h4>
                            </td>
                            <td>
                                <span class="cap-case">hotel description</span>
                                <h4 class="color-black cap-case">{!! Str::limit($hotel->description, 10) !!}</h4>
                            </td>
                            <td>
                                <span class="cap-case">hotel city</span>
                                <h4 class="color-black cap-case">{{ $hotel['city']->name }}</h4>
                            </td>
                            <td>
                                <span class="cap-case">hotel amenities</span>
                                @foreach($hotel['amenities'] as $amenity)
                                    <h4 class="color-black cap-case">{{ $amenity->name }}</h4>
                                @endforeach
                            </td>
                            <td>
                                <span class="cap-case">hotel room types</span>
                                @foreach($hotel['roomTypes'] as $roomType)
                                    <h4 class="color-black cap-case">{{ $roomType->name }}({{ $roomType->number }})</h4>
                                    
                                @endforeach
                            </td>
                            <td class="text-right">
                                <span class="cap-case">action</span>
                                <ul class="list-unstyled list-inline">
                                <li><a href="{{env('APP_URL')}}/edit-hotel/{{ $hotel->id }}"><button><i class="fa fa-edit fa-fw fa-lg"></i></button></a></li>
                                <li><a href="{{env('APP_URL')}}/delete-hotel/{{ $hotel->id }}"><button onclick="return confirm('Are you sure?')"><i class="fa fa-trash fa-fw fa-lg"></i></button></a></li>
                                </ul>
                            </td>
                        </tr>
                    @empty
                        <h2>THERE IS NO DATA YET .. </h2>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div><!--End contentWrapper__content__squadAdd-->

@stop