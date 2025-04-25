<?php

namespace App\Http\Controllers;
use DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\ProjectsModel;
use App\Services\ProjectService;
use App\ResultsProjectModel;
use Illuminate\Http\Request;
use App\SolutionsProjectModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use funciones\funciones;
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
                    ->get();
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
                    ->get();
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
                ->get();
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
                    ->get();
                }
            }

            if($tipo_user == 3){
                return Redirect::to('/home');
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


    public function edit_project(Request $request,$id,ProjectService $projectService){

        $update_project = $projectService->udpate_project($request,$id);

        if($update_project->type_p == 1){
            return Redirect::to('/project/' . $id);
        }

        if($update_project->type_p == 2){
            return Redirect::to('/resultados_retrofit/' . $id);

        }

        if($update_project->type_p == 3){
            return Redirect::to('/edit_project/' . $id);
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


    public function cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$check_chiller,$factor_v,$factor_f,$am){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){
/*         return ProjectController::form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
 */        $funciones = new funciones();
            return $funciones->form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$factor_v,$factor_f,$am);
        }

/*         if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
           $funciones = new funciones();
                return $funciones->form_pn_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
        } */

    }

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

       $funciones = new funciones();
       $factor_m = $funciones->factor_m($t_e,$factor_m);
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

       $funciones = new funciones();
       $factor_m = $funciones->factor_m($t_e,$factor_m);
       $res_res_fact_m =  $res_res * $factor_m;

       return $res_res_fact_m;
    }

     public function cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$check_chiller,$factor_v,$factor_f,$am){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){
/*            return ProjectController::cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
 */           $funciones = new funciones();
              return $funciones->cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$factor_v,$factor_f,$am);
        }

/*         if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
            $funciones = new funciones();
            return $funciones->cost_op_an_form_kw_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        } */
     }

     public function cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$check_chiller,$factor_v,$factor_f,$am){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){
           $funciones = new funciones();
           return $funciones->form_proyect_no_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$factor_v,$factor_f,$am);
        }

        /* if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
            $funciones = new funciones();
            return $funciones->form_proyect_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        } */

    }





     public function cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$check_chiller,$factor_v,$factor_f,$am){
            $int_check_chiller = intval($check_chiller);

            if($int_check_chiller <= 7){
               $funciones = new funciones();
               return $funciones->form_proyect_retro_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$factor_v,$factor_f,$am);
            }

/*             if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
                $funciones = new funciones();
                return $funciones->form_proyect_retro_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
            } */

    }



    public function type_project($id_project){
        $type_proy = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_project)
        ->first();

        return $type_proy;
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

    public function verifica_solucion($num_disp,$num_sol,$id_project,$type){

        $check_exist = DB::table('solutions_project')
        ->where('id_project','=',$id_project)
        ->where('num_enf','=',$num_disp)
        ->where('num_sol','=',$num_sol)
        ->where('type_p','=',$type)
        ->first();


        if($check_exist){
            return 1;
        }else{
            return 2;
        }

    }

}
