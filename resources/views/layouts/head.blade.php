<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- MINIFIED -->
    {!! \Artesaos\SEOTools\Facades\SEOTools::generate(true) !!}


    <meta name="theme-color" content="#5851db">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{asset('assets/images/fav.png')}}">

    @if(!auth()->guard('web')->check() && !auth()->guard('buyer')->check() && !auth()->guard('admin')->check())



        <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        @yield('styles')
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
        <link href="{{asset('front/indor-style.css')}}" rel="stylesheet">
        <link href="{{asset('front/css/responsive.css')}}" rel="stylesheet">
    @else

        <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
        <link rel="icon" href="{{asset('assets/images/fav.png')}}">
        <link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/plugins/intro.js-master/introjs.css')}}"/>
        <link rel="stylesheet" href="{{asset('assets/plugins/intro.js-master/introjs-rtl.css')}}"/>
        @yield('styles')
        <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/mine.css')}}">
@endif



<!-- Custom Css -->

</head>