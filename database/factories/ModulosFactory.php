<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Modulos>
 */
class ModulosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombre = $this->faker->sentence();
        return [
            'nombre_modulo' => $nombre,
            'slug' => Str::slug($nombre,'-'),
            'desc_modulo' => $this->faker->sentence(),
            'id_cursos' => 1
        ];
    }
}
