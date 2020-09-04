@extends('layouts.adminApp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card bg-orange text-white">
                                <div class="card-header">
                                    Total Orders
                                </div>
                                <div class="card-body">
                                    <h4>{{$tot_orders}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-dark text-white">
                                <div class="card-header">
                                    Total Users
                                </div>
                                <div class="card-body">
                                    <h4>{{$tot_users}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-info text-white">
                                <div class="card-header">
                                    Total Products
                                </div>
                                <div class="card-body">
                                    <h4>{{$tot_products}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-teal text-white">
                                <div class="card-header">
                                    Total Revenue
                                </div>
                                <div class="card-body">
                                    <h4>Rs.{{$tot_revenue}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
    </div>
@endsection