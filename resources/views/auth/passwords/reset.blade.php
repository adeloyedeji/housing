@extends('layouts.app')

@section('title')
    | Reset Password
@endsection

@section('content')
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Reset Your Password</h1>              
            </div>
        </div>
    </div>
</div>

<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">   
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 profiel-container">

                <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="profiel-header">
                        <h3>
                            <b>UPDATE</b> YOUR PASSWORD <br>
                            <small>Fill in the fields below to update your password.</small>
                        </h3>
                        <hr>
                    </div>

                    <div class="clear">

                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail Address <small>(required)</small></label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label>Password <small>(required)</small></label>
                                <input name="password" id="password" type="password" class="form-control" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label>Confirm password : <small>(required)</small></label>
                                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div> 
                        </div>
                        <div class="col-sm-10 col-sm-offset-1">
                            <input type='submit' class='btn btn-finish btn-primary pull-right' value='Submit' />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end row -->
</div>

@endsection
