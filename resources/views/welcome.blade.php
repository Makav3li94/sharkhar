<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>پلتفرم شرخر - دستیار فروش شما !</title>

    <!-- Favicon -->
{{--    <link rel="icon" href="img/core-img/favicon.ico">--}}

    <!-- Core Stylesheet -->
    <link href="{{asset('front/style.css')}}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<!-- Preloader Start -->
<div id="preloader">
    <div class="colorlib-load"></div>
</div>

<!-- ***** Header Area Start ***** -->
<header class="header_area animated ">
    <div class="container-fluid">
        <div class="row align-items-center">
            <!-- Menu Area Start -->
            <!-- Signup btn -->
            <div class="col-12 col-lg-4">
                <div class="sing-up-button">
                    @if(auth()->guard('web')->check())
                        <a href="{{route('login')}}">ورود به پلتفرم</a>
                        @else
                        <a href="{{route('register')}}">ثبت نام فروشنده</a>
                    @endif


                </div>
                <div class="sing-up-button">
                    @if(auth()->guard('buyer')->check())
                        <a href="{{route('register_buyer')}}">ورود به پلتفرم</a>
                    @else
                        <a href="{{route('register_buyer')}}">ثبت نام خریدار</a>
                    @endif

                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="menu_area">
                    <nav class="navbar navbar-expand-lg navbar-light">

                        <div class="collapse navbar-collapse" id="ca-navbar" style="direction: rtl">
                            <ul class="navbar-nav ml-auto" id="nav">
                                <li class="nav-item "><a href="{{route('home')}}" class="nav-link" >خانه</a></li>
                                <li class="nav-item"><a href="{{route('shop')}}" class="nav-link" >فروشگاه</a></li>
                                <li class="nav-item"><a class="nav-link" href="#about">درباره ما</a></li>
                                <li class="nav-item"><a class="nav-link" href="#features">امکانات</a></li>
                            </ul>
                            <div class="sing-up-button d-lg-none">
                                <a href="{{route('register')}}">ثبت نام رایگان</a>
                            </div>
                        </div>

                        <!-- Logo -->
                        <a class="navbar-brand" href="{{route('home')}}">شَرخَر</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ca-navbar" aria-controls="ca-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <!-- Menu Area -->
                    </nav>
                </div>
            </div>

        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
@yield('content')


<!-- ***** Footer Area Start ***** -->
<footer class="text-center pt-lg-5 pb-0 clearfix">
    <!-- footer logo -->
    <div class="footer-text">
        <h2>شرخر</h2>
    </div>
    <!-- social icon-->

    <div class="footer-menu">
        <nav>
            <ul>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">قوانین &amp; مقررات</a></li>
                <li><a href="#">تماس با ما</a></li>
            </ul>
        </nav>
    </div>
    <!-- Foooter Text-->
    <div class="copyright-text ">
        <p class="text-center">Copyright ©2020 شرخر. طراحی توسط <a rel="nofollow" href="https://parnasite.com" target="_blank">Parna</a></p>
    </div>
</footer>
<!-- ***** Footer Area Start ***** -->

<!-- Jquery-2.2.4 JS -->
@yield('scripts')

<!-- Popper js -->
<script src="{{asset('front/js/popper.min.js')}}"></script>
<!-- Bootstrap-4 Beta JS -->
<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
<!-- All Plugins JS -->
<script src="{{asset('front/js/plugins.js')}}"></script>
<!-- Slick Slider Js-->
<script src="{{asset('front/js/slick.min.js')}}"></script>
<!-- Footer Reveal JS -->
<script src="{{asset('front/js/footer-reveal.min.js')}}"></script>
<!-- Active JS -->
<script src="{{asset('front/js/active.js')}}"></script>

</body>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B3RQ6EQG0M"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-B3RQ6EQG0M');
</script>
</html>
