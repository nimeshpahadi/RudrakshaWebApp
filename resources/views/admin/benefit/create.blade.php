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

                    <div class="">
                        <label for="benefit" class="col-sm-4 control-label"> Benifits </label>
                        <div class="col-sm-7">
                        <input id="more_fields" type="text" class="form-control" name='benefit[]'
                        required autofocus>
                        </div>

                        <div class="example-template">

                            <div class="formfield col-sm-offset-4 col-sm-7">
                                <input id="more_fields" type="text" class="form-control" name='benefit[]'
                                       required autofocus>
                            </div>
                            <div class="formfield"><span class="del btn btn-info">-</span></div>
                        </div>
                    </div>

                    <div class="edit-area">
                        <div class="controls">
                            <span class="add btn btn-info">+</span>
                        </div>
                    </div>

                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('create', array('class'=>'btn btn-sm btn-primary ','title'=>'Save the category'))}}
                        <a type="button" class="btn btn-sm btn-warning" href="/admin/category">Cancel</a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


        </div>



@endsection