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
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\TypeEdificio;
use App\Exports\CoolingCitiesExport;
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
        $enfriamiento1 = intval($request->get('cUnidad_1_1'));
        $enfriamiento2 = intval($request->get('cUnidad_2_1'));
        $enfriamiento3 =intval($request->get('cUnidad_3_1'));
        $mew_project = new ProjectsModel;
        $mew_project->name=$request->get('name_pro');
        $mew_project->id_tipo_edificio=$request->get('tipo_edificio');
        $mew_project->id_cat_edifico=$request->get('cat_ed');
        $mew_project->inflacion_rate=intval($request->get('inflation_rate'));
        $mew_project->inflacion=intval($request->get('inc_ene'));
        $hrs_tiempo = $request->get('tiempo_porcent');
        //horas tiempo
        switch ($hrs_tiempo) {
            case 'm_50':
                //si llega m_50 el valor es igual a 30 que es menor que 50 Nota! puede ser cualquier numero menor que 50
                $mew_project->hrs_tiempo=30;

                break;
            case '51_167':
                //si es de 51 a 157 , 80 esta entre el rango
                $mew_project->hrs_tiempo=80;

                break;
            case '168':
                 //si es igual a 168
                $mew_project->hrs_tiempo=168;

                break;
        }


        $aux = explode(",",   $request->get('ar_project'));
        if(count($aux) == 1){
            $mew_project->area =  $aux[0];
        }
        if(count($aux) == 2){
            $mew_project->area =  $aux[0].$aux[1];
        }
        if(count($aux) == 3){
            $mew_project->area =  $aux[0].$aux[1].$aux[2];
        }
        if(count($aux) == 4){
            $mew_project->area =  $aux[0].$aux[1].$aux[2].$aux[3];
        }
        if(count($aux) == 5){
            $mew_project->area =  $aux[0].$aux[1].$aux[2].$aux[3].$aux[4];
        }

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
        $factor_m =$request->get('csMantenimiento');

        if ($enfriamiento1 !== 0) {

            if ($sol_1_1 !== 0) {
                $solution_enf1=new SolutionsProjectModel;
                $solution_enf1->num_sol=1;
                $solution_enf1->num_enf	=1;
                $solution_enf1->unidad_hvac=$request->get('cUnidad_1_1');
                $solution_enf1->tipo_equipo	=$request->get('csTipo');
                $solution_enf1->tipo_diseño	=$request->get('csDisenio_1_1');

                $aux = explode(",",   $request->get('capacidad_total'));
                        if(count($aux) == 1){
                            $cap_tot_aux =  $aux[0];
                        }
                        if(count($aux) == 2){
                            $cap_tot_aux=  $aux[0].$aux[1];
                        }
                        if(count($aux) == 3){
                            $cap_tot_aux =  $aux[0].$aux[1].$aux[2];
                        }
                        if(count($aux) == 4){
                            $cap_tot_aux =  $aux[0].$aux[1].$aux[2].$aux[3];
                        }
                        if(count($aux) == 5){
                            $cap_tot_aux =  $aux[0].$aux[1].$aux[2].$aux[3].$aux[4];
                        }

                $solution_enf1->capacidad_tot=floatval($cap_tot_aux);
                $solution_enf1->unid_med=$request->get('unidad_capacidad_tot');
//separa cadena
                $aux_costo_elec = explode("$",   $request->get('costo_elec'));
                        $aux_costo_elec_a = explode(",",    $aux_costo_elec[1]);
                        if(count($aux_costo_elec_a) == 1){
                            $costo_elec_aux =  $aux_costo_elec_a[0];
                        }
                        if(count($aux_costo_elec_a) == 2){
                            $costo_elec_aux=  $aux_costo_elec_a[0].$aux_costo_elec_a[1];
                        }
                        if(count($aux_costo_elec_a) == 3){
                            $costo_elec_aux =  $aux_costo_elec_a[0].$aux_costo_elec_a[1].$aux_costo_elec_a[2];
                        }
                        if(count($aux_costo_elec_a) == 4){
                            $costo_elec_aux =  $aux_costo_elec_a[0].$aux_costo_elec_a[1].$aux_costo_elec_a[2].$aux_costo_elec_a[3];
                        }
                        if(count($aux_costo_elec_a) == 5){
                            $costo_elec_aux =  $aux_costo_elec_a[0].$aux_costo_elec_a[1].$aux_costo_elec_a[2].$aux_costo_elec_a[3].$aux_costo_elec_a[4];
                        }
//separa cadena
                $solution_enf1->costo_elec=floatval($costo_elec_aux);
 //separa cadena
                $aux_cooling_hours = explode(",",$request->get('hrsEnfriado'));

                if(count($aux_cooling_hours) == 1){
                    $cooling_hours_aux =  $aux_cooling_hours[0];
                }
                if(count($aux_cooling_hours) == 2){
                    $cooling_hours_aux=  $aux_cooling_hours[0].$aux_cooling_hours[1];
                }
                if(count($aux_cooling_hours) == 3){
                    $cooling_hours_aux =  $aux_cooling_hours[0].$aux_cooling_hours[1].$aux_cooling_hours[2];
                }
                if(count($aux_cooling_hours) == 4){
                    $cooling_hours_aux =  $aux_cooling_hours[0].$aux_cooling_hours[1].$aux_cooling_hours[2].$aux_cooling_hours[3];
                }
                if(count($aux_cooling_hours) == 5){
                    $cooling_hours_aux =  $aux_cooling_hours[0].$aux_cooling_hours[1].$aux_cooling_hours[2].$aux_cooling_hours[3].$aux_cooling_hours[4];
                }

                $solution_enf1->coolings_hours=intval($cooling_hours_aux);


                $solution_enf1->eficencia_ene=$request->get('csStd');
                $solution_enf1->eficencia_ene_cant=$request->get('csStd_cant_1_1');
                $solution_enf1->tipo_control=$request->get('tipo_control_1_1');

                $solution_enf1->name_disenio=$request->get('name_diseno_1_1');
                $solution_enf1->name_t_control=$request->get('name_t_control_1_1');
                $solution_enf1->dr_name=$request->get('dr_name_1_1');

                $solution_enf1->dr	=$request->get('dr_1_1');
                $solution_enf1->mantenimiento	=$request->get('csMantenimiento');

                if($request->get('cheValorS_1_1') != null){

                    $aux_val_aprox = explode("$",   $request->get('cheValorS_1_1'));
                    $aux_val_aprox_a = explode(",",    $aux_val_aprox[1]);

                    if(count($aux_val_aprox_a) == 1){
                        $val_aprox_aux =  $aux_val_aprox_a[0];
                    }
                    if(count($aux_val_aprox_a) == 2){
                        $val_aprox_aux=  $aux_val_aprox_a[0].$aux_val_aprox_a[1];
                    }
                    if(count($aux_val_aprox_a) == 3){
                        $val_aprox_aux =  $aux_val_aprox_a[0].$aux_val_aprox_a[1].$aux_val_aprox_a[2];
                    }
                    if(count($aux_val_aprox_a) == 4){
                        $val_aprox_aux =  $aux_val_aprox_a[0].$aux_val_aprox_a[1].$aux_val_aprox_a[2].$aux_val_aprox_a[3];
                    }
                    if(count($aux_val_aprox_a) == 5){
                        $val_aprox_aux =  $aux_val_aprox_a[0].$aux_val_aprox_a[1].$aux_val_aprox_a[2].$aux_val_aprox_a[3].$aux_val_aprox_a[4];
                    }

                }else  if($request->get('cheValorS_1_1') == null){
                    $val_aprox_aux = 0;
                }

                if($request->get('maintenance_cost_1_1') != null){
                    $aux_cost_mant = explode("$",   $request->get('maintenance_cost_1_1'));
                    $aux_cost_mant_a = explode(",",    $aux_cost_mant[1]);

                    if(count($aux_cost_mant_a) == 1){
                        $aux_cost_mant =  $aux_cost_mant_a[0];
                    }
                    if(count($aux_cost_mant_a) == 2){
                        $aux_cost_mant=  $aux_cost_mant_a[0].$aux_cost_mant_a[1];
                    }
                    if(count($aux_cost_mant_a) == 3){
                        $aux_cost_mant =  $aux_cost_mant_a[0].$aux_cost_mant_a[1].$aux_cost_mant_a[2];
                    }
                    if(count($aux_cost_mant_a) == 4){
                        $aux_cost_mant =  $aux_cost_mant_a[0].$aux_cost_mant_a[1].$aux_cost_mant_a[2].$aux_cost_mant_a[3];
                    }
                    if(count($aux_cost_mant_a) == 5){
                        $aux_cost_mant =  $aux_cost_mant_a[0].$aux_cost_mant_a[1].$aux_cost_mant_a[2].$aux_cost_mant_a[3].$aux_cost_mant_a[4];
                    }


                }else  if($request->get('maintenance_cost_1_1') == null){
                    $aux_cost_mant = 0;

                }

                $solution_enf1->val_aprox=floatval( $val_aprox_aux);
                $solution_enf1->costo_mantenimiento=floatval($aux_cost_mant);
                $solution_enf1->status=1;
                $solution_enf1->id_empresa=Auth::user()->id_empresa;
                $solution_enf1->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf1->coolings_hours;
                $cost_energ =  $solution_enf1->costo_elec;
                $seer = floatval($request->get('csStd_cant_1_1'));

               if ($solution_enf1->unid_med == 'TR') {

                $tr =  $solution_enf1->capacidad_tot;
                //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
               //((TR x 12000)
               $res_trx_12000 = $tr * 12000;
               //((TR x 12000) x (Cooling Hours)
               $res_1er_parent = $res_trx_12000 * $cooling_hrs;
               //((TR x 12000) x (Cooling Hours)  / (SEER) )
               $tot_1er_res = $res_1er_parent / $seer;
               $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;
                //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)
                /* $res_ene_apl_tot_enf_1 */


                //energia aplicada proccess
                //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

                //(Fórmula Energía x Factor S)

/* (((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C) x Factor M */
                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;
                if($solution_enf1->tipo_equipo === "pa_pi_te"){
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
                $solution_enf1->cost_op_an = $res_res_fact_m;
            }else if($solution_enf1->unid_med == 'KW'){
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                $kw =  $solution_enf1->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs;
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

                if($solution_enf1->tipo_equipo === "pa_pi_te"){
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

                $solution_enf1->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));

                //$solution_enf1->cost_op_an = floatval(number_format($res_div_seer_a,2, '.', ''));

            }

  //niveles de confort
  $unidad_conf_1_1 = $solution_enf1->unidad_hvac;
  $equipo_conf_1_1 = $solution_enf1->tipo_equipo;
  $diseno_conf_1_1 = $solution_enf1->name_disenio;
  $t_control_conf_1_1 = $solution_enf1->name_t_control;
  $dr_conf_1_1 = $solution_enf1->dr_name;
  $mant_conf_1_1 = $solution_enf1->mantenimiento;

  if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 5;
                 break;
              default:
            }

            switch ($dr_conf_1_1) {
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
              case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
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
              case 'Ducto Flex y Plenum Retorno':
                  $val_conf_dis_1_1 = 3;
                break;
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 4.5;
                break;
              default:
            }

            switch ($dr_conf_1_1) {
              case 'No Aplica':
                  $val_conf_dr_1_1 = 2;
                break;
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;

              default:
            }
      }

      if($equipo_conf_1_1 === 'fancoil'){
          switch ($diseno_conf_1_1) {
              case 'Inyección y Retorno Ductado':
                  $val_conf_dis_1_1 = 4;
                break;
              case 'Ducto Flex. y Retorno Ductado':
                  $val_conf_dis_1_1 = 3.5;
                break;
              case 'Ducto Flex y Plenum Retorno':
                  $val_conf_dis_1_1 = 3;
                break;
              case 'Baja Presión Estática':
                  $val_conf_dis_1_1 = 2.5;
                break;
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 4.5;
                break;

              default:
            }

            switch ($dr_conf_1_1) {
              case 'No Aplica':
                  $val_conf_dr_1_1 = 2;
                break;
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;

              default:
            }
      }

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
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 5;
                break;
              default:
            }

            switch ($dr_conf_1_1) {
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
              case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
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
                $val_conf_dis_1_1 = 3.5;
              break;
            case 'Ducto Flex. y Plenum Retorno':
                $val_conf_dis_1_1 = 3;
              break;
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 5;
              break;
            default:
          }

            switch ($dr_conf_1_1) {
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
              case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;
              default:
            }
      }

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
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 5;
                break;
              default:
            }

            switch ($dr_conf_1_1) {
              case 'No Aplica':
                  $val_conf_dr_1_1 = 2;
                break;
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;

              default:
            }
      }
      //control
      switch ($t_control_conf_1_1) {
          case 'Termostatos Fuera Zona de Confort':
              $val_conf_crtl_1_1 = 2.5;
            break;
          case 'Termostatos en Zona de Confort':
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

  if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
      $val_conf_equipo_1_1 = 4;

      if($equipo_conf_1_1 === 'ca_pi_te'){
          switch ($diseno_conf_1_1) {
              case 'Sin Ventilación':
                  $val_conf_dis_1_1 = 2.5;
                break;

              case 'Con Ventilación DOA':
                  $val_conf_dis_1_1 = 3.5;
                break;

              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 4;
                break;
              default:
            }

      }

      if($equipo_conf_1_1 === 'fancoil_lsp'){
          switch ($diseno_conf_1_1) {
              case 'Sin Ventilación':
                  $val_conf_dis_1_1 = 2.5;
                break;

              case 'Descarga Directa Ductada':
                  $val_conf_dis_1_1 = 3.5;
                break;

              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 4;
                break;
              default:
            }
      }

      switch ($t_control_conf_1_1) {
          case 'Termostatos Fuera Zona de Confort':
              $val_conf_crtl_1_1 = 2.5;
            break;
          case 'Termostatos en Zona de Confort':
              $val_conf_crtl_1_1 = 4;
            break;
          case 'Termostato Inteligente en Zona':
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

  if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
      $val_conf_equipo_1_1 = 3.5;
      if($equipo_conf_1_1 === 'est_ptac'){
          switch ($diseno_conf_1_1) {
              case 'Sin Filración MERV 8':
                  $val_conf_dis_1_1 = 3.5;
                break;

              case 'Con Filtración MERV 8':
                  $val_conf_dis_1_1 = 3.5;
                break;

          default:
            }

            switch ($t_control_conf_1_1) {
              case 'Termostatos Fuera Zona de Confort':
                  $val_conf_crtl_1_1 = 3;
                break;
              case 'Termostatos en Zona de Confort':
                  $val_conf_crtl_1_1 = 4;
                break;
              case 'Termostato Inteligente en Zona':
                  $val_conf_crtl_1_1 = 5;
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
                  $val_conf_crtl_1_1 = 3;
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
              $val_conf_mant_1_1 = 2.5;
            break;
          case 'Deficiente':
              $val_conf_mant_1_1 = 3.5;
            break;
            case 'Sin Mantenimiento':
              $val_conf_mant_1_1 = 4.5;
            break;

          default:
        }
  }

  $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
  $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
  $solution_enf1->confort = $nivel_confotr_1_1;

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


                $aux_cap_tot_1_2 = explode(",",   $request->get('capacidad_total_1_2'));
                if(count($aux_cap_tot_1_2) == 1){
                    $cap_tot_aux_1_2 =  $aux_cap_tot_1_2[0];
                }
                if(count($aux_cap_tot_1_2) == 2){
                    $cap_tot_aux_1_2=  $aux_cap_tot_1_2[0].$aux_cap_tot_1_2[1];
                }
                if(count($aux_cap_tot_1_2) == 3){
                    $cap_tot_aux_1_2 =  $aux_cap_tot_1_2[0].$aux_cap_tot_1_2[1].$aux_cap_tot_1_2[2];
                }
                if(count($aux_cap_tot_1_2) == 4){
                    $cap_tot_aux_1_2 =  $aux_cap_tot_1_2[0].$aux_cap_tot_1_2[1].$aux_cap_tot_1_2[2].$aux_cap_tot_1_2[3];
                }
                if(count($aux_cap_tot_1_2) == 5){
                    $cap_tot_aux_1_2 =  $aux_cap_tot_1_2[0].$aux_cap_tot_1_2[1].$aux_cap_tot_1_2[2].$aux_cap_tot_1_2[3].$aux_cap_tot_1_2[4];
                }

                $solution_enf2_2->capacidad_tot =floatval($cap_tot_aux_1_2);
                $solution_enf2_2->unid_med = $request->get('unidad_capacidad_tot_1_2');

                $solution_enf2_2->name_disenio=$request->get('name_diseno_1_2');
                $solution_enf2_2->name_t_control=$request->get('name_t_control_1_2');
                $solution_enf2_2->dr_name=$request->get('dr_name_1_2');

                $aux_costo_elec_1_2 = explode("$",   $request->get('costo_elec_1_2'));
                $aux_costo_elec_a_1_2 = explode(",",    $aux_costo_elec_1_2[1]);
                if(count($aux_costo_elec_a_1_2) == 1){
                    $costo_elec_aux =  $aux_costo_elec_a_1_2[0];
                }
                if(count($aux_costo_elec_a_1_2) == 2){
                    $costo_elec_aux=  $aux_costo_elec_a_1_2[0].$aux_costo_elec_a_1_2[1];
                }
                if(count($aux_costo_elec_a_1_2) == 3){
                    $costo_elec_aux =  $aux_costo_elec_a_1_2[0].$aux_costo_elec_a_1_2[1].$aux_costo_elec_a_1_2[2];
                }
                if(count($aux_costo_elec_a_1_2) == 4){
                    $costo_elec_aux =  $aux_costo_elec_a_1_2[0].$aux_costo_elec_a_1_2[1].$aux_costo_elec_a_1_2[2].$aux_costo_elec_a_1_2[3];
                }
                if(count($aux_costo_elec_a_1_2) == 5){
                    $costo_elec_aux =  $aux_costo_elec_a_1_2[0].$aux_costo_elec_a_1_2[1].$aux_costo_elec_a_1_2[2].$aux_costo_elec_a_1_2[3].$aux_costo_elec_a_1_2[4];
                }
                $solution_enf2_2->costo_elec = floatval($costo_elec_aux);

                $cooling_hours_aux_1_2 = explode(",",   $request->get('hrsEnfriado_1_2'));
                if(count($cooling_hours_aux_1_2) == 1){
                    $aux_cooling_hours_1_2 =  $cooling_hours_aux_1_2[0];
                }
                if(count($cooling_hours_aux_1_2) == 2){
                    $aux_cooling_hours_1_2=  $cooling_hours_aux_1_2[0].$cooling_hours_aux_1_2[1];
                }
                if(count($cooling_hours_aux_1_2) == 3){
                    $aux_cooling_hours_1_2 =  $acooling_hours_aux_1_2ux[0].$cooling_hours_aux_1_2[1].$cooling_hours_aux_1_2[2];
                }
                if(count($cooling_hours_aux_1_2) == 4){
                    $cap_tot_aux =  $cooling_hours_aux_1_2[0].$cooling_hours_aux_1_2[1].$cooling_hours_aux_1_2[2].$cooling_hours_aux_1_2[3];
                }
                if(count($cooling_hours_aux_1_2) == 5){
                    $aux_cooling_hours_1_2 =  $cooling_hours_aux_1_2[0].$cooling_hours_aux_1_2[1].$cooling_hours_aux_1_2[2].$cooling_hours_aux_1_2[3].$cooling_hours_aux_1_2[4];
                }

                $solution_enf2_2->coolings_hours =intval($aux_cooling_hours_1_2);
                $solution_enf2_2->eficencia_ene = $request->get('csStd_1_2');
                $solution_enf2_2->eficencia_ene_cant = $request->get('csStd_cant_1_2');
                $solution_enf2_2->tipo_control = $request->get('tipo_control_1_2');

                $solution_enf2_2->dr = $request->get('dr_1_2');
                $solution_enf2_2->mantenimiento = $request->get('csMantenimiento_1_2');

                if($request->get('cheValorS_1_2') != null){
                    $aux_val_aprox_1_2 = explode("$",   $request->get('cheValorS_1_2'));
                    $aux_val_aprox_1_2_a = explode(",",    $aux_val_aprox_1_2[1]);
                    if(count($aux_val_aprox_1_2_a) == 1){
                        $val_aprox_aux_1_2 =  $aux_val_aprox_1_2_a[0];
                    }
                    if(count($aux_val_aprox_1_2_a) == 2){
                        $val_aprox_aux_1_2=  $aux_val_aprox_1_2_a[0].$aux_val_aprox_1_2_a[1];
                    }
                    if(count($aux_val_aprox_1_2_a) == 3){
                        $val_aprox_aux_1_2 =  $aux_val_aprox_1_2_a[0].$aux_val_aprox_1_2_a[1].$aux_val_aprox_1_2_a[2];
                    }
                    if(count($aux_val_aprox_1_2_a) == 4){
                        $val_aprox_aux_1_2 =  $aux_val_aprox_1_2_a[0].$aux_val_aprox_1_2_a[1].$aux_val_aprox_1_2_a[2].$aux_val_aprox_1_2_a[3];
                    }
                    if(count($aux_val_aprox_1_2_a) == 5){
                        $val_aprox_aux_1_2 =  $aux_val_aprox_1_2_a[0].$aux_val_aprox_1_2_a[1].$aux_val_aprox_1_2_a[2].$aux_val_aprox_1_2_a[3].$aux_val_aprox_1_2_a[4];
                    }
                }else  if($request->get('cheValorS_1_2') == null){
                                    $val_aprox_aux_1_2 = 0;
                }

                if($request->get('maintenance_cost_1_2') != null){
                    $aux_cost_mant_1_2 = explode("$",   $request->get('maintenance_cost_1_2'));
                    $aux_cost_mant_a_1_2 = explode(",",    $aux_cost_mant_1_2[1]);

                    if(count($aux_cost_mant_a_1_2) == 1){
                        $aux_cost_mant_1_2 =  $aux_cost_mant_a_1_2[0];
                    }
                    if(count($aux_cost_mant_a_1_2) == 2){
                        $aux_cost_mant_1_2=  $aux_cost_mant_a_1_2[0].$aux_cost_mant_a_1_2[1];
                    }
                    if(count($aux_cost_mant_a_1_2) == 3){
                        $aux_cost_mant_1_2 =  $aux_cost_mant_a_1_2[0].$aux_cost_mant_a_1_2[1].$aux_cost_mant_a_1_2[2];
                    }
                    if(count($aux_cost_mant_a_1_2) == 4){
                        $aux_cost_mant_1_2 =  $aux_cost_mant_a_1_2[0].$aux_cost_mant_a_1_2[1].$aux_cost_mant_a_1_2[2].$aux_cost_mant_a_1_2[3];
                    }
                    if(count($aux_cost_mant_a_1_2) == 5){
                        $aux_cost_mant_1_2 =  $aux_cost_mant_a_1_2[0].$aux_cost_mant_a_1_2[1].$aux_cost_mant_a_1_2[2].$aux_cost_mant_a_1_2[3].$aux_cost_mant_a_1_2[4];
                    }


                }else  if($request->get('maintenance_cost_1_2') == null){
                    $aux_cost_mant_1_2 = 0;

                }
                $solution_enf2_2->costo_mantenimiento=floatval($aux_cost_mant_1_2);
                $solution_enf2_2->val_aprox = floatval($val_aprox_aux_1_2);
                $solution_enf2_2->status = 1;
                $solution_enf2_2->id_empresa=Auth::user()->id_empresa;
                $solution_enf2_2->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf2_2->coolings_hours;
                $cost_energ =  $solution_enf2_2->costo_elec;
                $seer = $solution_enf2_2->eficencia_ene_cant;

               if ($solution_enf2_2->unid_med == 'TR') {

                $tr =  $solution_enf2_2->capacidad_tot;
                //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
               //((TR x 12000)
               $res_trx_12000 = $tr * 12000;
               //((TR x 12000) x (Cooling Hours)
               $res_1er_parent = $res_trx_12000 * $cooling_hrs;
               //((TR x 12000) x (Cooling Hours)  / (SEER) )
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
                $factor_m =$request->get('csMantenimiento_1_2');
                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                if($solution_enf2_2->tipo_equipo === "pa_pi_te"){
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

                $solution_enf2_2->cost_op_an = $res_res_fact_m;
            }else if($solution_enf2_2->unid_med == 'KW'){
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                  $kw =  $solution_enf2_2->capacidad_tot;
                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs;
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

                if($solution_enf2_2->tipo_equipo === "pa_pi_te"){
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

                $solution_enf2_2->cost_op_an =floatval(number_format($factor_m,2, '.', ''));

                }

  //niveles de confort
  $unidad_conf_1_1 = $solution_enf2_2->unidad_hvac;
  $equipo_conf_1_1 = $solution_enf2_2->tipo_equipo;
  $diseno_conf_1_1 = $solution_enf2_2->name_disenio;
  $t_control_conf_1_1 = $solution_enf2_2->name_t_control;
  $dr_conf_1_1 = $solution_enf2_2->dr_name;
  $mant_conf_1_1 = $solution_enf2_2->mantenimiento;

  if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 5;
                 break;
              default:
            }

            switch ($dr_conf_1_1) {
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
              case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
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
              case 'Ducto Flex y Plenum Retorno':
                  $val_conf_dis_1_1 = 3;
                break;
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 4.5;
                break;
              default:
            }

            switch ($dr_conf_1_1) {
              case 'No Aplica':
                  $val_conf_dr_1_1 = 2;
                break;
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;

              default:
            }
      }

      if($equipo_conf_1_1 === 'fancoil'){
          switch ($diseno_conf_1_1) {
              case 'Inyección y Retorno Ductado':
                  $val_conf_dis_1_1 = 4;
                break;
              case 'Ducto Flex. y Retorno Ductado':
                  $val_conf_dis_1_1 = 3.5;
                break;
              case 'Ducto Flex y Plenum Retorno':
                  $val_conf_dis_1_1 = 3;
                break;
              case 'Baja Presión Estática':
                  $val_conf_dis_1_1 = 2.5;
                break;
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 4.5;
                break;

              default:
            }

            switch ($dr_conf_1_1) {
              case 'No Aplica':
                  $val_conf_dr_1_1 = 2;
                break;
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;

              default:
            }
      }

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
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 5;
                break;
              default:
            }

            switch ($dr_conf_1_1) {
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
              case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
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
                $val_conf_dis_1_1 = 3.5;
              break;
            case 'Ducto Flex. y Plenum Retorno':
                $val_conf_dis_1_1 = 3;
              break;
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 5;
              break;
            default:
          }

            switch ($dr_conf_1_1) {
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
              case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;
              default:
            }
      }

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
              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 5;
                break;
              default:
            }

            switch ($dr_conf_1_1) {
              case 'No Aplica':
                  $val_conf_dr_1_1 = 2;
                break;
              case 'Cumple ASHRAE  Standard 70':
                  $val_conf_dr_1_1 = 5;
                break;
                case 'No Cumple ASHRAE Standard 70':
                  $val_conf_dr_1_1 = 3;
                break;

              default:
            }
      }
      //control
      switch ($t_control_conf_1_1) {
          case 'Termostatos Fuera Zona de Confort':
              $val_conf_crtl_1_1 = 2.5;
            break;
          case 'Termostatos en Zona de Confort':
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

  if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
      $val_conf_equipo_1_1 = 4;

      if($equipo_conf_1_1 === 'ca_pi_te'){
          switch ($diseno_conf_1_1) {
              case 'Sin Ventilación':
                  $val_conf_dis_1_1 = 2.5;
                break;

              case 'Con Ventilación DOA':
                  $val_conf_dis_1_1 = 3.5;
                break;

              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 4;
                break;
              default:
            }

      }

      if($equipo_conf_1_1 === 'fancoil_lsp'){
          switch ($diseno_conf_1_1) {
              case 'Sin Ventilación':
                  $val_conf_dis_1_1 = 2.5;
                break;

              case 'Descarga Directa Ductada':
                  $val_conf_dis_1_1 = 3.5;
                break;

              case 'ASHRAE 55/62.1/90.1':
                  $val_conf_dis_1_1 = 4;
                break;
              default:
            }
      }

      switch ($t_control_conf_1_1) {
          case 'Termostatos Fuera Zona de Confort':
              $val_conf_crtl_1_1 = 2.5;
            break;
          case 'Termostatos en Zona de Confort':
              $val_conf_crtl_1_1 = 4;
            break;
          case 'Termostato Inteligente en Zona':
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

  if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
      $val_conf_equipo_1_1 = 3.5;
      if($equipo_conf_1_1 === 'est_ptac'){
          switch ($diseno_conf_1_1) {
              case 'Sin Filración MERV 8':
                  $val_conf_dis_1_1 = 3.5;
                break;

              case 'Con Filtración MERV 8':
                  $val_conf_dis_1_1 = 3.5;
                break;

          default:
            }

            switch ($t_control_conf_1_1) {
              case 'Termostatos Fuera Zona de Confort':
                  $val_conf_crtl_1_1 = 3;
                break;
              case 'Termostatos en Zona de Confort':
                  $val_conf_crtl_1_1 = 4;
                break;
              case 'Termostato Inteligente en Zona':
                  $val_conf_crtl_1_1 = 5;
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
                  $val_conf_crtl_1_1 = 3;
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
              $val_conf_mant_1_1 = 2.5;
            break;
          case 'Deficiente':
              $val_conf_mant_1_1 = 3.5;
            break;
            case 'Sin Mantenimiento':
              $val_conf_mant_1_1 = 4.5;
            break;

          default:
        }
  }

  $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
  $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
  $solution_enf2_2->confort = $nivel_confotr_1_1;

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

                    $aux_cap_tot_1_3 = explode(",",   $request->get('capacidad_total'));
                    if(count($aux_cap_tot_1_3) == 1){
                        $cap_tot_aux_1_3 =  $aux_cap_tot_1_3[0];
                    }
                    if(count($aux_cap_tot_1_3) == 2){
                        $cap_tot_aux_1_3=  $aux_cap_tot_1_3[0].$aux_cap_tot_1_3[1];
                    }
                    if(count($aux_cap_tot_1_3) == 3){
                        $cap_tot_aux_1_3 =  $aux_cap_tot_1_3[0].$aux_cap_tot_1_3[1].$aux_cap_tot_1_3[2];
                    }
                    if(count($aux_cap_tot_1_3) == 4){
                        $cap_tot_aux_1_3 =  $aux_cap_tot_1_3[0].$aux_cap_tot_1_3[1].$aux_cap_tot_1_3[2].$aux_cap_tot_1_3[3];
                    }
                    if(count($aux_cap_tot_1_3) == 5){
                        $cap_tot_aux_1_3 =  $aux_cap_tot_1_3[0].$aux_cap_tot_1_3[1].$aux_cap_tot_1_3[2].$aux_cap_tot_1_3[3].$aux_cap_tot_1_3[4];
                    }

                    $solution_enf1_3->capacidad_tot =floatval($cap_tot_aux_1_3);
                    $solution_enf1_3->unid_med = $request->get('unidad_capacidad_tot_1_3');

                    $solution_enf1_3->name_disenio=$request->get('name_diseno_1_3');
                    $solution_enf1_3->name_t_control=$request->get('name_t_control_1_3');
                    $solution_enf1_3->dr_name=$request->get('dr_name_1_3');

                    $aux_costo_elec_1_3 = explode("$",   $request->get('costo_elec_1_3'));
                        $aux_costo_elec_1_3_a = explode(",",    $aux_costo_elec_1_3[1]);
                        if(count($aux_costo_elec_1_3_a) == 1){
                            $costo_elec_aux_1_3 =  $aux_costo_elec_1_3_a[0];
                        }
                        if(count($aux_costo_elec_1_3_a) == 2){
                            $costo_elec_aux_1_3=  $aux_costo_elec_1_3_a[0].$aux_costo_elec_1_3_a[1];
                        }
                        if(count($aux_costo_elec_1_3_a) == 3){
                            $costo_elec_aux_1_3 =  $aux_costo_elec_1_3_a[0].$aux_costo_elec_1_3_a[1].$aux_costo_elec_1_3_a[2];
                        }
                        if(count($aux_costo_elec_1_3_a) == 4){
                            $costo_elec_aux_1_3 =  $aux_costo_elec_1_3_a[0].$aux_costo_elec_1_3_a[1].$aux_costo_elec_1_3_a[2].$aux_costo_elec_1_3_a[3];
                        }
                        if(count($aux_costo_elec_1_3_a) == 5){
                            $costo_elec_aux_1_3 =  $aux_costo_elec_1_3_a[0].$aux_costo_elec_1_3_a[1].$aux_costo_elec_1_3_a[2].$aux_costo_elec_1_3_a[3].$aux_costo_elec_1_3_a[4];
                        }

                    $solution_enf1_3->costo_elec = floatval($costo_elec_aux_1_3);

                    $cooling_hours_aux_1_3 = explode(",",   $request->get('hrsEnfriado_1_3'));
                        if(count($cooling_hours_aux_1_3) == 1){
                            $aux_cooling_hours_1_3 =  $cooling_hours_aux_1_3[0];
                        }
                        if(count($cooling_hours_aux_1_3) == 2){
                            $aux_cooling_hours_1_3=  $cooling_hours_aux_1_3[0].$cooling_hours_aux_1_3[1];
                        }
                        if(count($cooling_hours_aux_1_3) == 3){
                            $aux_cooling_hours_1_3 =  $cooling_hours_aux_1_3[0].$cooling_hours_aux_1_3[1].$cooling_hours_aux_1_3[2];
                        }
                        if(count($cooling_hours_aux_1_3) == 4){
                            $aux_cooling_hours_1_3 =  $cooling_hours_aux_1_3[0].$cooling_hours_aux_1_3[1].$cooling_hours_aux_1_3[2].$cooling_hours_aux_1_3[3];
                        }
                        if(count($cooling_hours_aux_1_3) == 5){
                            $aux_cooling_hours_1_3 =  $cooling_hours_aux_1_3[0].$cooling_hours_aux_1_3[1].$cooling_hours_aux_1_3[2].$cooling_hours_aux_1_3[3].$cooling_hours_aux_1_3[4];
                        }

                    $solution_enf1_3->coolings_hours = intval($aux_cooling_hours_1_3);
                    $solution_enf1_3->eficencia_ene = $request->get('csStd_1_3');
                    $solution_enf1_3->eficencia_ene_cant = $request->get('csStd_cant_1_3');
                    $solution_enf1_3->tipo_control = $request->get('tipo_control_1_3');

                    $solution_enf1_3->dr = $request->get('dr_1_3');
                    $solution_enf1_3->mantenimiento = $request->get('csMantenimiento_1_3');

                    if($request->get('cheValorS_1_3') != null){
                        $aux_val_aprox_1_3 = explode("$",   $request->get('cheValorS_1_3'));
                        $aux_val_aprox_1_3_a = explode(",",    $aux_val_aprox_1_3[1]);
                        if(count($aux_val_aprox_1_3_a) == 1){
                            $val_aprox_aux_1_3 =  $aux_val_aprox_1_3_a[0];
                        }
                        if(count($aux_val_aprox_1_3_a) == 2){
                            $val_aprox_aux_1_3=  $aux_val_aprox_1_3_a[0].$aux_val_aprox_1_3_a[1];
                        }
                        if(count($aux_val_aprox_1_3_a) == 3){
                            $val_aprox_aux_1_3 =  $aux_val_aprox_1_3_a[0].$aux_val_aprox_1_3_a[1].$aux_val_aprox_1_3_a[2];
                        }
                        if(count($aux_val_aprox_1_3_a) == 4){
                            $val_aprox_aux_1_3 =  $aux_val_aprox_1_3_a[0].$aux_val_aprox_1_3_a[1].$aux_val_aprox_1_3_a[2].$aux_val_aprox_1_3_a[3];
                        }
                        if(count($aux_val_aprox_1_3_a) == 5){
                            $val_aprox_aux_1_3 =  $aux_val_aprox_1_3_a[0].$aux_val_aprox_1_3_a[1].$aux_val_aprox_1_3_a[2].$aux_val_aprox_1_3_a[3].$aux_val_aprox_1_3_a[4];
                        }
                    }else  if($request->get('cheValorS_1_3') == null){
                            $val_aprox_aux_1_3 = 0;
                    }

                    if($request->get('maintenance_cost_1_3') != null){
                        $aux_cost_mant_1_3 = explode("$",   $request->get('maintenance_cost_1_3'));
                        $aux_cost_mant_b_1_3 = explode(",",    $aux_cost_mant_1_3[1]);

                        if(count($aux_cost_mant_b_1_3) == 1){
                            $aux_cost_mant_1_3 =  $aux_cost_mant_b_1_3[0];
                        }
                        if(count($aux_cost_mant_b_1_3) == 2){
                            $aux_cost_mant_1_3=  $aux_cost_mant_b_1_3[0].$aux_cost_mant_b_1_3[1];
                        }
                        if(count($aux_cost_mant_b_1_3) == 3){
                            $aux_cost_mant_1_3 =  $aux_cost_mant_b_1_3[0].$aux_cost_mant_b_1_3[1].$aux_cost_mant_b_1_3[2];
                        }
                        if(count($aux_cost_mant_b_1_3) == 4){
                            $aux_cost_mant_1_3 =  $aux_cost_mant_b_1_3[0].$aux_cost_mant_b_1_3[1].$aux_cost_mant_b_1_3[2].$aux_cost_mant_b_1_3[3];
                        }
                        if(count($aux_cost_mant_b_1_3) == 5){
                            $aux_cost_mant_1_3 =  $aux_cost_mant_b_1_3[0].$aux_cost_mant_b_1_3[1].$aux_cost_mant_b_1_3[2].$aux_cost_mant_b_1_3[3].$aux_cost_mant_b_1_3[4];
                        }


                    }else  if($request->get('maintenance_cost_1_3') == null){
                        $aux_cost_mant_1_3 = 0;

                    }
                    $solution_enf1_3->costo_mantenimiento=floatval($aux_cost_mant_1_3);

                    $solution_enf1_3->val_aprox = floatval($val_aprox_aux_1_3);
                    $solution_enf1_3->status = 1;
                    $solution_enf1_3->id_empresa=Auth::user()->id_empresa;
                    $solution_enf1_3->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf1_3->coolings_hours;
                    $cost_energ =  $solution_enf1_3->costo_elec;
                    $seer = $solution_enf1_3->eficencia_ene_cant;

                if ($solution_enf1_3->unid_med == 'TR') {

                    $tr =  $solution_enf1_3->capacidad_tot;
                    //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
                   //((TR x 12000)
                   $res_trx_12000 = $tr * 12000;
                   //((TR x 12000) x (Cooling Hours)
                   $res_1er_parent = $res_trx_12000 * $cooling_hrs;
                   //((TR x 12000) x (Cooling Hours)  / (SEER) )
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
                    $factor_m =$request->get('csMantenimiento_1_3');

                    $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                    $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                    $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                    $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                    $res_res =  $res_parent_1 *  $factor_c;

                    if($solution_enf1_3->tipo_equipo === "pa_pi_te"){
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

                    $solution_enf1_3->cost_op_an = $res_res_fact_m;
                }else if($solution_enf1_3->unid_med == 'KW'){
                      //(((Kw / 3.5)
                  $kw =  $solution_enf1_3->capacidad_tot;
                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs;
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
                if($solution_enf1_3->tipo_equipo === "pa_pi_te"){
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
                $solution_enf1_3->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
                }

//niveles de confort
$unidad_conf_1_1 = $solution_enf1_3->unidad_hvac;
$equipo_conf_1_1 = $solution_enf1_3->tipo_equipo;
$diseno_conf_1_1 = $solution_enf1_3->name_disenio;
$t_control_conf_1_1 = $solution_enf1_3->name_t_control;
$dr_conf_1_1 = $solution_enf1_3->dr_name;
$mant_conf_1_1 = $solution_enf1_3->mantenimiento;

if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 5;
               break;
            default:
          }

          switch ($dr_conf_1_1) {
            case 'Cumple ASHRAE  Standard 70':
                $val_conf_dr_1_1 = 5;
              break;
            case 'No Cumple ASHRAE Standard 70':
                $val_conf_dr_1_1 = 3;
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
            case 'Ducto Flex y Plenum Retorno':
                $val_conf_dis_1_1 = 3;
              break;
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 4.5;
              break;
            default:
          }

          switch ($dr_conf_1_1) {
            case 'No Aplica':
                $val_conf_dr_1_1 = 2;
              break;
            case 'Cumple ASHRAE  Standard 70':
                $val_conf_dr_1_1 = 5;
              break;
              case 'No Cumple ASHRAE Standard 70':
                $val_conf_dr_1_1 = 3;
              break;

            default:
          }
    }

    if($equipo_conf_1_1 === 'fancoil'){
        switch ($diseno_conf_1_1) {
            case 'Inyección y Retorno Ductado':
                $val_conf_dis_1_1 = 4;
              break;
            case 'Ducto Flex. y Retorno Ductado':
                $val_conf_dis_1_1 = 3.5;
              break;
            case 'Ducto Flex y Plenum Retorno':
                $val_conf_dis_1_1 = 3;
              break;
            case 'Baja Presión Estática':
                $val_conf_dis_1_1 = 2.5;
              break;
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 4.5;
              break;

            default:
          }

          switch ($dr_conf_1_1) {
            case 'No Aplica':
                $val_conf_dr_1_1 = 2;
              break;
            case 'Cumple ASHRAE  Standard 70':
                $val_conf_dr_1_1 = 5;
              break;
              case 'No Cumple ASHRAE Standard 70':
                $val_conf_dr_1_1 = 3;
              break;

            default:
          }
    }

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
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 5;
              break;
            default:
          }

          switch ($dr_conf_1_1) {
            case 'Cumple ASHRAE  Standard 70':
                $val_conf_dr_1_1 = 5;
              break;
            case 'No Cumple ASHRAE Standard 70':
                $val_conf_dr_1_1 = 3;
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
                $val_conf_dis_1_1 = 3.5;
              break;
            case 'Ducto Flex. y Plenum Retorno':
                $val_conf_dis_1_1 = 3;
              break;
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 5;
              break;
            default:
          }

          switch ($dr_conf_1_1) {
            case 'Cumple ASHRAE  Standard 70':
                $val_conf_dr_1_1 = 5;
              break;
            case 'No Cumple ASHRAE Standard 70':
                $val_conf_dr_1_1 = 3;
              break;
            default:
          }
    }

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
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 5;
              break;
            default:
          }

          switch ($dr_conf_1_1) {
            case 'No Aplica':
                $val_conf_dr_1_1 = 2;
              break;
            case 'Cumple ASHRAE  Standard 70':
                $val_conf_dr_1_1 = 5;
              break;
              case 'No Cumple ASHRAE Standard 70':
                $val_conf_dr_1_1 = 3;
              break;

            default:
          }
    }
    //control
    switch ($t_control_conf_1_1) {
        case 'Termostatos Fuera Zona de Confort':
            $val_conf_crtl_1_1 = 2.5;
          break;
        case 'Termostatos en Zona de Confort':
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

if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
    $val_conf_equipo_1_1 = 4;

    if($equipo_conf_1_1 === 'ca_pi_te'){
        switch ($diseno_conf_1_1) {
            case 'Sin Ventilación':
                $val_conf_dis_1_1 = 2.5;
              break;

            case 'Con Ventilación DOA':
                $val_conf_dis_1_1 = 3.5;
              break;

            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 4;
              break;
            default:
          }

    }

    if($equipo_conf_1_1 === 'fancoil_lsp'){
        switch ($diseno_conf_1_1) {
            case 'Sin Ventilación':
                $val_conf_dis_1_1 = 2.5;
              break;

            case 'Descarga Directa Ductada':
                $val_conf_dis_1_1 = 3.5;
              break;

            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 4;
              break;
            default:
          }
    }

    switch ($t_control_conf_1_1) {
        case 'Termostatos Fuera Zona de Confort':
            $val_conf_crtl_1_1 = 2.5;
          break;
        case 'Termostatos en Zona de Confort':
            $val_conf_crtl_1_1 = 4;
          break;
        case 'Termostato Inteligente en Zona':
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

if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
    $val_conf_equipo_1_1 = 3.5;
    if($equipo_conf_1_1 === 'est_ptac'){
        switch ($diseno_conf_1_1) {
            case 'Sin Filración MERV 8':
                $val_conf_dis_1_1 = 3.5;
              break;

            case 'Con Filtración MERV 8':
                $val_conf_dis_1_1 = 3.5;
              break;

        default:
          }

          switch ($t_control_conf_1_1) {
            case 'Termostatos Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 3;
              break;
            case 'Termostatos en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
              break;
            case 'Termostato Inteligente en Zona':
                $val_conf_crtl_1_1 = 5;
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
                $val_conf_crtl_1_1 = 3;
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
            $val_conf_mant_1_1 = 2.5;
          break;
        case 'Deficiente':
            $val_conf_mant_1_1 = 3.5;
          break;
          case 'Sin Mantenimiento':
            $val_conf_mant_1_1 = 4.5;
          break;

        default:
      }
}

$suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
$nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
$solution_enf1_3->confort = $nivel_confotr_1_1;

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

                $aux_cap_tot_2_1 = explode(",",   $request->get('capacidad_total_2_1'));
                    if(count($aux_cap_tot_2_1) == 1){
                        $cap_tot_aux_2_1 =  $aux_cap_tot_2_1[0];
                    }
                    if(count($aux_cap_tot_2_1) == 2){
                        $cap_tot_aux_2_1=  $aux_cap_tot_2_1[0].$aux_cap_tot_2_1[1];
                    }
                    if(count($aux_cap_tot_2_1) == 3){
                        $cap_tot_aux_2_1 =  $aux_cap_tot_2_1[0].$aux_cap_tot_2_1[1].$aux_cap_tot_2_1[2];
                    }
                    if(count($aux_cap_tot_2_1) == 4){
                        $cap_tot_aux_2_1 =  $aux_cap_tot_2_1[0].$aux_cap_tot_2_1[1].$aux_cap_tot_2_1[2].$aux_cap_tot_2_1[3];
                    }
                    if(count($aux_cap_tot_2_1) == 5){
                        $cap_tot_aux_2_1 =  $aux_cap_tot_2_1[0].$aux_cap_tot_2_1[1].$aux_cap_tot_2_1[2].$aux_cap_tot_2_1[3].$aux_cap_tot_2_1[4];
                    }

                $solution_enf2_1->capacidad_tot=floatval($cap_tot_aux_2_1);
                $solution_enf2_1->unid_med=$request->get('unidad_capacidad_tot_2_1');

                $solution_enf2_1->name_disenio=$request->get('name_diseno_2_1');
                $solution_enf2_1->name_t_control=$request->get('name_t_control_2_1');
                $solution_enf2_1->dr_name=$request->get('dr_name_2_1');

                $aux_costo_elec_2_1 = explode("$",   $request->get('costo_elec_2_1'));
                        $aux_costo_elec_2_1_a = explode(",",    $aux_costo_elec_2_1[1]);
                        if(count($aux_costo_elec_2_1_a) == 1){
                            $costo_elec_aux_2_1 =  $aux_costo_elec_2_1_a[0];
                        }
                        if(count($aux_costo_elec_2_1_a) == 2){
                            $costo_elec_aux_2_1=  $aux_costo_elec_2_1_a[0].$aux_costo_elec_2_1_a[1];
                        }
                        if(count($aux_costo_elec_2_1_a) == 3){
                            $costo_elec_aux_2_1 =  $aux_costo_elec_2_1_a[0].$aux_costo_elec_2_1_a[1].$aux_costo_elec_2_1_a[2];
                        }
                        if(count($aux_costo_elec_2_1_a) == 4){
                            $costo_elec_aux_2_1 =  $aux_costo_elec_2_1_a[0].$aux_costo_elec_2_1_a[1].$aux_costo_elec_2_1_a[2].$aux_costo_elec_2_1_a[3];
                        }
                        if(count($aux_costo_elec_2_1_a) == 5){
                            $costo_elec_aux_2_1 =  $aux_costo_elec_2_1_a[0].$aux_costo_elec_2_1_a[1].$aux_costo_elec_2_1_a[2].$aux_costo_elec_2_1_a[3].$aux_costo_elec_2_1_a[4];
                        }

                $solution_enf2_1->costo_elec=floatval($costo_elec_aux_2_1);

                $cooling_hours_aux_2_1 = explode(",",   $request->get('hrsEnfriado_2_1'));
                if(count($cooling_hours_aux_2_1) == 1){
                    $aux_cooling_hours_2_1 =  $cooling_hours_aux_2_1[0];
                }
                if(count($cooling_hours_aux_2_1) == 2){
                    $aux_cooling_hours_2_1=  $cooling_hours_aux_2_1[0].$cooling_hours_aux_2_1[1];
                }
                if(count($cooling_hours_aux_2_1) == 3){
                    $aux_cooling_hours_2_1 =  $cooling_hours_aux_2_1[0].$cooling_hours_aux_2_1[1].$cooling_hours_aux_2_1[2];
                }
                if(count($cooling_hours_aux_2_1) == 4){
                    $aux_cooling_hours_2_1 =  $cooling_hours_aux_2_1[0].$cooling_hours_aux_2_1[1].$cooling_hours_aux_2_1[2].$cooling_hours_aux_2_1[3];
                }
                if(count($cooling_hours_aux_2_1) == 5){
                    $aux_cooling_hours_2_1 =  $cooling_hours_aux_2_1[0].$cooling_hours_aux_2_1[1].$cooling_hours_aux_2_1[2].$cooling_hours_aux_2_1[3].$cooling_hours_aux_2_1[4];
                }

                $solution_enf2_1->coolings_hours=intval($aux_cooling_hours_2_1);
                $solution_enf2_1->eficencia_ene=$request->get('csStd_2_1');
                $solution_enf2_1->eficencia_ene_cant=floatval($request->get('csStd_cant_2_1'));
                $solution_enf2_1->tipo_control=$request->get('tipo_control_2_1');

                $solution_enf2_1->dr=$request->get('dr_2_1');
                $solution_enf2_1->mantenimiento	=$request->get('csMantenimiento_2_1');


                if($request->get('cheValorS_2_1') != null){
                    $aux_val_aprox_2_1 = explode("$",   $request->get('cheValorS_2_1'));
                    $aux_val_aprox_2_1_a = explode(",",    $aux_val_aprox_2_1[1]);
                    if(count($aux_val_aprox_2_1_a) == 1){
                        $val_aprox_aux_2_1 =  $aux_val_aprox_2_1_a[0];
                    }
                    if(count($aux_val_aprox_2_1_a) == 2){
                        $val_aprox_aux_2_1=  $aux_val_aprox_2_1_a[0].$aux_val_aprox_2_1_a[1];
                    }
                    if(count($aux_val_aprox_2_1_a) == 3){
                        $val_aprox_aux_2_1 =  $aux_val_aprox_2_1_a[0].$aux_val_aprox_2_1_a[1].$aux_val_aprox_2_1_a[2];
                    }
                    if(count($aux_val_aprox_2_1_a) == 4){
                        $val_aprox_aux_2_1 =  $aux_val_aprox_2_1_a[0].$aux_val_aprox_2_1_a[1].$aux_val_aprox_2_1_a[2].$aux_val_aprox_2_1_a[3];
                    }
                    if(count($aux_val_aprox_2_1_a) == 5){
                        $val_aprox_aux_2_1 =  $aux_val_aprox_2_1_a[0].$aux_val_aprox_2_1_a[1].$aux_val_aprox_2_1_a[2].$aux_val_aprox_2_1_a[3].$aux_val_aprox_2_1_a[4];
                    }
                }else  if($request->get('cheValorS_2_1') == null){
                        $val_aprox_aux_2_1 = 0;
                }

                if($request->get('maintenance_cost_2_1') != null){
                    $aux_cost_mant_2_1 = explode("$",   $request->get('maintenance_cost_2_1'));
                    $aux_cost_mant_a_2_1 = explode(",",    $aux_cost_mant_2_1[1]);

                    if(count($aux_cost_mant_a_2_1) == 1){
                        $aux_cost_mant_2_1 =  $aux_cost_mant_a_2_1[0];
                    }
                    if(count($aux_cost_mant_a_2_1) == 2){
                        $aux_cost_mant_2_1=  $aux_cost_mant_a_2_1[0].$aux_cost_mant_a_2_1[1];
                    }
                    if(count($aux_cost_mant_a_2_1) == 3){
                        $aux_cost_mant_2_1 =  $aux_cost_mant_a_2_1[0].$aux_cost_mant_a_2_1[1].$aux_cost_mant_a_2_1[2];
                    }
                    if(count($aux_cost_mant_a_2_1) == 4){
                        $aux_cost_mant_2_1 =  $aux_cost_mant_a_2_1[0].$aux_cost_mant_a_2_1[1].$aux_cost_mant_a_2_1[2].$aux_cost_mant_a_2_1[3];
                    }
                    if(count($aux_cost_mant_a_2_1) == 5){
                        $aux_cost_mant_2_1 =  $aux_cost_mant_a_2_1[0].$aux_cost_mant_a_2_1[1].$aux_cost_mant_a_2_1[2].$aux_cost_mant_a_2_1[3].$aux_cost_mant_a_2_1[4];
                    }

                }else  if($request->get('maintenance_cost_2_1') == null){
                    $aux_cost_mant_2_1 = 0;
                }

                $solution_enf2_1->val_aprox	=floatval($val_aprox_aux_2_1);
                $solution_enf2_1->costo_mantenimiento=floatval($aux_cost_mant_2_1);
                $solution_enf2_1->status=1;
                $solution_enf2_1->id_empresa=Auth::user()->id_empresa;
                $solution_enf2_1->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf2_1->coolings_hours;
                $cost_energ =  $solution_enf2_1->costo_elec;
                $seer = floatval($request->get('csStd_cant_2_1'));

               if ($solution_enf2_1->unid_med == 'TR') {

                $tr =  $solution_enf2_1->capacidad_tot;
                //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
               //((TR x 12000)
               $res_trx_12000 = $tr * 12000;
               //((TR x 12000) x (Cooling Hours)
               $res_1er_parent = $res_trx_12000 * $cooling_hrs;
               //((TR x 12000) x (Cooling Hours)  / (SEER) )
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
                $factor_m =$request->get('csMantenimiento_2_1');

                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                if($solution_enf2_1->tipo_equipo === "pa_pi_te"){
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

                $solution_enf2_1->cost_op_an = $res_res_fact_m;
            }else if($solution_enf2_1->unid_med == 'KW'){
                     //(((Kw / 3.5)
                     $kw =  $solution_enf2_1->capacidad_tot;
                     $kw_3_5 = $kw / 3.5;
                     //(((Kw / 3.5) x 12000 )
                     $kw_a = $kw_3_5 * 12000;
                     $res_dividiendo = $kw_a * $cooling_hrs;
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
                        if($solution_enf2_1->tipo_equipo === "pa_pi_te"){
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
                        $solution_enf2_1->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));

                    }

                    $unidad_conf_1_1 = $solution_enf2_1->unidad_hvac;
 $equipo_conf_1_1 = $solution_enf2_1->tipo_equipo;
 $diseno_conf_1_1 = $solution_enf2_1->name_disenio;
 $t_control_conf_1_1 = $solution_enf2_1->name_t_control;
 $dr_conf_1_1 = $solution_enf2_1->dr_name;
 $mant_conf_1_1 = $solution_enf2_1->mantenimiento;

 if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 5;
                break;
             default:
           }

           switch ($dr_conf_1_1) {
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
             case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
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
             case 'Ducto Flex y Plenum Retorno':
                 $val_conf_dis_1_1 = 3;
               break;
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 4.5;
               break;
             default:
           }

           switch ($dr_conf_1_1) {
             case 'No Aplica':
                 $val_conf_dr_1_1 = 2;
               break;
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
               case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
               break;

             default:
           }
     }

     if($equipo_conf_1_1 === 'fancoil'){
         switch ($diseno_conf_1_1) {
             case 'Inyección y Retorno Ductado':
                 $val_conf_dis_1_1 = 4;
               break;
             case 'Ducto Flex. y Retorno Ductado':
                 $val_conf_dis_1_1 = 3.5;
               break;
             case 'Ducto Flex y Plenum Retorno':
                 $val_conf_dis_1_1 = 3;
               break;
             case 'Baja Presión Estática':
                 $val_conf_dis_1_1 = 2.5;
               break;
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 4.5;
               break;

             default:
           }

           switch ($dr_conf_1_1) {
             case 'No Aplica':
                 $val_conf_dr_1_1 = 2;
               break;
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
               case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
               break;

             default:
           }
     }

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
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 5;
               break;
             default:
           }

           switch ($dr_conf_1_1) {
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
             case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
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
                $val_conf_dis_1_1 = 3.5;
              break;
            case 'Ducto Flex. y Plenum Retorno':
                $val_conf_dis_1_1 = 3;
              break;
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 5;
              break;
            default:
          }

           switch ($dr_conf_1_1) {
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
             case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
               break;
             default:
           }
     }

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
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 5;
               break;
             default:
           }

           switch ($dr_conf_1_1) {
             case 'No Aplica':
                 $val_conf_dr_1_1 = 2;
               break;
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
               case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
               break;

             default:
           }
     }
     //control
     switch ($t_control_conf_1_1) {
         case 'Termostatos Fuera Zona de Confort':
             $val_conf_crtl_1_1 = 2.5;
           break;
         case 'Termostatos en Zona de Confort':
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

 if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
     $val_conf_equipo_1_1 = 4;

     if($equipo_conf_1_1 === 'ca_pi_te'){
         switch ($diseno_conf_1_1) {
             case 'Sin Ventilación':
                 $val_conf_dis_1_1 = 2.5;
               break;

             case 'Con Ventilación DOA':
                 $val_conf_dis_1_1 = 3.5;
               break;

             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 4;
               break;
             default:
           }

     }

     if($equipo_conf_1_1 === 'fancoil_lsp'){
         switch ($diseno_conf_1_1) {
             case 'Sin Ventilación':
                 $val_conf_dis_1_1 = 2.5;
               break;

             case 'Descarga Directa Ductada':
                 $val_conf_dis_1_1 = 3.5;
               break;

             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 4;
               break;
             default:
           }
     }

     switch ($t_control_conf_1_1) {
         case 'Termostatos Fuera Zona de Confort':
             $val_conf_crtl_1_1 = 2.5;
           break;
         case 'Termostatos en Zona de Confort':
             $val_conf_crtl_1_1 = 4;
           break;
         case 'Termostato Inteligente en Zona':
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

 if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
     $val_conf_equipo_1_1 = 3.5;
     if($equipo_conf_1_1 === 'est_ptac'){
         switch ($diseno_conf_1_1) {
             case 'Sin Filración MERV 8':
                 $val_conf_dis_1_1 = 3.5;
               break;

             case 'Con Filtración MERV 8':
                 $val_conf_dis_1_1 = 3.5;
               break;

         default:
           }

           switch ($t_control_conf_1_1) {
             case 'Termostatos Fuera Zona de Confort':
                 $val_conf_crtl_1_1 = 3;
               break;
             case 'Termostatos en Zona de Confort':
                 $val_conf_crtl_1_1 = 4;
               break;
             case 'Termostato Inteligente en Zona':
                 $val_conf_crtl_1_1 = 5;
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
                 $val_conf_crtl_1_1 = 3;
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
             $val_conf_mant_1_1 = 2.5;
           break;
         case 'Deficiente':
             $val_conf_mant_1_1 = 3.5;
           break;
           case 'Sin Mantenimiento':
             $val_conf_mant_1_1 = 4.5;
           break;

         default:
       }
 }

 $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
 $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
 $solution_enf2_1->confort = $nivel_confotr_1_1;

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

                $aux_cap_tot_2_2 = explode(",",   $request->get('capacidad_total_2_2'));
                    if(count($aux_cap_tot_2_2) == 1){
                        $cap_tot_aux_2_2 =  $aux_cap_tot_2_2[0];
                    }
                    if(count($aux_cap_tot_2_2) == 2){
                        $cap_tot_aux_2_2=  $aux_cap_tot_2_2[0].$aux_cap_tot_2_2[1];
                    }
                    if(count($aux_cap_tot_2_2) == 3){
                        $cap_tot_aux_2_2 =  $aux_cap_tot_2_2[0].$aux_cap_tot_2_2[1].$aux_cap_tot_2_2[2];
                    }
                    if(count($aux_cap_tot_2_2) == 4){
                        $cap_tot_aux_2_2 =  $aux_cap_tot_2_2[0].$aux_cap_tot_2_2[1].$aux_cap_tot_2_2[2].$aux_cap_tot_2_2[3];
                    }
                    if(count($aux_cap_tot_2_2) == 5){
                        $cap_tot_aux_2_2 =  $aux_cap_tot_2_2[0].$aux_cap_tot_2_2[1].$aux_cap_tot_2_2[2].$aux_cap_tot_2_2[3].$aux_cap_tot_2_2[4];
                    }

                $solution_enf2_2->capacidad_tot = floatval($cap_tot_aux_2_2);
                $solution_enf2_2->unid_med = $request->get('unidad_capacidad_tot_2_2');

                $solution_enf2_2->name_disenio=$request->get('name_diseno_2_2');
                $solution_enf2_2->name_t_control=$request->get('name_t_control_2_2');
                $solution_enf2_2->dr_name=$request->get('dr_name_2_2');

                $aux_costo_elec_2_2 = explode("$",   $request->get('costo_elec_2_2'));
                $aux_costo_elec_2_2_a = explode(",",    $aux_costo_elec_2_2[1]);
                if(count($aux_costo_elec_2_2_a) == 1){
                    $costo_elec_aux_2_2 =  $aux_costo_elec_2_2_a[0];
                }
                if(count($aux_costo_elec_2_2_a) == 2){
                    $costo_elec_aux_2_2=  $aux_costo_elec_2_2_a[0].$aux_costo_elec_2_2_a[1];
                }
                if(count($aux_costo_elec_2_2_a) == 3){
                    $costo_elec_aux_2_2 =  $aux_costo_elec_2_2_a[0].$aux_costo_elec_2_2_a[1].$aux_costo_elec_2_2_a[2];
                }
                if(count($aux_costo_elec_2_2_a) == 4){
                    $costo_elec_aux_2_2 =  $aux_costo_elec_2_2_a[0].$aux_costo_elec_2_2_a[1].$aux_costo_elec_2_2_a[2].$aux_costo_elec_2_2_a[3];
                }
                if(count($aux_costo_elec_2_2_a) == 5){
                    $costo_elec_aux_2_2 =  $aux_costo_elec_2_2_a[0].$aux_costo_elec_2_2_a[1].$aux_costo_elec_2_2_a[2].$aux_costo_elec_2_2_a[3].$aux_costo_elec_2_2_a[4];
                }

                $solution_enf2_2->costo_elec = floatval($costo_elec_aux_2_2);

                $cooling_hours_aux_2_2 = explode(",",   $request->get('hrsEnfriado_2_2'));
                if(count($cooling_hours_aux_2_2) == 1){
                    $aux_cooling_hours_2_2 =  $cooling_hours_aux_2_2[0];
                }
                if(count($cooling_hours_aux_2_2) == 2){
                    $aux_cooling_hours_2_2=  $cooling_hours_aux_2_2[0].$cooling_hours_aux_2_2[1];
                }
                if(count($cooling_hours_aux_2_2) == 3){
                    $aux_cooling_hours_2_2 =  $cooling_hours_aux_2_2[0].$cooling_hours_aux_2_2[1].$cooling_hours_aux_2_2[2];
                }
                if(count($cooling_hours_aux_2_2) == 4){
                    $aux_cooling_hours_2_2 =  $cooling_hours_aux_2_2[0].$cooling_hours_aux_2_2[1].$cooling_hours_aux_2_2[2].$cooling_hours_aux_2_2[3];
                }
                if(count($cooling_hours_aux_2_2) == 5){
                    $aux_cooling_hours_2_2 =  $cooling_hours_aux_2_2[0].$cooling_hours_aux_2_2[1].$cooling_hours_aux_2_2[2].$cooling_hours_aux_2_2[3].$cooling_hours_aux_2_2[4];
                }

                $solution_enf2_2->coolings_hours = intval($aux_cooling_hours_2_2);
                $solution_enf2_2->eficencia_ene = $request->get('csStd_2_2');
                $solution_enf2_2->eficencia_ene_cant = floatval($request->get('csStd_cant_2_2'));
                $solution_enf2_2->tipo_control = $request->get('tipo_control_2_2');

                $solution_enf2_2->dr = $request->get('dr_2_2');
                $solution_enf2_2->mantenimiento = $request->get('cheMantenimiento_2_2');

                if($request->get('cheValorS_2_2') != null){
                    $aux_val_aprox_2_2 = explode("$",   $request->get('cheValorS_2_2'));
                    $aux_val_aprox_2_2_a = explode(",",    $aux_val_aprox_2_2[1]);
                    if(count($aux_val_aprox_2_2_a) == 1){
                        $val_aprox_aux_2_2 =  $aux_val_aprox_2_2_a[0];
                    }
                    if(count($aux_val_aprox_2_2_a) == 2){
                        $val_aprox_aux_2_2=  $aux_val_aprox_2_2_a[0].$aux_val_aprox_2_2_a[1];
                    }
                    if(count($aux_val_aprox_2_2_a) == 3){
                        $val_aprox_aux_2_2 =  $aux_val_aprox_2_2_a[0].$aux_val_aprox_2_2_a[1].$aux_val_aprox_2_2_a[2];
                    }
                    if(count($aux_val_aprox_2_2_a) == 4){
                        $val_aprox_aux_2_2 =  $aux_val_aprox_2_2_a[0].$aux_val_aprox_2_2_a[1].$aux_val_aprox_2_2_a[2].$aux_val_aprox_2_2_a[3];
                    }
                    if(count($aux_val_aprox_2_2_a) == 5){
                        $val_aprox_aux_2_2 =  $aux_val_aprox_2_2_a[0].$aux_val_aprox_2_2_a[1].$aux_val_aprox_2_2_a[2].$aux_val_aprox_2_2_a[3].$aux_val_aprox_2_2_a[4];
                    }
                }else  if($request->get('cheValorS_2_2') == null){
                        $val_aprox_aux_2_2 = 0;
                }

                if($request->get('maintenance_cost_2_2') != null){
                    $aux_cost_mant_2_2 = explode("$",   $request->get('maintenance_cost_2_2'));
                    $aux_cost_mant_a_2_2 = explode(",",    $aux_cost_mant_2_2[1]);

                    if(count($aux_cost_mant_a_2_2) == 1){
                        $aux_cost_mant_2_2 =  $aux_cost_mant_a_2_2[0];
                    }
                    if(count($aux_cost_mant_a_2_2) == 2){
                        $aux_cost_mant_2_2=  $aux_cost_mant_a_2_2[0].$aux_cost_mant_a_2_2[1];
                    }
                    if(count($aux_cost_mant_a_2_2) == 3){
                        $aux_cost_mant_2_2 =  $aux_cost_mant_a_2_2[0].$aux_cost_mant_a_2_2[1].$aux_cost_mant_a_2_2[2];
                    }
                    if(count($aux_cost_mant_a_2_2) == 4){
                        $aux_cost_mant_2_2 =  $aux_cost_mant_a_2_2[0].$aux_cost_mant_a_2_2[1].$aux_cost_mant_a_2_2[2].$aux_cost_mant_a_2_2[3];
                    }
                    if(count($aux_cost_mant_a_2_2) == 5){
                        $aux_cost_mant_2_2 =  $aux_cost_mant_a_2_2[0].$aux_cost_mant_a_2_2[1].$aux_cost_mant_a_2_2[2].$aux_cost_mant_a_2_2[3].$aux_cost_mant_a_2_2[4];
                    }


                }else  if($request->get('maintenance_cost_2_2') == null){
                    $aux_cost_mant_2_2 = 0;

                }


                $solution_enf2_2->costo_mantenimiento=floatval($aux_cost_mant_2_2);

                $solution_enf2_2->val_aprox = floatval($val_aprox_aux_2_2);
                $solution_enf2_2->status = 1;
                $solution_enf2_2->id_empresa=Auth::user()->id_empresa;
                $solution_enf2_2->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf2_2->coolings_hours;
                $cost_energ =  $solution_enf2_2->costo_elec;
                $seer = $solution_enf2_2->eficencia_ene_cant;

               if ($solution_enf2_2->unid_med == 'TR') {

                $tr =  $solution_enf2_2->capacidad_tot;
                //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
               //((TR x 12000)
               $res_trx_12000 = $tr * 12000;
               //((TR x 12000) x (Cooling Hours)
               $res_1er_parent = $res_trx_12000 * $cooling_hrs;
               //((TR x 12000) x (Cooling Hours)  / (SEER) )
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
                $factor_m = $request->get('cheMantenimiento_2_2');

                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                if($solution_enf2_2->tipo_equipo === "pa_pi_te"){
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

                $solution_enf2_2->cost_op_an = $res_res_fact_m;
            }else if($solution_enf2_2->unid_med == 'KW'){
                $kw =  $solution_enf2_2->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs;
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
                   if($solution_enf2_2->tipo_equipo === "pa_pi_te"){
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
                   $solution_enf2_2->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
            }

                                                      //niveles de confort
 $unidad_conf_1_1 = $solution_enf2_2->unidad_hvac;
 $equipo_conf_1_1 = $solution_enf2_2->tipo_equipo;
 $diseno_conf_1_1 = $solution_enf2_2->name_disenio;
 $t_control_conf_1_1 = $solution_enf2_2->name_t_control;
 $dr_conf_1_1 = $solution_enf2_2->dr_name;
 $mant_conf_1_1 = $solution_enf2_2->mantenimiento;

 if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 5;
                break;
             default:
           }

           switch ($dr_conf_1_1) {
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
             case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
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
             case 'Ducto Flex y Plenum Retorno':
                 $val_conf_dis_1_1 = 3;
               break;
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 4.5;
               break;
             default:
           }

           switch ($dr_conf_1_1) {
             case 'No Aplica':
                 $val_conf_dr_1_1 = 2;
               break;
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
               case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
               break;

             default:
           }
     }

     if($equipo_conf_1_1 === 'fancoil'){
         switch ($diseno_conf_1_1) {
             case 'Inyección y Retorno Ductado':
                 $val_conf_dis_1_1 = 4;
               break;
             case 'Ducto Flex. y Retorno Ductado':
                 $val_conf_dis_1_1 = 3.5;
               break;
             case 'Ducto Flex y Plenum Retorno':
                 $val_conf_dis_1_1 = 3;
               break;
             case 'Baja Presión Estática':
                 $val_conf_dis_1_1 = 2.5;
               break;
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 4.5;
               break;

             default:
           }

           switch ($dr_conf_1_1) {
             case 'No Aplica':
                 $val_conf_dr_1_1 = 2;
               break;
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
               case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
               break;

             default:
           }
     }

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
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 5;
               break;
             default:
           }

           switch ($dr_conf_1_1) {
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
             case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
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
                $val_conf_dis_1_1 = 3.5;
              break;
            case 'Ducto Flex. y Plenum Retorno':
                $val_conf_dis_1_1 = 3;
              break;
            case 'ASHRAE 55/62.1/90.1':
                $val_conf_dis_1_1 = 5;
              break;
            default:
          }

           switch ($dr_conf_1_1) {
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
             case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
               break;
             default:
           }
     }

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
             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 5;
               break;
             default:
           }

           switch ($dr_conf_1_1) {
             case 'No Aplica':
                 $val_conf_dr_1_1 = 2;
               break;
             case 'Cumple ASHRAE  Standard 70':
                 $val_conf_dr_1_1 = 5;
               break;
               case 'No Cumple ASHRAE Standard 70':
                 $val_conf_dr_1_1 = 3;
               break;

             default:
           }
     }
     //control
     switch ($t_control_conf_1_1) {
         case 'Termostatos Fuera Zona de Confort':
             $val_conf_crtl_1_1 = 2.5;
           break;
         case 'Termostatos en Zona de Confort':
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

 if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
     $val_conf_equipo_1_1 = 4;

     if($equipo_conf_1_1 === 'ca_pi_te'){
         switch ($diseno_conf_1_1) {
             case 'Sin Ventilación':
                 $val_conf_dis_1_1 = 2.5;
               break;

             case 'Con Ventilación DOA':
                 $val_conf_dis_1_1 = 3.5;
               break;

             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 4;
               break;
             default:
           }

     }

     if($equipo_conf_1_1 === 'fancoil_lsp'){
         switch ($diseno_conf_1_1) {
             case 'Sin Ventilación':
                 $val_conf_dis_1_1 = 2.5;
               break;

             case 'Descarga Directa Ductada':
                 $val_conf_dis_1_1 = 3.5;
               break;

             case 'ASHRAE 55/62.1/90.1':
                 $val_conf_dis_1_1 = 4;
               break;
             default:
           }
     }

     switch ($t_control_conf_1_1) {
         case 'Termostatos Fuera Zona de Confort':
             $val_conf_crtl_1_1 = 2.5;
           break;
         case 'Termostatos en Zona de Confort':
             $val_conf_crtl_1_1 = 4;
           break;
         case 'Termostato Inteligente en Zona':
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

 if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
     $val_conf_equipo_1_1 = 3.5;
     if($equipo_conf_1_1 === 'est_ptac'){
         switch ($diseno_conf_1_1) {
             case 'Sin Filración MERV 8':
                 $val_conf_dis_1_1 = 3.5;
               break;

             case 'Con Filtración MERV 8':
                 $val_conf_dis_1_1 = 3.5;
               break;

         default:
           }

           switch ($t_control_conf_1_1) {
             case 'Termostatos Fuera Zona de Confort':
                 $val_conf_crtl_1_1 = 3;
               break;
             case 'Termostatos en Zona de Confort':
                 $val_conf_crtl_1_1 = 4;
               break;
             case 'Termostato Inteligente en Zona':
                 $val_conf_crtl_1_1 = 5;
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
                 $val_conf_crtl_1_1 = 3;
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
             $val_conf_mant_1_1 = 2.5;
           break;
         case 'Deficiente':
             $val_conf_mant_1_1 = 3.5;
           break;
           case 'Sin Mantenimiento':
             $val_conf_mant_1_1 = 4.5;
           break;

         default:
       }
 }

 $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
 $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
 $solution_enf2_2->confort = $nivel_confotr_1_1;

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

                    $aux_cap_tot_2_3 = explode(",",   $request->get('capacidad_total_2_3'));
                    if(count($aux_cap_tot_2_3) == 1){
                        $cap_tot_aux_2_3 =  $aux_cap_tot_2_3[0];
                    }
                    if(count($aux_cap_tot_2_3) == 2){
                        $cap_tot_aux_2_3=  $aux_cap_tot_2_3[0].$aux_cap_tot_2_3[1];
                    }
                    if(count($aux_cap_tot_2_3) == 3){
                        $cap_tot_aux_2_3 =  $aux_cap_tot_2_3[0].$aux_cap_tot_2_3[1].$aux_cap_tot_2_3[2];
                    }
                    if(count($aux_cap_tot_2_3) == 4){
                        $cap_tot_aux_2_3 =  $aux_cap_tot_2_3[0].$aux_cap_tot_2_3[1].$aux_cap_tot_2_3[2].$aux_cap_tot_2_3[3];
                    }
                    if(count($aux_cap_tot_2_3) == 5){
                        $cap_tot_aux_2_3 =  $aux_cap_tot_2_3[0].$aux_cap_tot_2_3[1].$aux_cap_tot_2_3[2].$aux_cap_tot_2_3[3].$aux_cap_tot_2_3[4];
                    }

                    $solution_enf2_3->capacidad_tot =floatval($cap_tot_aux_2_3);
                    $solution_enf2_3->unid_med = $request->get('unidad_capacidad_tot_2_3');

                    $solution_enf2_3->name_disenio=$request->get('name_diseno_2_3');
                    $solution_enf2_3->name_t_control=$request->get('name_t_control_2_3');
                    $solution_enf2_3->dr_name=$request->get('dr_name_2_3');

                    $aux_costo_elec_2_3 = explode("$",   $request->get('costo_elec_2_3'));
                        $aux_costo_elec_2_3_a = explode(",",    $aux_costo_elec_2_3[1]);
                        if(count($aux_costo_elec_2_3_a) == 1){
                            $costo_elec_aux_2_3 =  $aux_costo_elec_2_3_a[0];
                        }
                        if(count($aux_costo_elec_2_3_a) == 2){
                            $costo_elec_aux_2_3=  $aux_costo_elec_2_3_a[0].$aux_costo_elec_2_3_a[1];
                        }
                        if(count($aux_costo_elec_2_3_a) == 3){
                            $costo_elec_aux_2_3 =  $aux_costo_elec_2_3_a[0].$aux_costo_elec_2_3_a[1].$aux_costo_elec_2_3_a[2];
                        }
                        if(count($aux_costo_elec_2_3_a) == 4){
                            $costo_elec_aux_2_3 =  $aux_costo_elec_2_3_a[0].$aux_costo_elec_2_3_a[1].$aux_costo_elec_2_3_a[2].$aux_costo_elec_2_3_a[3];
                        }
                        if(count($aux_costo_elec_2_3_a) == 5){
                            $costo_elec_aux_2_3 =  $aux_costo_elec_2_3_a[0].$aux_costo_elec_2_3_a[1].$aux_costo_elec_2_3_a[2].$aux_costo_elec_2_3_a[3].$aux_costo_elec_2_3_a[4];
                        }

                    $solution_enf2_3->costo_elec = floatval($costo_elec_aux_2_3);


                            $cooling_hours_aux_2_3 = explode(",",   $request->get('hrsEnfriado_2_3'));
                        if(count($cooling_hours_aux_2_3) == 1){
                            $aux_cooling_hours_2_3 =  $cooling_hours_aux_2_3[0];
                        }
                        if(count($cooling_hours_aux_2_3) == 2){
                            $aux_cooling_hours_2_3=  $cooling_hours_aux_2_3[0].$cooling_hours_aux_2_3[1];
                        }
                        if(count($cooling_hours_aux_2_3) == 3){
                            $aux_cooling_hours_2_3 =  $cooling_hours_aux_2_3[0].$cooling_hours_aux_2_3[1].$cooling_hours_aux_2_3[2];
                        }
                        if(count($cooling_hours_aux_2_3) == 4){
                            $aux_cooling_hours_2_3 =  $cooling_hours_aux_2_3[0].$cooling_hours_aux_2_3[1].$cooling_hours_aux_2_3[2].$cooling_hours_aux_2_3[3];
                        }
                        if(count($cooling_hours_aux_2_3) == 5){
                            $aux_cooling_hours_2_3 =  $cooling_hours_aux_2_3[0].$cooling_hours_aux_2_3[1].$cooling_hours_aux_2_3[2].$cooling_hours_aux_2_3[3].$cooling_hours_aux_2_3[4];
                        }
                    $solution_enf2_3->coolings_hours = intval($aux_cooling_hours_2_3);
                    $solution_enf2_3->eficencia_ene = $request->get('csStd_2_3');
                    $solution_enf2_3->eficencia_ene_cant = floatval($request->get('csStd_cant_2_3'));
                    $solution_enf2_3->tipo_control = $request->get('tipo_control_2_3');

                    $solution_enf2_3->dr = $request->get('dr_2_3');
                    $solution_enf2_3->mantenimiento = $request->get('cheMantenimiento_2_3');


                    if($request->get('cheValorS_2_3') != null){
                        $aux_val_aprox_2_3 = explode("$",   $request->get('cheValorS_2_3'));
                        $aux_val_aprox_2_3_a = explode(",",    $aux_val_aprox_2_3[1]);
                        if(count($aux_val_aprox_2_3_a) == 1){
                            $val_aprox_aux_2_3 =  $aux_val_aprox_2_3_a[0];
                        }
                        if(count($aux_val_aprox_2_3_a) == 2){
                            $val_aprox_aux_2_3=  $aux_val_aprox_2_3_a[0].$aux_val_aprox_2_3_a[1];
                        }
                        if(count($aux_val_aprox_2_3_a) == 3){
                            $val_aprox_aux_2_3 =  $aux_val_aprox_2_3_a[0].$aux_val_aprox_2_3_a[1].$aux_val_aprox_2_3_a[2];
                        }
                        if(count($aux_val_aprox_2_3_a) == 4){
                            $val_aprox_aux_2_3 =  $aux_val_aprox_2_3_a[0].$aux_val_aprox_2_3_a[1].$aux_val_aprox_2_3_a[2].$aux_val_aprox_2_3_a[3];
                        }
                        if(count($aux_val_aprox_2_3_a) == 5){
                            $val_aprox_aux_2_3 =  $aux_val_aprox_2_3_a[0].$aux_val_aprox_2_3_a[1].$aux_val_aprox_2_3_a[2].$aux_val_aprox_2_3_a[3].$aux_val_aprox_2_3_a[4];
                        }
                    }else  if($request->get('cheValorS_2_3') == null){
                            $val_aprox_aux_2_3 = 0;
                    }

                    if($request->get('maintenance_cost_2_3') != null){
                        $aux_cost_mant_2_3 = explode("$",   $request->get('maintenance_cost_2_3'));
                        $aux_cost_mant_b_2_3 = explode(",",    $aux_cost_mant_2_3[1]);

                        if(count($aux_cost_mant_b_2_3) == 1){
                            $aux_cost_mant_2_3 =  $aux_cost_mant_b_2_3[0];
                        }
                        if(count($aux_cost_mant_b_2_3) == 2){
                            $aux_cost_mant_2_3=  $aux_cost_mant_b_2_3[0].$aux_cost_mant_b_2_3[1];
                        }
                        if(count($aux_cost_mant_b_2_3) == 3){
                            $aux_cost_mant_2_3 =  $aux_cost_mant_b_2_3[0].$aux_cost_mant_b_2_3[1].$aux_cost_mant_b_2_3[2];
                        }
                        if(count($aux_cost_mant_b_2_3) == 4){
                            $aux_cost_mant_2_3 =  $aux_cost_mant_b_2_3[0].$aux_cost_mant_b_2_3[1].$aux_cost_mant_b_2_3[2].$aux_cost_mant_b_2_3[3];
                        }
                        if(count($aux_cost_mant_b_2_3) == 5){
                            $aux_cost_mant_2_3 =  $aux_cost_mant_b_2_3[0].$aux_cost_mant_b_2_3[1].$aux_cost_mant_b_2_3[2].$aux_cost_mant_b_2_3[3].$aux_cost_mant_b_2_3[4];
                        }


                    }else  if($request->get('maintenance_cost_2_3') == null){
                        $aux_cost_mant_2_3 = 0;

                    }

                    $solution_enf2_3->costo_mantenimiento=floatval($aux_cost_mant_2_3);
                    $solution_enf2_3->val_aprox = floatval($val_aprox_aux_2_3);
                    $solution_enf2_3->status = 1;
                    $solution_enf2_3->id_empresa=Auth::user()->id_empresa;
                    $solution_enf2_3->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf2_3->coolings_hours;
                    $cost_energ =  $solution_enf2_3->costo_elec;
                    $seer = $solution_enf2_3->eficencia_ene_cant;

                if ($solution_enf2_3->unid_med == 'TR') {

                    $tr =  $solution_enf2_3->capacidad_tot;
                    //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
                   //((TR x 12000)
                   $res_trx_12000 = $tr * 12000;
                   //((TR x 12000) x (Cooling Hours)
                   $res_1er_parent = $res_trx_12000 * $cooling_hrs;
                   //((TR x 12000) x (Cooling Hours)  / (SEER) )
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
                    $factor_m =$request->get('cheMantenimiento_2_3');

                    $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                    $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                    $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                    $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                    $res_res =  $res_parent_1 *  $factor_c;

                    if($solution_enf2_3->tipo_equipo === "pa_pi_te"){
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
                         $solution_enf2_3->cost_op_an = $res_res_fact_m;
                }else if($solution_enf2_3->unid_med == 'KW'){
                    $kw =  $solution_enf2_3->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs;
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
                   if($solution_enf2_3->tipo_equipo === "pa_pi_te"){
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
                   $solution_enf2_3->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
                }

                $unidad_conf_1_1 = $solution_enf2_3->unidad_hvac;
                $equipo_conf_1_1 = $solution_enf2_3->tipo_equipo;
                $diseno_conf_1_1 = $solution_enf2_3->name_disenio;
                $t_control_conf_1_1 = $solution_enf2_3->name_t_control;
                $dr_conf_1_1 = $solution_enf2_3->dr_name;
                $mant_conf_1_1 = $solution_enf2_3->mantenimiento;

                if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
                            case 'ASHRAE 55/62.1/90.1':
                                $val_conf_dis_1_1 = 5;
                               break;
                            default:
                          }

                          switch ($dr_conf_1_1) {
                            case 'Cumple ASHRAE  Standard 70':
                                $val_conf_dr_1_1 = 5;
                              break;
                            case 'No Cumple ASHRAE Standard 70':
                                $val_conf_dr_1_1 = 3;
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
                            case 'Ducto Flex y Plenum Retorno':
                                $val_conf_dis_1_1 = 3;
                              break;
                            case 'ASHRAE 55/62.1/90.1':
                                $val_conf_dis_1_1 = 4.5;
                              break;
                            default:
                          }

                          switch ($dr_conf_1_1) {
                            case 'No Aplica':
                                $val_conf_dr_1_1 = 2;
                              break;
                            case 'Cumple ASHRAE  Standard 70':
                                $val_conf_dr_1_1 = 5;
                              break;
                              case 'No Cumple ASHRAE Standard 70':
                                $val_conf_dr_1_1 = 3;
                              break;

                            default:
                          }
                    }

                    if($equipo_conf_1_1 === 'fancoil'){
                        switch ($diseno_conf_1_1) {
                            case 'Inyección y Retorno Ductado':
                                $val_conf_dis_1_1 = 4;
                              break;
                            case 'Ducto Flex. y Retorno Ductado':
                                $val_conf_dis_1_1 = 3.5;
                              break;
                            case 'Ducto Flex y Plenum Retorno':
                                $val_conf_dis_1_1 = 3;
                              break;
                            case 'Baja Presión Estática':
                                $val_conf_dis_1_1 = 2.5;
                              break;
                            case 'ASHRAE 55/62.1/90.1':
                                $val_conf_dis_1_1 = 4.5;
                              break;

                            default:
                          }

                          switch ($dr_conf_1_1) {
                            case 'No Aplica':
                                $val_conf_dr_1_1 = 2;
                              break;
                            case 'Cumple ASHRAE  Standard 70':
                                $val_conf_dr_1_1 = 5;
                              break;
                              case 'No Cumple ASHRAE Standard 70':
                                $val_conf_dr_1_1 = 3;
                              break;

                            default:
                          }
                    }

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
                            case 'ASHRAE 55/62.1/90.1':
                                $val_conf_dis_1_1 = 5;
                              break;
                            default:
                          }

                          switch ($dr_conf_1_1) {
                            case 'Cumple ASHRAE  Standard 70':
                                $val_conf_dr_1_1 = 5;
                              break;
                            case 'No Cumple ASHRAE Standard 70':
                                $val_conf_dr_1_1 = 3;
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
                                $val_conf_dis_1_1 = 3.5;
                              break;
                            case 'Ducto Flex. y Plenum Retorno':
                                $val_conf_dis_1_1 = 3;
                              break;
                            case 'ASHRAE 55/62.1/90.1':
                                $val_conf_dis_1_1 = 5;
                              break;
                            default:
                          }

                          switch ($dr_conf_1_1) {
                            case 'Cumple ASHRAE  Standard 70':
                                $val_conf_dr_1_1 = 5;
                              break;
                            case 'No Cumple ASHRAE Standard 70':
                                $val_conf_dr_1_1 = 3;
                              break;
                            default:
                          }
                    }

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
                            case 'ASHRAE 55/62.1/90.1':
                                $val_conf_dis_1_1 = 5;
                              break;
                            default:
                          }

                          switch ($dr_conf_1_1) {
                            case 'No Aplica':
                                $val_conf_dr_1_1 = 2;
                              break;
                            case 'Cumple ASHRAE  Standard 70':
                                $val_conf_dr_1_1 = 5;
                              break;
                              case 'No Cumple ASHRAE Standard 70':
                                $val_conf_dr_1_1 = 3;
                              break;

                            default:
                          }
                    }
                    //control
                    switch ($t_control_conf_1_1) {
                        case 'Termostatos Fuera Zona de Confort':
                            $val_conf_crtl_1_1 = 2.5;
                          break;
                        case 'Termostatos en Zona de Confort':
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

                if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
                    $val_conf_equipo_1_1 = 4;

                    if($equipo_conf_1_1 === 'ca_pi_te'){
                        switch ($diseno_conf_1_1) {
                            case 'Sin Ventilación':
                                $val_conf_dis_1_1 = 2.5;
                              break;

                            case 'Con Ventilación DOA':
                                $val_conf_dis_1_1 = 3.5;
                              break;

                            case 'ASHRAE 55/62.1/90.1':
                                $val_conf_dis_1_1 = 4;
                              break;
                            default:
                          }

                    }

                    if($equipo_conf_1_1 === 'fancoil_lsp'){
                        switch ($diseno_conf_1_1) {
                            case 'Sin Ventilación':
                                $val_conf_dis_1_1 = 2.5;
                              break;

                            case 'Descarga Directa Ductada':
                                $val_conf_dis_1_1 = 3.5;
                              break;

                            case 'ASHRAE 55/62.1/90.1':
                                $val_conf_dis_1_1 = 4;
                              break;
                            default:
                          }
                    }

                    switch ($t_control_conf_1_1) {
                        case 'Termostatos Fuera Zona de Confort':
                            $val_conf_crtl_1_1 = 2.5;
                          break;
                        case 'Termostatos en Zona de Confort':
                            $val_conf_crtl_1_1 = 4;
                          break;
                        case 'Termostato Inteligente en Zona':
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

                if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
                    $val_conf_equipo_1_1 = 3.5;
                    if($equipo_conf_1_1 === 'est_ptac'){
                        switch ($diseno_conf_1_1) {
                            case 'Sin Filración MERV 8':
                                $val_conf_dis_1_1 = 3.5;
                              break;

                            case 'Con Filtración MERV 8':
                                $val_conf_dis_1_1 = 3.5;
                              break;

                        default:
                          }

                          switch ($t_control_conf_1_1) {
                            case 'Termostatos Fuera Zona de Confort':
                                $val_conf_crtl_1_1 = 3;
                              break;
                            case 'Termostatos en Zona de Confort':
                                $val_conf_crtl_1_1 = 4;
                              break;
                            case 'Termostato Inteligente en Zona':
                                $val_conf_crtl_1_1 = 5;
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
                                $val_conf_crtl_1_1 = 3;
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
                            $val_conf_mant_1_1 = 2.5;
                          break;
                        case 'Deficiente':
                            $val_conf_mant_1_1 = 3.5;
                          break;
                          case 'Sin Mantenimiento':
                            $val_conf_mant_1_1 = 4.5;
                          break;

                        default:
                      }
                }

                $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
                $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
                $solution_enf2_3->confort = $nivel_confotr_1_1;

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

                 $aux_cap_tot_3_1 = explode(",",   $request->get('capacidad_total_3_1'));
                    if(count($aux_cap_tot_3_1) == 1){
                        $cap_tot_aux_3_1 =  $aux_cap_tot_3_1[0];
                    }
                    if(count($aux_cap_tot_3_1) == 2){
                        $cap_tot_aux_3_1=  $aux_cap_tot_3_1[0].$aux_cap_tot_3_1[1];
                    }
                    if(count($aux_cap_tot_3_1) == 3){
                        $cap_tot_aux_3_1 =  $aux_cap_tot_3_1[0].$aux_cap_tot_3_1[1].$aux_cap_tot_3_1[2];
                    }
                    if(count($aux_cap_tot_3_1) == 4){
                        $cap_tot_aux_3_1 =  $aux_cap_tot_3_1[0].$aux_cap_tot_3_1[1].$aux_cap_tot_3_1[2].$aux_cap_tot_3_1[3];
                    }
                    if(count($aux_cap_tot_3_1) == 5){
                        $cap_tot_aux_3_1 =  $aux_cap_tot_3_1[0].$aux_cap_tot_3_1[1].$aux_cap_tot_3_1[2].$aux_cap_tot_3_1[3].$aux_cap_tot_3_1[4];
                    }

                 $solution_enf3_1->capacidad_tot=floatval($cap_tot_aux_3_1);
                 $solution_enf3_1->unid_med=$request->get('unidad_capacidad_tot_3_1');

                 $solution_enf3_1->name_disenio=$request->get('name_diseno_3_1');
                 $solution_enf3_1->name_t_control=$request->get('name_t_control_3_1');
                 $solution_enf3_1->dr_name=$request->get('dr_name_3_1');

                 $aux_costo_elec_3_1 = explode("$",   $request->get('costo_elec_3_1'));
                        $aux_costo_elec_3_1_a = explode(",",    $aux_costo_elec_3_1[1]);
                        if(count($aux_costo_elec_3_1_a) == 1){
                            $costo_elec_aux_3_1 =  $aux_costo_elec_3_1_a[0];
                        }
                        if(count($aux_costo_elec_3_1_a) == 2){
                            $costo_elec_aux_3_1=  $aux_costo_elec_3_1_a[0].$aux_costo_elec_3_1_a[1];
                        }
                        if(count($aux_costo_elec_3_1_a) == 3){
                            $costo_elec_aux_3_1 =  $aux_costo_elec_3_1_a[0].$aux_costo_elec_3_1_a[1].$aux_costo_elec_3_1_a[2];
                        }
                        if(count($aux_costo_elec_3_1_a) == 4){
                            $costo_elec_aux_3_1 =  $aux_costo_elec_3_1_a[0].$aux_costo_elec_3_1_a[1].$aux_costo_elec_3_1_a[2].$aux_costo_elec_3_1_a[3];
                        }
                        if(count($aux_costo_elec_3_1_a) == 5){
                            $costo_elec_aux_3_1 =  $aux_costo_elec_3_1_a[0].$aux_costo_elec_3_1_a[1].$aux_costo_elec_3_1_a[2].$aux_costo_elec_3_1_a[3].$aux_costo_elec_3_1_a[4];
                        }

                 $solution_enf3_1->costo_elec=floatval($costo_elec_aux_3_1);

                 $cooling_hours_aux_3_1 = explode(",",   $request->get('hrsEnfriado_3_1'));
                if(count($cooling_hours_aux_3_1) == 1){
                    $aux_cooling_hours_3_1 =  $cooling_hours_aux_3_1[0];
                }
                if(count($cooling_hours_aux_3_1) == 2){
                    $aux_cooling_hours_3_1=  $cooling_hours_aux_3_1[0].$cooling_hours_aux_3_1[1];
                }
                if(count($cooling_hours_aux_3_1) == 3){
                    $aux_cooling_hours_3_1 =  $cooling_hours_aux_3_1[0].$cooling_hours_aux_3_1[1].$cooling_hours_aux_3_1[2];
                }
                if(count($cooling_hours_aux_3_1) == 4){
                    $aux_cooling_hours_3_1 =  $cooling_hours_aux_3_1[0].$cooling_hours_aux_3_1[1].$cooling_hours_aux_3_1[2].$cooling_hours_aux_3_1[3];
                }
                if(count($cooling_hours_aux_3_1) == 5){
                    $aux_cooling_hours_3_1 =  $cooling_hours_aux_3_1[0].$cooling_hours_aux_3_1[1].$cooling_hours_aux_3_1[2].$cooling_hours_aux_3_1[3].$cooling_hours_aux_3_1[4];
                }

                 $solution_enf3_1->coolings_hours=intval($aux_cooling_hours_3_1);
                 $solution_enf3_1->eficencia_ene=$request->get('csStd2_3_1');
                 $solution_enf3_1->eficencia_ene_cant=floatval($request->get('cheStd_3_1'));
                 $solution_enf3_1->tipo_control=$request->get('tipo_control_3_1');

                 $solution_enf3_1->dr=$request->get('dr_3_1');
                 $solution_enf3_1->mantenimiento=$request->get('cheMantenimiento_3_1');

                 if($request->get('cheValorS_3_1') != null){
                    $aux_val_aprox_3_1 = explode("$",   $request->get('cheValorS_3_1'));
                    $aux_val_aprox_3_1_a = explode(",",    $aux_val_aprox_3_1[1]);
                    if(count($aux_val_aprox_3_1_a) == 1){
                        $val_aprox_aux_3_1 =  $aux_val_aprox_3_1_a[0];
                    }
                    if(count($aux_val_aprox_3_1_a) == 2){
                        $val_aprox_aux_3_1=  $aux_val_aprox_3_1_a[0].$aux_val_aprox_3_1_a[1];
                    }
                    if(count($aux_val_aprox_3_1_a) == 3){
                        $val_aprox_aux_3_1 =  $aux_val_aprox_3_1_a[0].$aux_val_aprox_3_1_a[1].$aux_val_aprox_3_1_a[2];
                    }
                    if(count($aux_val_aprox_3_1_a) == 4){
                        $val_aprox_aux_3_1 =  $aux_val_aprox_3_1_a[0].$aux_val_aprox_3_1_a[1].$aux_val_aprox_3_1_a[2].$aux_val_aprox_3_1_a[3];
                    }
                    if(count($aux_val_aprox_3_1_a) == 5){
                        $val_aprox_aux_3_1 =  $aux_val_aprox_3_1_a[0].$aux_val_aprox_3_1_a[1].$aux_val_aprox_3_1_a[2].$aux_val_aprox_3_1_a[3].$aux_val_aprox_3_1_a[4];
                    }
                }else  if($request->get('cheValorS_3_1') == null){
                        $val_aprox_aux_3_1 = 0;
                }


                if($request->get('maintenance_cost_3_1') != null){
                    $aux_cost_mant_3_1 = explode("$",   $request->get('maintenance_cost_3_1'));
                    $aux_cost_mant_a_3_1 = explode(",",    $aux_cost_mant_3_1[1]);

                    if(count($aux_cost_mant_a_3_1) == 1){
                        $aux_cost_mant_3_1 =  $aux_cost_mant_a_3_1[0];
                    }
                    if(count($aux_cost_mant_a_3_1) == 2){
                        $aux_cost_mant_3_1=  $aux_cost_mant_a_3_1[0].$aux_cost_mant_a_3_1[1];
                    }
                    if(count($aux_cost_mant_a_3_1) == 3){
                        $aux_cost_mant_3_1 =  $aux_cost_mant_a_3_1[0].$aux_cost_mant_a_3_1[1].$aux_cost_mant_a_3_1[2];
                    }
                    if(count($aux_cost_mant_a_3_1) == 4){
                        $aux_cost_mant_3_1 =  $aux_cost_mant_a_3_1[0].$aux_cost_mant_a_3_1[1].$aux_cost_mant_a_3_1[2].$aux_cost_mant_a_3_1[3];
                    }
                    if(count($aux_cost_mant_a_3_1) == 5){
                        $aux_cost_mant_3_1 =  $aux_cost_mant_a_3_1[0].$aux_cost_mant_a_3_1[1].$aux_cost_mant_a_3_1[2].$aux_cost_mant_a_3_1[3].$aux_cost_mant_a_3_1[4];
                    }

                }else  if($request->get('maintenance_cost_3_1') == null){
                    $aux_cost_mant_3_1 = 0;
                }

                 $solution_enf3_1->val_aprox=floatval($val_aprox_aux_3_1);
                 $solution_enf3_1->costo_mantenimiento=floatval($aux_cost_mant_3_1);
                 $solution_enf3_1->status=1;
                 $solution_enf3_1->id_empresa=Auth::user()->id_empresa;
                 $solution_enf3_1->id_user=Auth::user()->id;


                 $cooling_hrs =  $solution_enf3_1->coolings_hours;
                 $cost_energ =  $solution_enf3_1->costo_elec;
                 $seer = floatval($request->get('cheStd_3_1'));

                if ($solution_enf3_1->unid_med == 'TR') {

                    $tr =  $solution_enf3_1->capacidad_tot;
                    //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
                   //((TR x 12000)
                   $res_trx_12000 = $tr * 12000;
                   //((TR x 12000) x (Cooling Hours)
                   $res_1er_parent = $res_trx_12000 * $cooling_hrs;
                   //((TR x 12000) x (Cooling Hours)  / (SEER) )
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
                 $factor_m =$request->get('cheMantenimiento_3_1');

                 $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                 $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                 $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                 $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                 $res_res =  $res_parent_1 *  $factor_c;
                 if($solution_enf3_1->tipo_equipo === "pa_pi_te"){
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

                 $solution_enf3_1->cost_op_an = $res_res_fact_m;
             }else if($solution_enf3_1->unid_med == 'KW'){
                $kw =  $solution_enf3_1->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs;
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
                   if($solution_enf3_1->tipo_equipo === "pa_pi_te"){
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
                   $solution_enf3_1->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
             }

              //confort
              $unidad_conf_1_1 = $solution_enf3_1->unidad_hvac;
              $equipo_conf_1_1 = $solution_enf3_1->tipo_equipo;
              $diseno_conf_1_1 = $solution_enf3_1->name_disenio;
              $t_control_conf_1_1 = $solution_enf3_1->name_t_control;
              $dr_conf_1_1 = $solution_enf3_1->dr_name;
              $mant_conf_1_1 = $solution_enf3_1->mantenimiento;

              if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
                          case 'ASHRAE 55/62.1/90.1':
                              $val_conf_dis_1_1 = 5;
                             break;
                          default:
                        }

                        switch ($dr_conf_1_1) {
                          case 'Cumple ASHRAE  Standard 70':
                              $val_conf_dr_1_1 = 5;
                            break;
                          case 'No Cumple ASHRAE Standard 70':
                              $val_conf_dr_1_1 = 3;
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
                          case 'Ducto Flex y Plenum Retorno':
                              $val_conf_dis_1_1 = 3;
                            break;
                          case 'ASHRAE 55/62.1/90.1':
                              $val_conf_dis_1_1 = 4.5;
                            break;
                          default:
                        }

                        switch ($dr_conf_1_1) {
                          case 'No Aplica':
                              $val_conf_dr_1_1 = 2;
                            break;
                          case 'Cumple ASHRAE  Standard 70':
                              $val_conf_dr_1_1 = 5;
                            break;
                            case 'No Cumple ASHRAE Standard 70':
                              $val_conf_dr_1_1 = 3;
                            break;

                          default:
                        }
                  }

                  if($equipo_conf_1_1 === 'fancoil'){
                      switch ($diseno_conf_1_1) {
                          case 'Inyección y Retorno Ductado':
                              $val_conf_dis_1_1 = 4;
                            break;
                          case 'Ducto Flex. y Retorno Ductado':
                              $val_conf_dis_1_1 = 3.5;
                            break;
                          case 'Ducto Flex y Plenum Retorno':
                              $val_conf_dis_1_1 = 3;
                            break;
                          case 'Baja Presión Estática':
                              $val_conf_dis_1_1 = 2.5;
                            break;
                          case 'ASHRAE 55/62.1/90.1':
                              $val_conf_dis_1_1 = 4.5;
                            break;

                          default:
                        }

                        switch ($dr_conf_1_1) {
                          case 'No Aplica':
                              $val_conf_dr_1_1 = 2;
                            break;
                          case 'Cumple ASHRAE  Standard 70':
                              $val_conf_dr_1_1 = 5;
                            break;
                            case 'No Cumple ASHRAE Standard 70':
                              $val_conf_dr_1_1 = 3;
                            break;

                          default:
                        }
                  }

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
                          case 'ASHRAE 55/62.1/90.1':
                              $val_conf_dis_1_1 = 5;
                            break;
                          default:
                        }

                        switch ($dr_conf_1_1) {
                          case 'Cumple ASHRAE  Standard 70':
                              $val_conf_dr_1_1 = 5;
                            break;
                          case 'No Cumple ASHRAE Standard 70':
                              $val_conf_dr_1_1 = 3;
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
                            $val_conf_dis_1_1 = 3.5;
                          break;
                        case 'Ducto Flex. y Plenum Retorno':
                            $val_conf_dis_1_1 = 3;
                          break;
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                          break;
                        default:
                      }

                        switch ($dr_conf_1_1) {
                          case 'Cumple ASHRAE  Standard 70':
                              $val_conf_dr_1_1 = 5;
                            break;
                          case 'No Cumple ASHRAE Standard 70':
                              $val_conf_dr_1_1 = 3;
                            break;
                          default:
                        }
                  }

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
                          case 'ASHRAE 55/62.1/90.1':
                              $val_conf_dis_1_1 = 5;
                            break;
                          default:
                        }

                        switch ($dr_conf_1_1) {
                          case 'No Aplica':
                              $val_conf_dr_1_1 = 2;
                            break;
                          case 'Cumple ASHRAE  Standard 70':
                              $val_conf_dr_1_1 = 5;
                            break;
                            case 'No Cumple ASHRAE Standard 70':
                              $val_conf_dr_1_1 = 3;
                            break;

                          default:
                        }
                  }
                  //control
                  switch ($t_control_conf_1_1) {
                      case 'Termostatos Fuera Zona de Confort':
                          $val_conf_crtl_1_1 = 2.5;
                        break;
                      case 'Termostatos en Zona de Confort':
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

              if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
                  $val_conf_equipo_1_1 = 4;

                  if($equipo_conf_1_1 === 'ca_pi_te'){
                      switch ($diseno_conf_1_1) {
                          case 'Sin Ventilación':
                              $val_conf_dis_1_1 = 2.5;
                            break;

                          case 'Con Ventilación DOA':
                              $val_conf_dis_1_1 = 3.5;
                            break;

                          case 'ASHRAE 55/62.1/90.1':
                              $val_conf_dis_1_1 = 4;
                            break;
                          default:
                        }

                  }

                  if($equipo_conf_1_1 === 'fancoil_lsp'){
                      switch ($diseno_conf_1_1) {
                          case 'Sin Ventilación':
                              $val_conf_dis_1_1 = 2.5;
                            break;

                          case 'Descarga Directa Ductada':
                              $val_conf_dis_1_1 = 3.5;
                            break;

                          case 'ASHRAE 55/62.1/90.1':
                              $val_conf_dis_1_1 = 4;
                            break;
                          default:
                        }
                  }

                  switch ($t_control_conf_1_1) {
                      case 'Termostatos Fuera Zona de Confort':
                          $val_conf_crtl_1_1 = 2.5;
                        break;
                      case 'Termostatos en Zona de Confort':
                          $val_conf_crtl_1_1 = 4;
                        break;
                      case 'Termostato Inteligente en Zona':
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

              if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
                  $val_conf_equipo_1_1 = 3.5;
                  if($equipo_conf_1_1 === 'est_ptac'){
                      switch ($diseno_conf_1_1) {
                          case 'Sin Filración MERV 8':
                              $val_conf_dis_1_1 = 3.5;
                            break;

                          case 'Con Filtración MERV 8':
                              $val_conf_dis_1_1 = 3.5;
                            break;

                      default:
                        }

                        switch ($t_control_conf_1_1) {
                          case 'Termostatos Fuera Zona de Confort':
                              $val_conf_crtl_1_1 = 3;
                            break;
                          case 'Termostatos en Zona de Confort':
                              $val_conf_crtl_1_1 = 4;
                            break;
                          case 'Termostato Inteligente en Zona':
                              $val_conf_crtl_1_1 = 5;
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
                              $val_conf_crtl_1_1 = 3;
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
                          $val_conf_mant_1_1 = 2.5;
                        break;
                      case 'Deficiente':
                          $val_conf_mant_1_1 = 3.5;
                        break;
                        case 'Sin Mantenimiento':
                          $val_conf_mant_1_1 = 4.5;
                        break;

                      default:
                    }
              }

              $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
              $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
              $solution_enf3_1->confort = $nivel_confotr_1_1;

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

                 $aux_cap_tot_3_2 = explode(",",   $request->get('capacidad_total_3_2'));
                    if(count($aux_cap_tot_3_2) == 1){
                        $cap_tot_aux_3_2 =  $aux_cap_tot_3_2[0];
                    }
                    if(count($aux_cap_tot_3_2) == 2){
                        $cap_tot_aux_3_2=  $aux_cap_tot_3_2[0].$aux_cap_tot_3_2[1];
                    }
                    if(count($aux_cap_tot_3_2) == 3){
                        $cap_tot_aux_3_2 =  $aux_cap_tot_3_2[0].$aux_cap_tot_3_2[1].$aux_cap_tot_3_2[2];
                    }
                    if(count($aux_cap_tot_3_2) == 4){
                        $cap_tot_aux_3_2 =  $aux_cap_tot_3_2[0].$aux_cap_tot_3_2[1].$aux_cap_tot_3_2[2].$aux_cap_tot_3_2[3];
                    }
                    if(count($aux_cap_tot_3_2) == 5){
                        $cap_tot_aux_3_2 =  $aux_cap_tot_3_2[0].$aux_cap_tot_3_2[1].$aux_cap_tot_3_2[2].$aux_cap_tot_3_2[3].$aux_cap_tot_3_2[4];
                    }

                 $solution_enf3_2->capacidad_tot = floatval($cap_tot_aux_3_2);
                 $solution_enf3_2->unid_med = $request->get('unidad_capacidad_tot_3_2');


                 $solution_enf3_2->name_disenio=$request->get('name_diseno_3_2');
                 $solution_enf3_2->name_t_control=$request->get('name_t_control_3_2');
                 $solution_enf3_2->dr_name=$request->get('dr_name_3_2');


                 $aux_costo_elec_3_2 = explode("$",   $request->get('costo_elec_3_2'));
                        $aux_costo_elec_3_2_a = explode(",",    $aux_costo_elec_3_2[1]);
                        if(count($aux_costo_elec_3_2_a) == 1){
                            $costo_elec_aux_3_2 =  $aux_costo_elec_3_2_a[0];
                        }
                        if(count($aux_costo_elec_3_2_a) == 2){
                            $costo_elec_aux_3_2=  $aux_costo_elec_3_2_a[0].$aux_costo_elec_3_2_a[1];
                        }
                        if(count($aux_costo_elec_3_2_a) == 3){
                            $costo_elec_aux_3_2 =  $aux_costo_elec_3_2_a[0].$aux_costo_elec_3_2_a[1].$aux_costo_elec_3_2_a[2];
                        }
                        if(count($aux_costo_elec_3_2_a) == 4){
                            $costo_elec_aux_3_2 =  $aux_costo_elec_3_2_a[0].$aux_costo_elec_3_2_a[1].$aux_costo_elec_3_2_a[2].$aux_costo_elec_3_2_a[3];
                        }
                        if(count($aux_costo_elec_3_2_a) == 5){
                            $costo_elec_aux_3_2 =  $aux_costo_elec_3_2_a[0].$aux_costo_elec_3_2_a[1].$aux_costo_elec_3_2_a[2].$aux_costo_elec_3_2_a[3].$aux_costo_elec_3_2_a[4];
                        }

                 $solution_enf3_2->costo_elec = floatval($costo_elec_aux_3_2);

                 $cooling_hours_aux_3_2 = explode(",",   $request->get('hrsEnfriado_3_2'));
                if(count($cooling_hours_aux_3_2) == 1){
                    $aux_cooling_hours_3_2 =  $cooling_hours_aux_3_2[0];
                }
                if(count($cooling_hours_aux_3_2) == 2){
                    $aux_cooling_hours_3_2=  $cooling_hours_aux_3_2[0].$cooling_hours_aux_3_2[1];
                }
                if(count($cooling_hours_aux_3_2) == 3){
                    $aux_cooling_hours_3_2 =  $cooling_hours_aux_3_2[0].$cooling_hours_aux_3_2[1].$cooling_hours_aux_3_2[2];
                }
                if(count($cooling_hours_aux_3_2) == 4){
                    $aux_cooling_hours_3_2 =  $cooling_hours_aux_3_2[0].$cooling_hours_aux_3_2[1].$cooling_hours_aux_3_2[2].$cooling_hours_aux_3_2[3];
                }
                if(count($cooling_hours_aux_3_2) == 5){
                    $aux_cooling_hours_3_2 =  $cooling_hours_aux_3_2[0].$cooling_hours_aux_3_2[1].$cooling_hours_aux_3_2[2].$cooling_hours_aux_3_2[3].$cooling_hours_aux_3_2[4];
                }

                 $solution_enf3_2->coolings_hours = intval($aux_cooling_hours_3_2);
                 $solution_enf3_2->eficencia_ene = $request->get('csStd_3_2');
                 $solution_enf3_2->eficencia_ene_cant =floatval($request->get('csStd_cant_3_2'));
                 $solution_enf3_2->tipo_control = $request->get('tipo_control_3_2');

                 $solution_enf3_2->dr = $request->get('dr_3_2');
                 $solution_enf3_2->mantenimiento = $request->get('cheMantenimiento_3_2');

                 if($request->get('cheValorS2_3_2') != null){
                    $aux_val_aprox_3_2 = explode("$",   $request->get('cheValorS2_3_2'));
                    $aux_val_aprox_3_2_a = explode(",",    $aux_val_aprox_3_2[1]);
                    if(count($aux_val_aprox_3_2_a) == 1){
                        $val_aprox_aux_3_2 =  $aux_val_aprox_3_2_a[0];
                    }
                    if(count($aux_val_aprox_3_2_a) == 2){
                        $val_aprox_aux_3_2=  $aux_val_aprox_3_2_a[0].$aux_val_aprox_3_2_a[1];
                    }
                    if(count($aux_val_aprox_3_2_a) == 3){
                        $val_aprox_aux_3_2 =  $aux_val_aprox_3_2_a[0].$aux_val_aprox_3_2_a[1].$aux_val_aprox_3_2_a[2];
                    }
                    if(count($aux_val_aprox_3_2_a) == 4){
                        $val_aprox_aux_3_2 =  $aux_val_aprox_3_2_a[0].$aux_val_aprox_3_2_a[1].$aux_val_aprox_3_2_a[2].$aux_val_aprox_3_2_a[3];
                    }
                    if(count($aux_val_aprox_3_2_a) == 5){
                        $val_aprox_aux_3_2 =  $aux_val_aprox_3_2_a[0].$aux_val_aprox_3_2_a[1].$aux_val_aprox_3_2_a[2].$aux_val_aprox_3_2_a[3].$aux_val_aprox_3_2_a[4];
                    }
                }else  if($request->get('cheValorS2_3_2') == null){
                        $val_aprox_aux_3_2 = 0;
                }


                if($request->get('maintenance_cost_3_2') != null){
                    $aux_cost_mant_3_2 = explode("$",   $request->get('maintenance_cost_3_2'));
                    $aux_cost_mant_a_3_2 = explode(",",    $aux_cost_mant_3_2[1]);

                    if(count($aux_cost_mant_a_3_2) == 1){
                        $aux_cost_mant_3_2 =  $aux_cost_mant_a_3_2[0];
                    }
                    if(count($aux_cost_mant_a_3_2) == 2){
                        $aux_cost_mant_3_2=  $aux_cost_mant_a_3_2[0].$aux_cost_mant_a_3_2[1];
                    }
                    if(count($aux_cost_mant_a_3_2) == 3){
                        $aux_cost_mant_3_2 =  $aux_cost_mant_a_3_2[0].$aux_cost_mant_a_3_2[1].$aux_cost_mant_a_3_2[2];
                    }
                    if(count($aux_cost_mant_a_3_2) == 4){
                        $aux_cost_mant_3_2 =  $aux_cost_mant_a_3_2[0].$aux_cost_mant_a_3_2[1].$aux_cost_mant_a_3_2[2].$aux_cost_mant_a_3_2[3];
                    }
                    if(count($aux_cost_mant_a_3_2) == 5){
                        $aux_cost_mant_3_2 =  $aux_cost_mant_a_3_2[0].$aux_cost_mant_a_3_2[1].$aux_cost_mant_a_3_2[2].$aux_cost_mant_a_3_2[3].$aux_cost_mant_a_3_2[4];
                    }


                }else  if($request->get('maintenance_cost_3_2') == null){
                    $aux_cost_mant_3_2 = 0;

                }

                $solution_enf3_2->costo_mantenimiento=floatval($aux_cost_mant_3_2);
                 $solution_enf3_2->val_aprox = floatval($val_aprox_aux_3_2);
                 $solution_enf3_2->status = 1;
                 $solution_enf3_2->id_empresa=Auth::user()->id_empresa;
                 $solution_enf3_2->id_user=Auth::user()->id;


                 $cooling_hrs =  $solution_enf3_2->coolings_hours;
                 $cost_energ =  $solution_enf3_2->costo_elec;
                 $seer = $solution_enf3_2->eficencia_ene_cant;

                if ($solution_enf3_2->unid_med == 'TR') {

                    $tr =  $solution_enf3_2->capacidad_tot;
                    //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
                   //((TR x 12000)
                   $res_trx_12000 = $tr * 12000;
                   //((TR x 12000) x (Cooling Hours)
                   $res_1er_parent = $res_trx_12000 * $cooling_hrs;
                   //((TR x 12000) x (Cooling Hours)  / (SEER) )
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
                 $factor_m = $request->get('cheMantenimiento_3_2');
                 $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                 $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                 $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                 $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                 $res_res =  $res_parent_1 *  $factor_c;

                 if($solution_enf3_2->tipo_equipo === "pa_pi_te"){
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

                 $solution_enf3_2->cost_op_an = $res_res_fact_m;
             }else if($solution_enf3_2->unid_med == 'KW'){
                $kw =  $solution_enf3_2->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs;
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
                   if($solution_enf3_2->tipo_equipo === "pa_pi_te"){
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
                   $solution_enf3_2->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
             }

              //confort
            $unidad_conf_1_1 = $solution_enf3_2->unidad_hvac;
            $equipo_conf_1_1 = $solution_enf3_2->tipo_equipo;
            $diseno_conf_1_1 = $solution_enf3_2->name_disenio;
            $t_control_conf_1_1 = $solution_enf3_2->name_t_control;
            $dr_conf_1_1 = $solution_enf3_2->dr_name;
            $mant_conf_1_1 = $solution_enf3_2->mantenimiento;

            if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                           break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                        case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
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
                        case 'Ducto Flex y Plenum Retorno':
                            $val_conf_dis_1_1 = 3;
                          break;
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 4.5;
                          break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'No Aplica':
                            $val_conf_dr_1_1 = 2;
                          break;
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                          case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
                          break;

                        default:
                      }
                }

                if($equipo_conf_1_1 === 'fancoil'){
                    switch ($diseno_conf_1_1) {
                        case 'Inyección y Retorno Ductado':
                            $val_conf_dis_1_1 = 4;
                          break;
                        case 'Ducto Flex. y Retorno Ductado':
                            $val_conf_dis_1_1 = 3.5;
                          break;
                        case 'Ducto Flex y Plenum Retorno':
                            $val_conf_dis_1_1 = 3;
                          break;
                        case 'Baja Presión Estática':
                            $val_conf_dis_1_1 = 2.5;
                          break;
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 4.5;
                          break;

                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'No Aplica':
                            $val_conf_dr_1_1 = 2;
                          break;
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                          case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
                          break;

                        default:
                      }
                }

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
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                          break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                        case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
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
                            $val_conf_dis_1_1 = 3.5;
                          break;
                        case 'Ducto Flex. y Plenum Retorno':
                            $val_conf_dis_1_1 = 3;
                          break;
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                          break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                        case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
                          break;
                        default:
                      }
                }

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
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                          break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'No Aplica':
                            $val_conf_dr_1_1 = 2;
                          break;
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                          case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
                          break;

                        default:
                      }
                }
                //control
                switch ($t_control_conf_1_1) {
                    case 'Termostatos Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostatos en Zona de Confort':
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

            if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
                $val_conf_equipo_1_1 = 4;

                if($equipo_conf_1_1 === 'ca_pi_te'){
                    switch ($diseno_conf_1_1) {
                        case 'Sin Ventilación':
                            $val_conf_dis_1_1 = 2.5;
                          break;

                        case 'Con Ventilación DOA':
                            $val_conf_dis_1_1 = 3.5;
                          break;

                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 4;
                          break;
                        default:
                      }

                }

                if($equipo_conf_1_1 === 'fancoil_lsp'){
                    switch ($diseno_conf_1_1) {
                        case 'Sin Ventilación':
                            $val_conf_dis_1_1 = 2.5;
                          break;

                        case 'Descarga Directa Ductada':
                            $val_conf_dis_1_1 = 3.5;
                          break;

                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 4;
                          break;
                        default:
                      }
                }

                switch ($t_control_conf_1_1) {
                    case 'Termostatos Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostatos en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                      break;
                    case 'Termostato Inteligente en Zona':
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

            if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
                $val_conf_equipo_1_1 = 3.5;
                if($equipo_conf_1_1 === 'est_ptac'){
                    switch ($diseno_conf_1_1) {
                        case 'Sin Filración MERV 8':
                            $val_conf_dis_1_1 = 3.5;
                          break;

                        case 'Con Filtración MERV 8':
                            $val_conf_dis_1_1 = 3.5;
                          break;

                    default:
                      }

                      switch ($t_control_conf_1_1) {
                        case 'Termostatos Fuera Zona de Confort':
                            $val_conf_crtl_1_1 = 3;
                          break;
                        case 'Termostatos en Zona de Confort':
                            $val_conf_crtl_1_1 = 4;
                          break;
                        case 'Termostato Inteligente en Zona':
                            $val_conf_crtl_1_1 = 5;
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
                            $val_conf_crtl_1_1 = 3;
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
                        $val_conf_mant_1_1 = 2.5;
                      break;
                    case 'Deficiente':
                        $val_conf_mant_1_1 = 3.5;
                      break;
                      case 'Sin Mantenimiento':
                        $val_conf_mant_1_1 = 4.5;
                      break;

                    default:
                  }
            }

            $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
            $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
            $solution_enf3_2->confort = $nivel_confotr_1_1;

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

                     $aux_cap_tot_3_3 = explode(",",   $request->get('capacidad_total_3_3'));
                    if(count($aux_cap_tot_3_3) == 1){
                        $cap_tot_aux_3_3 =  $aux_cap_tot_3_3[0];
                    }
                    if(count($aux_cap_tot_3_3) == 2){
                        $cap_tot_aux_3_3=  $aux_cap_tot_3_3[0].$aux_cap_tot_3_3[1];
                    }
                    if(count($aux_cap_tot_3_3) == 3){
                        $cap_tot_aux_3_3 =  $aux_cap_tot_3_3[0].$aux_cap_tot_3_3[1].$aux_cap_tot_3_3[2];
                    }
                    if(count($aux_cap_tot_3_3) == 4){
                        $cap_tot_aux_3_3 =  $aux_cap_tot_3_3[0].$aux_cap_tot_3_3[1].$aux_cap_tot_3_3[2].$aux_cap_tot_3_3[3];
                    }
                    if(count($aux_cap_tot_3_3) == 5){
                        $cap_tot_aux_3_3 =  $aux_cap_tot_3_3[0].$aux_cap_tot_3_3[1].$aux_cap_tot_3_3[2].$aux_cap_tot_3_3[3].$aux_cap_tot_3_3[4];
                    }

                     $solution_enf3_3->capacidad_tot = floatval($cap_tot_aux_3_3);
                     $solution_enf3_3->unid_med = $request->get('unidad_capacidad_tot_3_3');


                    $solution_enf3_3->name_disenio=$request->get('name_diseno_3_3');
                    $solution_enf3_3->name_t_control=$request->get('name_t_control_3_3');
                    $solution_enf3_3->dr_name=$request->get('dr_name_3_3');

                    $aux_costo_elec_3_3 = explode("$",   $request->get('costo_elec_3_3'));
                    $aux_costo_elec_3_3_a = explode(",",    $aux_costo_elec_3_3[1]);
                    if(count($aux_costo_elec_3_3_a) == 1){
                        $costo_elec_aux_3_3 =  $aux_costo_elec_3_3_a[0];
                    }
                    if(count($aux_costo_elec_3_3_a) == 2){
                        $costo_elec_aux_3_3=  $aux_costo_elec_3_3_a[0].$aux_costo_elec_3_3_a[1];
                    }
                    if(count($aux_costo_elec_3_3_a) == 3){
                        $costo_elec_aux_3_3 =  $aux_costo_elec_3_3_a[0].$aux_costo_elec_3_3_a[1].$aux_costo_elec_3_3_a[2];
                    }
                    if(count($aux_costo_elec_3_3_a) == 4){
                        $costo_elec_aux_3_3 =  $aux_costo_elec_3_3_a[0].$aux_costo_elec_3_3_a[1].$aux_costo_elec_3_3_a[2].$aux_costo_elec_3_3_a[3];
                    }
                    if(count($aux_costo_elec_3_3_a) == 5){
                        $costo_elec_aux_3_3 =  $aux_costo_elec_3_3_a[0].$aux_costo_elec_3_3_a[1].$aux_costo_elec_3_3_a[2].$aux_costo_elec_3_3_a[3].$aux_costo_elec_3_3_a[4];
                    }

                     $solution_enf3_3->costo_elec = floatval($costo_elec_aux_3_3);

                     $cooling_hours_aux_3_3 = explode(",",   $request->get('hrsEnfriado_3_3'));
                    if(count($cooling_hours_aux_3_3) == 1){
                        $aux_cooling_hours_3_3 =  $cooling_hours_aux_3_3[0];
                    }
                    if(count($cooling_hours_aux_3_3) == 2){
                        $aux_cooling_hours_3_3=  $cooling_hours_aux_3_3[0].$cooling_hours_aux_3_3[1];
                    }
                    if(count($cooling_hours_aux_3_3) == 3){
                        $aux_cooling_hours_3_3 =  $cooling_hours_aux_3_3[0].$cooling_hours_aux_3_3[1].$cooling_hours_aux_3_3[2];
                    }
                    if(count($cooling_hours_aux_3_3) == 4){
                        $aux_cooling_hours_3_3 =  $cooling_hours_aux_3_3[0].$cooling_hours_aux_3_3[1].$cooling_hours_aux_3_3[2].$cooling_hours_aux_3_3[3];
                    }
                    if(count($cooling_hours_aux_3_3) == 5){
                        $aux_cooling_hours_3_3 =  $cooling_hours_aux_3_3[0].$cooling_hours_aux_3_3[1].$cooling_hours_aux_3_3[2].$cooling_hours_aux_3_3[3].$cooling_hours_aux_3_3[4];
                    }
                     $solution_enf3_3->coolings_hours = intval($aux_cooling_hours_3_3);
                     $solution_enf3_3->eficencia_ene = $request->get('csStd_3_3');
                     $solution_enf3_3->eficencia_ene_cant = floatval($request->get('cheStd_3_3'));
                     $solution_enf3_3->tipo_control = $request->get('tipo_control_3_3');

                     $solution_enf3_3->dr = $request->get('dr_3_3');
                     $solution_enf3_3->mantenimiento = $request->get('cheMantenimiento_3_3');

                     if($request->get('cheValorS_3_3') != null){
                        $aux_val_aprox_3_3 = explode("$",$request->get('cheValorS_3_3'));
                        $aux_val_aprox_3_3_a = explode(",",$aux_val_aprox_3_3[1]);
                        if(count($aux_val_aprox_3_3_a) == 1){
                            $val_aprox_aux_3_3 =  $aux_val_aprox_3_3_a[0];
                        }
                        if(count($aux_val_aprox_3_3_a) == 2){
                            $val_aprox_aux_3_3=  $aux_val_aprox_3_3_a[0].$aux_val_aprox_3_3_a[1];
                        }
                        if(count($aux_val_aprox_3_3_a) == 3){
                            $val_aprox_aux_3_3 =  $aux_val_aprox_3_3_a[0].$aux_val_aprox_3_3_a[1].$aux_val_aprox_3_3_a[2];
                        }
                        if(count($aux_val_aprox_3_3_a) == 4){
                            $val_aprox_aux_3_3 =  $aux_val_aprox_3_3_a[0].$aux_val_aprox_3_3_a[1].$aux_val_aprox_3_3_a[2].$aux_val_aprox_3_3_a[3];
                        }
                        if(count($aux_val_aprox_3_3_a) == 5){
                            $val_aprox_aux_3_3 =  $aux_val_aprox_3_3_a[0].$aux_val_aprox_3_3_a[1].$aux_val_aprox_3_3_a[2].$aux_val_aprox_3_3_a[3].$aux_val_aprox_3_3_a[4];
                        }
                    }else  if($request->get('cheValorS_3_3') == null){
                            $val_aprox_aux_3_3 = 0;
                    }

                    if($request->get('maintenance_cost_3_3') != null){
                        $aux_cost_mant_3_3 = explode("$",   $request->get('maintenance_cost_3_3'));
                        $aux_cost_mant_b_3_2 = explode(",",    $aux_cost_mant_3_3[1]);

                        if(count($aux_cost_mant_b_3_2) == 1){
                            $aux_cost_mant_3_3 =  $aux_cost_mant_b_3_2[0];
                        }
                        if(count($aux_cost_mant_b_3_2) == 2){
                            $aux_cost_mant_3_3=  $aux_cost_mant_b_3_2[0].$aux_cost_mant_b_3_2[1];
                        }
                        if(count($aux_cost_mant_b_3_2) == 3){
                            $aux_cost_mant_3_3 =  $aux_cost_mant_b_3_2[0].$aux_cost_mant_b_3_2[1].$aux_cost_mant_b_3_2[2];
                        }
                        if(count($aux_cost_mant_b_3_2) == 4){
                            $aux_cost_mant_3_3 =  $aux_cost_mant_b_3_2[0].$aux_cost_mant_b_3_2[1].$aux_cost_mant_b_3_2[2].$aux_cost_mant_b_3_2[3];
                        }
                        if(count($aux_cost_mant_b_3_2) == 5){
                            $aux_cost_mant_3_3 =  $aux_cost_mant_b_3_2[0].$aux_cost_mant_b_3_2[1].$aux_cost_mant_b_3_2[2].$aux_cost_mant_b_3_2[3].$aux_cost_mant_b_3_2[4];
                        }


                    }else  if($request->get('maintenance_cost_3_3') == null){
                        $aux_cost_mant_3_3 = 0;

                    }

                     $solution_enf3_3->costo_mantenimiento=floatval($aux_cost_mant_3_3);
                     $solution_enf3_3->val_aprox = floatval($val_aprox_aux_3_3);
                     $solution_enf3_3->status = 1;
                     $solution_enf3_3->id_empresa=Auth::user()->id_empresa;
                     $solution_enf3_3->id_user=Auth::user()->id;


                     $cooling_hrs =  $solution_enf3_3->coolings_hours;
                     $cost_energ =  $solution_enf3_3->costo_elec;
                     $seer = $solution_enf3_3->eficencia_ene_cant;

                 if ($solution_enf3_3->unid_med == 'TR') {

                    $tr =  $solution_enf3_3->capacidad_tot;
                    //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
                   //((TR x 12000)
                   $res_trx_12000 = $tr * 12000;
                   //((TR x 12000) x (Cooling Hours)
                   $res_1er_parent = $res_trx_12000 * $cooling_hrs;
                   //((TR x 12000) x (Cooling Hours)  / (SEER) )
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
                     $factor_m = $request->get('cheMantenimiento_3_3');
                     $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                     $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                     $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                     $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                     $res_res =  $res_parent_1 *  $factor_c;
                     if($solution_enf3_3->tipo_equipo === "pa_pi_te"){
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
                     $solution_enf3_3->cost_op_an = $res_res_fact_m;
                 }else if($solution_enf3_3->unid_med == 'KW'){
                    $kw =  $solution_enf3_3->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs;
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
                   if($solution_enf3_3->tipo_equipo === "pa_pi_te"){
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
                   $solution_enf3_3->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
                 }

                 //confort
            $unidad_conf_1_1 = $solution_enf3_3->unidad_hvac;
            $equipo_conf_1_1 = $solution_enf3_3->tipo_equipo;
            $diseno_conf_1_1 = $solution_enf3_3->name_disenio;
            $t_control_conf_1_1 = $solution_enf3_3->name_t_control;
            $dr_conf_1_1 = $solution_enf3_3->dr_name;
            $mant_conf_1_1 = $solution_enf3_3->mantenimiento;

            if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador' || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp' || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'){
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
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                           break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                        case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
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
                        case 'Ducto Flex y Plenum Retorno':
                            $val_conf_dis_1_1 = 3;
                          break;
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 4.5;
                          break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'No Aplica':
                            $val_conf_dr_1_1 = 2;
                          break;
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                          case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
                          break;

                        default:
                      }
                }

                if($equipo_conf_1_1 === 'fancoil'){
                    switch ($diseno_conf_1_1) {
                        case 'Inyección y Retorno Ductado':
                            $val_conf_dis_1_1 = 4;
                          break;
                        case 'Ducto Flex. y Retorno Ductado':
                            $val_conf_dis_1_1 = 3.5;
                          break;
                        case 'Ducto Flex y Plenum Retorno':
                            $val_conf_dis_1_1 = 3;
                          break;
                        case 'Baja Presión Estática':
                            $val_conf_dis_1_1 = 2.5;
                          break;
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 4.5;
                          break;

                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'No Aplica':
                            $val_conf_dr_1_1 = 2;
                          break;
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                          case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
                          break;

                        default:
                      }
                }

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
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                          break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                        case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
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
                            $val_conf_dis_1_1 = 3.5;
                          break;
                        case 'Ducto Flex. y Plenum Retorno':
                            $val_conf_dis_1_1 = 3;
                          break;
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                          break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                        case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
                          break;
                        default:
                      }
                }

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
                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 5;
                          break;
                        default:
                      }

                      switch ($dr_conf_1_1) {
                        case 'No Aplica':
                            $val_conf_dr_1_1 = 2;
                          break;
                        case 'Cumple ASHRAE  Standard 70':
                            $val_conf_dr_1_1 = 5;
                          break;
                          case 'No Cumple ASHRAE Standard 70':
                            $val_conf_dr_1_1 = 3;
                          break;

                        default:
                      }
                }
                //control
                switch ($t_control_conf_1_1) {
                    case 'Termostatos Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostatos en Zona de Confort':
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

            if($equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'fancoil_lsp'){
                $val_conf_equipo_1_1 = 4;

                if($equipo_conf_1_1 === 'ca_pi_te'){
                    switch ($diseno_conf_1_1) {
                        case 'Sin Ventilación':
                            $val_conf_dis_1_1 = 2.5;
                          break;

                        case 'Con Ventilación DOA':
                            $val_conf_dis_1_1 = 3.5;
                          break;

                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 4;
                          break;
                        default:
                      }

                }

                if($equipo_conf_1_1 === 'fancoil_lsp'){
                    switch ($diseno_conf_1_1) {
                        case 'Sin Ventilación':
                            $val_conf_dis_1_1 = 2.5;
                          break;

                        case 'Descarga Directa Ductada':
                            $val_conf_dis_1_1 = 3.5;
                          break;

                        case 'ASHRAE 55/62.1/90.1':
                            $val_conf_dis_1_1 = 4;
                          break;
                        default:
                      }
                }

                switch ($t_control_conf_1_1) {
                    case 'Termostatos Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostatos en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                      break;
                    case 'Termostato Inteligente en Zona':
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

            if($equipo_conf_1_1 === 'est_ptac' || $equipo_conf_1_1 === 'pa_pi_te'){
                $val_conf_equipo_1_1 = 3.5;
                if($equipo_conf_1_1 === 'est_ptac'){
                    switch ($diseno_conf_1_1) {
                        case 'Sin Filración MERV 8':
                            $val_conf_dis_1_1 = 3.5;
                          break;

                        case 'Con Filtración MERV 8':
                            $val_conf_dis_1_1 = 3.5;
                          break;

                    default:
                      }

                      switch ($t_control_conf_1_1) {
                        case 'Termostatos Fuera Zona de Confort':
                            $val_conf_crtl_1_1 = 3;
                          break;
                        case 'Termostatos en Zona de Confort':
                            $val_conf_crtl_1_1 = 4;
                          break;
                        case 'Termostato Inteligente en Zona':
                            $val_conf_crtl_1_1 = 5;
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
                            $val_conf_crtl_1_1 = 3;
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
                        $val_conf_mant_1_1 = 2.5;
                      break;
                    case 'Deficiente':
                        $val_conf_mant_1_1 = 3.5;
                      break;
                      case 'Sin Mantenimiento':
                        $val_conf_mant_1_1 = 4.5;
                      break;

                    default:
                  }
            }

            $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
            $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;
            $solution_enf3_3->confort = $nivel_confotr_1_1;

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

        return view('edit_index',['id_project'=>$id,'project_edit'=>$project_edit,
                        'cate_edificio'=>$cate_edificio,'paises'=>$paises,'id_ciudad_ini'=>$id_ciudad_ini,

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

        return view('edit_copy',['id_project'=>$id,'project_edit'=>$project_edit,
                        'cate_edificio'=>$cate_edificio,'paises'=>$paises,'id_ciudad_ini'=>$id_ciudad_ini,

        ]);
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
        /* (((dif_1 * yrs) – inv_ini )/ inv_ini) *100 */
        /* (dif_1 * yrs) */
       // $dif_yrs = $dif * $yrs;
        /* (dif_1 * yrs) */
        //$dif_yrs_rest_inv_ini = $dif_yrs - $inv_ini;
            /* ((dif_1 * yrs) – inv_ini ) */
       // $dif_yrs_rest_inv_ini_div__inv_div = $dif_yrs_rest_inv_ini / $inv_ini;
            /* ((dif_1 * yrs) – inv_ini )/ inv_ini) */
       // $res =   $dif_yrs_rest_inv_ini_div__inv_div * 100;
           /*  (((dif_1 * yrs) – inv_ini )/ inv_ini) *100 */
       // return $res;
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
        }else if($inflacion_aux <= 0){
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

        $view =  \View::make('pdf_resultados',compact('id_project'))->render();
        //->setPaper($customPaper, 'landscape');

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 1000);
        $pdf->setPaper("A4", "portrait");
        return $pdf->stream('Portada.pdf');
        //ini_set('max_execution_time', 1500);
        set_time_limit(6000);
        /* $dompdf = new Dompdf();
        $dompdf->loadHtml('hello world');
        // (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();
// Output the generated PDF to Browser
 return $dompdf->stream(); */
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
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_cost_mant_a = 0;
        $res_opex_a = 0;
        $suma_enf_a_aux=0;
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

             $res_opex_enf_base = $sumaopex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 3; $i++) {
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
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
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
           }

           $total_opex_base = $suma_enf_base_aux + $res_opex_base;

            array_push($array_base,round($res_enf_base,1),round($suma_enf_base_aux,1),round($res_opex_base,1));
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

             $res_opex_enf_a = $sumaopex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 3; $i++) {
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
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
                    $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
                    $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
               }

               $total_opex_a = $suma_enf_a_aux + $res_opex_a;

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

             $res_opex_enf_b = $sumaopex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 3; $i++) {
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
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
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
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
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $array_tot = [];
        $array_base = [0,0];
        $array_a = [0,0];
        $array_b = [0,0];
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;
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

             $res_opex_enf_base = $sumaopex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 3; $i++) {
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
            }

            array_push( $array_base,intval($res_enf_base,1),intval($suma_enf_base_aux,1));
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

             $res_opex_enf_a = $sumaopex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 3; $i++) {
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
            }

            array_push( $array_a,intval($res_enf_a,1),intval($suma_enf_a_aux,1));
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

             $res_opex_enf_b = $sumaopex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 3; $i++) {
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
            }

            array_push( $array_b,intval($res_enf_b,1),intval($suma_enf_b_aux,1));
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

             $res_opex_enf_base = $sumaopex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 5; $i++) {
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
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
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
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

             $res_opex_enf_a = $sumaopex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 5; $i++) {
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
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
                 $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
                 $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
            }

            //$total_opex_a = $suma_enf_a_aux + $res_opex_a;

            array_push($array_a,round($res_enf_a,1),round($suma_enf_a_aux,1),round($res_opex_a,1));
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

             $res_opex_enf_b = $sumaopex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 5; $i++) {
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
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
                 $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
                 $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
            }

            $total_opex_b = $suma_enf_b_aux + $res_opex_b;

            array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
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
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $array_tot = [];
        $array_base = [0,0];
        $array_a = [0,0];
        $array_b = [0,0];
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;
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

             $res_opex_enf_base = $sumaopex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 5; $i++) {
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
            }

            array_push( $array_base,intval($res_enf_base,1),intval($suma_enf_base_aux,1));
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

             $res_opex_enf_a = $sumaopex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 5; $i++) {
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
            }

            array_push( $array_a,intval($res_enf_a,1),intval($suma_enf_a_aux,1));
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

             $res_opex_enf_b = $sumaopex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 5; $i++) {
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
            }

            array_push( $array_b,intval($res_enf_b,1),intval($suma_enf_b_aux,1));
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

             $res_opex_enf_base = $sumaopex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 10; $i++) {
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
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
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
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

             $res_opex_enf_a = $sumaopex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 10; $i++) {
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
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
                $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
                $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
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

             $res_opex_enf_b = $sumaopex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 10; $i++) {
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
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
                $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
           }

           //$total_opex_b = $suma_enf_b_aux + $res_opex_b;

            array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
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
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $array_tot = [];
        $array_base = [0,0];
        $array_a = [0,0];
        $array_b = [0,0];
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;
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

             $res_opex_enf_base = $sumaopex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 10; $i++) {
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
            }

            array_push( $array_base,intval($res_enf_base,1),intval($suma_enf_base_aux,1));
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

             $res_opex_enf_a = $sumaopex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 10; $i++) {
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
            }

            array_push( $array_a,intval($res_enf_a,1),intval($suma_enf_a_aux,1));
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

             $res_opex_enf_b = $sumaopex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 10; $i++) {
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
            }

            array_push( $array_b,intval($res_enf_b,1),intval($suma_enf_b_aux,1));
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

             $res_opex_enf_base = $sumaopex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 15; $i++) {
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
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
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
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

             $res_opex_enf_a = $sumaopex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 15; $i++) {
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
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
                $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
                $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
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

             $res_opex_enf_b = $sumaopex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 15; $i++) {
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
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
                $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
            }

            $total_opex_b = $suma_enf_b_aux + $res_opex_b;

            array_push( $array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
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
        $suma_enf_a = 0;
        $sumaopex_a = 0;
        $suma_enf_a_aux=0;
        $suma_enf_b = 0;
        $sumaopex_b = 0;
        $suma_enf_b_aux = 0;
        $array_tot = [];
        $array_base = [0,0];
        $array_a = [0,0];
        $array_b = [0,0];
        $inflacion_aux = DB::table('projects')
        ->where('id','=',$id_projecto)
        ->first()->inflacion;
        $inflacion =  $inflacion_aux/100 + 1;
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

             $res_opex_enf_base = $sumaopex_base/$area;
             $suma_enf_base_aux = $res_opex_enf_base;
             for ($i = 2; $i <= 15; $i++) {
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
            }

            array_push( $array_base,intval($res_enf_base,1),intval($suma_enf_base_aux,1));
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

             $res_opex_enf_a = $sumaopex_a/$area;
             $suma_enf_a_aux = $res_opex_enf_a;
             for ($i = 2; $i <= 15; $i++) {
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
            }

            array_push( $array_a,intval($res_enf_a,1),intval($suma_enf_a_aux,1));
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

             $res_opex_enf_b = $sumaopex_b/$area;
             $suma_enf_b_aux = $res_opex_enf_b;
             for ($i = 2; $i <= 15; $i++) {
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
            }

            array_push( $array_b,intval($res_enf_b,1),intval($suma_enf_b_aux,1));
           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return $array_tot;
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
            $area_mc = $area * 10.764;
            $mult_res = $ashrae_sol * $area_mc;
        }

        if($unidad == 'ft'){
            $mult_res = $ashrae_sol * $area;
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
            $sol = DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$id)
            ->where('solutions_project.num_enf','=',$enf)
            ->where('solutions_project.num_sol','=',$num_sol)
            ->first()->confort;
            return $sol;
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

}
