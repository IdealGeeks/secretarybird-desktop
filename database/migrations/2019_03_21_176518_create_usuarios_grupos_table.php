<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios_grupos', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('usuario_id');
            $table->integer('grupo_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('CASCADE');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios_grupos');
    }
}
