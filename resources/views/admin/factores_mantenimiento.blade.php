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
              <p class="font-montserrat text-[#102E52] text-[25px]">Factores Mantenimiento</p>

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
          <div class="grid gap-y-2 w-full">
              <div class="flex w-full gap-x-3">
                 <div class="w-1/4 bg-gray-100 border-2 border-gray-500">
                    <h1 class="font-bold font-roboto text-xl">Factor Ambiente (FA)</h1>
                    <table id="factor_ambiente_table">
                        <thead>
                        <tr>
                          <th class="text-center">Factor</th>
                          <th class="text-center">Valor</th>
                          <th></th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($factor_ambiente as $ambiente)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                {{$ambiente->factor}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                    {{$ambiente->valor}}
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <button  onclick="mostrar_modal_factores('modal_factores','{{$ambiente->id}}','factor_ambiente','Factor Ambiente (FA)');" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </button>
                                    </div>
                                 </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                 </div>

                 <div class="w-1/4 bg-gray-100  border-2 border-gray-500">
                    <h1 class="font-bold font-roboto text-xl">Factor Tipo Acceso (FTA)</h1>
                    <table id="factor_tipo_acceso_table">
                        <thead>
                            <tr>
                              <th class="text-center">Factor</th>
                              <th class="text-center">Valor</th>
                              <th></th>

                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($factor_acceso as $acceso)
                                <tr>
                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$acceso->factor}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                    {{$acceso->valor}}
                                  </td>
                                  <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <button  onclick="mostrar_modal_factores('modal_factores','{{$acceso->id}}','factor_acceso','Factor Tipo Acceso (FTA)');" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </button>
                                    </div>
                                 </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                    </table>
                 </div>

                 <div class="w-1/4 bg-gray-100 border-2 border-gray-500">
                    <h1 class="font-bold font-roboto text-xl">Factor Estado Unidad (FEU)</h1>
                    <table id="factor_estado_unidad_table">
                        <thead>
                            <tr>
                              <th class="text-center">Factor</th>
                              <th class="text-center">Valor</th>
                              <th></th>

                            </tr>
                            </thead>
                            <tbody>
                                @forelse ($factor_estado_unidad as $estado_unidad)
                                <tr>
                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$estado_unidad->factor}}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                    {{$estado_unidad->valor}}
                                  </td>
                                  <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <button  onclick="mostrar_modal_factores('modal_factores','{{$estado_unidad->id}}','factor_estado_unidad','Factor Estado Unidad (FEU)');" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </button>
                                    </div>
                                 </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                    </table>
                 </div>

                 <div class="w-1/4 bg-gray-100 border-2 border-gray-500">
                    <h1 class="font-bold font-roboto text-xl">Factor Garantia (FG)</h1>
                    <table id="factor_garantia_table">
                      <thead>
                          <tr>
                            <th class="text-center">Factor</th>
                            <th class="text-center">Valor</th>
                            <th></th>

                          </tr>
                          </thead>
                          <tbody>
                            @forelse ($factor_garantia as $garantia)
                            <tr>
                              <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$garantia->factor}}
                              </td>

                              <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$garantia->valor}}
                               </td>
                               <td class="actions-cell">
                                  <div class="buttons right nowrap">
                                      <button  onclick="mostrar_modal_factores('modal_factores','{{$garantia->id}}','factor_garantia','Factor Garantia (FG)');"  class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                          <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                      </button>
                                  </div>
                               </td>
                            </tr>
                            @empty
                            @endforelse
                          </tbody>
                    </table>
                 </div>
                 <div class="w-1/4 bg-gray-100  border-2 border-gray-500">
                  <h1 class="font-bold font-roboto text-xl">Factor Horas Diarias (FHD)</h1>
                  <table id="factor_horas_diarias_table">
                      <thead>
                          <tr>
                            <th class="text-center">Factor</th>
                            <th class="text-center">Valor</th>
                            <th></th>
                          </tr>
                          </thead>
                          <tbody>



                              @forelse ($factor_horas_diarias as $horas_diarias)
                              <tr>
                              <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                {{$horas_diarias->factor}}
                              </td>

                              <td class="px-6 py-4 text-sm text-gray-800  text-center">
                                  {{$horas_diarias->valor}}
                                </td>
                                <td class="actions-cell">
                                    <div class="buttons right nowrap">
                                        <button  onclick="mostrar_modal_factores('modal_factores','{{$horas_diarias->id}}','factor_horas_diarias','Factor Horas Diarias (FHD)');" class="button small blue --jb-modal"  data-target="sample-modal-2" type="button">
                                            <span class="icon"><i class="mdi mdi-pencil"></i></span>
                                        </button>
                                    </div>
                                 </td>
                              </tr>
                              @empty

                              @endforelse
                          </tbody>
                  </table>
               </div>



                @include('admin.modal_factores')
            </div>


            {{-- ghajsdgashdgj --}}
          </div>
      </div>
  </div>
</div>
<script>
window.onload = function() {
  /*   let factor_ambiente_table = new DataTable('#factor_ambiente_table');
    let factor_tipo_acceso_table = new DataTable('#factor_tipo_acceso_table');
    let factor_estado_unidad_table = new DataTable('#factor_estado_unidad_table');
    let factor_garantia_table = new DataTable('#factor_garantia_table');
    let factor_horas_diarias_table = new DataTable('#factor_horas_diarias_table'); */
};

function ocultar_modal(id){
    $("#"+id).addClass("hidden");
}

function mostrar_modal_factores(id_modal,id,tipo_factor,titulo){
    $("#"+id_modal).removeClass("hidden");
    $.ajax({
                type: 'get',
                url: '/get_factor/'+ id +  '/' +tipo_factor,
                success: function (response) {
                    $('#titulo_modal').text(titulo);
                    $('#factor').val(response.factor);
                    $('#valor').val(response.valor);
                    $('#tipo_factor').val(tipo_factor);
                    $('#id_factor').val(response.id);

                },
                error: function (responsetext) {

                }
            });
}

function save_factores(){

// Enviar valuesArray por medio de AJAX
var token = $("#token").val();
var formData = $("#factor_form").serialize(); // Serializar los datos del formulario

$.ajax({
    url: '/store_factor', // Reemplaza con la URL de tu endpoint
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
save_factores
</script>
@endsection
