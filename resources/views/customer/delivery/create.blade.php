@extends('shop.layout.app')

@section('main-content')

    <section id="delivery-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 delivery-detail">
                    <div class="row">
                        <h2>Delivery Address form</h2>

                        {!! Form::open(array('route'=>'customers.delivery.store', 'method'=>'post' ))!!}

                        {{ Form::hidden('customer_id',$cusid->id) }}

                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} ">
                        <p class="level_wrapper">
                                <label class="country-name" for="country">Country name <span class="delivery-star"> * </span></label>
                                </br>

                            <?php $x = Config::get('country');?>
                            <select id="first-disabled" class="selectpicker" data-hide-disabled="true" data-live-search="true"  name="country">
                                <option selected="selected" disabled>Choose Country</option>
                                @foreach($x as $code=>$name)
                                    <option value="{{$code}}">
                                        {{$name}}
                                    </option>
                                @endforeach
                            </select>

                            </p>
                        </div>


                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="state" class="country-name">State <span class="delivery-star"> * </span></label>
                                </br>
                                <input type="text"  name="state"
                                       value="{{ old('state') }}" required autofocus>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="city" class="country-name">City <span class="delivery-star"> * </span></label>
                                </br>
                                <input type="text"  name="city"
                                       value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="zip_code" class="country-name">Zip code<span class="delivery-star"> * </span></label>
                                </br>
                                <input type="number"  name="zip_code"
                                       value="{{ old('zip_code') }}" required autofocus>

                                @if ($errors->has('zip_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>

                        <div class="form-group ">
                            <p class="level_wrapper">
                            <label for="latitude_long"  class="country-name" >Geo-Coordinate<span class="delivery-star"> * </span> </label>
                                </br>
                                <input type="text" class="form-control" name="latitude_long"
                                       placeholder="latitude,longitude"
                                       id="latlong-info"
                                       data-toggle="modal"
                                       data-target="#myModal"
                                       required autofocus>
                            </p>

                        </div>

                        <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="contact" class="country-name">Contact <span class="delivery-star"> * </span></label>
                                </br>
                                <input type="number"  name="contact"
                                       value="{{ old('contact') }}" placeholder="without the country code" required autofocus>

                                @if ($errors->has('contact'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('address_line1') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="address_line1" class="country-name">Address Line 1 <span class="delivery-star"> * </span></label>
                                </br>
                                <input type="text"  name="address_line1"
                                       value="{{ old('address_line1') }}" required autofocus>

                                @if ($errors->has('address_line1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line1') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('address_line2') ? ' has-error' : '' }} ">
                            <p class="level_wrapper">
                                <label for="address_line2" class="country-name">Address Line 2 <span class="delivery-star"> * </span></label>
                                </br>
                                <input type="text"  name="address_line2"
                                       value="{{ old('address_line2') }}" required autofocus>

                                @if ($errors->has('address_line2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line2') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>
                        <div class="form-group{{ $errors->has('address_note') ? ' has-error' : '' }} ">
                            <p class="message_wrapper">
                                <label for="address_note" class="country-name">Address Note <span class="delivery-star"> * </span></label>
                                </br>
                                <textarea type="text"   class="delivery-control" name="address_note"
                                          value="{{ old('address_note') }}" required autofocus></textarea>

                                @if ($errors->has('address_note'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_note') }}</strong>
                                    </span>
                                @endif
                            </p>
                        </div>

                        {{Form::submit('create', array('class'=>'btn btn-primary col-sm-2 ','title'=>'Save the Delivery Address'))}}

                        <a type="button" class="btn btn-warning" href="/profile">Cancel</a>
                        {!! Form::close() !!}


                    </div>
                </div>
            </div>
        </div>

    </section>

    @include('customer.map')

    <script type="text/javascript"
            src="http://maps.google.com/maps/api/js?key=AIzaSyDenLLrWG9iWZSXBXlJAAzqcNLgRlMFsRI"></script>

    <script src="{{ asset('js/map.js') }}"></script>
    <script>
        var countryCode = {!! json_encode(config('country_code')) !!};
    </script>

@endsection
