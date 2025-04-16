<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnalisisCostosOperativos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_costos_operativos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_project');
            $table->integer('consumo_anual_edificio');
            $table->double('eui',9,1);
            $table->string('estandar_ashrae');
            $table->string('filtros_merv_7');
            $table->string('remplazo_filtros');
            $table->string('mantenimiento_proactivo');
            $table->integer('consumo_anual_edificio_futura');
            $table->integer('reduccion_energetica');
            $table->integer('costo_reparaciones');
            $table->integer('reduccion_reparaciones');
            $table->string('costo_mantenimiento');
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
        Schema::dropIfExists('analisis_costos_operativos');
    }
}
