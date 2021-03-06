<ul id="slide-out" class="side-nav fixed">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="http://materializecss.com/images/office.jpg">
            </div>
            <a href="{{ route('account') }}">
                @if(Auth::user()->image)
                    <img class="circle" src="{{ Auth::user()->image }}">
                @endif
                <span class="white-text name">{{Auth::user()->name}}</span>
                <span class="white-text email">{{Auth::user()->email}}</span>
            </a>
        </div>
    </li>
    {!! active_link_to_route('dashboard', 'Dashboard', [], ['class' => 'waves-effect']) !!}
    @if(Auth::user()->isAdmin())
        {!! active_link_to_route('users.index', 'Users', [], ['class' => 'waves-effect']) !!}
        {!! active_link_to_route('admins', 'Admins', [], ['class' => 'waves-effect']) !!}
        {!! active_link_to_route('pages.index', 'Pages', [], ['class' => 'waves-effect']) !!}
    @endif
    {!! active_link_to_route('products.index', 'Products', [], ['class' => 'waves-effect']) !!}
    <hr>
    <li>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">
            Logout
        </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</ul>
    {{--<li><div class="user-view">--}}
    {{--<div class="background">--}}
    {{--<img src="images/office.jpg">--}}
    {{--</div>--}}
    {{--<a href="#!user"><img class="circle" src="images/yuna.jpg"></a>--}}
    {{--<a href="#!name"><span class="white-text name">John Doe</span></a>--}}
    {{--<a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>--}}
    {{--</div></li>--}}
    {{--<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>--}}
    {{--<li><a href="#!">Second Link</a></li>--}}
    {{--<li><div class="divider"></div></li>--}}
    {{--<li><a class="subheader">Subheader</a></li>--}}
    {{--<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>--}}
