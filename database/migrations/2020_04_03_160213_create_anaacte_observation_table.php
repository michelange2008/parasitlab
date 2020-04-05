<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaacteObservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaacte_observation', function (Blueprint $table) {
            $table->unsignedInteger('anaacte_id');
            $table->foreign('anaacte_id')->references('id')->on('anaactes');
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
        Schema::dropIfExists('anaacte_observation');
    }
}
