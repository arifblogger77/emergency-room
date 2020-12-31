<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasedocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('casedoc', function (Blueprint $table) {
            $table->id('pid');
            $table->unsignedBigInteger('did')->unique();
            $table->unsignedBigInteger('shiftid')->unique();

            $table->foreign('pid')->references('pid')->on('patient')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('did')->references('did')->on('dons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shiftid')->references('shiftid')->on('dons')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('casedoc');
    }
}
