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
            <div class="row">
                <label class="col-sm-6 "> Discount :</label>
                {{$productid->discount}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Quantity Available :</label>
                {{$productid->quantity_available}}
            </div>
        </div>
    @endif


    <div class="panel panel-info">
        <div class="panel-heading">Product Description</div>
        <div class="panel-body">

            @if(isset($product_desc))
               <div class="row" >
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
                        {{$product_desc->benifit}}
                        {{--@foreach($product_desc->benifit as $benifits=>$benifitlist)--}}
                            {{--<thead>--}}
                            {{--<th>{{$benifits}}</th>--}}
                            {{--</thead>--}}
                            {{--<tr>--}}
                                {{--@foreach($benifitlist as $blist)--}}
                                    {{--<td>--}}
                                        {{--<li>{{$blist}}</li>--}}
                                    {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        {{--@endforeach--}}
                    </table>
                </div>

            @endif

        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Product Image</div>
        <div class="panel-body">
            @if(isset($product_image))
                @foreach($product_image as $image=>$imagelist)
                    @foreach(json_decode($imagelist->name) as $img)

                        {{--ln -s ~/web/RudrakshaWebbapp/storage/app/public/product ~/web/RudrakshaWebbapp/public/storage/--}}
                        <img class="productimage" src="{{asset('storage/product')}}/{{$img}}" style="padding: 10px; border:dotted">

                    @endforeach


                @endforeach
            @endif
        </div>
    </div>

@endsection