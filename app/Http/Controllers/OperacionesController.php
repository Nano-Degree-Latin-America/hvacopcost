<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProjectsModel;
use App\CoordinacionProjectModel;
use App\UnidadesModel;
use App\SistemasModel;
use App\UnidadesTrModel;
use App\UnidadesCfmModel;
use App\UnidadesUnidadModel;
use App\ConfiguracionesMantenimientoModel;
use App\CategoriaEdificioModel;
use App\FactorAmbienteModel;
use App\EquipoCoordinacionModel;
use App\CoordinacionMantenimientoModel;
use Illuminate\Support\Facades\Auth;
use App\Services\CoordinacionService;
use Illuminate\Support\Facades\Redirect;

class OperacionesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function save_project_coordinacion(Request $request,CoordinacionService $coordinacionService){
        $new_project_coordinacion = $coordinacionService->CreateProjectCoordinacion($request);
        return $new_project_coordinacion->id;
    }

    public function save_equipo_coordinacion($id_project,CoordinacionService $coordinacionService){
        $new_equipo_coordinacion = $coordinacionService->CreateEquipoCoordinacion($id_project);
        return $new_equipo_coordinacion;
    }

    public function save_dates_coordinacion_equipos($id,$value,$campo,CoordinacionService $coordinacionService){
        $save_dates_coordinacion_equipo = $coordinacionService->UpdateEquipoCoordinacion($id,$value,$campo);
        return $save_dates_coordinacion_equipo;
    }

    public function set_value_visita($value,$visita,$id_calculo,CoordinacionService $coordinacionService){
        $set_value_visita = $coordinacionService->setValueVisita($value,$visita,$id_calculo);
        return $set_value_visita;
    }

    public function save_periodo_coordinacion($value,$id_calculo,CoordinacionService $coordinacionService){
        $set_periodo_coordinacion = $coordinacionService->setPeriodoCoordinacion($value,$id_calculo);
        return $set_periodo_coordinacion;
    }

    public function inputs_coordinacion_to_cero($id_calculo,$visita,CoordinacionService $coordinacionService){
        $inputs_coordinacion_to_cero = $coordinacionService->inputsCoordinacionToCero($id_calculo,$visita);
        return $inputs_coordinacion_to_cero;
    }



    public function equipos_coordinacion($id_project){
        $coordinacionEquipos = EquipoCoordinacionModel::where('id_project','=',$id_project)->get();
         return response()->json($coordinacionEquipos);
    }

    public function manage_units_coordinacion($id,$value,CoordinacionService $coordinacionService){
        $coordinacionEquipos_aux = EquipoCoordinacionModel::where('id','=',$id)->first();
        $sistema = $this->traer_sistemas_calculo_coordinacion($coordinacionEquipos_aux->id_sistema);

        if($coordinacionEquipos_aux->mantenimiento == 'ashrae'){
             $periodo = $this->set_periodo($coordinacionEquipos_aux->id_sistema,$coordinacionEquipos_aux->unidad);
        }else{
            $periodo = null;
        }

        $units = $coordinacionService->ManageEquipoCoordinacionCalculo($id,$value,$periodo,$sistema,$coordinacionEquipos_aux->id_project);
        return response()->json($units);
    }

    public function get_ids_units_calculo_coordinacion($id_project,CoordinacionService $coordinacionService){
        $ids_values = $coordinacionService->get_ids_values($id_project);
        return response()->json($ids_values);
    }

    public function project_coordinacion($id_project){
            $project_edit = ProjectsModel::where('id',$id_project)->first();
            $id_cat_edifico = ProjectsModel::where('id',$id_project)->first()->id_cat_edifico;
            $cate_edificio = CategoriaEdificioModel::all();
            $project_edit_coordinacion = CoordinacionProjectModel::where('id_project',$id_project)->first();
            $factor_ambiente = FactorAmbienteModel::all();
            return view('operaciones.operaciones_index_edit',compact('id_project','cate_edificio','id_cat_edifico','project_edit','project_edit_coordinacion','factor_ambiente'));
    }

    public function index(Request $request)
    {
        // Lógica para obtener los resultados de las operaciones
        return view('operaciones.operaciones_index');
    }

    public function traer_sistemas_calculo_coordinacion($id){
        $sistema = SistemasModel::where('id',$id)->first()->name;
        return $sistema;
    }

    public function get_vals_form_coordinacion($id_project){
        $coordinacion_project = ProjectsModel::where('id_project',$id_project)
        ->join('coordinacion_projects','projects.id','=','coordinacion_projects.id_project')
        ->select('projects.id_cat_edifico','coordinacion_projects.*')
        ->first();
        return response()->json($coordinacion_project);
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

     public function traer_tecnico_ayudante($value){
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
