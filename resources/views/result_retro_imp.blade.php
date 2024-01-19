
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
@inject('graficas_capex_opex','app\Http\Controllers\ResultadosController')
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

        .ancho_rang{
            width:1.25rem;
            height:3rem;
        }

        .puntero_medidas{
            width: 85px; height:65px;
            margin-top:5px;
        }

        .size_solutions_confort{
            font-size:2rem;
        }

        .size_solutions_payback{
            font-size:3rem;
        }

        .style_grafics_marr{
            width:600px;
            height:320px;
        }

        .per_cos{
            font-size: 2.25rem;
        }
@media print{
  @page { margin: 0; }

  .ancho{
    width:95%;
  }

  .info_project{
    font-size: 18px;
    font-family: 'ABeeZee', sans-serif;
    color:#2c5282;
    font-weight: bold;
  }

  .info_project_res{
    font-size: 18px;
    font-family: 'ABeeZee', sans-serif;
    font-weight: bold;
  }

  .img_projec{
            height: 120px;
            width:230px;
         }

  .titulos_style{
            font-size:28px;
            color: white;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
         }
   .solucions_style_name{
        font-size: 1.8rem;
        color: #2c5282;
        font-weight: bold;
        font-family: 'ABeeZee', sans-serif;
   }

   .cant_style{
            font-size: 2.3rem;
            color: #2c5282;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
   }

   .unit_style{
            font-size: 1.2rem;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
            margin-top:.8rem;
   }

   .style_grafica_khw2{
    width:300px;
    height: 250px;
   }

   .eui_energy_style{
    margin-top: 2rem;
    color: #2c5282;
    font-weight: bold;
    font-family: 'ABeeZee', sans-serif;
    margin-right: .15rem;
    font-size: 1.5rem;
   }

   .eui_energy_val_style{
    margin-top: 1.5rem;
    font-weight: bold;
    font-family: 'ABeeZee', sans-serif;
    font-size: 2.5rem;
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
            width:68px;
             height:50px;
              z-index:1;
        }

   .red_energetica_style{
            font-size: 1.3rem;
            color: #2c5282;
            font-weight: bold;
            font-family: 'ABeeZee', sans-serif;
            margin-top:15px;
        }

        .margin_new_page{
            margin-top: 0rem;
        }

        .ancho_rang{
            width:1.2rem;
            height:2.2rem;
        }

        .puntero_medidas{
            width: 38px; height:40px;
            margin-top:5px;
        }

        .size_solutions_confort{
            font-size:1.6rem;
        }

        .size_solutions_payback{
            font-size:2.6rem;
        }


        .style_grafics_marr{
            width:400px;
            height:250px;
        }

        .per_cos{
            font-size: 1.8rem;
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
                width: 300px;
                height: 200px;
                margin: 0px auto;
            }

        }

        @media (min-width: 1800px) {
            .js_charts_style{
                width: 410px;
                height: 210px;
                margin: 0px auto;
            }
        }

        @media (min-width: 1890px) {
            .js_charts_style{
                width: 410px;
                height: 210px;
                margin: 0px auto;
            }
        }

        @media (min-width: 1900px) {
            .js_charts_style{
                width: 410px;
                height: 210px;
                margin: 0px auto;
            }
        }
    </style>
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<?php  $tar_ele=$solutions->tar_elec($id_project) ?>
<?php  $kwh_yr=$results->kwh_yr($id_project,$tar_ele->cad_edi) ?>

{{-- navbar --}}
<div id="navbar"  name="navbar" class="bg-blue-900 w-full flex justify-center" style="background-image: radial-gradient(rgb(10,19,59) 0%,rgb(5,1,25) 100%);">
    <div class="w-1/3">
        <img class="header" style="height:99px;" name="logoEmpresa" id="logoEmpresa" src="{{asset('assets/images/Logo-NDL_blanco_marca-r.png')}}" alt="Nano Degree">
    </div>
    <div class=" w-1/3 flex justify-center" style="line-height: 30px; height:99px;">
        {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}
        <a><img src="{{asset('/assets/images/Logotipo-HVACOPCOST_blanco.png')}}" alt="hvacopcost latinoamérica" style="max-height: 100px; width:230px;"></a>

    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-end h-1/3">
    {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
    <button class="bg-orange-500  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='/edit_project_copy/{{$id_project}}'"><p class="mx-1">{{ __('index.edit_proj') }}</p></button>

    {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
{{--     <button title="Ver PDF" class="bg-blue-600 mx-1 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 p-2" target="_blank" onclick="window.open('/generatePDF/{{$id_project}}', '_blank');" ><i class="fa-solid fa-file-pdf text-2xl text-red-600"></i></button>
 --}}
 <button title="Ver PDF" class="bg-blue-600 mx-1 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 p-2" target="_blank" onclick="send_print();" ><i class="fa-solid fa-file-pdf text-2xl text-red-600"></i></button>
    <button class="bg-blue-600  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 " onclick="window.location.href='/home'">Nuevo Proyecto</button>

    </div>
</div>
{{-- navbar --}}
{{-- principal --}}
<div class="w-full grid rounded-md justify-items-center mt-5">
    <div  class="ancho border-2 border-blue-500 rounded-md flex">


        <div class="w-1/4 flex justify-center">
            <img src="{{asset('/assets/images/Logo-NDL_marca-registrada.jpg')}}" alt="hvacopcost latinoamérica" class="img_porject mx-2">
        </div>

        <div class="w-1/3 grid justify-left ml-2">
            <div class="w-full flex ">
                <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project">{{$tar_ele->name}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.categoria edificio') }}:</label><p class="info_project">{{$tar_ele->cad_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.tipo edificio') }}:</label><p class="info_project">{{$tar_ele->tipo_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.area') }}:</label><p class="info_project">{{number_format($tar_ele->area)}}
                    @if ($tar_ele->unidad == 'mc')
                    m²
                @endif

                @if ($tar_ele->unidad == 'ft')
                ft²
                @endif
                </p>
            </div>
        </div>

        <div class="w-1/3 grid justify-left">
            <div class="w-full">
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.region') }}:</label><p class="info_project">{{$tar_ele->region}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.ciudad') }}:</label><p class="info_project">{{$tar_ele->ciudad}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.hors_enft_anual') }}:</label><p class="info_project">&nbsp;{{number_format($tar_ele->coolings_hours)}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.tar_ele') }}:</label><p class="info_project">{{$tar_ele->costo_elec}} $/Kwh</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Counsumo energia electrica --}}
<div class="w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
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
                                <div class="grid justify-items-center w-full">
                                    <?php  $result1=$results->result_1($id_project,1) ?>
                                    @if ($result1 ==! null)
                                    <?php  $sumaopex_1=$smasolutions->sumaopex($id_project,$result1->num_enf) ?>
                                    <?php  $sumacap_term_1=$smasolutions->sumacap_term($id_project,$result1->num_enf) ?>
                                    <?php  $unid_med_1=$smasolutions->unid_med($id_project,$result1->num_enf) ?>
                                    <?php  $result_area_1=$results->result_area($id_project,$sumaopex_1) ?>
                                    <?php  $inv_ini_1=$smasolutions->inv_ini($id_project,$result1->num_enf) ?>
                                    @elseif($result1 === null)
                                    <?php $sumaopex_1=0?>
                                    <?php $sumacap_term_1=0?>
                                     <?php $unid_med_1=""?>
                                     <?php  $result_area_1=0 ?>
                                     <?php $inv_ini_1=0?>
                                    @endif
                                    <div class="flex w-full justify-center">
                                        <p class="cant_style">{{number_format($sumaopex_1)}}</p><b class="unit_style">Kwh</b>
                                    </div>

                                    <div class="flex w-full justify-center">
                                        <div id="chart_cons_ene_hvac_ar_base" name="chart_cons_ene_hvac_ar_base" class="js_charts_style">

                                        </div>
                                    </div>
{{--                                     <div id="chart_cons_ene_hvac_ar_base_print" name="chart_cons_ene_hvac_ar_base_print" class="js_charts_style"></div>
 --}}
                                    <div class="flex w-full justify-center mt-4">
                                        <p class="cant_style">$ {{number_format($sumaopex_1*$tar_ele->costo_elec)}}</p>
                                    </div>
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
                                    <?php  $inv_ini_2=$smasolutions->inv_ini($id_project,$result2->num_enf) ?>
                                    <input type="number" class="hidden" id="inv_ini_2" name="inv_ini_2" value="{{$inv_ini_2}}">
                                    @elseif($result2 === null)
                                    <?php $sumaopex_2=0?>
                                    <?php $sumacap_term_2=0?>
                                    <?php $unid_med_2=""?>
                                    <?php  $result_area_2=0?>
                                    <?php $inv_ini_2=0?>

                                    @endif
                                    <div class="flex w-full justify-center">
                                        <p class="cant_style">{{number_format($sumaopex_2)}}</p><b class="unit_style">Kwh</b>
                                    </div>
                                    <div id="chart_cons_ene_hvac_ar_a" class="js_charts_style" ></div>
                                    <div class="flex w-full justify-center mt-4">
                                        <p class="cant_style">$ {{number_format($sumaopex_2*$tar_ele->costo_elec)}}</p>
                                    </div>
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
                                     <?php  $inv_ini_3=$smasolutions->inv_ini($id_project,$result3->num_enf) ?>
                                      <input type="number" class="hidden" id="inv_ini_3" name="inv_ini_3" value="{{$inv_ini_3}}">
                                    @elseif($result3 === null)
                                    <?php $sumaopex_3=0?>
                                    <?php $sumacap_term_3=0?>
                                    <?php $unid_med_3=""?>
                                    <?php  $result_area_3=0?>
                                    <?php $inv_ini_3=0?>
                                     <input type="number" class="hidden" id="inv_ini_3" name="inv_ini_3" value="{{$inv_ini_3}}">
                                    @endif
                                   <div class="flex w-full justify-center">
                                        <p class="cant_style">{{number_format($sumaopex_3)}}</p><b class="unit_style">Kwh</b>
                                    </div>
                                     <div id="chart_cons_ene_hvac_ar_b" class="js_charts_style"></div>
                                     <div class="flex w-full justify-center mt-4">
                                        <p class="cant_style">$ {{number_format($sumaopex_3*$tar_ele->costo_elec)}}</p>
                                    </div>
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
    <div class="ancho border-2 border-blue-500 rounded-md grid">
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
                <div id="eui_sol_base" name="eui_sol_base"></div>
                <div class="hidden" id="eui_sol_base_print" name="eui_sol_base_print"></div>
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
                <div id="eui_sol_a" name="eui_sol_a"></div>
                <div class="hidden" id="eui_sol_a_print" name="eui_sol_a_print"></div>

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
                <div id="eui_sol_b" name="eui_sol_b"></div>
                <div class="hidden" id="eui_sol_b_print" name="eui_sol_b_print"></div>
            </div>
    </div>
    </div>
</div>

{{-- Índice Intensidad del Uso de Energía --}}
<div class="w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 rounded-md grid">


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

                <div class="w-full flex justify-center">
                    <div id="chart_red_ene" name="chart_red_ene" style="width: 600px;"></div>
                    <div class="hidden" style="height:200px;"  id="chart_red_ene_print" name="chart_red_ene_print"></div>
                </div>
            </div>

            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center">
                    <img src="{{asset('/assets/images/Huella.png')}}" class="img_red_ene mx-10 mt-2" alt="Nano Degree">
                    <label class="red_energetica_style" for="">Descarbonización (Ton CO2)</label>
                </div>

                <div class="w-full flex justify-center">
                    <div id="chart_descarb" name="chart_descarb" style="width: 600px;"></div>
                    <div class="hidden "  style="height:200px;"  id="chart_descarb_print" name="chart_descarb_print"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
{{-- espacio --}}
<div id="espacio_pagina_1" name="espacio_pagina_1" class="hidden" style="width:100%; height:40px;" >

</div>

    {{-- principal --}}
    <div id="principal_hoja_2" name="principal_hoja_2" class="hidden w-full grid rounded-md justify-items-center mt-8">
        <div  class="ancho border-2 border-blue-500 rounded-md flex">


        <div class="w-1/4 flex justify-center">
            <img src="{{asset('/assets/images/Logo-NDL_marca-registrada.jpg')}}" alt="hvacopcost latinoamérica" class="img_porject mx-2">
        </div>

        <div class="w-1/3 grid justify-left ml-2">
            <div class="w-full flex ">
                <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project">{{$tar_ele->name}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.categoria edificio') }}:</label><p class="info_project">{{$tar_ele->cad_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.tipo edificio') }}:</label><p class="info_project">{{$tar_ele->tipo_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.area') }}:</label><p class="info_project">{{number_format($tar_ele->area)}}
                    @if ($tar_ele->unidad == 'mc')
                    m²
                @endif

                @if ($tar_ele->unidad == 'ft')
                ft²
                @endif
                </p>
            </div>
        </div>

        <div class="w-1/3 grid justify-left">
            <div class="w-full">
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.region') }}:</label><p class="info_project">{{$tar_ele->region}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.ciudad') }}:</label><p class="info_project">{{$tar_ele->ciudad}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.hors_enft_anual') }}:</label><p class="info_project">&nbsp;{{number_format($tar_ele->coolings_hours)}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.tar_ele') }}:</label><p class="info_project">{{$tar_ele->costo_elec}} $/Kwh</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Nivel de Confort --}}
<div class="margin_new_page w-full grid rounded-md justify-items-center mt-3">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
      <div class="w-full grid">
              <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                  <p class="titulos_style">{{ __('results.niv_conf') }}</p>
              </div>
      </div>
      <?php  $conf_val_base=$conf_val->conf_val($id_project,1,1,$sumacap_term_1); ?>
      <?php  $conf_val_a=$conf_val->conf_val($id_project,2,1,$sumacap_term_2);?>
      <?php  $conf_val_b=$conf_val->conf_val($id_project,3,1,$sumacap_term_3) ?>
      <div class="flex w-full justify-center gap-x-3 mb-2">

              {{--  --}}
              <div class="w-full grid mb-0 gap-y-5">
                      <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg" style="margin-top:1.8rem;">

                          <div class="w-1/5 flex justify-start">
                          {{--  <div class="ml-10 flex w-full mt-5"> --}}
                                  <p class="size_solutions_confort text-blue-600 font-roboto  font-bold text-left">{{ __('index.sis_ext') }}</p>
                              {{-- </div> --}}
                          </div>

                      <div class="flex rounded-lg" style="background: rgb(255,0,56);
                      background: linear-gradient(90deg, rgba(255,0,56,1) 0%, rgba(251,255,4,1) 50%, rgba(29,255,0,1) 100%); border: 5px solid #2c5282;">
                              {{-- 1 --} --}}
                          @for ($i = 1; $i <= 32; $i++)
                          <div id="term_{{$i}}" name="term_{{$i}}" class="grid ancho_rang">
                              <img  id="val_base_{{$i}}" name="val_base_{{$i}}" src="{{asset('assets\images\puntero_barra.png')}}"  class="hidden puntero_medidas" alt="">
                          </div>
                          @endfor
                      </div>
              </div>

              @if ($result2 !== null)
                  <div class="w-full grid mb-0 gap-y-5">
                      <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg">
                          <div class="w-1/5 flex justify-start">

                                  <p class="text-blue-600 font-roboto size_solutions_confort font-bold text-left">{{ __('index.solucion') }} A</p>

                          </div>
                        <div class="flex rounded-lg" style="background: rgb(255,0,56);
                        background: linear-gradient(90deg, rgba(255,0,56,1) 0%, rgba(251,255,4,1) 50%, rgba(29,255,0,1) 100%); border: 5px solid #2c5282;">

                                      @for ($i = 1; $i <= 32; $i++)
                                      <div id="term_{{$i}}_a" name="term_{{$i}}_a" class="grid ancho_rang">
                                          <img  id="val_base_{{$i}}_a" name="val_base_{{$i}}_a" src="{{asset('assets\images\puntero_barra.png')}}"  class="hidden puntero_medidas" alt="">
                                      </div>
                                      @endfor
                          </div>
                  </div>
              @endif

              @if ($result2 === null)
                  <?php  $conf_val_a=0; ?>
                  <div class="w-full grid mb-0 gap-y-5">
                      <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg">
                          <div class="w-1/5 flex justify-start">
                                  <p class="size_solutions_confort text-blue-600 font-roboto font-bold text-left">{{ __('index.solucion') }} A</p>
                          </div>
                        <div class="flex rounded-lg" style="background: rgb(255,0,56);
                        background: linear-gradient(90deg, rgba(255,0,56,1) 0%, rgba(251,255,4,1) 50%, rgba(29,255,0,1) 100%); border: 5px solid #2c5282;">

                                      @for ($i = 1; $i <= 32; $i++)
                                      <div id="term_{{$i}}_a" name="term_{{$i}}_a" class="grid ancho_rang">
                                          <img  id="val_base_{{$i}}_a" name="val_base_{{$i}}_a" src="{{asset('assets\images\puntero_barra.png')}}"  class="hidden puntero_medidas" alt="">
                                      </div>
                                      @endfor
                      </div>
                  </div>
              @endif

              @if ($result3 !== null)
                  <div class="w-full grid mb-0 gap-y-5">
                      <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg">
                          <div class="w-1/5 flex justify-start">
                                  <p class="size_solutions_confort text-blue-600 font-roboto font-bold text-left">{{ __('index.solucion') }} B</p>
                          </div>
                        <div class="flex rounded-lg" style="background: rgb(255,0,56);
                        background: linear-gradient(90deg, rgba(255,0,56,1) 0%, rgba(251,255,4,1) 50%, rgba(29,255,0,1) 100%); border: 5px solid #2c5282;">

                                  @for ($i = 1; $i <= 32; $i++)
                                  <div id="term_{{$i}}_b" name="term_{{$i}}_b" class="grid ancho_rang">
                                      <img  id="val_base_{{$i}}_b" name="val_base_{{$i}}_b" src="{{asset('assets\images\puntero_barra.png')}}"  class="hidden puntero_medidas" alt="">
                                  </div>
                                  @endfor
                          </div>
                      </div>
              @endif

              @if ($result3 === null)
                  <?php  $conf_val_b=0; ?>
                  <div class="w-full grid mb-0 gap-y-5">
                      <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg">
                          <div class="w-1/5 flex justify-start">

                                  <p class="text-blue-600 font-roboto size_solutions_confort font-bold">{{ __('index.solucion') }} B</p>

                          </div>
                        <div class="flex rounded-lg" style="background: rgb(255,0,56);
                        background: linear-gradient(90deg, rgba(255,0,56,1) 0%, rgba(251,255,4,1) 50%, rgba(29,255,0,1) 100%); border: 5px solid #2c5282;">

                                  @for ($i = 1; $i <= 32; $i++)
                                  <div id="term_{{$i}}_b" name="term_{{$i}}_b" class="grid ancho_rang">
                                      <img  id="val_base_{{$i}}_b" name="val_base_{{$i}}_b" src="{{asset('assets\images\puntero_barra.png')}}"  class="hidden puntero_medidas" alt="">
                                  </div>
                                  @endfor
                          </div>
                  </div>
              @endif
              {{--  --}}


      </div>
    </div>
  </div>

{{-- checar estos /divs --}}
</div>
</div>
{{-- checar estos /divs --}}
  {{-- Nivel de Confort --}}
<div class="margin_new_page w-full grid rounded-md justify-items-center">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
      <div class="w-full grid">
              <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                  <p class="titulos_style">{{ __('results.prod_lab') }}</p>
              </div>
      </div>

      <div class="grid w-full justify-items-center gap-x-3 mb-2">

        <div class="flex w-full justify-center">
            @if ($result1 !== null)
            <?php  $prod_lab=$conf_val->prod_lab($id_project,1,1,$sumacap_term_1) ?>
            @endif
            @if ($result1 === null)
            <?php  $prod_lab=0; ?>
            @endif
            <div class="w-1/3 grid justify-items-center">
                <div class="w-full flex justify-center">
                    {{--  <div class="ml-10 flex w-full mt-5"> --}}
                            <p class="size_solutions_confort text-blue-600 font-roboto font-bold">{{ __('index.sis_ext') }}</p>
                        {{-- </div> --}}
                    </div>
                <div class="my-6" style="margin: 0px auto" id="chart_prod_base"></div>
            </div>
            @if ($result2 !== null)
            <?php  $prod_lab_a=$conf_val->prod_lab($id_project,2,1,$sumacap_term_1) ?>
            @endif
            @if ($result2 === null)
            <?php  $prod_lab_a=0; ?>
            @endif
            <div class="w-1/3 grid justify-items-center">
                <div class="w-full flex justify-center">
                    {{--  <div class="ml-10 flex w-full mt-5"> --}}
                            <p class="size_solutions_confort text-blue-600 font-roboto font-bold">{{ __('index.solucion') }} A</p>
                        {{-- </div> --}}
                </div>
                <div class="my-6"  id="chart_prod_a" style="margin: 0px auto"></div>
            </div>
            @if ($result3 !== null)
            <?php  $prod_lab_b=$conf_val->prod_lab($id_project,3,1,$sumacap_term_1) ?>
            @endif
            @if ($result3 === null)
            <?php  $prod_lab_b=0; ?>
            @endif
            <div class="w-1/3 grid justify-items-center">
                <div class="w-full flex justify-center">
                    {{--  <div class="ml-10 flex w-full mt-5"> --}}
                            <p class="size_solutions_confort text-blue-600 font-roboto font-bold">{{ __('index.solucion') }} B</p>
                        {{-- </div> --}}
                </div>
                <div class="my-6" id="chart_prod_b" style="margin: 0px auto"></div>
            </div>
        </div>

        <div class="flex w-full justify-center mt-6">
            <p class="per_cos text-blue-600 font-roboto font-bold">Personas y Costo de la Pérdida de Pooductividad</p>
        </div>

        <div class="flex w-full justify-center mt-3">
            @if ($result1 !== null)


            <?php  $personas=$conf_val->personas($id_project,$conf_val_base) ?>
            <?php  $costo_base=$conf_val->costo($personas,$id_project) ?>
            @endif

            @if ($result1 === null)
            <?php  $personas=0; ?>
            @endif
            <div class="w-1/3 grid justify-items-center gap-y-2">
                <div class="flex w-full justify-center">
                    <p class="cant_style">{{$personas}}</p>
                </div>

                <div class="flex w-full justify-center">
                    <p class="cant_style">${{number_format($costo_base)}}</p>
                </div>
            </div>

            @if ($result2 !== null)
            <?php  $personas_a=$conf_val->personas($id_project,$conf_val_a) ?>
            <?php  $costo_a=$conf_val->costo($personas_a,$id_project) ?>
            @endif

            @if ($result2 === null)
            <?php  $costo_a=0; ?>
            @endif
            <div class="w-1/3 grid justify-items-center gap-y-2">
                <div class="flex w-full justify-center">
                    <p class="cant_style">{{$personas_a}}</p>
                </div>

                <div class="flex w-full justify-center">
                    <p class="cant_style">${{number_format($costo_a)}}</p>
                </div>
            </div>

            @if ($result2 !== null)
            <?php  $personas_b=$conf_val->personas($id_project,$conf_val_b) ?>
            <?php  $costo_b=$conf_val->costo($personas_b,$id_project) ?>
            @endif

            @if ($result2 === null)
            <?php  $personas_b=0; ?>
            @endif

            <div class="w-1/3 grid justify-items-center gap-y-2">
                <div class="flex w-full justify-center">
                    <p class="cant_style">{{$personas_b}}</p>
                </div>

                <div class="flex w-full justify-center">
                    <p class="cant_style">${{number_format($costo_b)}}</p>
                </div>
            </div>
        </div>

      </div>
    </div>
</div>

{{-- espacio hoja pagina 3 --}}
<div id="next_page_3" name="next_page_3" style="width: 80%; height:545px;" class="hidden">

</div>
{{-- espacio hoja pagina 3 --}}

{{-- principal --}}
<div id="principal_hoja_3" name="principal_hoja_3" class="hidden w-full grid rounded-md justify-items-center mt-5">
    <div  class="ancho border-2 border-blue-500 rounded-md flex">


    <div class="w-1/4 flex justify-center">
        <img src="{{asset('/assets/images/Logo-NDL_marca-registrada.jpg')}}" alt="hvacopcost latinoamérica" class="img_porject mx-2">
    </div>

    <div class="w-1/3 grid justify-left ml-2">
        <div class="w-full flex ">
            <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project">{{$tar_ele->name}}</p>
        </div>
        <div class="w-full flex">
            <label class="info_project" for="">{{ __('index.categoria edificio') }}:</label><p class="info_project">{{$tar_ele->cad_edi}}</p>
        </div>
        <div class="w-full flex">
            <label class="info_project" for="">{{ __('index.tipo edificio') }}:</label><p class="info_project">{{$tar_ele->tipo_edi}}</p>
        </div>
        <div class="w-full flex">
            <label class="info_project" for="">{{ __('index.area') }}:</label><p class="info_project">{{number_format($tar_ele->area)}}
                @if ($tar_ele->unidad == 'mc')
                m²
            @endif

            @if ($tar_ele->unidad == 'ft')
            ft²
            @endif
            </p>
        </div>
    </div>

    <div class="w-1/3 grid justify-left">
        <div class="w-full">
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.region') }}:</label><p class="info_project">{{$tar_ele->region}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.ciudad') }}:</label><p class="info_project">{{$tar_ele->ciudad}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.hors_enft_anual') }}:</label><p class="info_project">&nbsp;{{number_format($tar_ele->coolings_hours)}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.tar_ele') }}:</label><p class="info_project">{{$tar_ele->costo_elec}} $/Kwh</p>
            </div>
        </div>
    </div>
</div>
</div>
<?php  $results_aux=$results->results($id_project) ?>
<?php  $dif_1_cost=$smasolutions->dif_1_cost($id_project,count($results_aux),$tar_ele->costo_elec) ?>
<?php  $inv_ini_2=$smasolutions->inv_ini($id_project,$result2->num_enf) ?>

<?php  $dif_2_cost=$smasolutions->dif_2_cost($id_project,count($results_aux),$tar_ele->costo_elec) ?>
 {{-- payback --}}
 <div class="margin_new_page w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
      <div class="w-full grid">
              <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                  <p class="titulos_style">Payback {{ __('results.simple') }} ({{ __('results.ans') }})</p>
              </div>

              <div class="flex w-full justify-center gap-x-3">
                <div class="grid justify-center w-1/4">
                   {{-- espacio --}}
                </div>

                <div class="grid justify-center w-1/5">
                    <b class="size_solutions_confort text-blue-600 font-roboto font-bold">Existente</b>

                </div>

                <div class="grid justify-center w-1/5">
                    <b class="size_solutions_confort text-blue-600 font-roboto font-bold">Solución A</b>

                </div>

                <div class="grid justify-center w-1/5">
                    <b class="size_solutions_confort text-blue-600 font-roboto font-bold">Solución B</b>

                </div>
            </div>

            <div class="flex w-full justify-center gap-x-3">
                <div class="grid justify-center w-1/4">
                    <b class="size_solutions_confort text-blue-600 font-roboto font-bold">Inversión</b>
                </div>

                <div class="grid justify-center w-1/5">
                    <b class="size_solutions_confort text-blue-600 font-roboto font-bold"> <p class="cant_style">${{$inv_ini_1}}</p></b>

                </div>

                <div class="grid justify-center w-1/5">
                    <b class="size_solutions_confort text-blue-600 font-roboto font-bold"> <p class="cant_style">${{$inv_ini_2}}</p></b>

                </div>

                <div class="grid justify-center w-1/5">
                    <b class="size_solutions_confort text-blue-600 font-roboto font-bold"> <p class="cant_style">${{$inv_ini_3}}</p></b>

                </div>
            </div>

            <div class="flex w-full justify-center gap-x-3">
                <div class="grid justify-center w-1/4">
                    <b class="size_solutions_confort text-blue-600 font-roboto font-bold">Payback Simple</b>
                </div>

                <div class="grid justify-center w-1/5">

                        <b class="size_solutions_confort text-blue-600 font-roboto font-bold"> <p class="cant_style"></p></b>

                </div>

                <div style="border-style: solid; border-width: 8px;" class="grid justify-center w-1/5 border-green-300 rounded-md my-1">
                    <div class="flex">
{{--                         <b class="size_solutions_confort text-blue-600 font-roboto font-bold"> <p class="cant_style">7</p></b>
 --}}                        @if ( true == ( isset( $dif_1_cost ) ? $dif_1_cost : null ) )
                                                    <?php  $pay_back_a=$smasolutions->pay_back($inv_ini_1,$inv_ini_2,$dif_1_cost) ?>

                            @if ($pay_back_a >= 0)
                            <b style="color:#33cc33;" class="size_solutions_payback  font-roboto font-bold">{{number_format($pay_back_a)}}</b>
                            @endif

                             @if ($pay_back_a < 0)
                            <b style="color:#ea0000;" class="size_solutions_payback  font-roboto font-bold">{{number_format($pay_back_a)}}</b>
                            @endif

                            @else
                         <b style="color:#33cc33;" class="size_solutions_payback font-roboto font-bold">N/A</b>
                         @endif
                    </div>

                </div>

                <div style="border-style: solid; border-width: 8px;" class="grid justify-center w-1/5 border-green-300 rounded-md my-1">
                    <div class="flex">

                        @if ( true == ( isset( $dif_2_cost ) ? $dif_2_cost : null ) )
                             <?php  $pay_back_b=$smasolutions->pay_back($inv_ini_1,$inv_ini_3,$dif_2_cost) ?>
                             @if ($pay_back_b >= 0)
                            <b style="color:#33cc33;" class="size_solutions_payback text-blue-600 font-roboto font-bold">{{number_format($pay_back_b)}}</b>
                            @endif

                             @if ($pay_back_b < 0)
                            <b style="color:#ea0000;" class="size_solutions_payback text-blue-600 font-roboto font-bold">{{number_format($pay_back_b)}}</b>
                            @endif

                            @else
                            <b  style="color:#33cc33;" class="size_solutions_payback text-blue-600 font-roboto font-bold">N/A</b>
                        @endif
                    </div>

                </div>
            </div>
      </div>
    </div>
</div>

{{-- MARR --}}

<input type="text" id="ima_ener" name="ima_ener" class="hidden" value="{{ __('index.energia') }}">
<input type="text" id="ima_man" name="ima_man" class="hidden" value="{{ __('index.mantenimiento') }}">
<input type="text" id="ima_sol" name="ima_sol" class="hidden" value="{{ __('index.solucion') }}">

<div class="w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 rounded-md grid">


        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">ROI v/s MARR (solo Energía)</p>
            </div>
        </div>

        <div class="flex w-full justify-center gap-x-3">
            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center">
                    <label class="red_energetica_style" for="">Solución A</label>

                    <input type="number" class="hidden" id="dif_cost_base_a" name="dif_cost_base_a" value="{{$dif_1_cost}}">

                </div>

                <div class="w-full flex justify-center">

                    <div class="w-1/2 flex justify-center">
                        <div id="chart_roi_base_a" name="chart_roi_base_a" style="width: 600px;"></div>
                        <div class="hidden" style="height:200px;"  id="chart_roi_base_a_print" name="chart_roi_base_a_print"></div>
                    </div>

                </div>
            </div>


            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center">

                    <label class="red_energetica_style" for="">Solución B</label>
                </div>
                <input type="number" class="hidden" id="dif_cost_base_b" name="dif_cost_base_b" value="{{$dif_2_cost}}">

                <div class="w-full flex justify-center">

                    <div class="w-1/2 flex justify-center">

                        <div id="chart_roi_base_b" name="chart_roi_base_b" style="width: 600px;"></div>
                        <div class="hidden "  style="height:200px;"  id="chart_roi_base_b_print" name="chart_roi_base_b_print"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- MARR --}}
<div class="w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 rounded-md grid">

        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">ROI v/s MARR (Energía + Productividad)</p>
            </div>
        </div>

        <div class="flex w-full justify-center gap-x-3">
            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center">
                    <label class="red_energetica_style" for="">Solución A</label>

                </div>

                <div class="w-full flex justify-center">
                  {{--   <div id="chart_red_ene" name="chart_red_ene"></div>
                    <div class="hidden" style="width: 400px; height:380px;" id="chart_red_ene_print" name="chart_red_ene_print"></div> --}}
                     <div class="w-1/2 flex justify-center">
                        <div id="chart_roi_base_a_ene_prod" name="chart_roi_base_a_ene_prod" style="width: 600px;"></div>
                        <div class="hidden" style="height:200px;"  id="chart_roi_base_a_ene_prod_print" name="chart_roi_base_a_ene_prod_print"></div>
                    </div>
                </div>
            </div>

            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center">

                    <label class="red_energetica_style" for="">Solución B</label>
                </div>

                <div class="w-full flex justify-center">
                   {{--  <div id="chart_descarb" name="chart_descarb"></div>
                    <div class="hidden" style="width: 400px; height:380px;" id="chart_descarb_print" name="chart_descarb_print"></div> --}}
                    <div class="w-1/2 flex justify-center">

                        <div id="chart_roi_base_b_ene_prod" name="chart_roi_base_b_ene_prod" style="width: 600px;"></div>
                        <div class="hidden "  style="height:200px;"  id="chart_roi_base_b_ene_prod_print" name="chart_roi_base_b_ene_prod_print"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- capex vs opex --}}
<div class="w-full grid rounded-md justify-items-center mt-2">
    <div class="ancho border-2 border-blue-500 rounded-md grid">

        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">{{-- {{ __('results.analisis') }} --}}CAPEX v/s OPEX (@if($tar_ele->unidad == 'mc')$/m²)@endif
                    @if($tar_ele->unidad == 'ft')$/ft²)@endif
                </p>
            </div>
        </div>

        <div class="flex w-full justify-center gap-x-3">
            <div class="w-1/2 flex justify-center">
                <div id="chart" name="chart" style="width:600px;"></div>
                <div class="hidden" id="chart_print" name="chart_print" style="width:550px;"></div>
            </div>

            <div class="w-1/2 flex justify-center">
                <div  id="chart_3" name="chart_3" style="width:600px;"></div>
                <div class="hidden" id="chart_3_print" name="chart_3_print" style="width:550px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- capex vs opex --}}
<script type="text/javascript">

    var ener_lang = document.getElementById('ima_ener').value;
    var man_lang = document.getElementById('ima_man').value;
    var ima_sol = document.getElementById('ima_sol').value;
    google.charts.load('current', {'packages':['gauge']});
document.addEventListener('keydown', function(event) {
  if (event.ctrlKey && event.key === 'p') {
    //$("#navbar").removeClass("hidden");
    $("#principal_hoja_2").removeClass("hidden");
    $("#principal_hoja_3").removeClass("hidden");
    $("#next_page_3").removeClass("hidden");
    $("#chart_cons_ene_hvac_ar_base").width(200).height(150);
    $("#chart_cons_ene_hvac_ar_a").width(200).height(150);
    $("#chart_cons_ene_hvac_ar_b").width(200).height(150);
    $("#chart_red_ene").width(200).height(120);
    $("#chart_descarb").width(200).height(120);
    $("#chart").width(200).height(120);
    $("#chart_3").width(200).height(120);
    con_ene_hvac_ar_Base_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    $('#chart_red_ene').addClass("hidden");
    $("#chart_descarb").addClass("hidden");
    $("#eui_sol_base").addClass("hidden");
    $("#eui_sol_a").addClass("hidden");
    $("#eui_sol_b").addClass("hidden");
    $('#chart_red_ene_print').removeClass("hidden");
    $("#chart_descarb_print").removeClass("hidden");
    $('#eui_sol_base_print').removeClass("hidden");
    $("#eui_sol_a_print").removeClass("hidden");
    $('#eui_sol_b_print').removeClass("hidden");
    chart_prod_base_print();
    chart_prod_a_print();
    chart_prod_b_print();
  }
});

window.matchMedia('print').addListener((event)=>{
   /*  $("#navbar").addClass("hidden");
    $("#principal_hoja_2").removeClass("hidden");
    $("#principal_hoja_3").removeClass("hidden");
    $("#next_page_3").removeClass("hidden");
    $("#chart_cons_ene_hvac_ar_base").width(280).height(180);
    $("#chart_cons_ene_hvac_ar_a").width(280).height(180);
    $("#chart_cons_ene_hvac_ar_b").width(280).height(180);
    $("#chart_red_ene").width(200).height(120);
    $("#chart_descarb").width(200).height(120);
    $("#chart").width(200).height(120);
    $("#chart_3").width(200).height(120);
    con_ene_hvac_ar_Base_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    $('#chart_red_ene').addClass("hidden");
    $("#chart_descarb").addClass("hidden");
    $("#eui_sol_base").addClass("hidden");
    $("#eui_sol_a").addClass("hidden");
    $("#eui_sol_b").addClass("hidden");
    $('#chart_red_ene_print').removeClass("hidden");
    $("#chart_descarb_print").removeClass("hidden");
    $('#chart_print').removeClass("hidden");
    $("#chart_3_print").removeClass("hidden");
    $('#chart').addClass("hidden");
    $("#chart_3").addClass("hidden");
    $("#espacio_pagina_1").removeClass("hidden");
    $('#eui_sol_base_print').removeClass("hidden");
    $("#eui_sol_a_print").removeClass("hidden");
    $('#eui_sol_b_print').removeClass("hidden");
    chart_prod_base_print();
    chart_prod_a_print();
    chart_prod_b_print(); */


});

function send_print(){
    $("#navbar").addClass("hidden");
    $("#principal_hoja_2").removeClass("hidden");
    $("#principal_hoja_3").removeClass("hidden");
    $("#next_page_3").removeClass("hidden");
    $("#chart_cons_ene_hvac_ar_base").width(280).height(180);
    $("#chart_cons_ene_hvac_ar_a").width(280).height(180);
    $("#chart_cons_ene_hvac_ar_b").width(280).height(180);
    $("#chart_red_ene").width(200).height(120);
    $("#chart_descarb").width(200).height(120);
    $("#chart_red_ene_print").width(480).height(280);
    $("#chart_descarb_print").width(480).height(280);
    $("#chart").width(200).height(120);
    $("#chart_3").width(200).height(120);
    con_ene_hvac_ar_Base_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    $('#chart_red_ene').addClass("hidden");
    $("#chart_descarb").addClass("hidden");
    $("#eui_sol_base").addClass("hidden");
    $("#eui_sol_a").addClass("hidden");
    $("#eui_sol_b").addClass("hidden");
    $('#chart_red_ene_print').removeClass("hidden");
    $("#chart_descarb_print").removeClass("hidden");
    $('#chart_print').removeClass("hidden");
    $("#chart_3_print").removeClass("hidden");
    $('#chart').addClass("hidden");
    $("#chart_3").addClass("hidden");
    $("#espacio_pagina_1").removeClass("hidden");
    $('#eui_sol_base_print').removeClass("hidden");
    $("#eui_sol_a_print").removeClass("hidden");
    $('#eui_sol_b_print').removeClass("hidden");
    $("#chart_roi_base_a_print").removeClass("hidden");
    $('#chart_roi_base_b_print').removeClass("hidden");
    $('#chart_roi_base_a').addClass("hidden");
    $("#chart_roi_base_b").addClass("hidden");

    $("#chart_roi_base_a_ene_prod_print").removeClass("hidden");
    $('#chart_roi_base_b_ene_prod_print').removeClass("hidden");
    $('#chart_roi_base_a_ene_prod').addClass("hidden");
    $("#chart_roi_base_b_ene_prod").addClass("hidden");
    chart_prod_base_print();
    chart_prod_a_print();
    chart_prod_b_print();
    setTimeout(function() {
        window.print();
}, 3000);

}

window.onafterprint = function() {
    location.reload ();
    /* $("#chart_cons_ene_hvac_ar_base").width(350).height(280);
  $("#chart_cons_ene_hvac_ar_a").width(350).height(280);
    $("#chart_cons_ene_hvac_ar_b").width(350).height(280);
    $("#chart_red_ene").width(670).height(280);
    $("#chart_descarb").width(670).height(280);
    con_ene_hvac_ar_Base('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');

      google.charts.setOnLoadCallback(chart_base_eui);
      google.charts.setOnLoadCallback(chart_a_eui);
      google.charts.setOnLoadCallback(chart_b_eui);
      $('#chart_red_ene').removeClass("hidden");
      $("#chart_descarb").removeClass("hidden");
      $('#chart_red_ene_print').addClass("hidden");
      $("#chart_descarb_print").addClass("hidden"); */

}
window.onload = function() {
    con_ene_hvac_ar_Base('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(chart_base_eui);
      google.charts.setOnLoadCallback(chart_a_eui);
      google.charts.setOnLoadCallback(chart_b_eui);
      google.charts.setOnLoadCallback(chart_base_eui_print);
      google.charts.setOnLoadCallback(chart_a_eui_print);
      google.charts.setOnLoadCallback(chart_b_eui_print);
      red_ene('{{$id_project}}');
      descarb('{{$id_project}}');
      red_ene_print('{{$id_project}}');
      descarb_print('{{$id_project}}');
      confort_base('{{$conf_val_base}}');
      confort_a('{{$conf_val_a}}');
      confort_b('{{$conf_val_b}}');
      chart_prod_base();
      chart_prod_a();
      chart_prod_b();
      cap_op_1_retro('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_3_retro('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_1_retro_print('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_3_retro_print('{{$id_project}}','{{$tar_ele->unidad}}');
      roi_base_a('{{$id_project}}');
      roi_base_b('{{$id_project}}');
      roi_base_a_print('{{$id_project}}');
      roi_base_b_print('{{$id_project}}');

      roi_base_a_ene_prod('{{$id_project}}','{{$costo_base}}','{{$costo_a}}');
      roi_base_b_ene_prod('{{$id_project}}','{{$costo_base}}','{{$costo_b}}');
      roi_base_a_ene_prod_print('{{$id_project}}','{{$costo_base}}','{{$costo_a}}');
      roi_base_b_ene_prod_print('{{$id_project}}','{{$costo_base}}','{{$costo_b}}');
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
  width:400,
  height:230,
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
  width:400,
  height:230,
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
  width:400,
  height:230,
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

function confort_base(val_conf){
    $val_ini = 1;
    $val_fin = 1.125;
    for (let i = 1; i <= 32; i++) {
        if(val_conf >= $val_ini && val_conf < $val_fin){

            $("#val_base_"+i).removeClass('hidden');
        }
        $val_ini = $val_ini + 0.125;
        $val_fin = $val_fin + 0.125;
    }
}

function confort_a(val_conf_a){

    $val_ini_a = 1;
    $val_fin_a = 1.125;
    for (let i = 1; i <= 32; i++) {
        if(val_conf_a >= $val_ini_a && val_conf_a < $val_fin_a){

            $("#val_base_"+i+"_a").removeClass('hidden');
        }

        if(val_conf_a > 5){

            $("#val_base_32_a").removeClass('hidden');
        }

        $val_ini_a = $val_ini_a + 0.125;
        $val_fin_a = $val_fin_a + 0.125;
    }


}

function confort_b(val_conf_b){
    $val_ini_b = 1;
    $val_fin_b = 1.125;
    for (let i = 1; i <= 33; i++) {
        if(val_conf_b >= $val_ini_b && val_conf_b < $val_fin_b){

            $("#val_base_"+i+"_b").removeClass('hidden');
        }

        if(val_conf_b > 5){

            $("#val_base_32_b").removeClass('hidden');
        }
        $val_ini_b = $val_ini_b + 0.125;
        $val_fin_b = $val_fin_b + 0.125;
    }


/* alert(val_conf_b); */
}



function chart_prod_base() {
        var check_prod = '{{$conf_val_base}}';
        var mult_cels_val = check_prod * 5;
        var val_res = mult_cels_val / 5;
        var interpolacion = interp(check_prod);

        var message = message_prod_lab_chart(interpolacion);

            // JS
            var chart = JSC.chart('chart_prod_base', {
            debug: true,
            type: 'gauge ',
            legend_visible: false,
            chartArea_boxVisible: false,
            width:300,
            height:250,
            box:{
                fill:'white',
            },
            xAxis: {
                /*Used to position marker on top of axis line.*/
                scale: { range: [0, 1], invert: true },

            },
            palette: {
                pointValue: '%yValue',
                ranges: [
                { value: 5, color: '#21D683' },
                { value: 10, color: '#FFD221' },
                { value: 20, color: '#FF5353' },
                { value: [23, 25], color: '#FF5353' }
                ]
            },
            yAxis: {
                defaultTick: { padding: 13, enabled: false },
                customTicks: [5,10,15,20,25],
                line: {
                width: 15,
                breaks_gap: 0.03,
                color: 'smartPalette'
                },
                scale: { range: [5, 25],
                invert: true
                 }
            },
            defaultSeries: {
                opacity: 1,
                shape: {
                label: {
                    align: 'center',
                    verticalAlign: 'middle'
                }
                }
            },
            series: [
                {
                type: 'marker',
                name: 'Score',
                shape_label: {
                    text:
                    parseFloat(interpolacion).toFixed(1)+'%'+'<br/> <span style="fontSize: 35">'+message+'</span>',
                    style: { fontSize: 48 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                        width: 10,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 30
                    }
                },
                points: [[1, parseFloat(interpolacion)]]
                }
            ]
            });

      }

      function chart_prod_a() {
        var check_prod_a = '{{$conf_val_a}}';
        var interpolacion = interp(check_prod_a);
        /*     var check_prod_a = '{{$conf_val_a}}';
        var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['A', parseFloat(check_prod_a)],
        ]);


        var options = {
  width: 650, height: 320,
  greenFrom:3.8,greenTo:5,
  redFrom: 1, redTo: 2.2,
  yellowFrom:2.2, yellowTo: 3.8,
  minorTicks: 5,
  max:5,
  min:1,
};

var chart = new google.visualization.Gauge(document.getElementById('chart_prod_a'));

chart.draw(data, options); */
            // JS
            var message = message_prod_lab_chart(interpolacion);
            var chart = JSC.chart('chart_prod_a', {
            debug: true,
            type: 'gauge ',
            legend_visible: false,
            width:300,
            height:250,
            chartArea_boxVisible: false,
            box:{
                fill:'white',
            },
            xAxis: {
                /*Used to position marker on top of axis line.*/
                 scale: { range: [0, 1], invert: true },
            },
            palette: {
                pointValue: '%yValue',
                ranges: [
                    { value: 5, color: '#21D683' },
                { value: 10, color: '#FFD221' },
                { value: 20, color: '#FF5353' },
                { value: [23, 25], color: '#FF5353' }
                ]
            },
            yAxis: {
                defaultTick: { padding: 13, enabled: false },
               customTicks: [5,10,15,20,25],
                line: {
                width: 15,
                breaks_gap: 0.03,
                color: 'smartPalette'
                },
               scale: { range: [5, 25],
                invert: true},
            },
            defaultSeries: {
                opacity: 1,
                shape: {
                label: {
                    align: 'center',
                    verticalAlign: 'middle'
                }
                }
            },
            series: [
                {
                type: 'marker',
                name: 'Score',
                shape_label: {
                    text:
                    parseFloat(interpolacion).toFixed(1)+'%'+'<br/> <span style="fontSize: 35">'+message+'</span>',
                    style: { fontSize: 48 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                        width: 10,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 30
                    }
                },
                points: [[1, parseFloat(interpolacion)]]
                }
            ]
            });
}



function chart_prod_b() {
    var check_prod_b = '{{$conf_val_b}}';

    var interpolacion = interp(check_prod_b);
    var message = message_prod_lab_chart(interpolacion);

/* var data = google.visualization.arrayToDataTable([
  ['Label', 'Value'],
  ['B', parseFloat(check_prod_b)],
]);


    var options = {
  width: 650, height: 320,
  greenFrom:3.8,greenTo:5,
  redFrom: 1, redTo: 2.2,
  yellowFrom:2.2, yellowTo: 3.8,
  minorTicks: 5,
  max:5,
  min:1,
};

var chart = new google.visualization.Gauge(document.getElementById('chart_prod_b'));

chart.draw(data, options); */
            // JS
            var chart = JSC.chart('chart_prod_b', {
            debug: true,
            type: 'gauge ',
            legend_visible: false,
            width:300,
            height:250,
            chartArea_boxVisible: false,
            box:{
                fill:'white',
            },
            xAxis: {
                /*Used to position marker on top of axis line.*/
              scale: { range: [0, 1], invert: true },
            },
            palette: {
                pointValue: '%yValue',
                ranges: [
                   { value: 5, color: '#21D683' },
                { value: 10, color: '#FFD221' },
                { value: 20, color: '#FF5353' },
                { value: [23, 25], color: '#FF5353' }
                ]
            },
            yAxis: {
                defaultTick: { padding: 13, enabled: false },
                 customTicks: [5,10,15,20,25],
                line: {
                width: 15,
                breaks_gap: 0.03,
                color: 'smartPalette'
                },
               scale: { range: [5, 25],
                invert: true},
            },
            defaultSeries: {
                opacity: 1,
                shape: {
                label: {
                    align: 'center',
                    verticalAlign: 'middle'
                }
                }
            },
            series: [
                {
                type: 'marker',
                name: 'Score',
                shape_label: {
                    text:
                    parseFloat(interpolacion).toFixed(1)+'%'+'<br/> <span style="fontSize: 35">'+message+'</span>',
                    style: { fontSize: 48 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                        width: 10,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 30
                    }
                },
                points: [[1, parseFloat(interpolacion)]]
                }
            ]
            });
}



function cap_op_1_retro(id_project,unidad){

$.ajax({
    type: 'get',
    url: "/cap_op_1_retro/" + id_project,
    success: function (res) {
        var options = {
      series: [{
      name: 'CAPEX',
      data: [res[2][0], res[1][0], res[0][0]]
    },{
       name: ener_lang + ' OPEX',
      data: [res[2][1], res[1][1], res[0][1]]
    },{
        name: man_lang + ' OPEX',
      data: [res[2][2], res[1][2], res[0][2]]
    }],
      chart: {
      type: 'bar',
      height: 350,
      stacked: true,
      stackType: 'normal',
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
     },

     toolbar: {
        show: false,
    },

    },
    plotOptions: {
      bar: {
        horizontal: true,

      },
    },
    dataLabels: {
            enabled: true,
            style: {
            fontSize: '16px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: 'bold',
        },
    },
    title: {
      text: '1 Año',
      align: 'center',
      offsetY:25,
      style: {
        fontWeight:  'bold',
        fontSize: '24px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-yaxis-label',
        color: '#000',
      },
    },
    xaxis: {
      categories: ['Solución B', 'Solución A', 'Sistema Existente'],
      labels: {
            style: {
                colors: [],
                fontSize: '14px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: "bold",
                cssClass: 'apexcharts-yaxis-label',
            },
        },
    },
    yaxis: {
        labels: {
            style: {
                colors: [],
                fontSize: '16px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: "bold",
                cssClass: 'apexcharts-yaxis-label',
            },
        },
    },

    tooltip: {
      y: {
        formatter: function (val) {
            if(unidad == 'mc'){
                return val + "$/m²"
            }

            if(unidad == 'ft'){
                return val + "$/ft²"
            }
        }
      }
    },
    fill: {
      opacity: 1,
      colors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C'],

    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      offsetX: 40,
      fontSize: '14px',
      fontFamily: 'ABeeZee, sans-serif',
      fontWeight: 'bold',
      markers: {
      width: 12,
      height: 12,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C'],
      radius: 12,
      customHTML: undefined,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0,
  },
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
    },
    error: function (responsetext) {
        console.log(responsetext);
    }
});

}

function cap_op_3_retro(id_project,unidad){
    $.ajax({
        type: 'get',
        url: "/cap_op_3_retro/" + id_project,
        success: function (res) {

            var options = {
          series: [{
          name: 'CAPEX',
          data: [res[2][0], res[1][0], res[0][0]]
        },{
          name: ener_lang + ' OPEX',
          data: [res[2][1], res[1][1], res[0][1]]
        },{
          name: man_lang + ' OPEX',
          data: [res[2][2], res[1][2], res[0][2]]
        }],
          chart: {
          type: 'bar',
          height: 350,
          stacked: true,
          stackType: 'normal',
          dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            },
          toolbar: {
            show: false,
            },
        },
        plotOptions: {
          bar: {
            horizontal: true,
          },
        },
        dataLabels: {
                enabled: true,
                style: {
                fontSize: '16px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: 'bold',
            },
        },
        title: {
            text: '3 Años',
            align: 'center',
            offsetY:25,
            style: {
            fontSize: '24px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: "bold",
            cssClass: 'apexcharts-yaxis-label',
            color: '#000',
          },
        },
        xaxis: {
          categories: ['Solución B', 'Solución A', 'Sistema Existente'],
          labels: {
                style: {
                    colors: [],
                    fontSize: '14px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: [],
                    fontSize: '16px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',

                },
            },
        },
        tooltip: {
          y: {
            formatter: function (val) {
                if(unidad == 'mc'){
                    return val + "$/m²"
                }

                if(unidad == 'ft'){
                    return val + "$/ft²"
                }
            }
          }
        },
        fill: {
          opacity: 1,
          colors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C']
        },
        legend: {
          position: 'top',
          horizontalAlign: 'left',
          offsetX: 40,
          fontSize: '14px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 12,
          height: 12,
          strokeWidth: 0,
          strokeColor: '#fff',
          fillColors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C'],
          radius: 12,
          customHTML: undefined,
          onClick: undefined,
          offsetX: 0,
          offsetY: 0,
      },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart_3"), options);
        chart.render();

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });

}

function roi_base_a(id_project){
    var dif_1_cost = document.getElementById('dif_cost_base_a').value;
    var inv_ini_2 = document.getElementById('inv_ini_2').value;

    $.ajax({
        type: 'get',
        url: "/roi_base_a_retro_new/" + id_project + '/' + dif_1_cost + '/' + inv_ini_2,
        success: function (res) {


            //console.log(res);
    var options = {
          series: [
          {
            name: "ROI - A",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
          height: 350,
          width: 600,
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
           categories: [3,5,10,15],
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_a"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function roi_base_b(id_project){
    var dif_2_cost = document.getElementById('dif_cost_base_b').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;

    $.ajax({
        type: 'get',
        url: "/roi_base_a_retro_new/" + id_project + '/' + dif_2_cost + '/' + inv_ini_3,
        success: function (res) {

    var options = {
          series: [
          {
            name: "ROI - B",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "MARR",
             data: [45, 75, 150, 225]
          }
        ],
          chart: {
          height: 350,
          width: 600,
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
           categories: [3,5,10,15],
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_b"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function roi_base_a_ene_prod(id_project,costo_base,costo){
    var dif_1_cost = document.getElementById('dif_cost_base_a').value;
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    $.ajax({
        type: 'get',
        url: "/roi_base_a_retro_ene_prod/" + id_project + '/' + dif_1_cost + '/' + inv_ini_2 +'/'+ costo_base +'/'+ costo,
        success: function (res) {


            //console.log(res);
    var options = {
          series: [
          {
            name: "ROI - A",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
          height: 350,
          width: 600,
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
           categories: [3,5,10,15],
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_a_ene_prod"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function roi_base_b_ene_prod(id_project,costo_base,costo){
    var dif_2_cost = document.getElementById('dif_cost_base_b').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;

    $.ajax({
        type: 'get',
        url: "/roi_base_a_retro_ene_prod/" + id_project + '/' + dif_2_cost + '/' + inv_ini_3 +'/'+ costo_base +'/'+ costo,
        success: function (res) {

    var options = {
          series: [
          {
            name: "ROI - B",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "MARR",
            data:  [45, 75, 120, 225]
          }
        ],
          chart: {
          height: 350,
          width: 600,
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
           categories: [3,5,10,15],
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_b_ene_prod"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
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
  width:300,
  height:190,
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
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="15px">Kwh/m²</span>',
        style_fontSize: '25px',
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
  width:300,
  height:190,
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
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="15px">Kwh/m²</span>',
        style_fontSize: '25px',
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
  width:300,
  height:190,
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
          '<span color="%color">'+result_area.toFixed(2)+'</span><br/><span color="#696969" fontSize="15px">Kwh/m²</span>',
        style_fontSize: '25px',
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
                width: 580, height: 250,
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
                width: 580, height: 250,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 300,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }


        var chart = new google.visualization.Gauge(document.getElementById('eui_sol_base_print'));

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
                width: 580, height: 250,
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
                width: 580, height: 250,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 300,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:300,
          min:1,
        };
        }

        var chart = new google.visualization.Gauge(document.getElementById('eui_sol_a_print'));

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
                        width: 580, height: 250,
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
                        width: 580, height: 250,
                greenFrom:1,greenTo:energy,
                redFrom: ashrae, redTo: 300,
                yellowFrom:energy, yellowTo: ashrae,
                minorTicks: 5,
                max:300,
                min:1,
                };
                }

            var chart = new google.visualization.Gauge(document.getElementById('eui_sol_b_print'));

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
          height: 280,
          width:480,
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
            fontSize: '25px',
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
            height: 280,
            width:480,
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

function chart_prod_base_print() {
        var check_prod = '{{$conf_val_base}}';
        var mult_cels_val = check_prod * 5;
        var val_res = mult_cels_val / 5;

        var message = message_prod_lab_chart(check_prod);

            // JS
            var chart = JSC.chart('chart_prod_base', {
            debug: true,
            type: 'gauge ',
            legend_visible: false,
            chartArea_boxVisible: false,
            width:300,
            height:220,
            box:{
                fill:'white',
            },
            xAxis: {
                /*Used to position marker on top of axis line.*/
                scale: { range: [0, 1], invert: true }
            },
            palette: {
                pointValue: '%yValue',
                ranges: [
                { value: 1, color: '#FF5353' },
                { value: 2, color: '#FFD221' },
                { value: 4, color: '#77E6B4' },
                { value: [4.5, 5], color: '#21D683' }
                ]
            },
            yAxis: {
                defaultTick: { padding: 13, enabled: false },
                customTicks: [1,2, 3, 4,5],
                line: {
                width: 15,
                breaks_gap: 0.03,
                color: 'smartPalette'
                },
                scale: { range: [1, 5] }
            },
            defaultSeries: {
                opacity: 1,
                shape: {
                label: {
                    align: 'center',
                    verticalAlign: 'middle'
                }
                }
            },
            series: [
                {
                type: 'marker',
                name: 'Score',
                shape_label: {
                    text:
                    parseFloat(check_prod).toFixed(2)+'<br/> <span style="fontSize: 25">'+message+'</span>',
                    style: { fontSize: 38 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                        width: 10,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 25
                    }
                },
                points: [[1, parseFloat(check_prod)]]
                }
            ]
            });

      }

      function chart_prod_a_print() {
        var check_prod_a = '{{$conf_val_a}}';
        /*     var check_prod_a = '{{$conf_val_a}}';
        var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['A', parseFloat(check_prod_a)],
        ]);


        var options = {
  width: 650, height: 320,
  greenFrom:3.8,greenTo:5,
  redFrom: 1, redTo: 2.2,
  yellowFrom:2.2, yellowTo: 3.8,
  minorTicks: 5,
  max:5,
  min:1,
};

var chart = new google.visualization.Gauge(document.getElementById('chart_prod_a'));

chart.draw(data, options); */
            // JS
            var message = message_prod_lab_chart(check_prod_a);
            var chart = JSC.chart('chart_prod_a', {
            debug: true,
            type: 'gauge ',
            legend_visible: false,
            width:300,
            height:220,
            chartArea_boxVisible: false,
            box:{
                fill:'white',
            },
            xAxis: {
                /*Used to position marker on top of axis line.*/
                scale: { range: [0, 1], invert: true }
            },
            palette: {
                pointValue: '%yValue',
                ranges: [
                    { value: 1, color: '#FF5353' },
                    { value: 2, color: '#FFD221' },
                    { value: 4, color: '#77E6B4' },
                    { value: [4.5, 5], color: '#21D683' }
                ]
            },
            yAxis: {
                defaultTick: { padding: 13, enabled: false },
                customTicks: [1,2, 3, 4,5],
                line: {
                width: 15,
                breaks_gap: 0.03,
                color: 'smartPalette'
                },
                scale: { range: [1, 5] }
            },
            defaultSeries: {
                opacity: 1,
                shape: {
                label: {
                    align: 'center',
                    verticalAlign: 'middle'
                }
                }
            },
            series: [
                {
                type: 'marker',
                name: 'Score',
                shape_label: {
                    text:
                    parseFloat(check_prod_a).toFixed(2)+'<br/> <span style="fontSize: 25">'+message+'</span>',
                    style: { fontSize: 38 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                        width: 10,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 25
                    }
                },
                points: [[1, parseFloat(check_prod_a)]]
                }
            ]
            });
}



function chart_prod_b_print() {
    var check_prod_b = '{{$conf_val_b}}';
    var message = message_prod_lab_chart(check_prod_b);
/* var data = google.visualization.arrayToDataTable([
  ['Label', 'Value'],
  ['B', parseFloat(check_prod_b)],
]);


    var options = {
  width: 650, height: 320,
  greenFrom:3.8,greenTo:5,
  redFrom: 1, redTo: 2.2,
  yellowFrom:2.2, yellowTo: 3.8,
  minorTicks: 5,
  max:5,
  min:1,
};

var chart = new google.visualization.Gauge(document.getElementById('chart_prod_b'));

chart.draw(data, options); */
            // JS
            var chart = JSC.chart('chart_prod_b', {
            debug: true,
            type: 'gauge ',
            legend_visible: false,
            width:300,
            height:220,
            chartArea_boxVisible: false,
            box:{
                fill:'white',
            },
            xAxis: {
                /*Used to position marker on top of axis line.*/
                scale: { range: [0, 1], invert: true }
            },
            palette: {
                pointValue: '%yValue',
                ranges: [
                    { value: 1, color: '#FF5353' },
                    { value: 2, color: '#FFD221' },
                    { value: 4, color: '#77E6B4' },
                    { value: [4.5, 5], color: '#21D683' }
                ]
            },
            yAxis: {
                defaultTick: { padding: 13, enabled: false },
                customTicks: [1,2, 3, 4,5],
                line: {
                width: 15,
                breaks_gap: 0.03,
                color: 'smartPalette'
                },
                scale: { range: [1, 5] }
            },
            defaultSeries: {
                opacity: 1,
                shape: {
                label: {
                    align: 'center',
                    verticalAlign: 'middle'
                }
                }
            },
            series: [
                {
                type: 'marker',
                name: 'Score',
                shape_label: {
                    text:
                    parseFloat(check_prod_b).toFixed(2)+'<br/> <span style="fontSize: 25">'+message+'</span>',
                    style: { fontSize: 38 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                        width: 10,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 25
                    }
                },
                points: [[1, parseFloat(check_prod_b)]]
                }
            ]
            });
}

function cap_op_1_retro_print(id_project,unidad){

$.ajax({
    type: 'get',
    url: "/cap_op_1_retro/" + id_project,
    success: function (res) {
        var options = {
      series: [{
      name: 'CAPEX',
      data: [res[2][0], res[1][0], res[0][0]]
    },{
       name: ener_lang + ' OPEX',
      data: [res[2][1], res[1][1], res[0][1]]
    },{
        name: man_lang + ' OPEX',
      data: [res[2][2], res[1][2], res[0][2]]
    }],
      chart: {
      type: 'bar',
      height: 270,
      width: 500,
      stacked: true,
      stackType: 'normal',
      dropShadow: {
        enabled: true,
        enabledOnSeries: undefined,
     },

     toolbar: {
        show: false,
    },

    },
    plotOptions: {
      bar: {
        horizontal: true,

      },
    },
    dataLabels: {
            enabled: true,
            style: {
            fontSize: '16px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: 'bold',
        },
    },
    title: {
      text: '1 Año',
      align: 'center',
      offsetY:25,
      style: {
        fontWeight:  'bold',
        fontSize: '24px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-yaxis-label',
        color: '#000',
      },
    },
    xaxis: {
      categories: ['Solución B', 'Solución A', 'Sistema Existente'],
      labels: {
            style: {
                colors: [],
                fontSize: '14px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: "bold",
                cssClass: 'apexcharts-yaxis-label',
            },
        },
    },
    yaxis: {
        labels: {
            style: {
                colors: [],
                fontSize: '16px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: "bold",
                cssClass: 'apexcharts-yaxis-label',
            },
        },
    },

    tooltip: {
      y: {
        formatter: function (val) {
            if(unidad == 'mc'){
                return val + "$/m²"
            }

            if(unidad == 'ft'){
                return val + "$/ft²"
            }
        }
      }
    },
    fill: {
      opacity: 1,
      colors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C'],

    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      offsetX: 40,
      fontSize: '14px',
      fontFamily: 'ABeeZee, sans-serif',
      fontWeight: 'bold',
      markers: {
      width: 12,
      height: 12,
      strokeWidth: 0,
      strokeColor: '#fff',
      fillColors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C'],
      radius: 12,
      customHTML: undefined,
      onClick: undefined,
      offsetX: 0,
      offsetY: 0,
  },
    }
    };

    var chart = new ApexCharts(document.querySelector("#chart_print"), options);
    chart.render();
    },
    error: function (responsetext) {
        console.log(responsetext);
    }
});

}

function cap_op_3_retro_print(id_project,unidad){
    $.ajax({
        type: 'get',
        url: "/cap_op_3_retro/" + id_project,
        success: function (res) {

            var options = {
          series: [{
          name: 'CAPEX',
          data: [res[2][0], res[1][0], res[0][0]]
        },{
          name: ener_lang + ' OPEX',
          data: [res[2][1], res[1][1], res[0][1]]
        },{
          name: man_lang + ' OPEX',
          data: [res[2][2], res[1][2], res[0][2]]
        }],
          chart: {
          type: 'bar',
          height: 270,
          width: 500,
          stacked: true,
          stackType: 'normal',
          dropShadow: {
            enabled: true,
            enabledOnSeries: undefined,
            },
          toolbar: {
            show: false,
            },
        },
        plotOptions: {
          bar: {
            horizontal: true,
          },
        },
        dataLabels: {
                enabled: true,
                style: {
                fontSize: '16px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: 'bold',
            },
        },
        title: {
            text: '3 Años',
            align: 'center',
            offsetY:25,
            style: {
            fontSize: '24px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: "bold",
            cssClass: 'apexcharts-yaxis-label',
            color: '#000',
          },
        },
        xaxis: {
          categories: ['Solución B', 'Solución A', 'Sistema Existente'],
          labels: {
                style: {
                    colors: [],
                    fontSize: '14px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: [],
                    fontSize: '16px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',

                },
            },
        },
        tooltip: {
          y: {
            formatter: function (val) {
                if(unidad == 'mc'){
                    return val + "$/m²"
                }

                if(unidad == 'ft'){
                    return val + "$/ft²"
                }
            }
          }
        },
        fill: {
          opacity: 1,
          colors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C']
        },
        legend: {
          position: 'top',
          horizontalAlign: 'left',
          offsetX: 40,
          fontSize: '14px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 12,
          height: 12,
          strokeWidth: 0,
          strokeColor: '#fff',
          fillColors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C'],
          radius: 12,
          customHTML: undefined,
          onClick: undefined,
          offsetX: 0,
          offsetY: 0,
      },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart_3_print"), options);
        chart.render();

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });

}

function roi_base_a_print(id_project){
    var dif_1_cost = document.getElementById('dif_cost_base_a').value;
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    $.ajax({
        type: 'get',
        url: "/roi_base_a_retro_new/" + id_project + '/' + dif_1_cost + '/' + inv_ini_2,
        success: function (res) {


            //console.log(res);
    var options = {
          series: [
          {
            name: "ROI - A",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
            height: 250,
            width:480,
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
            categories: [3,5,10,15],
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_a_print"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function roi_base_b_print(id_project){
    var dif_2_cost = document.getElementById('dif_cost_base_b').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;

    $.ajax({
        type: 'get',
        url: "/roi_base_a_retro_new/" + id_project + '/' + dif_2_cost + '/' + inv_ini_3,
        success: function (res) {

    var options = {
          series: [
          {
            name: "ROI - B",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "MARR",
             data: [45, 75, 150, 225]
          }
        ],
          chart: {
            height: 250,
            width:480,
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
            categories: [3,5,10,15],
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_b_print"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function roi_base_a_ene_prod_print(id_project,costo_base,costo){
    var dif_1_cost = document.getElementById('dif_cost_base_a').value;
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    $.ajax({
        type: 'get',
        url: "/roi_base_a_retro_ene_prod/" + id_project + '/' + dif_1_cost + '/' + inv_ini_2 +'/'+ costo_base +'/'+ costo,
        success: function (res) {


            //console.log(res);
    var options = {
          series: [
          {
            name: "ROI - A",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
            height: 250,
            width:480,
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
           categories: [3,5,10,15],
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_a_ene_prod_print"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function roi_base_b_ene_prod_print(id_project,costo_base,costo){
    var dif_2_cost = document.getElementById('dif_cost_base_b').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
    $.ajax({
        type: 'get',
        url: "/roi_base_a_retro_ene_prod/" + id_project + '/' + dif_2_cost + '/' + inv_ini_3 +'/'+ costo_base +'/'+ costo,
        success: function (res) {

    var options = {
          series: [
          {
            name: "ROI - B",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
            height: 250,
            width:480,
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
            categories: [3,5,10,15],
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_b_ene_prod_print"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function interp(conf_val){

    if(conf_val > 0){
        if(conf_val > 1 && conf_val < 2){
            var porcent_check1 = 0.25;
            var porcent_check2 = 0.20;
            var porcent_point1 = 1;
            var porcent_point2 = 2;
            }

            if(conf_val > 2 && conf_val < 3){
            var porcent_check1 = 0.20;
            var porcent_check2 = 0.15;
            var porcent_point1 = 2;
            var porcent_point2 = 3;
            }

            if(conf_val > 3 && conf_val < 4){
            var porcent_check1 = 0.15;
            var porcent_check2 = 0.10;
            var porcent_point1 = 3;
            var porcent_point2 = 4;
            }

            if(conf_val > 4 && conf_val < 5){
            var porcent_check1 = 0.10;
            var porcent_check2 = 0.05;
            var porcent_point1 = 4;
            var porcent_point2 = 5;
            }

            //porcent_check1% + ((3.76-3) / (4 - 3)) x (porcent_check2% - porcent_check1%)

            //((3.76-3) / (4 - 3))

            //(3.76-porcent_point1)
            var trespuntosiete_m_point1 = conf_val-porcent_point1;
            //(porcent_point2 - porcent_point1)
            var porcent_point2_m_porcent_point1 = porcent_point2 - porcent_point1;
            //(3.76-porcent_point1) / (porcent_point2 - porcent_point1)
            var div_porcents_poins = trespuntosiete_m_point1 / porcent_point2_m_porcent_point1;


            //(porcent_check2% - porcent_check1%)
            var porcent_check2_m_porcent_check1 =  porcent_check2 - porcent_check1;

            //((3.76-3) / (4 - 3)) x (porcent_check2% - porcent_check1%)
            //div_porcents_poins x porcent_check2_m_porcent_check1
            var mult_divporcentpoints_res_porsents_checks = div_porcents_poins * porcent_check2_m_porcent_check1;

            //porcent_check1% + ((3.76-3) / (4 - 3)) x (porcent_check2% - porcent_check1%)
            var sum_resultd = porcent_check1 + mult_divporcentpoints_res_porsents_checks;

            //porcent
            var result = sum_resultd * 100;

            return result.toFixed(1);
    }


    if(conf_val == 0){
        return 0;
    }



}

function message_prod_lab_chart(check_prod){

if(check_prod == 0){
var message = '';
}

if(check_prod > 20 && check_prod <= 25){
var message = 'Mala';
}

if(check_prod > 10 && check_prod <= 20){
    var message = 'Regular';
}

if(check_prod > 5 && check_prod <= 10){
    var message = 'Buena';
}
return message;
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

