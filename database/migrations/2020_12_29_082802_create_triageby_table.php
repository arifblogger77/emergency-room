<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriagebyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triageby', function (Blueprint $table) {
            $table->unsignedBigInteger('pid')->unique();
            $table->unsignedBigInteger('did');
            $table->timestamps();

            $table->foreign('pid')->references('pid')->on('patient')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('did')->references('did')->on('doctor')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('triageby');
    }
}
