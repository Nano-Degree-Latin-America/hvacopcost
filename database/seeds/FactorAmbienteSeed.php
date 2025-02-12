<?php

use Illuminate\Database\Seeder;
use App\FactorAmbienteModel;
class FactorAmbienteSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_factor = new FactorAmbienteModel;
        $new_factor->factor = 'Estándar';
        $new_factor->valor = 1;
        $new_factor->save();

        $new_factor = new FactorAmbienteModel;
        $new_factor->factor = 'Marino';
        $new_factor->valor = 1.18;
        $new_factor->save();

        $new_factor = new FactorAmbienteModel;
        $new_factor->factor = 'Contaminado';
        $new_factor->valor = 1.11;
        $new_factor->save();
    }
}
