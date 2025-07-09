<?php

namespace Database\Factories;

use App\Models\admins;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\loans>
 */
class LoansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'borrower_id' => User::factory(),
            'amount' => fake()->randomFloat(2, 0, 99999),
            'interest_rate' => fake()->randomFloat(1, 0, 99),
            'term_months' => fake()->numberBetween(1, 12),
            'status' => fake()->randomElement(['Pending', 'Approved', 'Paid']),
            'approved_by' => null,
            'created_at' => now()
        ];
    }
}
