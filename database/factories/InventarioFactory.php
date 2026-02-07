<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventario>
 */
class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => $this->faker->unique(),
            'descripcion' => $this->faker->word(),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'tipo' => $this->faker->randomElement(['general', 'electrico', 'mueble', 'maquinaria', 'herramienta', 'otro']),
            'modelo' => $this->faker->optional()->word(),
            'marca' => $this->faker->optional()->word(),
            'valor' => $this->faker->numberBetween(100, 10000),
            'condicion' => $this->faker->randomElement(['bueno', 'regular','descompuesto']),
            'ubicacion' => $this->faker->optional()->word(),
        ];
    }
}
