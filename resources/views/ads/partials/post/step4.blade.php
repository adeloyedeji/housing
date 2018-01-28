<div class="tab-pane" id="step4">                                        
    <h4 class="info-text">Upload images. Your ad will attract more attention if it has images </h4>
    <div class="row">  
        <div class="col-sm-12">
            <div class="form-group {{ $errors->has('image1') ? ' has-error' : '' }}">
                <label for="image1">Chose Image :</label>
                <input class="form-control" type="file" name="image1" id="image1" value="{{ old('image1') }}">
                @if ($errors->has('image1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image1') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="col-sm-12">
            <div class="form-group {{ $errors->has('image2') ? ' has-error' : '' }}">
                <label for="image2">Chose Image :</label>
                <input class="form-control" type="file" name="image2" id="image2" value="{{ old('image2') }}">
                @if ($errors->has('image2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image2') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="col-sm-12">
            <div class="form-group {{ $errors->has('image3') ? ' has-error' : '' }}">
                <label for="image3">Chose Image :</label>
                <input class="form-control" type="file" name="image3" id="image3" value="{{ old('image3') }}">
                @if ($errors->has('image3'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image3') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="col-sm-12">
            <div class="form-group {{ $errors->has('image4') ? ' has-error' : '' }}">
                <label for="image4">Chose Image :</label>
                <input class="form-control" type="file" name="image4" id="image4" value="{{ old('image4') }}">
                @if ($errors->has('image4'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image4') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row">  
        <div class="col-sm-12">
            <div class="form-group {{ $errors->has('image5') ? ' has-error' : '' }}">
                <label for="image5">Chose Image :</label>
                <input class="form-control" type="file" name="image5" id="image5" value="{{ old('image5') }}">
                @if ($errors->has('image5'))
                    <span class="help-block">
                        <strong>{{ $errors->first('image5') }}</strong>
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>