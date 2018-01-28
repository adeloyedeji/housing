<div class="section property-share"> 
    <h4 class="s-property-title">Comments </h4> 

    <input type="hidden" id="comment_house" name="comment_house" value="{{ count($ad_comments) }}">
    <div class="row" id="commentRow">
        @if( count($ad_comments) > 0 )
            @foreach($ad_comments as $comment)
                <div class="col-md-12" style="padding: 10px;" id="prevComment{{$comment->id}}">
                    <h5>{{ $comment->commentOwner->fname }} {{ $comment->commentOwner->lname }} 
                    <small class="pull-right">{{ $comment->created_at->diffForHumans() }}</small></h5>
                    <p class="">
                        {{ $comment->comment }}
                    </p>
                </div>  
            @endforeach
        @else
            <div clss="col-md-12" style="padding: 10px;" id="prevComment">
                <h5>Comments</h5>
                <p class="">
                    No threads found.
                </p>
            </div>
        @endif
        <div clss="col-md-12" style="padding: 10px;" id="comment_row">
            <div class="form-group">
                <input type="hidden" id="resource" name="resource" value="{{ csrf_token() }}">
                <input type="hidden" id="house_ad" name="house_ad" value="{{ $ad->id }}">
                <textarea class="form-control border-input" id="commentBox" name="commentBox" placeholder="Comments here..." style="height:200px;resize:none"></textarea>
                <p></p>
                <center>
                    @if(\Auth::check())
                        <input class="btn btn-finish btn-primary" id="commentBtn" value="Submit" type="submit">
                    @else
                        <a href="{{ route('login') }}">You must be signed in to post a comment</a>
                    @endif
                </center>
            </div>
        </div>
    </div>
</div>