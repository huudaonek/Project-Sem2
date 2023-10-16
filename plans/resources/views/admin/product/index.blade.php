@extends('layout.dashbroad')
@section('body')
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
     <div class="breadcrumb_content">
        <h3>Product Management</h3>
                </div>
                <br>
                <br>

    <section class="product-list" id="product-list">
        <a href="{{ route('admin.product.create') }}" class="btn">Create Product</a>
        <div class="product-box">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                @if($product->images->count() > 0)
                                    <img src="{{ $product->images[0]->url }}" alt="{{ $product->name }}" width="100">
                                @else
                                    <img src="{{ asset('path_to_default_image.jpg') }}" alt="{{ $product->name }}" width="100">
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>${{ $product->price }}</td>
                            <td>{{ $product->category }}</td>
                            <td><form action="{{ route('admin.product.uploadImage', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="image" accept="image/*" required>
                                    <button type="submit" class="btn">Upload Image</button>
                                </form></td>
                            <td>
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn">Edit</a>
                                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">Delete</button>
                                    </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

<style>
/* Reset some default browser styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Apply a background color to the entire page */
body {
    background-color: #f0f0f0;
}

/* Style the product list container */
.product-list {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 0 auto;
    max-width: 1200px;
}

/* Style the heading */
.product-list h1 {
    font-size: 24px;
    margin-bottom: 20px;
    text-align: center;
}

/* Style the "Create Product" button */
.product-list .btn {
    display: block;
    width: 150px;
    margin: 0 auto 20px;
    padding: 10px;
    text-align: center;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    text-decoration: none;
}

.product-list .btn:hover {
    background-color: #0056b3;
}

/* Style the product table */
.product-list table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
}

.product-list th,
.product-list td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

.product-list th {
    background-color: #f2f2f2;
    font-weight: bold;
}

.product-list td img {
    max-width: 100px;
    height: auto;
}

.product-list .icons {
    display: flex;
    justify-content: center;
}

.product-list .icons a {
    margin: 0 5px;
    text-decoration: none;
    color: #333;
    font-size: 16px;
}

.product-list .btn {
    text-decoration: none;
    background-color: #007bff;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.product-list .btn:hover {
    background-color: #0056b3;
}


</style>



