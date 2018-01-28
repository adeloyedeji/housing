@if(\Auth::check())
<div class="row">
    <div class="col-md-12">
        <div class="card card-user">
            <div class="image">
                <img src="{{ asset('internals/img/background.jpg') }}" alt="..."/>
            </div>
            <div class="content">
                <div class="author">
                    <img class="avatar border-white" src="{{ asset('') }}/{{Auth::user()->image}}" alt="..."/>
                    <h4 class="title">{{ Auth::user()->fname }} {{ Auth::user()->lname }}<br />
                        <a href="#"><small>@<span>{{ Auth::user()->username }}</span></small></a>
                    </h4>
                </div>
                <p class="description text-center">
                    {{ \Auth::user()->profile->about }}
                </p>
            </div>
            <hr>
            <div class="text-center">
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">
                        <h5><i class="ti-facebook"></i><br /><small><a href="{{ url('') }}">Facebook</a></small></h5>
                    </div>
                    <div class="col-md-4">
                        <h5><i class="ti-twitter"></i><br /><small><a href="{{ url('') }}">Twitter</a></small></h5>
                    </div>
                    <div class="col-md-3">
                        <h5><i class="ti-google"></i><br /><small><a href="{{ url('') }}">Google</a></small></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card" style="background-color: #007bff;color:#ffffff">
            <div class="header">
                <h4 class="title" style="color:#ffffff">Watch Out</h4>
            </div>
            <div class="content">
                <p style="font-size:14px;">
                    <i class="fa fa-check"></i> Beware of ads that seem to good to be true, these members might be scammers
                </p>
                <p style="font-size:14px;">
                    <i class="fa fa-check"></i> Always visit the property before transferring money to the landlord
                </p>
                <p style="font-size:14px;">
                    <i class="fa fa-check"></i> Avoid users refusing to let you visit their place or asking to communicate outside the website.
                </p>
                <p style="font-size:14px;">
                    <i class="fa fa-check"></i> Golden rule: never transfer money through international money order (e.g.: Western Union or MoneyGram)
                </p>
                <p style="font-size:14px;">
                    <center>
                        <button class="btn btn-primary" style="color:#ffffff">Read more</button>
                    </center>
                </p>
            </div>
        </div>
    </div>
</div>