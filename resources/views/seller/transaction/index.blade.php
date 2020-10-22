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
            td:nth-of-type(2):before {
                content: "خریدار";
            }

            td:nth-of-type(4):before {
                content: "کد محصول";
            }

            td:nth-of-type(5):before {
                content: "شماره سفارش";
            }

            td:nth-of-type(6):before {
                content: "قیمت";
            }
            td:nth-of-type(7):before {
                content: "وضعیت";
            }
            td:nth-of-type(8):before {
                content: "کد پیگیری";
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

    <div class="container">
        <div class="row clearfix">
            @if(count($transactions) > 0)
            <div class="card">
                <div class="body">
                    <div class="col-lg-12">

                        <div>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="nono">ردیف</th>
                                    <th>خریدار</th>
                                    <th class="nono">تلفن</th>
                                    <th>کد محصول</th>
                                    <th>شماره سفارش</th>
                                    <th >قیمت</th>
                                    <th >وضعیت </th>
                                    <th>کد پیگیری</th>
                                    <th class="nono">نوع تراکتش</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $key=>$transaction)
                                    <tr>
                                        <td class="nono">{{$key + 1}}</td>
                                        <td>{{$transaction->buyer->name}}</td>
                                        <td class="nono">{{$transaction->buyer->mobile}}</td>
                                        <td><h5>{{$transaction->product->id}}</h5></td>
                                        <td>{{$transaction->order->id}}</td>
                                        <td>{{number_format($transaction->price)}}</td>
                                        <td><span class="col-{{$transaction->status}}">@if($transaction->status == 'green')
                                                    پرداخت شده @else پرداخت نشده @endif</span></td>
                                        <td>{{$transaction->verify_code ?? ''}}</td>
                                        <td class="nono">{{$transaction->transaction_type == 1 ? 'مستقیم' : 'واسط'}}</td>
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
            @if($transactions->hasPages()  )
                <div class="card">
                    <div class="body">
                        <div class="col-lg-12">
                            {{$transactions->links('vendor.pagination.custom')}}
                        </div>
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
        $(function () {
            $('.data_table').DataTable();
        });
    </script>
@endsection