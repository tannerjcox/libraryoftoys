<aside class="main-sidebar col-md-2">
    @if(Auth::user()->isAdmin())
        <ul class="nav nav-pills nav-stacked">
            {!! active_link_to_route('dashboard', 'Dashboard') !!}
            {!! active_link_to_route('users.index', 'Users') !!}
            {!! active_link_to_route('pages.index', 'Pages') !!}
        </ul>
    @endif
</aside>