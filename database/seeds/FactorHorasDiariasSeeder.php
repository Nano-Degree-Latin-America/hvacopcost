<?php

use Illuminate\Database\Seeder;
use App\FactorHorasDiariasModel;

class FactorHorasDiariasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_factor = new FactorHorasDiariasModel;
        $new_factor->factor = 'menos de 50';
        $new_factor->valor = 0.95;
        $new_factor->save();

        $new_factor = new FactorHorasDiariasModel;
        $new_factor->factor = '51 a 167';
        $new_factor->valor = 1;
        $new_factor->save();

        $new_factor = new FactorHorasDiariasModel;
        $new_factor->factor = '168';
        $new_factor->valor = 1.08;
        $new_factor->save();
    }
}
