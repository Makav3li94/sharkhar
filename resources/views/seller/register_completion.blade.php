@extends('layouts.layout')
@section('content')
    {{--    <div class="page-loader-wrapper">--}}
    {{--        <div class="loader">--}}
    {{--            <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('assets/images/loader.svg')}}" width="48" height="48" alt="Sharkhar"></div>--}}
    {{--            <p>لطفا صبر کنید...در حال ساخت فروشگاه شما با استفاده از پیج ایسنتاگرامتون هستیم.</p>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="{{route('register')}}" method="post">
                        @csrf
                        <div class="header">
                            <img src="{{asset('assets/images/logo-p.png')}}" width="80px" alt="شرخر">
                            <h5>ثبت نام</h5>
                            <span>عضویت جدید را ثبت کنید</span>
                        </div>
                        <div class="body">


                            <div class="input-group mb-3">
                                <input type="text" name="confirm_code" class="form-control"
                                       placeholder="کد تایید پیامکی"
                                       value="{{ old('confirm_code') }}" oninput="setCustomValidity('')"
                                       oninvalid="this.setCustomValidity('لطفا کد تایید را وارد کنید')" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-phone-setting"></i></span>
                                </div>
                                @if($errors->has('confirm_code'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('confirm_code')}}
                                    </small>
                                @endif

                            </div>
                            <p class="registerResend" style="text-align: right">کد نیومد؟
                                <a style="cursor: no-drop !important;opacity: 0.5;text-align: right"
                                   id="registerResend" onclick="resend('{{$mobile}}')" class="off text-info m-l-5">
                                    <b>ارسال مجدد</b>
                                </a>
                                <span id="countDown"></span>
                            </p>
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی"
                                       value="{{ old('name') }}" oninput="setCustomValidity('')"
                                       oninvalid="this.setCustomValidity('لطفا نام و نام خانوادگی را وارد کنید')"
                                       required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                                @if($errors->has('name'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>
{{--                            <div class="input-group mb-3">--}}
{{--                                <input type="text" name="m_code" class="form-control " placeholder="کد ملی"--}}
{{--                                       value="{{ old('m_code') }}" oninput="setCustomValidity('')"--}}
{{--                                       oninvalid="this.setCustomValidity('لطفا کد ملی را وارد کنید')" required>--}}
{{--                                <div class="input-group-append">--}}
{{--                                    <span class="input-group-text"><i class="zmdi zmdi-account-add"></i></span>--}}
{{--                                </div>--}}
{{--                                @if($errors->has('m_code'))--}}
{{--                                    <small class="text-danger d-inline-block w-100  mt-2">--}}
{{--                                        {{$errors->first('m_code')}}--}}
{{--                                    </small>--}}
{{--                                @endif--}}
{{--                            </div>--}}

                            <div class="input-group mb-3">
                                <input type="text" name="mobile" class="form-control" placeholder="شماره موبایل"
                                       value="{{ isset($mobile) ? $mobile : old('mobile') }}"
                                       oninput="setCustomValidity('')"
                                       oninvalid="this.setCustomValidity('لطفا شماره موبایل را وارد کنید')"
                                       required {{isset($mobile) ? 'readonly' : ''}}>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                </div>
                                @if($errors->has('mobile'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('mobile')}}
                                    </small>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control"
                                       placeholder="رمزعبور به شرخر !" oninput="setCustomValidity('')"
                                       oninvalid="this.setCustomValidity('لطفا رمز عبور را وارد کنید')" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                                @if($errors->has('password'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('password')}}
                                    </small>
                                @endif
                            </div>
                            <small class="text-left text-info d-block mb-2" style="text-align: right!important;"> رمز
                                عبور (برای ساخت فروشگاه، نیازی به رمز اکانت اینستاگرام شما نداریم)
                            </small>

                            <div class="input-group mb-3">

                                <input type="text" name="insta_user" class="form-control"
                                       placeholder="نام کاربری اینستاگرام" value="{{ old('insta_user') }}"
                                       required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-instagram"></i></span>
                                </div>

                                @if($errors->has('insta_user'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('insta_user')}}
                                    </small>
                                @endif

                            </div>
                            <div class="input-group mb-3 ">
                                <img class="d-block h-25 mx-auto" src="{{asset('assets/images/user_ex.jpg')}}" alt="">
                            </div>


                            <div class="checkbox">
                                <input id="remember_me" name="rules" type="checkbox" checked>
                                <label for="remember_me">من با قوانین و مقررات موافقم. <a href="javascript:void(0);">شرایط
                                        استفاده</a></label>
                                @if($errors->has('rules'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('rules')}}
                                    </small>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">ثبت نام
                            </button>

                            <div class="signin_with mt-3">
                                <p class="mb-0">ثبت نام کردی ؟ <a href="{{route('login')}}" title="ورود به شرخر">وارد
                                        شو</a></p>
                            </div>

                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        ,کلیه حقوق محفوظ است.شرخر!
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="{{asset('assets/images/final1.png')}}" alt="Sign Up"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('styles')
    <style>
        small {
            text-align: right !important;
            margin-bottom: 5px;
        }
    </style>
@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script> <!-- Bootstrap Notify Plugin Js -->
    <script>
        $(document).ready(function () {
            countDown()

        });

        function countDown() {
            var oneMinute = new Date().getTime() + 59000;
            $('#countDown').fadeIn();
            $('#countDown').countdown(oneMinute)

                .on('update.countdown', function (event) {
                    $(this).html(event.strftime('در %S ثانیه دیگر'));
                })
                .on('finish.countdown', function (event) {
                    $(this).fadeOut();
                    $('#registerResend').css({
                        'cursor': 'pointer',
                        'opacity': '1'
                    }).removeClass('off').addClass('on');
                });
        }

        function resend(val) {
            if ($('#registerResend').css('cursor') == 'no-drop') {
                return false;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var mobile = val;
            $.ajax({
                'url': "{{route('resend_code')}}",
                'type': 'get',
                'contentType': "application/json",
                data: {mobile: mobile},

                success: function (response) {
                    if (response.sms_send == 'success') {
                        var allowDismiss = true;
                        $.notify({
                                message: "کد تایید با موفقیت ارسال شد."
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

                        $('#registerResend').css({
                            'cursor': 'no-drop',
                            'opacity': '0.5'
                        }).removeClass('on').addClass('off');
                        countDown()
                        ('#countDown').css({'display': 'block'});
                    }
                }
            });
        }
    </script>
@endsection