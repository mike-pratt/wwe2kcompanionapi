<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRivalriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rivalries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('wrestler_id');
            $table->unsignedInteger('rival_id');
            $table->integer('level');
            $table->string('length');
            $table->boolean('active');
            $table->timestamps();

            $table->foreign('wrestler_id')->references('id')->on('wrestlers');
            $table->foreign('rival_id')->references('id')->on('wrestlers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rivalries');
    }
}
