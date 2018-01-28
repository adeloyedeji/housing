<style>
.icons {
    display: none;
}
</style>
<input type="hidden" id="token" name="token" value="{{ csrf_token() }}">
<h3>Category</h3>
<div class="row">
    <div class="col-md-12">
        <label class="radio-inline"><input type="radio" id="need_room" name="room_option" checked>I need a room for rent</label>
        <label class="radio-inline"><input type="radio" id="have_room" name="room_option">I have a room for rent</label>
    </div>
</div>
<h3 id="addr_option">Where would you like to stay</h3>
<div class="row">
    <div class="col-md-6">
        <label class="control-label" for="state">State*</label>
        <select class="form-control border-input" id="state" name="state">
            <option value="0">Select a state</option>
            @if( count('states') > 0 )
                @foreach($states as $state)
                    <option value="{{$state->id}}">{{ $state->state}}</option>
                @endforeach
            @else
                <option value="0">Empty</option>
            @endif
        </select>
    </div>
    <div class="col-md-6">
        <label class="control-label" for="area">Area*</label>
        <select class="form-control border-input" id="area" name="area">
            <option value="0">Select a state to view areas</option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <label class="control-label" for="exact_location">Exact Location*</label>
        <input type="text" class="form-control border-input" id="exact_location" name="exact_location" placeholder="Type full address here." required>
    </div>
    <div class="col-md-6">
        <label class="control-label" for="maximum_rent" id="rent_option">Maximum i can pay (#)*</label>
        <input type="number" class="form-control border-input" id="maximum_rent" name="maximum_rent" placeholder="E.g. 50000" required>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <label class="control-label" for="move_on" id="move_option">I intend to move on*</label>
        <input type="text" class="form-control border-input datepicker" id="move_on" name="move_on">
    </div>
    <div class="col-md-6">
        <label class="control-label" for="room_type">Room Type*</label>
        <select class="form-control border-input" id="room_type" name="room_type">
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
<br>
<div style="display:none;" id="have_room_section">
    <div class="row">
        <div class="col-md-6">
            <label class="control-label" for="available_date">Available until</label>
            <input type="text" class="form-control border-input datepicker" id="available_date" name="available_date">
        </div>
        <div class="col-md-6">
            <label class="control-label" for="other_charges">Other Charges*</label>
            <input type="number" class="form-control border-input" id="other_charges" name="other_charges" placeholder="Other room charges" value="0" required>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label class="control-label" for="total_units">Total units available for rent*</label>
            <select class="form-control border-input" id="total_units" name="total_units">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                <option value="10+">10+</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="control-label" for="total_roommate">Total number of roommates needed</label>
            <select class="form-control border-input" id="total_roommate" name="total_roommate">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                <option value="10+">10+</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label class="control-label" for="bedrooms">Available Bedrooms*</label>
            <select class="form-control border-input" id="bedrooms" name="bedrooms">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                <option value="10+">10+</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="control-label" for="toilets">Available Toilets*</label>
            <select class="form-control border-input" id="toilets" name="toilets">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                <option value="10+">10+</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <label class="control-label" for="bathrooms">Available Bathrooms*</label>
            <select class="form-control border-input" id="bathrooms" name="bathrooms">
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
                <option value="10+">10+</option>
            </select>
        </div>
    </div>
    <br>
</div>