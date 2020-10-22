@extends('layouts.admin_layout',['title' => 'فروشگاه','b_level2'=>'فروشگاه'])
@section('content')
    <div class="container">
        <div class="row clearfix">
            @foreach($sellers as $seller)
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="body product_item">

                            <span class="badge badge-{{$seller->is_verified == 1 ? 'succcess' : 'danger'}}">{{$seller->is_verified == 1 ? 'تایید هویت شده' : 'تایید نشده'}}</span>
                            <img src="{{$seller->logo}}" alt="Product" class="img-fluid cp_img"/>
                            <h2 class="text-blush font-14 pt-4">{{$seller->title}}</h2>
                            <div class="product_details">
                                <a href="{{route('vendor',$seller->id)}}">{{$seller->insta_logo}}</a>
                                <ul class="product_price list-unstyled">
                                    <li class="old_price">دسته بندی فروشگاه : </li>
                                    <li class="new_price">{{$seller->category}}</li>
                                </ul>
                            </div>
                            <div class="action text-center">
                                <a href="{{route('vendor',$seller->insta_user)}}" class="btn btn-info waves-effect">
                                    <i class="zmdi zmdi-eye"></i>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
@section('scripts')

@endsection
@section('styles')

@endsection