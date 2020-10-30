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
    <meta name="description" content="دستیار فروش شرخر، خرید امن فروش آسان">
    <meta name="keywords" content="شرخر, دستیار فروش شرخر, دستیار فروش آنلاین,اینستا گرام, پیج فروشگاهی, فروشگاه انلاین">
    <meta name="author" content="Parham Akbari">
    <meta name="theme-color" content="#7f4ee0">
    <title>دستیار فروش شرخر، خرید امن فروش آسان</title>

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
<header class="header_area animated ">

    <div class="container-fluid">
        <div class="top-header">
            <div class="row d-flex  justify-content-between res-p">
                <div class="">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <ul class="navbar-nav  text-white">

                            <li>
                                <i class=" ti-headphone-alt  p-2"></i>

                                تلفن: ۶۷ ۷۳ ۲۸۴۳-۰۲۱
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <ul class="navbar-nav  text-white w-100">

{{--                            <li class="w-100 ">--}}
{{--                                <i class="ti-location-pin p-2"></i>--}}
{{--                                آدرس : تهران، طرشت، بلوار شهید تیموری، پژوهشکده علوم و فناوری شریف پلاک ۱۷۳--}}

{{--                            </li>--}}
                        </ul>
                    </nav>
                </div>


            </div>
            <hr class="" style="border-top: 1px solid #fffacc;margin-bottom: 5px">
        </div>

        <div class="main-header  ">
            <div class="row d-flex  justify-content-between">
                <!-- Menu Area Start -->
                <!-- Signup btn -->
                <div class="p-2 ">
                    <div class="menu_area">
                        <nav class="navbar navbar-expand-lg navbar-light p-0">
                            <div class="d-flex  justify-content-end">
                                <div class="p-2">
                                    <a class="navbar-brand" href="{{route('home')}}">
                                        <img src="{{asset('front/img/logo-w.png')}}" width="80px" alt="شرخر">
                                    </a>
                                </div>
                                <div class="p-2">
                                    <button class="navbar-toggler nono" type="button" data-toggle="collapse"
                                            data-target="#ca-navbar"
                                            aria-controls="ca-navbar" aria-expanded="false"
                                            aria-label="Toggle navigation"><span
                                                class="navbar-toggler-icon"></span></button>
                                </div>

                                <div class="p-2">
                                    <div class="collapse navbar-collapse" id="ca-navbar">
                                        <ul class="navbar-nav ml-auto" id="nav">
                                            <li class="nav-item "><a href="{{route('home')}}" class="nav-link">خانه</a>
                                            </li>
                                            <li class="nav-item"><a class="nav-link" href="#about">درباره</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#pricing">تعرفه</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#features">امکانات</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">تماس با ما</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('shop')}}">فروشگاه ها</a></li>
                                            <li class="nav-item"><a class="nav-link" href="{{route('rules')}}">قوانین و مقررات</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="p-2">
                    <div class="sing-up-button d-flex justify-content-start">

                        <div class="p-2">
                            <div class="sing-up-button ">
                                @if(auth()->guard('web')->check())
                                    <a href="{{route('login')}}">ورود به پلتفرم</a>
                                @else
                                    <a href="{{route('register')}}" data-toggle="modal" data-target="#colorModal">ورود /
                                        ثبت نام </a>
                                @endif


                            </div>
                        </div>
                        @if(auth()->guard('buyer')->check())
                            <div class="p-2">
                                <div class="sing-up-button ">

                                    <a href="{{route('login_buyer')}}">ورود به پلتفرم</a>

                                </div>
                            </div>
                        @else
                            {{--                            <div class="p-2">--}}
                            {{--                                <div class="sing-up-button ">--}}

                            {{--                                    <a href="{{route('register_buyer')}}">خریدار</a>--}}

                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
</header>
<!-- ***** Header Area End ***** -->
@yield('content')


<div class="modal fade" id="colorModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="direction: rtl">
            <div class="modal-header text-center" style="background-color: #e1306c;">
                <h4 class="title  text-white " id="defaultModalLabel">ورود یا ثبت نام</h4>
                <button type="button" class="btn  btn-sm btn-round text-white" data-dismiss="modal"><i
                            class="ti-close"></i></button>

            </div>
            <div class="modal-body" style="color: #726a84">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <span class="input-group-text">  <i class="ti-mobile"></i></span>
                        </div>
                        <input type="text" name="mobile" class="form-control" tabindex="1" placeholder="شماره موبایل "
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
                        <input type="password" name="password" tabindex="2" class="form-control" placeholder="رمزعبور"
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
                        <a href="{{route('register')}}" type="button" class=" new-button " tabindex="4">حساب جدید</a>

                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<!-- ***** Footer Area Start ***** -->
<footer class="text-center pt-lg-5 pb-5 clearfix" id="contact">
    <div class="mb-4 mt-2 p-3 ">
        <ul class="list-unstyled safety">
            <li class="mb-2">
                <a referrerpolicy="origin" target="_blank"
                   href="https://trustseal.enamad.ir/?id=185088&amp;Code=swGIr379CMXL5IJdyLDB"><img
                            referrerpolicy="origin" src="{{asset('assets/images/e-namad.png')}}" alt=""
                            style="cursor:pointer" id="swGIr379CMXL5IJdyLDB"></a>
            </li>

            <li class="mb-2">
                <img id='nbqeesgtjzpewlaonbqewlao' style='cursor:pointer'
                     onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=207424&p=uiwkobpdjyoeaodsuiwkaods", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                     alt='logo-samandehi' src='{{asset('assets/images/samandehi.png')}}'/>
            </li>

            <li class="mb-2">
                <img src="{{asset('assets/images/passargad.png')}}" alt="درگاه بانک پاسارگاد">
            </li>

            <li class="mb-2">
                <img src="{{asset('assets/images/ssk.png')}}" alt="دارای ssl">
            </li>
        </ul>

    </div>

    <div class="footer-menu footer-nav">
        <nav>
            <ul>
                <li class="mb-3">
                    <a href="{{route('SellBenefit')}}">
                        مزایای فروش در شرخر
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{route('sellerProtection')}}">
                        حمایت از فروشندگان
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{route('DisputeRules')}}" class="border-left-0">
                        قوانین مرتبط با اختلافات
                    </a>
                </li>
                <br>


                <li class="mb-3">
                    <a href="{{route('buyBenefit')}}">
                        مزایای خرید از شرخر
                    </a>
                </li>
                <li class="mb-3">
                    <a href="{{route('moneyBackGuarantee')}}" class="border-left-0">
                        ضمانت برگشت پول
                    </a>
                </li>

            </ul>
        </nav>
    </div>
    <!-- footer logo -->
    <div class="footer-logo mb-0 mt-2">
        <img src="{{asset('assets/images/logo-p.png')}}" width="80px" alt="شرخر">
    </div>
    <!-- social icon-->

    <div class="footer-menu">
        <nav>
            <ul>
                <li class="mb-3">
{{--                    <i class="ti-location-pin p-2"></i>--}}
{{--                    آدرس : تهران، طرشت، بلوار شهید تیموری، پژوهشکده علوم و فناوری شریف پلاک ۱۷۳--}}
                    <br>
                    <i class="ti-location-pin p-2"></i>
                    دفتر مرکزی: تهران، جیحون،کوچه ریاضی، پلاک ۲۶
                </li>
                <br>
                <li class="mb-3">
                    <i class=" ti-headphone-alt  p-2"></i>
                    تلفن: ۶۷ ۷۳ ۲۸۴۳-۰۲۱ - : ۶۲ ۸۸ ۵۶۰۷-۰۲۱
                </li>
                <br>
                <li>
                    sharkhar@info.net
                    <i class=" ti-email  p-2"></i>

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

{{--<script src="https://maps.google.com/maps/api/js?v=3&amp;sensor=false"></script> <!-- Google Maps API Js -->--}}
{{--<script src="https://maps.google.com/maps/api/js?v=3&key=AIzaSyCqExwgWihRNtMSI8lIi3WnCmh4hQ8IJEA&amp;&sensor=false"></script> <!-- Google Maps API Js -->--}}
{{--<script src="{{asset('assets/plugins/gmaps/gmaps.js')}}"></script> <!-- GMaps PLugin Js -->--}}
<script>
    // Note: This example requires that you consent to location sharing when
    // prompted by your browser. If you see the error "The Geolocation service
    // failed.", it means you probably did not give permission for the browser to
    // locate you.
    // let map, infoWindow;
    // function initMap() {
    //     map = new google.maps.Map(document.getElementById("map"), {
    //         center: {lat: 35.711438, lng: 51.347407},
    //         zoom: 8,
    //     });

    // map = new google.maps.Map(document.getElementById("map"), {
    //     center: {lat: 35.711438, lng: 51.347407},
    //     zoom: 6,
    // });
    // infoWindow = new google.maps.InfoWindow();
    // const locationButton = document.createElement("button");
    // locationButton.textContent = "Pan to Current Location";
    // locationButton.classList.add("custom-map-control-button");
    // map.controls[google.maps.ControlPosition.TOP_CENTER].push(
    //     locationButton
    // );
    // locationButton.addEventListener("click", () => {
    //     // Try HTML5 geolocation.
    //     if (navigator.geolocation) {
    //         navigator.geolocation.getCurrentPosition(
    //             (position) => {
    //                 const pos = {
    //                     lat: position.coords.latitude,
    //                     lng: position.coords.longitude,
    //                 };
    //                 infoWindow.setPosition(pos);
    //                 infoWindow.setContent("Location found.");
    //                 infoWindow.open(map);
    //                 map.setCenter(pos);
    //             },
    //             () => {
    //                 handleLocationError(true, infoWindow, map.getCenter());
    //             }
    //         );
    //     } else {
    //         // Browser doesn't support Geolocation
    //         handleLocationError(false, infoWindow, map.getCenter());
    //     }
    // });
    // }

</script>

</body>


</html>
