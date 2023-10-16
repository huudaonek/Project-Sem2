@extends('layout.dashbroad')
@section('body')
    <section class="upload-image" id="upload-image">
        <h1>Upload Product Image</h1>
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
        <form action="{{ route('admin.product.uploadImage', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" accept="image/*">
            <button type="submit" class="btn">Upload Image</button>
        </form>
    </section>
@endsection
