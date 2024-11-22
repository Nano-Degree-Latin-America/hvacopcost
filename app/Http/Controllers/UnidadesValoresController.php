<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use DB;
use App\UnidadesModel;
use App\DisenoModel;
use App\ControlesModel;
use App\DrModel;
use App\FiltracionModel;
use App\VentilacionModel;
use funciones\funciones;
use Illuminate\Http\Request;

class UnidadesValoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $unidades = UnidadesModel::get();
        $disenos = DisenoModel::get();
        $drs = DrModel::get();
        $ventilaciones = VentilacionModel::get();
        $filtraciones = FiltracionModel::get();
        $controles = ControlesModel::get();
        return view('unidades_valores.index',['unidades'=>$unidades,'disenos'=>$disenos,'drs'=>$drs,'ventilaciones'=>$ventilaciones,'filtraciones'=>$filtraciones,'controles'=>$controles]);
    }

    public function change_valor_reg($tipo,$id,$txt_val,$identi){
        switch ($tipo) {
            case 'unidades':
                $unidad_update =  UnidadesValoresController::update_val_unidades($tipo,$id,$txt_val,$identi);
                return $unidad_update;
            break;


            case 'diseños':
                $diseno_update =  UnidadesValoresController::update_val_diseno($tipo,$id,$txt_val,$identi);
                return $diseno_update;
            break;

            case 'drs':
                $dr_update =  UnidadesValoresController::update_val_dr($tipo,$id,$txt_val,$identi);
                return $dr_update;
            break;

            case 'ventilaciones':
                $vent_update =  UnidadesValoresController::update_val_vent($tipo,$id,$txt_val,$identi);
                return $vent_update;
            break;

            case 'filtraciones':
                $filt_update =  UnidadesValoresController::update_val_filt($tipo,$id,$txt_val,$identi);
                return $filt_update;
            break;

            case 'controles':
                $contr_update =  UnidadesValoresController::update_val_contr($tipo,$id,$txt_val,$identi);
                return $contr_update;
            break;

            default:
                # code...
            break;
        }
    }

    public function update_val_unidades($tipo,$id,$txt_val,$identi){

       $unidad_update =  UnidadesModel::find($id);
       $unidad_update->valor = floatval($txt_val);
       $unidad_update->update();

        return $unidad_update;

    }

    public function update_val_diseno($tipo,$id,$txt_val,$identi){

        $diseno_update = DisenoModel::find($id);
        $diseno_update->valor = floatval($txt_val);
        $diseno_update->update();

         return $diseno_update;

     }

     public function update_val_dr($tipo,$id,$txt_val,$identi){

        $dr_update = DrModelnoModel::find($id);
        $dr_update->valor = floatval($txt_val);
        $dr_update->update();

         return $dr_update;

     }

     public function update_val_vent($tipo,$id,$txt_val,$identi){

        $vent_update = VentilacionModel::find($id);
        $vent_update->valor = floatval($txt_val);
        $vent_update->update();

         return $vent_update;

     }

     public function update_val_filt($tipo,$id,$txt_val,$identi){

        $filt_update = FiltracionModel::find($id);
        $filt_update->valor = floatval($txt_val);
        $filt_update->update();

         return $filt_update;

     }

     public function update_val_contr($tipo,$id,$txt_val,$identi){

        $contr_update = ControlesModel::find($id);
        $contr_update->valor = floatval($txt_val);
        $contr_update->update();

         return $contr_update;

     }
}
