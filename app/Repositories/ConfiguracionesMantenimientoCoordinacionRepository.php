<?php
namespace App\Repositories;

use App\ConfiguracionesMantenimientoModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class ConfiguracionesMantenimientoCoordinacionRepository
{

    public function find_tecnico_ayudante(string $value){
        switch ($value) {
            case 'tecnico_ayudante':
                $set_valor = ConfiguracionesMantenimientoModel::where('slug','=','mo-tecnico-y-ayudante')
                ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
                return $set_valor;
            break;

            case 'tecnico':
                $set_valor = ConfiguracionesMantenimientoModel::where('slug','=','mano-obra-tecnico')
                ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
                return $set_valor;
            break;

            default:
                # code...
                break;
        }
    }

    public function traer_kms(){
            $set_valor = ConfiguracionesMantenimientoModel::where('slug','=','valor-vehiculo')
            ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
            return $set_valor;
    }

    public function traer_burden(){
            $set_valor = ConfiguracionesMantenimientoModel::where('slug','=','valor-burden')
            ->where('id_empresa','=',Auth::user()->id_empresa)->first()->valor;
            return $set_valor;
    }
}
