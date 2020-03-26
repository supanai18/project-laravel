<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('news_image');
            $table->string('news_title');
            $table->string('news_intro');
            $table->longText('news_description');
            $table->string('news_creator');
            $table->integer('news_view');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('news');
    }
}
