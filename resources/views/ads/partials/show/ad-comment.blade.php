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
                    <button class="btn btn-info btn-block" id="commentBtn">Submit</button>
                @else
                    <a href="{{ route('login') }}">You must be signed in to post a comment</a>
                @endif
            </center>
        </div>
    </div>
</div>
@if(\Auth::check())
    <script src="{{ asset('internals/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script>
    $(function() {
        $("#commentBtn").click(function() {
            var formData = {'comment':$("#commentBox").val(), 'house_ad':$("#house_ad").val(), '_token':$("#resource").val()};

            $.post("{{ url('adscomment') }}", formData, function(data, xhr, status) {
                console.log(data);
                if(data == 'ok') {
                    var comment = "";
                    var last_comment = $("#comment_house").val();
                    if(last_comment == 0) {
                        comment += "<div class='col-md-12' style='padding: 10px;' id='prevComment1'>";
                        comment += "<h5>{{ \Auth::user()->fname }} {{ \Auth::user()->lname }} <small class='pull-right'>Just Now</small></h5>";
                        comment += "<p>"+$("#commentBox").val()+"</p>";
                        comment += "</div>";
                        $("#commentRow").html(comment);
                    } else {
                        comment += "<div class='col-md-12' style='padding: 10px;' id='prevComment'>";
                        comment += "<h5>{{ \Auth::user()->fname }} {{ \Auth::user()->lname }} <small class='pull-right'>Just Now</small></h5>";
                        comment += "<p>"+$("#commentBox").val()+"</p>";
                        comment += "</div>";
                        $(comment).insertBefore("#comment_row");
                    }
                    $("#commentBox").val("");
                } else {
                    warningNoty("Comment was not saved. Please reload and try again.");
                }
            });
        });

        function warningNoty(msg) {
            $.notify({
                icon: 'ti-info',
                message: msg
            },{
                type: 'warning',
                timer: 4000
            });
        }
    });
</script>
@endif