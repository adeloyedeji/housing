<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>HOUSE MAIT | Home page</title>
        <meta name="description" content="HOUSE MAIT is a real-estate company">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=ABeeZee" rel="stylesheet">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="{{ asset('img/favicon.PNG') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('img/favicon.PNG') }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fontello.css') }}">
        <link href="{{ asset('fonts/icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet">
        <link href="{{ asset('fonts/icon-7-stroke/css/helper.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.css') }}" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}"> 
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/icheck.min_all.css') }}">
        <link rel="stylesheet" href="{{ asset('css/price-range.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">  
        <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
        <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('css/housemait.css') }}">
</head>
<body>
    <div id="mait">
        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        @include('layouts.partials.nav-bar') 
        {{--  @include('layouts.partials.home-search')  --}}
        @include('layouts.partials.slider-area')
        @include('layouts.partials.property-area')
        @include('layouts.partials.footer')
    </div> 
    @include('layouts.partials.script')
</body>
</html>
