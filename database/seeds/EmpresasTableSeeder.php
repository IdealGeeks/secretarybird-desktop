<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('empresas')->insert([
            [
                'nome' => 'Doutores da Web',
                'interno' => '1',
            ],
            [
                'nome' => 'Soluções Industrias',
                'interno' => '1',
            ],
            [
                'nome' => 'Busca Cliente',
                'interno' => '1',
            ],
            [
                'nome' => 'Ideal Marketing',
                'interno' => '1',
            ],
            [
                'nome' => 'Kalahary',
                'interno' => '1',
            ],
            [
                'nome' => 'Habbis',
                'interno' => '0',
            ],
            [
                'nome' => 'Bk',
                'interno' => '0',
            ],
            [
                'nome' => 'Mc Donalds',
                'interno' => '0',
            ],
            [
                'nome' => 'Pastel da M',
                'interno' => '0',
            ],
            [
                'nome' => 'Pizzaria',
                'interno' => '0',
            ],
            [
                'nome' => 'Paris 6',
                'interno' => '0',
            ],
            [
                'nome' => 'Hannover',
                'interno' => '0',
            ],
            [
                'nome' => 'Chalezinho',
                'interno' => '0',
            ]
        ]);
    }
}
