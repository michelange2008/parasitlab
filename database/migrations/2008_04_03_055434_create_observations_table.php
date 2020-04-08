<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observations', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('ordre');
            $table->unsignedInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->string('intitule', 191);
            $table->mediumText('explication');
            $table->string('autres', 191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('observations');
    }
}
