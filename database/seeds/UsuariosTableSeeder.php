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
                'nome' => 'Vinicius',
                'sobrenome' => 'Shirakawabe',
                'email' => 'gordinho@gmail.com.br',
                'password' => '$2y$10$eKEMc1CkO5HWFziGE5VONO9lAPc3swzIDswNfNprIOHyxN4TFkQz6',
                'status_id' => '1',
                'remember_token' => null,
                'setor_id' => '1'
            ],
            [
                'nome' => 'Pedro',
                'sobrenome' => 'Helike',
                'email' => 'pedrao@gmail.com.br',
                'password' => '$2y$10$eKEMc1CkO5HWFziGE5VONO9lAPc3swzIDswNfNprIOHyxN4TFkQz6',
                'status_id' => '1',
                'remember_token' => null,
                'setor_id' => '2'
            ],
            [
                'nome' => 'Rafael',
                'sobrenome' => 'Lima',
                'email' => 'simba@gmail.com.br',
                'password' => '$2y$10$eKEMc1CkO5HWFziGE5VONO9lAPc3swzIDswNfNprIOHyxN4TFkQz6',
                'status_id' => '1',
                'remember_token' => null,
                'setor_id' => '3'
            ],
            [
                'nome' => 'Johnny',
                'sobrenome' => 'Silva',
                'email' => 'ragnar@gmail.com.br',
                'password' => '$2y$10$eKEMc1CkO5HWFziGE5VONO9lAPc3swzIDswNfNprIOHyxN4TFkQz6',
                'status_id' => '1',
                'remember_token' => null,
                'setor_id' => '1'
            ],
            [
                'nome' => 'Douglas',
                'sobrenome' => 'Avilla',
                'email' => 'up@gmail.com.br',
                'password' => '$2y$10$eKEMc1CkO5HWFziGE5VONO9lAPc3swzIDswNfNprIOHyxN4TFkQz6',
                'status_id' => '1',
                'remember_token' => null,
                'setor_id' => '1'
            ],
            [
                'nome' => 'Kadu',
                'sobrenome' => 'Aono',
                'email' => 'kadu@gmail.com.br',
                'password' => '$2y$10$eKEMc1CkO5HWFziGE5VONO9lAPc3swzIDswNfNprIOHyxN4TFkQz6',
                'status_id' => '1',
                'remember_token' => null,
                'setor_id' => '1'
            ],
        ]);
    }
}
