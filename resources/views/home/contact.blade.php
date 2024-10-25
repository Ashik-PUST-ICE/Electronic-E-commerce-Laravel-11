<!DOCTYPE html>
<html>

<head>
    @include('home.css')
    <style>
        /* Center the contact form in the section */
        .contact_section {
            padding: 50px 0;
            background-color: #f2f2f2; /* Light background for the section */
        }

        .contact-form {
            background-color: #ffffff; /* White background for the form */
            border-radius: 8px;
            padding: 40px; /* Increase padding */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Add shadow */
            margin: 0 auto; /* Center the form */
            max-width: 600px; /* Maximum width for larger screens */
            width: 100%; /* Full width for small screens */
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%; /* Full width */
            padding: 12px; /* Padding for form elements */
            border: 1px solid #ddd; /* Light border */
            border-radius: 5px; /* Rounded corners */
            font-size: 16px; /* Font size */
            margin-bottom: 20px; /* Space between fields */
            transition: border-color 0.3s; /* Transition for focus effect */
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            border-color: #007bff; /* Change border color on focus */
            outline: none; /* Remove outline */
        }

        .submit-btn {
            background-color: #007bff; /* Button color */
            color: white; /* Text color */
            padding: 12px 20px; /* Button padding */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            cursor: pointer; /* Pointer on hover */
            font-size: 16px; /* Font size */
            transition: background-color 0.3s; /* Transition for hover effect */
        }

        .submit-btn:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .alert {
            margin-top: 10px; /* Space above alert */
            padding: 10px; /* Padding for alert */
            background-color: #dff0d8; /* Success background */
            border: 1px solid #d6e9c6; /* Success border */
            border-radius: 5px; /* Rounded corners */
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
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
        <!-- end header section -->

        <section class="contact_section">
            <div class="container px-0">

            </div>
            <div class="container container-bg">
                <div class="px-0 mx-auto col-md-6 col-lg-12">
                    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Name" required />
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone" placeholder="Phone" required />
                        </div>
                        <div class="form-group">
                            <textarea class="message-box" name="message" placeholder="Message" required></textarea>
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="submit-btn">SEND</button>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </section>

        <!-- info section -->
        @include('home.footer')
        <!-- end info section -->

        @include('home.js')

</body>

</html>
