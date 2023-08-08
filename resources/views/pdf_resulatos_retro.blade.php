<!DOCTYPE html>
@inject('solutions','app\Http\Controllers\ResultadosController')
@inject('results','app\Http\Controllers\ResultadosController')
@inject('smasolutions','app\Http\Controllers\ResultadosController')
@inject('sumacap_term','app\Http\Controllers\ResultadosController')
@inject('graficas_capex_opex','app\Http\Controllers\ResultadosController')
@inject('desperdicio','app\Http\Controllers\ResultadosController')
@inject('conf_val','app\Http\Controllers\ResultadosController')
<html lang="es">

   <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Resultados</title>
    <link rel="stylesheet" href="../assets/css/style.css" media="all" />
    <style>
        @page {
                     margin:0px;
                 }

                 body {
                     margin-top: 1cm;
                     margin-left: .5cm;
                     margin-right: .5cm;
                     margin-bottom: 1.4cm;
                 }

                 header {
                     position: fixed;
                     top: 0cm;
                     left: 0cm;
                     right: 0cm;
                     height: 3cm;
                 }

                 /** Definir las reglas del pie de página **/
                 footer {
                     position: fixed;
                     bottom: 0cm;
                     left: 8cm;
                     right: 0cm;
                     height: 2cm;
                 }
   @import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');
   @import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');



   .font-roboto{
    font-family: 'ABeeZee', sans-serif;
}
.tarjet {
  background-color:#ffff;
  width: 100%;
  border-radius: 1% 1% 1% 1%;
  display: grid;
  border:1px solid;
}

.tarjet_sols {
 /*  background-color:#ffff; */
  width: 100%;
  display: grid;
}

.title_tarjet {
  background-color:#233064;
  width: 100%;
  border-radius: 1% 1% 0% 0%;
}

.title_tarjet_blue {
  background-color:#2c5282;
  width: 100%;
  border-radius: 1% 1% 0% 0%;
}

.title_style{
    font-size: 1.3rem;
    color: white;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
}

.container{
    width: 100%;
    display: flex;
}

.info_project_size_font{
    font-size: 13px;
    color:#2c5282;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
  /*   padding-top:10px; */
    /* padding-bottom:3px; */
    padding-right:15px;
    padding-left:15px;
}

.solutions_style_titles{
    font-size: 30px;
    color:white;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
    background-color:blue;
    padding:10px;
    width: 100%;
    margin: 10px;
}



/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33%;
}

/* Clear floats after the columns */
.tr_style{
    width:100% !important;
}

.td_style{
    width:50% !important;
    font-size:10px;
    margin: 0%;
}

.style_sol_elem_name{
    font-weight: bold;
    color:#2a4365;
    width:55% !important;

}

.style_sol_elem_value{
    font-weight: bold;
    color:#3182ce;
    width:45% !important;
    font-size:9px;
}
.label_style_sol{
    margin-left:5px;
}
.label_style_sol_val{

}

.title_tarjet_no_bg{
  width: 100%;
}



.title_style_no_bg{
    font-size: 1.3rem;
    color: #2a4365;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
}

.sol_base{
    width:100%;background-color: #ed8936;
    border_radius:5px;
}

.sol_ab{
    background-color: #2c5282;
    width:100%;
    border_radius:5px;
}

.cap_term{
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
    font-size:25px;
    color:#2c5282;
}

.unit_cap_term{
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
    margin-bottom:10px;
}

.unit_opex{
    font-family: 'ABeeZee', sans-serif;
     font-weight: bold;
     margin-bottom:10px;
}

.title_cap_term{
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
}

.cant_green{
    color:#33cc33;
    font-size:30px;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
}

.column_x_2 {
  float: left;
  width: 50%;
}

.dif_sols_subtitle{
    color:#2c5282;
    font-size:20px;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
}

.porcent_yrs_style{
            font-size:25px;
            font-family: 'ABeeZee', sans-serif;
            font-weight: bold;
            padding:5px;
        }

.desp_elect_style{
            font-size:30px;
            font-family: 'ABeeZee', sans-serif;
            font-weight: bold;
            padding:3px;
}

        .sol_ab_yrs_style{
            font-size:20px;
            font-family: 'ABeeZee', sans-serif;
            font-weight: bold;
            color:#3182ce;
        }

        .sol_ab_yrs_style_confort{
            font-size:18px;
            font-family: 'ABeeZee', sans-serif;
            font-weight: bold;
            color:#3182ce;
        }

        .yrs_style{
            font-size:20px;
            font-family: 'ABeeZee', sans-serif;
            font-weight: bold;
            color:#2a4365;
        }
        .porcent_analis_sus_yrs_style{
            font-size:30px;
            font-family: 'ABeeZee', sans-serif;
            font-weight: bold;
            padding:5px;
            color: #ed8936;
        }

        .ancho_rang{
        width:1.25rem;
    height:3rem;
    background: rgb(255,0,56);
    background: linear-gradient(90deg, rgba(255,0,56,1) 0%, rgba(251,255,4,1) 50%, rgba(29,255,0,1) 100%);
    }

    .hidden{
        display:none;
    }

    .puntero_medidas{
    width: 10px; height:35px;
    margin-top:5px;
    z-index: -1;
    }

    .tarjet_anal_ene {
  background-color:#ffff;
  width: 100%;
  display: grid;
}
	</style>
</head>

<body>

   {{--  <header>
            <img src="header.png" width="100%" height="100%"/>
        </header> --}}

        <footer>
            <img  src="../public/assets/images/Logotipo-HVACOPCOST.png" width="150px" height="80px"/>
        </footer>

    <div class="tarjet">
        <div align="center" class="title_tarjet">
            <label  class="title_style">ANÁLISIS ENERGÉTICO - ENFRIAMIENTO</label>
        </div>
        <?php  $tar_ele=$solutions->tar_elec($id_project) ?>
        <div>
            <table class="">
                <tbody>
                  <tr>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,9)}}</label></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Región:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td style="padding-top:10px;"  class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
                  </tr>

                </tbody>
              </table>
              <table class="">
                <tbody>
                    <tr>
                        <td class="info_project_size_font"><label for="">Tipo Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->tipo_edi}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Horas Enfriamiento Anual:</label> <label style="color:#3182ce;">{{number_format($tar_ele->coolings_hours)}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Tarifa Elécrtica:</label> <label style="color:#3182ce;">{{$tar_ele->costo_elec}} $/Kwh</label></td></td>
                      </tr>

                </tbody>
              </table>

        </div>
    </div>

    <?php  $solutions=$solutions->solutions($id_project) ?>
    <div style="border-radius: 1% 1% 1% 1%;
    border:1px solid;margin-top:8px;">
    <div  style="margin-top:5px; height:30%;" class="tarjet_sols">
        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_base" style="width:100%;">
                        <label style="margin-left:28px;" class="title_style">Solución Existente</label>
                    </div>
                    @foreach ($solutions as $solution)
                        @if ($solution->num_enf == 1 && $solution->num_sol == 1  )
                            <div style="width:94%;">
                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                            @if ($solution->unidad_hvac == 1)
                                            Paquetes (RTU)
                                            @endif
                                            @if ($solution->unidad_hvac == 2)
                                            Split DX
                                            @endif
                                            @if ($solution->unidad_hvac == 3)
                                            VRF No Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 4)
                                            VRF Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 5)
                                            PTAC/VTAC
                                            @endif
                                            @if ($solution->unidad_hvac == 6)
                                            WSHP
                                            @endif
                                            @if ($solution->unidad_hvac == 7)
                                            Minisplit Inverter
                                            @endif
                                            @if ($solution->unidad_hvac == 8)
                                           Chiller
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                            @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->name_disenio)<=21)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->name_disenio)>21)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->marca)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->marca)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Marca</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->marca}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->modelo)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->modelo)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Modelo</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->modelo}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->yrs_vida)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->yrs_vida)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Años de vida</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->yrs_vida}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Eficiencia Original</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene}} {{$solution->eficencia_ene_cant}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->name_t_control)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->name_t_control)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->dr_name)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->dr_name)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->mantenimiento)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->mantenimiento)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Recuperación</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Anual Reparaciónes</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->cost_an_re)}}</div>
                                    </div>
                                </div>



                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>



                <div style="margin-left:15px; margin-right:15px;">
                    <div>
                        <div style="margin-right:5px;margin-top:5px;" class="column" >
                            <div style="background-color: #2c5282;width:100%; border_radius:5px;">
                                <label style="margin-left:60px;" class="title_style">Solución A</label>
                            </div>
                            @foreach ($solutions as $solution)
                            @if ($solution->num_enf == 2 && $solution->num_sol == 1  )
                            <div style="width:94%;">
                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                            @if ($solution->unidad_hvac == 1)
                                            Paquetes (RTU)
                                            @endif
                                            @if ($solution->unidad_hvac == 2)
                                            Split DX
                                            @endif
                                            @if ($solution->unidad_hvac == 3)
                                            VRF No Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 4)
                                            VRF Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 5)
                                            PTAC/VTAC
                                            @endif
                                            @if ($solution->unidad_hvac == 6)
                                            WSHP
                                            @endif
                                            @if ($solution->unidad_hvac == 7)
                                            Minisplit Inverter
                                            @endif
                                            @if ($solution->unidad_hvac == 8)
                                           Chiller
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                            @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->name_disenio)<=21)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->name_disenio)>21)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->marca)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->marca)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Marca</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->marca}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->modelo)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->modelo)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Modelo</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->modelo}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->yrs_vida)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->yrs_vida)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Años de vida</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->yrs_vida}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Eficiencia Original</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene}} {{$solution->eficencia_ene_cant}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->name_t_control)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->name_t_control)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->dr_name)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->dr_name)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->mantenimiento)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->mantenimiento)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Inversión Inicial (CAPEX)</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Anual Reparaciónes</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->cost_an_re)}}</div>
                                    </div>
                                </div>


                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>



                <div style="margin-left:15px; margin-right:15px; ">
                    <div>
                        <div style="margin-right:5px;margin-top:5px;" class="column" >
                            <div style="width:100%;background-color:#2c5282;border_radius:5px;">
                                <label style="margin-left:60px;" class="title_style">Solución B</label>
                            </div>
                            @foreach ($solutions as $solution)
                                @if ($solution->num_enf == 3 && $solution->num_sol == 1  )
                            <div style="width:94%;">
                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                            @if ($solution->unidad_hvac == 1)
                                            Paquetes (RTU)
                                            @endif
                                            @if ($solution->unidad_hvac == 2)
                                            Split DX
                                            @endif
                                            @if ($solution->unidad_hvac == 3)
                                            VRF No Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 4)
                                            VRF Ductados
                                            @endif
                                            @if ($solution->unidad_hvac == 5)
                                            PTAC/VTAC
                                            @endif
                                            @if ($solution->unidad_hvac == 6)
                                            WSHP
                                            @endif
                                            @if ($solution->unidad_hvac == 7)
                                            Minisplit Inverter
                                            @endif
                                            @if ($solution->unidad_hvac == 8)
                                           Chiller
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                            @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->name_disenio)<=21)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->name_disenio)>21)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->marca)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->marca)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Marca</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->marca}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->modelo)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->modelo)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Modelo</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->modelo}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->yrs_vida)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->yrs_vida)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Años de vida</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->yrs_vida}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Eficiencia Original</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene}} {{$solution->eficencia_ene_cant}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->name_t_control)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->name_t_control)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->dr_name)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->dr_name)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene"
                                @if (strlen($solution->mantenimiento)<=20)
                                style="margin-left: 5px;margin-top:15px;"
                                @endif
                                @if (strlen($solution->mantenimiento)>20)
                                style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                @endif
                                >
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Inversión Inicial (CAPEX)</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                    </div>
                                </div>

                                <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                    <div>
                                        <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Anual Reparaciónes</div>
                                        <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->cost_an_re)}}</div>
                                    </div>
                                </div>


                            </div>
                            @endif
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            {{-- 2 --}}
            <div style="margin-top:8px; height:30%;" class="tarjet_sols">
                <div style="margin-left:15px; margin-right:15px;">
                    <div>
                        <div style="margin-right:5px;margin-top:5px;" class="column" >

                            @foreach ($solutions as $solution)
                                @if ($solution->num_enf == 1 && $solution->num_sol == 2  )
                                    <div style="width:94%;border-top:1px solid;border-color:#e2e8f0;">
                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">{{$solution->eficencia_ene}}</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene_cant}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->unidad_hvac == 1)
                                                    Paquetes (RTU)
                                                    @endif
                                                    @if ($solution->unidad_hvac == 2)
                                                    Split DX
                                                    @endif
                                                    @if ($solution->unidad_hvac == 3)
                                                    VRF No Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 4)
                                                    VRF Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 5)
                                                    PTAC/VTAC
                                                    @endif
                                                    @if ($solution->unidad_hvac == 6)
                                                    WSHP
                                                    @endif
                                                    @if ($solution->unidad_hvac == 7)
                                                    Minisplit Inverter
                                                    @endif
                                                    @if ($solution->unidad_hvac == 8)
                                                   Chiller
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_disenio)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_disenio)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_t_control)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_t_control)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->dr_name)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->dr_name)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->mantenimiento)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->mantenimiento)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Inversión Inicial (CAPEX)</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        <div style="margin-left:15px; margin-right:15px;">
                            <div>
                                <div style="margin-right:5px;margin-top:5px;" class="column" >

                                    @foreach ($solutions as $solution)
                                    @if ($solution->num_enf == 2 && $solution->num_sol == 2  )
                                    <div style="width:94%;border-top:1px solid;border-color:#e2e8f0;">
                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">{{$solution->eficencia_ene}}</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene_cant}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->unidad_hvac == 1)
                                                    Paquetes (RTU)
                                                    @endif
                                                    @if ($solution->unidad_hvac == 2)
                                                    Split DX
                                                    @endif
                                                    @if ($solution->unidad_hvac == 3)
                                                    VRF No Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 4)
                                                    VRF Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 5)
                                                    PTAC/VTAC
                                                    @endif
                                                    @if ($solution->unidad_hvac == 6)
                                                    WSHP
                                                    @endif
                                                    @if ($solution->unidad_hvac == 7)
                                                    Minisplit Inverter
                                                    @endif
                                                    @if ($solution->unidad_hvac == 8)
                                                   Chiller
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_disenio)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_disenio)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_t_control)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_t_control)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->dr_name)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->dr_name)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->mantenimiento)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->mantenimiento)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Inversión Inicial (CAPEX)</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        <div style="margin-left:15px; margin-right:15px;">
                            <div>
                                <div style="margin-right:5px;margin-top:5px;" class="column" >

                                    @foreach ($solutions as $solution)
                                        @if ($solution->num_enf == 3 && $solution->num_sol == 2  )
                                    <div style="width:94%; border-top:1px solid;border-color:#e2e8f0;">
                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">{{$solution->eficencia_ene}}</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene_cant}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->unidad_hvac == 1)
                                                    Paquetes (RTU)
                                                    @endif
                                                    @if ($solution->unidad_hvac == 2)
                                                    Split DX
                                                    @endif
                                                    @if ($solution->unidad_hvac == 3)
                                                    VRF No Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 4)
                                                    VRF Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 5)
                                                    PTAC/VTAC
                                                    @endif
                                                    @if ($solution->unidad_hvac == 6)
                                                    WSHP
                                                    @endif
                                                    @if ($solution->unidad_hvac == 7)
                                                    Minisplit Inverter
                                                    @endif
                                                    @if ($solution->unidad_hvac == 8)
                                                   Chiller
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_disenio)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_disenio)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_t_control)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_t_control)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->dr_name)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->dr_name)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->mantenimiento)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->mantenimiento)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Inversión Inicial (CAPEX)</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
            </div>

            {{-- 3 --}}
            <div style="margin-top:8px; height:30%;" class="tarjet_sols">
                <div style="margin-left:15px; margin-right:15px;">
                    <div>
                        <div style="margin-right:5px;margin-top:0px;" class="column" >

                            @foreach ($solutions as $solution)
                                @if ($solution->num_enf == 1 && $solution->num_sol == 3  )
                                    <div style="width:94%;border-top:1px solid;border-color:#e2e8f0;">
                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">{{$solution->eficencia_ene}}</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene_cant}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->unidad_hvac == 1)
                                                    Paquetes (RTU)
                                                    @endif
                                                    @if ($solution->unidad_hvac == 2)
                                                    Split DX
                                                    @endif
                                                    @if ($solution->unidad_hvac == 3)
                                                    VRF No Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 4)
                                                    VRF Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 5)
                                                    PTAC/VTAC
                                                    @endif
                                                    @if ($solution->unidad_hvac == 6)
                                                    WSHP
                                                    @endif
                                                    @if ($solution->unidad_hvac == 7)
                                                    Minisplit Inverter
                                                    @endif
                                                    @if ($solution->unidad_hvac == 8)
                                                   Chiller
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_disenio)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_disenio)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_t_control)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_t_control)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->dr_name)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->dr_name)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->mantenimiento)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->mantenimiento)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Inversión Inicial (CAPEX)</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        <div style="margin-left:15px; margin-right:15px;">
                            <div>
                                <div style="margin-right:5px;margin-top:0px;" class="column" >

                                    @foreach ($solutions as $solution)
                                    @if ($solution->num_enf == 2 && $solution->num_sol == 3  )
                                    <div style="width:94%;border-top:1px solid;border-color:#e2e8f0;">
                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">{{$solution->eficencia_ene}}</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene_cant}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->unidad_hvac == 1)
                                                    Paquetes (RTU)
                                                    @endif
                                                    @if ($solution->unidad_hvac == 2)
                                                    Split DX
                                                    @endif
                                                    @if ($solution->unidad_hvac == 3)
                                                    VRF No Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 4)
                                                    VRF Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 5)
                                                    PTAC/VTAC
                                                    @endif
                                                    @if ($solution->unidad_hvac == 6)
                                                    WSHP
                                                    @endif
                                                    @if ($solution->unidad_hvac == 7)
                                                    Minisplit Inverter
                                                    @endif
                                                    @if ($solution->unidad_hvac == 8)
                                                   Chiller
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_disenio)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_disenio)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_t_control)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_t_control)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->dr_name)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->dr_name)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->mantenimiento)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->mantenimiento)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Inversión Inicial (CAPEX)</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>



                        <div style="margin-left:15px; margin-right:15px;">
                            <div>
                                <div style="margin-right:5px;margin-top:0px;" class="column" >

                                    @foreach ($solutions as $solution)
                                        @if ($solution->num_enf == 3 && $solution->num_sol == 3  )
                                    <div style="width:94%; border-top:1px solid;border-color:#e2e8f0;">
                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:3px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Capacidad Térmica</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">{{$solution->eficencia_ene}}</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->eficencia_ene_cant}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Equipos HVAC</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->unidad_hvac == 1)
                                                    Paquetes (RTU)
                                                    @endif
                                                    @if ($solution->unidad_hvac == 2)
                                                    Split DX
                                                    @endif
                                                    @if ($solution->unidad_hvac == 3)
                                                    VRF No Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 4)
                                                    VRF Ductados
                                                    @endif
                                                    @if ($solution->unidad_hvac == 5)
                                                    PTAC/VTAC
                                                    @endif
                                                    @if ($solution->unidad_hvac == 6)
                                                    WSHP
                                                    @endif
                                                    @if ($solution->unidad_hvac == 7)
                                                    Minisplit Inverter
                                                    @endif
                                                    @if ($solution->unidad_hvac == 8)
                                                   Chiller
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Equipo</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">
                                                    @if ($solution->tipo_equipo == 'basico')
                                            Básico
                                            @endif

                                            @if ($solution->tipo_equipo == 'c_economizador')
                                            c/ Economizador
                                            @endif

                                            @if ($solution->tipo_equipo == 'manejadora')
                                            Manejadora
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil')
                                            Fancoil
                                            @endif

                                            @if ($solution->tipo_equipo == 'unid_pred')
                                            Unidad de Presición
                                            @endif

                                            @if ($solution->tipo_equipo == 'ca_pi_te')
                                            Cassette y Piso Techo
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_lsp')
                                            Fancoil (LSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'man')
                                            Manejadoras
                                            @endif

                                            @if ($solution->tipo_equipo == 'fancoil_hsp')
                                            Fancoil (HSP)
                                            @endif

                                            @if ($solution->tipo_equipo == 'vert')
                                            Vertical
                                            @endif

                                            @if ($solution->tipo_equipo == 'horz')
                                            Horizontal
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_cer')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'agu_cir_abr')
                                            Agua Circuito Cerrado
                                            @endif

                                            @if ($solution->tipo_equipo == 'pa_pi_te')
                                            Pared - Piso - Techo
                                            @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_disenio)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_disenio)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Diseño</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_disenio}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->name_t_control)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->name_t_control)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Tipo Control</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->name_t_control}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->dr_name)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->dr_name)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Difusor o Rejilla</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->dr_name}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene"
                                        @if (strlen($solution->mantenimiento)<=20)
                                        style="margin-left: 5px;margin-top:15px;"
                                        @endif
                                        @if (strlen($solution->mantenimiento)>20)
                                        style="margin-left: 5px;margin-top:15px;margin-bottom:30px;"
                                        @endif
                                        >
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">{{$solution->mantenimiento}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;margin-bottom:30px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Inversión Inicial (CAPEX)</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->val_aprox)}}</div>
                                            </div>
                                        </div>

                                        <div style="width:100%;" class="tarjet_anal_ene" style="margin-left: 5px;margin-top:15px;">
                                            <div>
                                                <div style="float: left; width: 50%;font-size:10px;--text-opacity: 1;color: #2a4365;font-weight: 700;">Costo Mantenimiento</div>
                                                <div style="float: right; width: 50%;font-size:10px;--text-opacity: 1;color: #3182ce;font-weight: 700;">${{number_format($solution->costo_mantenimiento)}}</div>
                                            </div>
                                        </div>

                                    </div>
                                    @endif
                                @endforeach
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    <div style="page-break-after:always;"></div>

    <div class="tarjet">
        <div align="center" class="title_tarjet">
            <label  class="title_style">RESULTADOS ANÁLISIS ENERGÉTICO</label>
        </div>

        <div>
            <table class="">
                <tbody>
                  <tr>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,9)}}</label></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Región:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
                  </tr>

                </tbody>
              </table>
              <table class="">
                <tbody>
                    <tr>
                        <td class="info_project_size_font"><label for="">Tipo Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->tipo_edi}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Horas Enfriamiento Anual:</label> <label style="color:#3182ce;">{{number_format($tar_ele->coolings_hours)}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Tarifa Elécrtica:</label> <label style="color:#3182ce;">{{$tar_ele->costo_elec}} $/Kwh</label></td></td>
                      </tr>

                </tbody>
              </table>

        </div>
    </div>

    <div  style="margin-top:5px; height:20%;" class="tarjet">
        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_base" style="width:100%;">
                        <label style="margin-left:28px;" class="title_style">Solución Existente</label>
                    </div>
                    <?php  $result1=$results->result_1($id_project,1) ?>
                    @if ($result1 ==! null)
                    <?php  $sumaopex_1=$smasolutions->sumaopex($id_project,$result1->num_enf) ?>
                    <?php  $sumacap_term_1=$smasolutions->sumacap_term($id_project,$result1->num_enf) ?>
                    <?php  $unid_med_1=$smasolutions->unid_med($id_project,$result1->num_enf) ?>
                    @elseif($result1 === null)
                    <?php $sumaopex_1=0?>
                   <?php $sumacap_term_1=0?>
                   <?php $unid_med_1=""?>
                    @endif
                    {{-- Capacidad Total --}}
                    <table class="">
                        <tbody style="width: 100%;">
                            @if ($unid_med_1 !== "")

                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_1}}</label>
                                <label style="" class="unit_cap_term" for="">{{$unid_med_1->unid_med}}</label>
                            </td>
                            @endif

                            @if ($unid_med_1 === "")
                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_1}}</label>
                                <label style="" class="unit_cap_term" for="">{{$unid_med_1->unid_med}}</label>
                            </td>
                           @endif
                        </tbody>
                    </table>
                    {{-- Consumo anual opex --}}
                    <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">{{number_format($sumaopex_1)}}</label>
                                  <label style="" class="unit_opex" for="">Kw/hr</label>
                                </td>
                      </tbody>
                  </table>
                </div>
            </div>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_ab">
                        <label style="margin-left:60px;" class="title_style">Solución A</label>
                    </div>
                    <?php  $result2=$results->result_1($id_project,2) ?>
                     @if ($result2 ==! null)
                     <?php  $sumaopex_2=$smasolutions->sumaopex($id_project,$result2->num_enf) ?>
                     <?php  $sumacap_term_2=$smasolutions->sumacap_term($id_project,$result2->num_enf) ?>
                      <?php  $unid_med_2=$smasolutions->unid_med($id_project,$result2->num_enf) ?>
                     @elseif($result2 === null)
                    <?php $sumaopex_2=0?>
                    <?php $sumacap_term_2=0?>
                   <?php $unid_med_2=""?>
                    @endif

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">
                        @if ($unid_med_2 !== "")
                            <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_2}}</label>
                                <label  class="unit_cap_term" for="">{{$unid_med_2->unid_med}}</label>
                              </td>
                        @endif

                        @if ($unid_med_2 === "")
                        <tr class="tr_style">
                         <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                        </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_2}}</label>
                            <label  class="unit_cap_term" for="">{{$unid_med_2}}</label>
                        </td>
                      @endif

                      </tbody>
                  </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">{{number_format($sumaopex_2)}}</label>
                                <label  class="unit_opex" for="">Kw/hr</label>
                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_ab">
                        <label style="margin-left:60px;" class="title_style">Solución B</label>
                    </div>
                    <?php  $result3=$results->result_1($id_project,3) ?>
                    @if ($result3 ==! null)
                    <?php  $sumaopex_3=$smasolutions->sumaopex($id_project,$result3->num_enf) ?>
                    <?php  $sumacap_term_3=$smasolutions->sumacap_term($id_project,$result3->num_enf) ?>
                    <?php  $unid_med_3=$smasolutions->unid_med($id_project,$result3->num_enf) ?>
                    @elseif($result3 === null)
                    <?php $sumaopex_3=0?>
                   <?php $sumacap_term_3=0?>
                   <?php $unid_med_3=""?>
                    @endif
                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">
                        @if ($unid_med_3 !== "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_3}}</label>
                                <label class="unit_cap_term" for="">{{$unid_med_3->unid_med}}</label>
                              </td>
                        @endif

                        @if ($unid_med_3 === "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:100px;" class="cap_term" for="">{{$sumacap_term_3}}</label>
                                <label class="unit_cap_term" for="">{{$unid_med_3}}</label>
                              </td>
                        @endif

                      </tbody>
                  </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class="">
                                @if (number_format($sumaopex_3/$tar_ele->costo_elec) <= 0)
                                <label style="margin-left:90px;" class="cap_term" for="">{{number_format($sumaopex_3)}}</label>
                                <label  class="unit_cap_term" for="">Kw/hr</label>
                                @endif

                                @if (number_format($sumaopex_3/$tar_ele->costo_elec) > 0)
                                <label style="margin-left:60px;" class="cap_term" for="">{{number_format($sumaopex_3)}}</label>
                                <label  class="unit_cap_term" for="">Kw/hr</label>
                                @endif

                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <?php  $unidad_area=$results->unidad_area($id_project,1,$sumaopex_1,$tar_ele->costo_elec) ?>

    {{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
    <div style="margin-top:5px; height:13%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">Ahorro Anual Energía – Diferencia entre Soluciones<b style="color:#ed8936;">(Kw/hr año)</b></p>
        </div>
        <?php  $results_aux=$results->results($id_project) ?>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                @foreach ($results_aux as $solution)
                @if (count($results_aux) == 1)

                @endif

                @if (count($results_aux) == 2)
                @if ($solution->num_enf == 1)
                <?php  $dif_1=$smasolutions->dif_1($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <label style="margin-left:100px;" class="dif_sols_subtitle">Solución Existente v/s A</label>
                    </div>
                    <div style="width:100%;">
                        <label style="margin-left:150px;" class="cant_green">{{number_format($dif_1)}}</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <label style="margin-left:50px;" class="dif_sols_subtitle">Solución Existente v/s B</label>
                    </div>
                    <div style="width:100%;">
                        <label style="margin-left:150px;" class="cant_green">0</label>
                    </div>
                </div>
                @endif
                @endif

                @if (count($results_aux) == 3)
                @if ($solution->num_enf == 1)
                <?php  $dif_1=$smasolutions->dif_1($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <label style="margin-left:100px;" class="dif_sols_subtitle">Solución Existente v/s A</label>
                    </div>
                    <div style="width:100%;">
                        <label style="margin-left:150px;" class="cant_green">{{number_format($dif_1)}}</label>
                    </div>
                </div>
                @endif
                @if ($solution->num_enf == 2)
                <?php  $dif_2=$smasolutions->dif_2($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <label style="margin-left:50px;" class="dif_sols_subtitle">Solución Existente v/s B</label>
                    </div>
                    <div style="width:100%;">
                        <label style="margin-left:90px;" class="cant_green">{{number_format($dif_2)}}</label>
                    </div>
                 </div>
                 @endif
                 @endif
                 @endforeach
            </div>
        </div>

    </div>

        {{-- Consumo de Energía HVAC por Área (Kwh/ m² )
 --}}
{{-- title_style_no_bg --}}
<div style="margin-top:9px; height:11%;" class="tarjet">
    <div align="center"  class="title_tarjet_no_bg">
        <p  class="title_style_no_bg">Consumo de Energía HVAC por Área <b style="color:#ed8936;">(Kwh/@if($unidad_area == 'mc')m²@endif @if($unidad_area == 'ft')ft²@endif)</b></p>
    </div>
    <div style="margin-left:15px; margin-right:15px;">
        <div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div style="width:100%;">
                    @if ($result1 ==! null)
                    <?php  $result_area_1=$results->result_area($id_project,$sumaopex_1) ?>
                    <label style="margin-left:60px;" class="cant_green">{{number_format($result_area_1, 2)}}</label>
                    @else
                    <label style="margin-left:60px;" class="cant_green">0</label>
                    @endif
                </div>
            </div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div style="width:100%;">
                    @if ($result2 ==! null)
                    <?php  $result_area_2=$results->result_area($id_project,$sumaopex_2) ?>
                    <label style="margin-left:60px;" class="cant_green">{{number_format($result_area_2, 2)}}</label>
                    @else
                    <label style="margin-left:60px;" class="cant_green">0</label>
                    @endif
                </div>
            </div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div style="width:100%;">
                    @if ($result3 ==! null)
                    <?php  $result_area_3=$results->result_area($id_project,$sumaopex_3) ?>
                    <label style="margin-left:60px;" class="cant_green">{{number_format($result_area_3, 2)}}</label>
                    @else
                    <label style="margin-left:60px;" class="cant_green">0</label>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
     {{-- 3 --}}
     <div style="page-break-after:always;"></div>
     <div class="tarjet">
        <div align="center" class="title_tarjet">
            <label  class="title_style">RESULTADOS ANÁLISIS FINANCIERO</label>
        </div>

        <div>
            <table class="">
                <tbody>
                  <tr>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,9)}}</label></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Región:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
                  </tr>

                </tbody>
              </table>
              <table class="">
                <tbody>
                    <tr>
                        <td class="info_project_size_font"><label for="">Tipo Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->tipo_edi}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Horas Enfriamiento Anual:</label> <label style="color:#3182ce;">{{number_format($tar_ele->coolings_hours)}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Tarifa Elécrtica:</label> <label style="color:#3182ce;">{{$tar_ele->costo_elec}} $/Kwh</label></td></td>
                      </tr>

                </tbody>
              </table>

        </div>
    </div>
    {{-- captermi res_anal_financioaeror --}}
    <div  style="margin-top:5px; height:28%;" class="tarjet">
        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_base" style="width:100%;">
                        <label style="margin-left:28px;" class="title_style">Solución Existente</label>
                    </div>
                        {{-- Capacidad Total --}}
                        @if ($result1 ==! null)
                        <?php  $sumaopex_1=$smasolutions->sumaopex($id_project,$result1->num_enf) ?>
                        <?php  $sumacap_term_1=$smasolutions->sumacap_term($id_project,$result1->num_enf) ?>
                        <?php  $inv_ini_1=$smasolutions->inv_ini($id_project,$result1->num_enf) ?>
                        <?php  $unid_med_1=$smasolutions->unid_med($id_project,$result1->num_enf) ?>
                        @elseif($result1 === null)
                        <?php $sumaopex_1=0?>
                        <?php $sumacap_term_1=0?>
                        <?php $inv_ini_1=0?>
                        <?php $unid_med_1=""?>
                        @endif
                    <table class="">
                        <tbody style="width: 100%;">
                            @if ($unid_med_1 !== "")
                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_1}}</label>
                                    <label style="" class="unit_cap_term" for="">{{$unid_med_1->unid_med}}</label>
                            </td>
                            @endif

                            @if ($unid_med_1 === "")
                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_1}}</label>
                                    <label style="" class="unit_cap_term" for="">{{$unid_med_1}}</label>
                            </td>
                            @endif

                        </tbody>
                    </table>
                    {{-- inv iniciaol --}}
                    <table class="">
                        <tbody style="width: 100%;">

                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:50px;" class="title_cap_term" for="">Inversión Inicial</label></td>
                                </tr>

                                <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">${{number_format($inv_ini_1)}}</label>
                                  </td>
                        </tbody>
                    </table>
                    {{-- Consumo anual opex --}}
                    <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">${{number_format($sumaopex_1*$tar_ele->costo_elec)}}</label>

                                </td>
                      </tbody>
                  </table>
                </div>
            </div>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_ab">
                        <label style="margin-left:60px;" class="title_style">Solución A</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">
                        @if ($result2 ==! null)
                        <?php  $sumaopex_2=$smasolutions->sumaopex($id_project,$result2->num_enf) ?>
                        <?php  $sumacap_term_2=$smasolutions->sumacap_term($id_project,$result2->num_enf) ?>
                        <?php  $inv_ini_2=$smasolutions->inv_ini($id_project,$result2->num_enf) ?>
                        <?php  $unid_med_2=$smasolutions->unid_med($id_project,$result2->num_enf) ?>
                        @elseif($result2 === null)
                        <?php $sumaopex_2=0?>
                        <?php $inv_ini_2=0?>
                        <?php $sumacap_term_2=0?>
                        <?php $unid_med_2=""?>
                        @endif

                        @if ($unid_med_2 !== "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                        </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_2}}</label>
                            <label  class="unit_cap_term" for="">{{$unid_med_2->unid_med}}</label>
                        </td>
                        @endif

                        @if ($unid_med_2 === "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                        </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_2}}</label>
                            <label  class="unit_cap_term" for="">{{$unid_med_2}}</label>
                        </td>
                        @endif



                      </tbody>
                  </table>
                  {{-- inv iniciaol --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:50px;" class="title_cap_term" for="">Inversión Inicial</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">$ {{number_format($inv_ini_2)}}</label>
                              </td>
                    </tbody>
                </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">$ {{number_format($sumaopex_2*$tar_ele->costo_elec)}}</label>

                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_ab">
                        <label style="margin-left:60px;" class="title_style">Solución B</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">
                        @if ($result3 ==! null)
                        <?php  $sumaopex_3=$smasolutions->sumaopex($id_project,$result3->num_enf) ?>
                        <?php  $sumacap_term_3=$smasolutions->sumacap_term($id_project,$result3->num_enf) ?>
                        <?php  $inv_ini_3=$smasolutions->inv_ini($id_project,$result3->num_enf) ?>
                        <?php  $unid_med_3=$smasolutions->unid_med($id_project,$result3->num_enf) ?>
                        @elseif($result3 === null)
                        <?php $sumaopex_3=0?>
                    <?php $sumacap_term_3=0?>
                    <?php $inv_ini_3=0?>
                    <?php $unid_med_3=""?>
                        @endif

                        @if ($unid_med_3 !== "")
                          <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                          </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_3}}</label>
                         <label class="unit_cap_term" for="">{{$unid_med_3->unid_med}}</label>
                        </td>
                        @endif

                        @if ($unid_med_3 === "")
                          <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                          </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:100px;" class="cap_term" for="">{{$sumacap_term_3}}</label>
                         <label class="unit_cap_term" for="">{{$unid_med_3}}</label>
                        </td>
                        @endif
                      </tbody>
                  </table>
                  {{-- inv iniciaol --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:50px;" class="title_cap_term" for="">Inversión Inicial</label></td>
                            </tr>

                            <td style="width: 100%;" class="">
                                @if (number_format($inv_ini_3) <= 0 )
                                <label style="margin-left:80px;" class="cap_term" for="">
                                    $ {{number_format($inv_ini_3)}}
                                </label>
                                @endif

                                @if (number_format($inv_ini_3) > 0 )
                                <label style="margin-left:60px;" class="cap_term" for="">
                                    $ {{number_format($inv_ini_3)}}
                                </label>
                                @endif

                              </td>
                    </tbody>
                </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class="">
                                @if (number_format($sumaopex_3) <= 0 )
                                <label style="margin-left:80px;" class="cap_term" for="">$ {{number_format($sumaopex_3*$tar_ele->costo_elec)}}</label>
                                @endif

                                @if (number_format($sumaopex_3) > 0 )
                                <label style="margin-left:60px;" class="cap_term" for="">$ {{number_format($sumaopex_3*$tar_ele->costo_elec)}}</label>
                                @endif
                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    {{-- nversión Inicial (CAPEX) por Área ($/m²) --}}
    {{-- <div style="margin-top:5px; height:11%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">Inversión Inicial (CAPEX) por Área<b style="color:#ed8936;">($/{{$uni_med1 = ($unidad_area == 'mc') ? 'm²' : 'ft²'}})</b></p>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <?php  $inv_ini_ca_ar_1=$smasolutions->inv_ini_ca_ar($id_project,$result1->num_enf) ?>
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">{{number_format($inv_ini_ca_ar_1,1)}}</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        @if ($result2!==null)
                        <?php  $inv_ini_ca_ar_2=$smasolutions->inv_ini_ca_ar($id_project,$result2->num_enf) ?>
                        <label style="margin-left:60px;" class="cant_green">{{number_format($inv_ini_ca_ar_2,1)}}</label>
                        @endif

                        @if ($result2===null)
                        <label style="margin-left:60px;" class="cant_green">0</label>
                        @endif
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        @if ($result3!==null)
                        <?php  $inv_ini_ca_ar_3=$smasolutions->inv_ini_ca_ar($id_project,$result3->num_enf) ?>
                        <label style="margin-left:60px;" class="cant_green">{{number_format($inv_ini_ca_ar_3,1)}}</label>
                        @endif

                        @if ($result3===null)
                        <label style="margin-left:60px;" class="cant_green">0</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
{{-- Consumo de Energía (OPEX) por Área --}}
    {{-- <div style="margin-top:5px; height:11%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">Consumo de Energía (OPEX) por Área<b style="color:#ed8936;">($/m²)</b></p>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">{{number_format($sumaopex_1/$tar_ele->area,1)}}</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        @if ($result2!==null)
                        <label style="margin-left:60px;" class="cant_green">{{number_format($sumaopex_2/$tar_ele->area,1)}}</label>
                        @endif

                        @if ($result2===null)
                        <label style="margin-left:60px;" class="cant_green">0</label>
                        @endif
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        @if ($result3!==null)
                        <label style="margin-left:60px;" class="cant_green">{{number_format($sumaopex_3/$tar_ele->area,1)}}</label>
                        @endif

                        @if ($result3===null)
                        <label style="margin-left:60px;" class="cant_green">0</label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div> --}}



{{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
<div style="margin-top:5px; height:14%;" class="tarjet">
    <div align="center" class="title_tarjet_no_bg">
        <p  class="title_style_no_bg">Ahorro Anual de Costo Energético – Entre Soluciones</p>
    </div>
    @if (count($results_aux)>1)
    <div style="margin-left:15px; margin-right:15px;">
        <div>
            @foreach ($results_aux as $solution)
            @if (count($results_aux) == 1)

            @endif

            @if (count($results_aux) == 2)
            @if ($solution->num_enf == 1)
            <?php  $dif_1_cost=$smasolutions->dif_1_cost($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>

            <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                <div style="width:100%;">
                    <label style="margin-left:100px;" class="dif_sols_subtitle">Solución Existente v/s A</label>
                </div>
                <div style="width:100%;">
                    <label style="margin-left:150px;" class="cant_green">${{number_format($dif_1_cost)}}</label>
                </div>
            </div>
            <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                <div style="width:100%;">
                    <label style="margin-left:50px;" class="dif_sols_subtitle">Solución Existente v/s B</label>
                </div>
                <div style="width:100%;">
                    <label style="margin-left:90;" class="cant_green">$ 0</label>
                </div>
            </div>
            @endif
            @endif

            @if (count($results_aux) == 3)
            @if ($solution->num_enf == 1)
            <?php  $dif_1_cost=$smasolutions->dif_1_cost($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>

            <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                <div style="width:100%;">
                    <label style="margin-left:100px;" class="dif_sols_subtitle">Solución Existente v/s A</label>
                </div>
                <div style="width:100%;">
                    <label style="margin-left:150px;" class="cant_green">$ {{number_format($dif_1_cost)}}</label>
                </div>
            </div>
            @endif
            @if ($solution->num_enf == 2)
            <?php  $dif_2_cost=$smasolutions->dif_2_cost($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
            <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                <div style="width:100%;">
                    <label style="margin-left:50px;" class="dif_sols_subtitle">Solución Existente v/s B</label>
                </div>
                <div style="width:100%;">
                    <label style="margin-left:90px;" class="cant_green">$ {{number_format($dif_2_cost)}}</label>
                </div>
            </div>
            @endif
            @endif
            @endforeach
        </div>
    </div>
    @endif

    @if (count($results_aux)==1)

    @foreach ($results_aux as $solution)
    <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
        <div style="width:100%;">
            <label style="margin-left:100px;" class="dif_sols_subtitle">Solución Existente v/s A</label>
        </div>
        <div style="width:100%;">
            <label style="margin-left:150px;" class="cant_green">$ 0</label>
        </div>
    </div>
    <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
        <div style="width:100%;">
            <label style="margin-left:50px;" class="dif_sols_subtitle">Solución Existente v/s B</label>
        </div>
        <div style="width:100%;">
            <label style="margin-left:90px;" class="cant_green">$ 0</label>
        </div>
    </div>
    @endforeach
    @endif

</div>
{{--Payback Simple (años) --}}
<div style="margin-top:5px; height:11%;" class="tarjet">
    <div align="center" class="title_tarjet_no_bg">
        <p  class="title_style_no_bg">Payback Simple (años)<b style="color:#ed8936;"></b></p>
    </div>

    <div style="margin-left:15px; margin-right:15px;">
        <div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div style="width:100%;">
                    <label style="margin-left:60px;" class="cant_green">N/A</label>
                </div>
            </div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div style="width:100%;">
                    @if ( true == ( isset( $dif_1_cost ) ? $dif_1_cost : null ) )
                    <?php  $pay_back_a=$smasolutions->pay_back($inv_ini_1,$inv_ini_2,$dif_1_cost) ?>
                    <label style="margin-left:60px;" class="cant_green">{{number_format($pay_back_a)}}</label>
                    @else
                    <label style="margin-left:60px;" class="cant_green">N/A</label>
                   @endif
                </div>
            </div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div style="width:100%;">
                    @if ( true == ( isset( $dif_2_cost ) ? $dif_2_cost : null ) )
                    <?php  $pay_back_b=$smasolutions->pay_back($inv_ini_1,$inv_ini_3,$dif_2_cost) ?>
                    <label style="margin-left:60px;" class="cant_green">{{number_format($pay_back_b)}}</label>
                    @else
                    <label style="margin-left:60px;" class="cant_green">N/A</label>

                   @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top:5px; height:20%;" class="tarjet">
    <div align="center" class="title_tarjet_no_bg">
        <p  class="title_style_no_bg">ROI Entre Soluciónes</p>
    </div>

    <div style="margin-left:15px; margin-right:15px;">
        <table style="width: 100%">
            <tr>
            <th></th>
            <th class="yrs_style">1 Años</th>
            <th class="yrs_style">2 Años</th>
            <th class="yrs_style">3 Años</th>
            <th class="yrs_style">4 Años</th>
            <th class="yrs_style">5 Años</th>
            </tr>
            <tr>
            <td class="sol_ab_yrs_style">Solución A</td>
            @if ($result2 !== null)
                <?php  $roi_inv_tot_1=$smasolutions->roi_inv_tot(1,$id_project,$dif_1_cost,$inv_ini_2) ?>
                @if ($roi_inv_tot_1 <= 0)
                <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_1)}}%</td>
                @endif

                @if ($roi_inv_tot_1 > 0 && $roi_inv_tot_1 < 15)
                <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_1)}}%</td>
                @endif

                @if ($roi_inv_tot_1 > 15)
                <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_1)}}%</td>
                @endif
            @endif
            @if ($result2 === null)
                <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $roi_inv_tot_2=$smasolutions->roi_inv_tot(2,$id_project,$dif_1_cost,$inv_ini_2) ?>
            @if ($roi_inv_tot_2 <= 0)
                <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_2)}}%</td>
                @endif

                @if ($roi_inv_tot_2 > 0 && $roi_inv_tot_2 < 15)
                <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_2)}}%</td>
                @endif

                @if ($roi_inv_tot_2 > 15)
                <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_2)}}%</td>
                @endif
            @endif
            @if ($result2 === null)
                <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $roi_inv_tot_3=$smasolutions->roi_inv_tot(3,$id_project,$dif_1_cost,$inv_ini_2) ?>
                 @if ($roi_inv_tot_3 <= 0)
                 <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_3)}}%</td>
                 @endif

                 @if ($roi_inv_tot_3 > 0 && $roi_inv_tot_3 < 15)
                 <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_3)}}%</td>
                 @endif

                @if ($roi_inv_tot_3 > 15)
                <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_3)}}%</td>
                @endif
            @endif
            @if ($result2 === null)
            <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $roi_inv_tot_4=$smasolutions->roi_inv_tot(4,$id_project,$dif_1_cost,$inv_ini_2) ?>
                @if ($roi_inv_tot_4 <= 0)
                <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif

                @if ($roi_inv_tot_4 > 0 && $roi_inv_tot_4 < 15)
                <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif

                @if ($roi_inv_tot_4 > 15)
                <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif
            @endif
            @if ($result2 === null)
            <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $roi_inv_tot_4=$smasolutions->roi_inv_tot(5,$id_project,$dif_1_cost,$inv_ini_2) ?>
                @if ($roi_inv_tot_4 <= 0)
                <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif

                @if ($roi_inv_tot_4 > 0 && $roi_inv_tot_4 < 15)
                <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif

                @if ($roi_inv_tot_4 > 15)
                <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif
            @endif
            @if ($result2 === null)
            <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
            @endif
            </tr>
            <tr>
                <td class="sol_ab_yrs_style">Solución B</td>

                @if ($result3 !== null)
                <?php  $roi_inv_tot_b_1=$smasolutions->roi_inv_tot(1,$id_project,$dif_2_cost,$inv_ini_3) ?>
                    @if ($roi_inv_tot_b_1 <= 0)
                    <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_1)}}%</td>
                    @endif

                    @if ($roi_inv_tot_b_1 > 0 && $roi_inv_tot_b_1 < 15)
                    <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_1)}}%</td>
                    @endif

                    @if ($roi_inv_tot_b_1 > 15)
                    <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_1)}}%</td>
                    @endif
                @endif

                @if ($result3 === null)
                <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                @endif


                @if ($result3 !== null)
                <?php  $roi_inv_tot_b_2=$smasolutions->roi_inv_tot(2,$id_project,$dif_2_cost,$inv_ini_3) ?>
                     @if ($roi_inv_tot_b_2 <= 0)
                     <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_2)}}%</td>
                     @endif

                     @if ($roi_inv_tot_b_2 > 0 && $roi_inv_tot_b_2 < 15)
                     <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_2)}}%</td>
                     @endif

                    @if ($roi_inv_tot_b_2 > 15)
                    <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_2)}}%</td>
                    @endif
                 @endif

                @if ($result3 === null)
                    <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                 @endif

                 @if ($result3 !== null)
                 <?php  $roi_inv_tot_b_3=$smasolutions->roi_inv_tot(3,$id_project,$dif_2_cost,$inv_ini_3) ?>
                     @if ($roi_inv_tot_b_3 <= 0)
                     <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_3)}}%</td>
                     @endif

                      @if ($roi_inv_tot_b_3 > 0 && $roi_inv_tot_b_3 < 15)
                      <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_3)}}%</td>
                      @endif

                     @if ($roi_inv_tot_b_3 > 15)
                     <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_3)}}%</td>
                     @endif
                 @endif

                  @if ($result3 === null)
                  <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                  @endif

                  @if ($result3 !== null)
                     <?php  $roi_inv_tot_b_4=$smasolutions->roi_inv_tot(4,$id_project,$dif_2_cost,$inv_ini_3) ?>

                     @if ($roi_inv_tot_b_4 <= 0)
                     <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_4)}}%</td>
                     @endif

                     @if ($roi_inv_tot_b_4 > 0 && $roi_inv_tot_b_4 < 15)
                     <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_4)}}%</td>
                     @endif

                     @if ($roi_inv_tot_b_4 > 15)
                     <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_b_4)}}%</td>
                     @endif
                 @endif

                 @if ($result3 === null)
                 <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                 @endif

                 @if ($result3 !== null)
            <?php  $roi_inv_tot_4=$smasolutions->roi_inv_tot(5,$id_project,$dif_2_cost,$inv_ini_3) ?>
                @if ($roi_inv_tot_4 <= 0)
                <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif

                @if ($roi_inv_tot_4 > 0 && $roi_inv_tot_4 < 15)
                <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif

                @if ($roi_inv_tot_4 > 15)
                <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_inv_tot_4)}}%</td>
                @endif
            @endif
            @if ($result3 === null)
            <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
            @endif
            </tr>
        </table>
    </div>

</div>
{{-- ROI Diferencia de Inversión --}}
     <div style="page-break-after:always;"></div>

     <div style="margin-top:5px; height:30%;" class="tarjet">
        <div style="margin-left:15px; margin-right:15px;">
            <?php  $roi_base_a=$graficas_capex_opex->roi_base_a_pdf_retro($id_project,$dif_1_cost,$inv_ini_2);?>
           {{--  <div style="margin-right:5px;margin-top:3px;" class="" >
                <img style="width:110px; height:20px;" src="../public/assets/images/roi_marr.png">
             </div> --}}

            <div style="margin-right:5px;margin-top:3px;" class="column_x_2" >
                    <div style="width:100%;">
                        <img style="width:350px; height:270px;" src="https://quickchart.io/apex-charts/render?config={chart: {height: 350,type: 'line',dropShadow: {enabled: true,top: 18,left: 7,blur: 10,opacity: 0.2},},series: [{name: 'ROI - A',data: [{{$roi_base_a[0]}}, {{$roi_base_a[1]}}, {{$roi_base_a[2]}}, {{$roi_base_a[3]}} , {{$roi_base_a[4]}}]},{name: 'MARR',data: [15, 30, 45, 60, 75]}],dataLabels: {enabled: true,style: {fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',},},stroke: {curve: 'smooth'},title: {text: 'ROI Solución A v/s MARR',align: 'center',style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label'}},markers: {size: 1},xaxis: {tickPlacement: 'between',categories: [3,5,10,15],range:4,title: {text: 'Años',style: {colors: [],fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},labels: {style: {colors: [],fontSize: '12px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-xaxis-label',},},},yaxis: {labels:{style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',horizontalAlign: 'right',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,offsetX: 0,offsetY: 0,},}}">
                    </div>
                </div>
                @if ($result3 !== null)
                <?php  $roi_base_b=$graficas_capex_opex->roi_base_a_pdf_retro($id_project,$dif_2_cost,$inv_ini_3);?>

                <div style="margin-right:5px;margin-top:3px;" class="column_x_2" >

                    <div style="width:100%;">
                        <img style="width:350px; height:270px;" src="https://quickchart.io/apex-charts/render?config={chart: {height: 350,type: 'line',dropShadow: {enabled: true,top: 18,left: 7,blur: 10,opacity: 0.2},},series: [{name: 'ROI - B',data: [{{$roi_base_b[0]}}, {{$roi_base_b[1]}}, {{$roi_base_b[2]}}, {{$roi_base_b[3]}}, {{$roi_base_b[4]}}]},{name: 'MARR',data: [15, 30, 45, 60, 75]}],dataLabels: {enabled: true,style: {fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',},},stroke: {curve: 'smooth'},title: {text: 'ROI Solución B v/s MARR',align: 'center',style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label'}},markers: {size: 1},xaxis: {tickPlacement: 'between',categories: [3,5,10,15],range:4,title: {text: 'Años',style: {colors: [],fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},labels: {style: {colors: [],fontSize: '12px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-xaxis-label',},},},yaxis: {labels:{style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',horizontalAlign: 'right',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,offsetX: 0,offsetY: 0,},}}">
                    </div>
                </div>
                @endif
         </div>
    </div>

        <div style="margin-top:5px; height:65%;" class="tarjet">
                <div align="center" class="title_tarjet_no_bg">
                    <p  class="title_style_no_bg">Análisis CAPEX v/s OPEX @if($unidad_area == 'mc')($/m²)@endif @if($unidad_area == 'ft')($/ft²)@endif</p>
                </div>
                <div style="margin-left:15px; margin-right:15px;">
                    <img style="width:110px; height:30px;" src="../public/assets/images/capex_opex.png">
                </div>
                <div style="margin-left:15px; margin-right:15px;">
                    <?php  $cap_op_3=$graficas_capex_opex->cap_op_3_pdf($id_project);?>
                        <div style="margin-right:5px;" class="column_x_2" >

                            <div style="width:100%;">
                                @if ($result3 !== null)
                                <img style="width:350px; height:280px;" src="https://quickchart.io/apex-charts/render?config={ chart: {type: 'bar',height: 350,stacked: true,stackType: 'normal',dropShadow: {enabled: true,enabledOnSeries: undefined,},toolbar: {show: false,},}, series: [{name: 'CAPEX',data: [{{$cap_op_3[2][0]}}, {{$cap_op_3[1][0]}}, {{$cap_op_3[0][0]}}]}, {name: 'Energía OPEX',data: [{{$cap_op_3[2][1]}}, {{$cap_op_3[1][1]}}, {{$cap_op_3[0][1]}}]}, {name: 'OPEX Mantenimiento',data: [{{$cap_op_3[2][2]}}, {{$cap_op_3[1][2]}}, {{$cap_op_3[0][2]}}]}, {name: 'Costo de Recuperación',data: [{{$cap_op_3[2][3]}}, {{$cap_op_3[1][3]}}, {{$cap_op_3[0][3]}}]}], plotOptions: {bar: {horizontal: true,},}, xaxis: {categories: ['Solución B', 'Solución A', 'Solución Existente'],labels: {style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},}, yaxis: { labels: {style: {colors: [],fontSize: '16px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',fillColors:undefined,horizontalAlign: 'left',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,customHTML: undefined,onClick: undefined,offsetX: 0,offsetY: 0,},},fill: {opacity: 1,},title: {text: '3 Años',align: 'center',offsetY:25,style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},dataLabels: {enabled: true,style: {fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',},}, }">
                                @endif

                                @if ($result3 === null)
                                <img style="width:350px; height:280px;" src="https://quickchart.io/apex-charts/render?config={ chart: {type: 'bar',height: 350,stacked: true,stackType: 'normal',dropShadow: {enabled: true,enabledOnSeries: undefined,},toolbar: {show: false,},}, series: [{name: 'CAPEX',data: [{{$cap_op_3[2][0]}}, {{$cap_op_3[1][0]}}, {{$cap_op_3[0][0]}}]}, {name: 'Energía OPEX',data: [{{$cap_op_3[2][1]}}, {{$cap_op_3[1][1]}}, {{$cap_op_3[0][1]}}]}, {name: 'OPEX Mantenimiento',data: [{{$cap_op_3[2][2]}}, {{$cap_op_3[1][2]}}, {{$cap_op_3[0][2]}}]}, {name: 'Costo de Recuperación',data: [0, {{$cap_op_3[1][3]}}, {{$cap_op_3[0][3]}}]}], plotOptions: {bar: {horizontal: true,},}, xaxis: {categories: ['Solución B', 'Solución A', 'Solución Existente'],labels: {style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},}, yaxis: { labels: {style: {colors: [],fontSize: '16px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',fillColors:undefined,horizontalAlign: 'left',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,customHTML: undefined,onClick: undefined,offsetX: 0,offsetY: 0,},},fill: {opacity: 1,},title: {text: '3 Años',align: 'center',offsetY:25,style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},dataLabels: {enabled: true,style: {fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',},}, }">
                                @endif
                            </div>
                        </div>
                        <?php  $cap_op_5=$graficas_capex_opex->cap_op_5_pdf($id_project);?>

                        <div style="margin-right:5px;" class="column_x_2" >

                            <div style="width:100%;">
                                @if ($result3 !== null)
                                <img style="width:350px; height:280px;" src="https://quickchart.io/apex-charts/render?config={ chart: {type: 'bar',height: 350,stacked: true,stackType: 'normal',dropShadow: {enabled: true,enabledOnSeries: undefined,},toolbar: {show: false,},}, series: [{name: 'CAPEX',data: [{{$cap_op_5[2][0]}}, {{$cap_op_5[1][0]}}, {{$cap_op_5[0][0]}}]}, {name: 'Energía OPEX',data: [{{$cap_op_5[2][1]}}, {{$cap_op_5[1][1]}}, {{$cap_op_5[0][1]}}]}, {name: 'OPEX Mantenimiento',data: [{{$cap_op_5[2][2]}}, {{$cap_op_5[1][2]}}, {{$cap_op_5[0][2]}}]}, {name: 'Costo de Recuperación',data: [{{$cap_op_5[2][3]}}, {{$cap_op_5[1][3]}}, {{$cap_op_5[0][3]}}]}], plotOptions: {bar: {horizontal: true,},}, xaxis: {categories: ['Solución B', 'Solución A', 'Solución Existente'],labels: {style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},}, yaxis: { labels: {style: {colors: [],fontSize: '16px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',horizontalAlign: 'left',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,customHTML: undefined,onClick: undefined,offsetX: 0,offsetY: 0,},},fill: {opacity: 1,},title: {text: '5 Años',align: 'center',offsetY:25,style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},dataLabels: {enabled: true,style: {fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',},}, }">
                                @endif

                                @if ($result3 === null)
                                <img style="width:350px; height:280px;" src="https://quickchart.io/apex-charts/render?config={ chart: {type: 'bar',height: 350,stacked: true,stackType: 'normal',dropShadow: {enabled: true,enabledOnSeries: undefined,},toolbar: {show: false,},}, series: [{name: 'CAPEX',data: [{{$cap_op_5[2][0]}}, {{$cap_op_5[1][0]}}, {{$cap_op_5[0][0]}}]}, {name: 'Energía OPEX',data: [{{$cap_op_5[2][1]}}, {{$cap_op_5[1][1]}}, {{$cap_op_5[0][1]}}]}, {name: 'OPEX Mantenimiento',data: [{{$cap_op_5[2][2]}}, {{$cap_op_5[1][2]}}, {{$cap_op_5[0][2]}}]}, {name: 'Costo de Recuperación',data: [0, {{$cap_op_5[1][3]}}, {{$cap_op_5[0][3]}}]}], plotOptions: {bar: {horizontal: true,},}, xaxis: {categories: ['Solución B', 'Solución A', 'Solución Existente'],labels: {style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},}, yaxis: { labels: {style: {colors: [],fontSize: '16px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',horizontalAlign: 'left',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,customHTML: undefined,onClick: undefined,offsetX: 0,offsetY: 0,},},fill: {opacity: 1,},title: {text: '5 Años',align: 'center',offsetY:25,style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},dataLabels: {enabled: true,style: {fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',},}, }">
                                @endif
                            </div>
                        </div>
                 </div>
                 {{-- <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <br>
                 <div style="margin-left:15px; margin-right:15px;">
                    <?php  /* $cap_op_10=$graficas_capex_opex->cap_op_10_pdf($id_project); */?>

                    <div style="margin-right:5px;" class="column_x_2" >

                        <div style="width:100%;">
                            <img style="width:350px; height:280px;" src="https://quickchart.io/apex-charts/render?config={ chart: {type: 'bar',height: 350,stacked: true,stackType: 'normal',dropShadow: {enabled: true,enabledOnSeries: undefined,},toolbar: {show: false,},}, series: [{name: 'CAPEX',data: [{{$cap_op_10[2][0]}}, {{$cap_op_10[1][0]}}, {{$cap_op_10[0][0]}}]}, {name: 'Energía OPEX',data: [{{$cap_op_10[2][1]}}, {{$cap_op_10[1][1]}}, {{$cap_op_10[0][1]}}]}, {name: 'OPEX Mantenimiento',data: [{{$cap_op_10[2][2]}}, {{$cap_op_10[0][2]}}, {{$cap_op_10[0][2]}}]}], plotOptions: {bar: {horizontal: true,},}, xaxis: {categories: ['Solución B', 'Solución A', 'Solución Existente'],labels: {style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},}, yaxis: { labels: {style: {colors: [],fontSize: '16px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',fillColors:undefined,horizontalAlign: 'left',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,customHTML: undefined,onClick: undefined,offsetX: 0,offsetY: 0,},},fill: {opacity: 1,},title: {text: '10 Años',align: 'center',offsetY:25,style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},dataLabels: {enabled: true,style: {fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',},}, }">
                        </div>
                    </div>

                    <div style="margin-right:5px;" class="column_x_2" >
                        <?php  /* $cap_op_15=$graficas_capex_opex->cap_op_15_pdf($id_project); */?>

                        <div style="width:100%;">
                            <img style="width:350px; height:280px;" src="https://quickchart.io/apex-charts/render?config={ chart: {type: 'bar',height: 350,stacked: true,stackType: 'normal',dropShadow: {enabled: true,enabledOnSeries: undefined,},toolbar: {show: false,},}, series: [{name: 'CAPEX',data: [{{$cap_op_15[2][0]}}, {{$cap_op_15[1][0]}}, {{$cap_op_15[0][0]}}]}, {name: 'Energía OPEX',data: [{{$cap_op_15[2][1]}}, {{$cap_op_15[1][1]}}, {{$cap_op_15[0][1]}}]}, {name: 'OPEX Mantenimiento',data: [{{$cap_op_15[2][2]}}, {{$cap_op_15[0][2]}}, {{$cap_op_15[0][2]}}]}], plotOptions: {bar: {horizontal: true,},}, xaxis: {categories: ['Solución B', 'Solución A', 'Solución Existente'],labels: {style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},}, yaxis: { labels: {style: {colors: [],fontSize: '16px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',horizontalAlign: 'left',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,customHTML: undefined,onClick: undefined,offsetX: 0,offsetY: 0,},},fill: {opacity: 1,},title: {text: '15 Años',align: 'center',offsetY:25,style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},dataLabels: {enabled: true,style: {fontSize: '20px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',},}, }">
                        </div>
                    </div> --}}
             </div>
            </div>
        </div>
                    {{--  example chartts <img style="width:350px; height:300px;" src="https://quickchart.io/chart?c={type:'bar',data:{labels:[2012,2013,2014,2015, 2016],datasets:[{label:'Users',data:[120,60,50,180,120]}]},options: {indexAxis: 'y',}}">
                    --}}
{{--      <img style="width:400px; height:300px;" src="https://quickchart.io/apex-charts/render?config={ chart: {type: 'bar',height: 350,stacked: true,stackType: 'normal',dropShadow: {enabled: true,enabledOnSeries: undefined,},toolbar: {show: false,},}, series: [{name: 'CAPEX',data: [{{$cap_op_3[2][0]}}, {{$cap_op_3[1][0]}}, {{$cap_op_3[0][0]}}]}, {name: 'OPEX',data: [{{$cap_op_3[2][1]}}, {{$cap_op_3[1][1]}}, {{$cap_op_3[0][1]}}]}], plotOptions: {bar: {horizontal: true,},}, xaxis: {categories: ['Solución B', 'Solución A', 'Solución Base'],labels: {style: {colors: [],fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},}, yaxis: { labels: {style: {colors: [],fontSize: '16px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},},},legend: {position: 'top',horizontalAlign: 'left',offsetX: 40,fontSize: '14px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',markers: {width: 12,height: 12,strokeWidth: 0,radius: 12,customHTML: undefined,onClick: undefined,offsetX: 0,offsetY: 0,},},fill: {opacity: 1},        title: {text: '5 Años',align: 'center',offsetY:25,style: {fontSize: '24px',fontFamily: 'ABeeZee, sans-serif',fontWeight: 'bold',cssClass: 'apexcharts-yaxis-label',},}, }">
 --}}     {{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
   {{--  <div style="margin-top:5px; height:20%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">ROI Diferencia de Inversión</p>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <table style="width: 100%">
                <tr>
                <th></th>
                <th class="yrs_style">3 Años</th>
                <th class="yrs_style">5 Años</th>
                <th class="yrs_style">10 Años</th>
                <th class="yrs_style">15 Años</th>
                </tr>
                <tr>
                <td class="sol_ab_yrs_style">Solución A</td>
                @if ($result2 !== null)
                <?php  $roi_ent_dif_inv=$smasolutions->roi_ent_dif_inv($id_project,$result2->num_enf,3,$dif_1_cost) ?>
                @if ($roi_ent_dif_inv <= 0)
                <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv)}}%</td>
                @endif

                @if ($roi_ent_dif_inv > 0 && $roi_ent_dif_inv < 20)
                <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv)}}%</td>
                @endif

                @if ($roi_ent_dif_inv > 20)
                <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv)}}%</td>
                @endif
                @endif

                @if ($result2 === null)
                <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                @endif

                @if ($result2 !== null)
                <?php  $roi_ent_dif_inv_5=$smasolutions->roi_ent_dif_inv($id_project,$result2->num_enf,5,$dif_1_cost) ?>
                    @if ($roi_ent_dif_inv_5 <= 0)
                        <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_5)}}%</td>
                    @endif

                    @if ($roi_ent_dif_inv_5 > 0 && $roi_ent_dif_inv_5 < 20)
                    <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_5)}}%</td>
                    @endif

                    @if ($roi_ent_dif_inv_5 > 20)
                    <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_5)}}%</td>
                    @endif
                @endif

                @if ($result2 === null)
                    <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                @endif

                @if ($result2 !== null)
                <?php  $roi_ent_dif_inv_10=$smasolutions->roi_ent_dif_inv($id_project,$result2->num_enf,10,$dif_1_cost) ?>
                     @if ($roi_ent_dif_inv_10 <= 0)
                        <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_10)}}%</td>
                    @endif

                    @if ($roi_ent_dif_inv_10 > 0 && $roi_ent_dif_inv_10 < 20)
                    <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_10)}}%</td>
                    @endif

                    @if ($roi_ent_dif_inv_10 > 20)
                    <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_10)}}%</td>
                    @endif
                @endif

                @if ($result2 === null)
                    <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                @endif

                @if ($result2 !== null)
                <?php  $roi_ent_dif_inv_15=$smasolutions->roi_ent_dif_inv($id_project,$result2->num_enf,15,$dif_1_cost) ?>
                    @if ($roi_ent_dif_inv_15 <= 0)
                        <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_15)}}%</td>
                    @endif

                    @if ($roi_ent_dif_inv_15 > 0 && $roi_ent_dif_inv_15 < 20)
                         <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_15)}}%</td>
                    @endif

                    @if ($roi_ent_dif_inv_15 > 20)
                         <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_15)}}%</td>
                    @endif

                @endif

                @if ($result2 === null)
                    <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                @endif
                </tr>
                <tr>
                    <td class="sol_ab_yrs_style">Solución B</td>
                    @if ($result3 !== null)
                    <?php  $roi_ent_dif_inv_b_1=$smasolutions->roi_ent_dif_inv($id_project,$result3->num_enf,3,$dif_2_cost) ?>
                          @if ($roi_ent_dif_inv_b_1 <= 0)
                             <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_1)}}%</td>
                          @endif

                          @if ($roi_ent_dif_inv_b_1 > 0 && $roi_ent_dif_inv_b_1 < 20)
                            <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_1)}}%</td>
                          @endif

                          @if ($roi_ent_dif_inv_b_1 > 20)
                            <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_1)}}%</td>
                          @endif
                    @endif

                    @if ($result3 === null)
                    <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                    @endif

                    @if ($result3 !== null)
                    <?php  $roi_ent_dif_inv_b_2=$smasolutions->roi_ent_dif_inv($id_project,$result3->num_enf,5,$dif_2_cost) ?>
                         @if ($roi_ent_dif_inv_b_2 <= 0)
                         <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_2)}}%</td>
                         @endif

                         @if ($roi_ent_dif_inv_b_2 > 0 && $roi_ent_dif_inv_b_2 < 20)
                         <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_2)}}%</td>
                         @endif

                         @if ($roi_ent_dif_inv_b_2 > 20)
                         <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_2)}}%</td>
                         @endif
                    @endif

                    @if ($result3 === null)
                    <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                    @endif

                    @if ($result3 !== null)
                    <?php  $roi_ent_dif_inv_b_3=$smasolutions->roi_ent_dif_inv($id_project,$result3->num_enf,10,$dif_2_cost) ?>
                          @if ($roi_ent_dif_inv_b_3 <= 0)
                          <td  style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_3)}}%</td>
                          @endif

                          @if ($roi_ent_dif_inv_b_3 > 0 && $roi_ent_dif_inv_b_3 < 20)
                          <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_3)}}%</td>
                          @endif

                          @if ($roi_ent_dif_inv_b_3 > 20)
                          <td  style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_3)}}%</td>
                          @endif
                    @endif

                    @if ($result3 === null)
                    <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                    @endif

                    @if ($result3 !== null)
                    <?php  $roi_ent_dif_inv_b_4=$smasolutions->roi_ent_dif_inv($id_project,$result3->num_enf,15,$dif_2_cost) ?>
                           @if ($roi_ent_dif_inv_b_4 <= 0)
                           <td style="color:#ea0000;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_4)}}%</td>
                           @endif

                          @if ($roi_ent_dif_inv_b_4 > 0 && $roi_ent_dif_inv_b_4 < 20)
                          <td style="color:#ed8936;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_4)}}%</td>
                          @endif

                          @if ($roi_ent_dif_inv_b_4 > 20)
                          <td style="color:#33cc33;" class="porcent_yrs_style">{{number_format($roi_ent_dif_inv_b_4)}}%</td>
                          @endif
                    @endif

                    @if ($result3 === null)
                    <td style="color:#ed8936;" class="porcent_yrs_style">N/A</td>
                    @endif
                </tr>
            </table>
        </div>

    </div> --}}

    {{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}


    <div class="tarjet">
        <div align="center" class="title_tarjet">
            <label  class="title_style">ANÁLISIS DE LA INTENSIDAD DEL USO DE LA ENERGÍA (EUI)</label>
        </div>

        <div>
            <table class="">
                <tbody>
                  <tr>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,9)}}</label></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Región:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td style="padding-top:10px;" class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
                  </tr>

                </tbody>
              </table>
              <table class="">
                <tbody>
                    <tr>
                        <td class="info_project_size_font"><label for="">Tipo Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->tipo_edi}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Horas Enfriamiento Anual:</label> <label style="color:#3182ce;">{{number_format($tar_ele->coolings_hours)}}</label></td>
                        <td></td>
                        <td class="info_project_size_font"><label for="">Tarifa Elécrtica:</label> <label style="color:#3182ce;">{{$tar_ele->costo_elec}} $/Kwh</label></td></td>
                      </tr>

                </tbody>
              </table>

        </div>
    </div>
    {{-- Info eui --}}
    <div  style="margin-top:5px; height:33%;" class="tarjet">
        <div align="center" style="margin-left:15px; margin-right:15px;">
            <label class="title_style_no_bg" for="">{{$tar_ele->tipo_edi}}  (KBTU/sqf)</label>
        </div>

        <div style="margin-left:15px; margin-right:15px; margin-top:5px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <?php  $energy_star=$smasolutions->energy_star($id_project) ?>
                        <img  src="../public/assets/images/Energy-Star-Logo.png" width="115px" height="60px"/>
                        <label style="margin-left:px;" class="dif_sols_subtitle">EUI - Energy Star <b style="color:#33cc33;font-size:25px;" class="">&nbsp;{{number_format($energy_star,1)}}</b></label>
                    </div>

                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <?php  $ashrae=$smasolutions->ashrae($id_project) ?>
                        <img  src="../public/assets/images/Logo-ASHRAE-png.png" width="90px" height="60px"/>
                        <label style="margin-left:px;" class="dif_sols_subtitle">EUI - ASHRAE <b style="color:#33cc33;font-size:25px;" class="">&nbsp;{{$ashrae}}</b></label>
                    </div>

                </div>
            </div>
        </div>

        <br>
        <br>
        <br>
        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_base" style="width:100%;">
                        <label style="margin-left:28px;" class="title_style">Solución Existente</label>
                    </div>
                    {{-- Capacidad Total --}}
                    <table class="">
                        <tbody style="width: 100%;">
                            @if ($result1 ==! null)
                            <?php  $sumaopex_1=$smasolutions->sumaopex($id_project,$result1->num_enf) ?>
                            <?php  $sumacap_term_1=$smasolutions->sumacap_term($id_project,$result1->num_enf) ?>
                            <?php  $unid_med_1=$smasolutions->unid_med($id_project,$result1->num_enf) ?>
                            <?php  $consumo_anual_edi=$smasolutions->consumo_anual_opex($sumaopex_1,$tar_ele->porcent_hvac,$tar_ele->costo_elec) ?>
                            @elseif($result1 === null)
                            <?php $sumaopex_1=0?>
                           <?php $sumacap_term_1=0?>
                           <?php $unid_med_1=""?>
                            <?php  $consumo_anual_edi = 0?>
                            @endif

                            @if ($unid_med_1 !== "")
                                <tr class="tr_style">
                                    <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                                    </tr>

                                    <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_1}} </label>
                                        <label style="" class="unit_cap_term" for="">{{$unid_med_1->unid_med}}</label>
                                    </td>
                            @endif

                            @if ($unid_med_1 === "")
                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                                </tr>

                                <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_1}} </label>
                                    <label style="" class="unit_cap_term" for="">{{$unid_med_1}}</label>
                                </td>
                            @endif

                        </tbody>
                    </table>
                    {{-- Consumo anual opex --}}
                    <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">$ {{number_format($consumo_anual_edi)}}</label>

                                </td>
                      </tbody>
                  </table>
                </div>
            </div>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_ab">
                        <label style="margin-left:60px;" class="title_style">Solución A</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">
                        @if ($result2 ==! null)
                        <?php  $sumaopex_2=$smasolutions->sumaopex($id_project,$result2->num_enf) ?>
                        <?php  $sumacap_term_2=$smasolutions->sumacap_term($id_project,$result2->num_enf) ?>
                        <?php  $unid_med_2=$smasolutions->unid_med($id_project,$result2->num_enf) ?>
                        <?php  $consumo_anual_edi_a=$smasolutions->consumo_anual_opex($sumaopex_2,$tar_ele->porcent_hvac,$tar_ele->costo_elec) ?>
                        @elseif($result2 === null)
                        <?php $sumaopex_2=0?>
                       <?php $sumacap_term_2=0?>
                       <?php $unid_med_2=""?>
                       <?php $consumo_anual_edi_a=0?>
                        @endif

                        @if ($unid_med_2 !== "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_2}}</label>
                                <label  class="unit_cap_term" for="">{{$unid_med_2->unid_med}}</label>
                              </td>
                        @endif

                        @if ($unid_med_2 === "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_2}}</label>
                                <label  class="unit_cap_term" for="">{{$unid_med_2}}</label>
                              </td>
                        @endif

                      </tbody>
                  </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">$ {{number_format($consumo_anual_edi_a)}}</label>

                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_ab">
                        <label style="margin-left:60px;" class="title_style">Solución B</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">
                        @if ($result3 ==! null)
                        <?php  $sumaopex_3=$smasolutions->sumaopex($id_project,$result3->num_enf) ?>
                        <?php  $sumacap_term_3=$smasolutions->sumacap_term($id_project,$result3->num_enf) ?>
                        <?php  $unid_med_3=$smasolutions->unid_med($id_project,$result3->num_enf) ?>
                        <?php  $consumo_anual_edi_b=$smasolutions->consumo_anual_opex($sumaopex_3,$tar_ele->porcent_hvac,$tar_ele->costo_elec) ?>
                        @elseif($result3 === null)
                        <?php $sumaopex_3=0?>
                       <?php $sumacap_term_3=0?>
                       <?php $unid_med_3=""?>
                       <?php $consumo_anual_edi_b= 0?>
                        @endif

                        @if ($unid_med_3 !== "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_3}}</label>
                                <label class="unit_cap_term" for="">{{$unid_med_3->unid_med}}</label>
                              </td>
                        @endif

                        @if ($unid_med_3 === "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:100px;" class="cap_term" for="">{{$sumacap_term_3}}</label>
                                <label class="unit_cap_term" for="">{{$unid_med_3}}</label>
                              </td>
                        @endif

                      </tbody>
                  </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>
                            <td style="width: 100%;" class="">
                            @if (number_format($sumaopex_3) <= 0 )
                                <label style="margin-left:80px;" class="cap_term" for="">$ {{number_format($consumo_anual_edi_b)}}</label>
                            @endif
                            @if (number_format($sumaopex_3) > 0 )
                                <label style="margin-left:60px;" class="cap_term" for="">$ {{number_format($consumo_anual_edi_b)}}</label>
                            @endif
                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <div  style="margin-top:6px; height:30%;" class="tarjet">
        <div align="center" class="title_tarjet_blue">
            <label  class="title_style">Valores EUI</label>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        @if ($result1 ==! null)
                        <?php  $valor_eui_base=$smasolutions->valor_eui_aux($sumaopex_1,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                             @if ($valor_eui_base <= $ashrae)
                             <label style="margin-left:80px;color:#33cc33;" class="cant_green">{{number_format($valor_eui_base,1)}}</label>
                             @elseif ($valor_eui_base <= $energy_star && $valor_eui_base > $ashrae)
                             <label style="margin-left:80px;color:#ed8936;" class="cant_green">{{number_format($valor_eui_base,1)}}</label>
                             @elseif ($valor_eui_base > $energy_star)
                            <label style="margin-left:80px;color:#ea0000;" class="cant_green">{{number_format($valor_eui_base,1)}}</label>
                            @else
                            <label style="margin-left:80px;color:#2c5282;" class="cant_green">{{number_format($valor_eui_base,1)}}</label>
                            @endif
                         @endif

                         @if ($result1 === null)
                         <label style="margin-left:80px;color:#ea0000;" class="cant_green">0</label>
                         @endif
                    </div>

                    <div style="width:95%;border:3px solid #2c5282;margin-left:4px; border-radius:5px;">

                       <?php
                        if ($valor_eui_base > 300) {
                            $val_graphic_base = 300;
                        }

                        if ($valor_eui_base <= 300) {
                            $val_graphic_base = $valor_eui_base;
                        }
                        ?>

                        <img style="width: 200px;height:150px; margin-left:15px;" src="https://quickchart.io/chart?v=2.9.4&c={ type: 'gauge', data: { datasets: [ { value: {{$val_graphic_base}}, data: [{{$energy_star}}, {{$ashrae}}, 300], backgroundColor: ['green','orange','red'], borderWidth: 2, }, ], }, options: { valueLabel: { display: false, }, }, }">
                         <label for="" style="margin-left:58px; font-size:24px; font-family: 'ABeeZee', sans-serif;color:#2c5282;">Existente</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        @if ($result2 ==! null)
                        <?php  $valor_eui_a=$smasolutions->valor_eui_aux($sumaopex_2,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                            @if ($valor_eui_a <= $ashrae)
                            <label style="margin-left:80px;color:#33cc33;" class="cant_green">{{number_format($valor_eui_a,1)}}</label>
                            @elseif ($valor_eui_a <= $energy_star && $valor_eui_a > $ashrae)
                            <label style="margin-left:80px;color:#ed8936;" class="cant_green">{{number_format($valor_eui_a,1)}}</label>
                            @elseif ($valor_eui_a > $energy_star)
                            <label style="margin-left:80px;color:#ea0000;" class="cant_green">{{number_format($valor_eui_a,1)}}</label>
                            @else
                            <label style="margin-left:80px;color:#2c5282;" class="cant_green">{{number_format($valor_eui_a,1)}}</label>
                            @endif
                        @endif

                        @if ($result2 === null)
                        <label style="margin-left:80px;color:#ea0000;" class="cant_green">0</label>
                        @endif
                    </div>

                    <div style="width:95%;border:3px solid #2c5282;margin-left:3px; border-radius:5px;">
                        <?php
                        if ($valor_eui_a > 300) {
                            $val_graphic_a = 300;
                        }

                        if ($valor_eui_a <= 300) {
                            $val_graphic_a = $valor_eui_a;
                        }
                        ?>
                        <img style="width: 200px;height:150px; margin-left:15px;" src="https://quickchart.io/chart?v=2.9.4&c={ type: 'gauge', data: { datasets: [ { value: {{$val_graphic_a}}, data: [{{$energy_star}}, {{$ashrae}}, 300], backgroundColor: ['green','orange','red'], borderWidth: 2, }, ], }, options: { valueLabel: { display: false, }, }, }">
                        <label for="" style="margin-left:108px; font-size:24px; font-family: 'ABeeZee', sans-serif;color:#2c5282;">A</label>

                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        @if ($result3 ==! null)
                        <?php  $valor_eui_b=$smasolutions->valor_eui_aux($sumaopex_3,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                            @if (floatval($valor_eui_b) <= floatval($ashrae))
                            <label style="margin-left:80px;color:#33cc33;" class="cant_green">{{number_format($valor_eui_b,1)}}</label>
                            @elseif ($valor_eui_b <= $energy_star && $valor_eui_b > $ashrae)
                            <label style="margin-left:80px;color:#ed8936;" class="cant_green">{{number_format($valor_eui_b,1)}}</label>
                            @elseif (floatval($valor_eui_b) > floatval($energy_star))
                            <label style="margin-left:80px;color:#ea0000;" class="cant_green">{{number_format($valor_eui_b,1)}}</label>
                            @else
                            <label style="margin-left:80px;color:#2c5282;" class="cant_green">{{number_format($valor_eui_b,1)}}</label>
                            @endif
                        @endif

                        @if ($result3 === null)
                        <?php  $valor_eui_b=0 ?>
                        <label style="margin-left:80px;color:#ea0000;" class="cant_green">0</label>
                        @endif
                    </div>
                    <div style="width:95%;border:3px solid #2c5282;margin-left:0px; border-radius:5px;">
                        <?php
                        if ($valor_eui_b > 300) {
                            $val_graphic_b = 300;
                        }

                        if ($valor_eui_b <= 300) {
                            $val_graphic_b = $valor_eui_b;
                        }
                        ?>
                        <img style="width: 200px;height:150px; margin-left:15px;" src="https://quickchart.io/chart?v=2.9.4&c={ type: 'gauge', data: { datasets: [ { value: {{$val_graphic_b}}, data: [{{$energy_star}}, {{$ashrae}}, 300], backgroundColor: ['green','orange','red'], borderWidth: 2, }, ], }, options: { valueLabel: { display: false, }, }, }">
                        <label for="" style="margin-left:108px; font-size:24px; font-family: 'ABeeZee', sans-serif;color:#2c5282;">B</label>

                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div style="page-break-after:always;"></div> --}}
    <div  style="margin-top:6px; height:22%;" class="tarjet">
        <div align="center" class="title_tarjet_blue">
            <label  class="title_style">Desperdicio de Energía Eléctrica del Edificio<b style="color:#ed8936;"> (Año)</b></label>
        </div>
        <div style="margin-left:15px; margin-right:15px;">
            <table style="width: 100%">
                <tr>
                <th></th>
                <th class="yrs_style">Energy Star</th>
                <th class="yrs_style">ASHRAE</th>
                </tr>
                <tr>
                    <td class="sol_ab_yrs_style">Solución Existente</td>
                    <?php  $energy_base=$desperdicio->desp_energy($id_project,$energy_star,$ashrae,$valor_eui_base,$tar_ele->costo_elec) ?>
                    @if ($energy_base > 0)
                    <td style="color:#ea0000;" class="desp_elect_style">${{number_format($energy_base)}}</td>
                    @endif

                    @if ($energy_base < 0)
                    <td style="color:#33cc33;" class="desp_elect_style">${{number_format($energy_base)}}</td>
                    @endif
                    <?php  $ashrae_base=$desperdicio->desp_ashrae($id_project,$energy_star,$ashrae,$valor_eui_base,$tar_ele->costo_elec) ?>

                    @if ($ashrae_base > 0)
                    <td style="color:#ea0000;" class="desp_elect_style">${{number_format($ashrae_base)}}</td>
                    @endif

                    @if ($ashrae_base < 0)
                    <td style="color:#33cc33;" class="desp_elect_style">${{number_format($ashrae_base)}}</td>
                    @endif
                    </tr>
                <tr>

                <td class="sol_ab_yrs_style">Solución A</td>

            <?php  $energy_a=$desperdicio->desp_energy($id_project,$energy_star,$ashrae,$valor_eui_a,$tar_ele->costo_elec) ?>

                @if ($energy_a > 0)
                <td style="color:#ea0000;" class="desp_elect_style">${{number_format($energy_a)}}</td>
                @endif

                @if ($energy_a < 0)
                <td style="color:#33cc33;" class="desp_elect_style">${{number_format($energy_a)}}</td>
                @endif
                <?php  $ashrae_a=$desperdicio->desp_ashrae($id_project,$energy_star,$ashrae,$valor_eui_a,$tar_ele->costo_elec) ?>

                @if ($ashrae_a > 0)
                <td style="color:#ea0000;" class="desp_elect_style">${{number_format($ashrae_a)}}</td>
                @endif

                @if ($ashrae_a < 0)
                <td style="color:#33cc33;" class="desp_elect_style">${{number_format($ashrae_a)}}</td>
                @endif
                </tr>
                <tr>
                    <td class="sol_ab_yrs_style">Solución B</td>
                    @if ($result3 ==! null)
                        <?php  $energy_b=$desperdicio->desp_energy($id_project,$energy_star,$ashrae,$valor_eui_b,$tar_ele->costo_elec) ?>

                        @if ($energy_b > 0)
                        <td style="color:#ea0000;" class="desp_elect_style">${{number_format($energy_b)}}</td>
                        @endif

                        @if ($energy_b < 0)
                        <td style="color:#33cc33;" class="desp_elect_style">${{number_format($energy_b)}}</td>
                        @endif
                    @endif
                    @if ($result3 === null)
                    <td style="color:#2c5282;" class="desp_elect_style">$0</td>
                    @endif
                    @if ($result3 ==! null)
                        <?php  $ashrae_b=$desperdicio->desp_ashrae($id_project,$energy_star,$ashrae,$valor_eui_b,$tar_ele->costo_elec) ?>

                        @if ($ashrae_b > 0)
                        <td style="color:#ea0000;" class="desp_elect_style">${{number_format($ashrae_b)}}</td>
                        @endif

                        @if ($ashrae_b < 0)
                        <td style="color:#33cc33;" class="desp_elect_style">${{number_format($ashrae_b)}}</td>
                        @endif
                    @endif

                    @if ($result3 === null)
                    <td style="color:#2c5282;" class="desp_elect_style">$0</td>
                    @endif
                    </tr>
                </tr>
            </table>
        </div>
    </div>
{{-- RESULTADOS ANÁLISIS SUSTENTABLE --}}
<div style="page-break-after:always;"></div>
<div class="tarjet">
    <div align="center" class="title_tarjet">
        <label  class="title_style">RESULTADOS ANÁLISIS SUSTENTABLE</label>
    </div>

    <div>
        <table class="">
            <tbody>
              <tr>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,9)}}</label></td>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Región:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
              </tr>

            </tbody>
          </table>
          <table class="">
            <tbody>
                <tr>
                    <td class="info_project_size_font"><label for="">Tipo Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->tipo_edi}}</label></td>
                    <td></td>
                    <td class="info_project_size_font"><label for="">Horas Enfriamiento Anual:</label> <label style="color:#3182ce;">{{number_format($tar_ele->coolings_hours)}}</label></td>
                    <td></td>
                    <td class="info_project_size_font"><label for="">Tarifa Elécrtica:</label> <label style="color:#3182ce;">{{$tar_ele->costo_elec}} $/Kwh</label></td></td>
                  </tr>

            </tbody>
          </table>

    </div>
</div>

<div  style="margin-top:5px; height:13%;" class="tarjet">
    <div style="margin-left:15px; margin-right:15px;">
        <div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div class="sol_base" style="width:100%;">
                    <label style="margin-left:28px;" class="title_style">Solución Existente</label>
                </div>
                {{-- Capacidad Total --}}
                <table class="">
                    <tbody style="width: 100%;">
                        @if ($result1 ==! null)
                        <?php  $sumaopex_1=$smasolutions->sumaopex($id_project,$result1->num_enf) ?>
                        <?php  $sumacap_term_1=$smasolutions->sumacap_term($id_project,$result1->num_enf) ?>
                        <?php  $inv_ini_1=$smasolutions->inv_ini($id_project,$result1->num_enf) ?>
                        <?php  $unid_med_1=$smasolutions->unid_med($id_project,$result1->num_enf) ?>
                        @elseif($result1 === null)
                        <?php $sumaopex_1=0?>
                    <?php $sumacap_term_1=0?>
                    <?php $inv_ini_1=0?>
                    <?php $unid_med_1=""?>
                        @endif
                        @if ($unid_med_1 !== "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_1}}</label>
                                <label style="" class="unit_cap_term" for="">{{$unid_med_1->unid_med}}</label>
                              </td>
                        @endif

                        @if ($unid_med_1 === "")
                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_1}}</label>
                                <label style="" class="unit_cap_term" for="">{{$unid_med_1}}</label>
                              </td>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div style="margin-left:15px; margin-right:15px;">
        <div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div class="sol_ab">
                    <label style="margin-left:60px;" class="title_style">Solución A</label>
                </div>

                 {{-- Capacidad Total --}}
                 <table class="">
                  <tbody style="width: 100%;">
                    @if ($result2 ==! null)
                    <?php  $sumaopex_2=$smasolutions->sumaopex($id_project,$result2->num_enf) ?>
                    <?php  $sumacap_term_2=$smasolutions->sumacap_term($id_project,$result2->num_enf) ?>
                    <?php  $inv_ini_2=$smasolutions->inv_ini($id_project,$result2->num_enf) ?>
                    <?php  $unid_med_2=$smasolutions->unid_med($id_project,$result2->num_enf) ?>
                    @elseif($result2 === null)
                    <?php $sumaopex_2=0?>
                    <?php $inv_ini_2=0?>
                    <?php $sumacap_term_2=0?>
                    <?php $unid_med_2=""?>
                    @endif

                    @if ($unid_med_2 !== "")
                    <tr class="tr_style">
                        <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                        </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_2}} </label>
                            <label  class="unit_cap_term" for="">{{$unid_med_2->unid_med}}</label>
                          </td>
                    @endif

                    @if ($unid_med_2 === "")
                    <tr class="tr_style">
                        <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                        </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_2}} </label>
                            <label  class="unit_cap_term" for="">{{$unid_med_2}}</label>
                          </td>
                    @endif

                  </tbody>
              </table>

            </div>
        </div>
    </div>

    <div style="margin-left:15px; margin-right:15px;">
        <div>
            <div style="margin-right:5px;margin-top:5px;" class="column" >
                <div class="sol_ab">
                    <label style="margin-left:60px;" class="title_style">Solución B</label>
                </div>

                 {{-- Capacidad Total --}}
                 <table class="">
                  <tbody style="width: 100%;">
                    @if ($result3 ==! null)
                    <?php  $sumaopex_3=$smasolutions->sumaopex($id_project,$result3->num_enf) ?>
                    <?php  $sumacap_term_3=$smasolutions->sumacap_term($id_project,$result3->num_enf) ?>
                    <?php  $inv_ini_3=$smasolutions->inv_ini($id_project,$result3->num_enf) ?>
                    <?php  $unid_med_3=$smasolutions->unid_med($id_project,$result3->num_enf) ?>
                    @elseif($result3 === null)
                    <?php $sumaopex_3=0?>
                    <?php $sumacap_term_3=0?>
                    <?php $inv_ini_3=0?>
                    <?php $unid_med_3=""?>
                    @endif

                    @if ($unid_med_3 !== "")
                    <tr class="tr_style">
                        <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                        </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">{{$sumacap_term_3}}</label>
                            <label class="unit_cap_term" for="">{{$unid_med_3->unid_med}}</label>
                          </td>
                    @endif

                    @if ($unid_med_3 === "")
                    <tr class="tr_style">
                        <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                        </tr>

                        <td style="width: 100%;" class=""><label style="margin-left:100px;" class="cap_term" for="">{{$sumacap_term_3}}</label>
                            <label class="unit_cap_term" for="">{{$unid_med_3}}</label>
                          </td>
                    @endif

                  </tbody>
              </table>

            </div>
        </div>
    </div>
</div>

 {{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
 <div style="margin-top:5px; height:20%;" class="tarjet">
    <div  align="center" class="title_tarjet_no_bg">
        <p  style="margin-top:0px;" class="title_style_no_bg">Reducción Energética - Mega Watts</p>
    </div>

    <div style="margin-left:15px; margin-right:15px;">
        <table style="width: 100%">
            <tr>
            <th><img style="margin-left:30px;"  src="../public/assets/images/watts.png" width="50px" height="50"/>
            </th>
            <th class="yrs_style">1 Años</th>
            <th class="yrs_style">2 Años</th>
            <th class="yrs_style">3 Años</th>
            <th class="yrs_style">4 Años</th>
            <th class="yrs_style">5 Años</th>
            </tr>
            <tr>
            <td class="sol_ab_yrs_style">Solución A</td>
            @if ($result2 !== null)
            <?php  $red_en_mw_a_1=$smasolutions->red_en_mw(1,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_a_1)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_en_mw_a_2=$smasolutions->red_en_mw(2,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_a_2)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_en_mw_a_3=$smasolutions->red_en_mw(3,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_a_3)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_en_mw_a_4=$smasolutions->red_en_mw(4,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_a_4)}}</td>
            @endif

            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_en_mw_a_4=$smasolutions->red_en_mw(5,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_a_4)}}</td>
            @endif

            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif
            </tr>
            <tr>
                <td class="sol_ab_yrs_style">Solución B</td>
                @if ($result3 !== null)
                <?php  $red_en_mw_b_1=$smasolutions->red_en_mw(1,$dif_2) ?>
                <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_b_1)}}</td>
                @endif
                 @if ($result3 === null)
                 <td class="porcent_analis_sus_yrs_style">N/A</td>
                 @endif

                 @if ($result3 !== null)
                 <?php  $red_en_mw_b_2=$smasolutions->red_en_mw(2,$dif_2) ?>
                 <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_b_2)}}</td>
                @endif
                @if ($result3 === null)
                <td class="porcent_analis_sus_yrs_style">N/A</td>
                @endif

                 @if ($result3 !== null)
                 <?php  $red_en_mw_b_3=$smasolutions->red_en_mw(3,$dif_2) ?>
                 <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_b_3)}}</td>
                 @endif
                 @if ($result3 === null)
                 <td class="porcent_analis_sus_yrs_style">N/A</td>
                 @endif

                 @if ($result3 !== null)
                 <?php  $red_en_mw_b_4=$smasolutions->red_en_mw(4,$dif_2) ?>
                 <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_b_4)}}</td>
                 @endif
                 @if ($result3 === null)
                 <td class="porcent_analis_sus_yrs_style">N/A</td>
                 @endif

                 @if ($result3 !== null)
                 <?php  $red_en_mw_b_4=$smasolutions->red_en_mw(5,$dif_2) ?>
                 <td class="porcent_analis_sus_yrs_style">{{number_format($red_en_mw_b_4)}}</td>
                 @endif
                 @if ($result3 === null)
                 <td class="porcent_analis_sus_yrs_style">N/A</td>
                 @endif
            </tr>
        </table>
    </div>

</div>

 {{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
 <div style="margin-top:5px; height:20%;" class="tarjet">
    <div align="center" class="title_tarjet_no_bg">
        <p  class="title_style_no_bg">Reducción Huella de Carbono – Ton. CO2</p>
    </div>

    <div style="margin-left:15px; margin-right:15px;">
        <table style="width: 100%">
            <tr>
            <th><img style="margin-left:30px;"  src="../public/assets/images/Huella.png" width="55px" height="55"/></th>
            <th class="yrs_style">1 Años</th>
            <th class="yrs_style">2 Años</th>
            <th class="yrs_style">3 Años</th>
            <th class="yrs_style">4 Años</th>
            <th class="yrs_style">5 Años</th>
            </tr>
            <tr>
            <td class="sol_ab_yrs_style">Solución A</td>
            @if ($result2 !== null)
            <?php  $red_hu_carb_a_1=$smasolutions->red_hu_carb(1,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_a_1)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_hu_carb_a_2=$smasolutions->red_hu_carb(2,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_a_2)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_hu_carb_a_3=$smasolutions->red_hu_carb(3,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_a_3)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_hu_carb_a_4=$smasolutions->red_hu_carb(4,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_a_4)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_hu_carb_a_4=$smasolutions->red_hu_carb(5,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_a_4)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif
            </tr>
            <tr>
                <td class="sol_ab_yrs_style">Solución B</td>
                @if ($result3 !== null)
                <?php  $red_hu_carb_b_1=$smasolutions->red_hu_carb(1,$dif_2) ?>
                <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_b_1)}}</td>
                @endif
                @if ($result3 === null)
                <td class="porcent_analis_sus_yrs_style">N/A</td>
                @endif

                @if ($result3 !== null)
                <?php  $red_hu_carb_b_2=$smasolutions->red_hu_carb(2,$dif_2) ?>
                <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_b_2)}}</td>
                @endif
                @if ($result3 === null)
                <td class="porcent_analis_sus_yrs_style">N/A</td>
                @endif

                @if ($result3 !== null)
                 <?php  $red_hu_carb_b_3=$smasolutions->red_hu_carb(3,$dif_2) ?>
                 <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_b_3)}}</td>
                 @endif

                 @if ($result3 === null)
                 <td class="porcent_analis_sus_yrs_style">N/A</td>
                 @endif

                 @if ($result3 !== null)
                  <?php  $red_hu_carb_b_4=$smasolutions->red_hu_carb(4,$dif_2) ?>
                  <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_b_4)}}</td>
                  @endif

                  @if ($result3 === null)
                  <td class="porcent_analis_sus_yrs_style">N/A</td>
                  @endif

                  @if ($result3 !== null)
                  <?php  $red_hu_carb_b_4=$smasolutions->red_hu_carb(5,$dif_2) ?>
                  <td class="porcent_analis_sus_yrs_style">{{number_format($red_hu_carb_b_4)}}</td>
                  @endif

                  @if ($result3 === null)
                  <td class="porcent_analis_sus_yrs_style">N/A</td>
                  @endif
            </tr>
        </table>
    </div>

</div>

 {{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
 <div style="margin-top:5px; height:20%;" class="tarjet">
    <div align="center" class="title_tarjet_no_bg">
        <p  class="title_style_no_bg">Reducción de Bolsas de Basura - Recicladas</p>
    </div>

    <div style="margin-left:15px; margin-right:15px;">
        <table style="width: 100%">
            <tr>
            <th><img style="margin-left:30px;"  src="../public/assets/images/reducción-bolsas.png" width="50px" height="50"/></th>
            <th class="yrs_style">1 Años</th>
            <th class="yrs_style">2 Años</th>
            <th class="yrs_style">3 Años</th>
            <th class="yrs_style">4 Años</th>
            <th class="yrs_style">5 Años</th>
            </tr>
            <tr>
            <td class="sol_ab_yrs_style">Solución A</td>
            @if ($result2 !== null)
            <?php  $red_bol_ba_a_1=$smasolutions->red_bol_ba(1,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_a_1)}}</td>
            @endif

            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_bol_ba_a_2=$smasolutions->red_bol_ba(2,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_a_2)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
             <?php  $red_bol_ba_a_3=$smasolutions->red_bol_ba(3,$dif_1) ?>
             <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_a_3)}}</td>
             @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_bol_ba_a_4=$smasolutions->red_bol_ba(4,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_a_4)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif

            @if ($result2 !== null)
            <?php  $red_bol_ba_a_4=$smasolutions->red_bol_ba(5,$dif_1) ?>
            <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_a_4)}}</td>
            @endif
            @if ($result2 === null)
            <td class="porcent_analis_sus_yrs_style">N/A</td>
            @endif
            </tr>
            <tr>
                <td class="sol_ab_yrs_style">Solución B</td>
                @if ($result3 !== null)
                <?php  $red_bol_ba_b_1=$smasolutions->red_bol_ba(1,$dif_2) ?>
                <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_b_1)}}</td>
                @endif
                @if ($result3 === null)
                <td class="porcent_analis_sus_yrs_style">N/A</td>
                @endif

                @if ($result3 !== null)
                <?php  $red_bol_ba_b_2=$smasolutions->red_bol_ba(2,$dif_2) ?>
                <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_b_2)}}</td>
                @endif
                @if ($result3 === null)
                <td class="porcent_analis_sus_yrs_style">N/A</td>
                @endif

                @if ($result3 !== null)
                <?php  $red_bol_ba_b_3=$smasolutions->red_bol_ba(3,$dif_2) ?>
                <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_b_3)}}</td>
                @endif
                @if ($result3 === null)
                <td class="porcent_analis_sus_yrs_style">N/A</td>
                 @endif

                 @if ($result3 !== null)
                 <?php  $red_bol_ba_b_4=$smasolutions->red_bol_ba(4,$dif_2) ?>
                 <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_b_4)}}</td>
                 @endif
                 @if ($result3 === null)
                 <td class="porcent_analis_sus_yrs_style">N/A</td>
                 @endif

                 @if ($result3 !== null)
                 <?php  $red_bol_ba_b_4=$smasolutions->red_bol_ba(5,$dif_2) ?>
                 <td class="porcent_analis_sus_yrs_style">{{number_format($red_bol_ba_b_4)}}</td>
                 @endif
                 @if ($result3 === null)
                 <td class="porcent_analis_sus_yrs_style">N/A</td>
                 @endif
            </tr>
        </table>
    </div>
</div>
{{-- ANÁLISIS Confort --}}
<div style="page-break-after:always;"></div>
<div class="tarjet">
    <div align="center" class="title_tarjet">
        <label  class="title_style">Analisis de Confort y Productividad</label>
    </div>

    <div>
        <table class="">
            <tbody>
              <tr>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,9)}}</label></td>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Región:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                <td style="padding-top:10px;" class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
              </tr>

            </tbody>
          </table>
          <table class="">
            <tbody>
                <tr>
                    <td class="info_project_size_font"><label for="">Tipo Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->tipo_edi}}</label></td>
                    <td></td>
                    <td class="info_project_size_font"><label for="">Horas Enfriamiento Anual:</label> <label style="color:#3182ce;">{{number_format($tar_ele->coolings_hours)}}</label></td>
                    <td></td>
                    <td class="info_project_size_font"><label for="">Tarifa Elécrtica:</label> <label style="color:#3182ce;">{{$tar_ele->costo_elec}} $/Kwh</label></td></td>
                  </tr>

            </tbody>
          </table>

    </div>
</div>
<div  style="margin-top:6px; height:25%;" class="tarjet">
    <div align="center" class="title_tarjet_blue">
        <label  class="title_style">Nivel de Confort</label>
    </div>

    <div style="margin-left:15px; margin-right:15px;margin-bottom:10px;">
        <table style="width: 100%; margin-top:20px;">
            <tr style="">
            <th class="sol_ab_yrs_style_confort" style="width:170px;">Solución Existente</th>
            <?php  $conf_val_base=$conf_val->conf_val($id_project,1,1,$sumacap_term_1); ?>

                    <?php
                             $val_ini = 1;
                             $val_fin = 1.125;
                        ?>
                    @for ($i = 1; $i <= 32; $i++)
                    @if ($i == 1)
                    <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}}); border-top-left-radius:3px; border-bottom-left-radius:3px;"  id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                    @endif
                    @if ($i > 1 && $i < 32)
                    <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}});  id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                    @endif
                    @if ($i == 32)
                    <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}});border-top-right-radius:3px; border-bottom-right-radius:3px;" id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                    @endif

                        @if ($conf_val_base >= $val_ini && $conf_val_base < $val_fin)
                        <img  id="val_base_{{$i}}" name="val_base_{{$i}}" src="../public/assets/images/puntero_barra.png"  class="puntero_medidas" alt="">
                        @else
                       <p>&nbsp;</p>
                        @endif

                    </td>
                    <?php
                    $val_ini = $val_ini + 0.125;
                    $val_fin = $val_fin + 0.125;
                    ?>
                    @endfor
            <td style="width:80px;"></td>
            </tr>
            <tr><th style="height:10px;width:170px;">&nbsp;</th>
               @for ($i = 1; $i <= 32; $i++)
                    <td  id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                    </td>
                @endfor
            </tr>{{-- espacio --}}
            <tr>
                <th class="sol_ab_yrs_style_confort" style="width:170px;">Solución A</th>

                @if ($result2 !== null)
                <?php  $conf_val_a=$conf_val->conf_val($id_project,2,1,$sumacap_term_2);?>
                @endif

                @if ($result2 === null)
                <?php  $conf_val_a=0; ?>
                @endif
                <?php
                $val_ini = 1;
                $val_fin = 1.125;
                 ?>
                @for ($i = 1; $i <= 32; $i++)
                @if ($i == 1)
                <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}});border-top-left-radius:3px; border-bottom-left-radius:3px;" id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                @endif
                @if ($i > 1 && $i < 32)
                <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}});" id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                @endif
                @if ($i == 32)
                <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}});border-top-right-radius:3px; border-bottom-right-radius:3px;" id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                @endif

                    @if ($conf_val_a >= $val_ini && $conf_val_a < $val_fin)
                    <img  id="val_base_{{$i}}" name="val_base_{{$i}}" src="../public/assets/images/puntero_barra.png"  class="puntero_medidas" alt="">
                    @else
                    <p>&nbsp;</p>
                    @endif

                </td>
                <?php
                $val_ini = $val_ini + 0.125;
                $val_fin = $val_fin + 0.125;
                ?>
                @endfor
                    <td style="width:80px;"></td>


            </tr>
            <tr><th style="height:10px;width:170px;">&nbsp;</th>
               @for ($i = 1; $i <= 32; $i++)
                    <td  id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                    </td>
                @endfor
            </tr>{{-- espacio --}}
            <tr>
                <td class="sol_ab_yrs_style_confort" style="width:170px;">Solución B</td>

                @if ($result3 !== null)
                <?php  $conf_val_b=$conf_val->conf_val($id_project,3,1,$sumacap_term_3) ?>
                @endif

                @if ($result3 === null)
                <?php  $conf_val_b=0; ?>
                @endif
                <?php
                $val_ini = 1;
                $val_fin = 1.125;
                 ?>
                @for ($i = 1; $i <= 32; $i++)
                @if ($i == 1)
                <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}}); border-top-left-radius:3px; border-bottom-left-radius:3px;" id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                @endif
                @if ($i > 1 && $i < 32)
                <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}});" id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                @endif
                @if ($i == 32)
                <td style="background-image:url({{public_path('../public/assets/images/term/teemr_'.$i.'.png')}}); border-top-right-radius:3px; border-bottom-right-radius:3px;" id="term_{{$i}}" name="term_{{$i}}" class="ancho_rang">
                @endif

                    @if ($conf_val_b >= $val_ini && $conf_val_b < $val_fin)
                    <img  id="val_base_{{$i}}" name="val_base_{{$i}}" src="../public/assets/images/puntero_barra.png"  class="puntero_medidas" alt="">
                    @else
                    <p>&nbsp;</p>
                    @endif

                </td>
                <?php
                $val_ini = $val_ini + 0.125;
                $val_fin = $val_fin + 0.125;
                ?>
                @endfor
                    <td style="width:80px;"></td>

            </tr>

        </table>
    </div>

</div>

<div  style="margin-top:6px; height:25%;" class="tarjet">
    <div align="center" class="title_tarjet_blue">
        <label  class="title_style">Productividad Laboral</label>
    </div>

    <div>
        <div style="margin-right:5px;margin-top:10px;" class="column" >
            <div style="width:95%;border:3px solid #2c5282;margin-left:4px; border-radius:5px;">
                <?php  $conf_val_base=$conf_val->conf_val($id_project,1,1,$sumacap_term_1);?>
                <img style="width: 200px;height:150px; margin-left:15px;" src="https://quickchart.io/chart?v=2.9.4&c={ type: 'gauge', data: { datasets: [ { value: {{$conf_val_base}}, data: [2, 4, 6], backgroundColor: ['red','yellow','green'], borderWidth: 2, }, ], }, options: { valueLabel: { display: false, }, }, }">
                 <label for="" style="margin-left:60px; font-size:24px; font-family: 'ABeeZee', sans-serif;color:#2c5282;">Existente</label>
            </div>
        </div>
        <div style="margin-right:5px;margin-top:10px;" class="column" >
            <div style="width:95%;border:3px solid #2c5282;margin-left:3px; border-radius:5px;">
                @if ($result2 !== null)
                <?php  $conf_val_a=$conf_val->conf_val($id_project,2,1,$sumacap_term_2);?>
                @endif

                @if ($result2 === null)
                <?php  $conf_val_a=0;?>
                @endif
                <img style="width: 200px;height:150px; margin-left:15px;" src="https://quickchart.io/chart?v=2.9.4&c={ type: 'gauge', data: { datasets: [ { value: {{$conf_val_a}}, data: [2, 4, 6], backgroundColor: ['red','yellow','green'], borderWidth: 2, }, ], }, options: { valueLabel: { display: false, }, }, }">
                <label for="" style="margin-left:108px; font-size:24px; font-family: 'ABeeZee', sans-serif;color:#2c5282;">A</label>

            </div>
        </div>
        <div style="margin-right:5px;margin-top:10px;" class="column" >
            <div style="width:95%;border:3px solid #2c5282;margin-left:0px; border-radius:5px;">
                @if ($result3 !== null)
                <?php  $conf_val_b=$conf_val->conf_val($id_project,3,1,$sumacap_term_3) ?>
                @endif

                @if ($result3 === null)
                <?php  $conf_val_b=0;?>
                @endif
                <img style="width: 200px;height:150px; margin-left:15px;" src="https://quickchart.io/chart?v=2.9.4&c={ type: 'gauge', data: { datasets: [ { value: {{$conf_val_b}}, data: [2, 4, 6], backgroundColor: ['red','yellow','green'], borderWidth: 2, }, ], }, options: { valueLabel: { display: false, }, }, }">
                <label for="" style="margin-left:108px; font-size:24px; font-family: 'ABeeZee', sans-serif;color:#2c5282;">B</label>

            </div>
        </div>
    </div>
   {{--  <div style="width:100%;">
        <img style="width: 300px;height:200px; margin-left:50px;" src="https://quickchart.io/chart?v=2.9.4&c={ type: 'gauge', data: { datasets: [ { value: 3, data: [1.5, 4.5, 6], backgroundColor: ['red','yellow','green'], borderWidth: 2, }, ], }, options: { valueLabel: { display: false, }, }, }">
    </div> --}}
</div>

    <script type="text/javascript">
   $(document).ready(function() {
    alert('Page is loaded');
})
    </script>
</body>
</html>
