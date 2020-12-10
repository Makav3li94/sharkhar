<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\SmsInbox;
use App\Traits\Sms;
use Illuminate\Console\Command;

class SendLink extends Command {
	use Sms;
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'send:link';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'send link for Skus';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle() {
		$readyForLinks = SmsInbox::where( 'status', 0 )->get();
		foreach ( $readyForLinks as $readyForLink ) {
			$body = $this->fa_to_en( $readyForLink->body );
			if ( $product = Product::where( 'sku', $body )->first() ) {
				$this->sentWithPattern( [ $readyForLink->sender ], '8ik0xpkklm', ['name' => 'خریدار گرامی، ','product' => route( 'product', $product->id ) ] );
				$readyForLink->status = 1;
				$readyForLink->save();
			}
		}
	}


	protected function fa_to_en($text)
	{
		$fa_num = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'];
		$en_num = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

		return str_replace($fa_num, $en_num, $text);
	}

}
