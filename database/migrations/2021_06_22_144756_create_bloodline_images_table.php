<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodlineImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloodline_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('national_id');
            $table->unsignedBigInteger('bloodline_id');
            $table->text('image')->nullable();
            $table->timestamps();
            $table->foreign('national_id')->references('id')->on('nationals');
            $table->foreign('bloodline_id')->references('id')->on('bloodlines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bloodline_images');
    }
}
