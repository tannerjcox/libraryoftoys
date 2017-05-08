<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <h5>
                    Information
                </h5>
                <ul class="list-unstyled">
                    <li>
                        {!! link_to_route('page', 'About Us', ['url' => 'about-us']) !!}
                    </li>
                    <li>
                        {!! link_to_route('page', 'Why Toy Trader', ['url' => 'why-toy-trader']) !!}
                    </li>
                    <li>
                        {!! link_to_route('page', 'Terms and Conditions', ['url' => 'about-us']) !!}
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-6">
                <h5>Customer Service</h5>
                <ul class="list-unstyled">
                    <li>
                        {!! link_to_route('page', 'Contact Us', ['url' => 'about-us']) !!}
                    </li>
                    <li>
                        {!! link_to_route('page', 'Contact a Supplier', ['url' => 'about-us']) !!}
                    </li>
                    <li>
                        {!! link_to_route('page', 'F.A.Q.', ['url' => 'about-us']) !!}
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-6">
                <h5>
                    My Account
                </h5>
                <ul class="list-unstyled">
                    <li>
                        {!! link_to_route('products.create', 'Submit a Toy') !!}
                    </li>
                    <li>
                        {!! link_to_route('products.index', 'My Toys') !!}
                    </li>
                    <li>
                        {!! link_to_route('page', 'My Favorites', ['url' => 'about-us']) !!}
                    </li>
                </ul>
            </div>
            <div class="col-sm-3 col-xs-6">
                <h5>
                    Our Partners
                </h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://kandtfarms.com">K and T Farms</a>
                    </li>
                    <li>
                        <a href="https://mealsbykassy.com">Meals By Kassy</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <p>Toy Trader &copy; 2017</p>
    </div>
</footer>
