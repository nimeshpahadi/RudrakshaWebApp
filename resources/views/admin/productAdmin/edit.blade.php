@extends('Layout.app')

@section('main-content')

    <div class="panel-body">

        @include('admin.productAdmin.partials.heading')


            <div class="row setup-content" id="step-1">
                <div class="col-xs-10">
                    <div class="col-md-12 well text-center">
                        <h1>Edit Product Info</h1>

                        {!! Form::model($pro_id,array('route'=>['product.update',$pro_id->id],'method'=>'PUT' ))!!}

                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} clearfix">
                            <label for="category_id" class="col-sm-4 control-label">Warehouse </label>

                            <div class="col-md-8 warehouse">
                                <select id="category_id" name="category_id"
                                        class=" form-control warehouse"  required>

                                    @foreach ($category as $cat)

                                        <option value="{{$cat->id}}">
                                            {{$cat->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


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

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} clearfix">
                            <label for="price" class="col-sm-4 control-label">Price</label>

                            <div class="col-sm-8">
                                {{ Form::text('price',null,array('class'=>'form-control'))}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }} clearfix">
                            <label for="rank" class="col-sm-4 control-label">Rank</label>

                            <div class="col-sm-8">
                                {{ Form::text('rank',null,array('class'=>'form-control'))}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }} clearfix">
                            <label for="tag" class="col-sm-4 control-label">Tag</label>

                            <div class="col-sm-8">
                                {{ Form::text('tag',null,array('class'=>'form-control'))}}
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }} clearfix">
                            <label for="discount" class="col-sm-4 control-label">Discount</label>

                            <div class="col-sm-8">
                                {{ Form::text('discount',null,array('class'=>'form-control'))}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('available_quantity') ? ' has-error' : '' }} clearfix">
                            <label for="available_quantity" class="col-sm-4 control-label">Available Quantity</label>

                            <div class="col-sm-8">
                                {{ Form::text('quantity_available',null,array('class'=>'form-control'))}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} clearfix">
                            <label for="status" class="col-sm-4 control-label">Status</label>

                            <div class="checkbox col-sm-8">

                                <label>

                                    <input name="status" type="radio" value="1" @if($pro_id->status==true) checked @endif>
                                    Active
                                </label>

                                <label>
                                    <input name="status" type="radio" value="0"  @if($pro_id->status==false) checked @endif>
                                    Inactive
                                </label>
                            </div>
                        </div>



                        <div class="clearfix pad"></div>
                        <div align="right" >
                            {{Form::submit('Save Changes', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the category'))}}
                            {!! Form::close() !!}

                    </div>
                </div>
            </div>







    </div>

    @endsection