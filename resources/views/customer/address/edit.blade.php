@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.notification')

    <div class=" col-md-8 col-md-offset-2">
        <h3>Edit Customer Address</h3>
        <div class="box box-info clearfix pad">

            {!! Form::model($userId, array('route'=>['customers.address.update', $userId->id], 'method'=>'PUT' ))!!}
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} clearfix">
                <label for="country" class="col-sm-4 control-label">Country</label>

                <?php $x = Config::get('country');?>
                <div class="col-sm-8">
                    <select name="country" class="form-control" required>
                        <option selected="selected" disabled>Choose Country</option>
                        @foreach($x as $code=>$name)
                            <option  value="{{$code}}" @if($userId->country==$code)selected @endif>
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


            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }} clearfix">
                <label for="street" class="col-sm-4 control-label">Street</label>

                <div class="col-sm-8">
                    {{ Form::text('street',null,array('class'=>'form-control'))}}
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
                    {{ Form::number('contact', null, array('class'=>'form-control'))}}
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

            <div class="clearfix " align="right">
                {{Form::submit('Save Changes', array('class'=>'btn btn-primary btn-sm ','title'=>'Save the changes in the address'))}}
                <a type="button" class="btn btn-warning  btn-sm" href="/customers">Cancel</a>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
    @include('customer.map')

    <script type="text/javascript"
            src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDenLLrWG9iWZSXBXlJAAzqcNLgRlMFsRI"></script>
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
