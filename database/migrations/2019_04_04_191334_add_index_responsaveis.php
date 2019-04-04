<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexResponsaveis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('responsaveis', function (Blueprint $table) {
            $table->foreign('empresas_id')->references('id')->on('empresas_id');
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
        Schema::table('responsaveis', function (Blueprint $table) {
            $table->foreign('empresas_id')->references('id')->on('empresas_id');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
        });
    }
}
