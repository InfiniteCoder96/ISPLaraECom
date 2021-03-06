@section('css')
    <link rel="stylesheet" href="{{asset('store/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('store/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('store/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('store/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('store/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('store/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('store/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('store/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('store/css/style.css')}}" type="text/css">
@endsection

@extends('layouts.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text product-more">
                    <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                    <a href="./shop.html">Shop</a>
                    <span>Shopping Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="cart-table">
                    <table>
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th class="p-name">Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th><i class="ti-close"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td class="cart-pic first-row"><img src="{{asset($product->Products->main_image)}}" alt="" width="150px"></td>
                            <td class="cart-title first-row">
                                <h5>{{$product->Products->name}}</h5>
                            </td>
                            <td class="p-price first-row">Rs.{{$product->Products->price}}</td>
                            <td class="qua-col first-row">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="{{$product->quantity}}">
                                    </div>
                                </div>
                            </td>
                            <td class="total-price first-row">$60.00</td>
                            <td class="close-td first-row"><i class="ti-close"></i></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="cart-buttons">
                            <a href="#" class="primary-btn continue-shop">Continue shopping</a>
                            <a href="#" class="primary-btn up-cart">Update cart</a>
                        </div>
                        <div class="discount-coupon">
                            <h6>Discount Codes</h6>
                            <form action="#" class="coupon-form">
                                <input type="text" placeholder="Enter your codes">
                                <button type="submit" class="site-btn coupon-btn">Apply</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-4">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span>$240.00</span></li>
                                <li class="cart-total">Total <span>$240.00</span></li>
                            </ul>
                            <a href="{{url('checkout')}}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@endsection

@section('scripts')
    <script src="{{asset('store/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('store/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('store/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('store/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('store/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('store/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('store/js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('store/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('store/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('store/js/main.js')}}"></script>
@endsection