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






                    {{--<button type="button" class="btn btn-info  col-md-offset-10" data-toggle="modal"--}}
                            {{--data-target="#myModal">Choose location--}}
                    {{--</button>--}}

                    {{--<!-- Modal -->--}}
                    {{--<div id="myModal" class="modal fade" role="dialog">--}}
                        {{--<div class="modal-dialog">--}}

                            {{--<!-- Modal content-->--}}
                            {{--<div class="modal-content">--}}
                                {{--<div class="modal-header">--}}
                                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                    {{--<h4 class="modal-title">Choose location</h4>--}}
                                {{--</div>--}}
                                            {{--@include('customer.map')--}}
                                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close--}}
                                    {{--</button>--}}

                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}


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