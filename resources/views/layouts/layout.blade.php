<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="icon" href="{{asset('assets/images/fav.png')}}">
    <meta name="theme-color" content="#fff975" >
    <title>
        @if(request()->is('login/buyer'))
            ورود خریدار
        @elseif(request()->is('register/buyer'))
            ثبت نام خریدار
        @elseif(request()->is('login'))
            ورود فروشنده
        @elseif(request()->is('register'))
            ثبت نام فروشنده

        @elseif(request()->is('password/reset'))
            فراموشی رمز عبور
        @endif
    </title>
    <!-- Favicon-->
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    @yield('styles')
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body class="theme-blush">

@yield('content')



<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
@yield('scripts')
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