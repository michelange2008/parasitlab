<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ages', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nom', 50);
            $table->string('abbreviation', 5);
            $table->unsignedInteger('espece_id');
            $table->foreign('espece_id')->references('id')->on('especes')->onDelete('cascade');
            $table->integer('icone_id')->unsigned()->nullable();
            $table->foreign('icone_id')->references('id')->on('icones')->onDelete('set null');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ages');
    }
}
