@extends('layouts.layout')
@section('content')
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">

                    <div class="header text-center">
                        <img src="{{asset('assets/images/logo-p.png')}}" width="80px" alt="شرخر">
                        <h5>ارور 500</h5>
                        <span>چیزی شکسته است :-(</span>
                        <a class="btn btn-primary " href="{{url()->previous()}}">
                            بازگشت
                            <i class="zmdi zmdi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="body">
                        <img src="{{asset('assets/images/final1.png')}}" alt="404"/>
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