@extends('layouts.admin_layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست تراکنش های مالی</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}"><i
                                        class="zmdi zmdi-home"></i> {{auth()->user()->title}}</a></li>
                        <li class="breadcrumb-item active">لیست تراکنش های مالی</li>
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
                                    <th>نام خریدار</th>
                                    <th>تلفن خریدار</th>
                                    <th>کد محصول</th>
                                    <th>شماره سفارش</th>
                                    <th>قیمت</th>
                                    <th data-breakpoints="sm xs">وضعیت پرداخت</th>
                                    <th data-breakpoints="xs">کد پیگیری</th>
                                    <th data-breakpoints="xs md">نوع تراکتش</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $key=>$transaction)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$transaction->buyer->name}}</td>
                                        <td>{{$transaction->buyer->mobile}}</td>
                                        <td><h5>{{$transaction->product->id}}</h5></td>
                                        <td>{{$transaction->order->id}}</td>
                                        <td>{{$transaction->price}}</td>
                                        <td><span class="col-{{$transaction->status}}">@if($transaction->status == 'green')
                                                    پرداخت شده @else پرداخت نشده @endif</span></td>
                                        <td>{{$transaction->verify_code ?? ''}}</td>
                                        <td>{{$transaction->transaction_type == 1 ? 'مستقیم' : 'واسط'}}</td>

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