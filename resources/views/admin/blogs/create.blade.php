@extends('layouts.admin_layout',['title' => 'بلاگ جدید','b_level2'=>'بلاگ جدید','back'=>'true'])
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/persian-datepicker/persian-datepicker.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/timepicker/css/timepicker.min.css')}}"/>
    <style>
        .form-line .bootstrap-tagsinput {
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da !important;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

        }

        .form-line .bootstrap-tagsinput:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff !important;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .25);
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('admin.blogs.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="body">


                            <div class="form-group">
                                <label for="title">عنوان</label>
                                <input type="text" name="title" value="{{old('title')}}" class="form-control"
                                       placeholder="عنوان وبلاگ را وارد کنید"/>
                                @if($errors->has('title'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('title')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="slug">اسلاگ</label>
                                <input type="text" name="slug" class="form-control" value="{{old('slug')}}"
                                       placeholder="slug"/>
                                @if($errors->has('slug'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('slug')}}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="meta">متا</label>
                                <input type="text" name="meta" value="{{old('meta')}}" class="form-control"
                                       placeholder="عنوان متا را وارد کنید"/>
                                @if($errors->has('meta'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('meta')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="keywords">کلمات کلیدی</label>
                                <div class="form-line">
                                    <input type="text" name="keywords" class="form-control" data-role="tagsinput"
                                           value="{{old('keywords')}}">
                                </div>
                                @if($errors->has('keywords'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('keywords')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label for="category_id">دسته</label>
                                <select name="category_id" class="form-control show-tick">
                                    <option>دسته را انتخاب کنید --</option>
                                    @foreach($blogCategories as $blogCategory)
                                        <option value="{{$blogCategory->id}}" {{$blogCategory->id == old('category_id') ? 'selected' : ''}}>
                                            {{$blogCategory->title}}
                                        </option>
                                    @endforeach

                                </select>
                                @if($errors->has('category_id'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('category_id')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="published_at">تاریخ و زمان انتشار</label>
                                <div class="row m-0 p-0">
                                    <div class="col-6 m-0 p-0">
                                        <input type="text" name="published_at"
                                               class="form-control text-center datepicker-publish"
                                               value="{{old('published_at')}}" placeholder="تاریخ انتشار">
                                        @if($errors->has('published_at'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('published_at')}}
                                            </div>
                                        @endif

                                    </div>
                                    <div class="col-6 m-0 p-0">
                                        <input type="text" id="publish_time" name="publish_time" class="form-control"
                                               value="{{old('publish_time')}}" placeholder="ساعت انتشار">
                                        @if($errors->has('publish_time'))
                                            <div class="alert alert-danger">
                                                {{$errors->first('publish_time')}}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="image">تصویر</label>
                            <input type="file" name="image" class="dropify"
                                   data-allowed-file-extensions="pdf png jpeg jpg rar zip">
                            @if($errors->has('image'))
                                <small class="text-danger d-inline-block w-100  mt-2">
                                    {{$errors->first('image')}}
                                </small>
                            @endif
                            </div>
                            <div class="form-group">
                            <label for="body">متن بلاگ</label>
                            <textarea name="body" rows="2" placeholder="متن بلاگ ... "
                                      class="summernote">{{old('body')}}</textarea>
                            @if($errors->has('body'))
                                <small class="text-danger d-inline-block w-100  mt-2">
                                    {{$errors->first('body')}}
                                </small>
                            @endif
                            </div>

                            <div class="form-group">
                                <label for="tags">برچسب ها</label>
                                <div class="form-line">
                                    <input type="text" name="tags" class="form-control" data-role="tagsinput"
                                           value="{{old('tags')}}">
                                </div>
                                @if($errors->has('tags'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('tags')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                            <button type="submit" class="btn btn-info waves-effect m-t-20">ارسال</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
    <script src="{{asset('assets/plugins/persian-datepicker/persian-date.min.js')}}"></script>
    <script src="{{asset('assets/plugins/persian-datepicker/persian-datepicker.min.js')}}"></script>
    <script src="{{asset('assets/plugins/timepicker/js/timepicker.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            "use strict";
            $('.dropify').dropify({
                messages: {}
            });
        })

        var timepicker = new TimePicker('publish_time', {
            lang: 'en',
            theme: 'dark',
        });
        timepicker.on('change', function (evt) {

            var value = (evt.hour || '00') + ':' + (evt.minute || '00');
            evt.element.value = value;

        });
        $(".datepicker-publish").pDatepicker({
            "format": "YYYY/MM/DD",
            "viewMode": "day",
            "initialValue": false,
            "autoClose": true,
            "position": "auto",
            "onlyTimePicker": false,
            "onlySelectOnDate": true,
            "calendarType": "persian",
            "observer": true,
            "responsive": true
        });
    </script>
@endsection