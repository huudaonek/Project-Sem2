@extends('layout.dashbroad')
@section('body')

    <div class="container1">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="split-tables">
            <!-- Bảng bên trái - User -->
            <div class="left-table">
                <div class="breadcrumb_content">
                    <h3>User Information</h3>
                </div>
                <table class="table">
                    <tr>
                        <th>User Full Name</th>
                        <td>{{ $order->user->FullName }}</td>
                    </tr>
                    <tr>
                        <th>User Name</th>
                        <td>{{ $order->user->UserName }}</td>
                    </tr>
                    <tr>
                        <th>User Phone</th>
                        <td>{{ $order->user->Phone }}</td>
                    </tr>
                    <tr>
                        <th>User Address</th>
                        <td>{{ $order->user->Address }}</td>
                    </tr>
                    <tr>
                        <th>User Email</th>
                        <td>{{ $order->user->Email }}</td>
                    </tr>
                </table>
            </div>

            <!-- Bảng bên phải - Đơn hàng (order) -->
            <div class="right-table">
                 <div class="breadcrumb_content">
                    <h3>Order Detail</h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Trong vòng lặp foreach của orderDetails -->
                        @foreach($orderDetails as $orderDetail)
                            <tr>
                                <td>{{ $orderDetail->id }}</td>
                                <td>{{ $orderDetail->product->name }}</td>
                                <td>{{ $orderDetail->qty }}</td>
                                <td>{{ $orderDetail->total }}</td>
                                <td>{{ $orderDetail->payment }}</td>
                                <td class="@if ($order->status == 'Confirm') status-confirm @elseif ($order->status == 'Delivering') status-delivering @elseif ($order->status == 'Received') status-received @endif">{{ $order->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($order->status != 'Received')
                        <form action="{{ route('admin.orders.updateStatus', ['id' => $order->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info">Update Status</button>
                        </form>
                    @endif
            </div>
        </div>
    </div>
@endsection
    <style>
        /* CSS cho container1 */
        .container1 {
            margin-top: 20px;
            margin-bottom: 200px;
            padding-bottom: 100px;
        }

        /* CSS cho alert */
        .alert {
            margin-bottom: 20px;
        }

        /* CSS cho split-tables */
        .split-tables {
            display: flex;
            justify-content: space-between;
        }

        /* CSS cho left-table */
        .left-table {
            flex-basis: 45%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .left-table h3 {
            font-size: 18px;
            margin-top: 0;
            text-align: center;
        }

        .left-table table {
            width: 100%;
        }

        .left-table th {
            text-align: right;
            padding-right: 10px;
        }

        .left-table td {
            padding-left: 10px;
        }

        /* CSS cho right-table */
        .right-table {
            flex-basis: 50%;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .right-table h3 {
            font-size: 18px;
            margin-top: 0;
            text-align: center;
        }

        .right-table table {
            width: 100%;
        }

        .right-table th {
            text-align: center;
        }

        .right-table td {
            text-align: center;
        }

        /* CSS cho nút Update Status */
        .btn-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-info:hover {
            background-color: #138496;
            color: #fff;
        }
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
    </style>
