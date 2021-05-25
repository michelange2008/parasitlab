<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMelangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('melanges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 191);
            $table->unsignedInteger('troupeau_id');
            $table->foreign('troupeau_id')->references('id')->on('troupeaus')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('melanges');
    }
}
