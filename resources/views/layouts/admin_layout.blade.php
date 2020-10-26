<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="theme-color" content="#5851db">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>::دستیار فروش شرخر :: خانه</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
    <link rel="icon" href="{{asset('assets/images/fav.png')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/intro.js-master/introjs.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/intro.js-master/introjs-rtl.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/mine.css')}}">
@yield('styles')

<!-- Custom Css -->

</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('assets/images/logo-p.png')}}" width="48" height="48"
                                 alt="Sharkhar"></div>
        <p>لطفا صبر کنید...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
        <input type="search" value="" placeholder="جستجو..."/>
        <button type="submit" class="btn btn-primary">جستجو</button>
    </form>
</div>


<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">درحال بارگذاری فروشگاه شما</h4>
            </div>
            <div class="modal-body">
                الگوریتم شرخر در حال جمع آوری اطلاعات و بارگذاری فروشگاه شما می باشد. <br>
                این پروسه 60 ثانیه طول خواهد کشید. <br>
                شرخر در حال حاضر روی <strong class="text-danger">پیج پابلیک</strong> کار میکنه :| <br>
                اگر پیجتون پرایویته خودتون باید محصولات رو وارد کنید.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
<!-- Right Icon menu Sidebar -->
{{--@include('layouts.seller_includes.left_sidebar')--}}
@if(!auth()->guard()->check() && !auth()->guard('buyer')->check())
    @php $bib = 'bib' @endphp
    <header class="mb-lg-5">

        <div class="container-fluid">
            <div class="top-header">
                <div class="row d-flex  justify-content-between res-p">
                    <div class="p-2 ">
                        <nav class="navbar navbar-expand-lg navbar-light position-relative shadow-none mb-0">
                            <ul class="navbar-nav  text-white">

                                <li class="font-16">
                                    <i class=" ti-headphone-alt  p-2"></i>

                                    تلفن: ۶۷ ۷۳ ۲۸۴۳-۰۲۱
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="p-2 ">
                        <nav class="navbar navbar-expand-lg navbar-light position-relative shadow-none mb-0">
                            <ul class="navbar-nav  text-white w-100">

                                <li class="w-100 font-16">
                                    <i class="ti-location-pin p-2"></i>
                                    آدرس : تهران، طرشت، بلوار شهید تیموری، پژوهشکده علوم و فناوری شریف پلاک ۱۷۳

                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>
                <hr class="" style="border-top: 1px solid #fffacc;margin-bottom: 5px">
            </div>
            <div class="main-header  ">
                <div class="row d-flex  justify-content-between">
                    <div class="p-2 ">
                        <div class="menu_area">
                            <nav class="navbar navbar-expand-lg navbar-light p-0 position-relative shadow-none mb-0">
                                <div class="d-flex  justify-content-end">
                                    <div class="p-2">
                                        <a class="navbar-brand p-0 m-0" href="{{route('home')}}">
                                            <img src="{{asset('front/img/logo-w.png')}}" width="80px" alt="شرخر">
                                        </a>
                                    </div>


                                    <div class="p-2">
                                        <div class="collapse navbar-collapse" id="ca-navbar">
                                            <ul class="navbar-nav ml-auto " id="nav">
                                                <li class="nav-item "><a href="{{route('home')}}"
                                                                         class="nav-link">خانه</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link font-16"
                                                                        href="#about">درباره</a></li>
                                                <li class="nav-item"><a class="nav-link font-16"
                                                                        href="#pricing">تعرفه</a></li>
                                                <li class="nav-item"><a class="nav-link font-16" href="#features">امکانات</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link font-16" href="#contact">تماس با
                                                        ما</a></li>
                                                <li class="nav-item"><a class="nav-link font-16" href="">بلاگ</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="sing-up-button d-flex justify-content-start">
                            @if(auth()->guard('buyer')->check())
                                <div class="p-2">
                                    <div class="sing-up-button ">

                                        <a href="{{route('register_buyer')}}">ورود به پلتفرم</a>

                                    </div>
                                </div>
                            @else

                            @endif
                            <div class="p-2">
                                <div class="sing-up-button ">
                                    @if(auth()->guard('web')->check())
                                        <a href="{{route('login')}}">ورود به پلتفرم</a>
                                    @else
                                        <a href="{{route('register')}}" data-toggle="modal" data-target="#colorModal">ورود
                                            /
                                            ثبت
                                            نام </a>
                                    @endif


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </header>
    <style>


        header {
            background-color: #833ab4;
        }

        header .navbar {
            min-height: inherit;
        }

        header .navbar .navbar-nav .nav-link:not(.btn) {
            font-size: .8842em;
        }

        header {
            left: 0;
            /*position: absolute;*/
            width: 100%;
            z-index: 99;
            /*top: 0;*/
            padding: 0 4%;
            padding-top: 15px;
        }

        .menu_area #nav .nav-link {
            color: #fff;
            display: block;
            font-size: 16px;
            font-weight: 500;
            border-radius: 30px;
            -webkit-transition-duration: 500ms;
            -o-transition-duration: 500ms;
            transition-duration: 500ms;
            padding: 15px 15px;
        }

        .menu_area nav ul li > a:hover {
            color: #e1306c;
        }

        .sing-up-button {
            text-align: right;
            width: auto;
        }

        .sing-up-button > a {
            color: #fff;
            font-weight: 500;
            display: inline-block;
            border: 2px solid #a883e9;
            height: 50px;
            min-width: 110px;
            line-height: 46px;
            text-align: center;
            border-radius: 24px 24px 24px 24px;
            font-size: 0.8rem;
        }

        .sing-up-button > a:hover {
            background: #e1306c;
            color: #fff;
            border-color: transparent;
            -webkit-transition-duration: 500ms;
            -o-transition-duration: 500ms;
            transition-duration: 500ms;
        }

        .header_area .menu_area #nav .nav-link {
            padding: 23px 15px;
        }

        section.content .breadcrumb {

            background-color: #fafafa !important;

        }

        .login-button {
            background-color: #e1306c;
            color: #fff;
            font-weight: 200;
            display: inline-block;
            border: none;
            height: 40px;
            min-width: 100px;
            line-height: 26px;
            text-align: center;
            border-radius: 24px 24px 24px 24px;
            margin: 5px auto;
            cursor: pointer;
        }

        .new-button {
            background-color: #405de6;
            color: #fff !important;
            font-weight: 200;
            display: inline-block;
            border: none;
            height: 40px;
            min-width: 115px;
            line-height: 37px;
            text-align: center;
            border-radius: 24px 24px 24px 24px;
            margin: 5px auto;
            cursor: pointer;
        }

        header .top-header .menu_area .nav-bar {
            position: relative !important;
        }


        .modal-body {
            margin: 15px 20px;
            padding: 0;
        }

        .modal-dialog {
            max-width: 400px;
            margin: 8.75rem 0 0 3rem;
            float: left;
        }

        .modal-content .modal-header button {
            position: absolute;
            right: auto !important;
            left: 27px !important;
            outline: 0;
        }

        .modal-header {
            padding: 1rem 1rem !important;
            border-bottom: 1px solid #e9ecef !important;
            border-top-left-radius: .3rem !important;
            border-top-right-radius: .3rem !important;
        }

        .modal-body input::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: #726a84;
            opacity: 1; /* Firefox */
        }

        @media (min-width: 320px) and (max-width: 767px) {

            .modal-dialog {
                max-width: 350px !important;
                margin: 10rem auto !important;
                float: none!important;
            }
        }
    </style>
    <div class="modal fade" id="colorModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="direction: rtl">
                <div class="modal-header text-center" style="background-color: #e1306c;">
                    <h4 class="title  text-white " id="defaultModalLabel">ورود یا ثبت نام</h4>
                    <button type="button" class="btn bg-transparent btn-sm btn-round text-white" data-dismiss="modal"><i
                                class="ti-close"></i></button>

                </div>
                <div class="modal-body" style="color: #726a84">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text">  <i class="ti-mobile"></i></span>
                            </div>
                            <input type="text" name="mobile" class="form-control" tabindex="1"
                                   placeholder="شماره موبایل "
                                   value="{{old('mobile')}}" oninput="setCustomValidity('')"
                                   oninvalid="this.setCustomValidity('لطفا شماره تلفن را وارد کنید')" required>

                            @if($errors->has('mobile'))
                                <small class="text-danger d-inline-block w-100  mt-2">
                                    {{$errors->first('mobile')}}
                                </small>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                    <span class="input-group-text" style="padding: .325rem .75rem;">
                                        <a href="{{url('password/reset')}}" class="forgot " title="فراموشی رمز عبور">
                                            <i class="ti-lock"></i>
                                        </a>
                                    </span>
                            </div>
                            <input type="password" name="password" tabindex="2" class="form-control"
                                   placeholder="رمزعبور"
                                   oninput="setCustomValidity('')"
                                   oninvalid="this.setCustomValidity('لطفا رمز عبور را وارد کنید')" required>

                            @if($errors->has('password'))
                                <small class="text-danger d-inline-block w-100  mt-2">
                                    {{$errors->first('password')}}
                                </small>
                            @endif
                        </div>
                        <input type="checkbox" name="remember" checked class="d-none" id="remember_me">

                        <div class="input-group text-center d-flex">
                            <button type="submit" class="submit login-button ml-auto" tabindex="3">ورود</button>
                            <a href="{{route('register')}}" type="button" class=" new-button " tabindex="4">حساب
                                جدید</a>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <script>
        @if($errors->has('mobile') || $errors->has('password'))
        $('#colorModal').modal('show');
        @endif
    </script>
@else
    @include('layouts.seller_includes.right_sidabar')
@endif

<!-- Main Content -->


<section class="content {{isset($bib) ? $bib : ''}}">
    @if(!isset($hide))
        <div class="container">
            <div class="row clearfix bread-crumb">

                <div class="col-lg-7 col-md-6 col-sm-12"
                     @if(request()->is('seller/dashboard'))
                     data-step="1"
                     data-intro="در شرخر، شما برای فروش نیاز به ثبت شماره شِبا و ارسال لینک خرید برای مشتری دارید، همین. لطفا تا انتهای آموزش با من باشید."
                        @endif
                >
                    <h2>{{ ucfirst($title ?? '') }}</h2>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                @if(isset($back))
                    <div class="col-lg-5 col-md-6 col-sm-12 nono">
                        <a class="btn btn-primary float-right " href="{{url()->previous()}}">
                            بازگشت
                            <i class="zmdi zmdi-arrow-right"></i>
                        </a>
                    </div>
                @endif
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="breadcrumb" style="   background-color: #fafafa !important;">
                        <li class="breadcrumb-item">
                            <a href="
                       @if(auth()->guard('web')->check())
                            {{route('seller.dashboard')}}
                            @elseif(auth()->guard('buyer')->check())
                            {{route('buyer.dashboard')}}
                            @else
                            @endif">
                                <i class="zmdi zmdi-home"></i> شرخر</a>
                        </li>
                        @if(isset($b_level1))

                            <li class="breadcrumb-item">
                                <a href="{{url()->previous()}}">{{$b_level1}}</a>
                            </li>

                            <li class="breadcrumb-item active">{{$b_level2}}</li>
                        @else
                            <li class="breadcrumb-item active">{{$b_level2}}</li>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    @endif

    @if(!request()->is('seller/dashboard*') && !request()->is('buyer/dashboard*'))
        <div class="col-lg-12 col-md-12 col-sm-12 text-right soso none">
            <a class="btn btn-info btn-icon float-right  w-100 mb-3" href="{{url()->previous()}}">
                بازگشت
                <i class="zmdi zmdi-arrow-right"></i>
            </a>
        </div>
    @endif
    @yield('content')

</section>



@if(!auth()->guard()->check() && !auth()->guard('buyer')->check())
    @php $bib = 'bib' @endphp
    <footer class="text-center pt-3 pb-3 clearfix" style="font-size: 1rem!important;" >
        <div class="mb-4 mt-2 p-3">
            <img class=" overflow-hidden" src="{{asset('front/img/footer_logos.png')}}" alt="نماد ها">
        </div>

        <!-- footer logo -->
        <div class="footer-text">
            <img src="{{asset('assets/images/logo-p.png')}}" width="80px" alt="شرخر">
        </div>
        <!-- social icon-->

        <div class="footer-menu">
            <nav>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="ti-location-pin p-2"></i>
                        آدرس : تهران، طرشت، بلوار شهید تیموری، پژوهشکده علوم و فناوری شریف پلاک ۱۷۳
                    </li>
                    <li class="mb-2">
                        <i class=" ti-headphone-alt  p-2"></i>
                        تلفن: ۶۷ ۷۳ ۲۸۴۳-۰۲۱ - ۶۲ ۸۸ ۵۶۰۷-۰۲۱
                    </li>
                    <li>
                        <i class=" ti-email  p-2"></i>
                        sharkhar@info.net

                    </li>

                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text ">
            <p class="text-center">Copyright ©2020 شرخر. طراحی توسط <a rel="nofollow" href="https://parnasite.com"
                                                                       target="_blank">Parna</a></p>
        </div>
    </footer>
    <style>
        .footer-text {
            margin-bottom: 15px;
        }
    </style>
    <script>
        @if($errors->has('mobile') || $errors->has('password'))
        $('#colorModal').modal('show');
        @endif
    </script>
@endif
<div class="toTop">
    <a href="#"><i class="zmdi zmdi-long-arrow-up"></i></a>
</div>
<style>
    .toTop {
        bottom: 0;
        font-size: 24px;
        right: 30px;
        width: 50px;
        background-color: #5851db;
        color: #fff;
        text-align: center;
        height: 50px;
        line-height: 50px;
        position: fixed;
    }

    .toTop a {
        color: #fff;
    }
</style>
<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<!-- Bootstrap Notify Plugin Js -->
@yield('scripts')

<script src="{{asset('assets/js/pages/index.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.toTop').on('click', function (event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, 'slow');
        });
        @if(session('modal'))

        setTimeout(function () {
            $("#largeModal").modal('show');

        }, 3000);
                @endif

        var allowDismiss = true;
        @if(session()->has('success'))
        $.notify({
                message: "{{ session('success') }}"
            },
            {
                type: 'alert-success',
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 3000,
                placement: {
                    from: 'bottom',
                    align: 'left'
                },
                template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "" : "") + '" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
            });

        @endif

        @if(session()->has('error'))
        $.notify({
                message: "{{ session('error') }}"
            },
            {
                type: 'alert-danger',
                allow_dismiss: allowDismiss,
                newest_on_top: true,
                timer: 3000,
                placement: {
                    from: 'bottom',
                    align: 'left'
                },
                template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "" : "") + '" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
            });
        @endif


    });


</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B3RQ6EQG0M"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-B3RQ6EQG0M');


</script>
<script src="{{asset('assets/plugins/intro.js-master/introjs.js')}}"></script>
</body>

</html>