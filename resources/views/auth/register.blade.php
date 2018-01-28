@extends('layouts.app')

@section('title')
    | Register / Login
@endsection

@section('content')
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">New account / Sign in </h1>               
            </div>
        </div>
    </div>
</div>
<!-- End page header -->


<!-- register-area -->
<div class="register-area" style="background-color: rgb(249, 249, 249);">
    <div class="container">
        <div class="col-md-6">
            <div class="box-for overflow">
                <div class="col-md-12 col-xs-12 register-blocks">
                    <h2>New account : </h2> 
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">
                                <label for="name">First name</label>
                                <input type="text" class="form-control" id="fname" name="fname" value="{{ old('lname') }}">
                                @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">
                                <label for="name">Last name</label>
                                <input type="text" class="form-control" id="lname" name="lname" value="{{ old('lname') }}">
                                @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group @if( session()->has('auth_sess') && session('auth_sess') == 1) {{ $errors->has('email') ? ' has-error' : '' }} @endif">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                @if(session()->has('auth_sess') && session('auth_sess') == 1)
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @if(session()->has('auth_sess') && session('auth_sess') == 1) {{ $errors->has('password') ? ' has-error' : '' }} @endif">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                                @if(session()->has('auth_sess') && session('auth_sess') == 1)
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">I am</label>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="gender" id="gender_male" value="1">A Male
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="gender" id="gender_female" value="0">A Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-default">Register</button>
                            <a href="{{ route('password.request') }}">Forgot Password</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box-for overflow">                         
                <div class="col-md-12 col-xs-12 login-blocks">
                    <h2>Login : </h2> 
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group @if(session()->has('auth_sess') && session('auth_sess') == 2) {{ $errors->has('email') ? ' has-error' : '' }} @endif">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            @if(session()->has('auth_sess') && session('auth_sess') == 2)
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            @endif
                        </div>

                        <div class="form-group @if(session()->has('auth_sess') && session('auth_sess') == 2) {{ $errors->has('password') ? ' has-error' : '' }} @endif">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @if(session()->has('auth_sess') && session('auth_sess') == 2)
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            @endif
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me on this device
                            </label>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-default"> Log in</button>
                        </div>
                    </form>
                    <br>
                    
                    <h2>Social login :  </h2> 
                    
                    <p>
                    <a class="login-social" href="#"><i class="fa fa-facebook"></i>&nbsp;Facebook</a> 
                    <a class="login-social" href="#"><i class="fa fa-google-plus"></i>&nbsp;Gmail</a> 
                    <a class="login-social" href="#"><i class="fa fa-twitter"></i>&nbsp;Twitter</a>  
                    </p> 
                </div>
                
            </div>
        </div>

    </div>
</div>
@endsection
