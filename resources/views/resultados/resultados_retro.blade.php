
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
@inject('capacidad_sol','app\Http\Controllers\ResultadosController')
@inject('capacidad_sol','app\Http\Controllers\ResultadosController')
@inject('red_ene','app\Http\Controllers\ResultadosController')
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
   <link rel="stylesheet" href="{{asset("assets/css/result_retro.css")}}">
    <style>


    </style>
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<?php  $tar_ele=$solutions->tar_elec($id_project) ?>
<?php  $kwh_yr=$results->kwh_yr($id_project,$tar_ele->cad_edi) ?>

{{-- navbar --}}
<div id="navbar"  name="navbar" class="bg-blue-900 w-full flex justify-center" style="background-color:#1B17BB ;">
    <div class="w-1/3 flex h-full">
        <a><img src="{{asset('/assets/images/Logotipo-HVACOPCOST_blanco.png')}}" alt="hvacopcost latinoamérica" style="max-height: 100px; width:230px;"></a>
        <h1 style=" font-size: 4.3rem;" class="text-white font-roboto" >3.0</h1>
    </div>
    <div class=" w-1/3 flex justify-center" style="line-height: 30px; height:99px;">
        {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}


    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-end h-1/3">
    {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
    <button class="bg-orange-500  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='/edit_project/{{$id_project}}'"><p class="mx-1">{{ __('index.edit_proj') }}</p></button>

    {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
{{--     <button title="Ver PDF" class="bg-blue-600 mx-1 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 p-2" target="_blank" onclick="window.open('/generatePDF/{{$id_project}}', '_blank');" ><i class="fa-solid fa-file-pdf text-2xl text-red-600"></i></button>
 --}}
 <button title="Ver PDF" class="bg-blue-600 mx-1 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 p-2" target="_blank" onclick="send_print();" ><i class="fa-solid fa-file-pdf text-2xl text-red-600"></i></button>
    <button class="bg-blue-600  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 " onclick="window.location.href='/home'">Nuevo Proyecto</button>

    </div>
</div>
{{-- navbar --}}
@include('modal_loding')
{{-- caja_principal --}}
<div id="caja_principal" name="caja_principal" class="hidden">
{{-- principal --}}
<div class="w-full grid rounded-md justify-items-center mt-3">
    <div  class="ancho border-2 border-blue-500 rounded-md flex">


        <div class="w-1/4 flex justify-center">
            <img src="{{asset('assets/images/Logotipo-HVACOPCOST.png')}}" alt="hvacopcost latinoamérica" class="img_porject mx-2">
        </div>

        <div class="w-1/3 grid justify-left ml-2">
            <div class="w-full flex ">
               <div id="name_no_print" name="name_no_print" class="w-full flex ">
                    <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project_res">{{$tar_ele->name }}</p>
               </div>

               <div id="name_print" name="name_print" class="hidden w-full flex ">
                <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project_res">
                    @if (strlen($tar_ele->name) > 21)
                    {{substr($tar_ele->name, 0, 21)}}...
                    @endif

                    @if (strlen($tar_ele->name) < 21)
                    {{$tar_ele->name}}
                    @endif
                    </p>
               </div>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.categoria edificio') }}:</label><p class="info_project_res">{{$tar_ele->cad_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.tipo edificio') }}:</label><p class="info_project_res">{{$tar_ele->tipo_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.area') }}:</label><p class="info_project_res">{{number_format($tar_ele->area)}}
                    @if ($tar_ele->unidad == 'mc')
                    m²
                @endif

                @if ($tar_ele->unidad == 'ft')
                ft²
                @endif
                </p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.ocupacion semanal') }}:</label><p class="info_project_res">
                @switch($tar_ele->hrs_tiempo)
                    @case(30)
                        {{ __('index.menos de 50 hrs') }}.
                    @break

                    @case(80)
                        {{ __('index.51 a 167 hrs') }}.
                    @break

                    @case(168)
                        168 Hrs.
                    @break

                    @default

                @endswitch
                    </p>
            </div>
        </div>

        <div class="w-1/3 grid justify-left">
            <div class="w-full">
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.region') }}:</label><p class="info_project_res">{{$tar_ele->region}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.ciudad') }}:</label><p class="info_project_res">{{$tar_ele->ciudad}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.hors_enft_anual') }}:</label><p class="info_project_res">&nbsp;{{number_format($tar_ele->coolings_hours)}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.tar_ele') }}:</label><p class="info_project_res">{{$tar_ele->costo_elec}} $/Kwh</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.incremento anual energia') }}:</label><p class="info_project_res">{{$tar_ele->inflacion}}%</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="margin_new_page w-full grid rounded-md justify-items-center mt-3">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">Capacidad Térmica (TR) e Inversión</p>
            </div>

            <div class="flex w-full justify-center my-2">
                <div class="w-1/7 grid justify-items-center">
                    <div class="place-content-center">
                        <img src="{{asset('assets/images/cap_term.PNG')}}" style="margin-top:2rem;" class="img_tr mx-2 margin_top_cap_term">
                    </div>
                </div>

                    <div class="w-1/3 grid justify-items-start gap-y-2">
                                <label style="margin-left:60px;" class="solucions_style_name  font-bold">Existente</label>
                                <?php  $capacidad1=$smasolutions->sumacap_term($id_project,1) ?>
                                <p style="" class="cant_2_l font-bold font-roboto">{{$capacidad1}}</p>
                    </div>

                    <div class="w-1/3 grid justify-items-center gap-y-2">
                        <?php  $capacidad2=$smasolutions->sumacap_term($id_project,2) ?>
                            <label style="margin-right:100px;" class="solucions_style_name  font-bold">A</label>
                            <p  style="margin-right:100px;" class="cant_2 font-bold font-roboto">{{number_format($capacidad2)}}</p>
                    </div>


                    <div class="w-1/3 grid justify-items-center gap-y-2">

                                <label class="solucions_style_name  font-bold">B</label>
                            <?php  $capacidad3=$smasolutions->sumacap_term($id_project,3) ?>
                                <p style="" class="cant_2 font-bold font-roboto">{{$capacidad3}}</p>

                        </div>
                    </div>
                </div>

                <div class="w-full grid">
                    <div class="flex w-full justify-center my-2">
                        <div class="w-auto grid justify-items-center">
                            <div class="grid">
                                <img style="margin-top:5px;" src="{{asset('assets/images/capex.png')}}" class="img_tr mx-2">
                            </div>
                        </div>

                        <div class="w-1/3 grid justify-items-start gap-y-2">
                            <?php  $result1=$results->result_1($id_project,1) ?>
                                    @if ($result1 ==! null)
                                    <?php  $sumaopex_1=$smasolutions->sumaopex($id_project,$result1->num_enf) ?>
                                    <?php  $sumacap_term_1=$smasolutions->sumacap_term($id_project,$result1->num_enf) ?>
                                    <?php  $unid_med_1=$smasolutions->unid_med($id_project,$result1->num_enf) ?>
                                    <?php  $result_area_1=$results->result_area($id_project,$sumaopex_1) ?>
                                    <?php  $inv_ini_1=$smasolutions->inv_ini($id_project,$result1->num_enf) ?>
                                     <input type="number" class="hidden" id="inv_ini_1" name="inv_ini_1" value="{{$inv_ini_1}}">
                                    @elseif($result1 === null)
                                    <?php $sumaopex_1=0?>
                                    <?php $sumacap_term_1=0?>
                                     <?php $unid_med_1=""?>
                                     <?php  $result_area_1=0 ?>
                                     <?php $inv_ini_1=0?>
                                     <input type="number" class="hidden" id="inv_ini_1" name="inv_ini_1" value="{{$inv_ini_1}}">
                                    @endif
                            <p class="capex_a font-bold font-roboto">${{number_format($inv_ini_1)}}</p>
                        </div>

                        <div class="w-1/3 grid justify-items-center gap-y-2">
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
                            <p  style="margin-right:80px;" class="font-bold font-roboto cant_2">${{number_format($inv_ini_2)}}</p>
                        </div>

                        <div class="w-1/3 grid justify-items-start gap-y-2">
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
                            <p style="margin-left:80px;" class="cant_2 font-bold font-roboto">${{number_format($inv_ini_3)}}</p>
                        </div>

                    </div>
                </div>

        </div>
    </div>
</div>
{{-- Counsumo energia electrica --}}
<div class="w-full grid rounded-md justify-items-center mt-3">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">Consumo Anual Energía Eléctrica</p>
            </div>
        </div>

        <div class="w-full flex justify-center  mt-10">
            <div class="grid w-1/3">

                <div class="flex w-full ">
                        <div class="grid w-full mx-3">
                            <div class="flex justify-center w-full p-2">
                                <div class="grid justify-items-center w-full">

                                    <div class="flex w-full justify-center gap-x-2">
                                        <p class="cant_style">{{number_format($sumaopex_1)}}</p><b class="unit_style">Kwh</b>
                                    </div>

                                    <div class="flex w-full justify-center">
                                        <div id="chart_cons_ene_hvac_ar_base" name="chart_cons_ene_hvac_ar_base" class="js_charts_style">

                                        </div>
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
                                <div class="grid justify-center text-center">
                                    <div class="flex w-full justify-center  gap-x-2">
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
                                <div class="grid justify-center text-center">

                                   <div class="flex w-full justify-center  gap-x-2">
                                        <p class="cant_style">{{number_format($sumaopex_3)}}</p><b class="unit_style">Kwh</b>
                                    </div>
                                     <div id="chart_cons_ene_hvac_ar_b" class="js_charts_style"></div>
                               </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="flex w-full justify-center my-2">
            <div class="w-1/7 grid justify-items-center">
                <div class="place-content-center">
                    <img src="{{asset('assets/images/pesosjpg.jpg')}}" class="img_tr mx-2 mt-5">
                </div>
            </div>

                <div class="w-1/3 grid justify-items-start  mt-8">

                    @if (strlen(number_format($sumaopex_1*$tar_ele->costo_elec)) > 9)
                    <p style="margin-left:13px;" class="cant_style_minim font-bold font-roboto">${{number_format($sumaopex_1*$tar_ele->costo_elec)}}</p>
                    @endif

                    @if (strlen(number_format($sumaopex_1*$tar_ele->costo_elec)) <= 9)
                    <p style="margin-left:50px;" class="cant_style font-bold font-roboto">${{number_format($sumaopex_1*$tar_ele->costo_elec)}}</p>
                    @endif
                </div>

                <div class="w-1/3 grid justify-items-center mt-8">

                    @if (strlen(number_format($sumaopex_2*$tar_ele->costo_elec)) > 9)
                        <p  style="margin-right:100px;" class="cant_style_minim font-bold font-roboto">${{number_format($sumaopex_2*$tar_ele->costo_elec)}}</p>
                    @endif

                    @if (strlen(number_format($sumaopex_2*$tar_ele->costo_elec)) <= 9)
                    <p  style="margin-right:95px;" class="cant_style font-bold font-roboto">${{number_format($sumaopex_2*$tar_ele->costo_elec)}}</p>
                    @endif
                </div>

                <div class="w-1/3 grid justify-items-center mt-8">

                    @if ($sumaopex_3  == 0)
                        <p style="margin-right:40px;" class="cant_style_minim font-bold font-roboto">$0</p>
                    @endif

                    @if ($sumaopex_3 > 0)
                        @if (strlen(number_format($sumaopex_3*$tar_ele->costo_elec)) > 9)
                        <p style="margin-right:30px;" class="cant_style_minim font-bold font-roboto">${{number_format($sumaopex_3*$tar_ele->costo_elec)}}</p>
                        @endif

                        @if (strlen(number_format($sumaopex_3*$tar_ele->costo_elec)) <= 9)
                        <p style="margin-right:75px;" class="cant_style font-bold font-roboto">${{number_format($sumaopex_3*$tar_ele->costo_elec)}}</p>
                        @endif
                    @endif


                </div>
            </div>

            <?php  $results_aux=$results->results($id_project) ?>
            {{-- para graficas red_en y descarb --}}
            @if ($result2 ==! null)
            <?php  $dif_1=$smasolutions->dif_1($id_project,count($results_aux),$tar_ele->costo_elec) ?>
            @endif

            @if ($result2 === null)
            <?php  $dif_1=0; ?>
            @endif

            @if ($result3 ==! null)
            <?php  $dif_2=$smasolutions->dif_2($id_project,count($results_aux),$tar_ele->costo_elec) ?>
            @endif

            @if ($result3 === null)
            <?php $dif_2 = 0; ?>
            @endif

            <?php

$arr_red_ene   = [$sumaopex_1*$tar_ele->costo_elec,$sumaopex_2*$tar_ele->costo_elec,$sumaopex_3*$tar_ele->costo_elec];



    if($result1 ==! null){
    $base_red_an = $sumaopex_1*$tar_ele->costo_elec;
    }else{
    $base_red_an = 0;
    }

  if($result2 ==! null){
    $a_red_an = $sumaopex_2*$tar_ele->costo_elec;
  }else{
    $a_red_an = 0;
  }

  if($result3 ==! null){
    $b_red_an = $sumaopex_3*$tar_ele->costo_elec;
  }else{
    $b_red_an = 0;
  }


  $val_red_an_alt = max($arr_red_ene);
  $counter = 0;
  for ($i=0; $i < count($arr_red_ene) ; $i++) {
    if ($arr_red_ene[$i] ==  $val_red_an_alt) {
        $counter = $i;
    }
  }

  if($counter == 0){

    if($result1 ==! null){
      if($result2 == null && $result3 == null){
          $val_base_red_ene = 0;
      }else{
          $val_base_red_ene =  0;
      }

  }else{
      $val_base_red_ene =  0;
  }




    if($result2 ==! null){
        $val_a_red_ene = $base_red_an - $a_red_an;
    }else{
        $val_a_red_ene = 0;
    }

    if($result3 ==! null){
            $val_b_red_ene = $base_red_an - $b_red_an;
    }else{
            $val_b_red_ene = 0;
    }


  }

  if($counter == 1){
    $val_a_red_ene =  0;
    $val_base_red_ene = $a_red_an - $base_red_an;

    if($result3 ==! null){
        $val_b_red_ene = $a_red_an - $b_red_an;
    }else{
        $val_b_red_ene = 0;
    }


  }

  if($counter == 2){
    if($result3 ==! null){
        $val_b_red_ene =  0;
    }else{
        $val_b_red_ene = 0;
    }

    $val_base_red_ene = $b_red_an - $base_red_an;
    $val_a_red_ene = $b_red_an - $a_red_an;
  }


?>


<div class="w-full grid">
    <div style="background-color:#fff;" class="w-full flex justify-center mt_titles">
        <p style="color:#1B17BB;" class="titulos_style">Reducción Anual del Costo de Energía</p>
    </div>

    <div class="flex w-full justify-center">
        <div class="w-1/7 grid justify-items-center">
            <div class="place-content-center">
                <img src="{{asset('assets/images/watts.png')}}" class="img_tr mx-2">
            </div>
        </div>

            <div class="w-1/3 grid justify-items-start">

                    <p  class="cant_2_cero font-bold font-roboto">${{number_format($val_base_red_ene)}}</p>
            </div>

            <div class="w-1/3 grid justify-items-center">
                @if ($sumaopex_2  == 0)
                <p  style="margin-right:50px;" class="cant_2_v font-bold font-roboto">$0</p>
                @endif

                @if ($sumaopex_2 > 0)
                    @if (strlen(number_format($val_a_red_ene)) > 9)
                    <p  style="margin-right:50px;" class="cant_2_v font-bold font-roboto">${{number_format($val_a_red_ene)}}</p>
                    @endif

                    @if (strlen(number_format($val_a_red_ene)) <= 9)
                    <p  style="margin-right:95px;" class="cant_2_v font-bold font-roboto">${{number_format($val_a_red_ene)}}</p>
                    @endif

                @endif
            </div>


            <div class="w-1/3 grid justify-items-center">

                <div class="flex w-full justify-center">
                    @if ($sumaopex_3  == 0)
                    <p style="margin-right:30px;" class="cant_2_v font-bold font-roboto">$0</p>
                    @endif

                    @if ($sumaopex_3 > 0)
                        @if (strlen(number_format($val_b_red_ene)) > 9)
                        <p style="" class="cant_2_v font-bold font-roboto">${{number_format($val_b_red_ene)}}</p>
                        @endif

                        @if (strlen(number_format($val_b_red_ene)) <= 9)
                        <p style="margin-right:50px;" class="cant_2_v font-bold font-roboto">${{number_format($val_b_red_ene)}}</p>
                        @endif

                    @endif
                </div>
            </div>
        </div>
</div>


<div class="w-full grid">
    <div style="background-color:#ffff;" class="w-full flex justify-center  mt_titles">
        <p style="color: #1B17BB" class="titulos_style">Descarbonización (Ton CO2)</p>
    </div>

    <div class="flex w-full justify-center">
        <div class="w-1/7 grid justify-items-center">
            <div class="place-content-center">
                <img src="{{asset('assets/images/Huella.png')}}" class="img_tr mx-2">
            </div>
        </div>

            <div class="w-1/3 grid justify-items-start ">

                    <p  class="cant_2_cero_des font-bold font-roboto">0</p>
            </div>

            <div class="w-1/3 grid justify-items-center">
                <?php  $red_hu_carb_a=$red_ene->red_hu_carb(1,$val_a_red_ene) ?>

                    @if ($red_hu_carb_a  == 0)
                    <p  style="margin-right:30px;" class="cant_2 font-bold font-roboto">{{number_format($red_hu_carb_a,2)}}</p>
                    @endif

                    @if ($red_hu_carb_a > 0)
                        @if (strlen(number_format($red_hu_carb_a,2)) > 9)
                        <p  style="margin-right:50px;" class="cant_2 font-bold font-roboto">{{number_format($red_hu_carb_a,2)}}</p>
                        @endif

                        @if (strlen(number_format($red_hu_carb_a,2)) <= 9)
                        <p  style="margin-right:75px;" class="cant_2 font-bold font-roboto">{{number_format($red_hu_carb_a,2)}}</p>
                        @endif

                    @endif
            </div>


            <div class="w-1/3 grid justify-items-center">
                <div class="flex w-full justify-center">
                    <?php  $red_hu_carb_b=$red_ene->red_hu_carb(1,$val_b_red_ene) ?>
                            <div class="flex w-full justify-center">
                                <p style="" class="cant_2 font-bold font-roboto">{{number_format($red_hu_carb_b,2)}}</p>
                            </div>
                </div>
            </div>
        </div>
</div>
    </div>
</div>





{{-- Índice Intensidad del Uso de Energía --}}
{{-- <div class="w-full grid rounded-md justify-items-center mt-3">
    <div class="ancho border-2 border-blue-500 rounded-md grid">


        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">Sustentabilidad</p>
            </div>
        </div>

        <div class="flex w-full justify-center gap-x-3">
            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center mt-2">
                    <img src="{{asset('/assets/images/watts.png')}}" class="img_red_ene mx-10" alt="Nano Degree">
                    <label class="red_energetica_style" for="">Reducción Energética (MWh)</label>
                </div>

                <div class="w-full flex justify-center">
                    <div id="chart_red_ene" name="chart_red_ene" style="width: 600px;height:auto !important;"></div>
                    <div class="hidden" style="height:180px;"  id="chart_red_ene_print" name="chart_red_ene_print"></div>
                </div>
            </div>

            <div class="grid w-1/2 justify-items-center text-[24px] m-1">
                <div class="w-full flex justify-center mt-2">
                    <img src="{{asset('/assets/images/Huella.png')}}" class="img_red_ene mx-10" alt="Nano Degree">
                    <label class="red_energetica_style" for="">Descarbonización (Ton CO2)</label>
                </div>

                <div class="w-full flex justify-center">
                    <div id="chart_descarb" name="chart_descarb" style="width: 600px;height:auto !important;"></div>
                    <div class="hidden "  style="height:180px;"  id="chart_descarb_print" name="chart_descarb_print"></div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- espacio --}}
<div id="espacio_pagina_1" name="espacio_pagina_1" class="hidden" style="width:100%; height:230px;" >

</div>

    {{-- principal --}}
    <div id="principal_hoja_2" name="principal_hoja_2" class="hidden w-full grid rounded-md justify-items-center mt-3">
        <div  class="ancho border-2 border-blue-500 rounded-md flex">


            <div class="w-1/4 flex justify-center">
                <img src="{{asset('assets/images/Logotipo-HVACOPCOST.png')}}" alt="hvacopcost latinoamérica" class="img_porject mx-2">
            </div>

            <div class="w-1/3 grid justify-left ml-2">
                <div class="w-full flex ">
                   <div id="name_no_print" name="name_no_print" class="w-full flex ">
                        <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project_res">{{$tar_ele->name }}</p>
                   </div>

                   <div id="name_print" name="name_print" class="hidden w-full flex ">
                    <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project_res">
                        @if (strlen($tar_ele->name) > 21)
                        {{substr($tar_ele->name, 0, 21)}}...
                        @endif

                        @if (strlen($tar_ele->name) < 21)
                        {{$tar_ele->name}}
                        @endif
                        </p>
                   </div>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.categoria edificio') }}:</label><p class="info_project_res">{{$tar_ele->cad_edi}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.tipo edificio') }}:</label><p class="info_project_res">{{$tar_ele->tipo_edi}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.area') }}:</label><p class="info_project_res">{{number_format($tar_ele->area)}}
                        @if ($tar_ele->unidad == 'mc')
                        m²
                    @endif

                    @if ($tar_ele->unidad == 'ft')
                    ft²
                    @endif
                    </p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.ocupacion semanal') }}:</label><p class="info_project_res">
                    @switch($tar_ele->hrs_tiempo)
                        @case(30)
                            {{ __('index.menos de 50 hrs') }}.
                        @break

                        @case(80)
                            {{ __('index.51 a 167 hrs') }}.
                        @break

                        @case(168)
                            168 Hrs.
                        @break

                        @default

                    @endswitch
                        </p>
                </div>
            </div>

            <div class="w-1/3 grid justify-left">
                <div class="w-full">
                    <div class="w-full flex">
                        <label class="info_project" for="">{{ __('index.region') }}:</label><p class="info_project_res">{{$tar_ele->region}}</p>
                    </div>
                    <div class="w-full flex">
                        <label class="info_project" for="">{{ __('index.ciudad') }}:</label><p class="info_project_res">{{$tar_ele->ciudad}}</p>
                    </div>
                    <div class="w-full flex">
                        <label class="info_project" for="">{{ __('index.hors_enft_anual') }}:</label><p class="info_project_res">&nbsp;{{number_format($tar_ele->coolings_hours)}}</p>
                    </div>
                    <div class="w-full flex">
                        <label class="info_project" for="">{{ __('index.tar_ele') }}:</label><p class="info_project_res">{{$tar_ele->costo_elec}} $/Kwh</p>
                    </div>
                    <div class="w-full flex">
                        <label class="info_project" for="">{{ __('index.incremento anual energia') }}:</label><p class="info_project_res">{{$tar_ele->inflacion}}%</p>
                    </div>
                </div>
            </div>
        </div>
</div>

{{-- Índice Intensidad del Uso de Energía --}}
<div class="w-full grid rounded-md justify-items-center mt-3">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
        <div class="w-full grid">
            <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                <p class="titulos_style">Índice Intensidad del Uso de Energía (Kbtu/ft²)</p>
            </div>
        </div>

        <div class="flex w-full justify-center gap-x-3">
            <div class="flex w-1/2 justify-center text-[24px]">
                <?php  $energy_star=$smasolutions->energy_star($id_project) ?>
                <img src="{{asset('/assets/images/Energy-Star-Logo.png')}}"  class="energy_star_style_img mx-2 mt-4" alt="Nano Degree">
                <b class="eui_energy_style">EUI - Energy Star</b><b style="color:#33cc33;" class="eui_energy_val_style">&nbsp;{{number_format($energy_star,1)}}</b>
            </div>

            <div class="flex w-1/2 justify-center text-[24px]">
                <?php  $ashrae=$smasolutions->ashrae($id_project) ?>
                <img src="{{asset('/assets/images/Logo-ASHRAE-png.png')}}" class="ashrae_style_img" alt="Nano Degree">
                <b class="eui_energy_style">EUI - ASHRAE</b><b style="color:#33cc33;" class="eui_energy_val_style">&nbsp;{{$ashrae}}</b>
            </div>
        </div>

        <div class="flex w-full justify-center mb-1">
            <div class="w-1/3 grid justify-items-center">
                {{-- <div class="flex justify-center w-full">
                    <label class="solucions_style_name">{{ __('index.sis_ext') }}</label>
                </div> --}}
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
               {{--  <div class="flex justify-center w-full">
                    <label class="solucions_style_name">{{ __('index.solucion') }} A</label>
                </div> --}}
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
                {{-- <div class="flex justify-center w-full">
                    <label class="solucions_style_name">{{ __('index.solucion') }} B</label>
                </div> --}}
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
      <div class="flex w-full justify-center gap-x-3 mb-8">

        {{--  --}}
        <div class="w-full grid mb-0 gap-y-5">
                <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg" style="margin-top:1.3rem;">
                    <div style="width: 8.666667%"></div>
                    <div class="w-1/5 flex justify-start">
                    {{--  <div class="ml-10 flex w-full mt-5"> --}}
                            <p class="size_solutions_confort  font-roboto  font-bold text-left">{{ __('index.sis_ext') }}</p>
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
                  <div style="width: 8.666667%"></div>
                    <div class="w-1/5 flex justify-start">

                            <p class=" font-roboto size_solutions_confort font-bold text-left">{{ __('index.solucion') }} A</p>

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
                  <div style="width: 8.666667%"></div>
                    <div class="w-1/5 flex justify-start">
                            <p class="size_solutions_confort font-roboto font-bold text-left">{{ __('index.solucion') }} A</p>
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
                  <div style="width: 8.666667%"></div>
                    <div class="w-1/5 flex justify-start">
                            <p class="size_solutions_confort font-roboto font-bold text-left">{{ __('index.solucion') }} B</p>
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
                  <div style="width: 8.666667%"></div>
                    <div class="w-1/5 flex justify-start">

                            <p class= "font-roboto size_solutions_confort font-bold">{{ __('index.solucion') }} B</p>

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
   @include('modal_prod_retro')
<div class="margin_new_page w-full grid rounded-md justify-items-center mt-3">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
      <div class="w-full grid">
        <div style="background-color:#1B17BB;" class="w-full flex justify-center">
            <div class="flex w-full justify-center mt-1">
                <p class="titulos_style">Productividad Laboral</p>
            </div>

              <div id="button_prod" name="button_prod" class="flex justify-end mt-2">
                <a href="#ir_modal_position_prod" onclick="mostrar_modal('modal_prod_retro');" class="btn_roundf_retro mr-5" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
              </div>
          </div>
      </div>

      <div class="grid w-full justify-items-center gap-x-3 my-2">

        <div class="flex w-full justify-center">
            <div  class="padding_space_white flex justify-center">
            </div>
            @if ($result1 !== null)
            <?php  $prod_lab=$conf_val->prod_lab($id_project,1,1,$sumacap_term_1) ?>
            @endif
            @if ($result1 === null)
            <?php  $prod_lab=0; ?>
            @endif
            <div class="w-1/3 grid justify-items-center">

                <div class="my-6" style="margin: 0px auto" id="chart_prod_base"></div>
            </div>
            @if ($result2 !== null)
            <?php  $prod_lab_a=$conf_val->prod_lab($id_project,2,1,$sumacap_term_1) ?>
            @endif
            @if ($result2 === null)
            <?php  $prod_lab_a=0; ?>
            @endif
            <div class="w-1/3 grid justify-items-center">

                <div class="my-6"  id="chart_prod_a" style="margin: 0px auto"></div>
            </div>
            @if ($result3 !== null)
            <?php  $prod_lab_b=$conf_val->prod_lab($id_project,3,1,$sumacap_term_1) ?>
            @endif
            @if ($result3 === null)
            <?php  $prod_lab_b=0; ?>
            @endif
            <div class="w-1/3 grid justify-items-center">

                <div class="my-6" id="chart_prod_b" style="margin: 0px auto"></div>
            </div>
        </div>

        {{-- <div class="flex w-full justify-center mt-6">
            <p class="per_cos text-blue-600 font-roboto font-bold">Personas y Costo de la Pérdida de Productividad</p>
        </div> --}}


      </div>

      <div class="w-full grid mb-1">
        <div style="background-color:#ffff;" class="w-full flex justify-center ">
            <div style="margin-top:1rem;" class="flex w-full justify-center">
                <p style="color:#1B17BB;" class="titulos_style">Reducción Anual de Costo Salarial</p>
            </div>
          </div>

          <div class="flex w-full justify-center">
            <div class="w-1/8 flex grid justify-items-center">
                <div>
                    <img src="{{asset('assets/images/pesos_personas.jpg')}}" class="img_prod_lab mx-2 mt-0 ml-5">
                </div>

               {{--  <div>
                    <img src="{{asset('assets/images/ahorro.png')}}" class="img_ahorro mx-2">
                </div> --}}
            </div>

            @php
                $personas=$conf_val->personas($id_project,$conf_val_base);
                $personas_a=$conf_val->personas($id_project,$conf_val_a);
                $personas_b=$conf_val->personas($id_project,$conf_val_b);

                $costo_base=$conf_val->costo($personas,$id_project);
                $costo_a=$conf_val->costo($personas_a,$id_project);
                $costo_b=$conf_val->costo($personas_b,$id_project);
                //VALIDAR SI SON DIREFENTES LOS TRES VALORES  personas personas_a personas_b , no se repiten

                if($personas != $personas_a && $personas != $personas_b && $personas_a != $personas_b){

                $mayor = max($costo_base, $costo_a, $costo_b);

                $costo_anual_base = $mayor - $costo_base;

                    //valida  si existe solucion
                 $check_solution_a=$conf_val->check_solution($id_project,2);
                if($check_solution_a !== null){
                    $costo_anual_a = $mayor - $costo_a;
                }else{
                    $costo_anual_a=0;
                }
                    //valida  si existe solucion
                $check_solution_b=$conf_val->check_solution($id_project,3);
                if($check_solution_b !== null){
                      $costo_anual_b = $mayor - $costo_b;
                }else{
                    $costo_anual_b=0;
                }

                }else{
                    $costo_anual_base = 0;
                    $costo_anual_a = 0;
                    $costo_anual_b = 0;
                }

            @endphp

                @if ($result1 !== null)
                <?php  $personas=$conf_val->personas($id_project,$conf_val_base) ?>
                <?php  $costo_base=$conf_val->costo($personas,$id_project) ?>
                @endif

                @if ($result1 === null)
                <?php  $personas=0; ?>
                @endif
                <div class="w-1/3 grid justify-items-center gap-y-3">
                    {{-- <div class="flex w-full justify-center">
                        @if ($personas > 0)
                        <p style="color:#ea0000;" class="cant_style">{{$personas}}</p>
                        @endif
                        @if ($personas <= 0)
                        <p class="cant_style">{{$personas}}</p>
                        @endif
                    </div> --}}

                    <div class="flex w-full justify-center">
                        <p class="cant_style">${{number_format($costo_anual_base)}}</p>
                    </div>
                </div>

                @if ($result2 !== null)
                <?php  $personas_a=$conf_val->personas($id_project,$conf_val_a) ?>
                <?php  $costo_a=$conf_val->costo($personas_a,$id_project) ?>
                @endif

                @if ($result2 === null)
                <?php  $personas_a=0 ?>
                <?php  $costo_a=0; ?>
                @endif
                <div class="w-1/3 grid justify-items-center gap-y-3">
                   {{--  <div class="flex w-full justify-center">
                        @if ($personas_a > 0)
                        <p style="color:#ea0000;" class="cant_style">{{$personas_a}}</p>
                        @endif
                        @if ($personas_a <= 0)
                        <p class="cant_style">{{$personas_a}}</p>
                        @endif
                    </div> --}}

                    <div class="flex w-full justify-center">
                        <p class="cant_style">${{number_format($costo_anual_a)}}</p>
                    </div>
                </div>

                @if ($result3 !== null)
                <?php  $personas_b=$conf_val->personas($id_project,$conf_val_b) ?>
                <?php  $costo_b=$conf_val->costo($personas_b,$id_project) ?>
                @endif

                @if ($result3 === null)
                <?php  $personas_b=0; ?>
                <?php  $costo_b=0 ?>
                @endif

                <div class="w-1/3 grid justify-items-center gap-y-3">
                    {{-- <div class="flex w-full justify-center">
                        <div class="flex w-full justify-center">
                            @if ($personas_b > 0)
                            <p style="color:#ea0000;" class="cant_style">{{$personas_b}}</p>
                            @endif
                            @if ($personas_b <= 0)
                            <p class="cant_style">{{$personas_b}}</p>
                            @endif
                        </div>
                    </div> --}}

                    <div class="flex w-full justify-center">
                        <p class="cant_style">${{number_format($costo_anual_b)}}</p>
                    </div>
                </div>
            </div>
      </div>


    </div>
</div>


<?php  $prim_buil_check=$conf_val->prim_buil_check($id_project) ?>

 @if ($prim_buil_check->id_cat_edifico == 3 || $prim_buil_check->id_cat_edifico == 7 || $prim_buil_check->id_cat_edifico == 8 || $prim_buil_check->id_cat_edifico == 9 || $prim_buil_check->id_cat_edifico == 10 || $prim_buil_check->id_cat_edifico == 11)
                    {{-- <div class="margin_new_page w-full grid rounded-md justify-items-center mt-3">
                        <div class="ancho border-2 border-blue-500 rounded-md grid">
                          <div class="w-full flex">
                                  <div style="background-color:#1B17BB;" class="w-full flex justify-center">
                                    <div class="flex w-full justify-center mt-1">
                                        <p class="titulos_style">{{ __('results.cu_sho_Be') }}</p>
                                    </div>
                                  </div>


                          </div>

                        <div class="flex w-full justify-center my-2">
                            <div  class="padding_space_white flex justify-center">
                            </div>
                            @if ($result1 !== null)
                            <?php  $prod_lab=$conf_val->prod_lab($id_project,1,1,$sumacap_term_1) ?>
                            @endif
                            @if ($result1 === null)
                            <?php  $prod_lab=0; ?>
                            @endif
                            <div class="w-1/3 grid justify-items-center">
                                <div id="chart_cu_sho_Be_base"></div>
                                 <div class="hidden" id="chart_cu_sho_Be_base_print" name="chart_cu_sho_Be_base_print"></div>
                            </div>
                            @if ($result1 !== null)
                            <?php  $prod_lab_a=$conf_val->prod_lab($id_project,2,1,$sumacap_term_1) ?>
                            @endif
                            @if ($result1 === null)
                            <?php  $prod_lab_a=0; ?>
                            @endif
                            <div class="w-1/3 grid justify-items-center">
                                <div id="chart_cu_sho_Be_a"></div>
                                <div class="hidden" id="chart_cu_sho_Be_a_print" name="chart_cu_sho_Be_a_print"></div>
                            </div>
                            @if ($result1 !== null)
                            <?php  $prod_lab_b=$conf_val->prod_lab($id_project,3,1,$sumacap_term_1) ?>
                            @endif
                            @if ($result1 === null)
                            <?php  $prod_lab_b=0; ?>
                            @endif
                            <div class="w-1/3 grid justify-items-center">
                                <div id="chart_cu_sho_Be_b"></div>
                                <div class="hidden" id="chart_cu_sho_Be_b_print" name="chart_cu_sho_Be_b_print"></div>
                            </div>
                        </div>
               </div>
</div> --}}
@endif

{{-- espacio hoja pagina 3 --}}
<div id="next_page_3" name="next_page_3" style="width: 80%; height:30px;" class="hidden">

</div>

<div id="next_page_3_cushobe" name="next_page_3_cushobe" style="width: 80%; height:78px;" class="hidden">

</div>
{{-- espacio hoja pagina 3 --}}

{{-- principal --}}
<div id="principal_hoja_3" name="principal_hoja_3" class="hidden w-full grid rounded-md justify-items-center mt-3">
    <div  class="ancho border-2 border-blue-500 rounded-md flex">


        <div class="w-1/4 flex justify-center">
            <img src="{{asset('assets/images/Logotipo-HVACOPCOST.png')}}" alt="hvacopcost latinoamérica" class="img_porject mx-2">
        </div>

        <div class="w-1/3 grid justify-left ml-2">
            <div class="w-full flex ">
               <div id="name_no_print" name="name_no_print" class="w-full flex ">
                    <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project_res">{{$tar_ele->name }}</p>
               </div>

               <div id="name_print" name="name_print" class="hidden w-full flex ">
                <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project_res">
                    @if (strlen($tar_ele->name) > 21)
                    {{substr($tar_ele->name, 0, 21)}}...
                    @endif

                    @if (strlen($tar_ele->name) < 21)
                    {{$tar_ele->name}}
                    @endif
                    </p>
               </div>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.categoria edificio') }}:</label><p class="info_project_res">{{$tar_ele->cad_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.tipo edificio') }}:</label><p class="info_project_res">{{$tar_ele->tipo_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.area') }}:</label><p class="info_project_res">{{number_format($tar_ele->area)}}
                    @if ($tar_ele->unidad == 'mc')
                    m²
                @endif

                @if ($tar_ele->unidad == 'ft')
                ft²
                @endif
                </p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.ocupacion semanal') }}:</label><p class="info_project_res">
                @switch($tar_ele->hrs_tiempo)
                    @case(30)
                        {{ __('index.menos de 50 hrs') }}.
                    @break

                    @case(80)
                        {{ __('index.51 a 167 hrs') }}.
                    @break

                    @case(168)
                        168 Hrs.
                    @break

                    @default

                @endswitch
                    </p>
            </div>
        </div>

        <div class="w-1/3 grid justify-left">
            <div class="w-full">
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.region') }}:</label><p class="info_project_res">{{$tar_ele->region}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.ciudad') }}:</label><p class="info_project_res">{{$tar_ele->ciudad}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.hors_enft_anual') }}:</label><p class="info_project_res">&nbsp;{{number_format($tar_ele->coolings_hours)}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.tar_ele') }}:</label><p class="info_project_res">{{$tar_ele->costo_elec}} $/Kwh</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.incremento anual energia') }}:</label><p class="info_project_res">{{$tar_ele->inflacion}}%</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  $dif_1_cost=$smasolutions->dif_1_cost($id_project,count($results_aux),$tar_ele->costo_elec) ?>

@if ($result2 !== null)
<?php  $inv_ini_2=$smasolutions->inv_ini($id_project,$result2->num_enf) ?>
@endif
 @if ($result2 === null)
 <?php  $inv_ini_2=0 ?>
@endif


@if ($result2 !== null)
<?php  $inv_ini_2=$smasolutions->inv_ini($id_project,$result2->num_enf) ?>
@endif
 @if ($result2 === null)
 <?php  $inv_ini_2=0 ?>
@endif

<?php  $dif_2_cost=$smasolutions->dif_2_cost($id_project,count($results_aux),$tar_ele->costo_elec) ?>
 {{-- payback --}}
 <a id="ir_modal_position_marr" name="ir_modal_position_marr" href=""></a>

 <div class="margin_new_page w-full grid rounded-md justify-items-center mt-3">
    <div class="ancho border-2 border-blue-500 rounded-md grid">
      <div class="w-full grid">
        <div style="background-color:#1B17BB;" class="w-full flex justify-center">
            <div class="flex w-full justify-center mt-1">
                <p class="titulos_style ml-8">Análisis Financiero - Retornos de Inversión (años)</p>
            </div>
            <div id="button_marrr" name="button_marrr" class="flex justify-end mt-2">
                <a href="#ir_modal_position_marr" onclick="mostrar_modal('modal_marr_retro');" class="btn_roundf_retro mr-5" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
            </div>
        </div>

              <div class="w-full grid mt-4">
                <div class="w-full flex justify-center ">
                        <p class="solucions_style_name  ">Recuperación - Solo Energía</p>
                </div>

                <div class="w-full flex">
                    <div class="w-1/2 grid h-full">

                        <div class="flex w-full justify-center gap-x-3 mb-3">

                            <div  class="flex justify-center w-full  my-1 gap-x-3">
                                <div class="">
                                    <img  style="margin-left: 1.5rem;" src="{{asset('assets/images/payback.png')}}" class="img_payback mx-2">
                                </div>

                                <div class="place-items-center">
                                    <p  style="" class="solucions_style_name font-bold font-roboto  mt-5">Payback Simple</p>
                                </div>
                            </div>

                        </div>

                        <div class="flex w-full justify-center gap-x-3 mb-3">

                            <div  class="flex justify-start w-[30%] place-items-center my-1">
                                    <b  style="color:#1B17BB;margin-left:.0rem;" class="payback_cants font-roboto font-bold mt-2">Existente &nbsp;&nbsp;</b>
                            </div>

                           {{--  <div  class="flex justify-start w-1/3  my-1 place-items-center">
                                @if (strlen(number_format($inv_ini_1)) > 9)
                                <b  style="color:#2c5282;" class="payback_cants_min font-roboto font-bold">${{number_format($inv_ini_1)}}</b>
                                @endif
                                @if (strlen(number_format($inv_ini_1)) <= 9)
                                <b  style="color:#2c5282;" class="payback_cants font-roboto font-bold">${{number_format($inv_ini_1)}}</b>
                               @endif

                            </div> --}}

                            <div   class="flex  rounded-md justify-center w-1/4  ">
                                <div  class="grid justify-items-center  rounded-md place-items-center">
                                  <div style="" class="w-full mx-3 my-1  flex justify-center">
                                    @if ( true == ( isset( $val_base_red_ene ) ? $val_base_red_ene : null ) )

                                    @if($val_base_red_ene === 0)
                                    <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                    @php
                                        $pay_back_base = "N/A"
                                    @endphp
                                    @endif

                                    @if($val_base_red_ene !== 0)
                                    <?php  $pay_back_base=$smasolutions->pay_back($inv_ini_1,$inv_ini_1,$val_base_red_ene) ?>

                                    @if ($pay_back_base >= 1)
                                        @if ((strlen(number_format($pay_back_base,1))) == 1 )
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_1">{{number_format($pay_back_base,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_base,1))) == 2 )
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_2">{{number_format($pay_back_base,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_base,1))) == 3 )
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_3">{{number_format($pay_back_base,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_base,1))) == 4 )
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_4">{{number_format($pay_back_base,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_base,1))) == 5 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_5">{{number_format($pay_back_base,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_base,1))) == 6 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green_6 font-roboto font-bold rounded-md padding_pay_6">{{number_format($pay_back_base,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_base,1))) == 7 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green_6 font-roboto font-bold rounded-md padding_pay_6">{{number_format($pay_back_base,1)}}</b>
                                        @endif

                                    @endif

                                    @if ($pay_back_base < 1)
                                    <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">< 1</b>
                                    @endif

                                    @endif


                                    @else
                                    <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                    @php
                                        $pay_back_base = "N/A"
                                    @endphp
                                    @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex w-full justify-center gap-x-3 mb-3">

                            <div  class="flex justify-start  w-[30%]  my-1 place-items-center">
                                    <b  style="color:#1B17BB;margin-left:.75rem;" class="payback_cants font-roboto font-bold ml-10">Solución A</b>
                            </div>

                            {{-- <div  class="flex justify-start w-1/3  my-1 place-items-center">
                                @if (strlen(number_format($inv_ini_2)) > 9)
                                <b  style="color:#2c5282;" class="payback_cants_min font-roboto font-bold">${{number_format($inv_ini_2)}}</b>
                                @endif
                                @if (strlen(number_format($inv_ini_2)) <= 9)
                                <b  style="color:#2c5282;" class="payback_cants font-roboto font-bold">${{number_format($inv_ini_2)}}</b>
                               @endif
                            </div> --}}

                            <div style="" class=" rounded-md flex justify-center w-1/4 ">
                                <div  style="" class="grid justify-items-center place-items-center">
                                    <div  class="w-full mx-3 rounded-md flex justify-center">
                                        @if ($result2 === null)
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                        @php
                                                $pay_back_a = "N/A"
                                        @endphp
                                        @endif

                                        @if ($result2 != null)
                                            @if ( true == ( isset( $val_a_red_ene ) ? $val_a_red_ene : null ) )
                                            <?php  $pay_back_a=$smasolutions->pay_back($inv_ini_1,$inv_ini_2,$val_a_red_ene) ?>


                                            @if ($pay_back_a >= 1)
                                            @if ((strlen(number_format($pay_back_a,1))) == 1 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_1">{{number_format($pay_back_a,1)}}</b>
                                            @endif

                                            @if ((strlen(number_format($pay_back_a,1))) == 2 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_2">{{number_format($pay_back_a,1)}}</b>
                                            @endif

                                            @if ((strlen(number_format($pay_back_a,1))) == 3 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_3">{{number_format($pay_back_a,1)}}</b>
                                            @endif

                                            @if ((strlen(number_format($pay_back_a,1))) == 4 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_4">{{number_format($pay_back_a,1)}}</b>
                                            @endif

                                            @if ((strlen(number_format($pay_back_a,1))) == 5 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_5">{{number_format($pay_back_a,1)}}</b>
                                            @endif

                                            @if ((strlen(number_format($pay_back_a,1))) == 6 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green_6 font-roboto font-bold rounded-md padding_pay_6">{{number_format($pay_back_a,1)}}</b>
                                            @endif

                                            @if ((strlen(number_format($pay_back_a,1))) == 7 )
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green_6 font-roboto font-bold rounded-md padding_pay_6">{{number_format($pay_back_a,1)}}</b>
                                            @endif

                                        @endif

                                            @if ($pay_back_a < 1)
                                            <b style="color:#ea0000;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">< 1</b>
                                            @endif

                                            @else
                                            <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                            @php
                                                $pay_back_a = "N/A"
                                            @endphp
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex w-full justify-center gap-x-3 mb-3">

                            <div  class="flex justify-start  w-[30%] place-items-center my-1">
                                    <b  style="color:#1B17BB;margin-left:.75rem;" class="payback_cants font-roboto font-bold ml-10">Solución B</b>
                            </div>

                            {{-- <div  class="flex justify-start w-1/3  my-1 place-items-center">
                                @if (strlen(number_format($inv_ini_3)) > 9)
                                <b  style="color:#2c5282;" class="payback_cants_min font-roboto font-bold">${{number_format($inv_ini_3)}}</b>
                                @endif
                                @if (strlen(number_format($inv_ini_3)) <= 9)
                                <b  style="color:#2c5282;" class="payback_cants font-roboto font-bold">${{number_format($inv_ini_3)}}</b>
                               @endif
                            </div> --}}

                            <div  class="rounded-md flex justify-center w-1/4 ">
                                <div  style="" class="grid justify-items-center  place-items-center">
                                     <div  class="w-full mx-3 rounded-md flex justify-center">
                                    @if ($result3 === null)
                                    <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                    @php
                                        $pay_back_b = "N/A"
                                    @endphp
                                    @endif
                                    @if ($result3 != null)
                                        @if ( true == ( isset( $val_b_red_ene ) ? $val_b_red_ene : null ) )
                                                <?php  $pay_back_b=$smasolutions->pay_back($inv_ini_1,$inv_ini_3,$val_b_red_ene) ?>

                                                @if ($pay_back_b >= 1)
                                                    @if ((strlen(number_format($pay_back_b,1))) == 1 )
                                                    <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_1">{{number_format($pay_back_b,1)}}</b>
                                                    @endif

                                                    @if ((strlen(number_format($pay_back_b,1))) == 2 )
                                                    <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_2">{{number_format($pay_back_b,1)}}</b>
                                                    @endif

                                                    @if ((strlen(number_format($pay_back_b,1))) == 3 )
                                                    <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_3">{{number_format($pay_back_b,1)}}</b>
                                                    @endif

                                                    @if ((strlen(number_format($pay_back_b,1))) == 4 )
                                                    <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_4">{{number_format($pay_back_b,1)}}</b>
                                                    @endif

                                                    @if ((strlen(number_format($pay_back_b,1))) == 5 )
                                                    <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_5">{{number_format($pay_back_b,1)}}</b>
                                                    @endif

                                                    @if ((strlen(number_format($pay_back_b,1))) == 6 )
                                                    <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green_6 font-roboto font-bold rounded-md padding_pay_6">{{number_format($pay_back_b,1)}}</b>
                                                    @endif

                                                    @if ((strlen(number_format($pay_back_b,1))) == 7 )
                                                    <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green_6 font-roboto font-bold rounded-md padding_pay_6">{{number_format($pay_back_b,1)}}</b>
                                                    @endif


                                                @endif

                                                @if ($pay_back_b < 1)
                                                <b style="border:solid  3px;border-color:#1B17BB;color:#ea0000;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">< 1</b>
                                                @endif

                                        @else
                                            <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;"  class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                            @php
                                                $pay_back_b = "N/A"
                                            @endphp
                                            <?php  $val_b_red_ene=0 ?>
                                        @endif
                                    @endif
                                      </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <?php
                    $array_val_vals =  [intval($val_base_red_ene),intval($val_a_red_ene),intval($val_b_red_ene)];
                    $counter_val_prod_ene = 0;
                    for ($i=0; $i < count($array_val_vals); $i++) {
                        if($array_val_vals[$i] == 0){
                            $counter_val_prod_ene = $i;
                        }
                    }


                    ?>

                    @if ($counter_val_prod_ene == 0)
                        <input type="number" class="hidden" id="dif_cost_base_a" name="dif_cost_base_a" value="{{$val_a_red_ene}}">
                        <input type="number" class="hidden" id="dif_cost_base_b" name="dif_cost_base_b" value="{{$val_b_red_ene}}">
                        <input type="number" class="hidden" id="counter_val_prod_ene" name="counter_val_prod_ene" value="{{$counter_val_prod_ene}}">
                    @endif

                    @if ($counter_val_prod_ene == 1)
                        <input type="number" class="hidden" id="dif_cost_base_a" name="dif_cost_base_a" value="{{$val_base_red_ene}}">
                        <input type="number" class="hidden" id="dif_cost_base_b" name="dif_cost_base_b" value="{{$val_b_red_ene}}">
                        <input type="number" class="hidden" id="counter_val_prod_ene" name="counter_val_prod_ene" value="{{$counter_val_prod_ene}}">
                    @endif

                    @if ($counter_val_prod_ene == 2)
                        <input type="number" class="hidden" id="dif_cost_base_a" name="dif_cost_base_a" value="{{$val_base_red_ene}}">
                        <input type="number" class="hidden" id="dif_cost_base_b" name="dif_cost_base_b" value="{{$val_a_red_ene}}">
                        <input type="number" class="hidden" id="counter_val_prod_ene" name="counter_val_prod_ene" value="{{$counter_val_prod_ene}}">
                    @endif
                    <div class="w-1/2">
                        <div class="flex w-full justify-center gap-x-3 mb-3">
                            <div  class="flex justify-start w-full  my-1 gap-x-3">
                                <div class="place-items-center">
                                    <p  style="" class="solucions_style_name font-bold font-roboto  mt-5">Retorno de Inversión</p>
                                </div>
                            </div>
                        </div>
                        <div class="max-w-6xl mx-auto bg-white rounded-lg p-6 md:p-8">

                                    <!-- Timeline Container -->
                                    <div class="timeline-component">

                                        <!-- Headers Row -->
                                        <div class="flex justify-between items-center mb-8 px-2">
                                            <div class="text-center">
                                                <h3 class="text-sm md:text-base font-semibold text-gray-700">3 años</h3>
                                            </div>
                                            <div class="text-center">
                                                <h3 class="text-sm md:text-base font-semibold text-gray-700">5 años</h3>
                                            </div>
                                            <div class="text-center">
                                                <h3 class="text-sm md:text-base font-semibold text-gray-700">10 años</h3>
                                            </div>
                                            <div class="text-center">
                                                <h3 class="text-sm md:text-base font-semibold text-gray-700">15 años</h3>
                                            </div>
                                        </div>

                                        <!-- First Row - All zeros -->
                                        <div class="relative flex items-center justify-between mb-rois">
                                            <!-- Timeline line -->
                                            <div class="absolute border-2 border-gray-300 py-1 mt-3 top-1/2 left-0 right-0 timeline-line transform -translate-y-1/2 z-0"></div>

                                            <!-- Timeline points -->
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="a_s_e_3" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="a_s_e_5" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="a_s_e_10" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="a_s_e_15" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                        </div>

                                        <!-- Second Row - 12, 32, 92, 123 -->
                                        <div class="relative flex items-center justify-between mb-rois">
                                            <!-- Timeline line -->
                                            <div class="absolute border-2 border-gray-300 py-1 mt-3 top-1/2 left-0 right-0 timeline-line transform -translate-y-1/2 z-0"></div>

                                            <!-- Timeline points -->
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="b_s_e_3" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="b_s_e_5" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="b_s_e_10" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="b_s_e_15" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                        </div>

                                        <!-- Third Row - 12, 32, 92, 123 (duplicate) -->
                                        <div class="relative flex items-center justify-between">
                                            <!-- Timeline line -->
                                            <div class="absolute border-2 border-gray-300 py-1 mt-3 top-1/2 left-0 right-0 timeline-line transform -translate-y-1/2 z-0"></div>

                                            <!-- Timeline points -->
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="c_s_e_3" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="c_s_e_5" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="c_s_e_10" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="c_s_e_15" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        {{-- <div id="chart_roi_base_a" name="chart_roi_base_a" style="width: 600px;"></div>
                        <div class="hidden" style="height:250px;"  id="chart_roi_base_a_print" name="chart_roi_base_a_print"></div> --}}
                    </div>
                </div>


                <div class="w-full flex justify-center  mt-10">
                    <p class="solucions_style_name  ">Recuperación - Energía + Productividad</p>
                </div>
                <div class="w-full flex">
                    <div class="w-1/2 grid h-full">

                        <div class="flex w-full justify-center gap-x-3 mb-3">

                            <div  class="flex justify-center w-full  my-1 gap-x-3">
                                <div class="">
                                    <img style="margin-left: 1.5rem;" src="{{asset('assets/images/payback.png')}}" class="img_payback mx-2">
                                </div>

                                <div class="place-items-center">
                                    <p  style="" class="solucions_style_name font-bold font-roboto  mt-5">Payback Simple</p>
                                </div>
                            </div>

                        </div>

                        <div class="flex w-full justify-center gap-x-3 mb-3">

                            <div  class="flex justify-start w-[30%] place-items-center my-1">
                                    <b  style="color:#1B17BB;margin-left:0.5rem;" class="payback_cants font-roboto font-bold ml-8">Existente &nbsp;&nbsp;</b>
                            </div>

                            {{-- <div  class="flex justify-start w-1/3 place-items-center my-1">
                                @if (strlen(number_format($inv_ini_1)) > 9)
                                <b  style="color:#2c5282;" class="payback_cants_min font-roboto font-bold">${{number_format($inv_ini_1)}}</b>
                                @endif
                                @if (strlen(number_format($inv_ini_1)) <= 9)
                                <b  style="color:#2c5282;" class="payback_cants font-roboto font-bold">${{number_format($inv_ini_1)}}</b>
                               @endif
                            </div> --}}

                            <div style="" class="flex  rounded-md justify-center w-1/4 ">
                                <div  style="" class="grid justify-items-center place-items-center">
                                    <div  class="w-full mx-3 flex justify-center">
                                    <?php
                                        if( $costo_anual_base == 0 && $costo_anual_a == 0 && $costo_anual_b == 0){
                                            $pay_back_base_ene_prod = $pay_back_base;

                                            }else{

                                            $pay_back_base_ene_prod=$smasolutions->pay_back_ene_prod($inv_ini_1,$costo_base,0,$costo_base);
                                        }
                                    ?>

                                    @if ($pay_back_base_ene_prod > 1)
                                    <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">{{number_format($pay_back_base,1)}}</b>
                                    @endif

                                    @if ($pay_back_base_ene_prod <= 1)
                                    <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                    @endif
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="flex w-full justify-center gap-x-3 mb-3">

                            <div  class="flex justify-start w-[30%] place-items-center  my-1">
                                    <b  style="color:#1B17BB;margin-left:.75rem;" class="payback_cants font-roboto font-bold ml-8">Solución A</b>
                            </div>

                            {{-- <div  class="flex justify-start w-1/3 place-items-center my-1">
                                @if (strlen(number_format($inv_ini_2)) > 9)
                                <b  style="color:#2c5282;" class="payback_cants_min font-roboto font-bold">${{number_format($inv_ini_2)}}</b>
                                @endif
                                @if (strlen(number_format($inv_ini_2)) <= 9)
                                <b  style="color:#2c5282;" class="payback_cants font-roboto font-bold">${{number_format($inv_ini_2)}}</b>
                               @endif
                            </div> --}}

                            <div style="" class="rounded-md flex justify-center w-1/4 ">
                                {{--
                                $costo_base
$costo_a
$costo_b
                                --}}
                                <div  style="" class="grid justify-items-center  place-items-center">
                                  <div  class="w-full mx-3  flex justify-center">
                                    @if ( true == ( isset( $val_a_red_ene ) ? $val_a_red_ene : null ) )
                                    <?php
                                        if( $costo_anual_base == 0 && $costo_anual_a == 0 && $costo_anual_b == 0){

                                            $pay_back_a_ene_prod = $pay_back_a;

                                            }else{

                                            $pay_back_a_ene_prod=$smasolutions->pay_back_ene_prod($inv_ini_1,$costo_base,$val_a_red_ene,$costo_a);
                                        }
                                    ?>

                                    @if ($pay_back_a_ene_prod >= 1)

                                        @if ((strlen(number_format($pay_back_a_ene_prod,1))) == 1 )
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_1">{{number_format($pay_back_a_ene_prod,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_a_ene_prod,1))) == 2 )
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_2">{{number_format($pay_back_a_ene_prod,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_a_ene_prod,1))) == 3 )
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_3">{{number_format($pay_back_a_ene_prod,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_a_ene_prod,1))) == 4 )
                                        <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_4">{{number_format($pay_back_a_ene_prod,1)}}</b>
                                        @endif

                                    @endif

                                    @if ($pay_back_a_ene_prod < 1)
                                    <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">< 1</b>
                                    @endif

                                    @else
                                    <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                    @endif
                                   </div>
                                </div>
                            </div>

                        </div>

                        <div class="flex w-full justify-center gap-x-3 mb-3">

                            <div  class="flex justify-start w-[30%] place-items-center my-1">
                                    <b  style="color:#1B17BB;margin-left:.75rem;" class="payback_cants font-roboto font-bold ml-8">Solución B</b>
                            </div>

                            {{-- <div  class="flex justify-start w-1/3 place-items-center my-1">
                                @if (strlen(number_format($inv_ini_3)) > 9)
                                <b  style="color:#2c5282;" class="payback_cants_min font-roboto font-bold">${{number_format($inv_ini_3)}}</b>
                                @endif
                                @if (strlen(number_format($inv_ini_3)) <= 9)
                                <b  style="color:#2c5282;" class="payback_cants font-roboto font-bold">${{number_format($inv_ini_3)}}</b>
                               @endif
                            </div> --}}

                            <div style="" class="rounded-md  flex justify-center w-1/4 ">
                                <div  style="" class="grid justify-items-center  place-items-center">
                                    <div  class="w-full mx-3  flex justify-center">
                                    @if ( true == ( isset( $val_b_red_ene ) ? $val_b_red_ene : null ) )
                                    <?php
                                    if( $costo_anual_base == 0 && $costo_anual_a == 0 && $costo_anual_b == 0){

                                            $pay_back_b_ene_prod = $pay_back_b;

                                            }else{

                                            $pay_back_b_ene_prod=$smasolutions->pay_back_ene_prod($inv_ini_1,$costo_base,$val_b_red_ene,$costo_b);

                                        }
                                    ?>
                                    @if ($pay_back_b_ene_prod >= 1)
                                   <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">{{number_format($pay_back_b_ene_prod,1)}}</b>

                                        @if ((strlen(number_format($pay_back_b_ene_prod,1))) == 1 )
                                        <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_1">{{number_format($pay_back_b_ene_prod,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_b_ene_prod,1))) == 2 )
                                        <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_2">{{number_format($pay_back_b_ene_prod,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_b_ene_prod,1))) == 3 )
                                        <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_3">{{number_format($pay_back_b_ene_prod,1)}}</b>
                                        @endif

                                        @if ((strlen(number_format($pay_back_b_ene_prod,1))) == 4 )
                                        <b style="border:solid  3px;border-color:#1B17BB;color:#33cc33;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay_4">{{number_format($pay_back_b_ene_prod,1)}}</b>
                                        @endif
                                   @endif

                                    @if ($pay_back_b_ene_prod < 1)
                                   <b style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">< 1</b>
                                   @endif

                                    @else
                                    <b  style="color:#33cc33;border:solid  3px;border-color:#1B17BB;" class="payback_cants_green font-roboto font-bold rounded-md padding_pay">N/A</b>
                                    <?php  $val_b_red_ene=0 ?>
                                     @endif
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="w-1/2">
                        <div class="flex w-full justify-center gap-x-3 mb-3">
                            <div  class="flex justify-start w-full  my-1 gap-x-3">
                                <div class="place-items-center">
                                    <p  style="" class="solucions_style_name font-bold font-roboto  mt-5">Retorno de Inversión</p>
                                </div>
                            </div>
                        </div>
                        <div class="max-w-6xl mx-auto bg-white rounded-lg p-6 md:p-8">

                                    <!-- Timeline Container -->
                                    <div class="timeline-component">

                                        <!-- Headers Row -->
                                        <div class="flex justify-between items-center mb-8 px-2">
                                            <div class="text-center">
                                                <h3 id="yrs_r_e_3" class="text-sm md:text-base font-semibold text-gray-700"></h3>
                                            </div>
                                            <div class="text-center">
                                                <h3 id="yrs_r_e_5" class="text-sm md:text-base font-semibold text-gray-700"></h3>
                                            </div>
                                            <div class="text-center">
                                                <h3 id="yrs_r_e_10" class="text-sm md:text-base font-semibold text-gray-700"></h3>
                                            </div>
                                            <div class="text-center">
                                                <h3 id="yrs_r_e_15" class="text-sm md:text-base font-semibold text-gray-700"></h3>
                                            </div>
                                        </div>

                                        <!-- First Row - All zeros -->
                                        <div class="relative flex items-center justify-between mb-rois">
                                            <!-- Timeline line -->
                                            <div class="absolute border-2 border-gray-300 py-1 mt-3 top-1/2 left-0 right-0 timeline-line transform -translate-y-1/2 z-0"></div>

                                            <!-- Timeline points -->
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="a_r_e_3" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="a_r_e_5" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="a_r_e_10" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="a_r_e_15" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                        </div>

                                        <!-- Second Row - 12, 32, 92, 123 -->
                                        <div class="relative flex items-center justify-between mb-rois">
                                            <!-- Timeline line -->
                                            <div class="absolute border-2 border-gray-300 py-1 mt-3 top-1/2 left-0 right-0 timeline-line transform -translate-y-1/2 z-0"></div>

                                            <!-- Timeline points -->
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="b_r_e_3" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="b_r_e_5" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="b_r_e_10" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="b_r_e_15" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                        </div>

                                        <!-- Third Row - 12, 32, 92, 123 (duplicate) -->
                                        <div class="relative flex items-center justify-between">
                                            <!-- Timeline line -->
                                            <div class="absolute border-2 border-gray-300 py-1 mt-3 top-1/2 left-0 right-0 timeline-line transform -translate-y-1/2 z-0"></div>

                                            <!-- Timeline points -->
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="c_r_e_3" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="c_r_e_5" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="c_r_e_10" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                            <div class="timeline-circle w-12 h-12 md:w-16 md:h-16 rounded-full flex items-center justify-center z-10">
                                                <span id="c_r_e_15" class="timeline-number text-lg md:text-2xl"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                        {{-- <div id="chart_roi_base_a_ene_prod" name="chart_roi_base_a_ene_prod" style="width: 600px;"></div>
                        <div class="hidden" style="height:200px;"  id="chart_roi_base_a_ene_prod_print" name="chart_roi_base_a_ene_prod_print"></div> --}}
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
@include('modal_marr_retro')
{{-- <div class="w-full grid rounded-md justify-items-center mt-3">
    <div class="ancho border-2 border-blue-500 rounded-md grid">


        <div style="background-color:#1B17BB;" class="w-full flex justify-center">
            <div class="flex w-full justify-center mt-1">
                <p class="titulos_style ml-8">ROI v/s MARR (solo Energía)</p>
            </div>
            <div id="button_marrr" name="button_marrr" class="flex justify-end mt-2">
                <a href="#ir_modal_position_marr" onclick="mostrar_modal('modal_marr_retro');" class="btn_roundf_retro mr-5" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
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
                        <div class="hidden" style="height:250px;"  id="chart_roi_base_a_print" name="chart_roi_base_a_print"></div>
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
                        <div class="hidden "  style="height:250px;"  id="chart_roi_base_b_print" name="chart_roi_base_b_print"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- MARR --}}
{{-- <div class="w-full grid rounded-md justify-items-center mt-3">
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

                    <div class="w-1/2 flex justify-center">

                        <div id="chart_roi_base_b_ene_prod" name="chart_roi_base_b_ene_prod" style="width: 600px;"></div>
                        <div class="hidden "  style="height:200px;"  id="chart_roi_base_b_ene_prod_print" name="chart_roi_base_b_ene_prod_print"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- espacio hoja pagina 3 --}}
<div id="next_page_4" name="next_page_4" style="width: 80%; height:80px;" class="hidden">

</div>
{{-- espacio hoja pagina 3 --}}

{{-- principal --}}
<div id="principal_hoja_4" name="principal_hoja_4" class="hidden w-full grid rounded-md justify-items-center mt-3">
    <div  class="ancho border-2 border-blue-500 rounded-md flex">


        <div class="w-1/4 flex justify-center">
            <img src="{{asset('assets/images/Logotipo-HVACOPCOST.png')}}" alt="hvacopcost latinoamérica" class="img_porject mx-2">
        </div>

        <div class="w-1/3 grid justify-left ml-2">
            <div class="w-full flex ">
               <div id="name_no_print" name="name_no_print" class="w-full flex ">
                    <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project_res">{{$tar_ele->name }}</p>
               </div>

               <div id="name_print" name="name_print" class="hidden w-full flex ">
                <label class="info_project" for="">{{ __('index.nombre') }}:</label><p class="info_project_res">
                    @if (strlen($tar_ele->name) > 21)
                    {{substr($tar_ele->name, 0, 21)}}...
                    @endif

                    @if (strlen($tar_ele->name) < 21)
                    {{$tar_ele->name}}
                    @endif
                    </p>
               </div>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.categoria edificio') }}:</label><p class="info_project_res">{{$tar_ele->cad_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.tipo edificio') }}:</label><p class="info_project_res">{{$tar_ele->tipo_edi}}</p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.area') }}:</label><p class="info_project_res">{{number_format($tar_ele->area)}}
                    @if ($tar_ele->unidad == 'mc')
                    m²
                @endif

                @if ($tar_ele->unidad == 'ft')
                ft²
                @endif
                </p>
            </div>
            <div class="w-full flex">
                <label class="info_project" for="">{{ __('index.ocupacion semanal') }}:</label><p class="info_project_res">
                @switch($tar_ele->hrs_tiempo)
                    @case(30)
                        {{ __('index.menos de 50 hrs') }}.
                    @break

                    @case(80)
                        {{ __('index.51 a 167 hrs') }}.
                    @break

                    @case(168)
                        168 Hrs.
                    @break

                    @default

                @endswitch
                    </p>
            </div>
        </div>

        <div class="w-1/3 grid justify-left">
            <div class="w-full">
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.region') }}:</label><p class="info_project_res">{{$tar_ele->region}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.ciudad') }}:</label><p class="info_project_res">{{$tar_ele->ciudad}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.hors_enft_anual') }}:</label><p class="info_project_res">&nbsp;{{number_format($tar_ele->coolings_hours)}}</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.tar_ele') }}:</label><p class="info_project_res">{{$tar_ele->costo_elec}} $/Kwh</p>
                </div>
                <div class="w-full flex">
                    <label class="info_project" for="">{{ __('index.incremento anual energia') }}:</label><p class="info_project_res">{{$tar_ele->inflacion}}%</p>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- capex vs opex --}}
<div class="w-full grid rounded-md justify-items-center mt-3">
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
                <div class="hidden" id="chart_print" name="chart_print" style="width:370px;"></div>
            </div>

            <div class="w-1/2 flex justify-center">
                <div  id="chart_3" name="chart_3" style="width:600px;"></div>
                <div class="hidden" id="chart_3_print" name="chart_3_print" style="width:370px;"></div>
            </div>
        </div>

        <div class="flex w-full justify-center gap-x-1">
            <div class="w-1/2 flex justify-center">
                <div id="chart_5" name="chart_5" style="width:600px;"></div>
                <div class="hidden w-full" id="chart_5_print" name="chart_5_print" ></div>
            </div>

            <div class="w-1/2 flex justify-center">
                <div  id="chart_10" name="chart_10" style="width:600px;"></div>
                <div class="hidden w-full" id="chart_10_print" name="chart_10_print" ></div>
            </div>
        </div>

    </div>
</div>
{{-- capex vs opex --}}
{{-- caja_principal --}}
 @if (Auth::user()->tipo_user == 5)
    @include('components.hvac-chat')
 @endif
</div>
<script type="text/javascript">
    let dollarUSLocale = Intl.NumberFormat('en-US');
    var ener_lang = document.getElementById('ima_ener').value;
    var man_lang = document.getElementById('ima_man').value;
    var ima_sol = document.getElementById('ima_sol').value;
    google.charts.load('current', {'packages':['gauge']});
    var cons_ene_ele_ancho = 400;
    var cons_ene_ele_alto = 250;
    var cons_ene_ele_ancho_print = 210;
    var cons_ene_ele_alto_print = 140;
    var eui_print_width = 470;
    var eui_print_height = 140;
    var red_ene_print_height= 200;
    var red_ene_print_width= 370;
    var roi_height = 230;
    var roi_width = 370;
    var prod_lab_print_width= 230;
    var prod_lab_print_height= 170;
    var capex_opex_print_height= 260;
    var capex_opex_print_width= 370;
    var pais='{{$tar_ele->region}}';
document.addEventListener('keydown', function(event) {
  if (event.ctrlKey && event.key === 'p') {
    //$("#navbar").removeClass("hidden");
    $("#principal_hoja_2").removeClass("hidden");
    $("#principal_hoja_3").removeClass("hidden");
    $("#principal_hoja_4").removeClass("hidden");
    $("#next_page_3").removeClass("hidden");
    $("#next_page_4").removeClass("hidden");

    $("#chart_cons_ene_hvac_ar_base").width(200).height(150);
    $("#chart_cons_ene_hvac_ar_a").width(200).height(150);
    $("#chart_cons_ene_hvac_ar_b").width(200).height(150);
    $("#chart_red_ene").width(200).height(120);
    $("#chart_descarb").width(200).height(120);
    $("#chart").width(200).height(120);
    $("#art_3").width(200).height(120);
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
    $("#button_prod").addClass("hidden");
    $("#button_marrr").addClass("hidden");
    $("#navbar").addClass("hidden");
    $("#principal_hoja_2").removeClass("hidden");
    $("#name_no_print").addClass("hidden");
    $("#name_print").removeClass("hidden");
    $("#name_no_print_2").addClass("hidden");
    $("#name_print_2").removeClass("hidden");
    $("#name_no_print_3").addClass("hidden");
    $("#name_print_3").removeClass("hidden");
    $("#name_no_print_4").addClass("hidden");
    $("#name_print_4").removeClass("hidden");
    $("#principal_hoja_3").removeClass("hidden");
    $("#principal_hoja_4").removeClass("hidden");
    if('{{$prim_buil_check->id_cat_edifico}}' == 3 ||'{{$prim_buil_check->id_cat_edifico}}' == 7 || '{{$prim_buil_check->id_cat_edifico}}' == 8 || '{{$prim_buil_check->id_cat_edifico}}' == 9 || '{{$prim_buil_check->id_cat_edifico}}' == 10 || '{{$prim_buil_check->id_cat_edifico}}' == 11){
        $("#next_page_3_cushobe").removeClass("hidden");
    }else{
        $("#next_page_3").removeClass("hidden");
    }
    $("#next_page_4").removeClass("hidden");
    $("#chart_cons_ene_hvac_ar_base").width(210).height(120);
    $("#chart_cons_ene_hvac_ar_a").width(210).height(120);
    $("#chart_cons_ene_hvac_ar_b").width(210).height(120);
    $("#chart_red_ene").width(200).height(120);
    $("#chart_descarb").width(200).height(120);
    $("#chart_red_ene_print").width(360).height(200);
    $("#chart_descarb_print").width(360).height(200);
    $("#chart").width(200).height(120);
    $("#chart_3").width(200).height(120);
    $("#chart_5_print").width(380).height(200);
    $("#chart_10_print").width(380).height(200);
    con_ene_hvac_ar_Base_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b_print('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    $('#chart_red_ene').addClass("hidden");
    $("#chart_descarb").addClass("hidden");
    $("#eui_sol_base").addClass("hidden");
    $("#eui_sol_a").addClass("hidden");
    $("#eui_sol_b").addClass("hidden");
     $('#chart_cu_sho_Be_base').addClass("hidden");
    $("#chart_cu_sho_Be_a").addClass("hidden");
    $('#chart_cu_sho_Be_b').addClass("hidden");
    $('#chart_red_ene_print').removeClass("hidden");
    $("#chart_descarb_print").removeClass("hidden");
    $('#chart_print').removeClass("hidden");
    $("#chart_3_print").removeClass("hidden");
    $('#chart').addClass("hidden");
    $("#chart_3").addClass("hidden");
    $("#chart_5_print").removeClass("hidden");
    $("#chart_5").addClass("hidden");
    $("#chart_10_print").removeClass("hidden");
    $('#chart_10').addClass("hidden");
    $("#espacio_pagina_1").removeClass("hidden");
    $('#eui_sol_base_print').removeClass("hidden");
    $("#eui_sol_a_print").removeClass("hidden");
    $('#eui_sol_b_print').removeClass("hidden");
     $('#chart_cu_sho_Be_base_print').removeClass("hidden");
    $("#chart_cu_sho_Be_a_print").removeClass("hidden");
    $('#chart_cu_sho_Be_b_print').removeClass("hidden");
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
      $('#modal_loding').addClass("hidden");
      $('#caja_principal').removeClass("hidden");
      roi_s_ene('{{$id_project}}');
      roi_ene_prod('{{$id_project}}');
      roi_s_ene_print('{{$id_project}}');
      roi_ene_prod_print('{{$id_project}}');
      /* roi_base_b_ene_prod('{{$id_project}}','{{$costo_base}}','{{$costo_b}}');
      roi_base_a_ene_prod('{{$id_project}}','{{$costo_base}}','{{$costo_a}}');
      roi_base_a_ene_prod_print('{{$id_project}}','{{$costo_base}}','{{$costo_a}}');
      roi_base_b_ene_prod_print('{{$id_project}}','{{$costo_base}}','{{$costo_b}}');
      roi_base_a('{{$id_project}}');
      roi_base_b('{{$id_project}}');
      roi_base_a_print('{{$id_project}}');
      roi_base_b_print('{{$id_project}}'); */

    };

$(document).ready(function() {
    google.charts.load('current', {'packages':['gauge']});
    con_ene_hvac_ar_Base('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_a('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');
    con_ene_hvac_ar_b('{{$kwh_yr}}','{{$tar_ele->porcent_hvac}}');

      google.charts.setOnLoadCallback(chart_base_eui_print);
      google.charts.setOnLoadCallback(chart_a_eui_print);
      google.charts.setOnLoadCallback(chart_b_eui_print);
      google.charts.setOnLoadCallback(chart_cu_sho_Be_base_print);
      google.charts.setOnLoadCallback(chart_cu_sho_Be_a_print);
      google.charts.setOnLoadCallback(chart_cu_sho_Be_b_print);
      red_ene('{{$dif_1}}','{{$dif_2}}');
      descarb('{{$dif_1}}','{{$dif_2}}');
      red_ene_print('{{$dif_1}}','{{$dif_2}}');
      descarb_print('{{$dif_1}}','{{$dif_2}}');
      confort_base('{{$conf_val_base}}');
      confort_a('{{$conf_val_a}}');
      confort_b('{{$conf_val_b}}');
      chart_prod_base();
      chart_prod_a();
      chart_prod_b();
      cap_op_1_retro('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_3_retro('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_5_retro('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_10_retro('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_1_retro_print('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_3_retro_print('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_5_retro_print('{{$id_project}}','{{$tar_ele->unidad}}');
      cap_op_10_retro_print('{{$id_project}}','{{$tar_ele->unidad}}');


      google.charts.setOnLoadCallback(chart_base_eui);
      google.charts.setOnLoadCallback(chart_a_eui);
      google.charts.setOnLoadCallback(chart_b_eui);
      google.charts.setOnLoadCallback(chart_cu_sho_Be_base);
      google.charts.setOnLoadCallback(chart_cu_sho_Be_a);
      google.charts.setOnLoadCallback(chart_cu_sho_Be_b);

});
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
  width:cons_ene_ele_ancho,
  height:cons_ene_ele_alto,
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
          '<span color="%color">'+dollarUSLocale.format(parseInt(result_area))+'</span><br/><span color="#696969" fontSize="20px">Kwh/m²</span>',
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
  width:cons_ene_ele_ancho,
  height:cons_ene_ele_alto,
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
          '<span color="%color">'+dollarUSLocale.format(parseInt(result_area))+'</span><br/><span color="#696969" fontSize="20px">Kwh/m²</span>',
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
  width:cons_ene_ele_ancho,
  height:cons_ene_ele_alto,
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
          '<span color="%color">'+dollarUSLocale.format(parseInt(result_area))+'</span><br/><span color="#696969" fontSize="20px">Kwh/m²</span>',
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

function red_ene(dif,dif_2){

    $.ajax({
            type: 'get',
            url: '/red_en_mw_grafic/'+ dif + '/' + dif_2,
            success: function (response) {
                var options = {
                    series: [
                    {
                    name:'Solución A',
                    data: [response[0][0], response[0][1], response[0][2], response[0][3], response[0][4]]
                    },
                    {
                    name:'Solución B',
                    data: [response[1][0], response[1][1], response[1][2], response[1][3], response[1][4]]
                    }
                    ],
                    chart: {
                    height: 390,
                    type: 'line',
                    dropShadow: {
                    enabled: true,
                    color: '#000',
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

            },
            error: function (responsetext) {
                console.log(responsetext);
            }
        });
//console.log(res);

}

function descarb(dif,dif_2){
$.ajax({
            type: 'get',
            url: '/red_hu_carb_grafic/'+ dif + '/' + dif_2,
            success: function (response) {
                var options = {
                    series: [
                    {
                    name:'Solución A',
                    data: [response[0][0], response[0][1], response[0][2], response[0][3], response[0][4]]
                    },
                    {
                    name:'Solución B',
                    data: [response[1][0], response[1][1], response[1][2], response[1][3], response[1][4]]
                    }
                    ],
                    chart: {
                    height: 390,
                    type: 'line',
                    dropShadow: {
                    enabled: true,
                    color: '#000',
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

                    var chart = new ApexCharts(document.querySelector("#chart_descarb"), options);
                    chart.render();

            },
            error: function (responsetext) {
                console.log(responsetext);
            }
        });


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
                width: 20,
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
                    parseFloat(interpolacion).toFixed(1)+'%'+'<br/> <span style="fontSize: 30">'+message+'</span>',
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
                    size: 35
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
                width: 20,
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
                    parseFloat(interpolacion).toFixed(1)+'%'+'<br/> <span style="fontSize: 30">'+message+'</span>',
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
                    size: 35
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
                width: 20,
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
                    parseFloat(interpolacion).toFixed(1)+'%'+'<br/> <span style="fontSize: 30">'+message+'</span>',
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
                    size: 35
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
        var vals_min = parseInt(Math.min(res[2][0], res[1][0], res[0][0]));
        var vals_min_string = vals_min.toString();

        if(pais != 'Colombia'){
             var fontSize_cap_op = '14px';
        }

        if(pais == 'Colombia'){
            var fontSize_cap_op = '11px';
        }
        /* if(vals_min.length > 5){
             var fontSize_cap_op = '14px';
        }

        if(vals_min_string.length <= 5 && vals_min_string.length > 0){
            var fontSize_cap_op = '11px';
        } */
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
                fontSize: fontSize_cap_op,
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
            var vals_min = parseInt(Math.min(res[2][0], res[1][0], res[0][0]));
        var vals_min_string = vals_min.toString();

        if(pais != 'Colombia'){
             var fontSize_cap_op = '14px';
        }

        if(pais == 'Colombia'){
            var fontSize_cap_op = '11px';
        }
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
                    fontSize: fontSize_cap_op,
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

function cap_op_5_retro(id_project,unidad){
    $.ajax({
        type: 'get',
        url: "/cap_op_5_retro/" + id_project,
        success: function (res) {
            if (res[2][0] > 0 || res[2][0] != null && res[1][0] > 0 || res[1][0] != null) {
            var vals_min = parseInt(Math.min(res[2][0], res[1][0], res[0][0]));
            var vals_min_string = vals_min.toString();

            if(pais != 'Colombia'){
             var fontSize_cap_op = '14px';
        }

        if(pais == 'Colombia'){
            var fontSize_cap_op = '11px';
        }
    }

    if (res[2][0] <= 0 || res[2][0] == null && res[1][0] > 0 || res[1][0] != null) {

        if(pais != 'Colombia'){
             var fontSize_cap_op = '14px';
        }

        if(pais == 'Colombia'){
            var fontSize_cap_op = '11px';
        }

    }

    if (res[2][0] <= 0 || res[2][0] == null && res[1][0] <= 0 || res[1][0] == null) {

    var vals_min = parseInt(res[0][0]);
    var vals_min_string = vals_min.toString();

    if(pais != 'Colombia'){
             var fontSize_cap_op = '14px';
        }

        if(pais == 'Colombia'){
            var fontSize_cap_op = '11px';
        }

    }
            var options = {
        series: [{
        name: 'CAPEX',
        data: [res[2][0], res[1][0]]
        },{
        name: ener_lang + ' OPEX',
        data: [res[2][1], res[1][1]]
        },{
        name: man_lang + ' OPEX',
        data: [res[2][2], res[1][2]]
        }],
        chart: {
        type: 'bar',
        height: 300,
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
            text: '5 Años',
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
        categories: ['Solución B', 'Solución A'],
        labels: {
                hideOverlappingLabels: true,
                style: {
                    colors: [],
                    fontSize: fontSize_cap_op,
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-xaxis-label',
                },

            },
        },
        yaxis: {
            labels: {
                hideOverlappingLabels: true,
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
        colors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)']
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
        fillColors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)'],
        radius: 12,
        customHTML: undefined,
        onClick: undefined,
        offsetX: 0,
        offsetY: 0,
    },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart_5"), options);
        chart.render();

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });

}

function cap_op_10_retro(id_project,unidad){
    $.ajax({
        type: 'get',
        url: "/cap_op_10_retro/" + id_project,
        success: function (res) {
            if (res[2][0] > 0 || res[2][0] != null && res[1][0] > 0 || res[1][0] != null) {
            var vals_min = parseInt(Math.min(res[2][0], res[1][0], res[0][0]));
            var vals_min_string = vals_min.toString();

            if(pais != 'Colombia'){
             var fontSize_cap_op = '14px';
            }

            if(pais == 'Colombia'){
                var fontSize_cap_op = '11px';
            }
    }

    if (res[2][0] <= 0 || res[2][0] == null && res[1][0] > 0 || res[1][0] != null) {

            var vals_min = parseInt(Math.min(res[1][0], res[0][0]));
            var vals_min_string = vals_min.toString();

            if(pais != 'Colombia'){
             var fontSize_cap_op = '14px';
            }

            if(pais == 'Colombia'){
                var fontSize_cap_op = '11px';
            }

    }

    if (res[2][0] <= 0 || res[2][0] == null && res[1][0] <= 0 || res[1][0] == null) {

    var vals_min = parseInt(res[0][0]);
    var vals_min_string = vals_min.toString();

            if(pais != 'Colombia'){
             var fontSize_cap_op = '14px';
            }

            if(pais == 'Colombia'){
                var fontSize_cap_op = '11px';
            }

    }
            var options = {
        series: [{
        name: 'CAPEX',
        data: [res[2][0], res[1][0]]
        },{
        name: ener_lang + ' OPEX',
        data: [res[2][1], res[1][1]]
        },{
        name: man_lang + ' OPEX',
        data: [res[2][2], res[1][2]]
        }],
        chart: {
        type: 'bar',
        height: 300,
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
            text: '10 Años',
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
        categories: ['Solución B', 'Solución A'],
        labels: {
                hideOverlappingLabels: true,
                style: {
                    colors: [],
                    fontSize: fontSize_cap_op,
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-xaxis-label',
                },

            },
        },
        yaxis: {
            labels: {
                hideOverlappingLabels: true,
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
        colors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)']
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
        fillColors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)'],
        radius: 12,
        customHTML: undefined,
        onClick: undefined,
        offsetX: 0,
        offsetY: 0,
    },
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart_10"), options);
        chart.render();

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });

}

function roi_s_ene(id_project){
    var counter_val_prod_ene = document.getElementById('counter_val_prod_ene').value;

/* if(counter_val_prod_ene == 0){
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
}

if(counter_val_prod_ene == 1){
    var inv_ini_2 = document.getElementById('inv_ini_1').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
}

if(counter_val_prod_ene == 2){
    var inv_ini_2 = document.getElementById('inv_ini_1').value;
    var inv_ini_3 = document.getElementById('inv_ini_2').value;
} */

    var inv_ini_1 = document.getElementById('inv_ini_1').value;
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;

var dif_1_cost = document.getElementById('dif_cost_base_a').value;

var dif_2_cost = document.getElementById('dif_cost_base_b').value;



    var consumo_ene_anual_a = '{{$sumaopex_1*$tar_ele->costo_elec}}'
    var consumo_ene_anual_b = '{{$sumaopex_2*$tar_ele->costo_elec}}'
    var consumo_ene_anual_c = '{{$sumaopex_3*$tar_ele->costo_elec}}'

    $.ajax({
        type: 'get',
        url: "/roi_only_energy/" + id_project + '/' + consumo_ene_anual_a + '/' + consumo_ene_anual_b + '/' + consumo_ene_anual_c + '/' + inv_ini_1 + '/' + inv_ini_2 + '/' + inv_ini_3,
        success: function (res) {

            document.getElementById('a_s_e_3').innerHTML = res[0][0];
            document.getElementById('a_s_e_5').innerHTML = res[0][1];
            document.getElementById('a_s_e_10').innerHTML = res[0][2];
            document.getElementById('a_s_e_15').innerHTML = res[0][3];

            document.getElementById('b_s_e_3').innerHTML = res[1][0];
            document.getElementById('b_s_e_5').innerHTML = res[1][1];
            document.getElementById('b_s_e_10').innerHTML = res[1][2];
            document.getElementById('b_s_e_15').innerHTML = res[1][3];

            document.getElementById('c_s_e_3').innerHTML = res[2][0];
            document.getElementById('c_s_e_5').innerHTML = res[2][1];
            document.getElementById('c_s_e_10').innerHTML = res[2][2];
            document.getElementById('c_s_e_15').innerHTML = res[2][3];

    /* var options = {
          series: [
          {
            name: "Existente",
            data: [res[0][0], res[0][1], res[0][2], res[0][3]]
          },
          {
            name: "A",
            data: [res[1][0], res[1][1], res[1][2], res[1][3]]
          },
          {
            name: "B",
            data: [res[2][0], res[2][1], res[2][2], res[2][3]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
          height: 390,
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
        colors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
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
            text: '',
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
          position: 'bottom',
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
          fillColors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
          radius: 12,
          customHTML: undefined,
          onClick: undefined,
          offsetX: 0,
          offsetY: 0,
      },

        }
        }; */

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_a"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function roi_ene_prod(id_project){
    var counter_val_prod_ene = document.getElementById('counter_val_prod_ene').value;

if(counter_val_prod_ene == 0){
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
    var costo_base = '{{$costo_base}}';
    var costo_a = '{{$costo_a}}';
    var costo_b = '{{$costo_b}}';
}

if(counter_val_prod_ene == 1){
    var inv_ini_2 = document.getElementById('inv_ini_1').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
    var costo_base = '{{$costo_a}}';
    var costo_a = '{{$costo_base}}';
    var costo_b = '{{$costo_b}}';
}
if(counter_val_prod_ene == 2){
    var inv_ini_2 = document.getElementById('inv_ini_1').value;
    var inv_ini_3 = document.getElementById('inv_ini_2').value;
    var costo_base = '{{$costo_b}}';
    var costo_a = '{{$costo_base}}';
    var costo_b = '{{$costo_a}}';
}

var dif_1_cost = document.getElementById('dif_cost_base_a').value;

var dif_2_cost = document.getElementById('dif_cost_base_b').value;

    /* var dif_1_cost = document.getElementById('dif_cost_base_a').value;
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    var dif_2_cost = document.getElementById('dif_cost_base_b').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value; */
    var consumo_ene_anual_a = '{{$sumaopex_1*$tar_ele->costo_elec}}'
    var consumo_ene_anual_b = '{{$sumaopex_2*$tar_ele->costo_elec}}'
    var consumo_ene_anual_c = '{{$sumaopex_3*$tar_ele->costo_elec}}'

    $.ajax({
        type: 'get',
        url: '/check_marino/'+ id_project,
        success: function (response) {
            if(response == 1){
                 var ano_a = 1;
                 var ano_b = 3;
                 var ano_c = 5;
                 var ano_d = 10;
            }else{
                 var ano_a = 3;
                 var ano_b = 5;
                 var ano_c = 10;
                 var ano_d = 15;

            }


            $.ajax({
                    type: 'get',
                    url: "/roi_ene_prod/" + id_project + '/' + dif_1_cost + '/' + inv_ini_2 +'/'+ costo_base +'/'+ costo_a +'/'+ dif_2_cost + '/' + inv_ini_3 +'/'+ costo_b +'/'+ consumo_ene_anual_a +'/'+ consumo_ene_anual_b +'/'+ consumo_ene_anual_c +'/'+counter_val_prod_ene,
                    success: function (res) {

            document.getElementById('yrs_r_e_3').innerHTML = ano_a + " años";
            document.getElementById('yrs_r_e_5').innerHTML = ano_b + " años";
            document.getElementById('yrs_r_e_10').innerHTML = ano_c + " años";
            document.getElementById('yrs_r_e_15').innerHTML = ano_d + " años";

            document.getElementById('a_r_e_3').innerHTML = res[0][0];
            document.getElementById('a_r_e_5').innerHTML = res[0][1];
            document.getElementById('a_r_e_10').innerHTML = res[0][2];
            document.getElementById('a_r_e_15').innerHTML = res[0][3];

            document.getElementById('b_r_e_3').innerHTML = res[1][0];
            document.getElementById('b_r_e_5').innerHTML = res[1][1];
            document.getElementById('b_r_e_10').innerHTML = res[1][2];
            document.getElementById('b_r_e_15').innerHTML = res[1][3];

            document.getElementById('c_r_e_3').innerHTML = res[2][0];
            document.getElementById('c_r_e_5').innerHTML = res[2][1];
            document.getElementById('c_r_e_10').innerHTML = res[2][2];
            document.getElementById('c_r_e_15').innerHTML = res[2][3];
                        //console.log(res);
                /* var options = {
                    series: [
                        {
                        name: "ROI - Existente",
                        data: [res[0][0], res[0][1], res[0][2], res[0][3]]
                    },
                    {
                        name: "ROI - A",
                        data: [res[1][0], res[1][1], res[1][2], res[1][3]]
                    },
                    {
                        name: "ROI - B",
                        data: [res[2][0], res[2][1], res[2][2], res[2][3]]
                    },
                    {
                        name: "MARR",
                        data: [45, 75, 150, 225]
                    }
                    ],
                    chart: {
                    height: 390,
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
                    colors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
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
                    categories: [ano_a,ano_b,ano_c,ano_d],
                    range:4,
                    title: {
                        text: '',
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
                    fillColors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
                    radius: 12,
                    customHTML: undefined,
                    onClick: undefined,
                    offsetX: 0,
                    offsetY: 0,
                },

                    }
                    }; */

                    var chart = new ApexCharts(document.querySelector("#chart_roi_base_a_ene_prod"), options);
                    chart.render();
                    },
                    error: function (responsetext) {
                        console.log(responsetext);
                    }
                });

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
            name: "ROI - B",
            data: [15, 65, 98, 98]
          },
          {
            name: "ROI - C",
            data: [12, 20, 45, 68]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
          height: 390,
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
        colors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
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
          fillColors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
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
            name: "ROI - A",
            data: [11, 20, 67, 78]
          },
          {
            name: "ROI - B",
            data: [res[0], res[1], res[2], res[3]]
          },
          {
            name: "ROI - C",
            data: [12, 22, 35, 45]
          },
          {
            name: "MARR",
             data: [45, 75, 150, 225]
          }
        ],
          chart: {
          height: 390,
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
        colors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
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
          fillColors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
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
          height: 390,
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
          height: 390,
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

function chart_cu_sho_Be_base() {
        var check_prod = '{{$conf_val_base}}';
        var mult_cels_val = check_prod * 5;
        var val_res = mult_cels_val / 5;
        //un decumal
        var number = check_prod
        var rounded = Math.round(number * 10) / 10
        var datax = google.visualization.arrayToDataTable([
          ['Label','Value'],
          ['Base',rounded],
        ]);

        var options = {
            width: 550, height: 280,
  yellowColor:'ffff00',
  greenFrom:4,greenTo:5,
  redFrom: 1, redTo: 2,
  yellowFrom:2, yellowTo: 4,
  minorTicks: 5,
  max:5,
  min:1,
};

        var chart = new google.visualization.Gauge(document.getElementById('chart_cu_sho_Be_base'));

        chart.draw(datax, options);

      }
function chart_cu_sho_Be_a() {
        var check_prod_a = '{{$conf_val_a}}';

        //un decumal
        var number_a = check_prod_a
        var rounded_a = Math.round(number_a * 10) / 10

        var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['A', rounded_a],
        ]);


        var options = {
            width: 550, height: 280,
  yellowColor:'ffff00',
  greenFrom:4,greenTo:5,
  redFrom: 1, redTo: 2,
  yellowFrom:2, yellowTo: 4,
  minorTicks: 5,
  max:5,
  min:1,
};

var chart = new google.visualization.Gauge(document.getElementById('chart_cu_sho_Be_a'));

chart.draw(data, options);
}

function chart_cu_sho_Be_b() {
    var check_prod_b = '{{$conf_val_b}}';

     //un decumal
     var number_b = check_prod_b
     var rounded_b = Math.round(number_b * 10) / 10
var data = google.visualization.arrayToDataTable([
  ['Label', 'Value'],
  ['B', rounded_b],
]);


    var options = {
        width: 550, height: 280,
  yellowColor:'ffff00',
  greenFrom:4,greenTo:5,
  redFrom: 1, redTo: 2,
  yellowFrom:2, yellowTo: 4,
  minorTicks: 5,
  max:5,
  min:1,
};

var chart = new google.visualization.Gauge(document.getElementById('chart_cu_sho_Be_b'));

chart.draw(data, options);
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
  width:cons_ene_ele_ancho_print,
  height:cons_ene_ele_alto_print,
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
          '<span color="%color">'+dollarUSLocale.format(parseInt(result_area))+'</span><br/><span color="#696969" fontSize="15px">Kwh/m²</span>',
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
  width:cons_ene_ele_ancho_print,
  height:cons_ene_ele_alto_print,
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
          '<span color="%color">'+dollarUSLocale.format(parseInt(result_area))+'</span><br/><span color="#696969" fontSize="15px">Kwh/m²</span>',
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
  width:cons_ene_ele_ancho_print,
  height:cons_ene_ele_alto_print,
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
          '<span color="%color">'+dollarUSLocale.format(parseInt(result_area))+'</span><br/><span color="#696969" fontSize="15px">Kwh/m²</span>',
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

        if(parseInt(energy) > parseInt(ashrae)){
            var options = {
          width: 550, height: 280,
          greenFrom:1,greenTo:ashrae,
          redFrom: energy, redTo:400,
          yellowFrom:ashrae, yellowTo: energy,
          minorTicks: 5,
          max:400,
          min:1,
        };
        }

        if(parseInt(energy) < parseInt(ashrae)){
            var options = {
          width: 550, height: 280,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 400,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:400,
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

        if(parseInt(energy) > parseInt(ashrae)){
            var options = {
          width: 550, height: 280,
          greenFrom:1,greenTo:ashrae,
          redFrom: energy, redTo: 400,
          yellowFrom:ashrae, yellowTo: energy,
          minorTicks: 5,
          max:400,
          min:1,
        };
        }

        if(parseInt(energy) < parseInt(ashrae)){
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

            if(parseInt(energy) > parseInt(ashrae)){
                    var options = {
                width: 550, height: 280,
                greenFrom:1,greenTo:ashrae,
                redFrom: energy, redTo: 400,
                yellowFrom:ashrae, yellowTo: energy,
                minorTicks: 5,
                max:400,
                min:1,
                };
                }

                if(parseInt(energy) < parseInt(ashrae)){
                    var options = {
                width: 550, height: 280,
                greenFrom:1,greenTo:energy,
                redFrom: ashrae, redTo: 400,
                yellowFrom:energy, yellowTo: ashrae,
                minorTicks: 5,
                max:400,
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

        if(parseInt(energy) > parseInt(ashrae)){
            var options = {
                width: eui_print_width, height: eui_print_height,
          greenFrom:1,greenTo:ashrae,
          redFrom: energy, redTo: 400,
          yellowFrom:ashrae, yellowTo: energy,
          minorTicks: 5,
          max:400,
          min:1,
        };
        }

        if(parseInt(energy) < parseInt(ashrae)){
            var options = {
                width: eui_print_width, height: eui_print_height,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 400,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:400,
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

        if(parseInt(energy) > parseInt(ashrae)){
            var options = {
                 width: eui_print_width, height: eui_print_height,
          greenFrom:1,greenTo:ashrae,
          redFrom: energy, redTo: 400,
          yellowFrom:ashrae, yellowTo: energy,
          minorTicks: 5,
          max:400,
          min:1,
        };
        }

        if(parseInt(energy) < parseInt(ashrae)){
            var options = {
                 width: eui_print_width, height: eui_print_height,
          greenFrom:1,greenTo:energy,
          redFrom: ashrae, redTo: 400,
          yellowFrom:energy, yellowTo: ashrae,
          minorTicks: 5,
          max:400,
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

            if(parseInt(energy) > parseInt(ashrae)){
                    var options = {
                         width: eui_print_width, height: eui_print_height,
                greenFrom:1,greenTo:ashrae,
                redFrom: energy, redTo: 400,
                yellowFrom:ashrae, yellowTo: energy,
                minorTicks: 5,
                max:400,
                min:1,
                };
                }

                if(parseInt(energy) < parseInt(ashrae)){
                    var options = {
                         width: eui_print_width, height: eui_print_height,
                greenFrom:1,greenTo:energy,
                redFrom: ashrae, redTo: 400,
                yellowFrom:energy, yellowTo: ashrae,
                minorTicks: 5,
                max:400,
                min:1,
                };
                }

            var chart = new google.visualization.Gauge(document.getElementById('eui_sol_b_print'));

            chart.draw(data, options);
        }


    }

    function red_ene_print(dif,dif_2){

        $.ajax({
        type: 'get',
         url: '/red_en_mw_grafic/'+ dif + '/' + dif_2,
        success: function (response) {
            var options = {
          series: [
          {
          name:'Solución A',
          data: [response[0][0], response[0][1], response[0][2], response[0][3], response[0][4]]
          },
          {
          name:'Solución B',
          data: [response[1][0], response[1][1], response[1][2], response[1][3], response[1][4]]
          }
        ],
          chart: {
          offsetX: 0,
          offsetY: 0,
          bottom:0,
          height:red_ene_print_height,
          width:red_ene_print_width,
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
                fontSize: '10px',
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
            fontSize: '16px',
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
                    fontSize: '10px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '10px',
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
                    fontSize: '11px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },

        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          offsetX: 40,
          fontSize: '10px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 8,
          height: 8,
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


        },
        error: function (responsetext) {

        }
    });

            //console.log(res);

}

function descarb_print(dif,dif_2){

        $.ajax({
            type: 'get',
            url: '/red_hu_carb_grafic/'+ dif + '/' + dif_2,
            success: function (response) {
                var options = {
          series: [
            {
            name:'Solución A',
            data: [response[0][0], response[0][1], response[0][2], response[0][3], response[0][4]]
            },
            {
            name:'Solución B',
            data: [response[1][0], response[1][1], response[1][2], response[1][3], response[1][4]]
            }
        ],
          chart: {
            height:red_ene_print_height,
          width:red_ene_print_width,
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
                fontSize: '10px',
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
            fontSize: '16px',
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
                    fontSize: '10px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '10px',
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
                    fontSize: '11px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
        },
        legend: {
          position: 'top',
          horizontalAlign: 'right',
          offsetX: 40,
          fontSize: '10px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 8,
          height: 8,
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

        var chart = new ApexCharts(document.querySelector("#chart_descarb_print"), options);
        chart.render();

            },
            error: function (responsetext) {
                console.log(responsetext);
            }
        });
}

function chart_prod_base_print() {
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
            width:prod_lab_print_width,
            height:prod_lab_print_height,
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
                width: 8,
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
                    parseFloat(interpolacion).toFixed(1)+'<br/> <span style="fontSize: 20">'+message+'</span>',
                    style: { fontSize: 30 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                       width: 7,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 15
                    }
                },
                points: [[1, parseFloat(interpolacion)]]
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

            var interpolacion = interp(check_prod_a);
            var message = message_prod_lab_chart(interpolacion);
            var chart = JSC.chart('chart_prod_a', {
            debug: true,
            type: 'gauge ',
            legend_visible: false,
            width:prod_lab_print_width,
            height:prod_lab_print_height,
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
                width: 8,
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
                    parseFloat(interpolacion).toFixed(1)+'<br/> <span style="fontSize: 20">'+message+'</span>',
                    style: { fontSize: 30 }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                        width: 7,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 15
                    }
                },
                points: [[1, parseFloat(interpolacion)]]
                }
            ]
            });
}



function chart_prod_b_print() {
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
            width:prod_lab_print_width,
            height:prod_lab_print_height,
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
                width: 8,
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
                    parseFloat(interpolacion).toFixed(1)+'<br/> <span style="fontSize: 20">'+message+'</span>',
                    style: { fontSize: 30  }
                },
                defaultPoint: {
                    tooltip: '%yValue',
                    marker: {
                    outline: {
                        width: 7,
                        color: 'currentColor'
                    },
                    fill: 'white',
                    type: 'circle',
                    visible: true,
                    size: 15
                    }
                },
                points: [[1, parseFloat(interpolacion)]]
                }
            ]
            });
}

function cap_op_1_retro_print(id_project,unidad){

$.ajax({
    type: 'get',
    url: "/cap_op_1_retro/" + id_project,
    success: function (res) {

        var vals_min = parseInt(Math.min(res[2][0], res[1][0], res[0][0]));
        var vals_min_string = vals_min.toString();

        if(vals_min_string.length > 5 || vals_min_string.length == 1){
            var fontSize_cap_op = '6.1px';

        }

        if(vals_min_string.length <= 5 && vals_min_string.length > 1){
            var fontSize_cap_op = '8px';
        }

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
      height: capex_opex_print_height,
      width: capex_opex_print_width,
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
            fontSize: '10px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: 'bold',
        },
    },
    title: {
      text: '1 Año',
      align: 'center',
      offsetY:20,
      style: {
        fontWeight:  'bold',
        fontSize: '15px',
        fontFamily: 'ABeeZee, sans-serif',
        fontWeight: "bold",
        cssClass: 'apexcharts-yaxis-label',
        color: '#000',
      },
    },
    xaxis: {
      categories: ['Solución B', 'Solución A', 'Sistema Exis...'],
      labels: {
            style: {
                colors: [],
                fontSize: fontSize_cap_op,
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
                fontSize: '12px',
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
      width: '100%',
      opacity: 1,
      colors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)','#7CDF7C'],

    },
    legend: {
      position: 'top',
      horizontalAlign: 'left',
      offsetX: 40,
      fontSize: '8px',
      fontFamily: 'ABeeZee, sans-serif',
      fontWeight: 'bold',
      markers: {
      width: 8,
      height: 8,
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

         var vals_min = parseInt(Math.min(res[2][0], res[1][0], res[0][0]));
        var vals_min_string = vals_min.toString();

        if(vals_min_string.length > 5 || vals_min_string.length == 1){
            var fontSize_cap_op = '6.1px';

        }

        if(vals_min_string.length <= 5 && vals_min_string.length > 1){
            var fontSize_cap_op = '8px';
        }
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
          height: capex_opex_print_height,
          width: capex_opex_print_width,
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
                fontSize: '10px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: 'bold',
            },
        },
        title: {
            text: '3 Años',
            align: 'center',
            offsetY:20,
            style: {
            fontSize: '15px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: "bold",
            cssClass: 'apexcharts-yaxis-label',
            color: '#000',
          },
        },
        xaxis: {
          categories: ['Solución B', 'Solución A', 'Sistema Exis...'],
          labels: {
                style: {
                    colors: [],
                    fontSize: fontSize_cap_op,
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
                    fontSize: '12px',
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
          fontSize: '8px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 8,
          height: 8,
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

function cap_op_5_retro_print(id_project,unidad){
    $.ajax({
        type: 'get',
        url: "/cap_op_5_retro/" + id_project,
        success: function (res) {

         var vals_min = parseInt(Math.min(res[2][0], res[1][0]));
        var vals_min_string = vals_min.toString();

        if(vals_min_string.length > 5 || vals_min_string.length == 1){
            var fontSize_cap_op = '6.1px';
        }

        if(vals_min_string.length <= 5 && vals_min_string.length > 1){
            var fontSize_cap_op = '8px';
        }
            var options = {
          series: [{
          name: 'CAPEX',
          data: [res[2][0], res[1][0]]
        },{
          name: ener_lang + ' OPEX',
          data: [res[2][1], res[1][1]]
        },{
          name: man_lang + ' OPEX',
          data: [res[2][2], res[1][2]]
        }],
          chart: {
          type: 'bar',
          height: 210,
          width: capex_opex_print_width,
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
                fontSize: '10px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: 'bold',
            },
        },
        title: {
            text: '5 Años',
            align: 'center',
            offsetY:20,
            style: {
            fontSize: '15px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: "bold",
            cssClass: 'apexcharts-yaxis-label',
            color: '#000',
          },
        },
        xaxis: {
          categories: ['Solución B', 'Solución A'],
          labels: {
                style: {
                    colors: [],
                    fontSize: fontSize_cap_op,
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
                    fontSize: '12px',
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
          fontSize: '8px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 8,
          height: 8,
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

        var chart = new ApexCharts(document.querySelector("#chart_5_print"), options);
        chart.render();

        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });

}

function cap_op_10_retro_print(id_project,unidad){
    $.ajax({
        type: 'get',
        url: "/cap_op_10_retro/" + id_project,
        success: function (res) {

         var vals_min = parseInt(Math.min(res[2][0], res[1][0]));
        var vals_min_string = vals_min.toString();

        if(vals_min_string.length > 5 || vals_min_string.length == 1){
             var fontSize_cap_op = '6.1px';

        }

        if(vals_min_string.length <= 5 && vals_min_string.length > 1){
            var fontSize_cap_op = '8px';
        }
            var options = {
          series: [{
          name: 'CAPEX',
          data: [res[2][0], res[1][0]]
        },{
          name: ener_lang + ' OPEX',
          data: [res[2][1], res[1][1]]
        },{
          name: man_lang + ' OPEX',
          data: [res[2][2], res[1][2]]
        }],
          chart: {
          type: 'bar',
          height: 210,
          width: capex_opex_print_width,
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
                fontSize: '10px',
                fontFamily: 'ABeeZee, sans-serif',
                fontWeight: 'bold',
            },
        },
        title: {
            text: '10 Años',
            align: 'center',
            offsetY:20,
            style: {
            fontSize: '15px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: "bold",
            cssClass: 'apexcharts-yaxis-label',
            color: '#000',
          },
        },
        xaxis: {
          categories: ['Solución B', 'Solución A'],
          labels: {
                style: {
                    colors: [],
                    fontSize: fontSize_cap_op,
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
                    fontSize: '12px',
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
          fontSize: '8px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 8,
          height: 8,
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

        var chart = new ApexCharts(document.querySelector("#chart_10_print"), options);
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
            height:roi_height,
            width:roi_width,
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
                fontSize: '11px',
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
            fontSize: '18px',
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
                    fontSize: '13px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '8px',
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
                    fontSize: '11px',
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
          fontSize: '11px',
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
            height:roi_height,
            width:roi_width,
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
                fontSize: '11px',
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
            fontSize: '18px',
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
                    fontSize: '13px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '10px',
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
                    fontSize: '11px',
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
          position: 'bottom',
          horizontalAlign: 'right',
          offsetX: 40,
          fontSize: '11px',
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

function roi_s_ene_print(id_project){
    var counter_val_prod_ene = document.getElementById('counter_val_prod_ene').value;

/* if(counter_val_prod_ene == 0){
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
}

if(counter_val_prod_ene == 1){
    var inv_ini_2 = document.getElementById('inv_ini_1').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
}

if(counter_val_prod_ene == 2){
    var inv_ini_2 = document.getElementById('inv_ini_1').value;
    var inv_ini_3 = document.getElementById('inv_ini_2').value;
} */

    var inv_ini_1 = document.getElementById('inv_ini_1').value;
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;

var dif_1_cost = document.getElementById('dif_cost_base_a').value;

var dif_2_cost = document.getElementById('dif_cost_base_b').value;


    var consumo_ene_anual_a = '{{$sumaopex_1*$tar_ele->costo_elec}}'
    var consumo_ene_anual_b = '{{$sumaopex_2*$tar_ele->costo_elec}}'
    var consumo_ene_anual_c = '{{$sumaopex_3*$tar_ele->costo_elec}}'

    $.ajax({
        type: 'get',
        url: "/roi_only_energy/" + id_project + '/' + consumo_ene_anual_a + '/' + consumo_ene_anual_b + '/' + consumo_ene_anual_c + '/' + inv_ini_1 + '/' + inv_ini_2 + '/' + inv_ini_3,
        success: function (res) {


            //console.log(res);
    var options = {
          series: [
          {
            name: "Existente",
            data: [res[0][0], res[0][1], res[0][2], res[0][3]]
          },
          {
            name: "A",
            data: [res[1][0], res[1][1], res[1][2], res[1][3]]
          },
          {
            name: "B",
            data: [res[2][0], res[2][1], res[2][2], res[2][3]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
            height:roi_height,
            width:roi_width,
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
        colors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
        dataLabels: {
                enabled: true,
                style: {
                fontSize: '11px',
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
            fontSize: '18px',
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
            text: '',
            style: {
                    colors: [],
                    fontSize: '13px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '8px',
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
                    fontSize: '11px',
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
          fontSize: '11px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 12,
          height: 12,
          strokeWidth: 0,
          strokeColor: '#fff',
          fillColors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
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

function roi_ene_prod_print(id_project,costo_base,costo_a,costo_b){
    var counter_val_prod_ene = document.getElementById('counter_val_prod_ene').value;



if(counter_val_prod_ene == 0){
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
    var costo_base = '{{$costo_base}}';
    var costo_a = '{{$costo_a}}';
    var costo_b = '{{$costo_b}}';
}

if(counter_val_prod_ene == 1){
    var inv_ini_2 = document.getElementById('inv_ini_1').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value;
    var costo_base = '{{$costo_a}}';
    var costo_a = '{{$costo_base}}';
    var costo_b = '{{$costo_b}}';
}
if(counter_val_prod_ene == 2){
    var inv_ini_2 = document.getElementById('inv_ini_1').value;
    var inv_ini_3 = document.getElementById('inv_ini_2').value;
    var costo_base = '{{$costo_b}}';
    var costo_a = '{{$costo_base}}';
    var costo_b = '{{$costo_a}}';
}

var dif_1_cost = document.getElementById('dif_cost_base_a').value;

var dif_2_cost = document.getElementById('dif_cost_base_b').value;

    /* var dif_1_cost = document.getElementById('dif_cost_base_a').value;
    var inv_ini_2 = document.getElementById('inv_ini_2').value;
    var dif_2_cost = document.getElementById('dif_cost_base_b').value;
    var inv_ini_3 = document.getElementById('inv_ini_3').value; */
    var consumo_ene_anual_a = '{{$sumaopex_1*$tar_ele->costo_elec}}'
    var consumo_ene_anual_b = '{{$sumaopex_2*$tar_ele->costo_elec}}'
    var consumo_ene_anual_c = '{{$sumaopex_3*$tar_ele->costo_elec}}'

    $.ajax({
        type: 'get',
        url: '/check_marino/'+ id_project,
        success: function (response) {
            if(response == 1){
                 var ano_a = 1;
                 var ano_b = 3;
                 var ano_c = 5;
                 var ano_d = 10;
            }else{
                 var ano_a = 3;
                 var ano_b = 5;
                 var ano_c = 10;
                 var ano_d = 15;

            }

$.ajax({
        type: 'get',
        url: "/roi_ene_prod/" + id_project + '/' + dif_1_cost + '/' + inv_ini_2 +'/'+ costo_base +'/'+ costo_a +'/'+ dif_2_cost + '/' + inv_ini_3 +'/'+ costo_b +'/'+ consumo_ene_anual_a +'/'+ consumo_ene_anual_b +'/'+ consumo_ene_anual_c +'/'+counter_val_prod_ene,
        success: function (res) {


            //console.log(res);
    var options = {
          series: [
            {
            name: "ROI - Existente",
            data: [res[0][0], res[0][1], res[0][2], res[0][3]]
          },
          {
            name: "ROI - A",
            data: [res[1][0], res[1][1], res[1][2], res[1][3]]
          },
          {
            name: "ROI - B",
            data: [res[2][0], res[2][1], res[2][2], res[2][3]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225]
          }
        ],
          chart: {
            height:roi_height,
            width:roi_width,
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
        colors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
        dataLabels: {
                enabled: true,
                style: {
                fontSize: '11px',
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
            fontSize: '18px',
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
            text: '',
            style: {
                    colors: [],
                    fontSize: '13px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '10px',
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
                    fontSize: '11px',
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
          fontSize: '11px',
          fontFamily: 'ABeeZee, sans-serif',
          fontWeight: 'bold',
          markers: {
          width: 12,
          height: 12,
          strokeWidth: 0,
          strokeColor: '#fff',
          fillColors: ['#01040a','#2be6ee','#ff00ff', '#545454'],
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
            height:roi_height,
            width:roi_width,
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
                fontSize: '11px',
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
            fontSize: '18px',
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
                    fontSize: '13px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '10px',
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
                    fontSize: '11px',
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
          fontSize: '11px',
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
            height:roi_height,
            width:roi_width,
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
                fontSize: '11px',
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
            fontSize: '18px',
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
                    fontSize: '13px',
                    fontFamily: 'ABeeZee, sans-serif',
                    fontWeight: "bold",
                    cssClass: 'apexcharts-yaxis-label',
                },
          },
          labels: {
            style: {
                    colors: [],
                    fontSize: '10px',
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
                    fontSize: '11px',
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
          fontSize: '11px',
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

function chart_cu_sho_Be_base_print() {
        var check_prod = '{{$conf_val_base}}';

            //un decumal
        var number_base = check_prod
        var rounded_base = Math.round(number_base * 10) / 10

        var mult_cels_val = check_prod * 5;
        var val_res = mult_cels_val / 5;

        var datax = google.visualization.arrayToDataTable([
          ['Label','Value'],
          ['Base',rounded_base],
        ]);

        var options = {
            width: eui_print_width, height: eui_print_height,
  yellowColor:'ffff00',
  greenFrom:4,greenTo:5,
  redFrom: 1, redTo: 2,
  yellowFrom:2, yellowTo: 4,
  minorTicks: 5,
  max:5,
  min:1,
};

        var chart = new google.visualization.Gauge(document.getElementById('chart_cu_sho_Be_base_print'));

        chart.draw(datax, options);

      }
function chart_cu_sho_Be_a_print() {
        var check_prod_a = '{{$conf_val_a}}';

        //un decumal
        var number_a = check_prod_a
        var rounded_a = Math.round(number_a * 10) / 10

        var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['A', rounded_a],
        ]);


        var options = {
            width: eui_print_width, height: eui_print_height,
  yellowColor:'ffff00',
  greenFrom:4,greenTo:5,
  redFrom: 1, redTo: 2,
  yellowFrom:2, yellowTo: 4,
  minorTicks: 5,
  max:5,
  min:1,
};

var chart = new google.visualization.Gauge(document.getElementById('chart_cu_sho_Be_a_print'));

chart.draw(data, options);
}

function chart_cu_sho_Be_b_print() {
    var check_prod_b = '{{$conf_val_b}}';

    //un decumal
    var number_b = check_prod_b
    var rounded_b = Math.round(number_b * 10) / 10

var data = google.visualization.arrayToDataTable([
  ['Label', 'Value'],
  ['B', rounded_b],
]);


    var options = {
        width: eui_print_width, height: eui_print_height,
  yellowColor:'ffff00',
  greenFrom:4,greenTo:5,
  redFrom: 1, redTo: 2,
  yellowFrom:2, yellowTo: 4,
  minorTicks: 5,
  max:5,
  min:1,
};

var chart = new google.visualization.Gauge(document.getElementById('chart_cu_sho_Be_b_print'));

chart.draw(data, options);
}

function interp(conf_val){

    if(conf_val > 0){
        if(conf_val > 1 && conf_val <= 2){
            var porcent_check1 = 0.25;
            var porcent_check2 = 0.20;
            var porcent_point1 = 1;
            var porcent_point2 = 2;
            }

            if(conf_val > 2 && conf_val <= 3){
            var porcent_check1 = 0.20;
            var porcent_check2 = 0.15;
            var porcent_point1 = 2;
            var porcent_point2 = 3;
            }

            if(conf_val > 3 && conf_val <= 4){
            var porcent_check1 = 0.15;
            var porcent_check2 = 0.10;
            var porcent_point1 = 3;
            var porcent_point2 = 4;
            }

            if(conf_val > 4 && conf_val <= 5){
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
    var message = 'Inadecuada';
}

if(check_prod > 5 && check_prod <= 10){
    var message = 'Aceptable';
}
return message;
}



function mostrar_modal(id){
    $("#"+id).removeClass("hidden");
}


function ocultar_modal(id){
    $("#"+id).addClass("hidden");
}
</script>
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection

