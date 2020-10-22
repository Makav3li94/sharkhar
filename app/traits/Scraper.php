<?php

namespace App\Traits;


use App\Models\Product;
use Illuminate\Support\Str;

trait Scraper {
	public function scrap( $seller ) {
		$userdata          = $this->getId( $seller->insta_user );
		$UserID            = explode( '_', $userdata['logging_page_id'] );
		$UserID            = $UserID[1];
		$pageSize          = $userdata['graphql']['user']['edge_owner_to_timeline_media']['count'];
		$pageBio           = $userdata['graphql']['user']['biography'];
		$pageBio           = nl2br( $pageBio );
		$shopName          = $userdata['graphql']['user']['full_name'];
		$shopCategory      = $userdata['graphql']['user']['category_enum'];
		$logo              = $userdata['graphql']['user']['profile_pic_url_hd'];
		$followers         = $userdata['graphql']['user']['edge_followed_by']['count'];
		$following         = $userdata['graphql']['user']['edge_follow']['count'];
		$posts             = $pageSize;
		$seller->logo      = $logo;
		$seller->bio       = $pageBio;
		$seller->title     = $shopName;
		$seller->category  = $shopCategory;
		$seller->posts     = $posts;
		$seller->followers = $followers;
		$seller->following = $following;


		$seller->save();
		$profileUrl   = "https://instagram.com/graphql/query/?query_id=17888483320059182&id=" . $UserID . "&first=" . $pageSize;
		$iterationUrl = $profileUrl;
		$tryNext      = true;
		$limit        = $pageSize;
		$found        = 0;
		set_time_limit( 150 );
		while ( $tryNext ) {
			$tryNext  = false;
			$response = file_get_contents( $iterationUrl );

			if ( $response === false ) {
				break;
			}
			$data = json_decode( $response, true );
			if ( $data === null ) {
				break;
			}
			$media = $data['data']['user']['edge_owner_to_timeline_media'];
			$found += count( $media['edges'] );
			if ( $media['page_info']['has_next_page'] && $found < $limit ) {
				$iterationUrl = $profileUrl . '&after=' . $media['page_info']['end_cursor'];
				$tryNext      = true;
			}
			$nodes = $media['edges'];
			foreach ( $nodes as $thispost ) {
				$this->createProducts( $thispost, $seller );
			}
		}
	}

	public function getCleanString( $sourceStr, $delimiter = '#' ) {
		$sourceStrArr = explode( $delimiter, $sourceStr );

		return ! empty( $sourceStrArr[0] ) ? $sourceStrArr[0] : $sourceStr;
	}

	public function getId( $username ) {
		$url      = "https://www.instagram.com/$username/?__a=1";
		$response = file_get_contents( $url );

		return $userdata = json_decode( $response, true );

	}



	public function createProducts( $thispost, $seller ) {
		$post = $thispost['node'];
		if ( $post['is_video'] !== 'false' ) {
			$message = isset( $post['edge_media_to_caption']['edges'][0] ) ? $post['edge_media_to_caption']['edges'][0]['node']['text'] : "";
			$title   = Str::limit( $message, 100 );
			$message = $this->getCleanString( $message );
			$message = nl2br( $message );
			if ( strpos( $message, 'ت' ) !== false ||  strpos( $message, '💲' ) !== false || strpos( $message, '$' ) !== false || strpos( $message, 'تومان' ) !== false || strpos( $message, 'نومن' ) !== false || strpos( $message, 'ریال' ) !== false ) {
				if ( strpos( $message, 'تومان' ) !== false ) {
					$result = $this->priceFunction( $message, 'تومان', 1 );
				} elseif ( strpos( $message, '💲' ) !== false ) {

					$result = $this->priceFunction( $message, '💲', 1 );

				} elseif ( strpos( $message, '$' ) !== false ) {

					$result = $this->priceFunction( $message, '$', 1 );

				} elseif ( strpos( $message, 'نومن' ) !== false ) {
					$result = $this->priceFunction( $message, 'تومن', 1 );
				} elseif ( strpos( $message, 'ریال' ) !== false ) {
					$result = $this->priceFunction( $message, 'ریال', 1 );
					$result = $result / 10;
				}elseif ( strpos( $message, 'ت' ) !== false ) {
					$result = $this->priceFunction( $message, 'ت', 1 );
				}

//				elseif ( strpos( $message, 'قیمت' ) !== false ) {
//					$result = $this->priceFunction( $message, 'قیمت', 1 );
//				}
			} else {
				$result = 0;
			}

			if (!is_numeric($result) ){
				$result = 0;
			}


//			if ( strpos( $message, 'هزینه ارسال' ) !== false ) {
//				if ( strpos( $message, 'تومان' ) !== false ) {
//					$shippingCost = $this->priceFunction( $message, 'تومان', 15, true );
//
//				}
//			}


			$picture       = $post['display_url'];
			$like_count    = isset( $post['edge_media_preview_like']['count'] ) ? $post['edge_media_preview_like']['count'] : null;
			$comment_count = isset( $post['edge_media_to_comment']['count'] ) ? $post['edge_media_to_comment']['count'] : null;
			$product       = Product::where( 'insta_post_id', $post['id'] )->first();
			if ( $product !== null ) {
				$product->update( [
					'image'         => $picture,
					'image_thumb'   => $post['thumbnail_resources'][0]['src'],
					'body'          => $message,
					'title'         => $title,
					'price'         => $result,
					'like_count'    => $like_count,
					'comment_count' => $comment_count,
				] );
			} else {
				Product::create( [
					'seller_id'     => $seller->id,
					'insta_post_id' => $post['id'],
					'image'         => $picture,
					'image_thumb'   => $post['thumbnail_resources'][0]['src'],
					'body'          => $message,
					'title'         => $title,
					'price'         => $result,
					'like_count'    => $like_count,
					'comment_count' => $comment_count,
				] );
			}


		}
//		$seller->default_shipping = $shippingCost;
//
//
//		$seller->save();
	}

	function convertNumbers( $srting, $toPersian = false ) {
		$en_num = array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' );
		$fa_num = array( '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' );
		if ( $toPersian ) {
			return str_replace( $en_num, $fa_num, $srting );
		} else {
			return str_replace( $fa_num, $en_num, $srting );
		}
	}
	function extractPrice( $str, $query, $numOfWordToAdd, $notBefore ) {

		list( $before, $after ) = explode( $query, $str );

		$before = rtrim( $before );
		$after  = ltrim( $after );

		$beforeArray = array_reverse( explode( " ", $before ) );
		$afterArray  = explode( " ", $after );

		$countBeforeArray = count( $beforeArray );
		$countAfterArray  = count( $afterArray );

		$beforeString = "";
		if ( $notBefore == null ) {
			if ( $countBeforeArray < $numOfWordToAdd ) {
				$beforeString = implode( ' ', $beforeArray );
			} else {
				for ( $i = 0; $i < $numOfWordToAdd; $i ++ ) {
					$beforeString = $beforeArray[ $i ] . ' ' . $beforeString;
				}
			}
		}

		$afterString = "";

		if ( $countAfterArray < $numOfWordToAdd ) {
			$afterString = implode( ' ', $afterArray );
		} else {
			for ( $i = 0; $i < $numOfWordToAdd; $i ++ ) {
				$afterString = $afterString . $afterArray[ $i ] . ' ';
			}
		}

		$string = $beforeString . $query . ' ' . $afterString;

		return $string;
	}



	public function priceFunction( $message, $type, $wordsCrawl, $notBefore = null ) {

		$result = $this->extractPrice( $message, $type, $wordsCrawl, $notBefore );

		$result = Str::replaceArray( '،', [ '' ], $result );
		$result = Str::replaceArray( ',', [ '' ], $result );
		$result = Str::replaceArray( '.', [ '' ], $result );
		$result = Str::replaceArray( '/', [ '' ], $result );
		$result = $this->convertNumbers( $result );
		list( $before, $after ) = explode( $type, $result );
		$before = (int) filter_var( $before, FILTER_SANITIZE_NUMBER_INT );
		$after  = (int) filter_var( $after, FILTER_SANITIZE_NUMBER_INT );

		if ( $before != 0 ) {
			$result = $before;
		} elseif ( $after != 0 ) {
			$result = $after;
		}

//		if ( $before == 0 ) {
//			$result = substr( $result, 0, strpos( $result, $type ) );
//			$result = Str::after( $result, $type );
//		} elseif ( $before != 0 ) {
//			 $result = $before;
//		}
//		if ( $after == 0 ) {
//			$result = substr( $result, 0, strpos( $result, $type ) );
//			$result = Str::before( $result, $type );
//		} elseif ( $after != 0 ) {
//			echo $result = $after;
//			die();
//		}


		if ( strlen( $result ) <= 3 ) {
			$result = $result * 1000;
		}

		return $result;


	}
}