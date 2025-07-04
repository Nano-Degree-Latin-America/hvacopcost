@extends('main.main')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
@endsection

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="blur" class="blur">
    @include('main.topbar')
    @include('modal_video_public')
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

.border-blue{
border: 2px;
border-color: #1B17BB;
border-radius: 10px;
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
    cursor: pointer;
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
.btn_roundf_retro,.btn_roundf:hover {
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

.btn_roundf_retro,.btn_roundf:active {
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


.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: .60rem;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  margin-top: .5rem;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  cursor: pointer;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

.rounded_modal_ebergy_hvac{
    border-radius: 40px;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

.border-color-inps{
    border-color:#1B17BB;
}
    </style>

     <style>


/* @media (min-width: 380px) {
            .text_butons_top{
                font-size: 10px;
            }
            .button-size{
                padding: .52rem;
            }
 }

 @media (min-width: 400px) {
            .text_butons_top{
                font-size: 80%;
            }
            .button-size{
                padding: .55rem
            }

 }

 @media (min-width: 750px) {
            .text_butons_top{
                font-size: 80%;
            }
            .button-size{
                padding: .55rem
            }

 }

 @media (min-width: 780px) {
            .text_butons_top{
                font-size: 80%;
            }
            .button-size{
                padding: .55rem
            }

 }

 @media (min-width: 790px) {
            .text_butons_top{
                font-size: 80%;
            }
            .button-size{
                padding: .55rem
            }

 }

 @media (min-width: 800px) {
            .text_butons_top{
                font-size: 85%;
            }
            .button-size{
                padding: .58rem
            }

 }

 @media (min-width: 850px) {
            .text_butons_top{
                font-size: 85%;
            }
            .button-size{
                padding: .58rem
            }

 }

 @media (min-width: 880px) {
            .text_butons_top{
                font-size: 85%;
            }
            .button-size{
                padding: .58rem
            }

 }

 @media (min-width: 1016px) {
            .text_butons_top{
                font-size: 100%;
            }
            .button-size{
                padding: .60rem
            }

 }

 @media (min-width: 1020px) {
            .text_butons_top{
                font-size: 100%;
            }
            .button-size{
                padding: .60rem
            }

 } */
     </style>
  <script src="https://cdn.tailwindcss.com"></script>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="bg-white s" x-data="app()" x-cloak>
    <div class="w-full px-2">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        @inject('paises_empresa','app\Http\Controllers\IndexController')
        @inject('all_paises','app\Http\Controllers\IndexController')
        @inject('usuario_pais','app\Http\Controllers\IndexController')
        @inject('check_types_p','app\Http\Controllers\IndexController')
        @inject('sistemas','app\Http\Controllers\IndexController')
        <?php
        $idm = App::getLocale();
        ?>
        <div x-show.transition="step != 'complete'">
            <div class="overscroll-none">
                <div x-show.transition.in="step === 1">

                        <div id="mapa-div">
                            <?php  $check_types_pn=$check_types_p->check_p_type_pn(Auth::user()->id_empresa); ?>
                            <?php  $check_types_pr=$check_types_p->check_p_type_pr(Auth::user()->id_empresa); ?>
                            <?php  $check_types_m=$check_types_p->check_p_type_m(Auth::user()->id_empresa); ?>
                            <?php  $sistemas=$sistemas->sistemas(); ?>
                            <?php  $module_1=1?>
                            <?php  $module_2=2?>
                            <?php  $module_3=3?>
                            <form action="{{route('resultados')}}" novalidate method="POST" name="formulario" id="formulario" files="true" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="idioma" id="idioma" value="{{$idm}}" class="hidden">
                                <input type="number" class="hidden" id="type_p" name="type_p">
                                <input type="text" value="store" class="hidden" id="action_submit_send" name="action_submit_send">
                             {{-- que tipo de proyecto va a trabajar el usuario en simulaciones --}}
                            @include('simulaciones')
                        </div>
                        {{-- /////////////////////////////////////////////////////////////////////////////////////////////////// --}}
                    </div>
                    <div  class="ancho">

                            <div x-show.transition.in="step === 2">
                                <div class="w-full h-full font-roboto flex mt-2">
                                    <div id="forms_ene_fin_proy" class="hidden w-full">
                                        @include('forms_ene_fin_proy')
                                    </div>
                                    <div id="forms_cal_pre" class="hidden w-full">
                                        @include('forms_cal_pre')
                                    </div>
                                 </div>
                            </div>

                            <div x-show.transition.in="step === 3">
                                <div class="w-full h-full font-roboto flex ">
                                    <div id="costos_adicionaless" class="flex w-full  h-full  gap-x-3 mx-3">
                                        @include('mantenimiento.costos_adicionales')
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
                                            @include('mantenimiento.just_financiera')
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

                                <div class="clearfix">
                                    <div class="my-5 gap-x-3">
                                    </div>
                                </div>

                        </form>
                        {{-- form --}}
                    </div>
            </div>
            <div class="grid w-full justify-items-center rounded-md">
                {{-- espacio --}}
                <br>
                <br>
            </div>
            <!-- / Step Content -->
        </div>
    </div>

    <!-- Bottom Navigation -->
    <div class="fixed bottom-0 w-full left-0 right-0 py-1 bg-white shadow-md" x-show="step != 'complete'">
        <div class=" w-full mx-auto px-4 pb-2">
            <div class="flex w-full">
                <div class="w-1/2">
                    @if (strlen(__('index.atras')) > 6)
                    <button
                    x-show="step > 1"
                    @click="step--"
                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-md border font-roboto">
                        {{__('index.atras') }}
                    </button>
                    @endif

                    @if (strlen(__('index.atras')) == 6)
                    <button
                    x-show="step > 1"
                    @click="step--"
                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-xl border font-roboto">
                        {{__('index.atras') }}
                    </button>
                    @endif

                    <div x-show="step == 1"  class="w-5/6">
                        <p  style="font-size:10px;" class="text-gray-500 text-left ">*{{ __('index.descargo de responsabilidad') }}.
                        </p>
                    </div>


                </div>

                <div class="w-1/2">
                <div  x-show="step < 2" class="w-full flex" style=" justify-content: left;">
                <label style="font-size:10px;" class=" text-gray-500 font-montserrat"  for="">
                    {{ __('index.de acuerdo a')}}:
                </label>
                <ul class="mt-3">
                    <li class="flex items-center w-full">
                      <span class="bg-gray-500 h-1 w-1 rounded-full mr-2"></span>
                      <p style="font-size:9px;" class="text-gray-500">{{ __('index.ASHRAE Standard')}}.</p>
                    </li>

                    <li class="flex items-center w-full">
                      <span class="bg-gray-500 h-1 w-1 rounded-full mr-2"></span>
                      <p style="font-size:9px;" class="text-gray-500">{{ __('index.1-100 Energy Star Score')}}.</p>
                    </li>

                  </ul>
                </div>


               {{--  @if (auth::user()->tipo_user == 3)
                <button  x-show="step > 1" type="button" name="calcular_p_n" id="calcular_p_n" onclick="check_form_submit_demo(1,'{{App::getLocale()}}');"  class="w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto ">{{ __('index.calcular') }}</button>
                <button  x-show="step > 1" type="button" name="calcular_p_r" id="calcular_p_r" onclick="check_form_submit_demo(2,'{{App::getLocale()}}');"  class="w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto hidden">{{ __('index.calcular') }}</button>

                @endif --}}

                <div id="button_calcular_ene_fin" class="hidden">
                    <button style="background-color:#1B17BB;width: 20%;" x-show="step > 1" type="button" name="calcular_p_n" id="calcular_p_n" onclick="check_form_submit(1,'{{App::getLocale()}}','store','','');" class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto ">{{ __('index.calcular') }}</button>
                    <button style="background-color:#1B17BB;width: 20%;" x-show="step > 1" type="button" name="calcular_p_r" id="calcular_p_r" onclick="check_form_submit(2,'{{App::getLocale()}}','store','','');" class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto hidden">{{ __('index.calcular') }}</button>
                </div>

                <div id="button_sigiuente_mantenimiento" class="hidden">

                    <button  type="button" id="button_next_mantenimiento_noadicionales" name="button_next_mantenimiento_noadicionales"
                    style="background-color:#1B17BB;"
                        x-show="step == 2"
                        onclick="calcular_speendplan_base();"
                        class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                    >{{ __('index.guardar') }}</button>


                    <button  type="button" id="button_next_mantenimiento_costos_adicionales" name="button_next_mantenimiento_costos_adicionales"

                   style="background-color:#1B17BB;"
                       x-show="step == 4"
                       @click="step++"
                       class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                   >{{ __('mantenimiento.costos_operativos') }}</button>

                    <button  type="button" id="button_next_mantenimiento_costos_adicionales" name="button_next_mantenimiento_costos_adicionales"
                    onclick="calcular_speendplan_base_adicionales();"
                   style="background-color:#1B17BB;"
                       x-show="step == 3"
                       @click="step++"
                       class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                   >{{ __('index.siguiente') }}</button>

                   <button  type="button" id="button_next_mantenimiento_justificacion" name="button_next_mantenimiento_justificacion"

                  style="background-color:#1B17BB;"
                      x-show="step == 5"
                      @click="step++"
                      onclick="justificacion_financiera_send();"
                      class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                  >{{ __('mantenimiento.justificacion_financiera') }}</button>

                    <button  type="button" id="button_next_an_cost_mant" name="button_next_an_cost_mant"
                    style="background-color:#1B17BB;"
                        x-show="step == 6"
                        @click="step++"
                        class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto"
                    >{{ __('mantenimiento.speend_plan') }}</button>

                    <button style="background-color:#1B17BB;width: 20%;"  x-show="step == 7" type="button"
                    onclick="save_mantenimiento();" name="guardar_mantenimiento" id="guardar_mantenimiento" class="focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white hover:bg-blue-600 text-xl font-roboto">{{ __('index.guardar') }}</button>



                   </div>
                </div>





            </div>

            </div>
        </div>
    </div>
    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
</div>
</div>
<style>

.title_index{
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

  .unit_style{
    font-size: 1rem;
  }

  .check_style{
        width: 20px;height: 20px;
    }

    .type_proy_pos{
       margin-top:215px;
   }

    /* TOP BUTTONS */
    .text_butons_top{
        font-size: 80%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .button-size{
        padding: .30rem
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

  .unit_style{
    font-size: 1.25rem;
  }

  .check_style{
        width: 25px;height: 25px;
    }

    .type_proy_pos{
       margin-top:215px;
   }

    /* TOP BUTTONS */
    .text_butons_top{
        font-size: 75%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .button-size{
        padding: .30rem
    }
}

/* xl	1280px */
@media (min-width: 1280px) {
    .labels{
        font-size:11px;
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
    font-size: 2.2rem;
  }

  .unit_style{
    font-size: 1.25rem;
  }

  .type_proy_pos{
       margin-top:215px;
   }

    /* TOP BUTTONS */
    .text_butons_top{
        font-size: 80%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .button-size{
        padding: .30rem
    }
}

@media (min-width: 1540px) {
    .labels{
        font-size:11px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 20px;
    color:#1B17BB !important;"
    }

    .labels_index_mantenimiento{
            font-size: 19px;
            color:#1B17BB !important;"
    }


    .mapa_img{
        width: 550px; height:700px;
    }

    .type_proyect_label{
        font-size:18px;
    }

 .check_style{
        width: 30px;height: 30px;
    }
    .title_index{
    font-size: 2.5rem;
  }

  .unit_style{
    font-size: 1.25rem;
  }

  .type_proy_pos{
       margin-top:215px;
   }


   /* TOP BUTTONS */
    .text_butons_top{
        font-size: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .button-size{
        padding: .30rem
    }
}

@media (min-width: 1640px) {
    .labels{
        font-size:11px;
    }
    .ancho{
        width:100%;
    }
    .labels_index{
    font-size: 20px;
    color:#1B17BB !important;"
    }

    .labels_index_mantenimiento{
            font-size: 19px;
            color:#1B17BB !important;"
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

  .unit_style{
    font-size: 1.25rem;
  }

  .type_proy_pos{
       margin-top:215px;
   }
   /* TOP BUTTONS */
    .text_butons_top{
        font-size: 90%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .button-size{
        padding: .30rem
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
            color:#1B17BB !important;"
            }

            .labels_index_mantenimiento{
            font-size: 19px;
            color:#1B17BB !important;"
            }

            .mapa_img{
                width: 650px; height:650px;
        }
        .type_proyect_label{
            font-size:20px;
        }

        .check_style{
                width: 30px;height: 30px;
            }
        .title_index{
            font-size: 3rem;
              color:#1B17BB !important;"
        }

        .unit_style{
            font-size: 1.25rem;
        }

        .type_proy_pos{
            margin-top:215px;
        }

   /* TOP BUTTONS */
    .text_butons_top{
        font-size: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .button-size{
        padding: .60rem
    }
}
/* 2xl	1536px */
@media (min-width: 1940px) {
    .labels_index{
    font-size: 20px;
    color:#1B17BB !important;"
    }

    .labels_index_mantenimiento{
    font-size: 19px;
    color:#1B17BB !important;"
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

   /* TOP BUTTONS */
    .text_butons_top{
        font-size: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .button-size{
        padding: .60rem
    }

}
</style>
<script>
    $(document).ready(function () {
        set_ser_to_sers('SEER');
        mostrar_type_p('{{$check_types_pn}}','{{$check_types_pr}}');

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

    });

function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function app() {
			return {
				step: 1,
				passwordStrengthText: '',
				togglePassword: false,
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

</script>
@endsection
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection
