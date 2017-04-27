<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rudrax </title>

    {!! Html::style('shop/css/meanmenu.css') !!}
    {!! Html::style('shop/fonts/fontIcon/css/font-awesome.css') !!}
    {!! Html::style('shop/css/bootstrap.min.css') !!}
    {!! Html::style('shop/css/owl.carousel.css') !!}
    {!! Html::style('shop/css/owl.theme.css') !!}
    {!! Html::style('shop/css/jquery.rateyo.min.css') !!}
    {!! Html::style('shop/css/bootstrap-select.css') !!}

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


    {!! Html::style('css/app.css') !!}
    {!! Html::style('css/customshop.css') !!}
    {!! Html::style('shop/css/style.css') !!}


</head>
<body>

<div class="wrapper">
    <!-- header -->
    <section id="header-wrapper">
        <div class="container">
            <div class="header">
                <div class="row clearfix">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6 additional-shop-info">
                                <ul>
                                    <li> <a href=""> <i class="fa fa-phone"></i> </a>
                                        <span> +977 984 608 2999 </span>
                                    </li>

                                    <li> <a href=""> <i class="fa fa-envelope-o"></i> </a>
                                        <span> info@gmail.com </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 col-xs-6 additional-nav">
                                <div class="row">
                                    <ul class="list-unstyle list-inline right-part pull-right">
                                            <!-- Authentication Links -->
                                            @if (Auth::guest())
                                                <li><a href="{{ route('login') }}">Login</a></li>
                                                <li><a href="{{ route('register') }}">Register</a></li>
                                            @else
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                                       aria-expanded="false">
                                                        {{'Hi,'. ucfirst( Auth::user()->firstname) }} <span class="caret"></span>
                                                    </a>

                                                    <ul class="dropdown-menu" role="menu">

                                                        <li><a href="/profile">Profile</a></li>
                                                        <li><a href="/profile/{{Auth::user()->id}}/history">My History </a></li>


                                                        <li role="separator" class="divider"></li>
                                                        <li>

                                                            {!! Html::linkRoute('password','password',array( Auth::user()->id),array('class'=>''))!!}


                                                        </li>
                                                        <li role="separator" class="divider"></li>

                                                        <li>
                                                            <a href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                                Logout
                                                            </a>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                                  style="display: none;">
                                                                {{ csrf_field() }}
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>

                                            @endif

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- header -->
        </div><!-- container -->
    </section> <!-- header-wrapper -->

    <!-- navigation -->
    <section id="header-bottom">
        <div class="container">
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-sm-2 col-xs-3 logo">
                            <a class="site-logo" href="/"><img src="{{asset('shop/images/logo-shop-red.png')}}" alt="Metronic Shop UI" ></a>
                        </div>


                        <!-- nav -->
                        <div class="col-sm-8 col-xs-4">
                            <nav class="main-navigation ">
                                <ul>
                                    @if(isset($page))
                                    <li> <a class="{{ $page == "home" ? "active" : "" }}" href="{{ url("/") }}">Home</a></li>
                                    <li> <a class="{{ $page == "cart" ? "active" : "" }}" href="{{ url("/cart") }}" >Cart</a></li>
                                    <li> <a class="{{ $page == "aboutus" ? "active" : "" }}" href="{{ url("/aboutus") }}" >About us</a></li>
                                    <li> <a class="{{ $page == "contact" ? "active" : "" }}" href="{{ url("/contact") }}" >Contact</a></li>
                                    @endif

                                    <li class="menu-search">
                                        <span class="sep"></span>
                                        <i class="fa fa-search search-btn"></i>
                                        <div class="search-box">
                                            <form action="#">
                                                <div class="input-group">
                                                    <input type="text" placeholder="Search" class="form-control top-search">
                                                    <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Search</button>
                              </span>
                                                </div>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- cart -->
                        <div class="col-sm-2 col-xs-5 cart-header">
                            <div class="row">
                                <div class="top-cart-block">
                                    <div class="top-cart-info">
                                        <a href="" class="top-cart-info-count">
                                           0  items</a>
                                        <a href="" class="top-cart-info-value"> 0 </a>
                                        {{--<a href="" class="top-cart-info-count">--}}
                                            {{--@if(isset($orderitem)) {{count($orderitem)}}@else 0 @endif items</a>--}}
                                        {{--<a href="" class="top-cart-info-value"> @if(isset($y)){{$y}}@else 0 @endif</a>--}}
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

                    </div> <!-- row -->
                </div> <!-- col -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section> <!-- header-bottom -->