<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'chairman' => fake()->unique()->name(),
            'vice_chairman' => fake()->unique()->name(),
            'image' => 'candidate.jpg',
            'vision' => fake()->text(150),
            'mission' => fake()->sentence(255),
            'total_voting' => rand(0,10)
        ];
    }
}
