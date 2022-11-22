<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;
use App\TipoEdificioModel;
use Illuminate\Support\Facades\Redirect;
use Excel;
use App\Imports\TypeEdificio;
class ResultadosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    public function getResultados(Request $request)
    {
        /* $file = $request->file('file');
        Excel::import(new TypeEdificio, $file); */

       /*  if(substr($_POST['pais'], 0, 1) == '-' || substr($_POST['ciudad'], 0, 1) == '-'){
            $region = 'No especificada.';
        }else{
            $region = $_POST['ciudad'].', '.$_POST['pais'].'.';
        }
 */

        $enfriamiento1 = intval($request->get('cUnidad_1_1'));
        $enfriamiento2 = intval($request->get('cUnidad_2_1'));
        $enfriamiento3 =intval($request->get('cUnidad_3_1'));

        $mew_project=new ProjectsModel;
        $mew_project->name=$request->get('name_pro');
        $mew_project->id_tipo_edificio=$request->get('tipo_edificio');
        $mew_project->id_cat_edifico=$request->get('cat_ed');
        $mew_project->area=$request->get('ar_project');
        $mew_project->unidad=$request->get('unidad');
        $mew_project->region=$request->get('pais');
        $mew_project->ciudad=$request->get('ciudad');
        $mew_project->porcent_hvac=$request->get('porcent_hvac');
        $mew_project->status=1;
        $mew_project->id_empresa=Auth::user()->id_empresa;
        $mew_project->id_user=Auth::user()->id;




        //guardar soluciones
        $sol_1_1 = intval($request->get('cUnidad_1_1'));
        $sol_1_2 = intval($request->get('cUnidad_1_2'));
        $sol_1_3 = intval($request->get('cUnidad_1_3'));

        //vars_ forms
        $factor_s = $request->get('lblCsTipo_1_1');
        $factor_d = floatval($request->get('csDisenio_1_1'));
        $factor_c = $request->get('tipo_control_1_1');
        $factor_t =floatval($request->get('dr_1_1'));

        if ($enfriamiento1 !== 0) {

            if ($sol_1_1 !== 0) {
                $solution_enf1=new SolutionsProjectModel;
                $solution_enf1->num_sol=1;
                $solution_enf1->num_enf	=1;
                $solution_enf1->unidad_hvac=$request->get('cUnidad_1_1');
                $solution_enf1->tipo_equipo	=$request->get('csTipo');
                $solution_enf1->tipo_diseño	=$request->get('csDisenio_1_1');
                $solution_enf1->capacidad_tot=floatval($request->get('capacidad_total'));
                $solution_enf1->unid_med=$request->get('unidad_capacidad_tot');

                $solution_enf1->costo_elec=floatval($request->get('costo_elec'));
                $solution_enf1->coolings_hours=intval($request->get('hrsEnfriado'));
                $solution_enf1->eficencia_ene=$request->get('csStd');
                $solution_enf1->eficencia_ene_cant=$request->get('csStd_cant_1_1');
                $solution_enf1->tipo_control=$request->get('tipo_control_1_1');

                $solution_enf1->name_disenio=$request->get('name_diseno_1_1');
                $solution_enf1->name_t_control=$request->get('name_t_control_1_1');
                $solution_enf1->dr_name=$request->get('dr_name_1_1');

                $solution_enf1->dr	=$request->get('dr_1_1');
                $solution_enf1->mantenimiento	=$request->get('csMantenimiento');
                $solution_enf1->val_aprox	=$request->get('cheValorS_1_1');
                $solution_enf1->status=1;
                $solution_enf1->id_empresa=Auth::user()->id_empresa;
                $solution_enf1->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf1->coolings_hours;
                $cost_energ =  $solution_enf1->costo_elec;
                $seer = floatval($request->get('csStd_cant_1_1'));

               if ($solution_enf1->unid_med == 'TR') {

                $tr =  $solution_enf1->capacidad_tot;
                //((TR x 12000)
                $res_trx_12000 = $tr * 12000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                $tot_1er_res = $res_1er_parent / $seer;
                $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)
                /* $res_ene_apl_tot_enf_1 */


                //energia aplicada proccess
                //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                //(Fórmula Energía x Factor S)


                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                $solution_enf1->cost_op_an = $res_res;
            }else if($solution_enf1->unid_med == 'KW'){
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                $kw =  $solution_enf1->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                $res_div_seer = $res_dividiendo / $seer;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                $res_div_seer_a = $res_div_seer / 1000;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

 //energia aplicada proccess
                //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                //(Fórmula Energía x Factor S)
                $res_1_parent1= $res_div_seer_a * $factor_s;
                // (Fórmula Energía x Factor D)
                $res_2_parent1= $res_div_seer_a * $factor_d;
                    //(Fórmula Energía x Factor T)
                $res_3_parent1= $res_div_seer_a * $factor_t;
//((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                $res_res =  $res_parent_1 *  $factor_c;

                $solution_enf1->cost_op_an =floatval(number_format($res_res,2, '.', ''));

                //$solution_enf1->cost_op_an = floatval(number_format($res_div_seer_a,2, '.', ''));

            }
            $mew_project->save();
            if( $mew_project->save()){
                $solution_enf1->id_project = $mew_project->id;
                $solution_enf1->save();
            }

            }

            if ($sol_1_2 !== 0) {
                $solution_enf2_2=new SolutionsProjectModel;
                $solution_enf2_2->num_sol = 2;
                $solution_enf2_2->num_enf = 1;
                $solution_enf2_2->unidad_hvac = $request->get('cUnidad_1_2');
                $solution_enf2_2->tipo_equipo	= $request->get('csTipo_1_2');
                $solution_enf2_2->tipo_diseño	= $request->get('csDisenio_1_2');
                $solution_enf2_2->capacidad_tot =floatval($request->get('capacidad_total_1_2'));
                $solution_enf2_2->unid_med = $request->get('unidad_capacidad_tot_1_2');

                $solution_enf2_2->name_disenio=$request->get('name_diseno_1_2');
                $solution_enf2_2->name_t_control=$request->get('name_t_control_1_2');
                $solution_enf2_2->dr_name=$request->get('dr_name_1_2');


                $solution_enf2_2->costo_elec = floatval($request->get('costo_elec_1_2'));
                $solution_enf2_2->coolings_hours = $request->get('hrsEnfriado_1_2');
                $solution_enf2_2->eficencia_ene = $request->get('csStd_1_2');
                $solution_enf2_2->eficencia_ene_cant = $request->get('csStd_cant_1_2');
                $solution_enf2_2->tipo_control = $request->get('tipo_control_1_2');

                $solution_enf2_2->dr = $request->get('dr_1_2');
                $solution_enf2_2->mantenimiento = $request->get('csMantenimiento_1_2');
                $solution_enf2_2->val_aprox = $request->get('cheValorS_1_2');
                $solution_enf2_2->status = 1;
                $solution_enf2_2->id_empresa=Auth::user()->id_empresa;
                $solution_enf2_2->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf2_2->coolings_hours;
                $cost_energ =  $solution_enf2_2->costo_elec;
                $seer = $solution_enf2_2->eficencia_ene_cant;

               if ($solution_enf2_2->unid_med == 'TR') {

                $tr =  $solution_enf1->capacidad_tot;
                //((TR x 12000)
                $res_trx_12000 = $tr * 12000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                $tot_1er_res = $res_1er_parent / $seer;
                $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)


                //energia aplicada proccess
                //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                //(Fórmula Energía x Factor S)
                $factor_s = $request->get('lblCsTipo_1_2');
                $factor_d = floatval($request->get('csDisenio_1_2'));
                $factor_c = $request->get('tipo_control_1_2');
                $factor_t =floatval($request->get('dr_1_2'));

                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                $solution_enf2_2->cost_op_an = $res_res;
            }else if($solution_enf2_2->unid_med == 'KW'){
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                  $kw =  $solution_enf2_2->capacidad_tot;
                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                  $res_div_seer = $res_dividiendo / $seer;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                  $res_div_seer_a = $res_div_seer / 1000;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

                  //energia aplicada proccess
                //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                //(Fórmula Energía x Factor S)
                $res_1_parent1= $res_div_seer_a * $factor_s;
                // (Fórmula Energía x Factor D)
                $res_2_parent1= $res_div_seer_a * $factor_d;
                    //(Fórmula Energía x Factor T)
                $res_3_parent1= $res_div_seer_a * $factor_t;
//((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                $res_res =  $res_parent_1 *  $factor_c;

                $solution_enf2_2->cost_op_an =floatval(number_format($res_res,2, '.', ''));

                }
            $mew_project->save();
            if( $mew_project->save()){
                $solution_enf2_2->id_project = $mew_project->id;
                $solution_enf2_2->save();
            }

            }



//////////////sol 1 3
                if ($sol_1_3 !== 0) {
                    $solution_enf1_3=new SolutionsProjectModel;
                    $solution_enf1_3->num_sol = 3;
                    $solution_enf1_3->num_enf = 1;
                    $solution_enf1_3->unidad_hvac = $request->get('cUnidad_1_3');
                    $solution_enf1_3->tipo_equipo	= $request->get('csTipo_1_3');
                    $solution_enf1_3->tipo_diseño	= $request->get('csDisenio_1_3');
                    $solution_enf1_3->capacidad_tot =floatval($request->get('capacidad_total_1_3'));
                    $solution_enf1_3->unid_med = $request->get('unidad_capacidad_tot_1_3');

                    $solution_enf1_3->name_disenio=$request->get('name_diseno_1_3');
                    $solution_enf1_3->name_t_control=$request->get('name_t_control_1_3');
                    $solution_enf1_3->dr_name=$request->get('dr_name_1_3');

                    $solution_enf1_3->costo_elec = floatval($request->get('costo_elec_1_2'));
                    $solution_enf1_3->coolings_hours = $request->get('hrsEnfriado_1_3');
                    $solution_enf1_3->eficencia_ene = $request->get('csStd_1_3');
                    $solution_enf1_3->eficencia_ene_cant = $request->get('csStd_cant_1_3');
                    $solution_enf1_3->tipo_control = $request->get('tipo_control_1_3');

                    $solution_enf1_3->dr = $request->get('dr_1_3');
                    $solution_enf1_3->mantenimiento = $request->get('csMantenimiento_1_3');
                    $solution_enf1_3->val_aprox = $request->get('cheValorS_1_3');
                    $solution_enf1_3->status = 1;
                    $solution_enf1_3->id_empresa=Auth::user()->id_empresa;
                    $solution_enf1_3->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf1_3->coolings_hours;
                    $cost_energ =  $solution_enf1_3->costo_elec;
                    $seer = $solution_enf1_3->eficencia_ene_cant;

                if ($solution_enf1_3->unid_med == 'TR') {

                $tr =  $solution_enf1->capacidad_tot;
                //((TR x 12000)
                $res_trx_12000 = $tr * 12000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                $tot_1er_res = $res_1er_parent / $seer;
                $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)


                    //energia aplicada proccess
                    //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                    //(Fórmula Energía x Factor S)
                    $factor_s = $request->get('lblCsTipo_1_3');
                    $factor_d = floatval($request->get('csDisenio_1_3'));
                    $factor_c = $request->get('tipo_control_1_3');
                    $factor_t =floatval($request->get('dr_1_3'));

                    $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                    $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                    $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                    $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                    $res_res =  $res_parent_1 *  $factor_c;

                    $solution_enf1_3->cost_op_an = $res_res;
                }else if($solution_enf1_3->unid_med == 'KW'){
                      //(((Kw / 3.5)
                  $kw =  $solution_enf1_3->capacidad_tot;
                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                  $res_div_seer = $res_dividiendo / $seer;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                  $res_div_seer_a = $res_div_seer / 1000;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

                  //energia aplicada proccess
                //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                //(Fórmula Energía x Factor S)
                  $res_1_parent1= $res_div_seer_a * $factor_s;
                // (Fórmula Energía x Factor D)
                $res_2_parent1= $res_div_seer_a * $factor_d;
                    //(Fórmula Energía x Factor T)
                $res_3_parent1= $res_div_seer_a * $factor_t;
//((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                $res_res =  $res_parent_1 *  $factor_c;

                $solution_enf1_3->cost_op_an =floatval(number_format($res_res,2, '.', ''));
                }
                $mew_project->save();
                if( $mew_project->save()){
                    $solution_enf1_3->id_project = $mew_project->id;
                    $solution_enf1_3->save();
                }

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

        }

          //guardar soluciones
          $sol_2_1 = intval($request->get('cUnidad_2_1'));
          $sol_2_2 = intval($request->get('cUnidad_2_2'));
          $sol_2_3 = intval($request->get('cUnidad_2_3'));

        if ($enfriamiento2 !== 0) {

            if ($sol_2_1 !== 0) {
                $solution_enf2_1=new SolutionsProjectModel;
                $solution_enf2_1->num_sol=1;
                $solution_enf2_1->num_enf = 2;
                $solution_enf2_1->unidad_hvac=$request->get('cUnidad_2_1');
                $solution_enf2_1->tipo_equipo	=$request->get('cheTipo_2_1');
                $solution_enf2_1->tipo_diseño	=$request->get('cheDisenio_2_1');
                $solution_enf2_1->capacidad_tot=floatval($request->get('capacidad_total_2_1'));
                $solution_enf2_1->unid_med=$request->get('unidad_capacidad_tot_2_1');

                $solution_enf2_1->name_disenio=$request->get('name_diseno_2_1');
                $solution_enf2_1->name_t_control=$request->get('name_t_control_2_1');
                $solution_enf2_1->dr_name=$request->get('dr_name_2_1');

                $solution_enf2_1->costo_elec=floatval($request->get('costo_elec_2_1'));
                $solution_enf2_1->coolings_hours=$request->get('hrsEnfriado_2_1');
                $solution_enf2_1->eficencia_ene=$request->get('csStd_2_1');
                $solution_enf2_1->eficencia_ene_cant=floatval($request->get('csStd_cant_2_1'));
                $solution_enf2_1->tipo_control=$request->get('tipo_control_2_1');

                $solution_enf2_1->dr=$request->get('dr_2_1');
                $solution_enf2_1->mantenimiento	=$request->get('csMantenimiento_2_1');
                $solution_enf2_1->val_aprox	=$request->get('cheValorS_2_1');
                $solution_enf2_1->status=1;
                $solution_enf2_1->id_empresa=Auth::user()->id_empresa;
                $solution_enf2_1->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf2_1->coolings_hours;
                $cost_energ =  $solution_enf2_1->costo_elec;
                $seer = floatval($request->get('csStd_cant_2_1'));

               if ($solution_enf2_1->unid_med == 'TR') {

                $tr =  $solution_enf2_1->capacidad_tot;
                //((TR x 12000)
                $res_trx_12000 = $tr * 12000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                $tot_1er_res = $res_1er_parent / $seer;
                $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)
                /* $res_ene_apl_tot_enf_1 */


                //energia aplicada proccess
                //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                //(Fórmula Energía x Factor S)
                $factor_s = $request->get('lblCsTipo_2_1');
                $factor_d = floatval($request->get('cheDisenio_2_1'));
                $factor_c = $request->get('tipo_control_2_1');
                $factor_t =floatval($request->get('dr_2_1'));

                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                $solution_enf2_1->cost_op_an = $res_res;
            }else if($solution_enf2_1->unid_med == 'KW'){
                     //(((Kw / 3.5)
                     $kw =  $solution_enf2_1->capacidad_tot;
                     $kw_3_5 = $kw / 3.5;
                     //(((Kw / 3.5) x 12000 )
                     $kw_a = $kw_3_5 * 12000;
                     $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                     //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                     $res_div_seer = $res_dividiendo / $seer;
                     //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                     $res_div_seer_a = $res_div_seer / 1000;
                     //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

                                  //energia aplicada proccess
                        //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                        //(Fórmula Energía x Factor S)
                        $res_1_parent1= $res_div_seer_a * $factor_s;
                        // (Fórmula Energía x Factor D)
                        $res_2_parent1= $res_div_seer_a * $factor_d;
                            //(Fórmula Energía x Factor T)
                        $res_3_parent1= $res_div_seer_a * $factor_t;
        //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
            //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                        $res_res =  $res_parent_1 *  $factor_c;

                        $solution_enf2_1->cost_op_an =floatval(number_format($res_res,2, '.', ''));

                    }
            $mew_project->save();
            if( $mew_project->save()){
                $solution_enf2_1->id_project = $mew_project->id;
                $solution_enf2_1->save();
            }

            }

            if ($sol_2_2 !== 0) {
                $solution_enf2_2=new SolutionsProjectModel;
                $solution_enf2_2->num_sol = 2;
                $solution_enf2_2->num_enf = 2;
                $solution_enf2_2->unidad_hvac = $request->get('cUnidad_2_2');
                $solution_enf2_2->tipo_equipo = $request->get('cheTipo_2_2');
                $solution_enf2_2->tipo_diseño = $request->get('cheDisenio_2_2');
                $solution_enf2_2->capacidad_tot = floatval($request->get('capacidad_total_2_2'));
                $solution_enf2_2->unid_med = $request->get('unidad_capacidad_tot_2_2');

                $solution_enf2_2->name_disenio=$request->get('name_diseno_2_2');
                $solution_enf2_2->name_t_control=$request->get('name_t_control_2_2');
                $solution_enf2_2->dr_name=$request->get('dr_name_2_2');

                $solution_enf2_2->costo_elec = floatval($request->get('costo_elec_2_2'));
                $solution_enf2_2->coolings_hours = $request->get('hrsEnfriado_2_2');
                $solution_enf2_2->eficencia_ene = $request->get('csStd_2_2');
                $solution_enf2_2->eficencia_ene_cant = floatval($request->get('csStd_cant_2_2'));
                $solution_enf2_2->tipo_control = $request->get('tipo_control_2_2');

                $solution_enf2_2->dr = $request->get('dr_2_2');
                $solution_enf2_2->mantenimiento = $request->get('cheMantenimiento_2_2');
                $solution_enf2_2->val_aprox = $request->get('cheValorS_2_2');
                $solution_enf2_2->status = 1;
                $solution_enf2_2->id_empresa=Auth::user()->id_empresa;
                $solution_enf2_2->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf2_2->coolings_hours;
                $cost_energ =  $solution_enf2_2->costo_elec;
                $seer = $solution_enf2_2->eficencia_ene_cant;

               if ($solution_enf2_2->unid_med == 'TR') {

                $tr =  $solution_enf2_2->capacidad_tot;
                //((TR x 12000)
                $res_trx_12000 = $tr * 12000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                $tot_1er_res = $res_1er_parent / $seer;
                $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)


                //energia aplicada proccess
                //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                //(Fórmula Energía x Factor S)
                $factor_s = $request->get('lblCsTipo_2_2');
                $factor_d = floatval($request->get('cheDisenio_2_2'));
                $factor_c = $request->get('tipo_control_2_2');
                $factor_t =floatval($request->get('dr_2_2'));

                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                $solution_enf2_2->cost_op_an = $res_res;
            }else if($solution_enf2_2->unid_med == 'KW'){
                $kw =  $solution_enf2_2->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                $res_div_seer = $res_dividiendo / $seer;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                $res_div_seer_a = $res_div_seer / 1000;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

                             //energia aplicada proccess
                   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                   //(Fórmula Energía x Factor S)
                   $res_1_parent1= $res_div_seer_a * $factor_s;
                   // (Fórmula Energía x Factor D)
                   $res_2_parent1= $res_div_seer_a * $factor_d;
                       //(Fórmula Energía x Factor T)
                   $res_3_parent1= $res_div_seer_a * $factor_t;
   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                   $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                   $res_res =  $res_parent_1 *  $factor_c;

                   $solution_enf2_2->cost_op_an =floatval(number_format($res_res,2, '.', ''));
            }
            $mew_project->save();
            if( $mew_project->save()){
                $solution_enf2_2->id_project = $mew_project->id;
                $solution_enf2_2->save();
            }

            }



//////////////sol 2 3
                if ($sol_2_3 !== 0) {
                    $solution_enf2_3=new SolutionsProjectModel;
                    $solution_enf2_3->num_sol = 3;
                    $solution_enf2_3->num_enf = 2;
                    $solution_enf2_3->unidad_hvac = $request->get('cUnidad_2_3');
                    $solution_enf2_3->tipo_equipo	= $request->get('cheTipo_2_3');
                    $solution_enf2_3->tipo_diseño	= $request->get('cheDisenio_2_3');
                    $solution_enf2_3->capacidad_tot =floatval($request->get('capacidad_total_2_3'));
                    $solution_enf2_3->unid_med = $request->get('unidad_capacidad_tot_2_3');

                    $solution_enf2_3->name_disenio=$request->get('name_diseno_2_3');
                    $solution_enf2_3->name_t_control=$request->get('name_t_control_2_3');
                    $solution_enf2_3->dr_name=$request->get('dr_name_2_3');

                    $solution_enf2_3->costo_elec = floatval($request->get('costo_elec_2_3'));
                    $solution_enf2_3->coolings_hours = $request->get('hrsEnfriado_2_3');
                    $solution_enf2_3->eficencia_ene = $request->get('csStd_2_3');
                    $solution_enf2_3->eficencia_ene_cant = floatval($request->get('csStd_cant_2_3'));
                    $solution_enf2_3->tipo_control = $request->get('tipo_control_2_3');

                    $solution_enf2_3->dr = $request->get('dr_2_3');
                    $solution_enf2_3->mantenimiento = $request->get('cheMantenimiento_2_3');
                    $solution_enf2_3->val_aprox = $request->get('cheValorS_2_3');
                    $solution_enf2_3->status = 1;
                    $solution_enf2_3->id_empresa=Auth::user()->id_empresa;
                    $solution_enf2_3->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf2_3->coolings_hours;
                    $cost_energ =  $solution_enf2_3->costo_elec;
                    $seer = $solution_enf2_3->eficencia_ene_cant;

                if ($solution_enf2_3->unid_med == 'TR') {

                $tr =  $solution_enf2_3->capacidad_tot;
                //((TR x 12000)
                $res_trx_12000 = $tr * 12000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                $tot_1er_res = $res_1er_parent / $seer;
                $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)


                    //energia aplicada proccess
                    //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                    //(Fórmula Energía x Factor S)
                    $factor_s = $request->get('lblCsTipo_2_3');
                    $factor_d = floatval($request->get('cheDisenio_2_3'));
                    $factor_c = $request->get('tipo_control_2_3');
                    $factor_t =floatval($request->get('dr_2_3'));

                    $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                    $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                    $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                    $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                    $res_res =  $res_parent_1 *  $factor_c;

                    $solution_enf2_3->cost_op_an = $res_res;
                }else if($solution_enf2_3->unid_med == 'KW'){
                    $kw =  $solution_enf2_3->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                $res_div_seer = $res_dividiendo / $seer;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                $res_div_seer_a = $res_div_seer / 1000;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

                             //energia aplicada proccess
                   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                   //(Fórmula Energía x Factor S)
                   $res_1_parent1= $res_div_seer_a * $factor_s;
                   // (Fórmula Energía x Factor D)
                   $res_2_parent1= $res_div_seer_a * $factor_d;
                       //(Fórmula Energía x Factor T)
                   $res_3_parent1= $res_div_seer_a * $factor_t;
   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                   $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                   $res_res =  $res_parent_1 *  $factor_c;

                   $solution_enf2_3->cost_op_an =floatval(number_format($res_res,2, '.', ''));
                }
                $mew_project->save();
                if( $mew_project->save()){
                    $solution_enf2_3->id_project = $mew_project->id;
                    $solution_enf2_3->save();
                }

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

        }

           //guardar soluciones
           $sol_3_1 = intval($request->get('cUnidad_3_1'));
           $sol_3_2 = intval($request->get('cUnidad_3_2'));
           $sol_3_3 = intval($request->get('cUnidad_3_3'));

         if ($enfriamiento3 !== 0) {

             if ($sol_3_1 !== 0) {
                 $solution_enf3_1=new SolutionsProjectModel;
                 $solution_enf3_1->num_sol=1;
                 $solution_enf3_1->num_enf = 3;
                 $solution_enf3_1->unidad_hvac=$request->get('cUnidad_3_1');
                 $solution_enf3_1->tipo_equipo	=$request->get('cheTipo_3_1');
                 $solution_enf3_1->tipo_diseño	=$request->get('cheDisenio_3_1');
                 $solution_enf3_1->capacidad_tot=floatval($request->get('capacidad_total_3_1'));
                 $solution_enf3_1->unid_med=$request->get('unidad_capacidad_tot_3_1');

                 $solution_enf3_1->name_disenio=$request->get('name_diseno_3_1');
                 $solution_enf3_1->name_t_control=$request->get('name_t_control_3_1');
                 $solution_enf3_1->dr_name=$request->get('dr_name_3_1');

                 $solution_enf3_1->costo_elec=floatval($request->get('costo_elec_3_1'));
                 $solution_enf3_1->coolings_hours=$request->get('hrsEnfriado_3_1');
                 $solution_enf3_1->eficencia_ene=$request->get('csStd2_3_1');
                 $solution_enf3_1->eficencia_ene_cant=floatval($request->get('cheStd_3_1'));
                 $solution_enf3_1->tipo_control=$request->get('tipo_control_3_1');

                 $solution_enf3_1->dr=$request->get('dr_3_1');
                 $solution_enf3_1->mantenimiento	=$request->get('cheMantenimiento_3_1');
                 $solution_enf3_1->val_aprox	=$request->get('cheValorS_3_1');
                 $solution_enf3_1->status=1;
                 $solution_enf3_1->id_empresa=Auth::user()->id_empresa;
                 $solution_enf3_1->id_user=Auth::user()->id;


                 $cooling_hrs =  $solution_enf3_1->coolings_hours;
                 $cost_energ =  $solution_enf3_1->costo_elec;
                 $seer = floatval($request->get('cheStd_3_1'));

                if ($solution_enf3_1->unid_med == 'TR') {

                 $tr =  $solution_enf3_1->capacidad_tot;
                 //((TR x 12000)
                 $res_trx_12000 = $tr * 12000;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                 $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                 $tot_1er_res = $res_1er_parent / $seer;
                 $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)
                 /* $res_ene_apl_tot_enf_1 */


                 //energia aplicada proccess
                 //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                 //(Fórmula Energía x Factor S)
                 $factor_s = $request->get('lblCsTipo_3_1');
                 $factor_d = floatval($request->get('cheDisenio_3_1'));
                 $factor_c = $request->get('tipo_control_3_1');
                 $factor_t =floatval($request->get('dr_3_1'));

                 $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                 $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                 $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                 $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                 $res_res =  $res_parent_1 *  $factor_c;

                 $solution_enf3_1->cost_op_an = $res_res;
             }else if($solution_enf3_1->unid_med == 'KW'){
                $kw =  $solution_enf3_1->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                $res_div_seer = $res_dividiendo / $seer;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                $res_div_seer_a = $res_div_seer / 1000;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

                             //energia aplicada proccess
                   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                   //(Fórmula Energía x Factor S)
                   $res_1_parent1= $res_div_seer_a * $factor_s;
                   // (Fórmula Energía x Factor D)
                   $res_2_parent1= $res_div_seer_a * $factor_d;
                       //(Fórmula Energía x Factor T)
                   $res_3_parent1= $res_div_seer_a * $factor_t;
   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                   $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                   $res_res =  $res_parent_1 *  $factor_c;

                   $solution_enf3_1->cost_op_an =floatval(number_format($res_res,2, '.', ''));
             }
             $mew_project->save();
             if( $mew_project->save()){
                 $solution_enf3_1->id_project = $mew_project->id;
                 $solution_enf3_1->save();
             }

             }

             if ($sol_3_2 !== 0) {
                 $solution_enf3_2=new SolutionsProjectModel;
                 $solution_enf3_2->num_sol = 2;
                 $solution_enf3_2->num_enf = 3;
                 $solution_enf3_2->unidad_hvac = $request->get('cUnidad_3_2');
                 $solution_enf3_2->tipo_equipo = $request->get('cheTipo_3_2');
                 $solution_enf3_2->tipo_diseño = $request->get('cheDisenio_3_2');
                 $solution_enf3_2->capacidad_tot = floatval($request->get('capacidad_total_3_2'));
                 $solution_enf3_2->unid_med = $request->get('unidad_capacidad_tot_3_2');


                 $solution_enf3_2->name_disenio=$request->get('name_diseno_3_2');
                 $solution_enf3_2->name_t_control=$request->get('name_t_control_3_2');
                 $solution_enf3_2->dr_name=$request->get('dr_name_3_2');

                 $solution_enf3_2->costo_elec = floatval($request->get('costo_elec_3_2'));
                 $solution_enf3_2->coolings_hours = $request->get('hrsEnfriado_3_2');
                 $solution_enf3_2->eficencia_ene = $request->get('csStd_3_2');
                 $solution_enf3_2->eficencia_ene_cant =floatval($request->get('csStd_cant_3_2'));
                 $solution_enf3_2->tipo_control = $request->get('tipo_control_3_2');

                 $solution_enf3_2->dr = $request->get('dr_3_2');
                 $solution_enf3_2->mantenimiento = $request->get('cheMantenimiento_3_2');
                 $solution_enf3_2->val_aprox = $request->get('cheValorS2_3_2');
                 $solution_enf3_2->status = 1;
                 $solution_enf3_2->id_empresa=Auth::user()->id_empresa;
                 $solution_enf3_2->id_user=Auth::user()->id;


                 $cooling_hrs =  $solution_enf3_2->coolings_hours;
                 $cost_energ =  $solution_enf3_2->costo_elec;
                 $seer = $solution_enf3_2->eficencia_ene_cant;

                if ($solution_enf3_2->unid_med == 'TR') {

                 $tr =  $solution_enf3_2->capacidad_tot;
                 //((TR x 12000)
                 $res_trx_12000 = $tr * 12000;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                 $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                 $tot_1er_res = $res_1er_parent / $seer;
                 $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)


                 //energia aplicada proccess
                 //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                 //(Fórmula Energía x Factor S)
                 $factor_s = $request->get('lblCsTipo_3_2');
                 $factor_d = floatval($request->get('cheDisenio_3_2'));
                 $factor_c = $request->get('tipo_control_3_2');
                 $factor_t =floatval($request->get('dr_3_2'));

                 $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                 $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                 $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                 $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                 $res_res =  $res_parent_1 *  $factor_c;

                 $solution_enf3_2->cost_op_an = $res_res;
             }else if($solution_enf3_2->unid_med == 'KW'){
                $kw =  $solution_enf3_2->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                $res_div_seer = $res_dividiendo / $seer;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                $res_div_seer_a = $res_div_seer / 1000;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

                             //energia aplicada proccess
                   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                   //(Fórmula Energía x Factor S)
                   $res_1_parent1= $res_div_seer_a * $factor_s;
                   // (Fórmula Energía x Factor D)
                   $res_2_parent1= $res_div_seer_a * $factor_d;
                       //(Fórmula Energía x Factor T)
                   $res_3_parent1= $res_div_seer_a * $factor_t;
   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                   $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                   $res_res =  $res_parent_1 *  $factor_c;

                   $solution_enf3_2->cost_op_an =floatval(number_format($res_res,2, '.', ''));
             }
             $mew_project->save();
             if( $mew_project->save()){
                 $solution_enf3_2->id_project = $mew_project->id;
                 $solution_enf3_2->save();
             }

             }



 //////////////sol 3 3
                 if ($sol_3_3 !== 0) {
                     $solution_enf3_3=new SolutionsProjectModel;
                     $solution_enf3_3->num_sol = 3;
                     $solution_enf3_3->num_enf = 3;
                     $solution_enf3_3->unidad_hvac = $request->get('cUnidad_3_3');
                     $solution_enf3_3->tipo_equipo	= $request->get('cheTipo_3_3');
                     $solution_enf3_3->tipo_diseño	= $request->get('cheDisenio_3_3');
                     $solution_enf3_3->capacidad_tot = floatval($request->get('capacidad_total_3_3'));
                     $solution_enf3_3->unid_med = $request->get('unidad_capacidad_tot_3_3');


                     $solution_enf3_3->name_disenio=$request->get('name_diseno_3_3');
                    $solution_enf3_3->name_t_control=$request->get('name_t_control_3_3');
                    $solution_enf3_3->dr_name=$request->get('dr_name_3_3');

                     $solution_enf3_3->costo_elec = floatval($request->get('costo_elec_3_3'));
                     $solution_enf3_3->coolings_hours = $request->get('hrsEnfriado_3_3');
                     $solution_enf3_3->eficencia_ene = $request->get('csStd_3_3');
                     $solution_enf3_3->eficencia_ene_cant = floatval($request->get('cheStd_3_3'));
                     $solution_enf3_3->tipo_control = $request->get('tipo_control_3_3');

                     $solution_enf3_3->dr = $request->get('dr_3_3');
                     $solution_enf3_3->mantenimiento = $request->get('cheMantenimiento_3_3');
                     $solution_enf3_3->val_aprox = $request->get('cheValorS_3_3');
                     $solution_enf3_3->status = 1;
                     $solution_enf3_3->id_empresa=Auth::user()->id_empresa;
                     $solution_enf3_3->id_user=Auth::user()->id;


                     $cooling_hrs =  $solution_enf3_3->coolings_hours;
                     $cost_energ =  $solution_enf3_3->costo_elec;
                     $seer = $solution_enf3_3->eficencia_ene_cant;

                 if ($solution_enf3_3->unid_med == 'TR') {

                 $tr =  $solution_enf3_3->capacidad_tot;
                 //((TR x 12000)
                 $res_trx_12000 = $tr * 12000;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía)
                 $res_1er_parent = $res_trx_12000 * $cooling_hrs * $cost_energ;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) )
                 $tot_1er_res = $res_1er_parent / $seer;
                 $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)


                     //energia aplicada proccess
                     //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                     //(Fórmula Energía x Factor S)
                     $factor_s = $request->get('lblCsTipo_3_3');
                     $factor_d = floatval($request->get('cheDisenio_3_3'));
                     $factor_c = $request->get('tipo_control_3_3');
                     $factor_t =floatval($request->get('dr_3_3'));

                     $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                     $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                     $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                     $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                     $res_res =  $res_parent_1 *  $factor_c;

                     $solution_enf3_3->cost_op_an = $res_res;
                 }else if($solution_enf3_3->unid_med == 'KW'){
                    $kw =  $solution_enf3_3->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs * $cost_energ;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía)
                $res_div_seer = $res_dividiendo / $seer;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER
                $res_div_seer_a = $res_div_seer / 1000;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000

                             //energia aplicada proccess
                   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                   //(Fórmula Energía x Factor S)
                   $res_1_parent1= $res_div_seer_a * $factor_s;
                   // (Fórmula Energía x Factor D)
                   $res_2_parent1= $res_div_seer_a * $factor_d;
                       //(Fórmula Energía x Factor T)
                   $res_3_parent1= $res_div_seer_a * $factor_t;
   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                   $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                   $res_res =  $res_parent_1 *  $factor_c;

                   $solution_enf3_3->cost_op_an =floatval(number_format($res_res,2, '.', ''));
                 }
                 $mew_project->save();
                 if( $mew_project->save()){
                     $solution_enf3_3->id_project = $mew_project->id;
                     $solution_enf3_3->save();
                 }

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

        $mew_project->save();
         if( $mew_project->save()){
            $id_project = $mew_project->id;

            return Redirect::to('/project/' . $id_project);
            /* return view('results',['id_project'=>$id_project]); */
         }


        /* return view('resultados',[
            'cSize' => $_POST['cSize'],//tamanio de equipo valor numerico solucion 1
            'cSize2' => $_POST['cSize2'],//tamanio de equipo valor numerico solucion 2
            'cSize3' => $_POST['cSize3'],//tamanio de equipo valor numerico solucion 3
            'cUnidad' => $_POST['cUnidad'],//valor numerico de tipo de unidad en cooling
            'cUnidadLbl' => $_POST['cUnidadLbl'],//tipo de unidad en letras
            'cTarifa' => $_POST['cTarifa'],//valor numerico de tarifa en cooling
            'hrsEnfriado' => $_POST['hrsEnfriado'],//valor numerico horas de enfriado
            'csStd' => $_POST['lblCsStd'],//estandar en cooling-std en letras
            'csStdTipo' => $_POST['csStd'],//tipo de estandar, en numero, en enfriado estandar
            'csStdValue' => $_POST['csStdValue'],//cantidad del valor del estandar en cooling estandar solucion 1
            'csTipo' => $_POST['lblCsTipo'],//cooling standard tipo en letras
            'csTipoValue' => $_POST['csTipo'],//tipo de sistema, en numero, en enfriado estandar
            'csDisenio' => $_POST['csDisenio'],//coolig std disenio en numero
            'lblCsDisenio' => $_POST['lblCsDisenio'],//coolig std disenio en letras
            'csMantenimiento' => $_POST['csMantenimiento'],//coolig std mantenimiento en numero
            'lblCsMantenimiento' => $_POST['lblCsMantenimiento'],//coolig std mantenimiento en letras
            'cheValorS' => $_POST['cheValorS'],//valor en numero del tipo de cooling high

            ///////////////solucion 2 /////////////////
            'cheStd' => $_POST['cheStd'],//cantidad del standard cooling high solucion 2
            'cheTipo' => $_POST['lblCheTipo'],//valor en letras del tipo de cooling high solucion 2
            'cheTipoValue' => $_POST['cheTipo'],//valor en numero del tipo de cooling high solucion 2
            'cheValorS2' => $_POST['cheValorS2'],//valor en numero del tipo de cooling high solucion 2
            'cheDisenio' => $_POST['cheDisenio'],//coolig std disenio en numero solucion 2
            'lblCheDisenio' => $_POST['lblCheDisenio'],//coolig std disenio en letras solucion 2
            'cheMantenimiento' => $_POST['cheMantenimiento'],//coolig std mantenimiento en numero solucion 2
            'lblCheMantenimiento' => $_POST['lblCheMantenimiento'],//coolig std mantenimiento en letras solucion 2

             ///////////////solucion 3 /////////////////
             'cheStd3' => $_POST['cheStd3'],//cantidad del standard cooling high solucion 3
             'cheTipo3' => $_POST['lblCheTipo3'],//valor en letras del tipo de cooling high solucion 3
             'cheTipoValue3' => $_POST['cheTipo3'],//valor en numero del tipo de cooling high solucion 3
             'cheValorS3' => $_POST['cheValorS3'],//valor en numero del tipo de cooling high solucion 3
             'cheDisenio3' => $_POST['cheDisenio3'],//coolig std disenio en numero solucion 3
             'lblCheDisenio3' => $_POST['lblCheDisenio3'],//coolig std disenio en letras solucion 3
             'cheMantenimiento3' => $_POST['cheMantenimiento3'],//coolig std mantenimiento en numero solucion 3
             'lblCheMantenimiento3' => $_POST['lblCheMantenimiento3'],//coolig std mantenimiento en letras solucion 3

            // 'hSize' => $_POST['hSize'],//tamanio de equipo valor numerico
            // 'hUnidad' => $_POST['hUnidad'],//valor numerico de tipo de unidad en heating
            // 'hUnidadLbl' => $_POST['hUnidadLbl'],//tipo de unidad en letras
            // 'hTarifa' => $_POST['hTarifa'],//valor numerico de tarifa en heating
            // 'dDays' => $_POST['dDays'],//valor numerico de horas de calefaccion
            // 'hsTipo' => $_POST['lblHsTipo'],//tipo de sistema, en letras de  heating std
            // 'hsStd' => $_POST['hsStd'],//cantidad del estandar de heating standard
            // 'hheTipo' => $_POST['lblHheTipo'],//tipo de sistema en letras heating high
            // 'hheStd' => $_POST['hheStd'],//cantidad del estandard afue en heating high
            'region' => $region,
        ]); */


    }

    public function solutions($id){
        $solutions = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
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
        ->first();
        return $inv_ini->val_aprox;
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
                    $dif = $res / $cost_elec;
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

                    }
                    $res = $num_1 - $num_2;
                    return $res;
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
                    $dif = $res / $cost_elec;
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

                    return $res;
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

    public function result_area($id,$num_enf,$sumaopex,$tar_ele){
       $proj = DB::table('projects')
       ->where('projects.id','=',$id)
       ->first();

        $res = $sumaopex/$proj->area;
        return $res;
    }

    public function project(Request $request,$id_project){

        return view('resultados2',['id_project'=>$id_project]);
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
        ->first()->val_aprox;

        $area = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first()->area;

        $res =  $inv_ini/$area;
        return $res;
    }

    public function roi_ent_dif_inv($id,$num_enf,$yrs,$dif_1){
        $inv_ini_ba = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',1)
        ->select('solutions_project.val_aprox')
        ->first()->val_aprox;

        $inv_ini_a = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->select('solutions_project.val_aprox')
        ->first()->val_aprox;

        $invs_rest = $inv_ini_a - $inv_ini_ba;

      /*   (((dif_1 * yrs) – $invs_rest )/ $invs_rest) *100 */

        /* (dif_1 * 3) */
       $difx3= $dif_1 * $yrs;
        /* (dif_1 * 3) – $invs_rest ) */
        $difx3_rest_inv = $difx3 - $invs_rest;

        $div_difx3_rest_inv__invs_rest = $difx3_rest_inv/$invs_rest;

        $roi_res=$div_difx3_rest_inv__invs_rest*100;
        return $roi_res;
    }

    public function roi_inv_tot($yrs,$dif,$inv_ini){

        /* (((dif_1 * yrs) – inv_ini )/ inv_ini) *100 */
        /* (dif_1 * yrs) */
        $dif_yrs = $dif * $yrs;
        /* (dif_1 * yrs) */
        $dif_yrs_rest_inv_ini = $dif_yrs - $inv_ini;
            /* ((dif_1 * yrs) – inv_ini ) */
        $dif_yrs_rest_inv_ini_div__inv_div = $dif_yrs_rest_inv_ini / $inv_ini;
            /* ((dif_1 * yrs) – inv_ini )/ inv_ini) */
        $res =   $dif_yrs_rest_inv_ini_div__inv_div * 100;
           /*  (((dif_1 * yrs) – inv_ini )/ inv_ini) *100 */
        return $res;
    }

    public function red_en_mw($yrs,$dif){
        /* (dif * 3) /1,000 */
        $difx3 = $dif * $yrs;
        $difx3_div =  $difx3 / 1000;
        return $difx3_div;
    }

    public function red_hu_carb($yrs,$dif){
        /* (dif * 3) * 0.0007087 */
        $difx3 = $dif * $yrs;
        $difx3_div =  $difx3 * 0.0007087;
        return $difx3_div;
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

        return $tipo_edi->$ashrae;
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
        $porcent = $porcent_hvac/1000;

        $factor_consumo_e = $area_x_e_star_div_3 * $porcent;

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
        $par_1 = $inv_ini_x-$inv_ini_1;
        $res = $par_1 / $dif_cost;
        return $res;
    }
}
