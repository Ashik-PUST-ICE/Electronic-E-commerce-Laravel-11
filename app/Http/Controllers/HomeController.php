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


class HomeController extends Controller
{
    // Admin Index Page (could be a different view like an admin dashboard)
    public function index()
    {
        $user= User::where('usertype','user')->get()->count();

        $product= Product::all()->count();

        $order= Order::all()->count();

        $delivered= Order::where('status','Delivered')->get()->count();


        return view('admin.index',compact('user','product','order','delivered'));
    }

    // Home page with products
    public function home()
    {
        $products = Product::all();

        // Initialize count variable
        $count = 0;

        if (Auth::check()) { // Check if user is authenticated
            $user = Auth::user();
            $userid = $user->id;

            // Query the Cart model correctly
            $count = Cart::where('user_id', $userid)->count();
        }


        return view('home.index', compact('products', 'count'));
    }


    // Dashboard page (also showing products)
    public function login_home()
    {
        $products = Product::all();

        $user = Auth:: user();

        if ($user) { // Check if user is authenticated
            $userid = $user->id;

            // Corrected the way to query the Cart model
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = 0; // Handle the case when no user is authenticated
        }

        return view('home.index', compact('products','count'));
    }

    // public function shop()
    // {
    //     $products = Product::all(); // Fetch all products from the database
    //     return view('home.product', compact('products')); // Pass products to the view
    // }

    public function shop()
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
    return view('home.shop', compact('products', 'count'));
}

public function why()
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
    return view('home.why', compact('products', 'count'));
}


public function testimonial()
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
    return view('home.testimonial', compact('products', 'count'));
}


public function contact()
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
    return view('home.contact', compact('products', 'count'));
}
    public function product_details($id)
    {

        $data= Product :: find($id);


        $user = Auth:: user();

        if ($user) { // Check if user is authenticated
            $userid = $user->id;

            // Corrected the way to query the Cart model
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = 0; // Handle the case when no user is authenticated
        }
        return view('home.product_details',compact('data','count'));
    }


    public function add_cart($id)
    {
        //    return view('home.add_cart');

        $product_id=$id;
        $user= Auth::user();
        $user_id= $user->id;

        $data = new Cart;

        $data->user_id=$user_id;

        $data->product_id=$product_id;

        $data->save();


       Flasher::addSuccess('Add to Cart Successfully.', ['timeout' => 1000]); // 3000ms = 3 seconds

        return redirect()->back();


    }


    public function mycart()
    {
        $cart = [];
        $count = 0;

        if (Auth::check()) { // Check if user is authenticated
            $user = Auth::user();
            $userid = $user->id;

            // Get the user's cart items and count
            $cart = Cart::where('user_id', $userid)->get();
            $count = $cart->count();
        } else {
            // Redirect to login if user is not authenticated
            return redirect()->route('login')->with('error', 'Please login to view your cart.');
        }


        return view('home.mycart', compact('count', 'cart'));
    }

    public function removeItem($id)
    {
        $cartItem = Cart::findOrFail($id);

        // Ensure user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to manage your cart.');
        }

        // Ensure that the item belongs to the authenticated user
        if ($cartItem->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'You are not authorized to remove this item.');
        }

        // Remove the item
        $cartItem->delete();

        Flasher::addSuccess('Remove Successfully.', ['timeout' => 1000]); // 3000ms = 3 seconds


        return redirect()->back();
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;

        $address = $request->address;

        $phone = $request->phone;

        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order= new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id =$userid;

            $order->product_id= $carts->product_id;

            $order->save();


        }

        $cart_remove= Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
                $data = Cart::find($remove->id);
                $data->delete();
        }

        Flasher::addSuccess('Order Successfully.', ['timeout' => 1000]); // 3000ms = 3 seconds
        return redirect()->back();


    }

    public function myorders()
    {
        $user = Auth::user()->id;
        $count=Cart::where('user_id',$user)->get()->count();

        $order= Order::where('user_id',$user)->get();
        return view('home.order',compact('count','order'));
    }


    public function stripe($value)

    {

        return view('home.stripe',compact('value'));

    }


    public function stripePost(Request $request ,$value)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create ([

                "amount" => $value * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from complete."

        ]);


        $name = Auth::user()->name;

        $phone = Auth::user()->phone;

        $address = Auth::user()->address;


        $userid = Auth::user()->id;

        $cart = Cart::where('user_id',$userid)->get();

        foreach($cart as $carts)
        {
            $order= new Order;

            $order->name = $name;

            $order->rec_address = $address;

            $order->phone = $phone;

            $order->user_id =$userid;

            $order->product_id= $carts->product_id;

            $order->payment_status="paid";

            $order->save();


        }

        $cart_remove= Cart::where('user_id',$userid)->get();

        foreach($cart_remove as $remove)
        {
                $data = Cart::find($remove->id);
                $data->delete();
        }

        Flasher::addSuccess('Order Successfully.', ['timeout' => 1000]); // 3000ms = 3 seconds
        return redirect('mycart');


    }


}
