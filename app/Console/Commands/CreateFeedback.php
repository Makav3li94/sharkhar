<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Traits\Sms;
use Illuminate\Console\Command;

class CreateFeedback extends Command {
	use Sms;
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'create:feedback';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

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
		$orders = Order::where( 'payment_status', 1 )->whereDate( 'created_at', '>=', date( 'd.m.Y', strtotime( "-1 days" ) ) );
		$orders->doesntHave( 'feedback' )->get();
		foreach ( $orders as $order ) {
			$this->sentWithPattern([$order->buyer->mobile],'1vkrmqe2pj',['name'=>$order->buyer->name]);
		}
	}
}
