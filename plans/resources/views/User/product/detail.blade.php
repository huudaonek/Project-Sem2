@extends('layout.master')
@section('title','Home')

@section('body')
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h3>Product Detail</h3>
                            <ul>
                                <li>Product Detail</li>
                            </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details variable_product mt-100 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            @if (!empty($product->images) && count($product->images) > 0)
                                <img src="{{ $product->images[0]->url }}" alt="{{ $product->name }}" class="active">
                            @endif
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                                @foreach($product->images as $index => $image)
                                    <div class="thumbnail">
                                        <img src="{{ $image->url }}" alt="{{ $product->name }}" data-index="{{ $index }}">
                                    </div>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form action="{{ url('/cart') }}" method="get">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <h1>{{$product->name}}</h1>
                            <div class="product_ratting">
                                <ul>
                                    <style>
                                        /* Icon mặc định (không active) */
                                        .icon-star {
                                            color: #ccc;
                                        }
                                        /* Icon active (có điểm đánh giá) */
                                        .icon-star.active {
                                            color: #ffca08;
                                        }
                                    </style>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li><a><i class="icon-star{{ $i <= $product->averageRating ? ' active' : '' }}"></i></a> </li>
                                    @endfor
                                    @php
                                        $averageRatingFormatted = number_format($product->averageRating, 1);
                                    @endphp
                                </ul>
                            </div>

                            <div class="price_box">
                                <span class="current_price">${{$product->price}}</span>
                            </div>
                            <div class=" product_d_action">
                                <ul>
                                    <li class="wishlist">
                                        <a href="#"<i class="icon-heart"></i> Add to Wishlist</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product_d_meta">
                                <span>Category: <a href="#">{{$product->category}}</a></span>
                                <span>Number of products available: {{$product->available}}</span>
                            </div>

                            <div class="product_variant quantity">
                                <a href="{{ route('user.cart.add', ['product' => $product->id]) }}">Add to cart</a>
                            </div>
                        </form>
                        <div class="priduct_social">
                            <?php
                                $productUrl = 'https://your-product-url.com'; // Đường dẫn đến sản phẩm thực tế của bạn
                            ?>
                            <ul>
                                <li><a class="facebook" href="https://www.facebook.com/sharer.php?u={{ urlencode($productUrl) }}" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                <li><a class="twitter" href="https://twitter.com/intent/tweet?url={{ urlencode($productUrl) }}" title="twitter"><i class="fa fa-twitter"></i> Tweet</a></li>
                                <li><a class="pinterest" href="https://www.pinterest.com/pin/create/button/?url={{ urlencode($productUrl) }}" title="pinterest"><i class="fa fa-pinterest"></i> Save</a></li>
                                <li><a class="google-plus" href="https://plus.google.com/share?url={{ urlencode($productUrl) }}" title="google +"><i class="fa fa-google-plus"></i> Share</a></li>
                                <li><a class="linkedin" href="https://www.linkedin.com/shareArticle?url={{ urlencode($productUrl) }}" title="linkedin"><i class="fa fa-linkedin"></i> Linked</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
    <div class="product_d_info mb-90">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="product_d_inner">
                        <div class="product_info_button">
                            <ul class="nav" role="tablist" id="nav-tab">
                                <li>
                                    <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                       aria-selected="false">Description</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info" role="tabpanel">
                                <div class="product_info_content">
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product area end
@endsection
