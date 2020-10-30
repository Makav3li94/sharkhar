@extends('layouts.admin_layout',['title' => 'اطلاعات بازخورد','b_level2'=>'اطلاعات بازخورد #' .$feedback->id,'back'=>'true'])

@section('content')

        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card mcard_4">
                        <div class="header">
                            <h2><strong>اطلاعات</strong> فروشنده</h2>
                        </div>
                        <div class="body">
                            <div class="img">
                                <img src="{{$order->seller->logo}}" class="rounded-circle" alt="profile-image">
                            </div>
                            <div class="user">
                                <h1 class="mt-3 mb-1">{{$order->seller->insta_user}}</h1>
                                <h2 class="mt-3 mb-1">{{$order->seller->name}}
                                    <div class="badge  badge-{{$seller->is_verified == 'red'  ? 'danger' : 'success'}}">{{$seller->is_verified =='green' ? 'تایید شده توسط شرخر' : 'تایید نشده :('}}</div>
                                </h2>
                                <small class="text-info">{{$order->seller->mobile}}</small>
                                <br>
                                <small class="text-info"><strong>مجموع بازخورد
                                        ها:</strong> {{$order->seller->feedbacks->count()}}</small>
                                <ul class="list-unstyled mt-3 d-flex">
                                    <li class="mr-3 badge badge-success"> :) فروشنده عالی: {{$good}}</li>
                                    <li class="mr-3 badge badge-info">فروشنده معمولی: {{$normal}}</li>
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
                            {{--                            <ul class="list-unstyled social-links">--}}
                            {{--                                <li><a href="{{$seller->insta_link}}"><i class="zmdi zmdi-instagram"></i></a></li>--}}
                            {{--                            </ul>--}}
                        </div>
                    </div>

                    <div class="card">
                        <div class="header">
                            <h2><strong>اطلاعات </strong> سفارش</h2>
                        </div>
                        <div class="body">
                            <small class="text-muted">نام محصول:</small>
                            <div class="row">
                                <div class="col-lg-8"><p>{{\Illuminate\Support\Str::limit($product->title,40)}}</p>
                                </div>
                                <div class="col-lg-4 text-left"><a title="مشاهده محصول" class="badge badge-info"
                                                                   href="{{route('product',$product->id)}}"><i
                                                class="zmdi zmdi-eye"></i></a></div>
                            </div>
                            <hr>
                            <small class="text-muted">مبلغ پرداختی شما:</small>
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
                            <hr>

                        </div>
                        <div class="card">
                            <div class="header">
                                <h2><strong>آخرین</strong>  بازخورد ها</h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover product_item_list c_table theme-color mb-0 dataTable data_table ">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>امتیاز</th>
                                            <th>متن</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($feedbacks as $key=>$feedback)
                                            <tr>
                                                <td><strong>{{$key + 1}}</strong></td>
                                                <td>
                                                    <span class="col-{{$feedback->score}}">
                                                    @if($feedback->score == 'green')
                                                            خرید عالی :)
                                                        @elseif($feedback->score == 'warning')
                                                            خرید معمولی :|
                                                        @elseif($feedback->score == 'red')
                                                            باید بهتر شه :(
                                                        @endif
                                                    </span>
                                                </td>
                                                <td><span class="badge badge-info">{{$feedback->body ?? ''}}</span></td>
                                            </tr>
                                        @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h3><strong>ارسال</strong>فیدبک ( تجربه خرید شما از این فروشنده چطور بود ؟ ) </h3>
                        </div>
                        <div class="body">
                            <div class="input-group  mb-5">
                                <textarea name="body" rows="2" class="w-100" disabled></textarea>
                            </div>
                            <div class="col-md-12">
                                <label>امتیاز شما به خرید</label>
                                <div class=" rating">
                                    <label>
                                        <input type="radio" name="stars" value="1"/>
                                        <span class="icon"><i class="zmdi zmdi-star"></i></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="2"/>
                                        <span class="icon"><i class="zmdi zmdi-star"></i></span>
                                        <span class="icon"><i class="zmdi zmdi-star"></i></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" value="3"/>
                                        <span class="icon"><i class="zmdi zmdi-star"></i></span>
                                        <span class="icon"><i class="zmdi zmdi-star"></i></span>
                                        <span class="icon"><i class="zmdi zmdi-star"></i></span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>بازخورد</strong> شما</h2>
                        </div>
                        {{--                        @if($feedback->reply != null)--}}
                        <div class="body mb-2">
                            <div class="body">
                                <ul class="comment-reply list-unstyled">
                                    <li>
                                        <div class="icon-box">
                                            <img src="{{asset('assets/images/logo-p.png')}}" class="img-fluid img-thumbnail" width="100px" alt="sharkhar">
                                        </div>
                                        <div class="text-box">
                                            <h5>{{$feedback->buyer->name}}</h5>
                                            <span class="comment-date">{{$feedback->created_at}}</span>
                                            <p>{!! $feedback->body ?? '' !!}</p>
                                        </div>
                                    </li>
                                    <hr>
                                </ul>
                            </div>
                        </div>
                        {{--                        @endif--}}
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>پاسخ</strong> فروشنده</h2>
                        </div>
                        @if($feedback->reply != null)
                            <div class="body mb-2">
                                <div class="body">
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
                                </div>
                            </div>
                            @else
                            <div class="body mb-2">
                                <div class="body">
                                    <div class="alert alert-info">فروشنده هنوز پاسخی به شما نداده است.</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
        @endsection
        @section('styles')
            <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
            <style>
                .note-editor {
                    width: 100%;
                }
            </style>
        @endsection

        @section('scripts')
            <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
            <script>
                $(':radio').change(function () {
                    console.log('New star rating: ' + this.value);
                });
            </script>
@endsection