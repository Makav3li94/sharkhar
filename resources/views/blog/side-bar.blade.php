<div class="col-lg-4 col-md-12">
    <div class="card">
        <div class="body search">
            <div class="input-group mb-0">
                <input type="text" class="form-control" placeholder="جستجو...">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><i class="zmdi zmdi-search"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h2><strong>دسته ها</strong></h2>
        </div>
        <div class="body">
            <ul class="list-unstyled mb-0 widget-categories">
                @foreach($blogCategories as $blogCategory)
                    <li><a href="{{'blog',$blogCategory->slug}}">گزارش کسب و کار</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card">
        <div class="header">
            <h2><strong>پست های</strong> اخیر</h2>
        </div>
        <div class="body">
            <ul class="list-unstyled mb-0 widget-recentpost">
                @foreach($blogsLatest as $blog)
                    <li>
                        <a href="{{route('blogs.show',$blog->slug)}}">
                            <img src="{{asset($blog->image)}}" alt="blog thumbnail">
                        </a>
                        <div class="recentpost-content">
                            <a href="{{route('blogs.show',$blog->slug)}}">{{$blog->title}}</a>
                            <span>{{$blog->created_at}}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="header">
            <h2><strong>ابرهای</strong> برچسب</h2>
        </div>
        <div class="body">
            <ul class="list-unstyled mb-0 tag-clouds">
                @foreach($tags as $tag)

                    <li><a href="javascript:void(0);" class="tag badge badge-default">{{$tag->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>


</div>