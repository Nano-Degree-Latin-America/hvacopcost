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
use App\TipoEdificioModel;
use App\TypeProjectModel;
use Illuminate\Support\Facades\Redirect;
use Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\TypeEdificio;
use App\Exports\CoolingCitiesExport;
use funciones\funciones;
class ResultadosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
       /*
       Mantenimiento por si se usa  de nuevo
       if($type_p == 3){

            $enfriamiento1_retro = intval($request->get('cUnidad_1_1_retro'));
            $enfriamiento2_retro = intval($request->get('cUnidad_2_1_retro'));
            $enfriamiento3_retro =intval($request->get('cUnidad_3_1_retro'));
            $sol_1_1_retro = intval($request->get('cUnidad_1_1_retro'));

            $mew_project->save();

            if ($enfriamiento1_retro !== 0) {
                $sol_1_1_retro = intval($request->get('cUnidad_1_1_retro'));

                if ($sol_1_1_retro !== 0) {

                    $solution_enf1=new SolutionsProjectModel;
                    $solution_enf1->type_p=$type_p;
                    $solution_enf1->num_sol=1;
                    $solution_enf1->num_enf	=1;
                    $solution_enf1->unidad_hvac=$request->get('cUnidad_1_1_retro');
                    $solution_enf1->tipo_equipo	=$request->get('csTipo_1_1_retro');
                    $solution_enf1->id_marca=$request->get('marca_1_1_retro');
                    $solution_enf1->id_modelo=$request->get('modelo_1_1_retro');
                    $solution_enf1->id_modelo=$request->get('modelo_1_1_retro');
                    $solution_enf1->yrs_vida=$request->get('yrs_vida_1_1_retro');
                    $solution_enf1->eficencia_ene=$request->get('csStd_1_1_retro');
                    $solution_enf1->eficencia_ene_cant=$request->get('csStd_retro_1_1_cant');
                    $solution_enf1->name_disenio=$request->get('name_diseno_1_1_retro');
                    $solution_enf1->tipo_diseño= $request->get('csDisenio_1_1_retro');
                    $cap_tot_aux1_1_retro = ResultadosController::num_form($request->get('capacidad_total_1_1_retro'));
                    $solution_enf1->capacidad_tot=floatval($cap_tot_aux1_1_retro);
                    $solution_enf1->unid_med=$request->get('unidad_capacidad_tot_1_1_retro');
    //separa cadena
                    $costo_elec_aux = ResultadosController::price_form($request->get('costo_elec_1_1_retro'));
                    $solution_enf1->costo_elec=floatval($costo_elec_aux);
     //separa cadena
                    $cooling_hours_aux = ResultadosController::num_form($request->get('hrsEnfriado_1_1_retro'));
                    $solution_enf1->coolings_hours=intval($cooling_hours_aux);

                    $solution_enf1->tipo_control=$request->get('tipo_control_1_1_retro');


                    $solution_enf1->name_t_control=$request->get('name_t_control_1_1_retro');
                    $solution_enf1->dr_name=$request->get('dr_name_1_1_retro');

                    $solution_enf1->dr = $request->get('dr_1_1_retro');
                    $solution_enf1->mantenimiento = $request->get('csMantenimiento_1_1_retro');

                    if($request->get('costo_recu_1_1_retro') != null){
                        $val_aprox_aux = ResultadosController::price_form($request->get('costo_recu_1_1_retro'));
                    }else  if($request->get('costo_recu_1_1_retro') == null){
                        $val_aprox_aux = 0;
                    }

                    if($request->get('maintenance_cost_1_1_retro') != null){
                        $aux_cost_mant = ResultadosController::price_form($request->get('maintenance_cost_1_1_retro'));
                    }else  if($request->get('maintenance_cost_1_1_retro') == null){
                        $aux_cost_mant = 0;

                    }

                    if($request->get('const_an_rep_1_1') != null){
                        $aux__cost_an_rep_1_1 = ResultadosController::price_form($request->get('const_an_rep_1_1'));
                    }else  if($request->get('const_an_rep_1_1') == null){
                        $aux__cost_an_rep_1_1 = 0;

                    }

                    $solution_enf1->val_aprox=floatval($val_aprox_aux);
                    $solution_enf1->costo_mantenimiento=floatval($aux_cost_mant);
                    $solution_enf1->cost_an_re=floatval($aux__cost_an_rep_1_1);
                    $solution_enf1->status=1;
                    $solution_enf1->id_empresa=Auth::user()->id_empresa;
                    $solution_enf1->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf1->coolings_hours;
                    $cost_energ =  $solution_enf1->costo_elec;
                    $eficiencia_cant = floatval($request->get('csStd_retro_1_1_cant'));
                    $factor_s = $request->get('lblCsTipo_1_1_retro');
                    $factor_d = floatval($request->get('csDisenio_1_1_retro'));
                    $factor_c = $request->get('tipo_control_1_1_retro');
                    $factor_t =floatval($request->get('dr_1_1_retro'));
                    $factor_m =$request->get('csMantenimiento_1_1_retro');
                    $t_e = $solution_enf1->tipo_equipo;
                    $eficiencia_ene = $solution_enf1->eficencia_ene;
                    $yrs_l = $solution_enf1->yrs_vida;
                    $unidad_hvac_aux = $solution_enf1->unidad_hvac;
                   if ($solution_enf1->unid_med == 'TR') {

                    $tr = $solution_enf1->capacidad_tot;
                    $res_1_1_retro = ResultadosController::cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux);
                    $solution_enf1->cost_op_an =  floatval(number_format($res_1_1_retro,2, '.', ''));


                }else if($solution_enf1->unid_med == 'KW'){
                    $kw = $solution_enf1->capacidad_tot;
                    $res_1_1_retro = ResultadosController::cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux);
                    $solution_enf1->cost_op_an =  floatval(number_format($res_1_1_retro,2, '.', ''));

                    //$solution_enf1->cost_op_an = floatval(number_format($res_div_seer_a,2, '.', ''));

                }

      //niveles de confort
      $unidad_conf_1_1 = $solution_enf1->unidad_hvac;
      $equipo_conf_1_1 = $solution_enf1->tipo_equipo;
      $diseno_conf_1_1 = $solution_enf1->name_disenio;
      $t_control_conf_1_1 = $solution_enf1->name_t_control;
      $dr_conf_1_1 = $solution_enf1->dr_name;
      $mant_conf_1_1 = $solution_enf1->mantenimiento;

      $nivel_confotr_1_1_retro = ResultadosController::calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
      $solution_enf1->confort = $nivel_confotr_1_1_retro;


                    $solution_enf1->id_project = $mew_project->id;
                    $solution_enf1->save();
                    //2/1 mant
                    $solution_enf1=new SolutionsProjectModel;
                    $solution_enf1->type_p=$type_p;
                    $solution_enf1->num_sol=1;
                    $solution_enf1->num_enf=2;
                    $solution_enf1->unidad_hvac=$request->get('cUnidad_1_1_retro');
                    $solution_enf1->tipo_equipo	=$request->get('csTipo_1_1_retro');
                    $solution_enf1->id_marca=$request->get('marca_1_1_retro');
                    $solution_enf1->id_modelo=$request->get('modelo_1_1_retro');
                    $solution_enf1->id_modelo=$request->get('modelo_1_1_retro');
                    $solution_enf1->yrs_vida=$request->get('yrs_vida_1_1_retro');
                    $solution_enf1->eficencia_ene=$request->get('csStd_1_1_retro');
                    $solution_enf1->eficencia_ene_cant=$request->get('csStd_retro_1_1_cant');
                    $solution_enf1->name_disenio=$request->get('name_diseno_1_1_retro');
                    $solution_enf1->tipo_diseño= $request->get('csDisenio_1_1_retro');
                    $cap_tot_aux1_1_retro = ResultadosController::num_form($request->get('capacidad_total_1_1_retro'));
                    $solution_enf1->capacidad_tot=floatval($cap_tot_aux1_1_retro);
                    $solution_enf1->unid_med=$request->get('unidad_capacidad_tot_1_1_retro');
    //separa cadena
                    $costo_elec_aux = ResultadosController::price_form($request->get('costo_elec_1_1_retro'));
                    $solution_enf1->costo_elec=floatval($costo_elec_aux);
     //separa cadena
                    $cooling_hours_aux = ResultadosController::num_form($request->get('hrsEnfriado_1_1_retro'));
                    $solution_enf1->coolings_hours=intval($cooling_hours_aux);

                    $solution_enf1->tipo_control=$request->get('tipo_control_1_1_retro');


                    $solution_enf1->name_t_control=$request->get('name_t_control_1_1_retro');
                    $solution_enf1->dr_name=$request->get('dr_name_1_1_retro');

                    $solution_enf1->dr = $request->get('dr_1_1_retro');
                    $solution_enf1->mantenimiento = $request->get('csMantenimiento_2_1_retro');

                    if($request->get('costo_recu_1_1_retro') != null){
                        $val_aprox_aux = ResultadosController::price_form($request->get('costo_recu_1_1_retro'));
                    }else  if($request->get('costo_recu_1_1_retro') == null){
                        $val_aprox_aux = 0;
                    }

                    if($request->get('maintenance_cost_2_1_retro') != null){
                        $aux_cost_mant = ResultadosController::price_form($request->get('maintenance_cost_2_1_retro'));
                    }else  if($request->get('maintenance_cost_1_1_retro') == null){
                        $aux_cost_mant = 0;

                    }

                    if($request->get('const_an_rep_2_1') != null){
                        $aux__cost_an_rep_1_1 = ResultadosController::price_form($request->get('const_an_rep_2_1'));
                    }else  if($request->get('const_an_rep_2_1') == null){
                        $aux__cost_an_rep_1_1 = 0;

                    }

                    $solution_enf1->val_aprox=floatval($val_aprox_aux);
                    $solution_enf1->costo_mantenimiento=floatval($aux_cost_mant);
                    $solution_enf1->cost_an_re=floatval($aux__cost_an_rep_1_1);
                    $solution_enf1->status=1;
                    $solution_enf1->id_empresa=Auth::user()->id_empresa;
                    $solution_enf1->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf1->coolings_hours;
                    $cost_energ =  $solution_enf1->costo_elec;
                    $eficiencia_cant = floatval($request->get('csStd_retro_1_1_cant'));
                    $factor_s = $request->get('lblCsTipo_1_1_retro');
                    $factor_d = floatval($request->get('csDisenio_1_1_retro'));
                    $factor_c = $request->get('tipo_control_1_1_retro');
                    $factor_t =floatval($request->get('dr_1_1_retro'));
                    $factor_m =$request->get('csMantenimiento_1_1_retro');
                    $t_e = $solution_enf1->tipo_equipo;
                    $eficiencia_ene = $solution_enf1->eficencia_ene;
                    $yrs_l = $solution_enf1->yrs_vida;
                    $unidad_hvac_aux = $solution_enf1->unidad_hvac;
                   if ($solution_enf1->unid_med == 'TR') {

                    $tr = $solution_enf1->capacidad_tot;
                    $res_1_1_retro = ResultadosController::cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux);
                    $solution_enf1->cost_op_an =  floatval(number_format($res_1_1_retro,2, '.', ''));


                }else if($solution_enf1->unid_med == 'KW'){
                    $kw = $solution_enf1->capacidad_tot;
                    $res_1_1_retro = ResultadosController::cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux);
                    $solution_enf1->cost_op_an =  floatval(number_format($res_1_1_retro,2, '.', ''));

                    //$solution_enf1->cost_op_an = floatval(number_format($res_div_seer_a,2, '.', ''));

                }

      //niveles de confort
      $unidad_conf_1_1 = $solution_enf1->unidad_hvac;
      $equipo_conf_1_1 = $solution_enf1->tipo_equipo;
      $diseno_conf_1_1 = $solution_enf1->name_disenio;
      $t_control_conf_1_1 = $solution_enf1->name_t_control;
      $dr_conf_1_1 = $solution_enf1->dr_name;
      $mant_conf_1_1 = $solution_enf1->mantenimiento;

      $nivel_confotr_1_1_retro = ResultadosController::calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
      $solution_enf1->confort = $nivel_confotr_1_1_retro;


                    $solution_enf1->id_project = $mew_project->id;
                    $solution_enf1->save();

                    //2/1 mant
                    $solution_enf1=new SolutionsProjectModel;
                    $solution_enf1->type_p=$type_p;
                    $solution_enf1->num_sol=1;
                    $solution_enf1->num_enf=3;
                    $solution_enf1->unidad_hvac=$request->get('cUnidad_1_1_retro');
                    $solution_enf1->tipo_equipo	=$request->get('csTipo_1_1_retro');
                    $solution_enf1->id_marca=$request->get('marca_1_1_retro');
                    $solution_enf1->id_modelo=$request->get('modelo_1_1_retro');
                    $solution_enf1->id_modelo=$request->get('modelo_1_1_retro');
                    $solution_enf1->yrs_vida=$request->get('yrs_vida_1_1_retro');
                    $solution_enf1->eficencia_ene=$request->get('csStd_1_1_retro');
                    $solution_enf1->eficencia_ene_cant=$request->get('csStd_retro_1_1_cant');
                    $solution_enf1->name_disenio=$request->get('name_diseno_1_1_retro');
                    $solution_enf1->tipo_diseño= $request->get('csDisenio_1_1_retro');
                    $cap_tot_aux1_1_retro = ResultadosController::num_form($request->get('capacidad_total_1_1_retro'));
                    $solution_enf1->capacidad_tot=floatval($cap_tot_aux1_1_retro);
                    $solution_enf1->unid_med=$request->get('unidad_capacidad_tot_1_1_retro');
    //separa cadena
                    $costo_elec_aux = ResultadosController::price_form($request->get('costo_elec_1_1_retro'));
                    $solution_enf1->costo_elec=floatval($costo_elec_aux);
     //separa cadena
                    $cooling_hours_aux = ResultadosController::num_form($request->get('hrsEnfriado_1_1_retro'));
                    $solution_enf1->coolings_hours=intval($cooling_hours_aux);

                    $solution_enf1->tipo_control=$request->get('tipo_control_1_1_retro');


                    $solution_enf1->name_t_control=$request->get('name_t_control_1_1_retro');
                    $solution_enf1->dr_name=$request->get('dr_name_1_1_retro');

                    $solution_enf1->dr = $request->get('dr_1_1_retro');
                    $solution_enf1->mantenimiento = $request->get('cheMantenimiento_3_1_retro');

                    if($request->get('costo_recu_1_1_retro') != null){
                        $val_aprox_aux = ResultadosController::price_form($request->get('costo_recu_1_1_retro'));
                    }else  if($request->get('costo_recu_1_1_retro') == null){
                        $val_aprox_aux = 0;
                    }

                    if($request->get('maintenance_cost_3_1_retro') != null){
                        $aux_cost_mant = ResultadosController::price_form($request->get('maintenance_cost_3_1_retro'));
                    }else  if($request->get('maintenance_cost_3_1_retro') == null){
                        $aux_cost_mant = 0;

                    }

                    if($request->get('const_an_rep_3_1') != null){
                        $aux__cost_an_rep_1_1 = ResultadosController::price_form($request->get('const_an_rep_3_1'));
                    }else  if($request->get('const_an_rep_3_1') == null){
                        $aux__cost_an_rep_1_1 = 0;

                    }

                    $solution_enf1->val_aprox=floatval($val_aprox_aux);
                    $solution_enf1->costo_mantenimiento=floatval($aux_cost_mant);
                    $solution_enf1->cost_an_re=floatval($aux__cost_an_rep_1_1);
                    $solution_enf1->status=1;
                    $solution_enf1->id_empresa=Auth::user()->id_empresa;
                    $solution_enf1->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf1->coolings_hours;
                    $cost_energ =  $solution_enf1->costo_elec;
                    $eficiencia_cant = floatval($request->get('csStd_retro_1_1_cant'));
                    $factor_s = $request->get('lblCsTipo_1_1_retro');
                    $factor_d = floatval($request->get('csDisenio_1_1_retro'));
                    $factor_c = $request->get('tipo_control_1_1_retro');
                    $factor_t =floatval($request->get('dr_1_1_retro'));
                    $factor_m =$request->get('csMantenimiento_1_1_retro');
                    $t_e = $solution_enf1->tipo_equipo;
                    $eficiencia_ene = $solution_enf1->eficencia_ene;
                    $yrs_l = $solution_enf1->yrs_vida;
                    $unidad_hvac_aux = $solution_enf1->unidad_hvac;
                   if ($solution_enf1->unid_med == 'TR') {

                    $tr = $solution_enf1->capacidad_tot;
                    $res_1_1_retro = ResultadosController::cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux);
                    $solution_enf1->cost_op_an =  floatval(number_format($res_1_1_retro,2, '.', ''));


                }else if($solution_enf1->unid_med == 'KW'){
                    $kw = $solution_enf1->capacidad_tot;
                    $res_1_1_retro = ResultadosController::cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux);
                    $solution_enf1->cost_op_an =  floatval(number_format($res_1_1_retro,2, '.', ''));

                    //$solution_enf1->cost_op_an = floatval(number_format($res_div_seer_a,2, '.', ''));

                }

      //niveles de confort
      $unidad_conf_1_1 = $solution_enf1->unidad_hvac;
      $equipo_conf_1_1 = $solution_enf1->tipo_equipo;
      $diseno_conf_1_1 = $solution_enf1->name_disenio;
      $t_control_conf_1_1 = $solution_enf1->name_t_control;
      $dr_conf_1_1 = $solution_enf1->dr_name;
      $mant_conf_1_1 = $solution_enf1->mantenimiento;

      $nivel_confotr_1_1_retro = ResultadosController::calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
      $solution_enf1->confort = $nivel_confotr_1_1_retro;


                    $solution_enf1->id_project = $mew_project->id;
                    $solution_enf1->save();

                }

                if($mew_project->save()){
                    $res_sum = 0;
                    $cants = DB::table('solutions_project')
                    ->where('id_project','=',$mew_project->id)

                    ->get();

                    foreach($cants as $cant){
                        $res_sum = $res_sum + $cant->cost_op_an;
                    }

                   $new_result = new ResultsProjectModel;
                   $new_result->num_enf = 1;
                   $new_result->cost_op_an = $res_sum;
                   $new_result->id_project = $mew_project->id;
                   $new_result->id_empresa=Auth::user()->id_empresa;
                   $new_result->id_user=Auth::user()->id;
                   $new_result->save();
                }

                if($mew_project->save()){
                    $res_sum = 0;
                    $cants = DB::table('solutions_project')
                    ->where('id_project','=',$mew_project->id)

                    ->get();

                    foreach($cants as $cant){
                        $res_sum = $res_sum + $cant->cost_op_an;
                    }

                   $new_result = new ResultsProjectModel;
                   $new_result->num_enf = 2;
                   $new_result->cost_op_an = $res_sum;
                   $new_result->id_project = $mew_project->id;
                   $new_result->id_empresa=Auth::user()->id_empresa;
                   $new_result->id_user=Auth::user()->id;
                   $new_result->save();
                }

                if($mew_project->save()){
                    $res_sum = 0;
                    $cants = DB::table('solutions_project')
                    ->where('id_project','=',$mew_project->id)

                    ->get();

                    foreach($cants as $cant){
                        $res_sum = $res_sum + $cant->cost_op_an;
                    }

                   $new_result = new ResultsProjectModel;
                   $new_result->num_enf = 3;
                   $new_result->cost_op_an = $res_sum;
                   $new_result->id_project = $mew_project->id;
                   $new_result->id_empresa=Auth::user()->id_empresa;
                   $new_result->id_user=Auth::user()->id;
                   $new_result->save();
                }

            }

            $solutions =DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$mew_project->id)
            ->get();

            if($mew_project->save()){
                $id_project = $mew_project->id;

                return Redirect::to('/resultados_retrofit/' . $id_project);

             }

        } */
    }





    public function edit_project($id){
        $project_edit = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first();

        $cate_edificio = DB::table('categorias_edificios')->get();

        $paises = DB::table('pais')->get();

        $id_ciudad_ini = DB::table('ciudad')
        ->where('ciudad','=',$project_edit->ciudad)
        ->first()->idCiudad;

        $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->first()->type_p;

        $marcas = DB::table('marcas_empresa')
        ->where('id_empresa','=',Auth::user()->id_empresa)
        ->get();


        return view('edit_index',['id_project'=>$id,'project_edit'=>$project_edit,
                        'cate_edificio'=>$cate_edificio,'paises'=>$paises,'id_ciudad_ini'=>$id_ciudad_ini,
                         'type_p'=> $type_p,'marcas'=>$marcas
        ]);
    }

    public function edit_project_copy($id){
        $project_edit = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first();

        $cate_edificio = DB::table('categorias_edificios')->get();

        $paises = DB::table('pais')->get();

        $id_ciudad_ini = DB::table('ciudad')
        ->where('ciudad','=',$project_edit->ciudad)
        ->first()->idCiudad;

        $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->first()->type_p;

        $marcas = DB::table('marcas_empresa')
        ->where('id_empresa','=',Auth::user()->id_empresa)
        ->get();


        return view('edit_copy',['id_project'=>$id,'project_edit'=>$project_edit,
                        'cate_edificio'=>$cate_edificio,'paises'=>$paises,'id_ciudad_ini'=>$id_ciudad_ini,
                         'type_p'=> $type_p,'marcas'=>$marcas
        ]);
    }

    public function solutions($id){

        $check_project_t = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->first();

        if($check_project_t->type_p == 0 || $check_project_t->type_p == 1){
            $solutions = DB::table('solutions_project')
            ->join('marcas_empresa','marcas_empresa.id','=','solutions_project.id_marca')
            ->join('modelos_empresa','modelos_empresa.id','=','solutions_project.id_modelo')
            ->where('solutions_project.id_project','=',$id)
            ->select('solutions_project.*','marcas_empresa.marca','modelos_empresa.modelo')
            ->get();
        }

        if($check_project_t->type_p == 2 || $check_project_t->type_p == 3){
            $solutions = DB::table('solutions_project')
            ->join('marcas_empresa','marcas_empresa.id','=','solutions_project.id_marca')
            ->join('modelos_empresa','modelos_empresa.id','=','solutions_project.id_modelo')
            ->where('solutions_project.id_project','=',$id)
            ->select('solutions_project.*','marcas_empresa.marca','modelos_empresa.modelo')
            ->get();
        }



        return $solutions;
    }

    //no se guardaron las soluciones a y b tipo mantenimiento, checar!! project_id 187

    public function solutions_retrofit($id){
        $solutions = DB::table('solutions_project')
        ->join('marcas_empresa','marcas_empresa.id','=','solutions_project.id_marca')
        ->join('modelos_empresa','modelos_empresa.id','=','solutions_project.id_modelo')
        ->where('marcas_empresa.id_empresa','=',Auth::user()->id_empresa)
        ->where('solutions_project.id_project','=',$id)
        ->select('solutions_project.*','marcas_empresa.marca','modelos_empresa.modelo')
        ->get();

        return $solutions;
    }

    public function tar_elec($id){
        $tar_ele = DB::table('projects')
        ->join('solutions_project','solutions_project.id_project','=','projects.id')
        ->join('categorias_edificios','categorias_edificios.id','=','projects.id_cat_edifico')
        ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
        ->where('projects.id','=',$id)
        ->select('projects.*','solutions_project.coolings_hours','solutions_project.costo_elec','categorias_edificios.name as cad_edi','tipo_edificio.name as tipo_edi')
        ->first();

        return $tar_ele;
    }

    public function results($id){
        $solutions = DB::table('results_project')
        ->where('results_project.id_project','=',$id)
        ->get();

        return $solutions;
    }

    public function sumaopex($id,$num_enf){
        $solutions = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->select('solutions_project.cost_op_an')
        ->get();


        $sumaopex = 0;

        foreach($solutions as $sol){
            $sumaopex = $sumaopex + $sol->cost_op_an;
        }

        return $sumaopex;
    }

    public function consumo_anual_opex($consumo,$porecent,$const_elec){
        // ((sumaopex*100%/porcent)
         $primer = $consumo * $const_elec;
         $porcent_1 = $porecent / 100;
         $res = $primer / $porcent_1;

        return intval($res);
     }

    public function sumacap_term($id,$num_enf){
        $solutions = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->select('solutions_project.capacidad_tot')
        ->get();

        $sumacap_term = 0;

        foreach($solutions as $sol){
            $sumacap_term = $sumacap_term + $sol->capacidad_tot;
        }

        return $sumacap_term;
    }

    public function unid_med($id,$num_enf){
        $unid_med = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->select('solutions_project.unid_med')
        ->first();
        return $unid_med;
    }

    public function inv_ini($id,$num_enf){
        $inv_ini = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->select('solutions_project.val_aprox')
        ->get();

        $res = 0;

        foreach($inv_ini as $inv){
            $res = $res + $inv->val_aprox;
        }

        return $res;
    }

    public function dif_1($id,$count,$cost_elec){
        $sols = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->select('solutions_project.*')
        ->get();



                $num_1 = 0;
                $num_2 = 0;
                $num_3 = 0;
                if($count == 2 || $count == 3){
                    $res_1 = 0;
                    $res_2 = 0;
                    for ($i=0; $i < count($sols) ; $i++) {

                        if($sols[$i]->num_enf == 1){

                            $res_1 = $res_1 + $sols[$i]->cost_op_an;
                            $num_1 = $res_1;
                        }

                        if($sols[$i]->num_enf == 2){

                            $res_2 = $res_2 + $sols[$i]->cost_op_an;
                            $num_2 = $res_2;
                        }

                    }
                    $res = $num_1 - $num_2;
                   /*  $dif = $res / $cost_elec; */
                    $dif = $res;
                    return $dif;
                }
    }

    public function dif_1_cost($id,$count,$cost_elec){
        $sols = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->select('solutions_project.*')
        ->get();

                $num_1 = 0;
                $num_2 = 0;
                $num_3 = 0;
                if($count == 2 || $count == 3){
                    $res_1 = 0;
                    $res_2 = 0;
                    for ($i=0; $i < count($sols) ; $i++) {

                        if($sols[$i]->num_enf == 1){

                            $res_1 = $res_1 + $sols[$i]->cost_op_an;
                            $num_1 = $res_1;
                        }

                        if($sols[$i]->num_enf == 2){

                            $res_2 = $res_2 + $sols[$i]->cost_op_an;
                            $num_2 = $res_2;
                        }
                        $costo_e = $sols[$i]->costo_elec;
                    }
                    $res = $num_1 - $num_2;
                    return  $res*$cost_elec;
                }
    }

    public function dif_2($id,$count,$cost_elec){
        $sols = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->select('solutions_project.*')
        ->get();


                $num_1 = 0;
                $num_2 = 0;
                $num_3 = 0;
                if($count == 3){
                    $res_1 = 0;
                    $res_3 = 0;
                    for ($i=0; $i < count($sols) ; $i++) {
                        $costoelec=$sols[$i]->costo_elec;
                        if($sols[$i]->num_enf == 1){

                            $res_1 = $res_1 + $sols[$i]->cost_op_an;
                            $num_1 = $res_1;
                        }

                        if($sols[$i]->num_enf == 3){

                            $res_3 = $res_3 + $sols[$i]->cost_op_an;
                            $num_3 = $res_3;
                        }

                    }
                    $res = $num_1 - $num_3;
                    $dif = $res;
                    return $dif;
                }
    }

    public function dif_2_cost($id,$count,$cost_elec){
        $sols = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->select('solutions_project.*')
        ->get();


                $num_1 = 0;
                $num_2 = 0;
                $num_3 = 0;
                if($count == 3){
                    $res_1 = 0;
                    $res_3 = 0;
                    for ($i=0; $i < count($sols) ; $i++) {
                        $costoelec=$sols[$i]->costo_elec;
                        if($sols[$i]->num_enf == 1){

                            $res_1 = $res_1 + $sols[$i]->cost_op_an;
                            $num_1 = $res_1;
                        }

                        if($sols[$i]->num_enf == 3){

                            $res_3 = $res_3 + $sols[$i]->cost_op_an;
                            $num_3 = $res_3;
                        }

                    }
                    $res = $num_1 - $num_3;

                    return  $res * $cost_elec;
                }
    }

    public function result_1($id,$num_enf){
        $result_1 = DB::table('results_project')
        ->where('results_project.id_project','=',$id)
        ->where('results_project.num_enf','=',$num_enf)
        ->select('results_project.*')
        ->first();

        return $result_1;
    }

    public function result_area($id,$sumaopex){
       $proj = DB::table('projects')
       ->where('projects.id','=',$id)
       ->first();

        $res = $sumaopex/$proj->area;
        return $res;
    }

    public function kwh_yr($id,$id_cat_edi){

        $id_tipo_edificio = DB::table('projects')
       ->where('projects.id','=',$id)
       ->first()->id_tipo_edificio;

       $kwh_yr = DB::table('tipo_edificio')
       ->where('tipo_edificio.id','=',$id_tipo_edificio)
       ->first()->kwh_yr;

         return $kwh_yr;
     }

    public function project(Request $request,$id_project){


            return view('result_new_imp',['id_project'=>$id_project]);
    }

    public function resultados_retrofit(Request $request,$id_project){

        /* if(Auth::user()->tipo_user == 5){
            return view('result_retro_imp',['id_project'=>$id_project]);
        }else{
            return view('resultados_retrofit',['id_project'=>$id_project]);
        } */

        return view('result_retro_imp',['id_project'=>$id_project]);
    }

    public function unidad_area($id){

        $proj = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first();
        $unidad_area = $proj->unidad;
         return $unidad_area;
    }

    public function inv_ini_ca_ar($id,$num_enf){
        $inv_ini = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->select('solutions_project.val_aprox')
        ->get();
        $suma = 0;
        foreach($inv_ini as $inv){
            $suma = $suma + $inv->val_aprox;
        }

        $area = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first()->area;

        $res =  $suma/$area;
        return $res;
    }

    public function roi_ent_dif_inv($id,$num_enf,$yrs,$dif_1){
        $inv_ini_ba = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',1)
        ->select('solutions_project.val_aprox')
        ->get();
        $res_base = 0;

        foreach($inv_ini_ba as $inv){
            $res_base = $res_base + $inv->val_aprox;
        }

        $inv_ini_a = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->select('solutions_project.val_aprox')
        ->get();

        $res_a= 0;

        foreach($inv_ini_a as $inv){
            $res_a = $res_a + $inv->val_aprox;
        }

        $invs_rest = $res_a - $res_base;

      /*   (((dif_1 * yrs) – $invs_rest )/ $invs_rest) *100 */

        /* (dif_1 * 3) */
       $difx3= $dif_1 * $yrs;
        /* (dif_1 * 3) – $invs_rest ) */
        $difx3_rest_inv = $difx3 - $invs_rest;
        if($invs_rest == 0){
            $roi_res=0;
        }

        if($invs_rest > 0){
            $div_difx3_rest_inv__invs_rest = $difx3_rest_inv/$invs_rest;
            $roi_res=$div_difx3_rest_inv__invs_rest*100;
        }
        if($invs_rest < 0){
            $div_difx3_rest_inv__invs_rest = $difx3_rest_inv/$invs_rest;
            $roi_res=$div_difx3_rest_inv__invs_rest*100;
        }



        return $roi_res;
    }

    public function roi_inv_tot($yrs,$id_projecto,$dif_cost,$inv_ini){
        if($id_projecto == 0){
            return false;
        }else{

       $año_3 = 0;
       $año_3_res = 0;
       $año_3_suma = 0;
       $año_3_res_suma = 0;
       $incremento_anual = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion_anual = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;

        if( $incremento_anual > 0){
            $inflacion =  $incremento_anual/100 + 1;
            $dif_cost_aux = $dif_cost;

        for ($i = 1; $i <= 15; $i++) {
            if($i == 1){
                $año_3_suma =  $dif_cost + $año_3_suma;

            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;

                if($i === $yrs){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma ;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                }
            }
          }
        }else if($incremento_anual <= 0){
            $inflacion = 1;
            $dif_cost_aux = $dif_cost;

        for ($i = 1; $i <= 15; $i++) {
            if($i == 1){
                $año_3_suma =  $dif_cost + $año_3_suma;

            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;

                if($i === $yrs){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma ;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                }
            }
          }
        }
    }
       return $año_3;

    }

    public function roi_inv_tot_retro($yrs,$id_projecto,$dif_cost,$inv_ini){
        if($id_projecto == 0){
            return false;
        }else{

       $año_3 = 0;
       $año_3_res = 0;
       $año_3_suma = 0;
       $año_3_res_suma = 0;
       $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        if( $inflacion_aux > 0){
            $inflacion =  $inflacion_aux/100 + 1;
            $dif_cost_aux = $dif_cost;

        for ($i = 1; $i <= 5; $i++) {
            if($i == 1){
                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;
               /*  $año_3_suma =  $dif_cost + $año_3_suma; */
               $año_3_res =  $dif_cost;
               $año_3_res_suma = $año_3_suma ;
               $año_3 = intval($año_3_res_suma/$inv_ini * 100);
            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;

                if($i === $yrs){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma ;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                }
            }
          }
        }else if($inflacion_aux <= 0){
            $inflacion = 1;
            $dif_cost_aux = $dif_cost;

        for ($i = 1; $i <= 5; $i++) {
            if($i == 1){
                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;
               /*  $año_3_suma =  $dif_cost + $año_3_suma; */
               $año_3_res =  $dif_cost;
               $año_3_res_suma = $año_3_suma ;
               $año_3 = intval($año_3_res_suma/$inv_ini * 100);

            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;

                if($i === $yrs){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma ;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                }
            }
          }
        }
    }
       return $año_3;

    }



    public function red_en_mw($yrs,$dif){
        /* (dif * 3) /1,000 */
        $difx3 = $dif * $yrs;
        $difx3_div =  $difx3 / 1000;
        return $difx3_div;
    }

    public function red_en_mw_grafic($dif,$dif_2){
        $dif = intval($dif);
        $dif_2 = intval($dif_2);
        $arry_res_a = [];
        $arry_res_b = [];
        $array_res = [];
        for ($i = 1; $i <= 5; $i++) {
            if($i == 1){
                //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 / 1000;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3 = $dif_2 * $i;
                $difx3b_div =  $difx3 / 1000;
                array_push($arry_res_b,intval($difx3b_div));
            }

            if($i == 2){
                //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 / 1000;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3 = $dif_2 * $i;
                $difx3b_div =  $difx3 / 1000;
                array_push($arry_res_b,intval($difx3b_div));
            }

            if($i == 3){
                //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 / 1000;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3 = $dif_2 * $i;
                $difx3b_div =  $difx3 / 1000;
                array_push($arry_res_b,intval($difx3b_div));
            }

            if($i == 4){
                //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 / 1000;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3 = $dif_2 * $i;
                $difx3b_div =  $difx3 / 1000;
                array_push($arry_res_b,intval($difx3b_div));
            }

            if($i == 5){
                //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 / 1000;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3 = $dif_2 * $i;
                $difx3b_div =  $difx3 / 1000;
                array_push($arry_res_b,intval($difx3b_div));
            }
        }
        /* (dif * 3) /1,000 */
       /*  $difx3 = $dif * $yrs;
        $difx3_div =  $difx3 / 1000; */

        array_push($array_res,$arry_res_a,$arry_res_b);

        return $array_res;

    }

    public function red_hu_carb($yrs,$dif){
        /* (dif * 3) * 0.0007087 */
        $difx3 = $dif * $yrs;
        $difx3_div =  $difx3 * 0.0007087;
        return $difx3_div;
    }

    public function red_hu_carb_grafic($dif,$dif_2){
        $dif = intval($dif);
        $dif_2 = intval($dif_2);
        $arry_res_a = [];
        $arry_res_b = [];
        $array_res = [];
        for ($i = 1; $i <= 5; $i++) {
            if($i == 1){
                //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 * 0.0007087;
                array_push($arry_res_a,intval($difx3a_div));
                //B
               /*  $difx3 = $dif_2 * $i;
                $difx3b_div =  $difx3 / 1000; */
                $difx3_b = $dif_2 * $i;
                $difx3b_div =  $difx3_b * 0.0007087;
                array_push($arry_res_b,intval($difx3b_div));
            }

            if($i == 2){
                //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 * 0.0007087;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3_b = $dif_2 * $i;
                $difx3b_div =  $difx3_b * 0.0007087;
                array_push($arry_res_b,intval($difx3b_div));
            }

            if($i == 3){
                //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 * 0.0007087;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3_b = $dif_2 * $i;
                $difx3b_div =  $difx3_b * 0.0007087;
                array_push($arry_res_b,intval($difx3b_div));
            }

            if($i == 4){
                 //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 * 0.0007087;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3_b = $dif_2 * $i;
                $difx3b_div =  $difx3_b * 0.0007087;
                array_push($arry_res_b,intval($difx3b_div));
            }

            if($i == 5){
                 //A
                $difx3 = $dif * $i;
                $difx3a_div =  $difx3 * 0.0007087;
                array_push($arry_res_a,intval($difx3a_div));
                //B
                $difx3_b = $dif_2 * $i;
                $difx3b_div =  $difx3_b * 0.0007087;
                array_push($arry_res_b,intval($difx3b_div));
            }
        }
        /* (dif * 3) /1,000 */
       /*  $difx3 = $dif * $yrs;
        $difx3_div =  $difx3 / 1000; */

        array_push($array_res,$arry_res_a,$arry_res_b);

        return $array_res;

    }

    public function red_bol_ba($yrs,$dif){
        /* (dif * 3) * 0.0.0077 */
        $difx3 = $dif * $yrs;
        $difx3_mul =  $difx3 * 0.0077;
        return $difx3_mul;
    }

    public function energy_star($id_project){
        $energy_star = DB::table('projects')
        ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
        ->where('projects.id','=',$id_project)
        ->select('tipo_edificio.*')
        ->first()->energy_star;
        return $energy_star;
    }

    public function ashrae($id_project){

        $hrs = DB::table('projects')
        ->where('projects.id','=',$id_project)
        ->select('projects.*')
        ->first()->hrs_tiempo;



        $ashrae = DB::table('projects')
        ->join('ciudad','ciudad.ciudad','=','projects.ciudad')
        ->where('projects.id','=',$id_project)
        ->select('ciudad.*')
        ->first()->ashrae;

        $tipo_edi = DB::table('projects')
        ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
        ->where('projects.id','=',$id_project)
        ->select('tipo_edificio.*')
        ->first();

        if(intval($hrs) < 50){
            $hrs_porcent = DB::table('tiempo_porcent')
            ->where('tiempo_porcent.id_edificio','=',$tipo_edi->id)
            ->first()->porcent_1;
        }

        if(intval($hrs) > 50 && intval($hrs) < 167){
            $hrs_porcent = DB::table('tiempo_porcent')
            ->where('tiempo_porcent.id_edificio','=',$tipo_edi->id)
            ->first()->porcent_2;
        }

        if(intval($hrs) === 168){
            $hrs_porcent = DB::table('tiempo_porcent')
            ->where('tiempo_porcent.id_edificio','=',$tipo_edi->id)
            ->first()->porcent_3;
        }



        $res_eui_ashrae = floatval($tipo_edi->$ashrae) * floatval($hrs_porcent);

        return $res_eui_ashrae;
    }


    public function valor_eui_aux($sumaopex,$costo_elec,$area,$porcent_hvac,$energy_star,$unidad){
       /*  ((sumaopex*100%/50%)*3.412)/(area*10.764) */

        $val = $sumaopex * $costo_elec;

       $ConsumoAnualOPEX = $val/$costo_elec;
        /* ((sumaopex*100%/50%)*3.412) */

        /* (sumaopex*100%/50%) */

        $porcent= $porcent_hvac / 100;
        /* sumaopex*100%/50% */
        $div_porcent =  $ConsumoAnualOPEX / $porcent;

        $mult_rers_1erapt =  $div_porcent * 3.412;
       /*  (2000*10.764) */

       //validar area mc y ft
        if($unidad == 'mc'){
            $area_res=$area*10.764;
        }

        if($unidad == 'ft'){
            $area_res = $area;
        }

        $res =  $mult_rers_1erapt/$area_res;
       return $res;
    }

    public function valor_eui($sumaopex,$costo_elec,$area,$porcent_hvac,$energy_star,$unidad){

       /* Factor Consumo energia ////////////////////
       ((eui-energystart * (area * 10.764))/3.412) * (100% - 60%) */

       /* (area * 10.764) */
        if($unidad == 'mc'){
            $area_x_fact_fts=$area*10.764;
            /* (52.9 * (10,000 * 10.764)) */
            $area_x_e_star = $energy_star *  $area_x_fact_fts;
        }

        if($unidad == 'ft'){
            $area_x_e_star = $energy_star *  $area;
        }

       /*  ((52.9 * (10,000 * 10.764))/3.412) */
        $area_x_e_star_div_3 =  $area_x_e_star / 3.412;

        /* ((52.9 * (10,000 * 10.764))/3.412) * (100% - 60%)  */
        //sacar_porciento
        $porcent= $porcent_hvac / 100;

        $porcent_A = 1 - $porcent;

        $factor_consumo_e = $area_x_e_star_div_3 * $porcent_A;

        //////////Consumo Anual OPEX////////////////////
        /* ((((338,466/0.12) + 667,545))*3.412 )/(10,000 * 10.764) */

        /* (338,466/0.12) */
        $sumaopex_div_area = $sumaopex / $costo_elec;

        /* ((338,466/0.12) + 667,545 */
        $sumaopex_div_area_mas_area = $sumaopex_div_area + $factor_consumo_e;
        /* (((338,466/0.12) + 667,545))*3.412 ) */
        $sumaopex_div_area_mas_area_mul_3 = $sumaopex_div_area_mas_area * 3.412;


        /* (area * 10.764) */
        if($unidad == 'mc'){
            $area_x_fact_fts_opex=$area*10.764;
        }

        if($unidad == 'ft'){
            $area_x_fact_fts_opex = $area;
        }

        $res =  $sumaopex_div_area_mas_area_mul_3 / $area_x_fact_fts_opex;
        return $res;
    }

    public function pay_back($inv_ini_1,$inv_ini_x,$dif_cost){
        /* $(inv_ini_x-$inv_ini_1)/dif_cost)*/
        /* (inv_ini_x-$inv_ini_1) */
      /*   $par_1 = $inv_ini_x-$inv_ini_1; */
        $res = $inv_ini_x / $dif_cost;
        return $res;
    }

    public function pay_back_ene_prod($inv_ini_1,$costo,$dif_cost,$costo_x){
      //costo – costo_x
      $costos_rest = $costo - $costo_x;
      //(dif_cost + (costo – costo_x)
      $dif_costo_sum_costos_rest=  $dif_cost + $costos_rest;
      // inv_ini / (dif_cost + (costo – costo_x)
      if($costos_rest == 0){
        $res = 0;
      }else{
        $res = $inv_ini_1 / $dif_costo_sum_costos_rest;
      }

        return $res;
    }


    ////Edicion functions///
    public function traer_unidad_hvac($id,$num_sol,$num_enf){


        $val_unidad = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->where('solutions_project.num_sol','=',$num_sol)
        ->first();

        return $val_unidad;
    }

    public function num_tarjets($id,$num_enf){
        $solutions = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->get();

        return count($solutions);
    }

    public function generatePDF($id_project)
    {

        $check_type = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_project)
        ->first();
        if($check_type->type_p == 1 || $check_type->type_p == 0){
            $view =  \View::make('pdf_resultados',compact('id_project'))->render();
        }

        if($check_type->type_p == 2 || $check_type->type_p == 3){
            $view =  \View::make('pdf_resulatos_retro',compact('id_project'))->render();
        }
        //->setPaper($customPaper, 'landscape');

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 1000);
        $pdf->setPaper("A4", "portrait");
        return $pdf->stream('Portada.pdf');
        //ini_set('max_execution_time', 1500);
        set_time_limit(6000);

    }


    public function cap_op_1_retro($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();



        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $rep_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
        $rep_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $rep_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;


        $tipo_mant_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->tipo_ambiente;

        $prot_cond_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->proteccion_condensador;

        $tipo_mant_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $tipo_mant_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();


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

        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;

            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;
            $res_opex_enf_base = $consumo_anual_opex_base/$area;

            $suma_enf_base_aux = $res_opex_enf_base;

            /* for ($i = 1; $i < 2; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
            } */


            $suma_rec_opex = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first();


            //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();


            $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;

            /* foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;

            } */


            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $rep_opex_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

           /*  for ($i = 1; $i <= 2; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            } */


                    array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;

            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             /* for ($i = 1; $i < 2; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            } */

                //incremento inflacion
                $cost_mant_a = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();

                foreach($cost_mant_a as $cost){
                    $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
                }
                //costo_mantenimiento / area solucoin base
                $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
                $res_opex_a = $suma_cost_mant_a_div_area;

               /*  for ($i = 1; $i < 2; $i++) {
                    //$suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
               } */

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;





                    array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));


           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             /* for ($i = 1; $i < 2; $i++) {
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            } */

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            /* for ($i = 1; $i < 2; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           } */

           $total_opex_b = $suma_enf_b_aux + $res_opex_b;





                array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));



           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }


    public function cap_op_3_retro($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();



        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $rep_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
        $rep_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $rep_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;


        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;

            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;
            $res_opex_enf_base = $consumo_anual_opex_base/$area;

            $suma_enf_base_aux = $res_opex_enf_base;

            for ($i = 2; $i <= 3; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
                }


                //incremento inflacion
                $suma_rec_opex = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->first();

                //incremento inflacion
                $cost_mant_base = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();


                $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;
                //return $inflacion_rate;
                /*  foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;

            } */
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $rep_opex_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 3; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }


                    array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;

            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 3; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

                //incremento inflacion
                $cost_mant_a = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();

                foreach($cost_mant_a as $cost){
                    $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
                }
                //costo_mantenimiento / area solucoin base
                $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
                $res_opex_a = $suma_cost_mant_a_div_area;

                for ($i = 2; $i <= 3; $i++) {
                    $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
               }

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;





                    array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));


           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 3; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 3; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           }

           $total_opex_b = $suma_enf_b_aux + $res_opex_b;

                array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));

           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }

    public function cap_op_5_retro($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();



        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $rep_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
        $rep_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $rep_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;


        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;

            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;
            $res_opex_enf_base = $consumo_anual_opex_base/$area;

            $suma_enf_base_aux = $res_opex_enf_base;

            for ($i = 2; $i <= 5; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
                }


                //incremento inflacion
                $suma_rec_opex = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->first();

                //incremento inflacion
                $cost_mant_base = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();


                $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;
                //return $inflacion_rate;
                /*  foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;

            } */
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $rep_opex_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 5; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }


                    array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;

            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 5; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

                //incremento inflacion
                $cost_mant_a = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();

                foreach($cost_mant_a as $cost){
                    $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
                }
                //costo_mantenimiento / area solucoin base
                $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
                $res_opex_a = $suma_cost_mant_a_div_area;

                for ($i = 2; $i <= 5; $i++) {
                    $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
               }

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;





                    array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));


           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 5; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           }

           $total_opex_b = $suma_enf_b_aux + $res_opex_b;

                array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));

           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }

    public function cap_op_10_retro($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();



        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $rep_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
        $rep_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $rep_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;


        $tipo_mant_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->tipo_ambiente;

        $prot_cond_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->proteccion_condensador;

        $tipo_mant_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $tipo_mant_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();


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


        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;

            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;
            $res_opex_enf_base = $consumo_anual_opex_base/$area;

            $suma_enf_base_aux = $res_opex_enf_base;

            for ($i = 2; $i <= 10; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
                }


                //incremento inflacion
                $suma_rec_opex = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->first();

                //incremento inflacion
                $cost_mant_base = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();


                $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;
                //return $inflacion_rate;
                /*  foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;

            } */
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $rep_opex_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }



            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){

                array_push($array_base,0,0,0);
            }else{
                array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
            }


        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;

            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 10; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

                //incremento inflacion
                $cost_mant_a = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();

                foreach($cost_mant_a as $cost){
                    $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
                }
                //costo_mantenimiento / area solucoin base
                $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
                $res_opex_a = $suma_cost_mant_a_div_area;

                for ($i = 2; $i <= 10; $i++) {
                    $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
               }

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;


               if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){

                array_push($array_a,0,0,0);
                }else{
                    array_push($array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));
                }



           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           }

           $total_opex_b = $suma_enf_b_aux + $res_opex_b;


           if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
            array_push($array_b,0,0,0);
            }else{
            array_push($array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
            }



           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }

    public function cap_op_1_retro_pdf($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();



        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $rep_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
        $rep_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $rep_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;


        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;

            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;
            $res_opex_enf_base = $consumo_anual_opex_base/$area;

            $suma_enf_base_aux = $res_opex_enf_base;

            /* for ($i = 1; $i < 2; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
            } */


            $suma_rec_opex = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first();


            //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();


            $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;

            /* foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;

            } */


            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $rep_opex_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

           /*  for ($i = 1; $i <= 2; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            } */



                    array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;

            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             /* for ($i = 1; $i < 2; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            } */

                //incremento inflacion
                $cost_mant_a = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();

                foreach($cost_mant_a as $cost){
                    $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
                }
                //costo_mantenimiento / area solucoin base
                $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
                $res_opex_a = $suma_cost_mant_a_div_area;

               /*  for ($i = 1; $i < 2; $i++) {
                    //$suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
               } */

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;





                    array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));


           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             /* for ($i = 1; $i < 2; $i++) {
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            } */

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            /* for ($i = 1; $i < 2; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           } */

           $total_opex_b = $suma_enf_b_aux + $res_opex_b;





                array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));



           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return $array_tot;
    }

    public function cap_op_3($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();

        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $rep_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
        $rep_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $rep_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;

        $tipo_mant_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->tipo_ambiente;

        $prot_cond_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->proteccion_condensador;

        $tipo_mant_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $tipo_mant_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();


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

        foreach( $num_enfs as $num_enf){

           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;

            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;
            $res_opex_enf_base = $consumo_anual_opex_base/$area;

            $suma_enf_base_aux = $res_opex_enf_base;

            for ($i = 2; $i <= 3; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
            }


                //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;

            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $suma_cost_mant_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 3; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }

            array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));

        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;

            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 3; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

                //incremento inflacion
                $cost_mant_a = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();

                foreach($cost_mant_a as $cost){
                    $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
                }
                //costo_mantenimiento / area solucoin base
                $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
                $res_opex_a = $suma_cost_mant_a_div_area;

                for ($i = 2; $i <= 3; $i++) {
                    $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
               }

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;





                    array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));


           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 3; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 3; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           }

           $total_opex_b = $suma_enf_b_aux + $res_opex_b;





                array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));



           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }

    public function cap_op_3_pdf($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();



        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $rep_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
        $rep_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $rep_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;


        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;

            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;
            $res_opex_enf_base = $consumo_anual_opex_base/$area;

            $suma_enf_base_aux = $res_opex_enf_base;

            for ($i = 2; $i <= 3; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
            }


                //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $suma_cost_mant_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 3; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }

            ///recuperacion opex
                if($type_p == 2 || $type_p == 3){

                    $suma_rec_opex = DB::table('solutions_project')
                    ->where('solutions_project.id_project','=',$id_projecto)
                    ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                    ->first();

                    $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;

                    array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1),round($rep_opex_base,1));

                }

                if($type_p == 1 || $type_p == 0){

                    array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));

                }
        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;

            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 3; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

                //incremento inflacion
                $cost_mant_a = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();

                foreach($cost_mant_a as $cost){
                    $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
                }
                //costo_mantenimiento / area solucoin base
                $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
                $res_opex_a = $suma_cost_mant_a_div_area;

                for ($i = 2; $i <= 3; $i++) {
                    $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
               }

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;

               if($type_p == 2 || $type_p == 3){

                $suma_rec_opex = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->first();

                $rep_opex_a = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;

                array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1),round($rep_opex_a,1));

                }

                if($type_p == 1 || $type_p == 0){

                    array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));

                }
           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 3; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 3; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           }

           $total_opex_b = $suma_enf_b_aux + $res_opex_b;

           if($type_p == 2 || $type_p == 3){

            $suma_rec_opex = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first();

            $rep_opex_b = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;

            array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1),round($rep_opex_b,1));

            }

            if($type_p == 1 || $type_p == 0){

                array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));

            }

           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return $array_tot;
    }

    public function cap_op_3_retro_pdf($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();



        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $rep_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
        $rep_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $rep_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;


        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;

            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;
            $res_opex_enf_base = $consumo_anual_opex_base/$area;

            $suma_enf_base_aux = $res_opex_enf_base;

            for ($i = 2; $i <= 3; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
                }


                //incremento inflacion
                $suma_rec_opex = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->first();

                //incremento inflacion
                $cost_mant_base = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();


                $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;
                //return $inflacion_rate;
                /*  foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;

            } */
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $rep_opex_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 3; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }


                    array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;

            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 3; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

                //incremento inflacion
                $cost_mant_a = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->select('solutions_project.costo_mantenimiento')
                ->get();

                foreach($cost_mant_a as $cost){
                    $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
                }
                //costo_mantenimiento / area solucoin base
                $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
                $res_opex_a = $suma_cost_mant_a_div_area;

                for ($i = 2; $i <= 3; $i++) {
                    $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
               }

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;





                    array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));


           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 3; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 3; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           }

           $total_opex_b = $suma_enf_b_aux + $res_opex_b;

                array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));

           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return $array_tot;
    }

    public function cap_op_5($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();

        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;

        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;
            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;

             $res_opex_enf_base = $consumo_anual_opex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
            }

            //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $suma_cost_mant_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 5; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
           }
            ///recuperacion opex
            if($type_p == 2){

                $suma_rec_opex = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->first();

                $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;

                array_push( $array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1),round($rep_opex_base,1));
            }

            if($type_p == 1 || $type_p == 0){
                array_push( $array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
            }
           //$total_opex_base = $suma_enf_base_aux + $res_opex_base;


        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

             //incremento inflacion
             $cost_mant_a = DB::table('solutions_project')
             ->where('solutions_project.id_project','=',$id_projecto)
             ->where('solutions_project.num_enf','=',$num_enf->num_enf)
             ->select('solutions_project.costo_mantenimiento')
             ->get();

             foreach($cost_mant_a as $cost){
                 $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
             }
             //costo_mantenimiento / area solucoin base
             $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
             $res_opex_a = $suma_cost_mant_a_div_area;

             for ($i = 2; $i <= 5; $i++) {
                 $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                 $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
            }

            //$total_opex_a = $suma_enf_a_aux + $res_opex_a;



                    array_push($array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));

           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

             $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

             //incremento inflacion
             $cost_mant_b = DB::table('solutions_project')
             ->where('solutions_project.id_project','=',$id_projecto)
             ->where('solutions_project.num_enf','=',$num_enf->num_enf)
             ->select('solutions_project.costo_mantenimiento')
             ->get();

             foreach($cost_mant_b as $cost){
                 $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
             }
             //costo_mantenimiento / area solucoin base
             $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
             $res_opex_b = $suma_cost_mant_b_div_area;

             for ($i = 2; $i <= 5; $i++) {
                 $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                 $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
            }

      /*       $total_opex_b = $suma_enf_b_aux + $res_opex_b; */



            array_push($array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));

           }
        }

        array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }

    public function cap_op_5_pdf($id_projecto){


        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();

        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;

        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;
            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;

             $res_opex_enf_base = $consumo_anual_opex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
            }

            //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $suma_cost_mant_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 5; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
           }
            ///recuperacion opex
            if($type_p == 2){

                $suma_rec_opex = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->first();

                $rep_opex_base = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;

                array_push( $array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1),round($rep_opex_base,1));
            }

            if($type_p == 1 || $type_p == 0){
                array_push( $array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
            }
           //$total_opex_base = $suma_enf_base_aux + $res_opex_base;


        }

           if($num_enf->num_enf === 2){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

             //incremento inflacion
             $cost_mant_a = DB::table('solutions_project')
             ->where('solutions_project.id_project','=',$id_projecto)
             ->where('solutions_project.num_enf','=',$num_enf->num_enf)
             ->select('solutions_project.costo_mantenimiento')
             ->get();

             foreach($cost_mant_a as $cost){
                 $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
             }
             //costo_mantenimiento / area solucoin base
             $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
             $res_opex_a = $suma_cost_mant_a_div_area;

             for ($i = 2; $i <= 5; $i++) {
                 $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                 $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
            }

            //$total_opex_a = $suma_enf_a_aux + $res_opex_a;
            if($type_p == 2){

                $suma_rec_opex = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id_projecto)
                ->where('solutions_project.num_enf','=',$num_enf->num_enf)
                ->first();

                $rep_opex_a = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;
                array_push($array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1),round($rep_opex_a,1));

                }

                if($type_p == 1 || $type_p == 0){
                    array_push($array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));
                }
           }

           if($num_enf->num_enf === 3){
            $type_p = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->first()->type_p;
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

             $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

             //incremento inflacion
             $cost_mant_b = DB::table('solutions_project')
             ->where('solutions_project.id_project','=',$id_projecto)
             ->where('solutions_project.num_enf','=',$num_enf->num_enf)
             ->select('solutions_project.costo_mantenimiento')
             ->get();

             foreach($cost_mant_b as $cost){
                 $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
             }
             //costo_mantenimiento / area solucoin base
             $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
             $res_opex_b = $suma_cost_mant_b_div_area;

             for ($i = 2; $i <= 5; $i++) {
                 $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                 $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
            }

      /*       $total_opex_b = $suma_enf_b_aux + $res_opex_b; */
      if($type_p == 2){

        $suma_rec_opex = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',$num_enf->num_enf)
        ->first();

        $rep_opex_b = $suma_rec_opex->cost_an_re + $suma_rec_opex->costo_mantenimiento;
        array_push($array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1),round($rep_opex_b,1));
        }

        if($type_p == 1 || $type_p == 0){
            array_push($array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
        }
           }
        }

        array_push( $array_tot,$array_base,$array_a,$array_b);
       return $array_tot;
    }

    public function cap_op_10($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();

        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;

        $tipo_mant_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->tipo_ambiente;

        $prot_cond_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->proteccion_condensador;

        $tipo_mant_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $tipo_mant_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();


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

        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;
            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;

             $res_opex_enf_base = $consumo_anual_opex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
            }

            //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $suma_cost_mant_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }

            //$total_opex_base = $suma_enf_base_aux + $res_opex_base;
            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
                array_push($array_base,0,0,0);
            }else{
                array_push( $array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
            }


        }

           if($num_enf->num_enf === 2){
            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }


            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;


             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

            //incremento inflacion
            $cost_mant_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_a as $cost){
                $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
            $res_opex_a = $suma_cost_mant_a_div_area;

            for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
           }

           //$total_opex_a = $suma_enf_a_aux + $res_opex_a;

           if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
            array_push($array_a,0,0,0);
            }else{
                array_push($array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));
            }


           }

           if($num_enf->num_enf === 3){
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
           }

           //$total_opex_b = $suma_enf_b_aux + $res_opex_b;
           if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
            array_push($array_b,0,0,0);
            }else{
            array_push($array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
            }

           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }

    public function cap_op_10_pdf($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();

        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;

        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;
            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;

             $res_opex_enf_base = $consumo_anual_opex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
            }

            //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $suma_cost_mant_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }

            //$total_opex_base = $suma_enf_base_aux + $res_opex_base;

            array_push( $array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
        }

           if($num_enf->num_enf === 2){
            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }


            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;


             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

            //incremento inflacion
            $cost_mant_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_a as $cost){
                $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
            $res_opex_a = $suma_cost_mant_a_div_area;

            for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
           }

           //$total_opex_a = $suma_enf_a_aux + $res_opex_a;

            array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));
           }

           if($num_enf->num_enf === 3){
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_b as $sol){
                $sumaopex_b = $sumaopex_b + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
           }

           //$total_opex_b = $suma_enf_b_aux + $res_opex_b;

            array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return $array_tot;

    }

    public function cap_op_15($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();

        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;


        $tipo_mant_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->tipo_ambiente;

        $prot_cond_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->proteccion_condensador;

        $tipo_mant_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $tipo_mant_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();


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

        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;
            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;

             $res_opex_enf_base = $consumo_anual_opex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
            }

            //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $suma_cost_mant_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }

            //$total_opex_base = $suma_enf_base_aux + $res_opex_base;
            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'cobre_cobre' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
                array_push($array_base,0,0,0);
            }else{
                array_push( $array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
            }
        }

           if($num_enf->num_enf === 2){
            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

            //incremento inflacion
            $cost_mant_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_a as $cost){
                $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
            $res_opex_a = $suma_cost_mant_a_div_area;

            for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
           }

           //$total_opex_a = $suma_enf_a_aux + $res_opex_a;
           if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'cobre_cobre' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
            array_push($array_a,0,0,0);
            }else{
                array_push($array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));
            }

           }

           if($num_enf->num_enf === 3){
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();
            $sumaopex_b_15 = 0;
            foreach($solutions_b as $sol){
                $sumaopex_b_15 = $sumaopex_b_15 + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b_15 * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                 $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                 $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
            }

            $total_opex_b = $suma_enf_b_aux + $res_opex_b;

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'cobre_cobre' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
                array_push($array_b,0,0,0);
                }else{
                array_push($array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
                }

           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }

    public function cap_op_15_pdf($id_projecto){

        $num_enfs = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->select('solutions_project.num_enf')
        ->distinct()
        ->get();

        $suma_enf_base = 0;
        $suma_enf_base_aux = 0;
        $sumaopex_base = 0;
        $suma_cost_mant_base = 0;
        $res_opex_base = 0;
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $suma_cost_mant_b = 0;
        $res_opex_b = 0;
        $array_tot = [];
        $array_base = [0,0,0];
        $array_a = [0,0,0];
        $array_b = [0,0,0];

        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;

        $inflacion_rate_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion_rate;
        $inflacion_rate =  $inflacion_rate_aux/100 + 1;

        foreach( $num_enfs as $num_enf){
           if($num_enf->num_enf === 1){
            //capex
            $array_base = [];
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_base = $suma_enf_base + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_base =  $suma_enf_base/$area;
            //opex
            $solutions = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions as $sol){
                $sumaopex_base = $sumaopex_base + $sol->cost_op_an;
            }

            $costo_electrico_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_base = $sumaopex_base * $costo_electrico_base;

             $res_opex_enf_base = $consumo_anual_opex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
            }

            //incremento inflacion
            $cost_mant_base = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_base as $cost){
                $suma_cost_mant_base = $suma_cost_mant_base + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $suma_cost_mant_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;

            for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }

            //$total_opex_base = $suma_enf_base_aux + $res_opex_base;

            array_push( $array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
        }

           if($num_enf->num_enf === 2){
            $array_a = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_a = $suma_enf_a + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_a =  $suma_enf_a/$area;
            //opex
            $solutions_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();

            foreach($solutions_a as $sol){
                $sumaopex_a = $sumaopex_a + $sol->cost_op_an;
            }

            $costo_electrico_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_a = $sumaopex_a * $costo_electrico_a;

             $res_opex_enf_a = $consumo_anual_opex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
            }

            //incremento inflacion
            $cost_mant_a = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_a as $cost){
                $suma_cost_mant_a = $suma_cost_mant_a + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_a_div_area = $suma_cost_mant_a/$area;
            $res_opex_a = $suma_cost_mant_a_div_area;

            for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
           }

           //$total_opex_a = $suma_enf_a_aux + $res_opex_a;

            array_push( $array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));
           }

           if($num_enf->num_enf === 3){
            $array_b = [];
            //capex
            $inv_ini = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.val_aprox')
            ->get();

            foreach($inv_ini as $inv){
                $suma_enf_b = $suma_enf_b + $inv->val_aprox;
            }

            $area = DB::table('projects')
            ->where('projects.id','=',$id_projecto)
            ->first()->area;

            $res_enf_b =  $suma_enf_b/$area;
            //opex
            $solutions_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.cost_op_an')
            ->get();
            $sumaopex_b_15 = 0;
            foreach($solutions_b as $sol){
                $sumaopex_b_15 = $sumaopex_b_15 + $sol->cost_op_an;
            }

            $costo_electrico_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_elec')
            ->first()->costo_elec;

            $consumo_anual_opex_b = $sumaopex_b_15 * $costo_electrico_b;

             $res_opex_enf_b = $consumo_anual_opex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                 $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
            }

            //incremento inflacion
            $cost_mant_b = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id_projecto)
            ->where('solutions_project.num_enf','=',$num_enf->num_enf)
            ->select('solutions_project.costo_mantenimiento')
            ->get();

            foreach($cost_mant_b as $cost){
                $suma_cost_mant_b = $suma_cost_mant_b + $cost->costo_mantenimiento;
            }
            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_b_div_area = $suma_cost_mant_b/$area;
            $res_opex_b = $suma_cost_mant_b_div_area;

            for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                 $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
            }

            $total_opex_b = $suma_enf_b_aux + $res_opex_b;

            array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return $array_tot;
    }

/*
public function roi_base_a_retro($id_projecto,$dif_cost,$inv_ini){
        $array_res = [];
        $año_1 = 0;
        $año_1_res = 0;
        $año_1_suma = 0;
        $año_1_res_suma = 0;
        $año_2 = 0;
        $año_2_res = 0;
        $año_2_suma = 0;
        $año_2_res_suma = 0;
        $año_3 = 0;
        $año_3_res = 0;
        $año_3_suma = 0;
        $año_3_res_suma = 0;
        $año_4 = 0;
        $año_4_res = 0;
        $año_4_suma = 0;
        $año_4_res_suma = 0;
        $año_5 = 0;
        $año_5_res = 0;
        $año_5_suma = 0;
        $año_5_res_suma = 0;
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;

        $dif_cost_aux = $dif_cost;

        if( $inflacion_aux > 0){
            $inflacion =  $inflacion_aux/100 + 1;
        }else if( $inflacion_aux <= 0){
            $inflacion = 1;
        }
        for ($i = 1; $i <= 5; $i++) {
            if($i == 1){

                $dif_cost = $dif_cost * $inflacion;
                $año_1_suma =  $dif_cost + $año_1_suma;
                $año_2_suma =  $dif_cost + $año_2_suma;
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_4_suma =  $dif_cost + $año_4_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;
                $año_1_res =  $dif_cost;
                    $año_1_res_suma = $año_1_suma ;
                    $año_1 = intval($año_1_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_1);
            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_1_suma =  $dif_cost + $año_1_suma;
                $año_2_suma =  $dif_cost + $año_2_suma;
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_4_suma =  $dif_cost + $año_4_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;

                if($i == 2){
                    $año_2_res =  $dif_cost;
                    $año_2_res_suma = $año_2_suma ;
                    $año_2 = intval($año_2_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_2);
                }

                if($i == 3){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma ;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_3);
                }

                if($i == 4){
                    $año_4_res =  $dif_cost;
                    $año_4_res_suma = $año_4_suma ;
                    $año_4 = intval($año_4_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_4);
                }

                if($i == 5){
                    $año_5_res =  $dif_cost;
                    $año_5_res_suma = $año_5_suma ;
                    $año_5 = intval($año_5_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_5);
                }


            }
        }
        return response()->json($array_res);
    }
*/

/* ene prod */
/* public function roi_base_a_retro_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo){
    $array_roi_base_ene_solo_ene = ResultadosController::roi_base_a_retro_new_nojson($id_projecto,$dif_cost,$inv_ini);
    $array_sumas = ResultadosController::roi_sumas_grafics($id_projecto,$dif_cost,$inv_ini);


    $costo = intval($costo);

    $prod_m_prode =intval($costobase) - intval($costo);

    ///formula
    $array_sums_res = [];
    $array_res = [];
    $año_3 = 0;
    $año_3_res = 0;
    $año_3_suma = 0;
    $año_3_res_suma = 0;
    $año_5 = 0;
    $año_5_res = 0;
    $año_5_suma = 0;
    $año_5_res_suma = 0;
    $año_10 = 0;
    $año_10_res = 0;
    $año_10_suma = 0;
    $año_10_res_suma = 0;
    $año_15 = 0;
    $año_15_res = 0;
    $año_15_suma = 0;
    $año_15_res_suma = 0;
    $inflacion_aux = DB::table('projects')
    ->where('id','=',$id_projecto)
    ->first()->inflacion_rate;
    $inv_ini = intval($inv_ini);
    $dif_cost_aux = $prod_m_prode;
    $cost_an_ene = DB::table('projects')
    ->where('id','=',$id_projecto)
    ->first()->inflacion;
    //ince_an_ene

    if( floatval($inflacion_aux) > 0){
        $inflacion =  floatval($inflacion_aux)/100 + 1;
    }else if( floatval($inflacion_aux) <= 0){
        $inflacion = 1;
    }

    for ($i = 1; $i <= 15; $i++) {
        if($i == 1){
            $año_3_suma =  $prod_m_prode + $año_3_suma;
            $año_5_suma =  $prod_m_prode + $año_5_suma;
            $año_10_suma =  $prod_m_prode + $año_10_suma;
            $año_15_suma =  $prod_m_prode + $año_15_suma;

        }else{

            $prod_m_prode = $prod_m_prode * $inflacion;
            $año_3_suma =  $prod_m_prode + $año_3_suma;
            $año_5_suma =  $prod_m_prode + $año_5_suma;
            $año_10_suma =  $prod_m_prode + $año_10_suma;
            $año_15_suma =  $prod_m_prode + $año_15_suma;


            if($i === 3){
                $año_3_res =  $prod_m_prode;
                $año_3_res_suma = $año_3_suma;
                $suma_años_3 = $año_3_res_suma+intval($array_sumas[0]);
                //$año_3 = intval($año_3_res_suma/$inv_ini * 100);
                array_push($array_sums_res,intval($suma_años_3));

            }

            if($i === 5){
                $año_5_res =  $prod_m_prode;
                $año_5_res_suma = $año_5_suma ;
                $suma_años_5 = $año_3_res_suma+intval($array_sumas[1]);
                //$año_5 = intval($año_5_res_suma/$inv_ini * 100);
                array_push($array_sums_res,intval($año_5_res_suma));


            }

            if($i === 10){
                $año_10_res =  $prod_m_prode;
                $año_10_res_suma = $año_10_suma ;
                $año_10 = intval($año_10_res_suma/$inv_ini * 100);
                array_push($array_sums_res,intval($año_10_res_suma));

            }

            if($i === 15){
                $año_15_res =  $prod_m_prode;
                $año_15_res_suma = $año_15_suma ;
                $año_15 = intval($año_15_res_suma/$inv_ini * 100);
                array_push($array_sums_res,intval($año_15_res_suma));
                //dd($array_res);
            }


        }
    }

    $count_arry= count($array_sums_res) - 1;
    for ($i = 0; $i <= $count_arry; $i++) {

        //$suma = $array_sums_res[$i] + $array_roi_base_ene_solo_ene[$i];
        $suma = $array_sums_res[$i] +  $array_sumas[$i];
        $div_Result = $suma / $inv_ini * 100;

        array_push($array_res,intval($div_Result));
    }

    return response()->json($array_res);
} */

public function roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$dif_2_cost,$inv_ini_3,$costo_b){

    $funciones = new funciones();
    $array_a = [0,0,0,0];
    $array_b = [];
    $array_c = [];
    $array_res = [];


    $tipo_mant_2_set = DB::table('solutions_project')
    ->where('solutions_project.id_project','=',$id_projecto)
    ->where('solutions_project.num_enf','=',2)
    ->where('solutions_project.num_sol','=',1)
    ->first();

    $prot_cond_2_set = DB::table('solutions_project')
    ->where('solutions_project.id_project','=',$id_projecto)
    ->where('solutions_project.num_enf','=',2)
    ->where('solutions_project.num_sol','=',1)
    ->first();

    $tipo_mant_3_set = DB::table('solutions_project')
    ->where('solutions_project.id_project','=',$id_projecto)
    ->where('solutions_project.num_enf','=',3)
    ->where('solutions_project.num_sol','=',1)
    ->first();

    $prot_cond_3_set = DB::table('solutions_project')
    ->where('solutions_project.id_project','=',$id_projecto)
    ->where('solutions_project.num_enf','=',3)
    ->where('solutions_project.num_sol','=',1)
    ->first();


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

    if(intval($dif_cost) === 0 || intval($inv_ini) === 0){

        $array_b = [0,0,0,0];
    }else{

        if($tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
            $array_b = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,5);
        }else if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'cobre_cobre'){
            $array_b = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,10);

        }else if($tipo_mant_2 == null && $prot_cond_2 == null){
            $array_b = [0,0,0,0];
        }else{
            $array_b = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,15);
        }
    }

    if(intval($dif_2_cost) === 0 || intval($inv_ini_3) === 0){

        $array_c = [0,0,0,0];
    }else{


        if($tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
            $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,5);
        }else if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'cobre_cobre'){

             $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,10);
        }else if($tipo_mant_2 == null && $prot_cond_2 == null){
            $array_c = [0,0,0,0];
        }else{
            $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,15);
        }


    }


    array_push($array_res,$array_a,$array_b,$array_c);
    return response()->json($array_res);

}

    /* public function roi_base_a_retro_new($id_projecto,$dif_cost,$inv_ini){
        $array_res = [];
        $año_3 = 0;
        $año_3_res = 0;
        $año_3_suma = 0;
        $año_3_res_suma = 0;
        $año_5 = 0;
        $año_5_res = 0;
        $año_5_suma = 0;
        $año_5_res_suma = 0;
        $año_10 = 0;
        $año_10_res = 0;
        $año_10_suma = 0;
        $año_10_res_suma = 0;
        $año_15 = 0;
        $año_15_res = 0;
        $año_15_suma = 0;
        $año_15_res_suma = 0;
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inv_ini = intval($inv_ini);
        $dif_cost_aux = $dif_cost;
        $cost_an_ene = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        //ince_an_ene

        if( floatval($inflacion_aux) > 0){
            $inflacion =  floatval($inflacion_aux)/100 + 1;
        }else if( floatval($inflacion_aux) <= 0){
            $inflacion = 1;
        }

        for ($i = 1; $i <= 15; $i++) {
            if($i == 1){
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;
                $año_10_suma =  $dif_cost + $año_10_suma;
                $año_15_suma =  $dif_cost + $año_15_suma;

            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;
                $año_10_suma =  $dif_cost + $año_10_suma;
                $año_15_suma =  $dif_cost + $año_15_suma;


                if($i === 3){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_3);

                }

                if($i === 5){
                    $año_5_res =  $dif_cost;
                    $año_5_res_suma = $año_5_suma ;
                    $año_5 = intval($año_5_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_5);


                }

                if($i === 10){
                    $año_10_res =  $dif_cost;
                    $año_10_res_suma = $año_10_suma ;
                    $año_10 = intval($año_10_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_10);

                }

                if($i === 15){
                    $año_15_res =  $dif_cost;
                    $año_15_res_suma = $año_15_suma ;
                    $año_15 = intval($año_15_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_15);
                    //dd($array_res);
                }
//me quede checando la formula

            }
        }
        return response()->json($array_res);
    } */


     public function roi_s_ene($id_projecto,$dif_cost,$inv_ini,$dif_cost_c,$inv_ini_c){
        $funciones = new funciones();
        $array_a = [0,0,0,0];
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

        $tipo_mant_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->tipo_ambiente;

        $prot_cond_1 = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first()->proteccion_condensador;

        $tipo_mant_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_2_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',2)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $tipo_mant_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_3_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',3)
        ->where('solutions_project.num_sol','=',1)
        ->first();


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


        if($tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
            $array_b = $funciones->roi($dif_cost,$inflacion,$inv_ini,5);
        }else if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'cobre_cobre'){
            $array_b = $funciones->roi($dif_cost,$inflacion,$inv_ini,10);
        }else{
            $array_b = $funciones->roi($dif_cost,$inflacion,$inv_ini,15);
        }


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
        array_push($array_res,$array_a,$array_b,$array_c);

        return response()->json($array_res);
     }


    public function roi_base_a_retro_new_nojson($id_projecto,$dif_cost,$inv_ini){
    $array_res = [];
    $año_3 = 0;
    $año_3_res = 0;
    $año_3_suma = 0;
    $año_3_res_suma = 0;
    $año_5 = 0;
    $año_5_res = 0;
    $año_5_suma = 0;
    $año_5_res_suma = 0;
    $año_10 = 0;
    $año_10_res = 0;
    $año_10_suma = 0;
    $año_10_res_suma = 0;
    $año_15 = 0;
    $año_15_res = 0;
    $año_15_suma = 0;
    $año_15_res_suma = 0;
    $inflacion_aux = DB::table('projects')
    ->where('id','=',$id_projecto)
    ->first()->inflacion;
    $inv_ini = intval($inv_ini);
    $dif_cost_aux = $dif_cost;
    $cost_an_ene = DB::table('projects')
    ->where('id','=',$id_projecto)
    ->first()->inflacion;
    //ince_an_ene

    if( floatval($inflacion_aux) > 0){
        $inflacion =  floatval($inflacion_aux)/100 + 1;
    }else if( floatval($inflacion_aux) <= 0){
        $inflacion = 1;
    }

    for ($i = 1; $i <= 15; $i++) {
        if($i == 1){
            $año_3_suma =  $dif_cost + $año_3_suma;
            $año_5_suma =  $dif_cost + $año_5_suma;
            $año_10_suma =  $dif_cost + $año_10_suma;
            $año_15_suma =  $dif_cost + $año_15_suma;

        }else{

            $dif_cost = $dif_cost * $inflacion;
            $año_3_suma =  $dif_cost + $año_3_suma;
            $año_5_suma =  $dif_cost + $año_5_suma;
            $año_10_suma =  $dif_cost + $año_10_suma;
            $año_15_suma =  $dif_cost + $año_15_suma;


            if($i === 3){
                $año_3_res =  $dif_cost;
                $año_3_res_suma = $año_3_suma;
                $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                array_push($array_res,$año_3);

            }

            if($i === 5){
                $año_5_res =  $dif_cost;
                $año_5_res_suma = $año_5_suma ;
                $año_5 = intval($año_5_res_suma/$inv_ini * 100);
                array_push($array_res,$año_5);


            }

            if($i === 10){
                $año_10_res =  $dif_cost;
                $año_10_res_suma = $año_10_suma ;
                $año_10 = intval($año_10_res_suma/$inv_ini * 100);
                array_push($array_res,$año_10);

            }

            if($i === 15){
                $año_15_res =  $dif_cost;
                $año_15_res_suma = $año_15_suma ;
                $año_15 = intval($año_15_res_suma/$inv_ini * 100);
                array_push($array_res,$año_15);
                //dd($array_res);
            }
//me quede checando la formula

        }
    }
    return $array_res;
}

    public function roi_sumas_grafics($id_projecto,$dif_cost,$inv_ini){
            $array_res = [];
            $año_3 = 0;
            $año_3_res = 0;
            $año_3_suma = 0;
            $año_3_res_suma = 0;
            $año_5 = 0;
            $año_5_res = 0;
            $año_5_suma = 0;
            $año_5_res_suma = 0;
            $año_10 = 0;
            $año_10_res = 0;
            $año_10_suma = 0;
            $año_10_res_suma = 0;
            $año_15 = 0;
            $año_15_res = 0;
            $año_15_suma = 0;
            $año_15_res_suma = 0;
            $inflacion_aux = DB::table('projects')
            ->where('id','=',$id_projecto)
            ->first()->inflacion;
            $inv_ini = intval($inv_ini);
            $dif_cost_aux = $dif_cost;
            $cost_an_ene = DB::table('projects')
            ->where('id','=',$id_projecto)
            ->first()->inflacion;
            //ince_an_ene

            if( floatval($inflacion_aux) > 0){
                $inflacion =  floatval($inflacion_aux)/100 + 1;
            }else if( floatval($inflacion_aux) <= 0){
                $inflacion = 1;
            }

            for ($i = 1; $i <= 15; $i++) {
                if($i == 1){
                    $año_3_suma =  $dif_cost + $año_3_suma;
                    $año_5_suma =  $dif_cost + $año_5_suma;
                    $año_10_suma =  $dif_cost + $año_10_suma;
                    $año_15_suma =  $dif_cost + $año_15_suma;

                }else{

                    $dif_cost = $dif_cost * $inflacion;
                    $año_3_suma =  $dif_cost + $año_3_suma;
                    $año_5_suma =  $dif_cost + $año_5_suma;
                    $año_10_suma =  $dif_cost + $año_10_suma;
                    $año_15_suma =  $dif_cost + $año_15_suma;


                    if($i === 3){
                        $año_3_res =  $dif_cost;
                        $año_3_res_suma = $año_3_suma;
                        $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                        array_push($array_res,$año_3_res_suma);

                    }

                    if($i === 5){
                        $año_5_res =  $dif_cost;
                        $año_5_res_suma = $año_5_suma ;
                        $año_5 = intval($año_5_res_suma/$inv_ini * 100);
                        array_push($array_res,$año_5_res_suma);


                    }

                    if($i === 10){
                        $año_10_res =  $dif_cost;
                        $año_10_res_suma = $año_10_suma ;
                        $año_10 = intval($año_10_res_suma/$inv_ini * 100);
                        array_push($array_res,$año_10_res_suma);

                    }

                    if($i === 15){
                        $año_15_res =  $dif_cost;
                        $año_15_res_suma = $año_15_suma ;
                        $año_15 = intval($año_15_res_suma/$inv_ini * 100);
                        array_push($array_res,$año_15_res_suma);
                        //dd($array_res);
                    }
            //me quede checando la formula

                }
            }
    return $array_res;
    }

    public function roi_base_a($id_projecto,$dif_cost,$inv_ini){
        $array_res = [];
        $año_3 = 0;
        $año_3_res = 0;
        $año_3_suma = 0;
        $año_3_res_suma = 0;
        $año_5 = 0;
        $año_5_res = 0;
        $año_5_suma = 0;
        $año_5_res_suma = 0;
        $año_10 = 0;
        $año_10_res = 0;
        $año_10_suma = 0;
        $año_10_res_suma = 0;
        $año_15 = 0;
        $año_15_res = 0;
        $año_15_suma = 0;
        $año_15_res_suma = 0;
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        /* $inflacion =  $inflacion_aux/100 + 1; */
        $dif_cost_aux = $dif_cost;

        if( $inflacion_aux > 0){
            $inflacion =  $inflacion_aux/100 + 1;
        }else if( $inflacion_aux <= 0){
            $inflacion = 1;
        }
        for ($i = 1; $i <= 15; $i++) {
            if($i == 1){
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;
                $año_10_suma =  $dif_cost + $año_10_suma;
                $año_15_suma =  $dif_cost + $año_15_suma;
            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;
                $año_10_suma =  $dif_cost + $año_10_suma;
                $año_15_suma =  $dif_cost + $año_15_suma;

                if($i === 3){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma ;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_3);
                }

                if($i === 5){
                    $año_5_res =  $dif_cost;
                    $año_5_res_suma = $año_5_suma ;
                    $año_5 = intval($año_5_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_5);
                }

                if($i === 10){
                    $año_10_res =  $dif_cost;
                    $año_10_res_suma = $año_10_suma ;
                    $año_10 = intval($año_10_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_10);
                }

                if($i === 15){
                    $año_15_res =  $dif_cost;
                    $año_15_res_suma = $año_15_suma ;
                    $año_15 = intval($año_15_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_15);
                }
            }
        }
        return response()->json($array_res);
    }

    public function roi_base_a_pdf($id_projecto,$dif_cost,$inv_ini){
        $array_res = [];
        $año_3 = 0;
        $año_3_res = 0;
        $año_3_suma = 0;
        $año_3_res_suma = 0;
        $año_5 = 0;
        $año_5_res = 0;
        $año_5_suma = 0;
        $año_5_res_suma = 0;
        $año_10 = 0;
        $año_10_res = 0;
        $año_10_suma = 0;
        $año_10_res_suma = 0;
        $año_15 = 0;
        $año_15_res = 0;
        $año_15_suma = 0;
        $año_15_res_suma = 0;
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        /* $inflacion =  $inflacion_aux/100 + 1; */
        $dif_cost_aux = $dif_cost;

        if( $inflacion_aux > 0){
            $inflacion =  $inflacion_aux/100 + 1;
        }else if( $inflacion_aux <= 0){
            $inflacion = 1;
        }
        for ($i = 1; $i <= 15; $i++) {
            if($i == 1){
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;
                $año_10_suma =  $dif_cost + $año_10_suma;
                $año_15_suma =  $dif_cost + $año_15_suma;
            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;
                $año_10_suma =  $dif_cost + $año_10_suma;
                $año_15_suma =  $dif_cost + $año_15_suma;

                if($i === 3){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma ;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_3);
                }

                if($i === 5){
                    $año_5_res =  $dif_cost;
                    $año_5_res_suma = $año_5_suma ;
                    $año_5 = intval($año_5_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_5);
                }

                if($i === 10){
                    $año_10_res =  $dif_cost;
                    $año_10_res_suma = $año_10_suma ;
                    $año_10 = intval($año_10_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_10);
                }

                if($i === 15){
                    $año_15_res =  $dif_cost;
                    $año_15_res_suma = $año_15_suma ;
                    $año_15 = intval($año_15_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_15);
                }
            }
        }
        return $array_res;
    }

    public function roi_base_a_pdf_retro($id_projecto,$dif_cost,$inv_ini){

        $array_res = [];
        $año_1 = 0;
        $año_1_res = 0;
        $año_1_suma = 0;
        $año_1_res_suma = 0;
        $año_2 = 0;
        $año_2_res = 0;
        $año_2_suma = 0;
        $año_2_res_suma = 0;
        $año_3 = 0;
        $año_3_res = 0;
        $año_3_suma = 0;
        $año_3_res_suma = 0;
        $año_4 = 0;
        $año_4_res = 0;
        $año_4_suma = 0;
        $año_4_res_suma = 0;
        $año_5 = 0;
        $año_5_res = 0;
        $año_5_suma = 0;
        $año_5_res_suma = 0;
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        /* $inflacion =  $inflacion_aux/100 + 1; */
        $dif_cost_aux = $dif_cost;

        if( $inflacion_aux > 0){
            $inflacion =  $inflacion_aux/100 + 1;
        }else if( $inflacion_aux <= 0){
            $inflacion = 1;
        }
        for ($i = 1; $i <= 5; $i++) {
            if($i == 1){

                $dif_cost = $dif_cost * $inflacion;
                $año_1_suma =  $dif_cost + $año_1_suma;
                $año_2_suma =  $dif_cost + $año_2_suma;
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_4_suma =  $dif_cost + $año_4_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;
                $año_1_res =  $dif_cost;
                    $año_1_res_suma = $año_1_suma ;
                    $año_1 = intval($año_1_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_1);
            }else{

                $dif_cost = $dif_cost * $inflacion;
                $año_1_suma =  $dif_cost + $año_1_suma;
                $año_2_suma =  $dif_cost + $año_2_suma;
                $año_3_suma =  $dif_cost + $año_3_suma;
                $año_4_suma =  $dif_cost + $año_4_suma;
                $año_5_suma =  $dif_cost + $año_5_suma;

                if($i == 2){
                    $año_2_res =  $dif_cost;
                    $año_2_res_suma = $año_2_suma ;
                    $año_2 = intval($año_2_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_2);
                }

                if($i == 3){
                    $año_3_res =  $dif_cost;
                    $año_3_res_suma = $año_3_suma ;
                    $año_3 = intval($año_3_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_3);
                }

                if($i == 4){
                    $año_4_res =  $dif_cost;
                    $año_4_res_suma = $año_4_suma ;
                    $año_4 = intval($año_4_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_4);
                }

                if($i == 5){
                    $año_5_res =  $dif_cost;
                    $año_5_res_suma = $año_5_suma ;
                    $año_5 = intval($año_5_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_5);
                }

                /* if($i == 5){
                    $año_5_res =  $dif_cost;
                    $año_5_res_suma = $año_5_suma ;
                    $año_5 = intval($año_5_res_suma/$inv_ini * 100);
                    array_push($array_res,$año_5);
                } */
            }
        }
        return $array_res;
    }

    public function desp_energy($id_project,$energy_star,$ashrae,$eui_base,$electricidad){


        $area = DB::table('projects')
            ->where('projects.id','=',$id_project)
            ->first()->area;

        $unidad = DB::table('projects')
            ->where('projects.id','=',$id_project)
            ->first()->unidad;

        $energy_star_base = $eui_base - $energy_star ;
       /*  (energy_star_base*2000*10.764/3.412)*0.12 */
        /* energy_star_base*2000*10.764 */
        //vallidar pies cuadrados
        if($unidad == 'mc'){
            $area_mc = $area * 10.764;
            $mult_res = $energy_star_base * $area_mc;
        }

        if($unidad == 'ft'){
            $mult_res = $energy_star_base * $area;
        }
         $div_res_base_parent_1 = $mult_res / 3.412;
         $res_base = $div_res_base_parent_1 * $electricidad;


        return $res_base;
    }

    public function desp_ashrae($id_project,$energy_star,$ashrae,$eui_base,$electricidad){

        $area = DB::table('projects')
            ->where('projects.id','=',$id_project)
            ->first()->area;

        $unidad = DB::table('projects')
            ->where('projects.id','=',$id_project)
            ->first()->unidad;

        $ashrae_sol = $eui_base - $ashrae;
       /*  (ashrae*2000*10.764/3.412)*0.12 */
        /* ashrae*2000*10.764 */
        if($unidad == 'mc'){
            $area_mc = floatval($area) * 10.764;
            $mult_res = $ashrae_sol * $area_mc;
        }

        if($unidad == 'ft'){
            $mult_res = $ashrae_sol * floatval($area);
        }
         $div_res_base_parent_1 = $mult_res / 3.412;
         $res_base = $div_res_base_parent_1 * $electricidad;


        return $res_base;
    }

    public function conf_val($id,$enf,$num_sol,$sumacapterm){

        $sols_enf = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$enf)
        ->get();

        $arry_tots=[];

        if(count($sols_enf) === 1){
            $solution = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id)
            ->where('solutions_project.num_enf','=',$enf)
            ->where('solutions_project.num_sol','=',$num_sol)
            ->first();

            $sol = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id)
            ->where('solutions_project.num_enf','=',$enf)
            ->where('solutions_project.num_sol','=',$num_sol)
            ->first()->confort;



            if($solution->type_p == 2 || $solution->type_p == 3){ //retrofit
                if($solution->mantenimiento == 'ASHRAE 180'){
                    $z = 0.015;
                }

                if($solution->mantenimiento == 'Deficiente'){
                    $z = 0.03;
                }

                if($solution->mantenimiento == 'Sin Mantenimiento'){
                    $z = 0.052;
                }

                //(1-Z)
                $uno_m_zeta = 1-$z;

                //(1-Z)^Años de vida)
                $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($solution->yrs_vida));
                    if($solution->num_enf == 1){
                        //solucion existente
                        /* $sol_Res = $sol * 1.15 * $uno_m_zeta_yrs_life; */
                        $sol_Res = $sol * $uno_m_zeta_yrs_life;
                    }

                    if($solution->num_enf == 2 || $solution->num_enf == 3){
                        $sol_Res = $sol * $uno_m_zeta_yrs_life;
                    }

                return $sol_Res;
            }

            if($solution->type_p == 1 || $solution->type_p == 0){ //nuevo_proyecto
                return $sol;
            }
        }

        if(count($sols_enf) === 2 || count($sols_enf) === 3 ){


            for ($i = 1; $i <= count($sols_enf); $i++) {
                $suma_tr = 0;
                $indi_confort = 0;
                $total_base = 0;
                $tr_sol = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id)
                ->where('solutions_project.num_enf','=',$enf)
                ->where('solutions_project.num_sol','=',$i)
                ->first()->capacidad_tot;

                foreach($sols_enf as $sol){
                    $suma_tr = $suma_tr + $sol->capacidad_tot;
                }

                $confort_sol = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id)
                ->where('solutions_project.num_enf','=',$enf)
                ->where('solutions_project.num_sol','=',$i)
                ->first()->confort;

                //x = (1 * Tr / tr_total_sols );

                $res_100_x_tr = 1 * $tr_sol;
                $indice_conf = $res_100_x_tr / $sumacapterm;

                $tota_conft_sol = $indice_conf * $confort_sol;

                array_push($arry_tots,number_format($tota_conft_sol,1));

              }
              if(count($sols_enf) == 3){
                $val_text = $arry_tots[0].'_'.$arry_tots[1].'_'.$arry_tots[2];
                $val_res = $arry_tots[0] + $arry_tots[1] + $arry_tots[2];
                return $val_res;
              }

              if(count($sols_enf) == 2){
                $val_text = $arry_tots[0].'_'.$arry_tots[1];
                $val_res = $arry_tots[0] + $arry_tots[1];
                return $val_res;
            }
        }
    }

    public function prod_lab($id,$enf,$num_sol,$sumacapterm){

        $sols_enf = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$enf)
        ->get();

        $arry_tots=[];

        if(count($sols_enf) === 1){
            $sol = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id)
            ->where('solutions_project.num_enf','=',$enf)
            ->where('solutions_project.num_sol','=',$num_sol)
            ->first()->confort;

            return floatval($sol);
        }
    }

    public function all_paises(){
        $all_paises = DB::table('pais')
        ->orderBy('pais.pais', 'asc')
        ->get();

        return $all_paises;
    }

    public function check_pais($pais){
        $pais = DB::table('paises_empresas')
        ->where('paises_empresas.pais','=',$pais)
        ->where('paises_empresas.id_empresa','=',Auth::user()->id_empresa)
        ->first();

        return $pais;
    }

    public function send_marcas(){
        $marcas = DB::table('marcas_empresa')
        ->where('marcas_empresa.id_empresa','=',Auth::user()->id_empresa)
        ->get();

        return response()->json($marcas);
    }

    public function send_marcas_equipo($value){

        $marcas = DB::table('marcas_empresa')
        ->where('marcas_empresa.equipo','=',intval($value))
        ->where('marcas_empresa.id_empresa','=',Auth::user()->id_empresa)
        ->get();

        return response()->json($marcas);
    }

    public function send_modelos($value){
        $marcas = DB::table('modelos_empresa')
        ->where('modelos_empresa.id_marca','=',$value)
        ->get();

        return response()->json($marcas);
    }

    public function check_marca($id){
        $marca = DB::table('marcas_empresa')
        ->where('marcas_empresa.id','=',$id)
        ->first();

        return response()->json($marca);
    }

    public function send_modelos_datalist($value,$equipo){
        $id_marca = DB::table('marcas_empresa')
        ->where('marcas_empresa.marca','=',$value)
        ->where('marcas_empresa.equipo','=',$equipo)
        ->where('marcas_empresa.id_empresa','=',Auth::user()->id_empresa)
        ->first();

        $modelos = DB::table('modelos_empresa')
        ->where('modelos_empresa.id_empresa','=',Auth::user()->id_empresa)
        ->where('modelos_empresa.id_marca','=',$id_marca->id)
        ->get();

        return response()->json($modelos);
    }


    public function send_efi($value){
        $marca = DB::table('modelos_empresa')
        ->where('modelos_empresa.id','=',$value)
        ->first();

        return $marca->eficiencia;
    }


    public function store_new_marc($value){
        $new_marc = new MarcasEmpresaModel;
        $new_marc->marca = $value;
        $new_marc->id_empresa = Auth::user()->id_empresa;
        $new_marc->save();


        return $new_marc;
    }

    /* public function store_new_model($marca,$modelo,$eficiencia){
        $check_modelo = DB::table('modelos_empresa')
        ->where('modelos_empresa.modelo','=',$modelo)
        ->first();

        if($check_modelo){
            return false;
        }else{
            $new_model = new ModelosEmpresaModel;
            $new_model->modelo = $modelo;
            $new_model->id_marca = $marca;
            if($eficiencia  == 'IPLV'){
                $eficiencia = 'IPLV (Kw/TR)';

            }
            $new_model->eficiencia = $eficiencia;
            $new_model->save();
        }
} */


public function store_new_model($marca,$modelo,$eficiencia,$equipo){
    if($marca == 'empty'){
        $value = 'vacio marca';
        return false;
    }

    if($marca !== 'empty'){ //si marca es diferente a vacio
        //buscar marca
        $check_m = DB::table('marcas_empresa')
        ->where('marcas_empresa.id_empresa','=',Auth::user()->id_empresa)
        ->where('marcas_empresa.marca','=',$marca)
        ->where('marcas_empresa.equipo','=',$equipo)
        ->first();

        if($check_m){ //si encontro marca
            //check_modelo
            if($modelo == 'empty'){
                return false;
            }

            if($modelo !== 'empty'){
                $check_modelo = DB::table('modelos_empresa')
                ->where('modelos_empresa.id_empresa','=',Auth::user()->id_empresa)
                ->where('modelos_empresa.modelo','=',$modelo)
                ->where('modelos_empresa.id_marca','=',$check_m->id)
                ->first();

                if($check_modelo){
                    return false;
                }else{

                    $new_model = new ModelosEmpresaModel;
                    $new_model->modelo = $modelo;
                    $new_model->id_empresa = Auth::user()->id_empresa;
                    $new_model->id_marca = $check_m->id;
                    if($eficiencia == 'IPLV'){
                        $new_model->eficiencia = 'IPLV (Kw/TR)';
                    }else{
                        $new_model->eficiencia = $eficiencia;
                    }
                    $new_model->save();
                }
            }
        }else{ // si no eocntro marca
            $new_marc = new MarcasEmpresaModel; //nueva marca
            $new_marc->marca = $marca;
            $new_marc->equipo = $equipo;
            $new_marc->id_empresa = Auth::user()->id_empresa;
            $new_marc->id_user = Auth::user()->id;
            $new_marc->save();
            //check_modelo
            if($modelo == 'empty'){
                return false;
            }

            if($modelo !== 'empty'){
                $check_modelo = DB::table('modelos_empresa')
                ->where('modelos_empresa.id_empresa','=',Auth::user()->id_empresa)
                ->where('modelos_empresa.modelo','=',$modelo)
                ->first();

                if($check_modelo){
                    return false;
                }else{
                    $new_model = new ModelosEmpresaModel;
                    $new_model->modelo = $modelo;
                    $new_model->id_empresa = Auth::user()->id_empresa;
                    $new_model->id_marca = $check_m->id;
                    if($eficiencia == 'IPLV'){
                        $new_model->eficiencia = 'IPLV (Kw/TR)';
                    }else{
                        $new_model->eficiencia = $eficiencia;
                    }
                    $new_model->save();
                }
            }
        }

    }


}


    public function cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$check_chiller){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){
/*         return ProjectController::form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
 */        $funciones = new funciones();
           return $funciones->form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
        }

        if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
/*             return ProjectController::form_pn_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
 */            $funciones = new funciones();
               return $funciones->form_pn_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
        }

    }


    /* public function form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m){

        //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
        //((TR /3.5) x (Cooling Hours) x (Costo Energía) / IPVL)/ 1000
       //((TR x cant)
       if($eficiencia_ene != 'IPVL'){
        $cant_aux = 12000;
       }

       if($eficiencia_ene == 'IPVL'){
        $cant_aux = 3.5;
       }
       $res_trx_cant = $tr * $cant_aux;
       //((TR x cant) x (Cooling Hours)
       $res_1er_parent = $res_trx_cant * $cooling_hrs;
       //((TR x 12000) x (Cooling Hours)  / (SEER) )
       $tot_1er_res = $res_1er_parent / $eficiencia_cant;
       $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;

       //((TR x cant) x (Cooling Hours) / (SEER) ) / 1000)

       //energia aplicada proccess
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

       //(Fórmula Energía x Factor S)
        $res_1_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_s);


       $res_2_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_d);

       $res_3_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_t);

       $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
       $res_res =  $res_parent_1 * $factor_c;



       if($t_e === "pa_pi_te"){
           if($factor_m==='ASHRAE 180'){
               $factor_m = 1.2;
           }

           if($factor_m==='Deficiente'){
               $factor_m = 1.15;
           }

           if($factor_m==='Sin Mantenimiento'){
               $factor_m = 1.2;
           }
       }else{
           if($factor_m==='ASHRAE 180'){
               $factor_m = 0.99;
           }

           if($factor_m==='Deficiente'){
               $factor_m = 1.11;
           }

           if($factor_m==='Sin Mantenimiento'){
               $factor_m = 1.18;
           }
       }


       $res_res_fact_m =  $res_res * $factor_m;

       return $res_res_fact_m;
    } */

    /* public function form_pn_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m){

        if($eficiencia_ene == 'IPVL'){
            //(TR x IPLV x Cooling Hours) / 0.75
            //(TR x IPLV x Cooling Hours)
            $mult = $tr * $eficiencia_cant * $cooling_hrs;
            //(Res) / 0.75
             $res_ene_apl_tot_enf_1 = $mult / 0.75;
        }
        if($eficiencia_ene == 'EER'){
            //(TR x (12/EER) x Cooling Hours) / 0.75
            //(12/EER)
            $doce_div_err = 12 / $eficiencia_cant;
            //(TR x (12/EER) x Cooling Hours)
            $mult = $tr * $doce_div_err * $cooling_hrs;
             //(Res) / 0.75
            $res_ene_apl_tot_enf_1 = $mult / 0.75;
        }


        //((TR x cant) x (Cooling Hours) / (SEER) ) / 1000)


       //energia aplicada proccess
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

       //(Fórmula Energía x Factor S)

        $res_1_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_s);


       $res_2_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_d);

       $res_3_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_t);

       $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
       $res_res =  $res_parent_1 * $factor_c;



       if($t_e === "pa_pi_te"){
           if($factor_m==='ASHRAE 180'){
               $factor_m = 1.2;
           }

           if($factor_m==='Deficiente'){
               $factor_m = 1.15;
           }

           if($factor_m==='Sin Mantenimiento'){
               $factor_m = 1.2;
           }
       }else{
           if($factor_m==='ASHRAE 180'){
               $factor_m = 0.99;
           }

           if($factor_m==='Deficiente'){
               $factor_m = 1.11;
           }

           if($factor_m==='Sin Mantenimiento'){
               $factor_m = 1.18;
           }
       }


       $res_res_fact_m =  $res_res * $factor_m;

       return $res_res_fact_m;

    } */



     public function cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$check_chiller){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){
           $funciones = new funciones();
           return $funciones->cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        }

        if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
           $funciones = new funciones();
           return $funciones->cost_op_an_form_kw_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        }
     }

     /* public function cost_op_an_form_kw_chiller(){
        if($eficiencia_ene == 'IPVL'){
         //((Kw / 3.54) x IPLV x Cooling Hours) / 0.75

         //(Kw / 3.54)
         $kw_div_tres_punto_cinco_cuatro = $kw / 3.54;
         //(Res x IPLV x Cooling Hours)
         $mult = $kw_div_tres_punto_cinco_cuatro * $eficiencia_cant * $cooling_hrs;
          //(Res / 0.75
         $res_div_seer_a =  $mult / 0.75;
        }

        if($eficiencia_ene == 'EER'){
         //((Kw/3.54) x (12/EER) x Cooling Hours) / 0.75

         //(Kw / 3.54)
         $kw_div_tres_punto_cinco_cuatro = $kw / 3.54;
         //(12/EER)
         $doce_div_err = 12 / $eficiencia_cant;
         //((Kw / 3.54) x IPLV x Cooling Hours)
          $mult = $kw_div_tres_punto_cinco_cuatro * $doce_div_err * $cooling_hrs;
         //Res / 0.75
          $res_div_seer_a =  $mult / 0.75;
        }

        //energia aplicada proccess
               //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

               //(Fórmula Energía x Factor S)
               $res_1_parent1= $res_div_seer_a * floatval($factor_s);
               // (Fórmula Energía x Factor D)
               $res_2_parent1= $res_div_seer_a * floatval($factor_d);
                   //(Fórmula Energía x Factor T)
               $res_3_parent1= $res_div_seer_a * floatval($factor_t);
//((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
               $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
  //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
               $res_res =  $res_parent_1 *  $factor_c;

               if($t_e === "pa_pi_te"){
                   if($factor_m==='ASHRAE 180'){
                       $factor_m = 1.2;
                   }

                   if($factor_m==='Deficiente'){
                       $factor_m = 1.15;
                   }

                   if($factor_m==='Sin Mantenimiento'){
                       $factor_m = 1.2;
                   }
               }else{
                   if($factor_m==='ASHRAE 180'){
                       $factor_m = 0.99;
                   }

                   if($factor_m==='Deficiente'){
                       $factor_m = 1.11;
                   }

                   if($factor_m==='Sin Mantenimiento'){
                       $factor_m = 1.18;
                   }
               }
               $res_res_fact_m =  $res_res * $factor_m;
               return $res_res_fact_m;
  } */

  /* public function cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m){
    //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                      //(((Kw / 3.5)
                      //$kw =  $solution_enf1->capacidad_tot;

                      $kw_3_5 = $kw / 3.5;
                      //(((Kw / 3.5) x 12000 )
                      $kw_a = $kw_3_5 * 12000;
                      $res_dividiendo = $kw_a * $cooling_hrs;
                      //(((Kw / 3.5) x 12000 )x (Cooling Hours)
                      $res_div_seer = $res_dividiendo / $eficiencia_cant;
                      //(((Kw / 3.5) x 12000 )x (Cooling Hours)  / SEER
                      $res_div_seer_a = $res_div_seer / 1000;
                      //(((Kw / 3.5) x 12000 )x (Cooling Hours)  / SEER ) / 1000

       //energia aplicada proccess
                      //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                      //(Fórmula Energía x Factor S)
                      $res_1_parent1= $res_div_seer_a * floatval($factor_s);
                      // (Fórmula Energía x Factor D)
                      $res_2_parent1= $res_div_seer_a * floatval($factor_d);
                          //(Fórmula Energía x Factor T)
                      $res_3_parent1= $res_div_seer_a * floatval($factor_t);
      //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                      $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
         //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                      $res_res =  $res_parent_1 *  $factor_c;

                      if($t_e === "pa_pi_te"){
                          if($factor_m==='ASHRAE 180'){
                              $factor_m = 1.2;
                          }

                          if($factor_m==='Deficiente'){
                              $factor_m = 1.15;
                          }

                          if($factor_m==='Sin Mantenimiento'){
                              $factor_m = 1.2;
                          }
                      }else{
                          if($factor_m==='ASHRAE 180'){
                              $factor_m = 0.99;
                          }

                          if($factor_m==='Deficiente'){
                              $factor_m = 1.11;
                          }

                          if($factor_m==='Sin Mantenimiento'){
                              $factor_m = 1.18;
                          }
                      }
                      $res_res_fact_m =  $res_res * $factor_m;
                      return $res_res_fact_m;
         } */

  public function cost_op_an_form_ab($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$cost_energ){
        //((TR x 12000) x (Cooling Hours) x (Costo Energía) / SEER )/ 1000


        $cant_aux = 12000;

        $res_trx_cant = $tr * $cant_aux;
        //(RES) x (Cooling Hours) x (Costo Energía)
        $mult = $res_trx_cant * $cooling_hrs * $cost_energ;

        $mult_div_efi = $mult / $eficiencia_cant;

        $res_ene_apl_tot_enf_1 = $mult_div_efi / 1000;

        //((TR x cant) x (Cooling Hours)



        //energia aplicada proccess
        //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

        //(Fórmula Energía x Factor S)

         /* (((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C) x Factor M */
         $res_1_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_s);


        $res_2_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_d);

        $res_3_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_t);

        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
        $res_res =  $res_parent_1 * $factor_c;



        if($t_e === "pa_pi_te"){
            if($factor_m==='ASHRAE 180'){
                $factor_m = 1.2;
            }

            if($factor_m==='Deficiente'){
                $factor_m = 1.15;
            }

            if($factor_m==='Sin Mantenimiento'){
                $factor_m = 1.2;
            }
        }else{
            if($factor_m==='ASHRAE 180'){
                $factor_m = 0.99;
            }

            if($factor_m==='Deficiente'){
                $factor_m = 1.11;
            }

            if($factor_m==='Sin Mantenimiento'){
                $factor_m = 1.18;
            }
        }


        $res_res_fact_m =  $res_res * $factor_m;

        return $res_res_fact_m;
     }

     public function cost_op_an_form_kw_ab($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$cost_energ){
        // (((Kw / 3.5) x 12000 ) x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

        //(Kw / 3.5)
        $cant_aux = 3.5;
        $cant_aux_mul_12000 = $cant_aux * 12000;
        //(RES) x (Cooling Hours) x (Costo Energía)
        $mult = $cant_aux_mul_12000 * $cooling_hrs * $cost_energ;

        $mult_div_efi = $mult / $eficiencia_cant;

        $res_ene_apl_tot_enf_1 = $mult_div_efi / 1000;

        //((TR x cant) x (Cooling Hours)



        //energia aplicada proccess
        //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

        //(Fórmula Energía x Factor S)

         /* (((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C) x Factor M */
         $res_1_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_s);


        $res_2_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_d);

        $res_3_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_t);

        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
        $res_res =  $res_parent_1 * $factor_c;



        if($t_e === "pa_pi_te"){
            if($factor_m==='ASHRAE 180'){
                $factor_m = 1.2;
            }

            if($factor_m==='Deficiente'){
                $factor_m = 1.15;
            }

            if($factor_m==='Sin Mantenimiento'){
                $factor_m = 1.2;
            }
        }else{
            if($factor_m==='ASHRAE 180'){
                $factor_m = 0.99;
            }

            if($factor_m==='Deficiente'){
                $factor_m = 1.11;
            }

            if($factor_m==='Sin Mantenimiento'){
                $factor_m = 1.18;
            }
        }


        $res_res_fact_m =  $res_res * $factor_m;

        return $res_res_fact_m;
     }

     public function cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$check_chiller){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){
           return ResultadosController::form_proyect_no_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        }

        if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
            return ResultadosController::form_proyect_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        }

    }

    public function form_proyect_no_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l){

        //(((Kw / 3.5) x 12000 )x (Cooling Hours)) / (SEER x (1-Z)^Años de vida)) / 1000
                          //(((Kw / 3.5)
                          //$kw =  $solution_enf1->capacidad_tot;

                          $kw_3_5 = $kw / 3.5;
                          //(((Kw / 3.5) x 12000 )
                          $kw_a = $kw_3_5 * 12000;
                          $res_dividiendo = $kw_a * $cooling_hrs;
                          //(((Kw / 3.5) x 12000 )x (Cooling Hours)
                          //(SEER x (1-Z)^Años de vida) )
                            //valor de Z
                            if($factor_m == 'ASHRAE 180'){
                                $z = 0.015;
                            }

                            if($factor_m == 'Deficiente'){
                                $z = 0.03;
                            }

                            if($factor_m == 'Sin Mantenimiento'){
                                $z = 0.052;
                            }

                            //(1-Z)
                            $uno_m_zeta = 1-$z;

                            //(1-Z)^Años de vida)
                            $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
                            //(SEER x (1-Z)^Años de vida) )
                            $efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;

                          $res_div_seer = $res_dividiendo / $efi_z_yrs_l;
                          //(((Kw / 3.5) x 12000 )x (Cooling Hours)  / SEER
                          $res_div_seer_a = $res_div_seer / 1000;
                          //(((Kw / 3.5) x 12000 )x (Cooling Hours)  / SEER ) / 1000

           //energia aplicada proccess
                          //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                          //(Fórmula Energía x Factor S)
                          $res_1_parent1= $res_div_seer_a * floatval($factor_s);
                          // (Fórmula Energía x Factor D)
                          $res_2_parent1= $res_div_seer_a * floatval($factor_d);
                              //(Fórmula Energía x Factor T)
                          $res_3_parent1= $res_div_seer_a * floatval($factor_t);
          //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                          $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
             //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                          $res_res =  $res_parent_1 *  $factor_c;

                          if($t_e === "pa_pi_te"){
                              if($factor_m==='ASHRAE 180'){
                                  $factor_m = 1.2;
                              }

                              if($factor_m==='Deficiente'){
                                  $factor_m = 1.15;
                              }

                              if($factor_m==='Sin Mantenimiento'){
                                  $factor_m = 1.2;
                              }
                          }else{
                              if($factor_m==='ASHRAE 180'){
                                  $factor_m = 0.99;
                              }

                              if($factor_m==='Deficiente'){
                                  $factor_m = 1.11;
                              }

                              if($factor_m==='Sin Mantenimiento'){
                                  $factor_m = 1.18;
                              }
                          }
                          $res_res_fact_m =  $res_res * $factor_m;
                          return $res_res_fact_m;
    }

    public function form_proyect_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l){

        if($factor_m == 'ASHRAE 180'){
            $z = 0.015;
        }

        if($factor_m == 'Deficiente'){
            $z = 0.025;
        }

        if($factor_m == 'Sin Mantenimiento'){
            $z = 0.045;
        }

        if($eficiencia_ene == 'IPLV'){
            //((Kw/3.54) x ( IPLV / (1-(Z x Años de vida)) x Cooling Hours)
             //((Kw/3.54)
            $kw_3_5 = $kw / 3.54;
            //(Z x Años de vida)
            $z_mul_yrs_l = $z * $yrs_l;
            //(1-(Z x Años de vida))
            $uno_m_zeta = 1 - $z_mul_yrs_l;
            //( IPLV / (1-(Z x Años de vida))
            $uno_m_zeta_div_efi = $eficiencia_cant / $uno_m_zeta;

            $res_div_seer_a = $kw_3_5 * $uno_m_zeta_div_efi * $cooling_hrs;
           }

           if($eficiencia_ene == 'EER'){
            //((Kw/3.54) x (12/(EER x (1-Z)^Años de vida)) x Cooling Hours) /0.75
            $kw_3_5 = $kw / 3.54;
            //(1-Z)
            $uno_m_zeta = 1-$z;
            //(1-Z)^Años de vida)
            $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
            //(EER x (1-Z)^Años de vida)
            $efi_mult_uno_m_zeta_yrs_life =  $eficiencia_cant * $uno_m_zeta_yrs_life;
            //(Kw/3.54) x (12/(EER x (1-Z)^Años de vida)) x Cooling Hours)
            $mult_all = $kw_3_5 * $efi_mult_uno_m_zeta_yrs_life * $cooling_hrs;

            $res_div_seer_a = $mult_all / 0.75;
           }

                          //(((Kw / 3.5) x 12000 )x (Cooling Hours)  / SEER ) / 1000

           //energia aplicada proccess
                          //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                          //(Fórmula Energía x Factor S)
                          $res_1_parent1= $res_div_seer_a * floatval($factor_s);
                          // (Fórmula Energía x Factor D)
                          $res_2_parent1= $res_div_seer_a * floatval($factor_d);
                              //(Fórmula Energía x Factor T)
                          $res_3_parent1= $res_div_seer_a * floatval($factor_t);
          //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                          $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
             //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                          $res_res =  $res_parent_1 *  $factor_c;

                          if($t_e === "pa_pi_te"){
                              if($factor_m==='ASHRAE 180'){
                                  $factor_m = 1.2;
                              }

                              if($factor_m==='Deficiente'){
                                  $factor_m = 1.15;
                              }

                              if($factor_m==='Sin Mantenimiento'){
                                  $factor_m = 1.2;
                              }
                          }else{
                              if($factor_m==='ASHRAE 180'){
                                  $factor_m = 0.99;
                              }

                              if($factor_m==='Deficiente'){
                                  $factor_m = 1.11;
                              }

                              if($factor_m==='Sin Mantenimiento'){
                                  $factor_m = 1.18;
                              }
                          }
                          $res_res_fact_m =  $res_res * $factor_m;
                          return $res_res_fact_m;
    }

    public function cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$check_chiller){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){
           return ResultadosController::form_proyect_retro_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        }

        if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
            return ResultadosController::form_proyect_retro_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        }

    }

    public function form_proyect_retro_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l){

        //((TR x 12000) x (Cooling Hours)  / (SEER x (1-Z)^Años de vida) )/ 1000
        //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
        //((TR /3.5) x (Cooling Hours) x (Costo Energía) / IPVL)/ 1000
       //((TR x cant)

        $cant_aux = 12000;

       $res_trx_cant = $tr * $cant_aux;
       //((TR x cant) x (Cooling Hours)
       $res_1er_parent = $res_trx_cant * $cooling_hrs;

       //((TR x 12000) x (Cooling Hours)  / (SEER x (1-Z)^Años de vida) ) )
       //(SEER x (1-Z)^Años de vida) )
       //valor de Z
       if($factor_m == 'ASHRAE 180'){
        $z = 0.015;
       }

       if($factor_m == 'Deficiente'){
        $z = 0.03;
       }

       if($factor_m == 'Sin Mantenimiento'){
        $z = 0.052;
       }

       //(1-Z)
       $uno_m_zeta = 1-$z;

       //(1-Z)^Años de vida)
       $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
       //(SEER x (1-Z)^Años de vida) )
       $efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;
       $tot_1er_res = $res_1er_parent / $efi_z_yrs_l;
       $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;

       //((TR x cant) x (Cooling Hours) / (SEER) ) / 1000)
       /* $res_ene_apl_tot_enf_1 */

       //energia aplicada proccess
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

       //(Fórmula Energía x Factor S)

        /* (((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C) x Factor M */
       $res_1_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_s);


        $res_2_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_d);

       $res_3_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_t);

       $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
       $res_res =  $res_parent_1 * $factor_c;



       if($t_e === "pa_pi_te"){
           if($factor_m==='ASHRAE 180'){
               $factor_m = 1.2;
           }

           if($factor_m==='Deficiente'){
               $factor_m = 1.15;
           }

           if($factor_m==='Sin Mantenimiento'){
               $factor_m = 1.2;
           }
       }else{
           if($factor_m==='ASHRAE 180'){
               $factor_m = 0.99;
           }

           if($factor_m==='Deficiente'){
               $factor_m = 1.11;
           }

           if($factor_m==='Sin Mantenimiento'){
               $factor_m = 1.18;
           }
       }


       $res_res_fact_m =  $res_res * $factor_m;

       return $res_res_fact_m;
    }

    public function form_proyect_retro_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l){

        if($factor_m == 'ASHRAE 180'){
            $z = 0.015;
        }

        if($factor_m == 'Deficiente'){
            $z = 0.025;
        }

        if($factor_m == 'Sin Mantenimiento'){
            $z = 0.045;
        }

    if($eficiencia_ene == 'IPLV'){

        //(TR x ( IPLV / (1-(Z x Años de vida)) x Cooling Hours) /0.75

        //z

        //(Z x Años de vida)
        $z_x_yrs_l = $z * $yrs_l;
        //(1-(Z x Años de vida))
        $z_x_yrs_l_mul_mns_1 = -1 * $z_x_yrs_l;
        //IPLV / (1-(Z x Años de vida)
        if($z_x_yrs_l_mul_mns_1 < 0 || $z_x_yrs_l_mul_mns_1 == -0){
            $iplv_div = $eficiencia_cant / 1;
        }

        if($z_x_yrs_l_mul_mns_1 > 0){
            $iplv_div = $eficiencia_cant / $z_x_yrs_l_mul_mns_1;
        }

        //(TR x ( IPLV / (1-(Z x Años de vida)) x Cooling Hours)
        $tr_mul_iplv_div_mul_cooling_hrs = $tr * $iplv_div * $cooling_hrs;

        //(TR x Res x Cooling Hours) /0.75
        $res_ene_apl_tot_enf_1 = $tr_mul_iplv_div_mul_cooling_hrs / 0.75;

}

if($eficiencia_ene == 'EER'){
    //(TR x (12/(EER x (1-Z)^Años de vida)) x Cooling Hours) /0.75

        //(1-Z)
    $uno_m_zeta = 1-$z;

    //(1-Z)^Años de vida)
    $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
    //(EER x (1-Z)^Años de vida
    $efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;
    //(12/(EER x (1-Z)^Años de vida))
    $twelve_div_efi_z_yrs_l = 12 / $efi_z_yrs_l;
    //(TR x (12/(EER x (1-Z)^Años de vida)) x Cooling Hours)
    $tr_mul_twelve_div_efi_z_yrs_l_mul_cooling_hrs = $tr * $twelve_div_efi_z_yrs_l * $cooling_hrs;

    $res_ene_apl_tot_enf_1 = $tr_mul_twelve_div_efi_z_yrs_l_mul_cooling_hrs / 0.75;
}






    //energia aplicada proccess
    //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

    //(Fórmula Energía x Factor S)

        /* (((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C) x Factor M */
        $res_1_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_s);


        $res_2_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_d);

        $res_3_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_t);

        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
        $res_res =  $res_parent_1 * $factor_c;



        if($t_e === "pa_pi_te"){
            if($factor_m==='ASHRAE 180'){
                $factor_m = 1.2;
            }

            if($factor_m==='Deficiente'){
                $factor_m = 1.15;
            }

            if($factor_m==='Sin Mantenimiento'){
                $factor_m = 1.2;
            }
        }else{
            if($factor_m==='ASHRAE 180'){
                $factor_m = 0.99;
            }

            if($factor_m==='Deficiente'){
                $factor_m = 1.11;
            }

            if($factor_m==='Sin Mantenimiento'){
                $factor_m = 1.18;
            }
        }


        $res_res_fact_m =  $res_res * $factor_m;

        return $res_res_fact_m;
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

    public function calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1){

        if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador'
         || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'
         || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil'
         || $equipo_conf_1_1 === 'man_scholl_const' || $equipo_conf_1_1 === 'man_doa'
         || $equipo_conf_1_1 === 'fan_hsp_doa' || $equipo_conf_1_1 === 'man_doa_hr'
         || $equipo_conf_1_1 === 'fan_hsp_doa_hr'){

            $val_conf_equipo_1_1 = 4.5;

            if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador'){
                switch ($diseno_conf_1_1) {
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Descarga Directa Ductada':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
                      break;
                    case 'VAV y Retorno Ductado':
                        $val_conf_dis_1_1 = 4.5;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 5;
                       break;
                    default:
                  }
                //Dr
                switch ($dr_conf_1_1) {
                    case 'Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 5;
                      break;
                    case 'No Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 3;
                    break;
                    default:
                  }

                //control
                switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                    break;
                    case 'Termostato en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                    break;
                    case 'Termostato Inteligente en Zona':
                      $val_conf_crtl_1_1 = 5;
                    break;
                    case 'Termostato en Red / DDC en Zona':
                      $val_conf_crtl_1_1 = 5;
                    break;
                    default:
                }
                //mant
                switch ($mant_conf_1_1) {
                  case 'ASHRAE 180':
                      $val_conf_mant_1_1 = 2.5;
                    break;
                  case 'Deficiente':
                      $val_conf_mant_1_1 = 3.5;
                    break;
                    case 'Sin Mantenimiento':
                      $val_conf_mant_1_1 = 5;
                    break;

                  default:
                }
            }

            if($equipo_conf_1_1 === 'manejadora'){
                switch ($diseno_conf_1_1) {
                    case 'Descarga Directa Sin Ductar':
                        $val_conf_dis_1_1 = 2;
                      break;
                    case 'Descarga Directa Ductada':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
                    break;
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4.5;
                      break;
                    default:
                  }

                  switch ($dr_conf_1_1) {
                    case 'No Aplica':
                        $val_conf_dr_1_1 = 2;
                      break;
                    case 'Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 5;
                      break;
                      case 'No Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 3;
                      break;

                    default:
                  }

                  switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostato en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                      break;
                    case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;

                    default:
                  }
                  //mant
                  switch ($mant_conf_1_1) {
                    case 'ASHRAE 180':
                        $val_conf_mant_1_1 = 2.5;
                      break;
                    case 'Deficiente':
                        $val_conf_mant_1_1 = 3.5;
                      break;
                      case 'Sin Mantenimiento':
                        $val_conf_mant_1_1 = 5;
                      break;

                    default:
                  }
            }

            ///////////////fancoil////
            if($equipo_conf_1_1 === 'fancoil'){
                switch ($diseno_conf_1_1) {
                    case 'Descarga Directa Sin Ductar':
                        $val_conf_dis_1_1 = 2;
                      break;
                    case 'Descarga Directa Ductada':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4.5;
                      break;

                    default:
                  }

                  switch ($dr_conf_1_1) {
                    case 'No Aplica':
                        $val_conf_dr_1_1 = 2;
                      break;
                    case 'Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 5;
                      break;
                      case 'No Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 3;
                      break;

                    default:
                  }

                  switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostato en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                      break;
                    case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;

                    default:
                  }
                  //mant
                  switch ($mant_conf_1_1) {
                    case 'ASHRAE 180':
                        $val_conf_mant_1_1 = 2.5;
                      break;
                    case 'Deficiente':
                        $val_conf_mant_1_1 = 3.5;
                      break;
                      case 'Sin Mantenimiento':
                        $val_conf_mant_1_1 = 5;
                      break;

                    default:
                  }
            }

            //////////////////////////////////////////////
            if($equipo_conf_1_1 === 'man_doa' || $equipo_conf_1_1 === 'fan_hsp_doa'
            || $equipo_conf_1_1 === 'man_doa_hr' || $equipo_conf_1_1 === 'fan_hsp_doa_hr'){

                if($equipo_conf_1_1 === 'man_doa' || $equipo_conf_1_1 === 'man_doa_hr'){

                  switch ($diseno_conf_1_1) {
                      case 'Inyección y Retorno Ductado':
                          $val_conf_dis_1_1 = 4;
                        break;
                      case 'Ducto Flex. y Plenum Retorno':
                          $val_conf_dis_1_1 = 2.5;
                        break;
                      case 'Descarga Directa Ductada':
                          $val_conf_dis_1_1 = 3.5;
                        break;
                      case 'Basado en ASHRAE 90.1 - 2019':
                          $val_conf_dis_1_1 = 5;
                        break;
                      default:
                    }

              }

              if($equipo_conf_1_1 === 'fan_hsp_doa' || $equipo_conf_1_1 === 'fan_hsp_doa_hr'){

                switch ($diseno_conf_1_1) {
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
                      break;
                    case 'Ducto Flex. y Retorno Ductado':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 5;
                      break;
                    default:
                  }
              }

              switch ($dr_conf_1_1) {
                  case 'Cumple ASHRAE Standard 70':
                      $val_conf_dr_1_1 = 5;
                    break;
                  case 'No Cumple ASHRAE Standard 70':
                      $val_conf_dr_1_1 = 3;
                    break;
                  default:
                }

              //control
              switch ($t_control_conf_1_1) {
                  case 'Termostato Inteligente Fuera Zona':
                    $val_conf_crtl_1_1 = 2.5;
                  break;
                  case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
                  break;
                  case 'Termostato en Red / DDC en Zona':
                    $val_conf_crtl_1_1 = 5;
                  break;
                default:
            }
              //mant
              switch ($mant_conf_1_1) {
                case 'ASHRAE 180':
                    $val_conf_mant_1_1 = 2.5;
                  break;
                case 'Deficiente':
                    $val_conf_mant_1_1 = 3.5;
                  break;
                  case 'Sin Mantenimiento':
                    $val_conf_mant_1_1 = 5;
                  break;

                default:
              }

            }
            /////////////////////////////////////////////////
        if($equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){

            switch ($diseno_conf_1_1) {
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4.5;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                  break;
                default:
              }

              //control
              switch ($t_control_conf_1_1) {
                case 'Termostato Fuera Zona de Confort':
                    $val_conf_crtl_1_1 = 2.5;
                break;
                case 'Termostato en Zona de Confort':
                    $val_conf_crtl_1_1 = 4;
                break;
                case 'Termostato Inteligente en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                case 'Termostato en Red / DDC en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                default:
            }
                //dr
              switch ($dr_conf_1_1) {
                case 'No Aplica':
                    $val_conf_dr_1_1 = 2;
                  break;
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                  break;
                  case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                  break;

                default:
              }

              //mant
              switch ($mant_conf_1_1) {
                case 'ASHRAE 180':
                    $val_conf_mant_1_1 = 2.5;
                  break;
                case 'Deficiente':
                    $val_conf_mant_1_1 = 3.5;
                  break;
                  case 'Sin Mantenimiento':
                    $val_conf_mant_1_1 = 5;
                  break;

                default:
              }
        }

        if($equipo_conf_1_1 === 'man_scholl_const'){

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'VAV y Retorno Ductado':
                    $val_conf_dis_1_1 = 4.5;
                  break;
                default:
              }

              //control
              switch ($t_control_conf_1_1) {
                case 'Termostato Fuera Zona de Confort':
                    $val_conf_crtl_1_1 = 2.5;
                break;
                case 'Termostato en Zona de Confort':
                    $val_conf_crtl_1_1 = 4;
                break;
                case 'Termostato Inteligente en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                case 'Termostato en Red / DDC en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                default:
            }
                //dr
              switch ($dr_conf_1_1) {

                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                  break;
                  case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                  break;

                default:
              }
              //mant
              switch ($mant_conf_1_1) {
                case 'ASHRAE 180':
                    $val_conf_mant_1_1 = 2.5;
                  break;
                case 'Deficiente':
                    $val_conf_mant_1_1 = 3.5;
                  break;
                  case 'Sin Mantenimiento':
                    $val_conf_mant_1_1 = 5;
                  break;

                default:
              }
        }


        }


        if($equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp'){
            $val_conf_equipo_1_1 = 4.2;
            if($equipo_conf_1_1 === 'man'){

              switch ($diseno_conf_1_1) {
                  case 'Inyección y Retorno Ductado':
                      $val_conf_dis_1_1 = 4;
                    break;
                  case 'Ducto Flex. y Plenum Retorno':
                      $val_conf_dis_1_1 = 3;
                    break;
                  case 'Descarga Directa Ductada':
                      $val_conf_dis_1_1 = 2.5;
                    break;
                  case 'Basado en ASHRAE 90.1 - 2019':
                      $val_conf_dis_1_1 = 5;
                    break;
                  default:
                }

          }

          if($equipo_conf_1_1 === 'fancoil_hsp'){

            switch ($diseno_conf_1_1) {
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'Ducto Flex. y Retorno Ductado':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 2.5;
                  break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                  break;
                default:
              }
          }

          switch ($dr_conf_1_1) {
              case 'Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
              case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;
              default:
            }

          //control
          switch ($t_control_conf_1_1) {
              case 'Termostato Inteligente Fuera Zona':
                $val_conf_crtl_1_1 = 2.5;
              break;
              case 'Termostato Inteligente en Zona':
                $val_conf_crtl_1_1 = 5;
              break;
              case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
              break;
            default:
        }
          //mant
          switch ($mant_conf_1_1) {
            case 'ASHRAE 180':
                $val_conf_mant_1_1 = 2.5;
              break;
            case 'Deficiente':
                $val_conf_mant_1_1 = 3.5;
              break;
              case 'Sin Mantenimiento':
                $val_conf_mant_1_1 = 5;
              break;

            default:
          }

        }

        if($equipo_conf_1_1 === 'w_heat_rec'){
            $val_conf_equipo_1_1 = 4.65;
            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Descarga Directa Ductada':
                    $val_conf_dis_1_1 = 2.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'VAV y Retorno Ductado':
                    $val_conf_dis_1_1 = 4.5;
                  break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                   break;
                default:
              }
            //Dr
            switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                  break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                break;
                default:
              }

            //control
            switch ($t_control_conf_1_1) {
                case 'Termostato Fuera Zona de Confort':
                    $val_conf_crtl_1_1 = 2.5;
                break;
                case 'Termostato en Zona de Confort':
                    $val_conf_crtl_1_1 = 4;
                break;
                case 'Termostato Inteligente en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                case 'Termostato en Red / DDC en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                default:
            }
            //mant
            switch ($mant_conf_1_1) {
              case 'ASHRAE 180':
                  $val_conf_mant_1_1 = 2.5;
                break;
              case 'Deficiente':
                  $val_conf_mant_1_1 = 3.5;
                break;
                case 'Sin Mantenimiento':
                  $val_conf_mant_1_1 = 5;
                break;

              default:
            }
        }

        if($equipo_conf_1_1 === 'fancoil_lsp_spt' || $equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'ca' || $equipo_conf_1_1 === 'fancoil_lsp' || $equipo_conf_1_1 === 'vert'){
            $val_conf_equipo_1_1 = 4;
            ///////////////fancoil lsp spt////
            if($equipo_conf_1_1 === 'fancoil_lsp_spt'){
                switch ($diseno_conf_1_1) {
                    case 'Descarga Directa Sin Ductar':
                        $val_conf_dis_1_1 = 2;
                      break;
                    case 'Descarga Directa Ductada':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4.5;
                      break;

                    default:
                  }

                  switch ($dr_conf_1_1) {
                    case 'No Aplica':
                        $val_conf_dr_1_1 = 2;
                      break;
                    case 'Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 5;
                      break;
                      case 'No Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 3;
                      break;

                    default:
                  }

                  switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostato en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                      break;
                    case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;

                    default:
                  }
                  //mant
                  switch ($mant_conf_1_1) {
                    case 'ASHRAE 180':
                        $val_conf_mant_1_1 = 2.5;
                      break;
                    case 'Deficiente':
                        $val_conf_mant_1_1 = 3.5;
                      break;
                      case 'Sin Mantenimiento':
                        $val_conf_mant_1_1 = 5;
                      break;

                    default:
                  }
            }

            if($equipo_conf_1_1 === 'ca_pi_te'){
                switch ($diseno_conf_1_1) {
                    case 'Sin Unidad DOA':
                        $val_conf_dis_1_1 = 2.5;
                      break;

                    case 'Con Unidad DOA':
                        $val_conf_dis_1_1 = 3.5;
                      break;

                      case 'Unidad DOA + Heat Recovery':
                        $val_conf_dis_1_1 = 3.5;
                      break;

                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4;
                      break;
                    default:
                  }

                  switch ($t_control_conf_1_1) {
                      case 'Termostato Inteligente Fuera Zona':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                      case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;
                      case 'Termostato en Red / DDC en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;

                     default:
                  }

                  switch ($dr_conf_1_1) {
                    case 'No Aplica':
                        $val_conf_dr_1_1 = 2;
                      break;

                    default:
                  }

                   //mant
                   switch ($mant_conf_1_1) {
                    case 'ASHRAE 180':
                        $val_conf_mant_1_1 = 2.5;
                      break;
                    case 'Deficiente':
                        $val_conf_mant_1_1 = 3.5;
                      break;
                      case 'Sin Mantenimiento':
                        $val_conf_mant_1_1 = 5;
                      break;

                    default:
                  }
            }

            if($equipo_conf_1_1 === 'fancoil_lsp'){
                switch ($diseno_conf_1_1) {
                    case 'Sin Unidad DOA':
                        $val_conf_dis_1_1 = 2.5;
                      break;

                    case 'Con DOA y Descarga Ductada':
                        $val_conf_dis_1_1 = 3.8;
                      break;

                      case 'Unidad DOA + Heat Recovery':
                        $val_conf_dis_1_1 = 3.5;
                      break;

                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4.5;
                      break;
                    default:
                  }


                  switch ($t_control_conf_1_1) {
                    case 'Termostato Inteligente Fuera Zona':
                      $val_conf_crtl_1_1 = 2.5;
                    break;
                    case 'Termostato Inteligente en Zona':
                      $val_conf_crtl_1_1 = 5;
                    break;
                    case 'Termostato en Red / DDC en Zona':
                      $val_conf_crtl_1_1 = 5;
                    break;

                   default:
                }

              switch ($dr_conf_1_1) {
                case 'No Aplica':
                    $val_conf_dr_1_1 = 2;
                  break;
                  case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 4;
                  break;
                  case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                  break;
                default:
              }

              //mant
              switch ($mant_conf_1_1) {
                case 'ASHRAE 180':
                    $val_conf_mant_1_1 = 2.5;
                  break;
                case 'Deficiente':
                    $val_conf_mant_1_1 = 3.5;
                  break;
                  case 'Sin Mantenimiento':
                    $val_conf_mant_1_1 = 5;
                  break;

                default:
              }
            }

            if($equipo_conf_1_1 === 'ca'){
                switch ($diseno_conf_1_1) {
                    case 'Sin Unidad DOA':
                        $val_conf_dis_1_1 = 2.5;
                      break;

                    case 'Con Unidad DOA':
                        $val_conf_dis_1_1 = 3.5;
                      break;
                      case 'Unidad DOA + Heat Recovery':
                        $val_conf_dis_1_1 = 3.5;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4;
                      break;
                    default:
                  }

                  switch ($t_control_conf_1_1) {
                      case 'Termostato Inteligente Fuera Zona':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                      case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;
                      case 'Termostato en Red / DDC en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;

                     default:
                  }

                  switch ($dr_conf_1_1) {
                    case 'No Aplica':
                        $val_conf_dr_1_1 = 2;
                      break;

                    default:
                  }

                  //mant
              switch ($mant_conf_1_1) {
                case 'ASHRAE 180':
                    $val_conf_mant_1_1 = 2.5;
                  break;
                case 'Deficiente':
                    $val_conf_mant_1_1 = 3.5;
                  break;
                  case 'Sin Mantenimiento':
                    $val_conf_mant_1_1 = 5;
                  break;

                default:
              }
            }

            if($equipo_conf_1_1 === 'vert'){
                switch ($diseno_conf_1_1) {
                    case 'Descarga Ductada c/ MERV < 7':
                        $val_conf_dis_1_1 = 3.7;
                      break;

                    case 'Descarga Ductada c/ MERV > 7':
                        $val_conf_dis_1_1 = 4;
                      break;
                    default:
                  }


            switch ($t_control_conf_1_1) {
                case 'Termostato Fuera Zona de Confort':
                    $val_conf_crtl_1_1 = 2.5;
                  break;
                case 'Termostato en Zona de Confort':
                    $val_conf_crtl_1_1 = 4;
                  break;
                  case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 4.5;
                  break;

                default:
              }

              switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                  break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                  break;
                default:
              }

               //mant
               switch ($mant_conf_1_1) {
                case 'ASHRAE 180':
                    $val_conf_mant_1_1 = 2.5;
                  break;
                case 'Deficiente':
                    $val_conf_mant_1_1 = 3.5;
                  break;
                  case 'Sin Mantenimiento':
                    $val_conf_mant_1_1 = 5;
                  break;

                default:
              }

            }
        }

        if($equipo_conf_1_1 === 'duc_con' || $equipo_conf_1_1 === 'fan_hsp_scholl_const'){
            $val_conf_equipo_1_1 = 4.2;

            if($equipo_conf_1_1 === 'duc_con'){

                switch ($diseno_conf_1_1) {
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4.5;
                    break;
                    case 'Inyección Ductada y Plenum Retorno':
                            $val_conf_dis_1_1 = 4;
                    break;
                    default:
                }

                switch ($dr_conf_1_1) {
                    case 'No Aplica':
                            $val_conf_dr_1_1 = 2;
                    break;
                    default:
                }
                //control

                switch ($t_control_conf_1_1) {

                  case 'Termostato Inteligente Fuera Zona':
                      $val_conf_crtl_1_1 = 2.5;
                  break;
                  case 'Termostato Inteligente en Zona':
                      $val_conf_crtl_1_1 = 4.5;
                  break;

                  default:
                }
                //mant
                switch ($mant_conf_1_1) {
                  case 'ASHRAE 180':
                      $val_conf_mant_1_1 = 2.5;
                    break;
                  case 'Deficiente':
                      $val_conf_mant_1_1 = 3.5;
                    break;
                    case 'Sin Mantenimiento':
                      $val_conf_mant_1_1 = 5;
                    break;

                  default:
                }

              }

              if($equipo_conf_1_1 === 'fan_hsp_scholl_const'){

                switch ($diseno_conf_1_1) {
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                    break;
                    case 'Inyección y Retorno Flexible':
                        $val_conf_dis_1_1 = 3.5;
                    break;
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
                    break;
                      default:
                }

                switch ($dr_conf_1_1) {
                    case 'Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 5;
                      break;
                    case 'No Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 3;
                      break;
                    default:
                  }
                //control
                switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                    break;
                    case 'Termostato en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                    break;
                    case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                    break;
                    case 'Termostato en Red / DDC en Zona':
                        $val_conf_crtl_1_1 = 5;
                    break;
                    default:
                }
                //mant
                switch ($mant_conf_1_1) {
                  case 'ASHRAE 180':
                      $val_conf_mant_1_1 = 2.5;
                    break;
                  case 'Deficiente':
                      $val_conf_mant_1_1 = 3.5;
                    break;
                    case 'Sin Mantenimiento':
                      $val_conf_mant_1_1 = 5;
                    break;

                  default:
                }

              }
        }

        if($equipo_conf_1_1 === 'horz' || $equipo_conf_1_1 === 'pa_pi_te' || $equipo_conf_1_1 === 'cass'){
            $val_conf_equipo_1_1 = 3.5;
              if($equipo_conf_1_1 === 'horz'){
                  switch ($diseno_conf_1_1) {
                      case 'Filtros Aire MERV < 7':
                          $val_conf_dis_1_1 = 3.5;
                        break;

                      case 'Filtros Aire MERV > 7':
                          $val_conf_dis_1_1 = 3.8;
                        break;

                  default:
                    }

                    switch ($t_control_conf_1_1) {
                      case 'Termostato Interno':
                          $val_conf_crtl_1_1 = 3;
                        break;
                      case 'Termostato en Zona de Confort':
                          $val_conf_crtl_1_1 = 4;
                        break;
                      case 'Termostato Inteligente en Zona':
                          $val_conf_crtl_1_1 = 4.5;
                        break;

                      default:
                    }

              }

              if($equipo_conf_1_1 === 'pa_pi_te'){

                  switch ($diseno_conf_1_1) {
                      case 'Condensador Arriba':
                          $val_conf_dis_1_1 = 3.5;
                      break;

                      case 'Condensador Abajo':
                          $val_conf_dis_1_1 = 3.5;
                      break;
                      case 'Espalda con Espalda':
                          $val_conf_dis_1_1 = 3.5;
                      break;
                  default:
                  }

                  switch ($t_control_conf_1_1) {
                      case 'Termostato Interno':
                          $val_conf_crtl_1_1 = 3.3;
                      break;
                  default:
                }
              }

              switch ($dr_conf_1_1) {
                case 'No Aplica':
                    $val_conf_dr_1_1 = 2;
                  break;

                default:
              }

              switch ($mant_conf_1_1) {
                case 'ASHRAE 180':
                    $val_conf_mant_1_1 = 5;
                  break;
                case 'Deficiente':
                    $val_conf_mant_1_1 = 3.5;
                  break;
                  case 'Sin Mantenimiento':
                    $val_conf_mant_1_1 = 2.5;
                  break;

                default:
              }

          }

          if($equipo_conf_1_1 === 'cass'){

            $val_conf_equipo_1_1 = 3.8;

            switch ($diseno_conf_1_1) {
                case 'Condensador Arriba':
                    $val_conf_dis_1_1 = 3.5;
                break;

                case 'Condensador Abajo':
                    $val_conf_dis_1_1 = 3.5;
                break;

            default:
            }

          switch ($t_control_conf_1_1) {
            case 'Termostato Interno':
                $val_conf_crtl_1_1 = 3.3;
            break;
            case 'Termostato Inteligente en Zona':
                $val_conf_crtl_1_1 = 4;
            break;

            default:
          }

          switch ($dr_conf_1_1) {
            case 'No Aplica':
                $val_conf_dr_1_1 = 2;
              break;

            default:
          }

          switch ($mant_conf_1_1) {
            case 'ASHRAE 180':
                $val_conf_mant_1_1 = 5;
              break;
            case 'Deficiente':
                $val_conf_mant_1_1 = 3.5;
              break;
              case 'Sin Mantenimiento':
                $val_conf_mant_1_1 = 2.5;
              break;

            default:
          }
        }


        if($equipo_conf_1_1 === 'man_scholl_var'){

            $val_conf_equipo_1_1 = 4.5;

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'VAV y Retorno Ductado':
                    $val_conf_dis_1_1 = 4.5;
                break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                break;

            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
            break;
            default:
            }

            switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                break;
                default:
             }

          switch ($mant_conf_1_1) {
            case 'ASHRAE 180':
                $val_conf_mant_1_1 = 5;
              break;
            case 'Deficiente':
                $val_conf_mant_1_1 = 3.5;
              break;
              case 'Sin Mantenimiento':
                $val_conf_mant_1_1 = 2.5;
              break;

            default:
          }
        }

        if($equipo_conf_1_1 === 'fan_hsp_scholl_var'){

            $val_conf_equipo_1_1 = 4.2;

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 4.5;
                break;

            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
            break;
            default:
            }

            switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                break;
                default:
             }

          switch ($mant_conf_1_1) {
            case 'ASHRAE 180':
                $val_conf_mant_1_1 = 5;
              break;
            case 'Deficiente':
                $val_conf_mant_1_1 = 3.5;
              break;
              case 'Sin Mantenimiento':
                $val_conf_mant_1_1 = 2.5;
              break;

            default:
          }
        }

        if($equipo_conf_1_1 === 'chill_bean_scholl_var'){

            $val_conf_equipo_1_1 = 4.6;

            switch ($diseno_conf_1_1) {
                case 'Sistema Pasivo':
                    $val_conf_dis_1_1 = 3.5;
                break;
                case 'Sistema Activo':
                    $val_conf_dis_1_1 = 4.8;
                break;
            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
            break;
            default:
            }

            switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                break;
                default:
             }

          switch ($mant_conf_1_1) {
            case 'ASHRAE 180':
                $val_conf_mant_1_1 = 5;
              break;
            case 'Deficiente':
                $val_conf_mant_1_1 = 3.5;
              break;
              case 'Sin Mantenimiento':
                $val_conf_mant_1_1 = 2.5;
              break;

            default:
          }
        }

        if($equipo_conf_1_1 === 'man_scholl_tor_four_eta'){

            $val_conf_equipo_1_1 = 4.5;

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'VAV y Retorno Ductado':
                    $val_conf_dis_1_1 = 4.5;
                break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                break;

            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
            break;
            default:
            }

            switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                break;
                default:
             }

          switch ($mant_conf_1_1) {
            case 'ASHRAE 180':
                $val_conf_mant_1_1 = 5;
              break;
            case 'Deficiente':
                $val_conf_mant_1_1 = 3.5;
              break;
              case 'Sin Mantenimiento':
                $val_conf_mant_1_1 = 2.5;
              break;

            default:
          }
        }

        if($equipo_conf_1_1 === 'fan_hsp_tor_four_eta'){

            $val_conf_equipo_1_1 = 4.2;

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 4.5;
                break;

            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
            break;
            default:
            }

            switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                break;
                default:
             }

          switch ($mant_conf_1_1) {
            case 'ASHRAE 180':
                $val_conf_mant_1_1 = 5;
              break;
            case 'Deficiente':
                $val_conf_mant_1_1 = 3.5;
              break;
              case 'Sin Mantenimiento':
                $val_conf_mant_1_1 = 2.5;
              break;

            default:
          }
        }

        if($equipo_conf_1_1 === 'chill_bean_tor_four_eta'){

            $val_conf_equipo_1_1 = 4.6;

            switch ($diseno_conf_1_1) {
                case 'Sistema Pasivo':
                    $val_conf_dis_1_1 = 3.5;
                break;
                case 'Sistema Activo':
                    $val_conf_dis_1_1 = 4.8;
                break;
            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
            break;
            default:
            }

            switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                break;
                default:
             }

          switch ($mant_conf_1_1) {
            case 'ASHRAE 180':
                $val_conf_mant_1_1 = 5;
              break;
            case 'Deficiente':
                $val_conf_mant_1_1 = 3.5;
              break;
              case 'Sin Mantenimiento':
                $val_conf_mant_1_1 = 2.5;
              break;

            default:
          }
        }


        $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
        $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;

          return $nivel_confotr_1_1;
    }

    public function prim_buil_check($id){
        $proyect = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first();

        return $proyect;
    }

    public function delete_all_disp_sol_thre(){
        $solutions = DB::table('solutions_project')
        ->where('solutions_project.num_sol','=',3)
        ->get();
        /* foreach($solutions as $solution){
            $solution=SolutionsProjectModel::find($solution->id);
            $solution->delete();
        } */

        dd($solutions );

    }

    public function send_color($result){

        if($result > 500 || $result >  4000){
            $limite = 5000;
        }

        if($result > 4000 && $result < 5000  || $result > 4000 && $result < 8000){
            $limite = 10000;
        }

        $limite_5 = $limite / 5;

        if($limite_5 > $result){
            $color = 'green';
            return $color;
        }
        $limite_5 = $limite_5 + $limite_5;
        if($limite_5 > $result){
            $color = 'orange';
            return $color;
        }

        $limite_5 = $limite_5 + $limite_5 + $limite_5;
        if($limite_5 > $result){
            $color = 'yellow';
            return $color;
        }

        $limite_5 = $limite_5 + $limite_5 + $limite_5  + $limite_5;
        if($limite_5 > $result){
            $color = 'orange';
            return $color;
        }

        $limite_5 = $limite_5 + $limite_5 + $limite_5  + $limite_5 + $limite_5;
        if($limite_5 > $result){
            $color = 'red';
            return $color;
        }
        /*

        $limite_5_2 = $limite_5 + $limite_5;

        if($limite_5_2 < $result){
            $color = 'orange';
            return $color;
        }

        $limite_5_3 = $limite_5 + $limite_5 + $limite_5;

        if($limite_5_3 < $result){
            $color = 'orange';
            return $color;
        } */

    }

    public function personas($id_project,$prod_lab){
        $proyect = DB::table('projects')
        ->where('projects.id','=',$id_project)
        ->first();

        if($prod_lab > 0){

            if($prod_lab > 0 && $prod_lab < 1){
                $porcent_check1 = 0;
                $porcent_check2 = 0;
                $porcent_point1 = 0;
                $porcent_point2 = 0;
                }

            if($prod_lab >= 1 && $prod_lab < 2){
            $porcent_check1 = 0.25;
            $porcent_check2 = 0.20;
            $porcent_point1 = 1;
            $porcent_point2 = 2;
            }

            if($prod_lab >= 2 && $prod_lab < 3){
            $porcent_check1 = 0.20;
            $porcent_check2 = 0.15;
            $porcent_point1 = 2;
            $porcent_point2 = 3;
            }

            if($prod_lab >= 3 && $prod_lab < 4){
            $porcent_check1 = 0.15;
            $porcent_check2 = 0.10;
            $porcent_point1 = 3;
            $porcent_point2 = 4;
            }

            if($prod_lab >= 4 && $prod_lab < 5){
            $porcent_check1 = 0.10;
            $porcent_check2 = 0.05;
            $porcent_point1 = 4;
            $porcent_point2 = 5;
            }

            if($prod_lab >= 5){
                $porcent_check1 = 0.10;
                $porcent_check2 = 0.05;
                $porcent_point1 = 4;
                $porcent_point2 = 5;
                }

            //porcent_check1% + ((3.76-3) / (4 - 3)) x (porcent_check2% - porcent_check1%)

            //((3.76-3) / (4 - 3))

            //(3.76-porcent_point1)
            $trespuntosiete_m_point1 = $prod_lab-$porcent_point1;
            //(porcent_point2 - porcent_point1)
            $porcent_point2_m_porcent_point1 = $porcent_point2 - $porcent_point1;
            //(3.76-porcent_point1) / (porcent_point2 - porcent_point1)
            $div_porcents_poins = $trespuntosiete_m_point1 / $porcent_point2_m_porcent_point1;


            //(porcent_check2% - porcent_check1%)
            $porcent_check2_m_porcent_check1 =  $porcent_check2 - $porcent_check1;

            //((3.76-3) / (4 - 3)) x (porcent_check2% - porcent_check1%)
            //div_porcents_poins x porcent_check2_m_porcent_check1
            $mult_divporcentpoints_res_porsents_checks = $div_porcents_poins * $porcent_check2_m_porcent_check1;

            //porcent_check1% + ((3.76-3) / (4 - 3)) x (porcent_check2% - porcent_check1%)
            $sum_resultd = $porcent_check1 + $mult_divporcentpoints_res_porsents_checks;

            //porcent
            $result = $sum_resultd * 100;

            //personas
            //n_empleados*(result-5%)
            $menos_result = $sum_resultd - 0.05;
            $n_emppleados = $proyect->n_empleados * $menos_result;


            return  round($n_emppleados, 0, PHP_ROUND_HALF_UP);;
        }
            if($prod_lab <= 0){
                return 0;
            }




    }

    public function costo($personas,$id_project){
        $proyect = DB::table('projects')
        ->where('projects.id','=',$id_project)
        ->first();

        $mult = $personas * $proyect->sal_an_prom;
        return intval($mult);
    }

    public function iplv(){
        $sols = DB::table('solutions_project')
        ->get();
        foreach($sols as $sol){
            if($sol->eficencia_ene == 'IPVL'){
                $udpate = SolutionsProjectModel::find($sol->id);
                $udpate->eficencia_ene = 'IPLV';
                $udpate->update();
            }
        }
        /* $projects = DB::table('projects')
        ->get();

        foreach($projects as $project){
            $check_type = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$project->id)
            ->first();

            if($check_type){

                if($check_type->eficencia_ene == 'IPVL'){
                    $update_sol->eficencia_ene= 'IPLV';
                    $update_sol->update();
                }else{

                }


            }

        } */

    }

    public function elimina_project_demo($id){

            $solutions_ids = DB::table('solutions_project')
             ->where('solutions_project.id_project','=',$id)
             ->get();

             $results_ids = DB::table('results_project')
             ->where('results_project.id_project','=',$id)
             ->get();


             foreach($solutions_ids as $solution){
                 $solution_del=SolutionsProjectModel::find($solution->id);
                 $solution_del->delete();
             }

             foreach($results_ids as $result){
                 $result_del=ResultsProjectModel::find($result->id);
                 $result_del->delete();
             }

                 $solution_del=ProjectsModel::find($id);
                 $solution_del->delete();

                 Auth::logout();


             if( $solution_del->delete()){

                return true;
             }else{
                 return false;
             }

    }

    public function capacidad($id_project,$solucion){
        $solution = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_project)
        ->first();

        return $solution;
    }
}
