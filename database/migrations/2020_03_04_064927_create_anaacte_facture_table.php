<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaacteFactureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaacte_facture', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('anaacte_id');
            $table->foreign('anaacte_id')->references('id')->on('anaactes')->onDelete('cascade');
            $table->unsignedInteger('facture_id');
            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');
            $table->unsignedInteger('nombre')->default(1);
            $table->decimal('pu_ht', 8, 2);
            $table->unsignedInteger('tva_id')->default(1);
            $table->foreign('tva_id')->references('id')->on('tvas')->onDelete('restrict');

            $table->timestamp('date')->nullable();
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
        Schema::dropIfExists('anaacte_facture');
    }
}
