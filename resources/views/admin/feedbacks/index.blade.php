@extends('layouts.admin_layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست بازخورد ها</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('buyer.dashboard')}}"><i
                                        class="zmdi zmdi-home"></i> {{auth()->guard('buyer')->user()->title}}</a></li>
                        <li class="breadcrumb-item active">لیست بازخورد ها</li>
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
                                    <th>نام محصول</th>
                                    <th data-breakpoints="sm xs">فروشنده</th>
                                    <th data-breakpoints="xs">نام فروشنده</th>
                                    <th data-breakpoints="xs">تلفن فروشنده</th>
                                    <th data-breakpoints="xs md">تجربه خرید</th>
                                    <th data-breakpoints="sm xs md">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($feedbacks as $key=>$feedback)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td><img src="{{asset($feedback->product->image_thumb)}}" width="48"
                                                 alt="Product img"></td>
                                        <td><h5>{{$feedback->product->title}}</h5></td>
                                        <td>{{$feedback->seller->insta_user}}</td>
                                        <td>{{$feedback->seller->name}}</td>
                                        <td>{{$feedback->seller->mobile}}</td>
                                        <td>
                                            <span class="col-{{$feedback->score}}">
                                                @if($feedback->score == 'green')
                                                    عالی :)
                                                @elseif($feedback->score == 'warning')
                                                    معمولی :|
                                                @else
                                                    دوست نداشتم :(
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{route('buyer.feedbacks.edit',$feedback->id)}}" title="جزئیات"
                                               class="btn btn-default waves-effect waves-float btn-sm waves-green"><i
                                                        class="zmdi zmdi-edit"></i></a>
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