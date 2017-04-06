@extends('admin.Layout.app')

@section('main-content')

    <div class="panel-body">


        <div class="col-md-8 col-md-offset-2 ">

            <h3>Create Product Price</h3>
            <div class="box box-info clearfix pad ">

                {!! Form::open(array('route'=>'product_price.store' ))!!}

                <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }} clearfix form-group required">
                    <label for="product_id" class="col-sm-4 control-label">Product ID </label>

                    <div class="col-md-8 ">
                        <select id="product_id" name="product_id"
                                class=" form-control " required>

                            @foreach ($product as $pro)

                                <option value="{{$pro->id}}">
                                    {{$pro->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="form-group{{ $errors->has('currency_id') ? ' has-error' : '' }} clearfix form-group required">
                    <label for="currency_id" class="col-sm-4 control-label">Currency </label>

                    <div class="col-md-8 ">
                        <select id="currency_id" name="currency_id"
                                class=" form-control " required>

                            @foreach ($currency as $curen)

                                <option value="{{$curen->id}}">
                                    {{$curen->currency}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>


                <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }} clearfix form-group required">
                    <label for="price" class="col-sm-4 control-label">Price</label>

                    <div class="col-sm-8">
                        <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required
                               autofocus>

                        @if ($errors->has('price'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>


                <div class="clearfix pad"></div>
                <div align="right">
                    {{Form::submit('Create', array('class'=>'btn btn-sm btn-primary ','title'=>'Save the Currency'))}}
                    <a type="button" class="btn btn-sm btn-warning" href="/admin/product_price">Cancel</a>
                    {!! Form::close() !!}
                </div>


            </div>

@endsection