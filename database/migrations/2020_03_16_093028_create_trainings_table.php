<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('post_id');
            $table->string('training_name');
            $table->string('training_lastname');
            $table->string('training_email');
            $table->string('training_tel');
            $table->string('training_career');
            $table->string('training_religion');
            $table->string('training_status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
