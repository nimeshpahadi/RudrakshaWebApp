@extends('layouts.app')

@section('content')
    @include('layouts.notification')

    <div class="container">
        <div class="col-md-12">

            @include('layouts.navbar')

            <div class=" col-md-3 clearfix">

                {!! Form::model($customer,array('route'=>['customer.updateimage',$customer->id],'method'=>'PUT','enctype'=>'multipart/form-data'  ))!!}

                {{ Form::hidden('id',$customer->id  ) }}
                <span class="input-group-addon" style="height: 200px ">
                    <img @if(isset($customer->image)) src="{{asset('storage/users')}}/{{$customer->image}}"
                         style="width: 100%"
                         @else src="noavatar.png"
                         @endif class="img-responsive"
                         alt="Profile Image"></span>
                <input id="inputimage" name="image" type="file" class="file-loading">

                <div align="right">
                    {{Form::submit('Post', array('class'=>'btn btn-sm btn-primary ','title'=>'Upload image'))}}
                    {!! Form::close() !!}
                </div>

            </div>
            <div class="panel panel-default panel-danger col-md-8">
                <div class="panel-heading">
                    <h3 class="panel-title ">User Profile</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <label class="col-sm-6 "> ID :</label>
                        {{$customer->id}}
                    </div>
                    <div class="row">
                        <label class="col-sm-6 "> Name :</label>
                        {{$customer->name}}
                    </div>
                    <div class="row">
                        <label class="col-sm-6 "> Email :</label>
                        {{$customer->email}}
                    </div>

                    <div class="row">
                        <label class="col-sm-6 "> Created At :</label>
                        {{$customer->created_at}}
                    </div>

                </div>
            </div>

            <div class="panel panel-default panel-success col-md-8">
                @if(!isset($customerAddress))
                    <div align="right" style="padding: 10px">
                        <a href="{{route('customers.address', $customer->id)}}">
                            <span class=" btn btn-sm btn-success" title="Create New Address">Create Address</span>
                        </a>
                    </div>

                @else
                    <div class="panel-heading">
                        <h3 class="panel-title ">User Address</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <label class="col-sm-6 "> Country :</label>
                            {{$customerAddress->country}}
                        </div>
                        <div class="row">
                            <label class="col-sm-6 "> State :</label>
                            {{$customerAddress->state}}
                        </div>
                        <div class="row">
                            <label class="col-sm-6 "> Street :</label>
                            {{$customerAddress->street}}
                        </div>

                        <div class="row">
                            <label class="col-sm-6 "> Contact At :</label>
                            {{$customerAddress->contact}}
                        </div>

                        <div class="row">
                            <label class="col-sm-6 "> Latitude_Long :</label>
                            {{$customerAddress->latitude_long}}
                        </div>

                        <div>
                            <a href="{!! route('customers.address.edit',$customerAddress->id)!!}">
                                            <span class="  btn btn-primary glyphicon glyphicon-pencil"
                                                  data-toggle="popover" data-trigger="hover"
                                                  data-placement="top" data-content="">
                                            </span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <div class="panel panel-default panel-info col-md-8">


                @if(!isset($customerDelivery))

                    <div align="right" style="padding: 10px">
                        <a href="{{route('deliveryaddress',$customer->id)}}">
                            <span class=" btn btn-sm btn-success" title="Create new delivery address">Create Delivery Address</span>
                        </a>
                    </div>

                @else
                    <div class="panel-heading">
                        <h3 class="panel-title ">User Delivery Address</h3>
                    </div>
                    <div class="panel-body">

                        <a href="{{route('deliveryaddress.edit',$customerDelivery->id)}}">
                            <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                                    data-placement="top" data-content="Edit the {{$customerDelivery->id}} delivery">
                                <i class="fa fa-edit">edit</i>
                            </button>
                        </a>


                        <div class="row">
                            <label class="col-sm-6 "> Country :</label>
                            {{$customerDelivery->country}}
                        </div>
                        <div class="row">
                            <label class="col-sm-6 "> State :</label>
                            {{$customerDelivery->state}}
                        </div>

                        <div class="row">
                            <label class="col-sm-6 "> City:</label>
                            {{$customerDelivery->city}}
                        </div>
                        <div class="row">
                            <label class="col-sm-6 "> Latitude/Longitude:</label>
                            {{$customerDelivery->latitude_long}}
                        </div>
                        <div class="row">
                            <label class="col-sm-6 "> Address Line1:</label>
                            {{$customerDelivery->address_line1}}
                        </div>

                        <div class="row">
                            <label class="col-sm-6 "> Address Line2:</label>
                            {{$customerDelivery->address_line2}}
                        </div>
                        <div class="row">
                            <label class="col-sm-6 "> Zip-code:</label>
                            {{$customerDelivery->zip_code}}
                        </div>


                    </div>
            </div>

        </div>
        @endif
    </div>
@endsection
