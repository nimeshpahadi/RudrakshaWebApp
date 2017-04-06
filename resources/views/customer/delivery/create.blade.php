@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    <div class="panel-body">


        <div class="row setup-content" id="step-1">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12 well text-center">
                    <h1>Customer Delivery Address</h1>

                    {!! Form::open(array('route'=>'customers.delivery.store', 'method'=>'post' ))!!}

                    {{ Form::hidden('customer_id',$cusid->id) }}

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} clearfix">
                        <label for="country" class="col-sm-4 control-label">Country</label>
                        <?php $x = Config::get('country');?>
                        <div class="col-sm-8">
                            <select id="country_code" name="country" class="form-control" required>
                                <option selected="selected" disabled>Choose Country</option>
                                @foreach($x as $code=>$name)
                                    <option value="{{$code}}">
                                        {{$name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <?php $y = Config::get('country_code');?>
                    <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }} clearfix">
                        <label for="contact" class="col-sm-4 control-label">Contact</label>
                        <div class="col-sm-8">
                            <p class="col-sm-2 " id="country_dial"></p>
                            <input type="number" class="form-control col-sm-6" name="contact"
                                   value="{{ old('contact') }}" required autofocus>

                            @if ($errors->has('contact'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} clearfix">
                        <label for="state" class="col-sm-4 control-label">State</label>

                        <div class="col-sm-8">
                            <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}"
                                   required
                                   autofocus>

                            @if ($errors->has('state'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} clearfix">
                        <label for="city" class="col-sm-4 control-label">City</label>

                        <div class="col-sm-8">
                            <input id="city" type="text" class="form-control" name="city"
                                   value="{{ old('city') }}" required autofocus>

                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
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
                        <label for="address_line1" class="col-sm-4 control-label">Address Line 1</label>

                        <div class="col-sm-8">
                            <input id="address_line1" type="text" class="form-control" name="address_line1"
                                   value="{{ old('address_line1') }}"
                                   required
                                   autofocus>

                            @if ($errors->has('address_line1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address_line2') ? ' has-error' : '' }} clearfix">
                        <label for="address_line2" class="col-sm-4 control-label">Address Line 2</label>

                        <div class="col-sm-8">
                            <input id="address_line2" type="text" class="form-control" name="address_line2"
                                   value="{{ old('address_line2') }}"
                                   required
                                   autofocus>

                            @if ($errors->has('address_line2'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }} clearfix">
                        <label for="zip_code" class="col-sm-4 control-label">Zip-code</label>

                        <div class="col-sm-8">
                            <input id="zip_code" type="number" class="form-control" name="zip_code"
                                   value="{{ old('zip_code') }}"
                                   autofocus>

                            @if ($errors->has('zip_code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address_note') ? ' has-error' : '' }} clearfix">
                        <label for="address_note" class="col-sm-4 control-label">Address Note</label>

                        <div class="col-sm-8">
                            <textarea id="address_note" type="text" class="form-control" name="address_note"
                                      value="{{ old('address_note') }}" required autofocus></textarea>

                            @if ($errors->has('address_note'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address_note') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('create', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the Delivery Address'))}}
                        <a type="button" class="btn btn-sm btn-warning" href="/profile">Cancel</a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


        </div>


        @include('customer.map')


        <script type="text/javascript"
                src="http://maps.google.com/maps/api/js?key=AIzaSyDenLLrWG9iWZSXBXlJAAzqcNLgRlMFsRI"></script>

        <script src="{{ asset('js/map.js') }}"></script>
        <script>
            var countryCode = {!! json_encode(config('country_code')) !!};
        </script>


@endsection