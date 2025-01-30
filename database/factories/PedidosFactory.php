<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedidos>
 */
class PedidosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->sentence(),
            'estado' => fake()->randomElement(['Procesado', 'Pendiente']),
            'cantidad' => fake()->randomFloat(2, 0, 9999),
            'user_id' => User::all()->random()->id,
        ];
    }
}
