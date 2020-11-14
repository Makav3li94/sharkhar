@extends('layouts.admin_layout',['title' => 'محصولات','b_level2'=>'محصولات','back'=>'true'])
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}"/>
    <style>
        @media only screen
        and (max-width: 760px), (min-device-width: 768px)
        and (max-device-width: 1024px) {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                margin: 0 0 1rem 0;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }

            td:before {
                position: absolute;
                top: 15px;
                right: 0;
                width: 45%;
                padding-right: 10px;
                white-space: nowrap;
                text-align: right;
            }

            tr:nth-child(2n+1) {
                background: #f4f4f4;
            }

            /*
            Label the data
        You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
            */
            td:nth-of-type(1):before {
                content: "ردیف";
            }

            td:nth-of-type(2):before {
                content: "تصویر";
            }
            td:nth-of-type(3):before {
                content: "";
            }
            td:nth-of-type(4):before {
                content: "قیمت";
            }

            td:nth-of-type(5):before {
                content: "لینک";
            }

            td:nth-of-type(6):before {
                content: "عملیات";
            }

            .table td, .table th {
                text-align: left;
            }

            td .tr{
                text-align: right;
            }
        }

        @media screen and ( max-width: 520px ) {

            li.page-item {
                display: none;
            }

            .page-item:first-child,
            .page-item:last-child,
            .page-item:nth-last-child(2),
            .page-item:nth-child(2),
            .page-item.active {
                display: block;
            }
        }
    </style>

@endsection
@section('content')
    @if(count($products) > 0)
        <div class="container">
            <div class="alert alert-info"> {{auth()->user()->name}}،اگر محصول قیمت مشخص ندارد قبل از کپی لینک قیمت محصول
                را به تومان در جدول وارد کنید.
            </div>
        </div>
    @endif
    <div class="container">

        <div class="row clearfix" data-intro="لیست محصولات شما ...">
            @if(count($products) > 0)
                <div class="card">
                    <div class="body">
                        <div class="col-lg-12">
                            <div class="">
{{--                                <table class="table">--}}
                                <table class="table js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>تصویر</th>
                                        <th>نام</th>
                                        <th data-intro="اگر علاقه ای به ثبت قیمت ندارید، قبل از کپی لینک قیمت روز را در این قسمت وارد کنید.">قیمت</th>
                                        <th data-intro="برای مشتری پیج ایسنتاگرام یا کسب و کارتون، این لینک را از طریق دکمه کپی ارسال کنید،همین ! بقیش با ما.">کپی لینک خرید</th>
                                        <th data-intro="ویراش، حذف و تغییر قیمت محصول ...">عملیات</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    @foreach($products as $key=>$product)
                                        <tr>
                                            <td>    {{$key + 1}} </td>
                                            <td>
                                                <a href="{{route('seller.products.edit',$product->id)}}">
                                                    <img src="{{$product->image_thumb}}" width="35" alt="Product img">
                                                </a>
                                            </td>
                                            <td class="tr">
                                                {{\Illuminate\Support\Str::limit($product->title,80)}}
                                            </td>
                                            <td >
                                                @if($product->price !=0)
                                                    {{number_format($product->price)." تومان" ?? ''}}
                                                @else
                                                    <input class="form-control total price_input" onkeyup="optinalPriceFunc('{{$product->id}}')" name="optional_price" id="{{$product->id}}-optional_price" type="text">
                                                @endif
                                            </td>

                                            <td>
                                                <button class="btn btn-sm btn-info clipboard-btn" data-clipboard-text="{{route('product',$product->id)}}">
                                                    <i class="zmdi zmdi-copy"></i>
                                                </button>
                                                ||
                                                <a class="btn btn-sm btn-success"
                                                   id="{{$product->id}}-whatsup-link"
                                                   href="whatsapp://send?text={{route('product',$product->id)}}"
                                                   data-action="share/whatsapp/share">
                                                    <i class="zmdi zmdi-whatsapp"></i>
                                                </a>
                                            </td>
                                            <td>

                                                <a href="{{route('seller.products.edit',$product->id)}}"
                                                   class="btn btn-default waves-effect waves-float btn-sm waves-green"><i
                                                            class="zmdi zmdi-edit"></i></a>
                                                ||
                                                <button id="" data-type="confirm" data-id="{{$product->id}}"
                                                        class="delete_product btn btn-danger waves-effect waves-float btn-sm waves-red">
                                                    <i
                                                            class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>


                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="body">
                        <p class="text-primary text-center m-0">
                            فعلا محصولی ندارید :(
                        </p>
                    </div>
                </div>
            @endif
{{--            @if($products->hasPages()  )--}}
{{--                <div class="card">--}}
{{--                    <div class="body">--}}
{{--                        <div class="col-lg-12">--}}
{{--                            {{$products->links('vendor.pagination.custom')}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>

    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script> <!-- Bootstrap Notify Plugin Js -->
    <script>
        $(document).ready(function () {

            var btns = document.querySelectorAll('button');
            var clipboard = new ClipboardJS(btns);

            clipboard.on('success', function(e) {
                console.log(e);
            });

            clipboard.on('error', function(e) {

            });

            if (RegExp('multipage', 'gi').test(window.location.search)) {
                introJs().setOption('doneLabel', 'صفحه بعد').start().oncomplete(function () {
                    window.location.href = '{{ url("seller/orders/?multipage=true") }}';
                });
            }

        });

        function optinalPriceFunc(val) {

            if (this.timer) {
                window.clearTimeout(this.timer);
            }
            this.timer = window.setTimeout(function() {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var product_id = val;
                var price = $('#'+ val + '-optional_price').val();
                $.ajax({
                    'url': "{{route('seller.optional_price')}}",
                    'type': 'get',
                    'contentType': "application/json",
                    data: {product_id: product_id,optional_price:price},

                    success: function (response) {

                        if (response.price_error == 'true'){
                            var allowDismiss = true;
                            $.notify({
                                    message: "لطفا قیمت را درست وارد کنید."
                                },
                                {
                                    type: 'alert-danger',
                                    allow_dismiss: allowDismiss,
                                    newest_on_top: true,
                                    timer: 3000,
                                    placement: {
                                        from: 'bottom',
                                        align: 'left'
                                    },
                                    template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "" : "") + '" role="alert">' +
                                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                        '<span data-notify="icon"></span> ' +
                                        '<span data-notify="title">{1}</span> ' +
                                        '<span data-notify="message">{2}</span>' +
                                        '<div class="progress" data-notify="progressbar">' +
                                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                        '</div>' +
                                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                                        '</div>'
                                });
                        }

                        if (response.optional_price == 'success') {

                            $('#'+ val + '-copy-link').attr("data-clipboard-text", "{{url('/product/')}}"+'/'+val+'/'+price).change();
                            $('#'+ val + '-whatsup-link').attr("href", 'whatsapp://send?text='+"{{url('/product/')}}"+'/'+val+'/'+price).change();
                            var allowDismiss = true;
                            $.notify({
                                    message: "قیمت موقت اعمال شد."
                                },
                                {
                                    type: 'alert-success',
                                    allow_dismiss: allowDismiss,
                                    newest_on_top: true,
                                    timer: 3000,
                                    placement: {
                                        from: 'bottom',
                                        align: 'left'
                                    },
                                    template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "" : "") + '" role="alert">' +
                                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                        '<span data-notify="icon"></span> ' +
                                        '<span data-notify="title">{1}</span> ' +
                                        '<span data-notify="message">{2}</span>' +
                                        '<div class="progress" data-notify="progressbar">' +
                                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                        '</div>' +
                                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                                        '</div>'
                                });
                        }
                    }
                });

            }, 500);


        }

        $(document).ready( function () {$('.js-basic-example').dataTable( {
            "bSort": false
        } );
        } );

        $(function () {
            $('.delete_product').on('click', function () {
                var type = $(this).data('type');
                var id = $(this).data('id');
                if (type === 'basic') {
                    showBasicMessage();
                } else if (type === 'confirm') {
                    showConfirmMessage(id);
                }

            });
        });

        function showBasicMessage() {
            swal("سلام دنیا!");
        }

        function showConfirmMessage(id) {
            swal({
                title: "شما مطمئن هستید؟",
                text: "پس از حذف شدن، نمیتوانید این فایل محصول را بازیابی کنید!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax({
                            url: '/seller/products/' + id,
                            type: 'delete',
                            dataType: 'json',
                            cache: false,
                            data: {
                                product_id: id,
                            },


                            success: function (data) {
                                if (data.delete_product == 'success') {
                                    swal("پوف! محصول شما حذف شده است!", {
                                        icon: "success",
                                    });
                                } else if (data.bitarbiat == 'success') {
                                    swal("پوف! محصول شما حذف شده است!", {
                                        icon: "success",
                                    });
                                }
                                location.reload();
                            }

                        });

                    } else {
                        swal("محصول شما امن است!");
                    }
                });
        }

        //
        // function copyToClipboard(id) {
        //
        //     var copyText = document.getElementById(id);
        //     copyText.select();
        //     copyText.setSelectionRange(0, 99999);
        //     document.execCommand("copy");
        //     alert("لینک کپی شد." + copyText.value);
        //     return false;
        // }



    </script>
@endsection