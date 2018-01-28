@extends('layouts.app')

@section('title')
    | Properties
@endsection

@section('content')

<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Browse ads gallery</h1>               
            </div>
        </div>
    </div>
</div>


<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">  
        <div class="row  pr0 padding-top-40 properties-page">

            @include('ads.partials.index.sidebar')

            @include('ads.partials.index.search-header')

            @include('ads.partials.index.body')
        </div>              
    </div>
</div>
    
@endsection