@extends('layouts.admin_layout',['title' => 'صورتحساب','b_level1'=>'لیست سفارشات','b_level2'=> 'صورتحساب #'.$order->id,'back'=>'true'])

@section('content')



    <div class="container">
        <div class="row clearfix">
            <div class="card">

                <div class="header">
                    <h2><strong>کدرهگیری </strong> پست</h2>
                </div>
                <div class="body">
                    <form action="{{route('seller.orders.update',$order->id)}}" method="post" class="form-horizontal">
                        @csrf
                        @method('patch')

                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4 col-sm-12 mb-3">
                                <div class="form-group">
                                    <input type="text" name="tracking_code" id="tracking_code" class="form-control"
                                           value="{{$order->tracking_code!=null ? $order->tracking_code : ''}}"
                                           {{$order->tracking_code!=null ? 'disabled' : ''}} placeholder=" مثلا: 104919919900021620000114">
                                </div>
                                @if($errors->has('tracking_code'))
                                    <small class="text-danger">{{$errors->first('tracking_code')}}</small>
                                @endif
                            </div>
                            @if($order->tracking_code == null)
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-raised btn-info btn-round waves-effect">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-8 col-md-65 col-sm-4">
                                    <div class="d-flex bd-highlight text-center mb-3">
                                        <div class="bg-green flex-fill bd-highlight">
                                            <p class="pb-0 font-13 pt-2">
                                                در صورت تحویل مرسوله، اگر کالا تا 48 ساعت توسط خریدار تایید نشد، پول به حساب شما واریز می شود.
                                            </p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="body">
                    <div class="d-flex ">
                        <div class="p-2 ml-auto">
                            <h5><strong>شماره سفارش: </strong> #{{$order->id}}</h5>
                        </div>

                        <div class="p-2">
                            <p class="mb-0"><strong>تاریخ سفارش: </strong>{{$order->created_at}}</p>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 p-0">
                                <address>
                                    <strong class=" pb-2">نام خریدار: </strong>{{$order->buyer->name}}<br>
                                    {{$buyer->address ?? ''}}<br>
                                    <abbr title="Phone">ت:</abbr> {{$order->buyer->mobile}}
                                </address>
                            </div>
                            <div class="col-md-6 col-sm-6 p-0  text-right">
                                <p class="mb-0"><strong>وضعیت سفارش: </strong>
                                    <span class="badge badge-{{$order->deliver_status == 'green' ? 'success' : 'warning'}}">@if($order->deliver_status == 'green')
                                            موفق @else در حال انجام @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>


        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="col-md-12">
                        <div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="60px">تصویر</th>
                                    <th>عنوان</th>
                                    <th>تعداد</th>
                                    <th>هزینه واحد</th>
                                    <th>مجموع</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="{{$order->product->image_thumb}}" width="40" alt="Product img">
                                    </td>
                                    <td>{{\Illuminate\Support\Str::limit($order->product->title,20) ??''}}</td>
                                    <td>{{$order->qty ?? ''}}</td>
                                    <td>{{number_format($order->product->price)}}</td>
                                    <td>{{number_format($order->price)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-5 ">
                            <ul class="list-unstyled price-list">
                                <li><strong>قیمت محصول: </strong>
                                    <span>{{$order->qty}} * {{number_format($order->product->price)}}</span>
                                </li>
                                <li><strong>قیمت کل: </strong>
                                    <span> {{number_format(($order->price) - ($order->shipping_cost)) ?? 0}}</span>
                                </li>
                                <li><strong>هزینه ارسال: </strong>
                                    <span>{{$order->shipping_cost ?? 0}}</span>
                                </li>

                                <li class="text-danger"><strong>تخفیف: </strong>
                                    <span>{{number_format($order->discount) ?? 0}}</span>
                                </li>
                            </ul>
                            <hr>
                            <h5 class="mb-0 text-success text-center"> مبلغ قابل پرداخت
                                : {{number_format($order->price) }}
                                تومان</h5>
                            {{--                                    <a href="javascript:void(0);" class="btn btn-info"><i--}}
                            {{--                                                class="zmdi zmdi-print"></i></a>--}}
                            {{--                                    <a href="javascript:void(0);" class="btn btn-primary">تایید</a>--}}
                        </div>
                        <div class="col-lg-3 nono">

                        </div>
                        <div class="col-lg-5 col-sm-8 ">
                            <h5>یادداشت مشتری</h5>
                            <pre>
                                <p>{{$order->note ?? ''}}</p>
                            </pre>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('styles')
    <style>
        .price-list span {
            padding: 2px;
            display: inline-block;
            left: 0;
            position: absolute;
        }
    </style>
@endsection