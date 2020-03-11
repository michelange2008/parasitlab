<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnapacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anapacks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('abbreviation', 50);
            $table->string("nom",191);
            $table->text("description");
            $table->longtext("detail");
            $table->boolean('serie');
            $table->unsignedInteger('icone_id')->default('1')->nullable();
            $table->foreign('icone_id')->references('id')->on('icones')->onDelete('set null');
            $table->boolean('veto');
            $table->boolean('visible')->default(true);
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
        Schema::dropIfExists('anapacks');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
