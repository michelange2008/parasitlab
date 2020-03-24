<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrelevementSigneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prelevement_signe', function (Blueprint $table) {
            $table->unsignedInteger('prelevement_id');
            $table->foreign('prelevement_id')->references('id')->on('prelevements');
            $table->unsignedInteger('signe_id');
            $table->foreign('signe_id')->references('id')->on('signes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prelevement_signe');
    }
}
