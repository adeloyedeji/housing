<div class="tab-pane" id="step1">
    <div class="row p-b-15  ">
        <h4 class="info-text"> Let's start with the basic information</h4>
        <label class="radio-inline"><input type="radio" id="need_room" name="room_option" value="1" checked>&nbsp;I need a room mate</label>
        <hr>
        <br>
        <div class="col-sm-12 col-md-12">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                    <label for="state">State <small>(required)</small></label>
                    <?php $states = \Utility::getState('all'); ?>
                    <select id="state" name="state" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select state" required>
                        @if( count($states) > 0 )
                            @foreach($states as $state)
                                @if( old('state') == $state->id )
                                    <option value="{{ $state->id }}" selected>{{ $state->state }}</option>
                                @else
                                    <option value="{{ $state->id }}">{{ $state->state }}</option>
                                @endif
                            @endforeach
                        @else
                                <option value="0">Empty</option>
                        @endif
                    </select>
                    @if ($errors->has('state'))
                        <span class="help-block">
                            <strong>{{ $errors->first('state') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                    <label for="location">Location <small>(required)</small></label>
                    <input name="location" id="location" type="text" class="form-control" placeholder="Super villa ..." value="{{ old('location') }}" required>
                    @if ($errors->has('location'))
                        <span class="help-block">
                            <strong>{{ $errors->first('location') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('move_on') ? ' has-error' : '' }}">
                    <label for="move_on">I intend to move on <small>(required)</small></label>
                    <input type="text" class="form-control datepicker" id="move_on" name="move_on" value="{{ old('move_on') }}" required>
                    @if ($errors->has('move_on'))
                        <span class="help-block">
                            <strong>{{ $errors->first('move_on') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('room_type') ? ' has-error' : '' }}">
                    <label for="room_type">Room Type <small>(required)</small></label>
                    <select id="room_type" name="room_type" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Select room type" required>
                        <option @if( old('room_type') == "Bungalow" ) selected @endif value="Bungalow">Bungalow</option>
                        <option @if( old('room_type') == "Duplex" ) selected @endif value="Duplex">Duplex</option>
                        <option @if( old('room_type') == "Flat / Apartment" ) selected @endif value="Flat / Apartment">Flat / Apartment</option>
                        <option @if( old('room_type') == "House" ) selected @endif value="House">House</option>
                        <option @if( old('room_type') == "Land" ) selected @endif value="Land">Land</option>
                        <option @if( old('room_type') == "Office Space" ) selected @endif value="Office Space">Office Space</option>
                        <option @if( old('room_type') == "Self Contain" ) selected @endif value="Self Contain">Self Contain</option>
                        <option @if( old('room_type') == "Shop" ) selected @endif value="Shop">Shop</option>
                    </select>
                    @if ($errors->has('room_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('room_type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>