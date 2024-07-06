<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        return [
            'total_amount' => 0,
            'user_id' => $user->id,
            'address' => fake()->address(),
            'city' => fake()->city(),
            'phone' => $user->phone, 
        ];
    }
}