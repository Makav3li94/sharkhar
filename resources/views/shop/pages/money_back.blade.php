@extends('layouts.admin_layout',['title' => 'ضمانت بازگشت پول','b_level2'=>'','hide'=>'true'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                        <div class="header">
                            <h2><strong> ضمانت بازگشت پول</strong> در شرخر</h2>
                        </div>

                    </div>
                    <div class="blogitem mb-5 p-5">
                        <div class="blogitem-image">
                            {{--                            <a href="">--}}
                            {{--                                <img src="" alt="{{$blog->title}}">--}}
                            {{--                            </a>--}}


                            {{--                            <span class="blogitem-date"></span>--}}
                        </div>
                        <div class="blogitem-content">

                            <h3>
                                اگر از محصول دریافتی رضایت نداشتید، پول به حساب شما باز خواهد گشت.
                            </h3>

                            <p>
                                در زمان خرید پول را به حساب شرکت شرخر واریز می کنید و فروشنده های شرخر، کالا را برای شما ارسال می کنند. در صورت تایید شما، پول به حساب فروشنده واریز می شود.
                            </p>
                            <hr class="mt-4">

                            <div class="row">
                                <div class="col-sm-6">
                                    <h4>
                                        کالا را دریافت نکرده ام
                                    </h4>
                                    <p>
                                        پول شما در حساب شرکت شرخر به امانت نگه داشته شده است. در صورتی که کالا را دریافت نشود پول بازگشت خواهد یافت.
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <h4>
                                        کالا با سفارش مطابقت ندارد
                                    </h4>
                                    <p>
                                        اگر کالای دریافت شده همان کالای سفارش داده نیست، شرخر از شما حمایت می کند و وجه پرداختی شما را کامل برمی گرداند.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection