<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        /* Center the table container */
        .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        /* Table styles */
        table {
            width: 80%;
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;
            border: 1px solid #ddd; /* Light gray border */
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd; /* Light gray border */
        }

        th {
            background-color: blue; /* Blue background for header */
            color: white; /* White text color for better contrast */
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Light background for even rows */
        }

        tr:hover {
            background-color: #f1f1f1; /* Slightly darker background on hover */
        }

        img {
            width: 70px; /* Set a fixed width for images */
            height: auto; /* Maintain aspect ratio */
            border-radius: 5px; /* Rounded corners */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table {
                font-size: 14px; /* Smaller font size on small screens */
            }

            img {
                width: 40px; /* Smaller image size */
            }
        }
    </style>
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

        <!-- Table Container -->
        <div class="table-container">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Delivery Status</th>
                    <th>Image</th>
                </tr>

                @foreach ($order as $item)
                <tr>
                    <td>{{ $item->product->title }}</td>
                    <td>{{ $item->product->price }}</td>
                    <td>{{ $item->status }}</td>
                    <td><img src="{{ asset('products/' . $item->product->image) }}" alt="Product Image"></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <!-- Footer Section -->
    @include('home.footer')

    @include('home.js')
</body>

</html>
