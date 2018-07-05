<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>

<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.number.min.js') }}"></script>
<script>
    $(function() {
        Noty.overrideDefaults({
            theme: 'bootstrap-v4',
            closeWith: ['button', 'click'],
        });
    })
</script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-hover-dropdown.js') }}"></script>

<script src="{{ asset('js/easypiechart.min.js') }}"></script>
<script src="{{ asset('js/jquery.easypiechart.min.js') }}"></script>

<script src="{{ asset('js/owl.carousel.min.js') }}"></script>   
<script src="{{ asset('js/wow.js') }}"></script>

<script src="{{ asset('js/icheck.min.js') }}"></script>
<script src="{{ asset('js/price-range.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
<!--<script src="{{ asset('js/bootstrap-notify.js') }}"></script> -->

@if( !active('home')  && !active('messaging/chat/*') )
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWT3Ts0ojgLU8RXYIlt-ysZF1N28bmjLs&libraries=places&callback=initializeMap" async defer></script>
<script>
    function initializeMap()
    {
        var input = document.getElementById("location");
        var autoComplete = new google.maps.places.Autocomplete(input);
    }
</script>
@endif

@if( active('ads/result/*') )
    <script type="text/javascript" src="{{ asset('js/lightslider.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 9,
                slideMargin: 0,
                speed: 500,
                auto: true,
                loop: true,
                onSliderLoad: function () {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });

            @if(\Auth::check())
                $("#commentBtn").click(function() {
                    var formData = {'comment':$("#commentBox").val(), 'house_ad':$("#house_ad").val(), '_token':$("#resource").val()};

                    console.log(formData);
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
            @endif

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
@elseif( active('ads/create-ad') || active('ads/create') )
    <script src="{{ asset('js/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('js/wizard.js') }}"></script>
    <script>
        $(function() {
            $('#move_on').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                clearBtn: true,
            });
        })
    </script>
@endif