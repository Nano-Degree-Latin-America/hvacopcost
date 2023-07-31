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

    public function mis_projectos(Request $request){
        $id_empresa = Auth::user()->id_empresa;

        $empresa_name = DB::table('empresas')
        ->where('empresas.id','=',Auth::user()->id_empresa)
        ->first()->name;

        $tipo_user= DB::table('users')
        ->where('users.id','=',Auth::user()->id)
        ->first()->tipo_user;
        $query=trim($request->GET('searchText'));
        if($request){
            if($tipo_user == 5 || $tipo_user == 2){
                if($query == ""){
                    $mis_projectos = DB::table('projects')
                    ->join('categorias_edificios','categorias_edificios.id','=','projects.id_cat_edifico')
                    ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
                    ->where('id_empresa','=',$id_empresa)
                    ->select('projects.*','categorias_edificios.name as cad_edi','tipo_edificio.name as tipo_edi')
                    ->orderby('created_at','desc')
                    ->paginate(10);
                }

                if($query != ""){
                    $mis_projectos = DB::table('projects')
                    ->join('categorias_edificios','categorias_edificios.id','=','projects.id_cat_edifico')
                    ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
                    ->where('id_empresa','=',$id_empresa)
                    ->where('projects.name','=',$query)
                    ->orwhere('projects.region','=',$query)
                    ->orwhere('projects.ciudad','=',$query)
                    ->select('projects.*','categorias_edificios.name as cad_edi','tipo_edificio.name as tipo_edi')
                    ->orderby('created_at','desc')
                    ->paginate(10);
                }
            }

            if($tipo_user == 1){
                if($query == ""){
                $mis_projectos = DB::table('projects')
                ->join('categorias_edificios','categorias_edificios.id','=','projects.id_cat_edifico')
                ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
                ->where('projects.id_empresa','=',$id_empresa)
                ->where('projects.id_user','=',Auth::user()->id)
                ->select('projects.*','categorias_edificios.name as cad_edi','tipo_edificio.name as tipo_edi')
                ->orderby('created_at','desc')
                ->paginate(10);
                }

                if($query != ""){
                    $mis_projectos = DB::table('projects')
                    ->join('categorias_edificios','categorias_edificios.id','=','projects.id_cat_edifico')
                    ->join('tipo_edificio','tipo_edificio.id','=','projects.id_tipo_edificio')
                    ->where('projects.name','=',$query)
                    ->orwhere('projects.region','=',$query)
                    ->orwhere('projects.ciudad','=',$query)
                    ->where('projects.id_empresa','=',$id_empresa)
                    ->where('projects.id_user','=',Auth::user()->id)
                    ->select('projects.*','categorias_edificios.name as cad_edi','tipo_edificio.name as tipo_edi')
                    ->orderby('created_at','desc')
                    ->paginate(10);
                }
            }
        }




        return view('mis_projectos',['id_empresa'=>$id_empresa,'mis_projectos'=>$mis_projectos,"searchText"=>$query,"empresa_name"=>$empresa_name]);
    }

    public function porcents_aux($id){
        $porcent_hvac = DB::table('porcent_hvac')
        ->where('porcent_hvac.id_cat_edi','=',$id)
        ->first();

        $arry = [];
        for ($i=0; $i <= 6; $i++) {
            if ($i==1) {
                array_push($arry,$porcent_hvac->porcent_1);
            }

            if ($i==2) {
                array_push($arry,$porcent_hvac->porcent_2);
            }

            if ($i==3) {
                array_push($arry,$porcent_hvac->porcent_3);
            }

            if ($i==4) {
                array_push($arry,$porcent_hvac->porcent_4);
            }

            if ($i==5) {
                array_push($arry,$porcent_hvac->porcent_5);
            }

            if ($i==6) {
                array_push($arry,$porcent_hvac->porcent_6);
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
        ->orderBy('ciudad', 'asc')
        ->get();

        return $ciudades;
    }

    public function get_ciudades_Edit($id){


        $ciudades = DB::table('ciudad')
        ->where('ciudad.idPais','=',$id)
        ->where('ciudad.ashrae','!=',"")
        ->orderBy('ciudad', 'asc')
        ->get();

        return $ciudades;
    }



    public function edit_project(Request $request,$id){


        $update_project= ProjectsModel::find($id);
        $update_project->name=$request->get('name_pro');
        $update_project->id_tipo_edificio=$request->get('tipo_edificio_edit');
        $update_project->inflacion=intval($request->get('inc_ene'));
        $update_project->inflacion_rate=intval($request->get('inflation_rate'));
        $hrs_tiempo = $request->get('tiempo_porcent');

        switch ($hrs_tiempo) {
            case 'm_50':
                //si llega m_50 el valor es igual a 30 que es menor que 50 Nota! puede ser cualquier numero menor que 50
                $update_project->hrs_tiempo=30;

                break;
            case '51_167':
                //si es de 51 a 157 , 80 esta entre el rango
                $update_project->hrs_tiempo=80;

                break;
            case '168':
                 //si es igual a 168
                $update_project->hrs_tiempo=168;

                break;
        }



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
        $type_p = intval($request->get('type_p'));
        $action_submit_send = $request->get('action_submit_send');

        $sol_1_1 = intval($request->get('cUnidad_1_1'));
        $sol_1_2 = intval($request->get('cUnidad_1_2'));
        $sol_1_3 = intval($request->get('cUnidad_1_3'));

        $enfriamiento1 = intval($request->get('cUnidad_1_1'));
        $enfriamiento2 = intval($request->get('cUnidad_2_1'));
        $enfriamiento3 =intval($request->get('cUnidad_3_1'));

        if($action_submit_send == 'store'){
            //elimina soluciones
           $del_functions = ProjectController::del_solutions($update_project->id);
        }else if($action_submit_send == 'update'){
            //nada
        }

    if($type_p === 1){
        if ($enfriamiento1 !== 0) {

            if ($sol_1_1 !== 0) {
                if($action_submit_send == 'store'){
                    $solution_enf1=new SolutionsProjectModel;
                }else if($action_submit_send == 'update'){
                    $id_solution_1_1 = DB::table('solutions_project')
                    ->where('solutions_project.id_project','=',$id)
                    ->where('solutions_project.num_enf','=',1)
                    ->where('solutions_project.num_sol','=',1)
                    ->first();

                    $solution_enf1= SolutionsProjectModel::find($id_solution_1_1->id);
                }

                $solution_enf1->type_p=1;
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

//vars_ forms
$factor_s = $request->get('lblCsTipo_1_1');
$factor_d = floatval($request->get('csDisenio_1_1'));
$factor_c = $request->get('tipo_control_1_1');
$factor_t =floatval($request->get('dr_1_1'));
$factor_m =$request->get('csMantenimiento');
$t_e = $solution_enf1->tipo_equipo;

               if ($solution_enf1->unid_med == 'TR') {

               $tr = $solution_enf1->capacidad_tot;
               $res_1_1 = ProjectController::cost_op_an_form($tr,$cooling_hrs,$seer,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
               $solution_enf1->cost_op_an = floatval(number_format($res_1_1,2, '.', ''));

            }else if($solution_enf1->unid_med == 'KW'){
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                $kw =  $solution_enf1->capacidad_tot;
                $kw_3_5 = $kw / 3.5;
                //(((Kw / 3.5) x 12000 )
                $kw_a = $kw_3_5 * 12000;
                $res_dividiendo = $kw_a * $cooling_hrs;
                //(((Kw / 3.5) x 12000 )x (Cooling Hours)
                $res_div_seer = $res_dividiendo / $seer;
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
                        $val_conf_mant_1_1 = 4.5;
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
            $solution_enf1->confort = $nivel_confotr_1_1;

            //flata regilla y mantenimiento
            $update_project->update();
            if($action_submit_send == 'store'){

                if( $update_project->update()){
                    $solution_enf1->id_project = $update_project->id;
                    $solution_enf1->save();

                }
            }else if($action_submit_send == 'update'){


                if( $update_project->update()){
                    $solution_enf1->id_project = $update_project->id;
                    $solution_enf1->update();
                }
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
                $solution_enf1_2->type_p=1;
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

                $solution_enf1_2->costo_mantenimiento=floatval($aux_cost_mant_1_2);
                $solution_enf1_2->val_aprox = floatval($val_aprox_aux_1_2);
                $solution_enf1_2->status = 1;
                $solution_enf1_2->id_empresa=Auth::user()->id_empresa;
                $solution_enf1_2->id_user=Auth::user()->id;


                $cooling_hrs =  $solution_enf1_2->coolings_hours;
                $cost_energ =  $solution_enf1_2->costo_elec;
                $seer = $solution_enf1_2->eficencia_ene_cant;
                $factor_s = $request->get('lblCsTipo_1_2');
                $factor_d = floatval($request->get('csDisenio_1_2'));
                $factor_c = $request->get('tipo_control_1_2');
                $factor_t =floatval($request->get('dr_1_2'));
                $factor_m =$request->get('csMantenimiento_1_2');
                $t_e = $solution_enf1->tipo_equipo;
               if ($solution_enf1_2->unid_med == 'TR') {
                $tr = $solution_enf1_2->capacidad_tot;
                $res_1_2 = ProjectController::cost_op_an_form($tr,$cooling_hrs,$seer,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
                $solution_enf1_2->cost_op_an = floatval(number_format($res_1_2,2, '.', ''));

            }else if($solution_enf1_2->unid_med == 'KW'){
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                  $kw =  $solution_enf1_2->capacidad_tot;
                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)
                  $res_div_seer = $res_dividiendo / $seer;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)  ) / SEER
                  $res_div_seer_a = $res_div_seer / 1000;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours) / SEER ) / 1000

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

                if($solution_enf1_2->tipo_equipo === "pa_pi_te"){
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

                $solution_enf1_2->cost_op_an =floatval(number_format($factor_m,2, '.', ''));

                }

                //niveles de confort
            $unidad_conf_1_1 = $solution_enf1_2->unidad_hvac;
            $equipo_conf_1_1 = $solution_enf1_2->tipo_equipo;
            $diseno_conf_1_1 = $solution_enf1_2->name_disenio;
            $t_control_conf_1_1 = $solution_enf1_2->name_t_control;
            $dr_conf_1_1 = $solution_enf1_2->dr_name;
            $mant_conf_1_1 = $solution_enf1_2->mantenimiento;

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
                        $val_conf_mant_1_1 = 4.5;
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
            $solution_enf1_2->confort = $nivel_confotr_1_1;

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

                    $solution_enf1_3->type_p=1;
                    $solution_enf1_3->num_sol = 3;
                    $solution_enf1_3->num_enf = 1;
                    $solution_enf1_3->unidad_hvac = $request->get('cUnidad_1_3');
                    $solution_enf1_3->tipo_equipo	= $request->get('csTipo_1_3');
                    $solution_enf1_3->tipo_diseño	= $request->get('csDisenio_1_3');

                    $aux_cap_tot_1_3 = explode(",",   $request->get('capacidad_total_1_3'));
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
                    $factor_s = $request->get('lblCsTipo_1_3');
                    $factor_d = floatval($request->get('csDisenio_1_3'));
                    $factor_c = $request->get('tipo_control_1_3');
                    $factor_t =floatval($request->get('dr_1_3'));
                    $factor_m =$request->get('csMantenimiento_1_3');
                    $t_e = $solution_enf1->tipo_equipo;
                if ($solution_enf1_3->unid_med == 'TR') {
                    $tr = $solution_enf1_3->capacidad_tot;
                    $res_1_3 = ProjectController::cost_op_an_form($tr,$cooling_hrs,$seer,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);

                    $solution_enf1_3->cost_op_an = $res_1_3;
                }else if($solution_enf1_3->unid_med == 'KW'){
                      //(((Kw / 3.5)
                  $kw =  $solution_enf1_3->capacidad_tot;
                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)
                  $res_div_seer = $res_dividiendo / $seer;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)  ) / SEER
                  $res_div_seer_a = $res_div_seer / 1000;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)  ) / SEER ) / 1000

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


                $update_project->update();

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
             $val_conf_mant_1_1 = 4.5;
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
 $solution_enf1_3->confort = $nivel_confotr_1_1;

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

            if($action_submit_send == 'store'){
                $new_result=new ResultsProjectModel;
            }else if($action_submit_send == 'update'){
                $id_solution_1_1 = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id)
                ->where('solutions_project.num_enf','=',1)
                ->where('solutions_project.num_sol','=',1)
                ->first();

                $new_result = ResultsProjectModel::find($id_result->id);
            }
           $new_result->num_enf = 1;
           $new_result->cost_op_an = $res_sum;
           $new_result->id_project = $id;
           $new_result->id_empresa=Auth::user()->id_empresa;
           $new_result->id_user=Auth::user()->id;
           if($action_submit_send == 'store'){
            $new_result->save();
        }else if($action_submit_send == 'update'){
            $new_result->update();
        }
        }

            }




                ////EditSolution enfriamiento 2
                $sol_2_1 = intval($request->get('cUnidad_2_1'));
                $sol_2_2 = intval($request->get('cUnidad_2_2'));
                $sol_2_3 = intval($request->get('cUnidad_2_3'));

                if ($enfriamiento2 !== 0) {
                    if ($sol_2_1 !== 0) {

                        $action_submit =  $request->get('action_submit_2_1');
                        if($action_submit == 'store'){
                            $solution_enf2_1=new SolutionsProjectModel;
                        }else if($action_submit == 'update'){
                            $id_solution_2_1 = DB::table('solutions_project')
                            ->where('solutions_project.id_project','=',$id)
                            ->where('solutions_project.num_enf','=',2)
                            ->where('solutions_project.num_sol','=',1)
                            ->first();

                            $solution_enf2_1=SolutionsProjectModel::find($id_solution_2_1->id);

                        }



                        $solution_enf2_1->type_p=1;
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
                        $factor_c = floatval($request->get('tipo_control_2_1'));
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

                            $update_project->update();

                             //niveles de confort
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
             $val_conf_mant_1_1 = 4.5;
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
 $solution_enf2_1->confort = $nivel_confotr_1_1;

                    if($action_submit == 'store'){

                        if( $update_project->update()){
                            $solution_enf2_1->id_project = $update_project->id;
                            $solution_enf2_1->save();

                        }
                    }else if($action_submit == 'update'){


                        if( $update_project->update()){
                            $solution_enf2_1->id_project = $update_project->id;
                            $solution_enf2_1->update();

                        }
                    }

/////////////////////////////////////////////////////////////////

                    /* $update_project->update();
                    if( $update_project->update()){
                        $solution_enf2_1->id_project = $update_project->id;
                        $solution_enf2_1->update();
                    } */

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

                        $solution_enf2_2->type_p=1;
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
             $val_conf_mant_1_1 = 4.5;
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
 $solution_enf2_2->confort = $nivel_confotr_1_1;


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
                        $solution_enf2_3->type_p=1;
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

                        $solution_enf2_3->val_aprox = floatval($val_aprox_aux_2_3);
                        $solution_enf2_3->status = 1;
                        $solution_enf2_3->costo_mantenimiento=floatval($aux_cost_mant_2_3);
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
             $val_conf_mant_1_1 = 4.5;
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
 $solution_enf2_3->confort = $nivel_confotr_1_1;

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

                        if($id_result === null){
                            $new_result = new ResultsProjectModel;
                        }else  if($id_result !== null){
                            $new_result = ResultsProjectModel::find($id_result->id);
                        }


                       $new_result->num_enf = 2;
                       $new_result->cost_op_an = $res_sum;
                       $new_result->id_project = $id;
                       $new_result->id_empresa=Auth::user()->id_empresa;
                       $new_result->id_user=Auth::user()->id;
                       if($id_result === null){
                        $new_result->save();
                        }else  if($id_result !== null){
                            $new_result->update();
                        }


                    }
                }

                 //guardar soluciones
           $sol_3_1 = intval($request->get('cUnidad_3_1'));
           $sol_3_2 = intval($request->get('cUnidad_3_2'));
           $sol_3_3 = intval($request->get('cUnidad_3_3'));

         if ($enfriamiento3 !== 0) {

             if ($sol_3_1 !== 0) {

                $action_submit =  $request->get('action_submit_3_1');
                if($action_submit == 'store'){
                    $solution_enf3_1=new SolutionsProjectModel;
                }else if($action_submit == 'update'){
                    $id_solution_3_1 = DB::table('solutions_project')
                ->where('solutions_project.id_project','=',$id)
                ->where('solutions_project.num_enf','=',3)
                ->where('solutions_project.num_sol','=',1)
                ->first();
                $solution_enf3_1=SolutionsProjectModel::find($id_solution_3_1->id);
                }

                 $solution_enf3_1->type_p=1;
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
                         $val_conf_mant_1_1 = 4.5;
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
             $solution_enf3_1->confort = $nivel_confotr_1_1;

             $update_project->update();

             if($action_submit == 'store'){

                if( $update_project->update()){
                    $solution_enf3_1->id_project = $update_project->id;
                    $solution_enf3_1->save();

                }
            }else if($action_submit == 'update'){


                if( $update_project->update()){
                    $solution_enf3_1->id_project = $update_project->id;
                    $solution_enf3_1->update();

                }
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

                $solution_enf3_2->type_p=1;
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
                        $val_conf_mant_1_1 = 4.5;
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
            $solution_enf3_2->confort = $nivel_confotr_1_1;

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
                $solution_enf3_3->type_p=1;
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
                $aux_cost_mant_b_3_3 = explode(",",    $aux_cost_mant_3_3[1]);

                if(count($aux_cost_mant_b_3_3) == 1){
                    $aux_cost_mant_3_3 =  $aux_cost_mant_b_3_2[0];
                }
                if(count($aux_cost_mant_b_3_3) == 2){
                    $aux_cost_mant_3_3=  $aux_cost_mant_b_3_3[0].$aux_cost_mant_b_3_3[1];
                }
                if(count($aux_cost_mant_b_3_3) == 3){
                    $aux_cost_mant_3_3 =  $aux_cost_mant_b_3_3[0].$aux_cost_mant_b_3_3[1].$aux_cost_mant_b_3_3[2];
                }
                if(count($aux_cost_mant_b_3_3) == 4){
                    $aux_cost_mant_3_3 =  $aux_cost_mant_b_3_3[0].$aux_cost_mant_b_3_3[1].$aux_cost_mant_b_3_3[2].$aux_cost_mant_b_3_3[3];
                }
                if(count($aux_cost_mant_b_3_3) == 5){
                    $aux_cost_mant_3_3 =  $aux_cost_mant_b_3_3[0].$aux_cost_mant_b_3_3[1].$aux_cost_mant_b_3_3[2].$aux_cost_mant_b_3_3[3].$aux_cost_mant_b_3_3[4];
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
                        $val_conf_mant_1_1 = 4.5;
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
            $solution_enf3_3->confort = $nivel_confotr_1_1;

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

                if($id_result === null){
                    $new_result = new ResultsProjectModel;
                }else  if($id_result !== null){
                    $new_result = ResultsProjectModel::find($id_result->id);
                }

               $new_result->num_enf = 3;
               $new_result->cost_op_an = $res_sum;
               $new_result->id_project = $id;
               $new_result->id_empresa=Auth::user()->id_empresa;
               $new_result->id_user=Auth::user()->id;

                    if($id_result === null){
                        $new_result->save();
                    }else  if($id_result !== null){
                        $new_result->update();
                    }

            }
        }
        $update_project->Update();
        if( $update_project->save()){
           $id_project = $update_project->id;

           return Redirect::to('/project/' . $id_project);
           /* return view('results',['id_project'=>$id_project]); */
        }
    }
    if($type_p === 2){
        //si llega un store elimina solucoiners exotentes

        if($action_submit_send == 'store'){
            //elimina soluciones
           $del_functions = ProjectController::del_solutions($update_project->id);
        }else if($action_submit_send == 'update'){
            //nada
        }

        $update_project->update();
        $enfriamiento1_retro = intval($request->get('cUnidad_1_1_retro'));
            $enfriamiento2_retro = intval($request->get('cUnidad_2_1_retro'));
            $enfriamiento3_retro =intval($request->get('cUnidad_3_1_retro'));

            //guardar soluciones
            /* $sol_1_2_retro = intval($request->get('cUnidad_1_2'));
            $sol_1_3_retro = intval($request->get('cUnidad_1_3')); */
            if ($enfriamiento1_retro !== 0) {
                $sol_1_1_retro = intval($request->get('cUnidad_1_1_retro'));
                if ($sol_1_1_retro !== 0) {

                    if($action_submit_send == 'store'){
                        $solution_enf1=new SolutionsProjectModel;
                    }else if($action_submit_send == 'update'){
                        $id_solution_1_1 = DB::table('solutions_project')
                    ->where('solutions_project.id_project','=',$id)
                    ->where('solutions_project.num_enf','=',1)
                    ->where('solutions_project.num_sol','=',1)
                    ->first();

                        $solution_enf1= SolutionsProjectModel::find($id_solution_1_1->id);
                    }

                    $solution_enf1->type_p=2;
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
                    $aux = explode(",",   $request->get('capacidad_total_1_1_retro'));
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
                    $solution_enf1->unid_med=$request->get('unidad_capacidad_tot_1_1_retro');
    //separa cadena
                    $aux_costo_elec = explode("$",   $request->get('costo_elec_1_1_retro'));
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
                    $aux_cooling_hours = explode(",",$request->get('hrsEnfriado_1_1_retro'));

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

                    $solution_enf1->tipo_control=$request->get('tipo_control_1_1_retro');


                    $solution_enf1->name_t_control=$request->get('name_t_control_1_1_retro');
                    $solution_enf1->dr_name=$request->get('dr_name_1_1_retro');

                    $solution_enf1->dr = $request->get('dr_1_1_retro');
                    $solution_enf1->mantenimiento = $request->get('csMantenimiento_1_1_retro');

                    if($request->get('costo_recu_1_1_retro') != null){

                        $aux_val_aprox = explode("$",   $request->get('costo_recu_1_1_retro'));
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

                    }else  if($request->get('costo_recu_1_1_retro') == null){
                        $val_aprox_aux = 0;
                    }

                    if($request->get('maintenance_cost_1_1_retro') != null){
                        $aux_cost_mant = explode("$",   $request->get('maintenance_cost_1_1_retro'));
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


                    }else  if($request->get('maintenance_cost_1_1_retro') == null){
                        $aux_cost_mant = 0;

                    }

                    if($request->get('const_an_rep_1_1') != null){
                        $aux__cost_an_rep_1_1 = explode("$",   $request->get('const_an_rep_1_1'));
                        $const_an_rep_1_1 = explode(",",    $aux__cost_an_rep_1_1[1]);

                        if(count($const_an_rep_1_1) == 1){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0];
                        }
                        if(count($const_an_rep_1_1) == 2){
                            $aux__cost_an_rep_1_1=  $const_an_rep_1_1[0].$const_an_rep_1_1[1];
                        }
                        if(count($const_an_rep_1_1) == 3){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2];
                        }
                        if(count($const_an_rep_1_1) == 4){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2].$const_an_rep_1_1[3];
                        }
                        if(count($const_an_rep_1_1) == 5){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2].$const_an_rep_1_1[3].$const_an_rep_1_1[4];
                        }


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
                    $seer = floatval($request->get('csStd_retro_1_1_cant'));


                    $factor_s = $request->get('lblCsTipo_1_1_retro');
                    $factor_d = floatval($request->get('csDisenio_1_1_retro'));
                    $factor_c = $request->get('tipo_control_1_1_retro');
                    $factor_t =floatval($request->get('dr_1_1_retro'));
                    $factor_m =$request->get('csMantenimiento_1_1_retro');
                   if ($solution_enf1->unid_med == 'TR') {
                    //((TR x 12000) x (Cooling Hours) x (Costo Energía) / (SEER x (1-Z)^Años de vida) )/ 1000

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

                    $res_res =  $res_parent_1 * $factor_c;
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


                    $solution_enf1->id_project = $id;


                    if($action_submit_send == 'store'){
                        $solution_enf1->save();
                    }else if($action_submit_send == 'update'){
                        $solution_enf1->update();
                    }
                }

                     //restultados update
            $res_sum = 0;
            $cants = DB::table('solutions_project')
            ->where('id_project','=',$id)
            //->where('num_enf','=',1)
            ->get();

            foreach($cants as $cant){
                $res_sum = $res_sum + $cant->cost_op_an;
            }
            $id_result = DB::table('results_project')
            ->where('id_project','=',$id)
            ->where('num_enf','=',1)
            ->first();

            if($action_submit_send == 'store'){
                $new_result = new ResultsProjectModel;
            }else if($action_submit_send == 'update'){
                $new_result = ResultsProjectModel::find($id_result->id);
            }

           $new_result->num_enf = 1;
           $new_result->cost_op_an = $res_sum;
           $new_result->id_project = $id;
           $new_result->id_empresa=Auth::user()->id_empresa;
           $new_result->id_user=Auth::user()->id;

            if($action_submit_send == 'store'){
            $new_result->save();
                 }else if($action_submit_send == 'update'){
            $new_result->update();
             }
            }


            //solucionn A
            if ($enfriamiento2_retro !== 0) {

                $sol_2_1_retro = intval($request->get('cUnidad_2_1_retro'));

                if ($sol_2_1_retro !== 0) {

                    if($action_submit_send == 'store'){
                        $solution_enf_2_1_retro=new SolutionsProjectModel;
                    }else if($action_submit_send == 'update'){
                        $id_solution_2_1 = DB::table('solutions_project')
                    ->where('solutions_project.id_project','=',$id)
                    ->where('solutions_project.num_enf','=',2)
                    ->where('solutions_project.num_sol','=',1)
                    ->first();

                    $solution_enf_2_1_retro=SolutionsProjectModel::find($id_solution_2_1->id);
                    }


                    $solution_enf_2_1_retro->type_p=2;
                    $solution_enf_2_1_retro->num_sol=1;
                    $solution_enf_2_1_retro->num_enf=2;
                    $solution_enf_2_1_retro->unidad_hvac=$request->get('cUnidad_2_1_retro');
                    $solution_enf_2_1_retro->tipo_equipo	=$request->get('cheTipo_2_1_retro');
                    $solution_enf_2_1_retro->id_marca=$request->get('marca_2_1_retro');
                    $solution_enf_2_1_retro->id_modelo=$request->get('modelo_2_1_retro');
                    $solution_enf_2_1_retro->yrs_vida=$request->get('yrs_vida_2_1_retro');
                    $solution_enf_2_1_retro->eficencia_ene=$request->get('csStd_2_1_retro');
                    $solution_enf_2_1_retro->eficencia_ene_cant=$request->get('csStd_cant_2_1_retro');
                    $solution_enf_2_1_retro->name_disenio=$request->get('name_diseno_2_1_retro');
                    $solution_enf_2_1_retro->tipo_diseño= $request->get('cheDisenio_2_1_retro');
                    $aux = explode(",",   $request->get('capacidad_total_2_1_retro'));
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

                    $solution_enf_2_1_retro->capacidad_tot=floatval($cap_tot_aux);
                    $solution_enf_2_1_retro->unid_med=$request->get('unidad_capacidad_tot_2_1_retro');
    //separa cadena
                    $aux_costo_elec = explode("$",   $request->get('costo_elec_2_1_retro'));
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
                    $solution_enf_2_1_retro->costo_elec=floatval($costo_elec_aux);
     //separa cadena
                    $aux_cooling_hours = explode(",",$request->get('hrsEnfriado_2_1_retro'));

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

                    $solution_enf_2_1_retro->coolings_hours=intval($cooling_hours_aux);

                    $solution_enf_2_1_retro->tipo_control=$request->get('tipo_control_2_1_retro');


                    $solution_enf_2_1_retro->name_t_control=$request->get('name_t_control_2_1_retro');
                    $solution_enf_2_1_retro->dr_name=$request->get('dr_name_2_1_retro');

                    $solution_enf_2_1_retro->dr = $request->get('dr_2_1_retro');
                    $solution_enf_2_1_retro->mantenimiento = $request->get('csMantenimiento_2_1_retro');

                    if($request->get('costo_recu_2_1_retro') != null){

                        $aux_val_aprox = explode("$",   $request->get('costo_recu_2_1_retro'));
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

                    }else  if($request->get('costo_recu_2_1_retro') == null){
                        $val_aprox_aux = 0;
                    }

                    if($request->get('maintenance_cost_2_1_retro') != null){
                        $aux_cost_mant = explode("$",   $request->get('maintenance_cost_2_1_retro'));
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


                    }else  if($request->get('maintenance_cost_2_1_retro') == null){
                        $aux_cost_mant = 0;

                    }

                    if($request->get('const_an_rep_2_1') != null){
                        $aux__cost_an_rep_1_1 = explode("$",$request->get('const_an_rep_2_1'));
                        $const_an_rep_1_1 = explode(",",$aux__cost_an_rep_1_1[1]);

                        if(count($const_an_rep_1_1) == 1){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0];
                        }
                        if(count($const_an_rep_1_1) == 2){
                            $aux__cost_an_rep_1_1=  $const_an_rep_1_1[0].$const_an_rep_1_1[1];
                        }
                        if(count($const_an_rep_1_1) == 3){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2];
                        }
                        if(count($const_an_rep_1_1) == 4){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2].$const_an_rep_1_1[3];
                        }
                        if(count($const_an_rep_1_1) == 5){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2].$const_an_rep_1_1[3].$const_an_rep_1_1[4];
                        }


                    }else  if($request->get('const_an_rep_2_1') == null){
                        $aux__cost_an_rep_1_1 = 0;

                    }

                    $solution_enf_2_1_retro->val_aprox=floatval($val_aprox_aux);
                    $solution_enf_2_1_retro->costo_mantenimiento=floatval($aux_cost_mant);
                    $solution_enf_2_1_retro->cost_an_re=floatval($aux__cost_an_rep_1_1);
                    $solution_enf_2_1_retro->status=1;
                    $solution_enf_2_1_retro->id_empresa=Auth::user()->id_empresa;
                    $solution_enf_2_1_retro->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf_2_1_retro->coolings_hours;
                    $cost_energ =  $solution_enf_2_1_retro->costo_elec;
                    $seer = floatval($request->get('csStd_cant_2_1_retro'));


                    $factor_s = $request->get('lblCsTipo_2_1_retro');
                    $factor_d = floatval($request->get('cheDisenio_2_1_retro'));
                    $factor_c = $request->get('tipo_control_2_1_retro');
                    $factor_t =floatval($request->get('dr_2_1_retro'));
                    $factor_m =$request->get('csMantenimiento_2_1_retro');

                   if ($solution_enf_2_1_retro->unid_med == 'TR') {

                    $tr =  $solution_enf_2_1_retro->capacidad_tot;
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

                    $res_res =  $res_parent_1 * $factor_c;
                    if($solution_enf_2_1_retro->tipo_equipo === "pa_pi_te"){
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
                    $solution_enf_2_1_retro->cost_op_an = $res_res_fact_m;
                }else if($solution_enf_2_1_retro->unid_med == 'KW'){
                    //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                      //(((Kw / 3.5)
                    $kw =  $solution_enf_2_1_retro->capacidad_tot;
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

                    if($solution_enf_2_1_retro->tipo_equipo === "pa_pi_te"){
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

                    $solution_enf_2_1_retro->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));

                    //$solution_enf1->cost_op_an = floatval(number_format($res_div_seer_a,2, '.', ''));

                }

      //niveles de confort
      $unidad_conf_1_1 = $solution_enf_2_1_retro->unidad_hvac;
      $equipo_conf_1_1 = $solution_enf_2_1_retro->tipo_equipo;
      $diseno_conf_1_1 = $solution_enf_2_1_retro->name_disenio;
      $t_control_conf_1_1 = $solution_enf_2_1_retro->name_t_control;
      $dr_conf_1_1 = $solution_enf_2_1_retro->dr_name;
      $mant_conf_1_1 = $solution_enf_2_1_retro->mantenimiento;

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
      $solution_enf_2_1_retro->confort = $nivel_confotr_1_1;


                    $solution_enf_2_1_retro->id_project = $id;


                    if($action_submit_send == 'store'){
                        $solution_enf_2_1_retro->save();
                    }else if($action_submit_send == 'update'){
                        $solution_enf_2_1_retro->update();
                    }

                }

                if($solution_enf_2_1_retro->update()){
                    $res_sum = 0;
                    $cants = DB::table('solutions_project')
                    ->where('id_project','=',$id)
                    ->get();

                    foreach($cants as $cant){
                        $res_sum = $res_sum + $cant->cost_op_an;
                    }
                    $id_result = DB::table('results_project')
                    ->where('id_project','=',$id)
                    ->where('num_enf','=',2)
                    ->first();


                    if($action_submit_send == 'store'){
                        $new_result = new ResultsProjectModel;
                    }else if($action_submit_send == 'update'){
                        $new_result = ResultsProjectModel::find($id_result->id);
                    }

                   $new_result->num_enf = 2;
                   $new_result->cost_op_an = $res_sum;
                   $new_result->id_project = $id;
                   $new_result->id_empresa=Auth::user()->id_empresa;
                   $new_result->id_user=Auth::user()->id;
                   if($action_submit_send == 'store'){
                    $new_result->save();
                        }else if($action_submit_send == 'update'){
                    $new_result->update();
                    }




                }

            }

            //solucionn B
            if ($enfriamiento3_retro !== 0) {

                $sol_3_1_retro = intval($request->get('cUnidad_3_1_retro'));

                if ($sol_3_1_retro !== 0) {

                    if($action_submit_send == 'store'){
                        $solution_enf_3_1_retro=new SolutionsProjectModel;
                    }else if($action_submit_send == 'update'){
                        $id_solution_3_1 = DB::table('solutions_project')
                        ->where('solutions_project.id_project','=',$id)
                        ->where('solutions_project.num_enf','=',3)
                        ->where('solutions_project.num_sol','=',1)
                        ->first();
                        $solution_enf_3_1_retro=SolutionsProjectModel::find($id_solution_3_1->id);
                    }
                    $solution_enf_3_1_retro->type_p=2;
                    $solution_enf_3_1_retro->num_sol=1;
                    $solution_enf_3_1_retro->num_enf=3;
                    $solution_enf_3_1_retro->unidad_hvac=$request->get('cUnidad_3_1_retro');
                    $solution_enf_3_1_retro->tipo_equipo=$request->get('cheTipo_3_1_retro');
                    $solution_enf_3_1_retro->id_marca=$request->get('marca_3_1_retro');
                    $solution_enf_3_1_retro->id_modelo=$request->get('modelo_3_1_retro');
                    $solution_enf_3_1_retro->yrs_vida=$request->get('yrs_vida_3_1_retro');
                    $solution_enf_3_1_retro->eficencia_ene=$request->get('csStd_3_1_retro');
                    $solution_enf_3_1_retro->eficencia_ene_cant=$request->get('csStd_cant_3_1_retro');
                    $solution_enf_3_1_retro->name_disenio=$request->get('name_diseno_3_1_retro');
                    $solution_enf_3_1_retro->tipo_diseño= $request->get('cheDisenio_3_1_retro');
                    $aux = explode(",",   $request->get('capacidad_total_3_1_retro'));
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

                    $solution_enf_3_1_retro->capacidad_tot=floatval($cap_tot_aux);
                    $solution_enf_3_1_retro->unid_med=$request->get('unidad_capacidad_tot_3_1_retro');
    //separa cadena
                    $aux_costo_elec = explode("$",   $request->get('costo_elec_3_1_retro'));
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
                    $solution_enf_3_1_retro->costo_elec=floatval($costo_elec_aux);
     //separa cadena
                    $aux_cooling_hours = explode(",",$request->get('hrsEnfriado_3_1_retro'));

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

                    $solution_enf_3_1_retro->coolings_hours=intval($cooling_hours_aux);

                    $solution_enf_3_1_retro->tipo_control=$request->get('tipo_control_3_1_retro');


                    $solution_enf_3_1_retro->name_t_control=$request->get('name_t_control_3_1_retro');
                    $solution_enf_3_1_retro->dr_name=$request->get('dr_name_3_1_retro');

                    $solution_enf_3_1_retro->dr = $request->get('dr_3_1_retro');
                    $solution_enf_3_1_retro->mantenimiento = $request->get('cheMantenimiento_3_1_retro');

                    if($request->get('costo_recu_3_1_retro') != null){

                        $aux_val_aprox = explode("$",   $request->get('costo_recu_3_1_retro'));
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

                    }else  if($request->get('costo_recu_3_1_retro') == null){
                        $val_aprox_aux = 0;
                    }

                    if($request->get('maintenance_cost_3_1_retro') != null){
                        $aux_cost_mant = explode("$",   $request->get('maintenance_cost_3_1_retro'));
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


                    }else  if($request->get('maintenance_cost_3_1_retro') == null){
                        $aux_cost_mant = 0;

                    }

                    if($request->get('const_an_rep_3_1') != null){
                        $aux__cost_an_rep_1_1 = explode("$",   $request->get('const_an_rep_3_1'));
                        $const_an_rep_1_1 = explode(",",    $aux__cost_an_rep_1_1[1]);

                        if(count($const_an_rep_1_1) == 1){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0];
                        }
                        if(count($const_an_rep_1_1) == 2){
                            $aux__cost_an_rep_1_1=  $const_an_rep_1_1[0].$const_an_rep_1_1[1];
                        }
                        if(count($const_an_rep_1_1) == 3){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2];
                        }
                        if(count($const_an_rep_1_1) == 4){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2].$const_an_rep_1_1[3];
                        }
                        if(count($const_an_rep_1_1) == 5){
                            $aux__cost_an_rep_1_1 =  $const_an_rep_1_1[0].$const_an_rep_1_1[1].$const_an_rep_1_1[2].$const_an_rep_1_1[3].$const_an_rep_1_1[4];
                        }


                    }else  if($request->get('const_an_rep_3_1') == null){
                        $aux__cost_an_rep_1_1 = 0;

                    }

                    $solution_enf_3_1_retro->val_aprox=floatval($val_aprox_aux);
                    $solution_enf_3_1_retro->costo_mantenimiento=floatval($aux_cost_mant);
                    $solution_enf_3_1_retro->cost_an_re=floatval($aux__cost_an_rep_1_1);
                    $solution_enf_3_1_retro->status=1;
                    $solution_enf_3_1_retro->id_empresa=Auth::user()->id_empresa;
                    $solution_enf_3_1_retro->id_user=Auth::user()->id;


                    $cooling_hrs =  $solution_enf_3_1_retro->coolings_hours;
                    $cost_energ =  $solution_enf_3_1_retro->costo_elec;
                    $seer = floatval($request->get('csStd_cant_3_1_retro'));


                    $factor_s = $request->get('lblCsTipo_3_1_retro');
                    $factor_d = floatval($request->get('cheDisenio_3_1_retro'));
                    $factor_c = $request->get('tipo_control_3_1_retro');
                    $factor_t =floatval($request->get('dr_3_1_retro'));
                    $factor_m =$request->get('cheMantenimiento_3_1_retro');
                   if ($solution_enf_3_1_retro->unid_med == 'TR') {

                    $tr =  $solution_enf_3_1_retro->capacidad_tot;
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

                    $res_res =  $res_parent_1 * $factor_c;
                    if($solution_enf_3_1_retro->tipo_equipo === "pa_pi_te"){
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
                    $solution_enf_3_1_retro->cost_op_an = $res_res_fact_m;
                }else if($solution_enf_3_1_retro->unid_med == 'KW'){
                    //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                      //(((Kw / 3.5)
                    $kw =  $solution_enf_3_1_retro->capacidad_tot;
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

                    if($solution_enf_3_1_retro->tipo_equipo === "pa_pi_te"){
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

                    $solution_enf_3_1_retro->cost_op_an =floatval(number_format($res_res_fact_m,2, '.', ''));

                    //$solution_enf1->cost_op_an = floatval(number_format($res_div_seer_a,2, '.', ''));

                }

      //niveles de confort
      $unidad_conf_1_1 = $solution_enf_3_1_retro->unidad_hvac;
      $equipo_conf_1_1 = $solution_enf_3_1_retro->tipo_equipo;
      $diseno_conf_1_1 = $solution_enf_3_1_retro->name_disenio;
      $t_control_conf_1_1 = $solution_enf_3_1_retro->name_t_control;
      $dr_conf_1_1 = $solution_enf_3_1_retro->dr_name;
      $mant_conf_1_1 = $solution_enf_3_1_retro->mantenimiento;

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
      $solution_enf_3_1_retro->confort = $nivel_confotr_1_1;


                    $solution_enf_3_1_retro->id_project = $id;


                    if($action_submit_send == 'store'){
                        $solution_enf_3_1_retro->save();
                    }else if($action_submit_send == 'update'){
                        $solution_enf_3_1_retro->update();
                    }

                }


                    $res_sum = 0;
                    $cants = DB::table('solutions_project')
                    ->where('id_project','=',$id)
                    ->get();

                    foreach($cants as $cant){
                        $res_sum = $res_sum + $cant->cost_op_an;
                    }

                    $id_result = DB::table('results_project')
                    ->where('id_project','=',$id)
                    ->where('num_enf','=',3)
                    ->first();


                    if($action_submit_send == 'store'){
                        $new_result = new ResultsProjectModel;
                    }else if($action_submit_send == 'update'){
                        $new_result = ResultsProjectModel::find($id_result->id);
                    }

                   $new_result->num_enf = 3;
                   $new_result->cost_op_an = $res_sum;
                   $new_result->id_project = $id;
                   $new_result->id_empresa=Auth::user()->id_empresa;
                   $new_result->id_user=Auth::user()->id;

                   if($action_submit_send == 'store'){
                        $new_result->save();
                    }else if($action_submit_send == 'update'){
                         $new_result->update();
                    }





            }
           /*  $solutions =DB::table('solutions_project')
            ->where('solutions_project.id_project','=',$mew_project->id)
            ->get(); */

            if($update_project->update()){
                $id_project = $id;

                return Redirect::to('/resultados_retrofit/' . $id_project);

             }
    }

    }

    public function del_solutions($id){
        $solutions = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->get();

        $results = DB::table('results_project')
        ->where('results_project.id_project','=',$id)
        ->get();

        $delete_state = false;

        foreach($solutions as $sol){
            $solution=SolutionsProjectModel::find($sol->id);
            $solution->delete();
        }

        foreach($results as $res){
            $solution=ResultsProjectModel::find($res->id);
            $solution->delete();
        }

        $solutions_check = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->get();

        $results_check = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->get();
        ///solutions check
        if (count($solutions_check)>0 && count($results_check)>0){
            $delete_state = false;
            return $delete_state;
        }

        if (count($solutions_check)==0 && count($results_check)==0){
            $delete_state = true;
            return $delete_state;
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



    public function del_solution($id,$num_enf,$num_sol){

        $solution = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id)
        ->where('solutions_project.num_enf','=',$num_enf)
        ->get();
        $check_sol_lengh = count($solution);

        if($check_sol_lengh>0){

            foreach($solution as $sol){
                $solution_del=SolutionsProjectModel::find($sol->id);
                $solution_del->delete();
            }

            $result=DB::table('results_project')
            ->where('num_enf','=',$num_enf)
            ->where('id_project','=',$id)
            ->first();

            if($result){
                $result_del=ResultsProjectModel::find($result->id);
                $result_del->delete();
            }


        }


        return response()->json(['result' => $result]);
       /* response()->json(['val_unidad' => $val_unidad]); */
    }

    public function del_project($id){
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

        if( $solution_del->delete()){
            return true;

        }else{
            return false;
        }
    }

    public function cost_op_an_form($tr,$cooling_hrs,$seer,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m){

        //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
       //((TR x 12000)
       $res_trx_12000 = $tr * 12000;
       //((TR x 12000) x (Cooling Hours)
       $res_1er_parent = $res_trx_12000 * $cooling_hrs;
       //((TR x 12000) x (Cooling Hours)  / (SEER) )
       $tot_1er_res = $res_1er_parent / $seer;
       $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;

       //((TR x 12000) x (Cooling Hours) / (SEER) ) / 1000)
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

    public function type_project($id_project){
        $type_proy = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_project)
        ->first();

        return $type_proy;
    }

}
