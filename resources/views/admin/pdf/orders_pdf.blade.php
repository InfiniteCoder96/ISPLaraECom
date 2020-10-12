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
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->Users->name }}</td>
                <td>{{ $order->Products->name }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->quantity * $order->Products->price }}</td>
            </tr>
        @endforeach
    </table>

</body>
</html>
    
