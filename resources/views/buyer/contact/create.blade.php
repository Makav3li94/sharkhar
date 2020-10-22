@extends('layouts.admin_layout',['title' => 'تیکت جدید','b_level2'=>'تیکت جدید','back'=>'true'])

@section('content')

    <div class="container">
        <div class="row clearfix">

            <div class="card">
                <div class="header">
                    <h2><strong>تیکت</strong> جدید</h2>
                </div>
                <div class="body">
                    <div class="col-lg-12 col-md-12">

                        <form action="{{route('buyer.contacts.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="first" value="on">
                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="subject" class="form-control" placeholder="موضوع تیکت">
                                    </div>
                                </div>
                                @if($errors->has('subject'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('subject')}}
                                    </small>
                                @endif
                            </div>
                            <div class="col-sm-12 p-0">
                                <div class="form-group">
                                    <div class="form-line">
                                            <textarea rows="4" name="body" class="form-control no-resize"
                                                      placeholder="متن تیکت ..."></textarea>
                                    </div>
                                </div>
                                @if($errors->has('body'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('body')}}
                                    </small>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">ارسال
                                    تیکت
                                </button>
                            </div>
                        </form>
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