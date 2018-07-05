@extends('layouts.app')

@section('title')
    | {{ $ad->title }}
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('css/lightslider.min.css') }}">
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">{{ $ad->title }}</h1>               
            </div>
        </div>
    </div>
</div>

<div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">   

        <div class="clearfix padding-top-40" >

            <div class="col-md-12">
                @if( session()->has('post-ad') )
                    <div class="alert alert-success alert-dismissable"  id="alert_warn">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <span id="alert_warn_msg">{{ session('post-ad') }}</span>
                    </div>
                @endif
            </div>
            <div class="col-md-12 padding-bottom-40 large-search"> 
                <div class="search-form wow pulse">
                    <form action="{{ url('ads/search') }}" class="form-inline" method="post">
                        {{ csrf_field() }}
                        <div class="col-md-12">
                            <div class="col-md-4">
                                <input type="text" class="form-control" placeholder="Location" id="location" name="location">
                            </div>
                            <div class="col-md-4">                                   
                                <?php $states = \Utility::getState('all'); ?>
                                <select id="state" name="state" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select state">
                                    @if( count($states) > 0 )
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->state }}</option>
                                        @endforeach
                                    @else
                                            <option value="0">Empty</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">                                     
                                <select id="basic" class="selectpicker show-tick form-control" name="room_type">
                                    <option> -Room Type- </option>
                                    <option value="Bungalow">Bungalow</option>
                                    <option value="Duplex">Duplex</option>
                                    <option value="Flat / Apartment">Flat / Apartment</option>
                                    <option value="House">House</option>
                                    <option value="Land">Land</option>
                                    <option value="Office Space">Office Space</option>
                                    <option value="Self Contain">Self Contain</option>
                                    <option value="Shop">Shop</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="search-row">   
            
                                <div class="col-sm-3">
                                    <label for="price-range">Price range (N):</label>
                                    <input type="text" class="span2" value="3000,50000" data-slider-min="0" 
                                            data-slider-max="100000" data-slider-step="1000" 
                                            data-slider-value="[3000,50000]" id="price-range" name="min_price" ><br />
                                    <b class="pull-left color">N2000</b> 
                                    <b class="pull-right color">N100000</b>
                                </div>
                                <!-- End of  -->  
            
                                <div class="col-sm-3">
                                    <label for="property-geo">Min Toilets :</label>
                                    <input type="text" class="span2" value="1,5" data-slider-min="0" 
                                            data-slider-max="10" data-slider-step="1" 
                                            data-slider-value="[1,5]" id="property-geo" name="min_toilet" ><br />
                                    <b class="pull-left color">1</b> 
                                    <b class="pull-right color">10+</b>
                                </div>
                                <!-- End of  --> 
            
                                <div class="col-sm-3">
                                    <label for="price-range">Min baths :</label>
                                    <input type="text" class="span2" value="1,5" data-slider-min="0" 
                                            data-slider-max="10" data-slider-step="1" 
                                            data-slider-value="[1,5]" id="min-baths" name="min_bath" ><br />
                                    <b class="pull-left color">1</b> 
                                    <b class="pull-right color">10+</b>
                                </div>
                                <!-- End of  --> 
            
                                <div class="col-sm-3">
                                    <label for="property-geo">Min bed :</label>
                                    <input type="text" class="span2" value="1,5" data-slider-min="0" 
                                            data-slider-max="10" data-slider-step="1" 
                                            data-slider-value="[1,5]" id="min-bed" name="min_bed"><br />
                                    <b class="pull-left color">1</b> 
                                    <b class="pull-right color">10+</b>
                                </div>
                                <!-- End of  --> 
                                <div class="col-sm-12">
                                    <button class="btn btn-default btn-lg" type="submit">Search</button>
                                </div>
                            </div>  
                        </div>               
                    </form>
                </div>
            </div>
            <div class="col-md-8 single-property-content prp-style-2">
                <div class="">
                    <div class="row">
                        <div class="light-slide-item">            
                            <div class="clearfix">
                                <div class="favorite-and-print">
                                    <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                        <i class="fa fa-star-o"></i>
                                    </a>
                                    <a class="printer-icon " href="javascript:window.print()">
                                        <i class="fa fa-print"></i> 
                                    </a>
                                </div> 

                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @if( count($ad_images) > 0 )
                                        @foreach($ad_images as $image)
                                            <li data-thumb="{{ asset('') }}/{{ $image->image }}"> 
                                                <img src="{{ asset('') }}/{{ $image->image }}" style="height: 500px;width:100%">
                                            </li>
                                        @endforeach
                                    @else
                                        <li data-thumb="{{ asset('img/house.png') }}"> 
                                            <img src="{{ asset('img/house.png') }}" style="height: 500px;">
                                        </li>
                                    @endif                                        
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-property-wrapper">

                        <div class="section">
                            <h4 class="s-property-title">Description</h4>
                            <div class="s-property-content">
                                <p>
                                    {{ $ad->description }}
                                </p>
                            </div>
                        </div>
                        <!-- End description area  -->

                        <div class="section property-features">      

                            <h4 class="s-property-title">Features</h4>                            
                            <ul>
                                <li><a href="javascript:void(0)">{{ $ad->room_type }}</a></li>   
                                <li><a href="javascript:void(0)">{{ $ad->total_units }} Units Available</a></li>
                                <li><a href="javascript:void(0)">{{ $ad->max_bed }} Bed Room(s)</a></li>
                                <li><a href="javascript:void(0)">{{ $ad->max_toilet }} Toilet(s) </a></li>
                                <li><a href="javascript:void(0)">{{ $ad->max_bath }} Bath Room(s)</a></li>
                            </ul>
                        </div>

                        <div class="section property-features">      

                            <h4 class="s-property-title">Budget</h4>                            
                            <ul>
                                <li><a href="javascript:void(0)">₦ {{ $ad->max_rent }}</a></li>
                            </ul>
                        </div>

                        <!-- End features area  -->
                        @if ($ad->user_id != \Auth::id())
                        <div class="section property-features"> 
                            <h4 class="s-property-title">Contact owner</h4>  
                            <button class="navbar-btn nav-button wow fadeInRight" data-wow-delay="0.58s" onclick="window.location.href='/messaging/chat/{{$ad->user->profile->phone}}'">
                                Send a private message
                            </button>
                        </div>
                        @endif

                        
                        @include('ads.partials.show.comment-section')

                        @include('ads.partials.show.share-section')
                        <!-- End video area  -->
                    </div>
                </div>

                @include('ads.partials.show.similar-section')
            </div>

            <div class="col-md-4 p0">
                <aside class="sidebar sidebar-property blog-asside-right property-style2">
                    <div class="dealer-widget">
                        <div class="dealer-content">
                            <div class="inner-wrapper">
                                <div class="single-property-header">                                          
                                    <h1 class="property-title">{{ $ad->title }}</h1>
                                    <span class="property-price">{{ $ad->maximum_rent }}</span>
                                </div>

                                @include('ads.partials.show.dealer-section')

                            </div>
                        </div>
                    </div>
                    @include('ads.partials.show.marketing-section')
                </aside>
            </div>
        </div>
    </div>
</div>
<?php session()->forget('post-ad'); ?>
@endsection