<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <meta name="theme-color" content="#5851db" >
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>::دستیار فروش شرخر :: خانه</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}"/>
    @yield('styles')

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('assets/images/loader.svg')}}" width="48" height="48"
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
    <header class="navbar navbar-expand navbar-dark flex-column flex-md-row bd-navbar">
        <ul class="navbar-nav flex-row ml-md-auto ">
            <li class="nav-item ">
                <a class="navbar-brand mr-0 mr-md-2 p-0 m-0" href="/" aria-label="sharkhar">
                    <title>sharkhar</title><img src="{{asset('assets/images/logo.png')}}" width="36" height="36" class="d-block" alt="">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('home')}}" >
                    دستیار فروش شرخر
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{route('shop')}}" >
                    فروشگاه ها
                </a>
            </li>

        </ul>

        <div class="navbar-nav-scroll">
            <ul class="navbar-nav bd-navbar-nav flex-row">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">درامد زایی فروشنده</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register_buyer')}}">خرید امن شما !</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        ورژن: 0.3702
                    </a>
                </li>
            </ul>
        </div>




    </header>
@else
    @include('layouts.seller_includes.right_sidabar')
@endif

<!-- Main Content -->


<section class="content {{isset($bib) ? $bib : ''}}">
    @if(!isset($hide))
        <div class="container">
            <div class="row clearfix bread-crumb">

                <div class="col-lg-7 col-md-6 col-sm-12">
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
<div class="toTop">
    <a href="#"><i class="zmdi zmdi-long-arrow-up"></i></a>
</div>


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
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-B3RQ6EQG0M');
</script>

</body>

</html>