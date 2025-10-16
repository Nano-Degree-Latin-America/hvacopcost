<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UnidadesModel;
use App\SistemasModel;
use App\UnidadesTrModel;
use App\UnidadesCfmModel;
use App\UnidadesUnidadModel;


class OperacionesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        // Lógica para obtener los resultados de las operaciones
        return view('operaciones.operaciones_index');
    }

    public function traer_sistemas_calculo_coordinacion($id){
        $sistema = SistemasModel::where('id',$id)->first()->name;
        return response()->json($sistema);
    }

    public function set_periodo($id_sistema,$unidad){
         $sistema_name = SistemasModel::where('id',$id_sistema)->first()->name;
         $id_unidad = UnidadesModel::where('identificador',$unidad)->first()->id;

         if($sistema_name == 'Ventilación' ){
             $periodo = UnidadesCfmModel::where('id_unidad','=',$id_unidad)->first()->periodo;
                return $periodo;
         }

         if($sistema_name != 'Ventilación' && $sistema_name != 'Accesorios'){
             $periodo = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->periodo;
             return $periodo;
         }

         if($sistema_name == 'Accesorios'){
             $periodo = UnidadesUnidadModel::where('id_unidad','=',$id_unidad)->first()->periodo;
             return $periodo;
         }

    }

    public function periodo($capacidad_termica_mantenimiento,$unidad){
        $id_unidad = UnidadesModel::where('identificador','=',$unidad)->first()->id;
        $unidad = 'TR';

        switch ($unidad) {
            case 'TR':
                $periodo = UnidadesTrModel::where('id_unidad','=',$id_unidad)->first()->periodo;
                return $periodo;

            break;

            case 'CFM':
                 $periodo = UnidadesCfmModel::where('id_unidad','=',$id_unidad)->first()->periodo;
                return $periodo;
            break;

            case 'Unidad':
                 $periodo = UnidadesUnidadModel::where('id_unidad','=',$id_unidad)->first()->periodo;
                return $periodo;
            break;

            default:
                # code...
            break;
        }

        return $horas;
     }
}
