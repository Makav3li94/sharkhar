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
                content: "قیمت";
            }

            td:nth-of-type(6):before {
                content: "عملیات";
            }

            .table td, .table th {
                text-align: left;
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
    <div class="container">

        <div class="row clearfix">
            @if(count($products) > 0)
                <div class="card">
                    <div class="body">
                        <div class="col-lg-12">
                            <div class="">
                                <table class="table">
                                    {{--                            <table class="table js-basic-example dataTable">--}}
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>تصویر</th>
                                        <th>قیمت</th>
                                        <th class="nono">تعداد لایک</th>
                                        <th class="nono">تعداد کامنت</th>
                                        <th data-breakpoints="sm xs md">عملیات</th>
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
                                            <td>{{number_format($product->price) ?? ''}} <span
                                                        class="nono">هزارتومان</span>
                                            </td>
                                            <td class="nono">{{$product->like_count ?? ''}}</td>
                                            <td class="nono">{{$product->comment_count ?? ''}}</td>
                                            <td>
                                                <input type="text" style="width: 15px" id="link-{{$product->id}}"
                                                       value="{{route('product',$product->id)}}">
                                                <button class="btn btn-sm btn-success "
                                                        style="top:5px;right: 0px"
                                                        onclick="copyToClipboard('link-{{$product->id}}')"><i
                                                            class="zmdi zmdi-copy"></i>
                                                </button>
                                                <a href="{{route('seller.products.edit',$product->id)}}"
                                                   class="btn btn-default waves-effect waves-float btn-sm waves-green"><i
                                                            class="zmdi zmdi-edit"></i></a>
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
            @if($products->hasPages()  )
                <div class="card">
                    <div class="body">
                        <div class="col-lg-12">
                            {{$products->links('vendor.pagination.custom')}}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <!-- SweetAlert Plugin Js -->
    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script>
        $(function () {
            $('.js-basic-example').DataTable();
        });

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


        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
        }
    </script>
@endsection