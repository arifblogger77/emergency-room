<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasp', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->integer('phoneno_id')->unique()->nullable();

            $table->foreign('id')->references('id')->on('person')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('phoneno_id')->references('id')->on('phoneno')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasp');
    }
}
