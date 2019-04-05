<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexStatusVisitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('status_visitas', function (Blueprint $table) {
            $table->foreign('visita_id')->references('id')->on('visitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('status_visitas', function (Blueprint $table) {
            $table->dropForeign(['visita_id']);
        });
    }
}
