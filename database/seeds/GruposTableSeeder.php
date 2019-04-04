<?php

use Illuminate\Database\Seeder;

class GruposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('grupos')->insert([
            ['titulo' => 'WebMasters'],
            ['titulo' => 'Responsáveis'],
            ['titulo' => 'Usuários']
        ]);

        \Illuminate\Support\Facades\DB::table('administradores_grupos')->insert([
            ['administrador_id' => 1, 'grupo_id' => 1],
        ]);
    }
}
