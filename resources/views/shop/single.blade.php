@extends('layouts.admin_layout',['title' => 'صفحه محصول','b_level2'=>$seller->insta_user,'hide'=>'true'])
@section('content')
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12">
                                <div class="blogitem-image">
                                    <img src="{{$product->image}}" alt="blog image">
                                </div>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-12">
                                <div class="product details">
                                    <h3 class="product-title mb-0">{{\Illuminate\Support\Str::limit($product->title,40)}}</h3>
                                    <h5 class="price mt-0">قیمت فعلی: <span class="col-amber">{{$product->price != 0 ? number_format($product->price) : 'وارد نشده.'}} تومان</span>
                                    </h5>
                                    <div class="rating">
                                        <div class="stars">
                                            @for($i = 1; $i <= $p_good; $i++)
                                                <span class="zmdi zmdi-star col-amber"></span>
                                            @endfor
                                            @for($i = 1; $i <= (5 - $p_good); $i++)
                                                <span class="zmdi zmdi-star-outline"></span>
                                            @endfor
                                        </div>
                                        <span class="m-l-10">{{$all}} بررسی</span>
                                    </div>
                                    <hr>
                                    <p class="product-description">
                                        {!! $product->body !!}
                                    </p>
                                    <div class="action">
                                        <form action="{{route('payment_view',$product->id)}}" method="get">
                                            @csrf
                                            <div class="row form-group">
                                                <div class=" col-lg-12 col-md-12 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group my-1">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="ti-counter ml-2"></i>تعداد
                                                        </span>
                                                                    </div>
                                                                    <input type="number" class="form-control"
                                                                           name="qty" value="1" id="qty"
                                                                           onchange="getCost()" min="1">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group my-1">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text">
                                                                         <i class="ti-money ml-2"></i>قیمت
                                                                      </span>
                                                                    </div>
                                                                    <input type="text" class="form-control"
                                                                           name="cost" id="total"
                                                                           value="{{$product->price}}">
                                                                    <input type="hidden" name="default_cost"
                                                                           id="default_cost"
                                                                           value="{{$product->price}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            @if(!auth()->guard('buyer')->check())
                                                <h6 class="text-center mb-2 inlineblock">لطفا اطلاعات زیر را جهت
                                                    پیگیری سفارشتان پر کنید.</h6>
                                                <div class="row">
                                                    <!-- Single Input Area Start -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name"
                                                                   placeholder="نام و نام خانوادگی ..."
                                                                   value="{{old('name')}}"
                                                                   oninput="setCustomValidity('')"
                                                                   oninvalid="this.setCustomValidity('لطفا نام و نام خانوادگی را وارد کنید')"
                                                                   required>
                                                        </div>
                                                        @if($errors->has('name'))
                                                            <small class="text-danger">
                                                                {{$errors->first('name')}}
                                                            </small>
                                                        @endif

                                                    </div>
                                                    <!-- Single Input Area Start -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                   name="mobile"
                                                                   placeholder="شماره تلفن ..."
                                                                   value="{{old('mobile')}}"
                                                                   oninput="setCustomValidity('')"
                                                                   oninvalid="this.setCustomValidity('لطفا شماره تلفن را وارد کنید')"
                                                                   required>
                                                        </div>
                                                        @if($errors->has('mobile'))
                                                            <small class="text-danger">
                                                                {{$errors->first('mobile')}}
                                                            </small>
                                                        @endif
                                                    </div>

                                                    <!-- Single Input Area Start -->

                                                </div>

                                            @endif

                                            <button class="btn btn-raised btn-primary btn-round waves-effect"
                                                    type="submit">تکمیل فرایند خرید
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">

                <div class="card">
                    <div class="header">
                        <h2><strong>خواندن</strong> نظرات</h2>
                    </div>
                    <div class="body">

                        <ul class="row list-unstyled c_review mt-4">
                            @foreach($feedbacks as $feedback)
                                <li class="col-12">
                                    <div class="avatar">
                                        <a href="javascript:void(0);">
                                            <img class="rounded" src="{{'assets/images/xs/avatar2.jpg'}}" alt="user"
                                                 width="60"></a>
                                    </div>
                                    <div class="comment-action">
                                        <h5 class="c_name">{{$feedback->buyer->name}}</h5>
                                        <p class="c_msg mb-0"> {{$feedback->body}} </p>
                                        <span class="m-l-10">
                                            @if($feedback->score == 'green')
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>

                                            @elseif($feedback->score == 'warning')
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-outline text-muted"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-outline text-muted"></i></a>
                                            @else
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star col-amber"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-outline text-muted"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-outline text-muted"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-outline text-muted"></i></a>
                                                <a href="javascript:void(0);"><i
                                                            class="zmdi zmdi-star-outline text-muted"></i></a>
                                            @endif

                                                </span>
                                        <small class="comment-date float-sm-right">{{$feedback->created_at}}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script>
        $(document).ready(function () {
            var cost = $('#default_cost').val();
            var qty = $('#qty').val();
            $('#total').val(qty * cost);
            $("#total").change();
            getChange();
        });

        function getCost() {
            var cost = $('#default_cost').val();
            var qty = $('#qty').val();
            $('#total').val(qty * cost);
            $("#total").change();
            getChange();
        }

        console.clear();
        const currency = [2000, 1000, 500, 200, 100, 50, 20, 10, 5, 2, 1];

        const valueRef = document.querySelector("#total");

        function getCurrency(value) {
            console.clear();
            var map = new Map();
            let i = 0;
            //loop unitll value 0
            while (value) {
                //if divide in non-zero add in map
                if (Math.floor(value / currency[i]) != 0) {
                    map.set(currency[i], Math.floor(value / currency[i]));
                    //update value using mod
                    value = value % currency[i];
                }
                i++;
            }

            // debugger;
            for (var [key, value] of map) {
                console.log(key + " = " + value);
            }
        }

        function getChange() {
            // 48 - 57 (0-9)
            var str1 = valueRef.value;
            if (
                str1[str1.length - 1].charCodeAt() < 48 ||
                str1[str1.length - 1].charCodeAt() > 57
            ) {
                valueRef.value = str1.substring(0, str1.length - 1);
                return;
            }

            // t.replace(/,/g,'')
            let str = valueRef.value.replace(/,/g, "");

            let value = +str;
            getCurrency(value);

            valueRef.value = value.toLocaleString();
            $('#price_invoice').html(value.toLocaleString() + ' هزار تومان');
            var total_val = value + {{$seller->default_shipping}};
            $('#total_invoice').html(total_val.toLocaleString() + ' هزار تومان');
        }

        valueRef.addEventListener("change", getChange);
        console.log(valueRef);


    </script>


@endsection