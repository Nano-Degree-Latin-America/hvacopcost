@extends('main.main')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
@endsection

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="bg-blue-900 w-full flex justify-center" style="background-image: radial-gradient(rgb(10,19,59) 0%,rgb(5,1,25) 100%);">
    <div class="w-1/3">
        <img class="header" style="height:99px;" name="" id="" src="{{asset('/assets/images/Logo-NDL_blanco_marca-r.png')}}" alt="Nano Degree">
    </div>
    <div class=" w-1/3 flex justify-center" style="line-height: 30px; height:99px;">
        {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}
        <a><img src="{{asset('/assets/images/Logotipo-HVACOPCOST_blanco.png')}}" alt="hvacopcost latinoamérica" style="max-height: 100px; width:230px;"></a>


    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-end h-1/3 gap-x-3">
    {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
    <button class="p-2 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='/mis_projectos'"><p>{{ __('index.mis proyectos') }}</p></button>

    <button class="p-2 bg-blue-600  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 " onclick="window.location.href='/home'"><p>{{ __('index.proyecto nuevo') }}</p></button>

    <a class="p-3 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"  href="{{ route('cerrar_session') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                <button>
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
    </style>

<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

@inject('traer_unidad_hvac','app\Http\Controllers\ResultadosController')
@inject('num_tarjets','app\Http\Controllers\ResultadosController')
@inject('num_tarjets_2','app\Http\Controllers\ResultadosController')
@inject('num_tarjets_3','app\Http\Controllers\ResultadosController')
@inject('paises_empresa','app\Http\Controllers\ResultadosController')
@inject('all_paises','app\Http\Controllers\ResultadosController')
@inject('check_types_p','app\Http\Controllers\ResultadosController')
<?php
$idm = App::getLocale();
?>
<div class="bg-white" x-data="app()" x-cloak>
    <div class="w-full px-4">

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

        <div x-show.transition="step != 'complete'">
            <div class="">
                <div x-show.transition.in="step === 1">
                    <h3><i></i></h3>

                    <div id="mapa-div">
                            <div class="xl:ml-5 col-6">
                                <h2 id="lblMapa">{{-- Da Clic en el Mapa --}}</h2>
                            <img class="mapa_img" style="margin-top:100px;" src="{{asset('assets\images\Mapa-Hvacopcost-3.png')}}" alt="" usemap="#mapa"{{--  onClick="cambiarLblMapa('Mapa') --}}">
                            <map class="w-full" name="mapa">
                                {{-- <area shape="polygon" coords="2,3, 67,5, 98,19, 121,43, 129,81, 174,65, 150,91, 139,112, 78,93, 29,54, 8,27" onclick="traer_ciudad_edit(17); cambiarLblMapa_Edit('México');change_option(17);" alt="México">
                                <area shape="polygon" coords="144,108, 155,96, 155,89, 175,84, 232,133, 216,150, 179,131, 171,117" onclick="traer_ciudad_edit(28); cambiarLblMapa_Edit('Centro América');change_option(28);" alt="Centro América">
                                <area shape="polygon" coords="187,59,210,55,237,66,272,76,302,83,302,91,260,95,226,92" onclick="traer_ciudad_edit(27); cambiarLblMapa_Edit('Caribe');change_option(27);" alt="Caribe">
                                <area shape="polygon" coords="227,142,234,139,244,126,258,120,256,128,253,136,258,142,266,146,272,148,279,152,285,151,285,158,285,167,280,171,274,173,271,182,273,193,256,193,241,181,233,179,224,173" onclick="traer_ciudad_edit(5); cambiarLblMapa_Edit('Colombia');change_option(5);" alt="Colombia">
                                <area shape="polygon" coords="223,175,229,179,237,179,241,185,236,192,227,196,222,203,214,202,210,192,213,179" onclick="traer_ciudad_edit(8); cambiarLblMapa_Edit('Ecuador');change_option(8);"  alt="Ecuador">
                                <area shape="polygon" coords="270,274,277,265,275,257,278,247,276,238,268,236,256,229,249,219,256,207,269,200,267,193,257,194,244,183,235,194,228,197,225,203,209,204,215,216,236,254,249,264" onclick="traer_ciudad_edit(21);cambiarLblMapa_Edit('Perú');change_option(21);"  alt="Perú">
                                <area shape="polygon" coords="278,237,287,237,299,231,301,240,309,246,327,255,329,265,339,267,340,282,333,281,319,282,315,295,306,295,297,294,288,297,283,282,279,270" onclick="traer_ciudad_edit(2); cambiarLblMapa_Edit('Bolivia');change_option(2);"  alt="Bolivia">
                                <area shape="polygon" coords="275,273,270,278,268,304,262,335,262,346,261,364,250,388,241,451,243,491,256,508,281,516,276,496,260,492,253,482,252,471,259,462,263,442,260,424,260,403,265,395,264,382,270,376,271,365,270,353,272,342,274,335,279,324,281,312,287,305,290,299,283,296" onclick="traer_ciudad_edit(4);cambiarLblMapa_Edit('Chile');change_option(4);"  alt="Chile">
                                <area shape="polygon" coords="319,307,314,297,307,300,297,296,292,300,289,307,283,311,283,320,278,331,274,346,273,365,272,376,266,386,266,403,262,408,263,430,264,441,260,464,255,470,261,485,281,493,280,479,297,462,298,449,292,447,298,436,309,423,318,411,327,397,346,389,352,378,339,365,341,343,351,331,336,327,340,314" onclick="traer_ciudad_edit(1);cambiarLblMapa_Edit('Argentina');change_option(1);"  alt="Argentina">
                                <area shape="polygon" coords="341,365,342,356,345,344,356,349,363,352,369,358,369,366,360,372,349,370" onclick="traer_ciudad_edit(25); cambiarLblMapa_Edit('Uruguay');change_option(25);"  alt="Uruguay">
                                <area shape="polygon" coords="373,355,361,348,351,344,351,335,364,325,369,320,363,313,358,302,351,296,343,296,343,279,345,271,339,264,328,255,301,236,292,230,280,236,269,236,270,229,261,229,254,220,263,205,273,202,276,185,289,176,303,176,310,171,318,159,332,159,331,169,335,174,347,172,373,171,380,160,403,184,451,196,478,216,471,233,451,253,451,278,432,302,421,303,398,316,396,333,386,347" onclick="traer_ciudad_edit(3); cambiarLblMapa_Edit('Brasil');change_option(3);"  alt="Brasil">
                                <area shape="polygon" coords="340,324,348,326,356,325,361,316,360,307,354,302,349,297,342,297,340,285,332,281,321,283,318,291,316,296,322,299,326,303,333,308,345,313" onclick="traer_ciudad_edit(19); cambiarLblMapa_Edit('Paraguay');change_option(19);"  alt="Paraguay">
                                <area shape="polygon" coords="266,119,260,123,256,131,260,136,261,142,274,145,279,148,289,148,291,171,301,172,308,167,304,159,314,158,324,154,333,157,334,166,343,170,358,168,374,166,375,156,349,149,326,133,313,126,292,126" onclick="traer_ciudad_edit(26); cambiarLblMapa_Edit('Venezuela/Guyana/Suniam');change_option(26);"  alt="Venezuela"> --}}
                            </map>
                            </div>
                            <div class="col-4 ml-5 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0">
                                {{-- <ul style="padding-bottom: 60px; text-align: justify; font-size: 15px; font-style: italic; font-weight: 400">
                                    <li>Horas de Enfriamiento por Región y Ciudad de Latin América </li>
                                    <li>Comparador de Sistemas de Enfriamiento </li>
                                    <li>Comparador de Eficiencia de Sistemas HVAC</li>
                                    <li>Comparador de Tipos de Sistemas de HVAC</li>
                                    <li>Comparador de Diferentes Tipos de Diseño en Sistemas de HVAC</li>
                                    <li>Comparador de Diferentes Tipos de Mantenimientos de Sistemas de HVAC</li>
                                    <li>Calculo de Costo Operativo Anual por Sistema </li>
                                    <li>Comparador Financiero de Sistemas de HVAC</li>
                                    <li>Calculo de Ahorro Financiero Acumulado del Sistema Propuesto</li>
                                    <li>Análisis de ROI por Sistema Propuesto  de HVAC</li>
                                </ul> --}}


                                     <form action="{{url('/edit_project', [$id_project])}}" novalidate method="POST" name="formulario" id="formulario" files="true" enctype="multipart/form-data">
                                        @csrf
                                        <div class="my-8">
                                            <label class="title_index font-roboto text-blue-800 font-bold leading-tight" for="">{{ __('index.análisis energético y financiero') }} <br> {{ __('index.de sistemas HVAC') }}</label>
                                        </div>
                                     <div class="w-full {{-- rounded-xl border-2 border-blue-500 --}} mt-2">
                                        <input type="number" class="hidden" id="type_p" name="type_p">
                                        <input type="text" value="update" class="hidden" id="action_submit_send" name="action_submit_send">
                                        <input type="text" name="idioma" id="idioma" value="{{$idm}}" class="hidden">

                                        <div class="flex w-full gap-x-10 my-2 mx-1 justify-center">

                                            <div class="grid justify-items-end h-full gap-y-3 w-1/2">
                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto font-bold" for=""><b>{{ __('index.nombre projecto') }}</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                <input onchange="check_input(this.value,this.id,'name_warning');check_inp_count('count_name_pro','name_pro');" name="name_pro" id="name_pro" value="{{$project_edit->name}}" type="text" style="font-size: 14px;" class="w-full border-2  border-blue-600 rounded-md p-1 my-1 font-roboto" >
                                                <input id="count_name_pro" name="count_name_pro" type="number" class="hidden" value="1">
                                                <span id="name_warning" name="name_warning" class="text-red-500"></span>
                                                </div>




                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto" for=""><b>{{ __('index.region') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <select onchange="check_input(this.value,this.id,'paises_warning');traer_ciudad_edit(this.value);check_inp_count('count_paises','paises_edit');" class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="paises_edit" id="paises_edit">
                                                       {{--  @foreach ($paises as $pais)
                                                        @if ($project_edit->region == $pais->pais)
                                                        <option selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                        @endif
                                                        @if ($project_edit->region != $pais->pais)
                                                        <option value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                        @endif
                                                        @endforeach --}}
                                                        <option value="0">-{{ __('index.selecciona tu region') }}-</option>
                                                        <?php  $all_paises=$all_paises->all_paises(); ?>
                                                            @foreach ($all_paises as $pais)

                                                            @if($pais->pais === 'Argentina')
                                                            <?php  $check_pais=$paises_empresa->check_pais('Argentina'); ?>
                                                                @if ($check_pais)
                                                                    @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                    @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Bolivia')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Bolivia'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Brasil')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Brasil'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Chile')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Chile'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif


                                                            @if($pais->pais === 'Colombia')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Colombia'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Ecuador')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Ecuador'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'México')
                                                                <?php  $check_pais=$paises_empresa->check_pais('México'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                        <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                         @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Paraguay')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Paraguay'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Perú')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Perú'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Uruguay')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Uruguay'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Venezuela')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Venezuela'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Caribe')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Caribe'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                        @if ($project_edit->region != $pais->pais)
                                                                            <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Centro América')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Centro América'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                            @if ($project_edit->region == $pais->pais)
                                                                            <option class="font-roboto" selected value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                            @endif
                                                                            @if ($project_edit->region != $pais->pais)
                                                                                <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                            @endif                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @endforeach
                                                    </select>
                                                    <input id="count_paises" name="count_paises" type="number" class="hidden" value="1">
                                                    <span id="paises_warning" name="paises_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto" for=""><b>{{ __('index.ciudad') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <select onchange="check_input(this.value,this.id,'ciudad_warning');getDegreeHrs_edd($('#paises_edit').val(),this.value);check_inp_count('count_ciudad','ciudades_edit');"  class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto"  name="ciudades_edit" id="ciudades_edit">
                                                    </select>
                                                    <input id="count_ciudad" name="count_ciudad" type="number" class="hidden" value="1" >
                                                    <span id="ciudad_warning" name="ciudad_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto font-bold text-left" for=""><b>{{ __('index.incremento anual energia') }}</b></label><label class="text-red-500"></label>
                                                    </div>
                                                    <select  onchange="check_input(this.value,this.id,'inc_ene_warning');" class="w-1/2 border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="inc_ene" id="inc_ene">
                                                        @for ($i = 0; $i <= 15; $i++)
                                                        @if ($i == $project_edit->inflacion)
                                                        <option selected value="{{$i}}">{{$i}}%</option>
                                                        @else
                                                        <option value="{{$i}}">{{$i}}%</option>
                                                        @endif
                                                        @endfor
                                                    </select>
                                                    <span id="inc_ene_warning" name="inc_ene_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label  class="labels_index font-roboto font-bold" for=""><b>{{ __('index.inflacion anual') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
{{--                                                     <input onkeypress="return soloNumeros(event)" onchange="check_input(this.value,this.id,'inc_ene_warning');" name="inc_ene" id="inc_ene" type="text" style="font-size: 14px;" class="w-full border-2  border-blue-600 rounded-md p-1 my-1 font-roboto" >
--}}                                                    <select  onchange="check_input(this.value,this.id,'inc_ene_warning');" class="w-1/2 border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="inflation_rate" id="inflation_rate">
                                                            @for ($i = 0; $i <= 15; $i++)
                                                            @if ($i == $project_edit->inflacion_rate)
                                                            <option selected value="{{$i}}">{{$i}}%</option>
                                                            @else
                                                            <option value="{{$i}}">{{$i}}%</option>
                                                            @endif
                                                            @endfor
                                                        </select>
                                                <span id="inflation_rate_warning" name="inflation_rate_warning" class="text-red-500"></span>
                                                </div>


                                            </div>

                                            <div class="grid justify-items-start h-full gap-y-3 w-1/2">
                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label class="labels_index font-roboto" for=""><b>{{ __('index.categoria edificio') }}</b></label></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <select  name="cat_ed_edit" id="cat_ed_edit"onchange="traer_t_edif_edd(this.value);set_porcent_hvac(this.value);check_input(this.value,this.id,'cat_ed_warning');check_inp_count('count_cat_ed','cat_ed_edit');"  class="w-full font-roboto border-2 border-blue-600 rounded-md p-1 my-1">
                                                        @foreach ($cate_edificio as $cat_edi)
                                                        @if ($project_edit->id_cat_edifico == $cat_edi->id)
                                                        <option selected value="{{$cat_edi->id}}">{{$cat_edi->name}}</option>
                                                        @endif
                                                        @if ($project_edit->id_cat_edifico != $cat_edi->id)
                                                        <option value="{{$cat_edi->id}}">{{$cat_edi->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    <input id="count_cat_ed" name="count_cat_ed" type="number" class="hidden" value="1">
                                                    <span id="cat_ed_warning" name="cat_ed_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                  <div class="flex w-full">
                                                    <label class="labels_index font-roboto" for=""><b>{{ __('index.tipo edificio') }}:</b></label><label class="text-red-500">*</label>
                                                  </div>
                                                    <select onchange="check_input(this.value,this.id,'tipo_Edificio_warning');check_inp_count('count_tipo_edificio','tipo_edificio_edit');" class="w-full border-2 border-blue-600  rounded-md p-1 my-1 font-roboto" name="tipo_edificio_edit"  id="tipo_edificio_edit"></select>
                                                    <input id="count_tipo_edificio" name="count_tipo_edificio" type="number" class="hidden" value="1">
                                                    <span id="tipo_Edificio_warning" name="tipo_Edificio_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="flex md:w-3/5 xl:w-3/5 lg:w-1/2 justify-start gap-x-3">
                                                    <div class="grid w-1/2 justify-items-start">
                                                         <div class="flex w-full">
                                                             <label class="labels_index font-roboto" for=""><b>{{ __('index.area') }}:</b></label><label class="text-red-500">*</label>
                                                         </div>
                                                         <input onchange="check_input(this.value,this.id,'ar_project_warning');format_nums_no_$(this.value,this.id);check_inp_count('count_ar_project','ar_project');"  value="{{number_format($project_edit->area)}}" name="ar_project" id="ar_project"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto text-center" >
                                                         <input id="count_ar_project" name="count_ar_project" type="number" class="hidden" value="1">
                                                         <span id="ar_project_warning" name="ar_project_warning" class="text-red-500"></span>
                                                    </div>

                                                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                     <div class="flex">
                                                     <div>
                                                     <div class="flex w-full">
                                                         <label class="labels_index font-roboto" for=""><b>{{ __('index.unidad') }}:</b></label><label class="text-red-500">*</label>
                                                     </div>
                                                     <div class="flex gap-x-3 mt-3">
                                                         @if($project_edit->unidad == 'mc' )
                                                         <div class="flex">
                                                             <input  id="check_mc" checked  onclick="check_unidad('mc');" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                             <label for="check_mc" class="ml-2 text-xl font-medium text-gray-900 dark:text-gray-300 font-roboto">m²</label>
                                                            </div>

                                                            <div class="flex">
                                                             <input  id="check_ft"  onclick="check_unidad('ft');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                             <label for="check_ft"   class="ml-2 text-xl font-medium text-gray-900 dark:text-gray-300 font-roboto">ft²</label>
                                                            </div>

                                                         @endif

                                                         @if($project_edit->unidad == 'ft' )
                                                         <div class="flex">
                                                             <input  id="check_mc"   onclick="check_unidad('mc');" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                             <label for="check_mc" class="ml-2 text-xl font-medium text-gray-900 dark:text-gray-300 font-roboto">m²</label>
                                                            </div>

                                                            <div class="flex">
                                                             <input  id="check_ft" checked onclick="check_unidad('ft');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                             <label for="check_ft"   class="ml-2 text-xl font-medium text-gray-900 dark:text-gray-300 font-roboto">ft²</label>
                                                            </div>

                                                         @endif
                                                         <input type="text" style="font-size: 14px;" class="hidden w-full border-2 border-blue-600 rounded-xl" value="{{$project_edit->unidad}}" name="unidad" id="unidad">
                                                         <input id="count_unidad" name="count_unidad" type="number" class="hidden" value="1">

                                                     </div>
                                                    </div>
                                                   </div>

                                                     {{-- <input type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-xl"  name="nombre_projecto" id="nombre_projecto"> --}}
                                                     </div>
                                                 </div>


                                                 <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                        <div class="flex w-full">
                                                            <label  class="labels_index font-roboto font-bold" for=""><b>{{ __('index.ocupacion semanal') }}</b></label><label class="text-red-500">*</label>
                                                        </div>
{{--                                                     <input onchange="check_input(this.value,this.id,'tiempo_porcent_warning');" value="{{$project_edit->hrs_tiempo}}"  name="tiempo_porcent" id="tiempo_porcent" type="text" style="font-size: 14px;" class="w-full border-2  border-blue-600 rounded-md p-1 my-1 font-roboto" >
 --}}                                               <select onchange="check_inp_count('count_tiempo_porcent','tiempo_porcent');" class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="tiempo_porcent" id="tiempo_porcent">
                                                        @switch($project_edit->hrs_tiempo)
                                                            @case(30)
                                                            <option selected value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option value="168">168 Hrs.</option>
                                                            @break

                                                            @case(80)
                                                            <option  value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option selected value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option value="168">168 Hrs.</option>
                                                            @break

                                                            @case(168)
                                                            <option value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                            <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                            <option selected value="168">168 Hrs.</option>
                                                            @break

                                                            @default

                                                        @endswitch


                                                    </select>
                                                    <input id="count_tiempo_porcent" name="count_tiempo_porcent" type="number" class="hidden" value="1">

                                                    <span id="tiempo_porcent_warning" name="tiempo_porcent_warning" class="text-red-500"></span>
                                                </div>
                                                @include('modal_energia_hvac')
                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                    <div class="flex w-full">
                                                        <label class="labels_index font-roboto" for=""><b>{{ __('index.energia hvac en el edificio') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <div class="flex w-full">
                                                        <select onchange="buton_check_edit();check_input(this.value,this.id,'por_hvac_warning');check_inp_count('count_porcent_hvac','porcent_hvac');" class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="porcent_hvac" id="porcent_hvac">
                                                            <option value="0">-{{ __('index.selecciona porcentaje') }}-</option>
                                                        </select>
                                                        <input id="count_porcent_hvac" name="count_porcent_hvac" type="number" class="hidden" value="1">

                                                        <div class="ml-2" style="margin-top: 5.5px;">
                                                            <a onclick="mostrar_modal_energia_hvac('modal_energia_hvac');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                                                        </div>
                                                    </div>
                                                    <span id="por_hvac_warning" name="por_hvac_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-startmt-5 ">
                                                    <div id="div_next" name="div_next" class="w-1/2 text-right">
                                                        <button type="button" id="next" name="next"
                                                            onclick="buton_check_edit();"
                                                            class="w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto"
                                                        >{{ __('index.siguiente') }}</button>
                                                    </div>
                                                    <div id="div_next_h" name="div_next_h" class="w-1/2 text-right">
                                                            <button  type="button" id="next_h" name="next_h"
                                                                x-show="step < 2"
                                                                @click="step++"
                                                                class="w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto"
                                                            >{{ __('index.siguiente') }}</button>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>

                                 {{-- <div class="bullets">
                                   <h2><i class="far fa-snowflake"></i> Consulta</h2>
                                    <div>
                                        <span><i class="fas fa-check"></i> Horas de Enfriamiento por Región y Ciudad en Latin America</span>
                                        <span><i class="fas fa-check"></i> Análisis ROI por Sistema Propuesto HVAC</span>
                                    </div>
                                    <h2><i class="far fa-snowflake"></i> Calcula</h2>
                                    <div>
                                        <span><i class="fas fa-check"></i> Costo Operativo Anual por Sistema</span>
                                        <span><i class="fas fa-check"></i> Ahorro Financiero Acumulado del Sistema Propuesto</span>
                                    </div>
                                    <h2><i class="far fa-snowflake"></i> Compara</h2>
                                    <div>
                                        <span><i class="fas fa-check"></i> Tipos de Sistemas HVAC</span>
                                        <span><i class="fas fa-check"></i> Mantenimientos de Sistemas HVAC</span>
                                    </div>
                                </div> --}}

                               {{--  <table id="tabla-region" style="float: left; ">
                                    <tr>
                                        <td colspan="2"><b style="font-size: 20px">Selecciona tu Región y Ciudad.</b></td>
                                    </tr>
                                    <tr>
                                        <td><label>Región</label></td>
                                        <td style="position: relative; top: 7px">
                                            <select class="fcontrol" name="paises" id="paises">
                                                <option value="0">-Selecciona tu región-</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><label>Ciudad</label></td>
                                        <td style="position: relative; top: 7px">
                                            <select class="fcontrol" name="ciudades" id="ciudades">
                                                <option value="0">-Selecciona tu ciudad-</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table> --}}


                                <div class="clearfix"></div>
                                {{-- <div class="banner banner-h-sm" style="margin: 0px 0px !important">
                                    <a href="https://www.universidadhvac.com/" target="_blank"><img src="{{asset('assets/images/banners/universidad.jpg')}}" alt="Universidad hvac"></a>
                                    <span class="lbl-banner">Visitar</span>
                                </div> --}}
                            </div>
                            <div class="ml-5 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">
                                <div  class="grid gap-y-3 type_proy_pos">
                                    <?php  $check_types_pn=$check_types_p->check_p_type_pn(Auth::user()->id_empresa); ?>
                                    <?php  $check_types_pr=$check_types_p->check_p_type_pr(Auth::user()->id_empresa); ?>

                                    @if ( $check_types_pn == 1 &&  $check_types_pr == 1)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 1 &&  $check_types_pr == 0)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input disabled class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 0 &&  $check_types_pr == 1)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  checked class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input disabled class="check_style" id="pr" type="checkbox" checked onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>
                                    @endif

                                    @if ( !$check_types_pn &&  !$check_types_pr)
                                    <div class="flex">
                                        @if ($type_p == 1 || $type_p == 0)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        @if ($type_p == 2)
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Nuevo</label>
                                    </div>

                                    <div class="flex">
                                        @if ($type_p == 2)
                                            <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif

                                        @if ($type_p == 1 || $type_p == 0)
                                            <input disabled class="check_style" id="pr" type="checkbox" onclick="check_form_proy('pr','display_nuevo_project_edit','display_nuevo_retrofit_edit','calcular_p_n_Edit','calcular_p_r_Edit','edit','{{$type_p}}');"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        @endif
                                        <label for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold">Proyecto Retrofit</label>
                                    </div>
                                    @endif
                                    </div>

                            </div>
                    </div>


                    {{-- /////////////////////////////////////////////////////////////////////////////////////////////////// --}}

                </div>
                <div x-show.transition.in="step === 2">

                    <div class="ancho">

                          {{--   <hr style="width: 100%;"> --}}


                          <div id="display_nuevo_project_edit" class="hidden">
                            @include('edit_np_form')
                        </div>

                        <div id="display_nuevo_retrofit_edit" class="hidden">
                            @include('edit_rp_form')
                        </div>
                            <div class="clearfix">
                                <div class="my-5 gap-x-3">
                                    {{--   <input type="file" id="file" name="file"> --}}
                                  </div>
                            </div>
                            <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">
                                {{-- espacio --}}
                        </div>
                           {{--  <div class="banner banner-giga" style="width: 80%">
                                <a href="https://www.desprosoft.com/" target="_blank"><img src="{{asset('assets/images/banners/desprosoft.jpg')}}" alt="Desprosoft"></a>
                                <span class="lbl-banner hidden">Visitar</span>
                            </div> --}}



                        </form>
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


                    @if ($type_p == 1 || $type_p == 0)
                    <a href="/project/{{$id_project}}">
                    @endif

                    @if ($type_p == 2)
                    <a href="/resultados_retrofit/{{$id_project}}">
                    @endif
                        <button
                        x-show="step == 1"
                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-xl border font-roboto"
                    >{{ __('index.resultado') }}</button>
                    </a>
                </div>


                <div  x-show="step < 2" class="w-1/2 flex" style=" justify-content: left;">
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
                <div  x-show="step === 2" class="w-1/2 flex" style=" justify-content: center;">

                <button x-show="step > 1" type="button" name="calcular_p_n_Edit" title="Guardar Proyecto Nuevo" id="calcular_p_n_Edit" onclick="check_form_submit(1,'{{$idm}}');"  class="hidden w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto">{{ __('index.guardar') }}</button>
                <button x-show="step > 1" type="button" name="calcular_p_r_Edit" title="Guardar Proyecto Retrofit" id="calcular_p_r_Edit" onclick="check_form_submit(2,'{{$idm}}');"  class="hidden w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto">{{ __('index.guardar') }}</button>

            </div>
            </div>
        </div>
    </div>
    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
</div>
<style>@media (min-width: 640px) {
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
<script>

window.onload = function() {

    check_form_proy_edit('{{$type_p}}');
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
    //let cost_ele = $('#costo_elec_1_1_retro').val();
   /*  asign_cos_ele(cost_ele); */

   setTimeout(function() {
    checksuma();
}, 1000);
};


function app() {
			return {
				step: 1,
				passwordStrengthText: '',
				togglePassword: false,

				image: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAAAAAAAD/4QBCRXhpZgAATU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAAkAAAAMAAAABAAAAAEABAAEAAAABAAAAAAAAAAAAAP/bAEMACwkJBwkJBwkJCQkLCQkJCQkJCwkLCwwLCwsMDRAMEQ4NDgwSGRIlGh0lHRkfHCkpFiU3NTYaKjI+LSkwGTshE//bAEMBBwgICwkLFQsLFSwdGR0sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLP/AABEIAdoB2gMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAAAAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APTmZsnmk3N60N1NJTELub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lJQA7c3rSbm9aSigBdzetG4+tJRQAZPrRuPrSUUALub1/lRub1pKSgBdzUbm9aSigBdzetG5vX+VJSUALub1/lUu5qhqXj1oAG6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooASiiigAooooAKSiigAooo+lACUZoooAKKKSgAo/rRSUALUlRVJz60AObqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkoooAKKKKACiikoAKSlooASiiigA+lHpRQaACkoooATmilpPegBP/ANdS5HrUdSfL7UAObqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKSiigAooooAKKKKAEooooASij60UAFFFHpQAUmaKPxoAKSlpPWgA/wAmk/pS/Sk47dqADpUvPvUXrUn4H8qAHt1NJSt1NJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFISFBJIAHUk4FAC0VTlv4EyEBc+3C/nVSS9uX6MEHonX8zQBrEqvLEAe5A/nUTXVqvWVfwyf5VjFmY5Ykn3JP86SmBrG/tB3c/RTTf7QtvST8hWXRQBqi/te+8f8AAc09by0b/loB/vAiseigDeV43+66t9CDTq5/p04+lTJdXMfSQkej/MP1oA2qKoR6gpwJUK/7Scj8utXEkjkG5GDD2P8AMUgH0UUUAFFFJQAUUUUAFFFJQAtJRRQAUlFFABR2oo+lAB1pKKP60AFFFFACUHjNH/66KAEpaSj/APVQAc0/I9KZUufpQA5uppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACimsyopZiAo5JNZlxePLlI8rH0J/ib60AWp72KLKph3/wDHR9TWdLNNMcuxPoOij6Co6KYBRRRQAUUUUAFFFFABRRRQAUUUUAFKruhDIxUjuDikooA0IL/os4/4Gv8AUVfBVgCpBB6Ecg1gVLBcSwH5eUP3lPQ/SgDaoqOKaOZdyH/eB6qfepKQBRRRQAlFFFABSUUUAFFFFABRRSf5NABxR6e1FJQAcUUUnP6UALSf5/GjvRz+FAB06d6KT6UGgA96kyf8mo//ANdP59P1oAlbqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACmu6RqzucKvJNKSACScADJJ7Csi6uDO2BkRqflHr7mgBLi5edu4QH5V/qagoopgFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACUUUUAPjkkiYOhwR+RHoa14J0nTI4YffX0NYtPileJ1dDyOoPQj0NAG7SUyKVJkDr36juD6U+kAUhoooAKKKKACij/JpKACj/PNFFABScUelFACUdqP8mj+dABn9KMjij60d+tACf5FH5Uf59qOOlACfhUn40zmn4oAlbqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKhuJhDEz/xfdQerGgCpfXGT5CHgf6w+/8AdqhQSSSScknJPqTRTAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkoooAKKKKACiiigCe2nMEnP+rbhx6e9bHoQevT3zXP1p2M+9DE33k5X/AHf/AK1AF2koNFIAoopKAFpKKPSgApPX0pf8mkoAKKTPP1paAE+lFFIT/ntQAelHAoz0oz/hQAd6T155oooAKk2+wqLPt/8AWqTj1P5GgCZuppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArJvpd8uwH5Y+P+BHrWnK4jjkc/wAKkj69qwiSSSepJJ+ppgFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSUUUAFFFFABRRSUAFFFFABT4pDFIkg/hPPuO4plFAG8CGAYchgCD7HmlqpYy74dp6xnH4HkVapALSUUUAH+NFFJQAc0f5+tHFJQAUUUepoAP/r0nP/1sUH1ozQAUnOaPwo9OlAAcd6T60tJQAHn+lSZPotR/55qTJ/yKAJm6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAKWoPiNE/vtk/RazKt6g2Zgv9xB+Z5qpTAKKKKACiiigAooooAKKKKA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',
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
                $("#tipo_edificio_edit").find('option[value="' + cat_ed.id + '"]').attr("selected", "selected");;
                }else if(id_tipo_edi != cat_ed.id){
                    $('#tipo_edificio_edit').append($('<option>', {
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

function traer_t_edif_edd(id_cat) {
    $.ajax({
        type: 'get',
        url: '/get_cat_edi/'+ id_cat,
        success: function (response) {
            $('#tipo_edificio_edit').empty();
            $('#tipo_edificio_edit').append($('<option>', {
                value: 0,
                text: 'Seleccionar'
            }));
            $('#count_tipo_edificio').val(0);
            checksuma();
            response.map((cat_ed, i) => {
                $('#tipo_edificio_edit').append($('<option>', {
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

                    $("#ciudades_edit").find('option[value="' + ciudades.idCiudad + '"]').attr("selected", "selected");;
                    }else if(id_ciudad != ciudades.ciudad){
                        $('#ciudades_edit').append($('<option>', {
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
            console.log(response);

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
