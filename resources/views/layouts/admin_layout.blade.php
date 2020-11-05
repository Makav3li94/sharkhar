@include('layouts.head',['title'=>$title])

<body class="theme-blush">


@include('layouts.front_header')

@if(!auth()->guard('web')->check() && !auth()->guard('buyer')->check() && !auth()->guard('admin')->check())
    @php
        $bib = 'bib'
    @endphp
@endif
<section class="content {{isset($bib) ? $bib : ''}}">

    @if(!isset($hide))
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-4 col-sm-12 mb-2">

                    <div class="p-2 ml-5"
                         @if(request()->is('seller/dashboard'))
                         data-step="1"
                         data-intro="در شرخر، شما برای فروش نیاز به ثبت شماره شِبا و ارسال لینک خرید برای مشتری دارید، همین. لطفا تا انتهای آموزش با من باشید."
                            @endif
                    >
                        <h1 class="mb-0 font-16">{{ ucfirst($title ?? '') }}</h1>
                        @if(!auth()->guard('web')->check() && !auth()->guard('buyer')->check())

                        @else
                            <button class="btn btn-primary btn-icon mobile_menu" type="button">
                                منو
                                <i class="zmdi zmdi-sort-amount-desc"></i></button>
                        @endif

                    </div>
                </div>

                <div class="col-md-8 col-sm-12 pr-0 pl-0 ">
                    <div class="card">
                        <div class="body p-0">
                            @if(auth()->guard('web')->check())
                                <form id="app-search">
                                    <div class="input-group masked-input position-relative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="نام محصول ...">
                                        <span class="input-group-text float-left " style="cursor: pointer"
                                              onclick="$('#app-search input').val(''); $('#app-search .list-group').html('');">
                                        <i class="zmdi zmdi-close-circle"></i>
                                    </span>
                                    </div>
                                    <div class="list-group"></div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="bread-crumb d-flex justify-content-between">
                <div class="p-2">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="
                       @if(auth()->guard('web')->check())
                            {{route('seller.dashboard')}}
                            @elseif(auth()->guard('buyer')->check())
                            {{route('buyer.dashboard')}}
                            @else
                            @endif">
                                <i class="zmdi zmdi-home"></i> شرخر</a>
                        </li>
                        @if(isset($b_level1))

                            <li class="breadcrumb-item">
                                <a href="{{url()->previous()}}">{{$b_level1}}</a>
                            </li>

                            <li class="breadcrumb-item active">{{$b_level2}}</li>
                        @else
                            <li class="breadcrumb-item active">{{$b_level2}}</li>
                        @endif


                    </ul>
                </div>

                @if(isset($back))
                    <div class="p-2 ">
                        <a class="btn btn-info  " href="{{url()->previous()}}">
                            بازگشت
                            <i class="zmdi zmdi-arrow-right"></i>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if(!request()->is('seller/dashboard*') && !request()->is('buyer/dashboard*'))
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 text-right soso none">
                <a class="btn btn-info btn-icon float-right  w-100 mb-3" href="{{url()->previous()}}">
                    بازگشت
                    <i class="zmdi zmdi-arrow-right"></i>
                </a>
            </div>
        </div>
    @endif
    @yield('content')
    <div class="toTop">
        <a href="#"><i class="zmdi zmdi-long-arrow-up"></i></a>
    </div>
</section>

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{asset('assets/images/logo-p.png')}}" width="48" height="48"
                                 alt="Sharkhar"></div>
        <p>لطفا صبر کنید...</p>
    </div>
</div>


<div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="largeModalLabel">درحال بارگذاری فروشگاه شما</h4>
            </div>
            <div class="modal-body">
                الگوریتم شرخر در حال جمع آوری اطلاعات و بارگذاری فروشگاه شما می باشد. <br>
                این پروسه 60 ثانیه طول خواهد کشید. <br>
                شرخر در حال حاضر روی <strong class="text-danger">پیج پابلیک</strong> کار میکنه :| <br>
                اگر پیجتون پرایویته خودتون باید محصولات رو وارد کنید.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">بستن</button>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')


</body>

</html>