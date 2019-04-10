<?php

use Illuminate\Database\Seeder;

class VisitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('visitas')->insert([
            [
                'nome' => 'Visita 1',
                'horario' => date('Y-m-d H:i:s'),
                'detalhes' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ultrices, odio sed luctus hendrerit, metus ex tempus enim, nec lobortis nisl justo ac leo.',
                'tipo_visita' => '1',
                'empresa_id' => '1',
                'usuario_id' => '1',
            ],
            [
                'nome' => 'Visita 2',
                'horario' => date('Y-m-d H:i:s'),
                'detalhes' => 'Nam eu sem ac risus placerat euismod. Donec dignissim nunc sed laoreet iaculis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. ',
                'tipo_visita' => '2',
                'empresa_id' => '2',
                'usuario_id' => '2',
            ],
            [
                'nome' => 'Visita 3',
                'horario' => date('Y-m-d H:i:s'),
                'detalhes' => 'Cras ultricies quam eget ultricies ultrices. Mauris ultrices facilisis augue. Duis ac congue tortor. Pellentesque gravida nibh a mi venenatis, eu varius ipsum sodales.',
                'tipo_visita' => '3',
                'empresa_id' => '3',
                'usuario_id' => '3',
            ],
            [
                'nome' => 'Visita 4',
                'horario' => date('Y-m-d H:i:s'),
                'detalhes' => ' Ut vitae urna ut leo malesuada tristique sit amet vitae nisi. Nam pharetra justo at ex euismod pretium.',
                'tipo_visita' => '1',
                'empresa_id' => '4',
                'usuario_id' => '4',
            ],
            [
                'nome' => 'Visita 5',
                'horario' => date('Y-m-d H:i:s'),
                'detalhes' => 'Sed hendrerit ante eget nulla scelerisque, eu commodo risus porttitor.',
                'tipo_visita' => '2',
                'empresa_id' => '1',
                'usuario_id' => '2',
            ]
        ]);
    }
}
