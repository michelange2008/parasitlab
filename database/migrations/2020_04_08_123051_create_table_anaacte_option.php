<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAnaacteOption extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anaacte_option', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->unsignedInteger('anaacte_id');
            $table->foreign('anaacte_id')->references('id')->on('anaactes');
            $table->unsignedInteger('option_id');
            $table->foreign('option_id')->references('id')->on('options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_anaacte_option');
    }
}
