<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'nombre_usuario' => fake()->userName(),
                'nombre' => fake()->firstName(),
                'apellidos' => fake()->lastName(),
                'correo' => fake()->userName.'@mail.com',
                'experiencia' => 'Principiante',
                'contrasena'=>bcrypt('123456'),
                'esAdmin'=> 0
        ];
    }
}
