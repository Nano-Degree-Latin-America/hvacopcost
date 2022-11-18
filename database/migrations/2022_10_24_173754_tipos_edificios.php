<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TiposEdificios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_edificio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('1a')->nullable();
            $table->integer('2a')->nullable();
            $table->integer('2b')->nullable();
            $table->integer('3a')->nullable();
            $table->integer('3b')->nullable();
            $table->integer('3b_coast')->nullable();
            $table->integer('3c')->nullable();
            $table->integer('energy_star')->nullable();
            $table->integer('status');
            $table->unsignedBigInteger('id_categoria');
            /* $table->foreign('id_categoria')->references('id')->on('categorias_edificios')->onDelete('cascade'); */
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
        Schema::dropIfExists('tipo_edificio');
    }
}
