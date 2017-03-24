@extends('Layout.app')

@section('main-content')

    <div class="panel-body">


        <div class="row setup-content" id="step-1">
            <div class="col-xs-10">
                <div class="col-md-12 well text-center">
                    <h1>Category Benifits</h1>

                    {!! Form::open(array('route'=>'category.benefit.store', 'method'=>'post' ))!!}

                    {{ Form::hidden('category_id',$id) }}
                    <div class="form-group{{ $errors->has('benefit_heading') ? ' has-error' : '' }} clearfix">
                        <label for="benefit_heading" class="col-sm-4 control-label">Benefit Head</label>

                        <div class="col-sm-8">
                            <input id="benefit_heading" type="text" class="form-control" name="benefit_heading"
                                   value="{{ old('benefit_heading') }}"
                                   required
                                   autofocus>
                            @if ($errors->has('benefit_heading'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('benefit_heading') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('benefit') ? ' has-error' : '' }} clearfix">
                        <label for="benefit" class="col-sm-4 control-label"> Benifits </label>

                        <div class="col-sm-8">

                            <div class="" id="room_fileds">
                                <input id="more_fields" type="text" class="form-control" name='benefit[]'
                                       autofocus>
                            </div>
                            <input type="button" id="more_fields" onclick="add_fields();" value="Add More"/>

                        </div>
                    </div>


                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('create', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the category'))}}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


        </div>

@endsection