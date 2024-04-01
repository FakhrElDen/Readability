@extends('dashboard.layout')
@section('header')
    <div class="contentWrapper__right__heading">
        <h1 class="color-black cap-case">Edit City</h1>
    </div>

@stop
@section('content')

    <div class="contentWrapper__content"><!--Start contentWrapper__content-->
        <div class="contentWrapper__content__form">

            <form action="{{env('APP_URL')}}/update-city/{{$city->id}}" method="POST">
                {{ @csrf_field() }}
                <h4 class="contentWrapper__content__form__div__heading cap-case color-blue">City Name</h4>
                <div class="contentWrapper__content__form__div">
                    <p style="color:red"> @error('name') {{$message}} @enderror </p>
                    <label class="cap-case"> City name </label>
                    <input type="text" value="{{$city->name}}" name="name" id="" class="form-control">
                </div>
                <div class="contentWrapper__content__form__ctrls">
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