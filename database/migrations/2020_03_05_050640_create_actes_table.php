<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('actes', function (Blueprint $table) {
          $table->increments('id');
          $table->unsignedInteger('user_id')->nullable();
          $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('set null')->onUpdate('cascade');

          $table->unsignedInteger('anaacte_id');
          $table->foreign('anaacte_id')->references('id')->on('anaactes')
            ->onDelete('restrict')->onUpdate('cascade');

          $table->unsignedInteger('nombre')->default(1);

          $table->boolean('facturee')->default(false);
          $table->unsignedInteger('facture_id')->nullable();
          $table->foreign('facture_id')->references('id')->on('factures')
          ->onDelete('set null')->onUpdate('cascade');


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
        Schema::dropIfExists('actes');
    }
}
