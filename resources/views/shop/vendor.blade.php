@extends('layouts.admin_layout',['title' => 'فروشگاه','b_level2'=>$seller->insta_user,'hide'=>'true'])
@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12">
                <div class="card mcard_1">
                    <div class="body">


                        <div class="img">
                            <img src="{{$seller->background ?? 'assets/images/image-gallery/2.jpg'}}" class="img-fluid"
                                 alt="">

                        </div>
                        <div class="body">
                            <div class="user">
                                <img src="{{$seller->logo}}" class="rounded-circle img-raised"
                                     alt="profile-image">
                                <h5 class="mt-3 mb-1">{{$seller->insta_user}}</h5>
                                <span class="text-info">{{$seller->category}}</span>
                                <p>{!! $seller->bio !!}</p>
                            </div>
                            <div class="d-flex bd-highlight text-center mt-4">
                                <div class="flex-fill bd-highlight">
                                    <h5 class="mb-0">{{$seller->posts}}</h5>
                                    <small>پست</small>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <h5 class="mb-0">{{number_format($seller->followers)}}</h5>
                                    <small>دنبال کننده</small>
                                </div>
                                <div class="flex-fill bd-highlight">
                                    <h5 class="mb-0">{{number_format($seller->following)}}</h5>
                                    <small>دنبال کردن</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="body">
                        @if(count($feedbacks) > 0)
                            <ul class="row list-unstyled c_review">
                                @foreach($feedbacks as $feedback)
                                    <li class="col-12">
                                        <div class="avatar">
                                            <a href="javascript:void(0);">
                                                <img class="rounded"
                                                     src="{{asset('assets/images/user-placeholder.png')}}"
                                                     alt="user" width="60"></a>
                                        </div>
                                        <div class="comment-action">
                                            <h6 class="c_name">{{$feedback->buyer->name}}</h6>
                                            <p class="c_msg m-b-0">{{\Illuminate\Support\Str::limit($feedback->body,70)}} </p>
                                            <div class="badge badge-info">{{\Illuminate\Support\Str::limit($feedback->product->title,15)}}</div>
                                            <span class="m-l-10" style="position:absolute ;top:39px">
                                            @if($feedback->score == 'green')
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star col-amber"></i></a>
                                                @elseif($feedback->score == 'warning')
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star-outline text-muted"></i></a>
                                                @else
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star col-amber"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star-outline text-muted"></i></a>
                                                    <a href="javascript:void(0);"><i
                                                                class="zmdi zmdi-star-outline text-muted"></i></a>
                                                @endif
                                        </span>
                                            <small class="comment-date float-sm-right pt-1">{{$feedback->created_at}}</small>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-primary text-center m-0">
                                فعلا بازخوردی ثبت نشده :(
                            </p>
                            <hr>
                        @endif
                        <div class="user">
                            <div class="d-flex">
                                <h2 class="font-18 flex-grow-1 mb-0">{{$seller->name}}

                                </h2>
                                <div class=" badge  badge-{{$sellerColor}}  ">{{$sellerIsVerified}}</div>
                            </div>
                            <hr>
                            <span class="text-info">{{$seller->mobile}}</span>
                            <br>
                            <span class="text-info"><strong>مجموع بازخورد
                                    ها:</strong> ' {{$seller->feedbacks->count()}}</span>
                            <ul class="list-unstyled mt-3 d-flex">
                                <li class="mr-3 p-2 mp-res badge badge-success"> عالی: {{$good}} :)</li>
                                <li class="mr-3 p-2 mp-res badge badge-info">معمولی: {{$normal}}</li>
                                <li class="mr-3 p-2 mp-res badge badge-danger"> ضعیف :{{$bad}}</li>
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
                </div>


            </div>
        </div>
        <div class="row clearfix">
            @foreach($products as $product)
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="body product_item">
                            <span class="label onsale">فروشی!</span>
                            <img src="{{$product->image}}" alt="{{$seller->title}}" class="img-fluid cp_img"/>

                            <div class="d-flex mt-3">
                                <div class="pr-2 ml-auto">
                                    <i class="zmdi zmdi-thumb-up col-blue"></i>
                                    <span>{{$product->like_count}} لایک</span>
                                </div>
                                <div class="pr-2">
                                    <i class="zmdi zmdi-comment-text col-red"></i>

                                    <span>{{$product->comment_count}} نظر</span>
                                </div>
                            </div>
                            <hr>
                            <div class="product_details">
                                <a class="text-justify font-13 d-inline-block"
                                   href="{{route('product',$product->id)}}">{{\Illuminate\Support\Str::limit($product->title,80)}}</a>

                                <ul class="product_price list-unstyled justify-content-center">
                                    <li class="new_price">{{number_format($product->price)}} هزار تومان</li>
                                </ul>
                            </div>
                            <div class="action text-center">
                                <a href="{{route('product',$product->id)}}"
                                   class="btn btn-raised btn-primary btn-round waves-effect">
                                    می خوامش !
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
        @if($products->hasPages()  )
            <div class="row clearfix">
                <div class="card">
                    <div class="body">
                        {{$products->links('vendor.pagination.custom')}}
                    </div>
                </div>
            </div>

        @endif

    </div>
@endsection
@section('scripts')

@endsection
@section('styles')
    <style>
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
@endsection