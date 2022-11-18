<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolutionsProjetc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solutions_project', function (Blueprint $table) {
            $table->id();

            $table->integer('num_sol');

            $table->string('unidad_hvac');
            $table->string('tipo_equipo')->nullable();
            $table->string('tipo_diseño')->nullable();
            $table->string('capacidad_tot')->nullable();
            $table->string('unid_med')->nullable();
            $table->string('costo_elec')->nullable();
            $table->string('coolings_hours')->nullable();
            $table->string('eficencia_ene')->nullable();
            $table->float('eficencia_ene_cant',2)->nullable();
            $table->string('tipo_control')->nullable();
            $table->string('dr')->nullable();
            $table->string('mantenimiento')->nullable();
            $table->float('val_aprox',2)->nullable();
            $table->float('cost_op_an',2)->nullable();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_empresa');
            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
            $table->unsignedBigInteger('id_project');
            $table->foreign('id_project')->references('id')->on('projects')->onDelete('cascade');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('solutions_project');
    }
}
