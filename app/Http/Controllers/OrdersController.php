<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if (auth()->guard('web')->check()){
		    $orders = Order::where('seller_id',auth()->user()->id)->orderBy('id','DESC')->paginate(5);
		    return view('seller.order.index',compact('orders'));
	    }elseif (auth()->guard('buyer')->check()){
		    $orders = Order::where('buyer_id',auth()->guard('buyer')->user()->id)->orderBy('id','DESC')->paginate(5);
		    return view('buyer.order.index',compact('orders'));
	    }else{

	    }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
	    if (auth()->guard('web')->check()){
		    return view('seller.order.edit',compact('order'));
	    }elseif (auth()->guard('buyer')->check()){
		    return view('buyer.order.edit',compact('order'));
	    }else{

	    }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
