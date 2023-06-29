<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDarbinieksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('darbinieks', function (Blueprint $table) {
            $table->id();
            $table->string('Vards', 50)->nullable(false);
            $table->string('Uzvards', 50)->nullable(false);
            $table->string('Darbs', 50)->nullable(false);
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
        Schema::dropIfExists('darbinieks');
    }
}
