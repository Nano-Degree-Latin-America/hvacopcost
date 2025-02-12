<?php

use Illuminate\Database\Seeder;
use App\FactorGarantiaModel;

class FactorGarantiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_factor = new FactorGarantiaModel;
        $new_factor->factor = 'Sin Garantía';
        $new_factor->valor = 1;
        $new_factor->save();

        $new_factor = new FactorGarantiaModel;
        $new_factor->factor = '3%';
        $new_factor->valor = 1.03;
        $new_factor->save();

        $new_factor = new FactorGarantiaModel;
        $new_factor->factor = '5%';
        $new_factor->valor = 1.05;
        $new_factor->save();
    }
}
