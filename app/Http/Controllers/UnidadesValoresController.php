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

    public function change_valor_reg(Request $request,$tipo,$id){


        switch ($tipo) {
            case 'unidades':
                $unidad_update =  UnidadesValoresController::update_val_unidades($request,$tipo,$id);
                return $unidad_update;
            break;


            case 'diseños':
                $diseno_update =  UnidadesValoresController::update_val_diseno($request,$tipo,$id);
                return $diseno_update;
            break;

            case 'drs':
                $dr_update =  UnidadesValoresController::update_val_dr($request,$tipo,$id);
                return $dr_update;
            break;

            case 'ventilaciones':
                $vent_update =  UnidadesValoresController::update_val_vent($request,$tipo,$id);
                return $vent_update;
            break;

            case 'filtraciones':
                $filt_update =  UnidadesValoresController::update_val_filt($request,$tipo,$id);
                return $filt_update;
            break;

            case 'controles':
                $contr_update =  UnidadesValoresController::update_val_contr($request,$tipo,$id);
                return $contr_update;
            break;

            default:
                # code...
            break;
        }
    }

    public function update_val_unidades($request,$tipo,$id){

       $unidad_update =  UnidadesModel::find($id);
       $unidad_update->valor = floatval($request->get('valor_'.$id));
       $unidad_update->update();

        return $unidad_update;

    }

    public function update_val_diseno($request,$tipo,$id){

        $get_disenos = DisenoModel::where('id_unidad','=',$id)
        ->get();

        foreach($get_disenos  as $diseno){
            $diseno_update = DisenoModel::find($diseno->id);
            $diseno_update->valor = floatval($request->get('valor_'.$diseno->id));
            $diseno_update->update();
        }

         return $get_disenos;

     }

     public function update_val_dr($request,$tipo,$id){

        $get_drs = DrModel::where('id_unidad','=',$id)
        ->get();

        foreach($get_drs  as $dr){
        $dr_update = DrModel::find($dr->id);
        $dr_update->valor = floatval($request->get('valor_'.$dr->id));
        $dr_update->update();
        }
        //dd($get_drs);
        return $get_drs;

     }

     public function update_val_vent($request,$tipo,$id){

        $get_vent = VentilacionModel::where('id_unidad','=',$id)
        ->get();

        foreach($get_vent  as $vent){
        $vent_update = VentilacionModel::find($vent->id);
        $vent_update->valor = floatval($request->get('valor_'.$vent->id));
        $vent_update->update();
        }
         return $get_vent;

     }

     public function update_val_filt($request,$tipo,$id){

        $get_filt = FiltracionModel::where('id_unidad','=',$id)
        ->get();

        foreach($get_filt  as $filt){
            $filt_update = FiltracionModel::find($filt->id);
            $filt_update->valor = floatval($request->get('valor_'.$filt->id));
            $filt_update->update();
        }
         return $filt_update;

     }

     public function update_val_contr($request,$tipo,$id){

        $get_control = ControlesModel::where('id_unidad','=',$id)
        ->get();

        foreach($get_control  as $control){
            $contr_update = ControlesModel::find($control->id);
            $contr_update->valor = floatval($request->get('valor_'.$control->id));
            $contr_update->update();
        }
         return $contr_update;

     }

     public function set_array_modal_valores($id,$identi){
        switch ($identi) {
            case 'unidades':
                $unidad= UnidadesModel::where('id','=',$id)
                ->get();
                return $unidad;
            break;


            case 'diseños':
                $diseno = DisenoModel::where('id_unidad','=',$id)
                ->get();
                return $diseno;
            break;

            case 'drs':
                $dr = DrModel::where('id_unidad','=',$id)
                ->get();
                return $dr;
            break;

            case 'ventilaciones':
                $vent = VentilacionModel::where('id_unidad','=',$id)
                ->get();
                return $vent;
            break;

            case 'filtraciones':
                $filtraciones = FiltracionModel::where('id_unidad','=',$id)
                ->get();
                return $filtraciones;
            break;

            case 'controles':
                $controles = ControlesModel::where('id_unidad','=',$id)
                ->get();
                return $controles;
            break;

            default:
                # code...
            break;
        }
     }
}
