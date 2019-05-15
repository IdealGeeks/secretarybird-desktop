<?php

use Illuminate\Database\Seeder;

class ResponsaveisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('responsaveis')->insert([
            [
                'empresa_id' => '1',
                'usuario_id' => '2'
            ],
            [
                'empresa_id' => '2',
                'usuario_id' => '3',
            ]
        ]);
    }
}
