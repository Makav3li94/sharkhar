@extends('layouts.admin_layout',['title' => 'ویرایش پروفایل','b_level2'=>'ویرایش پروفایل','back'=>'true'])

@section('content')

    <div class="container">

        <div class="row clearfix">
            <div class="card">
                <div class="header">
                    <h2><strong>تنظیمات</strong> حساب</h2>
                </div>
                <div class="body">
                    <form action="{{route('admin.sellers.update',$seller->id)}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="row clearfix mb-5">
                            <div class="col-lg-4 col-md-12">
                                <div class="card mcard_3">
                                    <div class="body">
                                        <img src="{{$seller->logo ?? ''}}" class="rounded-circle shadow "
                                             alt="profile-image">
                                        <h4 class="m-t-10">{{$seller->insta_user ?? ''}}</h4>
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="text-muted">{!! $seller->bio ?? '' !!}</p>
                                            </div>
                                            <div class="col-4">
                                                <small>دنبال میکنه</small>
                                                <h5>{{$seller->following ?? ''}}</h5>
                                            </div>
                                            <div class="col-4">
                                                <small>دنبال کننده</small>
                                                <h5>{{$seller->followers ?? ''}}</h5>
                                            </div>
                                            <div class="col-4">
                                                <small>پست</small>
                                                <h5>{{$seller->posts ?? ''}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>نام کاربری اینستاگرام</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-instagram"></i></span>
                                            </div>
                                            <input class="form-control" name="insta_user"
                                                   value="{{$seller->insta_user ?? ''}}"
                                                   type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>شماره همراه</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-phone"></i></span>
                                            </div>
                                            <input class="form-control " name="mobile" value="{{$seller->mobile}}"
                                                   type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>کد ملی</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="zmdi zmdi-account-add"></i></span>
                                            </div>
                                            <input class="form-control" name="m_code"
                                                   value="{{$seller->m_code ?? old('m_code')}}"

                                                   type="text">
                                            @if($errors->has('m_code'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('m_code')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>لینک پیج ایسنتاگرام</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-calendar"></i></span>
                                            </div>
                                            <input class="form-control"
                                                   value="{{$seller->insta_link ?? ''}}" type="text"
                                                   placeholder="https://www.instagram.com/parnasite">
                                            @if($errors->has('insta_link'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('insta_link')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>پست الکترونیک</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-email"></i></span>
                                            </div>
                                            <input class="form-control"
                                                   value="{{$seller->email ?? old('email')}}" name="email"
                                                   type="email" placeholder="example@gmail.com">
                                            @if($errors->has('email'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('email')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 mb-4 ">
                                        <label>عنوان فروشگاه</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="zmdi zmdi-badge-check"></i></span>
                                            </div>
                                            <input name="title" class="form-control "
                                                   value="{{$seller->title ?? old('title')}}" type="text">
                                            @if($errors->has('title'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('title')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>تلفن ثابت</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-local-phone"></i></span>
                                            </div>
                                            <input class="form-control"
                                                   value="{{$seller->telephone ?? old('telephone')}}"
                                                   name="telephone" placeholder="02185749652" type="text">
                                            @if($errors->has('telephone'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('telephone')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>شماره شبا</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-money"></i></span>
                                            </div>
                                            <input class="form-control" name="sheba"
                                                   value="{{$seller->sheba ?? old('sheba')}}"
                                                   placeholder="مثال : IR123456789987654321123456 همراه با IR"
                                                   type="text">
                                            @if($errors->has('sheba'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('sheba')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>هزینه ارسال ثابت</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-local-shipping"></i></span>
                                            </div>
                                            <input class="form-control total"
                                                   value="{{$seller->default_shipping ?? old('default_shipping')}}"
                                                   name="default_shipping" placeholder="120000" type="text">
                                            @if($errors->has('default_shipping'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('default_shipping')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 mb-4">
                                        <label>حداقل خرید و ارسال رایگان</label>
                                        <div class="input-group masked-input">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-local-shipping"></i></span>
                                            </div>
                                            <input class="form-control free_shipping"
                                                   value="{{$seller->free_shipping ?? old('free_shipping')}}"
                                                   name="free_shipping" placeholder="120000" type="text">
                                            @if($errors->has('free_shipping'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('free_shipping')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <small class="text-info">در صورتی که فروشگاه فیزیکی دارید، آدرس آنرا وارد
                                            نمایید.
                                        </small>

                                        <div class="input-group">
                                    <textarea name="address" rows="2" class="form-control no-resize"
                                              placeholder="تهران-پاساز رضا-پلاک 26"></textarea>
                                        </div>

                                        @if($errors->has('address'))
                                            <small class="text-danger d-inline-block w-100  mt-2">
                                                {{$errors->first('address')}}
                                            </small>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-3">

                                        <input name="status" value="on" type="checkbox" {{$seller->status == 'green' ? "checked='checked'" : ''}}>
                                        <label for="status">
                                            وضعیت
                                        </label>
                                    </div>
                                        <div class="col-md-12 mb-3">
                                        <input name="is_verified" value="on" type="checkbox" {{$seller->is_verified == 'green' ? "checked='checked'" : ''}}>
                                        <label for="is_verified">
                                            وضعیت تایید
                                        </label>
                                    </div>
                                            <div class="col-md-12 mb-3">
                                        <input name="bank_status" value="on" type="checkbox" {{$seller->bank_status == 'green' ? "checked='checked'": ''}}>
                                        <label for="bank_status">
                                          پرداخت مستقیم
                                        </label>
                                    </div>
                                </div>
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


            <div class="card">
                <div class="header">

                    <h2>اطلاعات مورد نیاز جهت <strong class="text-danger">تایید شما</strong></h2>
                </div>
                <div class="body">
                    <div class="col-md-12">

                            <div class="col-lg-12 col-md-12 mb-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <label>عکس یا اسکن کارت ملی</label><br>


                                        <a href="{{asset($seller->id_card)}}"><i class="zmdi zmdi-download"></i></a>
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <label>عکس یا اسکن شناسنامه</label><br>

                                        <a href="{{asset($seller->id_book)}}"><i class="zmdi zmdi-download"></i></a>

                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4">
                                        <label>قبض به نام حداکثر 30 ماه</label><br>
                                        <a href="{{asset($seller->id_bill)}}"><i class="zmdi zmdi-download"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">
                                            ذخیره تغییرات
                                        </button>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2><strong>تنظیمات</strong> امنیتی</h2>
                </div>
                <div class="body">
                    <div class="col-md-12">
                        <form action="{{route('admin.sellers.change_password',$seller->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row">
                                <div class="col-lg-4 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$seller->name}}" disabled>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12">
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
                                <div class="col-lg-4 col-md-12">
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
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">
                                            ذخیره تغییرات
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            getChange();
            getChange2();


            $('.total').on('keyup', function () {
                getChange();
            });


            $('.free_shipping').on('keyup', function () {
                getChange2();
            });



            "use strict";
            $('.dropify').dropify({
                messages: {}
            });


        });


        const currency = [2000, 1000, 500, 200, 100, 50, 20, 10, 5, 2, 1];

        const valueRef = document.querySelector(".total");

        function getCurrency(value) {
            console.clear();
            var map = new Map();
            let i = 0;
            //loop unitll value 0
            while (value) {
                //if divide in non-zero add in map
                if (Math.floor(value / currency[i]) != 0) {
                    map.set(currency[i], Math.floor(value / currency[i]));
                    //update value using mod
                    value = value % currency[i];
                }
                i++;
            }

            // debugger;
            for (var [key, value] of map) {
                console.log(key + " = " + value);
            }
        }

        function getChange() {
            // 48 - 57 (0-9)
            var str1 = valueRef.value;
            if (
                str1[str1.length - 1].charCodeAt() < 48 ||
                str1[str1.length - 1].charCodeAt() > 57
            ) {
                valueRef.value = str1.substring(0, str1.length - 1);
                return;
            }

            // t.replace(/,/g,'')
            let str = valueRef.value.replace(/,/g, "");

            let value = +str;
            getCurrency(value);

            valueRef.value = value.toLocaleString();
        }

        valueRef.addEventListener("change", getChange);
        console.log(valueRef);




        const currency2 = [2000, 1000, 500, 200, 100, 50, 20, 10, 5, 2, 1];

        const valueRef2 = document.querySelector(".free_shipping");

        function getCurrency2(value) {
            console.clear();
            var map = new Map();
            let i = 0;
            //loop unitll value 0
            while (value) {
                //if divide in non-zero add in map
                if (Math.floor(value / currency2[i]) != 0) {
                    map.set(currency2[i], Math.floor(value / currency2[i]));
                    //update value using mod
                    value = value % currency2[i];
                }
                i++;
            }

            // debugger;
            for (var [key, value] of map) {
                console.log(key + " = " + value);
            }
        }

        function getChange2() {
            // 48 - 57 (0-9)
            var str1 = valueRef.value;
            if (
                str1[str1.length - 1].charCodeAt() < 48 ||
                str1[str1.length - 1].charCodeAt() > 57
            ) {
                valueRef.value = str1.substring(0, str1.length - 1);
                return;
            }

            // t.replace(/,/g,'')
            let str = valueRef2.value.replace(/,/g, "");

            let value = +str;
            getCurrency2(value);

            valueRef2.value = value.toLocaleString();
        }

        valueRef2.addEventListener("change", getChange);
        console.log(valueRef);


    </script>
@endsection