<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('eleveur_id');
            $table->foreign('eleveur_id')->references('id')->on('eleveurs')->onDelete('cascade');

            $table->unsignedInteger('anapack_id');
            $table->foreign('anapack_id')->references('id')->on('anapacks')->onDelete('restrict');

            $table->unsignedInteger('espece_id');
            $table->foreign('espece_id')->references('id')->on('especes')->onDelete('restrict');

            $table->boolean('acheve')->default(false);

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
        Schema::dropIfExists('series');
    }
}
