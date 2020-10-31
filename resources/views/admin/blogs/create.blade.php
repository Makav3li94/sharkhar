@extends('layouts.admin_layout',['title' => 'بلاگ جدید','b_level2'=>'بلاگ جدید','back'=>'true'])
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('admin.blogs.store')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="body">


                            <div class="form-group">
                                <input type="text" name="title" class="form-control"
                                       placeholder="عنوان وبلاگ را وارد کنید"/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="slug" class="form-control" placeholder="slug"/>
                            </div>
                            <select name="category_id" class="form-control show-tick">
                                <option>دسته را انتخاب کنید --</option>
                                @foreach($blogCategories as $blogCategory)
                                    <option value="{{$blogCategory->id}}">
                                        {{$blogCategory->title}}
                                    </option>
                                @endforeach

                            </select>
                            @if($errors->has('image'))
                                <small class="text-danger d-inline-block w-100  mt-2">
                                    {{$errors->first('image')}}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <input type="file" name="image" class="dropify"
                                   data-default-file=""
                                   data-allowed-file-extensions="pdf png jpeg jpg rar zip"
                                   data-max-file-size="2M">
                            @if($errors->has('image'))
                                <small class="text-danger d-inline-block w-100  mt-2">
                                    {{$errors->first('image')}}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <textarea name="body" rows="2" class="summernote"></textarea>
                            <button type="submit" class="btn btn-info waves-effect m-t-20">ارسال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>

    <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
    <script>
        $(document).ready(function () {
            "use strict";
            $('.dropify').dropify({
                messages: {}
            });
        })
    </script>
@endsection