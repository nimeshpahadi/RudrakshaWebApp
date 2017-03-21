@extends('Layout.app')

@section('main-content')

    <div class=" col-md-8 col-md-offset-2">
        <h3>Edit Category</h3>
        <div class="box box-info clearfix pad">

            {!! Form::model($cat_id,array('route'=>['category.update',$cat_id->id],'method'=>'PUT' ))!!}
            {{ csrf_field() }}


            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} clearfix">
                <label for="code" class="col-sm-4 control-label">Code</label>

                <div class="col-sm-8">
                    {{ Form::text('code',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} clearfix">
                <label for="name" class="col-sm-4 control-label">Name</label>

                <div class="col-sm-8">
                    {{ Form::text('name',null,array('class'=>'form-control'))}}
                </div>
            </div>


            <div class="form-group{{ $errors->has('short_description') ? ' has-error' : '' }} clearfix">
                <label for="short_description" class="col-sm-4 control-label">Short Description</label>

                <div class="col-sm-8">
                    {{ Form::text('short_description',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }} clearfix">
                <label for="information" class="col-sm-4 control-label">Information</label>

                <div class="col-sm-8">
                    {{ Form::textarea('information',null,array('class'=>'form-control'))}}
                </div>
            </div>

            <div class="form-group{{ $errors->has('face_no') ? ' has-error' : '' }} clearfix">
                <label for="face_no" class="col-sm-4 control-label">Face No.</label>

                <div class="col-sm-8">
                    {{ Form::number('face_no',null,array('class'=>'form-control'))}}
                </div>
            </div>
            <div class="form-group{{ $errors->has('face_no') ? ' has-error' : '' }} clearfix">
                <label for="face_no" class="col-sm-4 control-label">Mantra</label>

                <div class="col-sm-8">
                    {{ Form::testarea('mantra',null,array('class'=>'form-control'))}}
                </div>
            </div>


            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} clearfix">
                <label for="status" class="col-sm-4 control-label">Status</label>

                <div class="checkbox col-sm-8">

                    <label>

                        <input name="status" type="radio" value="1" @if($cat_id->status==true) checked @endif>
                        Active
                    </label>

                    <label>
                        <input name="status" type="radio" value="0" @if($cat_id->status==false) checked @endif>
                        Inactive
                    </label>
                </div>
            </div>


            <div class="clearfix " align="right">
                {{Form::submit('Save Changes', array('class'=>'btn btn-primary btn-sm ','title'=>'Save the changes in the product'))}}
                <a type="button" class="btn btn-warning  btn-sm" href="/product">Cancel</a>
                {!! Form::close() !!}
            </div>

        </div>

    </div>
@endsection
