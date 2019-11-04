<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnaitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaitems', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('abbrev', 4);
            $table->char('nom', 191);
            $table->bigInteger('unite_id')->unsigned();
            $table->foreign('unite_id')->references('id')->on('unite');
            $table->bigInteger('qtt_id')->unsigned();
            $table->foreign('qtt_id')->references('id')->on('qtt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anaitems');
    }
}
