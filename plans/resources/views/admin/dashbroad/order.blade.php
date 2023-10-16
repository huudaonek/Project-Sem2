@extends('layout.dashbroad')

@section('body')
<style>
/* CSS cải thiện giao diện trang */
.container1 {
    margin: 20px 70px; /* Tách khoảng cách trái và phải nhiều hơn */
    padding: 20px;
}

h2 {
    font-size: 24px;
    color: #333;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
}

/* CSS cho bảng */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 14px;
}

.table th, .table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background-color: #f2f2f2;
}

.table tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #e0e0e0;
}

/* CSS cho nút */
.btn {
    padding: 5px 10px;
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #0056b3;
}
    /* CSS cho phần Order */
    .status-confirm {
        color: red; /* Màu xanh cho trạng thái 'Confirm' */
        font-weight: bold; /* Đậm */
        font-size: 16px; /* Kích thước chữ to hơn */
    }

    .status-delivering {
        color: darkgoldenrod; /* Màu xanh dương cho trạng thái 'Delivering' */
        font-weight: bold; /* Đậm */
        font-size: 16px; /* Kích thước chữ to hơn */
    }

    .status-received {
        color: green; /* Màu đỏ cho trạng thái 'Received' */
        font-weight: bold; /* Đậm */
        font-size: 16px; /* Kích thước chữ to hơn */
    }

    /* CSS cho COD (màu đỏ) */
    .cod-payment {
        color: red;
        font-weight: bold; /* Đậm */
        font-size: 16px; /* Kích thước chữ to hơn */
    }

    /* CSS cho PayPal (màu xanh lá cây) */
    .paypal-payment {
        color: green;
        font-weight: bold; /* Đậm */
        font-size: 16px; /* Kích thước chữ to hơn */
    }
</style>

<div class="container1">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <div class="container1">
        <table class="table">
            <div class="breadcrumb_content">
                <h3>Manage Order</h3>
            </div>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                @foreach($order->orderDetails as $orderDetail)
                <tr class="order-row">
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->FullName }}</td>
                    <td>{{ $orderDetail->product->name }}</td>
                    <td>{{ $orderDetail->qty }}</td>
                    <td>{{ $orderDetail->total }}</td>
                    <td class="payment {{ $orderDetail->payment === 'Cod' ? 'cod-payment' : 'paypal-payment' }}">{{ $orderDetail->payment }}</td>
                    <td class="@if ($order->status == 'Confirm') status-confirm @elseif ($order->status == 'Delivering') status-delivering @elseif ($order->status == 'Received') status-received @endif">{{ $order->status }}</td>

                    <td>
                        <a href="{{ route('admin.orders.show',$order->id) }}" class="btn btn-info">Details</a>
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
    </div>
</div>
@endsection
