@extends('Layout.app')

@section('main-content')

    <div class="panel-body">

        @include('admin.productAdmin.partials.heading')


        <div class="row setup-content" id="step-1">
            <div class="col-xs-10">
                <div class="col-md-12 well text-center">
                    <h1>Product Image</h1>

                    @if(isset($product_image))
                        Product image already exists
                        <div align="right" style="padding: 10px">
                            <a href="{{route('products.show',$productid)}}">
                                <span class=" btn btn-sm btn-success" title="Create new category">Show details</span>
                            </a>
                        </div>
                    @else


                        {!! Form::open(array('route'=>'product_image_add', 'method'=>'post','enctype'=>'multipart/form-data' ))!!}

                        {{ Form::hidden('product_id', $productid) }}

                        <div class="form-group ">
                            <label for="name" class="col-sm-4 control-label">Image</label>
                            <div class=" col-sm-8 ">
                                <span class="input-group-addon "><i class="fa fa-file"></i></span>
                                <input type="file" class="form-control" name="name[]" id="name" required autofocus
                                       multiple>
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
    </div>
@endsection