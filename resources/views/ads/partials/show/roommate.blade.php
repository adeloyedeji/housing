<div class="row">
    <div class="col-md-12">
        <p><i class="fa fa-check"></i> Gender: @if($ad->roommate_gender == 1) Doesn't Matter @else {{ $ad->roommate_gender }} @endif</p>
        <hr>
    </div>
    
    <div class="col-md-12">
        <p><i class="fa fa-check"></i> Age: @if($ad->rommate_age == 1) Doesn't Matter @else {{ $ad->rommate_age }} @endif</p>
        <hr>
    </div>
    
    <div class="col-md-12">
        <p><i class="fa fa-check"></i> Marital Status: @if($ad->rommate_marital_status == 1) Doesn't Matter @else {{ $ad->rommate_marital_status }} @endif</p>
        <hr>
    </div>
    
    <div class="col-md-12">
        <p><i class="fa fa-check"></i> Employment Status: @if($ad->rommate_employment_status == 1) Doesn't Matter @else {{ $ad->rommate_employment_status }} @endif</p>
        <hr>
    </div>
    
    <div class="col-md-12">
        <p><i class="fa fa-check"></i> Smokes: @if($ad->rommate_smoking_status == 1) Doesn't Matter @else {{ $ad->rommate_smoking_status }} @endif</p>
        <hr>
    </div>
    
    <div class="col-md-12">
        <p><i class="fa fa-check"></i> Has Children: @if($ad->rommate_kids_status == 1) Doesn't Matter @else {{ $ad->rommate_kids_status }} @endif</p>
        <hr>
    </div>
    
</div>