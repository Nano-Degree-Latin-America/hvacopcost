@extends('main.main')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
@endsection

@section('content')
@inject('solutions','app\Http\Controllers\ResultadosController')
@inject('results','app\Http\Controllers\ResultadosController')
@inject('smasolutions','app\Http\Controllers\ResultadosController')
@inject('sumacap_term','app\Http\Controllers\ResultadosController')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div id="blur" class="blur">
    @include('main.topbar')
    {{-- <div id="divSettings">
        <a href="{{route('settings')}}"><i class="fa fa-cog" aria-hidden="true" id="settings"></i>   </a>
    </div> --}}
    <style>
@import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');


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
    </style>
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>

<div x-data="app()" x-cloak class="bg-white h-full">
		<div class="px-4 w-full">

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
				<!-- Top Navigation -->
				{{-- <div class="border-b-2 py-4">
					<div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" x-text="`Step: ${step} of 3`"></div>
					<div class="flex flex-col md:flex-row md:items-center md:justify-between">
						<div class="flex-1">
							<div x-show="step === 1">
								<div class="text-lg font-bold text-gray-700 leading-tight">Your Profile</div>
							</div>

							<div x-show="step === 2">
								<div class="text-lg font-bold text-gray-700 leading-tight">Your Password</div>
							</div>

							<div x-show="step === 3">
								<div class="text-lg font-bold text-gray-700 leading-tight">Tell me about yourself</div>
							</div>
						</div>

						<div class="flex items-center md:w-64">
							<div class="w-full bg-white rounded-full mr-2">
								<div class="rounded-full bg-green-500 text-xs leading-none h-2 text-center text-white" :style="'width: '+ parseInt(step / 3 * 100) +'%'"></div>
							</div>
							<div class="text-xs w-10 text-gray-600" x-text="parseInt(step / 3 * 100) +'%'"></div>
						</div>
					</div>
				</div> --}}
				<!-- /Top Navigation -->

				<!-- Step Content -->
				<div class="">
					<div x-show.transition.in="step === 1">
                        <div class="w-full flex justify-center">
                            <div class="w-3/4">
                                <div class="grid my-3 bg-gray-200 rounded-md shadow-xl">
                                    <div class="w-full flex justify-center text-white bg-orange-500 rounded-md p-3">
                                        <label  class="font-bold text-white text-3xl font-roboto">ANÁLISIS ENERGÉTICO - ENFRIAMIENTO</label>
                                    </div>
                                    <?php  $tar_ele=$solutions->tar_elec($id_project) ?>
                                    <div class="w-full flex justify-center m-3 " >
                                        <div class="flex w-1/3 justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Nombre:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{substr($tar_ele->name, 0, 15)}} </label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4  justify-start">
                                            <div class="mr-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">País:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->region}}</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/3  justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Ciudad: </label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->ciudad}}</label>
                                            </div>
                                        </div>


                                        <div class="flex w-1/3  justify-start">
                                            <div class="mr-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Categoría Edificio:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->cad_edi}}</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/3  justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tipo Edificio:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->tipo_edi}}</label>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="w-full flex justify-center my-2" >
                                        <div class="flex w-1/3  justify-center">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Área: </label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->area}}
                                                    @if ($tar_ele->unidad == 'mc')
                                                        m²
                                                    @endif

                                                    @if ($tar_ele->unidad == 'ft')
                                                    ft²
                                                    @endif
                                            </label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/3  justify-center">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Horas Enfriamiento Anual:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->coolings_hours}} Hrs</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/3  justify-center">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tarifa Eléctrica: </label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->costo_elec}} $/Kwh</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php  $solutions=$solutions->solutions($id_project) ?>

                                    <div class="grid">
                                        {{-- 1 --}}
                                        <div class="w-full flex justify-center">
                                            @foreach ($solutions as $solution)
                                                @if ($solution->num_sol == 1)
                                                    <div class="grid w-1/3 mx-1">

                                                        <div class="flex">
                                                            <div class="w-full">

                                                {{-- ----DIV --}}
                                                        @if ($solution->num_enf == 1)
                                                        <div class="w-full bg-blue-800 rounded-md p-2">
                                                        <label class="text-white font-bold text-4xl font-roboto" for="">Solución Base</label>
                                                        @endif

                                                        @if ($solution->num_enf == 2 || $solution->num_enf == 3)
                                                        <div class="w-full bg-blue-500 rounded-md p-2">
                                                            @if ($solution->num_enf == 2 )
                                                            <label class="text-white font-bold text-4xl font-roboto" for="">Solución A</label>
                                                            @endif

                                                            @if ($solution->num_enf == 3 )
                                                            <label class="text-white font-bold text-4xl font-roboto" for="">Solución B</label>
                                                            @endif
                                                        @endif

                                                          </div>
                                                {{-- ----DIV --}}
                                                        </div>
                                                    </div>

                                                    {{-- cuerpo --}}
                                                    <div class="mx-5">
                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex justify-start">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">SEER</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene_cant}}  </label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Sistemas HVAC</label>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
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
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600 flex justify-start font-roboto font-bold" for="">
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
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Tipo Diseño</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                    {{$solution->name_disenio}}
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Control</p>
                                                            </div>
                                                            <div class="ml-2 w-1/2">
                                                                <p class="text-blue-600 text-left font-bold  font-roboto" for="">
                                                                    {{$solution->name_t_control}}
                                                                </p>
                                                            </div>

                                                        </div> <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-sm text-justify mr-10 font-roboto font-bold" for="">Difusor o Rejilla</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600  text-left font-bold  font-roboto" for="">
                                                                    {{$solution->dr_name}}
                                                                </p>
                                                            </div>

                                                        </div>
                                                        {{-- <div class="w-full flex">
                                                            <div class="w-1/2 flex ">
                                                                <p class="text-blue-900 font-bold   text-justify mr-10" for="">Costo Eléctrico</p>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <p class="text-blue-400  text-justify" for="">
                                                                    {{$solution->costo_elec}} $/KW
                                                                </p>
                                                            </div>

                                                        </div> --}}


                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Mantenimiento</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start text-left">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->mantenimiento}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">CAPEX Estimado</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- cuerpo --}}
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                            {{-- 1 --}}

                                             {{-- 1 --}}
                                        <div class="w-full flex justify-center">
                                            @foreach ($solutions as $solution)
                                                @if ($solution->num_sol == 2)
                                                    <div class="grid w-1/3 mx-1">



                                                    {{-- cuerpo --}}
                                                    <div class="mx-5 border-t-2">
                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex justify-start">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">SEER</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene_cant}}  </label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Sistemas HVAC</label>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
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
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600 flex justify-start font-roboto font-bold" for="">
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
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Tipo Diseño</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                    {{$solution->name_disenio}}
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Control</p>
                                                            </div>
                                                            <div class="ml-2 w-1/2">
                                                                <p class="text-blue-600 text-left font-bold  font-roboto" for="">
                                                                    {{$solution->name_t_control}}
                                                                </p>
                                                            </div>

                                                        </div> <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-sm text-justify mr-10 font-roboto font-bold" for="">Difusor o Rejilla</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600  text-left font-bold  font-roboto" for="">
                                                                    {{$solution->dr_name}}
                                                                </p>
                                                            </div>

                                                        </div>
                                                        {{-- <div class="w-full flex">
                                                            <div class="w-1/2 flex ">
                                                                <p class="text-blue-900 font-bold   text-justify mr-10" for="">Costo Eléctrico</p>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <p class="text-blue-400  text-justify" for="">
                                                                    {{$solution->costo_elec}} $/KW
                                                                </p>
                                                            </div>

                                                        </div> --}}


                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Mantenimiento</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start text-left">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->mantenimiento}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">CAPEX Estimado</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- cuerpo --}}
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                            {{-- 1 --}}

                                             {{-- 1 --}}
                                        <div class="w-full flex justify-center">
                                            @foreach ($solutions as $solution)
                                                @if ($solution->num_sol == 3)
                                                    <div class="grid w-1/3 mx-1">



                                                    {{-- cuerpo --}}
                                                    <div class="mx-5  border-t-2">
                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex justify-start">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">SEER</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene_cant}}  </label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Sistemas HVAC</label>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
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
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600 flex justify-start font-roboto font-bold" for="">
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
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Tipo Diseño</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                    {{$solution->name_disenio}}
                                                                </p>
                                                            </div>

                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Control</p>
                                                            </div>
                                                            <div class="ml-2 w-1/2">
                                                                <p class="text-blue-600 text-left font-bold  font-roboto" for="">
                                                                    {{$solution->name_t_control}}
                                                                </p>
                                                            </div>

                                                        </div> <div class="w-full flex">
                                                            <div class="w-2/5 flex ">
                                                                <p class="text-blue-900 text-sm text-justify mr-10 font-roboto font-bold" for="">Difusor o Rejilla</p>
                                                            </div>
                                                            <div class="ml-2 w-2/5">
                                                                <p class="text-blue-600  text-left font-bold  font-roboto" for="">
                                                                    {{$solution->dr_name}}
                                                                </p>
                                                            </div>

                                                        </div>
                                                        {{-- <div class="w-full flex">
                                                            <div class="w-1/2 flex ">
                                                                <p class="text-blue-900 font-bold   text-justify mr-10" for="">Costo Eléctrico</p>
                                                            </div>
                                                            <div class="w-1/2">
                                                                <p class="text-blue-400  text-justify" for="">
                                                                    {{$solution->costo_elec}} $/KW
                                                                </p>
                                                            </div>

                                                        </div> --}}


                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start text-left">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">Mantenimiento</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->mantenimiento}}</label>
                                                            </div>
                                                        </div>

                                                        <div class="w-full flex">
                                                            <div class="w-2/5 flex justify-start">
                                                                <label class="text-blue-900 font-bold font-roboto" for="">CAPEX Estimado</label>
                                                            </div>
                                                            <div class="ml-2 w-2/5 flex justify-start">
                                                                <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- cuerpo --}}
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                            {{-- 1 --}}
                                    </div>

                                </div>
                            </div>
                        </div>


					</div>


					<div x-show.transition.in="step === 2">
                        <div class="w-full flex justify-center">
                            <div class="w-3/4 my-3 ">
                                <div class="grid bg-gray-200 rounded-md shadow-xl">
                                    <div class="w-full flex justify-center text-white bg-orange-500 rounded-md p-3">
                                        <label class="font-bold text-white text-2xl font-roboto text-3xl">RESULTADOS ANÁLISIS ENERGÉTICO</label>
                                    </div>
                                        <div class="w-full flex justify-center my-3 " >
                                            {{-- @foreach ($results as $solution)


                                            @if ($solution->num_enf == 1) --}}
                                                <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="flex justify-center w-full bg-blue-800 rounded-md p-2">
                                                                <label class="text-white font-bold text-4xl font-roboto">Solución Base</label>
                                                            </div>


                                                            {{-- @if ($solution->num_enf == 2 || $solution->num_enf == 3)
                                                            <div class="w-full bg-blue-500 rounded-md p-2">
                                                                @if ($solution->num_enf == 2 )
                                                                <label class="text-white font-bold text-3xl font-roboto" for="">Solución A</label>
                                                                @endif

                                                                @if ($solution->num_enf == 3 )
                                                                <label class="text-white font-bold text-3xl font-roboto" for="">Solución B</label>
                                                                @endif
                                                            </div>
                                                            @endif --}}

                                                            <div class="grid justify-center">
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

                                                                @if ($unid_med_1 !== "")
                                                                    <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label>
                                                                    @if (strlen($sumacap_term_1) >= 15)
                                                                    <p class="text-blue-800 font-bold text-4xl font-roboto uppercase">{{$sumacap_term_1}} {{$unid_med_1->unid_med}} </p>
                                                                    @endif

                                                                    @if (strlen($sumacap_term_1) < 15)
                                                                    <p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_1}} {{$unid_med_1->unid_med}} </p>
                                                                    @endif

                                                                @endif

                                                                @if ($unid_med_1 === "")
                                                                 <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_1}} {{$unid_med_1}} </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">OPEX Energía Anual</label><p class="text-blue-800 font-bold text-5xl font-roboto">$ {{number_format($sumaopex_1, 2)}}</p>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>
                                            {{-- @endif
                                            @endforeach --}}


                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="w-full bg-blue-500 rounded-md p-2">
                                                                <label class="text-white font-bold text-4xl font-roboto" for="">Solución A</label>
                                                            </div>


                                                            <div class="grid justify-center">
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

                                                                @if ($unid_med_2 !== "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}} {{$unid_med_2->unid_med}} </p>
                                                                @endif

                                                                @if ($unid_med_2 === "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}} {{$unid_med_2}} </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">OPEX Energía Anual</label><p class="text-blue-800 font-bold text-5xl font-roboto">$ {{number_format($sumaopex_2, 2)}}</p>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>

                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="w-full bg-blue-500 rounded-md p-2">
                                                                <label class="text-white font-bold text-4xl font-roboto" for="">Solución B</label>
                                                            </div>


                                                            <div class="grid justify-center">
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

                                                                @if ($unid_med_3 !== "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} {{$unid_med_3->unid_med}} </p>
                                                                @endif

                                                                @if ($unid_med_3 === "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} {{$unid_med_3}} </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">OPEX Energía Anual</label><p class="text-blue-800 font-bold text-5xl font-roboto">$ {{number_format($sumaopex_3, 2)}}</p>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Consumo de Energía HVAC por Área</label>
                                        </div>



                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">

                                            @if ($result1 ==! null)
                                            <?php  $result_area_1=$results->result_area($id_project,1,$sumaopex_1,$tar_ele->costo_elec) ?>
                                            <div class="flex justify-center w-1/3 ">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_1) >= 19)
                                                <b class="text-[24px] text-green-500 font-roboto text-4xl">${{number_format($result_area_1, 2)}}</b>
                                                     @endif

                                                     @if (strlen($result_area_1) < 19)
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">${{number_format($result_area_1, 2)}}</b>
                                                     @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3 mx-20 px-5">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0</b>
                                                </div>
                                            </div>
                                            @endif

                                            @if ($result2 ==! null)
                                            <?php  $result_area_2=$results->result_area($id_project,2,$sumaopex_2,$tar_ele->costo_elec) ?>
                                            <div class="flex justify-center w-1/3 ">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_2) >= 19)
                                                    <b class="text-[24px] text-green-500 font-roboto text-4xl">${{number_format($result_area_2, 2)}}</b>
                                                    @endif

                                                    @if (strlen($result_area_2) < 19)
                                                    <b class="text-[24px] text-green-500 font-roboto text-5xl">${{number_format($result_area_2, 2)}}</b>
                                                    @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0</b>
                                                </div>
                                            </div>
                                            @endif

                                            @if ($result3 ==! null)
                                            <?php  $result_area_3=$results->result_area($id_project,3,$sumaopex_3,$tar_ele->costo_elec) ?>
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_3) >= 19)
                                                        <b class="text-[24px] text-green-500 font-roboto text-5xl">${{number_format($result_area_3, 2)}}</b>
                                                     @endif

                                                     @if (strlen($result_area_3) < 19)
                                                     <b class="text-[24px] text-green-500 font-roboto text-5xl">${{number_format($result_area_3, 2)}}</b>
                                                     @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0</b>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                    </div>
                                    <?php  $results=$results->results($id_project) ?>
                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Diferencia Entre Soluciones - Costo Anual</label>
                                        </div>
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            @if (count($results)>1)

                                            <div class="flex justify-center w-full">
                                            @foreach ($results as $solution)
                                                @if (count($results) == 1)

                                                @endif

                                                @if (count($results) == 2)
                                                @if ($solution->num_enf == 1)
                                                <?php  $dif_1=$smasolutions->dif_1($solution->id_project,count($results)) ?>
                                                <div class="flex w-1/2 justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Base v/s A </b><b class="text-[24px] text-green-500 font-roboto text-5xl">${{number_format($dif_1, 2)}}</b>
                                                </div>

                                                <div class="flex w-1/2 justify-center text-[24px] m-1 gap-x-4">
                                                    <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Base v/s A </b><b class="text-[24px] text-green-500 font-roboto text-5xl">$0</b>
                                                </div>
                                                @endif
                                                @endif



                                                @if (count($results) == 3)
                                                    @if ($solution->num_enf == 1)
                                                    <?php  $dif_1=$smasolutions->dif_1($solution->id_project,count($results)) ?>
                                                    <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                        <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Base v/s A </b><b class="text-[24px] text-green-500 font-roboto text-5xl">${{number_format($dif_1, 2)}}</b>
                                                    </div>
                                                    @endif
                                                    @if ($solution->num_enf == 2)
                                                    <?php  $dif_2=$smasolutions->dif_2($solution->id_project,count($results)) ?>
                                                    <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Base v/s B </b><b class="text-[24px] text-green-500 font-roboto text-5xl">${{number_format($dif_2, 2)}}</b>
                                                    </div>
                                                    @endif
                                                @endif
                                                @endforeach
                                            </div>
                                            @endif

                                            @if (count($results)==1)

                                            @foreach ($results as $solution)
                                            <div class="flex justify-center w-full">


                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Base v/s A </b><b class="text-[24px] text-green-500 font-roboto text-5xl">$0</b>
                                                </div>

                                                    <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Base v/s B </b><b class="text-[24px] text-green-500 font-roboto text-5xl">$0</b>
                                                    </div>
                                            </div>
                                             @endforeach
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>

					</div>
					<div x-show.transition.in="step === 3">
                        <div class="w-full flex justify-center">
                            <div class="w-3/4 my-3 ">
                                <div class="grid bg-gray-200 rounded-md shadow-xl">
                                    <div class="w-full flex justify-center text-white bg-orange-500 rounded-md p-3">
                                        <label class="font-bold text-white text-2xl font-roboto text-4xl">RESULTADOS ANÁLISIS FINANCIERO</label>
                                    </div>
                                        <div class="w-full flex justify-center my-3 " >




                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="flex justify-center w-full bg-blue-800 rounded-md p-2">
                                                                <label class="text-white font-bold text-4xl font-roboto">Solución Base</label>
                                                            </div>

                                                            <div class="grid justify-center">

                                                                    <label class="font-bold font-roboto text-2xl mt-10">CAPEX  $/Área</label>

                                                                    <p class="text-blue-800 font-bold text-4xl font-roboto uppercase">$60 / pie2</p>
                                                            </div>

                                                            <div class="grid justify-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">OPEX Energía $/Área</label><p class="text-blue-800 font-bold text-5xl font-roboto">$90 / pie2</p>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>

                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="flex justify-center w-full bg-blue-500 rounded-md p-2">
                                                                <label class="text-white font-bold text-4xl font-roboto">Solución A</label>
                                                            </div>

                                                            <div class="grid justify-center">

                                                                    <label class="font-bold font-roboto text-2xl mt-10">CAPEX  $/Área</label>

                                                                    <p class="text-blue-800 font-bold text-4xl font-roboto uppercase">$60 / pie2</p>
                                                            </div>

                                                            <div class="grid justify-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">OPEX Energía $/Área</label><p class="text-blue-800 font-bold text-5xl font-roboto">$90 / pie2</p>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>

                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="flex justify-center w-full bg-blue-500 rounded-md p-2">
                                                                <label class="text-white font-bold text-4xl font-roboto">Solución B</label>
                                                            </div>

                                                            <div class="grid justify-center">

                                                                    <label class="font-bold font-roboto text-2xl mt-10">CAPEX  $/Área</label>

                                                                    <p class="text-blue-800 font-bold text-4xl font-roboto uppercase">$60 / pie2</p>
                                                            </div>

                                                            <div class="grid justify-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">OPEX Energía $/Área</label><p class="text-blue-800 font-bold text-5xl font-roboto">$90 / pie2</p>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>






                                        </div>
                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Ahorro Energético</label>
                                        </div>



                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">



                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0 / pie2</b>
                                                </div>
                                            </div>



                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0 / pie2</b>
                                                </div>
                                            </div>



                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0 / pie2</b>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Payback Simple (años)</label>
                                        </div>
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0 / pie2</b>
                                                </div>
                                            </div>
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0 / pie2</b>
                                                </div>
                                            </div>
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-[24px] text-green-500 font-roboto text-5xl">$0 / pie2</b>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">ROI Diferencia de Inversión</label>
                                        </div>
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl mt-10">Solución Base</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">3 Años</b>
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">20%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">5 Años</b>
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">50%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">10 Años</b>
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">100%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">15 Años</b>
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">140%</b>
                                            </div>
                                        </div>


                                        {{--  --}}
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución A</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                               {{--  <b class="text-[24px] text-blue-900 font-roboto text-4xl">3 Años</b> --}}
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">20%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                {{-- <b class="text-[24px] text-blue-900 font-roboto text-4xl">5 Años</b> --}}
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">50%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                               {{--  <b class="text-[24px] text-blue-900 font-roboto text-4xl">10 Años</b> --}}
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">100%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                               {{--  <b class="text-[24px] text-blue-900 font-roboto text-4xl">15 Años</b> --}}
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">140%</b>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución B</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                              {{--   <b class="text-[24px] text-blue-900 font-roboto text-4xl">3 Años</b> --}}
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">20%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                               {{--  <b class="text-[24px] text-blue-900 font-roboto text-4xl">5 Años</b> --}}
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">50%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                              {{--   <b class="text-[24px] text-blue-900 font-roboto text-4xl">10 Años</b> --}}
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">100%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                              {{--   <b class="text-[24px] text-blue-900 font-roboto text-4xl">15 Años</b> --}}
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">140%</b>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">ROI Inversión Total</label>
                                        </div>

                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl mt-10">Solución Base</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">3 Años</b>
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">20%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">5 Años</b>
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">50%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">10 Años</b>
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">100%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">15 Años</b>
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">140%</b>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución A</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">20%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">50%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">100%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">140%</b>
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución B</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">20%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">50%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">100%</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">140%</b>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        {{--
<div class="w-3/4 my-3 bg-gray-100">
                               <div class="flex gap-x-3 justify-center gap-x-3">
                                <div class="w-1/3" >
                                    <div class="grid w-full">
                                        <div>
                                            <label for="">Analisis Solución Base</label>
                                        </div>

                                        <div>
                                            <div id="chart_example">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-1/3" id="">
                                    <div class="grid w-full">
                                        <div>
                                            <label for="">Analisis Solución A</label>
                                        </div>

                                        <div>
                                            <div id="chart_example1">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-1/3" id="">
                                    <div class="grid w-full">
                                        <div>
                                            <label for="">Analisis Solución B</label>
                                        </div>

                                        <div>
                                            <div id="chart_example2">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                               </div>


                               <div>
                                <div class="w-full flex gap-x-3 justify-center">
                                    <div class="w-1/3">
                                        <canvas id="myChartline1"></canvas>
                                    </div>

                                    <div class="w-1/3">
                                        <canvas id="myChartline2"></canvas>
                                    </div>

                                    <div class="w-1/3">
                                        <canvas id="myChartline3"></canvas>
                                    </div>
                                </div>
                            </div>

                            {{-- ////////////////////////////////////////////////////////////
                            <div class="flex">
                                <div class="w-1/2">
                                    <canvas id="myChartline4"></canvas>
                                </div>
                                <div class="w-1/4">
                                    <div class="grid gap-y-3 my-20">
                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/4">
                                    <div id="donachart1"></div>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="w-1/2">
                                    <canvas id="myChartline5"></canvas>
                                </div>
                                <div class="w-1/4">
                                    <div class="grid gap-y-3 my-20">
                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/4">
                                    <div id="donachart2"></div>
                                </div>
                            </div>

                            <div class="flex">
                                <div class="w-1/2">
                                    <canvas id="myChartline6"></canvas>
                                </div>
                                <div class="w-1/4">
                                    <div class="grid gap-y-3 my-20">
                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="h-1/3 border-2">
                                            <div class="grid">
                                                <div>
                                                    <label for="">Ganancia a 10 Años</label>
                                                </div>

                                                <div>
                                                    <label for="">$1651651651</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-1/4">
                                    <div id="donachart3"></div>
                                </div>
                            </div>

                            </div>
                        </div>
                            --}}
				</div>
				<!-- / Step Content -->
			</div>
		</div>

		<!-- Bottom Navigation -->
		<div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md" x-show="step != 'complete'">
			<div class="max-w-3xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="w-1/2">
						<button
							x-show="step > 1"
							@click="step--"
							class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 text-xl bg-white hover:bg-gray-100 font-medium border font-roboto"
						>Átras</button>
					</div>

					<div class="w-1/2 text-right">
						<button
							x-show="step < 3"
							@click="step++"
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-xl text-center text-white bg-blue-500 hover:bg-blue-600 font-medium font-roboto"
						>Siguiente</button>

						<button
							@click="step = 'complete'"
							x-show="step === 3"
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg text-xl shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium font-roboto"
						>Complete</button>
					</div>
				</div>
			</div>
		</div>
		<!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
	</div>
<script>
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

        var options = {
          series: [{
          data: [400, 430, 448]
        }],
          chart: {
          type: 'bar',
          height: 250,
          fontFamily: 'Helvetica, sans-serif'
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            horizontal: true,
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: [['Capacidad','Termica','TR/pie2'],['Consumo','Energía','$/pie2'],['Consumo',' Energía','Kw/h /pie2']],
        }
        };


        var chart = new ApexCharts(document.querySelector("#chart_example"), options);
        chart.render();

        var chart1 = new ApexCharts(document.querySelector("#chart_example1"), options);
        chart1.render();

        var chart2 = new ApexCharts(document.querySelector("#chart_example2"), options);
        chart2.render();
        /* caharts lines */
        const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };

  const myChart = new Chart(
    document.getElementById('myChartline1'),
    config
  );

  const myChart1 = new Chart(
    document.getElementById('myChartline2'),
    config
  );

  const myChart2 = new Chart(
    document.getElementById('myChartline3'),
    config
  );

  const myChar3 = new Chart(
    document.getElementById('myChartline4'),
    config
  );

  const myChart4 = new Chart(
    document.getElementById('myChartline5'),
    config
  );

  const myChart5 = new Chart(
    document.getElementById('myChartline6'),
    config
  );
    /* caharts lines */

    /* dona charts */
    var options_dona = {
          series: [70],
          chart: {
          height: 350,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            hollow: {
              size: '70%',
            }
          },
        },
        labels: ['Cricket'],
        };

        var chartDona1= new ApexCharts(document.querySelector("#donachart1"), options_dona);
        chartDona1.render();

        var chartDona2 = new ApexCharts(document.querySelector("#donachart2"), options_dona);
        chartDona2.render();

        var chartDona3 = new ApexCharts(document.querySelector("#donachart3"), options_dona);
        chartDona3.render();
    /* dona charrts */
</script>
@endsection
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection
