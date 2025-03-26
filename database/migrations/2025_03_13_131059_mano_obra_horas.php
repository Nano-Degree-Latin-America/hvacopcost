<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManoObraHoras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mano_obra_horas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_project');
            $table->integer('servicios_emergencias');
            $table->integer('tipo_adicional_accesos');
            $table->integer('curso_seguridad_otros');
            $table->integer('lavado_filtros_aire');
            $table->integer('lavado_evaporadores');
            $table->integer('lavado_extra_condensadores');
            $table->integer('lavado_ventiladores');
            $table->integer('limpieza_grasa');
            $table->integer('seguristas_supervicion');
            $table->integer('costos_filtros_aire');
            $table->integer('paquete_refacciones');
            $table->integer('andamos_gruas_etc');
            $table->integer('pruebas_especiales');
            $table->integer('contratistas');
            $table->integer('viaticos');
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
        Schema::dropIfExists('mano_obra_horas');
    }
}
