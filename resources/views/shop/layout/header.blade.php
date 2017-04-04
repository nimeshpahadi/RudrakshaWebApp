<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rudrax </title>
    <!-- Responsive menu -->

{!! Html::style('shop/css/meanmenu.css') !!}
{!! Html::style('shop/fonts/fontIcon/css/font-awesome.css') !!}
{!! Html::style('shop/css/bootstrap.min.css') !!}
{!! Html::style('shop/css/owl.carousel.css') !!}
{!! Html::style('shop/css/owl.theme.css') !!}
{!! Html::style('shop/css/jquery.rateyo.min.css') !!}


<!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
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
                                        <li><a href="/profile">My Account</a></li>
                                        <li><a href="">Log In</a></li>
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
                            <a class="site-logo" href=""><img src="{{asset('shop/images/logo-shop-red.png')}}" alt="Metronic Shop UI" ></a>
                        </div>
                        <!-- nav -->
                        <div class="col-sm-8 col-xs-4">
                            <nav class="main-navigation ">
                                <ul>
                                    <li> <a class="active" href="">home</a></li>
                                    <li> <a href="">about us</a></li>
                                    <li> <a href="">our services</a></li>
                                    <li> <a href="">our projects</a></li>
                                    <li> <a href="">careers</a></li>
                                    <li> <a href="">contacts</a></li>
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
                                        <a href="" class="top-cart-info-count">3 items</a>
                                        <a href="" class="top-cart-info-value">$1260</a>
                                    </div>
                                    <i class="fa fa-shopping-cart"></i>

                                    <div class="top-cart-content-wrapper">
                                        <div class="top-cart-content">
                                            <ul class="scroller" style="height: 250px;">

                                                <li>
                                                    <a href=""><img src="{{asset('shop/images/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34"></a>
                                                    <span class="cart-content-count">x 1</span>
                                                    <strong><a href="">Rolex Classic Watch</a></strong>
                                                    <em>$1230</em>
                                                    <a href="" class="del-goods">&nbsp;</a>
                                                </li>
                                                <li>
                                                    <a href=""><img src=" {{asset('shop/images/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34"></a>
                                                    <span class="cart-content-count">x 1</span>
                                                    <strong><a href="">Rolex Classic Watch</a></strong>
                                                    <em>$1230</em>
                                                    <a href="" class="del-goods">&nbsp;</a>
                                                </li>
                                                <li>
                                                    <a href=""><img src=" {{asset('shop/images/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34"></a>
                                                    <span class="cart-content-count">x 1</span>
                                                    <strong><a href="">Rolex Classic Watch</a></strong>
                                                    <em>$1230</em>
                                                    <a href="" class="del-goods">&nbsp;</a>
                                                </li>
                                                <li>
                                                    <a href=""><img src=" {{asset('shop/images/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34"></a>
                                                    <span class="cart-content-count">x 1</span>
                                                    <strong><a href="">Rolex Classic Watch</a></strong>
                                                    <em>$1230</em>
                                                    <a href="" class="del-goods">&nbsp;</a>
                                                </li>
                                                <li>
                                                    <a href=""><img src=" {{asset('shop/images/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34"></a>
                                                    <span class="cart-content-count">x 1</span>
                                                    <strong><a href="">Rolex Classic Watch</a></strong>
                                                    <em>$1230</em>
                                                    <a href="" class="del-goods">&nbsp;</a>
                                                </li>
                                                <li>
                                                    <a href=""><img src=" {{asset('shop/images/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34"></a>
                                                    <span class="cart-content-count">x 1</span>
                                                    <strong><a href="">Rolex Classic Watch</a></strong>
                                                    <em>$1230</em>
                                                    <a href="" class="del-goods">&nbsp;</a>
                                                </li>
                                                <li>
                                                    <a href=""><img src=" {{asset('shop/images/cart-img.jpg')}}" alt="Rolex Classic Watch" width="37" height="34"></a>
                                                    <span class="cart-content-count">x 1</span>
                                                    <strong><a href="">Rolex Classic Watch</a></strong>
                                                    <em>$1230</em>
                                                    <a href="" class="del-goods">&nbsp;</a>
                                                </li>

                                            </ul>
                                            <div class="text-right">
                                                <a href="" class="btn btn-default">View Cart</a>
                                                <a href="" class="btn btn-primary">Checkout</a>
                                            </div>
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