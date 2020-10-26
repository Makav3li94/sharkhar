@extends('layouts.admin_layout',['title' => 'لیست تراکنش های مالی','b_level2'=>'لیست تراکنش های مالی','back'=>'true'])
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <style>
        @media only screen
        and (max-width: 760px), (min-device-width: 768px)
        and (max-device-width: 1024px) {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                margin: 0 0 1rem 0;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                position: absolute;
                top: 15px;
                right: 0;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: right;
            }

            tr:nth-child(2n+1) {
                background: #f4f4f4;
            }

            /*
            Label the data
        You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
            */
            td:nth-of-type(1):before {
                content: "ردیف";
            }

            td:nth-of-type(2):before {
                content: "خریدار";
            }

            td:nth-of-type(3):before {
                content: "تلفن";
            }


            td:nth-of-type(4):before {
                content: "شماره سفارش";
            }

            td:nth-of-type(5):before {
                content: "فیمت";
            }

            td:nth-of-type(6):before {
                content: "وضعیت";
            }

            td:nth-of-type(7):before {
                content: "پیگیری";
            }

            td:nth-of-type(8):before {
                content: "تراکتش";
            }

            .table td, .table th {
                text-align: left;
            }
        }

        @media screen and ( max-width: 520px ) {

            li.page-item {
                display: none;
            }

            .page-item:first-child,
            .page-item:last-child,
            .page-item:nth-last-child(2),
            .page-item:nth-child(2),
            .page-item.active {
                display: block;
            }
        }
    </style>
@endsection
@section('content')
    @if(count($transactions) == 1)
        <div class="container">
            <div class="alert alert-danger"> {{auth()->user()->name}} ،ممنون بابت استفاده! تراکنش شما شِبا شده و مطابق
                سیکل پرداخت شاپرک تصفیه خواهد شد.
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row clearfix">
            @if(count($transactions) > 0)
                <div class="card">
                    <div class="body">
                        <div class="col-lg-12">

                            <div>
                                {{--                            <table class="table">--}}
                                <table class="table js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>خریدار</th>
                                        <th>تلفن</th>
                                        <th>شماره سفارش</th>
                                        <th>قیمت</th>
                                        <th>وضعیت</th>
                                        <th>کد پیگیری</th>
                                        <th>نوع تراکتش</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $key=>$transaction)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$transaction->buyer->name}}</td>
                                            <td>{{$transaction->buyer->mobile}}</td>
                                            <td>{{$transaction->order->id}}</td>
                                            <td>{{number_format($transaction->price)}}</td>
                                            <td>
                                            <span class="col-{{$transaction->status}}">
                                                @if($transaction->status == 'green')
                                                    پرداخت شده
                                                @elseif($transaction->status == 'info')
                                                    سیستم واسطه
                                                @else
                                                    پرداخت نشده
                                                @endif
                                            </span>
                                            </td>
                                            <td>{{$transaction->verify_code ?? ''}}</td>
                                            <td>
                                                @if($transaction->transaction_type == 1)
                                                    مستقیم
                                                @else
                                                    واسط |
                                                    @if($transaction->police->is_verified == 'green')
                                                        <span class="col-{{$transaction->police->is_verified}}">  تایید شده</span>
                                                    @elseif($transaction->police->is_verified == 'warning')
                                                        <span class="col-{{$transaction->police->is_verified}}">  در حال بررسی</span>
                                                    @else
                                                        <span class="col-{{$transaction->police->is_verified}}">گزارش مشکل</span>
                                                    @endif
                                                @endif
                                                @if($transaction->transaction_type == 0)|
                                                <a href="{{route('seller.police.edit',$transaction->police->id)}}"
                                                   class="btn btn-sm btn-info">پیگیری</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="body">
                        <p class="text-primary text-center m-0">
                            فعلا تراکنشی ندارید :(
                        </p>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.js-basic-example').dataTable({
                "bSort": false
            });
        });
        $(document).ready(function () {


            if (RegExp('multipage', 'gi').test(window.location.search)) {
                introJs().setOption('doneLabel', 'صفحه بعد').start().oncomplete(function () {
                    window.location.href = '{{ url("seller/feedbacks/?multipage=true") }}';
                });
            }

        });

    </script>
@endsection