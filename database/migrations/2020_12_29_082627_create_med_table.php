<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med', function (Blueprint $table) {
            $table->id('px');
            $table->unsignedBigInteger('pid')->unique();
            $table->unsignedBigInteger('did');
            $table->char('med', 30);
            $table->integer('dosage');
            $table->date('medfrom');
            $table->date('medto');
            $table->integer('howoften');

            $table->foreign('pid')->references('pid')->on('patient')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('did')->references('did')->on('doctor')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('med')->references('name')->on('medication')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('med');
    }
}
