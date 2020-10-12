<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

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
        </tr>
    @endforeach
</table>

</body>
</html>

