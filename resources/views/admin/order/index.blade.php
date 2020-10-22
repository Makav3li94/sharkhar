@extends('layouts.admin_layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست سفارشات</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}"><i
                                        class="zmdi zmdi-home"></i> {{auth()->user()->title}}</a></li>
                        <li class="breadcrumb-item active">لیست سفارشات</li>
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
                        <div class="table-responsive">
                            <table class="table table-hover product_item_list c_table theme-color mb-0 dataTable data_table ">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>تصویر</th>
                                    <th>کد محصول</th>
                                    <th>قیمت</th>
                                    <th data-breakpoints="sm xs">خریدار</th>
                                    <th data-breakpoints="xs">شماره تلفن خریدار</th>
                                    <th data-breakpoints="xs md">وضعیت نحویل</th>
                                    <th data-breakpoints="sm xs md">وضعیت پرداخت</th>
                                    <th data-breakpoints="sm xs md">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key=>$order)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td><img src="{{asset($order->product->image_thumb)}}" width="48" alt="Product img"></td>
                                        <td><h5>{{\Illuminate\Support\Str::limit($order->product->title,20) ?? ''}}}</h5></td>
                                        <td>{{$order->product->id}}</td>
                                        <td>{{$order->buyer->name}}</td>
                                        <td>{{$order->buyer->mobile}}</td>
                                        <td><span class="col-{{$order->deliver_status}}">@if($order->deliver_status == 'green') تحویل شده @else درحال ارسال @endif</span></td>
                                        <td><span class="col-{{$order->payment_status}}">@if($order->payment_status == 'green') پرداخت شده @else پرداخت نشده @endif</span></td>
                                        <td>
                                            <a href="{{route('seller.orders.edit',$order->id)}}" title="جزئیات" class="btn btn-default waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">


                        </div>
                    </div>
                </div>
            </div>
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