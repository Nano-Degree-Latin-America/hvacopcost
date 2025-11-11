<?php
namespace App\Repositories;


use App\FactorAmbienteModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class FactorAmbienteRepository
{

    public function factor_ambiente(){
        $factor_ambiente = FactorAmbienteModel::all();
         return $factor_ambiente;
    }

    public function getFactorAmbiente($id){
        if($id == null){
            $factor_valor = 0;
        }else{
            $factor_valor = FactorAmbienteModel::where('id','=',$id)->first()->valor;
        }
        return $factor_valor;
    }
}
