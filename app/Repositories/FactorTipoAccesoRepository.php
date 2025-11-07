<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\FactorAccesoModel;

class FactorTipoAccesoRepository
{
    public function getFactorTipoAcceso(string $factor){
        $factor_valor = FactorAccesoModel::where('factor','=',$factor)->first()->valor;
         return $factor_valor;
    }

}
