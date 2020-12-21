@extends('welcome')
@section('styles')

<!-- Responsive CSS -->

@endsection
@section('content')
<!-- ***** Wellcome Area Start ***** -->
<section class="wellcome_area clearfix" id="home">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md">
                <div class="wellcome-heading text-right" style="direction: rtl">
                    <h1>دستیار فروش شرخر: خرید امن، فروش آسان </h1>
                    <h3>
                        <img src="{{asset('front/img/bg-img/insta.png')}}" alt="">
                    </h3>
                    {{--                        <p>مراقب پولتون هستیم.</p>--}}
                    <p>خرید با خیال راحت، فروش بیشتر در اینستاگرام</p>
                    {{--                        <p>دیگه نگران نباشید  پیج جنسو میفرسته، درست میفرسته، چی می فرسته :)</p>--}}
                </div>
                <div class="get-start-area">
                    <!-- Form Start -->
                    <a href="{{route('register')}}" class="submit">شروع کنیم</a>
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome thumb -->
    <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
        <img src="{{asset('front/img/bg-img/welcome-img.png')}}" alt="Wellcome To Sharkhar">
    </div>
</section>
<!-- ***** Wellcome Area End ***** -->

<!-- ***** Special Area Start ***** -->
<section class="special-area bg-white section_padding_70" id="about">
    <div class="special_description_area mt-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="special_description_img">
                        <img src="{{asset('front/img/bg-img/special.png')}}" alt="Sharkhar Specials">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 ml-xl-auto">
                    <div class="special_description_content">
                        <h2>شرخر؛ افزایش فروش شما</h2>
                        <p>
                            شرخر چیه ؟
                            دیگه نگران مشتری هایی که نمی تونن به فروشگاه های انلاین اعتماد کنن نباشید ! چون شرخر کار
                            اعتماد سازیتون رو انجام میده
                            و باعث افزایش فروشتون تا 70 درصد میشه.
                        </p>
                        <p>
                            چطوری ؟
                            شرخر با مجوهایی رسمی ای که گرفته میتونه به شما که کسب و کار آنلاین دارید، گواهینامه
                            ضمانت پرداخت و به مشتریهاتون بسترِ خرید اینترنتی امن بده تا با خیال راحت ازتون خرید کنن.</p>

                        <p>
                            کار باهاش چطوریه ؟
                            خیلی ساده ! حتی نیاز نیست محصولاتتون رو وارد کنید ! ما همه کارو می کنیم.
                            شرخر یه الگوریتم داره که با استفاده از محصولات پیج فروشگاهی ایسنتاگرام شما، یک وب سایت
                            فروشگاهی خیلی زیبا با امکانات کامل با نماد الکترونیک و درگاه بانکی براتون می سازه.</p>
                        <p>
                            چی به ما می رسه ؟
                            سود از تراکنش های شما
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-100">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading Area -->
                <div class="section-heading text-center">
                    <h2>چه ویژگی هایی داریم ؟</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Special Area -->

            <!-- Single Special Area -->
            <div class="col-12 col-md-4">
                <div class="single-special text-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="single-icon">
                        <i class=" ti-thumb-up " aria-hidden="true"></i>
                    </div>
                    <h4>هواتونو داریم</h4>
                    <p class="text-center">تا اخر معامله باهاتونیم</p>
                </div>
            </div>
            <!-- Single Special Area -->
            <div class="col-12 col-md-4">
                <div class="single-special text-center wow fadeInUp" data-wow-delay="0.6s">
                    <div class="single-icon">
                        <i class=" ti-wand " aria-hidden="true"></i>
                    </div>
                    <h4>کار باهاش آسونه</h4>
                    <p class="text-center">با هر دستگاهی، میتونی به سادگی کار کنی</p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="single-icon">
                        <i class="ti-themify-favicon" aria-hidden="true"></i>
                    </div>
                    <h4>مثه آبِ خوردن</h4>
                    <p class="text-center"> خودمون محصولاتتون رو وارد می کنیم</p>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>

{{--    <div class="video-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <!-- Video Area Start -->--}}
{{--                    <div class="video-area">--}}
{{--                        <video width="100%" height="100%" controls>--}}
{{--                            <source src="{{asset('front/img/sign-up.mp4')}}" type="video/mp4">--}}
{{--                            Your browser does not support the video tag.--}}
{{--                        </video>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<!-- ***** Special Area End ***** -->
<section class="our-monthly-membership section_padding_70 clearfix">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-2">
                <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                    <a href="{{route('register')}}">بزن بریم</a>
                </div>
            </div>
            <div class="col-md-10">
                <div class="membership-description">
                    <h2>همین حالا ثبت نام کن، شک نکن سود میکنی !</h2>
                    <p>کلی امکانات فقط با یه کلیک.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- ***** Awesome Features Start ***** -->



<section class="pricing-plane-area section_padding_100_70 clearfix position-relative nono" id="pricing">
    <h5 class="fornow">
        به ازای هر تراکنش تنها 1%
    </h5>
    <div class="container" style="filter: blur(8px);">
        <div class="row">
            <div class="col-12">
                <!-- Heading Text  -->
                <div class="section-heading text-center">
                    <h2>تعرفه استفاده</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col-12 col-md-6 col-lg-4">
                <!-- Package Price  -->
                <div class="single-price-plan  text-center">
                    <!-- Package Text  -->
                    <div class="package-plan">
                        <h5>1 ساله</h5>
                        <div class="ca-price d-flex justify-content-center">
                            <span>میلیون تومان</span>
                            <h4>1</h4>
                        </div>
                    </div>
                    <div class="package-description p-3">
                        <p>افزودن و آپدیت خودکار محصولات</p>
                        <p>محصول نامحدود</p>
                        <p>تراکنش نامحدود</p>
                        <p>سفارش نامحدود</p>
                        <p>افزودن اطلاعات به صورت خودکار</p>
                        <p>لینک خرید درگاه</p>
                        <p>آمار بازخورد از خرید</p>
                        <p>بررسی تراکنش ها</p>
                        <p>پشتیبانی 24 ساعته</p>
                        <p>ارائه آمار کاربردی</p>
                    </div>
                    <!-- Plan Button  -->
                    <div class="plan-button">
                        <a href="#">بریم !</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <!-- Package Price  -->
                <div class="single-price-plan active text-center">
                    <!-- Package Text  -->
                    <div class="package-plan">
                        <h5>6 ماهه</h5>
                        <div class="ca-price d-flex justify-content-center">
                            <span>هزار تومان</span>
                            <h4>550</h4>
                        </div>
                    </div>
                    <div class="package-description p-3">
                        <p>افزودن و آپدیت خودکار محصولات</p>
                        <p>محصول نامحدود</p>
                        <p>تراکنش نامحدود</p>
                        <p>سفارش نامحدود</p>
                        <p>افزودن اطلاعات به صورت خودکار</p>
                        <p>لینک خرید درگاه</p>
                        <p>آمار بازخورد از خرید</p>
                        <p>بررسی تراکنش ها</p>
                        <p>پشتیبانی 24 ساعته</p>
                        <p>ارائه آمار کاربردی</p>
                    </div>
                    <!-- Plan Button  -->
                    <div class="plan-button">
                        <a href="#">بریم !</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4 ">
                <!-- Package Price  -->
                <div class="single-price-plan text-center">
                    <!-- Package Text  -->
                    <div class="package-plan">
                        <h5>3 ماهه</h5>
                        <div class="ca-price d-flex justify-content-center">
                            <span> هزار تومان</span>
                            <h4>300</h4>
                        </div>
                    </div>
                    <div class="package-description p-3">
                        <p>افزودن و آپدیت خودکار محصولات</p>
                        <p>محصول نامحدود</p>
                        <p>تراکنش نامحدود</p>
                        <p>سفارش نامحدود</p>
                        <p>افزودن اطلاعات به صورت خودکار</p>
                        <p>لینک خرید درگاه</p>
                        <p>آمار بازخورد از خرید</p>
                        <p>بررسی تراکنش ها</p>
                        <p>پشتیبانی 24 ساعته</p>
                        <p>ارائه آمار کاربردی</p>
                    </div>
                    <!-- Plan Button  -->
                    <div class="plan-button">
                        <a href="#">بریم !</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="awesome-feature-area bg-white section_padding_70 clearfix" id="features">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Heading Text -->
                <div class="section-heading text-center">
                    <h2>یه نگاه به امکانات بنداز</h2>
                    <div class="line-shape"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Single Feature Start -->

            <!-- Single Feature Start -->

            <!-- Single Feature Start -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class="ti-money" aria-hidden="true"></i>
                    <h5>درگاه پرداخت</h5>
                    <p>درگاه رسمی پرداخت، جان ؟ شوخیه دیگه ؟؟ نه نیست</p>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class=" ti-package " aria-hidden="true"></i>
                    <h5>ثبت محصولات با ما</h5>
                    <p>محصول وارد کردن سخته؟ ما انجامش میدیم</p>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class=" ti-shopping-cart-full " aria-hidden="true"></i>
                    <h5>فروشگاه اینترنتی رایگان</h5>
                    <p>
                        فروشگاه حرفه ای، با امکانات کامل
                    </p>
                </div>
            </div>


            <!-- Single Feature Start -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class=" ti-fullscreen " aria-hidden="true"></i>
                    <h5>بیشتر شناخته شو</h5>
                    <p>بازارتو بزرگ تر کن</p>
                </div>
            </div>
            <!-- Single Feature Start -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class=" ti-shield " aria-hidden="true"></i>
                    <h5>ضمانت بازگشت کالا</h5>
                    <p>
                        راضی نبودی ؟ پولتو پس بگیر
                    </p>
                </div>
            </div>
            <!-- Single Feature Start -->
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="single-feature">
                    <i class=" ti-mobile " aria-hidden="true"></i>
                    <h5>خرید آسون تر از این نمیشه</h5>
                    <p>
                       فروش محصول، فقط با ارسال یه کد توسط خریدار
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ***** Awesome Features End ***** -->

<!-- ***** Video Area Start ***** -->

<!-- ***** Video Area End ***** -->

<!-- ***** Cool Facts Area Start ***** -->

<!-- ***** Cool Facts Area End ***** -->


<!-- ***** Contact Us Area Start ***** -->
{{--    <section class="footer-contact-area section_padding_100 clearfix" id="contact" style="box-shadow: rgba(0, 0, 0, 0.3) 0px 20px 30px -20px; margin-bottom: 620px;">--}}
<section class="footer-contact-area section_padding_100 clearfix" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Heading Text -->
                <div class="section-heading text-center">
                    <h2>تماس با ما</h2>
                    <div class="line-shape "></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">

                <div class="footer-text">
                    <iframe id="my-deferred-iframe" src="about:blank" width="100%" height="250" frameborder="0"
                        style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                {{--                <div class="address-text">--}}
                {{--                    <p><span>Address:</span> 40 Baria Sreet 133/2 NewYork City, US</p>--}}
                {{--                </div>--}}
                {{--                <div class="phone-text">--}}
                {{--                    <p><span>Phone:</span> +11-225-888-888-66</p>--}}
                {{--                </div>--}}
                {{--                <div class="email-text">--}}
                {{--                    <p><span>Email:</span> info.deercreative@gmail.com</p>--}}
                {{--                </div>--}}
            </div>
            <div class="col-md-6">
                <!-- Form Start-->
                <div class="contact_from">
                    <form action="{{route('contact')}}" method="post">
                        @csrf
                        <!-- Message Input Area Start -->
                        <div class="contact_input_area">
                            <div class="row">
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="نام و نام خانوادگی ..." required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="پست الکترونیک شما ..." required>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="body" class="form-control" id="message" cols="30" rows="4"
                                            placeholder="پیغام شما ..." required></textarea>
                                    </div>
                                </div>
                                <!-- Single Input Area Start -->
                                <div class="col-12">
                                    <button type="submit" class="btn submit-btn">بفرست براش !</button>
                                </div>
                            </div>
                        </div>
                        <!-- Message Input Area End -->
                    </form>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- ***** Contact Us Area End ***** -->
@endsection