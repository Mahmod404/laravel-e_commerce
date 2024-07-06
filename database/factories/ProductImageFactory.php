<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImageFactory extends Factory
{
    public function definition(): array
    {
        return [
            // 'image' => asset('imgs/perfume1.jpg'),
            // 'product_id' => Product::inRandomOrder()->first()->id,
        ];
    }
}