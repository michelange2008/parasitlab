<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaacteAnapackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaacte_anapack', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('anapack_id')->unsigned();
          $table->foreign('anapack_id')->references('id')->on('anapacks')->onDelete('cascade');
          $table->integer('anaacte_id')->unsigned();
          $table->foreign('anaacte_id')->references('id')->on('anaactes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anaactes_anapacks');
    }
}
