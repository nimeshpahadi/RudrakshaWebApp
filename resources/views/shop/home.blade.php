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
    <div class= "posts endless-pagination" data-next-page="{{ $entries->nextPageUrl() }}">
    @foreach($entries as $cat=>$value)
        <section id="rudrax-wrapper">
            <div class="container">
                <div class="row clearfix">
                    <div class="col-sm-12 rudrakxya-inn_header">
                        <h2 class="info-holder" align="center">{{strtoupper($cat)}}</h2>
                        <div class="row slider-holder">


                            <div class="owl-carousel owl-theme service_detail">
                                @if(isset($value['product']))

                                    @foreach($value['product'] as $prodCat=>$item)

                                        @if($item['status']==1)
                                        <div class="item">
                                            <div class="product-item">
                                                @foreach($item['image'] as $img)
                                                    <img src="{{asset('storage/image/product')}}/{{$img['image']}}"
                                                         height="200px"><br>
                                                    <?php break; ?>
                                                @endforeach

                                                @foreach($item['price'] as $price)
                                                    <h4> {{$price['code']}}:{{$price['representation']}} {{$price['price']}}  </h4>
                                                    <?php break;?>
                                                @endforeach
                                                <h3>{{($item['name']) }} </h3>
                                                <h3>{{$item['code'] }}</h3>

                                                <div class="rateyo-readonly-widg"></div>
                                                <a href="{{route('product.detail',$item['id'])}}"> quick view </a>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div><!-- col-sm-12 -->
                </div> <!-- row -->
            </div> <!-- container -->
        </section><!-- rudrax -->
    @endforeach


    </div>
@endsection

<script>
    var page = 1;
    console.log("hello")

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            page++;
            loadMoreData(page);
        }
    });
    function loadMoreData(page){
        $.ajax(
            {
                url: '?page=' + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                alert('server not responding...');
            });
    }
</script>


