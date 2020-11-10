<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Transaction;
use App\Models\WalletCheckout;
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
		 $seller = auth()->user();
		$todayOrders       = Order::where( 'seller_id', $seller->id )->whereDate( "created_at", '=', $now )->count();
		$todayTransactions = Transaction::where( 'seller_id', $seller->id )->whereDate( "created_at", '=', $now )->count();
		$todaySold         = Transaction::where( 'seller_id', $seller->id )->whereDate( "created_at", '=', $now )->sum( 'price' );

		$totalSale         = Transaction::where( 'seller_id', $seller->id )->sum( 'price' );
		$totalOrders       = Order::where( 'seller_id', $seller->id )->count();
		$totalTransactions = Transaction::where( 'seller_id', $seller->id )->count();
		$totalFeedbacks    = Feedback::where( 'seller_id',$seller->id )->whereDate( "created_at", '=', $now )->count();
		$totalViews        = 1;

		$walletCheckouts =  WalletCheckout::where([['wallet_id',$seller->wallet->id],['transaction_type', 0]])->sum('amount');
		return view( 'seller.dashboard', compact( 'todayTransactions', 'todaySold', 'todayOrders', 'totalSale', 'totalFeedbacks', 'totalOrders', 'totalTransactions', 'totalViews' ,'walletCheckouts') );
	}

	public function verify( Request $request, Seller $seller ) {

		$request->validate( [
			'id_card' => 'required|file|mimes:zip,rar,pdf,jpg,jpeg,png,doc,docs|max:2000',
			'id_book' => 'nullable|file|mimes:zip,rar,pdf,jpg,jpeg,png,doc,docs|max:2000',
			'id_bill' => 'nullable|file|mimes:zip,rar,pdf,jpg,jpeg,png,doc,docs|max:2000',
		] );
		$path    = '/uploads/files/' . $seller->insta_user . "/";
		$id_card = null;
		$id_book = null;
		$id_bill = null;
		if ( $request->hasFile( 'id_card' ) ) {
			$id_card = $request->file( 'id_card' );
			$id_card = $this->FileUploader( $id_card, $path, $seller );
		}
		if ( $request->hasFile( 'id_book' ) ) {
			$id_book = $request->file( 'id_book' );
			$id_book = $this->FileUploader( $id_book, $path, $seller );
		}
		if ( $request->hasFile( 'id_bill' ) ) {
			$id_bill = $request->file( 'id_bill' );
			$id_bill = $this->FileUploader( $id_bill, $path, $seller );
		}


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
			'sheba'         => "required|unique:sellers,sheba,{$seller->id}|regex:/^(?i:IR)(?=.{24}$)[0-9]*$/",
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
			'bank_status'      => $request->payment_method ?? 0,
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


	public function search( Request $request ) {
		if ( $request->ajax() ) {
			$val      = $request->input( 'val' );
			$products = Product::where( [
				[ 'seller_id', auth()->guard( 'web' )->user()->id ],
				[ 'status', '1' ],
				[ 'body', 'like', "%$val%" ]
			] )->take( 5 )->get();


			if ( count( $products ) == 0 ) {
				return response()->json( [
					'records' => 'none'
				] );
			} else {
				$productsList = [];
				$html         = ' <div class="card>"> <div class="body p-0"><table class="table">';
				$price        = '';


				foreach ( $products as $key => $product ) {
					if ( $product->price != 0 ) {
						$price = number_format( $product->price ) . " تومان" ?? '';
					} else {
						$price = '<input class="form-control total" style="width: 80%" onkeyup="optinalPriceFunc(' . $product->id . ')" name="optional_price" id="' . $product->id . '-optional_price" type="text">';
					}
					$html .= '<tr>';
					$html .= '<td class="w-auto" style="padding: 10px 3px;"> <img src="' . $product->image_thumb . '" width="50" alt="Product img"> </td>
                              <td class="w-auto" style="padding: 10px 3px;">' . Str::limit( $product->title, 10 ) . '</td>
                              <td class="w-auto" style="padding: 10px 3px;">' . $price . '</td>
							  <td  style="padding: 3px;width: 70px">
                                <button type="button" class="btn btn-sm btn-info clipboard-btn p-2" data-clipboard-text="' . route( 'product', $product->id ) . '">
                                    <i class="zmdi zmdi-copy"></i>
                                </button>
                                <span class="nono">||</span>
                                <a class="btn btn-sm btn-success p-2"
                                   id="' . $product->id . '-whatsup-link"
                                   href="whatsapp://send?text=' . route( 'product', $product->id ) . '"
                                   data-action="share/whatsapp/share">
                                    <i class="zmdi zmdi-whatsapp"></i>
                                </a>
                              </td>';
					$html .= '</tr>';

				}
				$html .= '</table></div></div>';

				return response()->json( [
					'records' => $html
				] );
			}
		}
	}
}
