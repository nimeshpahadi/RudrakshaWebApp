@extends('Layout.app')

@section('main-content')


    <div class="panel panel-info">
        <div class="panel-heading">Product Info</div>
        <div class="panel-body">
       @if(isset($productid))
           Id:  {{$productid->id}}<br>
           Code:  {{$productid->code}}<br>
           Name:  {{$productid->name}}<br>
            Price:{{$productid->price}}<br>
            Rank: {{$productid->rank}}<br>
           Tags:  {{$productid->tag}}<br>
            Discount: {{$productid->discount}}<br>
            Quantity: {{$productid->quantity_available}}<br>
           @endif
        </div>
    </div>

 <div class="panel panel-info">
        <div class="panel-heading">Product Info</div>
        <div class="panel-body">
{{--            {{$product_desc}}--}}
            @if(isset($product_desc))
           Id:  {{$product_desc->product_id}}<br>
           Information:  {{$product_desc->information}}<br>
           Description:  {{$product_desc->description}}<br>
            Benifit: @foreach($product_desc->benifit as $benifits)
{{--                {{$benifits}}--}}
                    @endforeach<br>
                @endif

        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">Product Image</div>
        <div class="panel-body">
                        {{--{{$product_image}}--}}
            @if(isset($product_image))

            {{--Id:  {{$product_image->product_id}}<br>--}}
            {{--<td><img class="productimage" src="storage/product/{{$product_image->name}}"></td>--}}
            @endif
        </div>
    </div>

@endsection