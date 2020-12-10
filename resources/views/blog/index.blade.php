@extends('layouts.admin_layout',['title' => 'فروشگاه','b_level2'=>'','hide'=>'true'])
@section('styles')
    <link rel="alternate" type="application/atom+xml" title="News" href="/blogs.rss">
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    @foreach($blogs as $blog)
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="blogitem mb-5 p-5">
                                    <div class="blogitem-image">
                                        <a href="{{route('news.show',$blog->slug)}}">
                                            <img src="{{asset($blog->image)}}" alt="{{$blog->title}}"></a>
                                        <span class="blogitem-date">{{$blog->created_at}}</span>
                                    </div>
                                    <div class="blogitem-content">
                                        <div class="blogitem-header">
                                            <div class="blogitem-meta">
                                                <span><i class="zmdi zmdi-account"></i>توسط <a
                                                            href="javascript:void(0);">لیلا ساداتی</a></span>
                                                {{--                                    <span><i class="zmdi zmdi-comments"></i><a href="blog-details.html">نظرات(3)</a></span>--}}
                                            </div>
                                            <div class="blogitem-share">
                                                <ul class="list-unstyled mb-0">
                                                    <li>
                                                        <a href="https://twitter.com/share?url=https://sharkhar.net/news/{{$blog->slug}}"
                                                           title=" Share on Twitter">
                                                            <i class="zmdi zmdi-twitter-box"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://sharkhar.net/news/{{$blog->slug}}"
                                                           title=" Share on Linkedin">
                                                            <i class="zmdi zmdi-linkedin-box"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://sharkhar.net/news/{{$blog->slug}}"
                                                           title=" Share on Facebook">
                                                            <i class="zmdi zmdi-facebook-box"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2><a href="{{route('news.show',$blog->slug)}}">{{$blog->title}}</a></h2>
                                        <p>
                                            {!! $blog->meta !!}
                                        </p>
                                        <a href="{{route('news.show',$blog->slug)}}" class="btn btn-info">ادامه
                                            مطلب</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($blogs->hasPages()  )
                    <div class="card">
                        <div class="body">
                            <div class="col-lg-12">
                                {{$blogs->links('vendor.pagination.custom')}}
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @include('blog.side-bar')
        </div>
    </div>

@endsection