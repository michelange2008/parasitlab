<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('options');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::create('options', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('abbreviation', 50)->nullable();
            $table->string('nom', 191)->nullable();
            $table->string('titre', 191)->nullable();
            $table->text('soustitre')->nullable();
            $table->text('qui')->nullable();
            $table->text('quand')->nullable();
            $table->string('icone', 191);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
