@extends('layouts.admin_layout',['title' => 'بازگشت از درگاه','b_level2'=>$order->seller->insta_user,'hide'=>'true'])

@section('content')

    <div class="container">
        @if($verifyCode != 'false')
            <div class="row clearfix">
                <div class="card">
                    <div class="header d-flex">
                        <h2 class="p-2 ">وضعیت پرداخت :</h2>
                        <div class=" ml-4 p-2 mr-auto alert alert-success">پرداخت شده</div>
                    </div>
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
                                        <strong class=" pb-2">نام فروشنده: </strong>{{$order->seller->name}}<br>
                                        {{$buyer->address ?? ''}}<br>
                                        <abbr title="Phone">ت:</abbr> {{$order->seller->mobile}}<br>
                                        <abbr title="Phone">ت-ث:</abbr> {{$order->seller->telephone ?? ''}}
                                    </address>
                                </div>
                                <div class="col-md-6 col-sm-6 p-0  text-right">
                                    <p class="mb-0"><strong>وضعیت سفارش: </strong>
                                        <span class="badge badge-success"> در حال انجام
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
                                        <th>تصویر</th>
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
                                        : {{number_format($order->price) }} هزار
                                        تومان</h5>
                                </div>
                                <div class="col-lg-3 nono">

                                </div>
                                <div class="col-lg-5 col-sm-8 ">
                                    <textarea name="note" class="form-control" id="" rows="3">{{$order->note ?? ''}}</textarea>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        @else


            <div class="row clearfix">
                <div class="card">
                    <div class="header d-flex">
                        <h2 class="p-2 ">وضعیت پرداخت :</h2>
                        <div class=" ml-4 p-2 mr-auto alert alert-danger">خطا در پرداخت</div>
                    </div>

                    <div class="body">
                        <p class="text-info text-center" >اگر مبلغی از حساب شما کسر شده تا 48 ساعت آینده به حساب شما باز خواهد گشت</p>
                        <hr>
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
                                        <strong class=" pb-2">نام فروشنده: </strong>{{$order->seller->name}}<br>
                                        {{$buyer->address ?? ''}}<br>
                                        <abbr title="Phone">ت:</abbr> {{$order->seller->mobile}}<br>
                                        <abbr title="Phone">ت-ث:</abbr> {{$order->seller->telephone ?? ''}}
                                    </address>
                                </div>
                                <div class="col-md-6 col-sm-6 p-0  text-right">
                                    <p class="mb-0"><strong>وضعیت سفارش: </strong>
                                        <span class="badge badge-warning">در انتظار پرداخت
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
                                        : {{number_format($order->price) }} هزار
                                        تومان</h5>
                                </div>
                                <div class="col-lg-3 nono">

                                </div>
                                <div class="col-lg-5 col-sm-8 ">
                                    <textarea name="note" class="form-control" id="" rows="3"
                                              placeholder="اگر نکته ای در خصوص خرید مد نظرتون هست اینجا یادداشت کنید">{{$order->note ?? ''}}</textarea>
                                </div>


                            </div>
                            <div class="row mt-5">
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
        @endif
    </div>



@endsection

