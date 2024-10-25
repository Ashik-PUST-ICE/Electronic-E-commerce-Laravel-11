<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body>
    <div class="hero_area">
        <!-- Header Section Starts -->
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
                                <li class="nav-item">
                                    <form class="ml-2" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <input class="btn btn-danger" type="submit" value="Logout">
                                    </form>
                                </li>
                            @else
                                <li><a href="{{ route('login') }}"><i class="fa fa-login"></i> Log in</a></li>
                                <li><a href="{{ route('register') }}"><i class="fa fa-register"></i> Register</a></li>
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
                        <!-- LOGO -->
                        <div class="col-md-3">
                            <div class="header-logo">
                                <a href="#" class="logo">
                                    <img src="{{ asset('./img/logo.png') }}" alt="Logo">
                                </a>
                            </div>
                        </div>
                        <!-- /LOGO -->

                        <!-- SEARCH BAR -->
                        <div class="col-md-6">
                            <div class="header-search">
                                <form>
                                    <select class="input-select">
                                        <option value="0">All Categories</option>
                                        <option value="1">Category 01</option>
                                        <option value="2">Category 02</option>
                                    </select>
                                    <input class="input" placeholder="Search here" required>
                                    <button class="search-btn">Search</button>
                                </form>
                            </div>
                        </div>
                        <!-- /SEARCH BAR -->

                        <!-- ACCOUNT -->
                        <div class="clearfix col-md-3">
                            <div class="header-ctn">
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="{{ url('mycart') }}" aria-expanded="true">
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



        <!-- Shop Section -->
        @include('home.product')
        <!-- End Shop Section -->

        <!-- Footer Section -->
        @include('home.footer')
    </div>

    @include('home.js')
</body>

</html>
