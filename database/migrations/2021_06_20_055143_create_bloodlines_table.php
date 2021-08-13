<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloodlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('national_id');
            $table->string('title');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('bloodlines');
    }
}
