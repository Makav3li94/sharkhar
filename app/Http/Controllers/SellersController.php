<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\PreRegister;
use App\Models\Seller;
use App\Traits\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SellersController extends Controller {
	use Sms;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$sellers = Seller::all();

		return view( 'admin.seller.index', compact( 'sellers' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param \App\Models\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Seller $seller ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Seller $seller ) {

		return view( 'admin.seller.edit', compact( 'seller' ) );
	}

	public function changePassword( Seller $seller, Request $request ) {

		$request->validate( [
			'password' => 'required|min:8|confirmed',
		] );
		$seller->password = Hash::make( $request->password );
		$seller->save();

		return redirect()->back()->with( 'success', 'تغییرات با موفقیت اعمال شد.' );
	}

	public function update( Seller $seller, Request $request ) {
		$data = $request->all();
//		$request->sheba = preg_replace('/\s+/', '', $request->sheba);
//		$request->sheba = Str::upper($request->sheba);
		$validator = Validator::make( $data, [
			'sheba'         => 'required|regex:/^(?i:IR)(?=.{24}$)[0-9]*$/',
			'email'         => "nullable|unique:sellers,email,{$seller->id}",
			'm_code'        => "required|numeric|unique:sellers,m_code,{$seller->id}",
			'telephone'     => "nullable|unique:sellers,telephone,{$seller->id}",
			'free_shipping' => "nullable",
		] );
		if ( $validator->fails() ) {
			return redirect()->back()->withErrors( $validator )->withInput();
		}
		$validator->after( function ( $validator ) use ( $data ) {
			if ( ! $this->nationalCodeCheck( $data['m_code'] ) ) {
				$validator->errors()->add( 'm_code', 'لطفا کد ملی معتبر وارد کنید.' );
			}
		} );

		if ( $validator->fails() ) {
			return redirect()->back()->withErrors( $validator )->withInput();
		}
		$status      = 0;
		$is_verified = 0;
		$bank_status = 0;
		if ( isset( $request->status ) ) {
			$status = 1;
		}

		if ( isset( $request->is_verified ) ) {
			$is_verified = 1;
		}
		if ( isset( $request->bank_status ) ) {
		return	$bank_status = 1;
		}

		$request->sheba   = Str::upper( $request->sheba );
		$default_shipping = (int) filter_var( $request->default_shipping, FILTER_SANITIZE_NUMBER_INT );
		$free_shipping    = (int) filter_var( $request->free_shipping, FILTER_SANITIZE_NUMBER_INT );
		$seller->update( [
			'sheba'           => $request->sheba,
			'mobile'           => $request->mobile,
			'insta_user'       => $request->insta_user,
			'status'           => $status,
			'is_verified'      => $is_verified,
			'bank_status'      => $bank_status,
			'm_code'           => $request->m_code,
			'title'            => $request->title,
			'address'          => $request->address,
			'email'            => $request->email,
			'free_shipping'    => $free_shipping,
			'telephone'        => $request->telephone,
			'default_shipping' => $default_shipping,
		] );

		return redirect()->back()->with( 'success', 'تغییرات با موفقیت اعمال شد . ' );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Seller $seller ) {
		//
	}
	public function resendCode( Request $request ) {

		$preRegister  = PreRegister::where( 'mobile', $request->mobile )->first();
		$toNum        = $request->mobile;
		$pattern_code = "48ty4nm4q5";
		$input_data   = array( "code" => "{$preRegister->code}" );
		$result       = $this->sentWithPattern( [ $toNum ], $pattern_code, $input_data );

		return response()->json( [ 'sms_send' => 'success', 'result' => $result ] );
	}

	protected function nationalCodeCheck( $code ) {
		if ( ! preg_match( '/^[0-9]{10}$/', $code ) ) {
			return false;
		}
		for ( $i = 0; $i < 10; $i ++ ) {
			if ( preg_match( '/^' . $i . '{10}$/', $code ) ) {
				return false;
			}
		}
		for ( $i = 0, $sum = 0; $i < 9; $i ++ ) {
			$sum += ( ( 10 - $i ) * intval( substr( $code, $i, 1 ) ) );
		}
		$ret    = $sum % 11;
		$parity = intval( substr( $code, 9, 1 ) );
		if ( ( $ret < 2 && $ret == $parity ) || ( $ret >= 2 && $ret == 11 - $parity ) ) {
			return true;
		}

		return false;
	}


}
