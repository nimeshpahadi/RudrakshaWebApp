@extends('admin.Layout.app')

@section('main-content')


    @if(isset($customerid))

        <div class="panel panel-success pad ">
            <div class="panel-heading "><h5>Customer Profile</h5>
            </div>


            <div class="row">
                <label class="col-sm-6 ">First Name :</label>
                {{$customerid->firstname}}
            </div>
            <div class="row">
                <label class="col-sm-6 ">Second Name :</label>
                {{$customerid->lastname}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Email:</label>
                {{$customerid->email}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Contact :</label>
                {{$customerid->contact}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Alternative Contact :</label>
                {{$customerid->alternative_contact}}
            </div>

            <div class="row">
                <label class="col-sm-6 "> Status:</label>
                <td>@if($customerid->confirmed==1)Active @else Inactive @endif</td>
            </div>
        </div>
    @endif

    <div class="panel panel-primary pad ">
    <div class="panel-heading">
        <h3 class="panel-title ">User Address</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <label class="col-sm-6 "> Country :</label>
            <?php $x = Config::get('country');?>
            @foreach($x as $code=>$name)
                @if($address->country==$code){{$name}} @endif
            @endforeach
        </div>
        <div class="row">
            <label class="col-sm-6 "> State :</label>
            {{$address->state}}
        </div>
        <div class="row">
            <label class="col-sm-6 "> Street :</label>
            {{$address->street}}
        </div>
        <div class="row">
            <label class="col-sm-6 "> City :</label>
            {{$address->city}}
        </div>

        <div class="row">
            <label class="col-sm-6 "> Contact :</label>
            {{$address->contact}}
        </div>

{{--        {{dd($address->latitude_long)}}--}}
        <div class="row">
            <label class="col-sm-6 "> Location:</label>
            @foreach($address->latitude_long as $x=>$latlong)
                {{$x}} = {{$latlong}}<br>
            @endforeach
        </div>

        <div>
        </div>
    </div>
    </div>





@endsection