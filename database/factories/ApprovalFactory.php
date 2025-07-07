<?php

namespace Database\Factories;

use App\Models\admins;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\approval>
 */
class ApprovalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['Loan', 'Transfer']),
            'admins_id' => admins::factory(),
            'status' => fake()->randomElement(['Approved', 'Rejected', 'Pending']),
            'remarks' => fake()->sentence(),
            'updated_at' => now()
        ];
    }
}
