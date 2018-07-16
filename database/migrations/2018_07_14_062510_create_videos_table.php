<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('video_title');
            $table->string('video_image');
            $table->string('video_description');
            $table->string('video_genre');
            $table->foreign('video_genre')->references('id')->on('genre');
            $table->string('video_actor');
            $table->string('video_director')->nullable();
            $table->integer('config_category');
            $table->foreign('config_category')->references('id')->on('config');
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
        Schema::dropIfExists('videos');
    }
}
