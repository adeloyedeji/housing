@extends('layouts.app')

@section('title')
    | {{ $ad->title }}
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            @include('ads.partials.show.photo-content')
            <h3>Features</h3>
            <hr>
            @include('ads.partials.show.ad-content')
            <h3>Comments</h3>
            <hr>
            @include('ads.partials.show.ad-comment')
        </div>
        <div class="col-md-4">
            @include('ads.partials.show.sidebar')
        </div>
        <div class="col-md-1">
        </div>
    </div>
</div>
@endsection