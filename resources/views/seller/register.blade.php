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
                                <input type="text" name="mobile" class="form-control" placeholder="شماره موبایل"
                                       value="{{ old('mobile') }}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('لطفا شماره موبایل را وارد کنید')" required>
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
                                <input class="form-control text-dark text-center font-16"
                                       type="text"
                                       required="" placeholder="{{$array[2].' '.$array[1].' '.$array[0]}} برابر با چه عددی است؟ "  name="result">
                                <input type="hidden" name="a" value="{{$array[0]}}">
                                <input type="hidden" name="operator" value="{{$array[1]}}">
                                <input type="hidden" name="b" value="{{$array[2]}}">
                                @if($errors->has('code'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('code')}}
                                    </small>
                                @endif
                            </div>
                            <input type="hidden" name="confirm" value="on">
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">دریافت کد تایید
                            </button>
                            <div class="signin_with mt-3">
                                <p class="mb-0">ثبت نام کردی ؟ <a href="{{route('login')}}" class="text-danger" title="ورود به شرخر">وارد
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
        small{
            text-align: right!important;
            margin-bottom: 5px;
        }
    </style>
@endsection