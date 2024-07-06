<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    public function definition(): array
    {
        $arr = ['CHANEL', 'DIOR', 'GUCCI', 'PRADO', 'FERRARI', 'BUGATTI', 'HUGO BOSS', 'AXIS'];
        return [
            'name' =>  Arr::random($arr),
            'description' =>  'Perfume description.',
        ];
    }
}