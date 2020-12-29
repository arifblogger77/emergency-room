<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rons', function (Blueprint $table) {
            $table->unsignedBigInteger('rid')->unique();
            $table->unsignedBigInteger('shiftid')->unique();
            $table->timestamps();

            $table->foreign('rid')->references('rid')->on('receptionist')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shiftid')->references('shiftid')->on('shift')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rons');
    }
}
