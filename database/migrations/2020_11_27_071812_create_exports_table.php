<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exports', function (Blueprint $table) {

            $table->id();
            $table->string('nom', 191)->nullable();
            $table->string('cp', 20)->nullable();
            $table->string('commune', 191)->nullable();
            $table->string('espece', 191)->nullable();
            $table->string('troupeau', 191)->nullable();
            $table->unsignedInteger('demande_id');
            $table->unsignedInteger('resultat_id');
            $table->boolean('estMelange')->nullable();
            $table->string('animal_numero', 191)->nullable();
            $table->string('animal_nom', 191)->nullable();
            $table->date('date_prelevement')->nullable();
            $table->date('date_resultat')->nullable();
            $table->string('parasite', 191)->nullable();
            $table->boolean('positif')->nullable();
            $table->string('valeur', 191)->nullable();
            $table->boolean('estParasite')->nullable();
            $table->text('signes', 191)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exports');
    }
}
