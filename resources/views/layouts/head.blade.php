<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="                     دیگه نگران مشتری هایی که نمی تونن به فروشگاه های انلاین اعتماد کنن نباشید ! چون دستیار فروش شرخر کار اعتماد سازیتون رو انجام میده
                                 و باعث افزایش فروشتون تا 70 درصد میشه. بیا تو :)">
    <meta name="keywords"
          content="شرخر, دستیار فروش شرخر, دستیار فروش آنلاین,دستیار فروش ,اینستا گرام, پیج فروشگاهی, فروشگاه انلاین, دستیار فروش اینستاگرام">
    <meta name="theme-color" content="#5851db">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @if(isset($b_level2))
            {{'دستیار فروش شرخر :: '.$b_level2 }}
        @elseif(isset($title))
            {{'دستیار فروش شرخر :: '.$title  }}
        @else
            ::دستیار فروش شرخر :: خانه
        @endif
    </title>
    <link rel="icon" href="{{asset('assets/images/fav.png')}}">

    @if(!auth()->guard('web')->check() && !auth()->guard('buyer')->check())



        <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
        <link href="{{asset('front/indor-style.css')}}" rel="stylesheet">
        <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
    @else
        <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
        <link rel="icon" href="{{asset('assets/images/fav.png')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/plugins/intro.js-master/introjs.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/plugins/intro.js-master/introjs-rtl.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/mine.css')}}">
@endif

@yield('styles')

<!-- Custom Css -->

</head>