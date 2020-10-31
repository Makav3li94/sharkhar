<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ScraperController;
use App\Models\Buyer;
use App\Models\PreRegister;
use App\Providers\RouteServiceProvider;
use App\Models\Seller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisterController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;
	protected $type = null;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'guest' );
		$this->middleware( 'guest:admin' )->except( 'logout' );
		$this->middleware( 'guest:buyer' )->except( 'logout' );
	}


	public function showBuyerRegisterForm() {
		return view( 'buyer.register' );
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param array $data
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator( array $data, $type = null ) {
		if ( $type == null ) {

			$validator = Validator::make( $data, [
				'confirm_code' => [ 'required', 'numeric' ],
				'name'         => [ 'required', 'string', 'max:255' ],
//				'm_code'       => [ 'required', 'numeric', 'unique:sellers' ],
				'mobile'       => [ 'required', 'regex:/(09)[0-9]{9}/', 'unique:sellers' ],
				'rules'        => [ 'required' ],
				'insta_user'   => [ 'required', 'string' ],
				'password'     => [ 'required', 'string', 'min:8' ],
			] );

			$validator->after( function ( $validator ) use ( $data ) {
				$preRegister = PreRegister::where( 'mobile', $data['mobile'] )->first();
				if ( $preRegister->code != $data['confirm_code'] ) {
					$validator->errors()->add( 'confirm_code', 'کد پیامکی درست نیست .' );
				}

			} );


			return $validator->after( function ( $validator ) use ( $data ) {
				if ( ! $this->instagramUserCheck( $data['insta_user'] ) ) {
					$validator->errors()->add( 'insta_user', 'همچین کاربری در اینستاگرام وجود ندارد' );
				}

			} );

		} elseif ( $type == 'buyer' ) {
			return $validator = Validator::make( $data, [
				'name'     => [ 'required', 'string', 'max:255' ],
				'mobile'   => [ 'required', 'regex:/(09)[0-9]{9}/', 'unique:buyers' ],
				'password' => [ 'required', 'string', 'min:8' ],
			] );

		} else {
//			Admin Validate
		}

	}

	protected function validatorCode( array $data ) {
		$validator = Validator::make( $data, [
			'mobile' => [ 'required', 'regex:/(09)[0-9]{9}/', 'unique:sellers' ],
		] );

		return $validator->after( function ( $validator ) use ( $data ) {
			$a        = intval( $data['a'] );
			$b        = intval( $data['b'] );
			$operator = $data['operator'];
			$res      = intval( $data['result'] );
			switch ( $operator ) {
				case '-':
					$result = $a - $b;
					break;
				case '+':
					$result = $a + $b;
					break;
			}
			if ( $result != $res ) {
				$validator->errors()->add( 'code', 'حاصل عبارات فوق نادرست است.' );
			}

		} );
	}


	protected function instagramUserCheck( $username ) {
		$url = "https://www.instagram.com/$username/?__a=1";

		$handle = curl_init( $url );
		curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $handle, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $handle, CURLOPT_SSL_VERIFYHOST, false );
		curl_setopt( $handle, CURLOPT_FOLLOWLOCATION, true );
		/* Get the HTML or whatever is linked in $url. */
		$response = curl_exec( $handle );

		/* Check for 404 (file not found). */
		$httpCode = curl_getinfo( $handle, CURLINFO_HTTP_CODE );
		curl_close( $handle );

		/* If the document has loaded successfully without any redirection or error */
		if ( $httpCode >= 200 && $httpCode < 300 ) {
			return true;
		} else {
			return false;
		}


	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param array $data
	 *
	 * @return \App\Models\Seller
	 */
	protected function create( array $data ) {
		$seller  = Seller::create( [
			'name'        => $data['name'],
			'mobile'      => $data['mobile'],
			'insta_user'  => Str::lower(trim($data['insta_user'])),
			'password'    => Hash::make( $data['password'] ),
			'bank_status' => 0,
		] );
		$scraper = new ScraperController();
		$scraper->scrapInstagram( $seller );

		return $seller;
	}

	protected function createBuyer( Request $request ) {

		$this->validator( $request->all(), 'buyer' )->validate();
		$buyer = Buyer::create( [
			'name'     => $request['name'],
			'mobile'   => $request['mobile'],
			'password' => Hash::make( $request['password'] ),
		] );
		Auth::guard( 'buyer' )->loginUsingId( $buyer->id );

		return redirect()->intended( 'buyer/dashboard' );
	}


}
