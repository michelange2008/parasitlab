<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->increments('id');
            // $table->unsignedInteger('demande_id');
            // $table->foreign('demande_id')->references('id')->on('demandes')->onDelete('cascade');
            $table->integer('destinataire_facture')->unsigned();
            $table->foreign('destinataire_facture')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('faite')->default(0);
            $table->decimal('total_ht', 8, 2)->default(0);
            $table->decimal('total_ttc', 8, 2)->default(0);
            $table->timestamp('faite_date')->nullable();
            $table->boolean('envoyee')->default(0);
            $table->timestamp('envoyee_date')->nullable();
            $table->boolean('payee')->default(0);
            $table->timestamp('payee_date')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factures');
    }
}
