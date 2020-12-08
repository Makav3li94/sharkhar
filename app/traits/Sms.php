<?php

namespace App\Traits;


use App\Models\Buyer;
use App\Models\SmsInbox;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use SoapClient;

trait Sms {
	public function send( $number, $text ) {
		ini_set( "soap.wsdl_cache_enabled", "0" );
		try {
			$wsdl_url       = "http://ippanel.com/class/sms/wsdlservice/server.php?wsdl";
			$client         = new SoapClient( $wsdl_url );
			$user           = "makaveli";
			$pass           = "19171363";
			$fromNum        = "3000505";
			$toNum          = $number;
			$messageContent = $text;
			$op             = "send";
			$time           = Carbon::now();

			$result = $client->SendSMS( $fromNum, $toNum, $messageContent, $user, $pass, $time, $op );
//			echo $result;
		} catch ( SoapFault $ex ) {
//			echo $ex->faultstring;
		}
	}


	public function sentWithPattern( $number, $pattern_code, $input_data ) {
		ini_set( "soap.wsdl_cache_enabled", "0" );
		try {
			$wsdl_url = "http://ippanel.com/class/sms/wsdlservice/server.php?wsdl";
			$client   = new SoapClient( $wsdl_url );
			$user     = "makaveli";
			$pass     = "19171363";
			$fromNum  = "3000505";
			$toNum    = $number;

			$result = $client->sendPatternSms( $fromNum, $toNum, $user, $pass, $pattern_code, $input_data );
//			 echo $result;
		} catch ( SoapFault $ex ) {
//			 echo $ex->faultstring;
		}
	}

	public function getSms() {
		$apiKey = "sigmoI-jPjKojyzrgSORV4OQ6E-6KhFDKyOGThdpSOg=";
		$client = new \IPPanel\Client( $apiKey );

		list( $messages, $paginationInfo ) = $client->fetchInbox( 0, 100 );

		foreach ( $messages as $message ) {
			$str_to_replace = "0";
			$sender = $str_to_replace.substr($message->sender, 3);

			if ( ! Buyer::where( 'mobile', $sender )->exists() ) {
				Buyer::create( [
					'name'     => 'شرخریار ! :)',
					'mobile'   => $sender,
					'password' => Hash::make( rand( 111111, 999999 ) ),
				] );
			}
			if ( ! SmsInbox::where( [ [ 'sender', $sender ], [ 'body', $message->message ] ] )->exists() ) {
				SmsInbox::create( [
					'sender' => $sender,
					'number' => $message->number,
					'body'   => trim($message->message),
				] );
			}

		}
	}
}