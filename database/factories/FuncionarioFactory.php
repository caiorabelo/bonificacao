<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FuncionarioFactory extends Factory
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
            'saldo_atual' => $this->faker->randomFloat(2),
            'administrador_id' => 1,
        ];
    }
}
