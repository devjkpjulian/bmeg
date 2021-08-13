<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationalVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('national_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('national_id');
            $table->string('title');
            $table->text('video')->nullable();
            $table->boolean('category')->default(false);
            $table->timestamps();
            $table->foreign('national_id')->references('id')->on('nationals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('national_videos');
    }
}
