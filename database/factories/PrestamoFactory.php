<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Cliente;
use \App\Models\Libro;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prestamo>
 */
class PrestamoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_prestamo' => fake()->date(),
            'estado' => fake()->randomElement(['pendiente', 'devuelto', 'atrasado']),
            'idcliente' =>Cliente ::inRandomOrder()->first()->id,
            'idlibros' => Libro::inRandomOrder()->first()->id,
        ];
    }
}
