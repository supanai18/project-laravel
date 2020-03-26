<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('post_image');
            $table->string('post_title');
            $table->string('post_intro');
            $table->string('post_creator');
            $table->string('post_address');
            $table->string('post_status');
            $table->integer('post_rate');
            $table->longText('post_description');
            $table->string('post_start');
            $table->string('post_end');
            $table->integer('post_view');
            $table->integer('post_like');
            $table->integer('post_unlike');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
