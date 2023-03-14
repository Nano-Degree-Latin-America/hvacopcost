<?php

namespace App\Exports;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoolingCitiesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $array_get = [];
        $cities_cooling = DB::table('ciudad_hrs_mes')->get();
        $cities = DB::table('ciudad')->get();
        $suma_hrs = 0;
        foreach($cities as $city){
            foreach( $cities_cooling as $citie){
                if ($city->idCiudad == $citie->idCiudad) {
                    $suma_hrs = $suma_hrs + $citie->cooling;
                }
            }
            array_push( $array_get,'Ciudad:'.$city->ciudad.' - Hrs: '.$suma_hrs);
            $suma_hrs = 0;
        }
        dd($array_get);
        return collect($array_get);;
    }
}
