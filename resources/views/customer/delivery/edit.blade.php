@extends('layouts.app')

@section('content')
@include('layouts.navbar')
    <div class=" col-md-8 col-md-offset-2">
        <h3>Edit Delivery Address</h3>
        <div class="box box-info clearfix pad">

            {!! Form::model($customerDelivery,array('route'=>['deliveryaddress.update',$customerDelivery->id],'method'=>'PUT' ))!!}
            {{ csrf_field() }}
{{--{{dd($customerDelivery)}}--}}
{{Form::hidden('customer_id',$customerDelivery->customer_id)}}
            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} clearfix">
                <label for="country" class="col-sm-4 control-label">Country</label>

                <?php $x = Config::get('country');?>
                <div class="col-sm-8">
                    <select name="country" class="form-control" required>
                        <option selected="selected" disabled>Choose Country</option>
                        @foreach($x as $code=>$name)
                            <option  value="{{$code}}" @if($customerDelivery->country==$code)selected @endif>
                                {{$name}}
                            </option>
                        @endforeach

                    </select>
                </div>
            </div>

            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} clearfix">
                <label for="state" class="col-sm-4 control-label">State</label>

                <div class="col-sm-8">
                    {{ Form::text('state',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} clearfix">
                <label for="city" class="col-sm-4 control-label">City</label>

                <div class="col-sm-8">
                    {{ Form::text('city',null,array('class'=>'form-control'))}}
                </div>
            </div>
            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }} clearfix">
                <label for="contact" class="col-sm-4 control-label">Contact</label>
                <div class="col-sm-8">
                    {{ Form::text('contact',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group clearfix">
                <label for="latitude_long" class="col-sm-4 control-label">Latitude/Latitude</label>

                <div class="col-sm-8">
                    <input type="text" class="form-control" name="latitude_long"
                           placeholder="latitude,longitude"
                           id="latlong-info"
                           data-toggle="modal"
                           data-target="#myModal"
                           required autofocus>

                </div>
            </div>
            <div class="form-group{{ $errors->has('address_line1') ? ' has-error' : '' }} clearfix">
                <label for="address_line1" class="col-sm-4 control-label">Address line 1</label>
                <div class="col-sm-8">
                    {{ Form::text('address_line1',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('address_line2') ? ' has-error' : '' }} clearfix">
                <label for="address_line2" class="col-sm-4 control-label">Address line 2</label>
                <div class="col-sm-8">
                    {{ Form::text('address_line2',null,array('class'=>'form-control'))}}
                </div>
            </div>
            <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }} clearfix">
                <label for="zip_code" class="col-sm-4 control-label">Zip-code</label>
                <div class="col-sm-8">
                    {{ Form::number('zip_code',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('address_note') ? ' has-error' : '' }} clearfix">
                <label for="address_note" class="col-sm-4 control-label">Address Note</label>
                <div class="col-sm-8">
                    {{ Form::textarea('address_note',null,array('class'=>'form-control', 'style'=>"height: 50px"))}}
                </div>
            </div>

            <div class="clearfix " align="right">
                {{Form::submit('Save Changes', array('class'=>'btn btn-primary btn-sm ','title'=>'Save  changes on your delivery address'))}}
                <a type="button" class="btn btn-warning  btn-sm" href="/profile">Cancel</a>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
@include('customer.map')

<script type="text/javascript"
        src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDenLLrWG9iWZSXBXlJAAzqcNLgRlMFsRI"></script>
<script src="{{ asset('js/map.js') }}"></script>
@endsection
