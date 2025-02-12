<?php

use Illuminate\Database\Seeder;
use App\FactorEstadoUnidad;
class FactorEstadoUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_factor = new FactorEstadoUnidad;
        $new_factor->factor = 'Bueno';
        $new_factor->valor = 1;
        $new_factor->save();

        $new_factor = new FactorEstadoUnidad;
        $new_factor->factor = 'Deficiente';
        $new_factor->valor = 1.08;
        $new_factor->save();

        $new_factor = new FactorEstadoUnidad;
        $new_factor->factor = 'Malo';
        $new_factor->valor = 1.15;
        $new_factor->save();
    }
}
