<div class="col-md-12 clear"> 
    @if(session()->has('search'))
        @if(session('search') == 1)
            <h3 class="panel-title">
                We found '{{ count($ads) }}' matching results
                <hr>
            </h3>
        @endif
    @endif
    <div id="list-type" class="proerty-th">
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
                <div class="col-sm-6 col-md-3 p0">
                    <div class="box-two proerty-item">
                        <div class="item-thumb">
                            <a href="{{ url('ads/result') }}/{{$ad->slug}}" ><img src="{{ asset('') }}/{{ $image }}" style="100%;height:243px;"></a>
                        </div>

                        <div class="item-entry overflow">
                            <h5>
                                <a class="text-house" href="{{ url('ads/result') }}/{{$ad->slug}}" style="text-transform:none"> 
                                    {{ ucwords(Utility::short_title($ad->title)) }} 
                                </a>
                            </h5>
                            <div class="dot-hr"></div>
                            <span class="pull-left"><b> Date :</b> {{ $ad->created_at->diffForHumans() }} </span>
                            <span class="proerty-price pull-right"> N {{ number_format($ad->max_rent) }}</span>
                            <p style="display: none;" class="text-house">
                                <b>
                                    {{ Utility::short_description($ad->description) }}
                                </b>
                            </p>
                            <div class="property-icon" style="width:100%;background-color:#ffffff">
                                <img src="{{ asset('img/icon/bed.png') }}"> {{$ad->max_bed}}&emsp;
                                <img src="{{ asset('img/icon/shawer.png') }}"> {{$ad->max_bath}}
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div> 
            @endforeach
        @else
            <center><h3>Be the first to post an ad</h3></center>
        @endif
    </div>
</div>

<div class="col-md-12"> 
    <div class="pull-right">
        <div class="pagination">
            {{ $ads->links() }}
        </div>
    </div>                
</div>