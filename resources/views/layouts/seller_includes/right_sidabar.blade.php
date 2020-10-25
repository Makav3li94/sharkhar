<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        @if(auth()->guard('web')->check())
            <a href="{{route('seller.dashboard')}}">
                <img src="{{asset('assets/images/logo-p.png')}}" width="50" alt="شرخر">

            </a>
        @elseif(auth()->guard('buyer')->check())
            <a href="{{route('buyer.dashboard')}}">
                <img src="{{asset('assets/images/logo-p.png')}}" width="50" alt="شرخر">
            </a>
        @else
            <a href="{{route('admin.dashboard')}}">
                <img src="{{asset('assets/images/logo-p.png')}}" width="50" alt="شرخر">
            </a>
        @endif

        <a class="logout-link" href="#" title="خروج از شرخر"
           onclick="event.preventDefault();document.getElementById('logout').submit()">
            <i class="zmdi zmdi-power"></i>
        </a>
        <form id="logout" method="POST" action="{{ route('logout') }}">@csrf</form>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    @if(auth()->guard('web')->check())
                        <a class="image" href="{{route('buyer.dashboard')}}">
                            <img src="{{auth()->user()->logo ? : ''}}" alt="{{auth()->user()->insta_user}}">
                        </a>
                    @endif
                    <div class="detail p-t-10">
                        @if(auth()->guard('web')->check())
                            <h4>{{auth()->user()->name}}</h4>
                            <small>{{auth()->user()->insta_user}} </small>
                        @elseif(auth()->guard('buyer')->check())
                            <h4>{{auth()->guard('buyer')->user()->name}}</h4>
                        @else

                        @endif
                    </div>
                </div>
            </li>
            @if(auth()->guard('web')->check())

                <li class="{{ request()->is('seller/dashboard') ? 'active' : '' }} ">
                    <a href="{{route('seller.dashboard')}}">
                        <i class="zmdi zmdi-home"></i><span>داشبورد</span></a>
                </li>

                <li class="{{ request()->is('seller/profile/*') ? 'active' : '' }} remove-help"
                @if(request()->is('seller/profile/*'))
                        data-step="1" data-intro="ضرروی ! ،جهت تکمیل اطلاعات فروشگاه از اینجا"
                        @endif
                        >
                    <a href="{{route('seller.profile',auth()->user()->id)}}">
                        <i class="zmdi zmdi-account"></i><span>اطلاعات فروشگاه</span>
                    </a>
                </li>
                <li class="remove-help "
                    @if(request()->is('vendors/*'))
                    data-step="1" data-intro="مشاهده فروشگاه از اینجا"
                        @endif>
                    <a href="{{route('vendor',auth()->user()->insta_user)}}">
                        <i class="zmdi zmdi-shopping-basket"></i><span>فروشگاه</span></a>
                </li>

                <li class="{{ request()->is('seller/products') ? 'active' : '' }} remove-help"
                    @if(request()->is('seller/products'))
                    data-step="1" data-intro="مدیریت محصولات از اینجا"
                        @endif>
                    <a href="{{route('seller.products.index')}}">
                        <i class="zmdi zmdi-collection-item"></i><span>محصولات</span>
                    </a>
                </li>


                <li class="{{ request()->is('seller/orders') ? 'active' : '' }} remove-help"
                    @if(request()->is('seller/orders'))
                    data-step="1" data-intro="مدیریت سفارشات از اینجا"
                        @endif>
                    <a href="{{route('seller.orders.index')}}">
                        <i class="zmdi zmdi-assignment"></i><span>سفارشات</span>
                    </a>
                </li>



                <li class="{{ request()->is('seller/transactions/*') ? 'active' : '' }} remove-help"
                    @if(request()->is('seller/transactions'))
                    data-step="1" data-intro="مدیریت تراکنش ها از اینجا"
                        @endif>
                    <a href="{{route('seller.transactions.index')}}">
                        <i class="zmdi zmdi-money"></i><span>امورمالی</span>
                    </a>
                </li>

                <li class="{{ request()->is('seller/feedbacks/*') ? 'active' : '' }} remove-help"
                    @if(request()->is('seller/feedbacks'))
                    data-step="1" data-intro="مدیریت بازخورد ها از اینجا"
                        @endif>
                    <a href="{{route('seller.feedbacks.index')}}">
                        <i class="zmdi zmdi-star"></i><span>بازخورد ها</span></a>
                </li>


                <li><a href="javascript:void(0);" class="menu-toggle {{ request()->is('seller/contacts/*') ? 'active' : '' }} remove-help"
                       @if(request()->is('seller/contacts/*'))
                       data-step="1" data-intro="ارسال تیکت به پشتیبانی شرخر از اینجا"
                            @endif>
                    <i class="zmdi zmdi-ticket-star"></i><span>پشتیبانی</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('seller.contacts.index')}}">لیست تیکت ها</a></li>
                        <li><a href="{{route('seller.contacts.create')}}">تیکت جدید</a></li>
                    </ul>
                </li>

                <li class="nono">
                    <hr>
                    <a href="{{url('seller/dashboard?start=true')}}"  >
                        <i class="zmdi zmdi-flag text-danger" ></i><span>آموزش پنل</span></a>
                    <hr>
                </li>

            @elseif(auth()->guard('buyer')->check())

                <li class="{{ request()->is('buyer/dashboard') ? 'active' : '' }} ">
                    <a href="{{route('buyer.dashboard')}}">
                        <i class="zmdi zmdi-home"></i><span>داشبورد</span></a>
                </li>

                <li class=" ">
                    <a href="{{route('shop')}}">
                        <i class="zmdi zmdi-shopping-basket"></i><span>فروشگاه</span></a>
                </li>
                <li class="{{ request()->is('buyer/profile/*') ? 'active' : '' }}">
                    <a href="{{route('buyer.profile',auth()->guard('buyer')->user()->id)}}">
                        <i class="zmdi zmdi-account"></i><span>پنل کاربری</span>
                    </a>
                </li>

                <li class="{{ request()->is('buyer/transactions/*') ? 'active' : '' }}">
                    <a href="{{route('buyer.transactions.index')}}">
                        <i class="zmdi zmdi-money"></i><span>امورمالی</span>
                    </a>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-star"></i><span>بازخورد ها</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('buyer.feedbacks.index')}}">لیست بازخورد ها</a></li>
                        <li><a href="{{route('buyer.feedbacks.create')}}">بازخورد جدید</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-ticket-star"></i><span>پشتیبانی</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{route('buyer.contacts.index')}}">لیست تیکت ها</a></li>
                        <li><a href="{{route('buyer.contacts.create')}}">تیکت جدید</a></li>
                    </ul>
                </li>
                @else
                <li class=" ">
                    <a href="{{route('admin.sellers.index')}}">
                        <i class="zmdi zmdi-account"></i><span>فروشندگان</span></a>
                </li>
                <li class=" ">
                    <a href="{{route('admin.contacts.index')}}">
                        <i class="zmdi zmdi-ticket-star"></i><span>تیکت ها</span></a>
                </li>
                <li class="{{ request()->is('buyer/orders') ? 'active' : '' }} ">
                    <a href="{{route('buyer.orders.index')}}">
                        <i class="zmdi zmdi-assignment"></i><span>سفارشات</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
    <footer class="footer  nono ">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 pt-3 pb-3">
            <hr>
            توسعه و پشتیبانی توسط
            <a class="text-blush" rel="nofollow" href="https://parnasite.com"> Parna</a>
        </div>
        <!-- Copyright -->
    </footer>
</aside>


