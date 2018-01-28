<style>
    #ad_contact {
        background-color: #593196;
    }
</style>
<h3>Complete and Post your ad</h3>
<div class="row">
    <div class="col-md-6">
        <label class="control-label" for="ad_title">Title*</label>
        <input type="text" class="form-control border-input" id="ad_title" name="ad_title" placeholder="E.g. 2 Bedroom flat for rent">
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <label class="control-label" for="ad_description">Description* (50 Character minimum)</label>
        <textarea class="form-control border-input" id="ad_description" name="ad_description" placeholder="Describe your apartment here"></textarea>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <div class="checkbox">
            <label>
                <input type="checkbox" name="ad_contact" id="ad_contact" {{ old('ad_contact') ? 'checked' : '' }}> I do not want to be contacted by phone
            </label>
        </div>
    </div>
</div>
<br>