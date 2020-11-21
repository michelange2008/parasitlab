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
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
              ->onDelete('set null')->onUpdate('cascade');

            $table->unsignedInteger('nb_prelevement');

            $table->unsignedInteger('espece_id')->nullable();
            $table->foreign('espece_id')->references('id')->on('especes')
              ->onDelete('set null')->onUpdate('cascade');

            $table->unsignedInteger('troupeau_id')->nullable();
            $table->foreign('troupeau_id')->references('id')->on('troupeaus')
              ->onDelete('set null')->onUpdate('cascade');

            $table->unsignedInteger('anaacte_id');
            $table->foreign('anaacte_id')->references('id')->on('anaactes')
              ->onDelete('restrict')->onUpdate('cascade');

            $table->unsignedInteger('serie_id')->nullable();
            $table->foreign('serie_id')->references('id')->on('series')
              ->onDelete('cascade')->onUpdate('cascade');

            $table->mediumText('informations')->nullable();

            $table->boolean('toveto');

            $table->unsignedInteger('veto_id')->default(4)->nullable();
            $table->foreign('veto_id')->references('id')->on('vetos')
            ->onDelete('set null')->onUpdate('cascade');

            $table->timestamp('date_prelevement')->nullable();
            $table->timestamp('date_reception')->nullable();

            $table->boolean('acheve')->default(false);
            $table->timestamp('date_resultat')->nullable();

            $table->boolean('envoye')->default(false);
            $table->timestamp('date_envoi')->nullable();

            $table->boolean('signe')->default(false);
            $table->timestamp('date_signature')->nullable();
            $table->unsignedInteger('labo_id')->nullable();
            $table->foreign('labo_id')->references('id')->on('labos')
            ->onDelete('set null')->onUpdate('cascade');

            $table->boolean('userfact_id')->default(true); // true si l'éleveur est le destinataire de la facture

            $table->boolean('facturee')->default(false);
            $table->unsignedInteger('facture_id')->nullable();
            $table->foreign('facture_id')->references('id')->on('factures')
            ->onDelete('set null')->onUpdate('cascade');

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
