
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
   {{-- <script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script> --}}
   <script src="{{asset('plugins/chartjs/dist/Chart.js')}}"></script>
   <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
   {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <style>

@import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');

        .font-roboto{
            font-family: 'ABeeZee', sans-serif;
        }
    </style>


  {{--   @include('main.topbar') --}}
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

.ancho_rang{
    width:1.25rem;
    height:3rem;
}

.puntero_medidas{
    width: 85px; height:65px;
    margin-top:5px;
}
    </style>
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<div class="bg-blue-900 w-full flex justify-center" style="background-image: radial-gradient(rgb(10,19,59) 0%,rgb(5,1,25) 100%);">
    <div class="w-1/3">
        <img class="header" style="height:99px;" name="logoEmpresa" id="logoEmpresa" src="{{asset('assets/images/Logo-NDL_blanco_marca-r.png')}}" alt="Nano Degree">
    </div>
    <div class=" w-1/3 flex justify-center" style="line-height: 30px; height:99px;">
        {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}
        <a><img src="{{asset('/assets/images/Logotipo-HVACOPCOST_blanco.png')}}" alt="hvacopcost latinoamérica" style="max-height: 100px; width:230px;"></a>

    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-end h-1/3">
    {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
    <button class="bg-orange-500  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='/edit_project_copy/{{$id_project}}'"><p class="mx-1">Editar Proyecto</p></button>

    {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
    <button title="Ver PDF" class="bg-blue-600 mx-1 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 p-2" target="_blank" {{-- onclick="window.open('/generatePDF/{{$id_project}}', '_blank');" --}} ><i class="fa-solid fa-file-pdf text-2xl text-red-600"></i></button>

    <button class="bg-blue-600  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 " onclick="window.location.href='/home'">Nuevo Proyecto</button>

    </div>
</div>
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

				<!-- /Top Navigation -->

				<!-- Step Content -->
				<div class="h-full">
					<div x-show.transition.in="step === 1">
                        <div class="w-full flex justify-center">
                            <div class="2xl:w-3/4 xl:w-3/4 lg:w-full">
                                <div class="grid my-3 bg-gray-200 rounded-md shadow-xl">
                                    <div style="background-color: #233064;" class="w-full flex justify-center text-white rounded-md p-3">
                                        <label  class="font-bold text-white text-3xl font-roboto">ANÁLISIS ENERGÉTICO - ENFRIAMIENTO</label>
                                    </div>
                                    <?php  $tar_ele=$solutions->tar_elec($id_project) ?>
                                    <div class="w-full flex justify-center m-1 " >
                                        <div class="flex w-1/3 justify-start">
                                            <div class="mx-1 ">
                                                <label style="font-size: 18px;"   class="text-blue-800 font-bold font-roboto" for="">Nombre:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{substr($tar_ele->name, 0,25)}} </label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4  justify-start">
                                            <div class="mr-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Región:</label>
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

                                        <div class="flex w-1/5 justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Área:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{number_format($tar_ele->area)}}
                                                    @if ($tar_ele->unidad == 'mc')
                                                        m²
                                                    @endif

                                                    @if ($tar_ele->unidad == 'ft')
                                                    ft²
                                                    @endif
                                            </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="w-full flex justify-start m-1" >
                                        <div class="flex w-2/5  justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tipo Edificio:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->tipo_edi}}</label>
                                            </div>
                                        </div>


                                        <div class="flex w-auto justify-start">
                                            <div class="ml-3">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Horas Enfriamiento Anual:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">&nbsp;{{number_format($tar_ele->coolings_hours)}}</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4 justify-start ml-10 pl-1">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tarifa Eléctrica:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->costo_elec}} $/Kwh</label>
                                            </div>
                                        </div>
                                    </div>
                                     </div>
                                    <div class="grid my-3 bg-gray-200 rounded-md shadow-xl">
                                    <?php  $solutions=$solutions->solutions_retrofit($id_project) ?>

                                    <div class="grid my-2">
                                        {{-- 1 --}}
                                        <div class="w-full flex justify-center">
                                            <div class="grid w-1/3 mx-1 ">
                                                @foreach ($solutions as $solution)
                                                    @if ($solution->num_sol == 1 && $solution->num_enf == 1 && $solution->type_p == 2)
                                                    <div>
                                                        <div class="flex w-full">
                                                            <div class="w-full">
                                                                <div class="w-full bg-orange-500 rounded-md p-2 text-center">
                                                                    <label class="text-white font-bold 2xl:text-4xl xl:text-4xl lg:text-4xl md:text-4xl  font-roboto" for="">Sistema Existente</label>
                                                                </div>

                                                                <div class="mx-5 mb-3">
                                                                    <div class="w-full flex">
                                                                        <div class="w-2/5 flex justify-start">
                                                                            <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                                                        </div>
                                                                        <div class="ml-2 w-auto flex justify-start">
                                                                            <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="w-full flex">
                                                                        <div class="w-2/5 flex ">
                                                                            <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                                                        </div>
                                                                        <div class="ml-2 w-auto">
                                                                            <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
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
                                                                            </p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="w-full flex">
                                                                        <div class="w-2/5 flex ">
                                                                            <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                                                        </div>
                                                                        <div class="ml-2 w-auto">
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
                                                                            <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Marca</p>
                                                                        </div>
                                                                        <div class="ml-2 w-2/5">
                                                                            <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                                {{$solution->marca}}
                                                                            </p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="w-full flex">
                                                                        <div class="w-2/5 flex ">
                                                                            <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Modelo</p>
                                                                        </div>
                                                                        <div class="ml-2 w-2/5">
                                                                            <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                                {{$solution->modelo}}
                                                                            </p>
                                                                        </div>

                                                                    </div>

                                                                    <div class="w-full flex">
                                                                        <div class="w-2/5 flex ">
                                                                            <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Años de vida</p>
                                                                        </div>
                                                                        <div class="ml-2 w-2/5">
                                                                            <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                                {{$solution->yrs_vida}}
                                                                            </p>
                                                                        </div>
                                                                    </div>

                                                                    <div class="w-full flex">
                                                                        <div class="w-2/5 flex ">
                                                                            <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Eficiencia Original</p>
                                                                        </div>
                                                                        <div class="ml-2 w-auto flex justify-start">
                                                                            <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene}} {{$solution->eficencia_ene_cant}}  </label>
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
                                                                            <label class="text-blue-900 font-bold font-roboto" for="">Costo de Recuperación</label>
                                                                        </div>
                                                                        <div class="ml-2 w-2/5 flex justify-start">
                                                                            <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="w-full flex">
                                                                        <div class="w-2/5 flex justify-start">
                                                                            <label class="text-blue-900 font-bold font-roboto" for="">Costo Mantenimiento</label>
                                                                        </div>
                                                                        <div class="ml-2 w-2/5 flex justify-start">
                                                                            <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->costo_mantenimiento)}}</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="w-full flex">
                                                                        <div class="w-2/5 flex justify-start">
                                                                            <label class="text-blue-900 font-bold font-roboto" for="">Costo Anual Reparaciónes</label>
                                                                        </div>
                                                                        <div class="ml-2 w-2/5 flex justify-start">
                                                                            <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->cost_an_re)}}</label>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                            <div class="grid w-1/3 mx-1 ">
                                                @foreach ($solutions as $solution)
                                                @if ($solution->num_sol == 1 && $solution->num_enf == 2 && $solution->type_p == 2)
                                                <div>
                                                    <div class="flex w-full">
                                                        <div class="w-full">
                                                            <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                                <label class="text-white font-bold 2xl:text-4xl xl:text-4xl lg:text-4xl md:text-4xl  font-roboto" for="">Solución A</label>
                                                            </div>

                                                            <div class="mx-5 mb-3">
                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex justify-start">
                                                                        <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                                                    </div>
                                                                    <div class="ml-2 w-auto flex justify-start">
                                                                        <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                                                    </div>
                                                                    <div class="ml-2 w-auto">
                                                                        <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
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
                                                                        </p>
                                                                    </div>

                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                                                    </div>
                                                                    <div class="ml-2 w-auto">
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
                                                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Marca</p>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5">
                                                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                            {{$solution->marca}}
                                                                        </p>
                                                                    </div>

                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Modelo</p>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5">
                                                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                            {{$solution->modelo}}
                                                                        </p>
                                                                    </div>

                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Años de vida</p>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5">
                                                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                            {{$solution->yrs_vida}}
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Eficiencia Original</p>
                                                                    </div>
                                                                    <div class="ml-2 w-auto flex justify-start">
                                                                        <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene}} {{$solution->eficencia_ene_cant}}  </label>
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
                                                                        <label class="text-blue-900 font-bold font-roboto" for="">Costo de Recuperación</label>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5 flex justify-start">
                                                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex justify-start">
                                                                        <label class="text-blue-900 font-bold font-roboto" for="">Costo Mantenimiento</label>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5 flex justify-start">
                                                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->costo_mantenimiento)}}</label>
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex justify-start">
                                                                        <label class="text-blue-900 font-bold font-roboto" for="">Costo Anual Reparaciónes</label>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5 flex justify-start">
                                                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->cost_an_re)}}</label>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            </div>

                                            <div class="grid w-1/3 mx-1 ">
                                                @foreach ($solutions as $solution)
                                                @if ($solution->num_sol == 1 && $solution->num_enf == 3 && $solution->type_p == 2)
                                                <div>
                                                    <div class="flex w-full">
                                                        <div class="w-full">
                                                            <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                                <label class="text-white font-bold 2xl:text-4xl xl:text-4xl lg:text-4xl md:text-4xl  font-roboto" for="">Solución B</label>
                                                            </div>

                                                            <div class="mx-5 mb-3">
                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex justify-start">
                                                                        <label class="text-blue-900 font-bold font-roboto" for="">Capacidad Térmica</label>
                                                                    </div>
                                                                    <div class="ml-2 w-auto flex justify-start">
                                                                        <label  class="uppercase font-roboto text-blue-600 font-bold" for="">{{$solution->capacidad_tot}}  {{$solution->unid_med}}</label>
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="text-blue-900  text-justify mr-10 font-roboto font-bold" for="">Equipos HVAC</p>
                                                                    </div>
                                                                    <div class="ml-2 w-auto">
                                                                        <p class="flex text-blue-600 justify-start font-roboto font-bold" for="">
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
                                                                        </p>
                                                                    </div>

                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="text-blue-900 text-justify mr-10 font-roboto font-bold" for="">Tipo Equipo</p>
                                                                    </div>
                                                                    <div class="ml-2 w-auto">
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
                                                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Marca</p>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5">
                                                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                            {{$solution->marca}}
                                                                        </p>
                                                                    </div>

                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Modelo</p>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5">
                                                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                            {{$solution->modelo}}
                                                                        </p>
                                                                    </div>

                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Años de vida</p>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5">
                                                                        <p class="text-blue-600 text-left font-bold font-roboto" for="">
                                                                            {{$solution->yrs_vida}}
                                                                        </p>
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex ">
                                                                        <p class="font-bold text-blue-900 text-justify mr-10 font-roboto" for="">Eficiencia Original</p>
                                                                    </div>
                                                                    <div class="ml-2 w-auto flex justify-start">
                                                                        <label class="font-roboto text-blue-600 font-bold" for="">{{$solution->eficencia_ene}} {{$solution->eficencia_ene_cant}}  </label>
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
                                                                        <label class="text-blue-900 font-bold font-roboto" for="">Costo de Recuperación</label>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5 flex justify-start">
                                                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->val_aprox)}}</label>
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex justify-start">
                                                                        <label class="text-blue-900 font-bold font-roboto" for="">Costo Mantenimiento</label>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5 flex justify-start">
                                                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->costo_mantenimiento)}}</label>
                                                                    </div>
                                                                </div>

                                                                <div class="w-full flex">
                                                                    <div class="w-2/5 flex justify-start">
                                                                        <label class="text-blue-900 font-bold font-roboto" for="">Costo Anual Reparaciónes</label>
                                                                    </div>
                                                                    <div class="ml-2 w-2/5 flex justify-start">
                                                                        <label class="font-roboto text-blue-600 font-bold" for="">${{number_format($solution->cost_an_re)}}</label>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        </div>
                                            {{-- 1 --}}

                                             {{-- 1 --}}
                                        <div class="w-full flex justify-start">
                                            <div class="grid w-1/3 mx-1">

                                            </div>
                                            <div class="grid w-1/3 mx-1">
                                                    {{-- 2_2 --}}
                                            </div>
                                            <div class="grid w-1/3 mx-1">
                                                    {{-- 2_3 --}}
                                            </div>
                                        </div>
                                            {{-- 1 --}}

                                             {{-- 1 --}}
                                        <div class="w-full flex justify-start">
                                                <div class="grid w-1/3 mx-1">
                                                    {{-- 3_1 --}}
                                                </div>

                                                <div class="grid w-1/3 mx-1">
                                                    {{-- 3_2 --}}
                                                </div>

                                                <div class="grid w-1/3 mx-1">
                                                    {{-- 3_3 --}}
                                                </div>
                                        </div>

                                                                {{-- espacio --}}
                                                    <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

                                                    </div>
                                                    {{-- espacio --}}
                                            {{-- 1 --}}
                                    </div>

                                </div>
                            </div>
                        </div>


					</div>

                    <div x-show.transition.in="step === 2">
                        <div class="w-full flex justify-center">
                            <div class="2xl:w-3/4 xl:w-3/4 lg:w-full my-3 ">
                                <div class="grid bg-gray-200 rounded-md shadow-xl">
                                    <div style="background-color: #233064;" class="w-full flex justify-center text-white rounded-md p-3">
                                        <label class="font-bold text-white text-2xl font-roboto text-3xl">RESULTADOS ANÁLISIS ENERGÉTICO</label>
                                    </div>


                                    <div class="w-full flex justify-center m-1 " >
                                        <div class="flex w-1/3 justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Nombre:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{substr($tar_ele->name, 0, 25)}} </label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4  justify-start">
                                            <div class="mr-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Región:</label>
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

                                        <div class="flex w-1/5 justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Área:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{number_format($tar_ele->area)}}
                                                    @if ($tar_ele->unidad == 'mc')
                                                        m²
                                                    @endif

                                                    @if ($tar_ele->unidad == 'ft')
                                                    ft²
                                                    @endif
                                            </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="w-full flex justify-start m-1" >
                                        <div class="flex w-2/5  justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tipo Edificio:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->tipo_edi}}</label>
                                            </div>
                                        </div>


                                        <div class="flex w-auto justify-start">
                                            <div class="ml-3">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Horas Enfriamiento Anual:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">&nbsp;{{number_format($tar_ele->coolings_hours)}}</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4 justify-start ml-10 pl-1">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tarifa Eléctrica:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->costo_elec}} $/Kwh</label>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="grid bg-gray-200 rounded-md shadow-xl my-3">


                                    {{--  --}}
                                        <div class="w-full flex justify-center my-3 " >
                                            {{-- @foreach ($results as $solution)


                                            @if ($solution->num_enf == 1) --}}
                                                <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="flex justify-center w-full bg-orange-500 rounded-md p-2">
                                                                <label class="text-white font-bold text-4xl font-roboto">Sistema Existente</label>
                                                            </div>

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
                                                                    <p class="text-blue-800 font-bold text-4xl font-roboto uppercase text-center">{{$sumacap_term_1}} <b class="text-black text-3xl">{{$unid_med_1->unid_med}}</b> </p>
                                                                    @endif

                                                                    @if (strlen($sumacap_term_1) < 15)
                                                                    <p class="text-blue-800 font-bold text-5xl font-roboto uppercase text-center">{{$sumacap_term_1}} <b class="text-black text-3xl" >{{$unid_med_1->unid_med}}</b>  </p>
                                                                    @endif

                                                                @endif

                                                                @if ($unid_med_1 === "")
                                                                 <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_1}} <b class="text-black text-3xl">{{$unid_med_1->unid_med}}</b> </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual (OPEX)</label>
                                                               <div class="flex w-full justify-center">
                                                                <p class="text-blue-800 font-bold text-5xl font-roboto">{{number_format($sumaopex_1)}}</p><b class="text-black font-bold text-3xl font-roboto mt-5 ml-2">Kwh</b>
                                                               </div>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>
                                            {{-- @endif
                                            @endforeach --}}


                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                                <label class="text-white font-bold text-4xl font-roboto" for="">Solución A</label>
                                                            </div>


                                                            <div class="grid justify-center text-center">
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
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}} <b class="text-black text-3xl" >{{$unid_med_2->unid_med}}</b></p>
                                                                @endif

                                                                @if ($unid_med_2 === "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}}  <b class="text-black text-3xl" >{{$unid_med_2}}</b> </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual (OPEX)</label>
                                                               <div class="flex w-full justify-center">
                                                                <p class="text-blue-800 font-bold text-5xl font-roboto">{{number_format($sumaopex_2)}}</p><b class="text-black font-bold text-3xl font-roboto mt-5 ml-2">Kwh</b>
                                                               </div>
                                                            </div>

                                                        </div>
                                                </div>
                                            </div>

                                            <div class="grid w-1/3">

                                                <div class="flex w-full ">
                                                        <div class="grid w-full mx-3">

                                                            <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                                <label class="text-white font-bold text-4xl font-roboto" for="">Solución B</label>
                                                            </div>


                                                            <div class="grid justify-center text-center">
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
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} <b class="text-black text-3xl">{{$unid_med_3->unid_med}}</b>  </p>
                                                                @endif

                                                                @if ($unid_med_3 === "")
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} <b class="text-black text-3xl">{{$unid_med_3}}</b> </p>
                                                                @endif
                                                            </div>

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual (OPEX)</label>
                                                               <div class="flex w-full justify-center">
                                                                <p class="text-blue-800 font-bold text-5xl font-roboto">{{number_format($sumaopex_3)}}</p><b class="text-black font-bold text-3xl font-roboto mt-5 ml-2">Kwh</b>
                                                               </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <?php  $results_aux=$results->results($id_project) ?>
                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-3">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Ahorro Anual Energía – Diferencia entre Soluciones <b class="text-orange-500">(Kwh año)</b> </label>
                                        </div>
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            @if (count($results_aux)>1)

                                            <div class="flex justify-center w-full">
                                            @foreach ($results_aux as $solution)
                                                @if (count($results_aux) == 1)

                                                @endif

                                                @if (count($results_aux) == 2)
                                                @if ($solution->num_enf == 1)
                                                <?php  $dif_1=$smasolutions->dif_1($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                                                <div class="grid w-1/2 justify-center text-[24px] gap-x-4">
                                                    <div class="grid w-full  justify-center">
                                                    <b class="text-blue-800 mr-1 font-roboto text-3xl">Solución  Existente v/s A </b>
                                                    </div>
                                                    <div class="flex justify-center w-full">
                                                    <b style="color:#33cc33;" id="dif_1"  class="text-[24px] font-roboto text-6xl">{{number_format($dif_1)}}</b>
                                                    </div>
                                                </div>

                                                <div class="grid w-1/2 justify-center text-[24px] m-1 gap-x-4">
                                                    <div class="grid w-full  justify-center">
                                                    <b class="text-blue-800 mr-1 font-roboto text-3xl">Solución  Existente v/s B </b>
                                                    <b style="color:#33cc33;"  class="text-[24px] font-roboto text-6xl text-center">0 </b>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif



                                                @if (count($results_aux) == 3)
                                                    @if ($solution->num_enf == 1)
                                                    <?php  $dif_1=$smasolutions->dif_1($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                                                    <div class="w-1/2 grid w-full justify-center text-[24px] gap-x-4">
                                                        <div class="flex justify-center w-full">
                                                            <b class="text-blue-800 mr-1 font-roboto text-3xl">Solución  Existente v/s A </b>
                                                            </div>
                                                        <div class="flex justify-center w-full">
                                                            <b style="color:#33cc33;"  class="text-[24px] font-roboto text-6xl">{{number_format($dif_1)}}</b> <b class="text-3xl mt-3 font-roboto ml-1"></b>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if ($solution->num_enf == 2)
                                                    <?php  $dif_2=$smasolutions->dif_2($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                                                    <div class="w-1/2 grid w-full justify-center text-[24px]  gap-x-4">
                                                        <div class="flex w-full justify-center">
                                                        <b class="text-blue-800 mr-1 font-roboto text-3xl">Solución  Existente v/s B </b>
                                                        </div>
                                                        <div class="flex w-full justify-center">
                                                            <b style="color:#33cc33;"  class="text-[24px] font-roboto text-6xl">{{number_format($dif_2)}}</b> <b class="text-3xl mt-3 font-roboto ml-1"></b>
                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                                @endforeach
                                            </div>
                                            @endif

                                            @if (count($results_aux)==1)

                                            @foreach ($results_aux as $solution)
                                            <div class="flex justify-center w-full">


                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Existente v/s A </b><b style="color:#33cc33;"   class="text-[24px] font-roboto text-5xl">0 Kwh año</b>
                                                </div>

                                                    <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    <b class="text-blue-800 mr-1 font-roboto text-2xl mt-5">Solución  Existente v/s B </b><b  style="color:#33cc33;"  class="text-[24px] font-roboto text-5xl">0 Kwh año</b>
                                                    </div>
                                            </div>
                                             @endforeach
                                            @endif

                                        </div>
                                    </div>
                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <?php  $unidad_area=$results->unidad_area($id_project,1,$sumaopex_1,$tar_ele->costo_elec) ?>
                                        <div class="flex w-full justify-center">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Consumo de Energía HVAC por Área <b class="text-orange-500">(Kwh/
                                                @if ($unidad_area == 'mc')
                                                m²
                                                @endif
                                                @if ($unidad_area == 'ft')
                                                ft²
                                                @endif)</b></label>
                                        </div>



                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">

                                            @if ($result1 ==! null)
                                            <?php  $result_area_1=$results->result_area($id_project,$sumaopex_1) ?>

                                            <div class="flex justify-center w-1/3 ">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_1) >= 19)
                                                <div class="flex w-full justify-center">
                                                    <div class="w-full flex justify-center">
                                                        <b style="color:#33cc33;" class="text-[24px] font-roboto text-6xl">{{number_format($result_area_1, 2)}}</b>

                                                    </div>
                                                </div>
                                                     @endif

                                                     @if (strlen($result_area_1) < 19) {{-- para tamaño de cadena disminuir tamaño --}}
                                                    <div class="w-full flex justify-center">
                                                        <b style="color:#33cc33;" class="text-[24px] font-roboto text-6xl">{{number_format($result_area_1, 2)}}</b>

                                                    </div>
                                                     @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3 mx-20 px-5">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">0</b>
                                                </div>
                                            </div>
                                            @endif

                                            @if ($result2 ==! null)
                                            <?php  $result_area_2=$results->result_area($id_project,$sumaopex_2) ?>
                                            <div class="flex justify-center w-1/3 ">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_2) >= 19)
                                                    <div class="w-full flex justify-center">
                                                        <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">{{number_format($result_area_2, 2)}}</b>
                                                    </div>
                                                    @endif

                                                    @if (strlen($result_area_2) < 19)
                                                    <div class="w-full flex justify-center">
                                                        <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">{{number_format($result_area_2, 2)}}</b>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">0</b>
                                                </div>
                                            </div>
                                            @endif

                                            @if ($result3 ==! null)
                                            <?php  $result_area_3=$results->result_area($id_project,$sumaopex_3) ?>
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if (strlen($result_area_3) >= 19)
                                                    <div class="w-full flex justify-center">
                                                        <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">{{number_format($result_area_3, 2)}}</b>
                                                    </div>
                                                     @endif

                                                     @if (strlen($result_area_3) < 19)
                                                     <div class="w-full flex justify-center">
                                                        <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">{{number_format($result_area_3, 2)}}</b>
                                                    </div>
                                                     @endif
                                                </div>
                                            </div>
                                            @else
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">0

                                                </b>
                                                </div>
                                            </div>
                                            @endif

                                        </div>

                                    </div>



                                </div>
                            </div>
                              {{-- espacio --}}
                              <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

                            </div>
                             {{-- espacio --}}

					</div>

					<div x-show.transition.in="step === 3">
                        <div class="w-full flex justify-center">
                            <div class="2xl:w-3/4 xl:w-3/4 lg:w-full my-3 ">
                                <div class="grid bg-gray-200 rounded-md shadow-xl">
                                    <div style="background-color: #233064;" class="w-full flex justify-center text-white rounded-md p-3">
                                        <label class="font-bold text-white text-2xl font-roboto text-4xl">RESULTADOS ANÁLISIS FINANCIERO</label>
                                    </div>

                                    <div class="w-full flex justify-center m-1 " >
                                        <div class="flex w-1/3 justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Nombre:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" title="{{$tar_ele->name}}" class="text-blue-600 font-bold" for="">{{substr($tar_ele->name, 0, 25)}} </label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4  justify-start">
                                            <div class="mr-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Región:</label>
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

                                        <div class="flex w-1/5 justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Área:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{number_format($tar_ele->area)}}
                                                    @if ($tar_ele->unidad == 'mc')
                                                        m²
                                                    @endif

                                                    @if ($tar_ele->unidad == 'ft')
                                                    ft²
                                                    @endif
                                            </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="w-full flex justify-start m-1" >
                                        <div class="flex w-2/5  justify-start">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tipo Edificio:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->tipo_edi}}</label>
                                            </div>
                                        </div>


                                        <div class="flex w-auto justify-start">
                                            <div class="ml-3">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Horas Enfriamiento Anual:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">&nbsp;{{number_format($tar_ele->coolings_hours)}}</label>
                                            </div>
                                        </div>
                                        <div class="flex w-1/4 justify-start ml-10 pl-1">
                                            <div class="mx-1">
                                                <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tarifa Eléctrica:</label>
                                            </div>
                                            <div>
                                                <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->costo_elec}} $/Kwh</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="grid bg-gray-200 rounded-md shadow-xl my-3">

                                    {{-- aqui va info proj --}}

                                                <div class="w-full flex justify-center my-3 " >
                                                    {{-- @foreach ($results as $solution)


                                                    @if ($solution->num_enf == 1) --}}
                                                        <div class="grid w-1/3">

                                                        <div class="flex w-full ">
                                                                <div class="grid w-full mx-3">

                                                                    <div class="flex justify-center w-full bg-orange-500 rounded-md p-2">
                                                                        <label class="text-white font-bold text-4xl font-roboto">Sistema Existente</label>
                                                                    </div>

                                                                    <div class="grid justify-center">

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
                                                                            <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label>
                                                                            @if (strlen($sumacap_term_1) >= 15)
                                                                            <p class="text-blue-800 font-bold text-4xl font-roboto uppercase text-center">{{$sumacap_term_1}} <b class="text-black text-3xl">{{$unid_med_1->unid_med}}</b> </p>
                                                                            @endif

                                                                            @if (strlen($sumacap_term_1) < 15)
                                                                            <p class="text-blue-800 font-bold text-5xl font-roboto uppercase text-center">{{$sumacap_term_1}} <b class="text-black text-3xl">{{$unid_med_1->unid_med}}</b>  </p>
                                                                            @endif

                                                                        @endif

                                                                        @if ($unid_med_1 === "")
                                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_1}} <b class="text-black text-3xl"> {{$unid_med_1}}</b>  </p>
                                                                        @endif
                                                                    </div>

                                                                    <div class="grid justify-center">
                                                                        <label class="font-bold font-roboto text-2xl mt-3 text-center">Inversión Inicial</label><p class="text-blue-800 font-bold text-5xl font-roboto text-center">$ {{number_format($inv_ini_1)}}</p>
                                                                    </div>

                                                                    <div class="grid justify-center">
                                                                        <label class="font-bold font-roboto text-2xl mt-3 text-center">Consumo Anual (OPEX)</label><p class="text-blue-800 font-bold text-5xl font-roboto text-center">$ {{number_format($sumaopex_1*$tar_ele->costo_elec)}}</p>
                                                                    </div>

                                                                </div>
                                                        </div>
                                                    </div>
                                                    {{-- @endif
                                                    @endforeach --}}


                                                    <div class="grid w-1/3">

                                                        <div class="flex w-full ">
                                                                <div class="grid w-full mx-3">

                                                                    <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                                        <label class="text-white font-bold text-4xl font-roboto" for="">Solución A</label>
                                                                    </div>


                                                                    <div class="grid justify-items-center text-center">

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
                                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase text-center">{{$sumacap_term_2}}<b class="text-black text-3xl"> {{$unid_med_2->unid_med}}</b> </p>
                                                                        @endif

                                                                        @if ($unid_med_2 === "")
                                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase text-center">{{$sumacap_term_2}} <b class="text-black text-3xl"> {{$unid_med_2}} </b></p>
                                                                        @endif
                                                                    </div>

                                                                    <div class="grid justify-items-center text-center">
                                                                        <label class="font-bold font-roboto text-2xl mt-3">Inversión Inicial</label><p class="text-blue-800 font-bold text-5xl font-roboto text-center">$ {{number_format($inv_ini_2)}}</p>
                                                                        <input type="number" class="hidden" id="inv_ini_2" name="inv_ini_2" value="{{$inv_ini_2}}">
                                                                    </div>

                                                                    <div class="grid justify-items-center">
                                                                        <label class="font-bold font-roboto text-2xl mt-3 text-center">Consumo Anual (OPEX)</label><p class="text-blue-800 font-bold text-5xl font-roboto  text-center">$ {{number_format($sumaopex_2*$tar_ele->costo_elec)}}</p>
                                                                    </div>

                                                                </div>
                                                        </div>
                                                    </div>

                                                    <div class="grid w-1/3">

                                                        <div class="flex w-full ">
                                                                <div class="grid w-full mx-3">

                                                                    <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                                        <label class="text-white font-bold text-4xl font-roboto" for="">Solución B</label>
                                                                    </div>


                                                                    <div class="grid justify-center text-center">

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
                                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} <b class="text-black text-3xl">{{$unid_med_3->unid_med}}</b></p>
                                                                        @endif

                                                                        @if ($unid_med_3 === "")
                                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}}  <b class="text-black text-3xl"> {{$unid_med_3}}</b> </p>
                                                                        @endif
                                                                    </div>

                                                                    <div class="grid justify-center">
                                                                        <label class="font-bold font-roboto text-2xl mt-3 text-center">Inversión Inicial</label><p class="text-blue-800 font-bold text-5xl font-roboto text-center">$ {{number_format($inv_ini_3)}}</p>
                                                                        <input type="number" class="hidden" id="inv_ini_3" name="inv_ini_3" value="{{$inv_ini_3}}">
                                                                    </div>

                                                                    <div class="grid justify-center">
                                                                        <label class="font-bold font-roboto text-2xl mt-3 text-center">Consumo Anual (OPEX)</label><p class="text-blue-800 font-bold text-5xl font-roboto text-center">$ {{number_format($sumaopex_3*$tar_ele->costo_elec)}}</p>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>



                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Ahorro Anual de Costo Energético – Entre Soluciones</label>
                                        </div>

                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            @if (count($results_aux)>1)

                                            <div class="flex justify-center w-full">
                                            @foreach ($results_aux as $solution)
                                                @if (count($results_aux) == 1)

                                                @endif

                                                @if (count($results_aux) == 2)
                                                @if ($solution->num_enf == 1)
                                                <?php  $dif_1_cost=$smasolutions->dif_1_cost($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                                                <div class="grid w-1/2 justify-center text-[24px] m-1 gap-x-4">
                                                    <div class="grid w-full  justify-center">
                                                    <b class="text-blue-800 mr-1 font-roboto text-3xl mt-5">Solución  Existente v/s A </b>
                                                    </div>
                                                    <div class="flex justify-center w-full">
                                                        <b style="color:#33cc33;"  class="text-[24px] font-roboto text-6xl">${{number_format($dif_1_cost)}}</b>
                                                        <input type="number" class="hidden" id="dif_cost_base_a" name="dif_cost_base_a" value="{{$dif_1_cost}}">
                                                    </div>
                                                </div>

                                                <div class="grid w-1/2 justify-center text-[24px] m-1 gap-x-4">
                                                    <div class="grid w-full  justify-center">
                                                    <b class="text-blue-800 mr-1 font-roboto text-3xl mt-5">Solución  Existente v/s B </b>
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto text-6xl text-center">$ 0</b>
                                                    </div>
                                                </div>
                                                @endif
                                                @endif



                                                @if (count($results_aux) == 3)
                                                    @if ($solution->num_enf == 1)
                                                    <?php  $dif_1_cost=$smasolutions->dif_1_cost($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                                                    <div class="w-1/2 grid w-full justify-center text-[24px] m-1 gap-x-4">
                                                        <div class="flex justify-center w-full">
                                                            <b class="text-blue-800 mr-1 font-roboto text-3xl mt-3">Solución  Existente v/s A </b>
                                                            </div>
                                                        <div class="flex justify-center w-full">
                                                            <b style="color:#33cc33;" class="text-[24px] font-roboto text-6xl">$ {{number_format($dif_1_cost)}}</b><b class="text-3xl mt-3  font-roboto"></b>
                                                            <input type="number" class="hidden" id="dif_cost_base_a" name="dif_cost_base_a" value="{{$dif_1_cost}}">

                                                        </div>
                                                    </div>
                                                    @endif
                                                    @if ($solution->num_enf == 2)
                                                    <?php  $dif_2_cost=$smasolutions->dif_2_cost($solution->id_project,count($results_aux),$tar_ele->costo_elec) ?>
                                                    <div class="w-1/2 grid w-full justify-center text-[24px] m-1 gap-x-4">
                                                        <div class="flex w-full justify-center">
                                                        <b class="text-blue-800 mr-1 font-roboto text-3xl mt-3">Solución  Existente v/s B </b>
                                                        </div>
                                                        <div class="flex w-full justify-center">
                                                            <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">$ {{number_format($dif_2_cost)}}</b><b class="text-3xl mt-3  font-roboto"></b>
                                                            <input type="number" class="hidden" id="dif_cost_base_b" name="dif_cost_base_b" value="{{$dif_2_cost}}">

                                                        </div>
                                                    </div>
                                                    @endif
                                                @endif
                                                @endforeach
                                            </div>
                                            @endif

                                            @if (count($results_aux)==1)

                                            @foreach ($results_aux as $solution)
                                            <div class="flex justify-center w-full">


                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                <b style="color:#33cc33;" class="text-blue-800 mr-1 font-roboto text-3xl mt-5">Solución  Existente v/s A </b><b style="color:#33cc33;" class="text-[24px] font-roboto text-6xl text-center">$ 0</b>
                                                </div>

                                                    <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    <b style="color:#33cc33;" class="text-blue-800 mr-1 font-roboto text-3xl mt-5">Solución  Existente v/s B </b><b style="color:#33cc33;" class="text-[24px] font-roboto text-6xl text-center">$ 0</b>
                                                    </div>
                                            </div>
                                             @endforeach
                                            @endif

                                        </div>
                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Payback Simple (años)</label>
                                        </div>
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">

                                                     <b style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">N/A</b>


                                                </div>
                                            </div>
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if ( true == ( isset( $dif_1_cost ) ? $dif_1_cost : null ) )
                                                    <?php  $pay_back_a=$smasolutions->pay_back($inv_ini_1,$inv_ini_2,$dif_1_cost) ?>
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto text-6xl">{{number_format($pay_back_a)}}</b>
                                                 @else
                                                 <b style="color:#33cc33;" class="text-[24px] font-roboto text-6xl">N/A</b>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="flex justify-center w-1/3">
                                                <div class="flex w-full justify-center text-[24px] m-1 gap-x-4">
                                                    @if ( true == ( isset( $dif_2_cost ) ? $dif_2_cost : null ) )
                                                    <?php  $pay_back_b=$smasolutions->pay_back($inv_ini_1,$inv_ini_3,$dif_2_cost) ?>
                                                    <b style="color:#33cc33;"  class="text-[24px]  font-roboto text-6xl">{{number_format($pay_back_b)}}</b>
                                                 @else
                                                 <b  style="color:#33cc33;" class="text-[24px]  font-roboto text-6xl">N/A</b>
                                                @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">ROI Entre Soluciónes</label>
                                        </div>

                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                               {{-- espacio --}}
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">1 Años</b>

                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">2 Años</b>

                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">3 Años</b>

                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">4 Años</b>

                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                <b class="text-[24px] text-blue-900 font-roboto text-2xl">5 Años</b>

                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl mt-3">Solución A</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                              @if ($result2 !== null)
                                              <?php  $roi_inv_tot_1=$smasolutions->roi_inv_tot(1,$id_project,$dif_1_cost,$inv_ini_2) ?>
                                              <?php  /* $roi_inv_tot_1=$smasolutions->roi_inv_tot(3,$dif_1_cost,$inv_ini_2,) */ ?>

                                              @if ($roi_inv_tot_1 == 0)
                                                <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_1)}}%</b>
                                                @endif

                                                @if ($roi_inv_tot_1 < 0)
                                                <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_1)}}%</b>
                                                @endif

                                                @if ($roi_inv_tot_1 > 0 && $roi_inv_tot_1 <= 15)
                                                <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{($roi_inv_tot_1)}}%</b>
                                                @endif

                                                @if ($roi_inv_tot_1 > 15)
                                                <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_1)}}%</b>
                                                @endif
                                            @endif
                                              @if ($result2 === null)
                                              <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                              @endif
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                @if ($result2 !== null)
                                              <?php  $roi_inv_tot_2=$smasolutions->roi_inv_tot(2,$id_project,$dif_1_cost,$inv_ini_2) ?>
                                                    @if ($roi_inv_tot_2 == 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_2}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_2 < 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_2}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_2 > 0 && $roi_inv_tot_2 <= 15)
                                                    <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_2}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_2 > 15)
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_2}}%</b>
                                                    @endif
                                              @endif

                                              @if ($result2 === null)
                                              <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                              @endif
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                @if ($result2 !== null)
                                                <?php  $roi_inv_tot_3=$smasolutions->roi_inv_tot(3,$id_project,$dif_1_cost,$inv_ini_2) ?>
                                                    @if ($roi_inv_tot_3 == 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_3}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_3 < 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_3}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_3 > 0 && $roi_inv_tot_3 < 15)
                                                    <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_3}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_3 > 15)
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_3}}%</b>
                                                    @endif
                                                @endif

                                                @if ($result2 === null)
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                                @endif
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                @if ($result2 !== null)
                                                <?php  $roi_inv_tot_4=$smasolutions->roi_inv_tot(4,$id_project,$dif_1_cost,$inv_ini_2) ?>
                                                    @if ($roi_inv_tot_4 == 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_4}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_4 < 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_4}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_4 > 0 && $roi_inv_tot_4 <= 5)
                                                    <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_4}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_4 > 15)
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_4}}%</b>
                                                    @endif
                                                @endif

                                                @if ($result2 === null)
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                                @endif
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                @if ($result2 !== null)
                                                <?php  $roi_inv_tot_4=$smasolutions->roi_inv_tot(5,$id_project,$dif_1_cost,$inv_ini_2) ?>
                                                    @if ($roi_inv_tot_4 == 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_4}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_4 < 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_4}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_4 > 0 && $roi_inv_tot_4 <= 5)
                                                    <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_4}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_4 > 15)
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{$roi_inv_tot_4}}%</b>
                                                    @endif
                                                @endif

                                                @if ($result2 === null)
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                                @endif
                                            </div>
                                        </div>
                                        {{--  --}}
                                        <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                            <div class="grid justify-center w-1/4">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl mt-3">Solución B</b>
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                @if ($result3 !== null)
                                                <?php  $roi_inv_tot_b_1=$smasolutions->roi_inv_tot(1,$id_project,$dif_2_cost,$inv_ini_3) ?>
                                                <?php  /* $roi_inv_tot_b_1=$smasolutions->roi_inv_tot(3,$dif_2_cost,$inv_ini_3)  */?>
                                                    @if ($roi_inv_tot_b_1 == 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_1)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_1 < 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_1)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_1 > 0 && $roi_inv_tot_b_1 <= 15)
                                                    <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_1)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_1 > 15)
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_1)}}%</b>
                                                    @endif
                                                @endif

                                                @if ($result3 === null)
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                                @endif
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                @if ($result3 !== null)
                                                <?php  $roi_inv_tot_b_2=$smasolutions->roi_inv_tot(2,$id_project,$dif_2_cost,$inv_ini_3) ?>
                                                    @if ($roi_inv_tot_b_2 == 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_2)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_2 < 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_2)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_2 > 0 && $roi_inv_tot_b_2 <= 15)
                                                    <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_2)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_2 > 15)
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_2)}}%</b>
                                                    @endif
                                                @endif

                                                @if ($result3 === null)
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                                @endif
                                            </div>

                                            <div class="grid justify-center w-1/5">
                                                @if ($result3 !== null)
                                                <?php  $roi_inv_tot_b_3=$smasolutions->roi_inv_tot(3,$id_project,$dif_2_cost,$inv_ini_3) ?>
                                                    @if ($roi_inv_tot_b_3 == 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_3)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_3 < 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_3)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_3 > 0 && $roi_inv_tot_b_3 <= 15)
                                                    <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_3)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_3 > 15)
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_3)}}%</b>
                                                    @endif
                                                @endif

                                                @if ($result3 === null)
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                                @endif
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                    @if ($result3 !== null)
                                                    <?php  $roi_inv_tot_b_4=$smasolutions->roi_inv_tot(4,$id_project,$dif_2_cost,$inv_ini_3) ?>

                                                    @if ($roi_inv_tot_b_4 == 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_4)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_4 < 0)
                                                    <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_4)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_4 > 0 && $roi_inv_tot_b_4 <= 15)
                                                    <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_4)}}%</b>
                                                    @endif

                                                    @if ($roi_inv_tot_b_4 > 15)
                                                    <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_4)}}%</b>
                                                    @endif
                                                @endif

                                                @if ($result3 === null)
                                                <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                                @endif
                                            </div>

                                            <div class="grid justify-center w-1/5">

                                                @if ($result3 !== null)
                                                <?php  $roi_inv_tot_b_4=$smasolutions->roi_inv_tot(5,$id_project,$dif_2_cost,$inv_ini_3) ?>

                                                @if ($roi_inv_tot_b_4 == 0)
                                                <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_4)}}%</b>
                                                @endif

                                                @if ($roi_inv_tot_b_4 < 0)
                                                <b style="color:#ea0000;" class="text-[24px]  font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_4)}}%</b>
                                                @endif

                                                @if ($roi_inv_tot_b_4 > 0 && $roi_inv_tot_b_4 <= 15)
                                                <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_4)}}%</b>
                                                @endif

                                                @if ($roi_inv_tot_b_4 > 15)
                                                <b style="color:#33cc33;" class="text-[24px] font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($roi_inv_tot_b_4)}}%</b>
                                                @endif
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>
                                        </div>
                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl py-10">
                                        <div class="flex w-full justify-center mb-5">
                                            <div class="w-1/2">
                                                <div id="chart_roi_base_a" name="chart_roi_base_a"></div>

                                            </div>

                                            <div class="w-1/2">
                                                <div id="chart_roi_base_b" name="chart_roi_base_b"></div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                        <div class="flex w-full justify-center mb-5">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Análisis CAPEX v/s OPEX (@if($tar_ele->unidad == 'mc')$/m²)@endif
                                            @if($tar_ele->unidad == 'ft')$/ft²)@endif
                                            </label>
                                        </div>

                                        <div class="w-full flex">
                                            <div class="w-1/2 grid">
                                                <div>
                                                    <div id="chart" name="chart"></div>
                                                </div>

                                                <div>
                                                    <div id="chart_10" name="chart_10"></div>
                                                </div>
                                            </div>
                                            <div class="w-1/2 grid">
                                                <div>
                                                    <div id="chart_5" name="chart_5"></div>
                                                </div>

                                                <div>
                                                    <div id="chart_15" name="chart_15"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            {{-- espacio --}}
                            <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

                            </div>
                             {{-- espacio --}}
				</div>
				<!-- / Step Content -->
                <div x-show.transition.in="step === 4">
                    <div class="w-full flex justify-center">
                        <div class="2xl:w-3/4 xl:w-3/4 lg:w-full my-3 ">
                            <div class="grid bg-gray-200 rounded-md shadow-xl">
                                <div style="background-color: #233064;" class="w-full flex justify-center text-white rounded-md p-3">
                                    <label class="font-bold text-white text-2xl font-roboto text-4xl">ANÁLISIS DE INTENSIDAD DEL USO DE LA ENERGÍA (EUI)</label>
                                </div>

                                <div class="w-full flex justify-center m-1 " >
                                    <div class="flex w-1/3 justify-start">
                                        <div class="mx-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Nombre:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{substr($tar_ele->name, 0, 25)}} </label>
                                        </div>
                                    </div>
                                    <div class="flex w-1/4  justify-start">
                                        <div class="mr-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Región:</label>
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

                                    <div class="flex w-1/5 justify-start">
                                        <div class="mx-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Área:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{number_format($tar_ele->area)}}
                                                @if ($tar_ele->unidad == 'mc')
                                                    m²
                                                @endif

                                                @if ($tar_ele->unidad == 'ft')
                                                ft²
                                                @endif
                                        </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="w-full flex justify-start m-1" >
                                    <div class="flex w-2/5  justify-start">
                                        <div class="mx-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tipo Edificio:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->tipo_edi}}</label>
                                        </div>
                                    </div>


                                    <div class="flex w-auto justify-start">
                                        <div class="ml-3">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Horas Enfriamiento Anual:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">&nbsp;{{number_format($tar_ele->coolings_hours)}}</label>
                                        </div>
                                    </div>
                                    <div class="flex w-1/4 justify-start ml-10 pl-1">
                                        <div class="mx-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tarifa Eléctrica:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->costo_elec}} $/Kwh</label>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <div class="grid bg-gray-200 rounded-md shadow-xl my-3">
                                    <div class="flex w-full justify-center">
                                        <label class="font-bold text-blue-900 text-2xl font-roboto text-4xl" for="">{{$tar_ele->tipo_edi}} (KBTU/sqf)</label>
                                    </div>



                                    <div class="flex w-full justify-center gap-x-3">
                                            <div class="flex w-1/2 justify-center text-[24px] m-1">
                                                <?php  $energy_star=$smasolutions->energy_star($id_project) ?>
                                                <img src="{{asset('/assets/images/Energy-Star-Logo.png')}}" style="width:120px; height:75px;" class="mx-2 mt-6" alt="Nano Degree">
                                                <b class="text-blue-800 mr-1 font-roboto text-4xl mt-8">EUI - Energy Star</b><b style="color:#33cc33;" class="text-[24px] font-roboto mt-3 text-6xl">&nbsp;{{number_format($energy_star,1)}}</b>
                                            </div>

                                            <div class="flex w-1/2 justify-center text-[24px] m-1">
                                                <?php  $ashrae=$smasolutions->ashrae($id_project) ?>
                                                <img src="{{asset('/assets/images/Logo-ASHRAE-png.png')}}" style="width:115px; height:75px;" class="mx-2 mt-6" alt="Nano Degree">
                                                <b class="text-blue-800 mr-1 font-roboto text-4xl mt-8">EUI - ASHRAE</b><b style="color:#33cc33;" class="text-[24px] font-roboto mt-3 text-6xl">&nbsp;{{$ashrae}}</b>
                                            </div>
                                    </div>

                                    {{--  --}}
                                    <div class="w-full flex justify-center my-3 " >
                                        {{-- @foreach ($results as $solution)


                                        @if ($solution->num_enf == 1) --}}
                                            <div class="grid w-1/3">

                                            <div class="flex w-full ">
                                                    <div class="grid w-full mx-3">

                                                        <div class="flex justify-center w-full bg-orange-500 rounded-md p-2">
                                                            <label class="text-white font-bold text-4xl font-roboto">Sistema Existente</label>
                                                        </div>

                                                        <div class="grid justify-center">

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
                                                                <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label>
                                                                @if (strlen($sumacap_term_1) >= 15)
                                                                <p class="text-blue-800 font-bold text-4xl font-roboto uppercase text-center">{{$sumacap_term_1}} <b class="text-black text-3xl">{{$unid_med_1->unid_med}}</b> </p>
                                                                @endif

                                                                @if (strlen($sumacap_term_1) < 15)
                                                                <p class="text-blue-800 font-bold text-5xl font-roboto uppercase text-center">{{$sumacap_term_1}}  <b class="text-black text-3xl">{{$unid_med_1->unid_med}}</b> </p>
                                                                @endif

                                                            @endif

                                                            @if ($unid_med_1 === "")
                                                             <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_1}} <b class="text-black text-3xl">{{$unid_med_1}}</b>  </p>
                                                            @endif

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual del Edificio</label><p class="text-blue-800 font-bold text-5xl font-roboto">$ {{number_format($consumo_anual_edi)}}</p>
                                                            </div>
                                                        </div>


                                                    </div>
                                            </div>
                                        </div>
                                        {{-- @endif
                                        @endforeach --}}


                                        <div class="grid w-1/3">

                                            <div class="flex w-full ">
                                                    <div class="grid w-full mx-3">

                                                        <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                            <label class="text-white font-bold text-4xl font-roboto" for="">Solución A</label>
                                                        </div>


                                                        <div class="grid justify-center text-center">
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
                                                            <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}}  <b class="text-black text-3xl">{{$unid_med_2->unid_med}} </b></p>
                                                            @endif

                                                            @if ($unid_med_2 === "")
                                                            <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}}  <b class="text-black text-3xl">{{$unid_med_2}}</b></p>
                                                            @endif

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual del Edificio</label><p class="text-blue-800 font-bold text-5xl font-roboto">$ {{number_format($consumo_anual_edi_a)}}</p>
                                                            </div>
                                                        </div>



                                                    </div>
                                            </div>
                                        </div>

                                        <div class="grid w-1/3">

                                            <div class="flex w-full ">
                                                    <div class="grid w-full mx-3">

                                                        <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                            <label class="text-white font-bold text-4xl font-roboto" for="">Solución B</label>
                                                        </div>


                                                        <div class="grid justify-center text-center">

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
                                                            <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}}  <b class="text-black text-3xl">{{$unid_med_3->unid_med}}</b></p>
                                                            @endif

                                                            @if ($unid_med_3 === "")
                                                            <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} <b class="text-black text-3xl">{{$unid_med_3}}</b>  </p>
                                                            @endif

                                                            <div class="grid justify-items-center">
                                                                <label class="font-bold font-roboto text-2xl mt-3">Consumo Anual del Edificio</label><p class="text-blue-800 font-bold text-5xl font-roboto">$ {{number_format($consumo_anual_edi_b)}}</p>
                                                            </div>
                                                        </div>


                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}

                                </div>
                                <div class="grid bg-gray-200 rounded-md shadow-xl my-3">


                                    <div class="w-full flex justify-center text-white bg-blue-800 rounded-md p-3">
                                        <label class="font-bold text-white text-2xl font-roboto text-4xl">Valores EUI</label>
                                    </div>

                                    <div class="flex w-full justify-center">
                                            <div class="w-1/3 grid justify-items-center">
                                                @if ($result1 ==! null)
                                                <?php  $valor_eui_base=$smasolutions->valor_eui_aux($sumaopex_1,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                                                    @if ($valor_eui_base <= $ashrae)
                                                    <label style="color:#33cc33;" class="font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_base,1)}}</label>
                                                    @elseif ($valor_eui_base <= $energy_star && $valor_eui_base > $ashrae)
                                                        <label  class=" text-orange-500 font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_base,1)}}</label>
                                                    @elseif ($valor_eui_base > $energy_star)
                                                    <label  style="color:#ea0000;" class="font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_base,1)}}</label>
                                                    @else
                                                    <label class="text-blue-800  font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_base,1)}}</label>
                                                    @endif
                                                    <div id="eui_sol_base"></div>
                                                @endif

                                                @if ($result1 === null)
                                                <label class="text-red-500 font-bold text-6xl font-roboto" for="">0</label>
                                                @endif
                                            </div>
                                            {{-- sumaopex_2
                                            sumaopex_3 --}}
                                            <div class="w-1/3 grid justify-items-center">
                                                @if ($result2 ==! null)
                                                <?php  $valor_eui_a=$smasolutions->valor_eui_aux($sumaopex_2,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                                                    @if ($valor_eui_a <= $ashrae)
                                                    <label style="color:#33cc33;"  class=" font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_a,1)}}</label>
                                                    @elseif ($valor_eui_a <= $energy_star && $valor_eui_a > $ashrae)
                                                    <label class=" text-orange-500 font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_a,1)}}</label>
                                                    @elseif ($valor_eui_a > $energy_star)
                                                    <label  style="color:#ea0000;" class="font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_a,1)}}</label>
                                                    @else
                                                    <label class="text-blue-800  font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_a,1)}}</label>
                                                    @endif
                                                    <div id="eui_sol_a"></div>
                                                @endif

                                                @if ($result2 === null)
                                                <label class="text-red-500 font-bold text-6xl font-roboto" for="">0</label>
                                                <?php  $valor_eui_a=0; ?>
                                                <div id="eui_sol_a"></div>
                                                @endif
                                            </div>
                                            <div class="w-1/3 grid justify-items-center">
                                                @if ($result3 ==! null)
                                                <?php  $valor_eui_b=$smasolutions->valor_eui_aux($sumaopex_3,$tar_ele->costo_elec,$tar_ele->area,$tar_ele->porcent_hvac,$energy_star,$tar_ele->unidad) ?>
                                                    @if ($valor_eui_b <= $ashrae)
                                                    <label style="color:#33cc33;" class="font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_b,1)}}</label>
                                                    @elseif ($valor_eui_b <= $energy_star && $valor_eui_b > $ashrae)
                                                    <label  class="text-orange-500 font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_b,1)}}</label>
                                                    @elseif ($valor_eui_b > $energy_star)
                                                    <label  style="color:#ea0000;" class="font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_b,1)}}</label>
                                                    @else
                                                    <label class="text-blue-800  font-bold text-6xl font-roboto" for="">{{number_format($valor_eui_b,1)}}</label>
                                                    @endif

                                                @endif

                                                @if ($result3 === null)
                                                <?php $valor_eui_b = 0; ?>
                                                <label class="text-red-500 font-bold text-6xl font-roboto" for="">0</label>

                                                @endif
                                                <div id="eui_sol_b"></div>
                                            </div>
                                    </div>

                                   {{--  <div>
                                        <div id="chart_eui" class="w-1/2"></div>
                                    </div> --}}
                                </div>
                                <div class="grid bg-gray-200 rounded-md shadow-xl my-3 w-full">

                                    <div class="w-full flex justify-center text-white bg-blue-800 rounded-md p-3">
                                        <label class="font-bold text-white text-2xl font-roboto text-4xl">Desperdicio de Energía Eléctrica del Edificio (Año)</label>
                                    </div>

                                    <div class="flex w-full justify-center mt-5">
                                        <div id="chart_desp_energy" class="w-1/2"></div>
                                    </div>
                                    <div class="w-full grid">
                                        <div class="w-full flex">
                                            <div class="w-1/3 flex">

                                            </div>

                                            <div class="w-1/3 flex justify-center">
                                                <label class="font-bold text-blue-800 font-roboto text-4xl">Energy Star</label>
                                            </div>

                                            <div class="w-1/3 flex justify-center">
                                                <label class="font-bold text-blue-800 font-roboto text-4xl">ASHRAE</label>
                                            </div>
                                        </div>

                                        <div class="w-full flex mt-5">
                                            <div class="w-1/3 flex">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl" style="margin-left:15px;">Sistema Existente</b>
                                            </div>
                                            <?php  $energy_base=$desperdicio->desp_energy($id_project,$energy_star,$ashrae,$valor_eui_base,$tar_ele->costo_elec) ?>
                                            <div class="w-1/3 flex justify-center">
                                                @if ($energy_base > 0)
                                                <b style="color:#ea0000;" class="font-bold text-5xl font-roboto">${{number_format($energy_base)}}</b>
                                                @endif

                                                @if ($energy_base < 0)
                                                <b style="color:#33cc33;" class="font-bold text-5xl font-roboto">${{number_format($energy_base)}}</b>
                                                @endif

                                            </div>

                                            <?php  $ashrae_base=$desperdicio->desp_ashrae($id_project,$energy_star,$ashrae,$valor_eui_base,$tar_ele->costo_elec) ?>
                                            <div class="w-1/3 flex justify-center">
                                                @if ($ashrae_base > 0)
                                                <b style="color:#ea0000;" class="font-bold text-5xl font-roboto">${{number_format($ashrae_base)}}</b>
                                                @endif

                                                @if ($ashrae_base < 0)
                                                <b style="color:#33cc33;" class="font-bold text-5xl font-roboto">${{number_format($ashrae_base)}}</b>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="w-full flex">
                                            <div class="w-1/3 flex">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl" style="margin-left:15px;">Solución A</b>
                                            </div>
                                            <?php  $energy_a=$desperdicio->desp_energy($id_project,$energy_star,$ashrae,$valor_eui_a,$tar_ele->costo_elec) ?>
                                            <div class="w-1/3 flex justify-center">
                                            @if ($result2 ==! null)
                                                @if ($energy_a > 0)
                                                <b style="color:#ea0000;" class="font-bold text-5xl font-roboto">${{number_format($energy_a)}}</b>
                                                @endif

                                                @if ($energy_a < 0)
                                                <b style="color:#33cc33;" class="font-bold text-5xl font-roboto">${{number_format($energy_a)}}</b>
                                                @endif
                                            @endif

                                            @if ($result2 === null)
                                                <b class="text-blue-800 font-bold text-5xl font-roboto">$0</b>
                                                @endif
                                            </div>

                                            <div class="w-1/3 flex justify-center">
                                                <?php  $ashrae_a=$desperdicio->desp_ashrae($id_project,$energy_star,$ashrae,$valor_eui_a,$tar_ele->costo_elec) ?>
                                                @if ($result2 ==! null)
                                                @if ($ashrae_a > 0)
                                                <b style="color:#ea0000;" class="font-bold text-5xl font-roboto">${{number_format($ashrae_a)}}</b>
                                                @endif
                                                @if ($ashrae_a < 0)
                                                <b style="color:#33cc33;" class="font-bold text-5xl font-roboto">${{number_format($ashrae_a)}}</b>
                                                @endif
                                                @endif
                                                @if ($result2 === null)
                                                <b class="text-blue-800 font-bold text-5xl font-roboto">$0</b>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="w-full flex">
                                            <div class="w-1/3 flex">
                                                <b class="text-[24px] text-blue-600 font-roboto text-3xl" style="margin-left:15px;">Solución B</b>
                                            </div>
                                            <?php  $energy_b=$desperdicio->desp_energy($id_project,$energy_star,$ashrae,$valor_eui_b,$tar_ele->costo_elec) ?>
                                            <div class="w-1/3 flex justify-center">
                                                @if ($result3 ==! null)
                                                    @if ($energy_b > 0)
                                                    <b style="color:#ea0000;" class="font-bold text-5xl font-roboto">${{number_format($energy_b)}}</b>
                                                    @endif

                                                    @if ($energy_b < 0)
                                                    <b style="color:#33cc33;" class="font-bold text-5xl font-roboto">${{number_format($energy_b)}}</b>
                                                    @endif
                                                @endif

                                                @if ($result3 === null)
                                                <b class="text-blue-800 font-bold text-5xl font-roboto">$0</b>
                                                @endif
                                            </div>

                                            <div class="w-1/3 flex justify-center">
                                                <?php  $ashrae_b=$desperdicio->desp_ashrae($id_project,$energy_star,$ashrae,$valor_eui_b,$tar_ele->costo_elec) ?>
                                                @if ($result3 ==! null)
                                                    @if ($ashrae_b > 0)
                                                    <b style="color:#ea0000;" class="font-bold text-5xl font-roboto">${{number_format($ashrae_b)}}</b>
                                                    @endif

                                                    @if ($ashrae_b < 0)
                                                    <b style="color:#33cc33;" class="font-bold text-5xl font-roboto">${{number_format($ashrae_b)}}</b>
                                                    @endif
                                                @endif

                                                @if ($result3 === null)
                                                <b class="text-blue-800 font-bold text-5xl font-roboto">$0</b>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

     {{-- espacio --}}
     <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

     </div>
      {{-- espacio --}}
                            </div>
                        </div>
                </div>


                <div x-show.transition.in="step === 5">
                    <div class="w-full flex justify-center">
                        <div class="2xl:w-3/4 xl:w-3/4 my-3 lg:w-full ">
                            <div class="grid bg-gray-200 rounded-md shadow-xl">
                                <div style="background-color: #233064;" class="w-full flex justify-center text-white rounded-md p-3">
                                    <label class="font-bold text-white text-2xl font-roboto text-4xl">RESULTADOS ANÁLISIS SUSTENTABLE</label>
                                </div>

                                <div class="w-full flex justify-center m-1 " >
                                    <div class="flex w-1/3 justify-start">
                                        <div class="mx-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Nombre:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{substr($tar_ele->name, 0, 25)}} </label>
                                        </div>
                                    </div>
                                    <div class="flex w-1/4  justify-start">
                                        <div class="mr-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Región:</label>
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

                                    <div class="flex w-1/5 justify-start">
                                        <div class="mx-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Área:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{number_format($tar_ele->area)}}
                                                @if ($tar_ele->unidad == 'mc')
                                                    m²
                                                @endif

                                                @if ($tar_ele->unidad == 'ft')
                                                ft²
                                                @endif
                                        </label>
                                        </div>
                                    </div>

                                </div>

                                <div class="w-full flex justify-start m-1" >
                                    <div class="flex w-2/5  justify-start">
                                        <div class="mx-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tipo Edificio:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->tipo_edi}}</label>
                                        </div>
                                    </div>


                                    <div class="flex w-auto justify-start">
                                        <div class="ml-3">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Horas Enfriamiento Anual:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">&nbsp;{{number_format($tar_ele->coolings_hours)}}</label>
                                        </div>
                                    </div>
                                    <div class="flex w-1/4 justify-start ml-10 pl-1">
                                        <div class="mx-1">
                                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tarifa Eléctrica:</label>
                                        </div>
                                        <div>
                                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->costo_elec}} $/Kwh</label>
                                        </div>
                                    </div>
                                </div>

                                </div>

                                <div class="grid bg-gray-200 rounded-md shadow-xl my-3">
                                <div class="w-full flex justify-center my-3 " >
                                    {{-- @foreach ($results as $solution)


                                    @if ($solution->num_enf == 1) --}}
                                        <div class="grid w-1/3">

                                        <div class="flex w-full ">
                                                <div class="grid w-full mx-3">

                                                    <div class="flex justify-center w-full bg-orange-500 rounded-md p-2">
                                                        <label class="text-white font-bold text-4xl font-roboto">Sistema Existente</label>
                                                    </div>

                                                    <div class="grid justify-center">

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
                                                            <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label>
                                                            @if (strlen($sumacap_term_1) >= 15)
                                                            <p class="text-blue-800 font-bold text-4xl font-roboto uppercase text-center">{{$sumacap_term_1}} <b class="text-black text-3xl">{{$unid_med_1->unid_med}}</b>  </p>
                                                            @endif

                                                            @if (strlen($sumacap_term_1) < 15)
                                                            <p class="text-blue-800 font-bold text-5xl font-roboto uppercase text-center">{{$sumacap_term_1}} <b class="text-black text-3xl">{{$unid_med_1->unid_med}}</b>  </p>
                                                            @endif

                                                        @endif

                                                        @if ($unid_med_1 === "")
                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_1}} <b class="text-black">{{$unid_med_1}} </b> </p>
                                                        @endif
                                                    </div>



                                                </div>
                                        </div>
                                    </div>
                                    {{-- @endif
                                    @endforeach --}}


                                    <div class="grid w-1/3">

                                        <div class="flex w-full ">
                                                <div class="grid w-full mx-3">

                                                    <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                        <label class="text-white font-bold text-4xl font-roboto" for="">Solución A</label>
                                                    </div>


                                                    <div class="grid justify-center text-center">

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
                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}} <b class="text-black text-3xl">{{$unid_med_2->unid_med}}</b></p>
                                                        @endif

                                                        @if ($unid_med_2 === "")
                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_2}}  <b class="text-black text-3xl">{{$unid_med_2}}</b> </p>
                                                        @endif
                                                    </div>



                                                </div>
                                        </div>
                                    </div>

                                    <div class="grid w-1/3">

                                        <div class="flex w-full ">
                                                <div class="grid w-full mx-3">

                                                    <div class="w-full bg-blue-800 rounded-md p-2 text-center">
                                                        <label class="text-white font-bold text-4xl font-roboto" for="">Solución B</label>
                                                    </div>


                                                    <div class="grid justify-center text-center">

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
                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} <b class="text-black text-3xl">{{$unid_med_3->unid_med}}</b> </p>
                                                        @endif

                                                        @if ($unid_med_3 === "")
                                                        <label class="font-bold font-roboto text-2xl mt-10">Capacidad Térmica Total</label><p class="text-blue-800 font-bold text-5xl font-roboto uppercase">{{$sumacap_term_3}} <b class="text-black text-3xl"> {{$unid_med_3}}</b> </p>
                                                        @endif
                                                    </div>


                                                </div>
                                        </div>
                                    </div>
                                </div>


                            </div>


{{--  --}}
                                <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                    <div class="flex w-full justify-center">
                                        <div class="flex w-30">
                                            <img src="{{asset('/assets/images/watts.png')}}" style="width:100px; height:100px; z-index:1;" class="mx-10 mt-2" alt="Nano Degree">
                                        </div>
                                        <div class="flex w-full justify-center">

                                                <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl mr-10">Reducción Energética - Mega Watts</label>

                                        </div>
                                    </div>
                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                                {{-- espacio --}}
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">1 Años</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">2 Años</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">3 Años</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">4 Años</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">5 Años</b>
                                        </div>
                                    </div>


                                    {{--  --}}
                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                            <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución A</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                           {{--  <b class="text-[24px] text-blue-900 font-roboto text-4xl">3 Años</b> --}}
                                           @if ($result2 !== null)
                                           <?php  $red_en_mw_a_1=$smasolutions->red_en_mw(1,$dif_1) ?>
                                           <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_a_1)}}</b>
                                           @endif

                                           @if ($result2 === null)
                                           <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                           @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            @if ($result2 !== null)
                                            <?php  $red_en_mw_a_2=$smasolutions->red_en_mw(2,$dif_1) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_a_2)}}</b>
                                            @endif

                                            @if ($result2 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                           {{--  <b class="text-[24px] text-blue-900 font-roboto text-4xl">10 Años</b> --}}
                                           @if ($result2 !== null)
                                           <?php  $red_en_mw_a_3=$smasolutions->red_en_mw(3,$dif_1) ?>
                                           <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_a_3)}}</b>
                                           @endif

                                           @if ($result2 === null)
                                           <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                           @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            @if ($result2 !== null)
                                            <?php  $red_en_mw_a_4=$smasolutions->red_en_mw(4,$dif_1) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_a_4)}}</b>
                                            @endif

                                            @if ($result2 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            @if ($result2 !== null)
                                            <?php  $red_en_mw_a_4=$smasolutions->red_en_mw(5,$dif_1) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_a_4)}}</b>
                                            @endif

                                            @if ($result2 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">N/A</b>
                                            @endif
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                            <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución B</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            @if ($result3 !== null)
                                            <?php  $red_en_mw_b_1=$smasolutions->red_en_mw(1,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_b_1)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            @if ($result3 !== null)
                                            <?php  $red_en_mw_b_2=$smasolutions->red_en_mw(2,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_b_2)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            @if ($result3 !== null)
                                            <?php  $red_en_mw_b_3=$smasolutions->red_en_mw(3,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_b_3)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            @if ($result3 !== null)
                                            <?php  $red_en_mw_b_4=$smasolutions->red_en_mw(4,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_b_4)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            @if ($result3 !== null)
                                            <?php  $red_en_mw_b_4=$smasolutions->red_en_mw(5,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_en_mw_b_4)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                                {{--  --}}
                                <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                    <div class="flex w-full justify-center mb-2">
                                        <div class="flex w-30">
                                            <img src="{{asset('/assets/images/Huella.png')}}" style="width:100px; height:100px;" class="mx-10 mt-2" alt="Nano Degree">
                                        </div>
                                        <div class="flex w-full justify-center">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Reducción Huella de Carbono – Ton. CO2</label>
                                        </div>

                                    </div>

                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                           {{-- espacio --}}
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">1 Años</b>

                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">2 Años</b>

                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">3 Años</b>

                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">4 Años</b>

                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">5 Años</b>

                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                            <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución A</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                          @if ($result2 !== null)
                                          <?php  $red_hu_carb_a_1=$smasolutions->red_hu_carb(1,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_a_1)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result2 !== null)
                                          <?php  $red_hu_carb_a_2=$smasolutions->red_hu_carb(2,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_a_2)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result2 !== null)
                                          <?php  $red_hu_carb_a_3=$smasolutions->red_hu_carb(3,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_a_3)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result2 !== null)
                                          <?php  $red_hu_carb_a_4=$smasolutions->red_hu_carb(4,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_a_4)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result2 !== null)
                                          <?php  $red_hu_carb_a_4=$smasolutions->red_hu_carb(5,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_a_4)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                            <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución B</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                             @if ($result3 !== null)
                                            <?php  $red_hu_carb_b_1=$smasolutions->red_hu_carb(1,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_b_1)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                             @if ($result3 !== null)
                                            <?php  $red_hu_carb_b_2=$smasolutions->red_hu_carb(2,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_b_2)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                             @if ($result3 !== null)
                                            <?php  $red_hu_carb_b_3=$smasolutions->red_hu_carb(3,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_b_3)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                             @if ($result3 !== null)
                                          <?php  $red_hu_carb_b_4=$smasolutions->red_hu_carb(4,$dif_2) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_b_4)}}</b>
                                          @endif

                                          @if ($result3 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result3 !== null)
                                         <?php  $red_hu_carb_b_4=$smasolutions->red_hu_carb(5,$dif_2) ?>
                                         <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_hu_carb_b_4)}}</b>
                                         @endif

                                         @if ($result3 === null)
                                         <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                         @endif
                                       </div>
                                    </div>
                                </div>
                        {{--  --}}


                                             {{--  --}}
                                <div class="grid w-full justify-items-center mt-8 bg-gray-200 rounded-md shadow-xl">
                                    <div class="flex w-full justify-center mb-2">
                                        <div class="flex w-30">
                                            <img src="{{asset('/assets/images/reducción-bolsas.png')}}" style="width:100px; height:90px;" class="mx-10 mt-2" alt="Nano Degree">
                                        </div>
                                        <div class="flex w-full justify-center">
                                            <label class="text-blue-800 text-[18px] font-roboto font-bold text-blue-900 text-4xl">Reducción de Bolsas de Basura - Recicladas</label>
                                        </div>

                                    </div>

                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                           {{-- espacio --}}
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">1 Años</b>

                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">2 Años</b>

                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">3 Años</b>

                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">4 Años</b>

                                        </div>

                                        <div class="grid justify-center w-1/5">
                                            <b class="text-[24px] text-blue-900 font-roboto text-2xl">5 Años</b>

                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                            <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución A</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                          @if ($result2 !== null)
                                          <?php  $red_bol_ba_a_1=$smasolutions->red_bol_ba(1,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_a_1)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result2 !== null)
                                          <?php  $red_bol_ba_a_2=$smasolutions->red_bol_ba(2,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_a_2)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result2 !== null)
                                          <?php  $red_bol_ba_a_3=$smasolutions->red_bol_ba(3,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_a_3)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result2 !== null)
                                          <?php  $red_bol_ba_a_4=$smasolutions->red_bol_ba(4,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_a_4)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result2 !== null)
                                          <?php  $red_bol_ba_a_4=$smasolutions->red_bol_ba(5,$dif_1) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_a_4)}}</b>
                                          @endif

                                          @if ($result2 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>
                                    </div>
                                    {{--  --}}
                                    <div class="flex w-full justify-center bg-gray-200 gap-x-3">
                                        <div class="grid justify-center w-1/4">
                                            <b class="text-[24px] text-blue-600 font-roboto text-3xl">Solución B</b>
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                             @if ($result3 !== null)
                                            <?php  $red_bol_ba_b_1=$smasolutions->red_bol_ba(1,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_b_1)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                             @if ($result3 !== null)
                                            <?php  $red_bol_ba_b_2=$smasolutions->red_bol_ba(2,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_b_2)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">
                                             @if ($result3 !== null)
                                            <?php  $red_bol_ba_b_3=$smasolutions->red_bol_ba(3,$dif_2) ?>
                                            <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_b_3)}}</b>
                                            @endif

                                            @if ($result3 === null)
                                            <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                            @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                             @if ($result3 !== null)
                                          <?php  $red_bol_ba_b_4=$smasolutions->red_bol_ba(4,$dif_2) ?>
                                          <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_b_4)}}</b>
                                          @endif

                                          @if ($result3 === null)
                                          <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                          @endif
                                        </div>

                                        <div class="grid justify-center w-1/5">

                                            @if ($result3 !== null)
                                         <?php  $red_bol_ba_b_4=$smasolutions->red_bol_ba(5,$dif_2) ?>
                                         <b class="text-[24px] text-orange-500 font-roboto 2xl:text-5xl xl:text-5xl lg:text-5xl md:text-4xl">{{number_format($red_bol_ba_b_4)}}</b>
                                         @endif

                                         @if ($result3 === null)
                                         <b class="text-[24px] text-orange-500 font-roboto text-5xl">N/A</b>
                                         @endif
                                       </div>
                                    </div>
                                </div>
                                {{--  --}}



                            </div>
                        </div>
                        {{-- espacio --}}
                        <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

                        </div>
                         {{-- espacio --}}
            </div>

 {{-- step 6 --}}
 <div x-show.transition.in="step === 6">
    <div class="w-full flex justify-center">
        <div class="2xl:w-3/4 xl:w-3/4 lg:w-full my-3 ">
            <div class="grid bg-gray-200 rounded-md shadow-xl">
                <div style="background-color: #233064;" class="w-full flex justify-center text-white rounded-md p-3">
                    <label class="font-bold text-white text-2xl font-roboto text-4xl">Analisis de Confort y Productividad</label>
                </div>

                <div class="w-full flex justify-center m-1 " >
                    <div class="flex w-1/3 justify-start">
                        <div class="mx-1">
                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Nombre:</label>
                        </div>
                        <div>
                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{substr($tar_ele->name, 0, 25)}} </label>
                        </div>
                    </div>
                    <div class="flex w-1/4  justify-start">
                        <div class="mr-1">
                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Región:</label>
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

                    <div class="flex w-1/5 justify-start">
                        <div class="mx-1">
                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Área:</label>
                        </div>
                        <div>
                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{number_format($tar_ele->area)}}
                                @if ($tar_ele->unidad == 'mc')
                                    m²
                                @endif

                                @if ($tar_ele->unidad == 'ft')
                                ft²
                                @endif
                        </label>
                        </div>
                    </div>

                </div>

                <div class="w-full flex justify-start m-1" >
                    <div class="flex w-2/5  justify-start">
                        <div class="mx-1">
                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tipo Edificio:</label>
                        </div>
                        <div>
                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->tipo_edi}}</label>
                        </div>
                    </div>


                    <div class="flex w-auto justify-start">
                        <div class="ml-3">
                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Horas Enfriamiento Anual:</label>
                        </div>
                        <div>
                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">&nbsp;{{number_format($tar_ele->coolings_hours)}}</label>
                        </div>
                    </div>
                    <div class="flex w-1/4 justify-start ml-10 pl-1">
                        <div class="mx-1">
                            <label style="font-size: 18px;"  class="text-blue-800 font-bold font-roboto" for="">Tarifa Eléctrica:</label>
                        </div>
                        <div>
                            <label style="font-size: 18px;" class="text-blue-600 font-bold" for="">{{$tar_ele->costo_elec}} $/Kwh</label>
                        </div>
                    </div>
                </div>
                </div>

                {{-- confotr --}}
                <div class="grid bg-gray-200 rounded-md shadow-xl my-3">
                    <div class="w-full flex justify-center text-white bg-blue-800 rounded-md p-3">
                        <label class="font-bold text-white text-2xl font-roboto text-4xl">Nivel de Confort</label>
                    </div>

                    <div class="w-full grid mb-5 gap-y-2">

                        <?php  $conf_val_base=$conf_val->conf_val($id_project,1,1,$sumacap_term_1); ?>


                            <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg" style="margin-top:1.8rem;">

                                <div class="w-1/5 flex justify-start">
                                {{--  <div class="ml-10 flex w-full mt-5"> --}}
                                        <p class="text-3xl text-blue-600 font-roboto  font-bold text-left">Sistema Existente</p>
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

                </div>
                {{-- @if ($result2 === null)
                <label class="text-red-500 font-bold text-6xl font-roboto" for="">0</label>
                <?php  /* $valor_eui_a=0; */ ?>
                @endif --}}

                @if ($result2 !== null)
                <div class="w-full grid mb-5 gap-y-2">


                    <?php  $conf_val_a=$conf_val->conf_val($id_project,2,1,$sumacap_term_2);?>


                    <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg">

                        <div class="w-1/5 flex justify-start">

                                <p class="text-[24px] text-blue-600 font-roboto text-3xl font-bold text-left">Solución A</p>

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

            </div>
                @endif

                @if ($result2 === null)
                <?php  $conf_val_a=0; ?>
                <div class="w-full grid mb-5 gap-y-2">
                    <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg">

                        <div class="w-1/5 flex justify-start">

                                <p class="text-[24px] text-blue-600 font-roboto text-3xl font-bold text-left">Solución A</p>

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
                <div class="w-full grid mb-5 gap-y-2">

                    <?php  $conf_val_b=$conf_val->conf_val($id_project,3,1,$sumacap_term_3) ?>


                    <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg">
                        <div class="w-1/5 flex justify-start">

                                <p class="text-[24px] text-blue-600 font-roboto text-3xl font-bold text-left">Solución B</p>

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

            </div>
                @endif

                @if ($result3 === null)
                <?php  $conf_val_b=0; ?>
                <div class="w-full grid mb-5 gap-y-2">
                    <div class="ml-5 flex w-full rounded-l-lg rounded-r-lg">
                        <div class="w-1/5 flex justify-start">

                                <p class="text-[24px] text-blue-600 font-roboto text-3xl font-bold">Solución B</p>

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



                </div>

                <div class="grid bg-gray-200 rounded-md shadow-xl my-3">
                    <div class="w-full flex justify-center text-white bg-blue-800 rounded-md p-3">
                        <label class="font-bold text-white text-2xl font-roboto text-4xl">Productividad Laboral</label>
                    </div>

                    <div class="flex w-full justify-center">
                        @if ($result1 !== null)
                        <?php  $prod_lab=$conf_val->prod_lab($id_project,1,1,$sumacap_term_1) ?>
                        @endif
                        @if ($result1 === null)
                        <?php  $prod_lab=0; ?>
                        @endif
                        <div class="w-1/3 grid justify-items-center">
                            <div id="chart_prod_base"></div>
                        </div>
                        @if ($result1 !== null)
                        <?php  $prod_lab_a=$conf_val->prod_lab($id_project,2,1,$sumacap_term_1) ?>
                        @endif
                        @if ($result1 === null)
                        <?php  $prod_lab_a=0; ?>
                        @endif
                        <div class="w-1/3 grid justify-items-center">
                            <div id="chart_prod_a"></div>
                        </div>
                        @if ($result1 !== null)
                        <?php  $prod_lab_b=$conf_val->prod_lab($id_project,3,1,$sumacap_term_1) ?>
                        @endif
                        @if ($result1 === null)
                        <?php  $prod_lab_b=0; ?>
                        @endif
                        <div class="w-1/3 grid justify-items-center">
                            <div id="chart_prod_b"></div>
                        </div>
                    </div>

                </div>
                {{-- espacio --}}
                <div class="grid w-full justify-items-center mt-8s rounded-md  p-10">

                </div>
                {{-- espacio --}}
            </div>
        </div>
    </div>

                {{-- step 4 --}}


			</div>
		</div>

		<!-- Bottom Navigation -->
		<div class="fixed bottom-0 left-0 right-0 py-5 bg-white shadow-md border-t-2 border-blue-900" x-show="step != 'complete'">
			<div class="max-w-3xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="w-1/2">
						<button
							x-show="step > 1"
							@click="step--"
							class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 text-xl bg-white hover:bg-gray-100 font-medium border font-roboto"
						>Átras</button>

                       <a  href="{{URL::action('ResultadosController@edit_project',$id_project)}}">
                            <button
                            x-show="step == 1"
                            class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 text-xl bg-white hover:bg-gray-100 font-medium border font-roboto"
                        >Átras</button>
                       </a>
					</div>



					<div class="w-1/2 text-right">
						<button
							x-show="step < 6"
							@click="step++"
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-xl text-center text-white bg-blue-500 hover:bg-blue-600 font-medium font-roboto"
						>Siguiente</button>

						{{-- <button
							@click="step = 'complete'"
							x-show="step === 3"
							class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg text-xl shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium font-roboto"
						>Complete</button> --}}
					</div>
				</div>
			</div>
		</div>
		<!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
	</div>

<script type="text/javascript">
window.onload = function() {
    cap_op_3('{{$id_project}}','{{$tar_ele->unidad}}');
    cap_op_5('{{$id_project}}','{{$tar_ele->unidad}}');
   /*  cap_op_10('{{$id_project}}','{{$tar_ele->unidad}}');
    cap_op_15('{{$id_project}}','{{$tar_ele->unidad}}'); */
    confort_base('{{$conf_val_base}}');
    confort_a('{{$conf_val_a}}')
    confort_b('{{$conf_val_b}}')
    roi_base_a('{{$id_project}}');
    roi_base_b('{{$id_project}}');
    eui_grafic('{{$id_project}}');
};

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
        $val_ini_b = $val_ini_b + 0.125;
        $val_fin_b = $val_fin_b + 0.125;
    }


/* alert(val_conf_b); */
}

     javascript:history.forward(1)
function app() {
			return {
				step: 1,
				passwordStrengthText: '',
				togglePassword: false,

				image: 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQEAAAAAAAD/4QBCRXhpZgAATU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAAkAAAAMAAAABAAAAAEABAAEAAAABAAAAAAAAAAAAAP/bAEMACwkJBwkJBwkJCQkLCQkJCQkJCwkLCwwLCwsMDRAMEQ4NDgwSGRIlGh0lHRkfHCkpFiU3NTYaKjI+LSkwGTshE//bAEMBBwgICwkLFQsLFSwdGR0sLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLCwsLP/AABEIAdoB2gMBIgACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAAAAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2gAMAwEAAhEDEQA/APTmZsnmk3N60N1NJTELub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lFAC7m9aNzetJRQAu5vWjc3rSUUALub1o3N60lJQA7c3rSbm9aSigBdzetG4+tJRQAZPrRuPrSUUALub1/lRub1pKSgBdzUbm9aSigBdzetG5vX+VJSUALub1/lUu5qhqXj1oAG6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooASiiigAooooAKSiigAooo+lACUZoooAKKKSgAo/rRSUALUlRVJz60AObqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkoooAKKKKACiikoAKSlooASiiigA+lHpRQaACkoooATmilpPegBP/ANdS5HrUdSfL7UAObqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKSiigAooooAKKKKAEooooASij60UAFFFHpQAUmaKPxoAKSlpPWgA/wAmk/pS/Sk47dqADpUvPvUXrUn4H8qAHt1NJSt1NJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFISFBJIAHUk4FAC0VTlv4EyEBc+3C/nVSS9uX6MEHonX8zQBrEqvLEAe5A/nUTXVqvWVfwyf5VjFmY5Ykn3JP86SmBrG/tB3c/RTTf7QtvST8hWXRQBqi/te+8f8AAc09by0b/loB/vAiseigDeV43+66t9CDTq5/p04+lTJdXMfSQkej/MP1oA2qKoR6gpwJUK/7Scj8utXEkjkG5GDD2P8AMUgH0UUUAFFFJQAUUUUAFFFJQAtJRRQAUlFFABR2oo+lAB1pKKP60AFFFFACUHjNH/66KAEpaSj/APVQAc0/I9KZUufpQA5uppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACimsyopZiAo5JNZlxePLlI8rH0J/ib60AWp72KLKph3/wDHR9TWdLNNMcuxPoOij6Co6KYBRRRQAUUUUAFFFFABRRRQAUUUUAFKruhDIxUjuDikooA0IL/os4/4Gv8AUVfBVgCpBB6Ecg1gVLBcSwH5eUP3lPQ/SgDaoqOKaOZdyH/eB6qfepKQBRRRQAlFFFABSUUUAFFFFABRRSf5NABxR6e1FJQAcUUUnP6UALSf5/GjvRz+FAB06d6KT6UGgA96kyf8mo//ANdP59P1oAlbqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACmu6RqzucKvJNKSACScADJJ7Csi6uDO2BkRqflHr7mgBLi5edu4QH5V/qagoopgFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFACUUUUAPjkkiYOhwR+RHoa14J0nTI4YffX0NYtPileJ1dDyOoPQj0NAG7SUyKVJkDr36juD6U+kAUhoooAKKKKACij/JpKACj/PNFFABScUelFACUdqP8mj+dABn9KMjij60d+tACf5FH5Uf59qOOlACfhUn40zmn4oAlbqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKhuJhDEz/xfdQerGgCpfXGT5CHgf6w+/8AdqhQSSSScknJPqTRTAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACkoooAKKKKACiiigCe2nMEnP+rbhx6e9bHoQevT3zXP1p2M+9DE33k5X/AHf/AK1AF2koNFIAoopKAFpKKPSgApPX0pf8mkoAKKTPP1paAE+lFFIT/ntQAelHAoz0oz/hQAd6T155oooAKk2+wqLPt/8AWqTj1P5GgCZuppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigArJvpd8uwH5Y+P+BHrWnK4jjkc/wAKkj69qwiSSSepJJ+ppgFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABSUUUAFFFFABRRSUAFFFFABT4pDFIkg/hPPuO4plFAG8CGAYchgCD7HmlqpYy74dp6xnH4HkVapALSUUUAH+NFFJQAc0f5+tHFJQAUUUepoAP/r0nP/1sUH1ozQAUnOaPwo9OlAAcd6T60tJQAHn+lSZPotR/55qTJ/yKAJm6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAKWoPiNE/vtk/RazKt6g2Zgv9xB+Z5qpTAKKKKACiiigAooooAKKKKACiiigAooooAKKKSgAooooAKKKSgBaSiigAooooAKKKSgC3YPtmKdpFI/EcitSsOJiksTejr+Wa3PSgAoo/zzSflSAWkNBo/nQAlH9aPr60envQAf5NJS0noaADNFH+fYUH/61ACUetFJnGaADg//AK6O/NJ6fhRz0PrQAH/CpefVfzqI46ZNS8UATN1NJSt1NJQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAYt0d1xOf9rA/AYqGnzHMsx/6aP/ADplMAooooAKKKKACiiigAooooAKKKKACiikoAKKKKACiikoAWkoo4oAKKKKACiikoAKWkooAOa3UOUjb1VT+lYVbUB/cwHuY1JoAkz+dGTR2pP5UgAn+lFFHNABSfjzS0nFABn2+lFFIfQj6UAB6c0elH+eKT/JoAPU/wD6qOaPUe1HpQAho+tHXp+lJ/8AqoAOPXrT8H0H50z/ADxUmT6n9KALDdTSUrdTSUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAGFL/AK2b/ro/8zTKluBiecf7Z/XmoqYBRRRQAUUUUAFFFFABRRRQAUUUUAJRRRQAUUUUAFJRRQAUUUUAFFFJQAtJRRQAUUUUAFbUH+og/wCua/yrFrbjGI4h6Io/SgB/NJR60H2pAB/Wj0o5ooATPSjj/P8A9ej/APVSelACn/PrSccYo/z/APXpPf8A/VQAo9KSg9OfX+VHIoAOo7/1pp/P0+lO/Wm8/wD6qAD07dfxo4/Wj9fekyOp/wAigBc9fqKk/Koj39sVLlvf9KALDdTSUrdTSUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAGRfLtuGP95Vb9MVWrQ1FP9TJ9UP8xWfTAKKKKACiiigAooooAKKKKACkoooAKKKKACkpaSgAooooAKKKKACkpaSgAooo5oAKKKSgByjcyL6sAPxrcHHHoMYrJs033Ef+zlz+HStf1xQAn+eKPSj/AD9aPxxSAQ8UUUnrzQAtJn6UZP8An2o5/wA+9ACHt+dHPt3/AP1Uen8qM/rQAZ/wpP8APt60f55o5/rmgA9+1J680fyo7mgBD+H0o6Z4o9/T60UAJz05p/Pv+dM/PnGKk59BQBabqaSlbqaSgAooooAKKKKACiiigAooooAKKKKACiiigAooooAguo/MgkUdQNy/Veaxq6CsS5i8qZ1/hJ3L9DTAiooooAKKKKACiiigApKWkoAKKKKACiikoAKKKKACiiigApKWkoAKKKKACiikoAKKKACSoHUkAY96ANDT0wskh/iIUfQcmr3/AOumRRiKNIx/CBn3PenfmaQC+lFJzzQe/wCtAB/k0nX8fSlJpBgcfj+FABRwfw6Un+TRnt+dAB9KT1xR24+uaKAA/wD6/ek6c0fnzQeP55oAPekOf896OOvPTrR+VABwTgen60hwADRS/T8KAEPJ+vTNSc+v8qj5/wAfwqTP0/OgC03U0lK3U0lABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAVUvofMj3qPnjyfqverdFAHP0VYuoDDIcD92+Snt6iq9MAooooAKKKSgAooooAKKKSgAooooAKKKPagAoopKAFpKKKACiiigApKKKACrljFucyt0ThfdqqojSOqJ1Y4+nqa2Y0WNFReijH196AHUpopO34UgD/J5pP1o/w/Wj+tAAcfnzR/hRz9fSk4/wA/yFAB/k0Z46/Wjpn+tJ+NAAT3P6daT/PtS+tJQAd/0o5pOuOaO340AH+Tn1pAf8il9c+lJQAdPWjn/D2oP4e9Hp9PxoATPNSc+g/Sou3SpMD0NAFxuppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAjmiSZGRu/IPofWsWSN4nZHGCP19xW9Ve5t1nXsJF+639DQBj0UrKyMysCGBwQabTAKKKKACiiigAopKKACiiigAopKKACiiigAoopKACiiigAzR1xjJNFaNpa7MSyj5uqKf4c9z70ASWlv5K7m/1jdf9kelWT3o/E/Wk/pSAPr6/wA6P50cGk6ZoAP0/Gj/APXRQf8AOKAEx9Pzo59f/r0HH5f1pP6UALx1FJ6cjPOfx7Ufp/jRx6/0oATnijpx+VGc/SkOefT8qAD+p9aD+uaOnNJj88/hQAuaT+lHrzSe/Hv3oAWkyP8APFGeg7d8Un/6qAD8sfrTvl9f1FN6YH6U/j0P5UAXW6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAguLZJ154cD5W/oayJIpImKOMHt6EeoNbtMkijlUq6gjt6g+oNAGFRVqezliyyZdOvH3h9RVWmAUlLSUAFFFFABRRRQAUlLSUAFFFFABRRSUAH+RQASQACWPAAHJNSw280x+VcL3Y9K04beKAZHL92P8qAIba0EeHlwXHReoX/AOvVz/Cj0opAJz+dH+FH5/Wk9f8AOKAD9P1o9f60c8Z70Z+lACUfnRRxx+vtQAnr/Wg5/wA9qP8AHvRxj86AE9M96Mn8aOOlJ/8Aq9aAD1/TPWk649sUvfr/AIUnH9KADP6Uf40H/wDX60c/l1oAOvpR/h+FJke/40nPHtn60AGee31NJ6+/tS8dun9fxpOOmPcUAL/hUmR/tfrUJ7/zNSZb1P50AXm6mkpW6mkoAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigApKKKACiiigAqvNaQS5ONr/3k/qKsUlAGTLZXEedo3qO69fxFViCDgggjseDW/THjikGHRW+o5/OmBhUVqPYW7fdLp9DkfkahbTn/AIJQf94Y/lQBQoq2bC5GeYz9G/8ArUn2G69F/wC+hQBVoq0LG6PUIPq3+FPGnyn70iD6ZNAFKk/nWmunwjG93b8lFWEggj+5GoPTJGT+ZoAyo7a4kxtQhfVuBV2KxiTBkO8+nRfyq37Ht0ooAOAMDoPQYx9KKOn6UnFIAoo/z+dHagA4pMf5NFHagA+h59KTtR36fjRkc+tAB60n8/8APpSikJFACc+/09qPp75o/wA+oo4zQAZ6+vv/ACpOOPz/ABo6ZyaQ9vb0oAM9vzo/CjPtR2/oaAA496ODx7c0h9+9HJx70AJ3+lHHTP8A9ej8MUnHFAB3o54AoPP50h9fc8UAH+NScev+fzqPp/SpMH/P/wCugC83U0lK3U0lABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUlLSUAFFNeSOMbnYKPfv9BVKXUByIUz/tP/QUAX/X0qB7q2jyC4J9E5P6cVlSTzy/fckenQfkKjpgaJ1FMjETbe5JGfyqzHPBN9xxn0PDfkaxKP8AIoA3/wDPNFY8d3cx4G/cPR+f1q0mop/y0jI91Of0NIC9RUC3dq3/AC0A9mBFSh425DKfoRQA6ko560c+9ABSetLzTSyrncyj6kD+dAC9sUVC1zbLnMi/hz/KoGv4QPkVmPv8ooAuU15I4wS7Ko9zyfwrMkvrh+m1B/s8n8zVYlmOWYknuTk/rTA0X1CINhEZl7nO3P0FPS9tn6sUP+0OD26isqigDdBBGVIOeRtIP8qM9P8A9dYaO8ZJRmU/7JIq1HfyLxIoceo4b/CgDSIpOc1HFPDL9x8nH3Tww/CpM89KQBn/AOtQaT3/ADo/+vQAetJxijPWjigA6fypOOKO3PP1oPTr1zxQAf070np/n9aOaXuaAE4/+tR9Ov8AKg5PNJ+npQAHr/nmk4wc/wD6qMZ/z+NHH6fjQAentR/n2NJ+P/66P69qAD1H696THI+lH40hP+fagBeff2471Jg+pqI+nPT6VJuj9/zNAF9uppKVuppKACiiigAooooAKKKKACiiigAooooAKKKKACkpaimnigXLnk/dUdTQBISqgkkADqTwKoT34GVgGT/fbp+AqpPcSzn5jheyjoKhpgOd3clnYs3qabRSUALSUUUAFFFFABSUtJQAUf59KKKAFDOOAzD8TS+ZL/z0f/vo02koAcXfuzfmTTevX9aKSgBaKPak9KACg0UUAFJRn/69H/1qAA0UH0pKAAZByOCPTircN9ImFly6+v8AEKqHJzRQBtJIki7oyGH6j6in5/8Ar1iJJJG25GII/I/hWjb3SS4DfLJ6HofcUgLPpSZ/z9aX1/XNJ6+npQAcY/Sj29vyo65/SjnP+eKAG/y/WjrS/wCfzo/+tQAn+FJ3x3o6f56UUAJyM8cUUuP8OvakNAB/+qk70ev50maAF5603PtS55Ppn1oPqfWgBOOn40/n0P6VHk8D396mx9aAL7dTSUrdTSUAFFFFABRRRQAUUUUAFFFFABRRRQAUUVXubhYF4wZG+4P6mgAublYBgYMh+6vp7msh3eRi7klj1J/kKGZnYsxJYnJJptMAooooASiiigAo9KKKACiiigBKKKKACiiigApKWkoAKSlooAKTpRRQAUlLSUAFHeik4oAOaKP5Uf8A1qACkooOaACjODkH6e1Ic0UAaFtdlsRyn5sYVvX0Bq7nH096wsjmtC1ut+IZD83ARj3HoaALnXpQCcUfyo5+n+NIBOmaQ85pc89PxpPc8Dt/jQAh7evb8KU+tGevToTSenp3oAD9f/rUe3NJxkf5zR+PpigA57DnFJij6+lB9fWgAJFNPt/9elOfr/8AXpOP6e1AC+n+f1p2D/kmmf0/lUv4f5/KgDQbqaSlbqaSgAooooAKKKKACiiigAooooAKKKT1z2oAjmlSFGdu3AH94+lY0kjyOzuclj+XsKlupzNIcH92nCD196r0wCiiigAopKKACiiigAooooAKSiigAooooAKKKSgAo/z+NFFACcUUUUAFFFJQAUZoozQAlH50c0cUAFFFIfp/9agAo4oooASiiigBPTAoyfp3H/1qP8/nRQBqWtwJV2Mf3i9f9oetT8n61io7RsrqeVPHv7VsRyLIodeh5we3saAHd+Pxo9/84pOOv6mjn8+lIA9/zNJ69aX+VJ6e3WgA6elJye1LwfWkoAMdf0pD29s80uTjGfzpM57UAH8vz/Sk+oo/zn/61J0/GgBe4x6fp9Kkz7fpUf8An8aftP8AkigDSbqaSlbqaSgAooooAKKKKACiiigAooooAKpX0+xBEp+aTr7L/wDXq4SACTwACT9BWHNIZZHkPc8D0UdBQBHRRRTAKSiigAooooAKKKKACkoooAKKKKACkpaSgAoozRQAUUnPNFAB+dFFFABxSc0UUAJn9KKKOlABR/Wj/P1pOKACijmkoAKKKKAE/OjFFHGcUAHr+VHvRxSH2oAP8irVnNsfyz91zgZ7NVWjv+ORz0oA3OvUe4pPzqKGQSxK38XRvqOKk/8A1c+9IA9O3+e9HXjPP6UmeaD6CgAJ6Y9eaD0/mc0f5/Cm/wCf/r0AL+FJ/P8AzxR/niloAT/PsPaj+XbP+NHXP6UnX/69AB/Xr/OpMH3pnHv2qTn1P50AaLdTSUrdTSUAFFFFABRRRQAUUUUAFJRRQBUv5dkQQfekOP8AgI5NZVWb2TfOw7RgIPr3qtTAKKKSgAooooAKKKKACiikoAKKKKACiikoAWkoooAKSiloAT/PFFFFACf4UUdaM0AHY0nPY0UUAFFFJxxigAo/Gj+tFABSZoooAPcelFJ/+ujigA/yaKP88UGgBKPxo96KAEo7/jR3o70AW7GTDmPPDjI/3hWgTWKrbGVx/CQfy7VsghgpHQgE/jQAdf0zQf8AH86D+ntScc+nvSAPrnmj9P8A69JnpQM8fXJ7UAH+foaT29sClPXjHvSf4d6ADPtRkdPxpe3Xt9KT06ewoAOKlwPX9Ki44H4c80/H+cUAabdTSUrdTSUAFFFFABRRRQAUlLSUAFNdgiO56Kpb8hTqrXzbbdx3cqv9aAMgkkknqSSfx5oopKYC0lFFABRRRQAUlFFABRRRQAUUfhRQAUlHJooAPSkpe1JQAp/CkoNFABSUv1pKADpR60UlABx+dFFH6igBKWjmkoAKSlzmkoAM/wCelHpSUc8+9AB+NH+FFBoAM8dKb29+tLnvR/P1oAPWk/OjvRzxQAUUUnH60AHr6Vp2jhoQCTlMr/Wsw1csW5lT1Ab8uKAL3H4dKKP/ANXSjpn260gE7+vejijB/L9KTjII/wAmgBfek+n4fWl5GaD7flQAh9c59MUUcD+VH+cCgA7HH59qlyfb8jUX0HfvzzT+f7woA026mkpW6mkoAKKKKACiikoAKKKKACqGotxCnqWY/hxV+svUT+9Qekf8yaAKdJRRTAKKKKACkpaKAEooooAKKKKACkoooAKOwopPWgA/yKOKKKACkoo9f60AFJS5P+FJ6UAFHNFFABSUUUAGetBopPqaAD+fajrSZoPNAAf84oo9aOcf56UAHce1JzQeM0fSgA9aP85pP8KKAD0o49KKKAEzSelLmkzQAtTWhxOvuGX9M1BT4TtlhP8Atr+pxQBr/nxRzjJ/Gl56elJzxk0gE9Mk0vTuOf1o/wAf880fLQAnXp0/w9KPx9qP8k0f1zQAfjwKPbtzQPp/9ek49eOc0AGfY5Gafg+tMz7egp+1ff8AMUwNRuppKVuppKQBRRSUAFFFFABRRSUALWTf/wCv/wCALWrWVf8A+v8A+ALTAqUUUUAFFFJQAUUUUAHeiiigApKKPxoAPrRRRQAUlFHFAB/+rmg0UlAAaM0dDSfTpQAGiiigA4pKWkFAAaOaDSdqAD0ozR3pKACiiigA9Pb1pPalNJQAUZ+lJRQAGiij/wCv7UABpPWgnv0ooAPxpKKOmRQAdv8AGlj/ANZH/vr/ADpvH9adH/rI/wDfX+dAG0SMnpSY9KM/oaDn8/TikAeuPoaTH55OaOO1HPv/AI0AJ07Dpz6Gl9Pf+tJ0zx1/l1pc8fTpQAn+B5o9Onf15o5wT24zSHpwPwFMA44qTLepph/w+lPw3oaANRuppKVuppKQBSUUUAFFFFABSUUUAFZV/wD8fH/AFrVrJv8A/X/8AWmBVpKWkoAWkoooAKKKKACiikoAKKKDQAUlHtRQAUUUlAAaKPxpKAA0dOlFFABR/Sk5zR/KgBaSiigApO9FH+fxoAP8aPSk6+1J+NAC9x/n86M/5FH50lABRRSUALSUe/p60UAH86TP5UUmaAD0xRR/n6Uf5NAB70UUn/66ADinR/6yP/fU/rTeP8M0sf34+f41/nQBtZ/w/wDrc0nXsPwo/wAg0HvmkAen40Z70n6Z6fj2oIH59aAF70nP4Uf4YoPtxn9KYCc8eoxilznPWj+dJQAdR04NSZPoPzqOpMf5xSA1G6mm05upptABRRRQAUlLSUAFFFFACVlX/wDr/wDgC1q1lX/+v/4AtMCpRRRQAUUUUAFFFJQAUUUUAFJS0lABSUvpSUALSUUE+1ACUUfrRQAetJS0lAC5pP1oooASij2o9fc0AFH0pPT/ADmigAz9cUetHf8ADtSGgAycmjp/hR/+uj60AJR3oo+negAo6UnvRntQAGk9aX86SgAP40nFL+PekoAPX9KKPWk/yaAFpY/vx/768/jSUsePMj9d6/qaANk55+tH8v5UYoHT3HOD70gD/HvSf5/+tR6j19aOP8DTAOMd6Dx0+n/1qP8AI/nQe/tQAdO/5dqSl7Hpn3pPXikAemPp3qbI9aiHWpcD1NAGi3U0lS+n0H8qKAIqKk7UUARUVJQO9AEX+eKKlPb6UnYUAR1lX/8Ar+f7i1telZF//rx/uL/WmBRoqT/61JQAyipP/r0nc/57UAMpKkPf8KO5oAjop56Cg/0oAjop9Hp+FADKSnnrRQAyk61Ieg/Gjt+NAEdH+RUh6fjSDtQAz+dJ0qQ9/wDPakPSgBhpKlPT/PpSHvQBHzSf4mn+v4UGgBnej/PNSdjSdj9BQBH/AIUU80H7v5UAMpDUn9360Dv/AJ70AR/l0o9aef6UD/GgCPij+dSDr+dIe9AEdIal7fjTfX6UAMoz+dOPT8aWgBn+NJUvp+NN/wABQAzmnJ9+P/eX+dKO9SR/6yH/AHx/MUAanH+fekzUnYfSl9f8+lICLj+lH/6/6VKf4P8Ad/wpq/dpgM/Cgc9e2akPf/dpO/4D+YpAM6//AF+v5UZPH+cVJ3/E0rd/+BUAQ89fQcj2qXn1/nR3j+lNPVvqaAP/2Q==',
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
//grafica capex_vx_opex 3 años
function cap_op_3(id_project,unidad){

    $.ajax({
        type: 'get',
        url: "/cap_op_3/" + id_project,
        success: function (res) {

            var options = {
          series: [{
          name: 'CAPEX',
          data: [res[2][0], res[1][0], res[0][0]]
        },{
          name: 'Energía OPEX',
          data: [res[2][1], res[1][1], res[0][1]]
        },{
          name: 'Mantenimiento OPEX',
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
          colors: ['rgb(0, 143, 251)', '#7668af','rgb(146, 133, 201)'],

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

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });

}

function cap_op_5(id_project,unidad){
    $.ajax({
        type: 'get',
        url: "/cap_op_5/" + id_project,
        success: function (res) {

            var options = {
          series: [{
          name: 'CAPEX',
          data: [res[2][0], res[1][0], res[0][0]]
        },{
          name: 'Energía OPEX',
          data: [res[2][1], res[1][1], res[0][1]]
        },{
          name: 'Mantenimiento OPEX',
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

//grafica 10 años
function cap_op_10(id_project,unidad){
    $.ajax({
        type: 'get',
        url: "/cap_op_10/" + id_project,
        success: function (res) {

            var options = {
          series: [{
          name: 'CAPEX',
          data: [res[2][0], res[1][0], res[0][0]]
        }, {
          name: 'Energía OPEX',
          data: [res[2][1], res[1][1], res[0][1]]
        },{
          name: 'Mantenimiento OPEX',
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
          text: '10 Años',
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

//grafica 15 años
function cap_op_15(id_project,unidad){

    $.ajax({
        type: 'get',
        url: "/cap_op_15/" + id_project,
        success: function (res) {
            var options = {
          series: [{
          name: 'CAPEX',
          data: [res[2][0], res[1][0], res[0][0]],

        },{
          name: 'Energía OPEX',
          data: [res[2][1], res[1][1], res[0][1]]
        },{
          name: 'Mantenimiento OPEX',
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
            text: '15 Años',
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

        var chart = new ApexCharts(document.querySelector("#chart_15"), options);
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
        url: "/roi_base_a_retro/" + id_project + '/' + dif_1_cost + '/' + inv_ini_2,
        success: function (res) {

            console.log(res);
    var options = {
          series: [
          {
            name: "ROI - A",
            data: [res[0], res[1], res[2], res[3], res[4]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225, 300]
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
          text: 'ROI Solución A v/s MARR',
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
        url: "/roi_base_a_retro/" + id_project + '/' + dif_2_cost + '/' + inv_ini_3,
        success: function (res) {

    var options = {
          series: [
          {
            name: "ROI - B",
            data: [res[0], res[1], res[2], res[3], res[4]]
          },
          {
            name: "MARR",
            data: [45, 75, 150, 225,300]
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
          text: 'ROI Solución B v/s MARR',
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

        var chart = new ApexCharts(document.querySelector("#chart_roi_base_b"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
}


//grafica capex_vx_opex 3 años
function eui_grafic(id_project){
 /*    $.ajax({
        type: 'get',
        url: "/cap_op_3/" + id_project,
        success: function (res) { */

            var options = {
          series: [{
          name: 'Energy',
          data: [26.5,26.5,26.5]
        }, {
          name: 'ASHRAE',
          data: [23,23,23]
        }],
          chart: {
          type: 'line',
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
            vertical: true,

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
            fontWeight:  'bold',
            fontSize: '24px',
            fontFamily: 'ABeeZee, sans-serif',
            fontWeight: "bold",
            cssClass: 'apexcharts-yaxis-label',
            color: '#000',
          },
        },
        xaxis: {
          categories: ['Existente','A','B'],
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
              return val + "$/m²"
            }
          }
        },
        fill: {
          opacity: 1,
          colors: ['rgb(0, 143, 251)', '#7668af'],

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
          fillColors: ['rgb(0, 143, 251)', '#7668af'],
          radius: 12,
          customHTML: undefined,
          onClick: undefined,
          offsetX: 0,
          offsetY: 0,
      },
        }
        };
        var chart = new ApexCharts(document.querySelector("#chart_eui"), options);
        chart.render();
       /*  var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
        },
        error: function (responsetext) {
            console.log(responsetext);
        }
    });
 */
}


      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(chart_base_eui);
      google.charts.setOnLoadCallback(chart_a_eui);
      google.charts.setOnLoadCallback(chart_b_eui);

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
          ['EUI Existente', eui_base],
        ]);

        if(energy > ashrae){
            var options = {
          width: 650, height: 320,
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
          width: 650, height: 320,
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
          width: 650, height: 320,
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
          width: 650, height: 320,
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
                width: 650, height: 320,
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
                width: 650, height: 320,
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

      google.charts.setOnLoadCallback(chart_prod_base);
      google.charts.setOnLoadCallback(chart_prod_a);
      google.charts.setOnLoadCallback(chart_prod_b);

      function chart_prod_base() {
        var check_prod = '{{$conf_val_base}}';
        var mult_cels_val = check_prod * 5;
        var val_res = mult_cels_val / 5;

        var datax = google.visualization.arrayToDataTable([
          ['Label','Value'],
          ['Existente',parseFloat(check_prod)],
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

        var chart = new google.visualization.Gauge(document.getElementById('chart_prod_base'));

        chart.draw(datax, options);

      }

      function chart_prod_a() {
        var check_prod_a = '{{$conf_val_a}}';
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

chart.draw(data, options);
}

function chart_prod_b() {
    var check_prod_b = '{{$conf_val_b}}';
var data = google.visualization.arrayToDataTable([
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

chart.draw(data, options);
}
</script>

@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection
