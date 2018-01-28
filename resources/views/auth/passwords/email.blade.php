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

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                    <div class="profiel-header">
                        <h3>
                            <b>UPDATE</b> YOUR PASSWORD <br>
                            <small>Fill in the fields below to update your password.</small>
                        </h3>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <hr>
                    </div>

                    <div class="clear">

                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email">E-Mail Address <small>(required)</small></label>

                                <input id="email" type="email" class="form-control" name="email" value="{{  old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-10 col-sm-offset-1">
                            <input type='submit' class='btn btn-finish btn-primary pull-right' value='Send Password Reset Link' />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- end row -->
</div>

@endsection
