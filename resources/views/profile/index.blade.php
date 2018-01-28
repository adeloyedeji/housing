@extends('layouts.app')

@section('title')
    | Profile
@endsection

@section('content')
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Hello : <span class="orange strong">{{ \Auth::user()->fname }} {{ \Auth::user()->lname }}</span></h1>
            </div>
        </div>
    </div>
</div>

<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">   
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 profiel-container">

                <form action="{{ url('profile') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="profiel-header">
                        <h3>
                            <b>BUILD</b> YOUR PROFILE <br>
                            <small>Your information will help others to contact you on ads.</small>
                        </h3>
                        @if( session()->has('status'))
                            <div class="alert alert-success alert-dismissable"  id="alert_warn">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <span id="alert_warn_msg">{{ session('status') }}</span>
                            </div>
                        @endif
                        <hr>
                    </div>

                    <div class="clear">
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{ asset('') }}{{ \Auth::user()->image }}" class="picture-src" id="wizardPicturePreview" title="{{ \Auth::user()->fname }} {{ \Auth::user()->lname }}" style="width:100%;height:100%">
                                </div>
                                <div class="form-group {{ $errors->has('profile') ? ' has-error' : '' }}">
                                    <label for="profile">Change profile photo :</label>
                                    <input class="form-control" type="file" name="profile" id="profile" value="{{ old('profile') }}">
                                    @if ($errors->has('profile'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('profile') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3 padding-top-25">

                            <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                <label>First Name <small>(required)</small></label>
                                <input name="first_name" type="text" class="form-control" placeholder="Andrew..." value="{{ \Auth::user()->fname }}" required>
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label>Last Name <small>(required)</small></label>
                                <input name="last_name" type="text" class="form-control" placeholder="Smith..." value="{{ \Auth::user()->lname }}" required>
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>  
                        </div>
                        <div class="col-sm-3 padding-top-25">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label>Email <small>(required)</small></label>
                                <input name="email" type="email" class="form-control" placeholder="andrew@email@email.com.com" value="{{ \Auth::user()->email }}" required disabled>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label>Phone <small>(required)</small></label>
                                <input name="phone" type="text" class="form-control" placeholder="08107654663" value="{{ $profile->phone1 }}" required>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  
                        <div class="col-sm-3 padding-top-25">
                            <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                <label>Username <small>(required)</small></label>
                                <input name="username" type="text" class="form-control" value="{{ \Auth::user()->username }}" required>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="clear">
                        <br>
                        <hr>
                        <br>
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group {{ $errors->has('facebook_handle') ? ' has-error' : '' }}">
                                <label>Facebook :</label>
                                <input name="facebook_handle" type="text" class="form-control" placeholder="https://facebook.com/user" value="{{ $social->facebook }}">
                                @if ($errors->has('facebook_handle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook_handle') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('twitter_handle') ? ' has-error' : '' }}">
                                <label>Twitter :</label>
                                <input name="twitter_handle" type="text" class="form-control" placeholder="https://Twitter.com/@user" value="{{ $social->twitter }}">
                                @if ($errors->has('twitter_handle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter_handle') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('google_handle') ? ' has-error' : '' }}">
                                <label>Google :</label>
                                <input name="google_handle" type="text" class="form-control" placeholder="https://plus.google.com/" value="{{ $social->google }}">
                                @if ($errors->has('google_handle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('google_handle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="col-sm-5">
                            <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                                <label>Address :</label>
                                <input name="address" type="text" class="form-control" placeholder="E.g. 5, broad street" value="{{ $profile->current_address }}" required>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('city') ? ' has-error' : '' }}">
                                <label>City :</label>
                                <input name="city" type="text" class="form-control" placeholder="CMS" value="{{ $profile->city }}" required>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                                <label>State :</label>
                                <select id="state" name="state" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select state" required>
                                    @if( count($states) > 0 )
                                        @foreach($states as $state)
                                            @if( $profile->state_id == $state->id )
                                                <option value="{{ $state->id }}" selected>{{ $state->state }}</option>
                                            @else
                                                <option value="{{ $state->id }}">{{ $state->state }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                            <option value="0">Empty</option>
                                    @endif
                                </select>
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                                <label>Country :</label>
                                <select id="country" name="country" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select Country" required>
                                    @if( count($countries) > 0 )
                                        @foreach($countries as $country)
                                            @if( $profile->country_id == $country->id )
                                                <option value="{{ $country->id }}" selected>{{ $country->country }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                                            @endif
                                        @endforeach
                                    @else
                                            <option value="0">Empty</option>
                                    @endif
                                </select>
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                                <label>About Me</label>
                                <textarea class="form-control" name="about" id="about" required placeholder="A little about myself" style="height:200px">{{ $profile->about }}</textarea>
                                @if ($errors->has('about'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('about') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
            
                    <div class="col-sm-5 col-sm-offset-1">
                        <br>
                        <input type='submit' class='btn btn-finish btn-primary' name='finish' value='Finish' />
                    </div>
                    <br>
            </form>

        </div>
    </div><!-- end row -->

</div>

@endsection