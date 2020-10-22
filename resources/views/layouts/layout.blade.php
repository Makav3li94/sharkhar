<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
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
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @yield('styles')
</head>

<body class="theme-blush">

@yield('content')



<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
@yield('scripts')
</body>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', ' G-B3RQ6EQG0M ', 'auto');
    ga('send', 'pageview');

</script>
</html>