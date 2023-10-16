@extends('layout.master')
@section('title','Home')

@section('body')
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>My order</h3>
                        <ul>
                            <li>My order</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
<div class="container1">
   @if (count($orders) > 0)
        <table class="table1">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                        <div class="btn-group">
                            <a href="{{ route('user.orders.details', ['id' => $order->id]) }}" class="view-details">View Details</a>
                            <form method="POST" action="{{ route('user.orders.delete', ['id' => $order->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" btn-delete">destroy</button>
                            </form>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You have no orders.</p>
    @endif
</div>
@endsection
<style>
/* CSS cho container chung */
.container1 {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* CSS cho tiêu đề "My Orders" */
h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

/* CSS cho bảng */
.table1 {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.table1 th,
.table1 td {
    border: 1px solid #ddd;
    padding: 10px 12px;
    text-align: left;
}

.table1 th {
    background-color: #f2f2f2;
}
/* CSS cho nút "View Details" */
.btn{
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    padding: 8px 16px;
    transition: background-color 0.3s ease;
}


/* CSS cho nút "View Details" và "Delete" */


.btn-danger {
    background-color: #dc3545;
}

/* CSS cho thông báo "You have no orders." */
p {
    font-size: 18px;
    color: #777;
}

/* CSS cho nút "View Details" và "Delete" khi hover */
.btn:hover,
.btn-danger:hover {
    background-color: #0056b3;
}
/* CSS cho nút "View Details" và "Delete" nằm ngang */
.btn-group {
    display: flex;
    gap: 10px;
}

.view-details {
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    padding: 4px 16px;
    height: 40px;
}

.btn-delete {
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    padding: 8px 16px;
}

/* CSS cho nút "View Details" và "Delete" khi hover */
.btn-view-details:hover {
    background-color: #0056b3;
}

.btn-delete:hover {
    background-color: #c82333;
}

</style>
