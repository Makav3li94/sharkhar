<?php

namespace App\Traits;


trait Number
{
	function convertNumbers( $srting, $toPersian = false ) {
		$en_num = array( '0', '1', '2', '3', '4', '5', '6', '7', '8', '9' );
		$fa_num = array( '۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹' );
		if ( $toPersian ) {
			return str_replace( $en_num, $fa_num, $srting );
		} else {
			return str_replace( $fa_num, $en_num, $srting );
		}
	}
}