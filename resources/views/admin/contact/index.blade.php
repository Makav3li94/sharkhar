@extends('layouts.admin_layout',['title' => 'لیست تیکت ها','b_level2'=>'لیست تیکت ها','back'=>'true'])

@section('content')


    <div class="container">
        <div class="row clearfix">


            <div class="card">
                <div class="header">
                    <h2><strong>لیست</strong> تیکت ها</h2>
                </div>
                <div class="body">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="table-responsive">
                                <table class="table js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>عنوان</th>
                                        <th>از طرف</th>
                                        <th>نام</th>
                                        <th>موبایل</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets as $key=>$ticket)
                                        <tr>
                                            <td><strong>{{$key + 1}}</strong></td>
                                            <td>{{$ticket->subject}}</td>
                                            <td>
                                                @if($ticket->seller_id == 1)
فروشنده
                                                @elseif($ticket->buyer_id == 1)
خریدار
                                                @elseif($ticket->seller_id == 0 && $ticket->seller_id == 0 && $ticket->admin_id == 0)
کاربر
                                                @endif
                                            </td>
                                            <td>
                                                @if($ticket->seller_id == 1)
                                                    {{$ticket->seller->name}}
                                                @elseif($ticket->buyer_id == 1)
                                                    {{$ticket->buyer->name}}
                                                @elseif($ticket->seller_id == 0 && $ticket->seller_id == 0 && $ticket->admin_id == 0)
                                                    کاربر
                                                @endif
                                            </td>
                                            <td>
                                                @if($ticket->seller_id == 1)
                                                    {{$ticket->seller->mobile}}
                                                @elseif($ticket->buyer_id == 1)
                                                    {{$ticket->buyer->mobile}}
                                                @elseif($ticket->seller_id == 0 && $ticket->seller_id == 0 && $ticket->admin_id == 0)
                                                    {{$ticket->mobile}}
                                                @endif
                                            </td>
                                            <td>{{$ticket->created_at}}</td>
                                            <td>
                                                <a href="{{route('buyer.contacts.edit',$ticket->id)}}">
                                                    <span class="badge badge-{{$ticket->status}}">
                                                        @if($ticket->status == 'success')
                                                            پاسخ داده شده
                                                        @elseif($ticket->status == 'info')
                                                          جدید
                                                        @else
                                                            بسته شده
                                                        @endif
                                                    </span>
                                                </a>

                                            </td>
                                            <td><a href="{{route('admin.contacts.edit',$ticket->id)}}"><i class="zmdi zmdi-edit"></i></a></td>
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