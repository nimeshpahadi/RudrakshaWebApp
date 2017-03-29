@extends('admin.Layout.app')

@section('main-content')


    @if(isset($customerid))
        <div class="panel panel-success pad ">
            <div class="panel-heading "><h5>Customer Profile</h5>
            </div>


            <div class="row">
                <label class="col-sm-6 "> Name :</label>
                {{$customerid->name}}
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
                <td>@if($customerid->status==1)Active @else Inactive @endif</td>
            </div>
        </div>
    @endif




@endsection