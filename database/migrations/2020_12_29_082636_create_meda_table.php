<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meda', function (Blueprint $table) {
            $table->unsignedBigInteger('px');
            $table->unsignedBigInteger('nid');
            $table->unsignedBigInteger('shiftid');

            $table->foreign('px')->references('px')->on('med')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nid')->references('nid')->on('nons')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('meda');
    }
}
