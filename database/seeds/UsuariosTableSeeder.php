<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('usuarios')->insert([
            [
                'nome' => 'Web Master',
                'sobrenome' => 'Developer',
                'email' => 'admin@admin.com.br',
                'password' => bcrypt('102030'),
                'status_id' => 1,
                'setor_id' => '1'
            ],
            [
                'nome' => 'Vinicius',
                'sobrenome' => 'Shirakawabe',
                'email' => 'gordinho@gmail.com.br',
                'password' => bcrypt('102030'),
                'status_id' => '1',
                'setor_id' => '1'
            ],
            [
                'nome' => 'Pedro',
                'sobrenome' => 'Helike',
                'email' => 'pedrao@gmail.com.br',
                'password' => bcrypt('102030'),
                'status_id' => '1',
                'setor_id' => '2'
            ],
            [
                'nome' => 'Rafael',
                'sobrenome' => 'Lima',
                'email' => 'simba@gmail.com.br',
                'password' => bcrypt('102030'),
                'status_id' => '1',
                'setor_id' => '3'
            ],
            [
                'nome' => 'Johnny',
                'sobrenome' => 'Silva',
                'email' => 'ragnar@gmail.com.br',
                'password' => bcrypt('102030'),
                'status_id' => '1',
                'setor_id' => '1'
            ],
            [
                'nome' => 'Douglas',
                'sobrenome' => 'Avilla',
                'email' => 'up@gmail.com.br',
                'password' => bcrypt('102030'),
                'status_id' => '1',
                'setor_id' => '1'
            ],
            [
                'nome' => 'Kadu',
                'sobrenome' => 'Aono',
                'email' => 'kadu@gmail.com.br',
                'password' => bcrypt('102030'),
                'status_id' => '1',
                'setor_id' => '1'
            ],
        ]);
    }
}
