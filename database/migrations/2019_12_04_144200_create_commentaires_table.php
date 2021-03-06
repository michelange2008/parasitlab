<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentaires', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedInteger('demande_id');
            $table->foreign('demande_id')->on('demandes')->references('id')
                      ->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedInteger('labouser_id')->nullable();
            $table->foreign('labouser_id')->on('users')->references('id')
                      ->onDelete('cascade')->onUpdate('cascade');

            $table->mediumText('commentaire')->nullable();

            $table->timestamp('date_commentaire')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaires');
    }
}
