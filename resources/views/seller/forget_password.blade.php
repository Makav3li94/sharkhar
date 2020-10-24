@extends('layouts.layout')
@section('content')
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12">
                    <form class="card auth_form" action="{{route('forget_password')}}" method="post">
                        @csrf

                        <div class="header">
                            <img src="{{asset('assets/images/logo-p.png')}}" width="80px" alt="شرخر">

                            <h5>فراموشی رمزعبور؟</h5>
                            <span>شماره موبایل خود را وارد کنید تا رمز جدید ارسال شود.</span>
                        </div>
                        <div class="body">
                                <div class="input-group mb-3">
                                    <input type="text" name="mobile" class="form-control" placeholder="شماره موبایل "
                                           value="{{old('mobile')}}" oninput="setCustomValidity('')"
                                           oninvalid="this.setCustomValidity('لطفا شماره تلفن را وارد کنید')" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                    </div>
                                    @if($errors->has('mobile'))
                                        <small class="text-danger d-inline-block w-100  mt-2">
                                            {{$errors->first('mobile')}}
                                        </small>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">ارسال
                                    رمز جدید
                                </button>
                                <div class="signin_with mt-3">
                                    {{--                                <a href="javascript:void(0);" class="link">آیا نیازمند کمک هستید؟</a>--}}
                                </div>
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        ,
                        {{--                        <span>راست چین شده توسط <a href="https://thememakker.com/" target="_blank">آرش خادملو</a></span>--}}
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="{{asset('assets/images/signin.svg')}}" alt="Forgot Password"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('styles')
    <style>
        small {
            text-align: right !important;
            margin-bottom: 5px;
        }
    </style>
@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/bootstrap-notify/bootstrap-notify.js')}}"></script> <!-- Bootstrap Notify Plugin Js -->
    @if(session('mobileNotFound'))
    <script>
        var allowDismiss = true;
        $.notify({
                message: "همچین شماره ای در سیستم وجود ندارد"
            },
            {
                type: 'alert-warning',
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
    </script>
    @endif
@endsection
