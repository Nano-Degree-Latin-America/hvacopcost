@extends('main.main')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
@endsection

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="blur" class="blur">
    @include('main.topbar')
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

    </style>
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
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
        @inject('paises_empresa','app\Http\Controllers\IndexController')
        @inject('all_paises','app\Http\Controllers\IndexController')
        @inject('check_types_p','app\Http\Controllers\IndexController')

        <div x-show.transition="step != 'complete'">
            <div class="">
                <div x-show.transition.in="step === 1">
                    <h3><i></i></h3>

                    <div id="mapa-div">
                            <div class=" xl:ml-5 col-6">
                                <h2 id="lblMapa">{{-- Da Clic en el Mapa --}}</h2>
                            <img  class="mapa_img" style="margin-top:100px;" src="{{asset('assets\images\Mapa-Hvacopcost-3.png')}}" alt="" usemap="#mapa" {{-- onClick="cambiarLblMapa('Mapa')" --}}>
                            <map class="w-full" name="mapa">
                                {{-- <area shape="polygon" coords="2,3, 67,5, 98,19, 121,43, 129,81, 174,65, 150,91, 139,112, 78,93, 29,54, 8,27" onclick="getCiudades(17); cambiarLblMapa('México')" alt="México">
                                <area shape="polygon" coords="144,108, 155,96, 155,89, 175,84, 232,133, 216,150, 179,131, 171,117" onclick="getCiudades(28); cambiarLblMapa('Centro América')" alt="Centro América">
                                <area shape="polygon" coords="187,59,210,55,237,66,272,76,302,83,302,91,260,95,226,92" onclick="getCiudades(27); cambiarLblMapa('Caribe')" alt="Caribe">
                                <area shape="polygon" coords="227,142,234,139,244,126,258,120,256,128,253,136,258,142,266,146,272,148,279,152,285,151,285,158,285,167,280,171,274,173,271,182,273,193,256,193,241,181,233,179,224,173" onclick="getCiudades(5); cambiarLblMapa('Colombia')" alt="Colombia">
                                <area shape="polygon" coords="223,175,229,179,237,179,241,185,236,192,227,196,222,203,214,202,210,192,213,179" onclick="getCiudades(8); cambiarLblMapa('Ecuador')"  alt="Ecuador">
                                <area shape="polygon" coords="270,274,277,265,275,257,278,247,276,238,268,236,256,229,249,219,256,207,269,200,267,193,257,194,244,183,235,194,228,197,225,203,209,204,215,216,236,254,249,264" onclick="getCiudades(21); cambiarLblMapa('Perú')"  alt="Perú">
                                <area shape="polygon" coords="278,237,287,237,299,231,301,240,309,246,327,255,329,265,339,267,340,282,333,281,319,282,315,295,306,295,297,294,288,297,283,282,279,270" onclick="getCiudades(2); cambiarLblMapa('Bolivia')"  alt="Bolivia">
                                <area shape="polygon" coords="275,273,270,278,268,304,262,335,262,346,261,364,250,388,241,451,243,491,256,508,281,516,276,496,260,492,253,482,252,471,259,462,263,442,260,424,260,403,265,395,264,382,270,376,271,365,270,353,272,342,274,335,279,324,281,312,287,305,290,299,283,296" onclick="getCiudades(4); cambiarLblMapa('Chile')"  alt="Chile">
                                <area shape="polygon" coords="319,307,314,297,307,300,297,296,292,300,289,307,283,311,283,320,278,331,274,346,273,365,272,376,266,386,266,403,262,408,263,430,264,441,260,464,255,470,261,485,281,493,280,479,297,462,298,449,292,447,298,436,309,423,318,411,327,397,346,389,352,378,339,365,341,343,351,331,336,327,340,314" onclick="getCiudades(1); cambiarLblMapa('Argentina')"  alt="Argentina">
                                <area shape="polygon" coords="341,365,342,356,345,344,356,349,363,352,369,358,369,366,360,372,349,370" onclick="getCiudades(25); cambiarLblMapa('Uruguay')"  alt="Uruguay">
                                <area shape="polygon" coords="373,355,361,348,351,344,351,335,364,325,369,320,363,313,358,302,351,296,343,296,343,279,345,271,339,264,328,255,301,236,292,230,280,236,269,236,270,229,261,229,254,220,263,205,273,202,276,185,289,176,303,176,310,171,318,159,332,159,331,169,335,174,347,172,373,171,380,160,403,184,451,196,478,216,471,233,451,253,451,278,432,302,421,303,398,316,396,333,386,347" onclick="getCiudades(3); cambiarLblMapa('Brasil')"  alt="Brasil">
                                <area shape="polygon" coords="340,324,348,326,356,325,361,316,360,307,354,302,349,297,342,297,340,285,332,281,321,283,318,291,316,296,322,299,326,303,333,308,345,313" onclick="getCiudades(19); cambiarLblMapa('Paraguay')"  alt="Paraguay">
                                <area shape="polygon" coords="266,119,260,123,256,131,260,136,261,142,274,145,279,148,289,148,291,171,301,172,308,167,304,159,314,158,324,154,333,157,334,166,343,170,358,168,374,166,375,156,349,149,326,133,313,126,292,126" onclick="getCiudades(26); cambiarLblMapa('Venezuela/Guyana/Suniam')"  alt="Venezuela"> --}}
                            </map>
                            </div>
                            <div class="col-4 ml-5 xl:ml-0 lg:ml-0 md:ml-0 lg:sm-0 ">
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
                                {{-- <div class="contenedor pb-15">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                        <button class="botonF1 mt-8">
                                            Cerrar Sesión
                                            </button>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                                     </div> --}}
                                     <form action="{{route('resultados')}}" novalidate method="POST" name="formulario" id="formulario" files="true" enctype="multipart/form-data">
                                        @csrf
                                        <div class="my-8">
                                            <label class="title_index font-roboto text-blue-800 font-bold leading-tight" for="">{{ __('index.análisis energético y financiero') }} <br> {{ __('index.de sistemas HVAC') }}</label>
                                        </div>
                                     <div class="w-full {{-- rounded-xl border-2 border-blue-500 --}} mt-2">

                                        <input type="number" class="hidden" id="type_p" name="type_p">
                                        <div class="flex w-full gap-x-10 my-2 mx-1 justify-center">

                                            <div class="grid justify-items-end h-full gap-y-3 w-1/2">

                                                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                            <div class="flex w-full">
                                                                <label  class="labels_index font-roboto font-bold text-left" for=""><b>{{ __('index.nombre projecto') }}</b></label><label class="text-red-500">*</label>
                                                            </div>
                                                        <input onchange="check_input(this.value,this.id,'name_warning');check_inp_count('count_name_pro','name_pro');" name="name_pro" id="name_pro" type="text" style="font-size: 14px;" class="w-full border-2  border-blue-600 rounded-md p-1 my-1 font-roboto" >
                                                        <input id="count_name_pro" name="count_name_pro" type="number" class="hidden" value="0">
                                                        <span id="name_warning" name="name_warning" class="text-red-500"></span>
                                                    </div>


                                                     <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                        <div class="flex w-full">
                                                            <label class="labels_index font-roboto text-left" for=""><b>{{ __('index.region') }}</b></label><label class="text-red-500">*</label>
                                                        </div>

                                                        <select onchange="check_input(this.value,this.id,'paises_warning');check_inp_count('count_paises','paises');" class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="paises" id="paises">
                                                            <option value="0">-{{ __('index.selecciona tu region') }}-</option>
                                                            <?php  $all_paises=$all_paises->all_paises(); ?>
                                                            @foreach ($all_paises as $pais)

                                                            @if($pais->pais === 'Argentina')
                                                            <?php  $check_pais=$paises_empresa->check_pais('Argentina'); ?>
                                                                @if ($check_pais)
                                                                    @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                    @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Bolivia')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Bolivia'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Brasil')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Brasil'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Chile')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Chile'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif


                                                            @if($pais->pais === 'Colombia')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Colombia'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Ecuador')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Ecuador'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'México')
                                                                <?php  $check_pais=$paises_empresa->check_pais('México'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Paraguay')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Paraguay'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Perú')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Perú'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Uruguay')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Uruguay'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Venezuela')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Venezuela'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Caribe')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Caribe'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @if($pais->pais === 'Centro América')
                                                                <?php  $check_pais=$paises_empresa->check_pais('Centro América'); ?>
                                                                @if ($check_pais)
                                                                        @if($check_pais->pais === $pais->pais)
                                                                        <option class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                        @endif
                                                                @else
                                                                    <option disabled class="font-roboto" value="{{$pais->idPais}}">{{$pais->pais}}</option>
                                                                @endif
                                                            @endif

                                                            @endforeach

                                                        </select>
                                                        <input id="count_paises" name="count_paises" type="number" class="hidden" value="0">
                                                        <span id="paises_warning" name="paises_warning" class="text-red-500"></span>
                                                    </div>

                                                    <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                        <div class="flex w-full">
                                                            <label  class="labels_index text-left font-roboto" for=""><b>{{ __('index.ciudad') }}</b></label><label class="text-red-500">*</label>
                                                        </div>
                                                        <select onchange="check_input(this.value,this.id,'ciudad_warning');check_inp_count('count_ciudad','ciudades');" class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto"  name="ciudades" id="ciudades">
                                                            <option value="0">-{{ __('index.selecciona tu ciudad') }}-</option>
                                                        </select>
                                                        <input id="count_ciudad" name="count_ciudad" type="number" class="hidden" value="0" >
                                                        <span id="ciudad_warning" name="ciudad_warning" class="text-red-500"></span>
                                                    </div>

                                                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                        <div class="flex w-full">
                                                            <label  class="labels_index text-left font-roboto font-bold text-left" for=""><b>{{ __('index.incremento anual energia') }}</b></label><label class="text-red-500 text-left"></label>
                                                        </div>
{{--                                                     <input onkeypress="return soloNumeros(event)" onchange="check_input(this.value,this.id,'inc_ene_warning');" name="inc_ene" id="inc_ene" type="text" style="font-size: 14px;" class="w-full border-2  border-blue-600 rounded-md p-1 my-1 font-roboto" >
 --}}                                                    <select  onchange="check_input(this.value,this.id,'inc_ene_warning');" class="w-1/2 border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="inc_ene" id="inc_ene">
                                                                @for ($i = 0; $i <= 15; $i++)
                                                                <option value="{{$i}}">{{$i}}%</option>
                                                                @endfor
                                                            </select>
                                                        <span id="inc_ene_warning" name="inc_ene_warning" class="text-red-500"></span>
                                                    </div>

                                                    <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                        <div class="flex w-full">
                                                            <label  class="labels_index font-roboto font-bold text-left" for=""><b>{{ __('index.inflacion anual') }}:</b></label><label class="text-red-500">*</label>
                                                        </div>
{{--                                                     <input onkeypress="return soloNumeros(event)" onchange="check_input(this.value,this.id,'inc_ene_warning');" name="inc_ene" id="inc_ene" type="text" style="font-size: 14px;" class="w-full border-2  border-blue-600 rounded-md p-1 my-1 font-roboto" >
 --}}                                                    <select  onchange="check_input(this.value,this.id,'inc_ene_warning');" class="w-1/2 border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="inflation_rate" id="inflation_rate">
                                                                @for ($i = 0; $i <= 15; $i++)
                                                                <option value="{{$i}}">{{$i}}%</option>
                                                                @endfor
                                                            </select>
                                                    <span id="inflation_rate_warning" name="inflation_rate_warning" class="text-red-500"></span>
                                                    </div>



                                            </div>

                                            <div class="grid justify-items-start h-full gap-y-3 w-1/2">

                                                <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                    <div class="flex w-full">
                                                        <label  class="font-roboto labels_index  text-left" for=""><b>{{ __('index.categoria edificio') }}</b></label></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <select  name="cat_ed" id="cat_ed" onchange="traer_t_edif(this.value);set_porcent_hvac(this.value);check_input(this.value,this.id,'cat_ed_warning');check_inp_count('count_cat_ed','cat_ed');"  class="w-full font-roboto border-2 border-blue-600 rounded-md p-1 my-1"></select>
                                                    <input id="count_cat_ed" name="count_cat_ed" type="number" class="hidden" value="0">
                                                    <span id="cat_ed_warning" name="cat_ed_warning" class="text-red-500"></span>
                                                </div>
{{--  --}}
                                                <div class="flex w-full gap-x-4">
                                                    <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                        <div class="flex w-full">
                                                            <label  class="font-roboto labels_index" for=""><b>{{ __('index.tipo edificio') }}:</b></label><label class="text-red-500">*</label>
                                                        </div>
                                                            <select onchange="check_input(this.value,this.id,'tipo_Edificio_warning');check_inp_count('count_tipo_edificio','tipo_edificio');" class="w-full border-2 border-blue-600  rounded-md p-1 my-1 font-roboto" name="tipo_edificio"  id="tipo_edificio"></select>
                                                            <input id="count_tipo_edificio" name="count_tipo_edificio" type="number" class="hidden" value="0">
                                                            <span id="tipo_Edificio_warning" name="tipo_Edificio_warning" class="text-red-500"></span>
                                                    </div>



                                                </div>

                                                <div class="flex  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-start gap-x-3">
                                                    <div class="grid w-1/2 justify-items-start">
                                                            <div class="flex w-full">
                                                                <label  class="font-roboto labels_index" for=""><b>{{ __('index.area') }}:</b></label><label class="text-red-500">*</label>
                                                            </div>
                                                            <input onchange="check_input(this.value,this.id,'ar_project_warning');format_nums_no_$(this.value,this.id);check_inp_count('count_ar_project','ar_project');"  name="ar_project" id="ar_project"  onkeypress="return soloNumeros(event)" type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto text-center" >
                                                            <input id="count_ar_project" name="count_ar_project" type="number" class="hidden" value="0">
                                                            <span id="ar_project_warning" name="ar_project_warning" class="text-red-500"></span>
                                                    </div>

                                                <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                        <div class="flex">
                                                            <div>
                                                                    <div class="flex w-full">
                                                                        <label  class="font-roboto labels_index" for=""><b>{{ __('index.unidad') }}:</b></label><label class="text-red-500">*</label>
                                                                    </div>
                                                                    <div class="flex gap-x-3 mt-3">
                                                                    <div class="flex">
                                                                        <input  id="check_mc"  onclick="check_unidad('mc');" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                        <label for="check_mc" class="ml-2 unit_style font-medium text-gray-900 dark:text-gray-300 font-roboto">m²</label>
                                                                    </div>

                                                                    <div class="flex">
                                                                        <input  id="check_ft"  onclick="check_unidad('ft');" type="checkbox"  class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                        <label for="check_ft"   class="ml-2 unit_style font-medium text-gray-900 dark:text-gray-300 font-roboto">ft²</label>
                                                                    </div>
                                                                    </div>

                                                            </div>
                                                        </div>
                                                        <input type="text" style="font-size: 14px;" class="hidden w-full border-2 border-blue-600 rounded-xl"  name="unidad" id="unidad" value="0">
                                                        <input id="count_unidad" name="count_unidad" type="number" class="hidden" value="0">

                                                    {{-- <input type="text" style="font-size: 14px;" class="w-full border-2 border-blue-600 rounded-xl"  name="nombre_projecto" id="nombre_projecto"> --}}
                                                    </div>
                                                </div>


                                                <div class="grid md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start ">
                                                        <div class="flex w-full justify-start">
                                                            <label  class="font-roboto font-bold text-left labels_index" for=""><b>{{ __('index.ocupacion semanal') }}</b></label><label class="text-red-500">*</label>
                                                        </div>
{{--                                                     <input onchange="check_input(this.value,this.id,'tiempo_porcent_warning');"  name="tiempo_porcent"  id="tiempo_porcent" type="text" style="font-size: 14px;" class="w-full border-2  border-blue-600 rounded-md p-1 my-1 font-roboto" >
 --}}

                                                                <select onchange="check_input(this.value,this.id,'tiempo_porcent_warning');check_inp_count('count_tiempo_porcent','tiempo_porcent');" class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="tiempo_porcent" id="tiempo_porcent">
                                                                    <option value="">-{{ __('index.seleccionar horas') }}-</option>
                                                                    <option value="m_50">{{ __('index.menos de 50 hrs') }}.</option>
                                                                    <option value="51_167 ">{{ __('index.51 a 167 hrs') }}.</option>
                                                                    <option value="168">{{ __('index.168 hrs') }}.</option>
                                                                </select>

                                                        <input id="count_tiempo_porcent" name="count_tiempo_porcent" type="number" class="hidden" value="0">
                                                        <span id="tiempo_porcent_warning" name="tiempo_porcent_warning" class="text-red-500"></span>
                                                </div>
                                                @include('modal_energia_hvac')

                                                <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start">
                                                    <div class="flex w-full">
                                                        <label  class="font-roboto text-left labels_index" for=""><b>{{ __('index.energia hvac en el edificio') }}:</b></label><label class="text-red-500">*</label>
                                                    </div>
                                                    <div class="flex w-full">
                                                        <select onchange="buton_check();check_input(this.value,this.id,'por_hvac_warning');check_inp_count('count_porcent_hvac','porcent_hvac');" class=" w-full border-2 border-blue-600 rounded-md p-1 my-1 font-roboto" name="porcent_hvac" id="porcent_hvac">
                                                            <option value="0">-{{ __('index.selecciona porcentaje') }}-</option>
                                                        </select>
                                                        <input id="count_porcent_hvac" name="count_porcent_hvac" type="number" class="hidden" value="0">
                                                        <div class="ml-2" style="margin-top: 5.5px;">
                                                            <a onclick="mostrar_modal_energia_hvac('modal_energia_hvac');" class="btn_roundf" title="Ayuda" alt="Ayuda"><i class="fa fa-question"></i></a>
                                                        </div>
                                                    </div>
                                                    <span id="por_hvac_warning" name="por_hvac_warning" class="text-red-500"></span>
                                                </div>

                                                <div class="grid  md:w-3/5 xl:w-3/5 lg:w-1/2 justify-items-start mt-5">
                                                    <div id="div_next" name="div_next" class="w-1/2 text-right">
                                                        <button type="button"  id="next" name="next"
                                                            onclick="buton_check();"
                                                            class="w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto"
                                                        >{{ __('index.siguiente') }}</button>
                                                    </div>
                                                    <div id="div_next_h" name="div_next_h" class="w-1/2 text-right">
                                                            <button  type="button"  id="next_h" name="next_h"
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
                                <div class="grid gap-y-3 type_proy_pos">

                                    <?php  $check_types_pn=$check_types_p->check_p_type_pn(Auth::user()->id_empresa); ?>
                                    <?php  $check_types_pr=$check_types_p->check_p_type_pr(Auth::user()->id_empresa); ?>

                                    @if ( $check_types_pn == 1 &&  $check_types_pr == 1)
                                    <div class="flex">
                                        <input class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"  checked class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
                                    </div>

                                    <div class="flex">
                                        <input class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 1 &&  $check_types_pr == 0)
                                    <div class="flex">
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"  checked class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
                                    </div>

                                    <div class="flex">
                                        <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
                                    </div>
                                    @endif

                                    @if ( $check_types_pn == 0 &&  $check_types_pr == 1)
                                    <div class="flex">
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"   class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
                                    </div>

                                    <div class="flex">
                                        <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" checked class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
                                    </div>
                                    @endif

                                    @if ( !$check_types_pn && !$check_types_pr)
                                    <?php  $check_types_pn = 0?>
                                    <?php  $check_types_pr = 0?>
                                    <div class="flex">
                                        <input disabled class="check_style" id="pn" onclick="check_form_proy('pn','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');" type="checkbox"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label  for="pn"  class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto nuevo') }}</label>
                                    </div>

                                    <div class="flex">
                                        <input disabled class="check_style" id="pr" type="checkbox"  onclick="check_form_proy('pr','display_nuevo_project','display_nuevo_retrofit','calcular_p_n','calcular_p_r','store');"  class="w-4 h-4 text-blue-800 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label  for="pr"   class="type_proyect_label ml-2 font-medium text-blue-800 dark:text-gray-300 font-roboto font-bold text-left">{{ __('index.proyecto retrofit') }}</label>
                                    </div>
                                    @endif



                                    </div>
                            </div>

                    </div>


                    {{-- /////////////////////////////////////////////////////////////////////////////////////////////////// --}}

                </div>
                <div x-show.transition.in="step === 2">

                    <div  class="ancho">

                          {{--   <hr style="width: 100%;"> --}}
                                <div id="display_nuevo_project" class="hidden">
                                    @include('form_projecto_nuevo')
                                </div>

                                <div id="display_nuevo_retrofit" class="hidden">
                                    @include('form_projecto_retrofit')
                                </div>

                                <div class="clearfix">
                                    <div class="my-5 gap-x-3">
                                 {{--      <input type="file" id="file" name="file"> --}}
{{--                                       <a class="btn btn-secondary font-roboto" id="btn-reset">Reset</a>
 --}}                                  </div>
                            </div>

                           {{--  <div class="banner banner-giga" style="width: 80%">
                                <a href="https://www.desprosoft.com/" target="_blank"><img src="{{asset('assets/images/banners/desprosoft.jpg')}}" alt="Desprosoft"></a>
                                <span class="lbl-banner hidden">Visitar</span>
                            </div> --}}



                        </form>
                    </div>

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
    <div class="fixed bottom-0 w-full left-0 right-0 py-2 bg-white shadow-md" x-show="step != 'complete'">
        <div class=" w-full mx-auto px-4 pb-2">
            <div class="flex w-full">
                <div class="w-1/2">
                    <button
                        x-show="step > 1"
                        @click="step--"
                        class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 text-xl border font-roboto"
                    >{{ __('index.atras') }}</button>
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

                <button  x-show="step > 1" type="button" name="calcular_p_n" id="calcular_p_n" onclick="check_form_submit(1);"  class="w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto ">Calcular</button>
                <button  x-show="step > 1" type="button" name="calcular_p_r" id="calcular_p_r" onclick="check_form_submit(2);"  class="w-32 focus:outline-none border border-transparent py-2 px-6 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 text-xl font-roboto hidden">Calcular</button>



            </div>

            </div>
        </div>
    </div>
    <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
</div>
</div>
<style>
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
    $(document).ready(function () {
        set_ser_to_sers('SEER');
        mostrar_type_p('{{$check_types_pn}}','{{$check_types_pr}}');
    });

/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
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

</script>
@endsection
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection
