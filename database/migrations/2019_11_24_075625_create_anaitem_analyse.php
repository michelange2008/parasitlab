<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaitemAnalyse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaitem_analyse', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('anaitem_id');
            $table->foreign('anaitem_id')->references('id')->on('anaitems')->onDelete('cascade');
            $table->unsignedInteger('analyse_id');
            $table->foreign('analyse_id')->references('id')->on('analyses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('anaitem_analyse');
    }
}
