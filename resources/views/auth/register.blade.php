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
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="group-input">
                                <label for="username">Name *</label>
                                <input type="text" id="name" name="name" class="@error('email') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="text" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="text" id="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="text" id="con-pass" name="password_confirmation">
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{ route('login') }}" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
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
