<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video', function (Blueprint $table) {
            $table->increments('video_id');
            $table->string('video_title');
            $table->string('video_image');
            $table->string('video_description');
            $table->string('video_category');
            $table->string('video_actor');
            $table->string('video_director')->nullable();
            $table->integer('config_category');
            $table->foreign('config_category')->references('config_id')->on('config');
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
        Schema::dropIfExists('video');
    }
}
