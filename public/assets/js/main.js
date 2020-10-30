$(document).ready(function () {
    $('.toTop').on('click', function (event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 'slow');
    });


    $('form#app-search input').keyup(delay(function (e) {
        var val = $(this).val();
        if (val == '') {
            $('form#app-search .list-group').empty();
        } else {
            $.ajax({
                'url': '/seller/search',
                'type': 'get',
                'dataType': 'json',
                data: {val: val},
                success: function (response) {
                    $('form#app-search .list-group').empty();
                    if (response.records == 'none') {
                        var html = '<a href="#" class="list-group-item list-group-item-action font-13 p-2 mr-0">نتیجه ای یافت نشد.</a>';
                        $('form#app-search .list-group').append(html);
                    } else {
                        $('form#app-search .list-group').html(response.records);
                        var btns = document.querySelectorAll('button');
                        var clipboard = new ClipboardJS(btns);
                    }
                }
            });
        }

    }, 500));
});

function delay(callback, ms) {
    var timer = 0;
    return function () {
        var context = this, args = arguments;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, ms || 0);
    };
}

$(document).ready(function () {

    var btns = document.querySelectorAll('button');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function (e) {
        console.log(e);
    });

    clipboard.on('error', function (e) {

    });

});

function optinalPriceFunc(val) {

    if (this.timer) {
        window.clearTimeout(this.timer);
    }
    this.timer = window.setTimeout(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id = val;
        var price = $('#' + val + '-optional_price').val();
        $.ajax({
            'url': "{{route('seller.optional_price')}}",
            'type': 'get',
            'contentType': "application/json",
            data: {product_id: product_id, optional_price: price},

            success: function (response) {

                if (response.price_error == 'true') {
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

                    $('#' + val + '-copy-link').attr("data-clipboard-text", "{{url('/product/')}}" + '/' + val + '/' + price).change();
                    $('#' + val + '-whatsup-link').attr("href", 'whatsapp://send?text=' + "{{url('/product/')}}" + '/' + val + '/' + price).change();
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
