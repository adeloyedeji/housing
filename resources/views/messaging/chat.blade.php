@extends('layouts.app')

@section('title')
    | Messaging - {{ $user->fname . ' ' . $user->lname }}
@endsection

@section('content')
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Currently Chatting / {{ $user->fname . ' ' . $user->lname }}</h1>               
            </div>
        </div>
    </div>
</div>
<div class="content-area recent-property" style="background-color: #FFF;">
    <div class="container">   
        <div class="row">
            <div class="col-md-12 pr-30 padding-top-40 properties-page user-properties">
                <div class="section">
                    <chat-component :phone="{{$user->profile->phone}}"></chat-component>
                </div>
            </div>
            {{--  <div class="col-md-3 p0 padding-top-40">
                <div class="blog-asside-right">
                    <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                        <div class="panel-heading">
                            <h3 class="panel-title">People Nearby</h3>
                        </div>
                        <div class="panel-body search-widget">
                            <people-in-your-area></people-in-your-area>
                        </div>
                    </div>
                </div>
            </div>  --}}
        </div>
    </div>
</div>
@endsection