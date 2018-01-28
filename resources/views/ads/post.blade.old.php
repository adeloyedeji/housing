<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Post an ad - HouseMait</title>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pace-theme-bounce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/ads.css') }}">
    </head>
    <body>
        <div class="card bg-primary">
        </div>
        <div class="container">
            <div class="row" style="margin-top:-2em;">
                <div class="col-md-2">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img alt="logo" src="{{ asset('img/logo.png') }}" style="width: 200px;height:120px;">
                    </a>
                </div>
                <div class="col-md-10">
                </div>
            </div>

            <div class="container">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary btn-circle">
                                <span class="round-tab">
                                    <i class="fa fa-home"></i>
                                </span>
                            </a>
                            <p>1. ROOM FOR RENT</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">
                                <span class="round-tab">
                                    <i class="fa fa-user"></i>
                                </span>
                            </a>
                            <p>2. ROOMMATE</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">
                                <span class="round-tab">
                                    <i class="fa fa-picture-o"></i>
                                </span>
                            </a>
                            <p>3. PHOTO</p>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">
                                <span class="round-tab">
                                    <i class="fa fa-check-square"></i>
                                </span>
                            </a>
                            <p>4: FINISH</p>
                        </div>
                    </div>
                </div>
                <form role="form">
                    <div class="row setup-content" id="step-1">
                        @include('ads.partials.stage-1')
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> Step 2</h3>
                                <div class="form-group">
                                    <label class="control-label">Company Name</label>
                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Name" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Company Address</label>
                                    <input maxlength="200" type="text" required="required" class="form-control" placeholder="Enter Company Address"  />
                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> Step 3</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-12">
                            <div class="col-md-12">
                                <h3> Step 3</h3>
                                <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @include('welcome-footer')
        <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/pace.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/post.js') }}"></script>
    </body>
</html>
