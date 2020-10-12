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

        </tr>
    @endforeach
</table>

</body>
</html>

