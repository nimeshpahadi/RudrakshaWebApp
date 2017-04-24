@extends('shop.layout.app')

@section('main-content')


    <div class="account-container">

        <div class="content clearfix">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif


            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <h3>Member Login</h3>

                <div class="login-fields">

                    <p>Please provide your details</p>


                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <label for="username"> <img src="{{asset('shop/images/user.png')}}"> </label>

                        <input id="username" type="email" class="login username-field" name="email"
                               value="{{ old('email') }}" placeholder="Email" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                        @endif
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password:</label>

                        <input id="password" type="password" class="login password-field" name="password" placeholder="Password"
                               required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                        @endif
                    </div>

                </div> <!-- /login-fields -->


                <div class="form-group">

                             <span class="login-checkbox">
                                <input id="Field" type="checkbox" class="field login-checkbox" value="First Choice"
                                       tabindex="4"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                             </span>



                        <button type="submit" class="button btn login_botom">
                            Login
                        </button>



                    </div>


            </form>

        </div> <!-- /content -->

    </div> <!-- /account-container -->

    <div class="login-extra">
        <a class="btn btn-link" href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>
    </div> <!-- /login-extra -->

@endsection
