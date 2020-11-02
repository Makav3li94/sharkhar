@extends('layouts.admin_layout',['title' => 'ویرایش بلاگ','b_level2'=>'ویرایش بلاگ','back'=>'true'])
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{route('admin.blogs.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card">
                        <div class="body">


                            <div class="form-group">
                                <input type="text" name="title" value="{{$blog->title ?? old('title')}}"
                                       class="form-control"
                                       placeholder="عنوان وبلاگ را وارد کنید"/>
                                @if($errors->has('title'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('title')}}
                                    </small>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" name="slug" class="form-control"
                                       value="{{$blog->slug ?? old('slug')}}" placeholder="slug" readonly/>
                                @if($errors->has('slug'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('slug')}}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="text" name="meta" value="{{$blog->meta ?? old('meta')}}"
                                       class="form-control"
                                       placeholder="عنوان متا را وارد کنید"/>
                                @if($errors->has('meta'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('meta')}}
                                    </small>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="text" name="keywords" value="{{$blog->keywords ?? old('keywords')}}" data-role="tagsinput"
                                       class="form-control"
                                       placeholder="کلمات کلیدی را وارد کنید"/>
                                @if($errors->has('keywords'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('keywords')}}
                                    </small>
                                @endif
                            </div>
                            <select name="category_id" class="form-control show-tick">
                                <option>دسته را انتخاب کنید --</option>
                                @foreach($blogCategories as $blogCategory)
                                    <option value="{{$blogCategory->id}}" {{$blogCategory->id == $blog->category_id  ? 'selected' : ''}}>
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
                    </div>
                    <div class="card">
                        <div class="body">
                            <input type="file" name="image"
                                   data-default-file=" {{$blog->image != null ? asset($blog->image) : ''}}"
                                   class="dropify" data-allowed-file-extensions="pdf png jpeg jpg rar zip">
                            @if($errors->has('image'))
                                <small class="text-danger d-inline-block w-100  mt-2">
                                    {{$errors->first('image')}}
                                </small>
                            @endif
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <textarea name="body" rows="2"
                                      class="summernote">{!! $blog->body ?? old('body') !!}</textarea>
                            @if($errors->has('body'))
                                <small class="text-danger d-inline-block w-100  mt-2">
                                    {{$errors->first('body')}}
                                </small>
                            @endif

                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <p>برچسب ها ...</p>
                            <div class="form-group mb-0">
                                <div class="form-line">
                                    <input type="text" name="tags" class="form-control" data-role="tagsinput"
                                           value="{{$blogTags ?? old('tags')}}">
                                </div>
                                @if($errors->has('tags'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('tags')}}
                                    </small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
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
    <script src="{{asset('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script> <!-- Bootstrap Tags Input Plugin Js -->
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