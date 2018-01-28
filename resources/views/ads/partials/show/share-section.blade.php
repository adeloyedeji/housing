<div class="section property-share"> 
    <h4 class="s-property-title">Share with friends </h4> 
    <div class="roperty-social">
        <ul>                                      
            <li>
                <a title="Share this on facebok" href="http://www.facebook.com/share.php?u={{url('ads/result')}}/{{$ad->slug}}&title={{$ad->title}}" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" class="btn btn-tagged social-facebook">
                    <img src="{{ asset('img/social_big/facebook_grey.png') }}">
                </a>
            </li> 
            <li>
                <a title="Share this on twitter " href="http://twitter.com/home?status=Guess what i found on Housemait.{{$ad->title}} Click {{url('ads/result')}}/{{$ad->slug}} to view" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"  class="btn btn-tagged social-twitter">
                    <img src="{{ asset('img/social_big/twitter_grey.png') }}">
                </a>
            </li>                                        
        </ul>
    </div>
</div>