@extends('layouts.admin_layout',['title' => 'لیست بازخورد ها','b_level2'=>'لیست بازخورد ها','back'=>'true'])
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
                content: "کدسفارش";
            }

            td:nth-of-type(3):before {
                content: "خریدار";
            }

            td:nth-of-type(4):before {
                content: "بازخورد";
            }

            td:nth-of-type(5):before {
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
            .page-item.active {

                display: block;
            }
        }
    </style>
@endsection
@section('content')


    <div class="container">
        <div class="row clearfix">

            <div class="card">
                <div class="header">
                    <h2><strong>بازخورد های</strong> شما</h2>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="user">
                                <h1 class="mt-3 mb-1">نام فروشگاه در ایسنتاگرام: {{$seller->insta_user}}</h1>
                                <hr>
                                <p>
                                    {!! $seller->bio !!}
                                </p>
                                <h3 class="mt-3 mb-1">{{$seller->name}}
                                    <div class="badge  badge-{{$seller->is_verified == 'red'  ? 'danger' : 'success'}}">{{$seller->is_verified =='green' ? 'تایید شده توسط شرخر' : 'تایید نشده :('}}</div>
                                </h3>
                                <h4 class="text-info">{{$seller->mobile}}</h4>
                                <br>
                                <h5 class="text-info"><strong>مجموع بازخورد
                                        ها:</strong> {{$seller->feedbacks->count()}}</h5>
                                <ul class="list-unstyled mt-3 d-flex">
                                    <li class="mr-3 badge badge-success"> :) عالی: {{$good}}</li>
                                    <li class="mr-3 badge badge-info">معمولی: {{$normal}}</li>
                                    <li class="mr-3 badge badge-danger">باید بهتر باشه : {{$bad}}</li>
                                </ul>


                                <div class="progress m-b-5">
                                    <div class="progress-bar progress-bar-success" style="width: {{$p_good}}%">
                                        <span class="sr-only">{{$p_good}}٪ کامل (موفقیت)</span>
                                    </div>
                                    <div class="progress-bar progress-bar-warning progress-bar-striped"
                                         style="width: {{$p_norm}}%">
                                        <span class="sr-only">{{$p_norm}}٪ کامل (هشدار)</span>
                                    </div>
                                    <div class="progress-bar progress-bar-danger" style="width: {{$p_bad}}%">
                                        <span class="sr-only">{{$p_bad}}٪ کامل (خطر)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="img">
                                <img src="{{$seller->logo}}" class="rounded-circle" alt="profile-image">
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            @if(count($feedbacks) > 0)
                <div class="card">
                    <div class="body">
                        <div class="col-lg-12">
                            <div class="">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="nono">
                                            ردیف
                                        </th>
                                        <th>
                                            کد سفارش
                                        </th>
                                        <th>خریدار</th>
                                        <th>بازخورد</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feedbacks as $key=>$feedback)
                                        <tr>
                                            <td class="nono">{{$key +1 }}</td>
                                            <td>
                                                <a href="{{route('seller.orders.edit',$feedback->order->id)}}">
                                                   {{ $feedback->order->id}}
                                                </a>
                                            </td>
                                            <td>{{$feedback->buyer->name}}</td>
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
                                                <a href="{{route('seller.feedbacks.edit',$feedback->id)}}"
                                                   title="جزئیات"
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
                    فعلا بازخوردی ندارید :(
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
        $(function () {
            $('.data_table').DataTable();
        });
    </script>
@endsection