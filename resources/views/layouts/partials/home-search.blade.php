<div class="home-lager-shearch" style="background-color: rgb(252, 252, 252); padding-top: 25px; margin-top: -2px;">
    <div class="container">
        <div class="col-md-12 large-search"> 
            <div class="search-form wow pulse">
                <form action="{{ url('ads/search-home') }}" method="POST" class="form-inline">
                    {{ csrf_field() }}
                    <div class="col-md-1">
                        <p class="hide">
                            House maite application
                        </p>
                    </div>
                    <div class="col-md-2">
                        <label>
                            I need a house mate
                        </label>
                    </div>
                    <div class="col-md-5">                                     
                        <input type="text" class="form-control" placeholder="Tell us where you need a room mate" id="location" name="location" required>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-default btn-lg" type="submit">Search</button>
                    </div>
                    <div class="col-md-2">
                        <p class="hide">
                            House maite application
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>