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

                <div class="col-sm-8">
                    {{ Form::text('country',null,array('class'=>'form-control'))}}
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

            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }} clearfix">
                <label for="contact" class="col-sm-4 control-label">Contact</label>

                <div class="col-sm-8">
                    {{ Form::number('contact', null, array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('latitude_long') ? ' has-error' : '' }} clearfix">
                <label for="latitude_long" class="col-sm-4 control-label">Latitude_Long</label>

                <div class="col-sm-8">
                    {{ Form::number('latitude_long',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="clearfix " align="right">
                {{Form::submit('Save Changes', array('class'=>'btn btn-primary btn-sm ','title'=>'Save the changes in the address'))}}
                <a type="button" class="btn btn-warning  btn-sm" href="/customers">Cancel</a>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
@endsection
