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
    <link rel="shortcut icon" type="image/x-icon" href="front/assets/img/favicon.ico">

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

    .dashboard-section {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.dashboard-content {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
}
.dashboard-item {
    background-color: #f2f2f2;
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
    flex-basis: calc(33.33% - 20px);
}

.dashboard-item h3 {
    font-size: 25px;
    font-weight: bold;
    margin-bottom: 10px;
    color: #333;
}

.dashboard-item .blue-text{
    font-size: 16px;
    font-weight: bold;
    margin: 5px 0;
    color: blue;
}
.dashboard-item .red-text{
    font-weight: bold;
    font-size: 16px;
    margin: 5px 0;
    color: red;
}
.dashboard-item .green-text{
    font-size: 16px;
    margin: 5px 0;
    color: green;
    font-weight: bold;

}
    </style>

</head>
<body>

<div class="pre-load">
    <div class="loader-web"></div>
</div>
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>Dash Broad</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Dash Broad</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container1">
    <!-- Phần Dashboard -->
    <section class="dashboard-section">
        <div class="dashboard-content">
            <div class="dashboard-item">
                <h3>Revenue of the Day</h3>
                <p class="green-text">{{ $dashboardData['countOrderInDay'] }} OrderInDay</p>
                <p>{{ $dashboardData['totalPriceInDay'] }} $</p>
            </div>
            <div class="dashboard-item">
                <h3>Revenue for the Week</h3>
                <p class="blue-text">{{ $dashboardData['countOrderInWeek'] }} OrderInWeek</p>
                <p>{{ $dashboardData['totalPriceInWeek'] }} $</p>
            </div>
            <div class="dashboard-item">
                <h3>Revenue for the Monthe</h3>
                <p class="red-text">{{ $dashboardData['countOrderInMonth'] }} OrderInMonth</p>
                <p>{{ $dashboardData['totalPriceInMonth'] }} $</p>
            </div>
        </div>
    </section>
{{--body here--}}
@yield('body')



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
