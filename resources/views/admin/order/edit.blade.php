@extends('admin.Layout.app')
{{--{!! Html::style('shop/css/owl.carousel.css') !!}--}}

@section('main-content')
    <section id="detail-wrapper" style="width: auto; height: auto; display: block;">
        <div class="container">
            <div class="row clearfix">
                <div class="col-sm-12 product-page product-pop-up">
                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-1 col-xs-6 zoom-left">

                            @if(isset($product_image))
                                @foreach($product_image as $img)
                                    <div class="item" data-hash="zero{{$img['id']}}">

                                        <img src="{{asset('storage/image/product')}}/{{$img['image']}}" height="200px"
                                             width="200px"
                                             alt="Cool green dress with red bell" class="img-responsive">
                                        <img src="{{asset('storage/image/product')}}/{{$img['image']}}"
                                             class="zoomImg"
                                             style="position: absolute; top: -247.909px; left: -269.182px; opacity: 0; width: 600px; height: 800px; border: medium none;">

                                    </div>
                                @endforeach

                            @endif
                        </div>

                        <div class="col-md-6 ">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> {{strtoupper($productid->name)}}   </h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>

                                            @if(isset($product_price))
                                                @foreach($product_price as $price)
                                                    <th colspan="2">
                                                        <h4>{{$price->c_repre}}</h4>
                                                    </th>
                                                    <th>
                                                        <h4> {{$price->price}}</h4>
                                                    </th>
                                                @endforeach
                                            @endif
                                        </tr>
                                        <tr>
                                            <td colspan="3"> @if(isset($product_desc))

                                                    <p> &emsp;&emsp;* &ensp;{{$product_desc->description}}</p>
                                                    <p> &emsp;&emsp;* &ensp;{{$product_desc->information}}</p>

                                                @endif
                                            </td>


                                        </tr>
                                        <tr>

                                            <td colspan="3" style="padding-left: 50px;">
                                                {!! Form::model($orderid,array('route'=>['admin.order.update',$orderid->id],'method'=>'PUT' ))!!}

                                                {{Form::hidden('customer_id',$orderid->customer_id)}}
                                                <div class="row">
                                                    <h3 class="col-md-4"> Quantity </h3>

                                                    <input step="1" min="1" max="{{$productid->quantity_available}}"
                                                           name="quantity" title="Qty"
                                                           class="input-text qty text col-md-6"
                                                           value="{{$orderid->quantity}}"
                                                           size="8" pattern="[0-9]*" inputmode="numeric" type="number"
                                                           style="margin-top: 20px">
                                                </div>
                                                <h3> Buy rudrax with </h3>
                                                @foreach($capping as $cap)
                                                    <div class="funkyradio">
                                                        <div class="funkyradio-default ">
                                                            <input type="radio" name="capping_id" class="oddtick-box"
                                                                   id="radio{{$cap->id}}"
                                                                   @if($cap->id==$orderid->capping_id) checked
                                                                   @endif  value="{{$cap->id}}"/>
                                                            <label for="radio{{$cap->id}}">{{$cap->type}}
                                                                Capping</label>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                <div>
                                                    {{Form::submit('Save Changes', array('class'=>'btn btn-primary  btn-sm ','title'=>'Save  changes on your cart item'))}}
                                                    <a class="btn btn-warning  btn-sm" href="">Cancel</a>
                                                    {!! Form::close() !!}
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="tab wrapper ">
        <div class="container">
            <div class="row clearfix">
                <div class="col-sm-12 tab-wrapper">
                    <div class="row">
                        <ul class="nav nav-tabs ">
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