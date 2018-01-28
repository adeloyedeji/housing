@extends('layouts.app')

@section('content')
<style>
.datepicker.dropdown-menu {
 visibility: visible;
 opacity: 1;
 width: auto;
}
    .wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
        background: #fafafa url("{{ asset('img/geometry2.png') }}");
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}
.step_21 {
    border :1px solid #eee;
    border-radius:5px;
    padding:10px;
}
.step33 {
    border:1px solid #ccc;
    border-radius:5px;
    padding-left:10px;
    margin-bottom:10px;
}
.mar_ned {
    margin-bottom:10px;
}
.wdth {
    width:25%;
}

/* according menu */
#accordion-container {
    font-size:13px
}
.accordion-header {
    font-size:13px;
	background:#ebebeb;
	margin:5px 0 0;
	padding:7px 20px;
	cursor:pointer;
	color:#fff;
	font-weight:400;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px
}
.unselect_img{
	width:18px;
	-webkit-user-select: none;  
	-moz-user-select: none;     
	-ms-user-select: none;      
	user-select: none; 
}
.active-header {
	-moz-border-radius:5px 5px 0 0;
	-webkit-border-radius:5px 5px 0 0;
	border-radius:5px 5px 0 0;
	background:#F53B27;
}
.active-header:after {
	content:"\f068";
	font-family:'FontAwesome';
	float:right;
	margin:5px;
	font-weight:400
}
.inactive-header {
	background:#333;
}
.inactive-header:after {
	content:"\f067";
	font-family:'FontAwesome';
	float:right;
	margin:4px 5px;
	font-weight:400
}
.accordion-content {
	display:none;
	padding:20px;
	background:#fff;
	border:1px solid #ccc;
	border-top:0;
	-moz-border-radius:0 0 5px 5px;
	-webkit-border-radius:0 0 5px 5px;
	border-radius:0 0 5px 5px
}
.accordion-content a{
	text-decoration:none;
	color:#333;
}
.accordion-content td{
	border-bottom:1px solid #dcdcdc;
}



@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
</style>
<link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/dropzone.min.css') }}">  
<div class="container-fluid">
    <div class="row">
    	<section style="margin-top:-4em;">
            <div class="wizard">
                @include('ads.partials.create.create-form-nav')
                @include('ads.partials.create.create-form')
            </div>
        </section>
   </div>
</div>
<script src="{{ asset('internals/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dropzone.min.js') }}"></script>
<script>
    $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}

$(function() {
    $('#move_on').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        clearBtn: true,
    });
    $('#available_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        clearBtn: true,
    });
    $("#need_room").click(function() {
        $("#addr_option").html("Where would you like to stay");
        $("#rent_option").html("Maximum i can pay (#)*");
        $("#move_option").html("I intend to move on*");
        $("#have_room_section").fadeOut("slow");
    });
    $("#have_room").click(function() {
        $("#addr_option").html("Address of Property");
        $("#rent_option").html("Rent per Month*");
        $("#move_option").html("Will be open from*");
        $("#have_room_section").fadeIn("slow");
    });
    $("#state").change(function() {
        $.get("{{ url('ads/get-area?id=') }}" + $(this).val(), function(data, xhr, status) {
            if(data == 0) {
                $.notify({
            	icon: 'ti-info',
            	message: "Invalid option select"

            },{
                type: 'danger',
                timer: 3000
            });
            } else if(data instanceof Array) {
                var options = "";
                $.each(data, function(item, index) {
                    options += "<option value='"+index.id+"'>"+index.area+"</option>";
                });
                $("#area").html(options);
            }
        });
    });
});
</script>
<script type="text/javascript" src="{{ asset('js/ads-processing.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWT3Ts0ojgLU8RXYIlt-ysZF1N28bmjLs&libraries=places&callback=initializeMap" async defer></script>
<script>
    function initializeMap()
    {
        var input = document.getElementById("exact_location");
        var autoComplete = new google.maps.places.Autocomplete(input);
    }
</script>
@endsection