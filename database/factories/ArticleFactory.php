<?php

namespace Database\Factories;

use App\Enums\Database\ArticleEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            ArticleEnum::TITLE->value => fake()->text(30),
            ArticleEnum::TEXT->value => fake()->text(),
        ];
    }
}
