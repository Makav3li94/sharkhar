@extends('layouts.layout')
@section('content')
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="{{route('login')}}" method="post">
                        @csrf

                        <div class="header">
                            <img class="logo" src="{{asset('assets/images/logo.png')}}" alt="">
                            <h5>ورود</h5>
                        </div>
                        <div class="body">

                            <div class="input-group mb-3">
                                <input type="text" name="mobile" class="form-control" placeholder="شماره موبایل "
                                       value="{{old('mobile')}}" oninput="setCustomValidity('')"
                                       oninvalid="this.setCustomValidity('لطفا شماره تلفن را وارد کنید')" required>
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
                                <input type="password" name="password" class="form-control" placeholder="رمزعبور"
                                       oninput="setCustomValidity('')"
                                       oninvalid="this.setCustomValidity('لطفا رمز عبور را وارد کنید')" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <a href="{{url('password/reset')}}" onclick="sendPassword()" class="forgot " title="فراموشی رمز عبور">
                                            <i class="zmdi zmdi-lock"></i>
                                        </a>
                                    </span>
                                    @if($errors->has('password'))
                                        <small class="text-danger d-inline-block w-100  mt-2">
                                            {{$errors->first('password')}}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="checkbox">
                                <input id="remember_me" name="remember"
                                       type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember_me">مرا به خاطر بسپار</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">ورود
                            </button>
                            <div class="signin_with mt-3">
                                <p class="mb-0">اولین بارته ؟، <a href="{{route('register')}}" title="ثبت نام در شرخر">ثبت
                                        نام کن !</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        ,کلیه حقوق محفوظ است.شرخر!
                        {{--                        <span>راست چین شده توسط <a href="https://thememakker.com/" target="_blank">آرش خادملو</a></span>--}}
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="{{asset('assets/images/signin.svg')}}" alt="Sign In"/>
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
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script> <!-- Bootstrap Notify Plugin Js -->
    @if(session('newPassSent'))
        <script>
            var allowDismiss = true;
            $.notify({
                    message: "رمز عبور جدید برای شما ارسال شد."
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
        </script>
    @endif
@endsection