
    @foreach($entries as $cat=>$value)
    <section id="rudrax-wrapper">
        <div class="container">
            <div class="row clearfix">
                <div class="infinite-scroll">
                <div class="col-sm-12 rudrakxya-inn_header">
                    <h2 class="info-holder" align="center">{{strtoupper($cat)}} </h2>
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
                                                @endforeach

                                                @foreach($item['price'] as $price)
                                                    <h4> {{$price['code']}}:{{$price['representation']}} {{$price['price']}}  </h4>
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
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section><!-- rudrax -->
@endforeach

