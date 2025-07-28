<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materia>
 */
class MateriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sigla' => fake()->regexify('[A-Z]{3}[0-9]{3}'),
            'semestre'=>fake()->numberBetween(1,10),
            'carga'=>fake()->numberBetween(1,100),
            'prerequisito'=>fake()->name(),
        ];
    }
}
