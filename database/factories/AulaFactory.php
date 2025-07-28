<?php

namespace Database\Factories;

use App\Models\Materia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aula>
 */
class AulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->name(),
            'capacidad'=>fake()->numberBetween(1,50),
            'sigla' => fake()->regexify('[A-Z]{3}[0-9]{3}'),
            'materia_id'=>Materia::inRandomOrder()->first()->id,
        ];
    }
}
