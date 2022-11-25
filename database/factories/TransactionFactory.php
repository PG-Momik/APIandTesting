<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\PurchasePrice;
use App\Models\SalesPrice;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = Product::all()->random();
        return [
            'type'           => fake()->randomElement([Transaction::TYPE['purchase'], Transaction::TYPE['sales']]),
            'product_id'     => Product::all()->random(),
            'user_id'        => User::all()->random()->id,
            'purchase_price' => 1200,
            'sales_price'    => $product->sales_price + rand(0, 100),
            'discount' => rand(0,5),
            'quantity' => fake()->numberBetween(1, 25),
        ];
    }
}
