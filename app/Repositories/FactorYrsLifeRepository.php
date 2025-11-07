<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class FactorYrsLifeRepository
{
    public function getFactorYrsLifeCoordinacion(int $yrs){
        //1/((1-0.012)^$yrs)
        //pow($uno_m_zeta,floatval($solution->yrs_vida));
        //((1-0.012)
        $operacion = 1-0.012;
        $potencia = pow($operacion,$yrs);
        $factor_valor = 1/$potencia;
         return $factor_valor;
    }

}
