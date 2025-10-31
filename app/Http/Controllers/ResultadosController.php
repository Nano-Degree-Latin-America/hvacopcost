<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Services\ProjectService;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;
use App\UnidadesModel;
use App\DisenoModel;
use App\ControlesModel;
use App\DrModel;
use App\FiltracionModel;
use App\VentilacionModel;
use App\TipoEdificioModel;
use App\TypeProjectModel;
use App\CategoriaEdificioModel;
use App\PaisModel;
use App\CiudadModel;
use Illuminate\Support\Facades\Redirect;
use Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\TypeEdificio;
use App\Exports\CoolingCitiesExport;
use funciones\funciones;
use App\Traits\ResultsTrait;
use App\Traits\GraficsTrait;
class ResultadosController extends Controller
{
    use ResultsTrait,GraficsTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getArrayByTipoMant($tipo_mant, $prot_cond, $dif_cost, $inv_ini, $funciones, $id_projecto, $costobase, $costo, $consumo_ene_anual, $mayor, $inflacion){
        if (intval($dif_cost) === 0 || intval($inv_ini) === 0) {
            return array_fill(0, 4, null);
        }

        if ($tipo_mant === 'marino' && $prot_cond === 'sin_proteccion') {
            return $funciones->roi_ene_prod($id_projecto, $dif_cost, $inv_ini, $costobase, $costo, $consumo_ene_anual, $mayor, $inflacion, 3);
        }
        if ($tipo_mant === 'contaminado' && $prot_cond === 'sin_proteccion') {
            return $funciones->roi_ene_prod($id_projecto, $dif_cost, $inv_ini, $costobase, $costo, $consumo_ene_anual, $mayor, $inflacion, 5);
        }
        if ($tipo_mant === 'marino' && ($prot_cond === 'infiniguard' || $prot_cond === 'liquido_coating_basico')) {
            return $funciones->roi_ene_prod($id_projecto, $dif_cost, $inv_ini, $costobase, $costo, $consumo_ene_anual, $mayor, $inflacion, 10);
        }
        if ($tipo_mant === null && $prot_cond === null) {
            return array_fill(0, 4, null);
        }
        return $funciones->roi_ene_prod($id_projecto, $dif_cost, $inv_ini, $costobase, $costo, $consumo_ene_anual, $mayor, $inflacion, 15);
    }

    /**
     * Encapsula la lógica condicional para roi_only_energy
     */
    private function getArrayOnlyEnergy($tipo_mant, $prot_cond, $consumo_ene_anual, $mayor, $inflacion, $inv_ini, $funciones, $tipo_mant_aux = null, $prot_cond_aux = null)
    {

        if ($tipo_mant === 'marino' && $prot_cond === 'sin_proteccion') {
            return $funciones->roi_only_energy($consumo_ene_anual, $mayor, $inflacion, $inv_ini, 3);
        }
        if ($tipo_mant === 'contaminado' && $prot_cond === 'sin_proteccion') {
            return $funciones->roi_only_energy($consumo_ene_anual, $mayor, $inflacion, $inv_ini, 5);
        }
        if ($tipo_mant === 'marino' && ($prot_cond === 'infiniguard' || $prot_cond === 'liquido_coating_basico')) {
            return $funciones->roi_only_energy($consumo_ene_anual, $mayor, $inflacion, $inv_ini, 10);
        }
        if ($tipo_mant === null && $prot_cond === null) {
            return array_fill(0, 4, null);
        }
        // Para el caso especial del tercer array_c, se compara con tipo_mant_2 y prot_cond_2
        if ($tipo_mant_aux === null && $prot_cond_aux === null) {
            return array_fill(0, 4, null);
        }

        return $funciones->roi_only_energy($consumo_ene_anual, $mayor, $inflacion, $inv_ini, 15);
    }

    public function getResultados(Request $request,ProjectService $projectService)
    {

/*         Excel::download(new CoolingCitiesExport, 'cities_cooling.xlsx'); */
      /*    $file = $request->file('file');
        Excel::import(new TypeEdificio, $file); */

       /*  $array_get = [];
        $cities_cooling = DB::table('ciudad_hrs_mes')->get();
        $cities = DB::table('ciudad')
        ->where('ashrae','!=','')
        ->get();
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
        dd($cities);
        exit(); */
/* dd('guardando'); */
        //terminar tipos

        $mew_project = $projectService->CreateProject($request);

        if($mew_project->type_p == 1){
            return Redirect::to('/project/' . $mew_project->id);

        }

        if($mew_project->type_p == 2){
            return Redirect::to('/resultados_retrofit/' . $mew_project->id);

        }

        if($mew_project->type_p == 3){
            //return Redirect::to('/resultados_retrofit/' . $mew_project->id);
            return Redirect::to('/edit_project/' . $mew_project->id);
        }

    }

    public function edit_project($id){
        $project_edit = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first();

        $id_project = $id;

        if($project_edit->type_p == 1 || $project_edit->type_p == 2){

            $cate_edificio = CategoriaEdificioModel::all();
            $paises = PaisModel::all();
            $id_ciudad_ini = CiudadModel::where('ciudad', $project_edit->ciudad)->first()->idCiudad ?? null;
            $type_p = SolutionsProjectModel::where('id_project', $id)->first()->type_p ?? null;
            $marcas = MarcasEmpresaModel::where('id_empresa', Auth::user()->id_empresa)->get();

            return view('index_edit', compact('id_project', 'project_edit', 'cate_edificio', 'paises', 'id_ciudad_ini', 'type_p', 'marcas'));
        }

        if($project_edit->type_p == 3){
            $cate_edificio = CategoriaEdificioModel::all();
            $paises = PaisModel::all();
            $id_ciudad_ini = CiudadModel::where('ciudad', $project_edit->ciudad)->first()->idCiudad ?? null;
            $type_p = $project_edit->type_p;
            $marcas = MarcasEmpresaModel::where('id_empresa', Auth::user()->id_empresa)->get();

            return view('index_edit', compact('id_project', 'project_edit', 'cate_edificio', 'paises', 'id_ciudad_ini', 'type_p', 'marcas'));
        }


    }

    public function edit_project_copy($id){
        $project_edit = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first();
        $id_project = $id;
        $cate_edificio = CategoriaEdificioModel::all();
        $paises = PaisModel::all();
        $id_ciudad_ini = CiudadModel::where('ciudad', $project_edit->ciudad)->first()->idCiudad ?? null;
        $type_p = SolutionsProjectModel::where('id_project', $id)->first()->type_p ?? null;
        $marcas = MarcasEmpresaModel::where('id_empresa', Auth::user()->id_empresa)->get();

        return view('ene_fin_pro_hvac.edit_copy', compact('id_project', 'project_edit', 'cate_edificio', 'paises', 'id_ciudad_ini', 'type_p', 'marcas'));
    }



    public function project(Request $request,$id_project){


            return view('result_new_imp',['id_project'=>$id_project]);
    }

    public function resultados_retrofit(Request $request,$id_project){

        return view('result_retro_imp',['id_project'=>$id_project]);
    }

    public function roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$dif_2_cost,$inv_ini_3,$costo_b,$consumo_ene_anual_a,$consumo_ene_anual_b,$consumo_ene_anual_c,$counter_val_prod_ene){

        $funciones = new funciones();
        $array_a = [];
        $array_b = [];
        $array_c = [];
        $array_res = [];


        $tipo_mant_1_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 1)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_1_set =  SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 1)
            ->where('num_sol', 1)
            ->first();


        $tipo_mant_2_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 2)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_2_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 2)
            ->where('num_sol', 1)
            ->first();

        $tipo_mant_3_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 3)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_3_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 3)
            ->where('num_sol', 1)
            ->first();


        if($tipo_mant_1_set){
            $tipo_mant_1 = $tipo_mant_1_set->tipo_ambiente;
            $prot_cond_1 = $prot_cond_1_set->proteccion_condensador;
        }else{
            $tipo_mant_1 = null;
            $prot_cond_1 = null;
        }


        if($tipo_mant_2_set){
            $tipo_mant_2 = $tipo_mant_2_set->tipo_ambiente;
            $prot_cond_2 = $prot_cond_2_set->proteccion_condensador;
        }else{
            $tipo_mant_2 = null;
            $prot_cond_2 = null;
        }



        if($tipo_mant_3_set){
            $tipo_mant_3 = $tipo_mant_3_set->tipo_ambiente;
            $prot_cond_3 = $prot_cond_3_set->proteccion_condensador;
        }else{
            $tipo_mant_3 = null;
            $prot_cond_3 = null;
        }


        $mayor = max($consumo_ene_anual_a, $consumo_ene_anual_b, $consumo_ene_anual_c);
        $inflacion = ProjectsModel::where('id','=',$id_projecto)
        ->first()->inflacion;


        if($counter_val_prod_ene == 0){
            $array_a = array_fill(0, 4, null);
            $array_b = $this->getArrayByTipoMant($tipo_mant_2, $prot_cond_2, $dif_cost, $inv_ini, $funciones, $id_projecto, $costobase, $costo_a, $consumo_ene_anual_b, $mayor, $inflacion);
            $array_c = $this->getArrayByTipoMant($tipo_mant_3, $prot_cond_3, $dif_2_cost, $inv_ini_3, $funciones, $id_projecto, $costobase, $costo_b, $consumo_ene_anual_c, $mayor, $inflacion);
        }


        if($counter_val_prod_ene == 1){
            $array_b = array_fill(0, 4, null);
            $array_a = $this->getArrayByTipoMant($tipo_mant_1, $prot_cond_1, $dif_cost, $inv_ini, $funciones, $id_projecto, $costobase, $costo_a, $consumo_ene_anual_a, $mayor, $inflacion);
            $array_c = $this->getArrayByTipoMant($tipo_mant_3, $prot_cond_3, $dif_2_cost, $inv_ini_3, $funciones, $id_projecto, $costobase, $costo_b, $consumo_ene_anual_c, $mayor, $inflacion);
        }


        if($counter_val_prod_ene == 2){
            $array_c = array_fill(0, 4, null);
            $array_a = $this->getArrayByTipoMant($tipo_mant_1, $prot_cond_1, $dif_cost, $inv_ini, $funciones, $id_projecto, $costobase, $costo_a, $consumo_ene_anual_a, $mayor, $inflacion);
            $array_b = $this->getArrayByTipoMant($tipo_mant_2, $prot_cond_2, $dif_2_cost, $inv_ini_3, $funciones, $id_projecto, $costobase, $costo_b, $consumo_ene_anual_b, $mayor, $inflacion);
        }
        /*  */


        array_push($array_res,$array_a,$array_b,$array_c);
        return response()->json($array_res);

    }

    public function roi_only_energy($id_projecto,$consumo_ene_anual_a,$consumo_ene_anual_b,$consumo_ene_anual_c,$inv_ini_1,$inv_ini_2,$inv_ini_3,$counter_val){

        $funciones = new funciones();
        $array_a = [];
        $array_b = [];
        $array_c = [];
        $array_res = [];
        $inflacion = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

          $mayor = max($consumo_ene_anual_a, $consumo_ene_anual_b, $consumo_ene_anual_c);

        $tipo_mant_1_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 1)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_1_set =  SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 1)
            ->where('num_sol', 1)
            ->first();


        $tipo_mant_2_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 2)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_2_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 2)
            ->where('num_sol', 1)
            ->first();

        $tipo_mant_3_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 3)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_3_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 3)
            ->where('num_sol', 1)
            ->first();

        if($tipo_mant_1_set){
            $tipo_mant_1 = $tipo_mant_1_set->tipo_ambiente;
            $prot_cond_1 = $prot_cond_1_set->proteccion_condensador;
        }else{
            $tipo_mant_1 = null;
            $prot_cond_1 = null;
        }


        if($tipo_mant_2_set){
            $tipo_mant_2 = $tipo_mant_2_set->tipo_ambiente;
            $prot_cond_2 = $prot_cond_2_set->proteccion_condensador;
        }else{
            $tipo_mant_2 = null;
            $prot_cond_2 = null;
        }



        if($tipo_mant_3_set){
            $tipo_mant_3 = $tipo_mant_3_set->tipo_ambiente;
            $prot_cond_3 = $prot_cond_3_set->proteccion_condensador;
        }else{
            $tipo_mant_3 = null;
            $prot_cond_3 = null;
        }



        /* if($counter_val == 0){
            $array_a = array_fill(0, 4, null);
        } else {
            $array_a = $this->getArrayOnlyEnergy($tipo_mant_1, $prot_cond_1, $consumo_ene_anual_a, $mayor, $inflacion, $inv_ini_1, $funciones);
        }

        if($counter_val == 1){
            $array_b = array_fill(0, 4, null);
        } else {
            $array_b = $this->getArrayOnlyEnergy($tipo_mant_2, $prot_cond_2, $consumo_ene_anual_b, $mayor, $inflacion, $inv_ini_2, $funciones);
        }


        if($counter_val == 2){
            $array_c = array_fill(0, 4, null);
        } else {
            $array_c = $this->getArrayOnlyEnergy($tipo_mant_3, $prot_cond_3, $consumo_ene_anual_c, $mayor, $inflacion, $inv_ini_3, $funciones, $tipo_mant_2, $prot_cond_2);
        } */
       if($counter_val == 0){
            $array_a = [null,null,null,null];
        }else{
            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
                    $array_a = $funciones->roi_only_energy($consumo_ene_anual_a,$mayor,$inflacion,$inv_ini_1,3);
                }else if($tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
                     $array_a = $funciones->roi_only_energy($consumo_ene_anual_a,$mayor,$inflacion,$inv_ini_1,5);
                }else if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico'){
                     $array_a = $funciones->roi_only_energy($consumo_ene_anual_a,$mayor,$inflacion,$inv_ini_1,10);

                }else if($tipo_mant_1 == null && $prot_cond_1 == null){
                    $array_a = [null,null,null,null];
                }else{
                     $array_a = $funciones->roi_only_energy($consumo_ene_anual_a,$mayor,$inflacion,$inv_ini_1,15);
                }
        }

        if($counter_val == 1){
            $array_b = [null,null,null,null];
        }else{
            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_only_energy($consumo_ene_anual_b,$mayor,$inflacion,$inv_ini_2,3);
                }else if($tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_only_energy($consumo_ene_anual_b,$mayor,$inflacion,$inv_ini_2,5);
                }else if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico'){
                    $array_b = $funciones->roi_only_energy($consumo_ene_anual_b,$mayor,$inflacion,$inv_ini_2,10);
                }else if($tipo_mant_2 == null && $prot_cond_2 == null){
                    $array_b = [null,null,null,null];
                }else{
                    $array_b = $funciones->roi_only_energy($consumo_ene_anual_b,$mayor,$inflacion,$inv_ini_2,15);
                }
        }


        if($counter_val == 2){
            $array_c = [null,null,null,null];
        }else{
            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_only_energy($consumo_ene_anual_c,$mayor,$inflacion,$inv_ini_3,3);
                }else if($tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_only_energy($consumo_ene_anual_c,$mayor,$inflacion,$inv_ini_3,5);
                }else if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico'){

                     $array_c = $funciones->roi_only_energy($consumo_ene_anual_c,$mayor,$inflacion,$inv_ini_3,10);
                }else if($tipo_mant_2 == null && $prot_cond_2 == null){
                    $array_c = [null,null,null,null];
                }else{
                    $array_c = $funciones->roi_only_energy($consumo_ene_anual_c,$mayor,$inflacion,$inv_ini_3,15);
                }

        }



        array_push($array_res,$array_a,$array_b,$array_c);
        return response()->json($array_res);

    }

    public function roi_recu_prod($id_projecto,$costo_base,$costo_a,$costo_b,$inv_ini_1,$inv_ini_2,$inv_ini_3,$consumo_ene_anual_a,$consumo_ene_anual_b,$consumo_ene_anual_c){

        $funciones = new funciones();
        $array_a = [];
        $array_b = [];
        $array_c = [];
        $array_res = [];
        $inflacion = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

          $mayor = max(intval($costo_base), intval($costo_a), intval($costo_b));
          $mayor_roi_only_energy = max($consumo_ene_anual_a, $consumo_ene_anual_b, $consumo_ene_anual_c);

          $array_a = $funciones->roi_recu_prod($id_projecto,$costo_base,$mayor,$mayor_roi_only_energy,$consumo_ene_anual_a,$inflacion,$inv_ini_1);

          $array_b = $funciones->roi_recu_prod($id_projecto,$costo_a,$mayor,$mayor_roi_only_energy,$consumo_ene_anual_b,$inflacion,$inv_ini_2);

          $array_c = $funciones->roi_recu_prod($id_projecto,$costo_b,$mayor,$mayor_roi_only_energy,$consumo_ene_anual_c,$inflacion,$inv_ini_3);

        array_push($array_res,$array_a,$array_b,$array_c);
        return response()->json($array_res);
    }

    public function roi_s_ene($id_projecto,$dif_cost,$inv_ini,$dif_cost_c,$inv_ini_c,$counter_val){
        $funciones = new funciones();
        $array_a = [];
        $array_b = [];
        $array_c = [];
        $array_res = [];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inv_ini = intval($inv_ini);
        $dif_cost_aux = $dif_cost;
        $cost_an_ene = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        //ince_an_ene

        $tipo_mant_1_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 1)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_1_set =  SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 1)
            ->where('num_sol', 1)
            ->first();


        $tipo_mant_2_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 2)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_2_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 2)
            ->where('num_sol', 1)
            ->first();

        $tipo_mant_3_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 3)
            ->where('num_sol', 1)
            ->first();

        $prot_cond_3_set = SolutionsProjectModel::where('id_project', $id_projecto)
            ->where('num_enf', 3)
            ->where('num_sol', 1)
            ->first();

        if($tipo_mant_1_set){
            $tipo_mant_1 = $tipo_mant_1_set->tipo_ambiente;
            $prot_cond_1 = $prot_cond_1_set->proteccion_condensador;
        }else{
            $tipo_mant_1 = null;
            $prot_cond_1 = null;
        }


        if($tipo_mant_2_set){
            $tipo_mant_2 = $tipo_mant_2_set->tipo_ambiente;
            $prot_cond_2 = $prot_cond_2_set->proteccion_condensador;
        }else{
            $tipo_mant_2 = null;
            $prot_cond_2 = null;
        }



        if($tipo_mant_3_set){
            $tipo_mant_3 = $tipo_mant_3_set->tipo_ambiente;
            $prot_cond_3 = $prot_cond_3_set->proteccion_condensador;
        }else{
            $tipo_mant_3 = null;
            $prot_cond_3 = null;
        }

        if( floatval($inflacion_aux) > 0){
            $inflacion =  floatval($inflacion_aux)/100 + 1;
        }else if( floatval($inflacion_aux) <= 0){
            $inflacion = 1;
        }

        if($counter_val == 0){
            $array_a = [0,0,0,0];
        }else{
            if($tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
                $array_a = $funciones->roi($dif_cost,$inflacion,$inv_ini,5);
            }else if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'cobre_cobre'){
                $array_a = $funciones->roi($dif_cost,$inflacion,$inv_ini,10);
            }else{
                $array_a = $funciones->roi($dif_cost,$inflacion,$inv_ini,15);
            }
        }

        if($counter_val == 1){
            $array_b = [0,0,0,0];
        }else{
            if($tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
                $array_b = $funciones->roi($dif_cost,$inflacion,$inv_ini,5);
            }else if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'cobre_cobre'){
                $array_b = $funciones->roi($dif_cost,$inflacion,$inv_ini,10);
            }else{
                $array_b = $funciones->roi($dif_cost,$inflacion,$inv_ini,15);
            }
        }


        if($counter_val == 2){
            $array_c = [0,0,0,0];
        }else{
            if(intval($dif_cost_c) === 0 || intval($inv_ini_c) === 0){
                $array_c = [0,0,0,0];
            }else{

                if($tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi($dif_cost_c,$inflacion,$inv_ini_c,5);
                }else if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'cobre_cobre'){
                    $array_c = $funciones->roi($dif_cost_c,$inflacion,$inv_ini_c,10);
                }else{
                    $array_c = $funciones->roi($dif_cost_c,$inflacion,$inv_ini_c,15);
                }



            }
        }






        array_push($array_res,$array_a,$array_b,$array_c);

        return response()->json($array_res);
     }

     public function check_p_type_pn($id){
        $type_check = DB::table('type_project_empresas')
        ->where('id_empresa','=',$id)
        ->first();
        if($type_check){
            return $type_check->p_n;
        }else{
            return false;
        }
    }

    public function check_p_type_pr($id){
        $type_check = DB::table('type_project_empresas')
        ->where('id_empresa','=',$id)
        ->first();
        if($type_check){
            return $type_check->p_r;
        }else{
            return false;
        }
    }

    public function check_p_type_m($id){
        $type_check = DB::table('type_project_empresas')
        ->where('id_empresa','=',$id)
        ->first();
        if($type_check){
            return $type_check->mant;
        }else{
            return false;
        }
    }

    public function asiga_typos(){
        $projects = DB::table('projects')
        ->get();

        foreach($projects as $project){
            $check_type = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$project->id)
            ->first();

            if($check_type){
                $update_project= ProjectsModel::find($project->id);
                if($check_type->type_p == 0){
                    $update_project->type_p= 1;
                }else{
                    $update_project->type_p= $check_type->type_p;
                }

                $update_project->update();
            }

        }

    }

    public function asigna_empresas_tipo(){
        $empresas = DB::table('empresas')
        ->get();

        foreach($empresas as $empresa){

                $new_permiso = new TypeProjectModel;
                $new_permiso->p_n = 1;
                $new_permiso->p_r = 1;
                $new_permiso->id_empresa = $empresa->id;
                $new_permiso->save();

        }
    }

    public function capacidad($id_project,$solucion){
        $solution = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_project)
        ->first();

        return $solution;
    }

    public function traer_unidades($equipo){
        $unidades = UnidadesModel::where('equipo','=',$equipo)->get();
        return response()->json($unidades);
    }

    public function traer_disenos($referencia){
        $disenos = DisenoModel::where('referencia','=',$referencia)->get();
        return response()->json($disenos);
    }

    public function traer_controles($referencia){
        $controles = ControlesModel::where('referencia','=',$referencia)->get();
        return response()->json($controles);
    }

    public function traer_drs($referencia){
        $drs = DrModel::where('referencia','=',$referencia)->get();
        return response()->json($drs);
    }

    public function traer_ventilaciones($referencia){
        $ventilaciones = VentilacionModel::where('referencia','=',$referencia)->get();
        return response()->json($ventilaciones);

    }

    public function traer_ventilaciones_no_doa($referencia){
        $ventilaciones = VentilacionModel::where('referencia','=',$referencia)
        ->where('ventilacion','=','Sin Ventilación')->get();
        return response()->json($ventilaciones);

    }

    public function traer_filtraciones($referencia){
        $filtraciones = FiltracionModel::where('referencia','=',$referencia)->get();
        return response()->json($filtraciones);
    }

    public function traer_filtraciones_no_doa($referencia){
        $filtraciones = FiltracionModel::where('referencia','=',$referencia)
        ->where('filtracion','=','Sin Filtros')->get();
        return response()->json($filtraciones);

    }

    public function traer_valor_unidad($value){
        $val = UnidadesModel::where('identificador','=',$value)->first()->valor;
        return response()->json($val);
    }

    public function mantenimiento_project($id_project){
        $mantenimiento = DB::table('mantenimiento_projects')
        ->where('mantenimiento_projects.id_project','=',$id_project)
        ->first();

        return $mantenimiento;

    }

    public function mantenimiento_equipos($id_project){
        $mantenimiento_equipos = DB::table('mantenimiento_equipos')
        ->where('mantenimiento_equipos.id_project','=',$id_project)
        ->join('sistemas_hvac','sistemas_hvac.id','=','mantenimiento_equipos.sistema')
        ->join('unidades','unidades.identificador','=','mantenimiento_equipos.unidad')
        ->join('marcas_empresa','marcas_empresa.id','=','mantenimiento_equipos.id_marca')
        ->join('modelos_empresa','modelos_empresa.id','=','mantenimiento_equipos.id_modelo')
        ->join('factor_acceso','factor_acceso.id','=','mantenimiento_equipos.acceso')
        ->join('factor_estado_unidad','factor_estado_unidad.id','=','mantenimiento_equipos.estado_unidad')
        ->select('mantenimiento_equipos.*'
        ,'sistemas_hvac.name as sistema_name'
        ,'unidades.unidad as unidad_name'
        ,'marcas_empresa.marca as marca_name'
        ,'modelos_empresa.modelo as modelo_name'
        ,'factor_acceso.factor as factor_name_acceso'
        ,'factor_estado_unidad.factor as factor_name_estado'
        )
        ->get();

        return $mantenimiento_equipos;

    }

    public function costos_adicionales($id_project){
        $mantenimiento = DB::table('adicionales')
        ->where('adicionales.id_project','=',$id_project)
        ->first();

        return $mantenimiento;

    }

    public function costos_operativos($id_project){
        $costos_operativos = DB::table('analisis_costos_operativos')
        ->where('analisis_costos_operativos.id_project','=',$id_project)
        ->first();

        return $costos_operativos;

    }

    //codigo roi_ene_prod
    /*
    if($counter_val_prod_ene == 0){
            $array_a = [null,null,null,null];
            if(intval($dif_cost) === 0 || intval($inv_ini) === 0){

                $array_b = [null,null,null,null];
            }else{

                if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_b,$mayor,$inflacion,3);
                }else if($tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_b,$mayor,$inflacion,5);
                }else if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico'){
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_b,$mayor,$inflacion,10);
                }else if($tipo_mant_2 == null && $prot_cond_2 == null){
                    $array_b = [null,null,null,null];
                }else{
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_b,$mayor,$inflacion,15);
                }
            }

            if(intval($dif_2_cost) === 0 || intval($inv_ini_3) === 0){

                $array_c = [null,null,null,null];
            }else{


                if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_c,$mayor,$inflacion,3);
                }else if($tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_c,$mayor,$inflacion,5);
                }else if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico'){

                     $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_c,$mayor,$inflacion,10);
                }else if($tipo_mant_2 == null && $prot_cond_2 == null){
                    $array_c = [null,null,null,null];
                }else{
                    $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_c,$mayor,$inflacion,15);
                }


            }
        }


        if($counter_val_prod_ene == 1){
            $array_b = [null,null,null,null];
            if(intval($dif_cost) === 0 || intval($inv_ini) === 0){

                $array_a = [null,null,null,null];
            }else{

                if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_a,$mayor,$inflacion,3);
                }else if($tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_a,$mayor,$inflacion,5);
                }else if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_a,$mayor,$inflacion,10);

                }else if($tipo_mant_1 == null && $prot_cond_1 == null){
                    $array_a = [null,null,null,null];
                }else{
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_a,$mayor,$inflacion,15);
                }
            }

            if(intval($dif_2_cost) === 0 || intval($inv_ini_3) === 0){

                $array_c = [null,null,null,null];
            }else{


                if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_c,$mayor,$inflacion,3);
                }else if($tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_c,$mayor,$inflacion,5);
                }else if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico'){

                     $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_c,$mayor,$inflacion,10);
                }else if($tipo_mant_3 == null && $prot_cond_3 == null){
                    $array_c = [null,null,null,null];
                }else{
                    $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_c,$mayor,$inflacion,15);
                }


            }
        }


        if($counter_val_prod_ene == 2){
            $array_c = [null,null,null,null];
            if(intval($dif_cost) === 0 || intval($inv_ini) === 0){

                $array_a = [null,null,null,null];
            }else{
                if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_a,$mayor,$inflacion,3);
                }else if($tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_a,$mayor,$inflacion,5);
                }else if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_a,$mayor,$inflacion,10);

                }else if($tipo_mant_1 == null && $prot_cond_1 == null){
                    $array_a = [null,null,null,null];
                }else{
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$consumo_ene_anual_a,$mayor,$inflacion,15);
                }
            }

            if(intval($dif_2_cost) === 0 || intval($inv_ini_3) === 0){

                $array_b = [null,null,null,null];
            }else{


                if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_b,$mayor,$inflacion,3);
                }else if($tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_b,$mayor,$inflacion,5);
                }else if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico'){
                     $array_b = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_b,$mayor,$inflacion,10);
                }else if($tipo_mant_2 == null && $prot_cond_2 == null){
                    $array_b = [null,null,null,null];
                }else{
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,$consumo_ene_anual_b,$mayor,$inflacion,15);
                }


            }
        }
    */

    /* logic roi_only_energy

    if($counter_val == 0){
            $array_a = [null,null,null,null];
        }else{
            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
                    $array_a = $funciones->roi_only_energy($consumo_ene_anual_a,$mayor,$inflacion,$inv_ini_1,3);
                }else if($tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
                     $array_a = $funciones->roi_only_energy($consumo_ene_anual_a,$mayor,$inflacion,$inv_ini_1,5);
                }else if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico'){
                     $array_a = $funciones->roi_only_energy($consumo_ene_anual_a,$mayor,$inflacion,$inv_ini_1,10);

                }else if($tipo_mant_1 == null && $prot_cond_1 == null){
                    $array_a = [null,null,null,null];
                }else{
                     $array_a = $funciones->roi_only_energy($consumo_ene_anual_a,$mayor,$inflacion,$inv_ini_1,15);
                }
        }

        if($counter_val == 1){
            $array_b = [null,null,null,null];
        }else{
            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_only_energy($consumo_ene_anual_b,$mayor,$inflacion,$inv_ini_2,3);
                }else if($tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_only_energy($consumo_ene_anual_b,$mayor,$inflacion,$inv_ini_2,5);
                }else if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico'){
                    $array_b = $funciones->roi_only_energy($consumo_ene_anual_b,$mayor,$inflacion,$inv_ini_2,10);
                }else if($tipo_mant_2 == null && $prot_cond_2 == null){
                    $array_b = [null,null,null,null];
                }else{
                    $array_b = $funciones->roi_only_energy($consumo_ene_anual_b,$mayor,$inflacion,$inv_ini_2,15);
                }
        }


        if($counter_val == 2){
            $array_c = [null,null,null,null];
        }else{
            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_only_energy($consumo_ene_anual_c,$mayor,$inflacion,$inv_ini_3,3);
                }else if($tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_only_energy($consumo_ene_anual_c,$mayor,$inflacion,$inv_ini_3,5);
                }else if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico'){

                     $array_c = $funciones->roi_only_energy($consumo_ene_anual_c,$mayor,$inflacion,$inv_ini_3,10);
                }else if($tipo_mant_2 == null && $prot_cond_2 == null){
                    $array_c = [null,null,null,null];
                }else{
                    $array_c = $funciones->roi_only_energy($consumo_ene_anual_c,$mayor,$inflacion,$inv_ini_3,15);
                }

        }
    */

}
