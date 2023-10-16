@extends('layout.master')

@section('body')
 <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Check Out</h3>
                        <ul>
                            <li>Check Out</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="checkout">

    @if (count($cart) === 0)
        <p>Your cart is empty. Add products to your cart before proceeding to checkout.</p>
    @else
        <div class="order-details">
            <h2>Order Details</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $totalPrice = 0; // Khởi tạo biến tổng tiền
                    @endphp

                    @foreach ($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>${{ $item['price'] }}</td>
                            <td>{{ $item['qty'] }}</td>
                            <td>${{ $item['price'] * $item['qty'] }}</td>
                        </tr>
                        @php
                        $totalPrice += $item['price'] * $item['qty'];
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="total-price">
                <h2>Total Price: ${{ $totalPrice }}</h2>
            </div>
        </div>
        <div class="user-details">
            <h2>User Details</h2>
            @if (Auth::check())
                <p>Full Name: {{ Auth::user()->FullName }}</p>
                <p>User Name: {{ Auth::user()->UserName }}</p>
                <p>Phone: {{ Auth::user()->Phone }}</p>
                <p>Address: {{ Auth::user()->Address }}</p>
                <p>Email: {{ Auth::user()->Email }}</p>
                <!-- Các thông tin khác mà bạn muốn hiển thị -->
            @else
                <p>You are not logged in.</p>
            @endif
        </div>
        <div class="payment-form">
            <h2>Payment Information</h2>
            <form method="post" action="{{ route('user.cart.placeOrder') }}">
                @csrf
                <label for="payment">Payment Method:</label>
                <select name="payment" id="payment">
                    <option value="Paypal">Paypal</option>
                    <option value="Cod">Cash on Delivery</option>
                </select>

                <button type="submit" class="btn-payment">Place Order</button>
            </form>
        </div>
    @endif
</section>
@endsection

<style>
/* CSS cho tiêu đề "Checkout" */
h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    text-align: center; /* Căn giữa tiêu đề */
}

/* CSS cho phần bao quanh thông tin đơn hàng và thông tin người dùng */
.checkout {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center; /* Căn giữa phần "Checkout" */
    align-items: flex-start;
    padding-top: 50px;
    padding-bottom: 50px;

}

/* CSS cho phần thông tin đơn hàng */
.order-details {
    flex: 1;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
}

.order-details h2 {
    font-size: 20px;
    color: #333;
    margin-bottom: 20px;
}

.order-details table {
    width: 100%;
    border-collapse: collapse;
}

.order-details table th,
.order-details table td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: left;
}

.order-details table th {
    background-color: #f2f2f2;
}

.order-details .total-price {
    margin-top: 20px;
}

.order-details .total-price h2 {
    font-size: 18px;
    color: #333;
}

/* CSS cho phần thông tin người dùng */
.user-details {
    flex: 1;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
}

.user-details h2 {
    font-size: 20px;
    color: #333;
    margin-bottom: 20px;
}

.user-details p {
    font-size: 18px;
    color: #777;
    margin-bottom: 10px;
}

/* CSS cho form thanh toán */
.payment-form {
    flex: 1;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
}

.payment-form h2 {
    font-size: 20px;
    color: #333;
    margin-bottom: 20px;
    text-align: center; /* Căn giữa tiêu đề */
}

.payment-form label {
    font-size: 18px;
    color: #333;
    display: block;
    margin-bottom: 10px;
}

.payment-form select {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 20px;
}

.btn-payment {
    padding: 10px 20px;
    background-color: #218838;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    display: inline-block;
}

.btn-payment:hover {
    background-color: #333;
}

</style>
