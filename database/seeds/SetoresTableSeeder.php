<?php

use Illuminate\Database\Seeder;

class SetoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('setores')->insert([
            [
                'nome' => 'Programação',
                'empresa_id' => '2',
            ],
            [
                'nome' => 'CS Doutores',
                'empresa_id' => '1',
            ],
            [
                'nome' => 'CS Soluçoes Industriais',
                'empresa_id' => '2',
            ],
            [
                'nome' => 'Front-End',
                'empresa_id' => '1',
            ],
            [
                'nome' => 'Design',
                'empresa_id' => '4',
            ]
        ]);
    }
}
