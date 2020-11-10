@include('layouts.front_footer')

<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/mainscripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script>
<script src="{{asset('assets/plugins/clipboard.js-master/clipboard.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>
<!-- Bootstrap Notify Plugin Js -->
@yield('scripts')

<script src="{{asset('assets/js/pages/index.js')}}"></script>
<script>
    @if(session('modal'))
    $(document).ready(function () {

        setTimeout(function () {
            $("#largeModal").modal('show');

        }, 3000);


    });
    @endif
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
    $(document).ready(function () {
        var allowDismiss = true;
        @if(session()->has('success'))

        $.notify({
                message: "{{ session('success') }}"
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

        @endif

        @if(session()->has('error'))
        $.notify({
                message: "{{ session('error') }}"
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
        @endif

    });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B3RQ6EQG0M"></script>
<script>

    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-B3RQ6EQG0M');

</script>
<script src="{{asset('assets/plugins/intro.js-master/introjs.js')}}"></script>