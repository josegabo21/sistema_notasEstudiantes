<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use phpDocumentor\Reflection\Types\True_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\activity>
 */
class activityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Generamos una fecha de inicio dentro de los días de semana (lunes a viernes) de este año
        do {
            $start = Carbon::now()->subMonth()->addDays($this->faker->numberBetween(0, 90))
                ->setHour($this->faker->numberBetween(6, 13))
                ->setMinute($this->faker->numberBetween(0, 59));
        } while ($start->isWeekend());


        // Definimos la fecha de finalización como una o dos horas después del inicio
        $end = (clone $start)->addHours($this->faker->numberBetween(1, 3));
        do {
            $backgroundColor = $this->faker->hexColor();
        } while ($backgroundColor === '#ffffff' || $backgroundColor === '#FFFFFF');

        return [
            'title' => $this->faker->randomElement([
                'Clase de matemáticas básicas',
                'Lección de ortografía',
                'Taller de ciencias naturales',
                'Ejercicios de comprensión lectora',
                'Clase de educación artística',
                'Práctica de suma y resta',
                'Exploración del sistema solar',
                'Cuentos y lectura en voz alta',
                'Introducción a la geografía',
                'Juegos didácticos de aprendizaje',
                'Experimentos de química divertida',
                'Historia de los pueblos indígenas',
                'Aprendiendo sobre el reciclaje',
                'Dibujando y pintando emociones',
                'Técnicas de lectura rápida',
                'Descubrimiento de los animales salvajes',
                'El ciclo del agua explicado',
                'Cálculo mental y desafíos matemáticos',
                'Los volcanes y su impacto en la Tierra',
                'Escritura creativa para niños',
                'Conociendo las partes de una planta',
                'Música y ritmo en el aula',
                'La importancia de una alimentación saludable',
                'Jugando y aprendiendo con la tabla de multiplicar',
                'El cuerpo humano y sus sistemas',
                'Construyendo frases en inglés',
                'La magia de los cuentos clásicos',
                'Animales en peligro de extinción',
                'Descubriendo los planetas del sistema solar',
                'Los derechos y deberes de los niños',
                'Aprendiendo sobre el tiempo y el clima',
                'Manualidades con materiales reciclados',
                'Creación de historias en grupo',
                'Uso correcto de los signos de puntuación',
                'Descifrando problemas matemáticos',
                'La evolución de los medios de comunicación',
                'Cuidado del medio ambiente',
                'Juegos matemáticos para potenciar el cálculo',
                'Aprendiendo sobre los ecosistemas',
                'Los inventos que cambiaron la historia',
                'Prácticas de escritura en caligrafía',
                'Las estaciones del año y sus características',
                'Aprender jugando con rompecabezas',
                'El arte de la narración oral',
                'Trabajo en equipo y colaboración en clase',
                'Descubriendo la historia de nuestro país',
                'Los valores y su importancia en la sociedad',
                'Jugando con las palabras: sinónimos y antónimos',
                'Creación de cómics educativos'
            ]),
            'description' => $this->faker->paragraph(),
            'type' => $this->faker->randomElement(['Clase teórica', 'Clase práctica', 'Examen', 'Tarea','Proyecto grupal','Actividad artística','Actividad deportiva','Excursión o salida escolar']),
            'grado' => $this->faker->randomElement(['1er', '2do', '3er', '4to', '5to', '6to']),
            'start' => $start->format('Y-m-d H:i:s'),
            'end' => $end->format('Y-m-d H:i:s'),
            'backgroundColor' => $backgroundColor,
            'allDay' => $this->faker->randomElement([False, False, False,False, True ]),
        ];
    }
}
