<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVetosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->rememberToken();

            $table->string('num')->nullable();
            $table->string('address_1', 191);
            $table->string('address_2', 191)->nullable(true);
            $table->string('cp', 5);
            $table->string('commune', 191);
            $table->string('pays', 191)->default('France');
            $table->string('indicatif', 3)->default('33');
            $table->string('tel', 10);
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
        Schema::dropIfExists('vetos');
    }
}
