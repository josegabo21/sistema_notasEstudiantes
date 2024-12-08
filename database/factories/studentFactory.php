<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->firstName(),
            'apellido'=>fake()->lastName(),
            'edad'=>fake()->numberBetween(5,12),
            'grado'=>fake()->randomElement(['1°', '2°', '3°', '4°', '5°','6°']),

        ];
    }
}
