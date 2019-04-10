<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusTableSeeder::class);
        $this->call(PermissoesTableSeeder::class);
        $this->call(AdministradoresTableSeeder::class);
        $this->call(GruposTableSeeder::class);
        $this->call(AdministradoresPermissoesTableSeeder::class);
        $this->call(StatusVisitaTableSeeder::class);
        $this->call(EmpresasTableSeeder::class);
        $this->call(SetoresTableSeeder::class);
        $this->call(TipoVisitasTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(VisitasTableSeeder::class);
        $this->call(StatusVisitasTableSeeder::class);
        $this->call(ResponsaveisTableSeeder::class);
    }
}
