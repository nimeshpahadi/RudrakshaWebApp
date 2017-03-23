@extends('Layout.app')

@section('main-content')

    <div class="panel-body">

        @include('admin.productAdmin.partials.heading')

        <div class="row setup-content" id="step-1">
            <div class="col-xs-10">
                <div class="col-md-12 well text-center">
                    <h1>Product Description</h1>

                    {!! Form::model($desc,array('route'=>['product_desc_update',$desc],'method'=>'PUT' ))!!}

                    {{ Form::hidden('product_id', $desc->product_id) }}


                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} clearfix">
                        <label for="description" class="col-sm-4 control-label">Description</label>

                        <div class="col-sm-8">
                            {{ Form::text('description',null,array('class'=>'form-control'))}}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }} clearfix">
                        <label for="information" class="col-sm-4 control-label">Information</label>

                        <div class="col-sm-8">
                            {{ Form::text('information',null,array('class'=>'form-control'))}}
                        </div>
                    </div>



                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('Save Changes', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the category'))}}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


        </div>

@endsection