<nav class="navbar navbar-default col-xs-12">
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
                <li>
                    {!! link_to_route('page', 'About Us', ['url' => 'about-us']) !!}
                </li>
                <li>
                    {!! link_to_route('page', 'Why Toy Trader', ['url' => 'why-toy-trader']) !!}
                </li>
            @endif
            @if (Auth::guest())
                <li>
                    {!! link_to_route('login', 'Login') !!}
                </li>
                <li>
                    {!! link_to_route('register', 'Register') !!}
                </li>
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
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault() document.getElementById('logout-form').submit()">
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