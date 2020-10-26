<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class RemoveOrders extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'remove:orders';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'remove unpaid orders';

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
		$orders = Order::where( 'payment_status', 0 )->get();
		foreach ( $orders as $order ) {
			$order->transaction()->delete();
			$order->police()->delete();
		}
		$orders->delete();
	}
}
