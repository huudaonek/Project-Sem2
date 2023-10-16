@extends('layout.master')
@section('title','Home')

@section('body')
<style>
     .message {
        color: #fff;
        text-align: center;
        padding: 10px;
        margin-bottom: 10px;
    }
.filter {
    width: 755px;
    height: 70px;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    display: flex;
    align-items: center;
}

.filter h4 {
    margin-right: 10px;
    margin-top: 8px;
}

#filter-form {
    display: flex;
    align-items: center;
}

.form-group {
    margin-left: 10px;
}

.form-group input {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin: 0;
    width:100px;
    height: 20px;
}
button{
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-left:10px ;
}
button:hover{
    background-color: dimgray;
    color: #fff;
}
</style>
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>List Product</h3>
                        <ul>
                            <li>List Product</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wrapper">
        <div class="product">
            <div class="filter">
                <h4>Filter by Price</h4>
                <form id="filter-form">
                    <div class="form-group">
                        <label for="min_price">Min Price:</label>
                        <input type="number" name="min_price" id="min_price" min="0">
                    </div>
                    <div class="form-group">
                        <label for="max_price">Max Price:</label>
                        <input type="number" name="max_price" id="max_price" min="0">
                    </div>
                    <button type="submit">Filter</button>
                </form>
                <button><a href="{{route('filter.products.low-to-high')}}" >low to high</a></button>
                <button><a href="{{route('filter.products.high-to-low')}}" >high to low</a></button>
            </div>
            <div class="message">
        @if(session('success'))
        {{ session('success') }}
        @endif

        @if(session('error'))
        {{ session('error') }}
        @endif
        </div>
            <ul class="category">
                @foreach($products as $product)
                <li>
                    <div class="category-item">
                        <div class="category-item-top">
                            <a href="{{ route('user.product.detail', ['id' => $product->id]) }}" class="category-item-top-img">
                                <img src="{{ $product->images->count() > 0 ? $product->images[0]->url : asset('path_to_default_image.jpg') }}" alt="">
                            </a>
                            <a href="{{ route('user.product.detail', ['id' => $product->id]) }}" class="category-item-top-hover">
                                <img src="{{ $product->hover_image_url }}" alt="">
                            </a>
                            <div class="category-item-top-sale">-0%</div>
                                <div class="category-item-top-icon">
                                    <div class="icon">
                                        <div class="icon-item">
                                            <a href="{{ route('user.cart.add', ['product' => $product->id]) }}"><i class='bx bx-cart-alt'></i></a>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <div class="icon-item">
                                            <a href=""><i class='bx bx-heart'></i></a>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <div class="icon-item">
                                            <a href=""><i class='bx bx-line-chart'></i></a>
                                        </div>
                                    </div>
                                    <div class="icon">
                                        <div class="icon-item">
                                            <a href="{{ route('user.product.detail', ['id' => $product->id]) }}"><i class='bx bx-happy-heart-eyes'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="category-item-info">
                                <div class="category-item-info-icon">
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star'></i>
                                    <i class='bx bxs-star-half'></i>

                                </div>
                                <div class="category-item-info-name">Name : {{ $product->name }}</></div>
                                <div class="category-item-info-category">Category : {{ $product->category }}</></div>
                                <div class="category-item-info-price">Price : ${{ $product->price }}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <!-- Kết thúc vòng lặp foreach -->
                </ul>
            </div>
        </section>
    </div>
@endsection

