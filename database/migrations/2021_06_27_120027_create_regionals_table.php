<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('location_id');
            $table->string('name');
            $table->string('farm')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('fb')->nullable();
            $table->string('ig')->nullable();
            $table->string('website')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('regional_locations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regionals');
    }
}
