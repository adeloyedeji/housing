@extends('layouts.app')

@section('title')
    | My Ads
@endsection

@section('content')
    <style>
        h4 {
            color: #593196;
            font-weight: normal;
        }
    </style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title text-uppercase">Your Ads</h4>
                <p class="category">Ads on HouseMait</p>
            </div>
            <div class="content">
                <p class="category">If you have posted any ads, they will appear here.</p>
            </div>
        </div>
    </div>
</div>

@if( count($ads) > 0)
    @foreach($ads as $ad)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title text-uppercase">{{ $ad->title }}</h4>
                        <p class="category">{{ $ad->description }}</p>
                    </div>
                    <div class="content">
                        <a href="{{ url('ads/personal') }}/{{$ad->slug}}">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
@endsection