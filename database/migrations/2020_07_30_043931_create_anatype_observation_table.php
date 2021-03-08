<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnatypeObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anatype_observation', function (Blueprint $table) {
          $table->unsignedInteger('anatype_id');
          $table->foreign('anatype_id')->references('id')->on('anaactes')->onDelete('cascade');
          $table->unsignedInteger('observation_id');
          $table->foreign('observation_id')->references('id')->on('observations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anatype_observation');
    }
}
