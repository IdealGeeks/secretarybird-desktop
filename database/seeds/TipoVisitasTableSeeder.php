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
                'titulo' => 'Entrevista',
            ],
            [
                'titulo' => 'Entrega',
            ],
            [
                'titulo' => 'Reunião',
            ],
            [
                'titulo' => 'Não agendado',
            ],
        ]);
    }
}
