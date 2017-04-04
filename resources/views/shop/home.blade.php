@extends('shop.layout.app')

@section('main-content')

    <!-- Banner -->
    <div id="banner-carasul">
        <div class="caradul-wrapper">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item">
                    <img src=" {{asset('shop/images/baner1.jpg')}}" alt="Mirror Edge">
                    <div class="banner-text">
                        <div class="container">
                            <h1> Sales off </h1>
                            <h2> Up to 20% Starting at Rs 500 </h2>
                            <a href=""> Book Now </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src=" {{asset('shop/images/baner1.jpg')}}" alt="GTA V">
                    <div class="banner-text">
                        <div class="container">
                            <h1> Sales off </h1>
                            <h2> Up to 20% Starting at Rs 500 </h2>
                            <a href=""> Book Now </a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img src=" {{asset('shop/images/baner1.jpg')}}" alt="Mirror Edge">
                    <div class="banner-text">
                        <div class="container">
                            <h1> Sales off </h1>
                            <h2> Up to 20% Starting at Rs 500 </h2>
                            <a href=""> Book Now </a>
                        </div>
                    </div>
                </div><!-- item -->
            </div><!-- owl-carousel owl-theme -->
        </div><!-- caradul-wrapper -->
    </div> <!-- #banner-carasul -->

    <!-- one muki rudrakxya -->

    @foreach($category as $cat=>$value)
        <section id="rudrax-wrapper">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-sm-12 rudrakxya-inn_header">
                        <h2 class="info-holder">{{strtoupper($cat)}}</span> </h2>
                        <div class="row slider-holder">
                            <div class="owl-carousel owl-theme service_detail">
                                @if(isset($value['product']))
                                    @foreach($value['product'] as $prodCat=>$item)
                                        <div class="item">
                                            <div class="product-item">
                                                @foreach($item['image'] as $img)
                                                    <img src="{{asset('storage/image/product')}}/{{$img['image']}}"
                                                         height="200px"><br>
                                                    <?php break; ?>
                                                @endforeach

                                                <h3>{{($item['name']) }} </h3>
                                                <h3>{{$item['code'] }}</h3>
                                                <span> Price : 100 </span>
                                                <div class="rateyo-readonly-widg"></div>
                                                <a href=""> quick view </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div><!-- col-sm-12 -->
                </div> <!-- row -->
            </div> <!-- container -->
        </section><!-- rudrax -->
    @endforeach



    <section id="pagenation">
        <div class="container">
            <div class="bs-example">
                <ul class="pagination">
                    <li class="disabled"><a href="#">&laquo;</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&raquo;</a></li>
                </ul>
            </div>
        </div>
    </section>

@endsection