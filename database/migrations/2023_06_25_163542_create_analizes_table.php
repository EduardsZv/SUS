<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analizes', function (Blueprint $table) {
            $table->char('PacientsID', 12);
            $table->unsignedBigInteger('DarbinieksID');
            $table->float('Urea', 3, 1);
            $table->float('Kreatinins', 2, 1);
            $table->float('Natrijs', 4, 1);
            $table->float('Kalijs', 2, 1);
            $table->float('Kalcijs', 2, 1);
            $table->float('Fosfors', 3, 1);
            $table->float('Hemoglobins', 3, 1);
        
            $table->foreign('PacientsID')->references('PersonasKods')->on('pacients');
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
        Schema::dropIfExists('analizes');
    }
}
