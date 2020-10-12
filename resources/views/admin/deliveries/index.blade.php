@extends('layouts.adminApp')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Deliveries</h2>
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
                <a class="btn btn-primary" href={{ url('delpdf') }}>Export to PDF</a>
            </div>
        </tr>
        <tr>

            <th>Product Name</th>
            <th>Customer Name</th>
            <th>E-mail</th>
            <th>Delivery Address</th>
            <th>Phone Number</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($deliveries as $delivery)
            <tr>

                <td>{{$delivery->pname }}</td>
                <td>{{$delivery->cname }}</td>
                <td>{{$delivery->email }}</td>
                <td>{{$delivery->address }}</td>
                <td>{{$delivery->pno }}</td>

                <td>
                    <a href="{{action('DeliveryController@edit', $delivery['id'])}}" class="btn btn-primary" >Edit</a>
                </td>
                <td>
                    <form action="{{action('DeliveryController@destroy', $delivery['id'])}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-primary" style="margin-right: 5px" type="submit">Delete</button>
                    </form>

                </td>

            </tr>
        @endforeach
    </table>


@endsection

