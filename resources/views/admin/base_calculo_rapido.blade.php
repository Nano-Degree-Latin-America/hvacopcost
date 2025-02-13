@extends('layouts.admin')

@section('content')
  <style>
   .botonF1{
  width:100px;
  height:40px;
  background: #102E52;
  right:0;
  bottom:0;
  top: 10px;
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
  </style>
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

  <div class="my-3 mx-3 font-semibold text-gray-700 flex-1">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a href="/home" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
              <svg class="mr-2 w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
              <p class="font-montserrat text-[#102E52] text-[25px]">Base Cálculo Rápido</p>

            </a>
          </li>


        </ol>
        <div class="contenedor">
                    <a href="/lo_gout">
                        <button class="botonF1">
                            Cerrar Sesión
                            </button>
                    </a>

                     </div>
      </nav>
</div>
<hr>


  <div class="w-0.8 my-1 mx-5 justify-center">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="container mx-auto">
      <div class="flex flex-col">
          <div class="w-full">
              <div class="card has-table">
                <div class="card-content">
                  <table id="tabla_base_calculo_rapido">
                    <thead>
                    <tr>
                      <th>Sistema Hvac</th>
                      <th>Equipo</th>
                      <th>Costo Instalado</th>
                      <th>Unidad</th>
                      <th>RAV</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>

                        @forelse ($bases as $base)
                        <tr class="font-roboto  bg-slate-200 place-content-center">
                            <td class="px-6 py-4 text-sm text-gray-800">
                               {{--  @foreach ($sistemas as $sistema)
                                    @if ($base->sistema ==  $sistema->id)
                                    {{$sistema->name}}
                                    @endif
                               @endforeach --}}
                               {{$base->sistema_name}}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-800">
                               {{$base->unidad_name}}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-800">
                                ${{number_format($base->costo_instalacion)}}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{$base->unidad_costo_instalacion}}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-800">
                                {{$base->rav}}
                            </td>

                            <td class="actions-cell">
                                <div class="buttons right nowrap">
                                    <button  onclick="mostrar_modal_base_calculo('modal_base_calculo','{{$base->id}}');" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                        <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        @empty

                        @endforelse
                </tbody>
            </table>

            @include('admin.modal_base_calculo')
            <div class="table-pagination">
                <div class="flex items-center justify-between">
                    {{-- {{ $empresas->links() }} --}}
                </div>
            </div>
        </div>
    </div>

          </div>
      </div>
  </div>
</div>
<script>
window.onload = function() {
    let table = new DataTable('#tabla_base_calculo_rapido');
};

function ocultar_modal(id){
    $("#"+id).addClass("hidden");
}

function mostrar_modal_base_calculo(id_modal,id_base){
    $("#"+id_modal).removeClass("hidden");
    $.ajax({
                type: 'get',
                url: '/get_calculo_base/'+ id_base,
                success: function (response) {
                    //$('#configuracion').val(response.id);/*

                    $('#sistema').val(response.sistema_name);
                },
                error: function (responsetext) {

                }
            });
}



function change_pais(id_empresa,pais){

    $.ajax({
                type: 'get',
                url: '/change_pais/'+ id_empresa+'/'+pais,
                success: function (response) {

                },
                error: function (responsetext) {

                }
            });
}

function change_type_project(id_empresa,type_p){

$.ajax({
            type: 'get',
            url: '/change_type_project/'+ id_empresa+'/'+type_p,
            success: function (response) {

            },
            error: function (responsetext) {

            }
        });
}

function change_empresa(id_empresa){

    Swal.fire({
        title: '¿Administrar?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0dcaf0',
        cancelButtonColor: 'orange',
        confirmButtonText: 'SI'
    }).then((result) => {
        if (result.isConfirmed) {
            // var route = ruta_global + "/" + aux + "/" + id + "";
            var token = $("#_token").val();
            $.ajax({
                type: 'get',
                url: '/change_empresa/'+ id_empresa,
                success: function (response) {
                    Swal.fire(
                        'Exito!',
                        '',
                        'success'
                    )
                },
                error: function (responsetext) {

                }
            });

            setTimeout(function () { window.location.href='mis_projectos' }, 1000);

            //location.reload();
        }
    })
}

/* function save_configuracion(){

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
}*/
</script>
@endsection
