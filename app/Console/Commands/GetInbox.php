<?php

namespace App\Console\Commands;

use App\Traits\Sms;
use Illuminate\Console\Command;

class GetInbox extends Command
{
	use Sms;
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'get:inbox';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'get recived sms';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		 $this->getSms();
	}
}
