<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHaspsTable extends Migration
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
            $table->char('areacode', 3)->unique();
            $table->char('number', 7)->unique();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('person')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('areacode')->references('areacode')->on('phoneno')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('number')->references('number')->on('phoneno')->onDelete('cascade')->onUpdate('cascade');
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
