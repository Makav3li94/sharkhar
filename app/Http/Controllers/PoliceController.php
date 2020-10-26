<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Police;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;

class PoliceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ( auth()->guard( 'web' )->check() ) {
			$orders = Order::where( 'seller_id', auth()->user()->id )->orderBy( 'id', 'DESC' )->get();

//			return view( 'seller.police.index', compact( 'orders' ) );
		} elseif ( auth()->guard( 'buyer' )->check() ) {
			$orders = Order::whereHas( 'police' )->where( [
				[ 'payment_method', 0 ],
				[ 'buyer_id', auth()->guard( 'buyer' )->user()->id ]
			] )->orderBy( 'id', 'DESC' )->paginate( 5 );

			return view( 'buyer.police.index', compact( 'orders' ) );
		} else {

		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Police $police
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Police $police ) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Police $police
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Police $police ) {
		if ( auth()->guard( 'web' )->check() ) {

			$order   = $police->order;
			$product = $police->product;

			return view( 'seller.police.edit', compact( 'order', 'police', 'product' ) );
		} elseif ( auth()->guard( 'buyer' )->check() ) {
			$order   = $police->order;
			$product = $police->product;

			return view( 'buyer.police.edit', compact( 'order', 'police', 'product' ) );
		} else {

		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Police $police
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Police $police ) {
		if ( auth()->guard( 'web' )->check() ) {

				$request->validate( [
					'seller_reply'     => 'nullable|string',
					'seller_file'     => 'nullable|max:2000|mimes:png,jpg,jpeg,pdf',
				] );



			$seller_file = '';
			if ( $request->hasFile( 'seller_file' ) ) {
				$path       = '/uploads/files/polcie' . $police->seller->insta_user . "/";
				$seller_file = $request->file( 'seller_file' );
				$seller_file = $this->FileUploader( $seller_file, $path, $police->seller );
			}
			$police->update( [
				'seller_reply'  => $request->seller_reply ?? '',
				'seller_file'  => $seller_file,
			] );
		} elseif ( auth()->guard( 'buyer' )->check() ) {
			if ( $police->order->deliver_status == 'green' ) {
				$request->validate( [
					'is_verified' => 'required|numeric',
					'buyer_body'  => 'nullable|string',
					'buyer_file'  => 'nullable|max:2000|mimes:png,jpg,jpeg,pdf',
				] );
			} else {
				$request->validate( [
					'is_verified'    => 'required|numeric',
					'deliver_status' => 'required|numeric',
					'buyer_body'     => 'nullable|string',
					'buyer_file'     => 'nullable|max:2000|mimes:png,jpg,jpeg,pdf',
				] );
				$police->order()->update( [ 'deliver_status' => $request->deliver_status ] );

			}

			$buyer_file = '';
			if ( $request->hasFile( 'buyer_file' ) ) {
				$path       = '/uploads/files/polcie' . $police->seller->insta_user . "/";
				$buyer_file = $request->file( 'buyer_file' );

				$buyer_file = $this->FileUploader( $buyer_file, $path, $police->buyer );
			}
			$police->update( [
				'is_verified' => $request->is_verified,
				'buyer_body'  => $request->buyer_body ?? '',
				'buyer_file'  => $buyer_file,
			] );
		} else {

		}

		return redirect()->back()->withSuccess( 'تغییرات شما اعمال شد.' );
	}

	protected function FileUploader( $file, $path, $buyer ) {
		$date        = Verta::instance()->formatDate();
		$fileName    = $file->getClientOriginalName();
		$fileNewName = time() . '-' . $date . '-' . $buyer->mobile . '-' . $fileName;
		$file->move( public_path( $path ), $fileNewName );

		return $path . $fileNewName;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Police $police
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Police $police ) {
		//
	}
}
