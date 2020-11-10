@extends('layouts.admin_layout',['title' => 'امور مالی','b_level2'=>'عملیات کیف پول','back'=>'true'])
@section('styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}">
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
                content: "خریدار";
            }

            td:nth-of-type(3):before {
                content: "تلفن";
            }


            td:nth-of-type(4):before {
                content: "شماره سفارش";
            }

            td:nth-of-type(5):before {
                content: "فیمت";
            }

            td:nth-of-type(6):before {
                content: "وضعیت";
            }

            td:nth-of-type(7):before {
                content: "پیگیری";
            }

            td:nth-of-type(8):before {
                content: "تراکتش";
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
            <div class="col-md-6 col-lg-6 col-sm-12 pr-0 mr-0">
                <div class="card widget_2 big_icon wallet">
                    <div class="body">
                        <h3 class="mt-0 mb-0">{{number_format(auth()->user()->wallet->raw_balance)}}
                            تومان</h3>
                        <p class="text-muted">موجودی کیف شما</p>
                        <div class="progress">
                            <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 45%;"></div>
                        </div>
                        <small>21% بالاتر از ماه گذشته</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-12 pl-0 ml-0">
                <div class="card widget_2 big_icon money">
                    <div class="body">
                        <h3 class="mt-0 mb-0">{{number_format($walletCheckouts)}} تومان</h3>
                        <p class="text-muted">مجموع برداشتی</p>
                        <div class="progress">
                            <div class="progress-bar l-pink" role="progressbar" aria-valuenow="45"
                                 aria-valuemin="0"
                                 aria-valuemax="100" style="width: 45%;"></div>
                        </div>
                        <small>43% بالاتر از ماه گذشته</small>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="header">
                    درخواست برداشت
                </div>
                <div class="body">
                    <form action="{{route('seller.wallet_pay')}}" method="get" class="form-horizontal">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 form-control-label">
                                <label for="email_address_2">مبلغ</label>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-4">
                                <div class="form-group">
                                    <input type="text" name="amount" id="total" class="form-control" placeholder="مثلا 100,000">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-raised btn-info btn-round waves-effect">برداشت
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-4">
                                <div class="d-flex bd-highlight text-center mb-3">
                                    <div class="bg-green flex-fill bd-highlight">
                                        <h3 class="mt-3 mb-0">{{number_format(auth()->user()->wallet->raw_balance)}}
                                            تومان</h3>
                                        <p>مبلغ قابل برداشت</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if(count($wallet->checkouts) > 0)
                <div class="card">
                    <div class="body">
                        <div class="col-lg-12">

                            <div>

                                <table class="table js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نوع</th>
                                        <th>مقدار</th>
                                        <th>وضعیت</th>
                                        <th>تاریخ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wallet->checkouts as $key=>$checkouts)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>
                                                <div class="label label-{{$checkouts->transaction_type == 1 ? 'success' : 'danger' }}">
                                                    {{$checkouts->transaction_type == 1 ? 'ورودی' : 'برداشت' }}
                                                </div>
                                            </td>
                                            <td>{{number_format($checkouts->amount)}} تومان</td>
                                            <td>
                                                <span class="col-green">
                                                @if($checkouts->transaction_type == 1)
                                                        انجام شده
                                                    @else
                                                        @if($checkouts->status == 1)
                                                            انجام شده
                                                        @else
                                                            در حال واریز
                                                        @endif
                                                    @endif
                                                </span>
                                            </td>

                                            <td>{{$checkouts->created_at ?? ''}}</td>
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
                            فعلا عملیاتی ندارید :(
                        </p>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.js-basic-example').dataTable({
                "bSort": false
            });
        });
        $(document).ready(function () {


            if (RegExp('multipage', 'gi').test(window.location.search)) {
                introJs().setOption('doneLabel', 'صفحه بعد').start().oncomplete(function () {
                    window.location.href = '{{ url("seller/feedbacks/?multipage=true") }}';
                });
            }
        });
        $('#total').on('keyup', function (e) {
            var $self = $(this),
                v = $self.val(),
                max = {{auth()->user()->wallet->raw_balance}};

            //blank any input that isint a number
            if (!/^\d*$/.test(v)) {
                $self.val('');
                return;
            }

            //trim the value until it meets the condition
            if (v > max) {
                while (v > max) {
                    v = v.substring(0, v.length - 1);
                    var allowDismiss = true;

                    $.notify({
                            message: "مبلغ درخواستی شما بیش از موجودی کیف پول است."
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

                $self.val(v);
            }
        });
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
        }

        valueRef.addEventListener("keyup", getChange);
        console.log(valueRef);

    </script>
@endsection