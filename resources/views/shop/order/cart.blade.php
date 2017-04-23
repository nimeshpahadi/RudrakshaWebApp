@extends('shop.layout.app')

@section('main-content')

    @include('shop.layout.breadcrum')

    <section id="cart-wrapper">
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <h2>Shopping cart</h2>
                        @if(isset($orderitem))
                            <div class="goods-page">
                                <div class="goods-data clearfix">
                                    <div class="table-wrapper-responsive">
                                        <table class="Shopping cart">
                                            <tr>
                                                <th class="goods-page-image">Image</th>
                                                <th class="goods-page-description">Product Name</th>
                                                <th class="goods-page-quantity">Quantity</th>
                                                <th class="goods-page-price">Unit price</th>
                                                <th class="goods-page-price">Capping Type</th>
                                                <th class="goods-page-price">Capping Price</th>
                                                <th class="goods-page-total" colspan="2">Total</th>
                                            </tr>
                                            <?php $y = 0;?>

                                            @foreach($orderitem as $orders)
                                                <tr>
                                                    <td class="goods-page-image">
                                                        <a href="javascript:;">
                                                            <img src="{{asset('storage/image/product')}}/{{$orders['image']}}">
                                                        </a>
                                                    </td>
                                                    <td class="goods-page-description">
                                                        <h3><a href="javascript:;">{{$orders['prodname']}}</a></h3>
                                                    </td>

                                                    <td class="goods-page-quantity count-input space-bottom">
                                                        <input class="quantity" type="text" name="quantity" disabled
                                                               value="{{$orders['quantity']}}"/>
                                                    </td>

                                                    <td class="goods-page-price">
                                                        <strong><span>NPR </span>{{$orders['prodprice']}}</strong>
                                                    </td>
                                                    @if( isset($orders['captype']))
                                                        <td class="goods-page-price">
                                                            <strong>{{$orders['captype']}}</strong>
                                                        </td>
                                                    @endif
                                                    @if(isset($orders['capprice']) )
                                                        <td class="goods-page-price">
                                                            <strong>{{$orders['capprice']}}</strong>
                                                        </td>
                                                    @endif
                                                    <td class="goods-page-total">
                                                        <strong><span></span>{{$x=$orders['quantity']*$orders['prodprice']+$orders['capprice']}}
                                                        </strong>
                                                    </td>
                                                    <td class="del-goods-col">

                                                        <a class=" fa fa-pencil" style="color: #2ab27b"
                                                           href="{{route('order.edit',$orders['id'])}}"></a>

                                                        {!! Form::open(['method' => 'DELETE','route' => ['order.destroy',$orders['id']]]) !!}
                                                        <button class="del-goods"
                                                                onclick="return confirm('Are you sure you want to delete this cart item?');">
                                                        </button>
                                                        {!! Form::close() !!}

                                                    </td>
                                                </tr>
                                                <?php $y = $y + $x; ?>

                                            @endforeach

                                        </table>

                                    </div>
                                    @if(isset($orders))
                                        <div class="row coupon cart">
                                            <div class="col-sm-12 coupon form-inline">
                                                <div class="col-sm-3 col-sm-offset-9 coupon-middle-right">
                                                    {!! Form::open(['method' => 'DELETE','route' => ['cart.clear',$orders['customer_id']]]) !!}
                                                    <button class="pull-right btn btn-primary update_cart"
                                                            onclick="return confirm('Are you sure you want to delete all cart item?');">
                                                        Clear Shopping Cart
                                                    </button>

                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="goods-page">
                                            <div class="goods-data clearfix">
                                                <div class="table-wrapper-responsive">
                                                    <h3 align="center"> No item added to cart</h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    <div class="shopping-total">
                                        <ul>
                                            <li class="shopping-total-price">
                                                Sub total
                                                <strong class="price"><span>NPR </span>{{$y}}
                                                </strong>
                                            </li>
                                            <li class="shopping-total-price">
                                                (Total including tax and vat) $Total
                                                <strong class="price"><span>$</span>50.00</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <a class="btn btn-default" href="/">Continue shopping <i
                                            class="fa fa-shopping-cart"></i></a>


                                {!! Form::open(array('route'=>'cart.group', 'method'=>'post' ))!!}
                                <?php  $id = [];?>
                                @if($orderitem)


                                @foreach($orderitem as $orders)
                                    <?php
                                    $id['id'] = $orders['id'];
                                    ?>
                                    {{ Form::hidden('order_items_id[]',$id['id']) }}
                                @endforeach

                                {{ Form::hidden('order_group','RD'.rand(10000,99999)) }}
                                {{ Form::hidden('customer_id', Auth::user()->id ) }}
                                {{ Form::hidden('group_status','processing') }}


                                <div class="product-page-cart">
                                    {{Form::submit('Confirm Your Order', array('class'=>'btn btn-bg col-md-2 btn-primary ','title'=>'Place your Order'))}}
                                    {!! Form::close() !!}

                                </div>
                                @endif

                            </div>
                        @endif
                    </div> <!-- row -->
                </div><!-- sm-12 -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section> <!-- cart-wrapper -->

@endsection