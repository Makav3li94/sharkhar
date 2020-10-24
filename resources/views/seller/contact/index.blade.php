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
                        @if($tickets->count() > 0)
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="nono">#</th>
                                        <th>عنوان</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tickets as $key=>$ticket)
                                        <tr>
                                            <td class="nono"><strong>{{$key + 1}}</strong></td>
                                            <td>{{$ticket->subject}}</td>
                                            <td>{{$ticket->created_at}}</td>
                                            <td>
                                                <a href="{{route('seller.contacts.edit',$ticket->id)}}">
                                                    <span class="badge badge-{{$ticket->status}}">
                                                        @if($ticket->status == 'success')
                                                                پاسخ داده شده
                                                            @elseif($ticket->status == 'info')
                                                                در حال بررسی
                                                            @else
                                                            بسته شده
                                                        @endif
                                                    </span>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    {{$tickets->links('vendor.pagination.custom')}}
                                </table>
                            </div>
                        @else
                                <div class="card">
                                    <div class="body">
                                        <p class="text-primary text-center m-0">
                                            شما تیکتی ارسال نکرده اید.
                                        </p>
                                    </div>
                                </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
