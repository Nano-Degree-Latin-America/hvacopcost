
<title>
    Desprosoft Hvacopcost
</title>
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
@endsection

@section('content')
@inject('solutions','app\Http\Controllers\ResultadosController')
@inject('results','app\Http\Controllers\ResultadosController')
@inject('smasolutions','app\Http\Controllers\ResultadosController')
@inject('sumacap_term','app\Http\Controllers\ResultadosController')
@inject('desperdicio','app\Http\Controllers\ResultadosController')
@inject('conf_val','app\Http\Controllers\ResultadosController')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GXCVJ80B4N"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-GXCVJ80B4N');
    </script>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo_default.webp')}}"/>
    <script src="https://use.fontawesome.com/4e957e572c.js"></script>
    <script src="https://kit.fontawesome.com/48aa4aa0c4.js" crossorigin="anonymous"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>
    <link rel=»canonical» href=»https://hvacopcostla.sarsoftware.com/»/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <script src="{{asset('plugins/chartjs/dist/Chart.js')}}"></script>
   <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');

    .ancho{
        width:75%;
    }


        .font-roboto{
            font-family: 'ABeeZee', sans-serif;
        }

        .info_project{
            font-size: 20px;
            font-family: 'ABeeZee', sans-serif;
            color:#2c5282;
            font-weight: bold;
         }

         .img_projec{
            height: 120px;
            width:230px;
         }

         .titulos_style{
            font-size:30px;
            color: white;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
         }

         .solucions_style_name{
        font-size: 2.25rem;
        color: #2c5282;
        font-weight: bold;
        font-family: 'ABeeZee', sans-serif;
        }

        .cant_style{
            font-size: 3rem;
            color: #2c5282;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
        }

        .unit_style{
            font-size: 1.3rem;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
            margin-top:1.5rem;
        }

        .style_grafica_khw2{
            width:350px;
            height: 280px;
        }

        .eui_energy_style{
            margin-top: 2rem;
            color: #2c5282;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
            margin-right: .25rem;
            font-size: 2.25rem;
        }

        .eui_energy_val_style{
            margin-top: .75rem;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
            font-size: 4rem;
        }

        .energy_star_style_img{
            margin-left: .5rem;
            margin-right: .5rem;
            margin-top: 1.5rem;
            width:120px;
            height:75px;
        }

        .ashrae_style_img{
            margin-left: .5rem;
            margin-right: .5rem;
            margin-top: 1.5rem;
            width: 115px;
            height: 75px;
        }

        .img_red_ene{
            width:80px;
             height:80px;
              z-index:1;
        }

        .red_energetica_style{
            font-size: 2.25rem;
            color: #2c5282;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
            margin-top:15px;
        }

        .margin_new_page{
            margin-top:.5rem;
        }

@media print{
  @page { margin: 0; }

  .ancho{
    width:95%;
  }

  .info_project{
    font-size: 14px;
    font-family: 'ABeeZee', sans-serif;
    color:#2c5282;
    font-weight: bold;
  }

  .info_project_res{
    font-size: 14px;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
  }

  .img_projec{
            height: 120px;
            width:230px;
         }

  .titulos_style{
            font-size:20px;
            color: white;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
         }
   .solucions_style_name{
        font-size: 1.4rem;
        color: #2c5282;
        font-weight: bold;
        font-family: 'ABeeZee', sans-serif;
   }

   .cant_style{
            font-size: 1.8rem;
            color: #2c5282;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
   }

   .unit_style{
            font-size: .9rem;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
            margin-top:.8rem;
   }

   .style_grafica_khw2{
    width:200px;
    height: 150px;
   }

   .eui_energy_style{
    margin-top: 2rem;
    color: #2c5282;
    font-weight: bold;
    font-family: 'ABeeZee', sans-serif;
    margin-right: .15rem;
    font-size: 1.2rem;
   }

   .eui_energy_val_style{
    margin-top: 1.5rem;
    font-weight: bold;
    font-family: 'ABeeZee', sans-serif;
    font-size: 2rem;
   }

   .energy_star_style_img{
       margin-left: .5rem;
       margin-right: .5rem;
       margin-top: 1.5rem;
       width:80px;
       height:50px;
   }

   .ashrae_style_img{
        margin-left: .5rem;
        margin-right: .5rem;
        margin-top: 1.5rem;
        width: 80px;
        height:50px;
   }

   .img_red_ene{
            width:70px;
             height:50px;
              z-index:1;
        }

   .red_energetica_style{
            font-size: 1rem;
            color: #2c5282;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
            margin-top:15px;
        }

        .margin_new_page{
            margin-top: .5rem;
        }
}

/* md	768px */

@media (min-width: 600px) {
            .js_charts_style{
                width: 250px;
                height: 200px;
                margin: 0px auto;
            }
        }


        @media (min-width: 768px) {
            .js_charts_style{
                width: 250px;
                height: 200px;
                margin: 0px auto;
            }
        }


        @media (min-width: 950px) {
            .js_charts_style{
                width: 280px;
                height: 200px;
                margin: 0px auto;
            }
        }
        /* lg	1024px */
        @media (min-width: 1024px) {
            .js_charts_style{
                width: 280px;
                height: 200px;
                margin: 0px auto;
            }

        }

        @media (min-width: 1024px) {
            .js_charts_style{
                width: 280px;
                height: 200px;
                margin: 0px auto;
            }

        }

        @media (min-width: 1800px) {
            .js_charts_style{
                width: 350px;
                height: 210px;
                margin: 0px auto;
            }
        }

        @media (min-width: 1890px) {
            .js_charts_style{
                width: 350px;
                height: 210px;
                margin: 0px auto;
            }
        }

        @media (min-width: 1900px) {
            .js_charts_style{
                width: 350px;
                height: 210px;
                margin: 0px auto;
            }
        }
    </style>
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<?php  $tar_ele=$solutions->tar_elec($id_project) ?>
<?php  $kwh_yr=$results->kwh_yr($id_project,$tar_ele->cad_edi) ?>
{{-- principal --}}
<div class="w-full grid rounded-md justify-items-center mt-5">
    <div  class="ancho border-2 border-blue-500 flex">


        <div class="w-1/4 flex justify-center">
            <img src="{{asset('/assets/images/Logo-NDL_marca-registrada.jpg')}}" alt="hvacopcost latinoamérica" class="img_porject mx-2">
        </div>

        <div class="w-1/3 grid justify-left ml-2">
            <div class="w-full flex ">
                <label class="info_project" for="">Nombre:</label><p class="info_project">Project name</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">Categoría:</label><p class="info_project">Project name</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">Tipo:</label><p class="info_project">Project name</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">Área:</label><p class="info_project">Project name</p>
            </div>
        </div>

        <div class="w-1/3 grid justify-left">
            <div class="w-full">
                <div class="w-full flex">
                    <label class="info_project" for="">País:</label><p class="info_project">Project name</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">Ciudad:</label><p class="info_project">Project name</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">Enfriamiento Anual:</label><p class="info_project">Project name</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">Valor Energía Electrica:</label><p class="info_project">Project name</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Counsumo energia electrica --}}
<div class="w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 grid">
        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">Consumo Energía Eléctrica</p>
            </div>
        </div>

        <div class="w-full flex justify-center">
            <div class="grid w-1/3">

                <div class="flex w-full ">
                        <div class="grid w-full mx-3">
                            <div class="flex justify-center w-full p-2">
                                <label class="solucions_style_name">{{ __('index.sis_ext') }}</label>
                            </div>

                            <div class="flex justify-center w-full p-2">
                                <div class="grid justify-center text-center">
                                    <?php  $result1=$results->result_1($id_project,1) ?>
                                    @if ($result1 ==! null)
                                    <?php  $sumaopex_1=$smasolutions->sumaopex($id_project,$result1->num_enf) ?>
                                    <?php  $sumacap_term_1=$smasolutions->sumacap_term($id_project,$result1->num_enf) ?>
                                    <?php  $unid_med_1=$smasolutions->unid_med($id_project,$result1->num_enf) ?>
                                    <?php  $result_area_1=$results->result_area($id_project,$sumaopex_1) ?>
                                    @elseif($result1 === null)
                                    <?php $sumaopex_1=0?>
                                    <?php $sumacap_term_1=0?>
                                     <?php $unid_med_1=""?>
                                     <?php  $result_area_1=0 ?>
                                    @endif
                                    <div class="flex w-full justify-center">
                                        <p class="cant_style">{{number_format($sumaopex_1)}}</p><b class="unit_style">Kwh</b>
                                    </div>



                                    <div id="chart_cons_ene_hvac_ar_base" name="chart_cons_ene_hvac_ar_base" class="js_charts_style"></div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>



            <div class="grid w-1/3">

                <div class="flex w-full ">
                        <div class="grid w-full mx-3">
                            <div class="flex justify-center w-full p-2">
                                <label class="solucions_style_name">{{ __('index.solucion') }} A</label>
                            </div>
                            <div class="flex justify-center w-full p-2">
                                <div class="grid justify-center text-center">
                                    <?php  $result2=$results->result_1($id_project,2) ?>
                                    @if ($result2 ==! null)
                                    <?php  $sumaopex_2=$smasolutions->sumaopex($id_project,$result2->num_enf) ?>
                                    <?php  $sumacap_term_2=$smasolutions->sumacap_term($id_project,$result2->num_enf) ?>
                                    <?php  $unid_med_2=$smasolutions->unid_med($id_project,$result2->num_enf) ?>
                                    <?php  $result_area_2=$results->result_area($id_project,$sumaopex_2) ?>
                                    @elseif($result2 === null)
                                    <?php $sumaopex_2=0?>
                                    <?php $sumacap_term_2=0?>
                                    <?php $unid_med_2=""?>
                                    <?php  $result_area_2=0?>
                                    @endif
                                    <div class="flex w-full justify-center">
                                        <p class="cant_style">{{number_format($sumaopex_2)}}</p><b class="unit_style">Kwh</b>
                                    </div>
                                    <div id="chart_cons_ene_hvac_ar_a" class="js_charts_style" ></div>
                          </div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="grid w-1/3">



                <div class="flex w-full ">
                        <div class="grid w-full mx-3">
                            <div class="flex justify-center w-full p-2">
                                <label class="solucions_style_name">{{ __('index.solucion') }} B</label>
                            </div>
                            <div class="flex justify-center w-full p-2">
                                <div class="grid justify-center text-center">
                                    <?php  $result3=$results->result_1($id_project,3) ?>
                                    @if ($result3 ==! null)
                                    <?php  $sumaopex_3=$smasolutions->sumaopex($id_project,$result3->num_enf) ?>
                                    <?php  $sumacap_term_3=$smasolutions->sumacap_term($id_project,$result3->num_enf) ?>
                                    <?php  $unid_med_3=$smasolutions->unid_med($id_project,$result3->num_enf) ?>
                                    <?php  $result_area_3=$results->result_area($id_project,$sumaopex_3) ?>
                                    @elseif($result3 === null)
                                    <?php $sumaopex_3=0?>
                                    <?php $sumacap_term_3=0?>
                                    <?php $unid_med_3=""?>
                                    <?php  $result_area_3=0?>
                                    @endif
                                   <div class="flex w-full justify-center">
                                        <p class="cant_style">{{number_format($sumaopex_3)}}</p><b class="unit_style">Kwh</b>
                                    </div>
                                     <div id="chart_cons_ene_hvac_ar_b" class="js_charts_style"></div>
                               </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Índice Intensidad del Uso de Energía --}}
<div class="w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 grid">
        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">Índice Intensidad del Uso de Energía (Kbtu/ft²)</p>
            </div>
        </div>

        <div class="flex w-full justify-center gap-x-3">
            <div class="flex w-1/2 justify-center text-[24px] m-1">
                <?php  $energy_star=$smasolutions->energy_star($id_project) ?>
                <img src="{{asset('/assets/images/Energy-Star-Logo.png')}}"  class="energy_star_style_img mx-2 mt-6" alt="Nano Degree">
                <b class="eui_energy_style">EUI - Energy Star</b><b style="color:#33cc33;" class="eui_energy_val_style">&nbsp;{{number_format($energy_star,1)}}</b>
            </div>

            <div class="flex w-1/2 justify-center text-[24px] m-1">
                <?php  $ashrae=$smasolutions->ashrae($id_project) ?>
                <img src="{{asset('/assets/images/Logo-ASHRAE-png.png')}}" class="ashrae_style_img" alt="Nano Degree">
                <b class="eui_energy_style">EUI - ASHRAE</b><b style="color:#33cc33;" class="eui_energy_val_style">&nbsp;{{$ashrae}}</b>
            </div>
        </div>

        <div class="flex w-full justify-center">
            <div class="w-1/3 grid justify-items-center">
                <div class="flex justify-center w-full">
                    <label class="solucions_style_name">{{ __('index.sis_ext') }}</label>
                </div>
                @if ($result1 ==! null)
                <?php  $valor_eui_base=$smasolutions->valor_eui_aux($sumaopex_1,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                @endif
                @if ($result1 === null)
                <?php  $valor_eui_base=0 ?>
                @endif
                <div id="eui_sol_base"></div>
            </div>
            {{-- sumaopex_2
            sumaopex_3 --}}
            <div class="w-1/3 grid justify-items-center">
                <div class="flex justify-center w-full">
                    <label class="solucions_style_name">{{ __('index.solucion') }} A</label>
                </div>
                @if ($result2 ==! null)
                <?php  $valor_eui_a=$smasolutions->valor_eui_aux($sumaopex_2,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                @endif

                @if ($result2 === null)
                <?php  $valor_eui_a=0; ?>
                @endif
                <div id="eui_sol_a"></div>
            </div>
            <div class="w-1/3 grid justify-items-center">
                <div class="flex justify-center w-full">
                    <label class="solucions_style_name">{{ __('index.solucion') }} B</label>
                </div>
                @if ($result3 ==! null)
                <?php  $valor_eui_b=$smasolutions->valor_eui_aux($sumaopex_3,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                @endif

                @if ($result3 === null)
                <?php $valor_eui_b = 0; ?>
                @endif
                <div id="eui_sol_b"></div>
            </div>
    </div>
    </div>
</div>

{{-- Índice Intensidad del Uso de Energía --}}
<div class="w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 grid">


        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">Sustentabilidad</p>
            </div>
        </div>

        <div class="flex w-full justify-center gap-x-3">
            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center">
                    <img src="{{asset('/assets/images/watts.png')}}" class="img_red_ene mx-10 mt-2" alt="Nano Degree">
                    <label class="red_energetica_style" for="">Reducción Energética (MWh)</label>
                </div>

                <div class="w-full">
                    <div id="chart_red_ene" name="chart_red_ene"></div>
                    <div class="hidden" style="width: 350px; height:150px;" id="chart_red_ene_print" name="chart_red_ene_print"></div>
                </div>
            </div>

            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center">
                    <img src="{{asset('/assets/images/Huella.png')}}" class="img_red_ene mx-10 mt-2" alt="Nano Degree">
                    <label class="red_energetica_style" for="">Descarbonización (Ton CO2)</label>
                </div>

                <div class="w-full">
                    <div id="chart_descarb" name="chart_descarb"></div>
                    <div class="hidden" style="width: 350px; height:150px;" id="chart_descarb_print" name="chart_descarb_print"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="p-3">

</div>
{{-- Nivel de Confort --}}
<div class="margin_new_page w-full grid rounded-md justify-items-center">
  <div class="ancho border-2 border-blue-500 grid">
    <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">{{ __('results.niv_conf') }}</p>
            </div>
    </div>
  </div>
</div>

<script type="text/javascript">
document.addEventListener('keydown', function(event) {
  if (event.ctrlKey && event.key === 'p') {
    $("#chart_cons_ene_hvac_ar_base").width(180).height(140);
    $("#chart_cons_ene_hvac_ar_a").width(180).height(140);
    $("#chart_cons_ene_hvac_ar_b").width(180).height(140);
    $("#chart_red_ene").width(180).height(140);
    $("#chart_descarb").width(180).height(140);
    con_ene_hvac_ar_Base_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
        google.charts.load('current', {'packages':['gauge']});
        google.charts.setOnLoadCallback(chart_base_eui_print);
        google.charts.setOnLoadCallback(chart_a_eui_print);
        google.charts.setOnLoadCallback(chart_b_eui_print);
        $('#chart_red_ene').addClass("hidden");
        $("#chart_descarb").addClass("hidden");
        $('#chart_red_ene_print').removeClass("hidden");
        $("#chart_descarb_print").removeClass("hidden");

  }
});

window.matchMedia('print').addListener(function(event) {
    $("#chart_cons_ene_hvac_ar_base").width(180).height(140);
    $("#chart_cons_ene_hvac_ar_a").width(180).height(140);
    $("#chart_cons_ene_hvac_ar_b").width(180).height(140);
    $("#chart_red_ene").width(180).height(140);
    $("#chart_descarb").width(180).height(140);
    con_ene_hvac_ar_Base_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
        google.charts.load('current', {'packages':['gauge']});
        google.charts.setOnLoadCallback(chart_base_eui_print);
        google.charts.setOnLoadCallback(chart_a_eui_print);
        google.charts.setOnLoadCallback(chart_b_eui_print);
        $('#chart_red_ene').addClass("hidden");
        $("#chart_descarb").addClass("hidden");
        $('#chart_red_ene_print').removeClass("hidden");
        $("#chart_descarb_print").removeClass("hidden");

});

window.onafterprint = function() {
  $("#chart_cons_ene_hvac_ar_base").width(350).height(280);
  $("#chart_cons_ene_hvac_ar_a").width(350).height(280);
    $("#chart_cons_ene_hvac_ar_b").width(350).height(280);
    $("#chart_red_ene").width(670).height(280);
    $("#chart_descarb").width(670).height(280);
    con_ene_hvac_ar_Base('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(chart_base_eui);
      google.charts.setOnLoadCallback(chart_a_eui);
      google.charts.setOnLoadCallback(chart_b_eui);
      $('#chart_red_ene').removeClass("hidden");
      $("#chart_descarb").removeClass("hidden");
      $('#chart_red_ene_print').addClass("hidden");
      $("#chart_descarb_print").addClass("hidden");

}
window.onload = function() {
    con_ene_hvac_ar_Base('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(chart_base_eui);
      google.charts.setOnLoadCallback(chart_a_eui);
      google.charts.setOnLoadCallback(chart_b_eui);
      red_ene('{{$id_project}}');
      descarb('{{$id_project}}');
      red_ene_print('{{$id_project}}');
      descarb_print('{{$id_project}}');
    };
/* window.print() */
function con_ene_hvac_ar_Base(kwh_yr,porcent_hvac){
// JS
/* var result_area = parseFloat('{{$result_area_1}}'); */
var result_area = parseFloat('{{$result_area_1}}');
//saca porcentaje dividiendo porcen entre 100
var porcenthvac_a = porcent_hvac / 100;
// multiplica porcenthvac_a x kwh_yr para sacar la media
var mediakwh_yr = porcenthvac_a * kwh_yr;
//elevar media al cuadrado
var media_cuadrada  = mediakwh_yr * 10.76;
//rango color verde numero 2 aproximando a 10 mas cercano
var green_2 = Math.ceil(media_cuadrada / 10) * 10;
//rango color verde numero 1, diviendo color verde 2 entre 2
var green_1 = green_2/2;
//rango color amarillo, naranja, multiplicando el color verde numero 2 x 1.5
var yellow_orange = green_2*1.5;
//rango color rojo multiplicando la media al cuadrado x 2.5
var red_aux = parseInt(media_cuadrada*2.5);

var red = Math.ceil(red_aux / 10) * 10;
//si resultarea es mayor a rojo
if(result_area > red){
//result area aux es igual a rojo, para que no se pase del tope que es red
    var result_area_aux = red;
}
//si rojo es mayor a result
if(result_area < red){
    //toma el valor de result para que este en el rango de maximo que es rojo
    var result_area_aux = result_area;
}



 // JS
    var chart = JSC.chart('chart_cons_ene_hvac_ar_base', {
  debug: true,
  legend_visible: false,
  width:350,
  height:220,
  chartArea_boxVisible: false,
  defaultTooltip_enabled: false,
  box:{
        fill:'white',
  },
  xAxis_spacingPercentage: 0.4,
  yAxis: [
    {
      id: 'ax1',
      defaultTick: {
        padding: 5,
        enabled: false
      },
      customTicks: [0,green_1, green_2, yellow_orange, red],
      line: {
        width: 9,

        /*Defining the option will enable it.*/
        breaks_gap: 0.06,

        /*Palette is defined at series level with an ID referenced here.*/
        color: 'smartPalette',
      },
      scale_range: [0, red]
    },
  ],
  defaultSeries: {
    type: 'gauge column roundcaps',
    angle: { sweep: 180 },
    innerSize: '70%',
    shape: {
        label: {
        text:
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="20px">Kwh/m²</span>',
        style_fontSize: '46px',
        verticalAlign: 'middle'
      }
    }
  },
  series: [
    {
      type: 'column roundcaps',
      name: 'Temperatures',
      yAxis: 'ax1',
      palette: {
        id: 'pal1',
        pointValue: '{%value/'+red+'}',
        /* ranges: [
          { value: 0, color: 'green' },
          { value: 1000, color: 'green' },
          { value: 2000, color: 'yellow' },
          { value: 3000, color: 'orange' },
          { value: [4000,min_limite], color: 'red' }

        ] */
        ranges: [
          { value: 0 },
          { value: green_1},
          { value: green_2 },
          { value: yellow_orange},
          { value: red},
        ],
        colors: ['green', 'yellow', 'red']
      },
      points: [['x', [0, result_area_aux]]]
    }
  ]
});
}

function con_ene_hvac_ar_a(kwh_yr,porcent_hvac){
// JS
var result_area = parseFloat('{{$result_area_2}}');

//saca porcentaje dividiendo porcen entre 100
var porcenthvac_a = porcent_hvac / 100;
// multiplica porcenthvac_a x kwh_yr para sacar la media
var mediakwh_yr = porcenthvac_a * kwh_yr;
//elevar media al cuadrado
var media_cuadrada  = mediakwh_yr * 10.76;
//rango color verde numero 2 aproximando a 10 mas cercano
var green_2 = Math.ceil(media_cuadrada / 10) * 10;
//rango color verde numero 1, diviendo color verde 2 entre 2
var green_1 = green_2/2;
//rango color amarillo, naranja, multiplicando el color verde numero 2 x 1.5
var yellow_orange = green_2*1.5;
//rango color rojo multiplicando la media al cuadrado x 2.5
var red_aux = parseInt(media_cuadrada*2.5);

var red = Math.ceil(red_aux / 10) * 10;
//si resultarea es mayor a rojo
if(result_area > red){
//result area aux es igual a rojo, para que no se pase del tope que es red
    var result_area_aux = red;
}
//si rojo es mayor a result
if(result_area < red){
    //toma el valor de result para que este en el rango de maximo que es rojo
    var result_area_aux = result_area;
}
 //JS
  var chart = JSC.chart('chart_cons_ene_hvac_ar_a', {
  debug: true,
  legend_visible: false,
  defaultTooltip_enabled: false,
  width:350,
  height:220,
  chartArea_boxVisible: false,
  box:{
        fill:'white',
  },
  xAxis_spacingPercentage: 0.4,
  yAxis: [
    {
      id: 'ax1',
      defaultTick: {
        padding: 5,
        enabled: false
      },
      customTicks: [0,green_1, green_2, yellow_orange, red],
      line: {
        width: 9,

        /*Defining the option will enable it.*/
        breaks_gap: 0.06,

        /*Palette is defined at series level with an ID referenced here.*/
        color: 'smartPalette',
      },
      scale_range: [0, red]
    },
  ],
  defaultSeries: {
    type: 'gauge column roundcaps',
    angle: { sweep: 180 },
    innerSize: '70%',
    shape: {
        label: {
        text:
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="20px">Kwh/m²</span>',
        style_fontSize: '46px',
        verticalAlign: 'middle'
      }
    }
  },
  series: [
    {
      type: 'column roundcaps',
      name: 'Temperatures',
      yAxis: 'ax1',
      palette: {
        id: 'pal1',
        pointValue: '{%value/'+red+'}',
        /* ranges: [
          { value: 0, color: 'green' },
          { value: 1000, color: 'green' },
          { value: 2000, color: 'yellow' },
          { value: 3000, color: 'orange' },
          { value: [4000,min_limite], color: 'red' }

        ] */
        ranges: [
          { value: 0 },
          { value: green_1},
          { value: green_2 },
          { value: yellow_orange},
          { value: red},
        ],
        colors: ['green', 'yellow', 'red']
      },
      points: [['x', [0, result_area_aux]]]
    }
  ]
});
}

function con_ene_hvac_ar_b(kwh_yr,porcent_hvac){
// JS
var result_area = parseFloat('{{$result_area_3}}');

//saca porcentaje dividiendo porcen entre 100
var porcenthvac_a = porcent_hvac / 100;
// multiplica porcenthvac_a x kwh_yr para sacar la media
var mediakwh_yr = porcenthvac_a * kwh_yr;
//elevar media al cuadrado
var media_cuadrada  = mediakwh_yr * 10.76;
//rango color verde numero 2 aproximando a 10 mas cercano
var green_2 = Math.ceil(media_cuadrada / 10) * 10;
//rango color verde numero 1, diviendo color verde 2 entre 2
var green_1 = green_2/2;
//rango color amarillo, naranja, multiplicando el color verde numero 2 x 1.5
var yellow_orange = green_2*1.5;
//rango color rojo multiplicando la media al cuadrado x 2.5
var red_aux = parseInt(media_cuadrada*2.5);

var red = Math.ceil(red_aux / 10) * 10;
//si resultarea es mayor a rojo
if(result_area > red){
//result area aux es igual a rojo, para que no se pase del tope que es red
    var result_area_aux = red;
}
//si rojo es mayor a result
if(result_area < red){
    //toma el valor de result para que este en el rango de maximo que es rojo
    var result_area_aux = result_area;
}

    //JS
  var chart = JSC.chart('chart_cons_ene_hvac_ar_b', {
  debug: true,
  legend_visible: false,
  defaultTooltip_enabled: false,
  width:350,
  height:220,
  chartArea_boxVisible: false,
  box:{
        fill:'white',
  },
  xAxis_spacingPercentage: 0.4,
  yAxis: [
    {
      id: 'ax1',
      defaultTick: {
        padding: 5,
        enabled: false
      },
      customTicks: [0,green_1, green_2, yellow_orange, red],
      line: {
        width: 9,

        /*Defining the option will enable it.*/
        breaks_gap: 0.06,

        /*Palette is defined at series level with an ID referenced here.*/
        color: 'smartPalette',
      },
      scale_range: [0, red],
    },
  ],
  defaultSeries: {
    type: 'gauge column roundcaps',
    angle: { sweep: 180 },
    innerSize: '70%',
    shape: {
        label: {
        text:
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="20px">Kwh/m²</span>',
        style_fontSize: '46px',
        verticalAlign: 'middle'
      }
    }
  },
  series: [
    {
      type: 'column roundcaps',
      name: 'Temperatures',
      yAxis: 'ax1',
      palette: {
        id: 'pal1',
        pointValue: '{%value/'+red+'}',
        /* ranges: [
          { value: 0, color: 'green' },
          { value: 1000, color: 'green' },
          { value: 2000, color: 'yellow' },
          { value: 3000, color: 'orange' },
          { value: [4000,min_limite], color: 'red' }

        ] */
        ranges: [
          { value: 0 },
          { value: green_1},
          { value: green_2 },
          { value: yellow_orange},
          { value: red},
        ],
        colors: ['green', 'yellow', 'red']
      },
      points: [['x', [0, result_area_aux]]]
    }
  ]
});
}

function red_ene(id_project){


//console.log(res);
var options = {
series: [
{
name:'Solución A',
data: [20, 30, 40, 50, 60]
},
{
name:'Solución B',
data: [15, 30, 45, 60, 75]
}
],
chart: {
height: 350,
type: 'line',
dropShadow: {
enabled: true,
color: '#000',
top: 18,
left: 7,
blur: 10,
opacity: 0.2
},
toolbar: {
show: false
}
},
colors: ['#ff00ff', '#545454'],
dataLabels: {
    enabled: true,
    style: {
    fontSize: '16px',
    fontFamily: 'ABeeZee, sans-serif',
    fontWeight: 'bold',
},
},
stroke: {
curve: 'smooth'
},
title: {

align: 'center',
style: {
fontSize: '24px',
fontFamily: 'ABeeZee, sans-serif',
fontWeight: "bold",
cssClass: 'apexcharts-yaxis-label',
color: '#000',
},
},
grid: {
borderColor: '#e7e7e7',
row: {
colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
opacity: 0.5
},
},
markers: {
size: 1
},
xaxis: {
tickPlacement: 'between',
categories: [1,2,3,4,5],
range:4,
title: {
text: 'Años',
style: {
        colors: [],
        fontSize: '20px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-yaxis-label',
    },
},
labels: {
style: {
        colors: [],
        fontSize: '12px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-xaxis-label',
    },
},
},
yaxis: {
labels:{
style: {
        colors: [],
        fontSize: '14px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-yaxis-label',
    },
formatter: function (val) {
  return val + "%"
},
},

},
legend: {
position: 'top',
horizontalAlign: 'right',
offsetX: 40,
fontSize: '14px',
fontFamily: 'ABeeZee, sans-serif',
fontWeight: 'bold',
markers: {
width: 12,
height: 12,
strokeWidth: 0,
strokeColor: '#fff',
fillColors: ['#ff00ff', '#545454'],
radius: 12,
customHTML: undefined,
onClick: undefined,
offsetX: 0,
offsetY: 0,
},

}
};

var chart = new ApexCharts(document.querySelector("#chart_red_ene"), options);
chart.render();
}

function descarb(id_project){


var options = {
series: [
{
name:'Solución A',
data: [20, 30, 40, 50, 60]
},
{
name:'Solución B',
data:  [15, 30, 45, 60, 75]
}
],
chart: {
height: 350,
type: 'line',
dropShadow: {
enabled: true,
color: '#000',
top: 18,
left: 7,
blur: 10,
opacity: 0.2
},
toolbar: {
show: false
}
},
colors: ['#2be6ee', '#545454'],
dataLabels: {
    enabled: true,
    style: {
    fontSize: '16px',
    fontFamily: 'ABeeZee, sans-serif',
    fontWeight: 'bold',
},
},
stroke: {
curve: 'smooth'
},
title: {

align: 'center',
style: {
fontSize: '24px',
fontFamily: 'ABeeZee, sans-serif',
fontWeight: "bold",
cssClass: 'apexcharts-yaxis-label',
color: '#000',
},
},
grid: {
borderColor: '#e7e7e7',
row: {
colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
opacity: 0.5
},
},
markers: {
size: 1
},
xaxis: {
tickPlacement: 'between',
categories: [1,2,3,4,5],
range:4,
title: {
text: 'Años',
style: {
        colors: [],
        fontSize: '20px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-yaxis-label',
    },
},
labels: {
style: {
        colors: [],
        fontSize: '12px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-xaxis-label',
    },
},
},
yaxis: {
labels:{
style: {
        colors: [],
        fontSize: '14px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-yaxis-label',
    },
formatter: function (val) {
  return val + "%"
},
},
},
legend: {
position: 'top',
horizontalAlign: 'right',
offsetX: 40,
fontSize: '14px',
fontFamily: 'ABeeZee, sans-serif',
fontWeight: 'bold',
markers: {
width: 12,
height: 12,
strokeWidth: 0,
strokeColor: '#fff',
fillColors: ['#2be6ee', '#545454'],
radius: 12,
customHTML: undefined,
onClick: undefined,
offsetX: 0,
offsetY: 0,
},

}
};

var chart = new ApexCharts(document.querySelector("#chart_descarb"), options);
chart.render();
}

////pirnt

function con_ene_hvac_ar_Base_print(kwh_yr,porcent_hvac){
// JS
/* var result_area = parseFloat('{{$result_area_1}}'); */
var result_area = parseFloat('{{$result_area_1}}');
//saca porcentaje dividiendo porcen entre 100
var porcenthvac_a = porcent_hvac / 100;
// multiplica porcenthvac_a x kwh_yr para sacar la media
var mediakwh_yr = porcenthvac_a * kwh_yr;
//elevar media al cuadrado
var media_cuadrada  = mediakwh_yr * 10.76;
//rango color verde numero 2 aproximando a 10 mas cercano
var green_2 = Math.ceil(media_cuadrada / 10) * 10;
//rango color verde numero 1, diviendo color verde 2 entre 2
var green_1 = green_2/2;
//rango color amarillo, naranja, multiplicando el color verde numero 2 x 1.5
var yellow_orange = green_2*1.5;
//rango color rojo multiplicando la media al cuadrado x 2.5
var red_aux = parseInt(media_cuadrada*2.5);

var red = Math.ceil(red_aux / 10) * 10;
//si resultarea es mayor a rojo
if(result_area > red){
//result area aux es igual a rojo, para que no se pase del tope que es red
    var result_area_aux = red;
}
//si rojo es mayor a result
if(result_area < red){
    //toma el valor de result para que este en el rango de maximo que es rojo
    var result_area_aux = result_area;
}



 // JS
    var chart = JSC.chart('chart_cons_ene_hvac_ar_base', {
  debug: true,
  legend_visible: false,
  width:200,
  height:150,
  chartArea_boxVisible: false,
  defaultTooltip_enabled: false,
  box:{
        fill:'white',
  },
  xAxis_spacingPercentage: 0.4,
  yAxis: [
    {
      id: 'ax1',
      defaultTick: {
        padding: 5,
        enabled: false
      },
      customTicks: [0,green_1, green_2, yellow_orange, red],
      line: {
        width: 9,

        /*Defining the option will enable it.*/
        breaks_gap: 0.06,

        /*Palette is defined at series level with an ID referenced here.*/
        color: 'smartPalette',
      },
      scale_range: [0, red]
    },
  ],
  defaultSeries: {
    type: 'gauge column roundcaps',
    angle: { sweep: 180 },
    innerSize: '70%',
    shape: {
        label: {
        text:
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="10px">Kwh/m²</span>',
        style_fontSize: '15px',
        verticalAlign: 'middle'
      }
    }
  },
  series: [
    {
      type: 'column roundcaps',
      name: 'Temperatures',
      yAxis: 'ax1',
      palette: {
        id: 'pal1',
        pointValue: '{%value/'+red+'}',
        /* ranges: [
          { value: 0, color: 'green' },
          { value: 1000, color: 'green' },
          { value: 2000, color: 'yellow' },
          { value: 3000, color: 'orange' },
          { value: [4000,min_limite], color: 'red' }

        ] */
        ranges: [
          { value: 0 },
          { value: green_1},
          { value: green_2 },
          { value: yellow_orange},
          { value: red},
        ],
        colors: ['green', 'yellow', 'red']
      },
      points: [['x', [0, result_area_aux]]]
    }
  ]
});
}

function con_ene_hvac_ar_a_print(kwh_yr,porcent_hvac){
// JS
var result_area = parseFloat('{{$result_area_2}}');

//saca porcentaje dividiendo porcen entre 100
var porcenthvac_a = porcent_hvac / 100;
// multiplica porcenthvac_a x kwh_yr para sacar la media
var mediakwh_yr = porcenthvac_a * kwh_yr;
//elevar media al cuadrado
var media_cuadrada  = mediakwh_yr * 10.76;
//rango color verde numero 2 aproximando a 10 mas cercano
var green_2 = Math.ceil(media_cuadrada / 10) * 10;
//rango color verde numero 1, diviendo color verde 2 entre 2
var green_1 = green_2/2;
//rango color amarillo, naranja, multiplicando el color verde numero 2 x 1.5
var yellow_orange = green_2*1.5;
//rango color rojo multiplicando la media al cuadrado x 2.5
var red_aux = parseInt(media_cuadrada*2.5);

var red = Math.ceil(red_aux / 10) * 10;
//si resultarea es mayor a rojo
if(result_area > red){
//result area aux es igual a rojo, para que no se pase del tope que es red
    var result_area_aux = red;
}
//si rojo es mayor a result
if(result_area < red){
    //toma el valor de result para que este en el rango de maximo que es rojo
    var result_area_aux = result_area;
}
 //JS
  var chart = JSC.chart('chart_cons_ene_hvac_ar_a', {
  debug: true,
  legend_visible: false,
  defaultTooltip_enabled: false,
  width:200,
  height:150,
  chartArea_boxVisible: false,
  box:{
        fill:'white',
  },
  xAxis_spacingPercentage: 0.4,
  yAxis: [
    {
      id: 'ax1',
      defaultTick: {
        padding: 5,
        enabled: false
      },
      customTicks: [0,green_1, green_2, yellow_orange, red],
      line: {
        width: 9,

        /*Defining the option will enable it.*/
        breaks_gap: 0.06,

        /*Palette is defined at series level with an ID referenced here.*/
        color: 'smartPalette',
      },
      scale_range: [0, red]
    },
  ],
  defaultSeries: {
    type: 'gauge column roundcaps',
    angle: { sweep: 180 },
    innerSize: '70%',
    shape: {
        label: {
        text:
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="10px">Kwh/m²</span>',
        style_fontSize: '15px',
        verticalAlign: 'middle'
      }
    }
  },
  series: [
    {
      type: 'column roundcaps',
      name: 'Temperatures',
      yAxis: 'ax1',
      palette: {
        id: 'pal1',
        pointValue: '{%value/'+red+'}',
        /* ranges: [
          { value: 0, color: 'green' },
          { value: 1000, color: 'green' },
          { value: 2000, color: 'yellow' },
          { value: 3000, color: 'orange' },
          { value: [4000,min_limite], color: 'red' }

        ] */
        ranges: [
          { value: 0 },
          { value: green_1},
          { value: green_2 },
          { value: yellow_orange},
          { value: red},
        ],
        colors: ['green', 'yellow', 'red']
      },
      points: [['x', [0, result_area_aux]]]
    }
  ]
});
}

function con_ene_hvac_ar_b_print(kwh_yr,porcent_hvac){
// JS
var result_area = parseFloat('{{$result_area_3}}');

//saca porcentaje dividiendo porcen entre 100
var porcenthvac_a = porcent_hvac / 100;
// multiplica porcenthvac_a x kwh_yr para sacar la media
var mediakwh_yr = porcenthvac_a * kwh_yr;
//elevar media al cuadrado
var media_cuadrada  = mediakwh_yr * 10.76;
//rango color verde numero 2 aproximando a 10 mas cercano
var green_2 = Math.ceil(media_cuadrada / 10) * 10;
//rango color verde numero 1, diviendo color verde 2 entre 2
var green_1 = green_2/2;
//rango color amarillo, naranja, multiplicando el color verde numero 2 x 1.5
var yellow_orange = green_2*1.5;
//rango color rojo multiplicando la media al cuadrado x 2.5
var red_aux = parseInt(media_cuadrada*2.5);

var red = Math.ceil(red_aux / 10) * 10;
//si resultarea es mayor a rojo
if(result_area > red){
//result area aux es igual a rojo, para que no se pase del tope que es red
    var result_area_aux = red;
}
//si rojo es mayor a result
if(result_area < red){
    //toma el valor de result para que este en el rango de maximo que es rojo
    var result_area_aux = result_area;
}

    //JS
  var chart = JSC.chart('chart_cons_ene_hvac_ar_b', {
  debug: true,
  legend_visible: false,
  defaultTooltip_enabled: false,
  width:200,
  height:150,
  chartArea_boxVisible: false,
  box:{
        fill:'white',
  },
  xAxis_spacingPercentage: 0.4,
  yAxis: [
    {
      id: 'ax1',
      defaultTick: {
        padding: 5,
        enabled: false
      },
      customTicks: [0,green_1, green_2, yellow_orange, red],
      line: {
        width: 9,

        /*Defining the option will enable it.*/
        breaks_gap: 0.06,

        /*Palette is defined at series level with an ID referenced here.*/
        color: 'smartPalette',
      },
      scale_range: [0, red],
    },
  ],
  defaultSeries: {
    type: 'gauge column roundcaps',
    angle: { sweep: 180 },
    innerSize: '70%',
    shape: {
        label: {
        text:
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="10px">Kwh/m²</span>',
        style_fontSize: '15px',
        verticalAlign: 'middle'
      }
    }
  },
  series: [
    {
      type: 'column roundcaps',
      name: 'Temperatures',
      yAxis: 'ax1',
      palette: {
        id: 'pal1',
        pointValue: '{%value/'+red+'}',
        /* ranges: [
          { value: 0, color: 'green' },
          { value: 1000, color: 'green' },
          { value: 2000, color: 'yellow' },
          { value: 3000, color: 'orange' },
          { value: [4000,min_limite], color: 'red' }

        ] */
        ranges: [
          { value: 0 },
          { value: green_1},
          { value: green_2 },
          { value: yellow_orange},
          { value: red},
        ],
        colors: ['green', 'yellow', 'red']
      },
      points: [['x', [0, result_area_aux]]]
    }
  ]
});
}



      function chart_base_eui() {
        var eui_base =  Math.floor('{{$valor_eui_base}}' * 1) / 1 ;
        let energy = '{{$energy_star}}';
        let ashrae = '{{$ashrae}}';
      /*   alert('{{$energy_star}}','{{$ashrae}}');
      $valor_eui_a
      $valor_eui_b
      */
        var eui_basa_check_cant = '{{$valor_eui_base}}';
        var eui_a_check_cant = '{{$valor_eui_a}}';
        var eui_b_check_cant = '{{$valor_eui_b}}';

        if(eui_basa_check_cant > eui_a_check_cant && eui_basa_check_cant > eui_b_check_cant){
            var max_cant_timer = parseInt(eui_basa_check_cant * 2);
        }

        if(eui_a_check_cant > eui_basa_check_cant && eui_a_check_cant > eui_b_check_cant){
            var max_cant_timer = parseInt(eui_a_check_cant * 2);
        }

        if(eui_b_check_cant > eui_basa_check_cant && eui_b_check_cant > eui_a_check_cant){
            var max_cant_timer = parseInt(eui_b_check_cant * 2);
        }

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['EUI E', eui_base],
        ]);

        if(energy > ashrae){
            var options = {
          width: 550, height: 280,
          greenFrom:1,greenTo:ashrae,
          redFrom: energy, redTo: 300,
          yellowFrom:ashrae, yellowTo: energy,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }

        if(energy < ashrae){
            var options = {
          width: 550, height: 280,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 300,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }


        var chart = new google.visualization.Gauge(document.getElementById('eui_sol_base'));

        chart.draw(data, options);
      }

      function chart_a_eui() {
        let check_eui_a = '{{$valor_eui_a}}';
        if (check_eui_a >= 0){
        var eui_a =  Math.floor('{{$valor_eui_a}}' * 1) / 1 ;
        let energy = '{{$energy_star}}';
        let ashrae = '{{$ashrae}}';
        var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['EUI A', eui_a],
        ]);

        var eui_basa_check_cant = '{{$valor_eui_base}}';
        var eui_a_check_cant = '{{$valor_eui_a}}';
        var eui_b_check_cant = '{{$valor_eui_b}}';

        if(eui_basa_check_cant > eui_a_check_cant && eui_basa_check_cant > eui_b_check_cant){
            var max_cant_timer = parseInt(eui_basa_check_cant * 2);
        }

        if(eui_a_check_cant > eui_basa_check_cant && eui_a_check_cant > eui_b_check_cant){
            var max_cant_timer = parseInt(eui_a_check_cant * 2);
        }

        if(eui_b_check_cant > eui_basa_check_cant && eui_b_check_cant > eui_a_check_cant){
            var max_cant_timer = parseInt(eui_b_check_cant * 2);
        }

        if(energy > ashrae){
            var options = {
          width: 550, height: 280,
          greenFrom:1,greenTo:ashrae,
          redFrom: energy, redTo: 300,
          yellowFrom:ashrae, yellowTo: energy,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }

        if(energy < ashrae){
            var options = {
          width: 550, height: 280,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 300,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }

        var chart = new google.visualization.Gauge(document.getElementById('eui_sol_a'));

        chart.draw(data, options);
    }
}

    function chart_b_eui() {
        let check_eui_b = '{{$valor_eui_b}}';
        if (check_eui_b >= 0){
            var eui_b =  Math.floor('{{$valor_eui_b}}' * 1) / 1 ;
            var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['EUI B', eui_b],
            ]);
            let energy = '{{$energy_star}}';
            let ashrae = '{{$ashrae}}';

            var eui_basa_check_cant = '{{$valor_eui_base}}';
            var eui_a_check_cant = '{{$valor_eui_a}}';
            var eui_b_check_cant = '{{$valor_eui_b}}';

            if(eui_basa_check_cant > eui_a_check_cant && eui_basa_check_cant > eui_b_check_cant){
                var max_cant_timer = parseInt(eui_basa_check_cant * 2);
            }

            if(eui_a_check_cant > eui_basa_check_cant && eui_a_check_cant > eui_b_check_cant){
                var max_cant_timer = parseInt(eui_a_check_cant * 2);
            }

            if(eui_b_check_cant > eui_basa_check_cant && eui_b_check_cant > eui_a_check_cant){
                var max_cant_timer = parseInt(eui_b_check_cant * 2);
            }

            if(energy > ashrae){
                    var options = {
                width: 550, height: 280,
                greenFrom:1,greenTo:ashrae,
                redFrom: energy, redTo: 300,
                yellowFrom:ashrae, yellowTo: energy,
                minorTicks: 5,
                max:300,
                min:1,
                };
                }

                if(energy < ashrae){
                    var options = {
                width: 550, height: 280,
                greenFrom:1,greenTo:energy,
                redFrom: ashrae, redTo: 300,
                yellowFrom:energy, yellowTo: ashrae,
                minorTicks: 5,
                max:300,
                min:1,
                };
                }

            var chart = new google.visualization.Gauge(document.getElementById('eui_sol_b'));

            chart.draw(data, options);
        }


    }

      //

      function chart_base_eui_print() {
        var eui_base =  Math.floor('{{$valor_eui_base}}' * 1) / 1 ;
        let energy = '{{$energy_star}}';
        let ashrae = '{{$ashrae}}';
      /*   alert('{{$energy_star}}','{{$ashrae}}');
      $valor_eui_a
      $valor_eui_b
      */
        var eui_basa_check_cant = '{{$valor_eui_base}}';
        var eui_a_check_cant = '{{$valor_eui_a}}';
        var eui_b_check_cant = '{{$valor_eui_b}}';

        if(eui_basa_check_cant > eui_a_check_cant && eui_basa_check_cant > eui_b_check_cant){
            var max_cant_timer = parseInt(eui_basa_check_cant * 2);
        }

        if(eui_a_check_cant > eui_basa_check_cant && eui_a_check_cant > eui_b_check_cant){
            var max_cant_timer = parseInt(eui_a_check_cant * 2);
        }

        if(eui_b_check_cant > eui_basa_check_cant && eui_b_check_cant > eui_a_check_cant){
            var max_cant_timer = parseInt(eui_b_check_cant * 2);
        }

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['EUI E', eui_base],
        ]);

        if(energy > ashrae){
            var options = {
          width: 300, height: 130,
          greenFrom:1,greenTo:ashrae,
          redFrom: energy, redTo: 300,
          yellowFrom:ashrae, yellowTo: energy,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }

        if(energy < ashrae){
            var options = {
          width: 300, height: 130,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 300,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }


        var chart = new google.visualization.Gauge(document.getElementById('eui_sol_base'));

        chart.draw(data, options);
      }

      function chart_a_eui_print() {
        let check_eui_a = '{{$valor_eui_a}}';
        if (check_eui_a >= 0){
        var eui_a =  Math.floor('{{$valor_eui_a}}' * 1) / 1 ;
        let energy = '{{$energy_star}}';
        let ashrae = '{{$ashrae}}';
        var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['EUI A', eui_a],
        ]);

        var eui_basa_check_cant = '{{$valor_eui_base}}';
        var eui_a_check_cant = '{{$valor_eui_a}}';
        var eui_b_check_cant = '{{$valor_eui_b}}';

        if(eui_basa_check_cant > eui_a_check_cant && eui_basa_check_cant > eui_b_check_cant){
            var max_cant_timer = parseInt(eui_basa_check_cant * 2);
        }

        if(eui_a_check_cant > eui_basa_check_cant && eui_a_check_cant > eui_b_check_cant){
            var max_cant_timer = parseInt(eui_a_check_cant * 2);
        }

        if(eui_b_check_cant > eui_basa_check_cant && eui_b_check_cant > eui_a_check_cant){
            var max_cant_timer = parseInt(eui_b_check_cant * 2);
        }

        if(energy > ashrae){
            var options = {
          width: 300, height: 130,
          greenFrom:1,greenTo:ashrae,
          redFrom: energy, redTo: 300,
          yellowFrom:ashrae, yellowTo: energy,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }

        if(energy < ashrae){
            var options = {
          width: 300, height: 130,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 300,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }

        var chart = new google.visualization.Gauge(document.getElementById('eui_sol_a'));

        chart.draw(data, options);
    }
}

    function chart_b_eui_print() {
        let check_eui_b = '{{$valor_eui_b}}';
        if (check_eui_b >= 0){
            var eui_b =  Math.floor('{{$valor_eui_b}}' * 1) / 1 ;
            var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['EUI B', eui_b],
            ]);
            let energy = '{{$energy_star}}';
            let ashrae = '{{$ashrae}}';

            var eui_basa_check_cant = '{{$valor_eui_base}}';
            var eui_a_check_cant = '{{$valor_eui_a}}';
            var eui_b_check_cant = '{{$valor_eui_b}}';

            if(eui_basa_check_cant > eui_a_check_cant && eui_basa_check_cant > eui_b_check_cant){
                var max_cant_timer = parseInt(eui_basa_check_cant * 2);
            }

            if(eui_a_check_cant > eui_basa_check_cant && eui_a_check_cant > eui_b_check_cant){
                var max_cant_timer = parseInt(eui_a_check_cant * 2);
            }

            if(eui_b_check_cant > eui_basa_check_cant && eui_b_check_cant > eui_a_check_cant){
                var max_cant_timer = parseInt(eui_b_check_cant * 2);
            }

            if(energy > ashrae){
                    var options = {
                width: 300, height: 130,
                greenFrom:1,greenTo:ashrae,
                redFrom: energy, redTo: 300,
                yellowFrom:ashrae, yellowTo: energy,
                minorTicks: 5,
                max:300,
                min:1,
                };
                }

                if(energy < ashrae){
                    var options = {
                width: 300, height: 130,
                greenFrom:1,greenTo:energy,
                redFrom: ashrae, redTo: 300,
                yellowFrom:energy, yellowTo: ashrae,
                minorTicks: 5,
                max:300,
                min:1,
                };
                }

            var chart = new google.visualization.Gauge(document.getElementById('eui_sol_b'));

            chart.draw(data, options);
        }


    }

    function red_ene_print(id_project){


            //console.log(res);
    var options = {
          series: [
          {
            name:'Solución A',
            data: [20, 30, 40, 50, 60]
          },
          {
            name:'Solución B',
            data: [15, 30, 45, 60, 75]
          }
        ],
          chart: {
          offsetX: 0,
          offsetY: 0,
          bottom:0,
          height: 200,
          width:365,
          type: 'line',
          dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#ff00ff', '#545454'],
        dataLabels: {
                enabled: true,
                style: {
                fontSize: '12px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: 'bold',
            },
        },
        stroke: {
          curve: 'smooth'
        },
        title: {

          align: 'center',
          style: {
            fontSize: '24px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: "bold",
            cssClass: 'apexcharts-yaxis-label',
            color: '#000',
          },
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
          padding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        },
        markers: {
          size: 1
        },
        xaxis: {
            tickPlacement: 'between',
           categories: [1,2,3,4,5],
           range:4,
          title: {
            text: 'Años',
            style: {
                    colors: [],
                    fontSize: '15px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-xaxis-label',
                },
          },
        },
        yaxis: {
          labels:{
            style: {
                    colors: [],
                    fontSize: '14px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
            formatter: function (val) {
              return val + "%"
            },
          },

        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          offsetX: 40,
          fontSize: '14px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 12,
          height: 12,
          strokeWidth: 0,
          strokeColor: '#fff',
          fillColors: ['#ff00ff', '#545454'],
          radius: 12,
          customHTML: undefined,
          onClick: undefined,
          offsetX: 0,
          offsetY: 0,
      },

        }
        };

        var chart = new ApexCharts(document.querySelector("#chart_red_ene_print"), options);
        chart.render();
}

function descarb_print(id_project){


    var options = {
          series: [
          {
            name:'Solución A',
            data: [20, 30, 40, 50, 60]
          },
          {
            name:'Solución B',
            data:  [15, 30, 45, 60, 75]
          }
        ],
          chart: {
            height: 200,
          width:365,
          type: 'line',
          dropShadow: {
            enabled: true,
            color: '#000',
            top: 18,
            left: 7,
            blur: 10,
            opacity: 0.2
          },
          toolbar: {
            show: false
          }
        },
        colors: ['#2be6ee', '#545454'],
        dataLabels: {
                enabled: true,
                style: {
                fontSize: '12px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: 'bold',
            },
        },
        stroke: {
          curve: 'smooth'
        },
        title: {

          align: 'center',
          style: {
            fontSize: '24px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: "bold",
            cssClass: 'apexcharts-yaxis-label',
            color: '#000',
          },
        },
        grid: {
          borderColor: '#e7e7e7',
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
          padding: {
          top: 0,
          right: 0,
          bottom: 0,
          left: 0
        },
        },
        markers: {
          size: 1
        },
        xaxis: {
            tickPlacement: 'between',
           categories: [1,2,3,4,5],
           range:4,
          title: {
            text: 'Años',
            style: {
                    colors: [],
                    fontSize: '15px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '12px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-xaxis-label',
                },
          },
        },
        yaxis: {
          labels:{
            style: {
                    colors: [],
                    fontSize: '14px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
            formatter: function (val) {
              return val + "%"
            },
          },
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          offsetX: 40,
          fontSize: '14px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 12,
          height: 12,
          strokeWidth: 0,
          strokeColor: '#fff',
          fillColors: ['#2be6ee', '#545454'],
          radius: 12,
          customHTML: undefined,
          onClick: undefined,
          offsetX: 0,
          offsetY: 0,
      },

        }
        };

        var chart = new ApexCharts(document.querySelector("#chart_descarb_print"), options);
        chart.render();
}

setTimeout(function() {
    //con_ene_hvac_ar_Base_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
}, 2000);
</script>
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection

