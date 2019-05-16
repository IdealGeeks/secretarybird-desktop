<?php

use Illuminate\Database\Seeder;

class UsuariosPermissoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('usuarios_permissoes')->delete();

        $super_admin = [];

        for ($i = 1; $i <= 47; $i++) {
            $super_admin[$i] = ['usuario_id' => 1, 'permissao_id' => $i];
        }

        \DB::table('usuarios_permissoes')->insert($super_admin);
    }
}
