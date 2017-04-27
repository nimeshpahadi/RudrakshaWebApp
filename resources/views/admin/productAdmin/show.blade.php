@extends('admin.Layout.app')

@section('main-content')

        <div class="row">
            @if(isset($productid))
                <div class="col-md-6">
                <div class="panel panel-success pad ">
                    <div class="panel-heading category"><h4>Product Info</h4>
                        <ul>
                            <li>
                                <a href="{{route('products.edit',$productid->id)}}">
                                    <button class="btn btn-warning " data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Edit the current category"><i
                                                class="fa fa-edit"></i>
                                    </button>
                                </a>
                            </li>
                            <li>
                                {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $productid->id]]) !!}
                                <button type="submit" class="btn btn-sm btn-danger" data-toggle="popover"
                                        data-trigger="hover"
                                        data-placement="top" data-content="Delete the current product"
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <label class="col-sm-6 "> Code :</label>
                        <p class="col-md-6">{{$productid->code}}</p>
                    </div>

                    <div class="row">
                        <label class="col-sm-6 "> Name :</label>
                        <p class="col-md-6"> {{$productid->name}}</p>
                    </div>

                    <div class="row">
                        <label class="col-sm-6 "> Rank :</label>
                        <p class="col-md-6">{{$productid->rank}}</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-6 "> Tags :</label>
                        <p class="col-md-6"> {{ join(",",$productid['tag'])}}</p>
                    </div>
                    @if(isset($productid->discount))
                        <div class="row">
                            <label class="col-sm-6 "> Discount :</label>
                            <p class="col-md-6">{{$productid->discount}}</p>
                        </div>
                    @endif
                    <div class="row">
                        <label class="col-sm-6 "> Quantity Available :</label>
                        <p class="col-md-6"> {{$productid->quantity_available}}</p>
                    </div>
                    <div class="row">
                        <label class="col-sm-6 "> Status:</label>
                        @if($productid->status==1)
                            <p class="col-md-6"> Active</p>
                        @else
                            <p class="col-md-6"> Inactive</p>
                        @endif

                        <div class=" col-sm-3 col-sm-offset-6  clearfix form-group{{ $errors->has('status') ? ' has-error' : ''  }} clearfix">
                            {!! Form::model($productid,array('route'=>['product.status.update',$productid->id],
                            'method'=>'PUT' ))!!}
                            <div class="status_edit">
                                <label>
                                    <input name="status" type="radio" value="1"
                                           @if($productid->status==1) checked @endif>
                                    Active
                                </label>
                                <label>
                                    <input name="status" type="radio" value="0"
                                           @if($productid->status==0) checked @endif>
                                    Inactive
                                </label>
                                {{Form::submit('Change', array('class'=>'btn btn-sm btn-primary '))}}
                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>


                </div>
                </div>
            @endif

            @if(isset($productid))
                    <div class="col-md-6">
                <div class="panel panel-danger  pad ">
                    <div class="panel-heading category"><h4>Product Info</h4>
                        <ul>
                            <li>
                                <a href="{{route('products.edit',$productid->id)}}">
                                    <button class="btn btn-warning " data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Edit the current category"><i
                                                class="fa fa-edit"></i>
                                    </button>
                                </a>
                            </li>
                            <li>
                                {!! Form::open(['method' => 'DELETE','route' => ['products.destroy', $productid->id]]) !!}
                                <button type="submit" class="btn btn-danger" data-toggle="popover"
                                        data-trigger="hover"
                                        data-placement="top" data-content="Delete the current product"
                                        onclick="return confirm('Are you sure you want to delete this item?');">
                                    <i class="fa fa-trash"></i>
                                </button>
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <label class="col-sm-6 "> Price :</label>
                        <p class="col-md-6">{{$productid->code}}</p>
                    </div>

                    <div class="row">
                        <label class="col-sm-6 "> Currency :</label>
                        <p class="col-md-6"> {{$productid->name}}</p>
                    </div>


                </div>
                    </div>
            @endif
        </div>


        <div class="panel panel-info ">

                    @if(!isset($product_desc))
                    <div class="panel-body">
                        <div align="right" style="padding: 10px">
                            <a href="{{route('product_description',$productid->id)}}">
                                <span class=" btn btn-sm btn-success"
                                      title="Create new Description">Add Description</span>
                            </a>
                        </div>
                        </div>
                    @else
                        <div class="panel-heading category">Product Description

                            <ul>
                                <li>
                                    <a href="{{route('product_desc_edit',$productid->id)}}">
                                        <button class="btn btn-warning " data-toggle="popover" data-trigger="hover"
                                                data-placement="top" data-content="Edit the current Description"><i
                                                    class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </li>
                                <li>
                                    {!! Form::open(['method' => 'DELETE','route' => ['product_desc_delete', $productid->id]]) !!}
                                    <button type="submit" class="btn btn-danger " data-toggle="popover"
                                            data-trigger="hover"
                                            data-placement="top" data-content="Delete the current product description"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                </li>
                            </ul>
                        </div>
                            <div class="panel-body">

                        <div class="row">
                            <label class="col-sm-6 "> Information :</label>
                            {{$product_desc->information}}
                        </div>
                        <div class="row">
                            <label class="col-sm-6 "> Description :</label>
                            {{$product_desc->description}}
                        </div>
                        </div>
                    @endif


            </div>


        <div class="panel panel-info">
            <div class="panel-heading category">Product Image
            </div>
            <div class="panel-body">


                @if(empty($product_image))
                    @if(count($img->rank)!=5)
                        <div align="right" style="padding: 10px">
                            <a href="{{route('product_image',$productid->id)}}">
                                <span class=" btn btn-sm btn-success" title="Create new category">Add Image</span>
                            </a>
                        </div>
                    @endif
                @else
                    <button type="button" class="btn btn-info col-md-offset-10  "  style="margin-bottom: 10px" data-toggle="modal"
                            data-target="#myModal">Add Additional Images
                    </button>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content pad">
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
                                            @if(isset($product_imagerank))
                                                @foreach($product_imagerank as $pro)
                                                    <option value="{{$pro}}">{{$pro}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group pad ">
                                    <label for="image" class="col-sm-4 control-label">Image</label>
                                    <div class=" col-sm-8 ">
                                        <span class="input-group-addon "><i class="fa fa-file"></i></span>
                                        <input type="file" class="form-control" name="image" id="image" required
                                               autofocus>
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
                        {{--ln -s ~/web/RudrakshaWebbapp/storage/app/public/image ~/web/RudrakshaWebbapp/public/storage/--}}
                        <div class="col-md-3">
                            <img class="productimage" src="{{asset('storage/image/product')}}/{{$img->image}}"
                                 style=" border:dotted">

                            <div class="modal bs-example-modal-sm{{$img->id}}" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm pad">
                                    <div class="modal-content pad">
                                        <h3 class="pad"> Edit rank of image</h3>

                                        {!! Form::model($img,array('route'=>['product_image.rank.edit',$img->id],'method'=>'PUT' ))!!}

                                        {{ Form::hidden('product_id', $img->product_id) }}
                                        <div class="form-group ">

                                            <label for="rank" class="col-sm-4 control-label">Rank</label>
                                            Previous Rank: {{$img->rank}}
                                            <div class=" col-sm-8 ">
                                                <select id="rank" name="rank"
                                                        class=" form-control " required>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
<div class="col-md-offset-9" style="margin-top: 46px;margin-left: 183px">
                                        {{ Form::submit('Change', array('class'=>'btn btn-sm btn-primary '))}}

{!! Form::close() !!}
</div>

                                    </div>
                                </div>
                            </div>
                            <div class="panel-heading category prod_image">

                                <ul>
                                    <li>
                                        <button type="button" class="btn btn-sm btn-primary " title="edit rank"
                                                data-toggle="modal" data-target=".bs-example-modal-sm{{$img->id}}"><i
                                                    class="fa fa-edit"></i></button>
                                    </li>
                                    <li style="margin-left: 5px">
                                        {!! Form::open(['method' => 'DELETE','route' => ['product_image_delete', $img->id]]) !!}

                                        <button type="submit" class="btn btn-sm btn-danger   "
                                                data-toggle="popover"
                                                data-trigger="hover"
                                                data-placement="top" data-content="Delete the current product"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i
                                                    class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </div>
                        </div>

                    @endforeach
                @endif
            </div>
        </div>
    {{--</div>--}}

    <script>$('#myModal1').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })</script>
@endsection


