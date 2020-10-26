<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\LinkLogin;
use App\Providers\RouteServiceProvider;
use App\Traits\Sms;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller {
	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use Sms,AuthenticatesUsers {
		logout as performLogout;
	}

	public function logout( Request $request ) {
		if ( auth()->guard( 'web' )->check() == 1 ) {
			$route = 'login';
		} elseif ( auth()->guard( 'buyer' )->check() == 1 ) {
			$route = 'login_buyer';
		} else {
			$route = 'admin_login';
		}
		$this->performLogout( $request );

		return redirect()->route( $route );
	}

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	public function showAdminLoginForm() {
		return view( 'admin.login' );
	}

	public function adminLogin( Request $request ) {

		$request->validate( [
			'mobile'    => 'required',
			'password' => 'required'
		] );

		if ( Auth::guard( 'admin' )->attempt( [ 'mobile'    => $request->mobile, 'password' => $request->password ], $request->get( 'remember' ) ) ) {
			return redirect()->route('admin.dashboard');
		}

		return back()->withInput( $request->only( 'mobile', 'remember' ) );
	}

	public function showBuyerLoginForm() {
		return view( 'buyer.login' );
	}

	public function buyerLogin( Request $request ) {
		$request->validate( [
			'mobile'   => 'required|regex:/(09)[0-9]{9}/',
		] );

		if ( Auth::guard( 'buyer' )->attempt( [ 'mobile'   => $request->mobile,
		                                        'password' => $request->password
		], $request->get( 'remember' ) ) ) {

			return redirect()->route('buyer.dashboard');
		}

		return back()->withInput( $request->only( 'mobile', 'remember' ) );
	}

	public function linkLoginBuyer( $token ) {
		$linkLogin = LinkLogin::validFromToken( $token );
		$buyer = Buyer::where('mobile',$linkLogin->mobile)->first();

		Auth::guard('buyer')->loginUsingId($buyer->id);
		$linkLogin->delete();
		return redirect()->route('buyer.orders.index');
	}

	public function sendPass(Request $request){
		$mobile = $request->mobile;
		$pass =rand(111111,999999);
		$buyer = Buyer::where('mobile',$mobile)->first();
		if (!$buyer){
			return response()->json( [ 'error' => 'mobileNoteFound' ] );
		}
		$this->sentWithPattern([$mobile], 'allg7waqdb', ['name'=>$buyer->name,'pass'=>$pass]);
		$buyer->update(['password'=>Hash::make($pass)]);
		return response()->json( [ 'password_sent' => 'success' ] );
	}


	public function __construct() {
		$this->middleware( 'guest' )->except( 'logout' );
		$this->middleware( 'guest:admin' )->except( 'logout' );
		$this->middleware( 'guest:buyer' )->except( 'logout' );
	}
}
