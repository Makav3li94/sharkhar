<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Police;
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
			$orders = Order::whereHas('police')->where( [['payment_method',0],['buyer_id', auth()->guard( 'buyer' )->user()->id]] )->orderBy( 'id', 'DESC' )->paginate( 5 );
			return view( 'buyer.police.index', compact( 'orders' ) );
		} else {

		}

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
	 * @param \App\Models\Police $police
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( Police $police ) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Police $police
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Police $police ) {
		//
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
		//
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
