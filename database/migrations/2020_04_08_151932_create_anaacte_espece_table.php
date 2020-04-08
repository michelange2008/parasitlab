<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaacteEspeceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaacte_espece', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->unsignedInteger('anaacte_id');
          $table->foreign('anaacte_id')->references('id')->on('anaactes');
          $table->unsignedInteger('espece_id');
          $table->foreign('espece_id')->references('id')->on('especes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anaacte_espece');
    }
}
