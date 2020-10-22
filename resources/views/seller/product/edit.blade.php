@extends('layouts.admin_layout',['title' => 'ویرایش محصول','b_level1'=>'محصولات','b_level2'=>'ویرایش محصول','back'=>'true'])

@section('content')

        <div class="container">
            <div class="row clearfix">
                <div class="card">
                           <div class="body">
                        <form action="{{route('seller.products.update',$product->id)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="row clearfix mb-2">
                                <div class="col-lg-4 col-md-12">
                                    <div class="card mcard_3">
                                        <div class="body">
                                            <img src="{{$product->image_thumb ?? ''}}" class="rounded-circle shadow "
                                                 alt="profile-image">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 mb-4">
                                            <label>عنوان محصول</label>
                                            <div class="input-group masked-input">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-text-format"></i></span>
                                                </div>
                                                <input class="form-control" name="title"
                                                       value="{{$product->title ?? old('title')}}"
                                                       type="text">
                                                @if($errors->has('title'))
                                                    <small class="text-danger d-inline-block w-100  mt-2">
                                                        {{$errors->first('title')}}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 mb-4">
                                            <label>قیمت محصول</label>
                                            <div class="input-group masked-input">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                                class="zmdi zmdi-money"></i></span>
                                                </div>
                                                <input class="form-control" name="price"
                                                       value="{{$product->price ?? old('price')}}"
                                                       type="text">
                                                @if($errors->has('price'))
                                                    <small class="text-danger d-inline-block w-100  mt-2">
                                                        {{$errors->first('price')}}
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <label>وضعیت محصول</label>
                                            <select name="status" class="form-control show-tick ms select2"
                                                    data-placeholder="انتخاب">
                                                <option value="1" {{$product->status == 1 ? 'selected' : ''}}>فعال
                                                </option>
                                                <option value="0" {{$product->status == 0 ? 'selected' : ''}}>غیر فعال
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
{{--                                <small class="text-info">متن--}}
{{--                                </small>--}}

                                <div class="input-group">

                                    <textarea name="body" rows="5" class="summernote">{!! $product->body !!}</textarea>
                                </div>

                                @if($errors->has('body'))
                                    <small class="text-danger d-inline-block w-100  mt-2">
                                        {{$errors->first('body')}}
                                    </small>
                                @endif
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">
                                    ذخیره تغییرات
                                </button>
                            </div>
                        </form>
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
        .note-editor{
            width: 100%;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
@endsection