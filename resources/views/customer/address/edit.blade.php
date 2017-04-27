@extends('shop.layout.app')

@section('main-content')
    <section id="delivery-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 delivery-detail">
                    <div class="row">

        <h3>Edit Customer Address</h3>
        <div class="box box-info clearfix pad">

            {!! Form::model($userId, array('route'=>['customers.address.update', $userId->id], 'method'=>'PUT' ))!!}
            {{ csrf_field() }}



            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} ">
                <p class="level_wrapper">
                    <label class="country-name" for="country">Country name <span
                                class="delivery-star"> * </span></label>
                    </br>

                    <?php $x = Config::get('country');?>
                    <select id="first-disabled" class="selectpicker" data-hide-disabled="true"
                            data-live-search="true" name="country">
                        <option selected="selected" disabled>Choose Country</option>
                        @foreach($x as $code=>$name)
                            <option  value="{{$code}}" @if($userId->country==$code)selected @endif>
                                {{$name}}
                            </option>
                        @endforeach
                    </select>

                </p>
            </div>

            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} ">
                <p class="level_wrapper">
                    <label for="state" class="country-name">State<span class="delivery-star"> * </span></label>
                    {{ Form::text('state',null,array('class'=>''))}}
                </p>
            </div>
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} ">
                <p class="level_wrapper">
                    <label for="city" class="country-name">City<span class="delivery-star"> * </span></label>
                    {{ Form::text('city',null,array('class'=>''))}}
                </p>
            </div>
            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }} ">
                <p class="level_wrapper">
                    <label for="street" class="country-name">Street<span class="delivery-star"> * </span></label>
                    {{ Form::text('street',null,array('class'=>''))}}
                </p>
            </div>
            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }} ">
                <p class="level_wrapper">
                    <label for="contact" class="country-name">Contact<span class="delivery-star"> * </span></label>
                    {{ Form::number('contact',null,array('placeholder'=>'Without the country code'))}}
                </p>
            </div>

            <div class="form-group ">
                <p class="level_wrapper">
                    <label for="latitude_long" class="country-name" >Geo-Coordinate</label>
                    <input type="text" class="form-control" name="latitude_long"
                           placeholder="latitude,longitude"
                           id="latlong-info"
                           data-toggle="modal"
                           data-target="#myModal"
                           required autofocus>
                </p>
            </div>


            {{Form::submit('Save Changes', array('class'=>'btn btn-primary col-sm-2 ','title'=>'Save  changes on your delivery address'))}}
            <a type="button" class="btn btn-warning " href="/profile">Cancel</a>
            {!! Form::close() !!}
        </div>

                    </div>
                    @include('customer.map')

                    <script type="text/javascript"
                            src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDenLLrWG9iWZSXBXlJAAzqcNLgRlMFsRI"></script>
                    <script src="{{ asset('js/map.js') }}"></script>
                    @endsection



