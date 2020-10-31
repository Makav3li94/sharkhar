<?php

namespace App\Http\Controllers;

use App\Models\Buyer;
use App\Models\LinkLogin;
use App\Models\Order;
use App\Models\Police;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Transaction;
use App\Traits\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Payment\Facade\Payment;
use Shetabit\Multipay\Invoice;
use DB;

class TransactionsController extends Controller {
	use Sms;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ( auth()->guard( 'web' )->check() ) {
			$transactions = Transaction::where( 'seller_id', auth()->user()->id )->orderBy( 'id', 'DESC' )->get();

			return view( 'seller.transaction.index', compact( 'transactions' ) );
		} elseif ( auth()->guard( 'buyer' )->check() ) {
			$transactions = Transaction::where( 'buyer_id', auth()->guard( 'buyer' )->user()->id )->orderBy( 'id', 'DESC' )->paginate( 5 );

			return view( 'buyer.transaction.index', compact( 'transactions' ) );
		} else {

		}
	}



	public function payment( Request $request, Product $product ) {

		$request->validate( [
			'cost'         => 'required',
			'qty'          => 'required|numeric',
			'default_cost' => 'required|numeric',
			'note'         => 'nullable|string',
		] );

		if ( isset( $request->name ) ) {
			$request->validate( [
				'name'   => [ 'required', 'string', 'max:255' ],
				'mobile' => [ 'required', 'regex:/(09)[0-9]{9}/' ],
			] );
			$password    = rand( 111111, 999999 );
			$buyerExists = Buyer::where( 'mobile', $request->mobile )->first();
			if ( $buyerExists ) {
				Auth::guard( 'buyer' )->loginUsingId( $buyerExists->id );
				$buyer = auth()->guard( 'buyer' )->user();
			} else {
				$buyer = Buyer::create( [
					'name'     => $request->name,
					'mobile'   => $request->mobile,
					'password' => Hash::make( $password ),
				] );

				Auth::guard( 'buyer' )->attempt( [
					'mobile'   => $request->mobile,
					'password' => $password
				], $request->get( 'remember' ) );
			}

		} else {
			$buyer = auth()->guard( 'buyer' )->user();
		}

		if ( $product->price != $request->default_cost ) {
			return redirect()->back()->withError( 'bitarbiat' );
		}
		$seller = $product->seller;
		$cost   = ( $request->qty * ( $product->optional_price == 0 ? $product->price : $product->optional_price ) ) + $seller->default_shipping;

		$order = Order::create( [
			'seller_id'      => $product->seller_id,
			'buyer_id'       => $buyer->id,
			'product_id'     => $product->id,
			'shipping_cost'  => $seller->default_shipping,
			'price'          => $cost,
			'note'           => $request->note,
			'qty'            => $request->qty,
			'payment_method' => 0,
		] );

		return view( 'shop.payment', compact( 'order' ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		global $transactionId;
		$order = Order::findOrFail( $request->order_id );
		if ( isset( $request->note ) ) {
			$order->note = $request->note;
			$order->update();
		}
		$seller  = $order->seller;
		$buyer   = $order->buyer;
		$product = $order->product;
		$cost    = (int) $order->price;
		$invoice = new Invoice;
		$invoice->detail( 'mobile', $buyer->mobile );
		$invoice->detail( 'email', 'test@gmail.com' );

//		if ( $seller->bank_status == 1 && $request->payment_method == 1 ) {
		if ( $seller->bank_status == 'green'  ) {


			if ( $cost != 0 ) {
				 $payment = Payment::callbackUrl( route( 'check_payment', $order->id ) )->purchaseDirect(
					( new Invoice )->amount( $cost )->partner( $seller->sheba )->sellerShare( $cost ),
					function ( $driver, $transactionId) {
						Transaction::create( [
							'transaction_id'   => $transactionId,
							'buyer_id'         => 1,
							'seller_id'        => 1,
							'product_id'       => 1,
							'order_id'         => 1,
							'price'            => 1,
							'status'           => 0,
							'transaction_type' => 1,
						] );
					}
				);
				$transaction = DB::table( 'transactions' )->latest()->limit(1);
				$transaction->update( [
					'buyer_id'         => $buyer->id,
					'seller_id'        => $product->seller_id,
					'product_id'       => $product->id,
					'order_id'         => $order->id,
					'price'            => $cost,
					'status'           => 0,
					'transaction_type' => 1,
				] );

				return $payment->pay()->render();
			}
		} else {
			if ( $cost != 0 ) {
				$payment = Payment::callbackUrl( route( 'check_payment', $order->id ) )->purchase(
					( new Invoice )->amount( $cost ),
					function ( $driver, $transactionId ) {
						Transaction::create( [
							'transaction_id'   => $transactionId,
							'buyer_id'         => 1,
							'seller_id'        => 1,
							'product_id'       => 1,
							'order_id'         => 1,
							'price'            => 1,
							'status'           => 2,
							'transaction_type' => 0,
						] );
					}
				);

				$transaction = DB::table( 'transactions' )->latest()->limit(1);
				$transaction->update( [
					'buyer_id'         => $buyer->id,
					'seller_id'        => $product->seller_id,
					'product_id'       => $product->id,
					'order_id'         => $order->id,
					'price'            => $cost,
					'transaction_type' => 0,
				] );

				return $payment->pay()->render();
			}
		}


	}



	public function checkPayment( Request $request ) {
		$transaction = Transaction::where( 'transaction_id', $request->Authority )->first();
		$order       = $transaction->order;
		$cost        = (int) $order->price;
		try {
			$buyer                   = Buyer::findOrFail( $order->buyer_id );
			$seller                  = Seller::findOrFail( $order->seller_id );
			$product                 = Product::findOrFail( $order->product_id );
			$product->optional_price = 0;
			$product->save();

			$receipt = Payment::amount( $cost * 10 )->transactionId( $request->Authority )->verify();

			// You can show payment referenceId to the user.
			$verifyCode = $receipt->getReferenceId();

			$order->update( [ 'payment_status' => 1 ] );
			$transaction = Transaction::where( [ 'order_id' => $order->id ] )->first();
			if ($order->payment_method == 0){
				$transaction->update( [ 'verify_code' => $verifyCode ] );

				Police::create([
					'seller_id'=> $transaction->seller_id,
					'buyer_id'=> $transaction->buyer_id,
					'product_id'=> $transaction->product_id,
					'order_id'=>$transaction->order_id ,
					'transaction_id'=>$transaction->id ,
					'transaction_type'=>0 ,
				]);

			}else{
				$transaction->update( [ 'status' => 1, 'verify_code' => $verifyCode ] );

			}

			$random = $random = Str::random( 40 );
			LinkLogin::create( [
				'mobile' => $buyer->mobile,
				'token'  => $random
			] );

			$url = route( 'link_login_buyer', [
				'token' => $random
			] );


			$this->sentWithPattern( [ $seller->mobile ], '78e6st84v7', [ 'product' => $product->id ] );
			if ( $seller->bank_status == 1 ) {
				$this->sentWithPattern( [ $seller->mobile ], 'e7ukfaqd4x', [
					'name'    => $seller->name,
					'buyer'   => $buyer->name,
					'product' => $product->id,
					'cost'    => $cost
				] );
			} else {

				$this->sentWithPattern( [ $seller->mobile ], 'mf9737wgo0', [
					'name'    => $seller->name,
					'buyer'   => $buyer->name,
					'product' => $product->id,
					'cost'    => $cost
				] );
			}
			$this->sentWithPattern( [ $buyer->mobile ], 'iubx9a17gk', [
				'name'    => $buyer->name,
				'product' => $product->id,
				'cost'    => $cost,
				'seller'  => $seller->name,
				'link'    => $url
			] );

			return view( 'shop.done_payment', compact( 'order', 'verifyCode' ) );

		} catch ( InvalidPaymentException $exception ) {
			Transaction::where( [ 'order_id' => $order->id ] )->delete();
			$verifyCode = 'false';

			/**
			 * when payment is not verified, it will throw an exception.
			 * We can catch the exception to handle invalid payments.
			 * getMessage method, returns a suitable message that can be used in user interface.
			 **/
			return view( 'shop.done_payment', compact( 'verifyCode', 'order' ) );
		}


	}
	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Transaction $transaction
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Transaction $transaction ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Transaction $transaction
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Transaction $transaction ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Transaction $transaction
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Transaction $transaction ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Transaction $transaction
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Transaction $transaction ) {
		//
	}
}
