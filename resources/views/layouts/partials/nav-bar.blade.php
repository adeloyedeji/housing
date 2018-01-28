<nav class="navbar navbar-default ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('img/housemait/logo.jpg') }}" alt="" style=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse yamm" id="navigation">
            <div class="button navbar-right">
                @if(\Auth::check())
                    <button class="navbar-btn nav-button wow bounceInRight login" href="{{ route('logout') }}" data-wow-delay="0.55s"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Logout
                    </button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <button class="navbar-btn nav-button wow bounceInRight login" onclick="window.open('{{ route('login') }}')" data-wow-delay="0.45s">Login / Register</button>
                @endif
                <button class="navbar-btn nav-button wow fadeInRight" onclick="window.open('{{ url('ads/create') }}')" data-wow-delay="0.58s">Post an ad</button>
            </div>
            <ul class="main-nav nav navbar-nav navbar-right">
                <li class="ymm-sw " data-wow-delay="0.1s">
                    <a href="{{ url('/') }}" @if( active('/') ) class="active" @endif>Browse</a>
                </li>

                <li class="wow fadeInDown" data-wow-delay="0.2s">
                    <a @if( active('ads/*') ) class="active" @endif href="{{ url('ads') }}">Adverts</a>
                </li>
                
                @if( \Auth::check())

                <li class="dropdown ymm-sw " data-wow-delay="0.3s">
                    <a href="#" class="dropdown-toggle  @if( active('user/*') ) active @endif" data-toggle="dropdown" data-hover="dropdown" data-delay="200">My Account <b class="caret"></b></a>
                    <ul class="dropdown-menu navbar-nav">
                        <li>
                            <a href="{{ url('home') }}">My Ads</a>
                        </li>
                        <li>
                            <a href="{{ url('profile') }}">Profile</a>
                        </li>
                        <li>
                            <a href="{{ url('profile/update-password') }}">Update Password</a>
                        </li>
                    </ul>
                </li>

                <li class="ymm-sw " data-wow-delay="0.4s">
                    <a href="{{ url('notification/me') }}" @if( active('notification/me') ) class="active" @endif>
                        Notification
                        <span class="badge">{{ count(\Auth::user()->unreadNotifications) }}</span>
                    </a>
                </li>
                    
                @endif

                <li class="wow fadeInDown" data-wow-delay="0.6s"><a href="{{ url('contact') }}"  @if( active('contact') ) class="active" @endif>Contact</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>