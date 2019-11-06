<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analistes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 191);
            $table->integer('espece_id')->unsigned();
            $table->foreign('espece_id')->references('id')->on('especes');
            $table->integer('icone_id')->unsigned()->default(1);
            $table->foreign('icone_id')->references('id')->on('icones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analistes');
    }
}
