<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\ResultsProjectModel;
use Illuminate\Support\Facades\Redirect;
class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function solutions($id){
        $solutions = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->get();

        return $solutions;
    }

    public function categories_paieses(){
        $cat_edif = DB::table('categorias_edificios')
        ->where('categorias_edificios.status','=',1)
        ->get();

        return $cat_edif;
    }

    public function get_cat_edi($id){
        $tipo_edif = DB::table('tipo_edificio')
        ->where('tipo_edificio.id_categoria','=',$id)
        ->where('tipo_edificio.status','=',1)
        ->get();

        return $tipo_edif;
    }

    public function mis_projectos(){
        $id_empresa = Auth::user()->id_empresa;

        $tipo_user= DB::table('users')
        ->where('users.id','=',Auth::user()->id)
        ->first()->tipo_user;

        if($tipo_user == 5 || $tipo_user == 2){
            $mis_projectos = DB::table('projects')
            ->join('categorias_edificios','categorias_edificios.id','=','projects.id_cat_edifico')
            ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
            ->where('id_empresa','=',$id_empresa)
            ->select('projects.*','categorias_edificios.name as cad_edi','tipo_edificio.name as tipo_edi')
            ->paginate(10);
        }

        if($tipo_user == 1){
            $mis_projectos = DB::table('projects')
            ->join('categorias_edificios','categorias_edificios.id','=','projects.id_cat_edifico')
            ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
            ->where('projects.id_empresa','=',$id_empresa)
            ->where('projects.id_user','=',Auth::user()->id)
            ->select('projects.*','categorias_edificios.name as cad_edi','tipo_edificio.name as tipo_edi')
            ->paginate(10);
        }



        return view('mis_projectos',['id_empresa'=>$id_empresa,'mis_projectos'=>$mis_projectos]);
    }

    public function porcents_aux($id){
        $porcent_hvac = DB::table('porcent_hvac')
        ->where('porcent_hvac.id_cat_edi','=',$id)
        ->first();

        $arry = [];
        for ($i=0; $i <= 3; $i++) {
            if ($i==1) {
                array_push($arry,$porcent_hvac->porcent_1);
            }

            if ($i==2) {
                array_push($arry,$porcent_hvac->porcent_2);
            }

            if ($i==3) {
                array_push($arry,$porcent_hvac->porcent_3);
            }
        }

        return $arry;

    }

    public function get_ciudades($pais){
        $id_pais = DB::table('pais')
        ->where('pais','=',$pais)
        ->first()->idPais;

        $ciudades = DB::table('ciudad')
        ->where('ciudad.idPais','=',$id_pais)
        ->get();

        return $ciudades;
    }

    public function get_ciudades_Edit($id){


        $ciudades = DB::table('ciudad')
        ->where('ciudad.idPais','=',$id)
        ->get();

        return $ciudades;
    }

    public function edit_project(Request $request,$id){
        $enfriamiento1 = intval($request->get('cUnidad_1_1'));
        $enfriamiento2 = intval($request->get('cUnidad_2_1'));
        $enfriamiento3 =intval($request->get('cUnidad_3_1'));

        $update_project= ProjectsModel::find($id);
        $update_project->name=$request->get('name_pro');
        $update_project->id_tipo_edificio=$request->get('tipo_edificio_edit');
        $update_project->id_cat_edifico=$request->get('cat_ed_edit');

        $aux = explode(",",   $request->get('ar_project'));
        if(count($aux) == 1){
            $update_project->area =  $aux[0];
        }
        if(count($aux) == 2){
            $update_project->area =  $aux[0].$aux[1];
        }
        if(count($aux) == 3){
            $update_project->area =  $aux[0].$aux[1].$aux[2];
        }
        if(count($aux) == 4){
            $update_project->area =  $aux[0].$aux[1].$aux[2].$aux[3];
        }
        if(count($aux) == 5){
            $update_project->area =  $aux[0].$aux[1].$aux[2].$aux[3].$aux[4];
        }

        $update_project->unidad=$request->get('unidad');
        $pais = DB::table('pais')
        ->where('pais.idPais','=',$request->get('paises_edit'))
        ->first()->pais;
        $update_project->region=$pais;
        $region = DB::table('ciudad')
        ->where('ciudad.idCiudad','=',$request->get('ciudades_edit'))
        ->first()->ciudad;

        $update_project->ciudad=$region;
        $update_project->porcent_hvac=$request->get('porcent_hvac');
        $update_project->status=1;
        $update_project->id_empresa=Auth::user()->id_empresa;
        $update_project->id_user=Auth::user()->id;




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

                $id_solution_1_1 = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id)
                ->where('solutions_project.num_enf','=',1)
                ->where('solutions_project.num_sol','=',1)
                ->first();

                $solution_enf1= SolutionsProjectModel::find($id_solution_1_1->id);
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
                $solution_enf1->eficencia_ene_cant=floatval($request->get('csStd_cant_1_1'));
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



                $solution_enf1->val_aprox=floatval( $val_aprox_aux);
                $solution_enf1->status=1;
                $solution_enf1->id_empresa=Auth::user()->id_empresa;
                $solution_enf1->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf1->coolings_hours;
                $cost_energ =  $solution_enf1->costo_elec;
                $seer = floatval($request->get('csStd_cant_1_1'));

               if ($solution_enf1->unid_med == 'TR') {

                $tr =  $solution_enf1->capacidad_tot;
                 //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER) ) / 1000)
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

/* (((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C) x Factor M */
                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;
                if($factor_m==='ASHRAE 180 Proactivo'){
                    $factor_m = 0.9;
                }

                if($factor_m==='Deficiente'){
                    $factor_m = 1.05;
                }

                if($factor_m==='Sin Mantenimiento'){
                    $factor_m = 1.15;
                }
                $res_res_fact_m =  $res_res * $factor_m;
                $solution_enf1->cost_op_an = floatval(number_format($res_res_fact_m,2, '.', ''));

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

                if($factor_m==='ASHRAE 180 Proactivo'){
                    $factor_m = 0.9;
                }

                if($factor_m==='Deficiente'){
                    $factor_m = 1.05;
                }

                if($factor_m==='Sin Mantenimiento'){
                    $factor_m = 1.15;
                }
                $res_res_fact_m =  $res_res * $factor_m;

                $solution_enf1->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));

                //$solution_enf1->cost_op_an = floatval(number_format($res_div_seer_a,2, '.', ''));

            }

            $update_project->update();
            if( $update_project->update()){
                $solution_enf1->id_project = $update_project->id;
                $solution_enf1->update();
            }

            }

             if ($sol_1_2 !== 0) {

                $action_submit =  $request->get('action_submit_1_2');


                if($action_submit == 'store'){
                    $solution_enf1_2=new SolutionsProjectModel;
                }else if($action_submit == 'update'){
                    $id_solution_1_2 = DB::table('solutions_project')
                    ->where('solutions_project.id_project','=',$id)
                    ->where('solutions_project.num_enf','=',1)
                    ->where('solutions_project.num_sol','=',2)
                    ->first();
                    $solution_enf1_2= SolutionsProjectModel::find($id_solution_1_2->id);
                }
                $solution_enf1_2->num_sol = 2;
                $solution_enf1_2->num_enf = 1;
                $solution_enf1_2->unidad_hvac = $request->get('cUnidad_1_2');
                $solution_enf1_2->tipo_equipo	= $request->get('csTipo_1_2');
                $solution_enf1_2->tipo_diseño	= $request->get('csDisenio_1_2');


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

                $solution_enf1_2->capacidad_tot =floatval($cap_tot_aux_1_2);
                $solution_enf1_2->unid_med = $request->get('unidad_capacidad_tot_1_2');

                $solution_enf1_2->name_disenio=$request->get('name_diseno_1_2');
                $solution_enf1_2->name_t_control=$request->get('name_t_control_1_2');
                $solution_enf1_2->dr_name=$request->get('dr_name_1_2');

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
                $solution_enf1_2->costo_elec = floatval($costo_elec_aux);

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

                $solution_enf1_2->coolings_hours =intval($aux_cooling_hours_1_2);
                $solution_enf1_2->eficencia_ene = $request->get('csStd_1_2');
                $solution_enf1_2->eficencia_ene_cant = $request->get('csStd_cant_1_2');
                $solution_enf1_2->tipo_control = $request->get('tipo_control_1_2');

                $solution_enf1_2->dr = $request->get('dr_1_2');
                $solution_enf1_2->mantenimiento = $request->get('csMantenimiento_1_2');

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



                $solution_enf1_2->val_aprox = floatval($val_aprox_aux_1_2);
                $solution_enf1_2->status = 1;
                $solution_enf1_2->id_empresa=Auth::user()->id_empresa;
                $solution_enf1_2->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf1_2->coolings_hours;
                $cost_energ =  $solution_enf1_2->costo_elec;
                $seer = $solution_enf1_2->eficencia_ene_cant;

               if ($solution_enf1_2->unid_med == 'TR') {

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
                $factor_m =$request->get('csMantenimiento_1_2');
                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                if($factor_m==='ASHRAE 180 Proactivo'){
                    $factor_m = 0.9;
                }

                if($factor_m==='Deficiente'){
                    $factor_m = 1.05;
                }

                if($factor_m==='Sin Mantenimiento'){
                    $factor_m = 1.15;
                }
                $res_res_fact_m =  $res_res * $factor_m;

                $solution_enf1_2->cost_op_an = $res_res_fact_m;
            }else if($solution_enf1_2->unid_med == 'KW'){
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                  $kw =  $solution_enf1_2->capacidad_tot;
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

                if($factor_m==='ASHRAE 180 Proactivo'){
                    $factor_m = 0.9;
                }

                if($factor_m==='Deficiente'){
                    $factor_m = 1.05;
                }

                if($factor_m==='Sin Mantenimiento'){
                    $factor_m = 1.15;
                }
                $res_res_fact_m =  $res_res * $factor_m;

                $solution_enf1_2->cost_op_an =floatval(number_format($factor_m,2, '.', ''));

                }

                $update_project->update();

                if($action_submit == 'store'){

                    if( $update_project->update()){
                        $solution_enf1_2->id_project = $update_project->id;
                        $solution_enf1_2->save();

                    }
                }else if($action_submit == 'update'){


                    if( $update_project->update()){
                        $solution_enf1_2->id_project = $update_project->id;
                        $solution_enf1_2->update();
                    }
                }



            }



//////////////sol 1 3
                 if ($sol_1_3 !== 0) {
                     $action_submit =  $request->get('action_submit_1_3');


                    if($action_submit == 'store'){
                        $solution_enf1_3=new SolutionsProjectModel;
                    }else if($action_submit == 'update'){
                        $id_solution_1_3 = DB::table('solutions_project')
                        ->where('solutions_project.id_project','=',$id)
                        ->where('solutions_project.num_enf','=',1)
                        ->where('solutions_project.num_sol','=',3)
                        ->first();
                        $solution_enf1_3= SolutionsProjectModel::find($id_solution_1_3->id);
                    }

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



                    $solution_enf1_3->val_aprox = floatval($val_aprox_aux_1_3);
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
                    $factor_m =$request->get('csMantenimiento_1_3');

                    $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                    $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                    $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                    $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                    $res_res =  $res_parent_1 *  $factor_c;

                    if($factor_m==='ASHRAE 180 Proactivo'){
                        $factor_m = 0.9;
                    }

                    if($factor_m==='Deficiente'){
                        $factor_m = 1.05;
                    }

                    if($factor_m==='Sin Mantenimiento'){
                        $factor_m = 1.15;
                    }
                    $res_res_fact_m =  $res_res * $factor_m;

                    $solution_enf1_3->cost_op_an = $res_res_fact_m;
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
                if($factor_m==='ASHRAE 180 Proactivo'){
                    $factor_m = 0.9;
                }

                if($factor_m==='Deficiente'){
                    $factor_m = 1.05;
                }

                if($factor_m==='Sin Mantenimiento'){
                    $factor_m = 1.15;
                }
                $res_res_fact_m =  $res_res * $factor_m;
                $solution_enf1_3->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
                }

                $update_project->update();

                if($action_submit == 'store'){

                    if( $update_project->update()){
                        $solution_enf1_3->id_project = $update_project->id;
                        $solution_enf1_3->save();

                    }
                }else if($action_submit == 'update'){


                    if( $update_project->update()){
                        $solution_enf1_3->id_project = $update_project->id;
                        $solution_enf1_3->update();
                    }
                }

                }



        if($update_project->update()){
            $res_sum = 0;
            $cants = DB::table('solutions_project')
            ->where('id_project','=',$update_project->id)
            ->get();

            foreach($cants as $cant){
                $res_sum = $res_sum + $cant->cost_op_an;
            }
            $id_result = DB::table('results_project')
            ->where('id_project','=',$id)
            ->where('num_enf','=',1)
            ->first();
            $new_result = ResultsProjectModel::find($id_result->id);
           $new_result->num_enf = 1;
           $new_result->cost_op_an = $res_sum;
           $new_result->id_project = $id;
           $new_result->id_empresa=Auth::user()->id_empresa;
           $new_result->id_user=Auth::user()->id;
           $new_result->update();
        }

            }




                ////EditSolution enfriamiento 2
                $sol_2_1 = intval($request->get('cUnidad_2_1'));
                $sol_2_2 = intval($request->get('cUnidad_2_2'));
                $sol_2_3 = intval($request->get('cUnidad_2_3'));

                if ($enfriamiento2 !== 0) {
                    if ($sol_2_1 !== 0) {
                        $id_solution_2_1 = DB::table('solutions_project')
                        ->where('solutions_project.id_project','=',$id)
                        ->where('solutions_project.num_enf','=',2)
                        ->where('solutions_project.num_sol','=',1)
                        ->first();


                        $solution_enf2_1=SolutionsProjectModel::find($id_solution_2_1->id);
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


                        $solution_enf2_1->val_aprox	=floatval($val_aprox_aux_2_1);
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
                        $factor_c = floatval($request->get('tipo_control_2_1'));
                        $factor_t =floatval($request->get('dr_2_1'));
                        $factor_m =$request->get('csMantenimiento_2_1');

                        $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                        $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                        $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                        $res_res =  $res_parent_1 *  $factor_c;


                        if($factor_m==='ASHRAE 180 Proactivo'){
                            $factor_m = 0.9;
                        }

                        if($factor_m==='Deficiente'){
                            $factor_m = 1.05;
                        }

                        if($factor_m==='Sin Mantenimiento'){
                            $factor_m = 1.15;
                        }
                        $res_res_fact_m =  $res_res * $factor_m;

                        $solution_enf2_1->cost_op_an = $res_res_fact_m;
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
                                if($factor_m==='ASHRAE 180 Proactivo'){
                                    $factor_m = 0.85;
                                }

                                if($factor_m==='Deficiente'){
                                    $factor_m = 1;
                                }

                                if($factor_m==='Sin Mantenimiento'){
                                    $factor_m = 1.15;
                                }
                                $res_res_fact_m =  $res_res * $factor_m;
                                $solution_enf2_1->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));

                            }
                    $update_project->update();
                    if( $update_project->update()){
                        $solution_enf2_1->id_project = $update_project->id;
                        $solution_enf2_1->update();
                    }

                    }

                    if ($sol_2_2 !== 0) {

                        $action_submit =  $request->get('action_submit_2_2');

                        if($action_submit == 'store'){
                            $solution_enf2_2=new SolutionsProjectModel;
                        }else if($action_submit == 'update'){
                            $id_solution_2_2 = DB::table('solutions_project')
                            ->where('solutions_project.id_project','=',$id)
                            ->where('solutions_project.num_enf','=',2)
                            ->where('solutions_project.num_sol','=',2)
                            ->first();

                            $solution_enf2_2=SolutionsProjectModel::find($id_solution_2_2->id);
                        }


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



                        $solution_enf2_2->val_aprox = floatval($val_aprox_aux_2_2);
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
                        $factor_m = $request->get('cheMantenimiento_2_2');

                        $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                        $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                        $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                        $res_res =  $res_parent_1 *  $factor_c;

                        if($factor_m==='ASHRAE 180 Proactivo'){
                            $factor_m = 0.9;
                        }

                        if($factor_m==='Deficiente'){
                            $factor_m = 1.05;
                        }

                        if($factor_m==='Sin Mantenimiento'){
                            $factor_m = 1.15;
                        }
                        $res_res_fact_m =  $res_res * $factor_m;

                        $solution_enf2_2->cost_op_an = $res_res_fact_m;
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
                           if($factor_m==='ASHRAE 180 Proactivo'){
                            $factor_m = 0.9;
                        }

                        if($factor_m==='Deficiente'){
                            $factor_m = 1.05;
                        }

                        if($factor_m==='Sin Mantenimiento'){
                            $factor_m = 1.15;
                        }
                            $res_res_fact_m =  $res_res * $factor_m;
                           $solution_enf2_2->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
                    }
                    $update_project->update();

                    if($action_submit == 'store'){

                        if( $update_project->update()){
                            $solution_enf2_2->id_project = $update_project->id;
                            $solution_enf2_2->save();

                        }
                    }else if($action_submit == 'update'){


                        if( $update_project->update()){
                            $solution_enf2_2->id_project = $update_project->id;
                            $solution_enf2_2->update();

                        }
                    }

                    }

                    if ($sol_2_3 !== 0) {
                        $action_submit =  $request->get('action_submit_2_3');

                        if($action_submit == 'store'){
                            $solution_enf2_3=new SolutionsProjectModel;
                        }else if($action_submit == 'update'){
                            $id_solution_2_3 = DB::table('solutions_project')
                            ->where('solutions_project.id_project','=',$id)
                            ->where('solutions_project.num_enf','=',2)
                            ->where('solutions_project.num_sol','=',3)
                            ->first();

                            $solution_enf2_3=SolutionsProjectModel::find($id_solution_2_3->id);
                        }

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



                        $solution_enf2_3->val_aprox = floatval($val_aprox_aux_2_3);
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
                        $factor_m =$request->get('cheMantenimiento_2_3');

                        $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                        $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                        $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                        $res_res =  $res_parent_1 *  $factor_c;

                        if($factor_m==='ASHRAE 180 Proactivo'){
                            $factor_m = 0.9;
                        }

                        if($factor_m==='Deficiente'){
                            $factor_m = 1.05;
                        }

                        if($factor_m==='Sin Mantenimiento'){
                            $factor_m = 1.15;
                        }
                            $res_res_fact_m =  $res_res * $factor_m;
                             $solution_enf2_3->cost_op_an = $res_res_fact_m;
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
                       if($factor_m==='ASHRAE 180 Proactivo'){
                        $factor_m = 0.9;
                    }

                    if($factor_m==='Deficiente'){
                        $factor_m = 1.05;
                    }

                    if($factor_m==='Sin Mantenimiento'){
                        $factor_m = 1.15;
                    }
                        $res_res_fact_m =  $res_res * $factor_m;
                       $solution_enf2_3->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
                    }


                    $update_project->update();

                    if($action_submit == 'store'){

                        if( $update_project->update()){
                            $solution_enf2_3->id_project = $update_project->id;
                            $solution_enf2_3->save();

                        }
                    }else if($action_submit == 'update'){


                        if( $update_project->update()){
                            $solution_enf2_3->id_project = $update_project->id;
                            $solution_enf2_3->update();

                        }
                    }

                    }

                    if($update_project->update()){
                        $res_sum = 0;
                        $cants = DB::table('solutions_project')
                        ->where('id_project','=',$update_project->id)
                        ->get();

                        foreach($cants as $cant){
                            $res_sum = $res_sum + $cant->cost_op_an;
                        }
                        $id_result = DB::table('results_project')
                        ->where('id_project','=',$id)
                        ->where('num_enf','=',2)
                        ->first();
                        $new_result = ResultsProjectModel::find($id_result->id);
                       $new_result->num_enf = 2;
                       $new_result->cost_op_an = $res_sum;
                       $new_result->id_project = $id;
                       $new_result->id_empresa=Auth::user()->id_empresa;
                       $new_result->id_user=Auth::user()->id;
                       $new_result->update();
                    }
                }

                 //guardar soluciones
           $sol_3_1 = intval($request->get('cUnidad_3_1'));
           $sol_3_2 = intval($request->get('cUnidad_3_2'));
           $sol_3_3 = intval($request->get('cUnidad_3_3'));

         if ($enfriamiento3 !== 0) {

             if ($sol_3_1 !== 0) {
                $id_solution_3_1 = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id)
                ->where('solutions_project.num_enf','=',3)
                ->where('solutions_project.num_sol','=',1)
                ->first();
                $solution_enf3_1=SolutionsProjectModel::find($id_solution_3_1->id);
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




                 $solution_enf3_1->val_aprox=floatval($val_aprox_aux_3_1);
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
                 $factor_m =$request->get('cheMantenimiento_3_1');

                 $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                 $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                 $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                 $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                 $res_res =  $res_parent_1 *  $factor_c;
                 if($factor_m==='ASHRAE 180 Proactivo'){
                    $factor_m = 0.9;
                }

                if($factor_m==='Deficiente'){
                    $factor_m = 1.05;
                }

                if($factor_m==='Sin Mantenimiento'){
                    $factor_m = 1.15;
                }
                    $res_res_fact_m =  $res_res * $factor_m;

                 $solution_enf3_1->cost_op_an = $res_res_fact_m;
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
                   if($factor_m==='ASHRAE 180 Proactivo'){
                    $factor_m = 0.85;
                    }

                    if($factor_m==='Deficiente'){
                        $factor_m = 1;
                    }

                    if($factor_m==='Sin Mantenimiento'){
                        $factor_m = 1.15;
                    }
                    $res_res_fact_m =  $res_res * $factor_m;
                   $solution_enf3_1->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
             }
             $update_project->update();
             if( $update_project->update()){
                 $solution_enf3_1->id_project = $update_project->id;
                 $solution_enf3_1->update();
             }

             }

             if ($sol_3_2 !== 0) {

                $action_submit =  $request->get('action_submit_3_2');

                        if($action_submit == 'store'){
                            $solution_enf3_2=new SolutionsProjectModel;
                        }else if($action_submit == 'update'){
                            $id_solution_3_2 = DB::table('solutions_project')
                            ->where('solutions_project.id_project','=',$id)
                            ->where('solutions_project.num_enf','=',3)
                            ->where('solutions_project.num_sol','=',2)
                            ->first();

                            $solution_enf3_2=SolutionsProjectModel::find($id_solution_3_2->id);
                        }


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




                $solution_enf3_2->val_aprox = floatval($val_aprox_aux_3_2);
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
                $factor_m = $request->get('cheMantenimiento_3_2');
                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;

                if($factor_m==='ASHRAE 180 Proactivo'){
                   $factor_m = 0.9;
               }

               if($factor_m==='Deficiente'){
                   $factor_m = 1.05;
               }

               if($factor_m==='Sin Mantenimiento'){
                   $factor_m = 1.15;
               }
                   $res_res_fact_m =  $res_res * $factor_m;

                $solution_enf3_2->cost_op_an = $res_res_fact_m;
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
                  if($factor_m==='ASHRAE 180 Proactivo'){
                   $factor_m = 0.9;
               }

               if($factor_m==='Deficiente'){
                   $factor_m = 1.05;
               }

               if($factor_m==='Sin Mantenimiento'){
                   $factor_m = 1.15;
               }
                   $res_res_fact_m =  $res_res * $factor_m;
                  $solution_enf3_2->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
            }

            $update_project->update();

            if($action_submit == 'store'){
                if( $update_project->update()){
                    $solution_enf3_2->id_project = $update_project->id;
                    $solution_enf3_2->save();

                }
            }else if($action_submit == 'update'){

                if( $update_project->update()){
                        $solution_enf3_2->id_project = $update_project->id;
                        $solution_enf3_2->update();
                }
            }

            }

            if ($sol_3_3 !== 0) {
                $action_submit =  $request->get('action_submit_3_3');


                if($action_submit == 'store'){
                    $solution_enf3_3=new SolutionsProjectModel;
                }else if($action_submit == 'update'){
                    $id_solution_3_3 = DB::table('solutions_project')
                    ->where('solutions_project.id_project','=',$id)
                    ->where('solutions_project.num_enf','=',3)
                    ->where('solutions_project.num_sol','=',3)
                    ->first();

                    $solution_enf3_3=SolutionsProjectModel::find($id_solution_3_3->id);
                }

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



                $solution_enf3_3->val_aprox = floatval($val_aprox_aux_3_3);
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
                $factor_m = $request->get('cheMantenimiento_3_3');
                $res_1_parent1= $res_ene_apl_tot_enf_1 * $factor_s;

                $res_2_parent1= $res_ene_apl_tot_enf_1 * $factor_d;

                $res_3_parent1= $res_ene_apl_tot_enf_1 * $factor_t;

                $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;

                $res_res =  $res_parent_1 *  $factor_c;
                if($factor_m==='ASHRAE 180 Proactivo'){
                   $factor_m = 0.9;
               }

               if($factor_m==='Deficiente'){
                   $factor_m = 1.05;
               }

               if($factor_m==='Sin Mantenimiento'){
                   $factor_m = 1.15;
               }
                   $res_res_fact_m =  $res_res * $factor_m;
                $solution_enf3_3->cost_op_an = $res_res_fact_m;
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
              if($factor_m==='ASHRAE 180 Proactivo'){
               $factor_m = 0.9;
           }

           if($factor_m==='Deficiente'){
               $factor_m = 1.05;
           }

           if($factor_m==='Sin Mantenimiento'){
               $factor_m = 1.15;
           }
               $res_res_fact_m =  $res_res * $factor_m;
              $solution_enf3_3->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));
            }


            $update_project->update();

            if($action_submit == 'store'){
                if( $update_project->update()){
                    $solution_enf3_3->id_project = $update_project->id;
                    $solution_enf3_3->save();

                }
            }else if($action_submit == 'update'){

                if( $update_project->update()){
                    $solution_enf3_3->id_project = $update_project->id;
                    $solution_enf3_3->update();
                }
            }

            }

             if($update_project->update()){
                $res_sum = 0;
                $cants = DB::table('solutions_project')
                ->where('id_project','=',$update_project->id)
                ->get();

                foreach($cants as $cant){
                    $res_sum = $res_sum + $cant->cost_op_an;
                }
                $id_result = DB::table('results_project')
                ->where('id_project','=',$id)
                ->where('num_enf','=',3)
                ->first();
                $new_result = ResultsProjectModel::find($id_result->id);
               $new_result->num_enf = 3;
               $new_result->cost_op_an = $res_sum;
               $new_result->id_project = $id;
               $new_result->id_empresa=Auth::user()->id_empresa;
               $new_result->id_user=Auth::user()->id;
               $new_result->update();
            }
        }

        $update_project->Update();
        if( $update_project->save()){
           $id_project = $update_project->id;

           return Redirect::to('/project/' . $id_project);
           /* return view('results',['id_project'=>$id_project]); */
        }
    }

    public function traer_unidad_hvac($id,$num_sol,$num_enf){


        $val_unidad = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->where('solutions_project.num_sol','=',$num_sol)
        ->first();

      return response()->json(['val_unidad' => $val_unidad]);
    }

    public function inactive_tarject($id,$num_enf,$num_sol){

        $id_solution = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->where('solutions_project.num_sol','=',$num_sol)
        ->first()->id;

        $solution_del=SolutionsProjectModel::find($id_solution);
        $solution_del->delete();

        return response()->json(['solution_del' => $solution_del]);
       /* response()->json(['val_unidad' => $val_unidad]); */
    }



    public function tipo_usuario(){

    }

}
