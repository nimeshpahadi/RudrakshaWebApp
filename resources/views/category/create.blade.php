@extends('Layout.app')

@section('main-content')

    <div class="panel-body">


        <div class="col-md-8 col-md-offset-2 ">

            <h3>Create Category</h3>
            <div class="box box-info clearfix pad ">

                {!! Form::open(array('route'=>'category.store' ))!!}

                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} clearfix">
                    <label for="code" class="col-sm-4 control-label">Code</label>

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

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} clearfix">
                    <label for="name" class="col-sm-4 control-label">Name</label>

                    <div class="col-sm-8">
                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                               autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }} clearfix">
                    <label for="short_description" class="col-sm-4 control-label">Short Description</label>

                    <div class="col-sm-8">
                        <input id="short_description" type="text" class="form-control" name="short_description"
                               value="{{ old('short_description') }}" required autofocus>
                        </input>
                        @if ($errors->has('short_description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('short_description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }} clearfix">
                    <label for="information" class="col-sm-4 control-label">Information</label>

                    <div class="col-sm-8">
                <textarea id="information" type="text" class="form-control" name="information"
                          value="{{ old('information') }}" required autofocus>
                </textarea>
                        @if ($errors->has('information'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('information') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('face_no') ? ' has-error' : '' }} clearfix">
                    <label for="face_no" class="col-sm-4 control-label">Face No.</label>

                    <div class="col-sm-8">
                        <input id="face_no" type="number" class="form-control" name="face_no"
                               value="{{ old('face_no') }}" required
                               autofocus>

                        @if ($errors->has('face_no'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('face_no') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} clearfix">
                    <label for="status" class="col-sm-4 control-label">Status</label>

                    <div class="checkbox col-sm-8">

                        <label>
                            <input name="status" type="radio" value="1" checked>
                            Active
                        </label>
                        <label>
                            <input name="status" type="radio" value="0">
                            Inactive
                        </label>
                    </div>
                </div>


                <div class="clearfix pad"></div>
                <div align="right">
                    {{Form::submit('Create', array('class'=>'btn btn-sm btn-primary ','title'=>'Save the category'))}}
                    <a type="button" class="btn btn-sm btn-warning" href="/category">Cancel</a>
                    {!! Form::close() !!}
                </div>


            </div>

@endsection