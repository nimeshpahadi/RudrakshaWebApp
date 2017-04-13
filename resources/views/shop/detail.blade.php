@extends('shop.layout.app')

@section('main-content')

    <!-- Banner -->
    <!-- breadcom -->
    <section id="breadcom-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <ul class="breadcrumb">
                            <h2 class="info-holder">Two muki Rudraxya </span> </h2>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Products</a></li>
                            <li class="active">Detail</li>
                        </ul>
                    </div><!-- row -->
                </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section> <!-- breadcom-wrapper -->

    <section id="detail-wrapper" style="width: auto; height: auto; display: block;">
        <div class="container">
            <div class="row clearfix">
                <div class="col-sm-12 product-page product-pop-up">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1 col-xs-6 zoom-left">

                            @if(isset($product_image))
                                <div id="zoom-click" class="owl-carousel owl-theme">
                                    @foreach($product_image as $img)
                                        <div class="item" data-hash="zero{{$img['id']}}">
                                            <div class="product-main-image"
                                                 style="position: relative; overflow: hidden;">
                                                <img src="{{asset('storage/image/product')}}/{{$img['image']}}"
                                                     alt="Cool green dress with red bell" class="img-responsive">
                                                <img src="{{asset('storage/image/product')}}/{{$img['image']}}"
                                                     class="zoomImg"
                                                     style="position: absolute; top: -247.909px; left: -269.182px; opacity: 0; width: 600px; height: 800px; border: medium none;">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @foreach($product_image as $img)
                                    <a class="button secondary1" href="#zero{{$img['id']}}">
                                        <img src="{{asset('storage/image/product')}}/{{$img['image']}}"> </a>
                                @endforeach
                            @endif
                        </div>

                        <div class="col-sm-6 col-sm-offset-1 col-xs-6 zoom-right">
                            <h2>{{strtoupper($productid->name)}}</h2>
                            <div class="price-availability-block clearfix">
                                <div class="price">
                                    @if(isset($product_price))
                                        @foreach($product_price as $price)
                                            <strong> <span>{{$price->c_repre}} : </span>{{$price->price}}
                                            </strong><br>
                                        @endforeach
                                    @endif
                                    @if(isset($product_desc))
                                        <p> &emsp;&emsp;* &ensp;{{$product_desc->description}}</p>
                                        <p> &emsp;&emsp;* &ensp;{{$product_desc->information}}</p>
                                    @endif
                                    <h3> Buy rudrax with </h3>

                                </div>
                            </div>
                            @foreach($capping as $cap)
                                <div class="funkyradio">
                                    <div class="funkyradio-default ">
                                        <input type="radio" name="capping" class="oddtick-box" id="radio{{$cap->id}}"
                                               value="{{$cap->price}}"/>
                                        <label for="radio{{$cap->id}}">{{$cap->type}} Capping</label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="product-page-cart">
                                <button class="btn btn-primary" type="submit">Add to cart</button>
                            </div>

                            <div class="sticker sticker-sale"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tab wrapper">
        <div class="container">
            <div class="row clearfix">
                <div class="col-sm-12 tab-wrapper">
                    <div class="row">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">Description</a></li>
                            <li><a data-toggle="tab" href="#menu1">Benefit </a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <h3 class="tab-header"> Description </h3>
                                @if(isset($product_desc))
                                    <p class="tab-detail">&emsp;{{$product_desc->description}}<br>
                                        &emsp;{{$product_desc->information}}</p>
                                @endif
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                @if(isset($benefits))
                                    @foreach($benefits as $ben)
                                        <h3 class="tab-header"> {{$ben->benefit_heading}}</h3>
                                        <ul class="tab-benefit">
                                            @foreach($ben['benefit'] as $bene=>$value)
                                                <li>&emsp; * {{$value}} </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                @endif
                            </div>

                        </div><!-- nav nav tabs -->
                    </div> <!-- row -->
                </div><!-- colm -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- tab wrapper -->
@endsection

