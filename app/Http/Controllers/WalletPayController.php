<?php

namespace App\Http\Controllers;

use App\Models\WalletCheckout;
use App\Models\WalletPay;
use Illuminate\Http\Request;

class WalletPayController extends Controller {
	public function index(){
		$walletPays = WalletCheckout::where([['transaction_type',0],['status',0]])->get();
		return view('admin.wallet.index',compact('walletPays'));
	}
	public function request( Request $request ) {
		$seller = auth()->user();
		$wallet = $seller->wallet;
		$amount = (int) filter_var( $request->amount, FILTER_SANITIZE_NUMBER_INT );;
		if ( $amount > (int) $wallet->raw_balance ) {
			return redirect()->back()->with( 'error', 'شما مبلغ بیش از موجودی درخواست کرده اید' );
		} else {
			$pay = WalletPay::create( [
				'wallet_id' => $wallet->id,
				'amount'    => $amount
			] );

			if ( $pay ) {
				$raw_balance    = (int) $wallet->raw_balance - $amount;
				$walletCheckout = WalletCheckout::create( [
					'wallet_id'           => $wallet->id,
					'transaction_id'      => 0,
					'transaction_type'    => 0,
					'amount'              => $amount,
					'running_raw_balance' => $raw_balance,
				] );

				if ( $walletCheckout ) {
					$wallet->raw_balance = $raw_balance;
					$wallet->save();
				}

				return redirect()->back()->with( 'success', 'مبلغ درخواستی شما در کمتر از یک ساعت به صورت شبا واریز خواهد شد.' );
			}

			return redirect()->back()->with( 'error', 'خطا' );

		}
	}
}
