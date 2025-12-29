<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillProvider>
 */
class SkillProviderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake('id_ID')->name(),
            'skill_title' => fake()->jobTitle(),
            'location' => fake('id_ID')->city(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'image_url' => 'dummy/dummy-'.rand(1,6).'.jpg',
            'verified' => fake()->boolean(70), // 70% verified
            'rating' => fake()->randomFloat(1, 3, 5),
            'total_reviews' => fake()->numberBetween(5, 50),
            'bio' => fake()->paragraph(),
            'email' => fake()->safeEmail(),
            'phone' => fake('id_ID')->phoneNumber(),
        ];
    }
}
