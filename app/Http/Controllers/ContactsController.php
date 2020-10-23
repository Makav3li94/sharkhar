<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Feedback;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if ( auth()->guard( 'web' )->check() ) {
			$tickets = Contact::where( 'seller_id', auth()->user()->id )->orderBy( 'id', 'DESC' )->paginate( 10 );

			return view( 'seller.contact.index', compact( 'tickets' ) );
		} elseif ( auth()->guard( 'buyer' )->check() ) {
			$tickets = Contact::where( 'buyer_id', auth()->guard( 'buyer' )->user()->id )->paginate( 10 );

			return view( 'buyer.contact.index', compact( 'tickets' ) );
		} else {
			$tickets = Contact::all();

			return view( 'admin.contact.index', compact( 'tickets' ) );
		}

	}

	public function store( Request $request ) {
		$request->validate( [ 'body' => 'required|string' ] );
		if ( isset( $request->first ) ) {
			if ( auth()->check() ) {
				Contact::create( [
					'parent_id' => 0,
					'subject'   => $request->subject,
					'body'      => $request->body,
					'seller_id' => auth()->user()->id
				] );

				return redirect()->route( 'seller.contacts.index' )->withSuccess( 'تیکت شما با موفقیت ارسال شد' );
			} elseif ( auth()->guard( 'buyer' )->check() ) {
				Contact::create( [
					'parent_id' => 0,
					'subject'   => $request->subject,
					'body'      => $request->body,
					'buyer_id'  => auth()->guard( 'buyer' )->user()->id
				] );

				return redirect()->route( 'buyer.contacts.index' )->withSuccess( 'تیکت شما با موفقیت ارسال شد' );
			} else {

			}


		} else {
			if ( auth()->check() ) {

				Contact::create( [
					'parent_id' => $request->parent_id,
					'body'      => $request->body,
					'seller_id' => auth()->user()->id
				] );

				return redirect()->back()->withSuccess( 'تیکت شما با موفقیت ارسال شد' );
			} elseif ( auth()->guard( 'buyer' )->check() ) {
				Contact::create( [
					'parent_id' => $request->parent_id,
					'body'      => $request->body,
					'buyer_id'  => auth()->guard( 'buyer' )->user()->id
				] );

				return redirect()->back()->withSuccess( 'تیکت شما با موفقیت ارسال شد' );
			}else{

			}
		}
	}

	public function create() {
		if ( auth()->guard( 'web' )->check() ) {
			return view( 'seller.contact.create' );

		} elseif ( auth()->guard( 'buyer' )->check() ) {
			return view( 'buyer.contact.create' );

		} else {

		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param \App\Models\Order $order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Contact $contact ) {

		if ( auth()->guard( 'web' )->check() ) {
			$tickets = Contact::whereNotIn( 'id', [ $contact->id ] )->where( [
				[ 'seller_id', auth()->user()->id ],
				[ 'parent_id', $contact->id ]
			] )->orderBy( 'id', 'ASC' )->get();

			return view( 'seller.contact.edit', compact( 'contact', 'tickets' ) );
		} elseif ( auth()->guard( 'buyer' )->check() ) {
			$tickets = Contact::whereNotIn( 'id', [ $contact->id ] )->where( [
				[
					'buyer_id',
					auth()->guard( 'buyer' )->user()->id
				],
				[ 'parent_id', $contact->id ]
			] )->orderBy( 'id', 'ASC' )->get();

			return view( 'buyer.contact.edit', compact( 'contact', 'tickets' ) );
		} else {
			if ( $contact->seller_id == 1 ) {
				$tickets = Contact::whereNotIn( 'id', [ $contact->id ] )->where( [
					[
						'seller_id',
						$contact->seller_id
					],
					[ 'parent_id', $contact->id ]
				] )->orderBy( 'id', 'ASC' )->get();
			} elseif ( $contact->buyer_id == 1 ) {
				$tickets = Contact::whereNotIn( 'id', [ $contact->id ] )->where( [
					[
						'seller_id',
						$contact->buyer_id
					],
					[ 'parent_id', $contact->id ]
				] )->orderBy( 'id', 'ASC' )->get();
			}


			return view( 'admin.contact.edit', compact( 'contact','tickets') );
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \App\Models\Order $order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request ) {
		$ticket = Contact::where('id',$request->parent_id);
		$ticket->update([
			'reply'=>$request->body
		]);
		return redirect()->back()->withSuccess( 'پاسخ ثبت شد' );

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param \App\Models\Order $order
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Contact $ticket ) {
		//
	}
}
