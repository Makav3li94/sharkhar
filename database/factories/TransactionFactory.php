<?php

namespace Database\Factories;

use App\Models\Buyer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
	    return [
		    'seller_id' =>Seller::all()->random()->id ,
		    'buyer_id' =>Buyer::all()->random()->id ,
		    'product_id' =>Product::all()->random()->id ,
		    'order_id' =>Order::all()->random()->id ,
		    'price' => rand(50000,1000000),
		    'status' => rand(0,1),
		    'transaction_type' => rand(0,1),
	    ];
    }
}
