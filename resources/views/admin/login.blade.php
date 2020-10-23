@extends('layouts.layout')
@section('content')
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12"></div>
                <div class="col-lg-4   col-sm-12">
                    <form class="card auth_form" action="{{route('admin_login')}}" method="post">
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
                                            <i class="zmdi zmdi-lock"></i>
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
                        </div>
                    </form>
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
