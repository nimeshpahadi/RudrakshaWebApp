@extends('shop.layout.app')


@section('main-content')
    <style type="text/css">
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
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
        @include('shop.index')

        <div class="ajax-load text-center" style="display:none">
            <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
        </div>
    </div>
@endsection

<script>
    var page = 1;
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


