@extends('layouts.app')

@section('content')

<div class="container">
    <nav class="navbar navbar-default navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Category <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Ekmukhe</a></li>
                            <li><a href="#">Duimukhe</a></li>
                            <li><a href="#">Tinmukhe</a></li>

                        </ul>
                    </li>
                    <li><a href="#">Product</a></li>
                    <li class="active"><a href="#">My Profile <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Cart</a></li>
                    <li><a href="#">Checkout</a></li>


                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>



<div class="row">
    <div class="col-md-12">
    <div class=" col-md-3 clearfix">

        {!! Form::model($customer,array('route'=>['customer.updateimage',$customer->id],'method'=>'PUT','enctype'=>'multipart/form-data'  ))!!}


            {{--<label for="design_image" class="col-md-4 control-label">Profile Image</label>--}}

                <span class="input-group-addon" style="height: 200px ">
                    <img @if(isset($customer->image)) src="{{asset('storage/users')}}/{{$customer->image}}" style="width: 100%"
                         @else src="noavatar.png"
                         @endif class="img-responsive"
                         alt="Profile Image"></span>
                @if(!isset($customer->image))
                    <input id="inputimage" name="image" type="file"  class="file-loading">

        <div align="right">
            {{Form::submit('Post', array('class'=>'btn btn-sm btn-primary ','title'=>'Save the category'))}}
            {!! Form::close() !!}
        </div>
        @endif

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
                <label class="col-sm-6 "> Image :</label>
                {{$customer->image}}
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
        $(document).on('ready', function() {
            $("#inputimage").fileinput({showCaption: false});
        });
    </script>
