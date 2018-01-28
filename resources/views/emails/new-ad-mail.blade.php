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
                    <div class="card text-white bg-primary" style="background-color: #593196;color:#ffffff">
                        <div class="card-body">
                            <center>
                                <h3>New Ad Notification</h3>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <center>
                        <h4>Hello {{ Auth::user()->fname }} {{ Auth::user()->lname }}, </h4>
                        <p>
                            This is to notify you that your ad has been posted on HouseMait and you will be notified once there are any activities around your ad.
                        </p>
                        <p class="text-muted">
                            If you did not post this ad, we recommend you change your housemait password immediately by following this <a href="{{ url('password/reset') }}">link</a>
                        </p>
                        <p>
                            <h3>Ad Details</h3>
                            <h4>Title: {{$title}}</h4>
                            <h4>Description:</h4>
                            <p>{{ $description }}</p>
                            <a href="{{ url('ads/result') }}/{{$slug}}">View full details</a>
                        </p>
                    </center>
                </div>
                <div class="col-md-12">
                    <div class="card text-white bg-dark" style="background-color: #cccccc;color:#ffffff">
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