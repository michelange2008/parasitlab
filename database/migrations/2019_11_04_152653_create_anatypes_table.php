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
      DB::statement('SET FOREIGN_KEY_CHECKS = 0');
      Schema::dropIfExists('anatypes');
      DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::create('anatypes', function (Blueprint $table) {
            $table->increments('id')->unsigned;
            $table->string('abbreviation', 50);
            $table->string('nom', 191);
            $table->string('technique', 191);
            $table->mediumText('remarque')->nullable();
            $table->boolean('estAnalyse')->default(true);
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
