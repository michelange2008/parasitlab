<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnatypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anatypes', function (Blueprint $table) {
            $table->increments('id')->unsigned;
            $table->string('abbreviation', 50);
            $table->string('nom', 191);
            $table->string('technique', 191);
            $table->boolean('estSpecial')->default(false);
            $table->unsignedInteger('icone_id');
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
        Schema::dropIfExists('anatypes');
    }
}
