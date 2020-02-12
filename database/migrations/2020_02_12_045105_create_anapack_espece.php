<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnapackEspece extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anapack_espece', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('anapack_id');
            $table->foreign('anapack_id')->references('id')->on('anapacks')->onDelete('cascade');
            $table->unsignedInteger('espece_id');
            $table->foreign('espece_id')->references('id')->on('especes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anapack_espece');
    }
}
