<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beda', function (Blueprint $table) {
            $table->id('pid');
            $table->string('bedno', 3);
            $table->timestamp('from');
            $table->timestamp('to');

            $table->foreign('pid')->references('pid')->on('patient')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('bedno')->references('number')->on('bed')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beda');
    }
}
