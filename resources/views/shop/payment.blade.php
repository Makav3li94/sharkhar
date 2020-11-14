@extends('layouts.admin_layout',['title' => 'صفحه پرداخت','b_level2'=>'صورت حساب سفارش #'.$order->id,'hide'=>'true'])
@section('styles')

@endsection
@section('content')
    <div class="container">
        <div class="row clearfix">

            <div class="card">
                <div class="body">
                    <div class="d-flex justify-content-between">
                        <div class="p-2 ">
                            <p class="mb-0"><strong>سفارش: </strong>#{{$order->id}}</p>
                        </div>

                        <div class="p-2">
                            <p class="mb-0"><strong> </strong>{{$order->created_at}}</p>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div class="p-2 ">
                            <p class="mb-0"><strong>فروشنده:</strong>{{$order->seller->name}}</p>
                        </div>

                        <div class="p-2">
                            <p class="mb-0"><strong>ت:</strong>{{$order->seller->mobile}}</p>
                            @if($order->seller->telephone !== null)
                                <p class="mb-0"><strong>ت-ثابت:</strong>{{$order->seller->telephone ?? ''}}</p>
                            @endif

                        </div>
                    </div>

                    <div class="d-flex justify-content-between">


                        <div class="p-2 ">
                            <p class="mb-0"><strong>وضعیت سفارش: </strong>

                            </p>
                        </div>
                        <div class="p-2">
                               <span class="badge badge-success"> در حال انجام
                                    </span>
                        </div>
                    </div>
                </div>
            </div>


        </div>


        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="col-md-12">
                        <div class="p-2 ">
                            محصول:
                            <p class="mb-0">
                                {{\Illuminate\Support\Str::limit($order->product->title,80) ??''}}
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th width="60px">تصویر</th>
                                    <th class="nono">عنوان</th>
                                    <th>تعداد</th>
                                    <th>واحد</th>
                                    <th>مجموع</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><img src="{{$order->product->image_thumb}}" width="40" alt="Product img">
                                    </td>
                                    <td class="nono">{{\Illuminate\Support\Str::limit($order->product->title,20) ??''}}</td>
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
                    <form action="{{route('payment')}}" method="post">
                        <input type="hidden" name="order_id" value="{{$order->id}}">
                        <div class="row">
                            @csrf
                            <div class="col-lg-4 col-sm-4 mb-5 ">
                                <ul class="list-unstyled price-list">
                                    <li class="d-flex justify-content-between">
                                        <div class="">
                                            <strong>قیمت محصول: </strong>
                                        </div>
                                        <div class="">
                                            <span>{{$order->qty}} * {{number_format($order->product->price)}}</span>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <div class="">
                                            <strong>قیمت کل: </strong>
                                        </div>
                                        <div class="">
                                            <span> {{number_format(($order->price) - ($order->shipping_cost)) ?? 0}}</span>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <div class="">
                                            <strong>هزینه ارسال: </strong>
                                        </div>
                                        <div>
                                            <span>{{$order->shipping_cost ?? 0}}</span>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between">
                                        <div class="">
                                            <strong>سهم شرخر: </strong>
                                        </div>
                                        <div>
                                            <span>{{(int) ( round( $order->price * ( 1 / 100 ) ) ) ?? 0}}</span>
                                        </div>
                                    </li>
                                    <li class="d-flex justify-content-between text-danger">
                                        <div>
                                            <strong>تخفیف: </strong>
                                        </div>
                                        <div>
                                            <span>{{number_format($order->discount) ?? 0}}</span>
                                        </div>
                                    </li>
                                </ul>
                                <hr>
                                <h5 class="mb-0 text-success text-center"> مبلغ قابل پرداخت
                                    : {{number_format((int)($order->price + round( $order->price * (1/100))) ) }}
                                    تومان</h5>
                            </div>
                            <div class="col-lg-3 nono">

                            </div>
                            <div class="col-lg-5 col-sm-8 ">
                                <textarea name="note" class="form-control" id="" rows="3"
                                          placeholder="اگر نکته ای در خصوص خرید مد نظرتون هست اینجا یادداشت کنید"></textarea>
                            </div>


                        </div>
                        {{--                        <div class="row mt-2">--}}
                        {{--                            <div class="col-lg-12">--}}
                        {{--                                <div class="form-group text-center">--}}
                        {{--                                    <div class="radio inlineblock m-r-20">--}}
                        {{--                                        <input type="radio" name="payment_method" id="direct" class="with-gap" value="0"--}}
                        {{--                                               checked="">--}}
                        {{--                                        <label for="direct">واریز مستقیم به فروشنده</label>--}}
                        {{--                                    </div>--}}
                        {{--                                    <div class="radio inlineblock">--}}
                        {{--                                        <input type="radio" name="payment_method" id="police" class="with-gap" value="1"--}}
                        {{--                                        >--}}
                        {{--                                        <label for="police">استفاده از سیستم واسطه شرخر</label>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <div class="row mt-1">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">
                                    پرداخت
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection

@section('scripts')


@endsection