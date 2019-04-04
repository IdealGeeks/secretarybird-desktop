<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexVisitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitas', function (Blueprint $table) {
            $table->foreign('tipos_visitas')->references('id')->on('tipos_visitas');
            $table->foreign('empresas_id')->references('id')->on('empresas');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitas', function (Blueprint $table) {
            $table->dropForeign(['tipos_visitas']);
            $table->dropForeign(['empresas_id']);
            $table->dropForeign(['usuarios_id']);
        });
    }
}
