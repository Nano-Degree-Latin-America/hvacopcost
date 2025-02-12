<?php

use Illuminate\Database\Seeder;
use App\FactorAccesoModel;
class FactorAccesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_factor = new FactorAccesoModel;
        $new_factor->factor = 'Fácil';
        $new_factor->valor = 0.97;
        $new_factor->save();

        $new_factor = new FactorAccesoModel;
        $new_factor->factor = 'Medio';
        $new_factor->valor = 1.02;
        $new_factor->save();

        $new_factor = new FactorAccesoModel;
        $new_factor->factor = 'Dificil';
        $new_factor->valor = 1.12;
        $new_factor->save();
    }
}
