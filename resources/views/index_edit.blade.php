@extends('main.main')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
@endsection

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="bg-blue-900 w-full flex justify-center" style="background-color:#1B17BB ;">
    <div class="w-1/3 flex h-full">
        <a><img src="{{asset('/assets/images/Logotipo-HVACOPCOST_blanco.png')}}" alt="hvacopcost latinoamérica" style="max-height: 100px; width:230px;"></a>
        <h1 style=" font-size: 4.3rem;" class="text-white font-roboto" >3.0</h1>
    </div>
    <div class=" w-1/3 flex justify-center" style="line-height: 30px; height:99px;">
        {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}


    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-end h-1/3 gap-x-3">
    {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
    <button class="p-2 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='/mis_projectos'"><p>{{ __('index.mis proyectos') }}</p></button>

    <button class="p-2 bg-blue-600  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 " onclick="window.location.href='/home'"><p>{{ __('index.proyecto nuevo') }}</p></button>

    <a class="p-3 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"  href="{{ route('cerrar_session') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <button class="mt-1">
                    {{ __('index.logout') }}
                    </button>
            </a>

            <form id="logout-form" action="{{ route('cerrar_session') }}" method="POST" class="d-none">
                @csrf
            </form>
    </div>
</div>
    {{-- <div id="divSettings">
        <a href="{{route('settings')}}"><i class="fa fa-cog" aria-hidden="true" id="settings"></i>   </a>
    </div> --}}
    <style>

.botonF1{
  width:100px;
  height:40px;
  background: #102E52;
  right:0;
  bottom:0;
  top: 120px;
  position:absolute;
  margin-right:30px;
  margin-bottom:16px;
  border:none;
  outline:none;
  color:#FFF;
  border-radius:10px;
  font-size:14px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
  transition:.3s;
  cursor:pointer;
}
span{
    font-size: 14px;
  transition:.5s;
}
.botonF1:hover span{
  transform:rotate(360deg);
}
.botonF1:active{
  transform:scale(1.1);
}

.animacionVer{
  transform:scale(1);
}

[x-cloak] {
			display: none;
		}

		[type="checkbox"] {
			box-sizing: border-box;
			padding: 0;
		}

		.form-checkbox,
		.form-radio {
			-webkit-appearance: none;
			-moz-appearance: none;
			appearance: none;
			-webkit-print-color-adjust: exact;
			color-adjust: exact;
			display: inline-block;
			vertical-align: middle;
			background-origin: border-box;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			flex-shrink: 0;
			color: currentColor;
			background-color: #fff;
			border-color: #e2e8f0;
			border-width: 1px;
			height: 1.4em;
			width: 1.4em;
		}


		.form-checkbox {
			border-radius: 0.25rem;
		}

		.form-radio {
			border-radius: 50%;
		}

		.form-checkbox:checked {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
			border-color: transparent;
			background-color: currentColor;
			background-size: 100% 100%;
			background-position: center;
			background-repeat: no-repeat;
		}

		.form-radio:checked {
			background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
			border-color: transparent;
			background-color: currentColor;
			background-size: 100% 100%;
			background-position: center;
			background-repeat: no-repeat;
		}

        input[type="number"] {
  text-align: center;
}

    .hover-button-plus:hover{
        border:1px solid;
        border-color: white !important;
        padding:1px;
}

.btn_roundf{

border:1px solid #3182ce;
background: #3182ce;
color:#ffff;
border-radius: 50%;
width: 30px;
height: 30px;
z-index: 90090;
display: flex;
align-content: center;
justify-content: center;
text-align: center;
align-items: center;

}

.btn_roundf_retro{

border:1px solid #3182ce;
background: #3182ce;
color:#ffff;
border-radius: 50%;
width: 30px;
height: 30px;
z-index: 90090;
display: flex;
align-content: center;
justify-content: center;
text-align: center;
align-items: center;
cursor: pointer;
}

.btn_roundf_retro:hover {
    border:1px solid #4299e1;
background: #4299e1;
color:#ffff;
border-radius: 50%;
width: 30px;
height: 30px;
z-index: 90090;
display: flex;
align-content: center;
justify-content: center;
text-align: center;
align-items: center;
cursor: pointer;
}

.btn_roundf_retro:active {
    border:1px solid #3182ce;
background: #3182ce;
color:#ffff;
border-radius: 50%;
width: 30px;
height: 30px;
z-index: 90090;
display: flex;
align-content: center;
justify-content: center;
text-align: center;
align-items: center;
cursor: pointer;
}

.rounded_modal_ebergy_hvac{
    border-radius: 40px;
}

.border-color-inps{
    border-color:#1B17BB;
}
    </style>

<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

@inject('traer_unidad_hvac','app\Http\Controllers\ResultadosController')
@inject('num_tarjets','app\Http\Controllers\ResultadosController')
@inject('num_tarjets_2','app\Http\Controllers\ResultadosController')
@inject('num_tarjets_3','app\Http\Controllers\ResultadosController')
@inject('paises_empresa','app\Http\Controllers\ResultadosController')
@inject('all_paises','app\Http\Controllers\ResultadosController')
@inject('check_types_p','app\Http\Controllers\ResultadosController')
@inject('mantenimiento_project','app\Http\Controllers\ResultadosController')
@inject('mantenimiento_equipos','app\Http\Controllers\ResultadosController')
<?php
$idm = App::getLocale();
?>
<div class="bg-white" x-data="app()" x-cloak>
    <div class="w-full px-4">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <div x-show.transition="step === 'complete'">
            <div class="bg-white rounded-lg p-10 flex items-center shadow justify-between">
                <div>
                    <svg class="mb-4 h-20 w-20 text-green-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>

                    <h2 class="text-2xl mb-4 text-gray-800 text-center font-bold">Registration Success</h2>

                    <div class="text-gray-600 mb-8">
                        Thank you. We have sent you an email to demo@demo.test. Please click the link in the message to activate your account.
                    </div>

                    <button
                        @click="step = 1"
                        class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border"
                    >Back to home</button>
                </div>
            </div>
        </div>
        {{-- <input type="text" id="type_project_selected" name="type_project_selected"> --}}
        <div x-show.transition="step != 'complete'">
            <div class="">
                <div x-show.transition.in="step === 1">
                    <div id="mapa-div">
                                    <?php  $check_types_pn=$check_types_p->check_p_type_pn(Auth::user()->id_empresa); ?>
                                    <?php  $check_types_pr=$check_types_p->check_p_type_pr(Auth::user()->id_empresa); ?>
                                    <?php  $check_types_m=$check_types_p->check_p_type_m(Auth::user()->id_empresa); ?>
                                    <?php  $module_1=1?>
                                    <?php  $module_2=2?>
                                    <?php  $module_3=3?>

                                    <?php
                                    if($type_p === 3){

                                        $mantenimiento_project=$mantenimiento_project->mantenimiento_project($project_edit->id);
                                        $mantenimiento_equipos=$mantenimiento_equipos->mantenimiento_equipos($project_edit->id);
                                    }
                                     ?>

            <form action="{{url('/edit_project', [$id_project])}}" novalidate method="POST" name="formulario" id="formulario" files="true" enctype="multipart/form-data">
                        @csrf
                                    <input type="text" value="update" class="hidden" id="action_submit_send" name="action_submit_send">
                                    <input type="text" name="idioma" id="idioma" value="{{$idm}}" class="hidden">
                                    <input type="number" class="hidden" id="type_p" name="type_p">
                                    @include('simulaciones_update')
                    </div>
                    {{-- /////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                </div>

                <div x-show.transition.in="step === 2">
                    <div class="w-full h-full font-roboto flex mt-2">
                        <div id="forms_ene_fin_proy_edit"  name="forms_ene_fin_proy_edit" class="hidden w-full">
                            @include('forms_projects_update')
                        </div>
                        <div id="forms_cal_pre"  name="forms_cal_pre" class="hidden w-full">
                            @include('forms_cal_pre_edit')
                        </div>
                     </div>
                </div>

                <div x-show.transition.in="step === 3">
                    <div class="w-full h-full font-roboto flex ">
                        <div id="costos_adicionaless" class="flex w-full  h-full  gap-x-3 mx-3">
                             @if ($type_p === 3)
                              @include('mantenimiento.costos_adicionales_edit')
                             @else
                               @include('mantenimiento.costos_adicionales')
                             @endif
                        </div>
                    </div>
                </div>

                <div x-show.transition.in="step === 4">
                    <div id="ana_cost_mant" class="flex w-full  gap-x-3 mx-2 overflow-x-hidden">
                        @include('mantenimiento.costos_mant')
                    </div>
                </div>

                <div x-show.transition.in="step === 5">
                        <div class="w-full h-full font-roboto flex ">
                            <div id="costos_adicionaless" class="flex w-full  h-full  gap-x-3 mx-3">
                                @if ($type_p === 3)
                                    @include('mantenimiento.just_financiera_edit')
                                @else
                                    @include('mantenimiento.just_financiera')
                                @endif
                            </div>
                        </div>
                </div>

                <div x-show.transition.in="step === 6">
                    <div class="w-full h-full font-roboto flex ">
                        <div id="costos_adicionaless" class="flex w-full  h-full  gap-x-3 mx-3">
                            @include('mantenimiento.justificacion')
                        </div>
                    </div>
                </div>

                <div x-show.transition.in="step === 7">

                    <div id="spend_plan" class="flex w-full  gap-x-3 mt-5">
                        <div class="w-1/2 h-full grid  justify-items-center">
                            @include('mantenimiento.spend_plan_gross')
                        </div>

                        <div class="w-1/2 h-full grid  justify-items-center">

                            @include('mantenimiento.spend_plan_gross_blank')
                        </div>
                    </div>
                 </div>

            </div>
            <!-- / Step Content -->
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="fixed bottom-0 left-0 right-0 py-2 bg-white shadow-md" x-show="step != 'complete'">
        <div class="w-full mx-auto px-4">
            <div class="flex  w-full">
                <div class="w-1/2">
                    @if ($type_p == 1 || $type_p == 2)
                        @if (strlen(__('index.atras')) > 6)
                        <button
                        type="button"
                        onclick="back_show_form_project($('#type_p').val());"
                        x-show="step > 1"
                        @click="step--"
                            class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-md border font-roboto">
                            {{__('index.atras') }}
                        </button>
                        @endif

                        @if (strlen(__('index.atras')) == 6)
                        <button
                        type="button"
                        onclick="back_show_form_project($('#type_p').val());"
                        x-show="step > 1"
                        @click="step--"
                            class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-xl border font-roboto">
                            {{__('index.atras') }}
                        </button>
                        @endif
                    @endif

                    @if ($type_p == 3)
                        <button
                        type="button"
                        x-show="step > 1"
                        @click="step--"
                            class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-md border font-roboto">
                            {{__('index.atras') }}
                        </button>
                    @endif



                    @if ($type_p === 1 || $type_p === 0)
                    <a href="/project/{{$id_project}}">
                        <button type="button"
                        x-show="step == 1"
                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-xl border font-roboto"
                    >{{ __('index.resultado') }}</button>
                    @endif

                    @if ($type_p === 2)
                    <a href="/resultados_retrofit/{{$id_project}}">
                        <button type="button"
                        x-show="step == 1"
                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-xl border font-roboto"
                    >{{ __('index.resultado') }}</button>
                    @endif

                    </a>


                </div>




                <div id="buttons_energy" name="buttons_energy" x-show="step === 2" class="w-1/2 flex hidden" style=" justify-content: center;">

                    <button  style="background-color:#1B17BB;width: 20%;" x-show="step > 1" type="button" name="calcular_p_n_Edit" title="Guardar Proyecto Nuevo" id="calcular_p_n_Edit" onclick="check_form_submit(1,'{{$idm}}','update',{{$id_project}},'{{$project_edit->created_at}}');"  class="hidden focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto">{{ __('index.calcular') }}</button>

                    <button  style="background-color:#1B17BB;width: 20%;" x-show="step > 1" type="button" name="calcular_p_r_Edit" title="Guardar Proyecto Retrofit" id="calcular_p_r_Edit" onclick="check_form_submit(2,'{{$idm}}','update',{{$id_project}},'{{$project_edit->created_at}}');"  class="hidden focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto">{{ __('index.calcular') }}</button>
                </div>



                <div id="buttons_mantainance" name="buttons_mantainance" class="w-1/2 flex hidden" style=" justify-content: center;">

                    <button  type="button" id="button_next_mantenimiento_noadicionales_edit" name="button_next_mantenimiento_noadicionales_edit"

                    style="background-color:#1B17BB;"
                        x-show="step == 2"
                        @click="step++"
                        onclick="calcular_speendplan_base_edit({{ $project_edit->id }});"
                        class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                    >{{ __('index.siguiente') }}</button>


                    {{-- button siguiente mantenimiento --}}
                    <button  type="button" id="button_next_mantenimiento_noadicionales" name="button_next_mantenimiento_noadicionales"
                    style="background-color:#1B17BB;"
                        x-show="step == 2"
                        onclick="calcular_speendplan_base_update({{ $project_edit->id }});"
                        class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto hidden"
                    >{{ __('index.guardar') }}</button>
                    {{-- button siguiente mantenimiento --}}

                    <button  type="button" id="button_next_mantenimiento_costos_adicionales" name="button_next_mantenimiento_costos_adicionales"
                    onclick="calcular_speendplan_base_adicionales_edit({{ $project_edit->id }});save_adicionales({{ $project_edit->id }});"
                   style="background-color:#1B17BB;"
                       x-show="step == 3"
                       @click="step++"
                       class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                   >{{ __('index.siguiente') }}</button>

                   <button  type="button" id="button_next_mantenimiento_costos_adicionales" name="button_next_mantenimiento_costos_adicionales"

                   style="background-color:#1B17BB;"
                       x-show="step == 4"
                       @click="step++"
                       class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                   >{{ __('mantenimiento.costos_operativos') }}</button>

                   <button  type="button" id="button_next_mantenimiento_justificacion" name="button_next_mantenimiento_justificacion"

                   style="background-color:#1B17BB;"
                       x-show="step == 5"
                       @click="step++"
                       onclick="justificacion_financiera_send_mant_edit($('#costo_mantenimiento_mantenimiento_financiero').val());justificacion_financiera_send();save_justificacion_financiera({{ $project_edit->id }});"
                       class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                   >{{ __('mantenimiento.justificacion_financiera') }}</button>

                   <button  type="button" id="button_next_an_cost_mant" name="button_next_an_cost_mant"
                    style="background-color:#1B17BB;"
                        x-show="step == 6"
                        @click="step++"
                        class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                    >{{ __('mantenimiento.speend_plan') }}</button>

                    {{-- <button style="background-color:#1B17BB;width: 20%;"  x-show="step == 7" type="button"
                    onclick="update_mantenimiento();" name="guardar_mantenimiento" id="guardar_mantenimiento" class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto">{{ __('index.guardar') }}</button> --}}
                    <div  x-show="step < 2" class="w-full flex" style=" justify-content: right;">
                        <div  x-show="step < 2" class="w-full flex" style=" justify-content: left;">
                        <label style="font-size:10px;" class=" text-gray-500 font-montserrat"  for="">
                            De acuerdo a:
                        </label>
                        <ul class="mt-3">
                            <li class="flex items-center w-full">
                              <span class="bg-gray-500 h-1 w-1 rounded-full mr-2"></span>
                              <p style="font-size:9px;" class="text-gray-500">ASHRAE Standard 100–2018,  ASHRAE Standard 169–2021, ASHRAE Standard 90.1–2019 , ASHRAE Standard 70–2006, ASHRAE Standard 180–2018, ASHRAE Standard 55–2020 y ASHRAE Standard 62.1-2019.</p>
                            </li>

                            <li class="flex items-center w-full">
                              <span class="bg-gray-500 h-1 w-1 rounded-full mr-2"></span>
                              <p style="font-size:9px;" class="text-gray-500">1-100 Energy Star Score,  Energy Star Portfolio Manager ,EIA – CBECS–2018 Cooling Degree Days por Degreedays.net y NOAA.gov.</p>
                            </li>

                          </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
</div>
{{-- @include('components.hvac-chat') --}}
<style>
.title_index{
              color:#1B17BB !important;"
}


.title_index_mant{
            color:#1B17BB !important;"
}

.text_blue{
    color:#1B17BB !important;
}

@media (min-width: 640px) {
    .labels{
        font-size:11px;
    }
}
/* md	768px */
@media (min-width: 768px) {
    .labels{
        font-size:11px;
    }

    labels_index{
    font-size: 10px;
    color:#2c5282 !important;"
    }
}
/* lg	1024px */
@media (max-width: 1024px) {
    .labels{
        font-size:11px;
    }
    .ancho{
        width:60%;
        margin-left:20%;
    }

    .labels_index{
    font-size: 12px;
    color:#2c5282 !important;"
    }

    .type_proyect_label{
    font-size:13px;
 }

 .mapa_img{
        width: 320px; height:520px;
 }
 .type_proyect_label{
    font-size:13px;
 }
 .title_index{
    font-size: 2rem;
  }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

}

@media (max-width: 1081px) {
    .labels{
        font-size:10px;
    }
    .ancho{
        width:60%;
        margin-left:20%;
    }

    .mapa_img{
        width: 300px; height:500px;
 }
 .type_proyect_label{
    font-size:12px;
 }
 .title_index{
    font-size: 1.8rem;
  }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

    .type_proy_pos{
        margin-top:215px;
    }


}

@media (max-width: 1082px) {
    .labels{
        font-size:11px;
    }
    .ancho{
        width:60%;
        margin-left:20%;
    }

    .mapa_img{
        width: 400px; height:600px;
 }
 .type_proyect_label{
    font-size:15px;
 }
 .title_index{
    font-size: 2rem;
  }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 25px;height: 25px;
    }

    .type_proy_pos{
        margin-top:300px;
        margin-left:600px;
    }

}

@media (min-width: 1085px) {
    .labels{
        font-size:11px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 11px;
    color:#2c5282 !important;"
    }
    .mapa_img{
        width: 320px; height:520px;
 }
 .type_proyect_label{
    font-size:13px;
 }
 .title_index{
    font-size: 2rem;
  }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

    .type_proy_pos{
        margin-top:215px;
    }
}

@media (min-width: 1090px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 13px;
    color:#2c5282 !important;"
    }

    .mapa_img{
        width: 320px; height:520px;
 }
 .type_proyect_label{
    font-size:16px;
 }
 .title_index{
    font-size: 2rem;
  }

   .title_index_mant{
            font-size: 2rem;
    }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

    .type_proy_pos{
        margin-top:215px;
    }

}

@media (min-width: 1200px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 14px;
    color:#2c5282 !important;"
    }

    .mapa_img{
        width: 350px; height:550px;
 }

 .type_proyect_label{
    font-size:16px;
 }

 .title_index{
    font-size: 2rem;
  }

  .title_index_mant{
            font-size: 2rem;
   }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

    .type_proy_pos{
        margin-top:215px;
    }
}

@media (min-width: 1215px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 14px;
    color:#2c5282 !important;"
    }

    .mapa_img{
        width: 350px; height:550px;
 }
 .type_proyect_label{
    font-size:16px;
 }

 .title_index{
    font-size: 2rem;
  }

   .title_index_mant{
            font-size: 2rem;
    }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

    .type_proy_pos{
        margin-top:215px;
    }
}

@media (min-width: 1230px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 14px;
    color:#2c5282 !important;"
    }

    .mapa_img{
        width: 350px; height:550px;
 }

 .type_proyect_label{
    font-size:16px;
 }

 .title_index{
    font-size: 2rem;
  }

 .title_index_mant{
            font-size: 2rem;
        }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

    .type_proy_pos{
        margin-top:215px;
    }
}

@media (min-width: 1250px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 14px;
    color:#2c5282 !important;"
    }

    .mapa_img{
        width: 350px; height:550px;
 }
 .type_proyect_label{
    font-size:16px;
 }

 .title_index{
    font-size: 2rem;
  }

   .title_index_mant{
            font-size: 2.5rem;
        }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }
   .type_proy_pos{
       margin-top:215px;
   }
}

@media (min-width: 1270px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }

    .labels_index{
    font-size: 12px;
    color:#2c5282 !important;"
    }
     .mapa_img{
        width: 350px; height:550px;
 }
 .type_proyect_label{
    font-size:16px;
 }

 .title_index{
    font-size: 2rem;
  }

  .title_index_mant{
            font-size: 2.5rem;
        }

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

    .type_proy_pos{
       margin-top:215px;
   }

}

@media (min-width: 1275px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }

    .labels_index{
    font-size: 18px;
    color:#2c5282 !important;"
    }

    .mapa_img{
        width: 400px; height:600px;
 }

 .type_proyect_label{
    font-size:16px;
 }

 .title_index{
    font-size: 3rem;
  }

  .title_index_mant{
            font-size: 2.5rem;
        }

   .text-title-costo-mantenimiento{
            font-size: 1.2rem
    }


    .subtitles-just-financiera{
                font-size: 1.3rem;
    }


  .unit_style{
    font-size: 1.25rem;
  }

  .check_style{
        width: 25px;height: 25px;
    }

    .type_proy_pos{
       margin-top:215px;
   }
}

/* xl	1280px */
@media (min-width: 1280px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }

    .labels_index{
    font-size: 20px;
    color:#2c5282 !important;"
    }

    .mapa_img{
        width: 450px; height:650px;
 }
 .type_proyect_label{
    font-size:18px;
 }

 .check_style{
        width: 25px;height: 25px;
    }
    .title_index{
    font-size: 3rem;
  }

  .title_index_mant{
            font-size: 2.5rem;
  }

  .text-size-adicionales{
            font-size: .85rem;
    }

    .text-title-costo-mantenimiento{
            font-size: 1.2rem
    }

    .subtitles-just-financiera{
                font-size: 1.3rem;
    }

  .unit_style{
    font-size: 1.25rem;
  }

  .type_proy_pos{
       margin-top:215px;
   }
}

@media (min-width: 1540px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 20px;
    color:#2c5282 !important;"
    }
    .mapa_img{
        width: 480px; height:630px;
 }

 .type_proyect_label{
    font-size:18px;
 }

 .check_style{
        width: 30px;height: 30px;
    }
    .title_index{
    font-size: 3rem;
  }

    .title_index_mant{
            font-size: 2.5rem;
    }

    .text-size-adicionales{
            font-size: .95rem;
    }

    .text-title-costo-mantenimiento{
            font-size: 1.3rem
    }

    .subtitles-just-financiera{
                font-size: 1.5rem;
    }


  .unit_style{
    font-size: 1.25rem;
  }

  .type_proy_pos{
       margin-top:215px;
   }
}

@media (min-width: 1640px) {
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 20px;
    color:#2c5282 !important;"
    }
    .mapa_img{
        width: 500px; height:650px;
 }

 .type_proyect_label{
    font-size:18px;
 }

 .check_style{
        width: 30px;height: 30px;
    }

    .title_index{
    font-size: 3rem;
  }

  .title_index_mant{
            font-size: 3rem;
  }

    .text-size-adicionales{
            font-size: 1.2rem;
    }

    .text-title-costo-mantenimiento{
            font-size: 1.3rem
        }


        .subtitles-just-financiera{
                font-size: 1.875rem;
        }

  .unit_style{
    font-size: 1.25rem;
  }

  .type_proy_pos{
       margin-top:215px;
   }
}

@media (min-width: 1760px) {
            .labels{
                font-size:14px;
            }
            .ancho{
                width:100%;
            }
            .labels_index{
            font-size: 20px;
            color:#2c5282 !important;"
            }

            .mapa_img{
                width: 500px; height:650px;
        }
        .type_proyect_label{
            font-size:20px;
        }

        .check_style{
                width: 30px;height: 30px;
            }

        .title_index{
            font-size: 3rem;
        }


        .title_index_mant{
            font-size: 3rem;
        }

        .text-size-adicionales{
            font-size: 1.1rem;
        }

        .text-title-costo-mantenimiento{
            font-size: 1.5rem
        }

        .subtitles-just-financiera{
                font-size: 1.875rem;
        }

        .unit_style{
            font-size: 1.25rem;
        }

        .type_proy_pos{
       margin-top:215px;
   }
}
/* 2xl	1536px */
@media (min-width: 1940px) {
    .labels_index{
    font-size: 20px;
    color:#2c5282 !important;"
    }
    .labels{
        font-size:14px;
    }
    .ancho{
        width:100%;
    }

    .type_proy_pos{
       margin-top:215px;
   }

}

    </style>
{{--    --}}

<script>
window.onload = function() {

    if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
            var endpoint = "/reset_local_storage";
            $.ajax({
                url: endpoint,
                type: 'get',

                success: function(response) {

                },
                error: function(xhr, status, error) {
                    console.error('Error al enviar los datos:', error);
                }
            });
        // Aquí puedes agregar el código que necesites ejecutar al recargar la página
        } else {
            console.log("La página se ha cargado por primera vez.");
        }

    check_form_proy_edit('{{$type_p}}','{{ $project_edit->id }}');
    val = '{{ $project_edit->id_cat_edifico }}';
    id_tipo_edi = '{{ $project_edit->id_tipo_edificio }}';
    pais_id ='{{ $project_edit->region }}';
    id_ciudad ='{{ $project_edit->ciudad }}';
    traer_t_edif_Edit(val,id_tipo_edi);
    traer_ciudad(pais_id,id_ciudad);
    caed_Edi_val_ini ='{{ $project_edit->ciudad }}';
    porcent = '{{ $project_edit->porcent_hvac }}';
    traer_porcent_ini(val,porcent);
    id_ciudad_ini =  '{{ $id_ciudad_ini }}';
    traer_horas_enf_edit('{{ $project_edit->id }}');
    show_buttons_type_project('{{$type_p}}');
    //let cost_ele = $('#costo_elec_1_1_retro').val();
   /*  asign_cos_ele(cost_ele); */
    let dollarUSLocale = Intl.NumberFormat('en-US');
    var num_aux = dollarUSLocale.format('{{$project_edit->sal_an_prom}}');
    $('#sal_an_prom').val('$'+num_aux);
   setTimeout(function() {
    checksuma();
    checksuma_mant();
}, 1000);


};



function app() {
    var type_project = '{{$type_p}}';
var val_pais = $('select[name="paises_edit"] option:selected').val();

/* if(parseInt(val_pais) === 0){

    var page = 1;
}else if(parseInt(val_pais) > 0){

    var page = 2;
} */

if(parseInt(type_project) === 1 || parseInt(type_project) === 2){
    var page = 2;
}

if(parseInt(type_project) === 3){
    var page = 1;
}

        return {
            step: page,
            passwordStrengthText: '',
            togglePassword: false,
            password: '',
            gender: 'Male',

            checkPasswordStrength() {
                var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

                let value = this.password;

                if (strongRegex.test(value)) {
                    this.passwordStrengthText = "Strong password";
                } else if(mediumRegex.test(value)) {
                    this.passwordStrengthText = "Could be stronger";
                } else {
                    this.passwordStrengthText = "Too weak";
                }
            }
        }
    }


function traer_t_edif_Edit(val,id_tipo_edi) {
    $.ajax({
        type: 'get',
        url: '/get_cat_edi/'+ val,
        success: function (response) {

            response.map((cat_ed, i) => {
                if(id_tipo_edi == cat_ed.id){
                    $('#tipo_edificio_edit').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));

                $('#tipo_edificio_mantenimiento').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));

                $("#tipo_edificio_edit").find('option[value="' + cat_ed.id + '"]').attr("selected", "selected");
                $("#tipo_edificio_mantenimiento").find('option[value="' + cat_ed.id + '"]').attr("selected", "selected");

            }else if(id_tipo_edi != cat_ed.id){
                    $('#tipo_edificio_edit').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));

                $('#tipo_edificio_mantenimiento').append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));

                }


            });



        },
        error: function (responsetext) {

        }
    });
}

function traer_t_edif_edd(id_cat,id_tipo_edi,id_tipo_edi_count) {
    $.ajax({
        type: 'get',
        url: '/get_cat_edi/'+ id_cat,
        success: function (response) {
            $('#'+id_tipo_edi).empty();
            $('#'+id_tipo_edi).append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));
            $('#'+id_tipo_edi_count).val(0);
            checksuma();
            response.map((cat_ed, i) => {
                $('#'+id_tipo_edi).append($('<option>', {
                    value: cat_ed.id,
                    text: cat_ed.name
                }));
            });



        },
        error: function (responsetext) {

        }
    });

}



function traer_ciudad(pais,id_ciudad) {
   var pais_text = $('select[name="paises_edit"] option:selected').text();
    $('#ciudades_edit').trigger('click');
    $("#paises_edit").find('option[value="' + pais + '"]').attr("selected", "selected");
    $('#pais').val($('#paises option:selected').text());
    $.ajax({
        type: 'get',
        url: '/get_ciudades/'+ pais_text,
        success: function (response) {

            response.map((ciudades, i) => {
                if(id_ciudad === ciudades.ciudad){
                        $('#ciudades_edit').append($('<option>', {
                        value: ciudades.idCiudad,
                        text: ciudades.ciudad
                    }));
                    //mantenimiento
                    $('#ciudades_mantenimiento').append($('<option>', {
                        value: ciudades.idCiudad,
                        text: ciudades.ciudad
                    }));
                    $("#ciudades_edit").find('option[value="' + ciudades.idCiudad + '"]').attr("selected", "selected");
                    $("#ciudades_mantenimiento").find('option[value="' + ciudades.idCiudad + '"]').attr("selected", "selected");;

                    }else if(id_ciudad != ciudades.ciudad){
                        $('#ciudades_edit').append($('<option>', {
                        value: ciudades.idCiudad,
                        text: ciudades.ciudad
                        }));

                        $('#ciudades_mantenimiento').append($('<option>', {
                        value: ciudades.idCiudad,
                        text: ciudades.ciudad
                        }));
                    }
            });



        },
        error: function (responsetext) {

        }
    });

}


function traer_ciudad_edit(pais) {
    $.ajax({
        type: 'get',
        url: '/get_ciudades_Edit/'+ pais,
        success: function (response) {
            $('#ciudades_edit').empty();
            $('#ciudades_edit').append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));
            $('#count_ciudad').val(0);
            checksuma();
            response.map((ciudades, i) => {
                $('#ciudades_edit').append($('<option>', {
                    value: ciudades.idCiudad,
                    text: ciudades.ciudad
                }));

            });



        },
        error: function (responsetext) {

        }
    });

}

function traer_porcent_ini(val,porcent) {
    $.ajax({
        type: 'get',
        url: '/porcents_aux/'+ val,
        success: function (response) {

            response.map((cat_ed, i) => {

                if(parseInt(porcent) === cat_ed){
                    $('#porcent_hvac').append($('<option>', {
                    value: cat_ed,
                    text: cat_ed + '%',
                }));

                    $("#porcent_hvac").find('option[value="' + cat_ed + '"]').attr("selected", "selected");
                    }else if(parseInt(porcent) != cat_ed){
                        $('#porcent_hvac').append($('<option>', {
                            value: cat_ed,
                    text: cat_ed + '%',
                    }));
                    }

                 /*    response.map((cat_ed, i) => {
                $('#porcent_hvac').append($('<option>', {
                    value: cat_ed,
                    text: cat_ed
                }));
            }); */
            });



        },
        error: function (responsetext) {

        }
    });

}

function getDegreeHrs_edd(pais,cd) {

    var cooling = heating = 0;
    $.ajax({
        type: 'POST',
        url: '/getDegreeHrs',
        dataType: 'json',
        data: {
            idPais: pais,
            idCiudad: cd,
            "_token": $("meta[name='csrf-token']").attr("content")
        },
        success: function (response) {
            response.forEach(mes => {
                mes['activoCooling'] == 1 ? heating += mes['heating'] : heating += 0;
                cooling = cooling + mes['cooling'];
            });

            let dollarUSLocale = Intl.NumberFormat('en-US');



            var num_aux = dollarUSLocale.format(cooling);

            $('#hrsEnfriado').val(num_aux);
            $('#hrsEnfriado_1_2').val(num_aux);
            $('#hrsEnfriado_1_3').val(num_aux);

            $('#hrsEnfriado_2_1').val(num_aux);
            $('#hrsEnfriado_2_2').val(num_aux);
            $('#hrsEnfriado_2_3').val(num_aux);

            $('#hrsEnfriado_3_1').val(num_aux);
            $('#hrsEnfriado_3_2').val(num_aux);
            $('#hrsEnfriado_3_3').val(num_aux);

            //////retro
            $('#hrsEnfriado_1_1_retro').val(num_aux);


            $('#hrsEnfriado_2_1_retro').val(num_aux);


            $('#hrsEnfriado_3_1_retro').val(num_aux);
            $('#dDays').val(heating);


        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}

function traer_horas_enf_edit(id) {
    $.ajax({
        type: 'get',
        url: '/getDegreeHrsadd/'+ id,
        success: function (response) {


            let dollarUSLocale = Intl.NumberFormat('en-US');



var num_aux = dollarUSLocale.format(response);

$('#hrsEnfriado').val(num_aux);
$('#hrsEnfriado_1_2').val(num_aux);
$('#hrsEnfriado_1_3').val(num_aux);

$('#hrsEnfriado_2_1').val(num_aux);
$('#hrsEnfriado_2_2').val(num_aux);
$('#hrsEnfriado_2_3').val(num_aux);

$('#hrsEnfriado_3_1').val(num_aux);
$('#hrsEnfriado_3_2').val(num_aux);
$('#hrsEnfriado_3_3').val(num_aux);
//////retro
$('#hrsEnfriado_1_1_retro').val(num_aux);


$('#hrsEnfriado_2_1_retro').val(num_aux);


$('#hrsEnfriado_3_1_retro').val(num_aux);



        },
        error: function (responsetext) {

        }
    });

}

function cambiarLblMapa_Edit(txt) {
    $('#lblMapa').text(txt);
}
$('area').mouseover(function() {
    cambiarLblMapa_Edit(this.alt);
}).mouseout(function() {
    $('#paises_edit').val() > 0 ? cambiarLblMapa_Edit($('#paises_edit option:selected').text()) : cambiarLblMapa('Da Clic en el Mapa');

      });

function change_option(id){
    $("#paises_edit").find('option[value="' + id + '"]').attr("selected", "selected");
    console.log(id);
}

function valida_update_store_solution(id){
 var input = $('#'+id);
    if (input.val() == ""){
        input.val('store');
    }

}



</script>
@endsection
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection
