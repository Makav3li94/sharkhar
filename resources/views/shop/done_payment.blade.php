@extends('welcome')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/footable-bootstrap/css/footable.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/footable-bootstrap/css/footable.standalone.min.css')}}">
    <style>

        body {
            background-color: #f5f5f5;
            overflow-x: hidden;
        }

        /* Profile Section */
        @media screen and (max-width: 720px) {
            .profile {
                display: none;
            }
        }

        /* Profile Section */

        .profile {
            padding: 5rem 0;
            text-align: right;
            direction: rtl;
            padding: 30px;
        }

        .profile::after {
            content: "";
            display: block;
            clear: both;
        }

        .profile-image {
            float: left;
            width: calc(33.333% - 1rem);
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 3rem;
        }

        .profile-image img {
            border-radius: 50%;
        }

        .profile-user-settings,
        .profile-stats,
        .profile-bio {
            float: left;
            width: calc(66.666% - 2rem);
        }

        .profile-user-settings {
            margin-top: 1.1rem;
        }

        .profile-user-name {
            display: inline-block;
            font-size: 3.2rem;
            font-weight: 300;
        }


        .profile-stats {
            margin-top: 2.3rem;
        }

        .profile-stats li {
            display: inline-block;
            font-size: 1.6rem;
            line-height: 1.5;
            margin-right: 4rem;
            cursor: pointer;
        }

        .profile-stats li:first-of-type {
            margin-right: 0;
        }

        .profile-bio {
            font-size: 1.6rem;
            font-weight: 400;
            line-height: 1.5;
            margin-top: 2.3rem;
        }

        .profile-real-name,
        .profile-stat-count {
            font-weight: 600;
        }

        .product_item {
            direction: rtl;
            text-align: right;
            padding: 20px;
        }
    </style>
@endsection
@section('content')
    <section class="wellcome_area clearfix" style="height: 400px;margin-bottom: 100px" id="home">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading text-right" style="direction: rtl">
                        <h2>فروشگاه های محبوبتون !</h2>
                        {{--                    <h3>شره !</h3>--}}
                        <p>هرچی دوست دارید، با امنیت خاطر بخرید.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="body_scroll">
        <div class="block-header">
            @if($verifyCode != 'false')

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2 style="text-align: right">وضعیت پرداخت :
                                <div class="badge badge-success">پرداخت شده</div>
                            </h2>

                        </div>
                    </div>
                </div>
                <div class="container mt-3" style="direction: rtl;text-align: right;">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5><strong>شماره سفارش: </strong> #{{$order->id}}</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <address>
                                                <strong>فروشنده {{$order->seller->name}}.</strong><br>
                                                {{$order->seller->address ?? ''}}<br>
                                                <abbr title="Phone">ت:</abbr> {{$order->seller->mobile}}
                                            </address>
                                        </div>
                                        <div class="col-md-6 col-sm-6 text-right">
                                            <p class="mb-0"><strong>تاریخ سفارش: </strong>{{$order->created_at}}</p>
                                            {{--                                    <p class="mb-0"><strong>وضعیت سفارش: </strong> <span class="badge badge-success">موفقیت</span></p>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover c_table theme-color">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th width="60px">آیتم</th>
                                                        <th></th>
                                                        <th class="hidden-sm-down">توضیحات</th>
                                                        <th>تعداد</th>
                                                        <th class="hidden-sm-down">هزینه واحد</th>
                                                        <th>مجموع</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><img src="{{$order->product->image_thumb}}" width="40"
                                                                 alt="Product img"></td>
                                                        <td>{{$order->product->title ?? ''}}</td>
                                                        <td class="hidden-sm-down">{{$order->note ?? ''}}</td>
                                                        <td>{{$order->qty}}</td>
                                                        <td class="hidden-sm-down">{{$order->product->price}} هزار
                                                            تومان
                                                        </td>
                                                        <td>{{$order->price}}</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        @csrf
                                        <div class="col-md-6">

                                            <p>امیدواریم خرید لذت بخشی داشته باشید.</p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <ul class="list-unstyled">
                                                <li><strong>مجموع مبلغ
                                                        پرداختی:-</strong> {{number_format($order->product->price)}}
                                                    هزار تومان
                                                </li>
                                                <li><strong>هزینه
                                                        ارسال:-</strong>{{number_format($order->seller->default_shipping)}}
                                                </li>
                                                <li class="text-danger"><strong>تخفیف:-</strong> 0</li>
                                            </ul>
                                            <h3 class="mb-0 text-success">{{number_format($order->price)}} هزار
                                                تومان </h3>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h2 style="text-align: right">وضعیت پرداخت :
                                <div class="badge badge-success">پرداخت نشده</div>
                            </h2>
                            <div class="container mt-3" style="direction: rtl;text-align: right;">
                                <div class="row clearfix">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5><strong>شماره سفارش: </strong> #{{$order->id}}</h5>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <address>
                                                            <strong>فروشنده {{$order->seller->name}}.</strong><br>
                                                            {{$order->seller->address ?? ''}}<br>
                                                            <abbr title="Phone">ت:</abbr> {{$order->seller->mobile}}
                                                        </address>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 text-right">
                                                        <p class="mb-0"><strong>تاریخ سفارش: </strong>{{$order->created_at}}</p>
                                                        {{--                                    <p class="mb-0"><strong>وضعیت سفارش: </strong> <span class="badge badge-success">موفقیت</span></p>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover c_table theme-color">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th width="60px">آیتم</th>
                                                                    <th></th>
                                                                    <th class="hidden-sm-down">توضیحات</th>
                                                                    <th>تعداد</th>
                                                                    <th class="hidden-sm-down">هزینه واحد</th>
                                                                    <th>مجموع</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><img src="{{$order->product->image_thumb}}" width="40"
                                                                             alt="Product img"></td>
                                                                    <td>{{$order->product->title ?? ''}}</td>
                                                                    <td class="hidden-sm-down">{{$order->note ?? ''}}</td>
                                                                    <td>{{$order->qty}}</td>
                                                                    <td class="hidden-sm-down">{{$order->product->price}} هزار
                                                                        تومان
                                                                    </td>
                                                                    <td>{{$order->price}}</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                                <form action="{{route('payment')}}" method="post">
                                                    <input type="hidden" name="order_id" value="{{$order->id}}">
                                                    <div class="row">
                                                        @csrf
                                                        <div class="col-md-6">
                                                            <h5>توجه</h5>
                                                            <p>امیدواریم خرید لذت بخشی داشته باشید.</p>
                                                        </div>
                                                        <div class="col-md-6 text-right">
                                                            <ul class="list-unstyled">
                                                                <li><strong>زیر مجموع:-</strong> {{number_format($order->product->price)}}
                                                                    هزار تومان
                                                                </li>
                                                                <li><strong>هزینه
                                                                        ارسال:-</strong>{{number_format($order->seller->default_shipping)}}
                                                                </li>
                                                                <li class="text-danger"><strong>تخفیف:-</strong> 0</li>
                                                            </ul>
                                                            <h3 class="mb-0 text-success">{{number_format($order->price)}} هزار تومان </h3>

                                                        </div>
                                                        <button type="submit" class="btn btn-success text-center">پرداخت مجدد</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    @endsection

    @section('scripts')
        <!-- Jquery-2.2.4 JS -->
            <script src="{{asset('front/js/jquery-2.2.4.min.js')}}"></script>

            <!-- Popper js -->
            <script src="{{asset('front/js/popper.min.js')}}"></script>
            <!-- Bootstrap-4 Beta JS -->
            <script src="{{asset('front/js/bootstrap.min.js')}}"></script>
            <!-- All Plugins JS -->
            <script src="{{asset('front/js/plugins.js')}}"></script>
            <!-- Slick Slider Js-->
            <script src="{{asset('front/js/slick.min.js')}}"></script>
            <!-- Footer Reveal JS -->
            <script src="{{asset('front/js/footer-reveal.min.js')}}"></script>
            <!-- Active JS -->
            <script src="{{asset('front/js/active.js')}}"></script>

@endsection