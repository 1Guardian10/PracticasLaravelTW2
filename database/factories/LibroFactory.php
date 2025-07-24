<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>fake()->sentence(5),
            'autor'=>fake()->name(),
            'editorial'=>fake()->company(),
            'anio'=>fake()->numberBetween(2005,2015),
            'categoria'=>fake()->randomElement(['analisis','diseno','programacion']),
            'estado'=>fake()->boolean(),
            'fecha_publicacion'=>fake()->date(),
            'DOI'=>fake()->sentence(3)
        ];
    }
}
