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
            $table->bigIncrements('id');
            $table->char('nom', 191);
            $table->bigInteger('espece_id')->unsigned();
            $table->foreign('espece_id')->references('id')->on('especes');
            $table->char('icone_id', 191);
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
