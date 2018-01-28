@extends('layouts.app')

@section('title')
    | Notification
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/lightslider.min.css') }}">
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Notifications</h1>               
            </div>
        </div>
    </div>
</div>
<div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">   

        <div class="clearfix padding-top-40">
            <div class="row">
                <div class="col-md-12">
                    @if ( count($notifications) > 0 )
                    @for ($i = 0; $i < count($notifications); $i++)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!--<span class="pull-right"> {{ $notifications[$i]['created_at'] }}</span>-->
                                <h3>
                                    {{ $notifications[$i]['data']['type'] }}
                                </h3>
                            </div>
                            <div style="padding:10px;">
                                <b>
                                    {{ $notifications[$i]['data']['message'] }}
                                    <p></p>
                                    @if ( count($notifications[$i]['data']) == 3 )
                                        <a class="btn btn-default" href="{{$notifications[$i]['data']['url'] }}">View ad</a>
                                    @endif
                                </b>
                            </div>
                        </div>
                    @endfor
                    @else
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3>
                                You have no new notifications
                            </h3>
                            <button class="btn btn-lg btn-block btn-default" onclick="window.location='{{ url('notification/show-old') }}'">View older notifications</button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection