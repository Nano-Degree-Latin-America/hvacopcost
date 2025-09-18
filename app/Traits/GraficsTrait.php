<?php

namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Services\ProjectService;
use App\SolutionsProjectModel;
use App\ProjectsModel;
use App\ResultsProjectModel;

trait  GraficsTrait{

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

            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_1,$prot_cond_1);

            $res_enf_base = ($suma_enf_base/$yrs_life_activo)*(1/$area);

            //$res_enf_base =  $suma_enf_base/$area;

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


            //costo_mantenimiento / area solucoin base
            $suma_cost_mant_base_div_area = $rep_opex_base/$area;
            $res_opex_base = $suma_cost_mant_base_div_area;


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

            //$res_enf_a =  $suma_enf_a/$area;
            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_2,$prot_cond_2);

            $res_enf_a = ($suma_enf_a/$yrs_life_activo)*(1/$area);
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

            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_3,$prot_cond_3);

            $res_enf_b = ($suma_enf_b/$yrs_life_activo)*(1/$area);
            //$res_enf_b =  $suma_enf_b/$area;
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

            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_1,$prot_cond_1);

            $res_enf_base = ($suma_enf_base/$yrs_life_activo)*(3/$area);

            //$res_enf_base =  $suma_enf_base/$area;

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

            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_2,$prot_cond_2);

            $res_enf_a = ($suma_enf_a/$yrs_life_activo)*(3/$area);

            //$res_enf_a =  $suma_enf_a/$area;
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

            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_3,$prot_cond_3);

            $res_enf_b = ($suma_enf_b/$yrs_life_activo)*(3/$area);

            //$res_enf_b =  $suma_enf_b/$area;
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

            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
               $res_enf_base = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_1,$prot_cond_1);
               $res_enf_base = ($suma_enf_base/$yrs_life_activo)*(5/$area);
            }
            //$res_enf_base =  $suma_enf_base/$area;

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



            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
               $suma_enf_base_aux = 0;
            }else{
               for ($i = 2; $i <= 5; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
                }
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



                if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
                $res_opex_base = 0;
                }else{
                for ($i = 2; $i <= 5; $i++) {
                    $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                    $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
                }
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


            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
               $res_enf_a = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_2,$prot_cond_2);

               $res_enf_a = ($suma_enf_a/$yrs_life_activo)*(5/$area);
            }



            //$res_enf_a =  $suma_enf_a/$area;
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

            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
               $suma_enf_a_aux = 0;
             }else{
               for ($i = 2; $i <= 5; $i++) {
                $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
               }
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



                if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
                    $res_opex_a = 0;
                }else{
                    for ($i = 2; $i <= 5; $i++) {
                        $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                        $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
                    }
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


            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
               $res_enf_b = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_3,$prot_cond_3);

               $res_enf_b = ($suma_enf_b/$yrs_life_activo)*(5/$area);
            }



            //$res_enf_b =  $suma_enf_b/$area;
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



            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
               $suma_enf_b_aux = 0;
            }else{
               for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
               }
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

           if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
               $res_opex_b = 0;
            }else{
               for ($i = 2; $i <= 5; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
                }
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

            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
               $res_enf_base = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_1,$prot_cond_1);
               $res_enf_base = ($suma_enf_base/$yrs_life_activo)*(10/$area);
            }

            //$res_enf_base =  $suma_enf_base/$area;

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



            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
               $suma_enf_base_aux = 0;
            }else{
               for ($i = 2; $i <= 10; $i++) {
                $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                $suma_enf_base_aux = $suma_enf_base_aux + $res_opex_enf_base;
                }
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


            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
               $res_opex_base = 0;
            }else{
               for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
               }
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

            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
               $res_enf_a = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_2,$prot_cond_2);
               $res_enf_a = ($suma_enf_a/$yrs_life_activo)*(10/$area);
            }

            //$res_enf_a =  $suma_enf_a/$area;
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

              if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
               $suma_enf_a_aux = 0;
              }else{
                for ($i = 2; $i <= 10; $i++) {
                    $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                    $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                }
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



               if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
                    $res_opex_a = 0;
                }else{
                    for ($i = 2; $i <= 10; $i++) {
                        $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                        $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
                    }
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

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
               $res_enf_b = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_3,$prot_cond_3);
               $res_enf_b = ($suma_enf_b/$yrs_life_activo)*(10/$area);
            }

            //$res_enf_b =  $suma_enf_b/$area;
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

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
               $suma_enf_b_aux = 0;
            }else{
               for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                }
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



           if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
               $res_opex_b = 0;
            }else{
               for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b +  $suma_cost_mant_b_div_area;
           }
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

            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_1,$prot_cond_1);
            //dd($yrs_life_activo);
            $res_enf_base = ($suma_enf_base/$yrs_life_activo)*(3/$area);
            //$res_enf_base =  $suma_enf_base/$area;

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

            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_2,$prot_cond_2);

            $res_enf_a = ($suma_enf_a/$yrs_life_activo)*(3/$area);
            //$res_enf_a =  $suma_enf_a/$area;
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

            $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_3,$prot_cond_3);

            $res_enf_b = ($suma_enf_b/$yrs_life_activo)*(3/$area);
            //$res_enf_b =  $suma_enf_b/$area;
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

            //$res_enf_base =  $suma_enf_base/$area;

            //valida marino y sin  proteccion
            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
               $res_enf_base = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_1,$prot_cond_1);
               $res_enf_base = ($suma_enf_base/$yrs_life_activo)*(5/$area);
            }

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



            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
               $suma_enf_base_aux = 0;
            }else{
               for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
                }
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



           if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion'){
               $res_opex_base = 0;
            }else{
              for ($i = 2; $i <= 5; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
           }
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

            //valida marino y sin  proteccion
            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
               $res_enf_a = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_2,$prot_cond_2);
               $res_enf_a = ($suma_enf_a/$yrs_life_activo)*(5/$area);
            }


            //$res_enf_a =  $suma_enf_a/$area;
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


            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
               $suma_enf_a_aux = 0;
            }else{
               for ($i = 2; $i <= 5; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
                }
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



            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion'){
               $res_opex_a = 0;
            }else{
               for ($i = 2; $i <= 5; $i++) {
                 $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                 $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
                }
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

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
               $res_enf_b = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_3,$prot_cond_3);
               $res_enf_b = ($suma_enf_b/$yrs_life_activo)*(5/$area);
            }
            //dd($tipo_mant_3,$prot_cond_3);

            //$res_enf_b =  $suma_enf_b/$area;
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

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
               $suma_enf_b_aux = 0;
            }else{
              for ($i = 2; $i <= 5; $i++) {
                $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
              }
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



            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion'){
               $res_opex_b = 0;
            }else{
              for ($i = 2; $i <= 5; $i++) {
                 $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                 $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
              }
            }

      /*       $total_opex_b = $suma_enf_b_aux + $res_opex_b; */



            array_push($array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));

           }
        }

        array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
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

             if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
               $res_enf_base = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_1,$prot_cond_1);
               $res_enf_base = ($suma_enf_base/$yrs_life_activo)*(10/$area);
            }

            //$res_enf_base =  $suma_enf_base/$area;
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

            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
               $suma_enf_base_aux = 0;
            }else{
               for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
               }
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



            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
               $res_opex_base = 0;
            }else{
               for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
            }
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

            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
               $res_enf_a = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_2,$prot_cond_2);
               $res_enf_a = ($suma_enf_a/$yrs_life_activo)*(10/$area);
            }
            //dd($res_enf_a);
            //$res_enf_a =  $suma_enf_a/$area;
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

             if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
               $suma_enf_a_aux = 0;
             }else{
               for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
               }
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



           if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
               $res_opex_a = 0;
             }else{
               for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
              }
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

            //$res_enf_b =  $suma_enf_b/$area;
            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
               $res_enf_b = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_3,$prot_cond_3);
               $res_enf_b = ($suma_enf_b/$yrs_life_activo)*(10/$area);
            }

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

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
               $suma_enf_b_aux = 0;
            }else{
               for ($i = 2; $i <= 10; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
                }
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

           if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
               $res_opex_b = 0;
            }else{
               for ($i = 2; $i <= 10; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
               }
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

            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion' ||  $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'liquido_coating_basico'){
               $res_enf_base = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_1,$prot_cond_1);
               $res_enf_base = ($suma_enf_base/$yrs_life_activo)*(15/$area);
            }

            //$res_enf_base =  $suma_enf_base/$area;
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



            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion' ||  $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'liquido_coating_basico'){
               $suma_enf_base_aux = 0;
            }else{
               for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_base = $res_opex_enf_base * $inflacion;
                 $suma_enf_base_aux = $suma_enf_base_aux +  $res_opex_enf_base;
              }
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

            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion' ||  $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'liquido_coating_basico'){
               $res_opex_base = 0;
            }else{
               for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_base_div_area = $suma_cost_mant_base_div_area * $inflacion_rate;
                $res_opex_base = $res_opex_base +  $suma_cost_mant_base_div_area;
               }
            }

            //$total_opex_base = $suma_enf_base_aux + $res_opex_base;
            if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'liquido_coating_basico' || $tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
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

            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion' ||  $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'liquido_coating_basico'){
               $res_enf_a = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_2,$prot_cond_2);
               $res_enf_a = ($suma_enf_a/$yrs_life_activo)*(15/$area);
            }


            //$res_enf_a =  $suma_enf_a/$area;
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

            if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion' ||  $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'liquido_coating_basico'){
               $suma_enf_a_aux = 0;
            }else{
               for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_a = $res_opex_enf_a * $inflacion;
                 $suma_enf_a_aux = $suma_enf_a_aux +  $res_opex_enf_a;
               }
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



           if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion' ||  $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'liquido_coating_basico'){
               $res_opex_a = 0;
             }else{
               for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_a_div_area = $suma_cost_mant_a_div_area * $inflacion_rate;
                $res_opex_a = $res_opex_a +  $suma_cost_mant_a_div_area;
             }
            }

           //$total_opex_a = $suma_enf_a_aux + $res_opex_a;
           if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'liquido_coating_basico' || $tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
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

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion' ||  $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'liquido_coating_basico'){
               $res_enf_b = 0;
            }else{
               $yrs_life_activo = $this->getYrsLifeActivo($tipo_mant_3,$prot_cond_3);
               $res_enf_b = ($suma_enf_b/$yrs_life_activo)*(15/$area);
            }


            //$res_enf_b =  $suma_enf_b/$area;
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

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion' ||  $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'liquido_coating_basico'){
               $suma_enf_b_aux = 0;
            }else{
               for ($i = 2; $i <= 15; $i++) {
                 $res_opex_enf_b = $res_opex_enf_b * $inflacion;
                 $suma_enf_b_aux = $suma_enf_b_aux +  $res_opex_enf_b;
              }
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



            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion' ||  $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'liquido_coating_basico'){
               $res_opex_b = 0;
            }else{
               for ($i = 2; $i <= 15; $i++) {
                $suma_cost_mant_b_div_area = $suma_cost_mant_b_div_area * $inflacion_rate;
                 $res_opex_b = $res_opex_b + $suma_cost_mant_b_div_area;
              }
            }

            $total_opex_b = $suma_enf_b_aux + $res_opex_b;

            if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'liquido_coating_basico' || $tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
                array_push($array_b,0,0,0);
                }else{
                array_push($array_b,round($res_enf_b,1),round($suma_enf_b_aux,1),round($res_opex_b,1));
                }

           }
        }

  array_push( $array_tot,$array_base,$array_a,$array_b);
       return response()->json($array_tot);
    }

    public function roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,$dif_2_cost,$inv_ini_3,$costo_b,$counter_val_prod_ene){

        $funciones = new funciones();
        $array_a = [];
        $array_b = [];
        $array_c = [];
        $array_res = [];


        $tipo_mant_1_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_1_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first();


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


        if($counter_val_prod_ene == 0){
            $array_a = [0,0,0,0];
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
        }


        if($counter_val_prod_ene == 1){
            $array_b = [0,0,0,0];
            if(intval($dif_cost) === 0 || intval($inv_ini) === 0){

                $array_a = [0,0,0,0];
            }else{

                if($tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,5);
                }else if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'cobre_cobre'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,10);

                }else if($tipo_mant_1 == null && $prot_cond_1 == null){
                    $array_a = [0,0,0,0];
                }else{
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,15);
                }
            }

            if(intval($dif_2_cost) === 0 || intval($inv_ini_3) === 0){

                $array_c = [0,0,0,0];
            }else{


                if($tipo_mant_3 == 'contaminado' && $prot_cond_3 == 'sin_proteccion'){
                    $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,5);
                }else if($tipo_mant_3 == 'marino' && $prot_cond_3 == 'sin_proteccion' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'infiniguard' || $tipo_mant_3 == 'marino' && $prot_cond_3 == 'cobre_cobre'){

                     $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,10);
                }else if($tipo_mant_3 == null && $prot_cond_3 == null){
                    $array_c = [0,0,0,0];
                }else{
                    $array_c = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,15);
                }


            }
        }


        if($counter_val_prod_ene == 2){
            $array_c = [0,0,0,0];
            if(intval($dif_cost) === 0 || intval($inv_ini) === 0){

                $array_a = [0,0,0,0];
            }else{

                if($tipo_mant_1 == 'contaminado' && $prot_cond_1 == 'sin_proteccion'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,5);
                }else if($tipo_mant_1 == 'marino' && $prot_cond_1 == 'sin_proteccion' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'infiniguard' || $tipo_mant_1 == 'marino' && $prot_cond_1 == 'cobre_cobre'){
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,10);

                }else if($tipo_mant_1 == null && $prot_cond_1 == null){
                    $array_a = [0,0,0,0];
                }else{
                    $array_a = $funciones->roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo_a,15);
                }
            }

            if(intval($dif_2_cost) === 0 || intval($inv_ini_3) === 0){

                $array_b = [0,0,0,0];
            }else{


                if($tipo_mant_2 == 'contaminado' && $prot_cond_2 == 'sin_proteccion'){
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,5);
                }else if($tipo_mant_2 == 'marino' && $prot_cond_2 == 'sin_proteccion' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'infiniguard' || $tipo_mant_2 == 'marino' && $prot_cond_2 == 'cobre_cobre'){

                     $array_b = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,10);
                }else if($tipo_mant_2 == null && $prot_cond_2 == null){
                    $array_b = [0,0,0,0];
                }else{
                    $array_b = $funciones->roi_ene_prod($id_projecto,$dif_2_cost,$inv_ini_3,$costobase,$costo_b,15);
                }


            }
        }
        /*  */


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

        $tipo_mant_1_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first();

        $prot_cond_1_set = DB::table('solutions_project')
        ->where('solutions_project.id_project','=',$id_projecto)
        ->where('solutions_project.num_enf','=',1)
        ->where('solutions_project.num_sol','=',1)
        ->first();

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

    public function getYrsLifeActivo($tipo_mant,$prot_cond){
        switch ($tipo_mant) {
            case 'no_agresivo':
                return 5;
            case 'marino':
                switch ($prot_cond) {
                    case 'sin_proteccion':
                        return 3;
                    case 'liquido_coating_basico':
                        return 5;
                    case 'infiniguard':
                        return 10;
                }
            break;

            case 'contaminado':
                switch ($prot_cond) {
                    case 'sin_proteccion':
                        return 5;
                    case 'liquido_coating_basico':
                        return 10;
                    case 'infiniguard':
                        return 15;
                }
            break;
        }
        return 0;
    }

}
