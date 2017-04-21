@extends('shop.layout.app')

@section('main-content')
    @include('shop.layout.breadcrum')
    <section id="delivery-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 delivery-detail">
                    <div class="row">

                        <h3>Edit Delivery Address</h3>

                        {!! Form::model($customerDelivery,array('route'=>['deliveryaddress.update',$customerDelivery->id],'method'=>'PUT' ))!!}
                        {{ csrf_field() }}

                        {{Form::hidden('customer_id',$customerDelivery->customer_id)}}

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
                                        <option value="{{$code}}" @if($customerDelivery->country==$code)selected @endif>
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
                        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="zip_code" class="country-name">Zip Code<span class="delivery-star"> * </span></label>
                                {{ Form::number('zip_code',null,array('class'=>''))}}
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('address_line1') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="address_line1" class="country-name">Address line 1<span class="delivery-star"> * </span></label>
                                {{ Form::text('address_line1',null,array('class'=>''))}}
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('address_line2') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="address_line2" class="country-name">Address line 2<span class="delivery-star"> * </span></label>
                                {{ Form::text('address_line2',null,array('class'=>''))}}
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('address_note') ? ' has-error' : '' }} ">
                            <p class="message_wrapper">
                                <label for="address_note" class="country-name">Address Note<span class="delivery-star"> * </span></label>
                                {{ Form::textarea('address_note',null,array('class'=>''))}}
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
