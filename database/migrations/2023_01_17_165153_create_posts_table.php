<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('user_id');
        $table->string('title');
        $table->text('content');
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        $table->enum('status',['publish','unpublish']);
        $table->dateTime('date_to_publish');
        $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
