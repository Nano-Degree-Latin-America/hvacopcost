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
            $table->integer('yrs_life');
            $table->integer('capacidad');
            $table->string('capacidad_unidad');
            $table->string('hrs_diarias');
            $table->integer('acceso');
            $table->integer('estado_unidad');
            $table->integer('cambio_filtros');
            $table->double('costo_cambio_filtros',11,2);
            $table->integer('cambios_anuales');
            $table->integer('cantidad');
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
