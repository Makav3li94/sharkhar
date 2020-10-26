@extends('layouts.admin_layout',['title' => 'پیگیری سفارشات','b_level2'=>'پیگیری سفارشات','back'=>'true'])
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
                content: "تصویر";
            }

            td:nth-of-type(4):before {
                content: "قیمت";
            }

            td:nth-of-type(4):before {
                content: "فروشنده";
            }

            td:nth-of-type(6):before {
                content: "تحویل";
            }

            td:nth-of-type(7):before {
                content: "پرداخت";
            }

            td:nth-of-type(8):before {
                content: "عملیات";
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
            @if(count($orders) > 0)
                <div class="card">
                    <div class="body">
                        <div class="col-lg-12">

                            <div class="">
                                <table class="table ">
                                    <thead>
                                    <tr>
                                        <th class="nono">ردیف</th>
                                        <th>تصویر</th>
                                        <th>قیمت</th>
                                        <th>فروشنده</th>
                                        <th class="nono"> شماره تلفن فروشنده</th>
                                        <th>نحویل</th>
                                        <th>تایید جنس</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key=>$order)
                                        <tr>
                                            <td class="nono">{{$key + 1}}</td>
                                            <td><img src="{{asset($order->product->image_thumb)}}" width="48"
                                                     alt="Product img"></td>
                                            <td>{{$order->product->price}}</td>
                                            <td>{{$order->seller->name}}</td>
                                            <td class="nono">{{$order->seller->mobile}}</td>
                                            <td>
                                                <span class="col-{{$order->deliver_status}}">
                                                    @if($order->deliver_status == 'green')
                                                        تحویل گرفتم @else تحویل نگرفتم @endif
                                                </span>
                                            </td>
                                            <td>
                                                <span class="col-{{$order->payment_status}}">@if($order->payment_status == 'green')
                                                        پرداخت کردم @else پرداخت نکردم @endif</span></td>
                                            <td>
                                                <a href="{{route('buyer.police.edit',$order->id)}}" title="جزئیات"
                                                   class="btn btn-default waves-effect waves-float btn-sm waves-green"><i
                                                            class="zmdi zmdi-edit"></i></a>
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
                            فعلا سفارشی ندادید :(
                        </p>

                    </div>
                </div>
            @endif
            @if($orders->hasPages()  )
                <div class="card">
                    <div class="body">
                        {{$orders->links('vendor.pagination.custom')}}
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