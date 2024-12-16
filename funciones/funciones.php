<?php namespace funciones;
/*
this class is used to convert any doc,docx file to simple text format.

author: Gourav Mehta
author's email: gouravmehta@gmail.com
author's phone: +91-9888316141
*/
use DB;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\ProjectsModel;
use App\ResultsProjectModel;
use Illuminate\Http\Request;
use App\SolutionsProjectModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use funciones\funciones;
class funciones {


//resultados trait //////////////////////////////////////////
//roi_s_ene
public function roi($dif_cost,$inflacion,$inv_ini,$cant){
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
                $año_3 = $año_3_res_suma - $inv_ini;
                $año_3_mult_invini =$año_3 / $inv_ini;
                $año_res =  $año_3_mult_invini * 100;
                array_push($array_res,intval($año_res));

            }

            if($i === 5){
                $año_5_res =  $dif_cost;
                $año_5_res_suma = $año_5_suma ;
             /*    $año_5 = intval($año_5_res_suma/$inv_ini * 100); */
                $año_5 = $año_5_res_suma - $inv_ini;
                $año_5_mult_invini =$año_5 / $inv_ini;
                $año_5_res =  $año_5_mult_invini * 100;
                array_push($array_res,intval($año_5_res));
            }

            if($i === 10){
                if($cant >=  10){
                    $año_10_res =  $dif_cost;
                    $año_10_res_suma = $año_10_suma ;
                    /* $año_10 = intval($año_10_res_suma/$inv_ini * 100); */
                    $año_10 = $año_10_res_suma - $inv_ini;
                    $año_10_mult_invini =$año_10 / $inv_ini;
                    $año_10_res =  $año_10_mult_invini * 100;
                    array_push($array_res,intval($año_10_res));
                }else{
                    array_push($array_res,null);
                }


            }

            if($i === 15){
                if($cant > 10){
                $año_15_res =  $dif_cost;
                $año_15_res_suma = $año_15_suma ;
                /* $año_15 = intval($año_15_res_suma/$inv_ini * 100); */
                $año_15 = $año_15_res_suma - $inv_ini;
                $año_15_mult_invini =$año_15 / $inv_ini;
                $año_15_res =  $año_15_mult_invini * 100;
                array_push($array_res,intval($año_15_res));
                }else{

                array_push($array_res,null);
                }
                //dd($array_res);
            }
    //me quede checando la formula

        }
    }
    return $array_res;
    }

    public function roi_ene_prod($id_projecto,$dif_cost,$inv_ini,$costobase,$costo,$cant){

        $funciones = new funciones();
        $array_roi_base_ene_solo_ene = $funciones->roi_base_a_retro_new_nojson($id_projecto,$dif_cost,$inv_ini);
        $array_sumas = $funciones->roi_sumas_grafics($id_projecto,$dif_cost,$inv_ini);


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
                 if($cant >=  10){
                    $año_10_res =  $prod_m_prode;
                    $año_10_res_suma = $año_10_suma ;
                    $año_10 = intval($año_10_res_suma/$inv_ini * 100);
                    array_push($array_sums_res,intval($año_10_res_suma));

                 }else{
                    array_push($array_sums_res,null);
                 }
                }

                if($i === 15){
                 if($cant > 10){

                    $año_15_res =  $prod_m_prode;
                    $año_15_res_suma = $año_15_suma ;
                    $año_15 = intval($año_15_res_suma/$inv_ini * 100);
                    array_push($array_sums_res,intval($año_15_res_suma));
                 }else{

                    array_push($array_sums_res,null);
                 }

                }


            }
        }

        $count_arry= count($array_sums_res) - 1;
        for ($i = 0; $i <= $count_arry; $i++) {

            //$suma = $array_sums_res[$i] + $array_roi_base_ene_solo_ene[$i];
            if($array_sums_res[$i] === null){
                array_push($array_res,null);
            }else{
                $suma = $array_sums_res[$i] +  $array_sumas[$i];
                $div_Result = $suma / $inv_ini * 100;

                array_push($array_res,intval($div_Result));
            }

        }

        return $array_res;
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

}


