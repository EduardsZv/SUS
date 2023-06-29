<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArstsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arsts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('DarbinieksID')->nullable(false);
            $table->boolean('IrGalvenais')->default(false);
            $table->timestamps();
            $table->foreign('DarbinieksID')->references('ID')->on('darbinieks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arsts');
    }
}
