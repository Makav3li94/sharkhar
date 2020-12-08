<?php

namespace App\Console\Commands;

use App\Models\SmsInbox;
use Illuminate\Console\Command;

class RemoveSms extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'remove:sms';

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
		 SmsInbox::where( 'status', 0 )->delete();
	}
}
