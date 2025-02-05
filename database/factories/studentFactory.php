<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
        $edad = $this->faker->numberBetween(5, 12);

        // Definimos el grado basado en la edad
        $grades = [
            5 =>  '1er',
            6  => '1er',
            7  => '2do',
            8  => '3er',
            9  => '4to',
            10 => '5to',
            11 => '6to',
            12 => '6to',
        ];
        $fechaNacimiento = $this->faker->dateTimeBetween('-' . ($edad + 1) . ' years', '-' . $edad . ' years')
            ->format('Y-m-d');
        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'edad' => $edad,
            'grado' => $grades[$edad],
            'fecha_nacimiento' => $fechaNacimiento,
            'cedula' => function (array $attributes) {
                return $attributes['edad'] < 8
                    ? null
                    : (string) $this->faker->unique()->numberBetween(34000000, 35999999);
            },
            'direccion' => $this->faker->address,
            'telefono_representante' => $this->faker->phoneNumber,
            'representante_id' => User::inRandomOrder()->first()->id ?? null,
            'foto' => $this->faker->optional()->imageUrl(200, 200, 'children'),
        ];
    }
}
