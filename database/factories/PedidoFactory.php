<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Producto;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha_pedido'=>fake()->date(),
            'estado'=>fake()->randomElement(['activo','inactivo','cancelado','pendiente']),
            'idproducto'=>Producto::inRandomOrder()->first()->id,
        ];
    }
}
