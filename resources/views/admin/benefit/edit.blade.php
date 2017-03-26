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


                    <div class="">
                        <label for="benefit" class="col-sm-4 control-label"> Benifits </label>


                               @foreach($beni->benefit as $list)
                            <div class=" formfield  col-sm-offset-4 col-sm-7">
                                    <input id="more_fields" type="text" class="form-control"
                                           name='benefit[]'
                                           value="{{$list}}" autofocus>
                            </div>
                            <div class="formfield"><button class="del">-</button></div>

                        @endforeach

                        <div class="example-template2">

                            <div class="formfield col-sm-offset-4 col-sm-7">
                                <input id="more_fields" type="text" class="form-control" name='benefit[]'
                                       required autofocus>
                            </div>
                            <div class="formfield"><button class="del">-</button></div>
                        </div>
                    </div>

                    <div class="edit-area2">
                        <div class="controls">
                            <button class="add">+</button>
                        </div>
                    </div>


                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('Save changes', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the Changes on Benefits'))}}
                        <a type="button" class="btn btn-sm btn-warning" href="/admin/category">Cancel</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

@endsection