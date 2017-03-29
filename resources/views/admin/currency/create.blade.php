@extends('admin.Layout.app')

@section('main-content')

    <div class="panel-body">


        <div class="col-md-8 col-md-offset-2 ">

            <h3>Create Currency</h3>
            <div class="box box-info clearfix pad ">

                {!! Form::open(array('route'=>'currency.store' ))!!}

                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} clearfix">
                    <label for="code" class="col-sm-4 control-label">Currency Code</label>

                    <div class="col-sm-8">
                        <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required
                               autofocus>

                        @if ($errors->has('code'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }} clearfix">
                    <label for="currency" class="col-sm-4 control-label">Currency Name</label>

                    <div class="col-sm-8">
                        <input id="currency" type="text" class="form-control" name="currency" value="{{ old('currency') }}" required
                               autofocus>

                        @if ($errors->has('currency'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('representation') ? ' has-error' : '' }} clearfix">
                    <label for="representation" class="col-sm-4 control-label">Currency Representation</label>

                    <div class="col-sm-8">
                        <input id="representation" type="text" class="form-control" name="representation" value="{{ old('representation') }}" required
                               autofocus>

                        @if ($errors->has('representation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('representation') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="clearfix pad"></div>
                <div align="right">
                    {{Form::submit('Create', array('class'=>'btn btn-sm btn-primary ','title'=>'Save the Currency'))}}
                    <a type="button" class="btn btn-sm btn-warning" href="/admin/currency">Cancel</a>
                    {!! Form::close() !!}
                </div>


            </div>

@endsection