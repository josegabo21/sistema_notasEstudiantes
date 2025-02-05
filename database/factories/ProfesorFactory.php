<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        // Generamos la edad primero (mayor de 18 años)
        $edad = $this->faker->numberBetween(18, 60);

        // Definimos el grado que puede enseñar según la edad
        $grados = ['1er', '2do', '3er', '4to', '5to', '6to'];
        $gradoAsignado = $this->faker->randomElement($grados);

        // Tipo de profesor
        $tipoProfesor = 'regular';

        // Generamos la fecha de nacimiento basada en la edad
        $fechaNacimiento = $this->faker->dateTimeBetween('-' . ($edad + 1) . ' years', '-' . $edad . ' years')
            ->format('Y-m-d');

        return [
            'nombre' => $this->faker->firstName,
            'apellido' => $this->faker->lastName,
            'edad' => $edad,
            'grado_asignado' => $gradoAsignado,
            'tipo_profesor' => $tipoProfesor,
            'fecha_nacimiento' => $fechaNacimiento,
            'cedula' => (string) $this->faker->unique()->numberBetween(8000000, 30999999),
            'direccion' => $this->faker->address,
            'telefono_profesor' => $this->faker->phoneNumber,
            'foto' => $this->faker->optional()->imageUrl(200, 200, 'people'),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('12345678'), // Contraseña encriptada
        ];
    }
}
