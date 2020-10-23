<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Order;
use App\Models\Seller;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class FeedbacksController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ( auth()->guard( 'buyer' )->check() ) {
			$feedbacks = Feedback::where( 'buyer_id', auth()->guard( 'buyer' )->user()->id )->orderBy( 'id', 'desc' )->get();

			return view( 'buyer.feedbacks.index', compact( 'feedbacks' ) );

		} elseif ( auth()->guard( 'web' )->check() ) {
			$seller    = Seller::findOrfail( auth()->user()->id );
			$feedbacks = Feedback::where( 'seller_id', $seller->id )->paginate( 5 );
			$good      = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 2 ] ] )->count();
			$normal    = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 1 ] ] )->count();
			$bad       = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 0 ] ] )->count();
			$p_good    = 0;
			$p_norm    = 0;
			$p_bad     = 0;

			$all = $good + $normal + $bad;
			if ( $all != 0 ) {
				$p_good = ( ( $all - ( $all - $good ) ) / ( $all ) ) * 100;
				$p_norm = ( ( $all - ( $all - $normal ) ) / ( $all ) ) * 100;
				$p_bad  = ( ( $all - ( $all - $bad ) ) / ( $all ) ) * 100;
			}

			return view( 'seller.feedbacks.index', compact( 'feedbacks', 'seller', 'good', 'p_good', 'normal', 'p_norm', 'bad', 'p_bad', 'all' ) );
		} else {
			$feedbacks = Feedback::all();
		}
	}


	public function create() {
		if ( auth()->guard( 'buyer' )->check() ) {
			$orderIds = Feedback::where( [
				[
					'buyer_id',
					auth()->guard( 'buyer' )->user()->id
				]
			] )->pluck( 'order_id' );
//			 DB::enableQueryLog();
			$orders = Order::whereNotIn( 'id', $orderIds )->Where( [
				[ 'payment_status', 1 ],
				[ 'deliver_status', 1 ],
				[ 'buyer_id', auth()->guard( 'buyer' )->user()->id ]
			] )->get();

//			dd(DB::getQueryLog());
			return view( 'buyer.feedbacks.create', compact( 'orders' ) );

		}
	}

	public function store( Request $request ) {
		if ( $request->ajax() ) {
			$validator = Validator::make( $request->all(), [
				'order_id' => 'required',
				'stars'    => 'required|string',
				'body'     => 'required|string',
			] );
			if ( $validator->fails() ) {
				return response()->json( [ 'storeError' => $validator->errors()->toArray() ] );
			}
		}
		$order = Order::findOrFail( $request->order_id );
		Feedback::create( [
			'seller_id'  => $order->seller_id,
			'product_id' => $order->product_id,
			'buyer_id'   => $order->buyer_id,
			'order_id'   => $order->id,
			'body'       => $request->body,
			'score'      => $request->score,
		] );

		return redirect()->route( 'buyer.feedbacks.index' )->with( 'success', 'بازخورد شما ثبت شد.' );
	}


	public function edit( Feedback $feedback ) {
		if ( auth()->guard( 'buyer' )->check() ) {
			$order   = $feedback->order;
			$seller  = $order->seller;
			$product = $order->product;

			$good   = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 2 ] ] )->count();
			$normal = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 1 ] ] )->count();
			$bad    = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 0 ] ] )->count();
			$p_good = 0;
			$p_norm = 0;
			$p_bad  = 0;

			$all = $good + $normal + $bad;
			if ( $all != 0 ) {
				$p_good = ( ( $all - ( $all - $good ) ) / ( $all ) ) * 100;
				$p_norm = ( ( $all - ( $all - $normal ) ) / ( $all ) ) * 100;
				$p_bad  = ( ( $all - ( $all - $bad ) ) / ( $all ) ) * 100;
			}
			$feedbacks = Feedback::where( 'seller_id', $seller->id )->get()->take( 5 );

			return view( 'buyer.feedbacks.edit', compact( 'feedback', 'feedbacks', 'product', 'order', 'seller', 'good', 'normal', 'bad', 'p_good', 'p_norm', 'p_bad' ) );

		} elseif ( auth()->guard( 'web' )->check() ) {
			$order   = $feedback->order;
			$seller  = $order->seller;
			$product = $order->product;

			$good   = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 2 ] ] )->count();
			$normal = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 1 ] ] )->count();
			$bad    = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 0 ] ] )->count();


			$all = $good + $normal + $bad;

			$p_good = ( ( $all - ( $all - $good ) ) / ( $all ) ) * 100;
			$p_norm = ( ( $all - ( $all - $normal ) ) / ( $all ) ) * 100;
			$p_bad  = ( ( $all - ( $all - $bad ) ) / ( $all ) ) * 100;

			$feedbacks = Feedback::where( 'seller_id', $seller->id )->get()->take( 5 );

			return view( 'seller.feedbacks.edit', compact( 'feedback', 'feedbacks', 'product', 'order', 'seller', 'good', 'normal', 'bad', 'p_good', 'p_norm', 'p_bad' ) );
		} else {
			$feedbacks = Feedback::all();
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Feedback $feedback
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Feedback $feedback ) {
		$request->validate( [
			'body' => 'required|string'
		] );
		$feedback->update( [
			'reply' => $request->body
		] );

		return redirect()->back()->with( 'success', 'پاسخ شما ثبت شد.' );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Feedback $feedback
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Feedback $feedback ) {

	}


	public function getSellerAjax( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'order' => 'required|numeric'
		] );
		if ( $validator->fails() ) {
			return response()->json( [ 'selectEroor' => 'true' ] );
		}
		$order   = Order::find( $request->order_id );
		$seller  = $order->seller;
		$product = $order->product;

		$good   = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 2 ] ] )->count();
		$normal = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 1 ] ] )->count();
		$bad    = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 0 ] ] )->count();
		$p_good = 0;
		$p_norm = 0;
		$p_bad  = 0;

		$all = $good + $normal + $bad;
		if ( $all != 0 ) {
			$p_good = ( ( $all - ( $all - $good ) ) / ( $all ) ) * 100;
			$p_norm = ( ( $all - ( $all - $normal ) ) / ( $all ) ) * 100;
			$p_bad  = ( ( $all - ( $all - $bad ) ) / ( $all ) ) * 100;
		}

		$sellerIsVerified = $seller->is_verified == 'green' ? 'تایید شده توسط شرخر' : 'تایید نشده :(';
		$sellerColor      = $seller->is_verified == "red" ? "danger" : "success";
		$deliverStatus    = ( $order->deliver_status == 'green' ) ? 'تحویل گرفتم' : 'تحویل نگرفتم';
		$deliverCollor    = $order->deliver_status == "red" ? "danger" : "success";

		$paymentStatus = ( $order->payment_status == 'green' ) ? 'تحویل گرفتم' : 'تحویل نگرفتم';
		$paymentCollor = $order->payment_status == "red" ? "danger" : "success";
		$html          = '';
		if ( $order ) {
			$html = ' 
                <div class="row">
                 
                 <div class="col-lg-4 col-md-12 pr-0 p-res-0">
                         <div class="card">
                        <div class="header">
                            <h2><strong>اطلاعات</strong> فروشنده</h2>
                        </div>
                        <div class="body">
                              <div class="col-lg-4 col-md-12">
                            <div class="img">
                                <img src="' . $order->seller->logo . '" class="rounded-circle" alt="profile-image">
                            </div>
                            <div class="user">
                                <h1 class="mt-3 mb-1">' . $order->seller->insta_user . '</h1>
                                <h2 class="mt-3 mb-1">' . $order->seller->name . '
                                    <div class="badge  badge-' . $sellerColor . ' ">' . $sellerIsVerified . '</div>
                                </h2>
                                <small class="text-info">' . $order->seller->mobile . '</small>
                                <br>
                                <small class="text-info"><strong>مجموع بازخورد
                                        ها:</strong> ' . $order->seller->feedbacks->count() . '</small>
                                <ul class="list-unstyled mt-3 d-flex">
                                    <li class="mr-3 badge badge-success"> :) فروشنده عالی: ' . $good . '</li>
                                    <li class="mr-3 badge badge-info">فروشنده معمولی: ' . $normal . '</li>
                                    <li class="mr-3 badge badge-danger">باید بهتر باشه : ' . $bad . '}</li>
                                </ul>


                                <div class="progress m-b-5">
                                    <div class="progress-bar progress-bar-success" style="width: ' . $p_good . '%">
                                        <span class="sr-only">' . $p_good . '٪ کامل (موفقیت)</span>
                                    </div>
                                    <div class="progress-bar progress-bar-warning progress-bar-striped"
                                         style="width: ' . $p_norm . '%">
                                        <span class="sr-only">' . $p_norm . '٪ کامل (هشدار)</span>
                                    </div>
                                    <div class="progress-bar progress-bar-danger" style="width: ' . $p_bad . '%">
                                        <span class="sr-only">' . $p_bad . '٪ کامل (خطر)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>اطلاعات </strong> سفارش</h2>
                        </div>
                        <div class="body">
                            <small class="text-muted">نام محصول:</small>
                            <div class="row">
                                <div class="col-lg-8"><p>' . Str::limit( $product->title, 40 ) . '</p>
                                </div>
                                <div class="col-lg-4 text-left"><a title="مشاهده محصول" class="badge badge-info"
                                                                   href=' . route( 'product', $product->id ) . '><i
                                                class="zmdi zmdi-eye"></i></a></div>
                            </div>
                            <hr>
                            <small class="text-muted">مبلغ پرداختی شما:</small>
                            <p>' . number_format( $order->price ) . ' هزار تومان</p>
                            <hr>
                            <small class="text-muted">تاریخ خرید:</small>
                            <p>' . $order->created_at . '</p>
                            <hr>
                            <small class="text-muted">وضعیت خرید:</small>
                            <p>
                                <span class="col-' . $deliverCollor . '">
                       					' . $deliverStatus . '
                                        </span>

                            </p>
                            <hr>
                            <small class="text-muted">وضعیت پرداخت:</small>
                            <p>
                                <span class="col-' . $paymentCollor . '">' . $paymentStatus . '</span>
                            </p>
                            <hr>

                        </div>

                    </div>
             </div>
                <div class="col-lg-8 col-md-12 pl-0 p-res-0">
                    <div class="card">
                        <div class="header">
                                <h2><strong>ارسال بازخورد</strong> خرید شما چگونه بود ؟</h2>
                        </div>
						<form action="' . route( "buyer.feedbacks.store" ) . '" id="storeForm" method="post">
						<input name="_token" value="' . csrf_token() . '" type="hidden">
						
						<input type="hidden" name="order_id" id="order_id" value="' . $order->id . '">
						    <div class="body">
                            <div class="input-group  mb-5">
                                <textarea name="body" rows="5" class="w-100" required placeholder="متن بازخورد شما">' . old( 'body' ) . '</textarea>
                                   <small class="text-danger" id="bodyError"></small>
                            </div>
                       
                            <div class="col-md-12">
                                <label>امتیاز شما به خرید : </label>
                                
                                <div class=" rating">
                                    <label>
                                        <input type="radio"  name="score" class="stars"  value="0"/>
                                        <span class="icon" data-toggle="tooltip" data-html="true" title="خرید بد"><i class="zmdi zmdi-star"></i></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="score" class="stars"   value="1"/>
                                        <span class="icon" data-toggle="tooltip" data-html="true" title="خرید معمولی<"><i class="zmdi zmdi-star" ></i></span>
                                        <span class="icon" ><i class="zmdi zmdi-star"></i></span>
                                    </label>
                                    <label>
                                        <input type="radio" name="score" class="stars"   value="2"/>
                                        <span class="icon" data-toggle="tooltip" data-html="true" title="خرید عالی"><i class="zmdi zmdi-star"></i></span>
                                        <span class="icon"><i class="zmdi zmdi-star"></i></span>
                                        <span class="icon" ><i class="zmdi zmdi-star"></i></span>
                                    </label>
                                </div>
                              
                            </div>
                              <div class="col-md-12">
                                 <small class="text-danger" id="scoreError"></small>
                                 </div>
                                       		     <div class="col-md-12 mt-4">
                     <button id="submitFeedback" class="btn btn-primary">ارسال بازخورد</button>
                 </div>
                        </div>
             
						</form>
                    </div>
			     </div >
</div>
	
			     ';
		}

		return $html;
	}
}
