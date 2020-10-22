<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Seller::factory(50)->create();
         \App\Models\Buyer::factory(200)->create();
         \App\Models\Product::factory(2000)->create();
         \App\Models\Order::factory(250)->create();
         \App\Models\Transaction::factory(250)->create();
    }
}
