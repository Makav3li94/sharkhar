@extends('layouts.admin_layout',['title' => 'مزایای فروش در شرخر','b_level2'=>'','hide'=>'true'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="header">
                            <h2><strong>مزایای خرید </strong>در شرخر</h2>

                    </div>
                    <div class="blogitem mb-5 p-5">
                        <div class="blogitem-image">
                            {{--                            <a href="">--}}
                            {{--                                <img src="" alt="{{$blog->title}}">--}}
                            {{--                            </a>--}}


                            {{--                            <span class="blogitem-date"></span>--}}
                        </div>
                        <div class="blogitem-content">
                         <h4>
                             مزایای خرید در شرخر
                         </h4>
                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                خرید متنوع کالا در خانه و محل کار بدون صرف هزینه و وقت.
                            </p>
                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                سرعت و سهولت خرید از طریق پرداخت آنلاین.
                            </p>
                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                اطمینان و آرامش خریدار با تایید کالا قبل از انتقال وجه به فروشنده.
                            </p>
                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                رهگیری و دریافت کالا در بیش از 60 شهر کشور.
                            </p>
                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                پی گیری سریع و آسان خریدهای انجام شده در قسمت شرخر من.
                            </p>
                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                عدم نیاز به وارد کردن نام و نشانی در هر خرید.
                            </p>
                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                امکان خرید کالا به روش های متنوع زیر:
                            </p>
                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                شرکت در مزایدات و خرید کالا با قیمت واقعی.
                            </p>


                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                خرید با پیشنهاد قیمت دلخواه (کمتر از قیمت فعلی در سایت) به فروشنده.
                            </p>

                            <p><i class="zmdi zmdi-check  text-info  pl-2"></i>
                                خرید فوری با سبد خرید .
                            </p>


                    </div>
                </div>

            </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>مراحل خرید </strong>در شرخر</h2>

                    </div>
                    <div class="body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs p-0 mb-3 nav-tabs-success" role="tablist">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home"> <i class="zmdi zmdi-network pl-2"></i>خرید آنلاین</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile"><i class="zmdi zmdi-money-off pl-2"></i> پرداخت به شرخر </a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#messages"><i class="zmdi zmdi-plus-box pl-2"></i>  (فروشنده) فرستادن کالا</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings"><i class="zmdi zmdi-check pl-2"></i>  (خریدار) تایید دریافت کالا</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#pay"><i class="zmdi zmdi-money-box pl-2"></i> واریز به فروشنده</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane in active" id="home">
                                <b>خرید آنلاین</b>
                              <p>
                                  مشتری پس از تصمیم، از طریق لینک محصول که برایش ارسال میشود اقدام به سفارش محصول می کند.
                              </p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <b>پرداخت به شرخر</b>
                               <p>
                                   پس از تکمیل فرایند خرید، پول به حساب امانت شرخر واریز خواهد شد.( در صورت تایید هویت می توانید پول را به صورت مستقیم به حساب خودتان واریز نمایید)
                               </p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">
                                <b>ارسال کالا توسط فروشنده</b>
                             <p>
                                 پس از ثبت تراکنش، فروشنده کالا را برای مشتری ارسال خواهد کرد.
                             </p>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="settings">
                                <b>تایید کالا توسط خریدار</b>
                                <p>
                                    پس از تحویل در صورت رضایت، خریدار رضایت از کالا را تکمیل می کند.
                                </p>
                            </div>

                            <div role="tabpanel" class="tab-pane" id="pay">
                                <b>واریز پول به حساب فروشنده</b>
                                <p>
                                    پس از تایید، پول بلافاصه و به صورت خودکار به حساب فروشنده واریز می شود.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </div>
@endsection