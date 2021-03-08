<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labos', function (Blueprint $table) {
          $table->increments('id');

          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

          $table->string('signature', 50)->default('signature.jpg');

          $table->string('photo')->default('default.jpg');

          $table->string('fonction', 191)->default('travailleur');

          $table->boolean('est_signataire')->default(false);

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
        Schema::dropIfExists('labos');
    }
}
