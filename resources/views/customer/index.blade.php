@extends('shop.layout.app')

@section('main-content')

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
                                <li><i class="fa fa-pencil-square-o"></i> <a href="/profile/{{$customer->id}}/password">
                                        Change password </a></li>
                                <li><i class="fa fa-history"></i> <a href="/profile/{{$customer->id}}/history"> History </a></li>
                                <li><i class="fa fa-sign-out"></i> <a href="{{ route('logout') }}"
                                                                      onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Log out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
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
                                    <h3 class="user-title"> User address </h3>

                                    @if(!isset($customerAddress))
                                        <a href="{{route('customers.address',$customer->id)}}">
                                                    <span class=" fa fa-plus-circle col-sm-5"
                                                          data-toggle="popover" data-trigger="hover"
                                                          data-placement="top"
                                                          data-content="create the {{$customer->id}} address">
                                                    </span>
                                        </a>
                                    @else
                                        <a href="{!! route('customers.address.edit',$customer->id)!!}">
                                                    <span class=" fa fa-pencil col-sm-5"
                                                          data-toggle="popover" data-trigger="hover"
                                                          data-placement="top"
                                                          data-content="Edit the {{$customer->id}} address">
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
                                        </ul>

                                    @endif

                                </div>


                                <div class="col-sm-7 user-bottom">
                                    <h3 class="user-title"> Delivery address </h3>

                                    @if(!isset($customerDelivery))
                                        <a href="{{route('deliveryaddress',$customer->id)}}">
                                                    <span class=" fa fa-plus-circle col-sm-5"
                                                          data-toggle="popover" data-trigger="hover"
                                                          data-placement="top"
                                                          data-content="create the {{$customer->id}} delivery">
                                                    </span>
                                        </a>
                                    @else
                                        <a href="{{route('deliveryaddress.edit',$customerDelivery->id)}}">
                                                    <span class=" fa fa-pencil col-sm-5"
                                                          data-toggle="popover" data-trigger="hover"
                                                          data-placement="top"
                                                          data-content="Edit the {{$customerDelivery->id}} delivery">
                                                    </span>
                                        </a>
                                        <ul class=" user-details">
                                            <li>
                                                Country :
                                                <?php $x = Config::get('country');?>
                                                @foreach($x as $code=>$name)
                                                    @if($customerDelivery->country==$code){{$name}} @endif
                                                @endforeach</li>
                                            <li> State :{{$customerDelivery->state}}</li>
                                            <li> City :{{$customerDelivery->city}}</li>
                                            <li> Contact :{{$customerDelivery->contact}}</li>


                                            <li>Address Line1 : {{$customerDelivery->address_line1}} </li>
                                            <li>Address Line2 : {{$customerDelivery->address_line2}} </li>
                                            <li>Address Note : {{$customerDelivery->address_note}} </li>
                                        </ul>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                    </div> <!-- sm-12 -->
                </div> <!-- row -->
            </div> <!-- container -->
    </section> <!-- user-wrapper -->
@endsection
