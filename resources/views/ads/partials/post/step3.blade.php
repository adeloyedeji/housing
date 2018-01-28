<div class="tab-pane" id="step3">
    <h4 class="info-text"> Room mate options </h4>
    <label class="radio-inline" onclick="need_roommate()">
        <input type="radio" id="need_roommate" name="roomate_option" value="1" checked>&nbsp;I would also need a roommate
    </label>
    <label class="radio-inline" onclick="dont_need_roommate()">
        <input type="radio" id="dont_need_roommate" name="roomate_option" value="0">&nbsp;I don't need a roommate
    </label>
    <div id="optional">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('total_roommate') ? ' has-error' : '' }}">
                    <label class="control-label" for="total_roommate">Total room mates</label>
                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" required id="total_roommate" name="total_roommate">
                        @for($i = 1; $i <= 10; $i++)
                            @if( old('total_roommate') == $i )
                               <option value="{{$i}}" selected>{{$i}}</option> 
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                    @if ($errors->has('total_roommate'))
                        <span class="help-block">
                            <strong>{{ $errors->first('total_roommate') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('roommate_gender') ? ' has-error' : '' }}">
                    <label class="control-label" for="roommate_gender">Gender</label>
                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" required id="roommate_gender" name="roommate_gender">
                        <option @if( old('roommate_gender') == "1" ) selected @endif value="1">Doesn't Matter</option>
                        <option @if( old('roommate_gender') == "Male" ) selected @endif value="Male">Male</option>
                        <option @if( old('roommate_gender') == "Female" ) selected @endif value="Female">Female</option>
                    </select>
                    @if ($errors->has('roommate_gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('roommate_gender') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('rommate_age') ? ' has-error' : '' }}">
                    <label class="control-label" for="rommate_age">Age</label>
                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" required id="rommate_age" name="rommate_age">
                        <option @if( old('rommate_age') == "1" ) selected @endif value="1">Doesn't Matter</option>
                        <option @if( old('rommate_age') == "16-20" ) selected @endif value="16-20">16-20</option>
                        <option @if( old('rommate_age') == "21-25" ) selected @endif value="21-25">21-25</option>
                        <option @if( old('rommate_age') == "26-35" ) selected @endif value="26-35">26-35</option>
                        <option @if( old('rommate_age') == "35-46" ) selected @endif value="35-46">35-46</option>
                        <option @if( old('rommate_age') == "46+" ) selected @endif value="46+">46+</option>
                    </select>
                    @if ($errors->has('rommate_age'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rommate_age') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('rommate_marital_status') ? ' has-error' : '' }}">
                    <label class="control-label" for="rommate_marital_status">Marital Status</label>
                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" required id="rommate_marital_status" name="rommate_marital_status">
                        <option @if( old('rommate_marital_status') == "1" ) selected @endif value="1">Doesn't Matter</option>
                        <option @if( old('rommate_marital_status') == "Single" ) selected @endif value="Single">Single </option>
                        <option @if( old('rommate_marital_status') == "In a relationship" ) selected @endif value="In a relationship">In a relationship</option>
                        <option @if( old('rommate_marital_status') == "Engaged" ) selected @endif value="Engaged">Engaged</option>
                        <option @if( old('rommate_marital_status') == "Married" ) selected @endif value="Married">Married</option>
                        <option @if( old('rommate_marital_status') == "Widow / Widower" ) selected @endif value="Widow / Widower">Widow / Widower</option>
                    </select>
                    @if ($errors->has('rommate_marital_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rommate_marital_status') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('rommate_employment_status') ? ' has-error' : '' }}">
                    <label class="control-label" for="rommate_employment_status">Employment Status</label>
                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" required id="rommate_employment_status" name="rommate_employment_status">
                        <option @if( old('rommate_employment_status') == "1" ) selected @endif value="1">Doesn't Matter</option>
                        <option @if( old('rommate_employment_status') == "Student" ) selected @endif value="Student">Student </option>
                        <option @if( old('rommate_employment_status') == "Employed" ) selected @endif value="Employed">Employed</option>
                        <option @if( old('rommate_employment_status') == "Self Employed / Freelance" ) selected @endif value="Self Employed / Freelance">Self Employed / Freelance</option>
                        <option @if( old('rommate_employment_status') == "Unemployed" ) selected @endif value="Unemployed">Unemployed</option>
                        <option @if( old('rommate_employment_status') == "Other" ) selected @endif value="Other">Other</option>
                    </select>
                    @if ($errors->has('rommate_employment_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rommate_employment_status') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('rommate_smoking_status') ? ' has-error' : '' }}">
                    <label class="control-label" for="rommate_smoking_status">Is a somker</label>
                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" required id="rommate_smoking_status" name="rommate_smoking_status">
                        <option @if( old('rommate_smoking_status') == "1" ) selected @endif value="1">Doesn't Matter</option>
                        <option @if( old('rommate_smoking_status') == "Yes" ) selected @endif value="Yes">Yes </option>
                        <option @if( old('rommate_smoking_status') == "No" ) selected @endif value="No">No</option>
                    </select>
                    @if ($errors->has('rommate_smoking_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rommate_smoking_status') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('rommate_pets_status') ? ' has-error' : '' }}">
                    <label class="control-label" for="rommate_pets_status">Has Pets</label>
                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" required id="rommate_pets_status" name="rommate_pets_status">
                        <option @if( old('rommate_pets_status') == "1" ) selected @endif value="1">Doesn't Matter</option>
                        <option @if( old('rommate_pets_status') == "Yes" ) selected @endif value="Yes">Yes </option>
                        <option @if( old('rommate_pets_status') == "No" ) selected @endif value="No">No</option>
                    </select>
                    @if ($errors->has('rommate_pets_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rommate_pets_status') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('rommate_kids_status') ? ' has-error' : '' }}">
                    <label class="control-label" for="rommate_kids_status">Has kids</label>
                    <select class="selectpicker" data-live-search="true" data-live-search-style="begins" required id="rommate_kids_status" name="rommate_kids_status">
                        <option @if( old('rommate_kids_status') == "1" ) selected @endif value="1">Doesn't Matter</option>
                        <option @if( old('rommate_kids_status') == "Yes" ) selected @endif value="Yes">Yes </option>
                        <option @if( old('rommate_kids_status') == "No" ) selected @endif value="No">No</option>
                    </select>
                    @if ($errors->has('rommate_kids_status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('rommate_kids_status') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
<script>
    function need_roommate() {
        $("#optional").fadeIn("slow");
    }

    function dont_need_roommate() {
        $("#optional").fadeOut("slow");
    }
</script>