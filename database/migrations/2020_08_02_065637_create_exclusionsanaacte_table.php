<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExclusionsanaacteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exclusionsanaacte', function (Blueprint $table) {
          $table->increments('id');

          $table->unsignedInteger('espece_id');
          $table->foreign('espece_id')->references('id')->on('especes');

          $table->unsignedInteger('age_id')->nullable();
          $table->foreign('age_id')->references('id')->on('ages');

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
        Schema::dropIfExists('exclusionsanaacte');
    }
}
