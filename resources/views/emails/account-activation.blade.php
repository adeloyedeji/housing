<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HouseMait</title>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pace-theme-bounce.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/ads.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                            <center>
                                <h3>Welcome to HouseMait</h3>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <center>
                        <h4>Hello {{ $data['name'] }}, </h4>
                        <p>
                            Thank you for registering at HouseMait. You may now verify your account by clicking this link or copying and pasting it to your browser:
                        </p>
                        <p>
                            <a href="{{ url('users/email-verification') }}/{{ $data['activation_code'] }}/{{ $data['id']}}">
                                {{ url('users/email-verification') }}/{{ $data['activation_code'] }}/{{ $data['id'] }}
                            </a>
                        </p>
                        <p>
                            <a class="btn btn-info btn-lg" href="{{ url('users/email-verification') }}/{{ $data['activation_code'] }}/{{ $data['id'] }}">
                                Verify your email
                            </a>
                        </p>
                    </center>
                </div>
                <div class="col-md-12">
                    <div class="card text-white bg-dark">
                        <div class="card-body">
                            <center>
                                &copy; {{ date('Y') }} HouseMait.
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>