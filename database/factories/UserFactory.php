<?php

namespace Database\Factories;

use App\Enums\Database\UserEnum;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            UserEnum::NAME->value => fake()->name(),
            UserEnum::EMAIL->value => fake()->unique()->safeEmail(),
            UserEnum::EMAIL_VERIFIED_AT->value => now(),
            UserEnum::PASSWORD->value => static::$password ??= Hash::make('password'),
            UserEnum::REMEMBER_TOKEN->value => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            UserEnum::EMAIL_VERIFIED_AT->value => null,
        ]);
    }
}
