@extends('layouts.admin_layout',['title' => 'صفحه محصول ' .\Illuminate\Support\Str::limit($product->title,25),'b_level2'=>\Illuminate\Support\Str::limit($product->title,80),'hide'=>'true'])
@section('content')
    <div class="container">
        <div class="row clearfix">
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
                                <h3 class="product-title mb-2 mt-2">{{\Illuminate\Support\Str::limit($product->title,25)}}</h3>
                                @if($product->optional_price == 0)
                                    <h5 class="price mt-0">قیمت: <span
                                                class="col-amber">{{$product->price != 0 ? number_format($product->price) ." هزار تومان" : 'وارد نشده.'}} </span>
                                        @else
                                            <h5 class="price mt-0">قیمت فعلی: <span
                                                        class="col-amber">{{number_format($product->optional_price) ." هزار تومان" }} </span>
                                                @endif
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
                                            @if(!auth()->check())
                                                @if($product->optional_price == 0 && $product->price == 0)
                                                    <hr>
                                                    <div class="row">
                                                        <div class="alert alert-info">
                                                            امکان خرید این محصول وجود ندارد.
                                                        </div>
                                                    </div>
                                                @else
                                                    <hr>
                                                    <div class="action">
                                                        <form action="{{route('payment_view',$product->id)}}" method="get">
                                                            @csrf
                                                            @if(!auth()->guard('buyer')->check())
                                                                <small class="text-center text-info mt-1 mb-2"
                                                                       style="display: inherit">
                                                                    لطفا
                                                                    اطلاعات زیر را جهت
                                                                    پیگیری سفارشتان پر کنید.
                                                                </small>
                                                                <div class="row">
                                                                    <!-- Single Input Area Start -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="name">نام و نام خانواگی:</label>
                                                                            <input type="text" class="form-control"
                                                                                   name="name"
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
                                                                            <label for="mobile">شماره تلفن:</label>
                                                                            <input type="text" class="form-control"
                                                                                   name="mobile"

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
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="qty">تعداد:</label>
                                                                    <input type="number" class="form-control"
                                                                           name="qty" value="1" id="qty"
                                                                           onchange="getCost()" min="1">
                                                                </div>

                                                                <div class="col-md-6">

                                                                    <label for="cost">قیمت:</label>
                                                                    <input type="text" class="form-control"
                                                                           name="cost" id="total" readonly
                                                                           value="{{$product->price}}">

                                                                    @if($product->optional_price == 0)
                                                                        <input type="hidden" name="default_cost"
                                                                               id="default_cost"
                                                                               value="{{$product->price}}">
                                                                    @else
                                                                        <input type="hidden" name="default_cost"
                                                                               id="default_cost"
                                                                               value="{{$product->optional_price}}">
                                                                    @endif


                                                                </div>
                                                            </div>
                                                            <div class="row mt-4">
                                                                <div class="col-lg-12 text-center">
                                                                    <button class="btn btn-raised btn-primary btn-round waves-effect"
                                                                            type="submit">تکمیل فرایند خرید
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @if($feedbacks->count() > 0)
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
            @else
                <div class="card">
                    <div class="body">
                        <p class="text-primary text-center m-0">
                            فعلا نظری ثبت نشده :(
                        </p>
                    </div>
                </div>
            @endif
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