@extends('layouts.admin_layout',['title' => 'ویرایش پروفایل','b_level2'=>'ویرایش پروفایل','back'=>'true'])

@section('content')

        <div class="container">

            <div class="row clearfix">
                <div class="card">
                    <div class="header">
                        <h2><strong>تنظیمات</strong> حساب</h2>
                    </div>
                    <div class="body">
                        <form action="{{route('buyer.update',$buyer->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row clearfix mb-5">

                                <div class="col-lg-4 col-md-4 mb-4">
                                    <label>نام و نام خانوادگی</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-phone"></i></span>
                                        </div>
                                        <input class="form-control " name="name" value="{{$buyer->name}}" disabled
                                               type="text">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 mb-4">
                                    <label>پست الکترونیک</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-email"></i></span>
                                        </div>
                                        <input class="form-control"
                                               value="{{$buyer->email ?? old('email')}}" name="email"
                                               type="email" placeholder="example@gmail.com">
                                        @if($errors->has('email'))
                                            <small class="text-danger d-inline-block w-100  mt-2">
                                                {{$errors->first('email')}}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 mb-4">
                                    <label>شماره همراه</label>
                                    <div class="input-group masked-input">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-phone"></i></span>
                                        </div>
                                        <input class="form-control " value="{{$buyer->mobile}}" disabled
                                               type="text">
                                    </div>
                                </div>


                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control"
                                               placeholder="رمز عبور جدید">
                                    </div>
                                    @if($errors->has('password'))
                                        <small class="text-danger d-inline-block w-100  mt-2">
                                            {{$errors->first('password')}}
                                        </small>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input name="password_confirmation" type="password" class="form-control"
                                               placeholder="تکرار رمزعبور جدید">
                                    </div>
                                    @if($errors->has('password_confirmation'))
                                        <small class="text-danger d-inline-block w-100  mt-2">
                                            {{$errors->first('password_confirm')}}
                                        </small>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">
                                        ذخیره تغییرات
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
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