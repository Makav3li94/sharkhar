<?php

namespace Illuminate\Foundation\Auth;

use App\Models\PreRegister;
use App\Traits\Randomable;
use App\Traits\Sms;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use SoapClient;
use Symfony\Component\Console\Input\Input;

trait RegistersUsers {
	use RedirectsUsers, Sms, Randomable;

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\View\View
	 */
	public function showRegistrationForm() {
		$array = $this->createRandomNumbers();

		return view( 'seller.register', compact( 'array' ) );
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 */
	public function register( Request $request ) {
		$data = $request->all();
		if ( isset( $request->confirm ) ) {
			$validator = Validator::make( $data, [
				'mobile'       => [ 'required', 'regex:/(09)[0-9]{9}/', 'unique:sellers' ],
			] );

			if ( $validator->fails() ) {
				return redirect()->back()->withErrors( $validator )->withInput();
			}
			$validator->after( function ( $validator ) use ( $data ) {
				$preRegister = PreRegister::where( 'mobile', $data['mobile'] )->first();
				if ( $preRegister->code != $data['confirm_code'] ) {
					$validator->errors()->add( 'confirm_code', 'کد پیامکی درست نیست .' );
				}

			} );
			PreRegister::where('mobile',$request->mobile)->delete();
			$this->validatorCode( $request->all() )->validate();

			$a        = intval( $request->input( 'a' ) );
			$b        = intval( $request->input( 'b' ) );
			$operator = $request->input( 'operator' );
			$res      = intval( $request->input( 'result' ) );

			$randomDigits = $this->randomDigits();
			$this->registerSMS( $request, $randomDigits );

			PreRegister::create( [
				'mobile' => $request->mobile,
				'code'   => $randomDigits,
			] );
			$mobile = $request->mobile;
			$confirm_code = 'on';

			return view( 'seller.register_completion ', compact( 'confirm_code','mobile' ) );
		}


		$validator = $this->validator( $request->all() );

		if ($validator->fails()){
			$mobile = $request->mobile;
			$confirm_code = 'on';
			session()->flashInput($request->input());
			return view( 'seller.register_completion ', compact( 'confirm_code','mobile' ) )
				->withErrors($validator);

		}



		event( new Registered( $user = $this->create( $request->all() ) ) );

		$this->guard()->login( $user );

		if ( $response = $this->registered( $request, $user ) ) {
			return $response;
		}
		PreRegister::where('mobile',$request->mobile)->delete();
		//Here You should get Products from instagram
		session()->flash('modal', 'true');
		return $request->wantsJson()
			? new JsonResponse( [], 201 )
			: redirect( $this->redirectPath() );
	}


	/**
	 * Get the guard to be used during registration.
	 *
	 * @return \Illuminate\Contracts\Auth\StatefulGuard
	 */
	protected function guard() {
		return Auth::guard();
	}

	/**
	 * The user has been registered.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param mixed $user
	 *
	 * @return mixed
	 */
	protected function registered( Request $request, $user ) {
		//
	}


	protected function registerSMS( $request, $randomDigits ) {
		$toNum        = array( "{$request['mobile']}" );
		$pattern_code = "48ty4nm4q5";
		$input_data   = array( "code" => "{$randomDigits}" );
		$result       = $this->sentWithPattern( $toNum, $pattern_code, $input_data );

	}

	protected function randomDigits() {
		return rand( 1000, 9999 );
	}
}
