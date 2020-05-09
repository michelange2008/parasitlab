<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgeAnaacteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_anaacte', function (Blueprint $table) {
          $table->unsignedInteger('age_id');
          $table->foreign('age_id')->references('id')->on('ages');
          $table->unsignedInteger('anaacte_id');
          $table->foreign('anaacte_id')->references('id')->on('anaactes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('age_anaacte');
    }
}
