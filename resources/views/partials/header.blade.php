<header class="m-b-sm">
    <nav class="blue">
        <div class="nav-wrapper">
            <div class="col s12">
                <a href="/"><img src="{{ asset('images/toytrader_logo.png') }}" class="brand-logo" style="max-height:100%; padding:10px;"></a>
                <a href="#" data-activates="mobile-menu" class="button-collapse right"><i class="material-icons">account_circle</i></a>
                <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

                <ul class="right hide-on-med-and-down">
                    @include('partials.navbar-links', ['dropdown' => 'main'])
                </ul>
                <ul class="side-nav" id="mobile-menu">
                    @include('partials.navbar-links', ['dropdown' => 'mobile'])
                </ul>
            </div>
        </div>
    </nav>
</header>