<div class="panel panel-default sidebar-menu wow fadeInRight animated" >
    <div class="panel-heading">
        <h3 class="panel-title">Smart search</h3>
    </div>
    <div class="panel-body search-widget">
        <form action="{{ url('ads/search') }}" method="POST" class="form-inline"> 
            {{ csrf_field() }}
            <fieldset>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" class="form-control" placeholder="Key word" id="keyword" name="keyword">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col-xs-12">
                        <input type="text" class="form-control" placeholder="Location" id="location" name="location">
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col-xs-12">
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
                </div>
            </fieldset>

            <fieldset class="padding-5">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="min_price">Minimum Price :</label>
                        <input type="number" class="form-control" id="min_price" name="min_price" placeholder="E.g. 20000">
                    </div>
                    <div class="col-xs-6">
                        <label for="max_price">Maximum Price :</label>
                        <input type="number" class="form-control" id="max_price" name="max_price" placeholder="E.g. 20000">
                    </div>                                
                </div>
            </fieldset>                                

            <fieldset class="padding-5">
                <div class="row">
                    <div class="col-xs-6">
                        <label for="bathrooms">Minimum Bathrooms</label>
                        <select id="bathrooms" name="bathrooms" class="form-control">
                            <option value="0">Doesn't Matter</option>
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-xs-6">
                        <label for="bedrooms">Minimum Bedrooms</label>
                        <select id="bedrooms" name="bedrooms" class="form-control">
                            <option value="0">Doesn't Matter</option>
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <div class="row">
                    <div class="col-xs-12">
                        <label for="toilets">Minimum Restrooms</label>
                        <select id="toilets" name="toilets" class="form-control">
                            <option value="0">Doesn't Matter</option>
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </fieldset>

            <fieldset >
                <div class="row">
                    <div class="col-xs-12">  
                        <input class="button btn largesearch-btn" value="Search" type="submit">
                    </div>  
                </div>
            </fieldset>                                     
        </form>
    </div>
</div>


