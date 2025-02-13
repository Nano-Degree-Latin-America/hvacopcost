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
            ['text' => "Chiller Scroll - Aire"],
            ['text' => "Chiller Scroll - Agua"],
            ['text' => "Chiller Tornillo - Aire"],
            ['text' => "Chiller Tornillo - Agua"],
            ['text' => "Extractor"],
            ['text' => "Inyector"],
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
