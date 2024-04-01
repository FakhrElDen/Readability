@extends('dashboard.layout')
@section('header')

    <div class="contentWrapper__right__heading">
        <h1 class="color-black cap-case">Amenities</h1>
    </div>

@stop
@section('content')

    <div class="contentWrapper__content"><!--Start contentWrapper__content-->
        <div class="contentWrapper__content__form">

            <form action="{{env('APP_URL')}}/store-amenity" method="POST">
                {{ @csrf_field() }}
                <h4 class="contentWrapper__content__form__div__heading cap-case color-blue">Amenity Name</h4>
                <div class="contentWrapper__content__form__div">
                <p style="color:red"> @error('name') {{$message}} @enderror </p>
                    <label class="cap-case"> Amenity name </label>
                    <input type="text" name="name" id="" class="form-control" placeholder="">
                </div>
                <div class="contentWrapper__content__form__ctrls">
                    <button class="cap-case color-white bg-blue text-right">
                        <span class="pull-right">+</span>
                        <span class="pull-left">Create</span>
                    </button>
                </div>
            </form>


        </div>
    </div><!--End contentWrapper__content-->

    <div class="contentWrapper__content"><!--Start contentWrapper__content-->
        <div class="contentWrapper__content__form">

            <table class="pack__table">
                <tbody>
                    @forelse($amenities as $key=>$amenity)
                        <tr>
                            <td>
                                <span class="color-blue cap-case">{{ $key+1 }} </span>
                            </td>
                            <td>
                                <span class="color-black cap-case"> {{ $amenity->name }} </span>
                            </td>
                            <td class="text-right">
                                <a href="{{env('APP_URL')}}/edit-amenity/{{$amenity->id}}">
                                    <button class="upper-case color-black">edit</button>
                                </a>
                                <span class="pack__table__separat"></span>
                                <a href="{{env('APP_URL')}}/delete-amenity/{{$amenity->id}}">
                                    <button class="upper-case color-red" onclick="return confirm('Are you sure?')">delete</button>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <h2>THERE IS NO DATA YET .. </h2>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div><!--End contentWrapper__content-->

@stop