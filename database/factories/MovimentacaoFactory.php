<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovimentacaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo_movimentacao' => 'saida',
            'valor' => $this->faker->randomFloat(2),
            'observacao' => $this->faker->paragraph(),
            'funcionario_id' => $this->faker->randomDigitNotNull(),
            'administrador_id' => 1,
        ];
    }
}
