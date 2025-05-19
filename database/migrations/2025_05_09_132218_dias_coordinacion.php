<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiasCoordinacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dias_coordinacion', function (Blueprint $table) {
            $table->id();
            $table->integer('id_project');
            $table->integer('id_coordinacion');
            $table->double('visita_1',1);
            $table->double('visita_2',1);
            $table->double('visita_3',1);
            $table->double('visita_4',1);
            $table->double('visita_5',1);
            $table->double('visita_6',1);
            $table->double('visita_7',1);
            $table->double('visita_8',1);
            $table->double('visita_9',1);
            $table->double('visita_10',1);
            $table->double('visita_11',1);
            $table->double('visita_12',1);
            $table->double('total_horas',1);
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
        Schema::dropIfExists('dias_coordinacion');
    }
}
