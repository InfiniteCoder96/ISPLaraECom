@extends('layouts.adminApp')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Product Categories</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('productCategories.create') }}">Create New Product Category</a>
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
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($productCategories as $productCategory)
            <tr>
                <td>{{ $productCategory->id }}</td>
                <td>{{ $productCategory->name }}</td>
                <td>{{ $productCategory->description }}</td>
                <td>
                    <img src="{{asset($productCategory->image)}}" width="100px"/>
                </td>
                <td>
                    <form action="{{ route('products.destroy',$productCategory->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$productCategory->id) }}">Show</a>
                        @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('products.edit',$productCategory->id) }}">Edit</a>
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