<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Http\Request;

class ShopController extends Controller {

	public function shop() {

		$best =Seller::WhereHas('products')->where( [['is_verified',1],['status', 1]] )->orderBy('id','DESC')->take(8)->get();
		$bestIds = $best->pluck('id');
		$sellers = Seller::WhereHas('products')->whereNotIn('id',$bestIds)->where( 'status', 1 )->latest()->paginate( 12 );

		return view( 'shop.index', compact( 'sellers','best' ) );
	}

	public function vendor( $name ) {
		$seller           = Seller::where( 'insta_user', $name )->first();
		$products         = $seller->products()->latest()->paginate( 12 );
		$good             = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 2 ] ] )->count();
		$normal           = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 1 ] ] )->count();
		$bad              = Feedback::where( [ [ 'seller_id', $seller->id ], [ 'score', 0 ] ] )->count();
		$p_good           = 0;
		$p_norm           = 0;
		$p_bad            = 0;
		$sellerIsVerified = $seller->is_verified == 'green' ? ' تایید هویت شده توسط شرخر' : 'تایید نشده';
		$sellerColor      = $seller->is_verified == "red" ? "danger" : "success";
		$feedbacks        = Feedback::where( 'seller_id', $seller->id )->get()->take( 3 );
		$all              = $good + $normal + $bad;
		if ( $all != 0 ) {
			$p_good = ( ( $all - ( $all - $good ) ) / ( $all ) ) * 100;
			$p_norm = ( ( $all - ( $all - $normal ) ) / ( $all ) ) * 100;
			$p_bad  = ( ( $all - ( $all - $bad ) ) / ( $all ) ) * 100;
		}

		return view( 'shop.vendor', compact( 'seller', 'products', 'good', 'normal', 'bad', 'p_good', 'p_norm', 'p_bad', 'sellerIsVerified', 'sellerColor', 'feedbacks' ) );
	}

	public function single( Product $product ,$optional_price = null) {

		$seller = $product->seller;
		$good   = Feedback::where( [ [ 'product_id', $product->id ], [ 'score', 2 ] ] )->count();
		$normal = Feedback::where( [ [ 'product_id', $product->id ], [ 'score', 1 ] ] )->count();
		$bad    = Feedback::where( [ [ 'product_id', $product->id ], [ 'score', 0 ] ] )->count();

		$all = $good + $normal + $bad;
		$p_good = 0;
		if ( $all != 0 ) {
			$p_good = ( ( $all - ( $all - $good ) ) / ( $all ) ) * 100;
			if ( $p_good >= 80 ) {
				$p_good = 5;
			} elseif ( $p_good >= 60 ) {
				$p_good = 4;
			} elseif ( $p_good >= 40 ) {
				$p_good = 3;
			} elseif ( $p_good >= 20 ) {
				$p_good = 2;
			} else {
				$p_good = 1;
			}
		}
		$feedbacks = Feedback::where( 'product_id', $product->id )->get();
		return view( 'shop.single'
			, compact( 'seller', 'product','all','p_good','feedbacks','optional_price') );
	}
}
