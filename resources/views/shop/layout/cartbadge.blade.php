<!-- cart -->
<div class="col-sm-2 col-xs-5 cart-header">
    <div class="row">
        <div class="top-cart-block">
            <div class="top-cart-info">
                {{--<a href="" class="top-cart-info-count">--}}
                    {{--0 items</a>--}}
                {{--<a href="" class="top-cart-info-value"> 0 </a>--}}

                <a href="" class="top-cart-info-count">
                    @if(isset($orderitem)) {{count($orderitem)}}@else 0 @endif items</a>
                <a href="" class="top-cart-info-value"> @if(isset($y)){{$y}}@else 0 @endif</a>
            </div>
            <i class="fa fa-shopping-cart"></i>

            <div class="top-cart-content-wrapper">
                <div class="top-cart-content">
                    @if(isset($orderitem))

                        <ul class="scroller" style="height: 250px;">
                            @foreach($orderitem as $orders)
                                <li>
                                    <span class="cart-content-count">  x {{$orders['quantity']}}</span>
                                    <strong><a href="">{{$orders['prodname']}}</a></strong>
                                    <em>{{$orders['prodprice']}}</em>
                                    <a href="" class="del-goods">&nbsp;</a>
                                </li>
                            @endforeach
                        </ul>


                        <div class="text-right">
                            <a href="" class="btn btn-default">View Cart</a>
                            <a href="" class="btn btn-primary">Checkout</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
