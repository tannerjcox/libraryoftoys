<aside class="main-sidebar col-md-2">
        <div class="panel-heading">
           <strong>My Toys</strong>
        </div>
    @if(Auth::user()->isAdmin())
    <div class="panel-heading">Admin Options</div>
    <ul class="list-unstyled">
        <li>
            {{ link_to_route('users.index', 'Users') }}
        </li>
        <li>
            {{ link_to_route('pages.index', 'Pages') }}
        </li>
    </ul>
    @endif
</aside>