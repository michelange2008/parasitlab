<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_observation', function (Blueprint $table) {
          $table->unsignedInteger('age_id');
          $table->foreign('age_id')->references('id')->on('ages');
          $table->unsignedInteger('observation_id');
          $table->foreign('observation_id')->references('id')->on('observations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('age_observation');
    }
}
