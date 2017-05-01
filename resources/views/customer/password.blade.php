@extends('shop.layout.app')

@section('main-content')
    <section id="change-wrapper">
        <div class="container">
            <div class="row clearfix">
                @if($user->id==Auth::user()->id)
                <div class="col-sm-12 change-password">
                    <h2> Change your password</h2>
                    <p class="creative"> Please enter your Current Password below. </p>
                    {!! Form::model($user,array('route'=>['changepassword',$user->id],'method'=>'PATCH' ))!!}


                    <div class="group col-md-offset-3">
                            <input id="oldpassword" type="password"  name="oldpassword"  required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label for="oldpassword">Current Password </label>
                        </div>


                    <div class="group col-md-offset-3">
                    <input id="password" type="password"  name="password" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label for="password" >Password</label>
                    </div>


                    <div class="group col-md-offset-3">
                        <input id="password-confirm" type="password"
                               name="password_confirmation" required>
                        <span class="highlight"></span>
                        <span class="bar"></span>

                    <label for="password-confirm" >Confirm Password</label>
                    </div>

                    {{Form::submit('Save new password', array('class'=>'btn btn-primary col-sm-2 col-md-offset-3','title'=>'Save the password change'))}}
                    <a type="button" class="btn btn-warning col-md-offset-3" href="/profile">Cancel</a>
                    {!! Form::close() !!}
                </div> <!-- col-sm-12 -->
                @endif
            </div> <!-- row -->
        </div> <!-- container -->
    </section>


@endsection
