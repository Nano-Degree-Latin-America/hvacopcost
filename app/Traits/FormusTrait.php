<?php

namespace App\Traits;

trait  FormusTrait{

    public function cost_op_an_form($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$check_chiller,$factor_v,$factor_f,$am){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){
           return $this->form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$factor_v,$factor_f,$am);
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
           return $this->cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$factor_v,$factor_f,$am);
        }

       /*  if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
           $funciones = new funciones();
           return $funciones->cost_op_an_form_kw_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        } */
     }

     public function cost_op_an_retro_tr($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$check_chiller,$factor_v,$factor_f,$am){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){

            return $this->form_proyect_retro_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$factor_v,$factor_f,$am);
        }

       /*  if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
            $funciones = new funciones();
            return $funciones->form_proyect_retro_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        } */

    }

    public function cost_op_an_form_kw_retro($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$check_chiller,$factor_v,$factor_f,$am){
        $int_check_chiller = intval($check_chiller);

        if($int_check_chiller <= 7){

            return $this->form_proyect_no_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l,$factor_v,$factor_f,$am);
        }

       /*  if($int_check_chiller > 7 && $int_check_chiller <= 10 ){
            $funciones = new funciones();
            return $funciones->form_proyect_chiller_kw($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_m,$yrs_l);
        } */

    }

    public function form_pn_no_chiller($tr,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_zm,$factor_v,$factor_f,$am){
        //((TR x 12000) x (Cooling Hours)  / (SEER) ) / 1000)
        //((TR /3.5) x (Cooling Hours) x (Costo Energía) / IPVL)/ 1000
       //((TR x cant)
       /* ((TR x 12000) x (Cooling Hours) /(SEER x ((1-Z)^Años de vida) x AM )/ 1000 */
       if($eficiencia_ene != 'IPLV' || $eficiencia_ene == 'IPLV (Kw/TR)'){
        $cant_aux = 12000;
       }

       /* if($eficiencia_ene == 'IPLV' || $eficiencia_ene == 'IPLV (Kw/TR)'){
        $cant_aux = 3.5;
       } */

       //(TR x 12000)
       $res_trx_cant = $tr * $cant_aux;

       //((TR x cant) x (Cooling Hours)
       $res_1er_parent = $res_trx_cant * $cooling_hrs;
       //((TR x 12000) x (Cooling Hours)  / (SEER x ((1-Z)^Años de vida) x AM )/

       //(1-Z)^Años de vida
       if($factor_zm == 'ASHRAE 180'){
        $z = 0.01;
       }

       if($factor_zm == 'Deficiente'){
        $z = 0.017;
       }

       if($factor_zm == 'Sin Mantenimiento'){
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

        $factor_m = $this->factor_m($t_e,$factor_zm);

        $res_5_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_m);

        $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1 + $res_4_parent1 + $res_5_parent1;

        $res_res_fact_m =  $res_parent_1 * $factor_f * $factor_c;

       return $res_res_fact_m;
    }

    public function cost_op_an_form_kw_no_chiller($kw,$eficiencia_ene,$cooling_hrs,$eficiencia_cant,$factor_s,$factor_d,$factor_t,$factor_c,$t_e,$factor_zm,$factor_v,$factor_f,$am){

        //(((Kw / 3.5) x 12000 )x (Cooling Hours)) / (SEER x (1-Z)^Años de vida) x AM) / 1000
                  //(((Kw / 3.5)



                  //$kw =  $solution_enf1->capacidad_tot;

                  $kw_3_5 = $kw / 3.5;
                  //(((Kw / 3.5) x 12000 )
                  $kw_a = $kw_3_5 * 12000;
                  $res_dividiendo = $kw_a * $cooling_hrs;
                  //(((Kw / 3.5) x 12000 )x (Cooling Hours)

                  if($factor_zm == 'ASHRAE 180'){
                    $z = 0.01;
                   }

                   if($factor_zm == 'Deficiente'){
                    $z = 0.017;
                   }

                   if($factor_zm == 'Sin Mantenimiento'){
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


                    $factor_m = $this->factor_m($t_e,$factor_zm);

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


       $factor_m = $this->factor_m($t_e,$factor_m);

       $res_5_parent1= $res_ene_apl_tot_enf_1 * floatval($factor_m);

       $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1 + $res_4_parent1 + $res_5_parent1;

       $res_res_fact_m =  $res_parent_1 * $factor_f * $factor_c;

     /*   $res_res_fact_m =  $res_res * $factor_m; */

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


                              $factor_m = $this->factor_m($t_e,$factor_m);

                              $res_5_parent1= $res_div_seer_a * floatval($factor_m);

                              $res_parent_1 = $res_1_parent1 + $res_2_parent1 + $res_3_parent1 + $res_4_parent1 + $res_5_parent1;

                              $res_res_fact_m =  $res_parent_1 * $factor_f * $factor_c;
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

    //chiller
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

}
