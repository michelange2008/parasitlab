<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeAnatypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_anatype', function (Blueprint $table) {
          $table->unsignedInteger('age_id');
          $table->foreign('age_id')->references('id')->on('ages');
          $table->unsignedInteger('anatype_id');
          $table->foreign('anatype_id')->references('id')->on('anaactes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('age_anatype');
    }
}
