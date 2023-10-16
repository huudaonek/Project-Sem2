@extends('layout.dashbroad')

@section('body')
<style>
    .dashboard-section {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.dashboard-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}
.dashboard-item {
    background-color: #f2f2f2;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    flex-basis: calc(33.33% - 20px);
}

.dashboard-item h3 {
    font-size: 18px;
    margin-bottom: 10px;
    color: #333;
}

.dashboard-item p{
    font-size: 16px;
    margin: 5px 0;
    color: red;
}

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
    <div class="breadcrumb_content">
        <h3>Manage User</h3>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->FullName }}</td>
                    <td>{{ $user->UserName }}</td>
                    <td>{{ $user->Phone }}</td>
                    <td>{{ $user->Address }}</td>
                    <td>{{ $user->Email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        @if($user->role !== 'admin')
                            <a href="{{ route('admin.users.remove', $user->id) }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này?')">Xóa</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
