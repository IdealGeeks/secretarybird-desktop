<?php

use Illuminate\Database\Seeder;

class StatusVisitaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('status_visita')->insert([
            [
                'titulo' => 'Confirmado'
            ],
            [
                'titulo' => 'Cancelado'
            ]
        ]);
    }
}
