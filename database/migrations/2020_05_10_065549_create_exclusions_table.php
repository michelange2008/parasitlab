<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExclusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('exclusions');

        Schema::create('exclusions', function (Blueprint $table) {

          $table->increments('id');

          $table->unsignedInteger('espece_id');
          $table->foreign('espece_id')->references('id')->on('especes')->onDelete('cascade');

          $table->unsignedInteger('age_id')->nullable();
          $table->foreign('age_id')->references('id')->on('ages')->onDelete('cascade');

          $table->unsignedInteger('anatype_id');
          $table->foreign('anatype_id')->references('id')->on('anatypes')->onDelete('cascade');

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
        Schema::dropIfExists('exclusions');
    }
}
