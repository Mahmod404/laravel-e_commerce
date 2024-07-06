<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $arr = [
            '1 Million', 'Sauvage', 'Blue de chanael', 'Boss', 'Bad Boy', 'Eros', 'Y',  'Stronger with you',
            'Myslf', 'Toy Boy', 'Chanel Pour Monsieur', 'Loves Baby Soft', 'Blue Stratos', 'Violetta', 'Paris',
            'Obsession', 'Lumière', 'Red Door', 'Eternity', 'Escape'
        ];
        return [
            'name' => Arr::random($arr),
            'price' => fake()->numberBetween(1, 10000),
            'quantity' => fake()->numberBetween(1, 1000),
            'description' => 'any description',
            'image' => 'imgs/perfume1.jpg',
            'category_id' => Category::inRandomOrder()->first()->id,
            'brand_id' => Brand::inRandomOrder()->first()->id,
        ];
    }
}