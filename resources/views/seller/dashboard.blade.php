@extends('layouts.admin_layout',['title' => 'داشبورد','b_level2'=>'داشبورد'])

@section('content' )

    @if(auth()->user()->sheba == null)
        <div class="container">
            <a href="{{route('seller.profile',auth()->user()->id)}}">
                <div class="alert alert-danger">لطفا از طریق اطلاعات فروشگاه، شماره شبا خود را جهت تصفیه وارد نمایید.
                </div>
            </a>
        </div>
    @else
        <div class="container">
            <a href="{{route('seller.products.index')}}">
                <div class="alert alert-info">مشتری دارید؟ کافیه از طریق بخش محصولات کپی لینک خرید رو برای مشتری بفرستید
                    و بقیش با ما !
                </div>
            </a>
        </div>
    @endif
    <div class="container pr-0 pl-0">
        <div class="row clearfix" data-step="2" data-intro="آمار روزانه فروش، تراکنش و سفارش" data-position="bottom-middle-aligned">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon traffic">
                    <div class="body">
                        <h6>سفارشات امروز</h6>
                        <h2>
                            <small class="info">{{$todayOrders}}</small>
                        </h2>
                        <small>2٪ بالاتر از ماه گذشته</small>
                        <div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 45%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon sales">
                    <div class="body">
                        <h6>فروش</h6>
                        <h2>
                            <small class="info">{{number_format($todaySold)}}</small>
                        </h2>
                        <small>6٪ بالاتر از ماه گذشته</small>
                        <div class="progress">
                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 38%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon email">
                    <div class="body">
                        <h6>تراکنش هایا امروز</h6>
                        <h2>
                            <small class="info">{{$todayTransactions}}</small>
                        </h2>
                        <small>مجموع تراکنش ثبت شده</small>
                        <div class="progress">
                            <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 39%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card widget_2 big_icon domains">
                    <div class="body">
                        <h6>بازخورد های روز</h6>
                        <h2>
                            <small class="info"> {{$totalFeedbacks}}</small>
                        </h2>
                        <small>مجموع بازخورد ثبت شده</small>
                        <div class="progress">
                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0"
                                 aria-valuemax="100" style="width: 89%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix" data-step="3" data-intro="آمار کلی فروش، تراکنش و سفارش" data-position="bottom-middle-aligned">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong><i class="zmdi zmdi-chart"></i> گزارش</strong> کلی فروش</h2>
                    </div>


                    <div class="body mb-2">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>{{number_format($totalSale)}}</h5>
                                            <span><i class="zmdi zmdi-balance"></i> در آمد</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                             data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#868e96">
                                            5,2,3,7,6,4,8,1
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>{{number_format($totalOrders)}}</h5>
                                            <span><i class="zmdi zmdi-turning-sign"></i> سفارشات</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                             data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#2bcbba">
                                            8,2,6,5,1,4,4,3
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>{{number_format($totalTransactions)}}</h5>
                                            <span><i class="zmdi zmdi-alert-circle-o"></i>تراکنش ها</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                             data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#82c885">
                                            4,4,3,9,2,1,5,7
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>{{number_format($totalViews)}}</h5>
                                            <span><i class="zmdi zmdi-print"></i>بازدیدها</span>
                                        </div>
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                             data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#45aaf2">
                                            7,5,3,8,4,6,2,9
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="body">
                        <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('scripts')
    <script>
        @if(isset(request()->start))
        $(document).ready(function () {
            introJs().setOption('doneLabel', 'صفحه بعد').start().oncomplete(function () {
                window.location.href = '{{ url("seller/profile/".auth()->user()->id."/?multipage=true") }}';
            });
        });

        @endif


    </script>
@endsection