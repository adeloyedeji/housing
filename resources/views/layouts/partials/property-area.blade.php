<div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
    <div class="container">   
        <div class="row">
            <div class="col-md-9   pr-30 padding-top-40 properties-page user-properties">
                <div class="col-md-12 "> 
                    <div class="col-xs-10 page-subheader sorting pl0 hide">

                        <ul class="sort-by-list">
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

                        <div class="items-per-page">
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

                    <div class="col-xs-2 layout-switcher pull-right">
                        <a class="layout-list active" href="javascript:void(0);"> <i class="fa fa-th-list"></i>  </a>
                        <a class="layout-grid" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>                          
                    </div><!--/ .layout-switcher-->
                </div>

                <?php $ads = app('App\Http\Controllers\AdsController')->home(); ?>
                <div class="col-md-12"> 
                    <div id="list-type" class="proerty-th-list">
                        @forelse ($ads as $ad)
                            @php
                                $image = "img/house.png";
                                if( count($ad->adImage) > 0 ) {
                                    $image = $ad->adImage[0]->image;
                                }
                            @endphp
                            <div class="col-sm-6 col-md-4 p0">
                                <div class="box-two proerty-item">
                                        
                                    <div class="item-thumb">
                                        <a href="{{ url('ads/result') }}/{{$ad->slug}}" ><img src="{{ asset('') }}/{{ $image }}"  style="100%;height:243px;"></a>
                                    </div>

                                    <div class="item-entry overflow">
                                        <h5>
                                            <a class="text-house" href="{{ url('ads/result') }}/{{$ad->slug}}" style="text-transform:none;font-family: 'ABeeZee', sans-serif;color: #3498db;"> 
                                                {{ ucwords(Utility::short_title($ad->title)) }} 
                                            </a>
                                        </h5>
                                        <div class="dot-hr"></div>
                                        <span class="pull-left"><b> Date :</b> {{ $ad->created_at->diffForHumans() }} </span>
                                        <span class="proerty-price pull-right">
                                            {{--  <span class="">My budget</span>  --}}
                                            <div class="ribbon ribbon-top-right" style="font-family: 'PT Sans', sans-serif;"><span>budget</span></div> 
                                            
                                            <span style="font-family: 'PT Sans', sans-serif;">₦ {{ number_format( $ad->max_rent) }}</span>
                                        </span>
                                        <p style="display: none;" class="text-house">
                                            <b>
                                                {{ Utility::short_description($ad->description) }}
                                            </b>
                                        </p>
                                        <div class="property-icon" style="width:100%">
                                            <img src="{{ asset('img/icon/bed.png') }}"> {{$ad->max_bed}}&emsp;/
                                            <img src="{{ asset('img/icon/shawer.png') }}"> {{$ad->max_bath}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <center><h3>Be the first to post an ad</h3></center>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-12"> 
                    <div class="pull-right">
                        <div class="pagination">
                            {{ $ads->links() }}
                        </div>
                    </div>                
                </div>
            </div>  
            {{--  <div class="col-md-3  p0 padding-top-40">
                <img class="img-responsive img-thumbnail" alt="" src="{{ asset('img/Place-Your-Advert-Here.jpg') }}">
                <br><br><br>
                <img class="img-responsive img-thumbnail" alt="" src="{{ asset('img/wwb_img24.jpg') }}">
            </div>  --}}
        </div>
    </div>
</div>