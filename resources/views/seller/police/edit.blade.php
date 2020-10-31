@extends('layouts.admin_layout',['title' => 'اطلاعات بازخورد','b_level2'=>'اطلاعات بازخورد #' .$police->id,'back'=>'true'])

@section('content')


    <div class="container">
        @if($police->admin_vote != null)
            <div class="row clearfix">
                <div class="col-lg-12 pr-0 pl-0 mr-0">
                    <div class="card mcard_4">
                        <div class="header">
                            <h2><strong>رای شرخر</strong> به این اختلاف</h2>
                        </div>
                        <div class="body">
                            @if($police->admin_vote != null)
                                <div class="alert alert-success">
                                    پلتفرم شرخر، حق را به
                                    <div class="col-red inlineblock">{{$police->admin_vote == 'seller' ? 'فروشنده' : 'خریدار'}}</div>
                                    می دهد و اقدامات مالی لازم را انجام خواهد داد.
                                    در صورت نارضایتی به رای، لطفا شماره سفارش و دلیل اعتراض را از طریق پشتیبانی پیگیری
                                    کنید.
                                </div>
                            @else

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 pr-0 mr-0">
                <div class="card mcard_4">

                    <div class="header">
                        <h2><strong>اطلاعات</strong> سفارش</h2>
                    </div>
                    <div class="body">
                        <div class="img">
                            <img src="{{$order->product->image}}" class="rounded-circle" alt="profile-image">
                        </div>
                        <div class="user">
                            <h1 class="mt-3 mb-1">{{$order->buyer->name}}</h1>
                            <h2 class="mt-3 mb-1">{{$order->buyer->mobile}}</h2>
                        </div>
                        {{--                            <ul class="list-unstyled social-links">--}}
                        {{--                                <li><a href="{{$seller->insta_link}}"><i class="zmdi zmdi-instagram"></i></a></li>--}}
                        {{--                            </ul>--}}
                    </div>

                    <div class="card mb-0">
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
                            <small class="text-muted">وضعیت تایید:</small>
                            <p>
                                                    <span class="col-{{$order->police->is_verified}}">
                                                    @if($order->police->is_verified == 'green')
                                                            تایید سفارش
                                                        @elseif($order->police->is_verified == 'blue')
                                                            در حال بررسی
                                                        @else
                                                            مشکل در کالا
                                                        @endif
                                                </span>
                            </p>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 pl-0 ml-0">
                <div class="card">
                    <div class="body">
                        <div class="alert alert-info">
                            @if($order->deliver_status == 'green')
                                تحویل مشتری داده شد @else تحویل داده نشده @endif

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="body">
                        <div class="alert alert-@if($order->police->is_verified == 'green'){{'success'}}@elseif($order->police->is_verified == 'blue'){{'info'}}@else{{'danger'}}@endif">
                            @if($order->police->is_verified == 'green')
                                تایید سفارش توسط مشتری
                            @elseif($order->police->is_verified == 'blue')
                                در حال بررسی توسط مشتری
                            @else
                                گزارش مشکل در کالا توسط مشتری
                            @endif

                        </div>
                    </div>
                </div>
                @if($police->buyer_body != null)
                    <div class="card ">
                        <div class="card mb-0">
                            <div class="header">
                                <h2><strong>شرح مسئله</strong> توسط مشتری</h2>
                            </div>
                            <div class="body">
                                <ul class="comment-reply list-unstyled">
                                    <li>
                                        <div class="icon-box">
                                            <img src="{{asset('assets/images/logo-p.png')}}"
                                                 class="img-fluid img-thumbnail" width="100px" alt="sharkhar">
                                        </div>
                                        <div class="text-box p-4">
                                            <h5>{{$police->buyer->name}}</h5>
                                            <span class="comment-date">{{$police->created_at}}</span>
                                            <p>{!! $police->buyer_body ?? '' !!}</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <hr>

                            <div class="footer">
                                <div class="row p-4">
                                    <label class="pl-3">فایل های ضمیمه مشتری</label><br>

                                    <a class="" href="{{asset($police->buyer_file)}}"><i class="zmdi zmdi-download"></i></a>
                                </div>
                            </div>
                        </div>

                        @if($police->seller_reply == null)
                        <div class="card ">
                            <div class="header">
                                <h2><strong>پاسخ شما </strong>جهت پیگیری شرخر</h2>
                            </div>

                            <div class="body mb-2">
                                <div class="body">

                                    <form action="{{route('seller.police.update',$police->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('patch')
                                        <div class="row clearfix mb-3 show-it">
                                            <div class="col-lg-12">
                                                <label for="">دلیل برحق بودنتان.</label>
                                                <textarea name="seller_reply" class="form-control w-100" id="" cols="30"
                                                          rows="3"
                                                          placeholder="پاسختان را بنویسید"></textarea>
                                                @if($errors->has('seller_reply'))
                                                    <small class="text-danger d-inline-block w-100  mt-2">
                                                        {{$errors->first('seller_reply')}}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row clearfix mb-3 ">
                                            <div class="col-lg-12 ">
                                                <label>ارسال فایل جهت بررسی</label>
                                                <input type="file" name="seller_file" class="dropify " data-height="200"
                                                       data-allowed-file-extensions="pdf png jpeg jpg rar zip"
                                                       data-max-file-size="2M">
                                                @if($errors->has('seller_file'))
                                                    <small class="text-danger d-inline-block w-100  mt-2">
                                                        {{$errors->first('seller_file')}}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success">ثبت</button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>

                        </div>
                        @endif
                        @endif

                        @if($police->seller_reply != null)
                            <div class="card mb-0">
                                @if($police->seller_reply != null)
                                    <div class="card mb-0">
                                        <div class="header">
                                            <h2><strong>شرح موضوع</strong> توسط فروشنده</h2>
                                        </div>
                                        <div class="body">
                                            <ul class="comment-reply list-unstyled">
                                                <li>
                                                    <div class="icon-box">
                                                        <img src="{{asset($police->seller->logo)}}"
                                                             class="img-fluid img-thumbnail" width="100px"
                                                             alt="sharkhar">
                                                    </div>
                                                    <div class="text-box p-4">
                                                        <h5>{{$police->seller->name}}</h5>
                                                        <span class="comment-date">{{$police->updated_at}}</span>
                                                        <p>{!! $police->seller_reply ?? '' !!}</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <hr>

                                        <div class="footer">
                                            <div class="row p-4">
                                                <label class="pl-3">فایل های ضمیمه شما</label><br>

                                                <a href="{{asset($police->seller_file)}}"><i
                                                            class="zmdi zmdi-download"></i></a>
                                            </div>
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

                        @endif

                    </div>
            </div>
        </div>


        @endsection
        @section('styles')
            <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
            <link href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet"/>
            <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">

            <style>
                .note-editor {
                    width: 100%;
                }
            </style>
        @endsection

        @section('scripts')
            <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>

            <script>
                "use strict";
                $('.dropify').dropify({
                    messages: {}
                });
            </script>
            <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
            <script>
                $(document).ready(function () {

                    if ($('#deliver_status').val()) {
                        if ($('#is_verified').val() != 2) {
                            $('#is_verified').prop("disabled", false);
                            $('#is_verified').selectpicker('refresh');
                        }
                    }
                })
                $('#deliver_status').on('change', function () {
                    if ($(this).val() == 1) {
                        // $('#is_verified').attr('disabled',false)
                        $('#is_verified').prop("disabled", false);
                        $('#is_verified').selectpicker('refresh');
                    }
                })

                $('#is_verified').on('change', function () {
                    if ($(this).val() == 0) {
                        $('.show-it').prop("hidden", false);
                    }
                })
            </script>
@endsection