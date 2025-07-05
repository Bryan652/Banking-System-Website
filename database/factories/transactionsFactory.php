<?php

namespace Database\Factories;

use App\Models\accounts;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\transactions>
 */
class transactionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'accounts_id' => accounts::factory(),
            'type' => fake()->randomElement(['Deposit', 'Withdraw', 'Transfer']),
            'amount' => fake()->randomFloat(2, 0, 99999),
            'description' => fake()->text(),
            'created_at' => now(),
        ];
    }
}
