@extends('admin.Layout.app')

@section('main-content')


    @if(isset($productid))
        <div class="panel panel-success pad ">
            <div class="panel-heading "><h5>Product Info</h5>
            </div>
            <a href="{{route('products.edit',$productid->id)}}">
                <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                        data-placement="top" data-content="Edit the current category"><i class="fa fa-edit"></i>
                </button>
            </a>

            {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $productid->id]]) !!}
            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash pad" data-toggle="popover"
                    data-trigger="hover"
                    data-placement="top" data-content="Delete the current product"
                    onclick="return confirm('Are you sure you want to delete this item?');">

            </button>
            {!! Form::close() !!}

            <div class="row">
                <label class="col-sm-6 "> Code :</label>
                {{$productid->code}}
            </div>

            <div class="row">
                <label class="col-sm-6 "> Name :</label>
                {{$productid->name}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Price:</label>
                {{$productid->price}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Rank :</label>
                {{$productid->rank}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Tags :</label>
                {{ join(",",$productid['tag'])}}
            </div>
            @if(isset($productid->discount))
                <div class="row">
                    <label class="col-sm-6 "> Discount :</label>
                    {{$productid->discount}}
                </div>
            @endif
            <div class="row">
                <label class="col-sm-6 "> Quantity Available :</label>
                {{$productid->quantity_available}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Status:</label>
                @if($productid->status==1)
                    Active
                @else
                    In-active
                @endif
            </div>
        </div>
    @endif


    <div class="panel panel-info">
        <div class="panel-heading">Product Description</div>
        <div class="panel-body">
            @if(!isset($product_desc))
                <div align="right" style="padding: 10px">
                    <a href="{{route('product_description',$productid->id)}}">
                        <span class=" btn btn-sm btn-success" title="Create new category">Add Description</span>
                    </a>
                </div>
            @else
                <div class="row">
                    <a href="{{route('product_desc_edit',$productid->id)}}">
                        <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                                data-placement="top" data-content="Edit the current category"><i class="fa fa-edit"></i>
                        </button>
                    </a>

                    {!! Form::open(['method' => 'DELETE','route' => ['product_desc_delete', $productid->id]]) !!}
                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash pad" data-toggle="popover"
                            data-trigger="hover"
                            data-placement="top" data-content="Delete the current product"
                            onclick="return confirm('Are you sure you want to delete this item?');">

                    </button>
                    {!! Form::close() !!}
                </div>
                <div class="row">
                    <label class="col-sm-6 "> Information :</label>
                    {{$product_desc->information}}
                </div>
                <div class="row">
                    <label class="col-sm-6 "> Description :</label>
                    {{$product_desc->description}}
                </div>

            @endif

        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Product Image</div>
        <div class="panel-body">
            @if(empty($product_image))
                <div align="right" style="padding: 10px">
                    <a href="{{route('product_image',$productid->id)}}">
                        <span class=" btn btn-sm btn-success" title="Create new category">Add Image</span>
                    </a>
                </div>

            @else
                    <button type="button" class="btn btn-info  col-md-offset-10" data-toggle="modal"
                            data-target="#myModal">Add Additional Images
                    </button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Choose images to upload</h4>
                                </div>

                                {!! Form::open(array('route'=>'product_image_add', 'method'=>'post','enctype'=>'multipart/form-data' ))!!}

                                {{ Form::hidden('product_id', $productid->id) }}
                                <div class="form-group ">

                                    <label for="rank" class="col-sm-4 control-label">Rank</label>
                                    <div class=" col-sm-8 ">
                                        <select id="rank" name="rank"
                                                class=" form-control " required>
                                            @foreach($product_imagerank as $pro)
                                                <option value="{{$pro}}" >{{$pro}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="image" class="col-sm-4 control-label">Image</label>
                                    <div class=" col-sm-8 ">
                                        <span class="input-group-addon "><i class="fa fa-file"></i></span>
                                        <input type="file" class="form-control" name="image" id="image" required autofocus>
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

                    @foreach($product_image as $img)
                        {{--ln -s ~/web/RudrakshaWebbapp/storage/app/public/product ~/web/RudrakshaWebbapp/public/storage/--}}

                        <img class="productimage" src="{{asset('storage/image/product')}}/{{$img->image}}"
                             style=" border:dotted">
                        {!! Form::open(['method' => 'DELETE','route' => ['product_image_delete', $img->id]]) !!}

                        <button type="submit" class="btn btn-danger  glyphicon glyphicon-alert pad"
                                data-toggle="popover"
                                data-trigger="hover"
                                data-placement="top" data-content="Delete the current product"
                                onclick="return confirm('Are you sure you want to delete this item?');">Delete

                        </button>
                        {!! Form::close() !!}

                    @endforeach
            @endif
        </div>
    </div>

@endsection