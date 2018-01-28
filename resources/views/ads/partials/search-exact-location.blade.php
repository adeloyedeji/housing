<div class="row">
    <form method="POST">
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="exact_location">Enter Location</label>
                    <input type="text" class="form-control border-input" id="exact_location" name="exact_location">
                </div>
            </div>
            <div class="col-md-4">
                <p></p>
                <br>
                <p>
                    <button type="submit" class="btn btn-info btn-fill btn-wd">Search</button>
                </p>
            </div>
        </div>
    </form>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWT3Ts0ojgLU8RXYIlt-ysZF1N28bmjLs&libraries=places&callback=initializeMap" async defer></script>
<script>
    function initializeMap()
    {
        var input = document.getElementById("exact_location");
        var autoComplete = new google.maps.places.Autocomplete(input);
    }
</script>