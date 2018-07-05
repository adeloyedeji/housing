<div class="similar-post-section padding-top-40"> 
    <div id="prop-smlr-slide_0"> 
        <?php $ads = app('App\Http\Controllers\AdsController')->similar(); ?>
        @if( count($ads) > 0 )
            @foreach($ads as $ad)
                <?php 
                    $image = "img/house.png";
                    if( count($ad->adImage) > 0 ) {
                        foreach($ad->adImage as $adimage) {
                            $image = $adimage->image;
                        }
                    }
                ?>
                <div class="box-two proerty-item" style="height: 300px;">
                    <div class="item-thumb">
                        <a href="{{ url('ads/result') }}/{{$ad->slug}}" ><img src="{{ asset('') }}/{{ $image }}" style="height:150px;width:100%"></a>
                    </div>
                    <div class="item-entry overflow">
                        <h5><a href="{{ url('ads/result') }}/{{$ad->slug}}"> {{ $ad->title }} </a></h5>
                        <div class="dot-hr"></div>
                        <span class="pull-left"><b> Date :</b> {{ $ad->created_at->diffForHumans() }} </span>
                        <span class="proerty-price pull-right"> N {{ $ad->maximum_rent }}</span> 
                    </div>
                </div> 
            @endforeach
        @endif
    </div>
</div>