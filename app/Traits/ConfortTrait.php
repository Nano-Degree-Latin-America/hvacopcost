<?php

namespace App\Traits;

trait  ConfortTrait{

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
}
