<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeprodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typeprods', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nom', 191);
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
        Schema::dropIfExists('typeprods');
    }
}
