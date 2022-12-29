
@extends('main.main')
@inject('tipo_usuario','app\Http\Controllers\ProjectController')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
@endsection

@section('content')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <div id="divSettings">
        <a href="{{route('settings')}}"><i class="fa fa-cog" aria-hidden="true" id="settings"></i>   </a>
    </div> --}}
    <style>


@import url('https://fonts.googleapis.com/css2?family=ABeeZee&family=Comfortaa&family=Dongle&family=Montserrat:wght@500;600&family=Rubik:wght@300&display=swap');

        .font-roboto{
            font-family: 'ABeeZee', sans-serif;
        }

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

.pagination {

}

@media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }

  th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
  }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
<div class="bg-blue-900 w-full flex justify-center" style="background-image: radial-gradient(rgb(10,19,59) 0%,rgb(5,1,25) 100%);">
    <div class="w-1/3">
        <img class="header" style="height:99px;" name="logoEmpresa" id="logoEmpresa" src="{{asset('assets/images/logos/Administrador20210322133256.png')}}" alt="Nano Degree">
    </div>
    <div class=" w-1/3 flex justify-center" style="line-height: 30px; height:99px;">
        {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}
        <a><img src="{{asset('/assets/images/Logotipo-HVACOPCOST_blanco.png')}}" alt="hvacopcost latinoamérica" style="max-height: 100px; width:230px;"></a>

    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-end h-1/3">
        {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
        <button class="bg-blue-600  rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600 "><a class="mx-1" href="/home">Nuevo Projecto</a></button>

        </div>

</div>


<div class="w-full flex justify-center">
    <div class="w-3/4">
        @include('search')
        <div class="grid my-3 rounded-md shadow-xl w-full">
            <div class="w-full">
                <table class="font-roboto w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg">
                    <thead class="text-white">
                        <tr class="bg-blue-700 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                            <th class="p-3 text-left">Nombre</th>
                            <th class="p-3 text-left">Tipo Edificio</th>
                            {{-- <th class="p-3 text-left">Área</th>
                            <th class="p-3 text-left">Unidad</th> --}}
                            <th class="p-3 text-left">País</th>
                            <th class="p-3 text-left">Ciudad</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 text-left" width="110px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="flex-1 sm:flex-none">
                        @foreach ($mis_projectos as $project)
                        <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                            <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                               {{$project->name}}
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                                {{$project->tipo_edi}}
                            </td>
                            {{-- <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                                {{number_format($project->area)}}
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                                @if ($project->unidad == 'mc')
                                m²
                            @endif

                            @if ($project->unidad == 'ft')
                            ft²
                            @endif
                            </td> --}}
                            <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                                {{$project->region}}
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                                {{$project->ciudad}}
                            </td>
                            <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                              @if ($project->status == 1)
                              <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-green-500 text-white"> Activo </span>
                              @endif

                              @if ($project->status == 2)
                              <span class="px-2 inline-flex text-md leading-5 font-semibold rounded-full bg-red-500 text-white"> Inactivo </span>
                              @endif
                            </td>
                            <td class="border-grey-light border flex hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer gap-x-2">
                                <button title="Ver Resultados" class="p-1 bg-blue-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"><a href="project/{{$project->id}}" target="_blank" rel="noopener noreferrer"><i class="far fa-eye"></i></a></button>
                                <button title="Editar" class="p-1 bg-blue-400 rounded-md hover:bg-blue-600 text-white font-roboto action:bg-blue-600"><a href="edit_project/{{$project->id}}" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-pen-to-square"></i></a></button>
                                <button  onclick="elimiinar_project('{{$project->id}}','del_project');" class="p-1 bg-red-600 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600"><a><i class="fas fa-trash"></i></a></button>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>


        </div>
        {{ $mis_projectos->links() }}
    </div>
</div>

<script>
function app() {
			return {
				step: 1,
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

</script>
@endsection
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection
