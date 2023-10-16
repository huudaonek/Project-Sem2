@extends('layout.master')

@section('title','Home')

@section('body')

{{--    Start Home Page--}}
@if(session('success'))
                    <div class="btn">
                                    {{ session('success') }}
                                </div>
                            @endif
<!--slider area start-->
<section class="slider_section">
    <div class="slider_area owl-carousel">
        <div class="single_slider d-flex align-items-center" data-bgimg="front/assets/img/slider/slider1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1>BIG SALE</h1>
                            <p>Discount <span>20% Off </span> For Lukani Members </p>
                            <a class="button" href="#">Discover Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="front/assets/img/slider/slider11.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1>TOP SALE</h1>
                            <p>Discount <span>20% Off </span> For Lukani Members </p>
                            <a class="button" href="#">Discover Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single_slider d-flex align-items-center" data-bgimg="front/assets/img/slider/slider6.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="slider_content">
                            <h1>Lovely Plants </h1>
                            <p>Discount <span>20% Off </span> For Lukani Members </p>
                            <a class="button" href="#">Discover Now </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--slider area end-->

    <!--shipping area start-->
    <div class="shipping_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping">
                        <div class="shipping_icone">
                            <img src="front/assets/img/about/shipping1.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Free Delivery</h3>
                            <p>Free shipping around the world for all <br> orders over $120</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_2">
                        <div class="shipping_icone">
                            <img src="front/assets/img/about/shipping2.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Safe Payment</h3>
                            <p>With our payment gateway, don’t worry <br> about your information</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_shipping col_3">
                        <div class="shipping_icone">
                            <img src="front/assets/img/about/shipping3.png" alt="">
                        </div>
                        <div class="shipping_content">
                            <h3>Friendly Services</h3>
                            <p>You have 30-day return guarantee for <br> every single order</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shipping area end-->

    <div class="welcome_lukani_store">
    <div class="container">
        <div class="welcome_lukani_container">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                    <div class="welcome_lukani_thumb">
                        <img src="https://images.pexels.com/photos/12445905/pexels-photo-12445905.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1
" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="welcome_lukani_content">
                        <div class="welcome_lukani_header">
                            <h3>Welcome to PlantNest store</h3>
                            <h2>PlantNest History</h2>
                        </div>
                        <div class="welcome_lukani_desc">
                            <p>Commodo sociosqu venenatis cras dolor sagittis integer luctus sem primis eget
                                maecenas
                                sedurna malesuada consectetuer.</p>
                            <p>Ornare integer commodo mauris et ligula purus, praesent cubilia laboriosam viverra.
                                Mattis id rhoncus. Integer lacus eu volutpat fusce. Elit etiam phasellus suscipit
                                suscipit dapibus,
                                condimentum tempor quis, turpis luctus dolor sapien vivamus.</p>
                        </div>
                        <div class="welcome_lukani_footer">
                            <img src="front/assets/img/bg/signature.png" alt="">
                            <p><span>john doe</span> – CEO PlantNest</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

 <!--product area start-->
   <div id="wrapper">
    <div class="headline-top">
        <div class="row">
            <div class="col-12">
                <div class="section_title">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="product">
            <ul class="category">
                @php
                    $productCount = 0;
                @endphp

                @foreach($products as $product)
                    @if (4 > $productCount)
                        <li>
                            <div class="category-item">
                                <div class="category-item-top">
                                    <a href="{{ route('user.product.detail', ['id' => $product->id]) }}" class="category-item-top-img">
                                        <img src="{{ $product->images->count() > 0 ? $product->images[0]->url : asset('path_to_default_image.jpg') }}" alt="">
                                    </a>
                                    <a href="{{ route('user.product.detail', ['id' => $product->id]) }}" class="category-item-top-hover">
                                        <img src="{{ $product->hover_image_url }}" alt="">
                                    </a>
                                    <div class="category-item-top-sale" style="width: 40px; ">{{ $productCount + 1 }}</div> <!-- Hiển thị số ngược đếm từ 4 -->
                                    <div class="category-item-top-icon">
                                        <div class="icon">
                                            <div class="icon-item">
                                            <a href="{{ route('user.cart.add', ['product' => $product->id]) }}"><i class='bx bx-cart-alt'></i></a>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <div class="icon-item">
                                                <a href="#"><i class='bx bx-heart'></i></a>
                                            </div>
                                        </div>
                                        <div class="icon">
                                            <div class="icon-item">
                                                <a href="#"><i class='bx bx-line-chart'></i></a>
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
                                    <div class="category-item-info-name"><a href="">Name : {{ $product->name }}</a></div>
                                    <div class="category-item-info-price">Price : {{ $product->price }}$</div>
                                    <div class="category-item-info-price">Tools : {{ $product->category }}</div>
                                </div>
                            </div>
                        </li>
                        @php
                            $productCount++;
                        @endphp
                    @endif
                @endforeach
            </ul>
        </div>
    </section>
</div>
    <!--product area end-->

    <!--testimonial area start-->
    <div class="testimonial_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title">
                        <h2>What Our Customers Says ?</h2>
                    </div>
                </div>
            </div>
            <div class="testimonial_container">
                <div class="row">
                    <div class="testimonial_carousel owl-carousel">
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="front/assets/img/about/testimonials-icon.png" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="front/assets/img/about/testimonial1.png" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Rebecka Filson</a> / <span>CEO of CSC</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="front/assets/img/about/testimonials-icon.png" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="front/assets/img/about/testimonial2.png" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Amber Laha</a> / <span>CEO of DND</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="single-testimonial">
                                <div class="testimonial-icon-img">
                                    <img src="front/assets/img/about/testimonials-icon.png" alt="">
                                </div>
                                <div class="testimonial_content">
                                    <p>“ When a beautiful design is combined with powerful technology, <br>
                                        it truly is an artwork. I love how my website operates and looks with this
                                        theme. Thank you for the awesome product. ”</p>
                                    <div class="testimonial_text_img">
                                        <a href="#"><img src="front/assets/img/about/testimonial3.png" alt=""></a>
                                    </div>
                                    <div class="testimonial_author">
                                        <p><a href="#">Lindsy Neloms</a> / <span>CEO of SFD</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--testimonial area end-->


{{--    End Home Page--}}
@endsection

