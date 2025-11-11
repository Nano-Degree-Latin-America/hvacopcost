<?php
namespace App\Repositories;

use App\FactorEstadoUnidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class FactorEstadoUnidadRepository
{

    public function factorEstadoUnidad(string $factor){

        if($factor == null){
            $factor_ambiente = 0;
        }else{
            $factor_ambiente = FactorEstadoUnidad::where('factor','=',$factor)->first()->valor;
        }
         return $factor_ambiente;
    }
}

