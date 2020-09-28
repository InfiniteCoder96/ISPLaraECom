@extends('layouts.adminApp')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Deliveries</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('deliveries.index') }}"> Back</a>
            </div>
        </div>
    </div>


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


    <form action="{{ route('deliveries.update',$delivery->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="pname" value="{{ $delivery->pname }}" class="form-control" placeholder="Product Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Customer Name:</strong>
                    <input type="text" name="cname" value="{{ $delivery->cname }}" class="form-control" placeholder="Customer Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>E-mail:</strong>
                    <input type="email" name="email" value="{{ $delivery->email }}" class="form-control" placeholder="E-mail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Delivery Address:</strong>
                    <input type="text" name="address" value="{{ $delivery->address }}" class="form-control" placeholder="Delivery Address">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone Number:</strong>
                    <input type="tel" name="pno" value="{{ $delivery->pno }}" class="form-control" placeholder="Phone Numer">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>


    <p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection
