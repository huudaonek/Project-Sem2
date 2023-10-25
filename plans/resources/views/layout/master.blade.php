<!doctype html>
<html class="no-js" lang="en">

<head>
    <base href="/">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PlantNest</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="front/assets/css/style-price.css">
    <link rel="stylesheet" href="front/assets/css/nice-select.css">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="front/assets/img/android-chrome-512x512.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS
    ========================= -->
    <!--bootstrap min css-->
    <link rel="stylesheet" href="front/assets/css/bootstrap.min.css">
    <!--owl carousel min css-->
    <link rel="stylesheet" href="front/assets/css/owl.carousel.min.css">
    <!--slick min css-->
    <link rel="stylesheet" href="front/assets/css/slick.css">
    <!--magnific popup min css-->
    <link rel="stylesheet" href="front/assets/css/magnific-popup.css">
    <!--font awesome css-->
    <link rel="stylesheet" href="front/assets/css/font.awesome.css">
    <!--animate css-->
    <link rel="stylesheet" href="front/assets/css/animate.css">
    <!--jquery ui min css-->
    <link rel="stylesheet" href="front/assets/css/jquery-ui.min.css">
    <!--slinky menu css-->
    <link rel="stylesheet" href="front/assets/css/slinky.menu.css">
    <!--plugins css-->
    <link rel="stylesheet" href="front/assets/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="front/assets/css/style.css">

    <!--modernizr min js here-->
    <script src="front/assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <style>
        /* Loading */
        .loader-web {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #000;
            transition: opacity 0.5s, visibility 0.75s;
            z-index: 99;
        }

        .loader-web::after {
            content: "";
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-block;
            border-top: 3px solid #FFF;
            border-right: 3px solid transparent;
            box-sizing: border-box;
            animation: loading 0.5s linear infinite;
        }

        .loader-hidden {
            opacity: 0;
            visibility: hidden;
        }

        @keyframes loading {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>

</head>
<body>

<div class="pre-load">
    <div class="loader-web"></div>
</div>

{{-- Star Header Mobile--}}
<!--offcanvas menu area start-->
<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                    </div>
                    <div class="welcome-text">
                        <p>Free Delivery: Take advantage of our time to save event</p>
                    </div>
                    <div class="language_currency text-center">
                        <ul>
                            <li class="currency"><a href="#!"> USD <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_currency">
                                    <li><a href="#!">EUR</a></li>
                                    <li><a href="#!">GPB</a></li>
                                    <li><a href="#!">RUP</a></li>
                                </ul>
                            </li>
                            <li class="language"><a href="#"!> English <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_language">
                                    <li><a href="#!">French</a></li>
                                    <li><a href="#!">Spanish</a></li>
                                    <li><a href="#!">Russian</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                        <div class="search_container">
                                    <div class="search_box">
                                    <form action="{{ route('product.search') }}" method="get">
                                        <input placeholder="Search product..." type="text" name="query" value="{{ request('query') }}">
                                        <button type="submit"><i class="icon-search"></i></button>
                                    </form>
                                </div>
                            </div>
                    <div class="call-support">
                        <p>Call Support: <a href="tel:0123456789">0123456789</a></p>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children active">
                                        <a href="{{url('/')}}">home</a>
                            </li>

                            <li class="menu-item-has-children">
                                        <a href="{{route('product.index')}}">product</a>
                            </li>

                            <li class="menu-item-has-children">
                                <a href="{{url("/blog")}}">Blog</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('/about')}}">About Us </a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{url('/contact')}}"> Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="offcanvas_footer">
                        <span><a href="#"><i class="fa fa-envelope-o"></i> g141@gmail.com</a></span>
                        <ul>
                            <li class="facebook"><a href="#!"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="#!"><i class="fa fa-twitter"></i></a></li>
                            <li class="pinterest"><a href="#!"><i class="fa fa-pinterest-p"></i></a></li>
                            <li class="google-plus"><a href="#!"><i class="fa fa-google-plus"></i></a></li>
                            <li class="linkedin"><a href="#!"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--End Header Mobile--}}

{{-- Star Header Computer--}}
<!--offcanvas menu area end-->
<header>
    <div class="main_header">
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="welcome-text">
                            <p>Free Delivery: Take advantage of our time to save event</p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="language_currency text-right">
                            <ul>
                                <li class="currency"><a href="#!"> USD <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_currency">
                                        <li><a href="#!">EUR</a></li>
                                        <li><a href="#!">GPB</a></li>
                                        <li><a href="#"!>RUP</a></li>
                                    </ul>
                                </li>
                                <li class="language"><a href="#!"> English <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_language">
                                        <li><a href="#!">French</a></li>
                                        <li><a href="#!">Spanish</a></li>
                                        <li><a href="#!">Russian</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-4">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="https://res.cloudinary.com/dx2o9ki2g/image/upload/v1698238484/gsuwxjg7gfnhs4fgrxsd.jpg
" alt="Plant Nest"></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-6">
                        <div class="header_right_info">
                            <div class="search_container">
                                    <div class="search_box">
                                    <form action="{{ route('product.search') }}" method="get">
                                        <input placeholder="Search product..." type="text" name="query" value="{{ request('query') }}">
                                        <button type="submit"><i class="icon-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="header_account_area">
                                <div class="header_account-list header_wishlist">
                                    <a href="{{url('/wishlist')}}"><i class="icon-heart"></i></a>
                                </div>
                                <div class="header_account-list  mini_cart_wrapper">
                                    <a href="javascript:void(0)"><i class="icon-shopping-bag"></i>
                                        <span class="item_count">{{ count(Session::get('cart', [])) }}</span>
                                    </a>
                                        <!-- Đoạn mã HTML cho giỏ hàng mini cart -->
                                        <div class="mini_cart">
                                            <div class="cart_gallery">
                                                <div class="cart_close">
                                                    <div class="cart_text">
                                                        <h3>cart</h3>
                                                    </div>
                                                    <div class="mini_cart_close">
                                                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                                    </div>
                                                </div>
                                                @foreach(Session::get('cart', []) as $item)
                                                <div class="cart_item" data-rowId="">
                                                    <div class="cart_img">
                                                        <a href=""><img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}"></a>
                                                    </div>
                                                    <div class="cart_info">
                                                        <a href="#">{{ $item['name'] }}</a>
                                                        <p>
                                                            <span>Price: ${{ $item['price'] }}</span><br>
                                                            <span>Quantity: {{ $item['qty'] }}</span><br>                                                                                                                    <span>Total: ${{ $item['price'] * $item['qty'] }}</span>
                                                        </p>
                                                    </div>

                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="mini_cart_table">
                                                <div class="cart_table_border">
                                                    <div class="cart_total">
                                                        <span>Sub total:</span>
                                                        <span class="price"></span>
                                                    </div>
                                                    <div class="cart_total mt-10">
                                                        <span>Total:</span>
                                                        <span class="price"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini_cart_footer">
                                                <div class="cart_button">
                                                    <a href="{{ route('user.cart.show') }}"><i class="fa fa-shopping-cart"></i> View cart</a>
                                                </div>
                                                <div class="cart_button">
                                                        <a href="{{ route('user.orders.list') }}" class="btn btn-order">View Orders</a>
                                                </div> <br>
                                                <div class="cart_button">
                                                    <a class="active" href="{{ route('user.checkout') }}"><i class="fa fa-sign-in"></i> Checkout</a>
                                                </div>
                                            </div>
                                            <div class="shopping_cart_area mt-100">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12 mx-auto">
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <a href="{{url("/shop")}}" title="Shopping now!"><img src="front/assets/img/empty-cart.png" width="200" alt="There are          no products in the cart. Shopping now!"></a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                    <p>There are no products in the cart. Shopping now!</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--mini cart end-->


                                </div>
                                <div class="header_account-list top_links">
                                    <a href="{{url('/')}}"><i class="icon-users"></i></a>

                                    <ul class="dropdown_links">
                                        <li>
                                            @if(Auth::check())
                                                    <a href="{{ route('users.edit', ['user' => Auth::user()]) }}">Hello, {{ Auth::user()->FullName }} ^-^</a>
                                                    @if( Auth::user()->role === 'admin')
                                                        <a href="{{ route('admin.dashbroad.index') }}">Dashboard</a>
                                                    @endif
                                                    <a href="{{ route('logout') }}">Logout</a>
                                                @else
                                                    <a href="{{ route('login.form') }}">Login</a>
                                                    <a href="{{ route('register.form') }}">Register</a>
                                                @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">Categories</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <li><a href="{{ route('category.bonsai')}}">Bonsai</a></li>
                                    <li><a href="{{ route('category.indoor-plants') }}">Indoor Plants</a></li>
                                    <li><a href="{{ route('category.outdoor-plants') }}">Outdoor Plants</a></li>
                                    <li><a href="{{ route('category.tools') }}">Tools</a></li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--main menu start-->
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    {{--                                    Start Home Page--}}
                                    <li>
                                        <a href="{{url('/')}}">home</a>
                                    </li>
                                    {{--                                    End Home Page--}}

                                    {{--                               Star Shop Page--}}
                                    <li class="mega_items">
                                        <a href="{{route('product.index')}}">product</a>
                                    </li>
                                    {{--                                    End Shop Page--}}

                                    <!-- {{--                               Star Blog Page--}} -->

                                    <li>
                                        <a href="{{url("/blog")}}">blog</a>
                                    </li>
                                    <!--                            End Shop Page-->

                                    <li>
                                    <a href="{{url('/about')}}">About Us </a>
                                    </li>
                                    <li><a href="{{url('/contact')}}"> Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="call-support">
                            <p>Call Support: <a href="tel:0123456789">0123456789</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--header area end-->
{{-- End Header Computer--}}

{{--body here--}}
@yield('body')


<!--footer area start-->
<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="widgets_container widget_app">
                        <div class="footer_logo">
                            <a href="{{url('/')}}"><img src="https://res.cloudinary.com/dx2o9ki2g/image/upload/v1698238484/gsuwxjg7gfnhs4fgrxsd.jpg

" alt="Plant Nest"></a>
                        </div>
                        <div class="footer_widgetnav_menu">
                            <ul>
                                <li>Affiliates</li>
                                <li><a href="{{url('/contact')}}">Contact</a></li>
                                <li>Internet</li>
                            </ul>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https: //www.facebook.com/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="https: //www.facebook.com/"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="https: //www.facebook.com/"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="footer_app">
                            <ul>
                                <li><a href="#!"><img src="front/assets/img/icon/icon-app.jpg" alt="App Store"></a></li>
                                <li><a href="#!"><img src="front/assets/img/icon/icon1-app.jpg" alt="Play Store"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container contact_us">
                        <h3>Opening Time</h3>
                        <p><span>Mon - Fri:</span> 8AM - 10PM</p>
                        <p><span>Sat:</span> 9AM-8PM</p>
                        <p><span>Suns:</span> 14hPM-18hPM</p>
                        <p><b>We Work All The Holidays</b></p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{url('/homeUser')}}">Home</a></li>
                                <li><a href="{{url('/user/products')}}">Product</a></li>
                                <li><a href="{{url('/about')}}">About Us</a></li>
                                <li><a href="{{url('/contact')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="{{url("/account")}}">My Account</a></li>
                                <li><a href="{{url("/cart")}}">Shopping cart</a></li>
                                <li><a href="{{url("/checkout")}}">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Customer Service</h3>
                        <div class="footer_menu">
                            <ul>
                                <li><a href="#!">Terms of use</a></li>
                                <li><a href="#!">Privacy Policy</a></li>
                                <li><a href="{{url("/contact")}}">Site Map</a></li>
                                <li><a href="#!">Returns</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p class="copyright-text">&copy; 2023 <a href="{{url('/homeUser')}}">Plants</a>. Made with <i
                                class="fa fa-heart text-danger"></i> by <a href="/" target="_blank">Plant_G-141</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment">
                        <a href="#!"><img src="front/assets/img/icon/payment.png" alt="Payment methods"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer area end-->

<!--jquery min js-->
<script src="front/assets/js/vendor/jquery-3.4.1.min.js"></script>
<!--popper min js-->
<script src="front/assets/js/popper.js"></script>
<!--bootstrap min js-->
<script src="front/assets/js/bootstrap.min.js"></script>
<!--owl carousel min js-->
<script src="front/assets/js/owl.carousel.min.js"></script>
<!--slick min js-->
<script src="front/assets/js/slick.min.js"></script>
<!--magnific popup min js-->
<script src="front/assets/js/jquery.magnific-popup.min.js"></script>
<!--counterup min js-->
<script src="front/assets/js/jquery.counterup.min.js"></script>
<!--jquery countdown min js-->
<script src="front/assets/js/jquery.countdown.js"></script>
<!--jquery ui min js-->
<script src="front/assets/js/jquery.ui.js"></script>
<!--jquery elevatezoom min js-->
<script src="front/assets/js/jquery.elevatezoom.js"></script>
<!--isotope packaged min js-->
<script src="front/assets/js/isotope.pkgd.min.js"></script>
<!--slinky menu js-->
<script src="front/assets/js/slinky.menu.js"></script>
<!-- Plugins JS -->
<script src="front/assets/js/plugins.js"></script>
<script src="front/assets/js/jquery.slicknav.js"></script>
<script src="front/assets/js/jquery-ui.min.js"></script>

<!-- Main JS -->
<script src="front/assets/js/main.js"></script>

<!--Shipping -->
<script src="front/assets/js/shipping.js"></script>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

</body>
</html>
