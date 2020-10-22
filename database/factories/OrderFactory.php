<?php

namespace Database\Factories;

use App\Models\Buyer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

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
		    'price' => rand(50000,1000000),
		    'deliver_status' => rand(0,1),
		    'payment_status' => rand(0,1),
	    ];
    }
}
