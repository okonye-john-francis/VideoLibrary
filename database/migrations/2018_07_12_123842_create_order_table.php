<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id');
            $table->integer('video_ordered');
            $table->foreign('video_ordered')->references('video_id')->on('video');
            $table->integer('ordered_by');
            $table->foreign('ordered_by')->references('id')->on('users');
            $table->integer('quantity');
            $table->decimal('price');
            $table->string('remarks')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('order');
    }
}
