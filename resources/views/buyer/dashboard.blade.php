@extends('layouts.admin_layout',['title' => 'داشبورد','b_level2'=>'داشبورد'])

@section('content')

    <div class="container pr-0 pl-0">

        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="alert alert-warning">
                        <a href="{{route('buyer.police.index')}}">
                            <i class="zmdi zmdi-check"></i><span> پیگیری سفارشات</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="header">
                            <h2><strong><i class="zmdi zmdi-chart"></i> آمار</strong> کلی</h2>
                        </div>
                    </div>
                    <div class="body mb-2">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <div class="state_w1 mb-1 mt-1">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5>{{number_format($totalSale)}}</h5>
                                            <span><i class="zmdi zmdi-balance"></i> هزینه</span>
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
                                            <h5>{{number_format($totalFeedbacks)}}</h5>
                                            <span><i class="zmdi zmdi-print"></i>بازخورد ها</span>
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
                </div>
            </div>
        </div>

    </div>

@endsection