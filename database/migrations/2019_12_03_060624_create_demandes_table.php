<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('espece_id');
            $table->foreign('espece_id')->references('id')->on('especes');
            $table->unsignedInteger('anapack_id');
            $table->foreign('anapack_id')->references('id')->on('anapacks');
            $table->string('identification', 191);
            $table->boolean('toveto');
            $table->unsignedInteger('veto_id')->default(4);
            $table->foreign('veto_id')->references('id')->on('vetos');
            $table->timestamp('prelevement')->nullable();
            $table->timestamp('reception');
            $table->timestamp('resultat')->nullable();
            $table->timestamp('envoi')->nullable();
            $table->unsignedInteger('facture_id')->nullable();
            $table->foreign('facture_id')->references('id')->on('factures');
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
        Schema::dropIfExists('demandes');
    }
}
