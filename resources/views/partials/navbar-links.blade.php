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
        <a class='dropdown-button' href='#' data-activates='account-dropdown{{ $dropdown }}'>
            {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i>
        </a>
        <ul id='account-dropdown{{ $dropdown }}' class='dropdown-content'>
            <li>
                <a href="{{ route('dashboard') }}">
                    My Dashboard
                </a>
                <a href="{{ route('account') }}">
                    My Account
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form{{ $dropdown }}').submit()">
                    Logout
                </a>
                <form id="logout-form{{ $dropdown }}" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
@endif