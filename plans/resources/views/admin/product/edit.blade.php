@extends('layout.dashbroad')
@section('body')

        <div class="breadcrumb_content">
                    <h3>Edit Product</h3>
                </div>
                <br>
                <br>
    <div class="product-form">
        <form method="POST" action="{{ route('admin.product.update', ['product' => $product->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category" class="form-control">
                    <option value="bonsai" {{ $product->category === 'bonsai' ? 'selected' : '' }}>Bonsai</option>
                    <option value="indoor-plants" {{ $product->category === 'indoor-plants' ? 'selected' : '' }}>Indoor Plants</option>
                    <option value="outdoor-plants" {{ $product->category === 'outdoor-plants' ? 'selected' : '' }}>Outdoor Plants</option>
                    <option value="tools" {{ $product->category === 'tools' ? 'selected' : '' }}>Tools</option>
                </select>
            </div>

           <div class="form-group">
            <label for="available">Available:</label>
            <input type="text" id="available" value="{{ $product->available }}" name="available" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>
@endsection
<style>
    /* CSS cho trang chỉnh sửa sản phẩm */
.product-form {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f7f7f7;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-form h1 {
    font-size: 24px;
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: bold;
    font-size: 18px;
    display: block;
    margin-bottom: 5px;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

select.form-control {
    height: 40px;
}

textarea.form-control {
    height: 120px;
}

.btn-primary {
    background-color: #218838;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #1e7e34;
}

/* Thêm phần CSS tùy chỉnh tùy theo nhu cầu của bạn */

</style>
