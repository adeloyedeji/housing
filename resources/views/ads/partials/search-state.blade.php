<div class="row">
    <form method="POST">
        <div class="col-md-12">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label" for="state_search">Select State</label>
                    <select class="form-control border-input" id="state_search" name="state_search">
                        @if( count($states) > 0)
                            @foreach($states as $state)
                                <option value="{{ $state->id }}">{{ $state->state }}</option>
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