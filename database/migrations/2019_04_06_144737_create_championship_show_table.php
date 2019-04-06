<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChampionshipShowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('championship_show', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('championship_id');
            $table->unsignedInteger('show_id');
            $table->timestamps();

            $table->foreign('championship_id')->references('id')->on('championships');
            $table->foreign('show_id')->references('id')->on('shows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('championship_show');
    }
}
