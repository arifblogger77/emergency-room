<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hase', function (Blueprint $table) {
            $table->id('id');
            $table->string('eaddress', 50)->unique();

            $table->foreign('id')->references('id')->on('person')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('eaddress')->references('eaddress')->on('email')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hase');
    }
}
