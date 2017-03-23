@extends('Layout.app')

@section('main-content')

    <div class="panel-body">

        @include('admin.productAdmin.partials.heading')

        <div class="row setup-content" id="step-1">
            <div class="col-xs-10">
                <div class="col-md-12 well text-center">
                    <h1>Product Description</h1>

                    @if($productdesc)
                        Product Description already exists
                        <div align="right" style="padding: 10px">
                            <a href="{{route('products.show',$productid)}}">
                                <span class=" btn btn-sm btn-success" title="Create new category">Show details</span>
                            </a>
                        </div>
                    @else

                    {!! Form::open(array('route'=>'product_description_add', 'method'=>'post' ))!!}

                    {{ Form::hidden('product_id', $productid) }}

                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} clearfix">
                        <label for="description" class="col-sm-4 control-label">Description</label>

                        <div class="col-sm-8">
                            <input id="description" type="text" class="form-control" name="description"
                                   value="{{ old('description') }}" required
                                   autofocus>

                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }} clearfix">
                        <label for="information" class="col-sm-4 control-label">Information</label>

                        <div class="col-sm-8">
                         <textarea id="information" type="text" class="form-control" name="information"
                                   value="{{ old('information') }}" required autofocus></textarea>

                            @if ($errors->has('information'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('information') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>




                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('create', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the category'))}}
                        {!! Form::close() !!}

                    </div>
                        @endif
                </div>
            </div>


        </div>

@endsection