@extends('layouts.layout')
@section('content')
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="{{route('register_buyer')}}" method="post">
                        @csrf
                        <div class="header">
                            <img class="logo" src="{{asset('assets/images/logo.png')}}" alt="">
                            <h5>ثبت نام خریدار</h5>
                            <span>عضویت جدید را ثبت کنید</span>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="نام و نام خانوادگی"
                                       value="{{ old('name') }}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('لطفا نام و نام خانوادگی را وارد کنید')" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                                @if($errors->has('name'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('name')}}
                                    </small>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <input type="text" name="mobile" class="form-control " placeholder="شماره موبایل"
                                       value="{{ old('mobile') }}" oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('لطفا شماره موبایل را وارد کنید')" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-add"></i></span>
                                </div>
                                @if($errors->has('mobile'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('mobile')}}
                                    </small>
                                @endif
                            </div>



                            <div class="input-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="رمزعبور به شرخر !"  oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('لطفا رمز عبور را وارد کنید')" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                                @if($errors->has('password'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('password')}}
                                    </small>
                                @endif
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
                                <p class="mb-0">ثبت نام کردی ؟ <a href="{{route('buyer_login')}}" class="text-danger" title="ورود به شرخر">وارد
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