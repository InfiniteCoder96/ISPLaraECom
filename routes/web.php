<?php

use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::all();
    $user_id = Auth::id();
    $cart_products = Cart::all()->where('user_id', '=', $user_id);
    $cart_products_tot = sizeof($cart_products);
    return view('welcome', compact('products','cart_products','cart_products_tot'));
});

// store routes
Route::view('/shop', 'store.shop');
Route::view('/contact', 'store.contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('permissions','PermissionController');
    Route::resource('products','ProductController');
    Route::resource('productCategories','ProductCategoryController');
    Route::resource('carts','CartController');
    Route::resource('orders','OrderController');
    Route::get('/addToCart', 'CartController@addToCart')->name('addToCart');
    Route::get('/checkout', 'OrderController@checkout')->name('checkout');
});
