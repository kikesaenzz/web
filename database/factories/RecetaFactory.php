<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reserva>
 */
class reservaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>fake()->opera(),
            'texto'=>fake()->paragraph(),
            'tipo'=>"Tradicional",
            'tiempo'=>fake()->numberBetween(0,300)
        ];
    }
}
