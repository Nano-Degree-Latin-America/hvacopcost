<?php
namespace App\Services;

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
use App\MantenimientoProjectsModel;
use App\MantenimientoEquiposModel;
use App\TipoEdificioModel;
use App\TypeProjectModel;
use Illuminate\Support\Facades\Redirect;
use Excel;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Imports\TypeEdificio;
use App\Exports\CoolingCitiesExport;
use App\Traits\FormusTrait;
use App\Traits\ConfortTrait;
use App\Traits\SaveResultsTrait;

class SolutionServiceEdit
{
 use FormusTrait,ConfortTrait,SaveResultsTrait;
    public function solution_update_new(Request $request,$id_project){

        //guardar soluciones
        $type_p = intval($request->get('type_p'));
        $action_submit_send = $request->get('action_submit_send');
        $enfriamiento1 = intval($request->get('cUnidad_1_1'));
        $enfriamiento2 = intval($request->get('cUnidad_2_1'));
        $enfriamiento3 =intval($request->get('cUnidad_3_1'));

        if ($enfriamiento1 !== 0) {
            $sol_1_1 = intval($request->get('cUnidad_1_1'));
            $sol_1_2 = intval($request->get('cUnidad_1_2'));

            if ($sol_1_1 !== 0) {
                SolutionServiceEdit::update_solution_1_1($request,$id_project,$action_submit_send);
            }

            if ($sol_1_2 !== 0) {
                SolutionServiceEdit::update_solution_1_2($request,$id_project,$action_submit_send);
            }

            $this->update_results(1,$id_project,$action_submit_send);
        }


      if ($enfriamiento2 !== 0) {
          $sol_2_1 = intval($request->get('cUnidad_2_1'));
          $sol_2_2 = intval($request->get('cUnidad_2_2'));

          if ($sol_2_1 !== 0) {
                SolutionServiceEdit::update_solution_2_1($request,$id_project,$action_submit_send);
          }

          if ($sol_2_2 !== 0) {
                SolutionServiceEdit::update_solution_2_2($request,$id_project,$action_submit_send);
          }

              $this->update_results(2,$id_project,$action_submit_send);
        }



      if ($enfriamiento3 !== 0) {
            $sol_3_1 = intval($request->get('cUnidad_3_1'));
            $sol_3_2 = intval($request->get('cUnidad_3_2'));

            if ($sol_3_1 !== 0){
                    SolutionServiceEdit::update_solution_3_1($request,$id_project,$action_submit_send);
            }

            if ($sol_3_2 !== 0) {
                SolutionServiceEdit::update_solution_3_2($request,$id_project,$action_submit_send);
            }

            $this->update_results(3,$id_project,$action_submit_send);

        }

    }

    public function update_solution_1_1(Request $request,$id_project,$action_submit_send){
            if($action_submit_send == 'store'){
                $solution_enf1=new SolutionsProjectModel;
            }else if($action_submit_send == 'update'){
                $id_solution_1_1 = SolutionsProjectModel::where('solutions_project.id_project','=',$id_project)
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
            $solution_enf1->id_marca=$request->get('marca_1_1');
            $solution_enf1->id_modelo=$request->get('modelo_1_1');
            $solution_enf1->tipo_diseño	=$request->get('csDisenio_1_1');

            $cap_tot_aux = $this->num_form($request->get('capacidad_total')); //

            $solution_enf1->capacidad_tot=floatval($cap_tot_aux);
            $solution_enf1->unid_med=$request->get('unidad_capacidad_tot');
//separa cadena
            $costo_elec_aux = $this->price_form($request->get('costo_elec'));
            $solution_enf1->costo_elec=floatval($costo_elec_aux);
//separa cadena
            $cooling_hours_aux = $this->num_form($request->get('hrsEnfriado'));

            $solution_enf1->coolings_hours=intval($cooling_hours_aux);


            $solution_enf1->eficencia_ene=$request->get('csStd');
            $solution_enf1->eficencia_ene_cant=floatval($request->get('csStd_cant_1_1'));
            $solution_enf1->tipo_control=$request->get('tipo_control_1_1');

            $solution_enf1->name_disenio=$request->get('name_diseno_1_1');
            $solution_enf1->name_t_control=$request->get('name_t_control_1_1');
            $solution_enf1->dr_name=$request->get('dr_name_1_1');

            $solution_enf1->dr	=$request->get('dr_1_1');

            $solution_enf1->ventilacion_name=$request->get('ventilacion_name_1_1');
            $solution_enf1->ventilacion	=$request->get('ventilacion_1_1');
            $solution_enf1->filtracion_name=$request->get('filtracion_name_1_1');
            $solution_enf1->filtracion	=$request->get('filtracion_1_1');

            $solution_enf1->mantenimiento	=$request->get('csMantenimiento');

            if($request->get('cheValorS_1_1') != null){

                $val_aprox_aux = $this->price_form($request->get('cheValorS_1_1'));

            }else  if($request->get('cheValorS_1_1') == null){
                $val_aprox_aux = 0;
            }

            if($request->get('maintenance_cost_1_1') != null){
                $aux_cost_mant = $this->price_form($request->get('maintenance_cost_1_1'));


            }else  if($request->get('maintenance_cost_1_1') == null){
                $aux_cost_mant = 0;

            }

            $solution_enf1->tipo_ambiente=$request->get('tipo_ambiente_1_1');
            $solution_enf1->proteccion_condensador=$request->get('proteccion_condensador_1_1');
            $solution_enf1->proteccion_condensador_val=floatval($request->get('proteccion_condensador_1_1_value'));

            $solution_enf1->val_aprox=floatval( $val_aprox_aux);
            $solution_enf1->costo_mantenimiento=floatval($aux_cost_mant);
            $solution_enf1->status=1;
            $solution_enf1->id_empresa=Auth::user()->id_empresa;
            $solution_enf1->id_user=Auth::user()->id;

            $am =$solution_enf1->proteccion_condensador_val;
            $cooling_hrs =  $solution_enf1->coolings_hours;
            $cost_energ =  $solution_enf1->costo_elec;
            $eficiencia_cant = floatval($request->get('csStd_cant_1_1'));
            //vars_ forms
            $factor_s = $request->get('lblCsTipo_1_1');
            $factor_d = floatval($request->get('csDisenio_1_1'));
            $factor_c = $request->get('tipo_control_1_1');
            $factor_t =floatval($request->get('dr_1_1'));
            $factor_m =$request->get('csMantenimiento');
            $factor_v =floatval($request->get('ventilacion_1_1'));
            $factor_f =floatval($request->get('filtracion_1_1'));

            $t_e = $solution_enf1->tipo_equipo;
            $eficiencia_ene = $solution_enf1->eficencia_ene;
            $unidad_hvac_aux = $solution_enf1->unidad_hvac;

           if ($solution_enf1->unid_med == 'TR') {

           $tr = $solution_enf1->capacidad_tot;
           $res_1_1 = $this->cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
           $solution_enf1->cost_op_an = floatval(number_format($res_1_1,2, '.', ''));
        }else if($solution_enf1->unid_med == 'KW'){

           $kw = $solution_enf1->capacidad_tot;
           $res_1_1 = $this->cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
           $solution_enf1->cost_op_an = floatval(number_format($res_1_1,2, '.', ''));
        }

        //niveles de confort
        $unidad_conf_1_1 = $solution_enf1->unidad_hvac;
        $equipo_conf_1_1 = $solution_enf1->tipo_equipo;
        $diseno_conf_1_1 = $solution_enf1->name_disenio;
        $t_control_conf_1_1 = $solution_enf1->name_t_control;
        $dr_conf_1_1 = $solution_enf1->dr_name;
        $mant_conf_1_1 = $solution_enf1->mantenimiento;

        $nivel_confotr_1_1 = $this->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
        $solution_enf1->confort = $nivel_confotr_1_1;

        if($action_submit_send == 'store'){
                $solution_enf1->id_project = $id_project;
                $solution_enf1->save();
        }else if($action_submit_send == 'update'){

                $solution_enf1->id_project = $id_project;
                $solution_enf1->update();
        }
    }


    public function update_solution_1_2(Request $request,$id_project,$action_submit_send){

        $action_submit =  $request->get('action_submit_1_2');
                if($action_submit == 'store'){
                    $solution_enf1_2=new SolutionsProjectModel;
                }else if($action_submit == 'update'){
                    $id_solution_1_2 = DB::table('solutions_project')
                    ->where('solutions_project.id_project','=',$id_project)
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
                $solution_enf1_2->id_marca=$request->get('marca_1_2');
                $solution_enf1_2->id_modelo=$request->get('modelo_1_2');
                $solution_enf1_2->tipo_diseño	= $request->get('csDisenio_1_2');


                $cap_tot_aux_1_2 = $this->num_form($request->get('capacidad_total_1_2'));
                $solution_enf1_2->capacidad_tot =floatval($cap_tot_aux_1_2);

                $solution_enf1_2->unid_med = $request->get('unidad_capacidad_tot_1_2');

                $solution_enf1_2->name_disenio=$request->get('name_diseno_1_2');
                $solution_enf1_2->name_t_control=$request->get('name_t_control_1_2');
                $solution_enf1_2->dr_name=$request->get('dr_name_1_2');

                $solution_enf1_2->ventilacion_name=$request->get('ventilacion_name_1_2');
                $solution_enf1_2->ventilacion	=$request->get('ventilacion_1_2');
                $solution_enf1_2->filtracion_name=$request->get('filtracion_name_1_2');
                $solution_enf1_2->filtracion	=$request->get('filtracion_1_2');

                $costo_elec_aux = $this->price_form($request->get('costo_elec_1_2'));
                $solution_enf1_2->costo_elec = floatval($costo_elec_aux);

                $aux_cooling_hours_1_2 = $this->num_form($request->get('hrsEnfriado_1_2'));
                $solution_enf1_2->coolings_hours =intval($aux_cooling_hours_1_2);


                if($request->get('csStd_1_2') == null){
                    $solution_enf1_2->eficencia_ene=$request->get('csStd');
                 }

                  if($request->get('csStd_1_2') != null){
                    $solution_enf1_2->eficencia_ene = $request->get('csStd_1_2');
                  }


                $solution_enf1_2->eficencia_ene_cant = $request->get('csStd_cant_1_2');
                $solution_enf1_2->tipo_control = $request->get('tipo_control_1_2');

                $solution_enf1_2->dr = $request->get('dr_1_2');
                $solution_enf1_2->mantenimiento = $request->get('csMantenimiento_1_2');

                if($request->get('cheValorS_1_2') != null){
                    $val_aprox_aux_1_2 = $this->price_form($request->get('cheValorS_1_2'));
                }else  if($request->get('cheValorS_1_2') == null){
                    $val_aprox_aux_1_2 = 0;
                }

                if($request->get('maintenance_cost_1_2') != null){
                    $aux_cost_mant_1_2 = $this->price_form($request->get('maintenance_cost_1_2'));
                }else  if($request->get('maintenance_cost_1_2') == null){
                    $aux_cost_mant_1_2 = 0;

                }



                $solution_enf1_2->tipo_ambiente=$request->get('tipo_ambiente_1_2');
                $solution_enf1_2->proteccion_condensador=$request->get('proteccion_condensador_1_2');
                $solution_enf1_2->proteccion_condensador_val=floatval($request->get('proteccion_condensador_1_2_value'));

                $solution_enf1_2->costo_mantenimiento=floatval($aux_cost_mant_1_2);
                $solution_enf1_2->val_aprox = floatval($val_aprox_aux_1_2);
                $solution_enf1_2->status = 1;
                $solution_enf1_2->id_empresa=Auth::user()->id_empresa;
                $solution_enf1_2->id_user=Auth::user()->id;

                $am =$solution_enf1_2->proteccion_condensador_val;
                $cooling_hrs =  $solution_enf1_2->coolings_hours;
                $cost_energ =  $solution_enf1_2->costo_elec;
                $eficiencia_cant = $solution_enf1_2->eficencia_ene_cant;
                $factor_s = $request->get('lblCsTipo_1_2');
                $factor_d = floatval($request->get('csDisenio_1_2'));
                $factor_c = $request->get('tipo_control_1_2');
                $factor_t =floatval($request->get('dr_1_2'));
                $factor_m =$request->get('csMantenimiento_1_2');
                $factor_v =floatval($request->get('ventilacion_1_2'));
                $factor_f =floatval($request->get('filtracion_1_2'));

                $t_e = $solution_enf1_2->tipo_equipo;
                $eficiencia_ene = $solution_enf1_2->eficencia_ene;
                $unidad_hvac_aux = $solution_enf1_2->unidad_hvac;
               if ($solution_enf1_2->unid_med == 'TR') {
                $tr = $solution_enf1_2->capacidad_tot;
                $res_1_2 = $this->cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
                $solution_enf1_2->cost_op_an = floatval(number_format($res_1_2,2, '.', ''));
            }else if($solution_enf1_2->unid_med == 'KW'){
                //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                  $kw =  $solution_enf1_2->capacidad_tot;
                  $res_1_2 = $this->cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
                  $solution_enf1_2->cost_op_an =floatval(number_format($res_1_2,2, '.', ''));
                }

                //niveles de confort
            $unidad_conf_1_1 = $solution_enf1_2->unidad_hvac;
            $equipo_conf_1_1 = $solution_enf1_2->tipo_equipo;
            $diseno_conf_1_1 = $solution_enf1_2->name_disenio;
            $t_control_conf_1_1 = $solution_enf1_2->name_t_control;
            $dr_conf_1_1 = $solution_enf1_2->dr_name;
            $mant_conf_1_1 = $solution_enf1_2->mantenimiento;


            $nivel_confotr_1_2 = $this->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
            $solution_enf1_2->confort = $nivel_confotr_1_2;



                if($action_submit == 'store'){
                        $solution_enf1_2->id_project = $id_project;
                        $solution_enf1_2->save();
                }else if($action_submit == 'update'){
                        $solution_enf1_2->id_project = $id_project;
                        $solution_enf1_2->update();
                }


}

public function update_solution_2_1(Request $request,$id_project,$action_submit_send){



    $action_submit =  $request->get('action_submit_2_1');
    if($action_submit == 'store'){
        $solution_enf2_1=new SolutionsProjectModel;
    }else if($action_submit == 'update'){
        $id_solution_2_1 = SolutionsProjectModel::where('solutions_project.id_project','=',$id_project)
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
    $solution_enf2_1->id_marca=$request->get('marca_2_1');
    $solution_enf2_1->id_modelo=$request->get('modelo_2_1');
    $solution_enf2_1->tipo_diseño	=$request->get('cheDisenio_2_1');

    $cap_tot_aux_2_1 = $this->num_form($request->get('capacidad_total_2_1'));
    $solution_enf2_1->capacidad_tot=floatval($cap_tot_aux_2_1);
    $solution_enf2_1->unid_med=$request->get('unidad_capacidad_tot_2_1');

    $solution_enf2_1->name_disenio=$request->get('name_diseno_2_1');
    $solution_enf2_1->name_t_control=$request->get('name_t_control_2_1');
    $solution_enf2_1->dr_name=$request->get('dr_name_2_1');

    $costo_elec_aux_2_1 = $this->price_form($request->get('costo_elec_2_1'));
    $solution_enf2_1->costo_elec=floatval($costo_elec_aux_2_1);

    $aux_cooling_hours_2_1 = $this->num_form($request->get('hrsEnfriado_2_1'));
    $solution_enf2_1->coolings_hours=intval($aux_cooling_hours_2_1);
    if($request->get('csStd_2_1') == null){
        $solution_enf2_1->eficencia_ene=$request->get('csStd');
    }

    if($request->get('csStd_2_1') != null){
        $solution_enf2_1->eficencia_ene=$request->get('csStd_2_1');
    }


    $solution_enf2_1->eficencia_ene_cant=floatval($request->get('csStd_cant_2_1'));
    $solution_enf2_1->tipo_control=$request->get('tipo_control_2_1');

    $solution_enf2_1->dr=$request->get('dr_2_1');

    $solution_enf2_1->ventilacion_name=$request->get('ventilacion_name_2_1');
    $solution_enf2_1->ventilacion	=$request->get('ventilacion_2_1');
    $solution_enf2_1->filtracion_name=$request->get('filtracion_name_2_1');
    $solution_enf2_1->filtracion	=$request->get('filtracion_2_1');

    $solution_enf2_1->mantenimiento	=$request->get('csMantenimiento_2_1');


    if($request->get('cheValorS_2_1') != null){
        $val_aprox_aux_2_1 = $this->price_form($request->get('cheValorS_2_1'));
    }else  if($request->get('cheValorS_2_1') == null){
            $val_aprox_aux_2_1 = 0;
    }

    if($request->get('maintenance_cost_2_1') != null){
        $aux_cost_mant_2_1 = $this->price_form($request->get('maintenance_cost_2_1'));

    }else  if($request->get('maintenance_cost_2_1') == null){
        $aux_cost_mant_2_1 = 0;
    }

    $solution_enf2_1->tipo_ambiente=$request->get('tipo_ambiente_2_1');
    $solution_enf2_1->proteccion_condensador=$request->get('proteccion_condensador_2_1');
    $solution_enf2_1->proteccion_condensador_val=floatval($request->get('proteccion_condensador_2_1_value'));


    $solution_enf2_1->val_aprox	=floatval($val_aprox_aux_2_1);
    $solution_enf2_1->costo_mantenimiento=floatval($aux_cost_mant_2_1);
    $solution_enf2_1->status=1;
    $solution_enf2_1->id_empresa=Auth::user()->id_empresa;
    $solution_enf2_1->id_user=Auth::user()->id;

    $am =$solution_enf2_1->proteccion_condensador_val;
    $cooling_hrs =  $solution_enf2_1->coolings_hours;
    $cost_energ =  $solution_enf2_1->costo_elec;
    $eficiencia_cant = floatval($request->get('csStd_cant_2_1'));
    $factor_s = $request->get('lblCsTipo_2_1');
    $factor_d = floatval($request->get('cheDisenio_2_1'));
    $factor_c = floatval($request->get('tipo_control_2_1'));
    $factor_t =floatval($request->get('dr_2_1'));
    $factor_m =$request->get('csMantenimiento_2_1');
    $factor_v =floatval($request->get('ventilacion_2_1'));
    $factor_f =floatval($request->get('filtracion_2_1'));
    $t_e = $solution_enf2_1->tipo_equipo;
    $eficiencia_ene = $solution_enf2_1->eficencia_ene;
    $unidad_hvac_aux = $solution_enf2_1->unidad_hvac;
   if ($solution_enf2_1->unid_med == 'TR') {
        $tr = $solution_enf2_1->capacidad_tot;
        $res_2_1 =$this->cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
        $solution_enf2_1->cost_op_an =  floatval(number_format($res_2_1,2, '.', ''));
    }else if($solution_enf2_1->unid_med == 'KW'){
         //(((Kw / 3.5)
         $kw =  $solution_enf2_1->capacidad_tot;
         $res_2_1 = $this->cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
         $solution_enf2_1->cost_op_an =floatval(number_format($res_2_1,2, '.', ''));
        }

         //niveles de confort
        $unidad_conf_1_1 = $solution_enf2_1->unidad_hvac;
        $equipo_conf_1_1 = $solution_enf2_1->tipo_equipo;
        $diseno_conf_1_1 = $solution_enf2_1->name_disenio;
        $t_control_conf_1_1 = $solution_enf2_1->name_t_control;
        $dr_conf_1_1 = $solution_enf2_1->dr_name;
        $mant_conf_1_1 = $solution_enf2_1->mantenimiento;


        $nivel_confotr_2_1 = $this->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
        $solution_enf2_1->confort = $nivel_confotr_2_1;

        if($action_submit == 'store'){
                $solution_enf2_1->id_project = $id_project;
                $solution_enf2_1->save();
        }else if($action_submit == 'update'){
                $solution_enf2_1->id_project = $id_project;
                $solution_enf2_1->update();
        }
}

    public function update_solution_2_2(Request $request,$id_project,$action_submit_send){


        $action_submit =  $request->get('action_submit_2_2');

        if($action_submit == 'store'){
            $solution_enf2_2=new SolutionsProjectModel;
        }else if($action_submit == 'update'){
            $id_solution_2_2 = SolutionsProjectModel::where('solutions_project.id_project','=',$id_project)
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
        $solution_enf2_2->id_marca=$request->get('marca_2_2');
        $solution_enf2_2->id_modelo=$request->get('modelo_2_2');
        $solution_enf2_2->tipo_diseño = $request->get('cheDisenio_2_2');

        $cap_tot_aux_2_2 = $this->num_form($request->get('capacidad_total_2_2'));
        $solution_enf2_2->capacidad_tot = floatval($cap_tot_aux_2_2);

        $solution_enf2_2->unid_med = $request->get('unidad_capacidad_tot_2_2');

        $solution_enf2_2->name_disenio=$request->get('name_diseno_2_2');
        $solution_enf2_2->name_t_control=$request->get('name_t_control_2_2');
        $solution_enf2_2->dr_name=$request->get('dr_name_2_2');

        $costo_elec_aux_2_2 = $this->price_form($request->get('costo_elec_2_2'));
        $solution_enf2_2->costo_elec = floatval($costo_elec_aux_2_2);

        $aux_cooling_hours_2_2 = $this->num_form($request->get('hrsEnfriado_2_2'));
        $solution_enf2_2->coolings_hours = intval($aux_cooling_hours_2_2);


        if($request->get('csStd_2_2') == null){
            $solution_enf2_2->eficencia_ene=$request->get('csStd');
         }

          if($request->get('csStd_2_2') != null){
            $solution_enf2_2->eficencia_ene = $request->get('csStd_2_2');
          }


        $solution_enf2_2->eficencia_ene_cant = floatval($request->get('csStd_cant_2_2'));
        $solution_enf2_2->tipo_control = $request->get('tipo_control_2_2');

        $solution_enf2_2->dr = $request->get('dr_2_2');

        $solution_enf2_2->ventilacion_name=$request->get('ventilacion_name_2_2');
        $solution_enf2_2->ventilacion	=$request->get('ventilacion_2_2');
        $solution_enf2_2->filtracion_name=$request->get('filtracion_name_2_2');
        $solution_enf2_2->filtracion	=$request->get('filtracion_2_2');

        $solution_enf2_2->mantenimiento = $request->get('cheMantenimiento_2_2');

        if($request->get('cheValorS_2_2') != null){
             $val_aprox_aux_2_2 = $this->price_form($request->get('cheValorS_2_2'));
        }else  if($request->get('cheValorS_2_2') == null){
                $val_aprox_aux_2_2 = 0;
        }

        if($request->get('maintenance_cost_2_2') != null){
             $aux_cost_mant_2_2 = $this->price_form($request->get('maintenance_cost_2_2'));
        }else  if($request->get('maintenance_cost_2_2') == null){
            $aux_cost_mant_2_2 = 0;

        }
        $solution_enf2_2->costo_mantenimiento=floatval($aux_cost_mant_2_2);

        $solution_enf2_2->tipo_ambiente=$request->get('tipo_ambiente_2_2');
        $solution_enf2_2->proteccion_condensador=$request->get('proteccion_condensador_2_2');
        $solution_enf2_2->proteccion_condensador_val=floatval($request->get('proteccion_condensador_2_2_value'));

        $solution_enf2_2->val_aprox = floatval($val_aprox_aux_2_2);
        $solution_enf2_2->status = 1;
        $solution_enf2_2->id_empresa=Auth::user()->id_empresa;
        $solution_enf2_2->id_user=Auth::user()->id;

        $am =$solution_enf2_2->proteccion_condensador_val;
        $cooling_hrs =  $solution_enf2_2->coolings_hours;
        $cost_energ =  $solution_enf2_2->costo_elec;
        $eficiencia_cant = $solution_enf2_2->eficencia_ene_cant;
        $factor_s = $request->get('lblCsTipo_2_2');
        $factor_d = floatval($request->get('cheDisenio_2_2'));
        $factor_c = $request->get('tipo_control_2_2');
        $factor_t =floatval($request->get('dr_2_2'));
        $factor_m = $request->get('cheMantenimiento_2_2');
        $factor_v =floatval($request->get('ventilacion_2_2'));
        $factor_f =floatval($request->get('filtracion_2_2'));
        $t_e = $solution_enf2_2->tipo_equipo;
        $eficiencia_ene = $solution_enf2_2->eficencia_ene;
        $unidad_hvac_aux = $solution_enf2_2->unidad_hvac;
       if ($solution_enf2_2->unid_med == 'TR') {
        $tr = $solution_enf2_2->capacidad_tot;
        $res_2_2 = $this->cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
        $solution_enf2_2->cost_op_an =  floatval(number_format($res_2_2,2, '.', ''));
    }else if($solution_enf2_2->unid_med == 'KW'){
        $kw =  $solution_enf2_2->capacidad_tot;
        $res_2_2 = $this->cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
        $solution_enf2_2->cost_op_an =floatval(number_format($res_2_2,2, '.', ''));
    }


                              //niveles de confort
    $unidad_conf_1_1 = $solution_enf2_2->unidad_hvac;
    $equipo_conf_1_1 = $solution_enf2_2->tipo_equipo;
    $diseno_conf_1_1 = $solution_enf2_2->name_disenio;
    $t_control_conf_1_1 = $solution_enf2_2->name_t_control;
    $dr_conf_1_1 = $solution_enf2_2->dr_name;
    $mant_conf_1_1 = $solution_enf2_2->mantenimiento;

    $nivel_confotr_2_2 = $this->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
    $solution_enf2_2->confort = $nivel_confotr_2_2;



    if($action_submit == 'store'){
            $solution_enf2_2->id_project = $id_project;
            $solution_enf2_2->save();
    }else if($action_submit == 'update'){
            $solution_enf2_2->id_project = $id_project;
            $solution_enf2_2->update();
    }

}

public function update_solution_3_1(Request $request,$id_project,$action_submit_send){


    $action_submit =  $request->get('action_submit_3_1');
                if($action_submit == 'store'){
                    $solution_enf3_1=new SolutionsProjectModel;
                }else if($action_submit == 'update'){
                    $id_solution_3_1 = SolutionsProjectModel::where('solutions_project.id_project','=',$id_project)
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
                 $solution_enf3_1->id_marca=$request->get('marca_3_1');
                 $solution_enf3_1->id_modelo=$request->get('modelo_3_1');
                 $solution_enf3_1->tipo_diseño	=$request->get('cheDisenio_3_1');

                 $cap_tot_aux_3_1 = $this->num_form($request->get('capacidad_total_3_1'));
                 $solution_enf3_1->capacidad_tot=floatval($cap_tot_aux_3_1);
                 $solution_enf3_1->unid_med=$request->get('unidad_capacidad_tot_3_1');

                 $solution_enf3_1->name_disenio=$request->get('name_diseno_3_1');
                 $solution_enf3_1->name_t_control=$request->get('name_t_control_3_1');
                 $solution_enf3_1->dr_name=$request->get('dr_name_3_1');

                 $costo_elec_aux_3_1 = $this->price_form($request->get('costo_elec_3_1'));
                 $solution_enf3_1->costo_elec=floatval($costo_elec_aux_3_1);

                 $aux_cooling_hours_3_1 = $this->num_form($request->get('hrsEnfriado_3_1'));

                 $solution_enf3_1->coolings_hours=intval($aux_cooling_hours_3_1);

                 if($request->get('csStd2_3_1') == null){
                    $solution_enf3_1->eficencia_ene=$request->get('csStd');
                 }

                  if($request->get('csStd2_3_1') != null){
                        $solution_enf3_1->eficencia_ene=$request->get('csStd2_3_1');
                  }


                 $solution_enf3_1->eficencia_ene_cant=floatval($request->get('cheStd_3_1'));
                 $solution_enf3_1->tipo_control=$request->get('tipo_control_3_1');

                 $solution_enf3_1->dr=$request->get('dr_3_1');

                 $solution_enf3_1->ventilacion_name=$request->get('ventilacion_name_3_1');
                 $solution_enf3_1->ventilacion	=$request->get('ventilacion_3_1');
                 $solution_enf3_1->filtracion_name=$request->get('filtracion_name_3_1');
                 $solution_enf3_1->filtracion	=$request->get('filtracion_3_1');

                 $solution_enf3_1->mantenimiento=$request->get('cheMantenimiento_3_1');

                 if($request->get('cheValorS_3_1') != null){
                    $val_aprox_aux_3_1 = $this->price_form($request->get('cheValorS_3_1'));
                }else  if($request->get('cheValorS_3_1') == null){
                        $val_aprox_aux_3_1 = 0;
                }

                if($request->get('maintenance_cost_3_1') != null){
                    $aux_cost_mant_3_1 = $this->price_form($request->get('maintenance_cost_3_1'));

                }else  if($request->get('maintenance_cost_3_1') == null){
                    $aux_cost_mant_3_1 = 0;
                }


                 $solution_enf3_1->tipo_ambiente=$request->get('tipo_ambiente_3_1');
                 $solution_enf3_1->proteccion_condensador=$request->get('proteccion_condensador_3_1');
                 $solution_enf3_1->proteccion_condensador_val=floatval($request->get('proteccion_condensador_3_1_value'));

                 $solution_enf3_1->val_aprox=floatval($val_aprox_aux_3_1);
                 $solution_enf3_1->costo_mantenimiento=floatval($aux_cost_mant_3_1);
                 $solution_enf3_1->status=1;
                 $solution_enf3_1->id_empresa=Auth::user()->id_empresa;
                 $solution_enf3_1->id_user=Auth::user()->id;

                 $am =$solution_enf3_1->proteccion_condensador_val;
                 $cooling_hrs =  $solution_enf3_1->coolings_hours;
                 $cost_energ =  $solution_enf3_1->costo_elec;
                 $eficiencia_cant = floatval($request->get('cheStd_3_1'));
                 $factor_s = $request->get('lblCsTipo_3_1');
                 $factor_d = floatval($request->get('cheDisenio_3_1'));
                 $factor_c = $request->get('tipo_control_3_1');
                 $factor_t =floatval($request->get('dr_3_1'));
                 $factor_m =$request->get('cheMantenimiento_3_1');
                 $factor_v =floatval($request->get('ventilacion_3_1'));
                 $factor_f =floatval($request->get('filtracion_3_1'));
                 $t_e = $solution_enf3_1->tipo_equipo;
                 $eficiencia_ene = $solution_enf3_1->eficencia_ene;
                 $unidad_hvac_aux = $solution_enf3_1->unidad_hvac;
                if ($solution_enf3_1->unid_med == 'TR') {
                    $tr = $solution_enf3_1->capacidad_tot;
                    $res_3_1 =$this->cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
                    $solution_enf3_1->cost_op_an =  floatval(number_format($res_3_1,2, '.', ''));
             }else if($solution_enf3_1->unid_med == 'KW'){
                $kw =  $solution_enf3_1->capacidad_tot;
                $res_3_1 = $this->cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
                $solution_enf3_1->cost_op_an =floatval(number_format($res_3_1,2, '.', ''));
             }
             //confort
             $unidad_conf_1_1 = $solution_enf3_1->unidad_hvac;
             $equipo_conf_1_1 = $solution_enf3_1->tipo_equipo;
             $diseno_conf_1_1 = $solution_enf3_1->name_disenio;
             $t_control_conf_1_1 = $solution_enf3_1->name_t_control;
             $dr_conf_1_1 = $solution_enf3_1->dr_name;
             $mant_conf_1_1 = $solution_enf3_1->mantenimiento;


             $nivel_confotr_3_1 = $this->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
             $solution_enf3_1->confort = $nivel_confotr_3_1;



             if($action_submit == 'store'){
                    $solution_enf3_1->id_project = $id_project;
                    $solution_enf3_1->save();
            }else if($action_submit == 'update'){
                    $solution_enf3_1->id_project = $id_project;
                    $solution_enf3_1->update();
            }

}


public function update_solution_3_2(Request $request,$id_project,$action_submit_send){

    $action_submit =  $request->get('action_submit_3_2');

                if($action_submit == 'store'){
                    $solution_enf3_2=new SolutionsProjectModel;
                }else if($action_submit == 'update'){
                    $id_solution_3_2 = SolutionsProjectModel::where('solutions_project.id_project','=',$id_project)
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
                $solution_enf3_2->id_marca=$request->get('marca_3_2');
                $solution_enf3_2->id_modelo=$request->get('modelo_3_2');
                $solution_enf3_2->tipo_diseño = $request->get('cheDisenio_3_2');

                $cap_tot_aux_3_2 = $this->num_form($request->get('capacidad_total_3_2'));
                $solution_enf3_2->capacidad_tot = floatval($cap_tot_aux_3_2);
                $solution_enf3_2->unid_med = $request->get('unidad_capacidad_tot_3_2');

                $solution_enf3_2->name_disenio=$request->get('name_diseno_3_2');
                $solution_enf3_2->name_t_control=$request->get('name_t_control_3_2');
                $solution_enf3_2->dr_name=$request->get('dr_name_3_2');


                $costo_elec_aux_3_2 = $this->price_form($request->get('costo_elec_3_2'));
                $solution_enf3_2->costo_elec = floatval($costo_elec_aux_3_2);

                $aux_cooling_hours_3_2 = $this->num_form($request->get('hrsEnfriado_3_2'));
                $solution_enf3_2->coolings_hours = intval($aux_cooling_hours_3_2);

                if($request->get('csStd_3_2') == null){
                    $solution_enf3_2->eficencia_ene=$request->get('csStd');
                 }

                  if($request->get('csStd_3_2') != null){
                    $solution_enf3_2->eficencia_ene = $request->get('csStd_3_2');
                  }

                $solution_enf3_2->eficencia_ene_cant =floatval($request->get('csStd_cant_3_2'));
                $solution_enf3_2->tipo_control = $request->get('tipo_control_3_2');

                $solution_enf3_2->dr = $request->get('dr_3_2');

                $solution_enf3_2->ventilacion_name=$request->get('ventilacion_name_3_2');
                $solution_enf3_2->ventilacion	=$request->get('ventilacion_3_2');
                $solution_enf3_2->filtracion_name=$request->get('filtracion_name_3_2');
                $solution_enf3_2->filtracion	=$request->get('filtracion_3_2');

                $solution_enf3_2->mantenimiento = $request->get('cheMantenimiento_3_2');

                if($request->get('cheValorS2_3_2') != null){
                   $val_aprox_aux_3_2 = $this->price_form($request->get('cheValorS2_3_2'));
               }else  if($request->get('cheValorS2_3_2') == null){
                       $val_aprox_aux_3_2 = 0;
               }


               if($request->get('maintenance_cost_3_2') != null){
                $aux_cost_mant_3_2 = $this->price_form($request->get('maintenance_cost_3_2'));
            }else  if($request->get('maintenance_cost_3_2') == null){
                $aux_cost_mant_3_2 = 0;

            }

                $solution_enf3_2->tipo_ambiente=$request->get('tipo_ambiente_3_2');
                $solution_enf3_2->proteccion_condensador=$request->get('proteccion_condensador_3_2');
                $solution_enf3_2->proteccion_condensador_val=floatval($request->get('proteccion_condensador_3_2_value'));

                $solution_enf3_2->costo_mantenimiento=floatval($aux_cost_mant_3_2);
                $solution_enf3_2->val_aprox = floatval($val_aprox_aux_3_2);
                $solution_enf3_2->status = 1;
                $solution_enf3_2->id_empresa=Auth::user()->id_empresa;
                $solution_enf3_2->id_user=Auth::user()->id;

                $am =$solution_enf3_2->proteccion_condensador_val;
                $cooling_hrs =  $solution_enf3_2->coolings_hours;
                $cost_energ =  $solution_enf3_2->costo_elec;
                $eficiencia_cant = $solution_enf3_2->eficencia_ene_cant;
                $factor_s = $request->get('lblCsTipo_3_2');
                $factor_d = floatval($request->get('cheDisenio_3_2'));
                $factor_c = $request->get('tipo_control_3_2');
                $factor_t =floatval($request->get('dr_3_2'));
                $factor_m = $request->get('cheMantenimiento_3_2');
                $factor_v =floatval($request->get('ventilacion_3_2'));
                $factor_f =floatval($request->get('filtracion_3_2'));
                $t_e = $solution_enf3_2->tipo_equipo;
                $eficiencia_ene = $solution_enf3_2->eficencia_ene;
                $unidad_hvac_aux = $solution_enf3_2->unidad_hvac;
               if ($solution_enf3_2->unid_med == 'TR') {
                $tr = $solution_enf3_2->capacidad_tot;
                $res_3_2 = $this->cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
                $solution_enf3_2->cost_op_an =  floatval(number_format($res_3_2,2, '.', ''));
            }else if($solution_enf3_2->unid_med == 'KW'){
               $kw =  $solution_enf3_2->capacidad_tot;
               $res_3_2 = $this->cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$unidad_hvac_aux,$factor_v,$factor_f,$am);
               $solution_enf3_2->cost_op_an =floatval(number_format($res_3_2,2, '.', ''));
            }

            //confort
            $unidad_conf_1_1 = $solution_enf3_2->unidad_hvac;
            $equipo_conf_1_1 = $solution_enf3_2->tipo_equipo;
            $diseno_conf_1_1 = $solution_enf3_2->name_disenio;
            $t_control_conf_1_1 = $solution_enf3_2->name_t_control;
            $dr_conf_1_1 = $solution_enf3_2->dr_name;
            $mant_conf_1_1 = $solution_enf3_2->mantenimiento;


            $nivel_confotr_3_2 = $this->calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1);
            $solution_enf3_2->confort = $nivel_confotr_3_2;

            if($action_submit == 'store'){
                    $solution_enf3_2->id_project = $id_project;
                    $solution_enf3_2->save();
            }else if($action_submit == 'update'){
                    $solution_enf3_2->id_project = $id_project;
                    $solution_enf3_2->update();
            }
}


/*

*/

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

    public function clean_project($id_project){
        $clean_project = ProjectsModel::find($id_project);
        $clean_project->name = null;
        $clean_project->n_empleados = null;
        $clean_project->sal_an_prom = null;
        $clean_project->inflacion = null;
        $clean_project->inflacion_rate = null;
        $clean_project->hrs_tiempo = null;
        $clean_project->update();
        if($clean_project->update()){
            return true;
        }
    }

    public function save_new_project_mantainance($request,$id_project){

        $calculoMantenimientoService = new CalculoMantenimientoService();
        $update_project= ProjectsModel::find($id_project);
        $aux_porcent = explode("%", $request->values['porcent_hvac_mantenimiento']);

        if(count($aux_porcent) == 2){
            $update_project->porcent_hvac=intval($aux_porcent[0]);
        }else{
            $update_project->porcent_hvac=10;
        }
        $update_project->status=1;
        $update_project->id_empresa=Auth::user()->id_empresa;
        $update_project->id_user=Auth::user()->id;

        if($request->values['type_p'] == 3){
            $update_project->type_p= $request->values['type_p'];

            $pais = DB::table('pais')
            ->where('pais.idPais','=',$request->values['paises_mantenimiento'])
            ->first()->pais;

            $ciudad = DB::table('ciudad')
            ->where('ciudad.idCiudad','=',$request->values['ciudades_mantenimiento'])
            ->first()->ciudad;

            $update_project->region=$pais;
            $update_project->ciudad=$ciudad;
            $update_project->id_tipo_edificio=$request->values['tipo_edificio_mantenimiento'];
            $update_project->id_cat_edifico=$request->values['cat_edi_mantenimiento'];
            $cap_tot_ar_mant =$this->num_form($request->values['ar_project_mantenimiento']);
            $update_project->area = floatval($cap_tot_ar_mant);
        }

        $update_project->update();
        if($update_project->update()){
            $mantenimiento =  $calculoMantenimientoService->new_calculo_mantenimiento_save($request,$update_project->id);
            return true;
        }
    }

    public function del_ventas_regis($id){

        $mantenimiento_projects = DB::table('mantenimiento_projects')
        ->where('mantenimiento_projects.id_project','=',$id)
        ->get();

        $mant_equipos = DB::table('mantenimiento_equipos')
        ->where('mantenimiento_equipos.id_project','=',$id)
        ->get();


        $delete_state = false;

        foreach($mantenimiento_projects as $mant){
            $mant=MantenimientoProjectsModel::find($mant->id);
            $mant->delete();
        }


        foreach($mant_equipos as $equipo){
            $mant=MantenimientoEquiposModel::find($equipo->id);
            $mant->delete();
        }

        $mant_proj_check = DB::table('mantenimiento_projects')
        ->where('mantenimiento_projects.id_project','=',$id)
        ->get();

        $mant_equipos = DB::table('mantenimiento_equipos')
        ->where('mantenimiento_equipos.id_project','=',$id)
        ->get();
        ///solutions check
        if (count($mant_proj_check)>0 && count($mant_equipos)>0){
            $delete_state = false;
            return $delete_state;
        }

        if (count($mant_proj_check)==0 && count($mant_equipos)==0){
            $delete_state = true;
            return $delete_state;
        }


    }
}
