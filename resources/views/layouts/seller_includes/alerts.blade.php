@if(auth()->guard('web')->check())
    <div class="container">
        <ul class="list-unstyled">
            <li class="nav-item ">
                @if(auth()->guard('web')->user()->sheba == null)

                    @if(request()->is('seller/profile/*'))
                        <a href="javascript:void(0)" id="move-to-sheba">
                            <div class="alert alert-danger">تکمیل اطلاعات واریز، جهت پرداخت پول به شما ...</div>
                        </a>
                    @else
                        <a href="{{route('seller.profile',auth()->user()->id)}}">
                            <div class="alert alert-danger">تکمیل اطلاعات واریز، جهت پرداخت پول به شما ...</div>
                        </a>
                    @endif

                @else
                    @if(auth()->guard('web')->user()->id_card == null)

                        @if(request()->is('seller/profile/*'))
                            <a href="javascript:void(0)" id="move-to-ids">
                                <div class="alert alert-danger">لطفا تصویر کارت ملی خود را جهت مطابقت با شماره شبا وارد
                                    کنید.
                                </div>
                            </a>
                        @else
                            <a href="{{route('seller.profile',auth()->user()->id)}}">
                                <div class="alert alert-danger">لطفا تصویر کارت ملی خود را جهت مطابقت با شماره شبا وارد
                                    کنید.
                                </div>
                            </a>
                        @endif


                    @else
                        @if(auth()->guard('web')->user()->is_verified == 'green' )
{{--                            <a href="{{route('seller.products.index')}}">--}}
{{--                                <div class="alert alert-info">--}}
{{--                                    تبریک، شما تایید شدید ! حالا کافیه از طریق بخش محصولات کپی لینک خرید رو برای مشتری--}}
{{--                                    بفرستید--}}
{{--                                    و بقیش با ما !--}}
{{--                                </div>--}}
{{--                            </a>--}}
                        @elseif(auth()->guard('web')->user()->is_verified == 'info' )
                            <a href="{{route('seller.products.index')}}">
                                <div class="alert alert-secondary">
                                    اطلاعات شما در حال بررسی است.
                                </div>
                            </a>
                        @else
                            <a href="{{route('seller.contacts.create')}}">
                                <div class="alert alert-danger">
                                    متاسفانه شما تایید هویت نشدید.
                                </div>
                            </a>
                        @endif
                    @endif

                @endif
            </li>
        </ul>
    </div>
@endif