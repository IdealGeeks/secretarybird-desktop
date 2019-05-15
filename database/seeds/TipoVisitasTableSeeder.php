<?php

use Illuminate\Database\Seeder;

class TipoVisitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('tipos_visitas')->insert([
            [
                'titulo' => 'Delivery',
            ],
            [
                'titulo' => 'Entrevista',
            ],
            [
                'titulo' => 'Reunião',
            ],
            [
                'titulo' => 'Fornecedor',
            ],
            [
                'titulo' => 'Encomendas',
            ],
            [
                'titulo' => 'Outros',
            ],
        ]);
    }
}
