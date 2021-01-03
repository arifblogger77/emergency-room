<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasa', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->integer('address_id');

            $table->foreign('id')->references('id')->on('person')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasa');
    }
}
