<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        {
            $title = $this->faker->words(3, true);
            $description = $this->faker->paragraph(3, true);
            return [
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $description,
                'excerpt' => Str::words($description,50,' ...'),
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
            ];
        }
    }
}