<?php

namespace Database\Seeders;

use App\Models\Movimentacao;
use Illuminate\Database\Seeder;

class MovimentacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movimentacao::factory(10)->create();
    }
}
