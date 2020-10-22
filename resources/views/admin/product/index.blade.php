@extends('layouts.admin_layout')
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}"/>
@endsection
@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>لیست محصولات</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}"><i
                                        class="zmdi zmdi-home"></i> {{auth()->user()->title}}</a></li>
                        <li class="breadcrumb-item active">لیست محصولات</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive ">
                            <table class="table table-hover product_item_list c_table theme-color mb-0  js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>تصویر</th>
                                    <th >عنوان</th>
                                    <th>قیمت</th>
                                    <th>تعداد لایک</th>
                                    <th>تعداد کامنت</th>
                                    {{--                                    <th width="200px">تعداد محصول</th>--}}
                                    {{--                                    <th width="200px">هزینه ارسال</th>--}}
                                    {{--                                    <th width="200px">تخفیف</th>--}}
                                    <th data-breakpoints="sm xs md">عملیات</th>
                                </tr>
                                </thead>
                                <tbody>


                                @foreach($products as $key=>$product)
                                    <tr>
                                        <td>    {{$key + 1}} </td>
                                        <td><img src="{{$product->image_thumb}}" width="48"
                                                 alt="Product img"></td>
                                        <td>{{\Illuminate\Support\Str::limit($product->title,20) ?? ''}}</td>
                                        <td>{{$product->price ?? ''}} هزارتومان</td>
                                        <td>{{$product->like_count ?? ''}}</td>
                                        <td>{{$product->comment_count ?? ''}}</td>
                                        <td>
                                            <input type="text" style="width: 15px"  id="link-{{$product->id}}" value="{{route('product',$product->id)}}">
                                            <button class="btn btn-sm btn-success "
                                                    style="top:5px;right: 0px"
                                                    onclick="copyToClipboard('link-{{$product->id}}')" ><i
                                                        class="zmdi zmdi-copy"></i>کپی لینک خرید برای مشتری
                                            </button>
                                            <a href="{{route('seller.products.edit',$product->id)}}"
                                               class="btn btn-default waves-effect waves-float btn-sm waves-green"><i
                                                        class="zmdi zmdi-edit"></i></a>
                                            <button id="delete_product" data-type="confirm" data-id="{{$product->id}}"
                                                    class="btn btn-danger waves-effect waves-float btn-sm waves-red"><i
                                                        class="zmdi zmdi-delete"></i></button>
                                        </td>
                                    </tr>


                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
{{--                            {{ $products->links('vendor.pagination.custom') }}--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script> <!-- SweetAlert Plugin Js -->
    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script>
        $(function () {
            $('.js-basic-example').DataTable();
        });

        $(function () {
            $('#delete_product').on('click', function () {
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