@extends('Layout.app')

@section('main-content')

    <div class="panel-body">


        <div class="col-md-8 col-md-offset-2 ">

            <h3>Create Capping</h3>
            <div class="box box-info clearfix pad ">

                {!! Form::open(array('route'=>'capping.store' ,'enctype'=>'multipart/form-data' ))!!}

                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }} clearfix">
                    <label for="type" class="col-sm-4 control-label">Type</label>

                    <div class="col-md-8 ">
                        <select id="type" name="type"
                                class=" form-control " required>
                                <option value="Gold">Gold</option>
                                <option value="Silver">Silver</option>
                        </select>
                    </div>

                </div>

                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} clearfix">
                    <label for="price" class="col-sm-4 control-label">Price</label>

                    <div class="col-sm-8">
                        <input id="price" type="number" class="form-control" name="price" value="{{ old('price') }}" required
                               autofocus>
                        @if ($errors->has('price'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('metal_quantity_used') ? ' has-error' : '' }} clearfix">
                    <label for="metal_quantity_used" class="col-sm-4 control-label">Metal Quantity</label>

                    <div class="col-sm-8">
                        <input id="metal_quantity_used" type="text" class="form-control" name="metal_quantity_used"
                               value="{{ old('metal_quantity_used') }}" required autofocus>

                        @if ($errors->has('metal_quantity_used'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('metal_quantity_used') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} clearfix">
                    <label for="description" class="col-sm-4 control-label">Description</label>

                    <div class="col-sm-8">
                        <textarea id="description" type="text" class="form-control" name="description"
                               value="{{ old('description') }}" required
                                  autofocus></textarea>

                        @if ($errors->has('description'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group ">
                    <label for="design_image" class="col-sm-4 control-label">Design Image</label>
                    <div class=" col-sm-8 ">
                        <span class="input-group-addon "><i class="fa fa-file"></i></span>
                        <input type="file" class="form-control" name="design_image" id="design_image" required autofocus>
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
                    {{Form::submit('Create', array('class'=>'btn btn-sm btn-primary ','title'=>'Save the Capping'))}}
                    <a type="button" class="btn btn-sm btn-warning" href="/admin/capping">Cancel</a>
                    {!! Form::close() !!}
                </div>


            </div>

@endsection