<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWrestlerIdForeignToChampionshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('championships', function (Blueprint $table) {
           $table->unsignedInteger('wrestler_id')->nullable();
           $table->foreign('wrestler_id')->references('id')->on('wrestlers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championships');
    }
}
