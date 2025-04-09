<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Adicionales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adicionales', function (Blueprint $table) {
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
            $table->integer('filtros_adicionales');
            $table->integer('refacciones_basicas');
            $table->integer('filtros_aceite_chiller');
            $table->integer('filtros_secador_chiller');
            $table->integer('andamos_gruas_etc');
            $table->integer('viaticos');
            $table->integer('contratistas');
            $table->integer('pruebas_acidez_basica');
            $table->integer('pruebas_aceite_laboratorio');
            $table->integer('pruebas_refirgerante');
            $table->integer('eddy_current_test');
            $table->integer('limpieza_evaporador_chiller');
            $table->integer('limpieza_condensador_agua');
            $table->integer('cambio_aceite_chillers');
            $table->integer('limpieza_anual_torres_enf');
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
        Schema::dropIfExists('adicionales');
    }
}
