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
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('num', 191);
            $table->string('address_1', 191);
            $table->string('address_2', 191)->nullable(true);
            $table->string('cp', 5);
            $table->string('commune', 191);
            $table->string('pays', 191)->default('France');
            $table->string('indicatif', 3)->default('33');
            $table->string('tel', 10);

            $table->integer('veto_id')->unsigned()->nullable();
            $table->foreign('veto_id')->references('id')->on('vetos')->onDelete('set null');

            $table->timestamps();
            $table->softDeletes();
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
