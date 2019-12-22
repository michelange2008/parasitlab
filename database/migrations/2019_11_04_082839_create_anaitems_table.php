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
            $table->increments('id');
            $table->string('abbreviation', 4);
            $table->string('nom', 191);
            $table->integer('unite_id')->unsigned();
            $table->foreign('unite_id')->references('id')->on('unites')->onDelete('restrict');
            $table->integer('qtt_id')->unsigned();
            $table->foreign('qtt_id')->references('id')->on('qtts')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('anaitems');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
