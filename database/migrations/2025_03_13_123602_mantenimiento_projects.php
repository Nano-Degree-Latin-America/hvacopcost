<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MantenimientoProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimiento_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('id_project');
            $table->string('cliente_prospecto');
            $table->string('nombre_propiedad');
            $table->integer('distancia_sitio');
            $table->integer('velocidad');
            $table->integer('yrs_edificio');
            $table->string('ocupacion_semanal');
            $table->integer('medio_ambiente');
            $table->string('personal_enviado');
            $table->integer('cant_hrs_eme');
            $table->integer('type_mant');
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
        Schema::dropIfExists('mantenimiento_projects');
    }
}
