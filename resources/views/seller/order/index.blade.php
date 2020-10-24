@extends('layouts.admin_layout',['title' => 'لیست سفارشات','b_level2'=>'لیست سفارشات','back'=>'true'])
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@endsection
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
            content: "تصویر";
        }
        td:nth-of-type(3):before {
            content: "";
        }
        td:nth-of-type(4):before {
            content: "قیمت";
        }

        td:nth-of-type(5):before {
            content: "خریدار";
        }
        td:nth-of-type(6):before {
            content: "تلفن";
        }
        td:nth-of-type(7):before {
            content: "تحویل";
        }
        td:nth-of-type(8):before {
            content: "پرداخت";
        }
        td:nth-of-type(9):before {
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
@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="col-lg-12">
                        @if(count($orders) > 0)
                            <div class="">
{{--                                <table class="table">--}}
                                <table class="table js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>تصویر</th>
                                        <th>نام محصول</th>
                                        <th>قیمت</th>
                                        <th>خریدار</th>
                                        <th>شماره تلفن خریدار</th>
                                        <th> تحویل</th>
                                        <th> پرداخت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $key=>$order)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <a class="soso none"
                                                   href="{{route('seller.products.edit',$order->product->id)}}"
                                                   target="_blank">
                                                    <img src="{{asset($order->product->image_thumb)}}" width="35"
                                                         alt="Product img">
                                                </a>
                                                <img class="nono" src="{{asset($order->product->image_thumb)}}"
                                                     width="35" alt="Product img">
                                            </td>
                                            <td>{{\Illuminate\Support\Str::limit($order->product->title,55)}}</td>
                                            <td>{{$order->product->price}}</td>
                                            <td>{{$order->buyer->name}}</td>
                                            <td>{{$order->buyer->mobile}}</td>
                                            <td><span class="col-{{$order->deliver_status}}">@if($order->deliver_status == 'green')
                                                        تحویل شده @else درحال ارسال @endif</span></td>
                                            <td><span class="col-{{$order->payment_status}}">@if($order->payment_status == 'green')
                                                        پرداخت شده @else پرداخت نشده @endif</span></td>
                                            <td>
                                                <a href="{{route('seller.orders.edit',$order->id)}}" title="جزئیات"
                                                   class="btn btn-default waves-effect waves-float btn-sm waves-green"><i
                                                            class="zmdi zmdi-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-primary text-center m-0">
                                فعلا سفارشی ندارید :(
                            </p>
                        @endif
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <!-- SweetAlert Plugin Js -->
    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script>
        $(document).ready( function () {$('.js-basic-example').dataTable( {
            "bSort": false
        } );
        } );

        $(document).ready(function () {


            if (RegExp('multipage', 'gi').test(window.location.search)) {
                introJs().setOption('doneLabel', 'صفحه بعد').start().oncomplete(function () {
                    window.location.href = '{{ url("seller/transactions/?multipage=true") }}';
                });
            }

        });
    </script>
@endsection