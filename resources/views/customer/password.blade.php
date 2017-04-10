@extends('layouts.app')
@include('layouts.notification')
@section('content')
    <div class="container">
        @include('layouts.navbar')


    @if($user->id==Auth::user()->id)
                    <div class="panel panel-default col-md-5 margin-top-20" style="padding: 20px">

                        {!! Form::model($user,array('route'=>['changepassword',$user->id],'method'=>'PATCH' ))!!}
                        <h3 class="col-md-offset-3 margin-top-10 margin-bottom-30">Change Password</h3>

                            <div class="row">
                                <div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
                                    <label for="oldpassword" class="col-md-4 control-label">Old Password</label>

                                    <div class="col-md-6">
                                        <input id="oldpassword" type="password" class="form-control" name="oldpassword" required>

                                        @if ($errors->has('oldpassword'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('oldpassword') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required>
                                    </div>
                                </div>


                                <div class="col-md-offset-4">
                                    {{Form::submit('Save', array('class'=>'btn btn-success margin-top-20', 'title'=>'Save New Password'))}}
                                    <a type="button" class="btn btn-warning margin-top-20 margin-left-10"
                                       href="/profile">Cancel</a>
                                    {!! Form::close() !!}
                                </div>

                            </div>
                    </div>
        @endif
    </div>

@endsection
