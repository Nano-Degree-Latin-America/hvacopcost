<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoordinacionEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinacion_equipos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_project');
            $table->integer('id_sistema')->nullable();
            $table->string('unidad')->nullable();
            $table->integer('id_marca')->nullable();
            $table->integer('id_modelo')->nullable();
            $table->integer('capacidad')->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('acceso_equipo')->nullable();
            $table->string('estado')->nullable();
            $table->integer('yrs_life')->nullable();
            $table->string('horario')->nullable();
            $table->integer('cantidad_total')->nullable();
            $table->string('mantenimiento')->nullable();
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
         Schema::dropIfExists('coordinacion_equipos');
    }
}
