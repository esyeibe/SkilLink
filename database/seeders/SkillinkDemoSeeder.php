<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\SkillProvider;
use App\Models\ProviderSkill;
use App\Models\ProviderReview;


class SkillinkDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 1) Buat kategori
        $categories = Category::factory()->count(5)->create();

        // 2) Buat provider untuk tiap kategori
        SkillProvider::factory()
            ->count(6)
            ->create()
            ->each(function ($provider) {

                // skills
                ProviderSkill::factory()->count(3)->create([
                    'provider_id' => $provider->id,
                ]);

                // reviews
                ProviderReview::factory()->count(5)->create([
                    'provider_id' => $provider->id,
                ]);
            });
    }
}
