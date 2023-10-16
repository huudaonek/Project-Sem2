@extends('layout.dashbroad')
@section('body')
 <div class="breadcrumb_content">
                    <h3>Create Product</h3>
                    <br>
                </div>
 <section class="product-form" id="add-product">
        <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>

            <label for="available">Available:</label>
            <input type="text" id="available" name="available" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" required>

            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="bonsai">Bonsai</option>
                <option value="indoor-plants">Indoor Plants</option>
                <option value="outdoor-plants">Outdoor Plants</option>
                <option value="tools">Tools</option>
            </select>

            <button type="submit">Add Product</button>
        </form>
    </section>
@endsection
<style>
    /* CSS cho trang thêm và chỉnh sửa sản phẩm */
.product-form {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-form h2 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.product-form form {
    margin-top: 20px;
}

.product-form label {
    font-weight: bold;
    font-size: 18px;
    display: block;
    margin-bottom: 5px;
}

.product-form input[type="text"],
.product-form input[type="number"],
.product-form select,
.product-form textarea {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    margin-bottom: 15px;
}

.product-form button[type="submit"] {
    background-color: #218838;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    display: block;
    margin: 0 auto;
}

.product-form button[type="submit"]:hover {
    background-color: #1e7e34;
}

</style>
