<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adm', function (Blueprint $table) {
            $table->unsignedBigInteger('pid')->unique();
            $table->unsignedBigInteger('rid');
            $table->unsignedBigInteger('shiftid');
            $table->timestamp('admission');

            $table->foreign('pid')->references('pid')->on('patient')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rid')->references('rid')->on('rons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shiftid')->references('shiftid')->on('rons')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adm');
    }
}
