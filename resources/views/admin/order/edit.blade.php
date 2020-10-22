@extends('layouts.admin_layout')

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>صورتحساب</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}"><i class="zmdi zmdi-home"></i> {{auth()->user()->title}}</a></li>
                        <li class="breadcrumb-item active">صورتحساب سفارش</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h5><strong>شماره سفارش: </strong> #{{$order->id}}</h5>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <address>
                                        <strong>{{$order->buyer->name}}</strong><br>
                                        {{$order->buyer->address??''}}<br>
                                        <abbr title="Phone">تلفن:</abbr> {{$order->buyer->mobile??''}}
                                    </address>
                                </div>
                                <div class="col-md-6 col-sm-6 text-right">
                                    <p class="mb-0"><strong>تاریخ سفارش: </strong>{{$order->created_at}}</p>
                                    <p class="mb-0"><strong>وضعیت سفارش: </strong> <span class="badge badge-{{$order->deliver_status == 'green' ? 'success' : 'warning'}}">@if($order->deliver_status == 'green') موفق @else ناموفق @endif</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover c_table theme-color">
                                        <thead>
                                        <tr>
                                            <th width="60px">تصویر</th>
                                            <th >عنوان</th>
                                            <th>تعداد</th>
                                            <th class="hidden-sm-down">هزینه واحد</th>
                                            <th>مجموع</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><img src="{{asset('assets/images/ecommerce/'.$order->product->image)}}" width="40" alt="Product img">
                                            </td>
                                            <td>{{$order->product->title ??''}}</td>
                                            <td class="hidden-sm-down">{{$order->product->qty ?? ''}}</td>
                                            <td>{{$order->product->price}}</td>
                                            <td>{{$order->price}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>یادداشت مشتری</h5>
                                  <p>{{$order->note ?? ''}}</p>
                                </div>
                                <div class="col-md-6 text-right">
                                    <ul class="list-unstyled">
                                        <li><strong>قیمت سفارش:-</strong>{{$order->price - ($order->shipping_cost ?? 0)}}</li>
                                        <li><strong>هزینه ارسال:-</strong> {{$order->shipping_cost ?? 0}}</li>

                                        <li class="text-danger"><strong>تخفیف:-</strong> {{$order->discount ?? 0}}</li>
                                    </ul>
                                    <h3 class="mb-0 text-success">{{$order->price }} تومان</h3>
{{--                                    <a href="javascript:void(0);" class="btn btn-info"><i--}}
{{--                                                class="zmdi zmdi-print"></i></a>--}}
{{--                                    <a href="javascript:void(0);" class="btn btn-primary">تایید</a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection