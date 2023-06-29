<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLietotajsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lietotajs', function (Blueprint $table) {
            $table->string('Lietotajvards', 50)->nullable(false)->primary();
            $table->string('Parole', 50)->nullable(false);
            $table->unsignedBigInteger('DarbinieksID')->nullable(false);
            $table->foreign('DarbinieksID')->references('ID')->on('darbinieks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lietotajs');
    }
}
