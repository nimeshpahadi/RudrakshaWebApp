@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="panel panel-default">

                    {{--image slider--}}
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="noavatar.png" alt="Chania">
                            </div>

                            <div class="item">
                                <img src="noavatar.png" alt="Chania">
                            </div>

                            <div class="item">
                                <img src="noavatar.png" alt="Flower">
                            </div>

                            <div class="item">
                                <img src="noavatar.png" alt="Flower">
                            </div>
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>


                @foreach($category as $cat=>$value)
                    <div class="panel panel-default">
                        <div class="row">
                            <div class="col-sm-12">
                                {{strtoupper($cat)}}
                                <div class="DocumentList">
                                    <ul class="list-inline">
                                        @foreach($value['product'] as $prodCat=>$item)
                                            <li class="DocumentItem">
                                       <span>

                                           @foreach(json_decode($item['imgname']) as $img)
                                               <img class="productimageshop"
                                                    src="{{asset('storage/product')}}/{{$img}}"><br>
                                               <?php break;?>
                                           @endforeach
                                           Name:{{($item['name']) }}<br>
                                               Code: {{$item['code'] }}<br>
                                               Price: {{$item['price'] }}<br>

                                        </span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
