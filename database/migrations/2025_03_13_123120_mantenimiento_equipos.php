<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MantenimientoEquipos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_equipos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_project');
            $table->integer('sistema');
            $table->integer('id_unidad');
            $table->integer('id_marca');
            $table->integer('id_modelo');
            $table->integer('capacidad');
            $table->integer('cantidad');
            $table->integer('yrs_life');
            $table->string('acceso');
            $table->integer('id_empresa');
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
        Schema::dropIfExists('mantenimiento_equipos');
    }
}
