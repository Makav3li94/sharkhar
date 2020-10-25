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
                        <h2>شرخر: فروش آسان، خرید امن </h2>
                                            <h3>شره !</h3>
                        <p>همه چیزی که برای مدیریت، آنالیز، و رشد کسب و کارتون نیاز دارید.</p>
{{--                        <p>دیگه نگران نباشید  پیج جنسو میفرسته، درست میفرسته، چی می فرسته :)</p>--}}
                    </div>
                    <div class="get-start-area">
                        <!-- Form Start -->
                        <a href="{{route('register')}}" class="submit">شروع کنیم.</a>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome thumb -->
        <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
            <img src="{{asset('front/img/bg-img/welcome-img.png')}}" alt="">
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
                            <img src="{{asset('front/img/bg-img/special.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-5 ml-xl-auto">
                        <div class="special_description_content">
                            <h2>بهترین پیشنهاد برای پیج های اینستاگرامی</h2>
                            <p>
                                شرخر چیه ؟ خیلی خلاصه شرخر یه الگوریتم داره که با استفاده از پیج ایسنتا گرام شما، یک فروش خیلی زیبا با امکانات کامل براتون می سازه.
                                خوب کلی شرکت طراحی سایت هست که الان با قیمت پایین به ما سایت میدن، چرا بیایم اینجا؟ بله شرکت ها در خصوص هزینه سئو و شرایط سخت بهینه سازی برای موتور های جست و جو کاملا ساکتن موقع قرارداد !
                                طراحی سایت کلا چیز خیلی خوبیه اگر اصولی انجام بشه ولی راستش قیمت موفقیت براش بالاست.
                                ما چی کار می کنیم، اولی اینکه شما تو همون محیط اینستاگرام کاراتون رو می کنید.
                                ما با سیاست هامون کاملا هوای مشتری رو داریم و و تلاش می کنیم که مشکل اعتماد سازی مشتری ها به پیج ها حل بشه.
                                چجوری ؟ ثبت نام کن ببین ;)
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
                        <h2>چرا ما خاصیم ؟</h2>
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
                            <i class="ti-ruler-pencil" aria-hidden="true"></i>
                        </div>
                        <h4>بهتری رابط کاربری</h4>
                        <p>ما هرچی داشتیمو جمع کردیم تا بهترین تجربه ممکن رو برای شما به ارمغان بیاریم</p>
                    </div>
                </div>
                <!-- Single Special Area -->
                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.6s">
                        <div class="single-icon">
                            <i class="ti-settings" aria-hidden="true"></i>
                        </div>
                        <h4>سازگاری</h4>
                        <p>ما با هر نوع سیستم عاملی سازگاری کامل داریم و شما فقط کافیه اینترنت داشته باشید !</p>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div class="single-special text-center wow fadeInUp" data-wow-delay="0.2s">
                        <div class="single-icon">
                            <i class="ti-mobile" aria-hidden="true"></i>
                        </div>
                        <h4>مثه آبه خوردنه !</h4>
                        <p>درصورت ثبت نام پلتفرم باحال ما خودش همه محصولاتتون رو جمع آوری می کنه.</p>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
    <!-- ***** Special Area End ***** -->
    <section class="our-monthly-membership section_padding_70 clearfix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <div class="membership-description">
                        <h2>تمهیدات ویژه برای 1000 نفر اول، چیز زیادی نمونده تموم شه ;)</h2>
                        <p>کلی امکانات فقط با یه کلیک.</p>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="get-started-button wow bounceInDown" data-wow-delay="0.5s">
                        <a href="{{route('register')}}">استفاده از شرخر</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Awesome Features Start ***** -->

    <section class="pricing-plane-area section_padding_100_70 clearfix position-relative" id="pricing" >
        <h5 class="fornow" >
          ! فعلا،به ازای هر تراکنش تنها 1% تا سقف 2 هزار تومان
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
                        <h2>امکانات مشتیِِ ما</h2>
                        <div class="line-shape"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-user" aria-hidden="true"></i>
                        <h5>فروشگاه رایگان</h5>
                        <p>شما اگه خسته نمی شید :) دکمه ثبت نام رو بزنید تا یه فروشگاه، نه از این وردپرسی چرتو پرتاها!
                            یه فروشگاه نابی براتون بسازیم</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-pulse" aria-hidden="true"></i>
                        <h5>کارتون رو خییلی ساده کردیم</h5>
                        <p>شما نیازی نیست محصول وارد کنید، چجوری ؟؟ میشه مگه ؟؟ خوب حالا شده ما همه رو براتون وارد می
                            کنیم ;)</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-money" aria-hidden="true"></i>
                        <h5>درگاه پرداخت</h5>
                        <p>درگاه رسمی برای فروشگاه شما به بانک ؟ جان ؟ شوخیه دیگه ؟؟ نه نیست</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-palette" aria-hidden="true"></i>
                        <h5>امکان افزودن تخفیف و هزینه حمل و نقل</h5>
                        <p>فکر همه جارو کردیم.</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-view-list" aria-hidden="true"></i>
                        <h5>مدیریت سفارشات</h5>
                        <p>می تونید همه ی سفارشاتتون رو ببینید، گزارش گیری کنید، ویرایش کنید و ...</p>
                    </div>
                </div>
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="single-feature">
                        <i class="ti-bar-chart" aria-hidden="true"></i>
                        <h5>آنالیز مالی</h5>
                        <p>با ابزار گزارش گیری ما، تراکنش ها ، سود ها و ... هم هرو ببینید تا راحت تر پول در بیارید.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ***** Awesome Features End ***** -->

    <!-- ***** Video Area Start ***** -->
    <div class="video-section">
        {{--    <div class="container">--}}
        {{--        <div class="row">--}}
        {{--            <div class="col-12">--}}
        {{--                <!-- Video Area Start -->--}}
        {{--                <div class="video-area" style="background-image: url({{asset('img/bg-img/video.jpg')}});">--}}
        {{--                    <div class="video-play-btn">--}}
        {{--                        <a href="https://www.youtube.com/watch?v=f5BBJ4ySgpo" class="video_btn"><i class="fa fa-play" aria-hidden="true"></i></a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </div>--}}
    </div>
    <!-- ***** Video Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->

    <!-- ***** Cool Facts Area End ***** -->


    <!-- ***** Contact Us Area Start ***** -->
    <section class="footer-contact-area  clearfix" id="contact">
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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.605859596771!2d51.34522911561607!3d35.71131558018737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e07555a0b72ab%3A0x66e6d9605cee51f4!2sSharif%20Energy%20Research%20Institute!5e0!3m2!1sen!2sua!4v1603650460553!5m2!1sen!2sua" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
