<?php

namespace Database\Factories;

use App\Models\accounts;
use App\enums\accountType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\accounts>
 */
class accountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {

        return [
            'user_id' => User::factory(),
            'account_number' => str_pad(fake()->unique()->numberBetween(1, 99999999), 8, '0', STR_PAD_LEFT),
            'account_type' => fake()->randomElement(['Savings', 'Checking', 'Salary', 'Student', 'Joint']),
            'balance' => fake()->randomFloat(2, 0 , 999999),
            'status' => fake()->randomElement(['Active', 'Suspended', 'Closed']),
            'created_at' => now(),
        ];
    }
}
