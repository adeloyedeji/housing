<div class="tab-pane" id="step5">                                        
    <h4 class="info-text"> Finished and submit </h4>
    <div class="row">  
        <div class="col-sm-12">
            <div class="">
                <p>
                    <label><strong>Terms and Conditions</strong></label>
                    By accessing or using HOUSE MAIT services such as posting 
                    your property as advertisement with your personal information 
                    on our website, you agree to the terms of use of this platform 
                    and adherence to the disclosure of your personal 
                    information in the legally proper manner.
                </p>

                <div class="form-group {{ $errors->has('terms') ? ' has-error' : '' }}">
                    <label>
                        <input type="checkbox" name="terms" {{ old('terms') ? 'checked' : '' }}> <strong>&nbsp;Accept terms and conditions.</strong>
                        @if ($errors->has('terms'))
                            <span class="help-block">
                                <strong>{{ $errors->first('terms') }}</strong>
                            </span>
                        @endif
                    </label>
                </div> 

            </div> 
        </div>
    </div>
</div>