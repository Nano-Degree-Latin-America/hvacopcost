<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Services\ProjectService;
use App\Services\SolutionServiceRetrofit;
use App\Services\solutionServiceEdit;
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

class SolutionServiceEditRetro
{

    public function solution_update_retro(Request $request,$id_project){
        $funciones = new funciones();

            $action_submit_send = $request->get('action_submit_send');
            $enfriamiento1_retro = intval($request->get('cUnidad_1_1_retro'));
            $enfriamiento2_retro = intval($request->get('cUnidad_2_1_retro'));
            $enfriamiento3_retro =intval($request->get('cUnidad_3_1_retro'));
        //guardar soluciones
        if ($enfriamiento1_retro !== 0) {
            SolutionServiceEditRetro::update_solution_1_1_retro($request,$id_project,$action_submit_send);
            $funciones->update_results(1,$id_project,$action_submit_send);
        }

        if ($enfriamiento2_retro !== 0) {
            SolutionServiceEditRetro::update_solution_2_1_retro($request,$id_project,$action_submit_send);
            $funciones->update_results(2,$id_project,$action_submit_send);
        }

        if ($enfriamiento3_retro !== 0) {
            SolutionServiceEditRetro::update_solution_3_1_retro($request,$id_project,$action_submit_send);
            $funciones->update_results(3,$id_project,$action_submit_send);
        }

    }

    public function update_solution_1_1_retro(Request $request,$id_project,$action_submit_send){
        $funciones = new funciones();

        if($action_submit_send == 'store'){
            $solution_enf1=new SolutionsProjectModel;
        }else if($action_submit_send == 'update'){
            $id_solution_1_1 = SolutionsProjectModel::where('solutions_project.id_project','=',$id_project)
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

        $cap_tot_aux1_1_retro = $funciones->num_form($request->get('capacidad_total_1_1_retro'));
        $solution_enf1->capacidad_tot=floatval($cap_tot_aux1_1_retro);

        $solution_enf1->unid_med=$request->get('unidad_capacidad_tot_1_1_retro');
    //separa cadena
        $costo_elec_aux = $funciones->price_form($request->get('costo_elec_1_1_retro'));
        $solution_enf1->costo_elec=floatval($costo_elec_aux);
    //separa cadena
        $cooling_hours_aux = $funciones->num_form($request->get('hrsEnfriado_1_1_retro'));

        $solution_enf1->coolings_hours=intval($cooling_hours_aux);

        $solution_enf1->tipo_control=$request->get('tipo_control_1_1_retro');


        $solution_enf1->name_t_control=$request->get('name_t_control_1_1_retro');
        $solution_enf1->dr_name=$request->get('dr_name_1_1_retro');

        $solution_enf1->ventilacion_name=$request->get('ventilacion_name_1_1_retro');
        $solution_enf1->ventilacion	=$request->get('ventilacion_1_1_retro');
        $solution_enf1->filtracion_name=$request->get('filtracion_name_1_1_retro');
        $solution_enf1->filtracion	=$request->get('filtracion_1_1_retro');

        $solution_enf1->dr = $request->get('dr_1_1_retro');
        $solution_enf1->mantenimiento = $request->get('csMantenimiento_1_1_retro');

        if($request->get('costo_recu_1_1_retro') != null){

            $val_aprox_aux = $funciones->price_form($request->get('costo_recu_1_1_retro'));

        }else  if($request->get('costo_recu_1_1_retro') == null){
            $val_aprox_aux = 0;
        }

        if($request->get('maintenance_cost_1_1_retro') != null){
            $aux_cost_mant = $funciones->price_form($request->get('maintenance_cost_1_1_retro'));
        }else  if($request->get('maintenance_cost_1_1_retro') == null){
            $aux_cost_mant = 0;

        }

        if($request->get('const_an_rep_1_1') != null){
            $aux__cost_an_rep_1_1 = $funciones->price_form($request->get('const_an_rep_1_1'));
        }else  if($request->get('const_an_rep_1_1') == null){
            $aux__cost_an_rep_1_1 = 0;

        }

        $solution_enf1->tipo_ambiente=$request->get('tipo_ambiente_1_1_retro');
        $solution_enf1->proteccion_condensador=$request->get('proteccion_condensador_1_1_retro');
        $solution_enf1->proteccion_condensador_val=floatval($request->get('proteccion_condensador_1_1_retro_value'));

        $solution_enf1->val_aprox=floatval($val_aprox_aux);
        $solution_enf1->costo_mantenimiento=floatval($aux_cost_mant);
        $solution_enf1->cost_an_re=floatval($aux__cost_an_rep_1_1);
        $solution_enf1->status=1;
        $solution_enf1->id_empresa=Auth::user()->id_empresa;
        $solution_enf1->id_user=Auth::user()->id;

        $am =$solution_enf1->proteccion_condensador_val;
        $cooling_hrs =  $solution_enf1->coolings_hours;
        $cost_energ =  $solution_enf1->costo_elec;
        $eficiencia_cant = floatval($request->get('csStd_retro_1_1_cant'));
        $factor_s = $request->get('lblCsTipo_1_1_retro');
        $factor_d = floatval($request->get('csDisenio_1_1_retro'));
        $factor_c = $request->get('tipo_control_1_1_retro');
        $factor_t =floatval($request->get('dr_1_1_retro'));
        $factor_m =$request->get('csMantenimiento_1_1_retro');
        $factor_v =floatval($request->get('ventilacion_1_1_retro'));
        $factor_f =floatval($request->get('filtracion_1_1_retro'));
        $t_e = $solution_enf1->tipo_equipo;
        $eficiencia_ene = $solution_enf1->eficencia_ene;
        $yrs_l = $solution_enf1->yrs_vida;
        $unidad_hvac_aux = $solution_enf1->unidad_hvac;
    if ($solution_enf1->unid_med == 'TR') {

        $tr = $solution_enf1->capacidad_tot;
        $res_1_1_retro = $funciones->cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux,$factor_v,$factor_f,$am);
        $solution_enf1->cost_op_an =  floatval(number_format($res_1_1_retro,2, '.', ''));

    }else if($solution_enf1->unid_med == 'KW'){

        $kw = $solution_enf1->capacidad_tot;
        $res_1_1_retro = $funciones->cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux,$factor_v,$factor_f,$am);
        $solution_enf1->cost_op_an =  floatval(number_format($res_1_1_retro,2, '.', ''));

    }

    //niveles de confort
    $unidad_conf_1_1 = $solution_enf1->unidad_hvac;
    $equipo_conf_1_1 = $solution_enf1->tipo_equipo;
    $diseno_conf_1_1 = $solution_enf1->name_disenio;
    $t_control_conf_1_1 = $solution_enf1->name_t_control;
    $dr_conf_1_1 = $solution_enf1->dr_name;
    $mant_conf_1_1 = $solution_enf1->mantenimiento;
    $funciones = new funciones();
    $nivel_confotr_1_1_retro = $funciones->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
    $solution_enf1->confort = $nivel_confotr_1_1_retro;


        $solution_enf1->id_project = $id_project;


        if($action_submit_send == 'store'){
            $solution_enf1->save();
        }else if($action_submit_send == 'update'){
            $solution_enf1->update();
        }
    }

    public function update_solution_2_1_retro(Request $request,$id_project,$action_submit_send){
        $funciones = new funciones();

        if($action_submit_send == 'store'){
            $solution_enf_2_1_retro=new SolutionsProjectModel;
        }else if($action_submit_send == 'update'){
            $id_solution_2_1 = SolutionsProjectModel::where('solutions_project.id_project','=',$id_project)
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
        $cap_tot_aux2_1_retro = $funciones->num_form($request->get('capacidad_total_2_1_retro')); //
        $solution_enf_2_1_retro->capacidad_tot=floatval($cap_tot_aux2_1_retro);

        $solution_enf_2_1_retro->unid_med=$request->get('unidad_capacidad_tot_2_1_retro');
//separa cadena
        $costo_elec_aux = $funciones->price_form($request->get('costo_elec_2_1_retro'));
        $solution_enf_2_1_retro->costo_elec=floatval($costo_elec_aux);
//separa cadena
        $cooling_hours_aux = $funciones->num_form($request->get('hrsEnfriado_2_1_retro'));
        $solution_enf_2_1_retro->coolings_hours=intval($cooling_hours_aux);

        $solution_enf_2_1_retro->tipo_control=$request->get('tipo_control_2_1_retro');


        $solution_enf_2_1_retro->name_t_control=$request->get('name_t_control_2_1_retro');
        $solution_enf_2_1_retro->dr_name=$request->get('dr_name_2_1_retro');

        $solution_enf_2_1_retro->ventilacion_name=$request->get('ventilacion_name_2_1_retro');
        $solution_enf_2_1_retro->ventilacion=$request->get('ventilacion_2_1_retro');
        $solution_enf_2_1_retro->filtracion_name=$request->get('filtracion_name_2_1_retro');
        $solution_enf_2_1_retro->filtracion	=$request->get('filtracion_2_1_retro');

        $solution_enf_2_1_retro->dr = $request->get('dr_2_1_retro');
        $solution_enf_2_1_retro->mantenimiento = $request->get('csMantenimiento_2_1_retro');

        if($request->get('costo_recu_2_1_retro') != null){
            $val_aprox_aux = $funciones->price_form($request->get('costo_recu_2_1_retro'));
        }else  if($request->get('costo_recu_2_1_retro') == null){
            $val_aprox_aux = 0;
        }

        if($request->get('maintenance_cost_2_1_retro') != null){
             $aux_cost_mant = $funciones->price_form($request->get('maintenance_cost_2_1_retro'));
        }else  if($request->get('maintenance_cost_2_1_retro') == null){
            $aux_cost_mant = 0;

        }

        if($request->get('const_an_rep_2_1') != null){
            $aux__cost_an_rep_1_1 = $funciones->price_form($request->get('const_an_rep_2_1'));
        }else  if($request->get('const_an_rep_2_1') == null){
            $aux__cost_an_rep_1_1 = 0;

        }

        $solution_enf_2_1_retro->tipo_ambiente=$request->get('tipo_ambiente_2_1_retro');
        $solution_enf_2_1_retro->proteccion_condensador=$request->get('proteccion_condensador_2_1_retro');
        $solution_enf_2_1_retro->proteccion_condensador_val=floatval($request->get('proteccion_condensador_2_1_retro_value'));

        $solution_enf_2_1_retro->val_aprox=floatval($val_aprox_aux);
        $solution_enf_2_1_retro->costo_mantenimiento=floatval($aux_cost_mant);
        $solution_enf_2_1_retro->cost_an_re=floatval($aux__cost_an_rep_1_1);
        $solution_enf_2_1_retro->status=1;
        $solution_enf_2_1_retro->id_empresa=Auth::user()->id_empresa;
        $solution_enf_2_1_retro->id_user=Auth::user()->id;

        $am =$solution_enf_2_1_retro->proteccion_condensador_val;
        $cooling_hrs =  $solution_enf_2_1_retro->coolings_hours;
        $cost_energ =  $solution_enf_2_1_retro->costo_elec;
        $eficiencia_cant = floatval($request->get('csStd_cant_2_1_retro'));
        $factor_s = $request->get('lblCsTipo_2_1_retro');
        $factor_d = floatval($request->get('cheDisenio_2_1_retro'));
        $factor_c = $request->get('tipo_control_2_1_retro');
        $factor_t =floatval($request->get('dr_2_1_retro'));
        $factor_m =$request->get('csMantenimiento_2_1_retro');
        $factor_v =floatval($request->get('ventilacion_2_1_retro'));
        $factor_f =floatval($request->get('filtracion_2_1_retro'));
        $t_e = $solution_enf_2_1_retro->tipo_equipo;
        $eficiencia_ene = $solution_enf_2_1_retro->eficencia_ene;
        $yrs_l = $solution_enf_2_1_retro->yrs_vida;
        $unidad_hvac_aux = $solution_enf_2_1_retro->unidad_hvac;

       if ($solution_enf_2_1_retro->unid_med == 'TR') {
        $tr = $solution_enf_2_1_retro->capacidad_tot;
        $res_2_1_retro = $funciones->cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux,$factor_v,$factor_f,$am);
        $solution_enf_2_1_retro->cost_op_an =  floatval(number_format($res_2_1_retro,2, '.', ''));
    }else if($solution_enf_2_1_retro->unid_med == 'KW'){
        $kw = $solution_enf_2_1_retro->capacidad_tot;
        $res_2_1_retro = $funciones->cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux,$factor_v,$factor_f,$am);
        $solution_enf_2_1_retro->cost_op_an = floatval(number_format($res_2_1_retro,2, '.', ''));
    }

    //niveles de confort
    $unidad_conf_1_1 = $solution_enf_2_1_retro->unidad_hvac;
    $equipo_conf_1_1 = $solution_enf_2_1_retro->tipo_equipo;
    $diseno_conf_1_1 = $solution_enf_2_1_retro->name_disenio;
    $t_control_conf_1_1 = $solution_enf_2_1_retro->name_t_control;
    $dr_conf_1_1 = $solution_enf_2_1_retro->dr_name;
    $mant_conf_1_1 = $solution_enf_2_1_retro->mantenimiento;

    $funciones = new funciones();
    $nivel_confotr_2_1_retro = $funciones->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
    $solution_enf_2_1_retro->confort = $nivel_confotr_2_1_retro;


        $solution_enf_2_1_retro->id_project = $id_project;


        if($action_submit_send == 'store'){
            $solution_enf_2_1_retro->save();
        }else if($action_submit_send == 'update'){
            $solution_enf_2_1_retro->update();
        }

    }


    public function update_solution_3_1_retro(Request $request,$id_project,$action_submit_send){
        $funciones = new funciones();

        if($action_submit_send == 'store'){
            $solution_enf_3_1_retro=new SolutionsProjectModel;
        }else if($action_submit_send == 'update'){
            $id_solution_3_1 = SolutionsProjectModel::where('solutions_project.id_project','=',$id_project)
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
        $cap_tot_aux3_1_retro = $funciones->num_form($request->get('capacidad_total_3_1_retro'));
        $solution_enf_3_1_retro->capacidad_tot=floatval($cap_tot_aux3_1_retro);
        $solution_enf_3_1_retro->unid_med=$request->get('unidad_capacidad_tot_3_1_retro');
//separa cadena
        $costo_elec_aux = $funciones->price_form($request->get('costo_elec_3_1_retro'));
        $solution_enf_3_1_retro->costo_elec=floatval($costo_elec_aux);
//separa cadena
        $cooling_hours_aux = $funciones->num_form($request->get('hrsEnfriado_3_1_retro'));
        $solution_enf_3_1_retro->coolings_hours=intval($cooling_hours_aux);

        $solution_enf_3_1_retro->tipo_control=$request->get('tipo_control_3_1_retro');


        $solution_enf_3_1_retro->name_t_control=$request->get('name_t_control_3_1_retro');
        $solution_enf_3_1_retro->dr_name=$request->get('dr_name_3_1_retro');

        $solution_enf_3_1_retro->ventilacion_name=$request->get('ventilacion_name_3_1_retro');
        $solution_enf_3_1_retro->ventilacion=$request->get('ventilacion_3_1_retro');
        $solution_enf_3_1_retro->filtracion_name=$request->get('filtracion_name_3_1_retro');
        $solution_enf_3_1_retro->filtracion	=$request->get('filtracion_3_1_retro');

        $solution_enf_3_1_retro->dr = $request->get('dr_3_1_retro');
        $solution_enf_3_1_retro->mantenimiento = $request->get('cheMantenimiento_3_1_retro');

        if($request->get('costo_recu_3_1_retro') != null){

            $val_aprox_aux = $funciones->price_form($request->get('costo_recu_3_1_retro'));

        }else  if($request->get('costo_recu_3_1_retro') == null){
            $val_aprox_aux = 0;
        }

        if($request->get('maintenance_cost_3_1_retro') != null){
            $aux_cost_mant = $funciones->price_form($request->get('maintenance_cost_3_1_retro'));


        }else  if($request->get('maintenance_cost_3_1_retro') == null){
            $aux_cost_mant = 0;

        }

        if($request->get('const_an_rep_3_1') != null){
            $aux__cost_an_rep_1_1 = $funciones->price_form($request->get('const_an_rep_3_1'));

        }else  if($request->get('const_an_rep_3_1') == null){
            $aux__cost_an_rep_1_1 = 0;

        }

        $solution_enf_3_1_retro->tipo_ambiente=$request->get('tipo_ambiente_3_1_retro');
        $solution_enf_3_1_retro->proteccion_condensador=$request->get('proteccion_condensador_3_1_retro');
        $solution_enf_3_1_retro->proteccion_condensador_val=floatval($request->get('proteccion_condensador_3_1_retro_value'));


        $solution_enf_3_1_retro->val_aprox=floatval($val_aprox_aux);
        $solution_enf_3_1_retro->costo_mantenimiento=floatval($aux_cost_mant);
        $solution_enf_3_1_retro->cost_an_re=floatval($aux__cost_an_rep_1_1);
        $solution_enf_3_1_retro->status=1;
        $solution_enf_3_1_retro->id_empresa=Auth::user()->id_empresa;
        $solution_enf_3_1_retro->id_user=Auth::user()->id;

        $am =$solution_enf_3_1_retro->proteccion_condensador_val;
        $cooling_hrs =  $solution_enf_3_1_retro->coolings_hours;
        $cost_energ =  $solution_enf_3_1_retro->costo_elec;
        $eficiencia_cant = floatval($request->get('csStd_cant_3_1_retro'));
        $factor_s = $request->get('lblCsTipo_3_1_retro');
        $factor_d = floatval($request->get('cheDisenio_3_1_retro'));
        $factor_c = $request->get('tipo_control_3_1_retro');
        $factor_t =floatval($request->get('dr_3_1_retro'));
        $factor_m =$request->get('cheMantenimiento_3_1_retro');
        $factor_v =floatval($request->get('ventilacion_3_1_retro'));
        $factor_f =floatval($request->get('filtracion_3_1_retro'));
        $t_e = $solution_enf_3_1_retro->tipo_equipo;
        $eficiencia_ene = $solution_enf_3_1_retro->eficencia_ene;
        $yrs_l = $solution_enf_3_1_retro->yrs_vida;
        $unidad_hvac_aux = $solution_enf_3_1_retro->unidad_hvac;
       if ($solution_enf_3_1_retro->unid_med == 'TR') {
            $tr = $solution_enf_3_1_retro->capacidad_tot;
            $res_3_1_retro = $funciones->cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux,$factor_v,$factor_f,$am);
            $solution_enf_3_1_retro->cost_op_an =  floatval(number_format($res_3_1_retro,2, '.', ''));
        }else if($solution_enf_3_1_retro->unid_med == 'KW'){
            $kw = $solution_enf_3_1_retro->capacidad_tot;
            $res_3_1_retro = $funciones->cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$unidad_hvac_aux,$factor_v,$factor_f,$am);
            $solution_enf_3_1_retro->cost_op_an = floatval(number_format($res_3_1_retro,2, '.', ''));
        }

    //niveles de confort
    $unidad_conf_1_1 = $solution_enf_3_1_retro->unidad_hvac;
    $equipo_conf_1_1 = $solution_enf_3_1_retro->tipo_equipo;
    $diseno_conf_1_1 = $solution_enf_3_1_retro->name_disenio;
    $t_control_conf_1_1 = $solution_enf_3_1_retro->name_t_control;
    $dr_conf_1_1 = $solution_enf_3_1_retro->dr_name;
    $mant_conf_1_1 = $solution_enf_3_1_retro->mantenimiento;

    $funciones = new funciones();
    $nivel_confotr_3_1_retro = $funciones->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
    $solution_enf_3_1_retro->confort = $nivel_confotr_3_1_retro;

    $solution_enf_3_1_retro->id_project = $id_project;

    if($action_submit_send == 'store'){
            $solution_enf_3_1_retro->save();
        }else if($action_submit_send == 'update'){
            $solution_enf_3_1_retro->update();
        }
    }

}
