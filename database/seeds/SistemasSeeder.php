<?php

use Illuminate\Database\Seeder;
use App\SistemasModel;
class SistemasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $sistemas = [
            ['text' => "Paquetes (RTU)"],
            ['text' => "Split DX"],
            ['text' => "VRF No Ductados"],
            ['text' => "VRF Ductados"],
            ['text' => "PTAC/VTAC"],
            ['text' => "WSHP"],
            ['text' => "Minisplit Inverter"],
            ['text' => "Unidades Presición"],
            ['text' => "Chiller Scroll"],
            ['text' => "Chiller de Tornillo"],
            ['text' => "Chiller Turbocor"],
            ['text' => "Equipamiento Agua Fría"],
            ['text' => "Torres de Enfriamiento"],
            ['text' => "Ventilación"],
            ['text' => "Accesorios"],
        ];

        /* for ($i=0; $i < count($array_sistemas) ; $i++) {
            SistemasSeeder::create([
                'name' => $sistema[$i]['text'],
            ]);
        } */

                foreach ($sistemas as $sistema){
                    SistemasModel::create([
                        'name' => $sistema['text'],
                    ]);
            }
    }
}
