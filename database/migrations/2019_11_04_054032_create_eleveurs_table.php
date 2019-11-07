<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEleveursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleveurs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('ede', 191);
            $table->string('address_1', 191);
            $table->string('address-2', 191)->nullable(true);
            $table->string('cp', 5);
            $table->string('commune', 191);
            $table->string('tel', 10);
            $table->string('indicatif', 2)->default('33');
            $table->integer('veto_id')->unsigned()->default(1);
            $table->foreign('veto_id')->references('id')->on('vetos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleveurs');
    }
}
