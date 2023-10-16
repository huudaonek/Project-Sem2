
@extends('layout.master')
@section('title','Home')

@section('body')

    <title>Product List</title>
    <div id="wrapper">
        <div class="headline-top">
            <h1>products indoor-plant</h1>
        </div>
        <section>
            <div class="product">
                <ul class="category">
                    @foreach($products as $product)
                    @if($product->category === 'indoor-plants')
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
                                <div class="category-item-info-name">Name : {{ $product->name }}</div>
                                <div class="category-item-info-category">Category : {{ $product->category }}</div>
                                <div class="category-item-info-price">Price : ${{ $product->price }}</div>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    <!-- Kết thúc vòng lặp foreach -->
                </ul>
            </div>
        </section>
    </div>
@endsection
<style>
    .icon:hover .icon-item {
    background-color: #014e37;
    color: white;
}
.icon-item:hover i{
    color: white;
}
</style>
