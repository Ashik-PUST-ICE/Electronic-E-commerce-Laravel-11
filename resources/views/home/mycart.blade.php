<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        /* Custom styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        .cart-table {
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .cart-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        .cart-table th {
            background-color: #007bff;
            color: #ffffff;
        }

        .cart-table tr:hover {
            background-color: #f1f1f1;
        }

        .form-container {
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-container h3 {
            font-size: 1.8rem;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 10px;
            width: 100%;
        }

        .btn-primary,
        .btn-success {
            width: 48%;
            border-radius: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .text-right {
            text-align: right;
            margin-top: 20px;
        }

        .cart-value {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        @media (max-width: 768px) {
            .btn-primary,
            .btn-success {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>


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
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>
    </div>


<body>
    <div class="container my-5">
        <h2 class="mb-4 text-center">Your Shopping Cart</h2>

        <div class="row">
            <!-- Left Column: Cart Table -->
            <div class="col-md-6">
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th style="text-align: left;">Product Title</th>
                                <th style="text-align: left;">Price</th>
                                <th style="text-align: left;">Image</th>
                                <th style="text-align: left;">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $value = 0; ?>
                            @foreach ($cart as $cartItem)
                            <tr>
                                <td style="text-align: left;">{{ $cartItem->product->title }}</td>
                                <td style="text-align: left;">${{ number_format($cartItem->product->price, 2) }}</td>
                                <td style="text-align: left;">
                                    <img width="70px" src="/products/{{ $cartItem->product->image }}" alt="{{ $cartItem->product->title }}">
                                </td>
                                <td style="text-align: left;">
                                    <form action="{{ route('remove_cart', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $value += $cartItem->product->price; ?>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right cart-value">
                        <h4>Total Value of Cart: <strong>${{ number_format($value, 2) }}</strong></h4>
                    </div>
                </div>
            </div>

            <!-- Right Column: Order Confirmation Form -->
            <div class="col-md-6">
                <div class="form-container">
                    <h3 class="mb-4">Confirm Your Order</h3>
                    <form action="{{ url('confirm_order') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Receiver Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Receiver Address</label>
                            <textarea name="address" class="form-control" rows="4" placeholder="Enter your address" required>{{ Auth::user()->address }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="phone">Receiver Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter your phone number" value="{{ Auth::user()->phone }}" required>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-primary" type="submit">Cash On Delivery</button>
                            <a class="btn btn-success" href="{{ url('stripe', $value) }}">Pay Using Card</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- info section -->
    @include('home.footer')
    <!-- end info section -->

    @include('home.js')
</body>

</html>
