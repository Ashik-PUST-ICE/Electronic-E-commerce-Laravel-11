home header.blade.php

<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +088-01748031295</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> ashik.200607@s.pust.ac.bd</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> PUST@ICE</a></li>
            </ul>
            <ul class="header-links pull-right">
                @if (Route::has('login'))
                    @auth
                        <form class="ml-2" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <input class="btn btn-danger" type="submit" value="Logout">
                        </form>
                    @else
                        <li><a href="{{ route('login') }}"><i class="fa fa-login"></i>Log in</a></li>
                        <li><a href="{{ route('register') }}"><i class="fa fa-register"></i>Register</a></li>
                    @endauth
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="header-search">
                        <form  >
                            <select class="input-select">
                                <option value="0">All Categories</option>
                                <option value="1">Category 01</option>
                                <option value="2">Category 02</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <div class="clearfix col-md-3">
                    <div class="header-ctn">
                        <div class="dropdown">
                            <a href="{{ url('mycart') }}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>My Cart</span>
                                <div class="qty">[{{ $count }}]</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <div class="container">
        <div id="responsive-nav">
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/shop') }}">Products</a></li>
                <li><a href="{{ url('/myorders') }}">My Order</a></li>
                <li><a href="{{ url('/about') }}">About Us</a></li>
                <li><a href="{{ url('/contact') }}">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- /NAVIGATION -->

	<!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->
