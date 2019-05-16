<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposPermissoes extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos_permissoes', function (Blueprint $table) {
            $table->integer('grupo_id');
            $table->integer('permissao_id');
            $table->timestamps();
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('CASCADE');
            $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos_permissoes');
    }
}
