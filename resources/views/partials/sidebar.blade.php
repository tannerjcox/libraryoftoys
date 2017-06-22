<aside class="main-sidebar col-sm-2">
    <ul class="nav nav-pills nav-stacked">
        {!! active_link_to_route('dashboard', 'Dashboard') !!}
        @if(Auth::user()->isAdmin())
            {!! active_link_to_route('users.index', 'Users') !!}
            {!! active_link_to_route('admins', 'Admins') !!}
            {!! active_link_to_route('pages.index', 'Pages') !!}
        @endif
        {!! active_link_to_route('products.index', 'Products') !!}
    </ul>
</aside>
