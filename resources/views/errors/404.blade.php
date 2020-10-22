@extends('layouts.layout')
@section('content')
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">

                    <div class="header text-center">
                        <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                        <h5>ارور 404</h5>
                        <span>صفحه مورد نظر پیدا نشد :-(</span>
                        <a class="btn btn-primary " href="{{url()->previous()}}">
                            بازگشت
                            <i class="zmdi zmdi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="body">
                        <img src="{{asset('assets/images/404.svg')}}" alt="404"/>
                    </div>

                    <div class="copyright text-center">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        ,کلیه حقوق محفوظ است.شرخر!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection