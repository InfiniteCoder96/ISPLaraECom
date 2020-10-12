@extends('layouts.adminApp')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Suppliers</h2>
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
                <a class="btn btn-primary" href={{ url('suppdf') }}>Export to PDF</a>
            </div>
        </tr>
        <tr>
            <th>No</th>
            <th>Supplier Name</th>
            <th>NIC</th>
            <th>E-mail</th>
            <th>Contact Number</th>
            <th>Address</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->nic }}</td>
                <td>{{ $supplier->email }}</td>
                <td>{{ $supplier->pno }}</td>
                <td>{{ $supplier->address }}</td>

                <td>


                        <a href="{{action('SupplierController@edit', $supplier['id'])}}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                        <form action="{{action('SupplierController@destroy', $supplier['id'])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-primary"  type="submit">Delete</button>



                    </form>


                </td>
            </tr>
        @endforeach
    </table>


@endsection
