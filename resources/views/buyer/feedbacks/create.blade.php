@extends('layouts.admin_layout',['title' => 'بازخورد جدید','b_level2'=>'بازخورد جدید','back'=>'true'])

@section('content')

    <div class="container">
        <div class="row clearfix">

            <div class="card">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 col-md-12">
                            <div class="form-group">
                                <label>انتخاب سفارش</label>
                                <select class="form-control  ms select2" id="order" name="order"
                                        onchange="getSeller()" data-placeholder="انتخاب سفارش">
                                    <option></option>
                                    @foreach($orders as $order)
                                        <option value="{{$order->id}}" {{old('order') == $order->id ? 'selected="selected"' : '' }}>{{$order->seller->insta_user.' ||  '.\Illuminate\Support\Str::limit($order->product->title,40)}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="ajax"></div>
        </div>
    </div>

@endsection
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/select2.css')}}"/>

    <style>
        .note-editor {
            width: 100%;
        }
    </style>
@endsection

@section('scripts')
    <script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script> <!-- Bootstrap Notify Plugin Js -->
    <script src="{{asset('assets/plugins/select2/select2.min.js')}}"></script> <!-- Select2 Js -->
    <script>
        $(function () {
            $('.select2').select2();
        });
        $(document).ready(function () {
            if ($('#order').val().length != 0) {
                getSeller()
            }
        });


        function getSeller() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var order_id = $('#order').val();
            $.ajax({
                'url': "{{route('buyer.get.seller.ajax')}}",
                'type': 'get',
                'contentType': "application/json",
                data: {order_id: order_id},

                success: function (response) {
                    if (response.selectEroor == 'true') {
                        var allowDismiss = true;
                        $.notify({
                                message: "برای ثبت بازخورد لطفا سفارش را انتخاب کنید"
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
                        return false;
                    }
                    $('#ajax').html(response);
                    $(".summernote").summernote();
                }

            });
        }

        $(document).on('click', '#submitFeedback', function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var order = $('#order').val();
            var score = $('.score').val();
            var body = $('#body').val();
            var order_id = $('#order_id').val();
            $.ajax({
                'url': "{{route( "buyer.feedbacks.store" )}}",
                'type': 'post',
                'dataType': 'json',
                data: {order: order, score: score, body: body, order_id: order_id},

                success: function (response) {
                    if (!$.isEmptyObject(response.storeError)) {
                        var allowDismiss = true;
                        $.notify({
                                message: "ورودی های خود را بررسی کنید."
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
                        if (!$.isEmptyObject(response.storeError.body)) {
                            $('#bodyError').text(response.storeError.body[0]);
                        }


                        if (!$.isEmptyObject(response.storeError.stars)) {
                            $('#scoreError').text(response.storeError.stars[0]);
                        }
                        return false
                    } else {
                        $('form#storeForm').submit();
                    }

                }

            });
        });
    </script>
@endsection