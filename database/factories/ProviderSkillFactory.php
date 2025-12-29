<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProviderSkill>
 */
class ProviderSkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->jobTitle(),
            'experience' => fake()->randomElement(['1+ tahun','3+ tahun','5+ tahun']),
            'description' => fake()->sentence(),
        ];
    }
}
