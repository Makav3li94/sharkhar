@if(!auth()->guard()->check() && !auth()->guard('buyer')->check())
    @php $bib = 'bib' @endphp
    <footer class="text-center pt-3 pb-3 clearfix" style="font-size: 1rem!important;">
        <div class="mb-4 mt-2 p-3 ">
            <ul class="list-unstyled safety">
                <li>
                    <a referrerpolicy="origin" target="_blank"
                       href="https://trustseal.enamad.ir/?id=185088&amp;Code=swGIr379CMXL5IJdyLDB"><img
                                referrerpolicy="origin" src="{{asset('assets/images/e-namad.png')}}" alt=""
                                style="cursor:pointer" id="swGIr379CMXL5IJdyLDB"></a>
                </li>

                <li>
                    <img id='nbqeesgtjzpewlaonbqewlao' style='cursor:pointer'
                         onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=207424&p=uiwkobpdjyoeaodsuiwkaods", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                         alt='logo-samandehi' src='{{asset('assets/images/samandehi.png')}}'/>
                </li>

                <li>
                    <img src="{{asset('assets/images/passargad.png')}}" alt="درگاه بانک پاسارگاد">
                </li>

                <li>
                    <img src="{{asset('assets/images/ssk.png')}}" alt="دارای ssl">
                </li>
            </ul>

        </div>
        <div class="footer-menu footer-nav">
            <nav>
                <ul>
                    <li class="mb-3">
                        <a href="{{route('SellBenefit')}}">
                            مزایای فروش در شرخر
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{route('sellerProtection')}}">
                            حمایت از فروشندگان
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{route('DisputeRules')}}" class="border-left-0">
                            قوانین مرتبط با اختلافات
                        </a>
                    </li>
                    <br>


                    <li class="mb-3">
                        <a href="{{route('buyBenefit')}}">
                            مزایای خرید از شرخر
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{route('moneyBackGuarantee')}}" class="border-left-0">
                            ضمانت برگشت پول
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
        <!-- footer logo -->
        <div class="footer-text">
            <img src="{{asset('assets/images/logo-p.png')}}" width="80px" alt="شرخر">
        </div>
        <!-- social icon-->

        <div class="footer-menu">
            <nav>
                <ul>
                    <li class="mb-3">
                        {{--                    <i class="ti-location-pin p-2"></i>--}}
                        {{--                    آدرس : تهران، طرشت، بلوار شهید تیموری، پژوهشکده علوم و فناوری شریف پلاک ۱۷۳--}}
                        <br>
                        <i class="ti-location-pin p-2"></i>
                        دفتر مرکزی: تهران، جیحون،کوچه ریاضی، پلاک ۲۶
                    </li>
                    <br>
                    <li class="mb-3">
                        <i class=" ti-headphone-alt  p-2"></i>
                        تلفن: ۶۷ ۷۳ ۲۸۴۳-۰۲۱ - : ۶۲ ۸۸ ۵۶۰۷-۰۲۱
                    </li>
                    <br>
                    <li>
                        sharkhar@info.net
                        <i class=" ti-email  p-2"></i>

                    </li>

                </ul>
            </nav>
        </div>
        <!-- Foooter Text-->
        <div class="copyright-text ">
            <p class="text-center">Copyright ©2020 شرخر. طراحی توسط <a rel="nofollow" href="https://parnasite.com"
                                                                       target="_blank">Parna</a></p>
        </div>
    </footer>
    <style>
        .footer-text {
            margin-bottom: 15px;
        }

        .footer-menu ul li {
            display: inline-block;
        }

        .footer-nav ul {
            list-style: none;
        }

        .footer-nav ul li {
            width: 200px;

        }

        .footer-menu ul li a {
            border-left: 2px solid #726a84;
            display: block;
            padding: 0 7.5px;
            color: #726a84;
        }
    </style>
    <script>
        @if($errors->has('mobile') || $errors->has('password'))
        $('#colorModal').modal('show');
        @endif
    </script>
@endif