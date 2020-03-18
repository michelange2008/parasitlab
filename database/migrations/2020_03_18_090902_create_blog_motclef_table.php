<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogMotclefTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_motclef', function (Blueprint $table) {

            $table->unsignedInteger('blog_id')->index();
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');

            $table->unsignedInteger('motclef_id')->index();
            $table->foreign('motclef_id')->references('id')->on('motclefs')->onDelete('cascade');

            // $table->primary(['blog_id', 'motclef_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_motclef');
    }
}
