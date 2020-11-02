<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Product;
use App\Models\Seller;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShopController extends Controller {

	public function shop() {
		SEOTools::setTitle( 'فروشگاه ها شرخر  | پرداخت امن، فروش آسان' );
		SEOTools::setDescription( 'فروشگاه های شرخر  | شما می تونید همه ی فروشگاه هایی که تو شرخر ثبت نام کردن رو اینجا ببینیند.' );
		SEOTools::opengraph()->setUrl( 'https//sharkhar.net/shops' );
		SEOTools::setCanonical( 'https//sharkhar.net/shops' );
		SEOTools::opengraph()->addProperty( 'type', 'articles' );
		SEOTools::twitter()->setSite( '@sharkhar' );
		SEOTools::jsonLd()->addImage( 'https://sharkhar.net/front/img/logo-p.png' );
		$best    = Seller::WhereHas( 'products' )->where( [
			[ 'is_verified', 1 ],
			[ 'status', 1 ]
		] )->orderBy( 'id', 'DESC' )->take( 8 )->get();
		$bestIds = $best->pluck( 'id' );
		$sellers = Seller::WhereHas( 'products' )->whereNotIn( 'id', $bestIds )->where( 'status', 1 )->latest()->paginate( 12 );

		return view( 'shop.index', compact( 'sellers', 'best' ) );
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


		SEOMeta::setTitle( $seller->title );
		SEOMeta::setDescription( Str::limit(strip_tags($seller->bio) ,250));
		SEOMeta::addMeta( 'article:published_time', $seller->updated_at->toW3CString(), 'property' );
		SEOMeta::addMeta( 'article:section', $seller->category ?? 'shop', 'property' );
		SEOMeta::addKeyword( [ 'فروشگاه اینترنتی', 'دستیار فروش', 'پرداخت امن', $seller->title,$seller->insta_user ] );

		OpenGraph::setDescription( Str::limit(strip_tags($seller->bio) ,250) );
		OpenGraph::setTitle( $seller->title );
		OpenGraph::setUrl( route( 'vendor', $seller->insta_user ) );
		OpenGraph::addProperty( 'type', 'article' );
		OpenGraph::addProperty( 'locale:alternate', [ 'pt-pt', 'fa-ir' ] );

		OpenGraph::addImage( $seller->logo, [ 'height' => 300, 'width' => 300 ] );

		JsonLd::setTitle( $seller->title );
		JsonLd::setDescription( Str::limit(strip_tags($seller->bio) ,250) );
		JsonLd::setType( 'Article' );
		JsonLd::addImage( $seller->logo );

		return view( 'shop.vendor', compact( 'seller', 'products', 'good', 'normal', 'bad', 'p_good', 'p_norm', 'p_bad', 'sellerIsVerified', 'sellerColor', 'feedbacks' ) );
	}

	public function single( Product $product, $optional_price = null ) {
		$seller = $product->seller;
		$good   = Feedback::where( [ [ 'product_id', $product->id ], [ 'score', 2 ] ] )->count();
		$normal = Feedback::where( [ [ 'product_id', $product->id ], [ 'score', 1 ] ] )->count();
		$bad    = Feedback::where( [ [ 'product_id', $product->id ], [ 'score', 0 ] ] )->count();

		$all    = $good + $normal + $bad;
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

		SEOMeta::setTitle( $product->title );
		SEOMeta::setDescription( Str::limit(strip_tags($product->title) ,250));
		SEOMeta::addMeta( 'article:published_time', $product->updated_at->toW3CString(), 'property' );
		SEOMeta::addMeta( 'article:section', $product->seller->category ?? 'shop', 'property' );
		SEOMeta::addKeyword( [ 'فروشگاه اینترنتی', 'دستیار فروش', 'پرداخت امن', $product->seller->title,$product->seller->insta_user ] );

		OpenGraph::setDescription( Str::limit(strip_tags($product->title) ,250) );
		OpenGraph::setTitle( $product->title );
		OpenGraph::setUrl( route( 'product', $product->id ) );
		OpenGraph::addProperty( 'type', 'article' );
		OpenGraph::addProperty( 'locale:alternate', [ 'pt-pt', 'fa-ir' ] );

		OpenGraph::addImage( $product->image_thumb, [ 'height' => 300, 'width' => 300 ] );

		JsonLd::setTitle( $product->title );
		JsonLd::setDescription( Str::limit(strip_tags($product->title) ,250) );
		JsonLd::setType( 'Article' );
		JsonLd::addImage($product->image_thumb );


		return view( 'shop.single'
			, compact( 'seller', 'product', 'all', 'p_good', 'feedbacks', 'optional_price' ) );
	}
}
