<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nom', 191);

            $table->integer('anatype_id')->unsigned();
            $table->foreign('anatype_id')->references('id')->on('anatypes')->onDelete('restrict');

            $table->integer('espece_id')->unsigned();
            $table->foreign('espece_id')->references('id')->on('especes')->onDelete('restrict');

            $table->integer('icone_id')->unsigned()->default(1)->nullable();
            $table->foreign('icone_id')->references('id')->on('icones')->onDelete('set null');
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
        Schema::dropIfExists('analyses');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
