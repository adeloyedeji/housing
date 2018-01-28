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
