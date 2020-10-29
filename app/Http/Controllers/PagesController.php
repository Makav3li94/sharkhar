<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller {


	public function sellBenefit() {
		return view( 'shop.pages.sell_benefit' );
	}

	public function sellerProtection() {
		return view( 'shop.pages.seller_protection' );
	}

	public function disputeRules() {
		return view( 'shop.pages.dispute_rules' );
	}

	public function buyBenefit() {
		return view( 'shop.pages.buy_benefit' );
	}

	public function moneyBackGuarantee() {
		return view( 'shop.pages.money_back' );
	}

	public function rules() {
		return view( 'shop.pages.rules' );
	}
}
