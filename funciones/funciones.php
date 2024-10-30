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

        if($eficiencia_ene == 'IPLV' || $eficiencia_ene == 'IPLV (Kw/TR)'){
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


    public function form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$factor_v,$factor_f,$am){
        //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
        //((TR /3.5) x (Cooling Hours) x (Costo Energía) / IPVL)/ 1000
       //((TR x cant)
       /* ((TR x 12000) x (Cooling Hours) /(SEER x ((1-Z)^Años de vida) x AM )/ 1000 */
       if($eficiencia_ene != 'IPLV' || $eficiencia_ene == 'IPLV (Kw/TR)'){
        $cant_aux = 12000;
       }

       if($eficiencia_ene == 'IPLV' || $eficiencia_ene == 'IPLV (Kw/TR)'){
        $cant_aux = 3.5;
       }
       $res_trx_cant = $tr * $cant_aux;
       //((TR x cant) x (Cooling Hours)
       $res_1er_parent = $res_trx_cant * $cooling_hrs;
       //((TR x 12000) x (Cooling Hours)  / (SEER x ((1-Z)^Años de vida) x AM )/

       //(1-Z)^Años de vida
       if($factor_m == 'ASHRAE 180'){
        $z = 0.01;
       }

       if($factor_m == 'Deficiente'){
        $z = 0.017;
       }

       if($factor_m == 'Sin Mantenimiento'){
        $z = 0.035;
       }

       //(1-Z)
       $uno_m_zeta = 1-$z;

       //($uno_m_zeta)^Años de vida)
       $uno_m_zeta_yrs_life = pow($uno_m_zeta,3);
       //(SEER x uno_m_zeta_yrs_life)
       $efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;

       $am_efi_z_yrs = $am * $efi_z_yrs_l;

       $tot_1er_res = $res_1er_parent / $am_efi_z_yrs;
       $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;

       //((TR x cant) x (Cooling Hours) / (SEER x ((1-Z)^Años de vida) x AM )/ 1000)
       /* $res_ene_apl_tot_enf_1 */

       //energia aplicada proccess
       //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C

       //(Fórmula Energía x Factor S)

       //((FE x Factor S) + (FE x Factor D) + (FE x Factor T) + (FE x Factor V)+ (FE x Factor M)) x Factor F x Factor C
        //(FE x Factor S)
        $res_1_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_s);
        //(FE x Factor D)
       $res_2_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_d);
        //(FE x Factor T)
       $res_3_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_t);
            //(FE x Factor V)
        $res_4_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_v);
        //(FE x Factor M)
        $funciones = new funciones();

        $factor_m = $funciones->factor_m($t_e,$factor_m);

        $res_5_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_m);

        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1 + $res_4_parent1 + $res_5_parent1;

        $res_res_fact_m =  $res_parent_1 * $factor_f * $factor_c;
       /* $res_res =  $res_parent_1 * $factor_c;

       $funciones = new funciones();
       $factor_m = $funciones->factor_m($t_e,$factor_m);
       $res_res_fact_m =  $res_res * $factor_m; */

       return $res_res_fact_m;
    }

    public function cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$factor_v,$factor_f,$am){

        //(((Kw / 3.5) x 12000 )x (Cooling Hours)) / (SEER x (1-Z)^Años de vida) x AM) / 1000
                  //(((Kw / 3.5)



                  //$kw =  $solution_enf1->capacidad_tot;

                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)

                  if($factor_m == 'ASHRAE 180'){
                    $z = 0.01;
                   }

                   if($factor_m == 'Deficiente'){
                    $z = 0.017;
                   }

                   if($factor_m == 'Sin Mantenimiento'){
                    $z = 0.035;
                   }

                   //(1-Z)
                   $uno_m_zeta = 1-$z;

                   //($uno_m_zeta)^Años de vida)
                   $uno_m_zeta_yrs_life = pow($uno_m_zeta,3);
                   //(SEER x uno_m_zeta_yrs_life)
                   $efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;

                   $am_efi_z_yrs = $am * $efi_z_yrs_l;

                  $res_div_seer = $res_dividiendo / $am_efi_z_yrs;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)  / SEER
                  $res_div_seer_a = $res_div_seer / 1000;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)  / SEER ) / 1000

   //energia aplicada proccess
               //((FE x Factor S) + (FE x Factor D) + (FE x Factor T) + (FE x Factor V)+ (FE x Factor M)) x Factor F x Factor C

                  //(Fórmula Energía x Factor S)
                  $res_1_parent1= $res_div_seer_a * floatval($factor_s);
                  // (Fórmula Energía x Factor D)
                  $res_2_parent1= $res_div_seer_a * floatval($factor_d);
                      //(Fórmula Energía x Factor T)
                  $res_3_parent1= $res_div_seer_a * floatval($factor_t);
                    //(FE x Factor V)
                    $res_4_parent1= $res_div_seer_a * floatval($factor_v);
                    //(FE x Factor M)
                    $funciones = new funciones();

                    $factor_m = $funciones->factor_m($t_e,$factor_m);

                    $res_5_parent1= $res_div_seer_a * floatval($factor_m);

                    $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1 + $res_4_parent1 + $res_5_parent1;

                    $res_res_fact_m =  $res_parent_1 * $factor_f * $factor_c;

/*   //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T))
                  $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1;
     //((Fórmula Energía x Factor S) + (Fórmula Energía x Factor D) + (Fórmula Energía x Factor T)) x Factor C
                  $res_res =  $res_parent_1 *  $factor_c;

                  $funciones = new funciones();
                  $factor_m = $funciones->factor_m($t_e,$factor_m);
                  $res_res_fact_m =  $res_res * $factor_m; */
                  return $res_res_fact_m;
     }

     public function cost_op_an_form_kw_chiller(){
        if($eficiencia_ene == 'IPLV' || $eficiencia_ene == 'IPLV (Kw/TR)'){
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

  public function form_proyect_no_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$factor_v,$factor_f,$am){

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
                            $z = 0.01;
                        }

                        if($factor_m == 'Deficiente'){
                             $z = 0.017;
                        }

                        if($factor_m == 'Sin Mantenimiento'){
                           $z = 0.035;
                        }

                        //(1-Z)
                        $uno_m_zeta = 1-$z;

                        //(1-Z)^Años de vida)
                        $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
                        //(SEER x (1-Z)^Años de vida) )
                        $efi_z_yrs_l = $eficiencia_cant * $uno_m_zeta_yrs_life;
                        $am_efi_z_yrs = $am * $efi_z_yrs_l;

                      $res_div_seer = $res_dividiendo / $am_efi_z_yrs;
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
                          //(FE x Factor V)
                          $res_4_parent1= $res_div_seer_a * floatval($factor_v);
                          //(FE x Factor M)
                          $funciones = new funciones();

                          $factor_m = $funciones->factor_m($t_e,$factor_m);

                          $res_5_parent1= $res_div_seer_a * floatval($factor_m);

                          $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1 + $res_4_parent1 + $res_5_parent1;

                          $res_res_fact_m =  $res_parent_1 * $factor_f * $factor_c;
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

    if($eficiencia_ene == 'IPLV' || $eficiencia_ene == 'IPLV (Kw/TR)'){
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

public function form_proyect_retro_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$factor_v,$factor_f,$am){

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
    $z = 0.01;
   }

   if($factor_m == 'Deficiente'){
    $z = 0.017;
   }

   if($factor_m == 'Sin Mantenimiento'){
    $z = 0.035;
   }

   //(1-Z)
   $uno_m_zeta = 1-$z;

   //($uno_m_zeta)^Años de vida)
   $uno_m_zeta_yrs_life = pow($uno_m_zeta,floatval($yrs_l));
   $am_efi_z_yrs = $am * $uno_m_zeta_yrs_life;

   //(SEER x (1-Z)^Años de vida) )
   $efi_z_yrs_l = $eficiencia_cant * $am_efi_z_yrs;
   //($res_1er_parent)  / ($efi_z_yrs_l)

   $tot_1er_res = $res_1er_parent / $efi_z_yrs_l;
    //($res_1er_parent)  / ($efi_z_yrs_l) / 1000
   $res_ene_apl_tot_enf_1 = $tot_1er_res / 1000;

   //((TR x cant) x (Cooling Hours) / (SEER) ) / 1000)
   /* $res_ene_apl_tot_enf_1 */

   //energia aplicada proccess

   //((FE x Factor S) + (FE x Factor D) + (FE x Factor T) + (FE x Factor V)+ (FE x Factor M)) x Factor F x Factor C

    //(FE x Factor S)
    $res_1_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_s);
    //(FE x Factor D)
    $res_2_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_d);
    //(FE x Factor T)
   $res_3_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_t);
    //(FE x Factor V)
   $res_4_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_v);
   //(FE x Factor M)
   $funciones = new funciones();

   $factor_m = $funciones->factor_m($t_e,$factor_m);

   $res_5_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_m);

   $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1 + $res_4_parent1 + $res_5_parent1;

   $res_res_fact_m =  $res_parent_1 * $factor_f * $factor_c;

 /*   $res_res_fact_m =  $res_res * $factor_m; */

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

if($eficiencia_ene == 'IPLV' || $eficiencia_ene == 'IPLV (Kw/TR)'){

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
                $factor_m = -0.1;
            }

            if($factor_m==='Deficiente'){
                $factor_m = 0.11;
            }

            if($factor_m==='Sin Mantenimiento'){
                $factor_m = 0.18;
            }
        } */

        if($factor_m==='ASHRAE 180'){
            $factor_m = -0.1;
        }

        if($factor_m==='Deficiente'){
            $factor_m = 0.11;
        }

        if($factor_m==='Sin Mantenimiento'){
            $factor_m = 0.18;
        }

      return $factor_m;
    }

    public function calc_confort($unidad_conf_1_1,$equipo_conf_1_1,$diseno_conf_1_1,$t_control_conf_1_1,$dr_conf_1_1,$mant_conf_1_1){

        if($equipo_conf_1_1 === 'basico' || $equipo_conf_1_1 === 'c_economizador'
         || $equipo_conf_1_1 === 'agu_cir_cer' || $equipo_conf_1_1 === 'agu_cir_abr'
         || $equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'manejadora2'
         || $equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'fancoil2'
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
                    case 'Cumple ASHRAE Standard 70':
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

            if($equipo_conf_1_1 === 'manejadora' || $equipo_conf_1_1 === 'manejadora2'){
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
                    case 'Cumple ASHRAE Standard 70':
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
            if($equipo_conf_1_1 === 'fancoil' || $equipo_conf_1_1 === 'fancoil2'){
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
                    case 'Cumple ASHRAE Standard 70':
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
                  case 'Cumple ASHRAE Standard 70':
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
                case 'Cumple ASHRAE Standard 70':
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

                case 'Cumple ASHRAE Standard 70':
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
              case 'Cumple ASHRAE Standard 70':
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
                case 'Cumple ASHRAE Standard 70':
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

        if($equipo_conf_1_1 === 'fancoil_lsp_spt' || $equipo_conf_1_1 === 'fancoil_lsp_spt2' || $equipo_conf_1_1 === 'ca_pi_te' || $equipo_conf_1_1 === 'ca' || $equipo_conf_1_1 === 'fancoil_lsp' || $equipo_conf_1_1 === 'vert'){
            $val_conf_equipo_1_1 = 4;
            ///////////////fancoil lsp spt////
            if($equipo_conf_1_1 === 'fancoil_lsp_spt' || $equipo_conf_1_1 === 'fancoil_lsp_spt2'){
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
                    case 'Cumple ASHRAE Standard 70':
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
                  case 'Cumple ASHRAE Standard 70':
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
                case 'Cumple ASHRAE Standard 70':
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

        if($equipo_conf_1_1 === 'duc_con' || $equipo_conf_1_1 === 'duc_con2' || $equipo_conf_1_1 === 'fan_hsp_scholl_const'){
            $val_conf_equipo_1_1 = 4.2;

            if($equipo_conf_1_1 === 'duc_con' || $equipo_conf_1_1 === 'duc_con2'){

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
                    case 'Cumple ASHRAE Standard 70':
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

        if($equipo_conf_1_1 === 'horz' || $equipo_conf_1_1 === 'pa_pi_te' || $equipo_conf_1_1 === 'pa_pi_te2' || $equipo_conf_1_1 === 'cass' || $equipo_conf_1_1 === 'cass2'){
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

              if($equipo_conf_1_1 === 'pa_pi_te' || $equipo_conf_1_1 === 'pa_pi_te2'){

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

          if($equipo_conf_1_1 === 'cass' || $equipo_conf_1_1 === 'cass2'){

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
                case 'Cumple ASHRAE Standard 70':
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
                case 'Cumple ASHRAE Standard 70':
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
                case 'Cumple ASHRAE Standard 70':
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
                case 'Cumple ASHRAE Standard 70':
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
                case 'Cumple ASHRAE Standard 70':
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

                case 'Cumple ASHRAE Standard 70':
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

    public function price_form($id_select){
        $aux_costo_elec = explode("$", $id_select);
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
            return $costo_elec_aux;
}


public function num_form($id_select){

    $aux = explode(",",  $id_select);
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

                    return $cap_tot_aux;
}

public function cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$check_chiller,$factor_v,$factor_f,$am){
    $int_check_chiller = intval($check_chiller);

    if($int_check_chiller <= 7){
/*         return ProjectController::form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
*/        $funciones = new funciones();
       return $funciones->form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$factor_v,$factor_f,$am);
    }

    if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
/*             return ProjectController::form_pn_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m);
*/           /*  $funciones = new funciones();
           return $funciones->form_pn_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m); */
    }

}

public function cost_op_an_form_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$check_chiller,$factor_v,$factor_f,$am){
    $int_check_chiller = intval($check_chiller);

    if($int_check_chiller <= 7){
       $funciones = new funciones();
       return $funciones->cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$factor_v,$factor_f,$am);
    }

   /*  if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
       $funciones = new funciones();
       return $funciones->cost_op_an_form_kw_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
    } */
 }

 public function cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$check_chiller,$factor_v,$factor_f,$am){
    $int_check_chiller = intval($check_chiller);

    if($int_check_chiller <= 7){
        $funciones = new funciones();
        return $funciones->form_proyect_retro_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$factor_v,$factor_f,$am);
    }

   /*  if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
        $funciones = new funciones();
        return $funciones->form_proyect_retro_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
    } */

}

public function cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$check_chiller,$factor_v,$factor_f,$am){
    $int_check_chiller = intval($check_chiller);

    if($int_check_chiller <= 7){
        $funciones = new funciones();
        return $funciones->form_proyect_no_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$factor_v,$factor_f,$am);
    }

   /*  if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
        $funciones = new funciones();
        return $funciones->form_proyect_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
    } */

}

 public function save_results($enf,$id_project){
    $res_sum = 0;
    $cants = DB::table('solutions_project')
    ->where('id_project','=',$id_project)
    ->get();

    foreach($cants as $cant){
        $res_sum = $res_sum + $cant->cost_op_an;
    }

   $new_result = new ResultsProjectModel;
   $new_result->num_enf = $enf;
   $new_result->cost_op_an = $res_sum;
   $new_result->id_project = $id_project;
   $new_result->id_empresa=Auth::user()->id_empresa;
   $new_result->id_user=Auth::user()->id;
   $new_result->save();
}

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


