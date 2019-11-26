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
          $table->unsignedInteger('icone_id')->default(1);
          $table->foreign('icone_id')->references('id')->on('icones');
          $table->decimal('pu_ht', 8, 2);
          $table->unsignedInteger('tva_id')->default(1);
          $table->foreign('tva_id')->references('id')->on('tvas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('anaactes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
