<?php

namespace Database\Seeders;

use App\Models\Administrador;
use Illuminate\Database\Seeder;

class AdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrador::factory(10)->create();

        Administrador::create([
            'nome_completo'=>'Administrador',
            'login'=>'admin',
            'senha'=>bcrypt('12345678'),
        ]);
    }
}
