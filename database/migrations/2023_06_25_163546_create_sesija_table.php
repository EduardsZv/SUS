<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSesijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sesija', function (Blueprint $table) {
            $table->id();
            $table->string('lietotajvards', 50);
            $table->string('lietotajsIP', 45);
            $table->datetime('Expires');
            $table->foreign('lietotajvards')->references('Lietotajvards')->on('lietotajs');
        
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
        Schema::dropIfExists('sesija');
    }
}
