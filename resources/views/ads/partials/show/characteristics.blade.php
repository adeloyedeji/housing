<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6">
        <p><i class="fa fa-home"></i> House</p>
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6">
        <p>{{ $ad->room_type }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6">
        <i class="fa fa-money"></i> Rent
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6">
        <p>{{ $ad->maximum_rent }}</p>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6 col-sm-6 col-lg-6">
        <i class="fa fa-calendar"></i> Availability
    </div>
    <div class="col-md-6 col-sm-6 col-lg-6">
        <p>{{ $ad->move_on }}</p>
    </div>
</div>
<hr>