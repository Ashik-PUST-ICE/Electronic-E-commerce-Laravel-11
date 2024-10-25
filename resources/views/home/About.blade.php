
<body>
    <div class="hero_area">
        <!-- header section starts -->
        <header>
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
                                <form>
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

        <section class="about_section">
            <div class="about-container">
                <div class="about-section-title">
                    <h2>About Us</h2>
                </div>
                <div class="about-description">
                    <p>
                        Welcome to our e-commerce store! We are dedicated to providing you with the best products and services available. Our mission is to make shopping easy and enjoyable for everyone.
                    </p>
                    <p>
                        Our team consists of experienced professionals who are passionate about helping customers find exactly what they need. We are constantly updating our inventory to ensure that we offer the latest trends and best quality products.
                    </p>
                </div>

                <div class="team-section">
                    <h3>Meet Our Team</h3>
                    <div class="team-member">
                        <img src="{{ asset('img/ashik.jpg') }}" alt="Team Member 1">
                        <div>
                            <h4>Md.Ashikur Rahman</h4>
                            <h5>Email: ashik.200607@s.pust.ac.bd</h5>
                            <p>CEO & Founder</p>

                        </div>
                    </div>
                    <div class="team-member">
                        <img src="{{ asset('img/alamin.jpg') }}" alt="Team Member 2">
                        <div>
                            <h4>Md.Alamin</h4>
                            <p>Marketing Manager</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <img src="{{ asset('img/sobuz.jpg') }}" alt="Team Member 3">
                        <div>
                            <h4>Sobuz Ahmed</h4>
                            <p>Customer Support</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <img src="{{ asset('img/anomik.jpg') }}" alt="Team Member 4">
                        <div>
                            <h4>Anomik Sarkar</h4>
                            <p>Customer Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- info section -->
        @include('home.footer')
        <!-- end info section -->

        @include('home.js')
</body>

</html>
