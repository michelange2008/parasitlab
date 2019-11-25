<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('prelevement_id');
            $table->foreign('prelevement_id')->references('id')->on('prelevements');
            $table->unsignedInteger('analyse_id');
            $table->foreign('analyse_id')->references('id')->on('analyses');
            $table->string('valeur, 191')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultats');
    }
}
