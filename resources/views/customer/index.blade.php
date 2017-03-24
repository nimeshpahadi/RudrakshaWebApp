@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="container">


        <div class="row">
            <div class="col-md-12">
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


            </div>
        </div>

        <section>

        </section>
        @endsection
        <script>
            $(document).on('ready', function () {
                $("#inputimage").fileinput({showCaption: false});
            });
        </script>
