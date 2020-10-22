<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Ashekur Rahman">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Appy App Landing Template.</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="{{asset('shop/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('shop/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{asset('shop/css/animate.css')}}">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="{{asset('shop/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('shop/style.css')}}">
    <link rel="stylesheet" href="{{asset('shop/css/responsive.css')}}">
    <script src="{{asset('shop/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    @yield('styles')
    <!--[if lt IE 9]>
    <![endif]-->
</head>

<body data-spy="scroll" data-target=".mainmenu-area">
<!-- Preloader-content -->
<div class="preloader">
    <span><i class="lnr lnr-sun"></i></span>
</div>
<!-- MainMenu-Area -->
<nav class="mainmenu-area" data-spy="affix" data-offset-top="200">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#primary_menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="Logo"></a>
        </div>
        <div class="collapse navbar-collapse" id="primary_menu">
            <ul class="nav navbar-nav mainmenu">
                <li><a href="index.html#home_page">Home</a></li>
                <li><a href="index.html#about_page">About</a></li>
                <li><a href="index.html#features_page">Features</a></li>
                <li><a href="index.html#gallery_page">Gallery</a></li>
                <li><a href="index.html#price_page">Pricing</a></li>
                <li><a href="index.html#questions_page">FAQ</a></li>
                <li class="active"><a href="blog.html">Blog</a></li>
                <li><a href="index.html#contact_page">Contacts</a></li>
            </ul>
            <div class="right-button hidden-xs">
                <a href="#">Sign Up</a>
            </div>
        </div>
    </div>
</nav>
<!-- MainMenu-Area-End -->

<header class="site-header">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="white-color">Out Latest Blog</h1>
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <article class="post-single sticky">
                    <figure class="post-media">
                        <img src="images/sticky-image.jpg" alt="">
                    </figure>
                    <div class="post-body">
                        <div class="post-meta">
                            <div class="post-tags"><a href="#">People</a></div>
                            <div class="post-date">01.02.2017</div>
                        </div>
                        <h4 class="dark-color"><a href="single.html">5 tips for those, who need to make more room in their closet</a></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiing elit, sed do eiusmod tempor incididunt ut labore et laborused sed do eiusmod tempor incididunt ut labore et laborused.</p>
                        <a href="single.html" class="read-more">View Article</a>
                    </div>
                </article>
                <div class="space-100"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <article class="post-single">
                    <figure class="post-media">
                        <img src="images/blog-1.jpg" alt="">
                    </figure>
                    <div class="post-body">
                        <div class="post-meta">
                            <div class="post-tags"><a href="#">People</a></div>
                            <div class="post-date">01.02.2017</div>
                        </div>
                        <h4 class="dark-color"><a href="single.html">IOS 10: 8 Things we want froma pple iPhone8S</a></h4>
                        <a href="single.html" class="read-more">View Article</a>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <article class="post-single">
                    <figure class="post-media">
                        <img src="images/blog-2.jpg" alt="">
                    </figure>
                    <div class="post-body">
                        <div class="post-meta">
                            <div class="post-tags"><a href="#">People</a></div>
                            <div class="post-date">01.02.2017</div>
                        </div>
                        <h4 class="dark-color"><a href="single.html">Top destinations to escape from reality</a></h4>
                        <a href="single.html" class="read-more">View Article</a>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <article class="post-single">
                    <figure class="post-media">
                        <img src="images/blog-3.jpg" alt="">
                    </figure>
                    <div class="post-body">
                        <div class="post-meta">
                            <div class="post-tags"><a href="#">People</a></div>
                            <div class="post-date">01.02.2017</div>
                        </div>
                        <h4 class="dark-color"><a href="single.html">Five ways to wear a shirt by Victoria Beckha</a></h4>
                        <a href="single.html" class="read-more">View Article</a>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <article class="post-single">
                    <figure class="post-media">
                        <img src="images/blog-4.jpg" alt="">
                    </figure>
                    <div class="post-body">
                        <div class="post-meta">
                            <div class="post-tags"><a href="#">People</a></div>
                            <div class="post-date">01.02.2017</div>
                        </div>
                        <h4 class="dark-color"><a href="single.html">Use this exercise to solve any Product Design Challenge</a></h4>
                        <a href="single.html" class="read-more">View Article</a>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <article class="post-single">
                    <figure class="post-media">
                        <img src="images/blog-5.jpg" alt="">
                    </figure>
                    <div class="post-body">
                        <div class="post-meta">
                            <div class="post-tags"><a href="#">People</a></div>
                            <div class="post-date">01.02.2017</div>
                        </div>
                        <h4 class="dark-color"><a href="single.html">20 non-political reasons why Brexit is shit</a></h4>
                        <a href="single.html" class="read-more">View Article</a>
                    </div>
                </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <article class="post-single">
                    <figure class="post-media">
                        <img src="images/blog-6.jpg" alt="">
                    </figure>
                    <div class="post-body">
                        <div class="post-meta">
                            <div class="post-tags"><a href="#">People</a></div>
                            <div class="post-date">01.02.2017</div>
                        </div>
                        <h4 class="dark-color"><a href="single.html">Athleisure: What do Swedish people wear?</a></h4>
                        <a href="single.html" class="read-more">View Article</a>
                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="pagination">
                    <div class="nav-links">
                        <a href="#" class="prev page-numbers"><i class="lnr lnr-chevron-left"></i></a>
                        <a href="#" class="page-numbers">1</a>
                        <span class="page-numbers current">2</span>
                        <a href="#" class="page-numbers">3</a>
                        <a href="#" class="page-numbers">4</a>
                        <a href="#" class="page-numbers">5</a>
                        <a href="#" class="page-numbers">6</a>
                        <a href="#" class="next page-numbers"><i class="lnr lnr-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Subscribe-Form -->
@yield('content')
<!-- Subscribe-Form-Area -->
<!-- Footer-Area -->
<footer class="footer-area" id="contact_page">
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title text-center">
                        <h5 class="title">Contact US</h5>
                        <h3 class="dark-color">Find Us By Bellow Details</h3>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <span class="lnr lnr-map-marker"></span>
                        </div>
                        <p>8-54 Paya Lebar Square <br /> 60 Paya Lebar Roa SG, Singapore</p>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <span class="lnr lnr-phone-handset"></span>
                        </div>
                        <p>+65 93901336 <br /> +65 93901337</p>
                    </div>
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="footer-box">
                        <div class="box-icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <p>yourmail@gmail.com <br /> anothermai@hotmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-Bootom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-5">

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="lnr lnr-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></span>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="space-30 hidden visible-xs"></div>
                </div>
                <div class="col-xs-12 col-md-7">
                    <div class="footer-menu">
                        <ul>
                            <li class="active"><a href="index.html#home_page">Home</a></li>
                            <li><a href="index.html#about_page">About</a></li>
                            <li><a href="index.html#features_page">Features</a></li>
                            <li><a href="index.html#gallery_page">Gallery</a></li>
                            <li><a href="index.html#price_page">Pricing</a></li>
                            <li><a href="index.html#questions_page">FAQ</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="index.html#contact_page">Contacts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-Bootom-End -->
</footer>
<!-- Footer-Area-End -->
<!--Vendor-JS-->
<script src="{{asset('shop/js/vendor/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('shop/js/vendor/jquery-ui.js')}}"></script>
<script src="{{asset('shop/js/vendor/bootstrap.min.js')}}"></script>
<!--Plugin-JS-->
<script src="{{'shop/js/scrollUp.min.js'}}"></script>
<script src="{{asset('shop/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('shop/js/wow.min.js')}}"></script>
<!--Main-active-JS-->
<script src="{{asset('shop/js/main.js')}}"></script>
@yield('scripts')
</body>

</html>
