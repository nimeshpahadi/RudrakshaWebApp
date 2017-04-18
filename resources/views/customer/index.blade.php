@extends('shop.layout.app')

@section('main-content')
    @include('shop.layout.breadcrum')

    <section id="user-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-4 user-left">
                            <div class="user_fa">

                                {!! Form::model($customer,array('route'=>['customer.updateimage',$customer->id],'method'=>'PUT','enctype'=>'multipart/form-data'  ))!!}

                                {{ Form::hidden('id',$customer->id  ) }}
                                <figure class="user-image">
                                    <img @if(isset($customer->image)) src="{{asset('storage/image/users')}}/{{$customer->image}}"
                                     style="width: 80%"
                                     @else
                                     src="noavatar.png"
                                    @endif>
                                </figure>
                                <input id="inputimage" name="image" type="file" class="file-loading">


                                {{Form::submit('Post', array('class'=>'btn btn-primary ','title'=>'Upload image'))}}
                                {!! Form::close() !!}


                                <figcaption class="user-name">
                                    {{ucfirst($customer->firstname)}} {{ucfirst($customer->lastname)}}
                                </figcaption>
                            </div>
                            <ul class="user-setting">
                                <li><i class="fa fa-truck"></i> <a href=""> Delivery address </a></li>
                                <li><i class="fa fa-pencil-square-o"></i> <a href=""> Change password </a></li>
                                <li><i class="fa fa-history"></i> <a href=""> History </a></li>
                                <li><i class="fa fa-sign-out"></i> <a href=""> Log out </a></li>
                            </ul>
                        </div>

                        <div class="col-sm-8 user-right">
                            <div class="row">
                                <div class="user-top">
                                    <h3 class="user-title"> User profile </h3>
                                    <ul class=" user-details">
                                        <li> First Name :{{$customer->firstname}}</li>
                                        <li> Last Name : {{$customer->lastname}}</li>
                                        <li> Email : {{$customer->email}} </li>
                                        @if(isset($customer->contact))
                                            <li> Contact : {{$customer->contact}} </li>
                                        @endif
                                        @if(isset($customer->alternative_contact))
                                            <li> Alternative contact : {{$customer->alternative_contact}} </li>
                                        @endif
                                        <li>Joined on : {{$customer->created_at}} </li>
                                    </ul>
                                </div>

                                <div class="col-sm-7 user-bottom">
                                    <div class="row">
                                        <h3 class="user-title"> User address </h3>
                                        <a href="{!! route('customers.address.edit',$customer->id)!!}">
                                                    <span class="btn btn-primary glyphicon glyphicon-pencil"
                                                          data-toggle="popover" data-trigger="hover"
                                                          data-placement="top" data-content="">
                                                    </span>
                                        </a>

                                        <ul class=" user-details">
                                            <li> Country : <?php $x = Config::get('country');?>
                                                @foreach($x as $code=>$name)
                                                    @if($customerAddress->country==$code){{$name}} @endif
                                                @endforeach</li>
                                            <li> State : {{$customerAddress->state}} </li>
                                            <li> Street : {{$customerAddress->street}} </li>
                                            <li> City : {{$customerAddress->city}} </li>
                                            <li> Contact : {{$customerAddress->contact}}</li>
                                            <li>@foreach($customerAddress->latitude_long as $x=>$latlong)
                                                    {{$x}} = {{$latlong}}<br>
                                                @endforeach</li>


                                        </ul>

                                    </div>
                                </div>

                                <div class="col-sm-5 user-bottom-tight">
                                    <div class="row">
                                        <h3 class="user-title"> Map </h3>
                                        <iframe width="560" height="180"
                                                src="https://www.youtube.com/embed/1YBl3Zbt80A?ecver=1" frameborder="0"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- sm-12 -->
            </div> <!-- row -->
        </div> <!-- container -->
    </section> <!-- user-wrapper -->
@endsection
