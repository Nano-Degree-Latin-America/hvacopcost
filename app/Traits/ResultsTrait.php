<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Services\ProjectService;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;
use App\MarcasEmpresaModel;
use App\ModelosEmpresaModel;

trait  ResultsTrait{


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

     public function unidad_area($id){

        $proj = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first();
        $unidad_area = $proj->unidad;
         return $unidad_area;
    }

    public function red_hu_carb($yrs,$dif){

        $difx3 = $dif * $yrs;
        $difx3_div =  $difx3 * 0.0007087;
        return $difx3_div;
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

        return response()->json($marca);
    }


    public function store_new_marc($value){
        $new_marc = new MarcasEmpresaModel;
        $new_marc->marca = $value;
        $new_marc->id_empresa = Auth::user()->id_empresa;
        $new_marc->save();


        return $new_marc;
    }

    public function store_new_model($marca,$modelo,$eficiencia,$equipo,$eficiencia_cant){
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
                        $new_model->eficiencia_cantidad = $eficiencia_cant;
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
                        $new_model->id_marca = $new_marc->id;
                        if($eficiencia == 'IPLV'){
                            $new_model->eficiencia = 'IPLV (Kw/TR)';
                        }else{
                            $new_model->eficiencia = $eficiencia;
                        }
                        $new_model->eficiencia_cantidad = $eficiencia_cant;
                        $new_model->save();
                    }
                }
            }

        }


    }

    public function prim_buil_check($id){
        $proyect = DB::table('projects')
        ->where('projects.id','=',$id)
        ->first();

        return $proyect;
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


}
