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
            $table->char('province', 2)->unique();
            $table->char('city', 10)->unique();
            $table->char('street', 10)->unique();
            $table->char('streetno', 6)->unique();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('person')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('province')->references('province')->on('address')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('city')->references('city')->on('address')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('street')->references('street')->on('address')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('streetno')->references('streetno')->on('address')->onDelete('cascade')->onUpdate('cascade');
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
