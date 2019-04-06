<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampionshipReignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_reigns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('days');
            $table->unsignedInteger('wrestler_id');
            $table->unsignedInteger('championship_id');
            $table->timestamps();

            $table->foreign('wrestler_id')->references('id')->on('wrestlers');
            $table->foreign('championship_id')->references('id')->on('championships');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championship_reigns');
    }
}
