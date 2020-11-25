@extends('layouts.admin_layout',['title' => 'فروشگاه','b_level2'=>'','hide'=>'true'])
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="blogitem mb-5 p-5">
                        <div class="blogitem-image">
                            <a href="{{route('blogs.show',$blog->slug)}}">
                                <img src="{{asset($blog->image)}}" alt="{{$blog->title}}"></a>
                            <span class="blogitem-date">{{$blog->created_at}}</span>
                        </div>
                        <div class="blogitem-content">
                            <div class="blogitem-header">
                                <div class="blogitem-meta">
                                    <span><i class="zmdi zmdi-account"></i>توسط <a href="javascript:void(0);">لیلا ساداتی</a></span>
                                    {{--                                    <span><i class="zmdi zmdi-comments"></i><a href="blog-details.html">نظرات(3)</a></span>--}}
                                </div>
                                <div class="blogitem-share">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="https://twitter.com/share?url=https://sharkhar.net/blogs/{{$blog->slug}}"
                                               title=" Share on Twitter">
                                                <i class="zmdi zmdi-twitter-box"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://sharkhar.net/blogs/{{$blog->slug}}"
                                               title=" Share on Linkedin">
                                                <i class="zmdi zmdi-linkedin-box"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://sharkhar.net/blogs/{{$blog->slug}}"
                                               title=" Share on Facebook">
                                                <i class="zmdi zmdi-facebook-box"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h1>{{$blog->title}}</h1>
                            {!! $blog->body !!}

                        </div>
                    </div>
                </div>

            </div>
            @include('blog.side-bar')
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .blogitem-content p {
            line-height: 2.5em!important;
            font-size: 14px!important;
            text-align: justify!important;
            font-weight: normal!important;
            color: #4c5053!important;
        }
        .blogitem-content h1,h2,h3,h4,h5,h6{
            line-height: 2.5em!important;
            font-weight: normal!important;
            color: #4c5053!important;
        }
        .blogitem-content h1{
            font-size: 18pt!important;
            text-align: center;
        }
        .blogitem-content h2{
            font-size: 16pt!important;
        }
        .blogitem-content h3{
            font-size: 16pt!important;
        }
        .blogitem-content h4,h5,h6{
            font-size: 14pt!important;
        }
    </style>
@endsection