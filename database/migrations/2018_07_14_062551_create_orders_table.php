<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_ordered');
            $table->foreign('video_ordered')->references('id')->on('video');
            $table->integer('ordered_by');
            $table->foreign('ordered_by')->references('id')->on('users');
            $table->string('contact');
            $table->string('address');
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
        Schema::dropIfExists('orders');
    }
}
