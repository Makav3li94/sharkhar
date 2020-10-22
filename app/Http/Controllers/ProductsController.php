<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where([['status',1],['seller_id',auth()->user()->id]])->orderBy('id','DESC')->paginate(5);
        return view('seller.product.index',compact('products'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('seller.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
        	'title'=>'required|string',
        	'price'=>'required|numeric',
        	'status'=>'required|numeric',
        	'body'=>'required|string',
        ]);
        $product->update([
	        'title'=>$request->title ,
	        'price'=>$request->price ,
	        'status'=>$request->status ,
	        'body'=>$request->body
        ]);

        return redirect()->back()->withSuccess('تغییرات با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Product $product)
    {
	    if ($request->ajax()) {
	    	if ($product->seller->id != auth()->user()->id){
			    return response()->json(['bitarbiat' => 'success']);
		    }
		    $product->status = 0;
		    $product->save();
		    return response()->json(['delete_product' => 'success']);
	    }
    }
}
