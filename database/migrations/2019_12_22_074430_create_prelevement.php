<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrelevement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('prelevements', function (Blueprint $table) {
          $table->increments('id');
          // IDENTIFICATION
          $table->string('identification', 191);
          // DEMANDE
          $table->unsignedInteger('demande_id');
          $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');
          // ANALYSE
          $table->unsignedInteger('analyse_id');
          $table->foreign('analyse_id')->references('id')->on('analyses')->onDelete('restrict');
          // ETAT DU PRELEVEMENT
          $table->unsignedInteger('etat_id')->default(1)->nullable();
          $table->foreign('etat_id')->references('id')->on('etats')->onDelete('set null');
          // CONSISTANCE
          $table->unsignedInteger('consistance_id')->nullable();
          $table->foreign('consistance_id')->references('id')->on('consistances')->onDelete('set null');
          // DATES
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
      Schema::dropIfExists('prelevements');
    }
}
