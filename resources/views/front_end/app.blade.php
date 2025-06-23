<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Ventix - Personal Portfolio Template">

    <!-- ========== Page Title ========== -->
    <title>Ventix - Personal Portfolio Template</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('assets/front_end/img/favicon.png') }}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('assets/front_end/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front_end/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front_end/css/flaticon-set.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front_end/css/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front_end/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front_end/css/validnavs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front_end/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front_end/css/unit-test.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/front_end/css/style.css') }}" rel="stylesheet">
    <!-- ========== End Stylesheet ========== -->
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->
</head>

<body class="bg-dark bg-fixed onepage-version" style="background-image: url({{ asset('assets/front_end/img/shape/banner-1.png') }});">

<!-- Start Preloader-->
<div id="preloader">
    <div id="ventix-preloader" class="ventix-preloader">
        <div class="animation-preloader">
            <div class="spinner"></div>
        </div>
        <div class="loader">
            <div class="row">
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-left">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
                <div class="col-3 loader-section section-right">
                    <div class="bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Preloader -->


<!-- Header-->
<header>
    <!-- Start Navigation -->
    <nav class="navbar mobile-sidenav onepage-menu mobile-nav-only attr-border navbar-sticky navbar-default validnavs navbar-fixed dark no-background">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="assets/img/logo-light.png" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <img src="assets/img/logo-light.png" alt="Logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>

                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li>
                        <a class="smooth-menu" href="#home">Home</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#about">About</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#portfolio">Portfolio</a>
                    </li>
                    <li>
                        <a class="smooth-menu" href="#contact">contact</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->

            <!-- Main Nav -->
        </div>
        <!-- Overlay screen for menu -->
        <div class="overlay-screen"></div>
        <!-- End Overlay screen for menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Header -->

@yield('content')

<!-- jQuery Frameworks
============================================= -->
<script src="{{ asset('assets/front_end/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/jquery.appear.js') }}"></script>
<script src="{{ asset('assets/front_end/js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/progress-bar.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/circle-progress.js') }}"></script>
<script src="{{ asset('assets/front_end/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/count-to.js') }}"></script>
<script src="{{ asset('assets/front_end/js/jquery.scrolla.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/ScrollOnReveal.js') }}"></script>
<script src="{{ asset('assets/front_end/js/YTPlayer.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/validnavs.js') }}"></script>
<script src="{{ asset('assets/front_end/js/gsap.js') }}"></script>
<script src="{{ asset('assets/front_end/js/typed.js') }}"></script>
<script src="{{ asset('assets/front_end/js/TweenMax.min.js') }}"></script>
<script src="{{ asset('assets/front_end/js/main.js') }}"></script>

</body>

</html>





