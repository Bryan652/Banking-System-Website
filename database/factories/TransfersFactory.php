<?php

namespace Database\Factories;

use App\Models\accounts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transfers>
 */
class TransfersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'from_account_id' => accounts::factory(),
            'to_account_id' => accounts::factory(),
            'amount' => fake()->randomFloat(2, 0, 99999),
            'status' => fake()->randomElement(['Pending', 'Completed', 'Rejected']),
            'created_at' => now(),
        ];
    }
}
