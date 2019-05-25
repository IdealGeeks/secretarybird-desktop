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

        \Illuminate\Support\Facades\DB::table('usuarios_grupos')->insert([
            ['usuario_id' => 1, 'grupo_id' => 1],
            ['usuario_id' => 2, 'grupo_id' => 2],
            ['usuario_id' => 3, 'grupo_id' => 2],
            ['usuario_id' => 4, 'grupo_id' => 3],
            ['usuario_id' => 5, 'grupo_id' => 3],
            ['usuario_id' => 6, 'grupo_id' => 3],
            ['usuario_id' => 7, 'grupo_id' => 3],
        ]);

        $super_grupo = [];

        for ($i = 1; $i <= 55; $i++) {
            $super_grupo[$i] = ['grupo_id' => 1, 'permissao_id' => $i];
        }

        \DB::table('grupos_permissoes')->insert($super_grupo);
    }
}
