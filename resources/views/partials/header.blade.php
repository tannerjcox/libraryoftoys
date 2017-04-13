<nav class="navbar navbar-default navbar-fixed-top col-xs-12">
    <div class="navbar-header">
        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!-- Branding Image -->
        {!! link_to_route('home', config('app.name'), [], ['class' => 'navbar-brand']) !!}
    </div>
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            @if(isset($admin) && !$admin)
                {!! active_link_to_route('page', 'About Us', ['url' => 'about-us']) !!}
                {!! active_link_to_route('page', 'Why Toy Trader', ['url' => 'why-toy-trader']) !!}
            @endif
            @if (Auth::guest())
                {!! active_link_to_route('login', 'Login') !!}
                {!! active_link_to_route('register', 'Register') !!}
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('dashboard') }}">
                                My Account
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>