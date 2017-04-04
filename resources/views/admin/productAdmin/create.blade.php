@extends('admin.Layout.app')

@section('main-content')

    <div class="panel-body">

        @include('admin.productAdmin.partials.heading')


        <div class="row setup-content" id="step-1">
            <div class="col-xs-10">
                <div class="col-md-12 well text-center">
                    <h1>Product Info</h1>

                    {!! Form::open(array('route'=>'products.store', 'method'=>'post' ))!!}

                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }} clearfix form-group required">
                        <label for="category_id" class="col-sm-4 control-label">Category ID </label>

                        <div class="col-md-8 ">
                            <select id="category_id" name="category_id"
                                    class=" form-control " required>

                                @foreach ($category as $cat)

                                    <option value="{{$cat->id}}">
                                        {{$cat->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }} clearfix form-group required">
                        <label for="code" class="col-sm-4 control-label">Code</label>

                        <div class="col-sm-8">
                            <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}"
                                   required autofocus>

                            @if ($errors->has('code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} clearfix form-group required">
                        <label for="name" class="col-sm-4 control-label">Name</label>

                        <div class="col-sm-8">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                   required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('rank') ? ' has-error' : '' }} clearfix form-group required">
                        <label for="rank" class="col-sm-4 control-label">Rank</label>

                        <div class="col-sm-8">
                            <input id="rank" type="number" class="form-control" name="rank"
                                   value="{{ old('rank') }}" required autofocus>

                            @if ($errors->has('rank'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('rank') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }} clearfix form-group required">
                        <label for="tag" class="col-sm-4 control-label">Tags</label>

                        <div class="col-sm-8">
                            <input id="tag" type="text" class="form-control" name="tag" value="{{ old('tag') }}"
                                   required
                                   autofocus placeholder="insert tags seperated by comma (,)">

                            @if ($errors->has('tag'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }} clearfix">
                        <label for="discount" class="col-sm-4 control-label">Discount</label>

                        <div class="col-sm-8">
                            <input id="discount" type="number" class="form-control" name="discount"
                                   value="{{ old('discount') }}"
                                   autofocus>

                            @if ($errors->has('discount'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('discount') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('quantity_available') ? ' has-error' : '' }} clearfix form-group required">
                        <label for="quantity_available" class="col-sm-4 control-label">Quantity Available</label>

                        <div class="col-sm-8">
                            <input id="quantity_available" type="number" class="form-control" name="quantity_available"
                                   value="{{ old('quantity_available') }}" required
                                   autofocus>

                            @if ($errors->has('quantity_available'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('quantity_available') }}</strong>
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
                        {{Form::submit('create', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the category'))}}
                        <a type="button" class="btn btn-sm btn-warning" href="/admin/products">Cancel</a>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


        </div>

@endsection