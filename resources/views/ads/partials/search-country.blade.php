<div class="row">
    <form method="POST">
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="country_search">Select Country</label>
                    <select class="form-control border-input" id="country_search" name="country_search">
                        @if( count($countries) > 0)
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                            @endforeach
                        @else
                            <option value="0">Empty</option>
                        @endif
                    </select>
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