@extends('layout.master')
@section('title','Home')

@section('body')
<div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Order Detail</h3>
                        <ul>
                            <li>Order Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container1">
    <p>Order ID: {{ $order->id }}</p>
    <p>Order Date: {{ $order->created_at }}</p>
    <p>Status: {{ $order->status }}</p>

    <h3>Order Items</h3>
    @if (count($orderDetails) > 0)
        <table class="table1">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orderDetails as $orderDetail)
                    <tr>
                        <td>{{ $orderDetail->product->name }}</td>
                        <td>{{ $orderDetail->qty }}</td>
                        <td>${{ $orderDetail->price }}</td>
                        <td>{{  $orderDetail->payment }}</td>
                        <td>${{ $orderDetail->total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No items in this order.</p>
    @endif
</div>
@endsection

<style>
/* CSS cho trang order detail */
/* CSS cho trang order detail */
.container1 {
    max-width: 800px;
    margin: 30px auto;
    padding: 20px;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* CSS cho tiêu đề "Order Details" */
.container1 h2 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

/* CSS cho các mục thông tin đơn hàng */
.container1 p {
    font-size: 18px;
    color: #777;
    margin-bottom: 10px;
}

/* CSS cho bảng chi tiết đơn hàng */
.container1 table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.container1 th,
.container1 td {
    border: 1px solid #ddd;
    padding: 10px 12px;
    text-align: left;
}

.container1 th {
    background-color: #f2f2f2;
}

</style>
