<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\WalletCheckout;
use Illuminate\Http\Request;

class WalletController extends Controller
{
	public function index() {
		if ( auth()->guard( 'web' )->check() ) {
			$seller = auth()->user();
			$wallet = Wallet::where('seller_id',$seller->id)->first();
			$walletCheckouts =  WalletCheckout::where([['wallet_id',$seller->wallet->id],['transaction_type', 0]])->sum('amount');
			return view('seller.wallet.index',compact('wallet','walletCheckouts'));
		} elseif ( auth()->guard( 'buyer' )->check() ) {
			$buyer = auth()->guard('buyer')->user();
			$wallet = Wallet::where('buyer_id',$buyer->id);
			$walletCheckouts =  WalletCheckout::where([['wallet_id',$buyer->wallet->id],['transaction_type', 0]])->sum('amount');
		} else {

		}
	}


	public function store( Request $request ) {

	}
}
