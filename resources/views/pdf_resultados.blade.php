<!DOCTYPE html>
@inject('solutions','app\Http\Controllers\ResultadosController')
@inject('results','app\Http\Controllers\ResultadosController')
@inject('smasolutions','app\Http\Controllers\ResultadosController')
@inject('sumacap_term','app\Http\Controllers\ResultadosController')
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

.title_tarjet {
  background-color:#ed8936;
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
    padding-top:10px;
    padding-bottom:10px;
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
    width:100%;background-color: #2c5282;
    border_radius:5px;
}

.sol_ab{
    background-color: #4299e1;
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
            font-size:30px;
            font-family: 'ABeeZee', sans-serif;
            font-weight: bold;
            padding:5px;
        }

        .sol_ab_yrs_style{
            font-size:20px;
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
                    <td class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,10)}}</label></td>
                    <td class="info_project_size_font"><label for="">País:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
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

    <div style="margin-top:5px; height:85%;" class="tarjet">
        <?php  $solutions=$solutions->solutions($id_project) ?>
        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_base">
                        <label style="margin-left:40px;" class="title_style">Solución Base</label>
                    </div>
                    <table class="">
                        <tbody style="width: 100%;">
                            @foreach ($solutions as $solution)
                            @if ($solution->num_sol == 1 && $solution->num_enf == 1)
                            <tr class="tr_style">
                                {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                                 <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 1</label> </td>
                                {{--  @endif --}}
                               </tr>

                            <tr class="tr_style">
                                    <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                    <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                              {{--   @endif --}}
                            </tr>
                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                           {{--  @endif --}}
                          </tr>

                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                            <td class="td_style style_sol_elem_value">
                                @if ($solution->unidad_hvac == 1)
                                Paquetes (RTU)
                                @endif
                                @if ($solution->unidad_hvac == 2)
                                Split
                                @endif
                                @if ($solution->unidad_hvac == 3)
                                VRF No Ductados
                                @endif
                                @if ($solution->unidad_hvac == 4)
                                VRF Ductados
                                @endif
                                @if ($solution->unidad_hvac == 5)
                                PTAC
                                @endif
                                @if ($solution->unidad_hvac == 6)
                                WSHP
                                @endif
                                @if ($solution->unidad_hvac == 7)
                                Minisplit Inverter
                                @endif
                                @if ($solution->unidad_hvac == 8)
                               Chiller
                                @endif</td>
                        </tr>
                        <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                             <td class="td_style style_sol_elem_value">
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

                                @if ($solution->tipo_equipo == 'ca_pi_te')
                                Cassette y Piso Techo
                                @endif

                                @if ($solution->tipo_equipo == 'fa_man')
                                Fancoils y Manejadoras
                                @endif

                                @if ($solution->tipo_equipo == 'est_ptac')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'est_wshp')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'pa_pi_te')
                                Pared - Piso - Techo
                                @endif

                                @if ($solution->tipo_equipo == 'enf_agu')
                                Enfriado por Agua
                                @endif

                                @if ($solution->tipo_equipo == 'enf_air')
                                Enfriado por Aire
                                @endif</td>

                           </tr>

                           <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                             <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                           </tr>

                           <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                            <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                            <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                            <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                          </tr>
                            @endif
                            {{--1-2--}}

                           @if ($solution->num_sol == 2 && $solution->num_enf == 1)
                           <tr style="border-top:1px solid;border-color:#e2e8f0;" class="tr_style">
                            {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                             <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 2</label> </td>
                             <td class="td_style style_sol_elem_value"><label class="label_style_sol_val"></label></td>
                             {{--  @endif --}}
                           </tr>
                            <tr  class="tr_style">
                                    <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                    <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                              {{--   @endif --}}
                            </tr>
                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                           {{--  @endif --}}
                          </tr>

                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                            <td class="td_style style_sol_elem_value">
                                @if ($solution->unidad_hvac == 1)
                                Paquetes (RTU)
                                @endif
                                @if ($solution->unidad_hvac == 2)
                                Split
                                @endif
                                @if ($solution->unidad_hvac == 3)
                                VRF No Ductados
                                @endif
                                @if ($solution->unidad_hvac == 4)
                                VRF Ductados
                                @endif
                                @if ($solution->unidad_hvac == 5)
                                PTAC
                                @endif
                                @if ($solution->unidad_hvac == 6)
                                WSHP
                                @endif
                                @if ($solution->unidad_hvac == 7)
                                Minisplit Inverter
                                @endif
                                @if ($solution->unidad_hvac == 8)
                               Chiller
                                @endif</td>
                        </tr>
                        <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                             <td class="td_style style_sol_elem_value">
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

                                @if ($solution->tipo_equipo == 'ca_pi_te')
                                Cassette y Piso Techo
                                @endif

                                @if ($solution->tipo_equipo == 'fa_man')
                                Fancoils y Manejadoras
                                @endif

                                @if ($solution->tipo_equipo == 'est_ptac')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'est_wshp')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'pa_pi_te')
                                Pared - Piso - Techo
                                @endif

                                @if ($solution->tipo_equipo == 'enf_agu')
                                Enfriado por Agua
                                @endif

                                @if ($solution->tipo_equipo == 'enf_air')
                                Enfriado por Aire
                                @endif</td>

                           </tr>

                           <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                             <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                           </tr>

                           <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                            <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                            <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                            <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                          </tr>
                            @endif
                            {{-- 1-3 --}}
                          @if ($solution->num_sol == 3 && $solution->num_enf == 1)

                          <tr style="border-top:1px solid;border-color:#e2e8f0;" class="tr_style">
                            {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                             <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 3</label> </td>
                             <td class="td_style style_sol_elem_value"><label class="label_style_sol_val"></label></td>
                             {{--  @endif --}}
                           </tr>

                            <tr class="tr_style">
                                    <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                    <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                              {{--   @endif --}}
                            </tr>
                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                           {{--  @endif --}}
                          </tr>

                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                            <td class="td_style style_sol_elem_value">
                                @if ($solution->unidad_hvac == 1)
                                Paquetes (RTU)
                                @endif
                                @if ($solution->unidad_hvac == 2)
                                Split
                                @endif
                                @if ($solution->unidad_hvac == 3)
                                VRF No Ductados
                                @endif
                                @if ($solution->unidad_hvac == 4)
                                VRF Ductados
                                @endif
                                @if ($solution->unidad_hvac == 5)
                                PTAC
                                @endif
                                @if ($solution->unidad_hvac == 6)
                                WSHP
                                @endif
                                @if ($solution->unidad_hvac == 7)
                                Minisplit Inverter
                                @endif
                                @if ($solution->unidad_hvac == 8)
                               Chiller
                                @endif</td>
                        </tr>
                        <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                             <td class="td_style style_sol_elem_value">
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

                                @if ($solution->tipo_equipo == 'ca_pi_te')
                                Cassette y Piso Techo
                                @endif

                                @if ($solution->tipo_equipo == 'fa_man')
                                Fancoils y Manejadoras
                                @endif

                                @if ($solution->tipo_equipo == 'est_ptac')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'est_wshp')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'pa_pi_te')
                                Pared - Piso - Techo
                                @endif

                                @if ($solution->tipo_equipo == 'enf_agu')
                                Enfriado por Agua
                                @endif

                                @if ($solution->tipo_equipo == 'enf_air')
                                Enfriado por Aire
                                @endif</td>

                           </tr>

                           <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                             <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                           </tr>

                           <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                            <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                            <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                            <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                          </tr>
                            @endif
                          @endforeach
                        </tbody>
                      </table>
                </div>

            </div>

            <div>
                <div style="margin-top:5px;" class="column" >
                    <div style="background-color: #4299e1;width:100%; border_radius:5px;">
                        <label style="margin-left:45px;" class="title_style">Solución A</label>
                    </div>
                    <table class="">
                        <tbody style="width: 100%;">
                            @foreach ($solutions as $solution)
                            @if ($solution->num_sol == 1 && $solution->num_enf == 2)
                            <tr class="tr_style">
                                {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                                 <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 1</label> </td>
                                {{--  @endif --}}
                            </tr>
                            <tr class="tr_style">
                                    <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                    <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                              {{--   @endif --}}
                            </tr>
                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                           {{--  @endif --}}
                          </tr>

                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                            <td class="td_style style_sol_elem_value">
                                @if ($solution->unidad_hvac == 1)
                                Paquetes (RTU)
                                @endif
                                @if ($solution->unidad_hvac == 2)
                                Split
                                @endif
                                @if ($solution->unidad_hvac == 3)
                                VRF No Ductados
                                @endif
                                @if ($solution->unidad_hvac == 4)
                                VRF Ductados
                                @endif
                                @if ($solution->unidad_hvac == 5)
                                PTAC
                                @endif
                                @if ($solution->unidad_hvac == 6)
                                WSHP
                                @endif
                                @if ($solution->unidad_hvac == 7)
                                Minisplit Inverter
                                @endif
                                @if ($solution->unidad_hvac == 8)
                               Chiller
                                @endif</td>
                        </tr>
                        <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                             <td class="td_style style_sol_elem_value">
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

                                @if ($solution->tipo_equipo == 'ca_pi_te')
                                Cassette y Piso Techo
                                @endif

                                @if ($solution->tipo_equipo == 'fa_man')
                                Fancoils y Manejadoras
                                @endif

                                @if ($solution->tipo_equipo == 'est_ptac')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'est_wshp')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'pa_pi_te')
                                Pared - Piso - Techo
                                @endif

                                @if ($solution->tipo_equipo == 'enf_agu')
                                Enfriado por Agua
                                @endif

                                @if ($solution->tipo_equipo == 'enf_air')
                                Enfriado por Aire
                                @endif</td>

                           </tr>

                           <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                             <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                           </tr>

                           <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                            <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                            <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                            <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                          </tr>
                            @endif

                                      {{--2-2--}}
                           @if ($solution->num_sol == 2 && $solution->num_enf == 2)
                           <tr style="border-top:1px solid;border-color:#e2e8f0;" class="tr_style">
                            {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                             <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 2</label> </td>
                             <td class="td_style style_sol_elem_value"><label class="label_style_sol_val"></label></td>
                             {{--  @endif --}}
                           </tr>
                           <tr class="tr_style">
                                   <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                   <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                             {{--   @endif --}}
                           </tr>
                         <tr class="tr_style">
                          {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                           <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                           <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                          {{--  @endif --}}
                         </tr>

                         <tr class="tr_style">
                          {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                           <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                           <td class="td_style style_sol_elem_value">
                               @if ($solution->unidad_hvac == 1)
                               Paquetes (RTU)
                               @endif
                               @if ($solution->unidad_hvac == 2)
                               Split
                               @endif
                               @if ($solution->unidad_hvac == 3)
                               VRF No Ductados
                               @endif
                               @if ($solution->unidad_hvac == 4)
                               VRF Ductados
                               @endif
                               @if ($solution->unidad_hvac == 5)
                               PTAC
                               @endif
                               @if ($solution->unidad_hvac == 6)
                               WSHP
                               @endif
                               @if ($solution->unidad_hvac == 7)
                               Minisplit Inverter
                               @endif
                               @if ($solution->unidad_hvac == 8)
                              Chiller
                               @endif</td>
                       </tr>
                       <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                            <td class="td_style style_sol_elem_value">
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

                               @if ($solution->tipo_equipo == 'ca_pi_te')
                               Cassette y Piso Techo
                               @endif

                               @if ($solution->tipo_equipo == 'fa_man')
                               Fancoils y Manejadoras
                               @endif

                               @if ($solution->tipo_equipo == 'est_ptac')
                               Estándar
                               @endif

                               @if ($solution->tipo_equipo == 'est_wshp')
                               Estándar
                               @endif

                               @if ($solution->tipo_equipo == 'pa_pi_te')
                               Pared - Piso - Techo
                               @endif

                               @if ($solution->tipo_equipo == 'enf_agu')
                               Enfriado por Agua
                               @endif

                               @if ($solution->tipo_equipo == 'enf_air')
                               Enfriado por Aire
                               @endif</td>

                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                          </tr>

                          <tr class="tr_style">
                           <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                           <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                         </tr>

                         <tr class="tr_style">
                           <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                           <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                         </tr>

                         <tr class="tr_style">
                           <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                           <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                         </tr>

                         <tr class="tr_style">
                           <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                           <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                         </tr>
                           @endif

                                     {{--2-3--}}
                                     @if ($solution->num_sol == 3 && $solution->num_enf == 2)

                                     <tr style="border-top:1px solid;border-color:#e2e8f0;" class="tr_style">
                                        {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                                         <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 3</label> </td>
                                         <td class="td_style style_sol_elem_value"><label class="label_style_sol_val"></label></td>
                                         {{--  @endif --}}
                                       </tr>

                                     <tr class="tr_style">
                                             <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                             <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                                       {{--   @endif --}}
                                     </tr>
                                   <tr class="tr_style">
                                    {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                                     <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                                     <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                                    {{--  @endif --}}
                                   </tr>

                                   <tr class="tr_style">
                                    {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                                     <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                                     <td class="td_style style_sol_elem_value">
                                         @if ($solution->unidad_hvac == 1)
                                         Paquetes (RTU)
                                         @endif
                                         @if ($solution->unidad_hvac == 2)
                                         Split
                                         @endif
                                         @if ($solution->unidad_hvac == 3)
                                         VRF No Ductados
                                         @endif
                                         @if ($solution->unidad_hvac == 4)
                                         VRF Ductados
                                         @endif
                                         @if ($solution->unidad_hvac == 5)
                                         PTAC
                                         @endif
                                         @if ($solution->unidad_hvac == 6)
                                         WSHP
                                         @endif
                                         @if ($solution->unidad_hvac == 7)
                                         Minisplit Inverter
                                         @endif
                                         @if ($solution->unidad_hvac == 8)
                                        Chiller
                                         @endif</td>
                                 </tr>
                                 <tr class="tr_style">
                                      <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                                      <td class="td_style style_sol_elem_value">
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

                                         @if ($solution->tipo_equipo == 'ca_pi_te')
                                         Cassette y Piso Techo
                                         @endif

                                         @if ($solution->tipo_equipo == 'fa_man')
                                         Fancoils y Manejadoras
                                         @endif

                                         @if ($solution->tipo_equipo == 'est_ptac')
                                         Estándar
                                         @endif

                                         @if ($solution->tipo_equipo == 'est_wshp')
                                         Estándar
                                         @endif

                                         @if ($solution->tipo_equipo == 'pa_pi_te')
                                         Pared - Piso - Techo
                                         @endif

                                         @if ($solution->tipo_equipo == 'enf_agu')
                                         Enfriado por Agua
                                         @endif

                                         @if ($solution->tipo_equipo == 'enf_air')
                                         Enfriado por Aire
                                         @endif</td>

                                    </tr>

                                    <tr class="tr_style">
                                      <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                                      <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                                    </tr>

                                    <tr class="tr_style">
                                     <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                                     <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                                   </tr>

                                   <tr class="tr_style">
                                     <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                                     <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                                   </tr>

                                   <tr class="tr_style">
                                     <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                                     <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                                   </tr>

                                   <tr class="tr_style">
                                     <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                                     <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                                   </tr>
                                     @endif
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>

            <div>
                <div style="margin-left:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;background-color:#4299e1;border_radius:5px;">
                        <label style="margin-left:45px;" class="title_style">Solución B</label>
                    </div>
                    <table class="">
                        <tbody style="width: 100%;">
                            @foreach ($solutions as $solution)
                            @if ($solution->num_sol == 1 && $solution->num_enf == 3)
                            <tr class="tr_style">
                                {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                                 <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 1</label> </td>
                                {{--  @endif --}}
                               </tr>

                            <tr class="tr_style">
                                    <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                    <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                              {{--   @endif --}}
                            </tr>
                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                           {{--  @endif --}}
                          </tr>

                          <tr class="tr_style">
                           {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                            <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                            <td class="td_style style_sol_elem_value">
                                @if ($solution->unidad_hvac == 1)
                                Paquetes (RTU)
                                @endif
                                @if ($solution->unidad_hvac == 2)
                                Split
                                @endif
                                @if ($solution->unidad_hvac == 3)
                                VRF No Ductados
                                @endif
                                @if ($solution->unidad_hvac == 4)
                                VRF Ductados
                                @endif
                                @if ($solution->unidad_hvac == 5)
                                PTAC
                                @endif
                                @if ($solution->unidad_hvac == 6)
                                WSHP
                                @endif
                                @if ($solution->unidad_hvac == 7)
                                Minisplit Inverter
                                @endif
                                @if ($solution->unidad_hvac == 8)
                               Chiller
                                @endif</td>
                        </tr>
                        <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                             <td class="td_style style_sol_elem_value">
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

                                @if ($solution->tipo_equipo == 'ca_pi_te')
                                Cassette y Piso Techo
                                @endif

                                @if ($solution->tipo_equipo == 'fa_man')
                                Fancoils y Manejadoras
                                @endif

                                @if ($solution->tipo_equipo == 'est_ptac')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'est_wshp')
                                Estándar
                                @endif

                                @if ($solution->tipo_equipo == 'pa_pi_te')
                                Pared - Piso - Techo
                                @endif

                                @if ($solution->tipo_equipo == 'enf_agu')
                                Enfriado por Agua
                                @endif

                                @if ($solution->tipo_equipo == 'enf_air')
                                Enfriado por Aire
                                @endif</td>

                           </tr>

                           <tr class="tr_style">
                             <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                             <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                           </tr>

                           <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                            <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                            <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                            <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                          </tr>

                          <tr class="tr_style">
                            <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                            <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                          </tr>
                            @endif

                               {{--3-2--}}
                               @if ($solution->num_sol == 2 && $solution->num_enf == 3)
                               <tr style="border-top:1px solid;border-color:#e2e8f0;" class="tr_style">
                                {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                                 <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 2</label> </td>
                                 <td class="td_style style_sol_elem_value"><label class="label_style_sol_val"></label></td>
                                 {{--  @endif --}}
                               </tr>
                               <tr  class="tr_style">
                                       <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                       <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                                 {{--   @endif --}}
                               </tr>
                             <tr class="tr_style">
                              {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                               <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                               <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                              {{--  @endif --}}
                             </tr>

                             <tr class="tr_style">
                              {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                               <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                               <td class="td_style style_sol_elem_value">
                                   @if ($solution->unidad_hvac == 1)
                                   Paquetes (RTU)
                                   @endif
                                   @if ($solution->unidad_hvac == 2)
                                   Split
                                   @endif
                                   @if ($solution->unidad_hvac == 3)
                                   VRF No Ductados
                                   @endif
                                   @if ($solution->unidad_hvac == 4)
                                   VRF Ductados
                                   @endif
                                   @if ($solution->unidad_hvac == 5)
                                   PTAC
                                   @endif
                                   @if ($solution->unidad_hvac == 6)
                                   WSHP
                                   @endif
                                   @if ($solution->unidad_hvac == 7)
                                   Minisplit Inverter
                                   @endif
                                   @if ($solution->unidad_hvac == 8)
                                  Chiller
                                   @endif</td>
                           </tr>
                           <tr class="tr_style">
                                <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                                <td class="td_style style_sol_elem_value">
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

                                   @if ($solution->tipo_equipo == 'ca_pi_te')
                                   Cassette y Piso Techo
                                   @endif

                                   @if ($solution->tipo_equipo == 'fa_man')
                                   Fancoils y Manejadoras
                                   @endif

                                   @if ($solution->tipo_equipo == 'est_ptac')
                                   Estándar
                                   @endif

                                   @if ($solution->tipo_equipo == 'est_wshp')
                                   Estándar
                                   @endif

                                   @if ($solution->tipo_equipo == 'pa_pi_te')
                                   Pared - Piso - Techo
                                   @endif

                                   @if ($solution->tipo_equipo == 'enf_agu')
                                   Enfriado por Agua
                                   @endif

                                   @if ($solution->tipo_equipo == 'enf_air')
                                   Enfriado por Aire
                                   @endif</td>

                              </tr>

                              <tr class="tr_style">
                                <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                                <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                              </tr>

                              <tr class="tr_style">
                               <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                               <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                             </tr>

                             <tr class="tr_style">
                               <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                               <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                             </tr>

                             <tr class="tr_style">
                               <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                               <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                             </tr>

                             <tr class="tr_style">
                               <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                               <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                             </tr>
                               @endif


                              {{--3-3--}}
                              @if ($solution->num_sol == 3 && $solution->num_enf == 3)

                              <tr style="border-top:1px solid;border-color:#e2e8f0;" class="tr_style">
                                {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                                 <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for="">SISTEMA HVAC 2</label> </td>
                                 <td class="td_style style_sol_elem_value"><label class="label_style_sol_val"></label></td>
                                 {{--  @endif --}}
                               </tr>

                              <tr class="tr_style">
                                      <td class="td_style style_sol_elem_name"><label class="label_style_sol">Capacidad Térmica</label></td>
                                      <td class="td_style style_sol_elem_value"><label class="label_style_sol_val">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label></td>
                                {{--   @endif --}}
                              </tr>
                            <tr class="tr_style">
                             {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                              <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">{{$solution->eficencia_ene}}</label></td>
                              <td class="td_style style_sol_elem_value">{{$solution->eficencia_ene_cant}}</td>
                             {{--  @endif --}}
                            </tr>

                            <tr class="tr_style">
                             {{--  @if ($solution->num_sol == 1 && $solution->num_enf == 1) --}}
                              <td class="td_style style_sol_elem_name"><label  class="label_style_sol" for=""> Equipos HVAC</label></td>
                              <td class="td_style style_sol_elem_value">
                                  @if ($solution->unidad_hvac == 1)
                                  Paquetes (RTU)
                                  @endif
                                  @if ($solution->unidad_hvac == 2)
                                  Split
                                  @endif
                                  @if ($solution->unidad_hvac == 3)
                                  VRF No Ductados
                                  @endif
                                  @if ($solution->unidad_hvac == 4)
                                  VRF Ductados
                                  @endif
                                  @if ($solution->unidad_hvac == 5)
                                  PTAC
                                  @endif
                                  @if ($solution->unidad_hvac == 6)
                                  WSHP
                                  @endif
                                  @if ($solution->unidad_hvac == 7)
                                  Minisplit Inverter
                                  @endif
                                  @if ($solution->unidad_hvac == 8)
                                 Chiller
                                  @endif</td>
                          </tr>
                          <tr class="tr_style">
                               <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Equipo</label> </td>
                               <td class="td_style style_sol_elem_value">
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

                                  @if ($solution->tipo_equipo == 'ca_pi_te')
                                  Cassette y Piso Techo
                                  @endif

                                  @if ($solution->tipo_equipo == 'fa_man')
                                  Fancoils y Manejadoras
                                  @endif

                                  @if ($solution->tipo_equipo == 'est_ptac')
                                  Estándar
                                  @endif

                                  @if ($solution->tipo_equipo == 'est_wshp')
                                  Estándar
                                  @endif

                                  @if ($solution->tipo_equipo == 'pa_pi_te')
                                  Pared - Piso - Techo
                                  @endif

                                  @if ($solution->tipo_equipo == 'enf_agu')
                                  Enfriado por Agua
                                  @endif

                                  @if ($solution->tipo_equipo == 'enf_air')
                                  Enfriado por Aire
                                  @endif</td>

                             </tr>

                             <tr class="tr_style">
                               <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Diseño</label></td>
                               <td class="td_style style_sol_elem_value">{{$solution->name_disenio}}</td>
                             </tr>

                             <tr class="tr_style">
                              <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Tipo Control</label></td>
                              <td class="td_style style_sol_elem_value">{{$solution->name_t_control}}</td>
                            </tr>

                            <tr class="tr_style">
                              <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Difusor o Rejilla</label>                             </td>
                              <td class="td_style style_sol_elem_value">{{$solution->dr_name}}</td>
                            </tr>

                            <tr class="tr_style">
                              <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Mantenimiento</label> </td>
                              <td class="td_style style_sol_elem_value">{{$solution->mantenimiento}}</td>
                            </tr>

                            <tr class="tr_style">
                              <td class="td_style style_sol_elem_name"><label class="label_style_sol" for="">Inversión Inicial (CAPEX)</label></td>
                              <td class="td_style style_sol_elem_value">${{number_format($solution->val_aprox)}}</td>
                            </tr>
                              @endif

                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>


        </div>


    </div>
    {{-- 2 --}}
    <div style="page-break-after:always;"></div>

    <div class="tarjet">
        <div align="center" class="title_tarjet">
            <label  class="title_style">RESULTADOS ANÁLISIS ENERGÉTICO</label>
        </div>

        <div>
            <table class="">
                <tbody>
                  <tr>
                    <td class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,10)}}</label></td>
                    <td class="info_project_size_font"><label for="">País:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
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
                        <label style="margin-left:40px;" class="title_style">Solución Base</label>
                    </div>
                    {{-- Capacidad Total --}}
                    <table class="">
                        <tbody style="width: 100%;">

                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                                </tr>

                                <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                    <label style="" class="unit_cap_term" for="">TR</label>
                                  </td>
                        </tbody>
                    </table>
                    {{-- Consumo anual opex --}}
                    <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
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
                        <label style="margin-left:45px;" class="title_style">Solución A</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                  <label  class="unit_cap_term" for="">TR</label>
                                </td>
                      </tbody>
                  </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
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
                        <label style="margin-left:45px;" class="title_style">Solución B</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                  <label class="unit_cap_term" for="">TR</label>
                                </td>
                      </tbody>
                  </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
                                <label  class="unit_cap_term" for="">Kw/hr</label>
                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Consumo de Energía HVAC por Área (Kwh/ m² )
 --}}
{{-- title_style_no_bg --}}
    <div style="margin-top:5px; height:11%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">Consumo de Energía HVAC por Área <b style="color:#ed8936;">(Kwh/ m² )</b></p>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">19.99</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">27.49</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">80.28</label>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
    <div style="margin-top:5px; height:13%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">Ahorro Anual Energía – Diferencia entre Soluciones<b style="color:#ed8936;">(Kw/hr año)</b></p>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <label style="margin-left:100px;" class="dif_sols_subtitle">Solución Base v/s A</label>
                    </div>
                    <div style="width:100%;">
                        <label style="margin-left:150px;" class="cant_green">-32,178</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <label style="margin-left:50px;" class="dif_sols_subtitle">Solución Base v/s B</label>
                    </div>
                    <div style="width:100%;">
                        <label style="margin-left:90px;" class="cant_green">-252,128</label>
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
                    <td class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,10)}}</label></td>
                    <td class="info_project_size_font"><label for="">País:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
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
                        <label style="margin-left:40px;" class="title_style">Solución Base</label>
                    </div>
                    {{-- Capacidad Total --}}
                    <table class="">
                        <tbody style="width: 100%;">

                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                                </tr>

                                <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                    <label style="" class="unit_cap_term" for="">TR</label>
                                  </td>
                        </tbody>
                    </table>
                    {{-- inv iniciaol --}}
                    <table class="">
                        <tbody style="width: 100%;">

                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Inversión Inicial</label></td>
                                </tr>

                                <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
                                  </td>
                        </tbody>
                    </table>
                    {{-- Consumo anual opex --}}
                    <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
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
                        <label style="margin-left:45px;" class="title_style">Solución A</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                  <label  class="unit_cap_term" for="">TR</label>
                                </td>
                      </tbody>
                  </table>
                  {{-- inv iniciaol --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Inversión Inicial</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
                              </td>
                    </tbody>
                </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
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
                        <label style="margin-left:45px;" class="title_style">Solución B</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                  <label class="unit_cap_term" for="">TR</label>
                                </td>
                      </tbody>
                  </table>
                  {{-- inv iniciaol --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Inversión Inicial</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
                              </td>
                    </tbody>
                </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
                                <label  class="unit_cap_term" for="">Kw/hr</label>
                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    {{-- nversión Inicial (CAPEX) por Área ($/m²) --}}
    <div style="margin-top:5px; height:11%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">Inversión Inicial (CAPEX) por Área<b style="color:#ed8936;">($/m²)</b></p>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">19.99</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">27.49</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">80.28</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
{{-- Consumo de Energía (OPEX) por Área --}}
    <div style="margin-top:5px; height:11%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">Consumo de Energía (OPEX) por Área<b style="color:#ed8936;">($/m²)</b></p>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">19.99</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">27.49</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">80.28</label>
                    </div>
                </div>
            </div>
        </div>
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
                        <label style="margin-left:60px;" class="cant_green">19.99</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">27.49</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">80.28</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
<div style="margin-top:5px; height:13%;" class="tarjet">
    <div align="center" class="title_tarjet_no_bg">
        <p  class="title_style_no_bg">Ahorro Anual de Costo Energético – Entre Soluciones<b style="color:#ed8936;">(Kw/hr año)</b></p>
    </div>

    <div style="margin-left:15px; margin-right:15px;">
        <div>
            <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                <div style="width:100%;">
                    <label style="margin-left:100px;" class="dif_sols_subtitle">Solución Base v/s A</label>
                </div>
                <div style="width:100%;">
                    <label style="margin-left:150px;" class="cant_green">-32,178</label>
                </div>
            </div>
            <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                <div style="width:100%;">
                    <label style="margin-left:50px;" class="dif_sols_subtitle">Solución Base v/s B</label>
                </div>
                <div style="width:100%;">
                    <label style="margin-left:90px;" class="cant_green">-252,128</label>
                </div>
            </div>
        </div>
    </div>

</div>


{{-- ROI Diferencia de Inversión --}}
     <div style="page-break-after:always;"></div>
{{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
    <div style="margin-top:5px; height:20%;" class="tarjet">
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
                <td class="porcent_yrs_style">-14%</td>
                <td class="porcent_yrs_style">43%</td>
                <td class="porcent_yrs_style">186%</td>
                <td class="porcent_yrs_style">329%</td>
                </tr>
                <tr>
                    <td class="sol_ab_yrs_style">Solución B</td>
                    <td class="porcent_yrs_style">-14%</td>
                    <td class="porcent_yrs_style">43%</td>
                    <td class="porcent_yrs_style">186%</td>
                    <td class="porcent_yrs_style">329%</td>
                </tr>
            </table>
        </div>

    </div>

    {{-- Ahorro Anual Energía – Diferencia entre Soluciones (Kw/hr año) --}}
    <div style="margin-top:5px; height:20%;" class="tarjet">
        <div align="center" class="title_tarjet_no_bg">
            <p  class="title_style_no_bg">ROI Inversión Total</p>
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
                <td class="porcent_yrs_style">-14%</td>
                <td class="porcent_yrs_style">43%</td>
                <td class="porcent_yrs_style">186%</td>
                <td class="porcent_yrs_style">329%</td>
                </tr>
                <tr>
                    <td class="sol_ab_yrs_style">Solución B</td>
                    <td class="porcent_yrs_style">-14%</td>
                    <td class="porcent_yrs_style">43%</td>
                    <td class="porcent_yrs_style">186%</td>
                    <td class="porcent_yrs_style">329%</td>
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
                    <td class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,10)}}</label></td>
                    <td class="info_project_size_font"><label for="">País:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
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
                        <label style="margin-left:40px;" class="title_style">Solución Base</label>
                    </div>
                    {{-- Capacidad Total --}}
                    <table class="">
                        <tbody style="width: 100%;">

                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                                </tr>

                                <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                    <label style="" class="unit_cap_term" for="">TR</label>
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
                        <label style="margin-left:45px;" class="title_style">Solución A</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                  <label  class="unit_cap_term" for="">TR</label>
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
                        <label style="margin-left:45px;" class="title_style">Solución B</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                  <label class="unit_cap_term" for="">TR</label>
                                </td>
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
                <th class="yrs_style">3 Años</th>
                <th class="yrs_style">5 Años</th>
                <th class="yrs_style">10 Años</th>
                <th class="yrs_style">15 Años</th>
                </tr>
                <tr>
                <td class="sol_ab_yrs_style">Solución A</td>
                <td class="porcent_analis_sus_yrs_style">-14%</td>
                <td class="porcent_analis_sus_yrs_style">43%</td>
                <td class="porcent_analis_sus_yrs_style">186%</td>
                <td class="porcent_analis_sus_yrs_style">329%</td>
                </tr>
                <tr>
                    <td class="sol_ab_yrs_style">Solución B</td>
                    <td class="porcent_analis_sus_yrs_style">-14%</td>
                    <td class="porcent_analis_sus_yrs_style">43%</td>
                    <td class="porcent_analis_sus_yrs_style">186%</td>
                    <td class="porcent_analis_sus_yrs_style">329%</td>
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
                <th class="yrs_style">3 Años</th>
                <th class="yrs_style">5 Años</th>
                <th class="yrs_style">10 Años</th>
                <th class="yrs_style">15 Años</th>
                </tr>
                <tr>
                <td class="sol_ab_yrs_style">Solución A</td>
                <td class="porcent_analis_sus_yrs_style">-14%</td>
                <td class="porcent_analis_sus_yrs_style">43%</td>
                <td class="porcent_analis_sus_yrs_style">186%</td>
                <td class="porcent_analis_sus_yrs_style">329%</td>
                </tr>
                <tr>
                    <td class="sol_ab_yrs_style">Solución B</td>
                    <td class="porcent_analis_sus_yrs_style">-14%</td>
                    <td class="porcent_analis_sus_yrs_style">43%</td>
                    <td class="porcent_analis_sus_yrs_style">186%</td>
                    <td class="porcent_analis_sus_yrs_style">329%</td>
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
                <th class="yrs_style">3 Años</th>
                <th class="yrs_style">5 Años</th>
                <th class="yrs_style">10 Años</th>
                <th class="yrs_style">15 Años</th>
                </tr>
                <tr>
                <td class="sol_ab_yrs_style">Solución A</td>
                <td class="porcent_analis_sus_yrs_style">-14%</td>
                <td class="porcent_analis_sus_yrs_style">43%</td>
                <td class="porcent_analis_sus_yrs_style">186%</td>
                <td class="porcent_analis_sus_yrs_style">329%</td>
                </tr>
                <tr>
                    <td class="sol_ab_yrs_style">Solución B</td>
                    <td class="porcent_analis_sus_yrs_style">-14%</td>
                    <td class="porcent_analis_sus_yrs_style">43%</td>
                    <td class="porcent_analis_sus_yrs_style">186%</td>
                    <td class="porcent_analis_sus_yrs_style">329%</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- ANÁLISIS DE LA INTENSIDAD DEL USO DE LA ENERGÍA (EUI) --}}
    <div style="page-break-after:always;"></div>
    <div class="tarjet">
        <div align="center" class="title_tarjet">
            <label  class="title_style">ANÁLISIS DE LA INTENSIDAD DEL USO DE LA ENERGÍA (EUI)</label>
        </div>

        <div>
            <table class="">
                <tbody>
                  <tr>
                    <td class="info_project_size_font"><label for="">Nombre:</label> <label style="color:#3182ce;">{{substr($tar_ele->name, 0,10)}}</label></td>
                    <td class="info_project_size_font"><label for="">País:</label> <label style="color:#3182ce;">{{$tar_ele->region}}</label></td>
                    <td class="info_project_size_font"><label for="">Ciudad:</label> <label style="color:#3182ce;">{{$tar_ele->ciudad}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Categoría Edificio:</label> <label style="color:#3182ce;">{{$tar_ele->cad_edi}}</label></td></td>
                    <td class="info_project_size_font"><label for="">Área:</label> <label style="color:#3182ce;">{{number_format($tar_ele->area)}}</label></td></td>
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
    <div  style="margin-top:5px; height:35%;" class="tarjet">
        <div align="center" style="margin-left:15px; margin-right:15px;">
            <label class="title_style_no_bg" for="">{{$tar_ele->tipo_edi}}  (KBTU/sqf)</label>
        </div>

        <div style="margin-left:15px; margin-right:15px; margin-top:5px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <img  src="../public/assets/images/Energy-Star-Logo.png" width="150px" height="80px"/>
                        <label style="margin-left:px;" class="dif_sols_subtitle">EUI - Energy Star</label>
                    </div>

                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column_x_2" >
                    <div style="width:100%;">
                        <img  src="../public/assets/images/Logo-ASHRAE-png.png" width="110px" height="80px"/>
                        <label style="margin-left:px;" class="dif_sols_subtitle">EUI - ASHRAE</label>
                    </div>

                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div class="sol_base" style="width:100%;">
                        <label style="margin-left:40px;" class="title_style">Solución Base</label>
                    </div>
                    {{-- Capacidad Total --}}
                    <table class="">
                        <tbody style="width: 100%;">

                            <tr class="tr_style">
                                <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                                </tr>

                                <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                    <label style="" class="unit_cap_term" for="">TR</label>
                                  </td>
                        </tbody>
                    </table>
                    {{-- Consumo anual opex --}}
                    <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>

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
                        <label style="margin-left:45px;" class="title_style">Solución A</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                  <label  class="unit_cap_term" for="">TR</label>
                                </td>
                      </tbody>
                  </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>
                                <
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
                        <label style="margin-left:45px;" class="title_style">Solución B</label>
                    </div>

                     {{-- Capacidad Total --}}
                     <table class="">
                      <tbody style="width: 100%;">

                          <tr class="tr_style">
                              <td style="width: 100%;" class=""><label style="margin-left:15px;" class="title_cap_term" for="">Capacidad Térmica Total</label></td>
                              </tr>

                              <td style="width: 100%;" class=""><label style="margin-left:90px;" class="cap_term" for="">350</label>
                                  <label class="unit_cap_term" for="">TR</label>
                                </td>
                      </tbody>
                  </table>
                  {{-- Consumo anual opex --}}
                  <table class="">
                    <tbody style="width: 100%;">

                        <tr class="tr_style">
                            <td style="width: 100%;" class=""><label style="margin-left:20px;" class="title_cap_term" for="">Consumo Anual (OPEX)</label></td>
                            </tr>

                            <td style="width: 100%;" class=""><label style="margin-left:60px;" class="cap_term" for="">82,377</label>

                              </td>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    <div  style="margin-top:6px; height:10%;" class="tarjet">
        <div align="center" class="title_tarjet_blue">
            <label  class="title_style">Valores EUI</label>
        </div>

        <div style="margin-left:15px; margin-right:15px;">
            <div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">19.99</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">27.49</label>
                    </div>
                </div>
                <div style="margin-right:5px;margin-top:5px;" class="column" >
                    <div style="width:100%;">
                        <label style="margin-left:60px;" class="cant_green">80.28</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
