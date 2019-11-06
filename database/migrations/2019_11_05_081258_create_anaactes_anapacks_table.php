<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaactesAnapacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaactes_anapacks', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('anapack_id')->unsigned();
          $table->foreign('anapack_id')->references('id')->on('anapacks');
          $table->integer('anaacte_id')->unsigned();
          $table->foreign('anaacte_id')->references('id')->on('anaactes');
          $table->integer('nombre')->default(1);
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
