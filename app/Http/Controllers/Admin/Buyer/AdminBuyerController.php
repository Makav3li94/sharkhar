<?php

namespace App\Http\Controllers\Admin\Buyer;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminBuyerController extends Controller {
	public function dashboard() {
		return view( 'buyer.dashboard' );
	}

	public function profile( Buyer $buyer ) {
		if ($buyer->id != auth()->guard('buyer')->user()->id){
			return "error 500";
		}
		return view( 'buyer.profile.edit', compact( 'buyer' ) );
	}


	public function update( Buyer $buyer, Request $request ) {

		if ( auth()->guard( 'buyer' )->user()->id != $buyer->id ) {
			return "sheyton nasho";
		}

		if ( $request->password !== null ) {
			$request->validate( [
				'email'     => "unique:buyers,email,{$buyer->id}",
				'password' => 'required|min:8|confirmed',

			] );
			$password = Hash::make( $request->password );

			$buyer->update( [
				'email' => $request->email,
				'password' => $password,
			] );
		} else {
			$request->validate( [
				'email'     => "unique:buyers,email,{$buyer->id}",
			] );
			$buyer->update( [
				'email' => $request->email,
			] );
		}

		return redirect()->back()->with( 'success', 'تغییرات با موفقیت اعمال شد.' );

	}
}
