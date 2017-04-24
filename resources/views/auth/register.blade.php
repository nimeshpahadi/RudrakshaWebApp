@extends('shop.layout.app')

@section('main-content')

    <div class="account-container register">

        <div class="content clearfix">



                <h3>Register</h3>

                <div class="login-fields">


                    <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('register') }}" >
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname">First Name</label>
                                <input id="firstname" type="text" class="login" name="firstname"
                                       value="{{ old('firstname') }}" placeholder="First Name"  required autofocus>

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif

                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname">Last Name</label>
                            <input id="lastname" type="text" class="login" name="lastname"
                                   value="{{ old('lastname') }}" placeholder="Last Name"  required autofocus>

                            @if ($errors->has('lastname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="lastname" type="email" class="login" name="email"
                                   value="{{ old('email') }}" placeholder="Email"  required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif

                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                <input id="password" type="password" class="login" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">

                                <input id="password-confirm" type="password" class=" login"
                                       name="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <div class="login-actions">
                            <button class="button btn login_botom" type="submit">Register</button>

                        </div> <!-- .actions -->
            </form>

        </div> <!-- /content -->

    </div> <!-- /account-container -->
    </div> <!-- /account-container -->


    <!-- Text Under Box -->
    <div class="login-extra">
        Already have an account? <a href="/login">Login to your account</a>
    </div> <!-- /login-extra -->

@endsection