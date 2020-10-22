<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
	        'seller_id' => Seller::all()->random()->id,
	        'image' => rand(1,11).".png",
	        'title' => $this->faker->name,
	        'body' => $this->faker->paragraph,
	        'price' => rand(50000,1000000),
	        'status' => rand(0,1),
        ];
    }
}
