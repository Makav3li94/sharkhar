@extends('layouts.admin_layout',['title' => 'لیست فروشندگان ها','b_level2'=>'لیست فروشندگان ها','back'=>'true'])

@section('content')


    <div class="container">
        <div class="row clearfix">


            <div class="card">
                <div class="header">
                    <h2><strong>لیست</strong> فروشندگان</h2>
                </div>
                <div class="body">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive ">
                                <table class="table js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th class="nono">#</th>
                                        <th>یوزر</th>
                                        <th>نام</th>
                                        <th>موبایل</th>
                                        <th>وضعیت</th>
                                        <th>وضعیت تایید</th>
                                        <th>نحوه پرداخت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sellers as $key=>$seller)
                                        <tr>
                                            <td class="nono"><strong>{{$key + 1}}</strong></td>
                                            <td>{{$seller->insta_user}}</td>
                                            <td>{{$seller->name}}</td>
                                            <td>{{$seller->mobile}}</td>
                                            <td>
                                                @if($seller->status == 'green')
                                                    فعال
                                                @elseif($seller->status == 'red')
                                                    غیر فعال
                                                @endif
                                            </td>
                                            <td>
                                                @if($seller->is_verified == 'green')
                                                    تایید شده
                                                @elseif($seller->is_verified == 'red')
                                                    غیر تایید
                                                @endif
                                            </td>
                                            <td>
                                                @if($seller->bank_status == 'green')
                                                    مستقیم
                                                @elseif($seller->bank_status == 'red')
                                                    واسطه
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{route('admin.sellers.edit',$seller->id)}}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    @endsection

@section('scripts')
    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
@endsection