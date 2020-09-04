@extends('layouts.adminApp')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Orders</h2>
            </div>

        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>User Name</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Value (Rs.)</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->Users->name }}</td>
                <td>{{ $order->Products->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->quantity * $order->Products->price }}</td>
                <td>
                    <form action="{{ route('products.destroy',$order->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$order->id) }}">Show</a>
                        @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('products.edit',$order->id) }}">Edit</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection