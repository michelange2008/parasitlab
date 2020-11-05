<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTroupeauxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('troupeaux', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nom');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedInteger('espece_id');
            $table->foreign('espece_id')->references('id')->on('especes');
            $table->unsignedInteger('typeprod_id');
            $table->foreign('typeprod_id')->references('id')->on('typeprods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('troupeaux');
    }
}
