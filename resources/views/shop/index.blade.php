@extends('layouts.admin_layout',['title' => 'فروشگاه ها شرخر  | پرداخت امن، فروش آسان','b_level2'=>'فروشگاه ها شرخر  | پرداخت امن، فروش آسان'])
@section('content')
    <div class="container">

        <div class="row clearfix">


               @foreach($best as $besty)

                   <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                       <div class="card">
                           <div class="header">
                               <h3><strong>فروشگاه </strong> برتر</h3>
                           </div>
                           <div class="body product_item shop-box">

                               <span class="badge badge-{{$besty->is_verified == 1 ? 'succcess' : 'danger'}}">{{$besty->is_verified == 1 ? 'تایید هویت شده' : ''}}</span>
                               <a href="{{route('vendor',$besty->insta_user)}}">
                                   <span class="label" style="background-color: #3c763d;top: 100px!important;">تایید هویت شده</span>
                                   <img src="{{$besty->logo}}" alt="Product" class="cp_img"/>
                               </a>
                               <h2 class="text-blush text-center font-14 pt-4">
                                   <a href="{{route('vendor',$besty->insta_user)}}">
                                       {{$besty->title}}
                                   </a>
                               </h2>
                               <div class="product_details">
                                   <a href="{{route('vendor',$besty->id)}}">{{$besty->insta_logo}}</a>
                                   @if($besty->category != null)
                                   <ul class="product_price list-unstyled">
                                       <li class="old_price">دسته:</li>
                                       <li class="new_price">{{\Illuminate\Support\Str::limit($besty->category,15)}}</li>
                                   </ul>
                                       @endif
                               </div>
                               <div class="action text-center">
                                   <a href="{{route('vendor',$besty->insta_user)}}" class="btn btn-info waves-effect">
                                       <i class="zmdi zmdi-eye"></i>
                                   </a>

                               </div>
                           </div>
                       </div>
                   </div>
               @endforeach

        </div>
        <hr>
        <div class="row clearfix">

            @foreach($sellers as $seller)

                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                    <div class="card">
                        <div class="body product_item">

                            <span class="badge badge-{{$seller->is_verified == 1 ? 'succcess' : 'danger'}}">{{$seller->is_verified == 1 ? 'تایید هویت شده' : ''}}</span>
                            <a href="{{route('vendor',$seller->insta_user)}}">
                                <span class="label onsale">تایید نشده</span>
                            <img src="{{$seller->logo}}" alt="Product" class="cp_img"/>
                            </a>
                            <h2 class="text-blush text-center font-14 pt-4">
                                <a href="{{route('vendor',$seller->insta_user)}}">
                                    {{$seller->title}}
                                </a>
                            </h2>
                            <div class="product_details">
                                <a href="{{route('vendor',$seller->id)}}">{{$seller->insta_logo}}</a>
                                @if($seller->category != null)
                                <ul class="product_price list-unstyled">
                                    <li class="old_price">دسته:</li>
                                    <li class="new_price">{{\Illuminate\Support\Str::limit($seller->category,15)}}</li>
                                </ul>
                                    @endif
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
        <div class="row">
            @if($sellers->hasPages()  )
                <div class="card">
                    <div class="body">
                        {{$sellers->links('vendor.pagination.custom')}}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
@section('scripts')

@endsection
@section('styles')

@endsection