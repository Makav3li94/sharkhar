<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <!-- Title -->
    <meta name="description" content="                     دیگه نگران مشتری هایی که نمی تونن به فروشگاه های انلاین اعتماد کنن نباشید ! چون دستیار فروش شرخر کار اعتماد سازیتون رو انجام میده
                                 و باعث افزایش فروشتون تا 70 درصد میشه. بیا تو :)">
    <meta name="keywords"
          content="شرخر, دستیار فروش شرخر, دستیار فروش آنلاین,دستیار فروش ,اینستا گرام, پیج فروشگاهی, فروشگاه انلاین, دستیار فروش اینستاگرام">
    <meta name="author" content="Parham Akbari">
    <meta name="theme-color" content="#7f4ee0">
    <title>دستیار فروش شرخر: خرید امن، فروش آسان</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/images/fav.png')}}">

    <!-- Core Stylesheet -->
    <link href="{{asset('front/style.css')}}" rel="stylesheet">
    <script src="https://www.p30rank.ir/google"></script>
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
@include('header')
<!-- ***** Header Area End ***** -->
@yield('content')


@include('login-modal')

@include('footer')
<!-- ***** Footer Area Start ***** -->

<!-- ***** Footer Area Start ***** -->
<script src="{{asset('front/js/jquery-2.2.4.min.js')}}"></script>

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
<script src="{{asset('assets/plugins/countdown/jquery.countdown.min.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B3RQ6EQG0M"></script>
<script>
    @if($errors->has('mobile') || $errors->has('password'))
    $('#colorModal').modal('show');
    @endif

    $(document).ready(function () {
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-B3RQ6EQG0M');
    })

    function loadDeferredIframe() {
        // this function will load the Google homepage into the iframe
        var iframe = document.getElementById("my-deferred-iframe");
        iframe.src = "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.605859596771!2d51.34522911561607!3d35.71131558018737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e07555a0b72ab%3A0x66e6d9605cee51f4!2sSharif%20Energy%20Research%20Institute!5e0!3m2!1sen!2sua!4v1603650460553!5m2!1sen!2sua" // here goes your url
    };
    window.onload = loadDeferredIframe;
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqExwgWihRNtMSI8lIi3WnCmh4hQ8IJEA&callback=initMap&libraries=&v=weekly"
        defer
></script>

</body>


</html>
