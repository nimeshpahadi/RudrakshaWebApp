@extends('Layout.app')

@section('main-content')

    <div class="panel-body">

        <div class="row setup-content" id="step-1">
            <div class="col-xs-10">
                <div class="col-md-12 well text-center">
                    <h1> Edit Category Benifits</h1>

                    {!! Form::model($beni,array('route'=>['category.benefit.update',$beni->id],'method'=>'PUT' ))!!}

                    {{ Form::hidden('category_id',$beni->category_id) }}

                    <div class="form-group{{ $errors->has('benefit_heading') ? ' has-error' : '' }} clearfix">
                        <label for="benefit_heading" class="col-sm-4 control-label">Benefit Head</label>

                        <div class="col-sm-8">
                            {{ Form::text('benefit_heading',null,array('class'=>'form-control'))}}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('benifit') ? ' has-error' : '' }} clearfix">
                        <label for="benifit" class="col-sm-4 control-label"> Health Benifits </label>
                        <div class="col-sm-8">
                            <div class="" id="room_fileds">
                                @foreach($beni->benefit as $list)
                                    <input id="more_fields" type="text" class="form-control"
                                           name='benefit[]'
                                           value="{{$list}}" autofocus>
                                @endforeach
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