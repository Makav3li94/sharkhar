@extends('layouts.admin_layout',['title' => 'بررسی تیکت','b_level2'=>'بررسی تیکت ' . $contact->subject ,'back'=>'true'])

@section('content')

    <div class="container">
        <div class="row clearfix">

                <div class="card">
                    <div class="header">
                        <h2><strong>اطلاعات</strong> تیکت</h2>
                    </div>
                    <div class="body">
                        <div class="col-lg-12 col-md-12">
                        <ul class="comment-reply list-unstyled">
                            <li class="comment-user">

                                <div class="icon-box w50 ml-2">
                                    <img class="rounded-circle " width="50px"
                                         src="{{ $contact->seller->logo}}" alt="Awesome Image">
                                </div>
                                <div class="text-box ">
                                    <h5>{{$contact->seller->name}}</h5>
                                    <span class="comment-date">{{$contact->created_at}}</span>
                                </div>
                            </li>
                            <li>
                                <div class="w50 ml-2"></div>
                                <div class="comment-text">
                                    <p>{{$contact->body}}</p>
                                </div>
                            </li>
                            @if($contact->reply != null)
                                <li class="comment-user">

                                    <div class="icon-box w50 ml-2">
                                        <img class="rounded-circle " width="50px"
                                             src="{{asset('assets/images/logo-p.png')}}" alt="خریدار محترم">
                                    </div>
                                    <div class="text-box ">
                                        <h5>پشتیبانی شرخر</h5>
                                        <span class="comment-date">{{$contact->updated_at}}</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="w50 ml-2"></div>
                                    <div class="comment-text">
                                        <p>{{$contact->reply}}</p>
                                    </div>
                                </li>
                            @endif
                            @foreach($tickets as $ticket)
                                @if($ticket->seller_id == 1)
                                    <li class="comment-user">

                                            <div class="icon-box w50 ml-2">
                                                <img class="rounded-circle " width="50px"
                                                     src="{{ $ticket->seller->logo}}" alt="{{ $ticket->seller->insta_user}}">
                                            </div>
                                            <div class="text-box ">
                                                <h5>{{$ticket->seller->name}}</h5>
                                                <span class="comment-date">{{$ticket->created_at}}</span>
                                            </div>
                                    </li>
                                <li>
                                    <div class="w50 ml-2"></div>
                                    <div class="comment-text">
                                    <p>{{$ticket->body}}</p>
                                    </div>
                                </li>
                                @elseif($ticket->admin_id == 1 )
                                    <li class="comment-user">

                                        <div class="icon-box w50 ml-2">
                                            <img src="{{asset('assets/images/logo-p.png')}}" width="80px" alt="شرخر">


                                        </div>
                                        <div class="text-box ">
                                            <h5>پشتیبانی شرخر</h5>
                                            <span class="comment-date">{{$ticket->created_at}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="w50 ml-2"></div>
                                        <div class="comment-text">
                                            <p>{{$ticket->reply}}</p>
                                        </div>
                                    </li>

                                @endif
                            @endforeach


                           </ul>

{{--                        <form action="{{route('seller.contacts.store')}}" method="post">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="parent_id" value="{{$contact->id}}">--}}
{{--                            --}}{{--                            <input type="hidden" name="first" value="on">--}}
{{--                            <div class="col-sm-12 p-0">--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="form-line">--}}
{{--                                            <textarea rows="4" name="body" class="form-control no-resize"--}}
{{--                                                      placeholder="متن تیکت ..."></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @if($errors->has('body'))--}}
{{--                                <small class="text-danger d-inline-block w-100  mt-2">--}}
{{--                                    {{$errors->first('body')}}--}}
{{--                                </small>--}}
{{--                            @endif--}}
{{--                            <div class="text-center">--}}
{{--                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">ارسال--}}
{{--                                    پاسخ--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('styles')
    <style>
        small {
            text-align: right !important;
            margin-bottom: 5px;
        }
        .comment-user{
            background-color:  #f8f9fa;
            padding: 15px 10px;
            border-top: 1px solid #e0e4e7;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
@endsection

@section('scripts')

    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            "use strict";
            $('.dropify').dropify({
                messages: {}
            });
        });
    </script>
@endsection