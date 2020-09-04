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
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">

        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            <form action="{{route('orders.store')}}" class="checkout-form" method="POST">
                @csrf
                <div class="row">

                    <div class="col-lg-6">

                        <h4>Biiling Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name<span>*</span></label>
                                <input type="text" id="fir" name="fName">
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name<span>*</span></label>
                                <input type="text" id="last" name="lName">
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" id="street" class="street-first" name="address">
                            </div>
                            <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP</label>
                                <input type="text" id="zip" name="zipCode">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="email" id="email" name="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" id="phone" name="phone">
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    @foreach($cart_products as $products)
                                    <li class="fw-normal">{{$products->Products->name}} x {{$products->quantity}} <span>Rs.{{$products->Products->price * $products->quantity}}</span></li>
                                    @endforeach
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            Cash on delivery
                                            <input type="radio" id="pc-check" name="paymentType" value="COD">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="radio" id="pc-paypal" name="paymentType" value="PP">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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