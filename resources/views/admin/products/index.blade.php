@extends('layouts.adminApp')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
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
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary" href={{ url('propdf') }}>Export to PDF</a>
            </div>
        </tr>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Category</th>
            <th>Main image</th>
            <th>Sub image 01</th>
            <th>Sub image 02</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->Category->name }}</td>
                <td>
                    <img src="{{asset($product->main_image)}}" width="100px"/>
                </td>
                <td>
                    <img src="{{asset($product->main_image)}}" width="100px"/>
                </td>
                <td>
                    <img src="{{asset($product->main_image)}}" width="100px"/>
                </td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                        @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
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
