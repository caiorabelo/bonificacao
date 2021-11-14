<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdministradorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome_completo' => $this->faker->name(),
            'login' => $this->faker->unique()->lexify('??????'),
            'senha' => bcrypt('12345678'),
        ];
    }
}
