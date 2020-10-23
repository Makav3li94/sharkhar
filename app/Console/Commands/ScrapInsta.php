<?php

namespace App\Console\Commands;

use App\Models\Seller;
use Illuminate\Console\Command;

class ScrapInsta extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrap:insta';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'scrap instagram posts update';

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
        $sellers = Seller::where('status',1)->get();
        foreach ($sellers as $seller){
	        \App\Jobs\ScrapInsta::dispatch( $seller );
        }
    }
}
