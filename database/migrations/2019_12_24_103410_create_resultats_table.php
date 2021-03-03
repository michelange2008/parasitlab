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
            // PRLEVEMENT
            $table->unsignedInteger('prelevement_id');
            $table->foreign('prelevement_id')->references('id')->on('prelevements')->onDelete('cascade');
            // ITEM
            $table->unsignedInteger('anaitem_id');
            $table->foreign('anaitem_id')->references('id')->on('anaitems')->onDelete('restrict');
            // RESULTAT
            $table->string('valeur', 191)->nullable()->default(null);
            // DATES
            $table->boolean('positif')->default(0);
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
