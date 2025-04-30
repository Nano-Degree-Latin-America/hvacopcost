<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UnidadesTr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_tr', function (Blueprint $table) {
            $table->id();
            $table->integer('id_unidad');
            $table->double('1_2_9',9,1);
            $table->double('3_7_4',9,1);
            $table->double('7_5_14_9',9,1);
            $table->double('15_24_9',9,1);
            $table->double('25_49_9',9,1);
            $table->double('50_99_9',9,1);
            $table->double('100_199_9',9,1);
            $table->double('200_350',9,1);
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
        Schema::dropIfExists('unidades_tr');
    }
}
