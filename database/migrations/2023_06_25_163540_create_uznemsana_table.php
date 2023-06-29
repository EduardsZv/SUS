<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUznemsanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uznemsana', function (Blueprint $table) {
            $table->id();
            $table->char('PacientsID', 12);
            $table->unsignedBigInteger('ArstsID');
            $table->integer('PalatasNr');
            $table->integer('GultasNr');
            $table->date('Uznemts');
            $table->date('Izrakstijies')->nullable();
            $table->string('Diagnoze', 200);
        
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
        Schema::dropIfExists('uznemsana');
    }
}
