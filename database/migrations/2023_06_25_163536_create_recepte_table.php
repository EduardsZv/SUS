<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepte', function (Blueprint $table) {
            $table->id();
            $table->string('Zales', 50);
            $table->string('Daudzums', 50);
            $table->date('LietotNo');
            $table->date('LietotLidz')->nullable();
            $table->string('Biezums', 50);
            $table->char('PacientsID', 12);
            $table->unsignedBigInteger('ArstsID');
        
            $table->foreign('PacientsID')->references('PersonasKods')->on('pacients');
            $table->foreign('ArstsID')->references('ID')->on('arsts');
        
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
        Schema::dropIfExists('recepte');
    }
}
