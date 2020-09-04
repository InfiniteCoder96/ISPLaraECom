<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();
        $tot_orders = sizeof($orders);
        $tot_users = sizeof(User::all()->where('role','=','user'));
        $tot_products = sizeof(Product::all());
        $tot_revenue = 0;

        foreach ($orders as $order){
            $tot_revenue += $order->quantity * $order->Products->price;
        }

        if (Gate::allows('isAdmin')) {
            return view('admin.dashboard', compact('tot_orders','tot_users','tot_products','tot_revenue'));
        } else if(Gate::allows('isManager')){
            return view('admin.dashboard', compact('tot_orders','tot_users','tot_products','tot_revenue'));
        }
        else if(Gate::allows('isUser')){


            $user_id = Auth::id();
            $cart_products = Cart::all()->where('user_id', '=', $user_id);

            $cart_products_tot = sizeof($cart_products);

            return view('welcome', compact('products','cart_products','cart_products_tot'));
        }
    }
}
