@if(!auth()->guard()->check() && !auth()->guard('buyer')->check())
    @php $bib = 'bib' @endphp
    <header class="mb-lg-5">

        <div class="container-fluid">
            <div class="top-header">
                <div class="row d-flex  justify-content-between res-p">
                    <div class="">
                        <nav class="navbar navbar-expand-lg navbar-light position-relative shadow-none mb-0">
                            <ul class="navbar-nav  text-white">

                                <li class="font-16">
                                    <i class=" ti-headphone-alt  p-2"></i>

                                    تلفن: ۶۷ ۷۳ ۲۸۴۳-۰۲۱
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="">
                        <nav class="navbar navbar-expand-lg navbar-light position-relative shadow-none mb-0">
                            <ul class="navbar-nav  text-white w-100">

                                {{--                                <li class="w-100 font-16">--}}
                                {{--                                    <i class="ti-location-pin p-2"></i>--}}
                                {{--                                    آدرس : تهران، طرشت، بلوار شهید تیموری، پژوهشکده علوم و فناوری شریف پلاک ۱۷۳--}}

                                {{--                                </li>--}}
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
                                                <li class="nav-item"><a class="nav-link" href="{{route('shop')}}">فروشگاه
                                                        ها</a></li>
                                                <li class="nav-item"><a class="nav-link" href="{{route('rules')}}">قوانین
                                                        و مقررات</a></li>
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
            padding: 12px 15px;
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
                float: none !important;
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