@extends('layout.master')

@section('body')

<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>My Cart</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="cart">
    <div class="alert alert-success{{ session('success') ? ' show' : '' }}">
        {{ session('success') }}
    </div>
    <div class="button-container">
        <a href="{{ route('user.orders.list') }}" class="view-orders-button">View Orders</a>
        @if (count($cart) > 0)
            <a href="{{  route('user.cart.clearAll')  }}" class="clear-cart-button">Clear All</a>
        @endif
    </div>

    <form method="post" action="{{ route('user.cart.placeOrder') }}">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $index => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>
                            @if (isset($item['image_url']))
                                <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" class="product-image">
                            @else
                                <img src="{{ asset('path_to_default_image.jpg') }}" alt="No Image" class="product-image">
                            @endif
                        </td>
                        <td>${{ $item['price'] }}</td>
                        <td>{{ $item['qty'] }}</td>
                        <td>${{ $item['price'] * $item['qty'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($cart) > 0)
            <a href="{{ route('user.checkout') }}" class="checkout-button">Check Out</a>
        @endif
    </form>
</section>
@endsection
<style>
    /* CSS cho tiêu đề "Shopping Cart" */
    .cart {
        max-width: 950px;
        margin: 50px auto;
        padding: 0 20px;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
    }

    /* CSS cho thông báo "success" */
    .alert.alert-success {
        display: none;
        animation: fadeOut 5s linear;
    }

    /* CSS cho nút "View Orders" và "Clear All" */
    .button-container {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }

    .view-orders-button,
    .clear-cart-button {
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
    }

    .view-orders-button {
        background-color: #007bff;
        color: #fff;
    }

    .clear-cart-button {
        background-color: #dc3545;
        color: #fff;
    }

    .view-orders-button:hover {
        background-color: #0056b3;
    }

    .clear-cart-button:hover {
        background-color: #c82333;
    }

    /* CSS cho bảng sản phẩm */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th,
    table td {
        border: 1px solid #ddd;
        padding: 10px 12px;
        text-align: left;
    }

    table th {
        background-color: #f2f2f2;
    }

    /* CSS cho nút "Remove" */
    .remove-button {
        padding: 8px 16px;
        background-color: #dc3545;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .remove-button:hover {
        background-color: #c82333;
    }

    /* CSS cho nút "Check Out" */
    .checkout-button {
        padding: 10px 20px;
        background-color: #28a745;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
        display: inline-block;
    }

    .checkout-button:hover {
        background-color: #218838;
    }

    /* CSS cho thông báo "Your cart is empty." */
    p {
        font-size: 18px;
        color: #777;
    }

    /* CSS cho hình ảnh sản phẩm */
    .product-image {
        max-width: 100px;
        height: auto;
        display: block;
        margin: 0 auto;
    }
</style>
