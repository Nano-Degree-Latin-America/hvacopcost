<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CoordinacionProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinacion_projects', function (Blueprint $table) {
            $table->id();
            $table->integer('id_project');
            $table->string('cliente_prospecto');
            $table->string('nombre_propiedad');
            $table->integer('distancia_sitio');
            $table->integer('velocidad');
            $table->integer('yrs_edificio');
            $table->string('ocupacion_semanal');
            $table->integer('medio_ambiente');
            $table->string('personal');
            $table->integer('escalacion');
            $table->integer('valor_contrato');
            $table->double('tiempo_ingreso',11,2);
            $table->double('tiempo_egreso',11,2);
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
        Schema::dropIfExists('coordinacion_projects');
    }
}
