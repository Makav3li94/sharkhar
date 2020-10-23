<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$products = Product::where( [
			[ 'status', 1 ],
			[ 'seller_id', auth()->user()->id ]
		] )->orderBy( 'id', 'DESC' )->paginate( 5 );

		return view( 'seller.product.index', compact( 'products' ) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Product $product ) {
		return view( 'seller.product.edit', compact( 'product' ) );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Product $product ) {
		$request->validate( [
			'title'  => 'required|string',
			'price'  => 'required|numeric',
			'status' => 'required|numeric',
			'body'   => 'required|string',
		] );
		$product->update( [
			'title'  => $request->title,
			'price'  => $request->price,
			'status' => $request->status,
			'body'   => $request->body
		] );

		return redirect()->back()->withSuccess( 'تغییرات با موفقیت انجام شد' );
	}

	public function updateOptionalPrice( Request $request ) {
		$validator = Validator::make( $request->all(), [
			'product_id'     => 'required|numeric',
			'optional_price' => 'required|numeric'
		] );
		if ( $validator->fails() ) {
			return response()->json( [ 'price_error' => 'true' ] );
		}
		$product = Product::findOrFail( $request->product_id );
		$product->update( [ 'optional_price' => $request->optional_price ] );

		return response()->json( [ 'optional_price' => 'success' ] );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Product $product
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Request $request, Product $product ) {
		if ( $request->ajax() ) {
			if ( $product->seller->id != auth()->user()->id ) {
				return response()->json( [ 'bitarbiat' => 'success' ] );
			}
			$product->status = 0;
			$product->save();

			return response()->json( [ 'delete_product' => 'success' ] );
		}
	}
}
