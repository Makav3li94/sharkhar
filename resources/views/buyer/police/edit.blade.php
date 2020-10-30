@extends('layouts.admin_layout',['title' => 'سیستم واسطه','b_level2'=>'پیگیری سفارش #' .$police->id ,'back'=>'true'])

@section('content')


    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12 pr-0 pl-0 mr-0">

            <div class="card mcard_4">

                    <div class="header">
                        <h2><strong>رای شرخر</strong> به این اختلاف</h2>
                    </div>
                    <div class="body">
                        @if($police->admin_vote != null)
                            <div class="alert alert-success">
                                پلتفرم شرخر، حق را به     <div class="col-red inlineblock">{{$police->admin_vote == 1 ? 'فروشنده' : 'خریدار'}}</div> می دهد و اقدامات مالی لازم را انجام خواهد داد.
                                در صورت نارضایتی به رای، لطفا شماره سفارش و دلیل اعتراض را از طریق پشتیبانی پیگیری کنید.
                            </div>
                        @else

                        @endif
                    </div>
                </div>
            </div>
        </div>
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
                            <h1 class="mt-3 mb-1">{{$order->seller->insta_user}}</h1>
                            <h2 class="mt-3 mb-1">{{$order->seller->name}}</h2>
                            <small class="text-info">{{$order->seller->mobile}}</small>
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
                <div class="card ">
                    <div class="header">
                        <h2><strong>تغییر</strong> وضعیت سفارش</h2>
                    </div>
                    {{--                        @if($feedback->reply != null)--}}

                    <div class="body mb-2">
                        <div class="body">
                            @if($police->is_verified == 'green')
                                <div class="alert alert-success">شما این خرید را تایید کرده اید</div>
                                @else
                                <form action="{{route('buyer.police.update',$police->id)}}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <div class="row clearfix mb-3">
                                        <div class="col-sm-6">
                                            <label for="">وضعیت تحویل</label>
                                            <select class="form-control show-tick" id="deliver_status"
                                                    name="deliver_status" {{$police->order->deliver_status == 'green' ? 'disabled' :  ''}}>
                                                <option value="0" {{$police->order->deliver_status == 'red' ? 'selected' :  ''}}>
                                                    به دستم نرسیده
                                                </option>
                                                <option value="1" {{$police->order->deliver_status == 'green' ? 'selected' :  ''}}>
                                                    تحویل گرفتم
                                                </option>
                                            </select>
                                            @if($errors->has('deliver_status'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('deliver_status')}}
                                                </small>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 ">
                                            <label for="">رضایت از سفارش</label>
                                            <select class="form-control show-tick" id="is_verified" name="is_verified"
                                                    disabled>
                                                <option value="2" {{$police->is_verified == 'green' ? 'selected' :  ''}}>
                                                    عالی ! تایید میشه
                                                </option>
                                                @if($police->is_verified != 'red')
                                                <option value="1" {{$police->is_verified == 'blue' ? 'selected' :  ''}}>درس
                                                    حال بررسی
                                                </option>
                                                @endif
                                                <option value="0" {{$police->is_verified == 'red' ? 'selected' :  ''}}>مشکل
                                                    داره :(
                                                </option>
                                            </select>
                                            @if($errors->has('is_verified'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('is_verified')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row clearfix mb-3 show-it" {{$police->is_verified == 'red' ? '' :  'hidden'}} >
                                        <div class="col-lg-12">
                                            <label for="">دلیل نارضایتی را شرح دهید.</label>
                                            <textarea name="buyer_body" class="form-control w-100" id="" cols="30" rows="3"
                                                      placeholder="دلیل عدم رضایت از کالا" {{$police->is_verified == 'red' ? 'disabled' :  'hidden'}} >{{$police->is_verified == 'red' ? $police->buyer_body :  ''}}</textarea>
                                            @if($errors->has('buyer_body'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('buyer_body')}}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row clearfix mb-3 show-it" {{$police->is_verified == 'red' ? '' :  'hidden'}} >
                                        <div class="col-lg-12 ">
                                            <label>ارسال فایل جهت بررسی</label>
                                            <input type="file" name="buyer_file" class="dropify " data-height="200" {{$police->is_verified == 'red' ? 'disabled' :  ''}}
                                                   data-default-file=" {{$police->buyer_file != null ? asset($police->buyer_file) : ''}}"
                                                   data-allowed-file-extensions="pdf png jpeg jpg rar zip"
                                                   data-max-file-size="2M">
                                            @if($errors->has('id_card'))
                                                <small class="text-danger d-inline-block w-100  mt-2">
                                                    {{$errors->first('id_card')}}
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

                            @endif
                        </div>
                    </div>

                </div>
                @if($police->is_verified == 'green')
                    <div class="card mb-0">
                        <div class="header">
                            <h2><strong>بازخورد</strong> خرید</h2>
                        </div>

                        <div class="body mb-2">
                            <div class="body">
                                <a href="{{route('buyer.feedbacks.create')}}">
                                    <div class="alert alert-info">در صورت تمایل برای این فروشنده بازخورد ثبت کنید.</div>
                                </a>
                            </div>
                        </div>

                    </div>
                @endif



                @if($police->buyer_body != null)
                    <div class="card mb-0">
                        <div class="header">
                            <h2><strong>شرح موضوع</strong> توسط شما</h2>
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
                                <label class="pl-3">فایل های ضمیمه شما</label><br>

                                <a href="{{asset($police->buyer_file)}}"><i class="zmdi zmdi-download"></i></a>
                            </div>
                        </div>
                    </div>
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
                                                     class="img-fluid img-thumbnail" width="100px" alt="sharkhar">
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
                                        <label class="pl-3">فایل های ضمیمه فروشنده</label><br>

                                        <a href="{{asset($police->seller_file)}}"><i class="zmdi zmdi-download"></i></a>
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