@extends('layouts.app')

@section('title')
    | Home Page
@endsection

@section('content')
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Your Ads on HouseMait</h1>               
            </div>
        </div>
    </div>
</div>

<div class="content-area recent-property" style="background-color: #FFF;">
    <div class="container">   
        <div class="row">

            <div class="col-md-9 pr-30 padding-top-40 properties-page user-properties">

                <div class="section"> 
                    <div class="page-subheader sorting pl0 pr-10" style="display:none">


                        <ul class="sort-by-list pull-left">
                            <li class="active">
                                <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                    Property Date <i class="fa fa-sort-amount-asc"></i>					
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                    Property Price <i class="fa fa-sort-numeric-desc"></i>						
                                </a>
                            </li>
                        </ul><!--/ .sort-by-list-->

                        <div class="items-per-page pull-right">
                            <label for="items_per_page"><b>Property per page :</b></label>
                            <div class="sel">
                                <select id="items_per_page" name="per_page">
                                    <option value="3">3</option>
                                    <option value="6">6</option>
                                    <option value="9">9</option>
                                    <option selected="selected" value="12">12</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
                                </select>
                            </div><!--/ .sel-->
                        </div><!--/ .items-per-page-->
                    </div>

                </div>

                <div class="section"> 
                    <div id="list-type" class="proerty-th-list">
                        @forelse ($ads as $ad)
                            @php
                                $image = "img/house.png";
                                if( count($ad->adsImage) > 0 ) {
                                    $image = $ad->adsImage[0]->image;
                                }
                            @endphp
                            <div class="col-md-4 p0">
                                <div class="box-two proerty-item">
                                    <div class="item-thumb">
                                        <a href="{{ url('ads/result') }}/{{ $ad->slug }}" >
                                            <img src="{{ asset('') }}{{ $image }}">
                                        </a>
                                    </div>
                                    <div class="item-entry overflow">
                                        <h5><a class="text-house" href="{{ url('ads/result') }}/{{$ad->slug}}"> {{ $ad->title }} </a></h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b> Date :</b> {{ $ad->created_at->diffForHumans() }} </span>
                                        <span class="proerty-price pull-right"> N <span class="price-ch">{{ number_format($ad->max_rent) }}</span></span>
                                        <p class="text-house" style="display: none;">
                                            <b>
                                                {{ $ad->description }}
                                            </b>
                                        </p>
                                        <div class="property-icon">
                                            <img src="{{ asset('img/icon/bed.png') }}"> {{ $ad->max_bed }}
                                            <img src="{{ asset('img/icon/shawer.png') }}"> {{ $ad->max_bath }}

                                            <div class="dealer-action pull-right">                                        
                                                <!--<a href="#" class="button">Edit </a>-->
                                                <a href="javascript:void(0)" class="button delete_user_car" onclick="delete_ad({{$ad->id}})">Delete</a>
                                                <a href="{{ url('ads/result') }}/{{ $ad->slug }}" class="button">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h3>Welcome {{ Auth::user()->fname }} {{ Auth::user()->lname }}</h3>
                            <h3>It looks quiet in here, click the "Post an ad" button above to get started...</h3>
                        @endforelse                                                   
                    </div>
                </div>

                <div class="section"> 
                    <div class="pull-right">
                        <div class="pagination">
                            {{ $ads->links() }}
                        </div>
                    </div>                
                </div>

            </div>       

            <div class="col-md-3 p0 padding-top-40">
                <div class="blog-asside-right">
                    <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                        <div class="panel-heading">
                            <h3 class="panel-title">Hello {{ \Auth::user()->fname }} {{ \Auth::user()->lname }}</h3>
                        </div>
                        <div class="panel-body search-widget">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
<script>
    function delete_ad(id) {
        var n = new Noty({
            text: 'This advert is going to be deleted?',
            buttons: [
                Noty.button('YES', 'btn btn-success', function () {
                        $.get("/ads/delete_ad/" + id, function(data, xhr, status) {
                            if(data == 1) {
                                new Noty({
                                    type: 'success',
                                    layout: 'bottomLeft',
                                    text: 'Your ad has been deleted.'
                                }).show()
                                n.close()
                                window.location.reload()
                            } else {
                                new Noty({
                                    type: 'warning',
                                    layout: 'bottomLeft',
                                    text: 'Ad could not be deleted at the moment. Reload your browser and try again.'
                                }).show()
                                n.close()
                            }
                        });
                }, {id: 'button1', 'data-status': 'ok'}),

                Noty.button('NO', 'btn btn-error', function () {
                    console.log('button 2 clicked')
                    n.close()
                })
            ]
        }).show();
    }

    function pretty_number(value) {
        return number( value, 3, ',' );
    }
    $(function () {
        var price = $(".price-ch").text();
        console.log(typeof price);
    });
</script>
@endsection