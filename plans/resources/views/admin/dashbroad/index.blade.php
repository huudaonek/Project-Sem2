@extends('layout.dashbroad')
@section('body')
<div class="container1">
    <!-- Phần Order Manage -->
    <section class="order-section">
        <div class="breadcrumb_content">
            <h3>Order Manage</h3>
        </div>
        <table class="table">
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
                            <td class="{{ $order->status === 'Confirm' ? 'status-confirm' : ($order->status === 'Delivering' ? 'status-delivering' : 'status-received') }}">{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show',$order->id) }}" class="btn btn-info">Details</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.dashbroad.order') }}" class="btn-view-more">Xem thêm</a>
    </section>
    <!-- Kết thúc phần Order Manage -->

    <!-- Phần User Manage -->
    <section class="user-section">
        <div class="breadcrumb_content">
            <h3>User Manage</h3>
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
                                <a href="{{ route('admin.users.remove', $user->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Xóa</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.dashbroad.user') }}" class="btn-view-more">Xem thêm</a>
    </section>
    <!-- Kết thúc phần User Manage -->

    <!-- Phần Product Manage -->
    <section class="product-section">
        <div class="breadcrumb_content">
            <h3>Product Manage</h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="product-image">
                            @if($product->images->count() > 0)
                                <img src="{{ $product->images[0]->url }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('path_to_default_image.jpg') }}" alt="{{ $product->name }}">
                            @endif
                        </td>
                        <td class="product-name">{{ $product->name }}</td>
                        <td class="product-price">${{ $product->price }}</td>
                        <td class="product-category">{{ $product->category }}</td>
                        <td class="product-actions">
                            <form action="{{ route('admin.product.uploadImage', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" accept="image/*" required>
                                <button type="submit" class="btn-upload-image">Upload Image</button>
                            </form>
                            <a href="{{ route('admin.product.edit', $product->id) }}" class="btn-edit">Edit</a>
                            <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.product.index') }}" class="btn-view-more">Xem thêm</a>
<div class="breadcrumb_content">
    <h3>Contact</h3>
</div>
<div class="contact-list">
    <table class="contact-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->message }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </section>
</div>
@endsection

<style>
.contact-list {
    margin-top: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.contact-list h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

/* CSS cho bảng danh sách liên hệ */
.contact-table {
    width: 100%;
    border-collapse: collapse;
}

.contact-table th,
.contact-table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.contact-table th {
    background-color: #f2f2f2;
}

.contact-table tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

.contact-table tbody tr:hover {
    background-color: #e0e0e0;
}
.container1 {
    margin: 50px;
    padding: 50px;
}

h2 {
    font-size: 24px;
    color: #333;
}

.alert {
    padding: 10px;
    margin-bottom: 20px;
    background-color: #f2f2f2;
    border: 1px solid #ddd;
    border-radius: 5px;
}

/* CSS cho bảng */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 14px;
}

.table th,
.table td {
    border: 1px solid #ddd;
    padding: 10px;
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

/* CSS cho các loại trạng thái và thanh toán */
.green-text {
    color: green;
}

.blue-text {
    color: #007bff;
}

.red-text {
    color: red;
}

.status-confirm,
.status-delivering,
.status-received {
    font-weight: bold;
    font-size: 16px;
}

.status-confirm {
    color: red;
}

.status-delivering {
    color: darkgoldenrod;
}

.status-received {
    color: green;
}

.cod-payment {
    font-weight: bold;
    font-size: 16px;
    color: red;
}

.paypal-payment {
    font-weight: bold;
    font-size: 16px;
    color: green;
}

.product-section {
    margin-top: 20px;
}

.product-box {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.product-box h3 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
}

.product-image img {
    max-width: 100px;
    height: auto;
}

.product-name,
.product-price,
.product-category,
.product-actions {
    font-size: 16px;
}

.product-actions form {
    display: inline-block;
    margin-right: 5px;
}

.btn-upload-image,
.btn-edit,
.btn-delete,
.btn-view-more {
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-upload-image {
    background-color: #007bff;
    color: #fff;
}

.btn-upload-image:hover {
    background-color: #0056b3;
}

.btn-edit {
    background-color: #17a2b8;
    color: #fff;
}

.btn-edit:hover {
    background-color: #138496;
}

.btn-delete {
    background-color: #dc3545;
    color: #fff;
}

.btn-delete:hover {
    background-color: #c82333;
}

.btn-view-more {
    background-color: #28a745;
    color: #fff;
    margin-top: 10px;
    display: block;
    width: 100px;
    text-align: center;
    padding: 5px 0;
}

.btn-view-more:hover {
    background-color: #218838;
}
</style>
