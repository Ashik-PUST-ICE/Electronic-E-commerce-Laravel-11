<!DOCTYPE html>
<html>

@include('home.css')

<style>
    /* General styles */
    .product-image {
        width: 100%; /* Ensure the image takes full width of the column */
        height: 300; /* Maintain the aspect ratio */
        object-fit: cover; /* Ensure the image covers the container without stretching */
        max-height: 300px; /* Set a max height to prevent it from being too large */
        border-radius: 10px; /* Optional: Add some rounding to the corners */
        transition: transform 0.3s ease, opacity 0.3s ease, box-shadow 0.3s ease; /* Add transition for smooth effect */
        opacity: 0; /* Start with opacity 0 for fade-in effect */
    }

    .product-image.loaded {
        opacity: 1; /* Fade in the image */
    }

    .product-image:hover {
        transform: scale(1.05) rotate(3deg); /* Zoom and rotate effect on hover */
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Add shadow effect */
    }

    .shop_section {
        margin-top: 50px; /* Optional: Add margin to separate from header */
    }

    .product-details {
        margin-top: 20px; /* Optional: Add some space above product details */
        opacity: 0; /* Start with opacity 0 for fade-in effect */
        transform: translateY(20px); /* Start slightly lower for the fade-in effect */
        transition: opacity 0.3s ease, transform 0.3s ease; /* Smooth transition for fade-in effect */
    }

    .product-details.loaded {
        opacity: 1; /* Fade in product details */
        transform: translateY(0); /* Move to original position */
    }

    /* Style for the product section */
    .shop_section {
        padding: 60px 0; /* Add some padding for a better look */
    }
</style>

<body>
    <div class="hero_area">

<body>
    <div>
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
    </div>

    {{-- Product details --}}
    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>Latest Products</h2>
            </div>

            <div class="row">
                <!-- Product thumb imgs -->
                <div class="col-md-5">
                    <img class="product-image" src="{{ asset('products/' . $data->image) }}" alt="{{ $data->title }}" onload="this.classList.add('loaded')">
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-7">
                    <div class="product-details" onload="this.classList.add('loaded')">
                        <h2 class="product-name">{{ $data->title }}</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">10 Review(s) | Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">${{ $data->price }} <del class="product-old-price">$990.00</del></h3>
                            <span class="product-available">In Stock</span>
                        </div>
                        <p>{{ $data->description }}</p>

                        <div class="product-options">
                            <label>
                                Size
                                <select class="input-select">
                                    <option value="0">X</option>
                                </select>
                            </label>
                            <label>
                                Color
                                <select class="input-select">
                                    <option value="0">Red</option>
                                </select>
                            </label>
                        </div>

                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" min="1" value="1">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <a href="{{ url('add_cart', $data->id) }}" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>

                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> Add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Category:</li>
                            <li><a href="#">{{ $data->category }}</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /Product details -->

                <!-- Include the product tab section here if needed -->
                <!-- ... -->
            </div>
        </div>
    </section>

    @include('home.footer')
    @include('home.js')

    <script>
        // Add the loaded class to the product details after a short delay for better visual effect
        window.onload = function() {
            const productDetails = document.querySelector('.product-details');
            setTimeout(() => {
                productDetails.classList.add('loaded');
            }, 300); // Adjust delay as needed
        }
    </script>
</body>
</html>
