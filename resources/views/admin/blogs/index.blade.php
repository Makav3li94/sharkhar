@extends('layouts.admin_layout',['title' => 'اخبار','b_level2'=>'اخبار','back'=>'true'])
@section('styles')

@endsection
@section('content')
    <div class="container">
        <div class="row clearfix">


            <div class="card">
                <div class="header">
                    <h2><strong>لیست</strong> بلاگ ها</h2>
                </div>
                <div class="body">
                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="table-responsive">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>اسلاگ</th>
                                    <th>تصویر</th>
                                    <th>تاریخ</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $key=>$blog)
                                    <tr>
                                        <td><strong>{{$key + 1}}</strong></td>
                                        <td>{{$blog->title}}</td>
                                        <td>{{$blog->slug}}</td>
                                        <td><img src="{{asset($blog->image)}}" alt="" width="50px"></td>
                                        <td>{{$blog->created_at}}</td>
                                        <td><a href="{{route('admin.blogs.edit',$blog->id)}}"><i class="zmdi zmdi-edit"></i></a></td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>

            @if($blogs->hasPages()  )
                <div class="card">
                    <div class="body">
                        {{$blogs->links('vendor.pagination.custom')}}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection