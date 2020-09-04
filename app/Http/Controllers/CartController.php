<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $products = Cart::all()->where('user_id', '=', $user_id);

        return view('store.cart',compact('products'));
    }

    public function addToCart(Request $request){
        $cart = new Cart();

        $cart->user_id = Auth::id();
        $cart->product_id = $request->get('product_id');
        $cart->quantity = $request->get('quantity');

        $cart->save();

        return redirect()->route('carts.index')
            ->with('success','Cart updated successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'product_id' => 'required',
            'quantity' => 'required'
        ]);

        $cart = new Cart();

        $cart->user_id = Auth::id();
        $cart->product_id = $request->get('product_id');
        $cart->quantity = $request->get('quantity');

        $cart->save();

        return redirect()->route('cart.index')
            ->with('success','Cart updated successfully.');
    }
}
