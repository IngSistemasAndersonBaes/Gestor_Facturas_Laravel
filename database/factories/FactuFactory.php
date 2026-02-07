<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factu>
 */
class FactuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fecha' => $this->faker->date(),
            'Concepto' => $this->faker->word(),
            'Proveedor' => $this->faker->word(),
            'No_Factura' => $this->faker->unique()->numberBetween(1, 1000),
            'Monto' => $this->faker->randomFloat(2, 1, 1000),
            'Tipo' => $this->faker->word(),
        ];
    }
}
