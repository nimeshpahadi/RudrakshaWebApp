@extends('admin.Layout.app')

@section('main-content')

    <div class=" col-md-8 col-md-offset-2">
        <h3>Edit Currency</h3>
        <div class="box box-info clearfix pad">

            {!! Form::model($currencyid,array('route'=>['currency.update',$currencyid->id],'method'=>'PUT' ))!!}
            {{ csrf_field() }}
            {{Form::hidden('id',$currencyid->id)}}

            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} clearfix">
                <label for="code" class="col-sm-4 control-label">Code</label>

                <div class="col-sm-8">
                    {{ Form::text('code',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }} clearfix">
                <label for="currency" class="col-sm-4 control-label">Currency Name</label>

                <div class="col-sm-8">
                    {{ Form::text('currency',null,array('class'=>'form-control'))}}
                </div>
            </div>


            <div class="form-group{{ $errors->has('representation') ? ' has-error' : '' }} clearfix">
                <label for="representation" class="col-sm-4 control-label">Representation</label>

                <div class="col-sm-8">
                    {{ Form::text('representation',null,array('class'=>'form-control'))}}
                </div>
            </div>


            <div class="clearfix " align="right">
                {{Form::submit('Save Changes', array('class'=>'btn btn-primary btn-sm ','title'=>'Save the changes in the Currency'))}}
                <a type="button" class="btn btn-warning  btn-sm" href="/admin/currency">Cancel</a>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
@endsection
