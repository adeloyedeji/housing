<div class="dealer-section-space">
    <span>Dealer information</span>
</div>
<div class="clear">
    <div class="col-xs-4 col-sm-4 dealer-face">
        <a href="">
            <img src="{{ asset('') }}{{ $ad->user->image }}" class="img-circle" style="width:70px;height:70px;">
        </a>
    </div>
    <div class="col-xs-8 col-sm-8 ">
        <h3 class="dealer-name">
            <a href="">{{ $ad->user->fname }} {{ $ad->user->lname }}</a>
            <p><small><span>@</span><span>{{ $ad->user->username }}</span></small></p>
        </h3>
        <div class="dealer-social-media">
            <a class="twitter" target="_blank" href="{{ $ad->user->social->twitter ? $ad->user->social->twitter : '#' }}">
                <i class="fa fa-twitter"></i>
            </a>
            <a class="facebook" target="_blank" href="{{ $ad->user->social->facebook ? $ad->user->social->facebook : '#' }}">
                <i class="fa fa-facebook"></i>
            </a>
            <a class="gplus" target="_blank" href="{{ $ad->user->social->google ? $ad->user->social->google : '#' }}">
                <i class="fa fa-google-plus"></i>
            </a>     
        </div>

    </div>
</div>

<div class="clear">
    <ul class="dealer-contacts">                  
        @if( $ad->user->profile->current_address )
            <li><i class="pe-7s-map-marker strong"> </i> {{ $ad->user->profile->current_address }}</li>
        @endif
        <li><i class="pe-7s-mail strong"> </i> {{ $ad->user->email }}</li>
        <li><i class="pe-7s-call strong"> </i> {{ $ad->user->profile->phone ? $ad->user->profile->phone : "NOT AVAILABLE" }}</li>
    </ul>
    <p>
        {{ $ad->user->profile->about }}
    </p>
</div>