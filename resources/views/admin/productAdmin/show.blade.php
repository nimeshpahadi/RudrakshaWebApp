@extends('Layout.app')

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
                {{ join(",",json_decode($productid['tag']))}}
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
                <div class="row">
                    <label class="col-sm-6 "> Benifits :</label>

                    <table>

                        @foreach($product_desc->benifit as $benifits=>$benifitlist)
                            <thead>
                            <th>{{$benifits}}</th>
                            </thead>
                            <tr>
                                @foreach($benifitlist as $blist)
                                    <td>
                                        <li>{{$blist}}</li>
                                    </td>
                            </tr>
                        @endforeach
                        @endforeach
                    </table>
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
                @foreach($product_image as $image=>$imagelist)
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
                                {!! Form::model($imagelist,array('route'=>['product_image_update',$imagelist->id],'method'=>'PUT', 'enctype'=>'multipart/form-data'))!!}
                                {{ Form::hidden('product_id', $productid->id) }}
                                <div class="form-group ">
                                    <label for="name" class="col-sm-4 control-label">Image</label>
                                    <div class=" col-sm-8 ">

                                        <span class="input-group-addon "><i class="fa fa-file"></i></span>
                                        <input type="file" class="form-control" name="name[]" id="name" required
                                               autofocus multiple>
                                    </div>
                                </div>

                                <div class="clearfix pad"></div>
                                <div class="modal-footer">
                                    {{Form::submit('create', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the category'))}}
                                    {!! Form::close() !!}

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                    </button>

                                </div>

                            </div>
                        </div>
                    </div>

                    @foreach(json_decode($imagelist->name) as $img)
                        {{--ln -s ~/web/RudrakshaWebbapp/storage/app/public/product ~/web/RudrakshaWebbapp/public/storage/--}}

                        <img class="productimage" src="{{asset('storage/product')}}/{{$img}}"
                             style=" border:dotted">
                        {!! Form::open(['method' => 'DELETE','route' => ['product_image_delete', $imagelist->id,$img]]) !!}

                        <button type="submit" class="btn btn-danger  glyphicon glyphicon-alert pad"
                                data-toggle="popover"
                                data-trigger="hover"
                                data-placement="top" data-content="Delete the current product"
                                onclick="return confirm('Are you sure you want to delete this item?');">Delete

                        </button>
                        {!! Form::close() !!}

                    @endforeach


                @endforeach
            @endif
        </div>
    </div>

@endsection