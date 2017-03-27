@extends('layouts.app')

@section('content')
@include('layouts.navbar')
    <div class="panel-body">



        <div class="row setup-content" id="step-1">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-12 well text-center">
                    <h1>Customer Delivery Date</h1>

                    {!! Form::open(array('route'=>'customers.delivery.store', 'method'=>'post' ))!!}

                        {{ Form::hidden('customer_id',$cusid->id) }}

                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }} clearfix">
                        <label for="country" class="col-sm-4 control-label">Country</label>

                        <?php $x = Config::get('country');?>

                        <div class="col-sm-8">
                        <select name="country" class="form-control" required>
                            <option selected="selected" disabled>Choose Country</option>
                            @foreach($x as $code=>$name)
                                <option value="{{$code}}">
                                    {{$name}}
                                </option>
                            @endforeach

                        </select>
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



                                <div class="form-group{{ $errors->has('latitude_long') ? ' has-error' : '' }} clearfix">
                        <label for="latitude_long" class="col-sm-4 control-label">Latitude/Latitude</label>

                        <div class="col-sm-8">
                            <input id="latitude_long" type="text" class="form-control" name="latitude_long"
                                   value="{{ old('latitude_long') }}" required autofocus>

                            @if ($errors->has('latitude_long'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('latitude_long') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address_line1') ? ' has-error' : '' }} clearfix">
                        <label for="address_line1" class="col-sm-4 control-label">Address Line 1</label>

                        <div class="col-sm-8">
                            <input id="address_line1" type="text" class="form-control" name="address_line1" value="{{ old('address_line1') }}"
                                   required
                                   autofocus >

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
                            <input id="address_line2" type="text" class="form-control" name="address_line2" value="{{ old('address_line2') }}"
                                   required
                                   autofocus >

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






                    <button type="button" class="btn btn-info  col-md-offset-10" data-toggle="modal"
                            data-target="#myModal">Choose location
                    </button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Choose location</h4>
                                </div>

                                <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                                <script type="text/javascript">
                                    var geocoder = new google.maps.Geocoder();

                                    function geocodePosition(pos) {
                                        geocoder.geocode({
                                            latLng: pos
                                        }, function(responses) {
                                            if (responses && responses.length > 0) {
                                                updateMarkerAddress(responses[0].formatted_address);
                                            } else {
                                                updateMarkerAddress('Cannot determine address at this location.');
                                            }
                                        });
                                    }

                                    function updateMarkerStatus(str) {
                                        document.getElementById('markerStatus').innerHTML = str;
                                    }

                                    function updateMarkerPosition(latLng) {
                                        document.getElementById('info').innerHTML = [
                                            latLng.lat(),
                                            latLng.lng()
                                        ].join(', ');
                                    }

                                    function updateMarkerAddress(str) {
                                        document.getElementById('address').innerHTML = str;
                                    }

                                    function initialize() {
                                        var latLng = new google.maps.LatLng(27.6981, 85.3592);
                                        var map = new google.maps.Map(document.getElementById('mapCanvas'), {
                                            zoom: 10,
                                            center: latLng,
                                            mapTypeId: google.maps.MapTypeId.ROADMAP
                                        });
                                        var marker = new google.maps.Marker({
                                            position: latLng,
                                            title: 'Point A',
                                            map: map,
                                            draggable: true
                                        });

                                        // Update current position info.
                                        updateMarkerPosition(latLng);
                                        geocodePosition(latLng);

                                        // Add dragging event listeners.
                                        google.maps.event.addListener(marker, 'dragstart', function() {
                                            updateMarkerAddress('Dragging...');
                                        });

                                        google.maps.event.addListener(marker, 'drag', function() {
                                            updateMarkerStatus('Dragging...');
                                            updateMarkerPosition(marker.getPosition());
                                        });

                                        google.maps.event.addListener(marker, 'dragend', function() {
                                            updateMarkerStatus('Drag ended');
                                            geocodePosition(marker.getPosition());
                                        });
                                    }

                                    // Onload handler to fire off the app.
                                    google.maps.event.addDomListener(window, 'load', initialize);


//                                    $('#myModal').on('shown.bs.modal', function () {
//                                        initializeMap() // with initializeMap function get map.
//                                    });
                                    $("#myModal").on("shown.bs.modal", function () {initialize();});

//                                    $('#myModal').on('shown', function () {
//                                        initialize();
//                                    });
                                </script>


                                <div id="mapCanvas"></div>
                                <div id="infoPanel">
                                    <b>Marker status:</b>
                                    <div id="markerStatus"><i>Click and drag the marker.</i></div>
                                    <b>Current position:</b>
                                    <div id="info"></div>
                                    <b>Closest matching address:</b>
                                    <div id="address"></div>
                                </div>





                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>










                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('create', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the Delivery Address'))}}
                        <a type="button" class="btn btn-sm btn-warning" href="/customers">Cancel</a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


        </div>

@endsection