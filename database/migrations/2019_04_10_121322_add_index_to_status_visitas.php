<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToStatusVisitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visitas_status_visitas', function (Blueprint $table) {
            $table->foreign('status_visitas_id')->references('id')->on('status_visitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visitas_status_visitas', function (Blueprint $table) {
            $table->dropForeign(['status_visitas_id']);
        });
    }
}
