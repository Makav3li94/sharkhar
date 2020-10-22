<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Transaction;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\Input;

class AdminSellerController extends Controller {
	public function dashboard() {
		$now               = Carbon::now()->toDateString();
		$todayOrders       = Order::where( 'seller_id', auth()->user()->id )->whereDate( "created_at", '=', $now )->count();
		$todayTransactions = Transaction::where( 'seller_id', auth()->user()->id )->whereDate( "created_at", '=', $now )->count();
		$todaySold         = Transaction::where( 'seller_id', auth()->user()->id )->whereDate( "created_at", '=', $now )->sum( 'price' );

		$totalSale         = Transaction::where( 'seller_id', auth()->user()->id )->sum( 'price' );
		$totalOrders       = Order::where( 'seller_id', auth()->user()->id )->count();
		$totalTransactions = Transaction::where( 'seller_id', auth()->user()->id )->count();;
		$totalViews = 1;

		return view( 'seller.dashboard', compact( 'todayTransactions', 'todaySold', 'todayOrders', 'totalSale', 'totalOrders', 'totalTransactions', 'totalViews' ) );
	}

	public function verify( Request $request, Seller $seller ) {

		$request->validate( [
			'id_card' => 'required|file|mimes:zip,rar,pdf,jpg,jpeg,png,doc,docs|max:2000',
			'id_book' => 'required|file|mimes:zip,rar,pdf,jpg,jpeg,png,doc,docs|max:2000',
			'id_bill' => 'required|file|mimes:zip,rar,pdf,jpg,jpeg,png,doc,docs|max:2000',
		] );
		$path    = '/uploads/files/' . $seller->insta_user . "/";
		$id_card = $request->file( 'id_card' );
		$id_book = $request->file( 'id_book' );
		$id_bill = $request->file( 'id_bill' );

		$id_card = $this->FileUploader( $id_card, $path, $seller );
		$id_book = $this->FileUploader( $id_book, $path, $seller );
		$id_bill = $this->FileUploader( $id_bill, $path, $seller );
		$seller->update( [
			'id_card' => $id_card,
			'id_book' => $id_book,
			'id_bill' => $id_bill,
		] );

		return redirect()->back()->with( 'success', 'فایل های شما با موفقیت آپلود شد.' );
	}

	protected function FileUploader( $file, $path, $seller ) {
		$date        = Verta::instance()->formatDate();
		$fileName    = $file->getClientOriginalName();
		$fileNewName = time() . '-' . $date . '-' . $seller->mobile . '-' . $fileName;
		$file->move( public_path( $path ), $fileNewName );

		return $path . $fileNewName;
	}

	public function profile( Seller $seller ) {
		return view( 'seller.profile.edit', compact( 'seller' ) );
	}

	public function changePassword( Seller $seller, Request $request ) {
		if ( auth()->user()->id != $seller->id ) {
			return "sheyton nasho";
		}
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
			return redirect()->back()->withErrors($validator)->withInput();
		}
		$request->sheba   = Str::upper( $request->sheba );
		 $default_shipping = (int) filter_var( $request->default_shipping, FILTER_SANITIZE_NUMBER_INT );
		$free_shipping    = (int) filter_var( $request->free_shipping, FILTER_SANITIZE_NUMBER_INT );
		$seller->update( [
			'sheba'            => $request->sheba,
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
