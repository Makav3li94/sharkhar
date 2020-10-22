<?php

namespace App\Http\Controllers;

use App\Models\PreRegister;
use App\Models\Seller;
use App\Traits\Sms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SellersController extends Controller {
	use Sms;

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Seller $seller
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Seller $seller ) {
		//
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

	public function forgetPassword( Request $request ) {
		$request->validate( [
			'mobile' => 'required| regex:/(09)[0-9]{9}/'
		] );
		if ( $seller = Seller::where( 'mobile', $request->mobile )->first() ) {

			$toNum        = $seller->mobile;
			$pattern_code = "vybhpc6s6i";
			$pass = rand(111111,999999);

			$result       = $this->sentWithPattern( [ $toNum ], $pattern_code, ['pass'=>$pass] );

				$seller->update(['password'=>Hash::make($pass)]);
				return redirect()->route('login')->with( 'newPassSent', 'true' );

		} else {
			return redirect()->back()->with( 'mobileNotFound', 'true' );
		}

	}
}
