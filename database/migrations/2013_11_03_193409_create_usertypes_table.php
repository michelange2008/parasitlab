<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsertypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom', 50);
            $table->string('code', 50);
            $table->unsignedInteger('icone_id')->default(1)->nullable();
            $table->foreign('icone_id')->references('id')->on('icones')
              ->onDelete('set null')->onUpdate('cascade');
            $table->string('route', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usertypes');
    }
}
