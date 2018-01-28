<div class="tab-pane" id="step2">
    <h4 class="info-text"> Tell us more about your ad </h4>
    <div class="row">
        <div class="col-sm-12"> 
            <div class="col-sm-12"> 
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="title">Title <small>(required)</small>:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="E.g. 2 Bedroom flat for rent" value="{{ old('title') }}" required>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div> 
            </div> 
        </div>
        <div class="col-sm-12"> 
            <div class="col-sm-12"> 
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description">Property Description <small>(required)</small>:</label>
                    <textarea  class="form-control" id="description" name="description" required placeholder="Write brief description here">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div> 
            </div> 
        </div>

        <div class="col-sm-12">
            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('total_units') ? ' has-error' : '' }}">
                    <label for="total_units">Total Rooms <small>(required)</small> :</label>
                    <select id="total_units" name="total_units" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pick an option" required>
                        @for($i = 1; $i <= 10; $i++)
                            @if( old('total_units') == $i )
                               <option value="{{$i}}" selected>{{$i}}</option> 
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                    @if ($errors->has('total_units'))
                        <span class="help-block">
                            <strong>{{ $errors->first('total_units') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('bathrooms') ? ' has-error' : '' }}">
                    <label for="bathrooms">Bathrooms <small>(required)</small>:</label>
                    <select id="bathrooms" name="bathrooms" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="pick an option" required>
                        @for($i = 1; $i <= 10; $i++)
                            @if( old('bathrooms') == $i )
                               <option value="{{$i}}" selected>{{$i}}</option> 
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                    @if ($errors->has('bathrooms'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bathrooms') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('bedrooms') ? ' has-error' : '' }}">
                    <label for="bedrooms">Bedrooms  <small>(required)</small>:</label>
                    <select id="bedrooms" name="bedrooms" class="selectpicker show-tick form-control" data-live-search="true" data-live-search-style="begins" title="pick an option" required>
                        @for($i = 1; $i <= 10; $i++)
                            @if( old('bedrooms') == $i )
                               <option value="{{$i}}" selected>{{$i}}</option> 
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                    @if ($errors->has('bedrooms'))
                        <span class="help-block">
                            <strong>{{ $errors->first('bedrooms') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group {{ $errors->has('toilets') ? ' has-error' : '' }}">
                    <label for="toilets">Toilets  <small>(required)</small>:</label>
                    <select id="toilets" name="toilets" class="selectpicker show-tick form-control" data-live-search="true" data-live-search-style="begins" title="pick an option" required>
                        @for($i = 1; $i < 10; $i++)
                            @if( old('toilets') == $i )
                               <option value="{{$i}}" selected>{{$i}}</option> 
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                    @if ($errors->has('toilets'))
                        <span class="help-block">
                            <strong>{{ $errors->first('toilets') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-12 padding-top-15"> 
            <div class="col-sm-12 col-md-6">
                <div class="form-group {{ $errors->has('price_range') ? ' has-error' : '' }}">
                    <label for="price_range">My budget is <small>(required) including other charges</small> :</label>
                    <input type="number" class="form-control" id="price_range" name="price_range" placeholder="E.g. 20000" value="{{ old('price_range') }}" required>
                    @if ($errors->has('price_range'))
                        <span class="help-block">
                            <strong>{{ $errors->first('price_range') }}</strong>
                        </span>
                    @endif
                </div>
            </div>   
        </div>
        <br>
    </div>
</div>