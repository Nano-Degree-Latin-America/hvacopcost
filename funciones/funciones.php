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

    public function form_pn_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m){

        if($eficiencia_ene == 'IPLV'){
            //(TR x IPLV x Cooling Hours) / 0.75
            //(TR x IPLV x Cooling Hours)
            $mult = $tr * $eficiencia_cant * $cooling_hrs;
            //(Res) / 0.75
             $res_ene_apl_tot_enf_1 = $mult / 0.75;
        }
        if($eficiencia_ene == 'EER'){
            //(TR x (12/EER) x Cooling Hours) / 0.75
            //(12/EER)
            $doce_div_err = 12 / $eficiencia_cant;
            //(TR x (12/EER) x Cooling Hours)
            $mult = $tr * $doce_div_err * $cooling_hrs;
             //(Res) / 0.75
            $res_ene_apl_tot_enf_1 = $mult / 0.75;
        }


        //((TR x cant) x (Cooling Hours) / (SEER) ) / 1000)
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
       /* if($t_e === "pa_pi_te"){
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
       } */
       $funciones = new funciones();
       $factor_m = $funciones->factor_m($t_e,$factor_m);
       $res_res_fact_m =  $res_res * $factor_m;

       return $res_res_fact_m;

    }


    public function form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m){
        //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
        //((TR /3.5) x (Cooling Hours) x (Costo Energía) / IPVL)/ 1000
       //((TR x cant)
       if($eficiencia_ene != 'IPLV'){
        $cant_aux = 12000;
       }

       if($eficiencia_ene == 'IPLV'){
        $cant_aux = 3.5;
       }
       $res_trx_cant = $tr * $cant_aux;
       //((TR x cant) x (Cooling Hours)
       $res_1er_parent = $res_trx_cant * $cooling_hrs;
       //((TR x 12000) x (Cooling Hours)  / (SEER) )
       $tot_1er_res = $res_1er_parent / $eficiencia_cant;
       $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;

       //((TR x cant) x (Cooling Hours) / (SEER) ) / 1000)
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

       $funciones = new funciones();
       $factor_m = $funciones->factor_m($t_e,$factor_m);
       $res_res_fact_m =  $res_res * $factor_m;

       return $res_res_fact_m;
    }

    public function cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m){
        //(((Kw / 3.5) x 12000 )x (Cooling Hours) x (Costo Energía) ) / SEER ) / 1000
                  //(((Kw / 3.5)
                  //$kw =  $solution_enf1->capacidad_tot;

                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)
                  $res_div_seer = $res_dividiendo / $eficiencia_cant;
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

                  $funciones = new funciones();
                  $factor_m = $funciones->factor_m($t_e,$factor_m);
                  $res_res_fact_m =  $res_res * $factor_m;
                  return $res_res_fact_m;
     }

     public function cost_op_an_form_kw_chiller(){
        if($eficiencia_ene == 'IPLV'){
         //((Kw / 3.54) x IPLV x Cooling Hours) / 0.75

         //(Kw / 3.54)
         $kw_div_tres_punto_cinco_cuatro = $kw / 3.54;
         //(Res x IPLV x Cooling Hours)
         $mult = $kw_div_tres_punto_cinco_cuatro * $eficiencia_cant * $cooling_hrs;
          //(Res / 0.75
         $res_div_seer_a =  $mult / 0.75;
        }

        if($eficiencia_ene == 'EER'){
         //((Kw/3.54) x (12/EER) x Cooling Hours) / 0.75

         //(Kw / 3.54)
         $kw_div_tres_punto_cinco_cuatro = $kw / 3.54;
         //(12/EER)
         $doce_div_err = 12 / $eficiencia_cant;
         //((Kw / 3.54) x IPLV x Cooling Hours)
          $mult = $kw_div_tres_punto_cinco_cuatro * $doce_div_err * $cooling_hrs;
         //Res / 0.75
          $res_div_seer_a =  $mult / 0.75;
        }

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

               $factor_m = ProjectController::factor_m($t_e,$factor_m);

               $res_res_fact_m =  $res_res * $factor_m;
               return $res_res_fact_m;
  }

  public function form_proyect_no_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l){

    //(((Kw / 3.5) x 12000 )x (Cooling Hours)) / (SEER x (1-Z)^Años de vida)) / 1000
                      //(((Kw / 3.5)
                      //$kw =  $solution_enf1->capacidad_tot;

                      $kw_3_5 = $kw / 3.5;
                      //(((Kw / 3.5) x 12000 )
                      $kw_a = $kw_3_5 * 12000;
                      $res_dividiendo = $kw_a * $cooling_hrs;
                      //(((Kw / 3.5) x 12000 )x (Cooling Hours)
                      //(SEER x (1-Z)^Años de vida) )
                        //valor de Z
                        if($factor_m == 'ASHRAE 180'){
                            $z = 0.015;
                        }

                        if($factor_m == 'Deficiente'){
                            $z = 0.03;
                        }

                        if($factor_m == 'Sin Mantenimiento'){
                            $z = 0.052;
                        }

                        //(1-Z)
                        $uno_m_zeta = 1-$z;

                        //(1-Z)^Años de vida)
                        $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
                        //(SEER x (1-Z)^Años de vida) )
                        $efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;

                      $res_div_seer = $res_dividiendo / $efi_z_yrs_l;
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

                      $funciones = new funciones();
                      $factor_m = $funciones->factor_m($t_e,$factor_m);
                      $res_res_fact_m =  $res_res * $factor_m;
                      return $res_res_fact_m;
}

public function form_proyect_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l){

    if($factor_m == 'ASHRAE 180'){
        $z = 0.015;
    }

    if($factor_m == 'Deficiente'){
        $z = 0.025;
    }

    if($factor_m == 'Sin Mantenimiento'){
        $z = 0.045;
    }

    if($eficiencia_ene == 'IPLV'){
        //((Kw/3.54) x ( IPLV / (1-(Z x Años de vida)) x Cooling Hours)
         //((Kw/3.54)
        $kw_3_5 = $kw / 3.54;
        //(Z x Años de vida)
        $z_mul_yrs_l = $z * $yrs_l;
        //(1-(Z x Años de vida))
        $uno_m_zeta = 1 - $z_mul_yrs_l;
        //( IPLV / (1-(Z x Años de vida))
        $uno_m_zeta_div_efi = $eficiencia_cant / $uno_m_zeta;

        $res_div_seer_a = $kw_3_5 * $uno_m_zeta_div_efi * $cooling_hrs;
       }

       if($eficiencia_ene == 'EER'){
        //((Kw/3.54) x (12/(EER x (1-Z)^Años de vida)) x Cooling Hours) /0.75
        $kw_3_5 = $kw / 3.54;
        //(1-Z)
        $uno_m_zeta = 1-$z;
        //(1-Z)^Años de vida)
        $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
        //(EER x (1-Z)^Años de vida)
        $efi_mult_uno_m_zeta_yrs_life =  $eficiencia_cant * $uno_m_zeta_yrs_life;
        //(Kw/3.54) x (12/(EER x (1-Z)^Años de vida)) x Cooling Hours)
        $mult_all = $kw_3_5 * $efi_mult_uno_m_zeta_yrs_life * $cooling_hrs;

        $res_div_seer_a = $mult_all / 0.75;
       }

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

                      $funciones = new funciones();
                      $factor_m = $funciones->factor_m($t_e,$factor_m);
                      $res_res_fact_m =  $res_res * $factor_m;
                      return $res_res_fact_m;
}

public function form_proyect_retro_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l){

    //((TR x 12000) x (Cooling Hours)  / (SEER x (1-Z)^Años de vida) )/ 1000
    //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
    //((TR /3.5) x (Cooling Hours) x (Costo Energía) / IPVL)/ 1000
   //((TR x cant)

    $cant_aux = 12000;

   $res_trx_cant = $tr * $cant_aux;
   //((TR x cant) x (Cooling Hours)
   $res_1er_parent = $res_trx_cant * $cooling_hrs;

   //((TR x 12000) x (Cooling Hours)  / (SEER x (1-Z)^Años de vida) ) )
   //(SEER x (1-Z)^Años de vida) )
   //valor de Z
   if($factor_m == 'ASHRAE 180'){
    $z = 0.015;
   }

   if($factor_m == 'Deficiente'){
    $z = 0.03;
   }

   if($factor_m == 'Sin Mantenimiento'){
    $z = 0.052;
   }

   //(1-Z)
   $uno_m_zeta = 1-$z;

   //($uno_m_zeta)^Años de vida)
   $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));

   //(SEER x (1-Z)^Años de vida) )
   $efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;
   //($res_1er_parent)  / ($efi_z_yrs_l)
   $tot_1er_res = $res_1er_parent / $efi_z_yrs_l;
    //($res_1er_parent)  / ($efi_z_yrs_l) / 1000
   $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;

   //((TR x cant) x (Cooling Hours) / (SEER) ) / 1000)
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

   $funciones = new funciones();
   $factor_m = $funciones->factor_m($t_e,$factor_m);

   $res_res_fact_m =  $res_res * $factor_m;

   return $res_res_fact_m;
}

public function form_proyect_retro_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l){

    if($factor_m == 'ASHRAE 180'){
        $z = 0.015;
    }

    if($factor_m == 'Deficiente'){
        $z = 0.025;
    }

    if($factor_m == 'Sin Mantenimiento'){
        $z = 0.045;
    }

if($eficiencia_ene == 'IPLV'){

    //(TR x ( IPLV / (1-(Z x Años de vida)) x Cooling Hours) /0.75

    //z

    //(Z x Años de vida)
    $z_x_yrs_l = $z * $yrs_l;
    //(1-(Z x Años de vida))
    $z_x_yrs_l_mul_mns_1 = -1 * $z_x_yrs_l;
    //IPLV / (1-(Z x Años de vida)
    if($z_x_yrs_l_mul_mns_1 < 0 || $z_x_yrs_l_mul_mns_1 == -0){
        $iplv_div = $eficiencia_cant / 1;
    }

    if($z_x_yrs_l_mul_mns_1 > 0){
        $iplv_div = $eficiencia_cant / $z_x_yrs_l_mul_mns_1;
    }
    //(TR x ( IPLV / (1-(Z x Años de vida)) x Cooling Hours)
    $tr_mul_iplv_div_mul_cooling_hrs = $tr * $iplv_div * $cooling_hrs;

    //(TR x Res x Cooling Hours) /0.75
    $res_ene_apl_tot_enf_1 = $tr_mul_iplv_div_mul_cooling_hrs / 0.75;

}

if($eficiencia_ene == 'EER'){
//(TR x (12/(EER x (1-Z)^Años de vida)) x Cooling Hours) /0.75

    //(1-Z)
$uno_m_zeta = 1-$z;

//(1-Z)^Años de vida)
$uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
//(EER x (1-Z)^Años de vida
$efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;
//(12/(EER x (1-Z)^Años de vida))
$twelve_div_efi_z_yrs_l = 12 / $efi_z_yrs_l;
//(TR x (12/(EER x (1-Z)^Años de vida)) x Cooling Hours)
$tr_mul_twelve_div_efi_z_yrs_l_mul_cooling_hrs = $tr * $twelve_div_efi_z_yrs_l * $cooling_hrs;

$res_ene_apl_tot_enf_1 = $tr_mul_twelve_div_efi_z_yrs_l_mul_cooling_hrs / 0.75;
}






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


    public function factor_m($t_e,$factor_m){

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

      return $factor_m;
    }

    public function calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1){

        if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador'
         || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'
         || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'fancoil'
         || $equipo_conf_1_1 === 'man_scholl_const' || $equipo_conf_1_1 === 'man_doa'
         || $equipo_conf_1_1 === 'fan_hsp_doa' || $equipo_conf_1_1 === 'man_doa_hr'
         || $equipo_conf_1_1 === 'fan_hsp_doa_hr'){

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
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 5;
                       break;
                    default:
                  }
                //Dr
                switch ($dr_conf_1_1) {
                    case 'Cumple ASHRAE  Standard 70':
                        $val_conf_dr_1_1 = 5;
                      break;
                    case 'No Cumple ASHRAE Standard 70':
                        $val_conf_dr_1_1 = 3;
                    break;
                    default:
                  }

                //control
                switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                    break;
                    case 'Termostato en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                    break;
                    case 'Termostato Inteligente en Zona':
                      $val_conf_crtl_1_1 = 5;
                    break;
                    case 'Termostato en Red / DDC en Zona':
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

            if($equipo_conf_1_1 === 'manejadora'){
                switch ($diseno_conf_1_1) {
                    case 'Descarga Directa Sin Ductar':
                        $val_conf_dis_1_1 = 2;
                      break;
                    case 'Descarga Directa Ductada':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
                    break;
                    case 'Basado en ASHRAE 90.1 - 2019':
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

                  switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostato en Zona de Confort':
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

            ///////////////fancoil////
            if($equipo_conf_1_1 === 'fancoil'){
                switch ($diseno_conf_1_1) {
                    case 'Descarga Directa Sin Ductar':
                        $val_conf_dis_1_1 = 2;
                      break;
                    case 'Descarga Directa Ductada':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
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

                  switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostato en Zona de Confort':
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

            //////////////////////////////////////////////
            if($equipo_conf_1_1 === 'man_doa' || $equipo_conf_1_1 === 'fan_hsp_doa'
            || $equipo_conf_1_1 === 'man_doa_hr' || $equipo_conf_1_1 === 'fan_hsp_doa_hr'){

                if($equipo_conf_1_1 === 'man_doa' || $equipo_conf_1_1 === 'man_doa_hr'){

                  switch ($diseno_conf_1_1) {
                      case 'Inyección y Retorno Ductado':
                          $val_conf_dis_1_1 = 4;
                        break;
                      case 'Ducto Flex. y Plenum Retorno':
                          $val_conf_dis_1_1 = 2.5;
                        break;
                      case 'Descarga Directa Ductada':
                          $val_conf_dis_1_1 = 3.5;
                        break;
                      case 'Basado en ASHRAE 90.1 - 2019':
                          $val_conf_dis_1_1 = 5;
                        break;
                      default:
                    }

              }

              if($equipo_conf_1_1 === 'fan_hsp_doa' || $equipo_conf_1_1 === 'fan_hsp_doa_hr'){

                switch ($diseno_conf_1_1) {
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
                      break;
                    case 'Ducto Flex. y Retorno Ductado':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 5;
                      break;
                    default:
                  }
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

              //control
              switch ($t_control_conf_1_1) {
                  case 'Termostato Inteligente Fuera Zona':
                    $val_conf_crtl_1_1 = 2.5;
                  break;
                  case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
                  break;
                  case 'Termostato en Red / DDC en Zona':
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
            /////////////////////////////////////////////////
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
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                  break;
                default:
              }

              //control
              switch ($t_control_conf_1_1) {
                case 'Termostato Fuera Zona de Confort':
                    $val_conf_crtl_1_1 = 2.5;
                break;
                case 'Termostato en Zona de Confort':
                    $val_conf_crtl_1_1 = 4;
                break;
                case 'Termostato Inteligente en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                case 'Termostato en Red / DDC en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                default:
            }
                //dr
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

        if($equipo_conf_1_1 === 'man_scholl_const'){

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'VAV y Retorno Ductado':
                    $val_conf_dis_1_1 = 4.5;
                  break;
                default:
              }

              //control
              switch ($t_control_conf_1_1) {
                case 'Termostato Fuera Zona de Confort':
                    $val_conf_crtl_1_1 = 2.5;
                break;
                case 'Termostato en Zona de Confort':
                    $val_conf_crtl_1_1 = 4;
                break;
                case 'Termostato Inteligente en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                case 'Termostato en Red / DDC en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                default:
            }
                //dr
              switch ($dr_conf_1_1) {

                case 'Cumple ASHRAE  Standard 70':
                    $val_conf_dr_1_1 = 5;
                  break;
                  case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
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


        }


        if($equipo_conf_1_1 === 'man' || $equipo_conf_1_1 === 'fancoil_hsp'){
            $val_conf_equipo_1_1 = 4.2;
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
                  case 'Basado en ASHRAE 90.1 - 2019':
                      $val_conf_dis_1_1 = 5;
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
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 2.5;
                  break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                  break;
                default:
              }
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

          //control
          switch ($t_control_conf_1_1) {
              case 'Termostato Inteligente Fuera Zona':
                $val_conf_crtl_1_1 = 2.5;
              break;
              case 'Termostato Inteligente en Zona':
                $val_conf_crtl_1_1 = 5;
              break;
              case 'Termostato en Red / DDC en Zona':
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

        if($equipo_conf_1_1 === 'w_heat_rec'){
            $val_conf_equipo_1_1 = 4.65;
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
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                   break;
                default:
              }
            //Dr
            switch ($dr_conf_1_1) {
                case 'Cumple ASHRAE  Standard 70':
                    $val_conf_dr_1_1 = 5;
                  break;
                case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
                break;
                default:
              }

            //control
            switch ($t_control_conf_1_1) {
                case 'Termostato Fuera Zona de Confort':
                    $val_conf_crtl_1_1 = 2.5;
                break;
                case 'Termostato en Zona de Confort':
                    $val_conf_crtl_1_1 = 4;
                break;
                case 'Termostato Inteligente en Zona':
                  $val_conf_crtl_1_1 = 5;
                break;
                case 'Termostato en Red / DDC en Zona':
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

        if($equipo_conf_1_1 === 'fancoil_lsp_spt' || $equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'ca' || $equipo_conf_1_1 === 'fancoil_lsp' || $equipo_conf_1_1 === 'vert'){
            $val_conf_equipo_1_1 = 4;
            ///////////////fancoil lsp spt////
            if($equipo_conf_1_1 === 'fancoil_lsp_spt'){
                switch ($diseno_conf_1_1) {
                    case 'Descarga Directa Sin Ductar':
                        $val_conf_dis_1_1 = 2;
                      break;
                    case 'Descarga Directa Ductada':
                        $val_conf_dis_1_1 = 2.5;
                      break;
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
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

                  switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                    case 'Termostato en Zona de Confort':
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

            if($equipo_conf_1_1 === 'ca_pi_te'){
                switch ($diseno_conf_1_1) {
                    case 'Sin Unidad DOA':
                        $val_conf_dis_1_1 = 2.5;
                      break;

                    case 'Con Unidad DOA':
                        $val_conf_dis_1_1 = 3.5;
                      break;

                      case 'Unidad DOA + Heat Recovery':
                        $val_conf_dis_1_1 = 3.5;
                      break;

                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4;
                      break;
                    default:
                  }

                  switch ($t_control_conf_1_1) {
                      case 'Termostato Inteligente Fuera Zona':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                      case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;
                      case 'Termostato en Red / DDC en Zona':
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

            if($equipo_conf_1_1 === 'fancoil_lsp'){
                switch ($diseno_conf_1_1) {
                    case 'Sin Unidad DOA':
                        $val_conf_dis_1_1 = 2.5;
                      break;

                    case 'Con DOA y Descarga Ductada':
                        $val_conf_dis_1_1 = 3.8;
                      break;

                      case 'Unidad DOA + Heat Recovery':
                        $val_conf_dis_1_1 = 3.5;
                      break;

                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4.5;
                      break;
                    default:
                  }


                  switch ($t_control_conf_1_1) {
                    case 'Termostato Inteligente Fuera Zona':
                      $val_conf_crtl_1_1 = 2.5;
                    break;
                    case 'Termostato Inteligente en Zona':
                      $val_conf_crtl_1_1 = 5;
                    break;
                    case 'Termostato en Red / DDC en Zona':
                      $val_conf_crtl_1_1 = 5;
                    break;

                   default:
                }

              switch ($dr_conf_1_1) {
                case 'No Aplica':
                    $val_conf_dr_1_1 = 2;
                  break;
                  case 'Cumple ASHRAE  Standard 70':
                    $val_conf_dr_1_1 = 4;
                  break;
                  case 'No Cumple ASHRAE Standard 70':
                    $val_conf_dr_1_1 = 3;
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

            if($equipo_conf_1_1 === 'ca'){
                switch ($diseno_conf_1_1) {
                    case 'Sin Unidad DOA':
                        $val_conf_dis_1_1 = 2.5;
                      break;

                    case 'Con Unidad DOA':
                        $val_conf_dis_1_1 = 3.5;
                      break;
                      case 'Unidad DOA + Heat Recovery':
                        $val_conf_dis_1_1 = 3.5;
                      break;
                    case 'Basado en ASHRAE 90.1 - 2019':
                        $val_conf_dis_1_1 = 4;
                      break;
                    default:
                  }

                  switch ($t_control_conf_1_1) {
                      case 'Termostato Inteligente Fuera Zona':
                        $val_conf_crtl_1_1 = 2.5;
                      break;
                      case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                      break;
                      case 'Termostato en Red / DDC en Zona':
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

            if($equipo_conf_1_1 === 'vert'){
                switch ($diseno_conf_1_1) {
                    case 'Descarga Ductada c/ MERV < 7':
                        $val_conf_dis_1_1 = 3.7;
                      break;

                    case 'Descarga Ductada c/ MERV > 7':
                        $val_conf_dis_1_1 = 4;
                      break;
                    default:
                  }


            switch ($t_control_conf_1_1) {
                case 'Termostato Fuera Zona de Confort':
                    $val_conf_crtl_1_1 = 2.5;
                  break;
                case 'Termostato en Zona de Confort':
                    $val_conf_crtl_1_1 = 4;
                  break;
                  case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 4.5;
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
        }

        if($equipo_conf_1_1 === 'duc_con' || $equipo_conf_1_1 === 'fan_hsp_scholl_const'){
            $val_conf_equipo_1_1 = 4.2;

            if($equipo_conf_1_1 === 'duc_con'){

                switch ($diseno_conf_1_1) {
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4.5;
                    break;
                    case 'Inyección Ductada y Plenum Retorno':
                            $val_conf_dis_1_1 = 4;
                    break;
                    default:
                }

                switch ($dr_conf_1_1) {
                    case 'No Aplica':
                            $val_conf_dr_1_1 = 2;
                    break;
                    default:
                }
                //control

                switch ($t_control_conf_1_1) {

                  case 'Termostato Inteligente Fuera Zona':
                      $val_conf_crtl_1_1 = 2.5;
                  break;
                  case 'Termostato Inteligente en Zona':
                      $val_conf_crtl_1_1 = 4.5;
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

              if($equipo_conf_1_1 === 'fan_hsp_scholl_const'){

                switch ($diseno_conf_1_1) {
                    case 'Ducto Flex. y Plenum Retorno':
                        $val_conf_dis_1_1 = 3;
                    break;
                    case 'Inyección y Retorno Flexible':
                        $val_conf_dis_1_1 = 3.5;
                    break;
                    case 'Inyección y Retorno Ductado':
                        $val_conf_dis_1_1 = 4;
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
                //control
                switch ($t_control_conf_1_1) {
                    case 'Termostato Fuera Zona de Confort':
                        $val_conf_crtl_1_1 = 2.5;
                    break;
                    case 'Termostato en Zona de Confort':
                        $val_conf_crtl_1_1 = 4;
                    break;
                    case 'Termostato Inteligente en Zona':
                        $val_conf_crtl_1_1 = 5;
                    break;
                    case 'Termostato en Red / DDC en Zona':
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
        }

        if($equipo_conf_1_1 === 'horz' || $equipo_conf_1_1 === 'pa_pi_te' || $equipo_conf_1_1 === 'cass'){
            $val_conf_equipo_1_1 = 3.5;
              if($equipo_conf_1_1 === 'horz'){
                  switch ($diseno_conf_1_1) {
                      case 'Filtros Aire MERV < 7':
                          $val_conf_dis_1_1 = 3.5;
                        break;

                      case 'Filtros Aire MERV > 7':
                          $val_conf_dis_1_1 = 3.8;
                        break;

                  default:
                    }

                    switch ($t_control_conf_1_1) {
                      case 'Termostato Interno':
                          $val_conf_crtl_1_1 = 3;
                        break;
                      case 'Termostato en Zona de Confort':
                          $val_conf_crtl_1_1 = 4;
                        break;
                      case 'Termostato Inteligente en Zona':
                          $val_conf_crtl_1_1 = 4.5;
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
                          $val_conf_crtl_1_1 = 3.3;
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

          if($equipo_conf_1_1 === 'cass'){

            $val_conf_equipo_1_1 = 3.8;

            switch ($diseno_conf_1_1) {
                case 'Condensador Arriba':
                    $val_conf_dis_1_1 = 3.5;
                break;

                case 'Condensador Abajo':
                    $val_conf_dis_1_1 = 3.5;
                break;

            default:
            }

          switch ($t_control_conf_1_1) {
            case 'Termostato Interno':
                $val_conf_crtl_1_1 = 3.3;
            break;
            case 'Termostato Inteligente en Zona':
                $val_conf_crtl_1_1 = 4;
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


        if($equipo_conf_1_1 === 'man_scholl_var'){

            $val_conf_equipo_1_1 = 4.5;

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'VAV y Retorno Ductado':
                    $val_conf_dis_1_1 = 4.5;
                break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                break;

            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
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

        if($equipo_conf_1_1 === 'fan_hsp_scholl_var'){

            $val_conf_equipo_1_1 = 4.2;

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 4.5;
                break;

            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
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

        if($equipo_conf_1_1 === 'chill_bean_scholl_var'){

            $val_conf_equipo_1_1 = 4.6;

            switch ($diseno_conf_1_1) {
                case 'Sistema Pasivo':
                    $val_conf_dis_1_1 = 3.5;
                break;
                case 'Sistema Activo':
                    $val_conf_dis_1_1 = 4.8;
                break;
            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
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

        if($equipo_conf_1_1 === 'man_scholl_tor_four_eta'){

            $val_conf_equipo_1_1 = 4.5;

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'VAV y Retorno Ductado':
                    $val_conf_dis_1_1 = 4.5;
                break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 5;
                break;

            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
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

        if($equipo_conf_1_1 === 'fan_hsp_tor_four_eta'){

            $val_conf_equipo_1_1 = 4.2;

            switch ($diseno_conf_1_1) {
                case 'Ducto Flex. y Plenum Retorno':
                    $val_conf_dis_1_1 = 3;
                  break;
                case 'Inyección y Retorno Flexible':
                    $val_conf_dis_1_1 = 3.5;
                  break;
                case 'Inyección y Retorno Ductado':
                    $val_conf_dis_1_1 = 4;
                  break;
                case 'Basado en ASHRAE 90.1 - 2019':
                    $val_conf_dis_1_1 = 4.5;
                break;

            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
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

        if($equipo_conf_1_1 === 'chill_bean_tor_four_eta'){

            $val_conf_equipo_1_1 = 4.6;

            switch ($diseno_conf_1_1) {
                case 'Sistema Pasivo':
                    $val_conf_dis_1_1 = 3.5;
                break;
                case 'Sistema Activo':
                    $val_conf_dis_1_1 = 4.8;
                break;
            default:
            }

             //control
            switch ($t_control_conf_1_1) {
            case 'Termostato Fuera Zona de Confort':
                $val_conf_crtl_1_1 = 2.5;
            break;
            case 'Termostato en Zona de Confort':
                $val_conf_crtl_1_1 = 4;
            break;
            case 'Termostato Inteligente en Zona':
                    $val_conf_crtl_1_1 = 5;
            break;
            case 'Termostato en Red / DDC en Zona':
                $val_conf_crtl_1_1 = 5;
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


        $suma_nivel_confort_1_1 = $val_conf_equipo_1_1 + $val_conf_dis_1_1 + $val_conf_dr_1_1 + $val_conf_crtl_1_1 + $val_conf_mant_1_1;
        $nivel_confotr_1_1 = $suma_nivel_confort_1_1/5;

          return $nivel_confotr_1_1;
    }
}
