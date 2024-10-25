<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Flasher\Laravel\Facade\Flasher;
use Stripe;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{

public function about()
{
    // Fetch all products
    $products = Product::all(); // You can adjust this if you want the latest products

    // Initialize cart count variable
    $count = 0;

    // Check if the user is authenticated
    if (Auth::check()) {
        $user = Auth::user();
        $userid = $user->id;

        // Count the items in the cart for the authenticated user
        $count = Cart::where('user_id', $userid)->count();
    }

    // Return the shop view with products and cart count
    return view('home.about', compact('products', 'count'));
}

}
