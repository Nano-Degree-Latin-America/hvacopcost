
@extends('main.main')

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
<div class="bg-blue-900 w-full flex justify-center" style="background-color:#1B17BB ;">
    <div class="w-1/3 flex h-full">
        <a><img src="{{asset('/assets/images/Logotipo-HVACOPCOST_blanco.png')}}" alt="hvacopcost latinoamérica" style="max-height: 100px; width:230px;"></a>
        <h1 style=" font-size: 4.3rem;margin-top:.80rem;" class="text-white font-roboto" >3.0</h1>
    </div>
    <div class=" w-1/3 flex justify-center" style="line-height: 30px; height:99px;">
        {{-- <a href="{{route('index')}}"><img class="header" id="logoSitio" id="logoSitio" src="assets/images/logos/hvac.png" alt=""></a> --}}

    </div>
    <div class="w-1/3 my-6 mr-2 flex justify-end h-1/3">
        {{--     <a href="#"><img class="header" id="logoDesprosoft" id="logoDesprosoft" src="{{asset('assets/images/logos/sarsoftware.png')}}" alt="sarsoftware"></a> --}}
        <button class="bg-blue-600 mx-1 p-3 rounded-md hover:bg-blue-900 text-white font-roboto action:bg-blue-600" onclick="window.location.href='home'"><p>{{ __('index.proyecto nuevo') }}</p></button>

    </div>

</div>
<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
<div class="w-full flex justify-center">
    <div class="w-3/4">
        <div style="color: #1B17BB;" class="w-full flex justify-center mt-3 text-4xl font-roboto font-bold">
            <p>Configuraciónes Mantenimiento</p>
        </div>
      {{--   @include('search') --}}
        <div class="grid my-3 rounded-md shadow-xl w-full">
            <div class="w-full">
                <table id="table_projects"  name="table_projects" class="font-roboto w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg">
                    <thead class="text-white">
                        <tr style="background-color:#1B17BB;" class="flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">

                            <th class="p-3 text-left"><span class="text-lg">Configuracion</span></th>
                            <th class="p-3 text-left"><span class="text-lg">Valor</span></th>
                            <th class="p-3 text-left"><span class="text-lg">Unidad</span></th>
                            <th class="p-3 text-left"><span class="text-lg">Editar</span></th>
                        </tr>
                    </thead>
                    <tbody class="flex-1 sm:flex-none">



                        @foreach ($configuraciones  as $configuracion)
                            <tr>



                                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                                        {{$configuracion->configuracion}}
                                    </td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                                        {{number_format($configuracion->valor,2)}}
                                    </td>

                                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-left">
                                        {{$configuracion->unidad}}
                                    </td>
                                    <td class="border-grey-light border hover:bg-gray-100 p-3 text-center">
                                        <div class="">
                                            <button  onclick="mostrar_modal_configuracion('modal_configuraciones','{{$configuracion->id}}');" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                                <span class="icon"><i class="text-blue-600 text-3xl far fa-edit hover:text-gray-500"></i></span>
                                            </button>
                                        </div>
                                    </td>
                            </tr>
        {{--                     @include('empresas.modal_paises_empresa')
                            @include('empresas.modal_type_p_empresas') --}}
                            @endforeach

                    </tbody>
                </table>
            </div>
@include('empresas.modal_configuraciones')

        </div>
       {{--  {{ $mis_projectos->render() }} --}}
    </div>
</div>

<script>
    window.onload = function() {


    new DataTable('#table_projects', {
        "language": {


    "lengthMenu":     "Mostrar _MENU_ Proyectos",
    "search":         "Buscar:",
    "zeroRecords":    "No matching records found",
    "paginate": {

        "next":       "Siguiente",
        "previous":   "Anterior"
    },

        },
        order: [[1, 'desc']],
    layout: {
        bottomStart: {
            info: {
                text: 'Mostrar: _START_ de _END_ total _TOTAL_ Proyectos'
            }
        }
    }
});
};

/* function ocultar_modal(id){
    $("#"+id).addClass("hidden");
} */

function mostrar_modal_configuracion(id_modal,id_configuracion){
    $("#"+id_modal).removeClass("hidden");
    $.ajax({
                type: 'get',
                url: '/get_configuracion/'+ id_configuracion,
                success: function (response) {
                    $('#configuracion').val(response.configuracion);
                    $('#valor').val(response.valor);
                    $('#unidad').val(response.unidad);
                    $('#id_configuracion').val(response.id);

                },
                error: function (responsetext) {

                }
            });
}


function save_configuracion(){

    // Enviar valuesArray por medio de AJAX
    var token = $("#token").val();
    var formData = $("#configuraciones_form").serialize(); // Serializar los datos del formulario

    $.ajax({
        url: '/store_configuracion', // Reemplaza con la URL de tu endpoint
        type: 'POST',

        headers: { 'X-CSRF-TOKEN': token },
        data: formData,
        success: function(response) {
            Swal.fire(
                        'Guardado!',
                        'El registro ha guardado.',
                        'success'
                    )
            setTimeout(function () { location.reload() }, 500);
            ocultar_modal('modal_configuraciones');

        },
        error: function(xhr, status, error) {
            console.error('Error al enviar los datos:', error);
        }
    });
}


</script>
@endsection
@section('js')
<?php
echo '<script src="../../js/index.js?v='.time().'"></script>';
?>
@endsection
