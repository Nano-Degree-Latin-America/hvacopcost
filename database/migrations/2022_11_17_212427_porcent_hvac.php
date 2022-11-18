<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PorcentHvac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('porcent_hvac', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_cat_edi')->nullable();
            $table->integer('porcent_1')->nullable();
            $table->integer('porcent_2')->nullable();
            $table->integer('porcent_3')->nullable();
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
        Schema::dropIfExists('porcent_hvac');
    }
}
