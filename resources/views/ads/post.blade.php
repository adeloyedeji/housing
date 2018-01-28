@extends('layouts.app')

@section('title')
    | Post new ad
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/wizard.css') }}">
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Post a new Ad</h1>               
            </div>
        </div>
    </div>
</div>

<div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="clearfix" > 
            <div class="wizard-container"> 

                @include('ads.partials.post.wizard-section')
                <!-- End submit form -->
            </div> 
        </div>
    </div>
</div>

@endsection