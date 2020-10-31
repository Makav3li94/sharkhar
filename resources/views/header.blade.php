<header class="header_area animated ">

    <div class="container-fluid">
        <div class="top-header">
            <div class="row d-flex justify-content-between ">
                <div class="">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <ul class="navbar-nav  text-white">

                            <li class="p-2 phone-link">
                                <a class="text-decoration-none text-white d-inline-block" onclick="$(this).css({'transform' : 'rotate('+ 360 +'deg)'})" href="javascript:void(0)">  <i class=" ti-headphone-alt  "></i></a>
                                پشتیبانی : ۶۷ ۷۳ ۲۸۴۳-۰۲۱
                            </li>
                        </ul>
                    </nav>
                </div>

                <div class="">
                    <div class="sing-up-button d-flex justify-content-start">

                        <div class="p-2">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <ul class="navbar-nav  text-white">
                                    <li>
                                        @if(auth()->guard('web')->check())

                                            <a class="text-decoration-none text-white login-link"
                                               href="{{route('login')}}">ورود به
                                                پلتفرم <i class=" ti-user text-white "></i> </a>
                                        @else
                                            <a class="text-decoration-none text-white login-link"
                                               href="{{route('register')}}"
                                               data-toggle="modal" data-target="#colorModal">ورود /
                                                ثبت نام
                                                <a class="text-decoration-none text-white d-inline-block" onclick="$(this).css({'transform' : 'rotate('+ 360 +'deg)'})" href="javascript:void(0)">  <i class=" ti-user  "></i></a>
                                            </a>
                                        @endif

                                    </li>
                                </ul>
                            </nav>

                        </div>
                        @if(auth()->guard('buyer')->check())
                            <div class="p-2">


                                <a class="text-decoration-none text-white login-link" href="{{route('login_buyer')}}">ورود
                                    به
                                    <i class=" ti-user "></i>پلتفرم</a>


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
        <hr class="m-0" style="border-top: 1px solid ;">

        <div class="main-header  ">
            <div class="row ">
                <!-- Menu Area Start -->
                <!-- Signup btn -->
                <div class="menu_area w-100">
                    <nav class="navbar navbar-expand-lg navbar-light p-0 w-100">
                        <div class="w-100 d-flex  justify-content-between p-2">

                            <div class="ml-auto p-2">
                                <a class="navbar-brand logo-link" href="{{route('home')}}">
                                    <img src="{{asset('front/img/logo-w.png')}}" width="50" alt="شرخر">
                                </a>
                            </div>

                            <div class=" p-t-2 ">
                                <div class="collapse navbar-collapse" id="ca-navbar">
                                    <ul class="navbar-nav ml-auto" id="nav">
                                        <li class="nav-item "><a href="{{route('home')}}" class="nav-link">خانه</a>
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="#about">درباره</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#pricing">تعرفه</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#features">امکانات</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact">تماس با ما</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{route('shop')}}">فروشگاه
                                                ها</a></li>
                                        <li class="nav-item "><a class="nav-link pl-0" href="{{route('rules')}}">قوانین و
                                                مقررات</a></li>
                                    </ul>

                                </div>
                            </div>
                            <div class=" p-2">
                                <button class="navbar-toggler " type="button" data-toggle="collapse"
                                        data-target="#ca-navbar"
                                        aria-controls="ca-navbar" aria-expanded="false"
                                        aria-label="Toggle navigation"><i class="ti ti-menu text-white"></i></button>
                            </div>

                        </div>
                    </nav>
                </div>


            </div>
        </div>

    </div>
</header>