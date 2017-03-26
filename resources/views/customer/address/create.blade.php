@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('layouts.notification')

    <div class="panel-body">

        <div class="col-md-8 col-md-offset-2 $address">

            <h3>Create Customer Address</h3>
            <div class="box box-info clearfix pad ">

                {!! Form::open(array('route'=>'customers.address.store'))!!}

                {{ Form::hidden('customer_id', $user->id) }}

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
                        <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required
                               autofocus>

                        @if ($errors->has('state'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }} clearfix">
                    <label for="street" class="col-sm-4 control-label">Street</label>

                    <div class="col-sm-8">
                        <input id="street" type="text" class="form-control" name="street"
                               value="{{ old('street') }}" required autofocus>
                        </input>
                        @if ($errors->has('street'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }} clearfix">
                    <label for="contact" class="col-sm-4 control-label">Contact</label>

                    <div class="col-sm-8">
                <input id="contact" type="number" class="form-control" name="contact"
                          value="{{ old('contact') }}" required autofocus>
                        @if ($errors->has('contact'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('latitude_long') ? ' has-error' : '' }} clearfix">
                    <label for="latitude_long" class="col-sm-4 control-label">Latitude_Long</label>

                    <div class="col-sm-8">
                        <input id="latitude_long" type="number" class="form-control" name="latitude_long"
                               value="{{ old('latitude_long') }}" required
                               autofocus>

                        @if ($errors->has('latitude_long'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('latitude_long') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="clearfix pad"></div>
                <div align="right">
                    {{Form::submit('Create', array('class'=>'btn btn-sm btn-primary ','title'=>'create customer address'))}}
                    <a type="button" class="btn btn-sm btn-warning" href="/customers">Cancel</a>
                    {!! Form::close() !!}
                </div>

            </div>

@endsection