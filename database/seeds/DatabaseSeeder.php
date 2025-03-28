<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //$this->call(SistemasSeeder::class);
        //$this->call(categorias_edificios_seeder::class);
        //$this->call(UnidadesSeeder::class);
        //$this->call(DisenoSeeder::class);
        //$this->call(ControlesSeeder::class);
        //$this->call(DrSeeder::class);
        //$this->call(FiltracionSeeder::class);
        //$this->call(VentilacionSeeder::class);
         //$this->call(ConfiguracionesMantenimientoSeeder::class);
         //$this->call(FactorAmbienteSeed::class);
         //$this->call(FactorAccesoSeeder::class);
         //$this->call(FactorEstadoUnidadSeeder::class);
         //$this->call(FactorHorasDiariasSeeder::class);
         //$this->call(FactorGarantiaSeeder::class);
         $this->call(BaseCalculoSeeder::class);


    }
}
