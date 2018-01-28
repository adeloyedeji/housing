<div class="row">
    <div class="col-md-1 col-lg-1">
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card text-black bg-info">
            <div class="card-body" style="color:#fff">
                <ul class="list-group checked-list-box">
                    <li class="list-group-item">
                        Fill in the exact address of your room for rent & find the roommates looking in your city
                    </li>
                    <li class="list-group-item" data-checked="true">
                        Fill in the field "Rent" and don't forget to include any extra fees
                    </li>
                    <li class="list-group-item">
                        The total number of rooms, Wireless internet access, amenities... provide any relevant information useful for your future roommate
                    </li>
                    <li class="list-group-item">
                         Please add a maximum of details regarding the amenities of your room for rent.
                    </li>
                    <li class="list-group-item">
                         Don't forget that a complete ad increases your chance to find the perfect roommate!
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-7 col-md-7 col-sm-12">
        <form>
            <h3> Describe your room for rent</h3>
            <hr>
            <div class="radios">
                <h4 class="text-uppercase">I want a room</h4>
                <label class="radio-inline radio-want col-sm-6">
                    &nbsp;<input type="radio" name="optradio" checked>&nbsp;a room for rent
                </label>
                <label class="radio-inline radio-inactive col-sm-6">
                    &nbsp;<input type="radio" name="optradio">&nbsp;a roommate
                </label>
            </div>
            <br>
            <h4 class="text-uppercase">I am</h4>
            <div class="radio">
                <label><input type="radio" name="optradio">A Tenant</label>
            </div>
            <div class="radio">
                <label><input type="radio" name="optradio">Owner and i live in this property</label>
            </div>
            <div class="radio disabled">
                <label><input type="radio" name="optradio">Owner and i do not live in this property</label>
            </div>
            <br>
            <hr>
            <br>
            <h4 class="text-uppercase">Where is your room for rent?</h4>
            <div class="form-group">
                <label class="control-label">Fill in the exact address of your room for rent*</label>
                <input type="text" required="required" class="form-control" placeholder="Property Location">
            </div>
            <br>
            <hr>
            <br>
            <h4 class="text-uppercase">About your room for rent</h4>
            <div class="form-group">
                <label class="control-label" for="rent">Rent Per month*</label>
                <div class="input-group">
                    <input id="rent" type="text" class="form-control" name="rent" placeholder="E.g. 120000">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label" for="extra_charges">Additional Charges*</label>
                <div class="input-group">
                    <input id="extra_charges" type="text" class="form-control" name="rent" placeholder="E.g. 120000">
                    <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Moving date*</label>
                <input type="text" required="required" class="form-control" id="moving_date" placeholder="Click here to select date">
            </div>
            <div class="form-group">
                <label class="control-label">Available until</label>
                <input type="text" required="required" class="form-control" id="available_until" placeholder="Click here to select validity period">
            </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Next</button>
        </form>
    </div>
</div>
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker3.css') }}">
<script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script>
    $(function() {
        $('#moving_date').datepicker({
            format: "yyyy-mm-dd",
            clearBtn: true,
            autoclose: true
        });
        $('#available_until').datepicker({
            format: "yyyy-mm-dd",
            clearBtn: true,
            autoclose: true
        });
    });
</script>