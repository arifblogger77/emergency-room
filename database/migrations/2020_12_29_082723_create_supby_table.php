<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupbyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supby', function (Blueprint $table) {
            $table->string('bedno', 3);
            $table->unsignedBigInteger('nid');
            $table->unsignedBigInteger('shiftid');

            $table->foreign('bedno')->references('number')->on('bed')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nid')->references('nid')->on('nons')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shiftid')->references('shiftid')->on('nons')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supby');
    }
}
