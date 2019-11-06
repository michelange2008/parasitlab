<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaactesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaactes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('code');
          $table->string('nom');
          $table->string('description');
          $table->float('puht', 8, 2);
          $table->float('tva', 3, 2)->default(0.2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anaactes');
    }
}
