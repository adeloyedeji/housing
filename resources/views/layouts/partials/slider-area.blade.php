<!--
<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="{{ asset('img/slide1/slider-image-2.jpg') }}" alt="The Last of us"></div>
            <div class="item"><img src="{{ asset('img/slide1/slider-image-1.jpg') }}" alt="GTA V"></div>

        </div>
    </div>
    <div class="container slider-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                <h2>Finding that house mate just got easier</h2>
                <p>
                    Welcome to HouseMait. The best house sharing platform you can get. We deliver quality and trusted properties for our users. Get started by using our intuitive search engine to filter results that suit your needs.
                </p>

            </div>
        </div>
    </div>
</div>

-->





<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="{{ asset('img/slider/slide-5.jpg') }}" alt="Ikoyi bridge"></div>
            <div class="item"><img src="{{ asset('img/slider/slide-8.jpg') }}" alt="GTA V"></div>

        </div>
    </div>
    <div class="slider-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                <div class="search-form wow pulse" data-wow-delay="0.8s">

                    <form action="{{ url('ads/search') }}" method="post" class=" form-inline">
                        <button class="btn btn-default  toggle-btn" type="button"><i class="fa fa-bars"></i></button>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Location" id="location" name="location">
                        </div>
                        <div class="form-group">                                   
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
                        <div class="form-group">                                     
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
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i> Find now</button>

                        <div style="display: none;" class="search-toggle">

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
                                </div>
                            <br>      
                        </div>                    
                    </form>
                </div>
                <span style="visibility:hidden">
                    <h2>property Searching Just Got So Easy</h2>
                    <p>
                        Welcome to HouseMait. The best house sharing platform you can get. We deliver quality and trusted properties for our users. Get started by using our intuitive search engine to filter results that suit your needs.
                    </p>
                </span>
            </div>
        </div>
    </div>
</div>