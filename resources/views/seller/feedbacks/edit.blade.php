@extends('layouts.admin_layout',['title' => 'اطلاعات بازخورد','b_level1'=>'لیست بازخورد ها','b_level2'=>'اطلاعات بازخورد #'. $feedback->id ,'back'=>'true'])

@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-6 col-sm-12 pr-0 p-res-0">
            <div class="card">
                <div class="header">
                    <h2><strong>اطلاعات </strong> سفارش</h2>
                </div>
                <div class="body">
                    <div class="col-lg-12 col-md-12">
                        <small class="text-muted">نام محصول:</small>
                        <div class="row">
                            <div class="col-lg-8"><p>{{\Illuminate\Support\Str::limit($product->title,40)}}</p>
                            </div>
                            <div class="col-lg-4 text-left"><a title="مشاهده محصول" class="badge badge-info"
                                                               href="{{route('seller.products.edit',$product->id)}}"><i
                                            class="zmdi zmdi-eye"></i></a></div>
                        </div>
                        <hr>
                        <small class="text-muted">مبلغ پرداختی خریدار:</small>
                        <p>{{number_format($order->price)}} هزار تومان</p>
                        <hr>
                        <small class="text-muted">تاریخ خرید:</small>
                        <p>{{$order->created_at}}</p>
                        <hr>
                        <small class="text-muted">وضعیت خرید:</small>
                        <p>
                                <span class="col-{{$order->deliver_status}}">@if($order->deliver_status == 'green')
                                        تحویل شده @else درحال ارسال @endif</span>

                        </p>
                        <hr>
                        <small class="text-muted">وضعیت پرداخت:</small>
                        <p>
                                <span class="col-{{$order->payment_status}}">@if($order->payment_status == 'green')
                                        پرداخت شده @else پرداخت نشده @endif</span>
                        </p>
                    </div>
                </div>
            </div>
            </div>
                <div class="col-lg-6 col-sm-12 pl-0 p-res-0">
            <div class="card">
                <div class="header">
                    <h2><strong>پاسخ</strong> شما</h2>
                </div>
                <div class="body ">
                    <div class="col-lg-12 col-md-12">
                        @if($feedback->reply != null)

                            <ul class="comment-reply list-unstyled">
                                <li>
                                    <div class="icon-box"><img class="img-fluid img-thumbnail"
                                                               src="{{$seller->logo}}" width="100px"
                                                               alt="Awesome Image">
                                    </div>
                                    <div class="text-box">
                                        <h5>{{$seller->name}}</h5>
                                        <span class="comment-date">{{$feedback->updated_at}}</span>
                                        <p>{!! $feedback->reply ?? '' !!}</p>
                                    </div>
                                </li>
                                <hr>
                            </ul>
                        @else
                            <form action="{{route('seller.feedbacks.update',$feedback->id)}}" method="post">
                                @csrf
                                @method('patch')
                                    <div class="col-sm-12 p-0">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <textarea rows="4" name="body" class="form-control no-resize"
                                                      placeholder="پاسخ شما ..."></textarea>
                                            </div>
                                        </div>
                                        @if($errors->has('body'))
                                            <small class="text-danger">  {{$errors->first('body')}}</small>
                                        @endif
                                    </div>


                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-primary">ارسال پاسخ</button>
                                </div>
                            </form>
                        @endif
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2><strong>بازخورد</strong> خریدار</h2>
                </div>
                {{--                        @if($feedback->reply != null)--}}
                <div class="body ">
                    <ul class="comment-reply list-unstyled">
                    <li class="comment-user">

                        <div class="icon-box w50 ml-2">
                            <img src="{{asset('assets/images/logo-p.png')}}" width="80px" alt="شرخر">

                        </div>
                        <div class="text-box ">
                            <h5>{{$feedback->buyer->name}}</h5>
                            <span class="comment-date">{{$feedback->created_at}}</span>
                        </div>
                    </li>
                    <li>
                        <div class="w50 ml-2"></div>
                        <div class="comment-text">
                            <p>{{$feedback->body}}</p>
                        </div>
                    </li>
                    </ul>
                </div>
                {{--                        @endif--}}
            </div>
        </div>
        </div>
    </div>

@endsection
@section('styles')
    <style>
        hr {
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .comment-user{
            background-color:  #f8f9fa;
            padding: 15px 10px;
            border-top: 1px solid #e0e4e7;
        }
    </style>
@endsection

@section('scripts')
    <script>
        $(':radio').change(function () {
            console.log('New star rating: ' + this.value);
        });
    </script>
@endsection