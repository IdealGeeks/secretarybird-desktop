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
                'tipo' => \App\Models\Empresa::TIPO_INTERNO,
            ],
            [
                'nome' => 'Soluções Industrias',
                'tipo' => \App\Models\Empresa::TIPO_INTERNO,
            ],
            [
                'nome' => 'Busca Cliente',
                'tipo' => \App\Models\Empresa::TIPO_INTERNO,
            ],
            [
                'nome' => 'Ideal Marketing',
                'tipo' => \App\Models\Empresa::TIPO_INTERNO,
            ],
            [
                'nome' => 'Kalahary',
                'tipo' => \App\Models\Empresa::TIPO_INTERNO,
            ],
            [
                'nome' => 'Habbis',
                'tipo' => \App\Models\Empresa::TIPO_RESTAURANTE,
            ],
            [
                'nome' => 'Bk',
                'tipo' => \App\Models\Empresa::TIPO_RESTAURANTE,
            ],
            [
                'nome' => 'Mc Donalds',
                'tipo' => \App\Models\Empresa::TIPO_RESTAURANTE,
            ],
            [
                'nome' => 'Pastel da M',
                'tipo' => \App\Models\Empresa::TIPO_RESTAURANTE,
            ],
            [
                'nome' => 'Pizzaria',
                'tipo' => \App\Models\Empresa::TIPO_RESTAURANTE,
            ],
            [
                'nome' => 'Paris 6',
                'tipo' => \App\Models\Empresa::TIPO_RESTAURANTE,
            ],
            [
                'nome' => 'Hannover',
                'tipo' => \App\Models\Empresa::TIPO_RESTAURANTE,
            ],
            [
                'nome' => 'Chalezinho',
                'tipo' => \App\Models\Empresa::TIPO_RESTAURANTE,
            ]
        ]);
    }
}
